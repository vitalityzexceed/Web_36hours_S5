<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlleur_client extends CI_Controller {

public function vers_Planning($num_page = 1)
    {
        $this->load->model('model_user');
        $this->load->library('pagination');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_client/index');
        }
        else
        {
            $dataliste['pages'] = "Planning";
            $dataliste['title'] = "Planning";
            
            
            $id_objectif = $this->input->post('id_objectif');
            $poids = $this->input->post('poids');

            $all_entrainement = array();
            $entrainement_jour = array();
            $prix = 0;

            if (isset($id_objectif) && isset($poids)) {
                // echo  "huhuhuh";
                $all_entrainement = $this->model_user->getEntrainement_jour(4, $id_objectif, $poids);
                // $this->session->set_userdata('all_entrainement', $all_entrainement);
                $_SESSION["all_entrainement"] = $all_entrainement;
                $entrainement_jour = $all_entrainement["all_proposition"];
                // $this->session->set_userdata('entrainement_jour', $entrainement_jour);
                $_SESSION["entrainement_jour"] = $entrainement_jour;
                $_SESSION["id_objectif"] = $id_objectif;
    
                // print_r( $_SESSION["entrainement_jour"]);
            }
            if(isset($_SESSION["entrainement_jour"]) && $_SESSION["all_entrainement"]) {
                $nb_pages = $this->model_user->getNb_page($_SESSION["entrainement_jour"], 5);
                $pagine = $this->model_user->getEntrainement_jour_pagine( $_SESSION["entrainement_jour"], $num_page);
                $dataliste['entrainement_jour'] = $pagine;
                $prix = $_SESSION["all_entrainement"]["prix_total"];
            }
            else{
                $dataliste['entrainement_jour'] =  $entrainement_jour;
                $nb_pages = $this->model_user->getNb_page($entrainement_jour, 5);
            }
            // $dataliste['entrainement_jour'] = $pagine;
            
            $dataliste['nb_pages'] = $nb_pages;
            $dataliste["prix_total"] = $prix;
            
            $this->load->view('pages-template-client', $dataliste);
        }
        
    }


    public function vers_Planning_IMC($num_page = 1)
    {
        $this->load->model('model_user');
        $this->load->library('pagination');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_client/index');
        }
        else
        {
            $dataliste['pages'] = "Planning";
            $dataliste['title'] = "Planning";

            $objectifs = $this->model_user->getObjectif($iduseractuel);
            
            
            $id_objectif = $objectifs[0];
            $poids = $objectifs[1];
            $etat = $objectifs[2];
            // echo $id_objectif." ".$poids;

            $all_entrainement = array();
            $entrainement_jour = array();
            $prix = 0;
            $tab = array("Augmenter votre poids","Perdre du poids");
            $afaire = $tab[$id_objectif - 1];

            $string = "Vous etes en $etat et vous devirer $afaire de $poids kg";



            if (isset($id_objectif) && isset($poids)) {
                // echo  "huhuhuh";
                $all_entrainement = $this->model_user->getEntrainement_jour(4, $id_objectif, $poids);
                // $this->session->set_userdata('all_entrainement', $all_entrainement);
                $_SESSION["all_entrainement"] = $all_entrainement;
                $entrainement_jour = $all_entrainement["all_proposition"];
                // $this->session->set_userdata('entrainement_jour', $entrainement_jour);
                $_SESSION["entrainement_jour"] = $entrainement_jour;
                $_SESSION["id_objectif"] = $id_objectif;
    
                // print_r( $_SESSION["entrainement_jour"]);
            }
            if(isset($_SESSION["entrainement_jour"]) && $_SESSION["all_entrainement"]) {
                $nb_pages = $this->model_user->getNb_page($_SESSION["entrainement_jour"], 5);
                $pagine = $this->model_user->getEntrainement_jour_pagine( $_SESSION["entrainement_jour"], $num_page);
                $dataliste['entrainement_jour'] = $pagine;
                $prix = $_SESSION["all_entrainement"]["prix_total"];
                $_SESSION["message_IMC"] = $string;
            }
            else{
                $dataliste['entrainement_jour'] =  $entrainement_jour;
                $nb_pages = $this->model_user->getNb_page($entrainement_jour, 5);
            }
            // $dataliste['entrainement_jour'] = $pagine;
            
            $dataliste['nb_pages'] = $nb_pages;
            $dataliste["prix_total"] = $prix;
            
            $this->load->view('pages-template-client', $dataliste);
        }
        
    }


    public function listeCode()
    {
        $this->load->model('model_generalise');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_client/index');
        }
        else
        {
            $dataliste['pages'] = "List-code";
            $dataliste['title'] = "List-code";
            $dataliste['all_code'] = $this->model_generalise->find_all("code");
        
            
            $this->load->view('pages-template-client', $dataliste);
        }
        
    }

    public function demandeCode()
    {
        $this->load->model('model_code_argent');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_client/index');
        }
        else
        {
            try {
                $code = $this->input->post("code");
                $this->model_code_argent->demander_code($code, $iduseractuel);
                redirect(site_url("controlleur_client/listeCode?succes"));
            } catch (Exception $e) {
                $error = $e->getMessage();
                redirect(site_url("controlleur_client/listeCode?error=$error"));
            }
            
        
            
            // $this->load->view('pages-template-client', $dataliste);
        }
        
    }

    public function payer()
    {
        $this->load->model('model_code_argent');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_client/index');
        }
        else
        {

            if(isset($_SESSION["entrainement_jour"]) && $_SESSION["all_entrainement"] && $_SESSION["id_objectif"]){
                $montant = $_SESSION["all_entrainement"]["prix_total"];

                try {
                    $this->model_code_argent->achat_regime($iduseractuel, $montant, $_SESSION["id_objectif"]);
                    redirect(site_url("controlleur_client/vers_portefeuille"));
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    redirect(site_url("controlleur_client/vers_Planning?error=$error"));
                }
                
            }
            else {
                redirect(site_url("controlleur_client/vers_Planning"));
            }
            
            
        
            
            // $this->load->view('pages-template-client', $dataliste);
        }
        
    }
         
    public function vers_PorteFeuille()
    {
            $this->load->model('model_generalise');
            $iduseractuel = $this->session->idutilisateur;
            if (!isset($iduseractuel)) 
            {
                redirect('Controlleur_admin/index');
            }   
            else
            {
                $dataliste['pages'] = "PorteFeuille";
                $dataliste['title'] = "PorteFeuille";
                $compte = $this->model_generalise->find_by_request("SELECT * from compte_utilisateur where id_utilisateur = $iduseractuel");
                $dataliste["compte"] = $compte[0];
                $this->load->view('pages-template-client', $dataliste);
            }
                
        } 
        
        function PDF_entrainement() {
            $this->load->model('model_user');
            $this->load->library('pdf');
            // Créer une nouvelle instance de la classe Pdf
            if(isset($_SESSION["entrainement_jour"]) && $_SESSION["all_entrainement"]) {
                $pdf = new PDF();
                $pdf->title = "Entrainement";
                $all_entrainement= $_SESSION["all_entrainement"];
                $results = $all_entrainement["all_proposition"];
                $prix_total = $all_entrainement["prix_total"];
                $pdf->AddPage();
                $pdf->CreatePDFTableEntrainement([28, 33, 30, 30, 32, 32], ["Activite", "Repetitions", "Seances"], $all_entrainement, [4, 5], [$prix_total]);
                $pdf->Output();
            }  
            else {
                redirect(site_url("controlleur_client/vers_Planning"));
            } 

            
        }

}
    ?>