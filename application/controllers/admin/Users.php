<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	// Main Page Users
	public function index() {
		
		$user	= $this->list_model->list_users();
		$site	= $this->list_model->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required');
		$valid->set_rules('email','Email','required');
		$valid->set_rules('password','Password','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Manajemen Users - '.$site['nameweb'],
						'user'	=> $user,
						'isi'	=> 'admin/user/list');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;
			if($i->post('password') == true) {

			$slug = url_title($this->input->post('username'), 'dash', TRUE);
			$data = array(	'slug'		=> $slug,
							'f_name'	=> $i->post('f_name'),
							'l_name'	=> $i->post('l_name'),				
							'username'	=> $i->post('username'),
							'email'		=> $i->post('email'),
							'zip_code'	=> $i->post('zip_code'),
							'birthdate_m'=> $i->post('birthdate_m'),
							'birthdate_d'=> $i->post('birthdate_d'),
							'birthdate_y'=> $i->post('birthdate_y'),
						);
			}

			$slug = url_title($this->input->post('username'), 'dash', TRUE);
			$data = array(	'slug'		=> $slug,
							'f_name'	=> $i->post('f_name'),
							'l_name'	=> $i->post('l_name'),				
							'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),
							'email'		=> $i->post('email'),
							'zip_code'	=> $i->post('zip_code'),
							'birthdate_m'=> $i->post('birthdate_m'),
							'birthdate_d'=> $i->post('birthdate_d'),
							'birthdate_y'=> $i->post('birthdate_y'),
						);
			$this->create_model->create_users($data);		
			$this->session->set_flashdata('sukses','User telah ditambah');
			redirect(base_url('admin/user'));
		}
	}

	// Is User Admins
	public function admin() {
		
		$admin	= $this->mAdmins->listAdmins();
		$site	= $this->mConfig->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required');
		$valid->set_rules('email','Email','required');
		$valid->set_rules('password','Password','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Management Admins - '.$site['nameweb'],
						'admin'	=> $admin,
						'isi'	=> 'admin/user/admin');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;

			$slug = url_title($this->input->post('username'), 'dash', TRUE);
			$data = array(	'slug_admin'=> $slug,
							'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),
							'email'		=> $i->post('email'),
						);
			$this->mAdmins->createAdmin($data);		
			$this->session->set_flashdata('sukses','Admin telah ditambah');
			redirect(base_url('admin/users/admin'));
		}
	}	
	
	// Create User
	public function create_user() {
		
		$user	= $this->list_model->list_users();
		$site	= $this->list_model->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required');
		$valid->set_rules('email','Email','required');
		$valid->set_rules('password','Password','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Create User - '.$site['nameweb'],
						'user'	=> $user,
						'isi'	=> 'admin/user/create_user');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;
			$slug = url_title($this->input->post('username'), 'dash', TRUE);
			$data = array(	'slug_user'	=> $slug,
							'fname'		=> $i->post('fname'),
							'lname'		=> $i->post('lname'),				
							'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),
							'email'		=> $i->post('email'),
							'phone'		=> $i->post('phone'),
							'address'	=> $i->post('address'),
							'gender'	=> $i->post('gender'),
							'status'	=> 1,
							'active'	=> 1,
						);
			$this->create_model->create_users($data);		
			$this->session->set_flashdata('sukses','User telah ditambah');
			redirect(base_url('admin/users'));
		}
	}

	// Edit User
	public function edit_user($user_id) {
		
		$user	= $this->detail_model->detail_user($user_id);
		$site	= $this->list_model->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required');
		$valid->set_rules('email','Email','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Manajemen Users - '.$site['nameweb'],
						'user'	=> $user,
						'isi'	=> 'admin/user/edit');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;
			if($i->post('password') == true) {
			
			$slug = url_title($this->input->post('username'), 'dash', TRUE);
			$data = array(	'user_id'	=> $user['user_id'],
							'slug_user'	=> $slug,
							'fname'		=> $i->post('fname'),
							'lname'		=> $i->post('lname'),				
							'username'	=> $i->post('username'),
							'email'		=> $i->post('email'),
							'phone'		=> $i->post('phone'),
							'address'	=> $i->post('address'),
							'gender'	=> $i->post('gender'),
						);
			}

			$slug = url_title($this->input->post('username'), 'dash', TRUE);
			$data = array(	'user_id'	=> $user['user_id'],
							'slug_user'	=> $slug,
							'fname'		=> $i->post('fname'),
							'lname'		=> $i->post('lname'),				
							'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),
							'email'		=> $i->post('email'),
							'phone'		=> $i->post('phone'),
							'address'	=> $i->post('address'),
							'gender'	=> $i->post('gender'),
						);
			$this->edit_model->edit_user($data);		
			$this->session->set_flashdata('sukses','User berhasil diupdate');
			redirect(base_url('admin/users'));
		}
	}

	// Edit User Admin
	public function edit_admin($admin_id) {
		
		$admin	= $this->mAdmins->detailAdmin($admin_id);
		$site	= $this->mConfig->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('email','Email','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Edit Admin - '.$admin['username'],
						'admin'	=> $admin,
						'isi'	=> 'admin/user/edit_admin');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;
			if($i->post('password') == true) {
			
			//$slug = url_title($this->input->post('username'), 'dash', TRUE);
			$data = array(	'admin_id'	=> $admin['admin_id'],
							//'slug_admin'=> $slug,			
							//'username'	=> $i->post('username'),
							'email'		=> $i->post('email'),
						);
			}

			//$slug = url_title($this->input->post('username'), 'dash', TRUE);
			$data = array(	'admin_id'	=> $admin['admin_id'],
							//'slug_admin'=> $slug,		
							//'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),
							'email'		=> $i->post('email'),
						);
			$this->mAdmins->editAdmin($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/users/admin'));
		}
	}	
	
	// Delete User
	public function delete_user($user_id) {
		$data = array('user_id'	=> $user_id);
		$this->delete_model->delete_users($data);		
		$this->session->set_flashdata('sukses','User telah dihapus');
		redirect(base_url('admin/users'));
	}

	// Delete Admin
	public function delete_admin($admin_id) {
		$data = array('admin_id' => $admin_id);
		$this->mAdmins->deleteAdmin($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/users/admin'));
	}	
}