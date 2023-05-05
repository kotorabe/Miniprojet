<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenu_Model extends CI_Model {
    public function Liste_Contenu(){
        $query = $this->db->query("SELECT * FROM contenu ORDER BY date_publication desc");
        return $query->result_array();
    }
    public function Tri_Contenu($type){
        $query = $this->db->query("SELECT * FROM contenu WHERE id_type = $type ORDER BY date_publication desc");
        return $query->result_array();
    }
}