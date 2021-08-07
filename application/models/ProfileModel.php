<?php

class ProfileModel extends CI_Model
{
    public function get_all_data_profile()
    {
        $query = "SELECT * FROM profile";
        return $this->db->query($query)->result_array();
    }

    public function profile_get_list($where = null)
    {
        if ($where) {
            $this->db->where($where);
        }
        $q = $this->db->get('profile');
        return $result = $q->num_rows() > 0 ? $q->result_array() : array();
    }
}
