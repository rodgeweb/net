<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer_model extends CI_Model {

    function get_all_employer() {
        $this->db->where("emp_status", 1);
        $query = $this->db->get("tbl_employer");
        return $query;
    }

    function set_employer($data) {
        $this->db->insert("tbl_employer", $data);
    }

    function get_specific_employer($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("tbl_employer");
        return $query->row();
    }

    function update_employer($data, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_employer", $data);

    }

    function update_employer_status($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_employer', $data);
    }
}
