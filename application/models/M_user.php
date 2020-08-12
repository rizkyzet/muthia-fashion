<?php

class M_user extends CI_Model
{
    public function getUserByLogin()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }
}
