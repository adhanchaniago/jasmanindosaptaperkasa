<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Price Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Price_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Price
        public function listPrice() {
            $this->db->select('*');
            $this->db->from('price');
            $this->db->join('admins','admins.admin_id = price.user_id','LEFT');                        
            $this->db->order_by('price_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Price
        public function createPrice($data) {
            $this->db->insert('price',$data);
        }

        // Detail Price
        public function detailPrice($price_id) {
            $this->db->select('*');
            $this->db->from('price');
            $this->db->where('price_id',$price_id);
            $this->db->order_by('price_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Price
        public function editPrice($data) {
            $this->db->where('price_id',$data['price_id']);
            $this->db->update('price',$data);
        }           

        // Delete Price
        public function deletePrice($data) {
            $this->db->where('price_id',$data['price_id']);
            $this->db->delete('price',$data);
        }

        // End Client
        public function endPrice() {
            $this->db->select('*');
            $this->db->from('price');
            $this->db->order_by('price_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Per Page Price
        public function perPagePrice($limit,$start) {
            $this->db->select('*');
            $this->db->from('price');
            $this->db->where(array('status' => 'publish'));                
            $this->db->order_by('price_id','ASC');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            return $query->result_array();
        }

        // Total Price
        public function totalPrice() {
            $this->db->select('*');
            $this->db->from('price');
            $this->db->where(array('status' => 'publish'));                
            $this->db->order_by('price_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }                             

    }
