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
    public function New_Contenu($nom, $detail, $date_sortie, $id_type){
        $query = $this->db->query("INSERT INTO contenu(nom, detail, date_sortie, id_dtype) VALUES('$nom', '$detail', '$date_sortie', '$id_type')");
        return $query;
    }
    public function Update_Contenu($nom, $detail, $date_sortie, $id_type, $id_contenu){
        $query = $this->db->query("UPDATE contenu SET(nom = '$nom', detail = '$detail', date_sortie = '$date_sortie', id_dtype = '$id_type') WHERE id='$id_contenu'");
        return $query;
    }
    public function Check_doublon($nom){
        $query = $this->db->query("SELECT * FROM contenu WHERE nom ='$nom'");
        return $query->num_rows();
    }
}