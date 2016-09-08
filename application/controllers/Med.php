<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Med extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('med_model');
			$this->load->helper('html');
			$this->load->helper('url');
		}

		public function index()
		{
			$data['meds'] = $this->med_model->get_meds();
			$data['num_rows'] = $this->med_model->count_rows();
			$this->load->view('templates/header');
			$this->load->view('includes/datatable-header');
			$this->load->view('templates/body-start');
			$this->load->view('includes/menubar');
			$this->load->view('med/home', $data);
			$this->load->view('templates/body-end');
			$this->load->view('includes/datatable-footer');
			$this->load->view('templates/footer');
		}

		public function view($id = null)
		{
			if(empty($id)){
				show_404();
			} else {
				$data['med'] = $this->med_model->get_med($id);
				$this->load->view('templates/header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('med/view', $data);
				$this->load->view('templates/body-end');
				$this->load->view('med/view-b-inc');
				$this->load->view('templates/footer');
			}
		}

		public function create($action = null)
		{
			if(empty($action)) {
				$this->load->view('templates/header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('med/create');
				$this->load->view('templates/body-end');
				$this->load->view('med/create-b-inc');
				$this->load->view('templates/footer');
			} elseif($action == 'submit') {
				$data = $this->med_model->add_med();
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
				} elseif ($action == 'getmed') {
					$data['med'] = $this->med_model->get_med($id);
					echo json_encode($data);
				} elseif ($action == 'getmeds') {
					$data['meds'] = $this->med_model->get_meds();
					echo json_encode($data);
				} elseif ($action == 'delmed') {
					$data = $this->med_model->del_med($id);
					echo json_encode($data);
				} elseif ($action == 'update') {
					$data = $this->med_model->update_med();
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
