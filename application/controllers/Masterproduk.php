<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Masterproduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_masterproduk');
    }

    public function kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array('required' => '%s Mohon Untuk Diisi'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/kategori';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Kategori Produk',
                    'kategori' => $this->m_masterproduk->kategori(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'backend/kategori/v_kategori'
                );
                $this->load->view('backend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/kategori' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_kategori' => $this->input->post('nama_kategori'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->m_masterproduk->tambah($data);
                $this->session->set_flashdata('pesan', 'Kategori berhasil di tambah');
                redirect('masterproduk/kategori');
            }
        }
        $data = array(
            'title' => 'Kategori Produk',
            'kategori' => $this->m_masterproduk->kategori(),
            'isi' => 'backend/kategori/v_kategori'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    public function edit($id_kategori = null)
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array('required' => '%s Mohon Untuk Diisi'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/kategori';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Kategori Produk',
                    // 'kategori' => $this->m_masterproduk->kategori(),
                    'kategori' => $this->m_masterproduk->detail_edit($id_kategori),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'backend/kategori/v_edit'
                );
                $this->load->view('backend/v_wrapper', $data, FALSE);
            } else {
                //hapus gambar di folder
                $kategori = $this->m_masterproduk->detail_edit($id_kategori);
                if ($kategori->gambar !== "") {
                    unlink('./assets/kategori/' . $kategori->gambar);
                }
                //end
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/kategori' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_kategori' => $id_kategori,
                    'nama_kategori' => $this->input->post('nama_kategori'),
                    'gambar' => $upload_data['uploads']['file_name']
                );
                $this->m_masterproduk->edit($data);
                $this->session->set_flashdata('pesan', 'Kategori berhasil di Update');
                redirect('masterproduk/kategori');
            }
            $data = array(
                'id_kategori' => $id_kategori,
                'nama_kategori' => $this->input->post('nama_kategori'),
            );
            $this->m_masterproduk->edit($data);
            $this->session->set_flashdata('pesan', 'Kategori berhasil di Update');
            redirect('masterproduk/kategori');
        }
        $data = array(
            'title' => 'Kategori Produk',
            // 'kategori' => $this->m_masterproduk->kategori(),
            'kategori' => $this->m_masterproduk->detail_edit($id_kategori),
            'isi' => 'backend/kategori/v_edit'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    public function hapus($id_kategori = null)
    {
        $data = array(
            'id_kategori' => $id_kategori,
        );
        $this->m_masterproduk->hapus($data);
        $this->session->set_flashdata('pesan', 'Kategori berhasil di Hapus');
        redirect('masterproduk/kategori');
    }

    //produk
    public function produk()
    {
        $data = array(
            'title' => 'Data Produk',
            'produk' => $this->m_masterproduk->produk(),
            'isi' => 'backend/produk/v_produk'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('berat', 'Berat Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('qty', 'Qunatity Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));


        if ($this->form_validation->run() == TRUE) {

            $config['upload_path'] = './assets/produk';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']  = '5000';
            $this->upload->initialize($config);
            $field_name = "images";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' =>  'Tambah Produk',
                    'kategori' => $this->m_masterproduk->kategori(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'backend/produk/v_add'
                );
                $this->load->view('backend/v_wrapper', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/produk' . $upload_data['uploads']['file_name'];
                $this->load->library('upload', $config);
                $data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'qty' => $this->input->post('qty'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'images' => $upload_data['uploads']['file_name'],
                );
                $this->m_masterproduk->add($data);
                $this->session->set_flashdata('pesan', 'Produk Berhasil Ditambah');
                redirect('masterproduk/produk');
            }
        }
        $data = array(
            'title' =>  'Tambah Produk',
            'kategori' => $this->m_masterproduk->kategori(),
            'isi' => 'backend/produk/v_add'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    public function update($id_produk = null)
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('id_kategori', 'Kategori Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('harga', 'Harga Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('berat', 'Berat Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('qty', 'Qunatity Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array('required' => '%s Mohon Untuk Diisi'));


        if ($this->form_validation->run() == TRUE) {

            $config['upload_path'] = './assets/produk';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']  = '5000';
            $this->upload->initialize($config);
            $field_name = "images";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' =>  'Update Produk',
                    'kategori' => $this->m_masterproduk->kategori(),
                    'produk' => $this->m_masterproduk->detail_update($id_produk),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'backend/produk/v_edit'
                );
                $this->load->view('backend/v_wrapper', $data, FALSE);
            } else {
                $produk = $this->m_masterproduk->detail_update($id_produk);
                if ($produk->images !== "") {
                    unlink('./assets/produk/' . $produk->images);
                }
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/produk' . $upload_data['uploads']['file_name'];
                $this->load->library('upload', $config);
                $data = array(
                    'id_produk' => $id_produk,
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'qty' => $this->input->post('qty'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'images' => $upload_data['uploads']['file_name'],
                );
                $this->m_masterproduk->update($data);
                $this->session->set_flashdata('pesan', 'Produk Berhasil DiUpdate');
                redirect('masterproduk/produk');
            }
            $data = array(
                'id_produk' => $id_produk,
                'nama_produk' => $this->input->post('nama_produk'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'berat' => $this->input->post('berat'),
                'qty' => $this->input->post('qty'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->m_masterproduk->update($data);
            $this->session->set_flashdata('pesan', 'Produk Berhasil DiUpdate');
            redirect('masterproduk/produk');
        }
        $data = array(
            'title' =>  'Update Produk',
            'kategori' => $this->m_masterproduk->kategori(),
            'produk' => $this->m_masterproduk->detail_update($id_produk),
            'isi' => 'backend/produk/v_edit'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }

    public function delete($id_produk = null)
    {
        $produk = $this->m_masterproduk->detail_update($id_produk);
        if ($produk->images !== "") {
            unlink('./assets/produk/' . $produk->images);
        }

        $data = array(
            'id_produk' => $id_produk,
        );
        $this->m_masterproduk->delete($data);
        $this->session->set_flashdata('pesan', 'Produk Berhasil Di Delete');
        redirect('masterproduk/produk');
    }

    //promo
    // public function promo()
    // {
    //     $data = array(
    //         'title' => 'Data Promo',
    //         'promo' => $this->m_masterproduk->promo(),
    //         'isi' => 'backend/promo/v_promo'
    //     );
    //     $this->load->view('backend/v_wrapper', $data, FALSE);
    // }
    public function promo()
    {
        $this->form_validation->set_rules('nama_promo', 'Nama promo', 'required', array('required' => '%s Mohon Untuk Diisi'));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Promo Produk',
                'promo' => $this->m_masterproduk->promo(),
                'produk' => $this->m_masterproduk->produk(),
                'isi' => 'backend/promo/v_promo'
            );
            $this->load->view('backend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_produk' => $this->input->post('id_produk'),
                'nama_promo' => $this->input->post('nama_promo'),
                'harga_promo' => $this->input->post('harga_promo'),
                'tanggal' => $this->input->post('tanggal'),
            );
            $this->m_masterproduk->create($data);
            $this->session->set_flashdata('pesan', 'Promo berhasil di tambah');
            redirect('masterproduk/promo');
        }
        $data = array(
            'title' => 'Promo Produk',
            'promo' => $this->m_masterproduk->promo(),
            'produk' => $this->m_masterproduk->produk(),
            'isi' => 'backend/promo/v_promo'
        );
        $this->load->view('backend/v_wrapper', $data, FALSE);
    }
    public function hapus_promo($id_diskon = null)
    {
        $data = array(
            'id_diskon' => $id_diskon,
        );
        $this->m_masterproduk->hapus_promo($data);
        $this->session->set_flashdata('pesan', 'Promo Berhasil Dihapus');
        redirect('masterproduk/promo');
    }
}
