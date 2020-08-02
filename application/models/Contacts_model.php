<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Contacts Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Contacts_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Contacts
        public function listContacts() {
            $this->db->select('*');
            $this->db->from('contacts');
            $this->db->order_by('message_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Send Message
        public function sendMessage($data) {
            $this->db->insert('contacts',$data);
        }        

        // Detail Message
        public function detailMessage($message_id) {
            $this->db->select('*');
            $this->db->from('contacts');
            $this->db->where('message_id',$message_id);
            $this->db->order_by('message_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Delete Message
        public function deleteMessage($data) {
            $this->db->where('message_id',$data['message_id']);
            $this->db->delete('contacts',$data);
        }               

    }
