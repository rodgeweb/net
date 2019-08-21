<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('job_model');
	}

	public function index()
	{
		$data['get_jobs'] = $this->job_model->get_job();
		$this->load->view('template/header');
		$this->load->view('pages/job_list', $data);
		$this->load->view('template/footer');
	}

	public function select_all_jobs() {
		$this->index();
	}

	public function add_job() {

		$this->form_validation->set_rules("job_name", "Job Name", 'required');
		$this->form_validation->set_rules("job_description", "Job Description", 'required');
		$this->form_validation->set_rules("job_position_id", "Job Position ID", 'required');
		$this->form_validation->set_rules("job_salary", "Job Salary", 'required');
		$this->form_validation->set_rules("job_tenure_id", "Job Tenure ID", 'required');
		$this->form_validation->set_rules("employer_id", "Employer ID", 'required');
		$this->form_validation->set_rules("status", "Status", 'required');

		if ($this->form_validation->run()) {
			$data = array(
				"job_name" 			=> $this->input->post("job_name"),
				"job_description" 	=> $this->input->post("job_description"),
				"job_position_id" 	=> $this->input->post("job_position_id"),
				"job_salary" 		=> $this->input->post("job_salary"),
				"job_tenure_id" 	=> $this->input->post("job_tenure_id"),
				"employer_id" 		=> $this->input->post("employer_id"),
				"status" 			=> $this->input->post("status")

			);

			if ($this->input->post("update")) {

				$id = $this->input->post("specific_job_id");
				
				$this->job_model->update_job($data, $id);
				redirect(base_url()."job/update_success");
			}else {
				$this->job_model->set_job($data);
				redirect (base_url()."job/insert_success");
			}			
		}

		$this->load->view('template/header');
		$this->load->view('pages/add_job');
		$this->load->view('template/footer');
	}

	public function update_job() {
		$job_id = $this->uri->segment(3);

		$data["job_data"] = $this->job_model->fetch_single_job($job_id);

		$this->load->view('template/header');
		$this->load->view("pages/update_job", $data);
		$this->load->view('template/footer');
	}

	public function update_job_status() {
		$data = array("status" => 0);
		$id = $this->uri->segment(3);

		$this->job_model->update_job_status($data, $id);
		redirect(base_url()."job/index");
	}
	
	public function insert_success()
	{
		$this->index();
	}
	
	public function update_success()
	{
		$this->index();
	}
}