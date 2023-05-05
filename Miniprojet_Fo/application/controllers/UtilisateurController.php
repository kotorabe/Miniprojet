<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilisateurControlleur extends CI_Controller {

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
		$this->load->model('Utilisateur_Model');
		$email = $this->input->post('email');
		$mdp = $this->input->post('mdp');
		$chck_log = $this->Utilisateur_Model->Log_Utilisateur($email, $mdp);
		if($chck_log == 0){
            $data['err'] = 1;
			$this->load->view('index', $data);
		}else{
            $user = $this->Utilisateur_Model->get_user($email);
            foreach($user as $u){
                $_SESSION['id_user'] = $u['id'];
            }
            return redirect('ContenuController/Landing');
        }
	}
}
