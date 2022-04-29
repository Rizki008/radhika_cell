<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Belanja extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('m_transaksi');
    // }

    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Belanja',
            'isi' => 'frontend/cart/v_belanja'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
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
                'qty' => $this->input->post($i . ['qty']),
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Berhasil Di update');
        redirect('belanja');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }
}
