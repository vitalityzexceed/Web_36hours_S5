<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlleur_parametrer extends CI_Controller {


    public function vers_parametre_entrainement()
    {
        $this->load->model('model_generalise');
        $this->load->model('model_parametrer');
        $iduseractuel = $this->session->idutilisateur;
       
        $datalistes['objectifs'] = $this->model_generalise->find_all("objectif");
        $datalistes['genre'] = $this->model_generalise->find_all("genre");
        $datalistes['type_entrainement'] = $this->model_generalise->find_all("type_entrainement");
        $datalistes['regime'] = $this->model_generalise->find_all("regime");
            $datalistes['title'] = "Parametre pour  Entrainement";
            $datalistes['pages'] = "parametre_entrainement";

            $this->load->view('pages-template-admin', $datalistes);
        }
                


        

    public function vers_page_entrainement()
    {
        $this->load->model('model_generalise');
        $this->load->model('model_parametrer');
        $iduseractuel = $this->session->idutilisateur;
 
        $datalistes['v_entrainement'] = $this->model_generalise->find_all("v_entrainement");
            $datalistes['title'] = "Tous les liste de Entrainement  Parametrer ";
            $datalistes['pages'] = "Page_entrainement";

            $this->load->view('pages-template-admin', $datalistes);
        }
                


    
  public function traitement_ajout_parametrer()
  {
      $this->load->model('model_parametrer');
      
      $poids1 = $this->input->post('poids1');
      $poids2 = $this->input->post('poids2');
      $taille1 = $this->input->post('taille1');
      $taille2 = $this->input->post('taille2');
      $id_objectif = $this->input->post('id_objectif');
      $id_genre = $this->input->post('id_genre');
      $id_type_entrainement = $this->input->post('id_type_entrainement');
      $id_regime = $this->input->post('id_regime');
      $estimation = $this->input->post('estimation');
      
      $this->model_parametrer->ajouter_parametre($poids1, $poids2, $taille1, $taille2, $id_objectif, $id_genre, $id_type_entrainement, $id_regime, $estimation);
      
      $datalistes['title'] = "Ajouter Activiter";
      $datalistes['pages'] = "accueil-admin";
      
      $this->load->view('pages-template-admin', $datalistes);

      redirect('controlleur_parametrer/vers_page_entrainement');
    }





}  

?>