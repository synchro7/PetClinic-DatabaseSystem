<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Owner extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('pet_model');
			$this->load->model('owner_model');
			$this->load->helper('html');
			$this->load->helper('url');
		}

		public function index()
		{
			$data['owners'] = $this->owner_model->get_owners();
			$data['num_rows'] = $this->owner_model->count_rows();
			$this->load->view('templates/header');
			$this->load->view('includes/datatable-header');
			$this->load->view('templates/body-start');
			$this->load->view('includes/menubar');
			$this->load->view('owner/home', $data);
			$this->load->view('templates/body-end');
			$this->load->view('includes/datatable-footer');
			$this->load->view('templates/footer');
		}

		public function view($id = null)
		{
			if(empty($id)){
				show_404();
			} else {
				$data['owner'] = $this->owner_model->get_owner($id);
				$data['pets'] = $this->pet_model->get_pets_by_owner($id);
				$this->load->view('templates/header');
				$this->load->view('includes/datatable-header');
				$this->load->view('includes/datepicker-header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('owner/view', $data);
				$this->load->view('templates/body-end');
				$this->load->view('owner/view-b-inc');
				$this->load->view('includes/datatable-footer');
				$this->load->view('templates/footer');
			}
		}

		public function create($action = null)
		{

			if(empty($action)) {
				$this->load->view('templates/header');
				$this->load->view('templates/body-start');
				$this->load->view('includes/menubar');
				$this->load->view('owner/create');
				$this->load->view('templates/body-end');
				$this->load->view('owner/create-b-inc');
				$this->load->view('templates/footer');
			} elseif($action == 'submit') {
				$data = $this->owner_model->add_owner();
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
				} elseif ($action == 'getowner') {
					$data['owner'] = $this->owner_model->get_owner($id);
					$data['id'] = $id;
					echo json_encode($data);
				} elseif ($action == 'getowners') {
					$data['owners'] = $this->owner_model->get_owners();
					echo json_encode($data);
				} elseif ($action == 'delowner') {
					$data = $this->owner_model->del_owner($id);
					echo json_encode($data);
				} elseif ($action == 'update') {
					$data = $this->owner_model->update_owner();
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
