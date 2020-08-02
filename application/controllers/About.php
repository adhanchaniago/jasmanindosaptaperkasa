<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {


	public function index()
	{
		
		$site = $this->list_model->list_config();

		$data = array(	'site' 	=> $site,
						'isi' 	=> 'about');
		$this->load->view('template/wrapper',$data);
	}
	
}