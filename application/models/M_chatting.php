<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_chatting extends CI_Model
{

    public function select_chat()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('chatting.id_pelanggan=', $id_pelanggan);
        return $this->db->get()->result();
    }

    public function daftar_chat()
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->group_by('chatting.id_pelanggan');
        return $this->db->get()->result();
    }

    public function pesan($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('chatting.id_pelanggan', $id_pelanggan);
        return $this->db->get()->result();
    }

    public function jml_chatting()
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->group_by('id_pelanggan');
        return $this->db->get()->num_rows();
    }
}
