<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {

    public function view() {
        $meta['title'] = 'List of Employer';
        $data["employers"] = $this->employer_model->get_all_employer();
        $this->load->view("admin/template/header", $meta);
        $this->load->view("admin/employer/view", $data);
        $this->load->view("admin/template/footer");
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

				$this->session->set_flashdata('class', 'success');
				$this->session->set_flashdata('message', 'Employer records has been updated!');
                redirect(base_url() . "employer");
            }else {
                $this->employer_model->set_employer($data);

				$this->session->set_flashdata('class', 'success');
				$this->session->set_flashdata('message', 'New employer record has been added!');
                redirect(base_url() . "employer");
            }            
        }
    }

    public function update_employer() {   

        $id = $this->uri->segment(3);

        $meta['title'] = 'Update Employer';
        $data["employer"] = $this->employer_model->get_specific_employer($id);

        $this->load->view("admin/template/header", $meta);
        $this->load->view("admin/employer/update_employer", $data);
        $this->load->view("admin/template/footer");
    }

    public function update_employer_status() {
        $id = $this->uri->segment(3);
        $data = array(
            "emp_status" => 0
        );

        $this->employer_model->update_employer_status($data, $id);
        $this->session->set_flashdata('class', 'warning');
        $this->session->set_flashdata('message', 'Employer was succesfully disabled.');
        redirect('employer');
    }

}