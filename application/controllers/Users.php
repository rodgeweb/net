<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function login() {
        $meta['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('admin/template/header', $meta);
            $this->load->view('frontend/user/login');
            // $this->load->view('frontend/template/footer');
            
        }else {
            $passwrod_encrypt = md5($this->input->post('password'));
            $username = $this->input->post('username');

            $user_id = $this->user_model->check_login($username, $passwrod_encrypt);
            if ($user_id) {
                $user_data = array(
                    'user_id' => $user_id->id,
                    'first_name' => $user_id->first_name,
                    'email' => $user_id->email,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'Login successfully!');
                redirect('job');
            }else {
                $this->session->set_flashdata('class', 'danger');
                $this->session->set_flashdata('message', 'Login failed!');
                redirect('users/login');
            }
            
        } 
    }

    public function register() {
        $meta['title'] = 'Sign Up';

        // Get session username and email to match for updating user records
        $username = $this->session->userdata('username');
        $email = $this->session->userdata('email');

        // Input form to be check before validation
        $post_username = $this->input->post('username');
        $post_email = $this->input->post('email');

        if($username != $post_username){
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exist');
        }

        if($email != $post_email) {
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exist');
        }

        
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'matches[password]');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'required');
        

        if($this->form_validation->run()) {
            $passwrod_encrypt = md5($this->input->post('password'));
            $data = array(
                'username'          => $this->input->post('username'),
                'password'          => $passwrod_encrypt,
                'first_name'        => $this->input->post('first_name'),
                'last_name'         => $this->input->post('last_name'),
                'middle_name'       => $this->input->post('middle_name'),
                'email'             => $this->input->post('email'),
                'job_position_id'      => 1,
                'user_status_id'    => 1
            );

            if($this->input->post('update-profile')){
                $this->user_model->update_profile($data);

                $this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'User Updated successfully!');

                redirect('users/profile');
            }else{
                $this->user_model->register_user($data);

                $this->session->set_flashdata('class', 'success');
                $this->session->set_flashdata('message', 'Account created successfully!');

                redirect('users/login');
            }
        }       

        
        $this->load->view('admin/template/header', $meta);
        if ($this->session->userdata('logged_in')){
            $this->load->view('admin/user/update_profile');
        }else {
            $this->load->view('frontend/user/register');
        }
        
        // $this->load->view('frontend/template/footer');
    }

    public function profile(){
        $meta['title'] = 'View Profile';

        $user_id =  $this->session->userdata('user_id');

        $data['user'] = $this->user_model->get_specific_user($user_id);

        $this->load->view('admin/template/header', $meta);
        $this->load->view('admin/user/profile', $data);
        $this->load->view('admin/template/footer');

    }

    public function update_profile() {
        $meta['title'] = 'Update user';

        $user_id =  $this->session->userdata('user_id');

        $data['user'] = $this->user_model->get_specific_user($user_id);

        $this->load->view('admin/template/header', $meta);
        $this->load->view('admin/user/update_profile', $data);
        $this->load->view('admin/template/footer');
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('class', 'success');
        $this->session->set_flashdata('message', 'You are now logged out.');

        redirect('users/login');
    }

    /**
     * 
     * Form Validation CallBacks
     * 
     */
    public function check_username_exist($username) {
        $this->form_validation->set_message('check_username_exist', 'Username already exist. Please choose another one.');

        if($this->user_model->check_username_exist($username)) {
            return true;
        }else {
            return false;
        }
    }

    public function check_email_exist($email) {
        $this->form_validation->set_message('check_email_exist', 'Email already exist. Please choose another one.');

        if($this->user_model->check_email_exist($email)) {
            return true;
        }else {
            return false;
        }
    }
}