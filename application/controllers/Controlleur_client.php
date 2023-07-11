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

            if (isset($id_objectif) && isset($poids)) {
                // echo  "huhuhuh";
                $all_entrainement = $this->model_user->getEntrainement_jour(4, $id_objectif, $poids);
                $this->session->set_userdata('all_entrainement', $all_entrainement);
                $entrainement_jour = $all_entrainement["all_proposition"];
                // $this->session->set_userdata('entrainement_jour', $entrainement_jour);
                $_SESSION["entrainement_jour"] = $entrainement_jour;
    
                // print_r( $_SESSION["entrainement_jour"]);
            }
            if(isset($_SESSION["entrainement_jour"])) {
                $nb_pages = $this->model_user->getNb_page($_SESSION["entrainement_jour"], 5);
                $pagine = $this->model_user->getEntrainement_jour_pagine( $_SESSION["entrainement_jour"], $num_page);
                $dataliste['entrainement_jour'] = $pagine;
            }
            else{
                $dataliste['entrainement_jour'] =  $entrainement_jour;
            }
            // $dataliste['entrainement_jour'] = $pagine;
            
            $dataliste['nb_pages'] = $nb_pages;
            
            $this->load->view('pages-template-client', $dataliste);
        }
        
    }
         
    public function vers_PorteFeuille()
    {
        $this->load->model('model_user');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_admin/index');
        }   
        else
        {
        $dataliste['pages'] = "PorteFeuille";
            $dataliste['title'] = "PorteFeuille";
            $this->load->view('pages-template-client', $dataliste);
                }
                
        }     

}
    ?>