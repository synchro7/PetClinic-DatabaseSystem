<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pres extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('diag_model');
			$this->load->model('med_model');
			$this->load->model('pres_model');
			$this->load->helper('html');
			$this->load->helper('url');
		}

		public function index()
		{
			$data['pres'] = $this->pres_model->get_press();
			$data['num_rows'] = $this->pres_model->count_rows();
			$this->load->view('templates/header');
			$this->load->view('includes/datatable-header');
			$this->load->view('templates/body-start');
			$this->load->view('includes/menubar');
			$this->load->view('pres/home', $data);
			$this->load->view('templates/body-end');
			$this->load->view('includes/datatable-footer');
			$this->load->view('templates/footer');
		}

		public function view($id = null)
		{
			if(empty($id)){
				show_404();
			} else {
				$data['pres'] = $this->pres_model->get_pres($id);
				$this->load->view('templates/header');
				$this->load->view('includes/datepicker-header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('pres/view', $data);
				$this->load->view('templates/body-end');
				$this->load->view('pres/view-b-inc');
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
				$this->load->view('pres/create');
				$this->load->view('templates/body-end');
				$this->load->view('pres/create-b-inc');
				$this->load->view('templates/footer');
			} elseif($action == 'submit') {
				$data = $this->pres_model->add_pres();
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
				} elseif ($action == 'getpres') {
					$data = $this->pres_model->get_pres($id);
					echo json_encode($data);
				} elseif ($action == 'getnumrows') {
					$data['num_rows'] = $this->pres_model->count_rows();
					echo json_encode($data);
				} elseif ($action == 'update') {
					$data = $this->pres_model->update_pres();
					echo json_encode($data);
				} elseif ($action == 'delpres') {
					$data = $this->pres_model->del_pres($id);
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
