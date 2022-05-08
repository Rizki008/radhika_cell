<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
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
            'title' => 'Pesanan saya',
            'pesanan' => $this->m_transaksi->belum_bayar(),
            'diproses' => $this->m_transaksi->diproses(),
            'dikirim' => $this->m_transaksi->dikirim(),
            'selesai' => $this->m_transaksi->selesai(),
            // 'batalpesan' => $this->m_transaksi->batalpesan(),
            'rekening' => $this->m_transaksi->rekening(),
            'isi' => 'frontend/cart/v_pesanan_saya'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function bayar($id_transaksi)
    {
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        // $this->form_validation->set_rules('no_rek', 'No Rekening', 'required|min_length[10]|max_length[16]', array(
        // 	'required' => '%s Mohon Untuk Diisi !!!',
        // 	'min_length' => '%s Minumal 10 Nomor !!!',
        // 	'max_length' => '%s Maksimal 16 Nomor !!!'
        // ));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_bayar';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "bukti_bayar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Pembayaran',
                    'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
                    'rekening' => $this->m_transaksi->rekening(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'frontend/cart/v_bayar'
                );
                $this->load->view('frontend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_bayar' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_transaksi' => $id_transaksi,
                    'atas_nama' => $this->input->post('atas_nama'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'jml_bayar' => $this->input->post('jml_bayar'),
                    'status_bayar' => '1',
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                );
                $this->m_transaksi->upload_buktibayar($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil DiUpload !!!');
                redirect('pesanan_saya');
            }
        }

        $data = array(
            'title' => 'Pembayaran',
            'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
            'rekening' => $this->m_transaksi->rekening(),
            'isi' => 'frontend/cart/v_bayar'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function diterima($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 3
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Diterima');
        redirect('pesanan_saya');
    }

    public function dibatalkan($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => 4
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Telah Dibatalkan');
        redirect('pesanan_saya');
    }

    //detail data order
    public function detail($no_order)
    {
        $data = array(
            'title' => 'Pesanan',
            'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_order),
            'info' => $this->m_transaksi->info($no_order),
            'isi' =>  'frontend/cart/v_detail_pesanan'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    //pemesanan selesai deteail & review produk
    public function detail_selesai($no_order)
    {
        $this->form_validation->set_rules('isi', 'Catatan', 'required', array('required' => '%s Mohon untuk Diisi!!!'));
        $this->form_validation->set_rules('nama_pelanggan', 'Catatan', 'required', array('required' => '%s Mohon untuk Diisi!!!'));

        $data = array(
            'title' => 'Pesanan',
            'pesanan_detail' => $this->m_transaksi->pesanan_detail($no_order),
            'info' => $this->m_transaksi->info($no_order),
            'isi' =>  'frontend/cart/v_detail_pesanan_selesai'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function insert_riview()
    {
        $data['insert'] = $this->m_transaksi->insert_riview();
        $this->session->set_flashdata('pesan', 'Berhasil Memberi Riview');
        redirect('pesanan_saya');
    }
}
