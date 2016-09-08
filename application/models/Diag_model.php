<?php
class Diag_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_dr($id)
	{
		$query = $this->db->get_where('diagnosis_record', array('DR_ID =' => $id));
		return $query->row_array();
	}

	public function get_drs()
	{
		$order = $this->input->get('order');
		if(!empty($order)) { $this->db->order_by($order[0], $order[1]); }
		$query = $this->db->get('diagnosis_record');
		return $query->result_array();
	}

	public function count_rows()
	{
		$query = $this->db->count_all('diagnosis_record');
		return $query;
	}

	public function del_dr($id)
	{
		$this->db->where('DR_ID', $id);
		return $this->db->delete('diagnosis_record');
	}

	public function add_dr()
	{
		$data = array(
			'DR_ID' => $this->input->post('drid'),
			'PET_ID' => $this->input->post('drpet'),
			'VET_ID' => $this->input->post('drvet'),
			'DATE_OF_RECORD' => $this->input->post('drdate'),
			'DETAIL' => $this->input->post('drdetail')
		);
		$this->db->insert('diagnosis_record', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update_dr()
	{
		$id = $this->input->post('drid');
		$data = array(
			'PET_ID' => $this->input->post('drpet'),
			'VET_ID' => $this->input->post('drvet'),
			'DATE_OF_RECORD' => $this->input->post('drdate'),
			'DETAIL' => $this->input->post('drdetail')
		);
		$this->db->where('DR_ID', $id);
		$this->db->update('diagnosis_record', $data);
	}
}
