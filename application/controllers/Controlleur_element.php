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

    public function deconnexion()
    {
        $this->session>session_destroy();
        redirect('controlleur_user/index');
    }

}
?>
