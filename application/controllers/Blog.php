<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Blog(Front)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
	// Main Page Blogs
	public function index() {

		$site  		= $this->mConfig->list_config();
		$categories = $this->mCategories->listCategories();
		$lastBlogs 	= $this->mBlogs->listLastBlogsPub();

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'blog/index/';
		$config['total_rows'] 		= count($this->mBlogs->totalBlogs());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 10;
		$config['first_url'] 		= base_url().'blog/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$blogs 		= $this->mBlogs->perPageBlogs($config['per_page'], $page);
		// End Pagination		
		
		$data = array(	'title'		=> 'Blog - '.$site['nameweb'],
						'site'		=> $site,
						'blogs'		=> $blogs,
						'categories'=> $categories,
						'lastBlogs'	=> $lastBlogs,
						'pagin' 	=> $this->pagination->create_links(),												
						'isi'		=> 'front/blog/list');
		$this->load->view('front/layout/wrapper',$data);
	}

	// Search Blog
	public function cari(){

		$site 		= $this->mConfig->list_config();
		$categories = $this->mCategories->listCategories();
		$lastBlogs 	= $this->mBlogs->listLastBlogsPub();			

		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}

		$this->load->model('mBlogs');
		$this->db->like('title', $data['ringkasan']);
        $this->db->from('blogs');

		// pagination limit
		$pagination['base_url'] = base_url().'blog/cari/index/';
		$pagination['total_rows'] = $this->db->count_all_results();
		$pagination['per_page'] = "10";
		$pagination['uri_segment'] = 4;
		$pagination['num_links'] = 5;

		$this->pagination->initialize($pagination);

		$data['blog'] = $this->mBlogs->cariBlog($pagination['per_page'],$this->uri->segment(4,0),
		$data['ringkasan'],
		$data['isi'] = 'front/blog/cari',
		$data['title'] = 'Hasil Pencarian - '. $data['ringkasan'],
		$data['site'] = $site,
		$data['categories'] = $categories,
		$data['lastBlogs'] = $lastBlogs,
		$data['pagin'] = $this->pagination->create_links()						
		);

		$this->load->vars($data);
		$this->load->view('front/layout/wrapper');
	}	

	// Read Blog
	public function detil($slugBlog) {

		$site  		= $this->mConfig->list_config();
		$blog 		= $this->mBlogs->readBlog($slugBlog);
		$categories = $this->mCategories->listCategories();
		$comments   = $this->mBlogs->listCommentsByBlog($slugBlog);
        $blogId 	= $blog['blog_id'];
        $count  	= $this->mBlogs->countCommentByBlog($blogId);                                            		
		
		$data = array(	'title'		=> $blog['title'].' - '.$site['nameweb'],
						'site'		=> $site,
						'blog'		=> $blog,
						'categories'=> $categories,
						'count'		=> $count,
						'comments'	=> $comments,
						'isi'		=> 'front/blog/read');
		$this->load->view('front/layout/wrapper',$data);
	}

  	// Reply Blog
	public function replyBlog(){

		if ($this->input->post('message')){
			$this->mBlogs->replyBlog();
		}

		$this->session->set_flashdata('sukses','Success');  	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
  	}	

	// Blog By Category
	public function kategori($slugBlog) {

		$site  		= $this->mConfig->list_config();
		$categories = $this->mCategories->listCategories();
		$lastBlogs 	= $this->mBlogs->listLastBlogsPub();
		$detailCategory = $this->mCategories->detailCategorySlug($slugBlog);
		$blogs 		= $this->mBlogs->getAllBlogsByCategory($slugBlog);

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'blog/kategori/index/';
		$config['total_rows'] 		= $this->mBlogs->totalBlogsByCategory($slugBlog);
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 1;
		$config['first_url'] 		= base_url().'blog/kategori/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$blogs 		= $this->mBlogs->getAllBlogsByCategory($slugBlog, $config['per_page'], $page);
		// End Pagination			
		
		$data = array(	'title'		=> $detailCategory['category_name'].' - '.$site['nameweb'],
						'site'		=> $site,
						'blogs'		=> $blogs,
						'categories'=> $categories,
						'detailCategory'=> $detailCategory,
						'lastBlogs' => $lastBlogs,
						'pagin' 	=> $this->pagination->create_links(),																		
						'isi'		=> 'front/blog/category');
		$this->load->view('front/layout/wrapper',$data);
	}  

}