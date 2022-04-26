<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

    public function User_login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array('username' => $username, 'password' => $password));
        return $this->db->get()->row();
    }
}
