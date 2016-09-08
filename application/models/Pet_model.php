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

	public function get_pets_by_owner($id)
	{
		$query = $this->db->get_where('pet', array('owner_id =' => $id));
		return $query->result_array();
	}

	public function get_pets()
	{
		$order = $this->input->get('order');
		if(!empty($order)) { $this->db->order_by($order[0], $order[1]); }
		$query = $this->db->get('pet');
		return $query->result_array();
	}

	public function count_rows()
	{
		return $this->db->count_all('pet');
	}

	public function add_pet()
	{
		$data = array(
			'PET_ID' => $this->input->post('petid'),
			'OWNER_ID' => $this->input->post('owner'),
			'PET_NAME' => $this->input->post('petname'),
			'DATE_OF_BIRTH' => $this->input->post('DoB'),
			'BREED' => $this->input->post('breed'),
			'SEX' => $this->input->post('sex')
		);
		$this->db->insert('pet', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update_pet()
	{
		$id = $this->input->post('petid');
		$data = array(
			'OWNER_ID' => $this->input->post('owner'),
			'PET_NAME' => $this->input->post('petname'),
			'DATE_OF_BIRTH' => $this->input->post('DoB'),
			'BREED' => $this->input->post('breed'),
			'SEX' => $this->input->post('sex')
		);
		$this->db->where('PET_ID', $id);
		$this->db->update('pet', $data);
	}

	public function del_pet($id)
	{
		$this->db->where('PET_ID', $id);
		return $this->db->delete('pet');
	}
}
