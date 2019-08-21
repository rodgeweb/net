<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_position_model extends CI_Model {
    function get_all_position() {
        $query = $this->db->get("job_position");
        return $query;
    }

    function set_position($data) {
        $this->db->insert("job_position",$data);
    }

    function get_specific_position($id) {
        $this->db->where("id", $id);
        $query = $this->db->get("job_position");
        return $query;
    }

    function update_position($data, $id) {
        $this->db->where("id", $id);
        $this->db->update("job_position", $data);
    }
}