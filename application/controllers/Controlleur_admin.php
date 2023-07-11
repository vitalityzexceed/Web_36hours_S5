<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlleur_admin extends CI_Controller {


    public function vers_ListeElement()
    {
        $this->load->model('model_generalise');
        $dataliste['listeelements'] = $this->model_generalise->find_all("Element");
        $dataliste['title'] = "Liste des elements";
        $dataliste['pages'] = "ListeElement";

        $this->load->view('pages-template-admin', $dataliste);
    }
        
    public function vers_ListeRegime()
    {
        $this->load->model('model_generalise');
        $this->load->model('model_regime');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_user/index');
        }
        else
        {
            $dataliste['listeregimes'] = $this->model_generalise->find_all("regime");
            foreach ($dataliste['listeregimes'] as &$regime) 
            {
                $regime['elements'] = $this->model_regime->get_elements_by_id_regime($regime['id_regime']);
            }
            $dataliste['title'] = "Liste des regimes";
            $dataliste['pages'] = "ListeRegime";

            $this->load->view('pages-template-admin', $dataliste);
        }
                
    }

    public function vers_AddRegime()
    {
        $this->load->model('model_generalise');
        
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_user/index');
        }
        else
        {
            $dataliste['listeelements'] = $this->model_generalise->find_all("Element");
            // $dataliste['listeelements'] = $this->model_element->find_all("Element");
            $dataliste['title'] = "Ajout nouveau regime";
            $dataliste['pages'] = "AddRegime";
            $this->load->view('pages-template-admin', $dataliste);
        }
                
    }

    public function vers_AddElement()
    {
        $this->load->model('model_generalise');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_user/index');
        }
        else
        {
            $dataliste['pages'] = "AddElement";
            $dataliste['title'] = "Ajout de nouvel element";
            $this->load->view('pages-template-admin', $dataliste);
        }
                
    }     
                    
    public function vers_AddActivite()
    {
        $this->load->model('model_generalise');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_user/index');
        }
        else
        {
            $dataliste['pages'] = "AddActiviteSportive";
            $dataliste['title'] = "Ajout activité";
            $this->load->view('pages-template-admin', $dataliste);
        }   
    }    
    
    public function vers_AddTypeEntrainement()
    {
        $this->load->model('model_generalise');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_user/index');
        }
        else
        {
            $dataliste['pages'] = "AddTypeEntrainement";
            $dataliste['title'] = "Ajout type entrainement";

            $this->load->view('pages-template-admin', $dataliste);
        }   
    }

    public function vers_AddEntrainementActivite()
    {
        $this->load->model('model_generalise');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_user/index');
        }
        else
        {
            $dataliste['pages'] = "AddEntrainementActivite";
            $dataliste['title'] = "Ajout entrainement activite";
            $dataliste['typesentrainement'] = $this->model_generalise->find_all("Type_Entrainement");
            $dataliste['activitessportif'] = $this->model_generalise->find_all("activite_sportif");
            $dataliste['genres'] = $this->model_generalise->find_all("genre");
            $this->load->view('pages-template-admin', $dataliste);
        }   
    }

    public function ajout_element()
    {
        $this->load->model('model_element');
        $iduseractuel = $this->session->idutilisateur;
        if (!isset($iduseractuel)) 
        {
            redirect('Controlleur_user/index');
        }
        else
        {
            $nom = $this->input->post("nom");
            $prix = $this->input->post("prix");
            $this->model_element->insert_new_element($nom, $prix);
            redirect(site_url("controlleur_admin/vers_Listeelement"));
        }   
    }

}


?>