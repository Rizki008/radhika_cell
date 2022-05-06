<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model
{

    public function update_order($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
    }

    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_diproses()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_dikirim()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function diproses_pesanan()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('rinci_transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        return $this->db->get()->row();
    }

    public function proses_kirim()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        return $this->db->get()->result();
    }
}

/* End of file M_pesanan_masuk.php */
