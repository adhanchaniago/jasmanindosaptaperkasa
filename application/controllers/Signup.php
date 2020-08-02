<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {


    public function index()
    {
		//set validation rules
		$this->form_validation->set_rules(
        'username', 'Username',
        'required|min_length[5]|max_length[12]|is_unique[users.username]',
        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        ));		
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password');

		
		//validate form input
		if ($this->form_validation->run() == FALSE)
        {
			// fails
			$data = array ('title'=> 'Signup');
			$this->load->view('signup',$data);
        }
		else
		{
			//insert the user registration details into database
			$i = $this->input;
			$data = array(
				'username' => $i->post('username'),
				'email'    => $i->post('email'),
				'password'	=> sha1($i->post('password')),
			);

			
			// insert form data into database
			if ($this->create_model->signup($data))
			{
				// send email
				if ($this->function_model->sendEmail($this->input->post('email')))
				{
					// successfully sent mail
					$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
					redirect('signup');
				}
				else
				{
					// error
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
					redirect('signup');
				}
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
				redirect('signup');
			}
		}
	}
	
	function verify($hash=NULL)
	{
		if ($this->function_model->verifyEmailID($hash))
		{
			$this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
			redirect('login');
		}
		else
		{
			$this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
			redirect('signup');
		}
	}	
	
}