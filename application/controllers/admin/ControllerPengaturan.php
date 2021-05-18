<?php

defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class ControllerPengaturan extends CI_Controller
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
    // Menu Topbar
    public function topbar()
    {
        $data_menu   = $this->db->get_where('tbl_sett_menu')->result();
        $menu_utama  = $this->db->get_where('tbl_sett_menu', ['ket_menu' => 'MAIN', 'status' => 'ADA'])->result();
        $sett_web   = $this->db->get_where('tbl_sett_topbar')->row_array();
        $data = array(
            'folder'        => 'setting',
            'halaman'       => 'topbar',
            'data_topbar'   => $sett_web,
            'data_menu'     => $data_menu,
            'menu_utama'    => $menu_utama
        );
        $this->load->view('admin/include/index', $data);
    }
    public function crudtopbar()
    {
        // $this->session->set_flashdata('sukses_kirim_artikel', '<div class="sukses_kirim_artikel"></div>');
        $this->insert_model->ubah_topbar();
        $this->session->set_flashdata('berhasil_merubah_topbar', '<div class="berhasil_merubah_topbar"></div>');
        redirect('administrator/pengaturan/identitas');
    }
    public function crudnavigation()
    {
        if (isset($_POST['menu_baru'])) :
            $this->insert_model->menu_baru();
            $this->session->set_flashdata('berhasil_menu_baru', '<div class="berhasil_menu_baru"></div>');
            redirect('administrator/pengaturan/identitas');
        endif;
        if (isset($_POST['sub_menu_baru'])) :
            $this->insert_model->sub_menu_baru();
            $this->session->set_flashdata('berhasil_sub_menu_baru', '<div class="berhasil_sub_menu_baru"></div>');
            redirect('administrator/pengaturan/identitas');
        endif;
    }
}
        
    /* End of file  ControllerPengaturan.php */
