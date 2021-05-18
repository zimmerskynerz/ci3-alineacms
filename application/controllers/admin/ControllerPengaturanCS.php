<?php

defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class ControllerPengaturanCS extends CI_Controller
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
        $data_config = $this->db->get_where('config_cs')->row_array();
        $data = array(
            'folder'        => 'setting/cs',
            'halaman'       => 'index',
            // Data SMTP
            'data_config'   => $data_config
        );
        $this->load->view('admin/include/index', $data);
    }
    public function crudcs()
    {
        if (isset($_POST['ubah_cs'])) :
            $no_hp = htmlentities($this->input->post('no_wa'));
            $kode  = substr($no_hp, 1, 13);
            $link  = 'https://api.whatsapp.com/send?phone=62' . $kode . '&text=Assalamualaikum%20Mbk%20Saya%20Mau%20Konsultasi%20Apakah%20Bisa%3F%20&sa=D&source=hangouts&ust=1519264050614000&usg=AFQjCNGGd3GG_uF-bvI5Q3rkEnNjrEr5Jg';
            $data  = array(
                'no_wa'         => $no_hp,
                'link_wa'       => $link,
                'link_ig'       => htmlentities($this->input->post('link_ig')),
                'link_yt'       => htmlentities($this->input->post('link_yt'))
            );
            $this->db->update('config_cs', $data);
            $this->session->set_flashdata('berhasil_update_cs', '<div class="berhasil_update_cs"></div>');
            redirect('administrator/pengaturan/cs');
        endif;
    }
}
        
    /* End of file  ControllerCS.php */
