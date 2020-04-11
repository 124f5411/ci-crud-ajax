<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datas');
	}

	public function index()
	{
		$data = [
			'title' => 'CRUD',
			'body'	=> 'create/index'
		];
		$this->load->view('template/general', $data, FALSE);
		$this->load->view('create/js');
	}

	function data(){
		$data =  $this->Datas->getAll();
		echo json_encode($data);
	}

	function save(){
		$data =  $this->Datas->insertData();
		echo json_encode($data);
	}

	function update(){
		$data =  $this->Datas->updateData();
		echo json_encode($data);
	}

	function delete(){
		$data =  $this->Datas->deleteData();
		echo json_encode($data);
	}

}

/* End of file Create.php */
/* Location: ./application/controllers/Create.php */