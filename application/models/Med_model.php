<?php
class Med_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_med($id)
	{
		$query = $this->db->get_where('medicine', array('MEDICINE_ID =' => $id));
		return $query->row_array();
	}

	public function get_meds()
	{
		$order = $this->input->get('order');
		if(!empty($order)) { $this->db->order_by($order[0], $order[1]); }
		$query = $this->db->get('medicine');
		return $query->result_array();
	}

	public function count_rows()
	{
		$query = $this->db->count_all('medicine');
		return $query;
	}

	public function del_med($id)
	{
		$this->db->where('MEDICINE_ID', $id);
		return $this->db->delete('medicine');
	}

	public function add_med()
	{
		$data = array(
			'MEDICINE_ID' => $this->input->post('medid'),
			'NAME' => $this->input->post('medname'),
			'PRICE' => $this->input->post('medprice'),
			'DESCRIPTION' => $this->input->post('meddescription')
		);
		$this->db->insert('medicine', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update_med()
	{
		$id = $this->input->post('medid');
		$data = array(
			'NAME' => $this->input->post('medname'),
			'PRICE' => $this->input->post('medprice'),
			'DESCRIPTION' => $this->input->post('meddescription')
		);
		$this->db->where('MEDICINE_ID', $id);
		$this->db->update('medicine', $data);
	}
}
