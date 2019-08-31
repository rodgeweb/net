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
		if(!$this->session->userdata('logged_in')){

			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('message', 'You have no permission to this page!');

			redirect('users/login');
		}
		$meta['title'] = 'Job Listings';
		$data['get_jobs'] = $this->job_model->get_job();

		$this->load->view('admin/template/header',$meta);
		$this->load->view('admin/job/job_list', $data);
		$this->load->view('admin/template/footer');
	}

	public function add_job() {
		if(!$this->session->userdata('logged_in')){

			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('message', 'You have no permission to this page!');

			redirect('users/login');
		}
		$meta['title'] = 'Add New Job';

		$this->form_validation->set_rules("job_name", "Job Name", 'required');
		$this->form_validation->set_rules("job_description", "Job Description", 'required');
		$this->form_validation->set_rules("job_category_id", "Job Category", 'required');
		$this->form_validation->set_rules("job_experience_id", "Job Experience", 'required');
		$this->form_validation->set_rules("work_location", "Work Location", 'required');
		$this->form_validation->set_rules("employment_type_id", "Employment Type", 'required');
		$this->form_validation->set_rules("employer_id", "Employer / Company", 'required');
		$this->form_validation->set_rules("job_status_id", "Job Status", 'required');
		$this->form_validation->set_rules("job_salary", "Job Salary", 'required');

		if ($this->form_validation->run()) {
			$data = array(
				"job_name" 				=> $this->input->post("job_name"),
				"job_description" 		=> $this->input->post("job_description"),
				"job_category_id" 		=> $this->input->post("job_category_id"),
				"job_experience_id" 	=> $this->input->post("job_experience_id"),
				"work_location" 		=> $this->input->post("work_location"),
				"employment_type_id" 		=> $this->input->post("employment_type_id"),
				"employer_id" 			=> $this->input->post("employer_id"),
				"job_status_id" 		=> $this->input->post("job_status_id"),
				"job_salary_id" 		=> $this->input->post("job_salary")

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
		
		// Get Job Category, Company name, Employment Type
		$data['job_category'] = $this->job_model->get_job_category();
		$data['job_experience'] = $this->job_model->get_job_experience();
		$data['employment_type'] = $this->job_model->get_employment_type();
		$data['company_name'] = $this->job_model->get_company_name();
		$data['job_status'] = $this->job_model->get_job_status();
		$data['job_salary'] = $this->job_model->get_job_salary();

		$this->load->view('admin/template/header',$meta);
		$this->load->view('admin/job/add_job', $data);
		$this->load->view('admin/template/footer');
	}

	public function update_job() {
		if(!$this->session->userdata('logged_in')){

			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('message', 'You have no permission to this page!');

			redirect('users/login');
		}
		$job_id = $this->uri->segment(3);

		$meta['title'] = 'Job Listings';
		$data["job"] = $this->job_model->fetch_single_job($job_id);
		
		// Get Job Category, Company name, Employment Type
		$data['job_category'] = $this->job_model->get_job_category();
		$data['job_experience'] = $this->job_model->get_job_experience();
		$data['employment_type'] = $this->job_model->get_employment_type();
		$data['company_name'] = $this->job_model->get_company_name();
		$data['job_status'] = $this->job_model->get_job_status();
		$data['job_salary'] = $this->job_model->get_job_salary();

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

	public function view_job() {
		if(!$this->session->userdata('logged_in')){

			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('message', 'You have no permission to this page!');

			redirect('users/login');
		}

		$job_id = $this->uri->segment(3);

		if($job_id === NULL) {
			redirect('job');
		}

		$data['job'] = $this->job_model->fetch_single_job($job_id);

		$meta['title'] = $data['job']->job_name;

		$this->load->view('admin/template/header', $meta);
		$this->load->view("admin/job/view_job", $data);
		$this->load->view('admin/template/footer');

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