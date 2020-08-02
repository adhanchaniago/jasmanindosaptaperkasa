<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Blogs
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {
	
	// Main Page Blogs
	public function index() {

		$site  = $this->mConfig->list_config();
		$blogs = $this->mBlogs->listBlogs();
		
		$data = array(	'title'		=> 'List Blogs - '.$site['nameweb'],
						'blogs'		=> $blogs,
						'isi'		=> 'admin/blogs/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

/* 
	Function Create
*/

	// Main Page Categories Blogs
	public function categories() {
		
		$site		= $this->mConfig->list_config();
		$categories	= $this->mCategories->listCategories();		
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('category_name','Category Name','required');
		$valid->set_rules('order_category','Order Category','required');
		
		if($valid->run() === FALSE) {
		
		$data = array(	'title'		=> 'Management Categories - '.$site['nameweb'],
						'categories'=> $categories,
						'isi'		=> 'admin/categories/list');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$slug = url_title($this->input->post('category_name'), 'dash', TRUE);
			$data = array(	'slug_category'	=> $slug,
							'user_id'		=> $this->session->userdata('id'),
							'category_name'	=> $i->post('category_name'),
							'order_category'=> $i->post('order_category'),
							'category_description'=> $i->post('category_description'),
							'date_category'	=> $i->post('date_category'),
						);
			$this->mCategories->createCategory($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/blogs/categories'));
		}
	}
		
				
	// Create Blog
	public function create() {
		
		$site 	  = $this->mConfig->list_config();
		$categories = $this->mCategories->listCategories();
		$endBlog  = $this->mBlogs->endBlog();
		
		$v = $this->form_validation;
		$v->set_rules('category_id','Category Blog','required');
		$v->set_rules('title','Title Blog','required');
		$v->set_rules('content','Content Blog','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
				
		$data = array(	'title'			=> 'Create Blog - '.$site['nameweb'],
						'site'			=> $site,
						'categories'	=> $categories,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/blogs/create');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$slug_blog = url_title($this->input->post('title'), 'dash', TRUE);
				$data = array(	'category_id'	=> $i->post('category_id'),
								'slug_blog'		=> $slug_blog,
								'user_id'		=> $this->session->userdata('id'),
								'title'			=> $i->post('title'),
								'content'		=> $i->post('content'),
								'date_post'		=> $i->post('date_post'),
								'status'		=> $i->post('status'),
								'keywords'		=> $i->post('keywords'),
								'image'			=> $upload_data['uploads']['file_name']
				 			 );

				$this->mBlogs->createBlog($data);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/blogs/'));
		}}
		// Default page
		$data = array(	'title'		=> 'Create Blogs - '.$site['nameweb'],
						'site'		=> $site,
						'categories'=> $categories,
						'isi'		=> 'admin/blogs/create');
		$this->load->view('admin/layout/wrapper',$data);
	}	

/* 
	Function Edit 
*/

	// Edit Categories Blogs
	public function edit_category($category_id) {
		
		$site 	  	 = $this->mConfig->list_config();
		$category 	 = $this->mCategories->detailCategory($category_id);
		$endCategory = $this->mCategories->endCategory();

		// Validation
		$valid = $this->form_validation;
		$valid->set_rules('category_name','Category Name','required');
		$valid->set_rules('order_category','Order Category','required');

		if($valid->run() === FALSE) {
		
		$data = array(	'title'	 	=> 'Edit Category - '.$category['category_name'],
						'category'	=> $category,
						'isi'		=> 'admin/categories/edit');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$slug_category = $endCategory['category_id'].'-'.url_title($i->post('category_name'),'dash', TRUE);
			$data = array(	'category_id'		=> $category['category_id'],
							'slug_category'		=> $slug_category,		
							'category_name'		=> $i->post('category_name'),		
							'order_category'	=> $i->post('order_category'),					
							'date_category'		=> $i->post('date_category'),					
						);
			$this->mCategories->editCategory($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/blogs/categories'));
		}
	}

	// Edit Blogs
	public function edit($blog_id) {

		$blog		= $this->mBlogs->detailBlog($blog_id);
		$endBlog	= $this->mBlogs->endBlog();		
		$category	= $this->mCategories->listCategories();

		// Validation
		$v = $this->form_validation;
		$v->set_rules('category_id','Category Blog','required');
		$v->set_rules('title','Title Blog','required');
		$v->set_rules('content','Content Blog','required');
		
		if($v->run()) {
			if(!empty($_FILES['image']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
		
		$data = array(	'title'		=> 'Edit Blog - '.$blog['title'],
						'category'	=> $category,
						'blog'		=> $blog,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/blogs/edit');
		$this->load->view('admin/layout/wrapper', $data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 200; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;

			unlink('./assets/upload/image/'.$blog['image']);
			unlink('./assets/upload/image/thumbs/'.$blog['image']);

			$slugBlog = $endBlog['blog_id'].'-'.url_title($i->post('title'),'dash', TRUE);
			$data = array(	'blog_id'		=> $blog['blog_id'],
							'slug_blog'		=> $slugBlog,
							'user_id'		=> $this->session->userdata('id'),
							'title'			=> $i->post('title'),
							'content'		=> $i->post('content'),
							'date_post'		=> $i->post('date_post'),
							'status'		=> $i->post('status'),
							'keywords'		=> $i->post('keywords'),
							'image'			=> $upload_data['uploads']['file_name']
							);
			$this->edit_model->edit_biz($data);
			$this->session->set_flashdata('sukses','Biz telah diedit dan gambar telah diganti');
			redirect(base_url('admin/biz'));
		}}else{
			$i = $this->input;
			$slugBlog = $endBlog['blog_id'].'-'.url_title($i->post('title'),'dash', TRUE);
			$data = array(	'blog_id'		=> $blog['blog_id'],
							'slug_blog'		=> $slugBlog,
							'user_id'		=> $this->session->userdata('id'),
							'title'			=> $i->post('title'),
							'content'		=> $i->post('content'),
							'date_post'		=> $i->post('date_post'),
							'status'		=> $i->post('status'),
							'keywords'		=> $i->post('keywords'),
							);
			$this->mBlogs->editBlog($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/blogs'));			
		}}

		$data = array(	'title'		=> 'Edit Blogs - '.$blog['title'],
						'category'	=> $category,
						'blog'		=> $blog,
						'isi'		=> 'admin/blogs/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}			

/* 
	Function Delete
*/

	// Delete Blog
	public function delete_blog($blog_id) {
		$data = array('blog_id'	=> $blog_id);
		$this->mBlogs->deleteBlog($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/blogs'));
	}

	// Delete Category Blog
	public function delete_category($category_id) {
		$data = array('category_id'	=> $category_id);
		$this->mCategories->deleteCategory($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/blogs/categories'));
	}
					
}