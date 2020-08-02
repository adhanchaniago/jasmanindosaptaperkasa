<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Products
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	// Main Page Products
	public function index() {

		$site  	  = $this->mConfig->list_config();
		$products = $this->mProducts->listProducts();
		
		$data = array(	'title'		=> 'List Products - '.$site['nameweb'],
						'products'	=> $products,
						'isi'		=> 'admin/products/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Create Product
	public function create() {
		
		$site = $this->mConfig->list_config();
		
		$v = $this->form_validation;
		$v->set_rules('product_name','Product Name','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
				
		$data = array(	'title'			=> 'Create Product - '.$site['nameweb'],
						'site'			=> $site,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/products/create');
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
				$slugProduct = url_title($this->input->post('product_name'), 'dash', TRUE);
				$data = array(	'slug_product'	=> $slugProduct,
								'user_id'		=> $this->session->userdata('id'),
								'product_name'	=> $i->post('product_name'),								
								'date'			=> $i->post('date'),								
								'status'		=> $i->post('status'),								
								'product_description' => $i->post('product_description'),								
								'image'			=> $upload_data['uploads']['file_name']
				 			 );

				$this->mProducts->createProduct($data);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/products/'));
		}}
		// Default page
		$data = array(	'title'		=> 'Create Product - '.$site['nameweb'],
						'site'		=> $site,
						'isi'		=> 'admin/products/create');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Edit Product
	public function edit($product_id) {

		$product	= $this->mProducts->detailProduct($product_id);
		$endProduct	= $this->mProducts->endProduct();		

		// Validation
		$v = $this->form_validation;
		$v->set_rules('product_name','Product Name','required');
		
		if($v->run()) {
			if(!empty($_FILES['image']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
		
		$data = array(	'title'		=> 'Edit Product - '.$product['product_name'],
						'product'	=> $product,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/products/edit');
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

			unlink('./assets/upload/image/'.$product['image']);
			unlink('./assets/upload/image/thumbs/'.$product['image']);

			$slugProduct = $endProduct['product_id'].'-'.url_title($i->post('product_name'),'dash', TRUE);
			$data = array(	'product_id'	=> $product['product_id'],
							'slug_product'	=> $slugProduct,
							'user_id'		=> $this->session->userdata('id'),
							'product_name'	=> $i->post('product_name'),
							'product_description' => $i->post('product_description'),
							'date'			=> $i->post('date'),
							'status'		=> $i->post('status'),
							'image'			=> $upload_data['uploads']['file_name']
							);
			$this->mProducts->editProduct($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/products'));
		}}else{
			$i = $this->input;
			$slugProduct = $endProduct['product_id'].'-'.url_title($i->post('product_name'),'dash', TRUE);
			$data = array(	'product_id'	=> $product['product_id'],
							'slug_product'	=> $slugProduct,
							'user_id'		=> $this->session->userdata('id'),
							'product_name'	=> $i->post('product_name'),
							'product_description' => $i->post('product_description'),
							'date'			=> $i->post('date'),
							'status'		=> $i->post('status'),
							);
			$this->mProducts->editProduct($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/products'));			
		}}

		$data = array(	'title'		=> 'Edit Product - '.$product['product_name'],
						'product'	=> $product,
						'isi'		=> 'admin/products/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}	

	// Delete Product
	public function delete($product_id) {
		$data = array('product_id'	=> $product_id);
		$this->mProducts->deleteProduct($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/products'));
	}		
}