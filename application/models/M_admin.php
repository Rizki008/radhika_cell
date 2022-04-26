<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user', 'desc');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('user', $data);
    }
    public function update($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }
    public function FunctionName($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('user');
    }
}
