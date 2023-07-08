<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_generalise extends CI_Model
{
    
    

    public function find_all($nom_table){
        $tab = array();
        $request = "SELECT * from %s";
        $request = sprintf($request,$nom_table);
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    
    public function find_by_id($nom_table,$id){
        $tab = array();
        $request = "SELECT * from %s where id_%s = %s";
        $request = sprintf($request, $nom_table, $id );
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            array_push($tab, $row);
        }
    return $tab;
    }

    
   
}

?>