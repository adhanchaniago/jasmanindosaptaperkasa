<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Profil(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
	
	// Main Page Profile
	public function index() {

		$site  		= $this->mConfig->list_config();
		$gallery    = $this->mGalleries->listGalleryPubProfile();
		$blogs		= $this->mBlogs->listBlogsPub();
		$pekerjaan		= $this->mPekerjaan->listPekerjaan();
		
		$data = array(	'title'		=> 'Project - '.$site['nameweb'],
						'site'		=> $site,
						'gallery'	=> $gallery,
						'blogs'		=> $blogs,
						'pekerjaan'		=> $pekerjaan,
						'isi'		=> 'front/project/list');
		$this->load->view('front/layout/wrapper',$data);
	}

	// List Clients
	public function klien() {

		$site  		= $this->mConfig->list_config();
		$blogs 		= $this->mBlogs->listLastBlogsPub();
		$gallery    = $this->mGalleries->listGalleryPubProfile();		
		$clients	= $this->mClients->listClients();
		
		$data = array(	'title'		=> 'Daftar Klien - '.$site['nameweb'],
						'site'		=> $site,
						'clients'	=> $clients,
						'gallery'	=> $gallery,
						'blogs'		=> $blogs,
						'isi'		=> 'front/project/klien');
		$this->load->view('front/layout/wrapper',$data);
	}

	// List Price
	public function harga() {

		$site  		= $this->mConfig->list_config();
		$blogs 		= $this->mBlogs->listBlogsPub();
		$gallery    = $this->mGalleries->listGalleryPubPekerjaan();				

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'project/harga/';
		$config['total_rows'] 		= count($this->mPrice->totalPrice());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 10;
		$config['first_url'] 		= base_url().'project/harga/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$price 		= $this->mPrice->perPagePrice($config['per_page'], $page);
		// End Pagination				
		
		$data = array(	'title'		=> 'Daftar Harga - '.$site['nameweb'],
						'site'		=> $site,
						'price'		=> $price,
						'blogs'		=> $blogs,
						'gallery'	=> $gallery,
						'pagin' 	=> $this->pagination->create_links(),																		
						'isi'		=> 'front/project/harga');
		$this->load->view('front/layout/wrapper',$data);
	}
	
// List Prioject
	public function pekerjaan() {

		$site  		= $this->mConfig->list_config();
		$blogs 		= $this->mBlogs->listBlogsPub();
		$gallery    = $this->mGalleries->listGalleryPubPekerjaan();	
		$this->load->model('Pekerjaan_model');
		$pekerjaan = $this->Pekerjaan_model->listPekerjaan();
		

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'project/pekerjaan/';
		$config['total_rows'] 		= count($this->mPrice->totalPrice());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 10;
		$config['first_url'] 		= base_url().'project/pekerjaan/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$price 		= $this->mPrice->perPagePrice($config['per_page'], $page);
		// End Pagination				
		
		$data = array(	'title'		=> 'Daftar Pekerjaan - '.$site['nameweb'],
						'site'		=> $site,
						'price'		=> $price,
						'blogs'		=> $blogs,
						'gallery'	=> $gallery,
						'pekerjaan'	=> $pekerjaan,
						'pagin' 	=> $this->pagination->create_links(),																		
						'isi'		=> 'front/project/pekerjaan');
		$this->load->view('front/layout/wrapper',$data);
	}		
	
}