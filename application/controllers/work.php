<?php

class Work extends CI_Controller 
{
	public function index()
	{
		$this->load->model('inner/tasks_model');
		$articles=$this->tasks_model->extract($_SESSION['u_id']);

		$this->load->view('alogin/afheader_view');
		$this->load->view('alogin/todomain_view',
							[
							 'articles' =>$articles,
							    'fname' =>$_SESSION['u_first'],
							    'lname' =>$_SESSION['u_last']
							]
						  );
	}

	public function addnew()
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('addnewvalid'))
		{    
			$name=$this->input->post('name');
			$type=$this->input->post('type');
			$this->load->model('inner/tasks_model');
			$this->tasks_model->add($name,$type,$_SESSION['u_id']);
		}
		return redirect('work');	
	}

	public function edit($item_id)
	{
		$this->load->model('inner/tasks_model');
		$article=$this->tasks_model->editextract($item_id);

		$this->load->view('alogin/afheader_view');
		$this->load->view('alogin/editask_view',['article'=>$article]);
	}

	public function update($item_id)
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('addnewvalid'))
		{    
			$name=$this->input->post('name');
			$type=$this->input->post('type');
			$this->load->model('inner/tasks_model');
			$this->tasks_model->updatedit($name,$type,$item_id);
		}
		$this->session->set_flashdata('edit','Item has been updated!!');		
		return redirect('work');	
	}

	public function subtask($item_id)
	{
		$_SESSION['parentid']=$item_id;
		return redirect('worksub');	
	}

	public function mark($item_id)
	{
		$check="mark";
		$this->load->model('inner/tasks_model');
		if($this->tasks_model->subinteract($item_id))
			$this->session->set_flashdata('markcheck','You have pending subtasks !!');		
		else
			$this->tasks_model->marking($item_id,$check);
		return redirect('work');
	}
	
	public function unmark($item_id)
	{
		$check="unmark";
		$this->load->model('inner/tasks_model');
		$this->tasks_model->marking($item_id,$check);

		return redirect('work');
	}

	public function del($item_id)
	{
		$match="single";
		$this->load->model('inner/tasks_model');
		if($this->tasks_model->subinteract($item_id))
			$this->session->set_flashdata('markcheck','You have pending subtasks !!');
		else
			$this->tasks_model->delit($item_id,$match,'0');
		return redirect('work');
	}

	public function delall()
	{
		$match="all";
		$this->load->model('inner/tasks_model');
		$this->tasks_model->delit('0',$match,$_SESSION['u_id']);

		return redirect('work');
	}

	public function __construct()	
	{
		parent::__construct();
		if (!isset($_SESSION['u_id']))
			return redirect('welcome'); 
	}
}