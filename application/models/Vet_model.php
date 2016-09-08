<?php
class Vet_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_vet($id)
	{
		$query = $this->db->get_where('vet', array('vet_id =' => $id));
		return $query->row_array();
	}

	public function get_vets()
	{
		$order = $this->input->get('order');
		if(!empty($order)) { $this->db->order_by($order[0], $order[1]); }
		$query = $this->db->get('vet');
		return $query->result_array();
	}

	public function count_rows()
	{
		$query = $this->db->count_all('vet');
		return $query;
	}

	public function del_vet($id)
	{
		$this->db->where('VET_ID', $id);
		return $this->db->delete('vet');
	}

	public function add_vet()
	{
		$data = array(
			'VET_ID' => $this->input->post('vetid'),
			'F_NAME' => $this->input->post('vetfname'),
			'L_NAME' => $this->input->post('vetlname'),
			'ADDRESS' => $this->input->post('vetaddress'),
			'PHONE' => $this->input->post('vetphone'),
			'SEX' => $this->input->post('vetsex')
		);
		$this->db->insert('vet', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update_vet()
	{
		$id = $this->input->post('vetid');
		$data = array(
			'F_NAME' => $this->input->post('vetfname'),
			'L_NAME' => $this->input->post('vetlname'),
			'ADDRESS' => $this->input->post('vetaddress'),
			'PHONE' => $this->input->post('vetphone'),
			'SEX' => $this->input->post('vetsex')
		);
		$this->db->where('VET_ID', $id);
		$this->db->update('vet', $data);
	}
}
