<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
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
            'grafik_pelanggan' => $this->m_transaksi->grafik_pelanggan(),
            'isi' => 'v_pemilik'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }

    public function pelanggan()
    {
        $data = array(
            'title' => 'Data Histori Pemebelain',
            'histori' => $this->m_transaksi->histori(),
            'isi' => 'pemilik/transaksi/v_histori'
        );
        $this->load->view('pemilik/v_wrapper', $data, FALSE);
    }
}
