<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data Pesanan',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
            'isi' => 'backend/transaksi/v_transaksi'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 1
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di proses');
        redirect('pesanan');
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => 2
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di kirim');
        redirect('pesanan');
    }

    public function detail($no_order)
    {
        $data = array(
            'title' => 'Pesanan',
            'pesanan' => $this->m_transaksi->pesanan($no_order),
            'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_order),
            'diproses_pesanan' => $this->m_pesanan_masuk->diproses_pesanan(),
            'proses_kirim' => $this->m_pesanan_masuk->proses_kirim(),
            'isi' =>  'backend/transaksi/v_detail'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
}
