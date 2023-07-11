<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_controller extends CI_Controller {

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
		$this->load->model('model_user');
        echo "Test";
		$nom = "Test";
		$mail = "Test";
		$mdp = "Test";
		$dateNaissance = "2001-10-10"; 
		$id_genre = 1;
		$taille = 10;
		$poids = 10;
		try {
			// $this->model_user->inscription($nom, $mail, $mdp, $dateNaissance, $id_genre, $taille, $poids);
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
		}
		

		// $propos_entrainement = $this->model_user->getNb_jour_entrainement(4, 1, 10);
		// echo $propos_entrainement["nb_jour"]." ".$propos_entrainement["estimation"]." ".$propos_entrainement["user"]["nom"];

		$all_entrainement= $this->model_user->getEntrainement_jour(4, 1, 10);
		$entrainement_jour = $all_entrainement["all_proposition"];
		// echo(count($entrainement_jour));
		foreach($entrainement_jour as $ent) {
			echo $ent["jour"]."Jour </br></br>";
			foreach($ent["entrainement"] as $ee) {
				echo $ee["nom_activite"]." nb reps ".$ee["nb_repetition"]." x ".$ee["nb_seances"]."</br></br>";
			}
			foreach($ent["regime"] as $ee) {
				echo $ee["nom_regime"]." regime ".$ee["nom_element"]."</br></br>";
			}
		}
		$prix_total = $all_entrainement["prix_total"];
		echo $prix_total; 
		
    }
	

    
    

}
?>
