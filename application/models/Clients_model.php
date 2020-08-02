<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Clients Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Clients_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Clients
        public function listClients() {
            $this->db->select('*');
            $this->db->from('clients');
            $this->db->join('admins','admins.admin_id = clients.user_id','LEFT');                        
            $this->db->order_by('client_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Client
        public function createClient($data) {
            $this->db->insert('clients',$data);
        }

        // Detail Client
        public function detailClient($client_id) {
            $this->db->select('*');
            $this->db->from('clients');
            $this->db->where('client_id',$client_id);
            $this->db->order_by('client_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Client
        public function editClient($data) {
            $this->db->where('client_id',$data['client_id']);
            $this->db->update('clients',$data);
        }           

        // Delete Client
        public function deleteClient($data) {
            $this->db->where('client_id',$data['client_id']);
            $this->db->delete('clients',$data);
        }

        // End Client
        public function endClient() {
            $this->db->select('*');
            $this->db->from('clients');
            $this->db->order_by('client_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                      

    }
