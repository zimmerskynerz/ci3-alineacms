<?php

defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class ControllerAdminBeranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('operator/validasi/insert_model');
        // $this->load->model('operator/validasi/select_model');
        // $this->load->model('operator/validasi/update_model');
        $this->set_timezone();
        should_auth();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data = array(
            'folder'        => 'post',
            'halaman'       => 'index'
        );
        $this->load->view('admin/include/index', $data);
    }
}
        
    /* End of file  ControllerAdminBeranda.php */
