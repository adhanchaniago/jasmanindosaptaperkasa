<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Galleries Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Galleries_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Gallery
        public function listGalleries() {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->join('admins','admins.admin_id = galleries.user_id','LEFT');                        
            $this->db->order_by('gallery_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Listing Galleries Publish
        public function listGalleriesPub() {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->join('admins','admins.admin_id = galleries.user_id','LEFT');
            $this->db->where(array('status' => 'publish'));                        
            $this->db->order_by('gallery_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        } 

        // Listing Galleries Slider 
        public function listGalleriesPubHome() {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->join('admins','admins.admin_id = galleries.user_id','LEFT');
            $this->db->where(array('status' => 'publish','position' => 'slider'));                        
            $this->db->order_by('gallery_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Listing Galleriy Profile 
        public function listGalleryPubProfile() {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->join('admins','admins.admin_id = galleries.user_id','LEFT');
            $this->db->where(array('status' => 'publish','position' => 'profil'));                        
            $this->db->order_by('gallery_id','ASC');
            $query = $this->db->get();
            return $query->row_array();
        }

        // Listing Galleriy Price 
        public function listGalleryPubPrice() {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->join('admins','admins.admin_id = galleries.user_id','LEFT');
            $this->db->where(array('status' => 'publish','position' => 'harga'));                        
            $this->db->order_by('gallery_id','ASC');
            $query = $this->db->get();
            return $query->row_array();
        }        
		
		 // Listing Galleriy Pekerjaan
        public function listGalleryPubPekerjaan() {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->join('admins','admins.admin_id = galleries.user_id','LEFT');
            $this->db->where(array('status' => 'publish','position' => 'pekerjaan'));                        
            $this->db->order_by('gallery_id','ASC');
            $query = $this->db->get();
            return $query->row_array();
        }     

			 // Listing Galleriy Pekerjaan
        public function listGalleryPubStruktur() {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->join('admins','admins.admin_id = galleries.user_id','LEFT');
            $this->db->where(array('status' => 'publish','position' => 'struktur'));                        
            $this->db->order_by('gallery_id','ASC');
            $query = $this->db->get();
            return $query->row_array();
        }        
		
		
		
        // Listing Galleriy Footer 
        public function listGalleryPubFooter() {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->join('admins','admins.admin_id = galleries.user_id','LEFT');
            $this->db->where(array('status' => 'publish','position' => 'footer'));                        
            $this->db->order_by('gallery_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }                                

        // Create Gallery
        public function createGallery($data) {
            $this->db->insert('galleries',$data);
        }

        // Detail Gallery
        public function detailGallery($gallery_id) {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->where('gallery_id',$gallery_id);
            $this->db->order_by('gallery_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Gallery
        public function editGallery($data) {
            $this->db->where('gallery_id',$data['gallery_id']);
            $this->db->update('galleries',$data);
        }           

        // Delete Gallery
        public function deleteGallery($data) {
            $this->db->where('gallery_id',$data['gallery_id']);
            $this->db->delete('galleries',$data);
        }        

        // End Gallery
        public function endGallery() {
            $this->db->select('*');
            $this->db->from('galleries');
            $this->db->order_by('gallery_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }              

    }
