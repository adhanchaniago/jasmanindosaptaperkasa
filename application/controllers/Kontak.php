<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Kontak(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {		

	// Main Page Kontak
	public function index() {
		
		$site  		= $this->mConfig->list_config();
		$gallery    = $this->mGalleries->listGalleryPubProfile();
		$blogs		= $this->mBlogs->listBlogsPub();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('name','Name','required');
		$valid->set_rules('email','Email','required');
		$valid->set_rules('subject','Subject','required');
		$valid->set_rules('messages','Messages','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Kontak Kami - '.$site['nameweb'],
						'site'	=> $site,
						'blogs'	=> $blogs,
						'gallery'=> $gallery,
						'isi'	=> 'front/kontak/list');
		$this->load->view('front/layout/wrapper',$data);
		}else{

			$i = $this->input;
			$data = array(	'name'		=> $i->post('name'),
							'email'		=> $i->post('email'),				
							'subject'	=> $i->post('subject'),
							'email'		=> $i->post('email'),
							'messages'	=> $i->post('messages'),
							'date'		=> $i->post('date'),
						);
			$this->mContacts->sendMessage($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('kontak'));
		}
	}	
}