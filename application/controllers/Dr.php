<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dr extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('diag_model');
			$this->load->model('pet_model');
			$this->load->model('vet_model');
			$this->load->helper('html');
			$this->load->helper('url');
		}

		public function index()
		{
			$data['dr'] = $this->diag_model->get_drs();
			$data['num_rows'] = $this->diag_model->count_rows();
			$this->load->view('templates/header');
			$this->load->view('includes/datatable-header');
			$this->load->view('templates/body-start');
			$this->load->view('includes/menubar');
			$this->load->view('dr/home', $data);
			$this->load->view('templates/body-end');
			$this->load->view('includes/datatable-footer');
			$this->load->view('templates/footer');
		}

		public function view($id = null)
		{
			if(empty($id)){
				show_404();
			} else {
				$data['dr'] = $this->diag_model->get_dr($id);
				$this->load->view('templates/header');
				$this->load->view('includes/datepicker-header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('dr/view', $data);
				$this->load->view('templates/body-end');
				$this->load->view('dr/view-b-inc');
				$this->load->view('templates/footer');
			}
		}

		public function create($action = null)
		{

			if(empty($action)) {
				$this->load->view('templates/header');
				$this->load->view('includes/datepicker-header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('dr/create');
				$this->load->view('templates/body-end');
				$this->load->view('dr/create-b-inc');
				$this->load->view('templates/footer');
			} elseif($action == 'submit') {
				$data = $this->diag_model->add_dr();
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
				} elseif ($action == 'getdrs') {
					$data = $this->diag_model->get_drs();
					echo json_encode($data);
				} elseif ($action == 'getdr') {
					$data = $this->diag_model->get_dr($id);
					echo json_encode($data);
				} elseif ($action == 'getnumrows') {
					$data['num_rows'] = $this->diag_model->count_rows();
					echo json_encode($data);
				} elseif ($action == 'update') {
					$data = $this->diag_model->update_dr();
					echo json_encode($data);
				} elseif ($action == 'deldr') {
					$data = $this->diag_model->del_dr($id);
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
