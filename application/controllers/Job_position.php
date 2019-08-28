<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_position extends CI_Controller {

    public function index() {
        $this->view();
    }

    public function view() {
        $meta['title'] ="List of Job Positions";
        $data["positions"] = $this->job_position_model->get_all_position();
        $this->load->view("admin/template/header",$meta);
        $this->load->view("admin/job_position/view",$data);
        $this->load->view("admin/template/footer");
    }

    public function create_position() {
        $this->form_validation->set_rules("job_name", "Job Name", "required");
        $this->form_validation->set_rules("job_description", "Job Description", "required");

        if ($this->form_validation->run()) {
            $data = array(
                "job_name"          => $this->input->post("job_name"),
                "job_description"   => $this->input->post("job_description")
            );

            if ($this->input->post('update_position')) {
                $id = $this->input->post('position_id');
                $this->job_position_model->update_position($data, $id);
				$this->session->set_flashdata('class', 'success');
				$this->session->set_flashdata('message', 'Position has been updated successfully!');
                redirect(base_url()."job_position");
            }else {
                $this->job_position_model->set_position($data);
				$this->session->set_flashdata('class', 'success');
				$this->session->set_flashdata('message', 'New position has been inserted successfully!');
                redirect(base_url()."job_position");
            }

            
        }
    }

    public function edit_position() {
        $id = $this->uri->segment(3);

        $meta['title'] ="List of Job Positions";
        $data["position"] = $this->job_position_model->get_specific_position($id);

        $this->load->view("admin/template/header", $meta);
        $this->load->view("admin/job_position/update_position",$data);
        $this->load->view("admin/template/footer");
    }

    public function success() {
        $this->view();
    }
}