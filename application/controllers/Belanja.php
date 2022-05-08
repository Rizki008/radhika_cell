<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Belanja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Belanja',
            'isi' => 'frontend/cart/v_belanja'
        );
        $this->load->view('frontend/cart/v_belanja', $data, FALSE);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
        );

        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Berhasil Diupdate');
        redirect('belanja');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }

    public function cekout()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();

        $this->form_validation->set_rules('nama_pelanggan', 'Nama Penerima', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('expedisi', 'Expedisi', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('paket', 'Paket', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        $this->form_validation->set_rules('no_tlpn', 'No Telpon', 'required|min_length[11]|max_length[13]', array(
            'required' => '%s Mohon Untuk Diisi !!!',
            'min_length' => '%s Minimal 11 angka !!!',
            'max_length' => '%s Maksimal 13 angka !!!',
        ));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Langsung Beli',
                // 'lokasi' => $this->m_lokasi->lokasi(),
                'isi' => 'frontend/cart/v_cekouth'
            );
            $this->load->view('frontend/cart/v_cekouth', $data, FALSE);
        } else {
            //simpan ke tabel transaksi
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                // 'id_lokasi' => $this->input->post('id_lokasi'),
                'no_order' => $this->input->post('no_order'),
                'tgl_order' => date('Y-m-d'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'no_tlpn' => $this->input->post('no_tlpn'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'paket' => $this->input->post('paket'),
                'expedisi' => $this->input->post('expedisi'),
                'estimasi' => $this->input->post('estimasi'),
                'alamat' => $this->input->post('alamat'),
                'kode_pos' => $this->input->post('kode_pos'),
                'ongkir' => $this->input->post('ongkir'),
                'berat' => $this->input->post('berat'),
                'grand_total' => $this->input->post('grand_total'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => '0',
                'status_order' => '0',
                'catatan' => $this->input->post('catatan'),
            );
            $this->m_transaksi->simpan_transaksi($data);

            //simpan ke tabel rinci transaksi
            $i = 1;
            foreach ($this->cart->contents() as $item) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_produk' => $item['id'],
                    'qty' => $this->input->post('qty' . $i++),
                );

                $this->m_transaksi->simpan_rinci_transaksi($data_rinci);
            }
            $this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
            $this->cart->destroy();
            redirect('pesanan_saya');
        }
    }
}
