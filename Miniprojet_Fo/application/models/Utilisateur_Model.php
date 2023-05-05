<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur_Model extends CI_Model {
    public function Log_Utilisateur($email, $mdp){
        $query = $this->db->query("SELECT * FROM utilisateur WHERE email = '$email' AND mdp = '$mdp'");
        return $query->num_rows();
    }
    public function get_user($email){
        $query = $this->db->query("SELECT * FROM utilisateur WHERE email = '$email'");
        return $query->result_array();
    }
}