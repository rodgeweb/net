<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {

	function get_job()
	{
		$this->db->where("status", 1);
        $query = $this->db->get("tbl_job_post");
        return $query;
	}

	function set_job($data) {
		$this->db->insert("tbl_job_post", $data);
	}

	function fetch_single_job($id) {
		$this->db->where("id", $id);
		$query = $this->db->get("tbl_job_post");
		return $query->row();
	}

	function update_job($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("tbl_job_post", $data);
	}

	function update_job_status($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("tbl_job_post", $data);
	}
}