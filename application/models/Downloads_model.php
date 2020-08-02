<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Downloads Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Downloads_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Downloads
        public function listDownloads() {
            $this->db->select('*');
            $this->db->from('downloads');
            $this->db->join('admins','admins.admin_id = downloads.user_id','LEFT');                        
            $this->db->order_by('download_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Listing Downloads Publish
        public function listDownloadsPub() {
            $this->db->select('*');
            $this->db->from('downloads');
            $this->db->join('admins','admins.admin_id = downloads.user_id','LEFT');                        
            $this->db->where(array('status' => 'publish'));
            $this->db->order_by('download_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }        

        // Create Download
        public function createDownload($data) {
            $this->db->insert('downloads',$data);
        }

        // Detail Download
        public function detailDownload($download_id) {
            $this->db->select('*');
            $this->db->from('downloads');
            $this->db->where('download_id',$download_id);
            $this->db->order_by('download_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Download
        public function editDownload($data) {
            $this->db->where('download_id',$data['download_id']);
            $this->db->update('downloads',$data);
        }           

        // Delete Download
        public function deleteDownload($data) {
            $this->db->where('download_id',$data['download_id']);
            $this->db->delete('downloads',$data);
        } 

        // End Download
        public function endDownload() {
            $this->db->select('*');
            $this->db->from('downloads');
            $this->db->order_by('download_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                     

    }
