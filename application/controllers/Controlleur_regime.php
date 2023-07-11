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
        
    // public function vers_ajout_regime()
    // {
    //     $this->load->model('model_generalise');
    //     $dataliste['listeelements'] = $this->model_generalise->find_all("Element");
    //     $dataliste['title'] = "Ajout nouveau regime";
    //     $dataliste['pages'] = "AddRegime";

    //     $this->load->view('pages-template-admin', $dataliste);
    // }

    public function traitement_ajout_regime()
    {
        $this->load->model('model_regime');
        $this->load->model('model_element');

        $this->load->model('model_generalise');
        $nom = $this->input->post('nom');
        
        $last_regime = $this->model_regime->insert_new_regime($nom);

        $elements = $this->input->post('elementstoinclude');

        if (!empty($elements)) 
        {
            foreach ($elements as $element) 
            {
                $this->model_regime->add_element_regime($last_regime->id_regime, $element);
            }
        }

        $dataliste['listeregimes'] = $this->model_generalise->find_all("regime");
        foreach ($dataliste['listeregimes'] as &$regime) 
        {
            $regime['elements'] = $this->model_regime->get_elements_by_id_regime($regime['id_regime']);
        }
        $dataliste['title'] = "Liste des regimes";
        $dataliste['pages'] = "ListeRegime";

        $this->load->view('pages-template-admin', $dataliste);
    }

    public function vers_modif_regime()
    {
        $this->load->model('model_regime');

        $idregime = $this->input->get('idregime');
        // echo $idregime;
        $dataliste['regime'] = $this->model_regime->get_regime_by_id($idregime);
        $dataliste['elements'] = $this->model_regime->get_elements_by_id_regime($idregime);

        $dataliste['title'] = "Modification du regime";
        $dataliste['pages'] = "ModifRegime";

        $this->load->view('pages-template-admin', $dataliste);
    }

    public function traitement_modif_regime()
    {
        $this->load->model('model_regime');

        $idregime = $this->input->post('id_regime');
        $nouveaunom = $this->input->post('nom');

        $elements = $this->input->post('elementstoexclude');

        $this->model_regime->update_regime($idregime, $nouveaunom);
        $erreur = "";
        if (!empty($elements)) 
        {
            foreach ($elements as $element) 
            {
                echo $idregime;
                echo $element;
                try {
                    $this->model_regime->delete_element_regime($idregime, $element);
                } catch (Exception $e) {
                    echo "Erreur : " . $e->getMessage();
                    $erreur = "".$e->getMessage();
                }
            }
        }

        $dataliste['regime'] = $this->model_regime->get_regime_by_id($idregime);
        $dataliste['elements'] = $this->model_regime->get_elements_by_id_regime($idregime);
        // $dataliste['erreur'] = $erreur;
        $dataliste['title'] = "Modification du regime";
        $dataliste['pages'] = "ModifRegime";

        $this->load->view('pages-template-admin', $dataliste);

    }

    public function deconnexion()
    {
        $this->session>session_destroy();
        redirect('controlleur_user/index');
    }
}
?>
