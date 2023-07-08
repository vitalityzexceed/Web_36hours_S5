<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    
    public function verify_Login($nom, $mdp) {
        $val = 'not_found';
        $request = "SELECT * from utilisateur where (nom = %s or mail = %s) and motdepasse = (select sha1(%s))";
        $request = sprintf($request,$this->db->escape($nom), $this->db->escape($nom), $this->db->escape($mdp));
        $query = $this->db->query($request);
        $row = $query->row();
        if(isset($row)) {
            $val = $row->idutilisateur;
        }
    return $val;
    }

    public function inscription($nom, $mail, $mdp) {
        $request = "INSERT INTO utilisateur VALUES (NULL, %s, %s, %s, 0, now())";
        $request = sprintf($request, $this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp));
        $this->db->query($request);
    }

    public function inscription_admin($nom, $mail, $mdp) {
        $request = "INSERT INTO utilisateur VALUES (NULL, %s, %s, %s, 1, now())";
        $request = sprintf($request, $this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp));
        $this->db->query($request);
    }

 

   
}

?>