<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Download(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	
	// Main Page Downloads
	public function index() {

		$site  		= $this->mConfig->list_config();
		$downloads 	= $this->mDownloads->listDownloadsPub();
		$blogs 		= $this->mBlogs->listBlogsPub();
		
		$data = array(	'title'		=> 'Download - '.$site['nameweb'],
						'site'		=> $site,
						'downloads'	=> $downloads,
						'blogs'		=> $blogs,
						'isi'		=> 'front/download/list');
		$this->load->view('front/layout/wrapper',$data);
	}
}