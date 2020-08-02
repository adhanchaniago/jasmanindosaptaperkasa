<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stats_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}

	// Stat Admins
	public function admins() {
		$query = $this->db->get('admins');
		return $query->num_rows();	
	}

	// Stat Blogs
	public function blogs() {
		$query = $this->db->get('blogs');
		return $query->num_rows();	
	}

	// Stat Products
	public function products() {
		$query = $this->db->get('products');
		return $query->num_rows();	
	}

	// Stat Clients
	public function clients() {
		$query = $this->db->get('clients');
		return $query->num_rows();	
	}	
		// Stat Pekerjaan
	public function pekerjaan() {
		$query = $this->db->get('pekerjaan');
		return $query->num_rows();	
	}	
	// Stat Downloads
	public function downloads() {
		$query = $this->db->get('downloads');
		return $query->num_rows();	
	}

	// Stat Contacts
	public function contacts() {
		$query = $this->db->get('contacts');
		return $query->num_rows();	
	}					

	// Stat Galleries
	public function galleries() {
		$query = $this->db->get('galleries');
		return $query->num_rows();	
	}	

	// Stat Galleries Publish
	public function galleriesPublish() {
		$query = $this->db->get_where('galleries',array('status' => 'publish'));
		return $query->num_rows();	
	}				

}