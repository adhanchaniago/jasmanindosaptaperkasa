<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Downloads
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends CI_Controller {
	
	// Main Page Downloads
	public function index() {

		$site  	   = $this->mConfig->list_config();
		$downloads = $this->mDownloads->listDownloads();
		
		$data = array(	'title'		=> 'List Downloads - '.$site['nameweb'],
						'downloads'	=> $downloads,
						'isi'		=> 'admin/downloads/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Upload File
	public function upload() {
		
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('file_name','File Name','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/file/';
			$config['allowed_types'] 	= 'gif|jpg|png|pdf|rar|zip';
			$config['max_size']			= '100000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('file')) {
				
		$data = array(	'title'			=> 'Upload File - '.$site['nameweb'],
						'site'			=> $site,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/downloads/upload');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['source_file'] 	= './assets/upload/file/'.$upload_data['uploads']['file_name']; 

				$i = $this->input;
				$slugDownload = url_title($this->input->post('file_name'), 'dash', TRUE);
				$data = array(	'slug_download'	=> $slugDownload,
								'user_id'		=> $this->session->userdata('id'),
								'file_name'		=> $i->post('file_name'),								
								'date_upload'	=> $i->post('date_upload'),								
								'status'		=> $i->post('status'),								
								'file_description'	=> $i->post('file_description'),								
								'file'			=> $upload_data['uploads']['file_name']
				 			 );

				$this->mDownloads->createDownload($data);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/downloads/'));
		}}
		// Default page
		$data = array(	'title'		=> 'Upload - '.$site['nameweb'],
						'site'		=> $site,
						'isi'		=> 'admin/downloads/upload');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Edit File
	public function edit($download_id) {

		$download	 = $this->mDownloads->detailDownload($download_id);
		$endDownload = $this->mDownloads->endDownload();			
		$site		 = $this->mConfig->list_config();			

		// Validation
		$v = $this->form_validation;
		$v->set_rules('file_name','File Name','required');
		
		if($v->run()) {
			if(!empty($_FILES['file']['name'])) {
			$config['upload_path'] 		= './assets/upload/file/';
			$config['allowed_types'] 	= 'gif|jpg|png|pdf|rar|zip';
			$config['max_size']			= '10000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('file')) {
		
		$data = array(	'title'		=> 'Edit File - '.$download['file_name'],
						'download'	=> $download,
						'site'		=> $site,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/downloads/edit');
		$this->load->view('admin/layout/wrapper', $data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['source_image'] 	= './assets/upload/file/'.$upload_data['uploads']['file_name']; 
				
			$i = $this->input;

			unlink('./assets/upload/file/'.$download['file']);

			$slugDownload = $endDownload['download_id'].'-'.url_title($i->post('file_name'),'dash', TRUE);
			$data = array(	'download_id'	=> $download['download_id'],
							'slug_download'	=> $slugDownload,
							'user_id'		=> $this->session->userdata('id'),
							'file_name'		=> $i->post('file_name'),
							'date_upload'	=> $i->post('date_upload'),								
							'status'		=> $i->post('status'),								
							'file_description'	=> $i->post('file_description'),								
							'file'			=> $upload_data['uploads']['file_name']
						 );
			$this->mDownloads->editDownload($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/downloads'));
		}}else{
			$i = $this->input;
			$slugDownload = $endDownload['download_id'].'-'.url_title($i->post('file_name'),'dash', TRUE);
			$data = array(	'download_id'	=> $download['download_id'],
							'slug_download'	=> $slugDownload,
							'user_id'		=> $this->session->userdata('id'),
							'file_name'		=> $i->post('file_name'),
							'date_upload'	=> $i->post('date_upload'),								
							'status'		=> $i->post('status'),								
							'file_description'	=> $i->post('file_description'),								
						 );
			$this->mDownloads->editDownload($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/downloads'));	
		}}

		$data = array(	'title'		=> 'Edit File - '.$download['file_name'],
						'download'	=> $download,
						'site'		=> $site,
						'isi'		=> 'admin/downloads/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Delete Download
	public function delete($download_id) {
		$data = array('download_id'	=> $download_id);
		$this->mDownloads->deleteDownload($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/downloads'));
	}

}