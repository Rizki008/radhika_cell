<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_lokasi');
        $this->load->model('m_chatting');
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'grafik' => $this->m_transaksi->grafik(),
            'grafik_langsung' => $this->m_transaksi->grafik_langsung(),
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            'grafik_jenis_kel' => $this->m_transaksi->grafik_jenis_kel(),
            'isi' => 'v_admin'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function lokasi()
    {
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon Untuk Diisi'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting',
                'lokasi' => $this->m_lokasi->data_lokasi(),
                'isi' => 'backend/lokasi/v_lokasi'
            );
            $this->load->view('backend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat' => $this->input->post('alamat'),
            );
            $this->m_lokasi->edit($data);
            $this->session->set_flashdata('pesan', 'Lokasi Toko berhasil di update');
            redirect('admin/lokasi');
        }
    }
}
