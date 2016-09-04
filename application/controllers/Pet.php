<?php
class Pet extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('pet_model');
			$this->load->helper('html');
			$this->load->helper('url');
		}

		public function index()
		{
			$data['pet'] = $this->pet_model->get_pets();
			$data['num_rows'] = $this->pet_model->count_rows();
			$this->load->view('templates/header');
			$this->load->view('templates/menubar');
			$this->load->view('pet/home', $data);
			$this->load->view('templates/footer');
		}

		public function view($id)
		{
			$data['pet'] = $this->pet_model->get_pet($id);
			$this->load->view('templates/header');
			$this->load->view('templates/menubar');
			$this->load->view('pet/view', $data);
			$this->load->view('templates/footer');
		}

//		public function view($page = 'home')
//		{
//			 if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
//			{
//				// Whoops, we don't have a page for that!
//				show_404();
//			}
//			$data['title'] = ucfirst($page); // Capitalize the first letter
//			$this->load->view('templates/header', $data);
//			$this->load->view('pages/'.$page, $data);
//			$this->load->view('templates/footer', $data);
//		}
}
