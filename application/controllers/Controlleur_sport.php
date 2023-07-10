<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Controlleur_regime extends CI_Controller {

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         * 		http://example.com/index.php/welcome
         *	- or -
        * 		http://example.com/index.php/welcome/index
        *	- or -
        * Since this controller is set as the default controller in
        * config/routes.php, it's displayed at http://example.com/
        *
        * So any other public methods not prefixed with an underscore will
        * map to /index.php/welcome/<method_name>
        * @see https://codeigniter.com/user_guide/general/urls.html
        */

        function __construct(){
            parent::__construct();
            $this->load->helper('url'); 
            
        }
        
        public function index()
        {
            $data['title'] = "Index";
            $data['pages'] = "index";
            $this->load->view('form-template', $data);
        }

        // public function vers_login_admin()
        // {
        //     $data['pages'] = "sign-in-admin";
        //     $data['title'] = "Login admin";
        // 	$this->load->view('form-template', $data);
        // }

        // public function vers_login_client()
        // {
        //     $data['pages'] = "sign-in-client";
        //     $data['title'] = "Login client";
        // 	$this->load->view('form-template', $data);
        // }

        // public function vers_inscription_client()
        // {
        //     $data['pages'] = "sign-up-client";
        //     $data['title'] = "Inscription client";
        // 	$this->load->view('form-template', $data);
        // }
            
        public function traitement_update_entrainement_activite()
        {
            $this->load->model('model_sport');

            $id_type_entrainement_new = $this->input->post('id_type_entrainement_new');
            $id_activite_sportif_new = $this->input->post('id_activite_sportif_new');
            $id_genre_new = $this->input->post('id_genre_new');
            $nb_repetitions_new = $this->input->post('nb_repetitions_new');
            $nb_seances_new = $this->input->post('nb_seances_new');
            
            $id_type_entrainement_old = $this->input->post('id_type_entrainement_old');
            $id_activite_sportif_old = $this->input->post('id_activite_sportif_old');
            $id_genre_old = $this->input->post('id_genre_old');
            $nb_repetitions_old = $this->input->post('nb_repetitions_old');
            $nb_seances_old = $this->input->post('nb_seances_old');

            $this->model_sport->update_entrainement_activite($id_type_entrainement_new, $id_activite_sportif_new, $id_genre_new, $nb_repetitions_new, $nb_seances_new, $id_type_entrainement_old, $id_activite_sportif_old, $id_genre_old, $nb_repetitions_old, $nb_seances_old);
        }

        public function traitement_insertion_activite()
        {
            $this->load->model('model_sport');
            $id_type_entrainement = $this->input->post('id_type_entrainement');
            $id_activite_sportif = $this->input->post('id_activite_sportif');
            $id_genre = $this->input->post('id_genre');
            $nb_repetitions = $this->input->post('nb_repetitions');
            $nb_seances = $this->input->post('nb_seances');

            $this->model_sport->insert_entrainement_activite($id_type_entrainement, $id_activite_sportif, $id_genre, $nb_repetitions, $nb_seances);

            $dataliste['title'] = "Liste des objets du client";
            // $dataliste['title'] = $iduseractuel;

            $dataliste['pages'] = "accueil-client";

            $this->load->view('pages-template-client', $dataliste);
        }

        public function deconnexion()
        {
            $this->session>session_destroy();
            redirect('controlleur_user/index');
        }

    }
?>
