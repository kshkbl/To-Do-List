<?php

class Welcome extends CI_Controller 
{

	public function index()
	{		
		$this->load->view('blogin/bfheader_view');
		$this->load->view('blogin/logsign_view');
	}

	public function signupform()
	{
		$this->load->view('blogin/bfheader_view');
		$this->load->view('blogin/signup_view');
	}

	public function signup()
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('signupvalid'))
		{    
			$signinfo = $this->input->post();

			$this->load->model('outer/users_model');
			$signvar=$this->users_model->Signupinsert($signinfo);

			if($signvar)
			{
				$this->session->set_flashdata('signup','You have successfully signed up !!');
			    // return redirect('welcome/signupform');
				return redirect('welcome');
			}
			else
			{
			    // $this->session->set_flashdata('error', validation_errors());
			    // return redirect('welcome/signupform');
				$this->load->view('blogin/bfheader_view');
				$this->load->view('blogin/signup_view');
			}
		}
		else
		{
			// $this->session->set_flashdata('error', validation_errors());
			// return redirect('welcome/signupform');
			$this->load->view('blogin/bfheader_view');
			$this->load->view('blogin/signup_view');		
		}		

	}

	public function login()
	{
		$this->load->library('form_validation');	
		if($this->form_validation->run('loginvalid'))
		{
			$loginfo = $this->input->post();

			$this->load->model('outer/users_model');
			$logvar=$this->users_model->Signin($loginfo);

			if($logvar)
			{
				foreach ($logvar as $row)
				{
			        $_SESSION['u_id']    = $row->user_id;
			        $_SESSION['u_first'] = $row->user_first;
					$_SESSION['u_last']  = $row->user_last;
					$_SESSION['u_email'] = $row->user_email;
					$_SESSION['u_name']  = $row->user_name;
				}
				$this->session->set_flashdata('login','You are signed in !!');
				return redirect('work');
			}
			else
				return redirect('welcome');
		}
		else
			return redirect('welcome');			
	}		

	public function logout()
	{
		unset(
        $_SESSION['u_id'],
        $_SESSION['u_first'],
        $_SESSION['u_last'],
        $_SESSION['u_email'],
        $_SESSION['u_name']
        );
		$this->session->set_flashdata('logout','You have signed out !!');
		return redirect('welcome');
	}	

	public function __construct()	
	{
		parent::__construct();
		if (isset($_SESSION['u_id']) && !isset($_POST['sublogout']))
			return redirect('work'); 
	}
}