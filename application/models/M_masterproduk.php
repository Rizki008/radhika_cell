<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_masterproduk extends CI_Model
{
    //kategori
    public function kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }
    public function tambah($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function detail_edit($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('kategori', $data);
    }
    public function hapus($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('kategori');
    }
    //end kategori

    //Produk
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->order_by('id_produk', 'desc');
        return $this->db->get()->result();
    }

    public function id_produk()
    {
        return $this->db->query('SELECT max(id_produk) as id FROM produk')->row();
    }
    public function add($data)
    {
        $this->db->insert('produk', $data);
    }
    public function detail_update($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row();
    }
    public function detail_delete($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('id_produk', $id);
        return $this->db->get()->row();
    }
    public function update($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk');
    }
    //end Produk

    //promo
    public function promo()
    {
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('produk', 'diskon.id_produk = produk.id_produk', 'left');
        $this->db->order_by('id_diskon', 'desc');
        return $this->db->get()->result();
    }
    public function detail_promo($id_diskon)
    {
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->join('produk', 'diskon.id_produk = produk.id_produk', 'left');
        $this->db->where('id_diskon', $id_diskon);
        return $this->db->get()->row();
    }
    public function create($data)
    {
        $this->db->insert('diskon', $data);
    }
    public function edit_promo($data)
    {
        $this->db->where('id_diskon', $data['id_diskon']);
        $this->db->update('diskon', $data);
    }
    public function update_diskon($id, $data)
    {
        $this->db->where('id_diskon', $id);
        $this->db->update('diskon', $data);
    }
    public function hapus_promo($id)
    {
        $this->db->where('id_diskon', $id);
        $this->db->delete('diskon');
    }
    //end promo
}
