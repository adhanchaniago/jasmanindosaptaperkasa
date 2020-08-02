<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Galeri(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
	
	// Main Page Galleri
	public function index() {

		$site  		= $this->mConfig->list_config();
		$galleries 	= $this->mGalleries->listGalleriesPub();
		
		$data = array(	'title'		=> 'Album Foto - '.$site['nameweb'],
						'site'		=> $site,
						'galleries'	=> $galleries,
						'countGalleries' => $this->mStats->galleriesPublish(),						
						'isi'		=> 'front/galleri/list');
		$this->load->view('front/layout/wrapper',$data);
	}
}