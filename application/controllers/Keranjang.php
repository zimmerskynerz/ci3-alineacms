<?php

defined('BASEPATH') or exit('No direct script access allowed');
// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com   
class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
        $this->set_timezone();
        $this->load->library('midtrans');
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
}
        
    /* End of file  Keranjang.php */
