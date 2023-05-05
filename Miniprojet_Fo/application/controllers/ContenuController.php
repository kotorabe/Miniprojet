<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContenuController extends CI_Controller {
    public function Landing(){
        $this->load->model('Contenu_Model');
        $data['liste'] = $this->Contenu_Model->Liste_Contenu();
        $this->load->view('landing', $data);
    }
    public function Triage(){
        $this->load->model('Contenu_Model');
        $type = $this->input->get('id_type');
        $data['liste'] = $this->Contenu_Model->Tri_Contenu($type);
        $this->load->view('landing', $data);
    }
}