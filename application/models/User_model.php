<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function register_user($data) {
        $this->db->insert('tbl_user', $data);
    }

    function check_login($username, $passwrod_encrypt) {
        $this->db->where('username', $username);
        $this->db->where('password', $passwrod_encrypt);
        $query = $this->db->get('tbl_user');

        if($query->row() == 1) {
            return $query->row();
        }else {
            return false;
        }
    }

    function get_specific_user($user_id){
        $query = $this->db->get_where('tbl_user', array('id' => $user_id));

        return $query->row();
    }

    function update_profile($user) {
        $this->db->update('tbl_user', $user);
    }

    /**
     * 
     * Form Validation CallBacks
     * 
     */

    function check_username_exist($username) {
        $query = $this->db->get_where('tbl_user', array('username' => $username));

        if(empty($query->row())) {
            return true;
        }else {
            return false;
        }
    }

    function check_email_exist($email) {
        $query = $this->db->get_where('tbl_user', array('email' => $email));

        if(empty($query->row())) {
            return true;
        }else {
            return false;
        }
    }

}