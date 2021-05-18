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

class ControllerPengaturanSMTP extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/insert_model');
        $this->load->model('admin/select_model');
        $this->load->model('admin/update_model');
        $this->load->model('global_model');
        $this->set_timezone();
        should_auth();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data_config = $this->db->get_where('config_smtp')->row_array();
        $data = array(
            'folder'        => 'setting/smtp',
            'halaman'       => 'index',
            // Data SMTP
            'data_config'   => $data_config
        );
        $this->load->view('admin/include/index', $data);
    }
    public function crudsmtp()
    {
        if (isset($_POST['ubah_smtp'])) {
            $data = array(
                'host'     => htmlentities($this->input->post('host')),
                'username' => htmlentities($this->input->post('username')),
                'password' => htmlentities($this->input->post('password')),
                'port'     => htmlentities($this->input->post('port')),
                'setFrom'  => htmlentities($this->input->post('setFrom'))
            );
            $this->db->update('config_smtp', $data);
            $this->session->set_flashdata('berhasil_update_smtp', '<div class="berhasil_update_smtp"></div>');
            redirect('administrator/pengaturan/smtp');
            # code...
        }
    }
    public function ceksmtp()
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = '' . $data_config['host'] . '';         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '' . $data_config['username'] . '';                     // SMTP username
        $mail->Password   = '' . $data_config['password'] . '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $email_konsumen   = 'aw.bimasakti@gmail.com';
        $nm_konsumen      = 'AJI WIJAYA';
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Konfirmasi Pendaftaran');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Konfirmasi Pembayaran';
        $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body    = 'Terima kasih sudah melakukan pembelian ilmu di ilmuparanormal.com, silahkan klik bit.ly/3cTX8jI untuk mendapatkan doa yang anda beli.';
        $mail->send();
        redirect('administrator/pengaturan/smtp');
    }
}
        
    /* End of file  ControllerSMTP.php */
