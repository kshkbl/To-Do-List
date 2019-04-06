<?php

class Worksub extends CI_Controller 
{
	public function index()
	{
		$this->load->model('inner/subtasks_model');
		$subarticles=$this->subtasks_model->extract($_SESSION['parentid']);

		$this->load->view('alogin/afheader_view');
		$this->load->view('alogin/todosub_view',
							[
							 'subarticles' =>$subarticles,
							    'fname'    =>$_SESSION['u_first'],
							    'lname'    =>$_SESSION['u_last']
							]
						  );
	}

	public function addnewsub()
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('addnewvalid'))
		{    
			$name=$this->input->post('name');
			$type=$this->input->post('type');
			$this->load->model('inner/subtasks_model');
			$this->subtasks_model->add($name,$type,$_SESSION['parentid']);
			$this->subtasks_model->subcount($_SESSION['parentid']);
		}
		return redirect('worksub');	
	}

	// public function editsub($itemid)
	// {
	// 	$this->load->library('form_validation');
	// 	if($this->form_validation->run('addnewvalid'))
	// 	{    
	// 		$name=$this->input->post('name');
	// 		$type=$this->input->post('type');
	// 		$this->load->model('inner/tasks_model');
	// 		$this->tasks_model->add($name,$type,$_SESSION['u_id']);
	// 	}
	// 	return redirect('work');	
	// }

	public function marksub($itemid)
	{
		$check="mark";
		$this->load->model('inner/subtasks_model');
		$this->subtasks_model->marking($itemid,$check);

		return redirect('worksub');			
	}
	
	public function unmarksub($itemid)
	{
		$check="unmark";
		$this->load->model('inner/subtasks_model');
		$this->subtasks_model->marking($itemid,$check);

		return redirect('worksub');
	}

	public function delsub($itemid)
	{
		$match="single";
		$this->load->model('inner/subtasks_model');
		$this->subtasks_model->delit($itemid,$match,'0');
		$this->subtasks_model->subcount($_SESSION['parentid']);

		return redirect('worksub');
	}

	public function delallsub()
	{
		$match="all";
		$this->load->model('inner/subtasks_model');
		$this->subtasks_model->delit('0',$match,$_SESSION['parentid']);
		$this->subtasks_model->subcount($_SESSION['parentid']);

		return redirect('worksub');
	}

	public function __construct()	
	{
		parent::__construct();
		if (!isset($_SESSION['u_id']))
			return redirect('welcome'); 
	}
}