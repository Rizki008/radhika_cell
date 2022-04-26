<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'user' => $this->m_admin->user(),
            'isi' => 'backend/user/v_user'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->m_admin->add($data);
        $this->session->set_flashdata('pesan', 'User Berhasil Ditambahkan');
        redirect('user');
    }
    public function update($id_user = null)
    {
        $data = array(
            'id_user' => $id_user,
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level'),
        );
        $this->m_admin->update($data);
        $this->session->set_flashdata('pesan', 'User Berhasil Diupdate');
        redirect('user');
    }
    public function delete($id_user = null)
    {
        $data = array(
            'id_user' => $id_user,
        );
        $this->m_admin->delete($data);
        $this->session->set_flashdata('pesan', 'User Berhasil Dihapus');
        redirect('user');
    }
}
