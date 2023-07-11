<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlleur_user extends CI_Controller {

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

    public function test() {
        echo "Test";
    }
	
	public function index()
	{
        $data['title'] = "Index";
        $data['pages'] = "index";

		$this->load->view('form-template', $data);
	}

	public function vers_login_admin()
	{
        // echo $this->session->idutilisateur;
        // echo "huhuhuhu";
        $data['pages'] = "sign-in-admin";
        $data['title'] = "Login admin";
		$this->load->view('form-template', $data);
    }

    public function vers_login_client()
	{
        $data['pages'] = "sign-in-client";
        $data['title'] = "Login client";
        $data['session'] = $this->session->userdata('idutilisateur');

		$this->load->view('form-template', $data);
    }

    public function vers_inscription_client()
	{
        $data['pages'] = "sign-up-client";
        $data['title'] = "Inscription client";
		$this->load->view('form-template', $data);
    }

    public function traitement_inscription_client()
	{
        $this->load->model('model_user');

		$nom = $this->input->post('nom');
		$mail = $this->input->post('mail');
		$mdp = $this->input->post('pswd');

		if (($nom != null) && ($mail != null) && ($mdp != null))
		{
			$this->model_user->inscription($nom, $mail, $mdp);
			 
                //$dataliste['listeobjets'] = $this->model_user->getlistemesobjet();
                $datalien['title'] = "Login client";
                $datalien['pages'] = "sign-in-client";

		        $this->load->view('form-template', $datalien);
			
		}
		elseif ((!isset($nom))||(!isset($mail))||(!isset($mdp))) 
		{
			echo "Misy valeur null";
		}
    }

    public function traitement_connexion_client()
	{	
		$this->load->model('model_user');

		$nom = $this->input->post('nom');
		$mdp = $this->input->post('pswd');


		if (($nom != null) && ($mdp != null))
		{
            if (($this->model_user->verify_Login($nom, $mdp)=="not_found")) 
            {
                redirect('controlleur_user/vers_login_client');
            }
            $this->session->set_userdata('idutilisateur', ''.$this->model_user->verify_Login($nom, $mdp));
        
            $dataliste['title'] = "Liste des objets du client";
            // $dataliste['title'] = $iduseractuel;
            // $dataliste['session'] = $this->session->userdata('idutilisateur');
            $dataliste['pages'] = "accueil-client";

            $this->load->view('pages-template-client', $dataliste);
		}
		// elseif ((!isset($nom))||(!isset($mail))||(!isset($mdp))) 
		// {
		// 	echo "Misy valeur null";
		// }
		elseif ((!isset($nom))||(!isset($mdp))) 
		{
			echo "Misy valeur null";
		}
	}

    public function traitement_connexion_admin()
	{	
		$this->load->model('model_user');

		$nom = $this->input->post('nom');
		$mdp = $this->input->post('pswd');
        
		if (($nom != null) && ($mdp != null))
		{
			if(($this->model_user->verify_Login($nom, $mdp))!='not found')
			{   
                $this->session->set_userdata('idutilisateur', ''.$this->model_user->verify_Login($nom, $mdp));
                $dataliste['pages'] = "accueil-admin";

		        $this->load->view('pages-template-admin', $dataliste);
			}
			else
			{
				echo "Erreur";
			}
		}
		elseif ((!isset($nom))||(!isset($mdp))) 
		{
			echo "Misy valeur null";
		}
	}


    public function deconnexion()
    {
        $this->session->sess_destroy();
        session_destroy();
        $this->cache->clean();

        ob_clean();
        redirect('controlleur_user/index');
    }

}
?>
