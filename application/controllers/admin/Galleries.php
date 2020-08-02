<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Galleries
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleries extends CI_Controller {
	
	// Main Page Products
	public function index() {

		$site      = $this->mConfig->list_config();
		$galleries = $this->mGalleries->listGalleries();
		
		$data = array(	'title'		=> 'Management Galleries - '.$site['nameweb'],
						'galleries'	=> $galleries,
						'site'		=> $site,
						'isi'		=> 'admin/galleries/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Create Gallery
	public function create() {
		
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('gallery_name','Gallery Name','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
				
		$data = array(	'title'			=> 'Create Gallery - '.$site['nameweb'],
						'site'			=> $site,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/galleries/create');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$slugGallery = url_title($this->input->post('gallery_name'), 'dash', TRUE);
				$data = array(	'slug_gallery'	=> $slugGallery,
								'user_id'		=> $this->session->userdata('id'),
								'gallery_name'	=> $i->post('gallery_name'),								
								'date'			=> $i->post('date'),								
								'status'		=> $i->post('status'),								
								'gallery_description' => $i->post('gallery_description'),								
								'position' 		=> $i->post('position'),								
								'image'			=> $upload_data['uploads']['file_name']
				 			 );
				$this->mGalleries->createGallery($data);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/galleries/'));
		}}
		// Default page
		$data = array(	'title'		=> 'Create Gallery - '.$site['nameweb'],
						'site'		=> $site,
						'isi'		=> 'admin/galleries/create');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Edit Gallery
	public function edit($gallery_id) {

		$gallery	= $this->mGalleries->detailGallery($gallery_id);
		$endGallery	= $this->mGalleries->endGallery();		

		// Validation
		$v = $this->form_validation;
		$v->set_rules('gallery_name','Gallery Name','required');
		
		if($v->run()) {
			if(!empty($_FILES['image']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
		
		$data = array(	'title'		=> 'Edit Gallery - '.$gallery['gallery_name'],
						'gallery'	=> $gallery,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/galleries/edit');
		$this->load->view('admin/layout/wrapper', $data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 200; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;

			unlink('./assets/upload/image/'.$gallery['image']);
			unlink('./assets/upload/image/thumbs/'.$gallery['image']);

			$slugGallery = $endGallery['gallery_id'].'-'.url_title($i->post('gallery_name'),'dash', TRUE);
			$data = array(	'gallery_id'	=> $gallery['gallery_id'],
							'slug_gallery'	=> $slugGallery,
							'user_id'		=> $this->session->userdata('id'),
							'gallery_name'	=> $i->post('gallery_name'),
							'gallery_description' => $i->post('gallery_description'),
							'date'			=> $i->post('date'),
							'position'		=> $i->post('position'),
							'status'		=> $i->post('status'),
							'image'			=> $upload_data['uploads']['file_name']
							);
			$this->mGalleries->editGallery($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/galleries'));
		}}else{
			$i = $this->input;
			$slugGallery = $endGallery['gallery_id'].'-'.url_title($i->post('gallery_name'),'dash', TRUE);
			$data = array(	'gallery_id'	=> $gallery['gallery_id'],
							'slug_gallery'	=> $slugGallery,
							'user_id'		=> $this->session->userdata('id'),
							'gallery_name'	=> $i->post('gallery_name'),
							'gallery_description' => $i->post('gallery_description'),
							'date'			=> $i->post('date'),
							'position'		=> $i->post('position'),
							'status'		=> $i->post('status'),
							);
			$this->mGalleries->editGallery($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/galleries'));			
		}}

		$data = array(	'title'		=> 'Edit Gallery - '.$gallery['gallery_name'],
						'gallery'	=> $gallery,
						'isi'		=> 'admin/galleries/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}	

	// Delete Gallery
	public function delete($gallery_id) {
		$data = array('gallery_id'	=> $gallery_id);
		$this->mGalleries->deleteGallery($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/galleries'));
	}	
}