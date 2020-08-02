<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price extends CI_Controller {

	// Index page 
	public function index() {
		
		$price	= $this->mPrice->listPrice();
		$site	= $this->mConfig->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('price_name','Price Name','required');
		$valid->set_rules('price','Price','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Management Price - '.$site['nameweb'],
						'price'	=> $price,
						'isi'	=> 'admin/price/list');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;

			$data = array(	'price_name'=> $i->post('price_name'),
							'price'		=> $i->post('price'),
							'user_id'	=> $this->session->userdata('id'),
							'with_service'=> $i->post('with_service'),
							'no_with_service' => $i->post('no_with_service'),
							'status'	=> $i->post('status'),
							'date'		=> $i->post('date'),
						);
			$this->mPrice->createPrice($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/price'));
		}
	}

	// Headline 
	public function headline() {
		
		$price	= $this->mPrice->listPrice();
		$site	= $this->mConfig->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('headline','Headline','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Management Price - '.$site['nameweb'],
						'price'	=> $price,
						'isi'	=> 'admin/price/list');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;

			$data = array('headline' => $i->post('headline'));
			$this->mPrice->createPrice($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/price'));
		}
	}

	// Edit Price
	public function edit($price_id) {
		
		$price	= $this->mPrice->detailPrice($price_id);
		$site	= $this->mConfig->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('price_name','Price Name','required');
		$valid->set_rules('price','Price','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Edit Price - '.$price['price_name'],
						'price'	=> $price,
						'isi'	=> 'admin/price/edit');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;
			$data = array(	'price_id'	=> $price['price_id'],
							'price_name'=> $i->post('price_name'),
							'user_id'	=> $this->session->userdata('id'),
							'price'		=> $i->post('price'),
							'with_service'=> $i->post('with_service'),
							'no_with_service' => $i->post('no_with_service'),							
							'status'	=> $i->post('status'),
							'date'		=> $i->post('date'),
						);
			$this->mPrice->editPrice($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/price/'));
		}
	}	

	// Delete Price
	public function delete($price_id) {
		$data = array('price_id' => $price_id);
		$this->mPrice->deletePrice($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/price/'));
	}	
}