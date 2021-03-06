<?php

defined('BASEPATH') or exit('No direct script access allowed');
// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com   

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
        $this->set_timezone();
        $this->load->library('midtrans');
        $this->load->library('veritrans');
        // Midtrans Konfigurasi
        $config_midtrans2     = $this->db->get_where('config_midtrans')->row_array();
        $params               = array('server_key' => $config_midtrans2['server_key'], 'production' => true);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        // Cek IP Pelanggan
        $ip_address = $this->input->ip_address();
        $browser    = $this->agent->browser();
        $os         = $this->agent->platform();
        $keranjang  = $this->global_model->getDataKeranjang($ip_address, $browser, $os);
        $hrg_ttl    = $this->global_model->getTotalHarga($ip_address, $browser, $os);
        $cek_cart   = $this->db->get_where('rinci_transaksi_baru', ['ip_pelanggan' => $ip_address, 'browser' => $browser, 'OS' => $os])->result();
        $jml_keranjang = count($cek_cart);
        // Data Halaman
        $config_midtrans     = $this->db->get_where('config_midtrans')->row_array();
        $data_header         = $this->db->get_where('tbl_sett_topbar')->row_array();
        $data_depan          = $this->db->get_where('config_cs')->row_array();
        $config_laman_home   = $this->db->get_where('config_home')->row_array();
        $data_kategori       = $this->db->get_where('tbl_kategori', ['status' => 'ADA'], 7)->result();
        // Data Keranjang
        $data = array(
            'config_midtrans'   => $config_midtrans,
            'halaman'           => 'keranjang',
            // Data Produk Laris
            'data_depan'        => $data_depan,
            'awconfig_header'   => $data_header,
            'config_home'       => $config_laman_home,
            // Data Produk limit 7
            'ip_address'        => $ip_address,
            'browser'           => $browser,
            'os'                => $os,
            'jml_keranjang'     => $jml_keranjang,
            'keranjang'         => $keranjang,
            'data_kategori'     => $data_kategori,
            'hrg_ttl'           => $hrg_ttl
        );
        $this->load->view('include/index', $data);
    }
    public function token()
    {
        // Data konsumen atau data pribadi pembeli doa
        $ip_address     = $this->input->post('ip_address');
        $browser        = $this->input->post('browser');
        $os             = $this->input->post('os');
        $nm_pelanggan   = $this->input->post('nm_pelanggan');
        $email          = $this->input->post('email_aktif');
        $no_hp          = $this->input->post('no_hp');
        // $hrg_ttl        = $this->input->post('hrg_ttl');
        // Tanggal melakukan transaksi
        $tgl_ini = date('Ymd');
        // Nomer transaksi atau kode transaksi berupa tanggal+trandom nomer
        $order_id = $tgl_ini . rand();
        // Ambil data semua keranjang
        $keranjang  = $this->global_model->getDataKeranjang($ip_address, $browser, $os);
        $harga_total    = $this->global_model->getTotalHarga($ip_address, $browser, $os);
        $hrg_ttl = $harga_total['jml_harga'];
        $this->global_model->transaksi_keranjang($hrg_ttl, $order_id, $nm_pelanggan, $email, $no_hp, $ip_address, $browser, $os);

        $transaction_details = array(
            'order_id' => $order_id,
            'gross_amount' => $hrg_ttl // no decimal allowed for creditcard
        );
        $item1_details = array();
        foreach ($keranjang as $Keranjang) :
            # code...
            $item1_details[] = array(
                'id'        => $Keranjang->id_produk,
                'price'     =>  $Keranjang->harga,
                'quantity'  =>  1,
                'name'      => $Keranjang->nm_produk
            );
        endforeach;
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
            'item_details'        => $item1_details,
            'customer_details'    => $customer_details,
            'credit_card'         => $credit_card,
            'expiry'              => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }
    public function hapuskeranjang()
    {
        $os             = htmlentities($this->input->post('osos'));
        $browser        = htmlentities($this->input->post('browser'));
        $ip_pelanggan   = htmlentities($this->input->post('ip_pelanggan'));
        $id_produk      = htmlentities($this->input->post('id_produk'));
        $this->db->where('OS', $os);
        $this->db->where('ip_pelanggan', $ip_pelanggan);
        $this->db->where('browser', $browser);
        $this->db->delete('rinci_transaksi_baru');
        redirect('cart');
    }
}
        
    /* End of file  Keranjang.php */
