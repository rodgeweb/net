<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model {

    function get_all_company() {
        $this->db->select('a.id, a.company_name, a.company_overview, a.company_status, b.status_name');
        $this->db->from("tbl_company a");
        $this->db->join('tbl_status b', 'b.id = a.company_status');
        $query = $this->db->get();
        return $query;
    }

    function set_company($data) {
        $this->db->insert("tbl_company", $data);
    }

    function get_specific_company($id) {
        $this->db->select('a.id, a.company_name, a.company_overview, a.company_status, b.status_name');
        $this->db->from('tbl_company a');
        $this->db->where("a.id", $id);
        $this->db->join('tbl_status b', 'b.id = a.company_status');
        $query = $this->db->get();
        return $query->row();
    }

    function update_company($data, $id) {
        $this->db->where("id", $id);
        $this->db->update("tbl_company", $data);

    }

    function update_company_status($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_company', $data);
    }

    function get_status() {
        $query = $this->db->get('tbl_status');

        return $query;
    }
}
