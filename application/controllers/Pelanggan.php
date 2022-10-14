<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
        $this->load->model('m_chatting');
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('username', 'Nama Pelanggan', 'required', array('required' => '%s Mohon Untuk di isi'));
        $this->form_validation->set_rules('email', 'Email ', 'required|is_unique[pelanggan.email]', array(
            'required' => '%s Mohon Untuk di isi',
            'is_unique' => '%s Email Sudah terdaftar'
        ));
        $this->form_validation->set_rules('password', 'Password ', 'required', array('required' => '%s Mohon Untuk di isi'));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password ', 'required|matches[password]', array(
            'required' => '%s Mohon Untuk di isi',
            'matches' => '%s Password Tidak Sama !!!'
        ));
        $this->form_validation->set_rules('no_tlpn', 'No Telpon ', 'required', array('required' => '%s Mohon Untuk di isi'));
        $this->form_validation->set_rules('jenis_kel', 'Jenis Kelamin ', 'required', array('required' => '%s Mohon Untuk di isi'));
        $this->form_validation->set_rules('kode_pos', 'Kode Post ', 'required', array('required' => '%s Mohon Untuk di isi'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array('required' => '%s Mohon Untuk di isi'));


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Registrasi Pelangan',
                'isi' => 'frontend/register/v_register'
            );
            $this->load->view('frontend/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'no_tlpn' => $this->input->post('no_tlpn'),
                'jenis_kel' => $this->input->post('jenis_kel'),
                'kode_pos' => $this->input->post('kode_pos'),
                'alamat' => $this->input->post('alamat'),
            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Registrasi Berhasil, Silahkan Untuk Login');
            redirect('pelanggan/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email ', 'required', array(
            'required' => '%s Mohon Untuk di isi',
        ));
        $this->form_validation->set_rules('password', 'Password ', 'required', array('required' => '%s Mohon Untuk di isi'));

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
        $data = array(
            'title' => 'Login Pelangan',
            'isi' => 'frontend/register/v_register'
        );
        $this->load->view('frontend/v_wrapper', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }
}
