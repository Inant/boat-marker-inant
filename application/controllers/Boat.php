<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Boat_model');
	}

	function _rules() {
		$this->form_validation->set_rules('boat_name', 'Boat Name', 'required',
							  array(
								'required' => 'Data harus dipilih.'
							));
		$this->form_validation->set_rules('latitude', 'Latitude', 'required',
							  array(
								'required' => 'Data harus dipilih.'
							));
		$this->form_validation->set_rules('longitude', 'Longitude', 'required',
								array(
								'required' => 'Data harus dipilih.'
							));
		$this->form_validation->set_rules('rotation', 'Rotation', 'required',
								array(
								'required' => 'Data harus dipilih.'
							));
	  }

	public function index()
	{
		$data['data'] = $this->Boat_model->getAllData();
		$this->load->view('boat/index', $data);
	}

	public function create()
	{
		$this->load->view('boat/create');
	}

	public function store()
	{
		$this->_rules();

		if ($this->form_validation->run() == TRUE) {
		if ($this->Boat_model->insertData()) {
			$this->session->set_flashdata('pesan','data berhasil disimpan');
			redirect('boat/index');
		}
		}else{
			$this->load->view('boat/create');
		}
	}

	public function edit($id)
	{
		$data['data'] = $this->Boat_model->editData($id);
		$this->load->view('boat/edit', $data);
	}

	public function update($id)
	{ 
		$this->_rules();

		if ($this->form_validation->run() == TRUE) {
		if ($this->Boat_model->updateData($id)) {
			$this->session->set_flashdata('pesan','data berhasil di edit!');
			redirect('boat/index');
		}
		}else{
			$data['data'] = $this->Boat_model->editData($id);
			$this->load->view('boat/edit', $data);
		}
	}

	public function delete($id)
	{
		$this->Boat_model->deleteData($id);
		$this->session->set_flashdata('pesan','data berhasil di hapus!');
		redirect('boat/index');

	}
}
