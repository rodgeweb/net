<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {

    public function view() {
        $meta['title'] = 'List of Employer';
        $data["companies"] = $this->employer_model->get_all_employer();
        $data['status'] = $this->employer_model->get_status();

        // var_dump($data['status'] = $this->employer_model->get_status());

        $this->load->view("admin/template/header", $meta);
        $this->load->view("admin/employer/view", $data);
        $this->load->view("admin/template/footer");
    }

    public function add_employer() {
        $this->form_validation->set_rules("company_name", "Company Name", "required");
        $this->form_validation->set_rules("company_overview", "Company Overview", "required");
        $this->form_validation->set_rules("company_status", "Employer Status", "required");


        if ($this->form_validation->run() != FALSE) {
            $data = array (
                "company_name" => $this->input->post("company_name"),
                "company_overview" => $this->input->post("company_overview"),
                "company_status" => $this->input->post("company_status")
            );

            if($this->input->post("update_company")){
                $id = $this->input->post("company_id");
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
        }else {
            redirect('employer');
        }
    }

    public function update_employer() {   

        $id = $this->uri->segment(3);

        $meta['title'] = 'Update Employer';
        $data["company"] = $this->employer_model->get_specific_employer($id);
        $data['status'] = $this->employer_model->get_status();

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