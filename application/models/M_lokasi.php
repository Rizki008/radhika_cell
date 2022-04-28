<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_lokasi extends CI_Model
{

    public function data_lokasi()
    {
        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('lokasi', $data);
    }
}
