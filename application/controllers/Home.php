<?php
class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('html');
			$this->load->helper('url');
		}

		public function index()
		{
			$this->load->view('templates/header');
			$this->load->view('templates/menubar');
			$this->load->view('home');
			$this->load->view('templates/footer');
		}
}
