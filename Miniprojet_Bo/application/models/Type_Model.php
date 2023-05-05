<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_Model extends CI_Model {
    public function Liste_Type(){
        $query = $this->db->query("SELECT * FROM type ORDER BY id asc");
        return $query->result_array();
    }
}