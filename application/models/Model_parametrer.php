<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_parametrer extends CI_Model
{
    public function ajouter_parametre($poids1, $poids2, $taille1, $taille2, $id_objectif, $id_genre, $id_type_entrainement, $id_regime, $estimation)
    {
        $data = [
            'poids1' => $poids1,
            'poids2' => $poids2,
            'taille1' => $taille1,
            'taille2' => $taille2,
            'id_objectif' => $id_objectif,
            'id_genre' => $id_genre,
            'id_type_entrainement' => $id_type_entrainement,
            'id_regime' => $id_regime,
            'estimation' => $estimation
        ];

        $this->db->insert('parametre_entrainement', $data);
    }
}


?>