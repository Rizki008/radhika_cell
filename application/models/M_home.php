<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->where('stock>=1');
        $this->db->order_by('produk.id_produk', 'desc');
        $this->db->limit(6);
        return $this->db->get()->result();
    }

    public function kategori_produk()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }
    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }

    public function produk_all($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->where('produk.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }

    public function diskon()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->where('harga_promo>=1 and stock >=1');
        $this->db->order_by('produk.id_produk', 'desc');
        return $this->db->get()->result();
    }

    public function best_produk()
    {
        $this->db->select_sum('qty');
        $this->db->select('diskon.harga_promo,produk.images, produk.nama_produk, produk.harga, produk.id_produk');
        $this->db->from('rinci_transaksi');
        $this->db->join('produk', 'rinci_transaksi.id_produk = produk.id_produk', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->group_by('rinci_transaksi.id_produk');
        $this->db->limit(6);
        return $this->db->get()->result();
    }

    public function detail_produk($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
        $this->db->where('produk.id_produk', $id_produk);
        return $this->db->get()->row();
    }

    public function reletead_produk($id_produk)
    {
        return $this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left')->where(array('produk.id_produk' => $id_produk))->limit(6)->get('produk')->result();
    }

    public function reviews($id_produk)
    {
        $this->db->select('*');
        $this->db->from('riview');
        $this->db->join('pelanggan', 'riview.id_pelanggan = pelanggan.id_pelanggan', 'left');

        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->result();
    }
}
