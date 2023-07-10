<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_regime extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_generalise');
    }

    public function remove_element_regime($idregime, $idelement)
    {
        $this->db->where('$id_regime', $idregime);
        $this->db->where('$id_element', $idelement);
        $this->db->delete('regime_element');
    }

    public function delete_regime($idregime)
    {
        $this->db->where('$id_regime', $idregime);
        $this->db->delete('regime');

        $this->db->where('$id_regime', $idregime);
        $this->db->delete('regime_element');

    }

    public function update_regime($idregime, $nom)
    {
        // $request = "Insert into code_status values (%s, %s, %s)";
        // $request = sprintf($request, $idcode, $iduser, 1);

        $test_regime_misy = $this->model_generalise->find_all("regime where id_regime=".$idregime);
        if (empty($test_regime_misy))
        {
            return "Tsy misy ilay idregime";
        }

        $new_data = [
            'nom' => $nom,
        ];

        $this->db->where('$id_regime', $idregime);
        $this->db->update('regime', $new_data);

    }

    public function insert_new_regime($nom)
    {
        $data = [
            'nom' => $nom,
        ];
        $this->db->insert('regime', $data);
    }

    public function change_element_regime($idregime, $idelement)
    {
        // $request = "Insert into code_status values (%s, %s, %s)";
        // $request = sprintf($request, $idcode, $iduser, 1);
        $new_data = [
            'id_regime' => $idregime,
            'id_element' => $idelement,
        ];
        
        $this->db->where('$id_regime', $idregime);
        $this->db->where('$id_element', $idelement);
        $this->db->update('regime', $new_data);
    }

    public function add_element_regime($idregime, $idelement)
    {
        $data = [
            'id_regime' => $idregime,
            'id_element' => $idelement,
        ];

        $this->db->insert('regime', $data);
    }

    public function show_regime_and_elements()
    {
        return $this->model_generalise->find_all("v_regime");;
    }
    
}

?>