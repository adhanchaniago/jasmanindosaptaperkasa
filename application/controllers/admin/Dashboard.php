<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	// Main Page
	public function index() {
		$site = $this->mConfig->list_config();
		$data = array(	'title'		=> 'Dashboard - '.$site['nameweb'],
						'admins'	=> $this->mStats->admins(),
						'blogs'		=> $this->mStats->blogs(),
						'products'	=> $this->mStats->products(),
						'clients'	=> $this->mStats->clients(),
						'galleries'	=> $this->mStats->galleries(),
						'downloads'	=> $this->mStats->downloads(), 	
						'contacts'	=> $this->mStats->contacts(), 	
						'isi'		=> 'admin/dashboard/list');
		$this->load->view('admin/layout/wrapper',$data);
	}
		
	// General Config
	public function config() {
		$site = $this->mConfig->list_config();
		
		// Validasi 
		$this->form_validation->set_rules('nameweb','Nama website','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Settings - '. $site['nameweb'],
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/config');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'nameweb'	=> $i->post('nameweb'),
							'singkatanweb'	=> $i->post('singkatanweb'),
							'email'		=> $i->post('email'),
							'keywords'	=> $i->post('keywords'),
							'metatext'	=> $i->post('metatext'),
							'about'		=> $i->post('about'),
							'phone_number'=> $i->post('phone_number'),
							'fax'		=> $i->post('fax'),
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Konfigurasi telah diupdate');
			redirect(base_url('admin/dashboard/config'));
		}
	}

	// Config Social
	public function social() {

			$site = $this->mConfig->list_config();

			$this->form_validation->set_rules('instagram','Account Instagram','required');

			if($this->form_validation->run() === FALSE) {

			$data = array(	'title'	=> 'Social Campaign - '. $site['nameweb'],
							'site'	=> $site,
							'isi'	=> 'admin/dashboard/social');
			$this->load->view('admin/layout/wrapper',$data);
			
			}else{
			
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'facebook'	=> $i->post('facebook'),
							'twitter'	=> $i->post('twitter'),
							'google_plus'=> $i->post('google_plus'),
							'instagram'	=> $i->post('instagram'),
							'pinterest'	=> $i->post('pinterest')
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Configuration has updated');
			redirect(base_url('admin/dashboard/social'));
		}
	}

	// Config Locations
	public function locations() {

			$site = $this->mConfig->list_config();

			$this->form_validation->set_rules('google_maps','Google Maps Frame','required');

			if($this->form_validation->run() === FALSE) {

			$data = array(	'title'	=> 'Locations - '. $site['nameweb'],
							'site'	=> $site,
							'isi'	=> 'admin/dashboard/locations');
			$this->load->view('admin/layout/wrapper',$data);
			
			}else{
			
			$i = $this->input;
			$data = array(	'config_id'	=> $i->post('config_id'),
							'google_maps'=> $i->post('google_maps'),
						);
			$this->mConfig->edit_config($data);
			$this->session->set_flashdata('sukses','Configuration has updated');
			redirect(base_url('admin/dashboard/locations'));
		}
	}		
	
	// Config Logo
	public function logo() {
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('config_id','ID Config','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('logo')) {
				
		$data = array(	'title'	=> 'Config Logo',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dashboard/logo');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 166; // Pixel
				$config['height'] 			= 120; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['logo']);
				unlink('./assets/upload/image/thumbs/'.$site['logo']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'logo'			=> $upload_data['uploads']['file_name']
							);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/logo'));
		}}
		// Default page
		$data = array(	'title'	=> 'Config Logo',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/logo');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Config Icon
	public function icon() {
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('config_id','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
		$data = array(	'title'	=> 'Config Icon',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/icon');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['icon']);
				unlink('./assets/upload/image/thumbs/'.$site['icon']);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'config_id'		=> $i->post('config_id'),
								'icon'			=> $upload_data['uploads']['file_name']
								);
				$this->mConfig->edit_config($data);
				$this->session->set_flashdata('sukses','Konfigurasi Telah Diupdate');
				redirect(base_url('admin/dashboard/icon'));
		}}
		// Default page
		$data = array(	'title'	=> 'Config Icon',
						'site'	=> $site,
						'isi'	=> 'admin/dashboard/icon');
		$this->load->view('admin/layout/wrapper',$data);
	}
		
}