<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datas extends CI_Model {

	function getAll(){
		return $this->db->get('data')->result();
	}

	function insertData(){
		$value = [
			'data1' => $this->input->post('data1'),
			'data2' => $this->input->post('data2'),
			'data3' => $this->input->post('data3')
		];
		return $this->db->insert('data',$value);
	}

	function updateData(){
		$value = [
			'data1' => $this->input->post('data1'),
			'data2' => $this->input->post('data2'),
			'data3' => $this->input->post('data3')
		];

		$fil = ['id' => $this->input->post('id_edit')];
		$this->db->where($fil);
		return $this->db->update('data',$value);
	}

	function deleteData(){
		$fil = ['id' => $this->input->post('id')];
		$this->db->where($fil);
		return $this->db->delete('data');
	}

}

/* End of file Datas.php */
/* Location: ./application/models/Datas.php */