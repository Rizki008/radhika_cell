<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chating extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_chatting');
    }

    public function pesan($id_pelanggan)
    {
        $data = array(
            'title' => 'Pesan Masuk',
            'pesan' => $this->m_chatting->pesan($id_pelanggan),
            'isi' => 'backend/chating/v_chatting'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function send()
    {
        $data = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'balas' => $this->input->post('pesan'),
            'pesan' => '0'
        );
        $this->db->insert('chatting', $data);
        redirect('chating/pesan/' . $data['id_pelanggan']);
    }

    public function pesan_pelanggan()
    {
        $this->form_validation->set_rules('pesan', 'Pesan', 'required', array('pesan' => 'pesan harus diisi!!!'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Chatting',
                'chat' => $this->m_chatting->select_chat(),
                'isi' => 'frontend/chating/v_chatting'
            );
            $this->load->view('frontend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'pesan' => $this->input->post('pesan'),
                'balas' => '0'
            );
            $this->db->insert('chatting', $data);
            redirect('chating/pesan_pelanggan');
        }
    }
}
