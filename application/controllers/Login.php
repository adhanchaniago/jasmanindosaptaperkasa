<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index() {
		
//		$name = $this->session->userdata('name');
//		if ($name == FALSE) {	

		// Validasi
		$valid 		= $this->form_validation;
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');	
		if($valid->run()) {
			$this->user_login->login($username,$password,base_url('home'), base_url('signin'));
		}
		
		$data = array ('title' => 'Login');
		$this->load->view('users/login_view',$data);
		
		}/*}else{
			
			redirect(base_url('home'));			
			}*/	
	

	public function logout() {
		$this->auth_login->logout();
	}	
}