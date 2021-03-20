<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {
	public function __construct() {
    	parent::__construct();
  	}

	public function create()
	{
		$this->load->view('invoice');
	}

	public function generate_print()
	{
		$data['data'] = $_POST;
		$this->load->view('generate_print', $data);
	}

}
