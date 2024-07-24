<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 7 - 10.08

class Home extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

		//	Existe uma sessão?
	}

	public function index()
	{
		$this->load->view('restrita/layout/header');
		$this->load->view('restrita/home/index');
		$this->load->view('restrita/layout/footer');
	}
}
