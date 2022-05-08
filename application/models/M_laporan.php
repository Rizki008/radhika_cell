<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('produk', 'produk.id_produk = rinci_transaksi.id_produk', 'left');
        $this->db->where('DAY(transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('produk', 'produk.id_produk = rinci_transaksi.id_produk', 'left');
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('produk', 'produk.id_produk = rinci_transaksi.id_produk', 'left');
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->where('status_bayar=1');
        $this->db->order_by('qty', 'desc');

        return $this->db->get()->result();
    }

    public function lap_stock($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('DAY(transaksi.tgl_order)', $tanggal);
        $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
        $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
        $this->db->order_by('stock', 'desc');
        return $this->db->get()->result();
    }
}

/* End of file M_laporan.php */
