<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_code_argent extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_generalise');
    }

    public function valider_code($idcode, $iduser){
        // $tab = array();
        // $request = "Update code_status set status = 20 where id_code = %s and id_utilisateur = %s";
        $data = [
            'status' => '20',
        ];
        $this->db->where('id_code', $idcode);
        $this->db->where('id_utilisateur', $iduser);
        $this->db->update('code_status', $data);
        
        // return $this->db->affected_rows();
    }

    public function demander_code__($idcode, $iduser)
    {
        // $request = "Insert into code_status values (%s, %s, %s)";
        // $request = sprintf($request, $idcode, $iduser, 1);
        // $query = $this->db->select('*')->from('code_status')->where('id_code', $idcode)->get();
        // $test_raha_efa = $query->result();

        $test_raha_efa = $this->model_generalise->find_by_request("SELECT * from code_status where id_code = $idcode");

        if(count($test_raha_efa) > 0) {
            throw new Exception ("Code deja utilise");
        }

        $data = [
            'id_code' => $idcode,
            'id_utilisateur' => $iduser,
            'status' => 1
        ];
        $this->db->insert('code_status', $data);
    
    }

    public function demander_code($code, $iduser)
    {
        $code_demande = $this->model_generalise->find_by_request("SELECT * from code where code = '$code'");
        if(count($code_demande) > 0) {
            $id_code =$code_demande[0]["id_code"];
            $this->demander_code__($id_code, $iduser);
        }
        else {
            throw new Exception("Invalide code");
        }
    }

}

?>