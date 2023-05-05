<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeController extends CI_Controller {
    public function Liste(){
        $this->load->model('Type_Model');
        $data['liste_type'] = $this->Type_Model->Liste_Type();
        $this->load->view('',$data);
    }
}