<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Boat_model');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getjson()
	{
		$data = $this->Boat_model->getAllData();
		header('Access-Control-Allow-Origin: *');

		header('Content-Type: application/json');

		$arr = array(
			'data' => $data
		);

		echo json_encode($arr);
	}
}
