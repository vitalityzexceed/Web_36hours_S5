<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_sport extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_generalise');
    }

    public function delete_sport($idelement)
    {
        $this->db->where('$id_element', $idelement);
        $this->db->delete('element');
    }

    public function update_activite($nom, $id)
    {
        $new_data = [
            'nom_activite' => $nom,
        ];

        $this->db->where('$id_activite_sportif', $id);
        $this->db->update('activite_sportif', $new_data);
    }

    public function insert_new_activite($nom)
    {
        $data = [
            'nom' => $nom,
        ];
        $this->db->insert('activite_sportif', $data);
    }

    public function insert_entrainement_activite($id_type_entrainement, $id_activite_sportif, $id_genre, $nb_repetitions, $nb_seances)
    {
        $data = [
            'id_type_entrainement' => $id_type_entrainement,
            'id_activite_sportif' => $id_activite_sportif,
            'id_genre' => $id_genre,
            'nb_repetitions' => $nb_repetitions,
            'nb_seances' => $nb_seances
        ];
        $this->db->insert('Entrainement_activite', $data);

    }

    public function update_entrainement_activite($id_type_entrainement_new, $id_activite_sportif_new, $id_genre_new, $nb_repetitions_new, $nb_seances_new, $id_type_entrainement_old, $id_activite_sportif_old, $id_genre_old, $nb_repetitions_old, $nb_seances_old)
    {
        $new_data = [
            'id_type_entrainement' => $id_type_entrainement_new,
            'id_activite_sportif' => $id_activite_sportif_new,
            'id_genre' => $id_genre_new,
            'nb_repetitions' => $nb_repetitions_new,
            'nb_seances' => $nb_seances_new
        ];

        $this->db->where('$id_type_entrainement', $id_type_entrainement_old);
        $this->db->where('$id_activite_sportif', $id_activite_sportif_old);
        $this->db->where('$id_genre', $id_genre_old);
        $this->db->where('$nb_repetitions', $nb_repetitions_old);
        $this->db->where('$nb_seances', $nb_seances_old);
        $this->db->update('Entrainement_activite', $new_data);
    }

    

}

?>