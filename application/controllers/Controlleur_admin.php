<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlleur_admin extends CI_Controller {


    public function vers_ListeElement()
    {
        $this->load->model('model_user');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_user/index');
        }
        else
        {
          $dataliste['pages'] = "ListeElement";
            $dataliste['title'] = "ListeElement";
            $this->load->view('pages-template-admin', $dataliste);
        }
        
    }
        
        public function vers_ListeRegime()
        {
            $this->load->model('model_user');
            $iduseractuel = $this->session->idutilisateur;
            if (!isset($iduseractuel)) 
            {
                redirect('Controlleur_user/index');
            }
            else
            {
            $dataliste['pages'] = "ListeRegime";
                $dataliste['title'] = "ListeRegime";
                $this->load->view('pages-template-admin', $dataliste);
                    }
                    
            }
            public function vers_AddRegime()
            {
                $this->load->model('model_user');
                $iduseractuel = $this->session->idutilisateur;
                if (!isset($iduseractuel)) 
                {
                    redirect('Controlleur_user/index');
                }
                else
                {
                $dataliste['pages'] = "AddRegime";
                    $dataliste['title'] = "AddRegime";
                    $this->load->view('pages-template-admin', $dataliste);
                        }
                        
                }     
                public function vers_AddElement()
                {
                    $this->load->model('model_user');
                    $iduseractuel = $this->session->idutilisateur;
                    if (!isset($iduseractuel)) 
                    {
                        redirect('Controlleur_user/index');
                    }
                    else
                    {
                    $dataliste['pages'] = "AddElement";
                        $dataliste['title'] = "AddElement";
                        $this->load->view('pages-template-admin', $dataliste);
                            }
                            
                    }     
                    
  
  
                    public function vers_AddEntrainement()
                    {
                        $this->load->model('model_user');
                        $iduseractuel = $this->session->idutilisateur;
                        if (!isset($iduseractuel)) 
                        {
                            redirect('Controlleur_user/index');
                        }
                        else
                        {
                        $dataliste['pages'] = "AddEntrainement";
                            $dataliste['title'] = "AddEntrainement";
                            $this->load->view('pages-template-admin', $dataliste);
                                }
                                
                        }     
      
      
      
      
      
}


    ?>