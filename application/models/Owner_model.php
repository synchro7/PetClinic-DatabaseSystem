<?php
class Owner_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_owner($id)
	{
		$query = $this->db->get_where('owner', array('owner_id =' => $id));
		return $query->row_array();
	}

	public function get_owners()
	{
		$order = $this->input->get('order');
		if(!empty($order)) { $this->db->order_by($order[0], $order[1]); }
		$query = $this->db->get('owner');
		return $query->result_array();
	}

	public function count_rows()
	{
		$query = $this->db->count_all('owner');
		return $query;
	}

	public function del_owner($id)
	{
		$this->db->where('OWNER_ID', $id);
		return $this->db->delete('owner');
	}

	public function add_owner()
	{
		$data = array(
			'OWNER_ID' => $this->input->post('ownerid'),
			'F_NAME' => $this->input->post('ownerfname'),
			'L_NAME' => $this->input->post('ownerlname'),
			'ADDRESS' => $this->input->post('owneraddress'),
			'PHONE' => $this->input->post('ownerphone'),
			'SEX' => $this->input->post('ownersex')
		);
		$this->db->insert('owner', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function update_owner()
	{
		$id = $this->input->post('ownerid');
		$data = array(
			'F_NAME' => $this->input->post('ownerfname'),
			'L_NAME' => $this->input->post('ownerlname'),
			'ADDRESS' => $this->input->post('owneraddress'),
			'PHONE' => $this->input->post('ownerphone'),
			'SEX' => $this->input->post('ownersex')
		);
		$this->db->where('OWNER_ID', $id);
		$this->db->update('owner', $data);
	}
}
