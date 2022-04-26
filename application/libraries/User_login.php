<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_auth->user_login($username, $password);
        if ($cek) {
            $username = $cek->username;
            $password = $cek->password;
            $level = $cek->level;

            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('password', $password);
            $this->ci->session->set_userdata('level', $level);

            if ($level == 1) {
                redirect('admin');
            } elseif ($level == 2) {
                redirect('pemilik');
            }
        } else {
            $this->ci->session->set_flashdata('pesan', 'Username Atau Password Salah');
            redirect('auth/user_login');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login, Silahkan Untuk Login');
            redirect('auth/user_login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('id_user');
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('password');
        $this->ci->session->unset_userdata('level');
        $this->ci->session->set_flashdata('pesan', 'Berhasil Logout');
        redirect('auth/logout');
    }
}
