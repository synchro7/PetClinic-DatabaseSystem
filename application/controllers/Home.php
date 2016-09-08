<?php
class Home extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('html');
			$this->load->helper('url');
			$this->load->model('pet_model');
			$this->load->model('vet_model');
			$this->load->model('med_model');
			$this->load->model('diag_model');
		}

		public function index()
		{
			$data['pet'] = $this->pet_model->count_rows();
			$data['vet'] = $this->vet_model->count_rows();
			$data['med'] = $this->med_model->count_rows();
			$data['dr'] = $this->diag_model->count_rows();
			$this->load->view('templates/header');
			$this->load->view('templates/body-start');
			$this->load->view('includes/menubar');
			$this->load->view('home', $data);
			$this->load->view('templates/body-end');
			$this->load->view('templates/footer');
		}
}
