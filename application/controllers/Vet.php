<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vet extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('vet_model');
			$this->load->helper('html');
			$this->load->helper('url');
		}

		public function index()
		{
			$data['vets'] = $this->vet_model->get_vets();
			$data['num_rows'] = $this->vet_model->count_rows();
			$this->load->view('templates/header');
			$this->load->view('includes/datatable-header');
			$this->load->view('templates/body-start');
			$this->load->view('includes/menubar');
			$this->load->view('vet/home', $data);
			$this->load->view('templates/body-end');
			$this->load->view('includes/datatable-footer');
			$this->load->view('templates/footer');
		}

		public function view($id = null)
		{
			if(empty($id)){
				show_404();
			} else {
				$data['vet'] = $this->vet_model->get_vet($id);
				$this->load->view('templates/header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('vet/view', $data);
				$this->load->view('templates/body-end');
				$this->load->view('vet/view-b-inc');
				$this->load->view('templates/footer');
			}
		}

		public function create($action = null)
		{
			if(empty($action)) {
				$this->load->view('templates/header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('vet/create');
				$this->load->view('templates/body-end');
				$this->load->view('vet/create-b-inc');
				$this->load->view('templates/footer');
			} elseif($action == 'submit') {
				$data = $this->vet_model->add_vet();
				echo json_encode($data);
			} else {
				show_404();
			}
		}

		public function ajax($action = null, $id = null)
		{
			if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) ) {

				if(empty($action)) {
					show_404();
				} elseif ($action == 'getvet') {
					$data['vet'] = $this->vet_model->get_vet($id);
					echo json_encode($data);
				} elseif ($action == 'getvets') {
					$data['vets'] = $this->vet_model->get_vets();
					echo json_encode($data);
				} elseif ($action == 'delvet') {
					$data = $this->vet_model->del_vet($id);
					echo json_encode($data);
				} elseif ($action == 'update') {
					$data = $this->vet_model->update_vet();
					echo json_encode($data);
				} else {
					show_404();
				}

			} else {
				show_404();
			}
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
