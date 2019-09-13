<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public function view() {
        $meta['title'] = 'List of company';
        $data["companies"] = $this->company_model->get_all_company();
        $data['status'] = $this->company_model->get_status();

        // var_dump($data['status'] = $this->company_model->get_status());

        $this->load->view("admin/template/header", $meta);
        $this->load->view("admin/company/view", $data);
        $this->load->view("admin/template/footer");
    }

    public function view_specific_company() {
        $slug = $this->uri->segment(3);
        
        $data['company'] = $this->company_model->get_specific_company($slug);

        $meta['title'] = $data['company']->company_name;

        $this->load->view("admin/template/header", $meta);
        $this->load->view("admin/company/view_specific_company", $data);
        $this->load->view("admin/template/footer");
    }

    public function add_company() {
        
        $meta['title'] = 'Add New company';
        // $data["companies"] = $this->company_model->get_all_company();
        $data['status'] = $this->company_model->get_status();

        $this->form_validation->set_rules("company_name", "Company Name", "required");
        $this->form_validation->set_rules("company_overview", "Company Overview", "required");
        $this->form_validation->set_rules("company_status", "company Status", "required");
        // $this->form_validation->set_rules("company_logo", 'Company Logo', "required");


        if ($this->form_validation->run() != FALSE) {

            $slug = strtolower(url_title($this->input->post('company_name')));

            // Upload Company Logo
            $config['upload_path'] = './assets/images/company';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
            $config['max_size'] = '2048';
            $image_name = date("mdY-his").'-'.$slug;
            $file_extension = pathinfo($_FILES["company_logo"]["name"], PATHINFO_EXTENSION);
            $config['file_name'] = $image_name;

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('company_logo')) {
                $errors = array('error' => $this->upload->display_errors());
                $image_name = 'noimage.jpg';
            }else {
                $image_data = array('upload_data' => $this->upload->data());
            }

            $data = array (
                "company_name" => $this->input->post("company_name"),
                "company_slug_name" => $slug,
                "company_overview" => $this->input->post("company_overview"),
                'company_logo_path' => 'assets/images/company/'.$image_name.'.'.$file_extension,
                "company_status" => $this->input->post("company_status")
            );

            

            if($this->input->post("update_company")){
                $id = $this->input->post("company_id");

                $this->company_model->update_company($data, $id);

				$this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'company records has been updated!');
                redirect(base_url() . "company");
            }else {
                $this->company_model->set_company($data);

				$this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'New company record has been added!');
                redirect(base_url() . "company");
            }            
        }

        $this->load->view("admin/template/header", $meta);
        $this->load->view("admin/company/add_company", $data);
        $this->load->view("admin/template/footer");
    }

    public function update_company() {   

        $slug = $this->uri->segment(3);

        $meta['title'] = 'Update company';
        $data["company"] = $this->company_model->get_specific_company($slug);
        $data['status'] = $this->company_model->get_status();

        $this->load->view("admin/template/header", $meta);
        $this->load->view("admin/company/update_company", $data);
        $this->load->view("admin/template/footer");
    }

    public function update_company_status() {
        $slug = $this->uri->segment(3);
        $data = array(
            "company_status" => 2
        );

        $this->company_model->update_company_status($data, $slug);
        $this->session->set_flashdata('class', 'warning');
        $this->session->set_flashdata('message', 'company was succesfully disabled.');
        redirect('company');
    }

}