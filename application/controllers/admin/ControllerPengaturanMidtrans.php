<?php

defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com


class ControllerPengaturanMidtrans extends CI_Controller
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
        $data_config = $this->db->get_where('config_midtrans')->row_array();
        $data = array(
            'folder'        => 'setting/midtrans',
            'halaman'       => 'index',
            // Data SMTP
            'data_config'   => $data_config
        );
        $this->load->view('admin/include/index', $data);
    }
    public function crudmidtrans()
    {
        if (isset($_POST['ubah_midtrans'])) :
            $data = array(
                'id_merchan'     => htmlentities($this->input->post('id_merchan')),
                'client_key'     => htmlentities($this->input->post('client_key')),
                'server_key'     => htmlentities($this->input->post('server_key')),
                'snap_js'        => htmlentities($this->input->post('snap_js'))
            );
            $this->db->update('config_midtrans', $data);
            $this->session->set_flashdata('berhasil_update_midtrans', '<div class="berhasil_update_midtrans"></div>');
            redirect('administrator/pengaturan/midtrans');
        endif;
    }
}
        
    /* End of file  ControllerPengaturanMidtrans.php */
