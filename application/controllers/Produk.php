<?php

defined('BASEPATH') or exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

class Produk extends CI_Controller
{
    // Website ini dibuat dan dikembangkan oleh awbimasakti
    // Nama Template : OnlineShop Non-Courir
    // Pencipta      : AWBimasakti and Yusuf1bimasakti
    // Author        : PT. Bimasakti Indera Gemilang
    // Creator       : https://ilmuparanormal.com

    public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
        $this->set_timezone();
        $this->load->library('midtrans');
        $this->load->library('veritrans');
        // Midtrans Konfigurasi
        $config_midtrans2     = $this->db->get_where('config_midtrans')->row_array();
        $params               = array('server_key' => $config_midtrans2['server_key'], 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    // Melihat Detail Produk Biasanya linknya adalah www.domain.com/produk/<nama-produk>
    public function detail($id)
    {
        $slug                = $id;
        $data_header         = $this->db->get_where('tbl_sett_topbar')->row_array();
        $data_depan          = $this->db->get_where('config_cs')->row_array();
        $config_laman_home   = $this->db->get_where('config_home')->row_array();
        // Data Laman Home
        $detail_produk       = $this->db->get_where('tbl_produk', ['slug_produk' => $slug])->row_array();
        $produk_pertama      = $this->global_model->produk_pertama();
        $id_produk           = $produk_pertama['id_produk'];
        $data_produk_limit   = $this->global_model->getDataProdukTerbaru($id_produk);
        $data_laris          = $this->global_model->getDataProdukLaris();
        $data_random         = $this->global_model->getDataProdukRandom();
        $config_midtrans     = $this->db->get_where('config_midtrans')->row_array();
        $data_kategori       = $this->db->get_where('tbl_kategori', ['status' => 'ADA'], 7)->result();
        // Cek IP Pelanggan
        $ip_address = $this->input->ip_address();
        $browser    = $this->agent->browser();
        $os         = $this->agent->platform();
        $cek_cart   = $this->db->get_where('rinci_transaksi_baru', ['ip_pelanggan' => $ip_address, 'browser' => $browser, 'OS' => $os])->result();
        $jml_keranjang = count($cek_cart);
        $data = array(
            'config_midtrans'   => $config_midtrans,
            'halaman'           => 'produk',
            // Data Produk Laris
            'produk_laris'      => $data_laris,
            'data_depan'        => $data_depan,
            'awconfig_header'   => $data_header,
            'config_home'       => $config_laman_home,
            // Data Produk limit 7
            'data_kategori'     => $data_kategori,
            'detail_produk'     => $detail_produk,
            'produk_pertama'    => $produk_pertama,
            'data_produk_limit' => $data_produk_limit,
            'data_random'       => $data_random,
            'ip_address'        => $ip_address,
            'browser'           => $browser,
            'os'                => $os,
            'jml_keranjang'     => $jml_keranjang
        );
        $this->load->view('include/index', $data);
    }
    // Membuat token baru untuk transaksi antara website dengan midtrans
    // Dibawah ini token untuk pembelian doa secara langsung atau hanya satu doa saja
    public function token()
    {
        $id_produk = $this->input->post('id_produk');
        $nm_produk = $this->input->post('nm_produk');
        $harga = $this->input->post('harga');
        $nm_pelanggan = $this->input->post('nm_pelanggan');
        $email = $this->input->post('email_aktif');
        $no_hp = $this->input->post('no_hp');
        $nama =  $nm_produk . ' ( ' . $id_produk . ' )';
        $tgl_ini = date('Ymd');
        $order_id = $tgl_ini . rand();
        $this->global_model->transaksi_langsung($id_produk, $harga, $order_id, $nm_pelanggan, $email, $no_hp);
        $transaction_details = array(
            'order_id' => $order_id,
            'gross_amount' => $harga, // no decimal allowed for creditcard
        );
        $item1_details = array(
            'id' => $id_produk,
            'price' =>  $harga,
            'quantity' =>  1,
            'name' => $nama
        );
        $item_details = array($item1_details);

        // Optional
        $customer_details = array(
            'first_name'    => $nm_pelanggan,
            'email'         => $email,
            'phone'         => $no_hp
        );
        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 1
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }
    // Konfirmasi Pembayaran yang dikirim melalui email pelanggan
    // Dibawah ini konfirmasi pembayaran untuk satu produk atau pembelian produk secara langsung
    public function bayarlangsung()
    {
        $result = json_decode($this->input->post('result_data'), true);
        $pdf_url = $result['pdf_url'];
        $link_pdf = $this->_linkPDF($pdf_url);
        $data = array(
            'tgl_kadaluarsa'   => $result['transaction_time'],
            'type_transaksi'   => $result['payment_type'],
            'status_transaksi' => $result['status_code'],
            'pdf_url'          => $link_pdf
        );
        $order_id = $result['order_id'];
        $this->db->where('id_transaksi', $order_id);
        $this->db->update('tbl_transaksi', $data);
        $this->__kirimNotifBayar($order_id, $link_pdf);
        redirect('produk/tracking-transaksi/' . $order_id);
    }
    // Membuat sebuah link untuk cara pembayaran melalui midtrans
    // Untuk pembelian secara langsung atau hanya satu produk sahaja
    private function _linkPDF($pdf_url)
    {
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-ssl.bitly.com/v4/bitlinks');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"domain": "bit.ly",  "long_url": "' . $pdf_url . '"}');

        $headers = array();
        $headers[] = 'Authorization: Bearer ff9ed62768951946879976860f5c6fa079cdfb98';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $bitly = json_decode($result);
        return $bitly->link;
    }
    // Kode untuk mengirim email menggunakan phpmailer
    // Hanya untuk satu pembelian doa atau bayar langsung
    private function __kirimNotifBayar($order_id, $link_pdf)
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->IsHTML(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = '' . $data_config['host'] . '';         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '' . $data_config['username'] . '';                     // SMTP username
        $mail->Password   = '' . $data_config['password'] . '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $data_transaksi   = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $order_id])->row_array();
        $email_konsumen   = $data_transaksi['email'];
        $nm_konsumen      = $data_transaksi['nama'];
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Konfirmasi Pembayaran Doa');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Konfirmasi Pembayaran Doa';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', terimakasih sudah melakukan pembelian doa di <a href="https://ilmuparanormal.com" rel="noopener noreferrer" target="_blank">ilmuparanormal.com</a>, silahkan untuk mengikuti cara memahar doa <a href="' . $link_pdf . '" rel="noopener noreferrer" target="_blank">disini</a> untuk bisa mendapatkan doa yang anda inginkan.</p>';
        $mail->send();
    }
    // Konfirmasi Setelah pembayaran berhasil dilakukan
    // Konfirmasi ini berupa pengiriman link untuk mendownload doa didalam satu transaksi
    // Hanya untuk pembelian secara langsung atau pembelian satu doa
    public function NotifLangsung()
    {
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result, "true");

