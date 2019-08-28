<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {
	
	/**
	 * 
	 * Admin Controller
	 * 
	 */
	public function index()
	{

		$meta['title'] = 'Job Listings';
		$data['get_jobs'] = $this->job_model->get_job();
		$this->load->view('admin/template/header',$meta);
		$this->load->view('admin/job/job_list', $data);
		$this->load->view('admin/template/footer');
	}

	public function add_job() {
		$meta['title'] = 'Add New Job';

		$this->form_validation->set_rules("job_name", "Job Name", 'required');
		$this->form_validation->set_rules("job_description", "Job Description", 'required');
		$this->form_validation->set_rules("job_position_id", "Job Position ID", 'required');
		$this->form_validation->set_rules("job_salary", "Job Salary", 'required');
		$this->form_validation->set_rules("job_tenure_id", "Job Tenure ID", 'required');
		$this->form_validation->set_rules("employer_id", "Employer ID", 'required');
		// $this->form_validation->set_rules("status", "Status", 'required');

		if ($this->form_validation->run()) {
			$data = array(
				"job_name" 			=> $this->input->post("job_name"),
				"job_description" 	=> $this->input->post("job_description"),
				"job_position_id" 	=> $this->input->post("job_position_id"),
				"job_salary" 		=> $this->input->post("job_salary"),
				"job_tenure_id" 	=> $this->input->post("job_tenure_id"),
				"employer_id" 		=> $this->input->post("employer_id"),
				"status" 			=> 1

			);

			if ($this->input->post("update")) {

				$id = $this->input->post("specific_job_id");
				
				$this->job_model->update_job($data, $id);
				$this->session->set_flashdata('class', 'success');
				$this->session->set_flashdata('message', 'Job has been updated successfully!');
				redirect(base_url()."job");
			}else {
				$this->job_model->set_job($data);
				$this->session->set_flashdata('class', 'success');
				$this->session->set_flashdata('message', 'New Job has been inserted successfully!');
				redirect (base_url()."job");
			}			
		}

		$this->load->view('admin/template/header',$meta);
		$this->load->view('admin/job/add_job');
		$this->load->view('admin/template/footer');
	}

	public function update_job() {
		$job_id = $this->uri->segment(3);

		$meta['title'] = 'Job Listings';
		$data["job"] = $this->job_model->fetch_single_job($job_id);

		$this->load->view('admin/template/header', $meta);
		$this->load->view("admin/job/update_job", $data);
		$this->load->view('admin/template/footer');
	}

	public function update_job_status() {
		$data = array("status" => 0);
		$id = $this->uri->segment(3);

		$this->job_model->update_job_status($data, $id);
		$this->session->set_flashdata('class', 'warning');
		$this->session->set_flashdata('message', 'Job has been succesfully disabled.');
		redirect(base_url()."job/index");
	}
	
	/**
	 * 
	 * Front End Controller
	 * 
	 */

// 	public function select_all_jobs() {
// 		$data['get_jobs'] = $this->job_model->get_job();
// 		$this->load->view('admin/template/header');
// 		$this->load->view('admin/job/job_list', $data);
// 		$this->load->view('admin/template/footer');
// 	}
}