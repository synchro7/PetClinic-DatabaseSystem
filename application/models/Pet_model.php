<?php
class Pet_model extends CI_Model {

		public function __construct()
		{
				$this->load->database();
		}

		public function get_pet($id)
		{
			$query = $this->db->get_where('pet', array('pet_id =' => $id));
			return $query->row_array();
		}

		public function get_pets()
		{
			$query = $this->db->get('pet');
			return $query->result_array();
		}

		public function count_rows()
		{
			$query = $this->db->count_all('pet');
			return $query;
		}

		public function set_news()
		{
			$this->load->helper('url');

			$slug = url_title($this->input->post('title'), 'dash', TRUE);

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
			);

			return $this->db->insert('news', $data);
		}
}
