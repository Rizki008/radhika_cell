<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_langsung extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_chatting');
    }

    public function index()
    {
        $data = array(
            'title' => 'Transaksi Langsung',
            'produk' => $this->m_transaksi->produk(),
            'transaksi' => $this->m_transaksi->transaksi_langsung(),
            'isi' => 'backend/transaksi_langsung/v_transaksi_langsung'
        );
        $this->load->view('backend/v_wrapper', $data);
    }
    public function add_to_cart()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan Dikeranjang!');
        redirect('transaksi_langsung');
    }
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('transaksi_langsung');
    }
    public function pesan_langsung()
    {
        $data = array(
            'no_order' => $this->input->post('no_order'),
            'id_user' => $this->session->userdata('id_user'),
            'tgl_order' => date('Y-m-d'),
            'total_bayar' => $this->input->post('total'),
            'status_order' => '4',
            'type_order' => '2',
            'bukti_bayar' => '0'
        );
        $this->m_transaksi->transaksi($data);


        //menyimpan pesanan ke detail transaksi
        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $data_rinci = array(
                'no_order' => $this->input->post('no_order'),
                'id_produk' => $item['id'],
                'qty' => $this->input->post('qty' . $i++),
            );
            $this->m_transaksi->simpan_rinci_transaksi($data_rinci);
        }

        $this->cart->destroy();
        redirect('transaksi_langsung');
    }

    public function detail_pesanan_langsung($no_order)
    {
        $data = array(
            'title' => 'Detail Transaksi Langsung',
            'detail' => $this->m_transaksi->detail_transaksi_langsung($no_order),
            'isi' => 'backend/transaksi_langsung/v_detail_pesanan_langsung'
        );
        $this->load->view('backend/v_wrapper', $data);
    }
    public function selesai()
    {
        $data = array(
            'title' => 'Transaksi Selesai',
            'transaksi' => $this->m_transaksi->transaksi_langsung(),
            'isi' => 'backend/transaksi_langsung/v_selesai'
        );
        $this->load->view('backend/v_wrapper', $data);
    }
    public function konfirmasi_selesai($id)
    {

        $status_order = array(
            'status_order' => '4'
        );
        $this->m_pesanan_masuk->update_order($status_order);
        $this->session->set_flashdata('success', 'Pesanan Sudah Selesai');
        redirect('transaksi_langsung/selesai');
    }
}

/* End of file cTransaksiLangsung.php */
