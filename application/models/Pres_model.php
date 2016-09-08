<?php
class Pres_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_pres($id)
	{
		$query = $this->db->get_where('prescription', array('PRE_ID =' => $id));
		return $query->row_array();
	}

	public function get_press()
	{
		$order = $this->input->get('order');
		if(!empty($order)) { $this->db->order_by($order[0], $order[1]); }
		$query = $this->db->get('prescription');
		return $query->result_array();
	}

	public function count_rows()
	{
		$query = $this->db->count_all('prescription');
		return $query;
	}

	public function del_pres($id)
	{
		$this->db->where('PRE_ID', $id);
		return $this->db->delete('prescription');
	}

	public function add_pres()
	{
		$data = array(
			'PRE_ID' => $this->input->post('presid'),
			'DR_ID' => $this->input->post('presdr'),
			'MEDICINE_ID' => $this->input->post('presmed'),
			'TOTAL_PRICE' => $this->input->post('presprice')
		);
		$this->db->insert('prescription', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update_pres()
	{
		$id = $this->input->post('presid');
		$data = array(
			'DR_ID' => $this->input->post('presdr'),
			'MEDICINE_ID' => $this->input->post('presmed'),
			'TOTAL_PRICE' => $this->input->post('presprice')
		);
		$this->db->where('PRE_ID', $id);
		$this->db->update('prescription', $data);
	}
}