        $order_id      = $result['order_id'];
        // $order_id      = 20210518701829585;
        $cek_doa     = $this->global_model->cekDataDoa($order_id);
        $jml_doa       = count($cek_doa);
        if ($jml_doa > 1) :
            # code...
            // Jika Membeli menggunakan fitur Keranjang
            $data = array(
                'status_transaksi' => 200
            );
            $this->db->where('id_transaksi', $order_id);
            $this->db->update('tbl_transaksi', $data);
            $this->__KirimDoaKeranjang($order_id);
            echo 'Selamat Datang Keranjang';
        else :
            // Jika Membeli langsung
            $data = array(
                'status_transaksi' => 200
            );
            $this->db->where('id_transaksi', $order_id);
            $this->db->update('tbl_transaksi', $data);
            $this->__KirimDoa($order_id);
            echo 'Selamat Datang Langsung';
        endif;
    }
    // Kode untuk mengirim konfirmasi setelah pembayaran berhasil dilakukan
    // Isi dari email ini memberitahukan link download untuk mengakses doa dalam bentuk pdf
    private function __KirimDoa($order_id)
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->IsHTML(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = '' . $data_config['host'] . '';         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '' . $data_config['username'] . '';                     // SMTP username
        $mail->Password   = '' . $data_config['password'] . '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $data_transaksi   = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $order_id])->row_array();
        $email_konsumen   = $data_transaksi['email'];
        $nm_konsumen      = $data_transaksi['nama'];
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Ki Bagus Wijaya');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Ijazah Doa';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $data_doa         = $this->global_model->getDataRinciDoa($order_id);
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', terimakasih sudah memilih Ki Bagus Wijaya sebagai guru paranormal anda, oleh sebab itu, Ki Bagus Memberikan Ijazah Doa ' . $data_doa['nm_produk'] . ', silahkan download pada link dibawah ini untuk mendapatkan petunjuk pengamalan doa ' . $data_doa['nm_produk'] . '.</p><br><br><br><br><br><br><a href="' . $data_doa['link_produk'] . '" rel="noopener noreferrer" target="_blank"><img src="https://www.fastpay.co.id/blog/wp-content/uploads/2020/04/Download-Now-Button-PNG-File.png" alt="download" style="width:200px"></a>';
        $mail->send();
    }
    // *Dibawah ini adalah transaksi yang dilakukan menggunakan cart atau keranjang atau doa lebih dari satu
    // Tambah Kerangjang
    public function crudtransaksi()
    {
        if (isset($_POST['tambah_keranjang'])) :
            $slug       = $this->input->post('slug');
            $ip         = $this->input->post('ip_address');
            $browser    = $this->input->post('browser');
            $os         = $this->input->post('os');
            $id_produk  = $this->input->post('id_produk');
            $cek_cart   = $this->db->get_where('rinci_transaksi_baru', ['id_produk' => $id_produk, 'ip_pelanggan' => $ip, 'browser' => $browser, 'OS' => $os])->row_array();
            if ($cek_cart > 0) :
                # code...
                echo 'Doa Sudah Ada di Keranjang';
            else :
                $this->global_model->tambah_keranjang();
            // echo 'Berhasil Menambahkan Doa';
            endif;
            redirect('produk/' . $slug);
        endif;
    }
    public function bayarkeranjang()
    {
        $result = json_decode($this->input->post('result_data'), true);
        $pdf_url = $result['pdf_url'];
        $link_pdf = $this->_linkPDFKeranjang($pdf_url);
        $data = array(
            'tgl_kadaluarsa'   => $result['transaction_time'],
            'type_transaksi'   => $result['payment_type'],
            'status_transaksi' => $result['status_code'],
            'pdf_url'          => $link_pdf
        );
        $order_id = $result['order_id'];
        $this->db->where('id_transaksi', $order_id);
        $this->db->update('tbl_transaksi', $data);
        $this->__kirimNotifBayarKeranjang($order_id, $link_pdf);
        redirect('produk/tracking-transaksi/' . $order_id);
    }
    private function _linkPDFKeranjang($pdf_url)
    {
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-ssl.bitly.com/v4/bitlinks');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"domain": "bit.ly",  "long_url": "' . $pdf_url . '"}');

        $headers = array();
        $headers[] = 'Authorization: Bearer ff9ed62768951946879976860f5c6fa079cdfb98';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $bitly = json_decode($result);
        return $bitly->link;
    }
    private function __kirimNotifBayarKeranjang($order_id, $link_pdf)
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->IsHTML(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = '' . $data_config['host'] . '';         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '' . $data_config['username'] . '';                     // SMTP username
        $mail->Password   = '' . $data_config['password'] . '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $data_transaksi   = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $order_id])->row_array();
        $email_konsumen   = $data_transaksi['email'];
        $nm_konsumen      = $data_transaksi['nama'];
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Konfirmasi Pembayaran Doa');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Konfirmasi Pembayaran Doa';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', terimakasih sudah melakukan pembelian doa di <a href="https://ilmuparanormal.com" rel="noopener noreferrer" target="_blank">ilmuparanormal.com</a>, silahkan untuk mengikuti cara memahar doa <a href="' . $link_pdf . '" rel="noopener noreferrer" target="_blank">disini</a> untuk bisa mendapatkan doa yang anda inginkan.</p>';
        $mail->send();
    }
    private function __KirimDoaKeranjang($order_id)
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->IsHTML(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = '' . $data_config['host'] . '';         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '' . $data_config['username'] . '';                     // SMTP username
        $mail->Password   = '' . $data_config['password'] . '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $data_transaksi   = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $order_id])->row_array();
        $email_konsumen   = $data_transaksi['email'];
        $nm_konsumen      = $data_transaksi['nama'];
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Ki Bagus Wijaya');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Ijazah Doa';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $data_doa         = $this->global_model->getDataRinciDoaKeranjang($order_id);
        $item1_details = array();
        foreach ($data_doa as $Keranjang) :
            # code...
            $item1_details[] = array(
                'name'         => $Keranjang->nm_produk,
                'Link Produk'  => $Keranjang->link_produk
            );
        endforeach;
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', terimakasih sudah memilih Ki Bagus Wijaya sebagai guru paranormal anda, oleh sebab itu, Ki Bagus Memberikan Ijazah Doa yang akan bermanfaat bagi anda, silahkan download pada link dibawah ini untuk mendapatkan petunjuk pengamalan doa, Berikut ini doa yang Ki Bagus Amalkan kepada anda : .</pre><br><a href="' . $item1_details['link_produk'] . '" rel="noopener noreferrer" target="_blank">' . $item1_details['nm_produk'] . '</a><br><br>Salam Hangat,<br>Ki Bagus Wijaya';
        $mail->send();
    }
}
        
    /* End of file  Produk.php */