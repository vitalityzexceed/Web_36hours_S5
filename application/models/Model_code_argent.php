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

    public function demander_code($idcode, $iduser)
    {
        // $request = "Insert into code_status values (%s, %s, %s)";
        // $request = sprintf($request, $idcode, $iduser, 1);
        $query = $this->db->select('*')->from('code_status')->where('id_code', $idcode)->get();
        $test_raha_efa = $query->result();

        if ($test_raha_efa[0]->status == 20) 
        {
            return "Code efa niasa";
        }

        $data = [
            'id_code' => $idcode,
            'id_utilisateur' => $iduser,
            'status' => 1
        ];
        $this->db->insert('code_status', $data);
    
    }

}

?>