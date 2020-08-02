<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Products Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Products_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Products
        public function listProducts() {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->join('admins','admins.admin_id = products.user_id','LEFT');                        
            $this->db->order_by('product_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Listing Products Publish
        public function listProductsPub() {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->where(array('status' => 'publish'));                           
            $this->db->join('admins','admins.admin_id = products.user_id','LEFT');                        
            $this->db->order_by('product_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }        

        // Create Product
        public function createProduct($data) {
            $this->db->insert('products',$data);
        }

        // Detail Product
        public function detailProduct($product_id) {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->where('product_id',$product_id);
            $this->db->order_by('product_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }

        // Read Product
        public function readProduct($slugProduct) {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->where('slug_product',$slugProduct);
            $query = $this->db->get();
            return $query->row_array();
        }         

        // Edit Product
        public function editProduct($data) {
            $this->db->where('product_id',$data['product_id']);
            $this->db->update('products',$data);
        }           

        // Delete Product
        public function deleteProduct($data) {
            $this->db->where('product_id',$data['product_id']);
            $this->db->delete('products',$data);
        } 

        // End Product
        public function endProduct() {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->order_by('product_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }  

        // Per Page Products
        public function perPageProducts($limit,$start) {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->where(array('status' => 'publish'));               
            $this->db->order_by('product_id','ASC');
            $this->db->limit($limit,$start);
            $query = $this->db->get();
            return $query->result_array();
        }

        // Total Products
        public function totalProducts() {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->where(array('status' => 'publish'));                
            $this->db->order_by('product_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }                           

    }
