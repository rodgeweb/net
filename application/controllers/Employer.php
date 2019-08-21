<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("employer_model");
    }

    public function index() {
        $this->view();
    }

    public function view() {
        $data["employers"] = $this->employer_model->get_all_employer();
        $this->load->view("template/header");
        $this->load->view("employer/view", $data);
        $this->load->view("template/footer");
    }

    public function add_employer() {
        $this->form_validation->set_rules("employer_name", "Employer Name", "required");
        $this->form_validation->set_rules("employer_description", "Employer Description", "required");
        $this->form_validation->set_rules("employer_status", "Employer Status", "required");
        $this->form_validation->set_rules("agent_id", "Agent ID", "required");


        if ($this->form_validation->run()) {
            $data = array (
                "employer_name" => $this->input->post("employer_name"),
                "employer_description" => $this->input->post("employer_description"),
                "emp_status" => $this->input->post("employer_status"),
                "agent_id" => $this->input->post("agent_id")
            );

            if($this->input->post("update_employer")){
                $id = $this->input->post("employer_id");
                $this->employer_model->update_employer($data, $id);
                redirect(base_url() . "employer/success");
            }else {
                $this->employer_model->set_employer($data);
                redirect(base_url() . "employer/success");
            }            
        }
    }

    public function update_employer() {   

        $id = $this->uri->segment(3);

        $data["specific_employer"] = $this->employer_model->get_specific_employer($id);

        $this->load->view("template/header");
        $this->load->view("employer/update_employer", $data);
        $this->load->view("template/footer");
    }

    public function update_employer_status() {

    }

    public function success() {
        $this->view();
    }

}