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
    public function Insert_contenu(){
        $this->load->model('Contenu_Model');
        $nom = $this->input->post('nom');
        $detail = $this->input->post('detail');
        $date_sortie = $this->input->post('date_sortie');
        $id_type = $this->input->post('id_type');
        $check = $this->Contenu_Model->Check_doublon($nom);
        if($check == 0){
            $insert = $this->Contenu_Model->New_Contenu($nom, $detail, $date_sortie, $id_type);
            if($insert == true){
                return redirect('TypeController/Liste');
            }else{
                echo "<center><p>Une erreur est survenue!</p></center>";
            }
        }else{
            echo "<center><p>Nom deja utilise!</p></center>";
        }
    }
    public function Upt_contenu(){
        $this->load->model('Contenu_Model');
        $nom = $this->input->post('nom');
        $detail = $this->input->post('detail');
        $date_sortie = $this->input->post('date_sortie');
        $id_type = $this->input->post('id_type');
        $id_contenu= $this->input->post('id_continu');
        $check = $this->Contenu_Model->Check_doublon($nom);
        if($check == 0){
            $insert = $this->Contenu_Model->Update_Contenu($nom, $detail, $date_sortie, $id_type, $id_contenu);
            if($insert == true){
                return redirect('');
            }else{
                echo "<center><p>Une erreur est survenue!</p></center>";
            }
        }else{
            echo "<center><p>Nom deja utilise!</p></center>";
        }
    }
}