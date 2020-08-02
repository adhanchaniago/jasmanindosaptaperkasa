<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Admins Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admins_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Admins
        public function listAdmins() {
            $this->db->select('*');
            $this->db->from('admins');
            $this->db->order_by('admin_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Admin
        public function createAdmin($data) {
            $this->db->insert('admins',$data);
        }

        // Detail Admin
        public function detailAdmin($admin_id) {
            $this->db->select('*');
            $this->db->from('admins');
            $this->db->where('admin_id',$admin_id);
            $this->db->order_by('admin_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Admin
        public function editAdmin($data) {
            $this->db->where('admin_id',$data['admin_id']);
            $this->db->update('admins',$data);
        }           

        // Delete Admin
        public function deleteAdmin($data) {
            $this->db->where('admin_id',$data['admin_id']);
            $this->db->delete('admins',$data);
        }             

    }
