<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministrateurController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}		

	public function Login(){
		$this->load->model('Administrateur_Model');
		$pseudo = $this->input->post('pseudo');
		$mdp = $this->input->post('mdp');
		$chck_log = $this->Administrateur_Model->Log_Administrateur($pseudo, $mdp);
		if($chck_log == 0){
            $data['err'] = 1;
			$this->load->view('index', $data);
		}else{
            $admin = $this->Administrateur_Model->get_administrateur($email);
            foreach($admin as $a){
                $_SESSION['id_admin'] = $a['id'];
            }
            $this->load->view('');
        }
	}
}
