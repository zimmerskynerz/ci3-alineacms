<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
        $this->set_timezone();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {


        $ip_address = $this->input->ip_address();
        $browser    = $this->agent->browser();
        $os         = $this->agent->platform();
        // Themes
        $keranjang  = $this->global_model->getDataKeranjang($ip_address, $browser, $os);
        $data_themes         = $this->db->get_where('config_themes', ['status' => 'AKTIF'])->row_array();
        $data_header         = $this->db->get_where('tbl_sett_topbar')->row_array();
        $data_depan          = $this->db->get_where('config_cs')->row_array();
        $config_laman_home = $this->db->get_where('config_home')->row_array();
        $cek_cart   = $this->db->get_where('rinci_transaksi_baru', ['ip_pelanggan' => $ip_address, 'browser' => $browser, 'OS' => $os])->result();
        $jml_keranjang = count($cek_cart);
        $data_kategori       = $this->db->get_where('tbl_kategori', ['status' => 'ADA'], 7)->result();
        $no_nota = htmlentities($this->input->post('kode_transaksi'));
        if ($no_nota != null) :
            $data_doa  = $this->global_model->getDataDoaPelanggan($no_nota);
            $data_nota = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $no_nota])->row_array();
        else :
            $data_doa  = 'Tidak Ada';
            $data_nota = 'Tidak Ada';
        endif;
        $data = array(
            'halaman'           => 'nota',
            'themes'            => $data_themes,
            // Data Produk Laris
            'data_depan'        => $data_depan,
            'awconfig_header'   => $data_header,
            'config_home'       => $config_laman_home,
            'jml_keranjang'     => $jml_keranjang,
            'data_kategori'     => $data_kategori,
            'keranjang'         => $keranjang,
            'data_doa'          => $data_doa,
            'data_nota'         => $data_nota
        );
        $this->load->view('include/index', $data);
    }
}
        
    /* End of file  Nota.php */
