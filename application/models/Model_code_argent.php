<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_code_argent extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_generalise');
    }

    public function valider_code($idcode, $iduser){
        // $tab = array();
        // $request = "Update code_status set status = 20 where id_code = %s and id_utilisateur = %s";
        $data = [
            'status' => '20',
        ];
        $this->db->where('id_code', $idcode);
        $this->db->where('id_utilisateur', $iduser);
        $this->db->update('code_status', $data);
        
        // return $this->db->affected_rows();
    }

    public function demander_code__($idcode, $iduser)
    {
        // $request = "Insert into code_status values (%s, %s, %s)";
        // $request = sprintf($request, $idcode, $iduser, 1);
        // $query = $this->db->select('*')->from('code_status')->where('id_code', $idcode)->get();
        // $test_raha_efa = $query->result();

        $test_raha_efa = $this->model_generalise->find_by_request("SELECT * from code_status where id_code = $idcode");

        if(count($test_raha_efa) > 0) {
            throw new Exception ("Code deja utilise");
        }

        $data = [
            'id_code' => $idcode,
            'id_utilisateur' => $iduser,
            'status' => 1
        ];
        $this->db->insert('code_status', $data);
    
    }

    public function demander_code($code, $iduser)
    {
        $code_demande = $this->model_generalise->find_by_request("SELECT * from code where code = '$code'");
        if(count($code_demande) > 0) {
            $id_code =$code_demande[0]["id_code"];
            $this->demander_code__($id_code, $iduser);
        }
        else {
            throw new Exception("Invalide code");
        }
    }

    public function accept_transaction($id_code_satus) {
        $code_demande = $this->model_generalise->find_by_request("SELECT * from v_transaction where id_code = $id_code_satus");
        $sql = "UPDATE code_status set status = 20 where id_code = $id_code_satus";
        $this->db->query($sql);
        $id_user = $code_demande[0]["id_utilisateur"];
        $id_code = $code_demande[0]["id_code"];
        $montant_azo = $code_demande[0]["prix"];
        $monant_teo = $this->model_generalise->find_by_request("SELECT * from compte_utilisateur where id_utilisateur = $id_user");
        $monant_teo = $monant_teo[0]["montant_utilisateur"];
        $montant_vaovao = $monant_teo + $montant_azo;
        $sql1 = "UPDATE compte_utilisateur set montant_utilisateur = $montant_vaovao where id_utilisateur = $id_user";
        $this->db->query($sql1);
    }

    public function deny_transaction($id_code_satus) {
        $sql = "DELETE From code_status  where id_code = $id_code_satus";
        $this->db->query($sql);
    }

    public function achat_regime($id_utilisateur, $montant, $id_objectif) {
        $monant_actuel = $this->model_generalise->find_by_request("SELECT * from compte_utilisateur where id_utilisateur = $id_utilisateur")[0]["montant_utilisateur"];
        if($monant_actuel < $montant) {
            throw new Exception("Vous n'avez pas assez de credit pour payer");
        }
        else {
            $reste = $monant_actuel - $montant;
            $sql = "UPDATE compte_utilisateur set montant_utilisateur = $reste where id_utilisateur = $id_utilisateur";
            $this->db->query($sql);
            $sql1 = "INSERT INTO stat_achat values ( $id_objectif , $montant, now() )";
            $this->db->query($sql1);
        }
        
    }



}

?>