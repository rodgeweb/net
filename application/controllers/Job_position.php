<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_position extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model("job_position_model");
    }

    public function index() {
        $this->view();
    }

    public function view() {
        $data["positions"] = $this->job_position_model->get_all_position();
        $this->load->view("template/header");
        $this->load->view("job_position_view/view",$data);
        $this->load->view("template/footer");
    }

    public function create_position() {
        $this->form_validation->set_rules("job_name", "Job Name", "required");
        $this->form_validation->set_rules("job_description", "Job Description", "required");

        if ($this->form_validation->run()) {
            $data = array(
                "job_name"          => $this->input->post("job_name"),
                "job_description"   => $this->input->post("job_description")
            );

            $this->job_position_model->set_position($data);
            redirect(base_url()."job_position/success");
        }
    }

    public function edit_position() {
        $id = $this->uri->segment(3);

        $data["positions"] = $this->job_position_model->get_specific_position($id);

        $this->load->view("template/header");
        $this->laod->view("job_position_view/update_position", $data);
        $this->load->view("template/footer");
    }

    public function success() {
        $this->view();
    }
}