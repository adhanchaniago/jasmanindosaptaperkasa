<?php
	/*
    @Copyright Hesen Dwi Yatmiko
    @Class Name : Pekerjaan Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Sdm_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Pekerjaan
        public function listSdm() {
            $this->db->select('*');
            $this->db->from('sdm');
                              
            $this->db->order_by('sdm_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Pekerjaan
        public function createPekerjaan($data) {
            $this->db->insert('pekerjaan',$data);
        }

        // Detail Pekerjaan
        public function detailPekerjaan($pekerjaan_id) {
            $this->db->select('*');
            $this->db->from('pekerjaan');
            $this->db->where('pekerjaan_id',$pekerjaan_id);
            $this->db->order_by('pekerjaan_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Pekerjaan
        public function editPekerjaan($data) {
            $this->db->where('pekerjaan_id',$data['pekerjaan_id']);
            $this->db->update('pekerjaan',$data);
        }           

        // Delete Pekerjaan
        public function deletePekerjaan($data) {
            $this->db->where('pekerjaan_id',$data['pekerjaan_id']);
            $this->db->delete('pekerjaan',$data);
        }

        // End Client
        public function endPekerjaan() {
            $this->db->select('*');
            $this->db->from('pekerjaan');
            $this->db->order_by('pekerjaan_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Per Page Pekerjaan
        public function perPagePekerjaan($limit,$start) {
            $this->db->select('*');
            $this->db->from('pekerjaan');
            $this->db->where(array('status' => 'publish'));                
            $this->db->order_by('pekerjaan_id','ASC');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            return $query->result_array();
        }

        // Total Pekerjaan
        public function totalPekerjaan() {
            $this->db->select('*');
            $this->db->from('pekerjaan');
            $this->db->where(array('status' => 'publish'));                
            $this->db->order_by('pekerjaan_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }     

		// List clients
		public function listClients() {
            $this->db->select('*');
            $this->db->from('clients');
            $this->db->join('admins','admins.admin_id = clients.user_id','LEFT');                        
            $this->db->order_by('client_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

    }
