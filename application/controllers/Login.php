<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->set_timezone();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data_login = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email'), 'status' => 'AKTIF'])->row_array();
        if ($data_login > 0) :
            # code...
            redirect('administrator');
        else :
            $this->load->view('home/login');
        endif;
    }
    public function cek_login()
    {
        $password    = htmlentities($this->input->post('password'));
        $email       = htmlentities($this->input->post('email'));
        $cek_email   = $this->db->get_where('tbl_login', ['email' => $email, 'status' => 'AKTIF'])->row_array();
        if ($cek_email) :
            if (password_verify($password, $cek_email['password'])) :
                // Code
                $data_login = [
                    'id_login' => $cek_email['id_login'],
                    'email' => $cek_email['email'],
                    'status' => $cek_email['status'],
                    'tgl_gabung' => $cek_email['tgl_gabung']
                ];
                $this->session->set_userdata($data_login);
                redirect('administrator');
            else :
                $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Password Salah!</div>');
                redirect('login');
            endif;
        else :
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Email Tidak Ada!</div>');
            redirect('login');
        endif;
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
