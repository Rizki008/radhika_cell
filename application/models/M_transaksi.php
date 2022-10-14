<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
        $this->db->join('lokasi', 'transaksi.id_lokasi = table.id_lokasi', 'left');
    }
    public function transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function simpan_rinci_transaksi($data_rinci)
    {
        $this->db->insert('rinci_transaksi', $data_rinci);
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('rekening');
        return $this->db->get()->result();
    }

    public function pesanan_detail($no_order)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('rinci_transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->where('transaksi.no_order', $no_order);
        return $this->db->get()->result();
    }

    public function pesanan($no_order)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.no_order', $no_order);
        return $this->db->get()->result();
    }

    public function histori()
    {
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.username, pelanggan.no_tlpn');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->group_by('qty');
        return $this->db->get()->result();
    }

    public function grafik()
    {
        $this->db->select_sum('qty');
        $this->db->select('produk.nama_produk');
        //$this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->group_by('rinci_transaksi.id_produk');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    public function grafik_pelanggan()
    {

        // return $this->db->query("SELECT COUNT(transaksi.no_order) as qty, nama, month(tgl_order) FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan GROUP BY transaksi.id_pelanggan")->result();
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.username');
        $this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
    public function grafik_jenis_kel()
    {

        // return $this->db->query("SELECT COUNT(transaksi.no_order) as qty, nama, month(tgl_order) FROM transaksi JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan GROUP BY transaksi.id_pelanggan")->result();
        $this->db->select_sum('qty');
        $this->db->select('pelanggan.jenis_kel');
        $this->db->select('rinci_transaksi.qty');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->group_by('pelanggan.id_pelanggan');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    public function info($no_order)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->group_by('pelanggan.id_pelanggan');

        $this->db->where('no_order', $no_order);
        return $this->db->get()->result();
    }

    public function insert_riview()
    {
        $data = array(
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'id_produk' => $this->input->post('id_produk'),
            // 'ranting' => $this->input->post('ranting'),
            'tanggal' => date('Y-m-d'),
            'isi' => $this->input->post('isi'),
            'status' => 1,
        );
        $this->db->insert('riview', $data);
    }

    //transaksi langsung
    public function produk()
    {
        return $this->db->query("SELECT * FROM `produk` JOIN diskon ON produk.id_produk = diskon.id_produk WHERE produk.id_produk")->result();
    }

    //transaksi langsung
    public function transaksi_langsung()
    {
        $data['pesanan'] = $this->db->query("SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user WHERE type_order='2' AND status_order='0'")->result();
        $data['selesai'] = $this->db->query("SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user WHERE type_order='2' AND status_order='4'")->result();
        return $data;
    }

    public function detail_transaksi_langsung($no_order)
    {
        $data['pesanan'] = $this->db->query("SELECT * FROM rinci_transaksi JOIN transaksi ON rinci_transaksi.no_order=transaksi.no_order JOIN produk ON rinci_transaksi.id_produk=produk.id_produk JOIN diskon ON produk.id_produk=diskon.id_produk WHERE transaksi.no_order='" . $no_order . "';")->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE transaksi.no_order='" . $no_order . "';")->row();
        return $data;
    }
}
