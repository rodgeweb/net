<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {

	function get_job()
	{
		// $this->db->where("tbl_jobs.status", 1);
		$this->db->select('
		a.id, 
		a.job_name, 
		a.job_description, 
		a.job_category_id, 
		a.job_experience_id, 
		a.work_location, 
		a.employment_type_id, 
		a.employer_id, 
		a.job_status_id, 
		a.job_salary_id, 
		b.company_name, 
		c.category_name, 
		d.job_salary
		');
		$this->db->from("tbl_jobs a");
		$this->db->join('tbl_company b', 'b.id = a.employer_id');
		$this->db->join('tbl_job_categories c', 'c.id = a.job_category_id');
		$this->db->join('tbl_job_salary d', 'd.id = a.job_salary_id');
        $query = $this->db->get();
        return $query;
	}

	function set_job($data) {
		$this->db->insert("tbl_jobs", $data);
	}

	function fetch_single_job($id) {
		
		$this->db->where("tbl_jobs.id", $id);
		$this->db->join('tbl_job_categories', 'tbl_job_categories.id = tbl_jobs.job_category_id');
		$this->db->join('tbl_job_experience', 'tbl_job_experience.id = tbl_jobs.job_experience_id');
		$this->db->join('tbl_employment_type', 'tbl_employment_type.id = tbl_jobs.employment_type_id');
		$this->db->join('tbl_company', 'tbl_company.id = tbl_jobs.employer_id');
		$this->db->join('tbl_job_status', 'tbl_job_status.id = tbl_jobs.job_status_id');
		$this->db->join('tbl_job_salary', 'tbl_job_salary.id = tbl_jobs.job_salary_id');
		$query = $this->db->get("tbl_jobs");
		return $query->row();
	}

	function update_job($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("tbl_jobs", $data);
	}

	function update_job_status($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("tbl_jobs", $data);
	}

	function get_job_category(){
		$query = $this->db->get('tbl_job_categories');
		return $query;
	}

	function get_job_experience(){
		$query = $this->db->get('tbl_job_experience');
		return $query;
	}
	
	function get_employment_type(){
		$query = $this->db->get('tbl_employment_type');
		return $query;
	}

	function get_company_name(){
		$query = $this->db->get('tbl_company');
		return $query;
	}
	
	function get_job_status(){
		$query = $this->db->get('tbl_job_status');
		return $query;
	}
	
	function get_job_salary(){
		$query = $this->db->get('tbl_job_salary');
		return $query;
	}
}