<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_element extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_generalise');
    }

    public function delete_element($idelement)
    {
        $this->db->where('$id_element', $idelement);
        $this->db->delete('element');

        $this->db->where('$id_element', $idelement);
        $this->db->delete('regime_element');
        
    }

    public function update_element($idelement, $nom, $prix)
    {
        $new_data = [
            'nom_element' => $nom,
            'prix_element' => $prix,
        ];

        $this->db->where('$id_element', $idelement);
        $this->db->update('element', $new_data);
    }

    public function insert_new_element($nom, $prix)
    {
        $data = [
            'nom_element' => $nom,
            'prix_element' => $prix,
        ];
        $this->db->insert('element', $data);
    }

    
}

?>