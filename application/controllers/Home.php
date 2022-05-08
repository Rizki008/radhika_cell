
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_chatting');
    }

    public function index()
    {
        $data = array(
            'title' => 'Radhika Celluler',
            'produk' => $this->m_home->produk(),
            'diskon' => $this->m_home->diskon(),
            'best_produk' => $this->m_home->best_produk(),
            'isi' => 'v_home'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }
    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'title' =>  $kategori->nama_kategori,
            'best_produk' => $this->m_home->best_produk(),
            'diskon' => $this->m_home->diskon(),
            'produk' => $this->m_home->produk_all($id_kategori),
            'isi' => 'v_home'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }
    public function detail_produk($id_produk = null)
    {
        $data = array(
            'title' => 'Detail Produk',
            'produk' => $this->m_home->detail_produk($id_produk),
            'diskon' => $this->m_home->diskon(),
            'reletead_produk' => $this->m_home->reletead_produk($id_produk),
            'isi' => 'frontend/detail/v_produk'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }
}
