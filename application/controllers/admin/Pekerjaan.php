<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {
	
	
	// Index page 
	public function index() {
				
		$this->load->model('Pekerjaan_model');
		$pekerjaan = $this->Pekerjaan_model->listPekerjaan();
		//$clients = $this->Pekerjaan_model->listClients();
		$site	= $this->mConfig->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('pekerjaan_lokasi','Pekerjaan Lokasi','required');
		$valid->set_rules('pekerjaan_nama','Pekerjaan Nama','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Management Pekerjaan - '.$site['nameweb'],
						'pekerjaan'	=> $pekerjaan,
						'isi'	=> 'admin/pekerjaan/list');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;

			$data = array(	'pekerjaan_nama'=> $i->post('pekerjaan_nama'),
							'pekerjaan_lokasi'		=> $i->post('pekerjaan_lokasi'),
							'user_id'	=> $this->session->userdata('id'),
							'pekerjaan_tahun'=> $i->post('pekerjaan_tahun'),
							'pekerjaan_client' => $i->post('pekerjaan_client'),
							'tipe_kapal' => $i->post('tipe_kapal'),
							'status'	=> $i->post('status'),
							'date'		=> $i->post('date'),
						);
			$this->load->model('Pekerjaan_model');
			$this->Pekerjaan_model->createPekerjaan($data);	

			$clients = $this->Pekerjaan_model->listClients();
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/pekerjaan'));
		}
	}

	

	// Edit Price
	public function edit($pekerjaan_id) {
		$this->load->model('Pekerjaan_model');
		$pekerjaan	= $this->Pekerjaan_model->detailPekerjaan($pekerjaan_id);
		$site	= $this->mConfig->list_config();
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('pekerjaan_nama','Pekerjaan Nama','required');
		$valid->set_rules('pekerjaan_lokasi','Pekerjaan Lokasi','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'	=> 'Edit Pekerjaan - '.$pekerjaan['pekerjaan_nama'],
						'pekerjaan'	=> $pekerjaan,
						'isi'	=> 'admin/pekerjaan/edit');
		$this->load->view('admin/layout/wrapper',$data);
		}else{

			$i = $this->input;
			$data = array(	'pekerjaan_id'	=> $pekerjaan['pekerjaan_id'],
							'pekerjaan_nama'=> $i->post('pekerjaan_nama'),
							'user_id'	=> $this->session->userdata('id'),
							'pekerjaan_lokasi'		=> $i->post('pekerjaan_lokasi'),
							'pekerjaan_tahun'=> $i->post('pekerjaan_tahun'),
							'pekerjaan_client' => $i->post('pekerjaan_client'),	
							'tipe_kapal' => $i->post('tipe_kapal'),							
							'status'	=> $i->post('status'),
							'date'		=> $i->post('date'),
						);
			$this->load->model('Pekerjaan_model');			
			$this->Pekerjaan_model->editPekerjaan($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/pekerjaan/'));
		}
	}	

	// Delete Price
	public function delete($pekerjaan_id) {
		$data = array('pekerjaan_id' => $pekerjaan_id);
		$this->load->model('Pekerjaan_model');
		$this->Pekerjaan_model->deletePekerjaan($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/pekerjaan/'));
	}	
}