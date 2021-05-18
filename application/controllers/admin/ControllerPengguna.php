<?php

defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

class ControllerPengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/insert_model');
        $this->load->model('admin/select_model');
        $this->load->model('admin/update_model');
        $this->set_timezone();
        should_auth();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function administrator()
    {
        $data_administrator = $this->db->get_where('tbl_login', ['email !=' => $this->session->userdata('email'), 'status' => 'AKTIF'])->result();
        $data = array(
            'folder'               => 'pengguna/administrator',
            'halaman'              => 'index',
            // Data Administrator
            'data_administrator'   => $data_administrator
        );
        $this->load->view('admin/include/index', $data);
    }
    public function crudadmin()
    {
        if (isset($_POST['simpan_administrator'])) :
            $email    = $this->input->post('email');
            $username = $this->input->post('username');
            // Cek Email
            $cek_email = $this->db->get_where('tbl_login', ['email' => $email, 'status' => 'ADA'])->row_array();
            if ($cek_email > 0) :
                // Cek Username
                $this->session->set_flashdata('gagal_simpan_administrator_email', '<div class="gagal_simpan_administrator_email"></div>');
            else :
                $cek_username = $this->db->get_where('tbl_login', ['username' => $username])->row_array();
                if ($cek_username > 0) :
                    $this->session->set_flashdata('gagal_simpan_administrator_username', '<div class="gagal_simpan_administrator_username"></div>');
                else :
                    $this->insert_model->simpan_administrator();
                    $this->__kirimPenggunaEmail();
                    $this->session->set_flashdata('berhasil_simpan_administrator', '<div class="berhasil_simpan_administrator"></div>');
                endif;
            endif;
            redirect('administrator/pengguna/administrator');
        endif;
        if (isset($_POST['reset_administrator'])) :
            # code...
            $random = $this->__randomPassword();
            $data = array(
                'password' => password_hash($random, PASSWORD_DEFAULT)
            );
            $this->db->where('id_login', $this->input->post('id_login'));
            $this->db->update('tbl_login', $data);
            $this->__kirimResetPassword($random);
            $this->session->set_flashdata('berhasil_reset_administrator', '<div class="berhasil_reset_administrator"></div>');
            redirect('administrator/pengguna/administrator');
        endif;
        if (isset($_POST['hapus_administrator'])) :
            $random = $this->__randomPassword();
            $data = array(
                'status'   => 'BLOKIR'
            );
            $this->db->where('id_login', $this->input->post('id_login'));
            $this->db->update('tbl_login', $data);
            $this->__kirimBlokirData();
            $this->session->set_flashdata('berhasil_hapus_administrator', '<div class="berhasil_hapus_administrator"></div>');
            redirect('administrator/pengguna/administrator');
        endif;
    }
    public function pelanggan()
    {
        $data_pelanggan = $this->db->get_where('tbl_pelanggan')->result();
        $data = array(
            'folder'               => 'pengguna/pelanggan',
            'halaman'              => 'index',
            // Data Administrator
            'data_pelanggan'   => $data_pelanggan
        );
        $this->load->view('admin/include/index', $data);
    }
    private function __kirimPenggunaEmail()
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = '' . $data_config['host'] . '';
        $mail->SMTPAuth   = true;
        $mail->Username   = '' . $data_config['username'] . '';
        $mail->Password   = '' . $data_config['password'] . '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $email_konsumen   = $this->input->post('email');
        $nm_konsumen      = $this->input->post('nm_pengguna');
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Konfirmasi Penembahan Akun');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Konfirmasi Penembahan Akun';
        $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body    = 'Hai, ' . $nm_konsumen . ', Selamat Akun anda sebagai ADMINISTRATOR pada website ilmuparanormal.com sudah berhasil dibuat. Berikut informasi untuk masuk kedalam sistem : ' . PHP_EOL . '' . PHP_EOL . 'https://ilmuparanormal.com/wp-admin' . PHP_EOL . 'Email : ' . $this->input->post('email') . '' . PHP_EOL . 'Password : ' . $this->input->post('password') . '' . PHP_EOL . '' . PHP_EOL . 'Terimakasih, ' . PHP_EOL . '' . PHP_EOL . 'Master IT';
        $mail->send();
    }
    private function __randomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 20; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    private function __kirimResetPassword($random)
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = '' . $data_config['host'] . '';
        $mail->SMTPAuth   = true;
        $mail->Username   = '' . $data_config['username'] . '';
        $mail->Password   = '' . $data_config['password'] . '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $email_konsumen   = $this->input->post('email');
        $nm_konsumen      = $this->input->post('nm_pengguna');
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Konfirmasi Reset Password');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Konfirmasi Reset Password';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body    = 'Hai, ' . $nm_konsumen . ', Password Akun anda telah diperbarui. Berikut informasi untuk masuk kedalam sistem : ' . PHP_EOL . '' . PHP_EOL . 'https://ilmuparanormal.com/wp-admin' . PHP_EOL . 'Email : ' . $this->input->post('email') . '' . PHP_EOL . 'Password : ' . $random . '' . PHP_EOL . '' . PHP_EOL . 'Terimakasih, ' . PHP_EOL . '' . PHP_EOL . 'Master IT';
        $mail->send();
    }
    private function __kirimBlokirData()
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = '' . $data_config['host'] . '';
        $mail->SMTPAuth   = true;
        $mail->Username   = '' . $data_config['username'] . '';
        $mail->Password   = '' . $data_config['password'] . '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $email_konsumen   = $this->input->post('email');
        $nm_konsumen      = $this->input->post('nm_pengguna');
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Konfirmasi Reset Password');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Konfirmasi Reset Password';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body    = 'Hai, ' . $nm_konsumen . ', mohon maaf akun anda sudah kami blokir, untuk aktifkan kembali, silahkan hubungi Master IT.' . PHP_EOL . '' . PHP_EOL . 'Terimakasih, ' . PHP_EOL . '' . PHP_EOL . 'Master IT';
        $mail->send();
    }
}
        
    /* End of file  ControllerPengguna.php */
