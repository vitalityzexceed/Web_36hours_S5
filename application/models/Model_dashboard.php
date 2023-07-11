<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_generalise');
    }

    public function getWeightGainUserStatistics($year)
    {
        $this->db->select('MONTH(date_achat) AS month, COUNT(*) AS count');
        $this->db->from('stat_achat');
        $this->db->where('id_objectif', 1);
        $this->db->where('YEAR(date_achat)', $year);
        $this->db->group_by('MONTH(date_achat)');
        $query = $this->db->get();
        return $query->result();
    }

    public function getWeightLossUserStatistics($year)
    {
        $this->db->select('MONTH(date_achat) AS month, COUNT(*) AS count');
        $this->db->from('stat_achat');
        $this->db->where('id_objectif', 2);
        $this->db->where('YEAR(date_achat)', $year);
        $this->db->group_by('MONTH(date_achat)');
        $query = $this->db->get();
        return $query->result();
    }

    public function getIMCUserStatistics($year)
    {
        $this->db->select('MONTH(date_achat) AS month, COUNT(*) AS count');
        $this->db->from('stat_achat');
        $this->db->where('id_objectif', 0);
        $this->db->where('YEAR(date_achat)', $year);
        $this->db->group_by('MONTH(date_achat)');
        $query = $this->db->get();
        return $query->result();
    }
}

?>