<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_regime extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_generalise');
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
            'nom_regime' => $nom,
        ];

        $this->db->where('id_regime', $idregime);
        $this->db->update('regime', $new_data);

    }

    public function insert_new_regime($nom)
    {
        $data = [
            'nom_regime' => $nom,
        ];
        $this->db->insert('regime', $data);

        $lastquery = $this->db->order_by('id_regime', 'DESC')->limit(1)->get('regime');
        $lastrecord = $lastquery->row();
        return $lastrecord;
    }

    public function change_element_regime($idregime, $idelement)
    {
        // $request = "Insert into code_status values (%s, %s, %s)";
        // $request = sprintf($request, $idcode, $iduser, 1);
        $new_data = [
            'id_regime' => $idregime,
            'id_element' => $idelement,
        ];
        try {
            $this->db->where('id_regime', $idregime);
            $this->db->where('id_element', $idelement);
            $this->db->update('regime_element', $new_data);
        } catch (Exception $e) {
            throw $e;
        }
        
    }

    public function delete_element_regime($idregime, $idelement)
    {
        // $request = "Insert into code_status values (%s, %s, %s)";
        // $request = sprintf($request, $idcode, $iduser, 1);
        $new_data = [
            'id_regime' => $idregime,
            'id_element' => $idelement,
        ];
        try {
            $this->db->where('id_regime', $idregime);
            $this->db->where('id_element', $idelement);
            $this->db->delete('regime_element', $new_data);
        } catch (Exception $e) {
            throw $e;
        }
        
    }

    public function add_element_regime($idregime, $idelement)
    {
        $data = [
            'id_regime' => $idregime,
            'id_element' => $idelement,
        ];

        $this->db->insert('regime_element', $data);
    }

    public function get_regime_by_id($id_regime)
    {
        $this->db->select('*');
        $this->db->from('regime');
        $this->db->where('id_regime', $id_regime);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function get_elements_by_id_regime($id_regime)
    {
        $this->db->select('id_element, nom_element, prix_element');
        $this->db->from('v_regime');
        $this->db->where('id_regime', $id_regime);
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function show_regime_and_elements()
    {
        return $this->model_generalise->find_all("v_regime");;
    }
    
}

?>