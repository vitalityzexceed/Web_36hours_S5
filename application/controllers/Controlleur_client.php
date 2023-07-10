<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlleur_client extends CI_Controller {

public function vers_Planning()
    {
        $this->load->model('model_user');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_client/index');
        }
        else
        {
          $dataliste['pages'] = "Planning";
            $dataliste['title'] = "Planning";
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