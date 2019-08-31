<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer_model extends CI_Model {

    function get_all_employer() {
        // $this->db->where("emp_status", 1);
        $this->db->select('a.id, a.company_name, a.company_overview, a.company_status, b.id, b.status_name');
        $this->db->from("tbl_company a");
        $this->db->join('tbl_status b', 'b.id = a.company_status');
        $query = $this->db->get();
        return $query;
    }

    function set_employer($data) {
        $this->db->insert("tbl_company", $data);
    }

    function get_specific_employer($id) {
        $this->db->where("tbl_company.id", $id);
        $this->db->join('tbl_status', 'tbl_status.id = tbl_company.company_status');
        $query = $this->db->get("tbl_company");
        return $query->row();
    }

    function update_employer($data, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_company", $data);

    }

    function update_employer_status($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_company', $data);
    }

    function get_status() {
        $query = $this->db->get('tbl_status');

        return $query;
    }
}
