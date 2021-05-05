<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $this->load->library('user_agent');
        $this->load->helper('html');
        $this->set_timezone();
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
        $cek_cart   = $this->db->get_where('rinci_transaksi_baru', ['ip_pelanggan' => $ip_address, 'browser' => $browser, 'OS' => $os])->result();
        $jml_keranjang = count($cek_cart);
        // Themes
        $data_themes         = $this->db->get_where('config_themes', ['status' => 'AKTIF'])->row_array();
        $data_header         = $this->db->get_where('tbl_sett_topbar')->row_array();
        $data_depan          = $this->db->get_where('config_cs')->row_array();
        $config_laman_home = $this->db->get_where('config_home')->row_array();
        // Data Laman Home
        $produk_pertama      = $this->global_model->produk_pertama();
        $id_produk           = $produk_pertama['id_produk'];
        $data_produk_limit   = $this->global_model->getDataProdukTerbaru($id_produk);
        $data_laris          = $this->global_model->getDataProdukLaris();
        $data_random         = $this->global_model->getDataProdukRandom();
        $data_kategori       = $this->db->get_where('tbl_kategori', ['status' => 'ADA'], 7)->result();
        $data = array(
            'halaman'           => 'home',
            'themes'            => $data_themes,
            // Data Produk Laris
            'produk_laris'      => $data_laris,
            'data_depan'        => $data_depan,
            'awconfig_header'   => $data_header,
            'config_home'       => $config_laman_home,
            // Data Produk limit 7
            'data_kategori'     => $data_kategori,
            'produk_pertama'    => $produk_pertama,
            'data_produk_limit' => $data_produk_limit,
            'data_random'       => $data_random,
            'jml_keranjang'     => $jml_keranjang
        );
        $this->load->view('include/index', $data);
    }
}
