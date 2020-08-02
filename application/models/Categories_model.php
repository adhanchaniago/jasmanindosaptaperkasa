<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Categories Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Categories_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Categories
        public function listCategories() {
            $this->db->select('*');
            $this->db->from('categories');
            $this->db->join('admins','admins.admin_id = categories.user_id','LEFT');            
            $this->db->order_by('category_id','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Category
        public function createCategory($data) {
            $this->db->insert('categories',$data);
        }

        // Detail Category
        public function detailCategory($category_id) {
            $this->db->select('*');
            $this->db->from('categories');
            $this->db->where('category_id',$category_id);
            $this->db->order_by('category_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }

        // Detail Category By Slug
        public function detailCategorySlug($slugCategory) {
            $this->db->select('*');
            $this->db->from('categories');
            $this->db->where('slug_category',$slugCategory);
            $this->db->order_by('category_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                  

        // Edit Category
        public function editCategory($data) {
            $this->db->where('category_id',$data['category_id']);
            $this->db->update('categories',$data);
        }           

        // Delete Category
        public function deleteCategory($data) {
            $this->db->where('category_id',$data['category_id']);
            $this->db->delete('categories',$data);
        } 

        // End Category
        public function endCategory() {
            $this->db->select('*');
            $this->db->from('categories');
            $this->db->order_by('category_id','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                    

    }
