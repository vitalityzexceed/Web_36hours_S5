<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        // Chargez le modèle 'Nom_du_modele' en utilisant $this->load->model()
        $this->load->model('model_generalise');
    }
    
    public function verify_Login($nom, $mdp) {
        $val = 'not_found';
        $request = "SELECT * from utilisateur where (nom = %s or mail = %s) and motdepasse = (select sha1(%s))";
        $request = sprintf($request,$this->db->escape($nom), $this->db->escape($nom), $this->db->escape($mdp));
        // echo $request;  
        $query = $this->db->query($request);
        $row = $query->row_array();
        // echo isset($row)."hahahaha";
        if(isset($row)) {
            $val = $row['id_utilisateur'];
        }
    return $val;
    }

    public function insert_user($nom, $mail, $mdp, $dateNaissance) {
        $request = "INSERT INTO utilisateur VALUES (NULL, %s, %s, (select sha1(%s)), 0, %s,now())";
        $request = sprintf($request, $this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp), $this->db->escape($dateNaissance));
 echo $request."<br>";
        $this->db->query($request);
    }

    public function parametre_utilisateur($id_utilisateur, $id_genre, $taille, $poids) {

        if($taille < 130 || $taille >270) {
            throw new Exception("La taille doit etre compris entre 130-270 cm");
        }

        if($poids < 30 || $poids > 270 ) {
            throw new Exception("La poids doit etre compris entre 30-300 kg");
        }

        $sql = "INSERT INTO  parametre_utilisateur values (%s, %s, %s, %s)";
        $sql = sprintf($sql, $id_utilisateur, $id_genre, $taille, $poids);
         echo $sql."<br>";
        $this->db->query($sql);
    }

    public function insert_compte_utilisateur($id_utilisateur, $compte){
        $sql = "INSERT INTO  compte_utilisateur values (%s, %s)";
        $sql = sprintf($sql, $id_utilisateur, $compte);
         echo $sql."<br>";
        $this->db->query($sql);
    }

    public function inscription($nom, $mail, $mdp, $dateNaissance, $id_genre, $taille, $poids) {
        $this->insert_user($nom, $mail, $mdp, $dateNaissance);
        $req_1 = "SELECT * from utilisateur where nom = '$nom' and mail = '$mail' and motdepasse = (select sha1('$mdp'))";
         echo $req_1."<br>";
        $query_1 = $this->db->query($req_1);
        $row_1 = $query_1->row_array();
        $id_utilisateur = $row_1['id_utilisateur'];
        $this->insert_compte_utilisateur($id_utilisateur, 0);
        $this->parametre_utilisateur($id_utilisateur, $id_genre,$taille,$poids );
    }

    public function getNb_jour_entrainement($id_utilisateur, $id_objectif, $poid_entre) {
        $req = "SELECT * from v_parametre_utilisateur where id_utilisateur = $id_utilisateur";
        $user = $this->model_generalise->find_by_request($req)[0];
        $req_1 = "SELECT * 
                from v_entrainement 
                where id_genre = %s and 
                id_objectif = %s 
                and (%s BETWEEN poids1 and poids2) 
                and (%s BETWEEN taille1 and taille2) 
                order by estimation DESC";
        $req_1 = sprintf($req_1, $user['id_genre'],$id_objectif, $user['poids'],$user['taille']);
        //echo $req_1."<br/>";
        $proposition_entrainement = $this->model_generalise->find_by_request($req_1)[0];
        $val = array(
            "nb_jour" => round($poid_entre/$proposition_entrainement['estimation'] ),
            "estimation" => $proposition_entrainement['estimation'],
            "user" => $user
        );
        return $val;
    }

    public function getIMC($id_utilisateur) {
        $user = $this->model_generalise->find_by_request("SELECT * from v_parametre_utilisateur where id_utilisateur = $id_utilisateur")[0];
        return $user["poids"]/(  ($user["poids"]*0.01)*($user["poids"]*0.01)  );
    }

    public function getObjectif($id_utilisateur) {
        $imc = $this->getIMC($id_utilisateur);
        echo $imc;
        if($imc < 18.5) {
            return array(1, 10, "Insuffisance pondérale");
        }
        if($imc >= 18.5 && 24.9 > $imc ) {
            return array(1, 2, "poids normal");
        }
        if( 25 <= $imc && 29.9 <= $imc ) {
            return array(2, 10, "surpoids");
        }
        else {
            return array(2, 10, "obésité");
        }
    }

    public function getEntrainement_jour($id_utilisateur, $id_objectif, $poid_entre) {
        $proposition_entrainement = $this->getNb_jour_entrainement($id_utilisateur, $id_objectif, $poid_entre);
        $val = array();
        $req = "";
        $proposition_rand = null;
        $full_proposition = null;
        $prix_total = 0;
        for ($i=0; $i <$proposition_entrainement['nb_jour'] ; $i++) { 
            $req = "SELECT * 
                from v_entrainement 
                where id_genre = %s and 
                id_objectif = %s 
                and estimation = %s
                and (%s BETWEEN poids1 and poids2) 
                and (%s BETWEEN taille1 and taille2) ";
            $req = sprintf($req,
                $proposition_entrainement["user"]["id_genre"],
                $id_objectif, 
                $proposition_entrainement["estimation"],
                $proposition_entrainement["user"]["poids"], 
                $proposition_entrainement["user"]["taille"] );
            $proposition_rand = $this->model_generalise->find_by_request($req);
            if(count($proposition_rand) > 1) {
                $proposition_rand = $proposition_rand[ rand(0, count($proposition_rand) )  ];
            }
            else{
                $proposition_rand = $proposition_rand[0];
            }
            $id_regime = $proposition_rand["id_regime"];
            $id_type_entrainement= $proposition_rand["id_type_entrainement"];
            $regime = $this->model_generalise->find_by_request("select * from v_regime where id_regime = $id_regime");
            $entrainement = $this->model_generalise->find_by_request("select * from v_type_entrainement where id_type_entrainement= $id_type_entrainement");
            $full_proposition = array(
                "jour" => $i+1,
                "regime" => $regime,
                "entrainement" => $entrainement
            );
            $prix =  $this->model_generalise->find_by_request("select sum(prix_element) as v from v_regime where id_regime = $id_regime")[0]["v"];
            $prix_total = $prix + $prix_total;
            array_push($val, $full_proposition);
        }
        
        $array_val = array(
            "all_proposition" => $val,
            "prix_total" => $prix_total
        );

        return $array_val;
    }

    public function getNb_page($all_entrainement, $affiche_page) {
        return round( count($all_entrainement)/$affiche_page );
    }

    public function getEntrainement_jour_pagine($tableau, $page) {
        // $nb_pages = $this->getNb_page($all_entrainement, 5);

        $elementsParPage = 5; // Nombre fixe d'éléments par page
        $totalElements = count($tableau);
        $totalPages = ceil($totalElements / $elementsParPage);

        if ($page < 1 || $page > $totalPages) {
            return array(); // Retourne un tableau vide si le numéro de page est invalide
        }

        $indiceDebut = ($page - 1) * $elementsParPage;
        $indiceFin = $indiceDebut + $elementsParPage - 1;

        return array_slice($tableau, $indiceDebut, $elementsParPage);

    }


 

   
}

?>