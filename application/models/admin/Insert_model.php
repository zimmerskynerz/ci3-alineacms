<?php defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class Insert_model extends CI_Model
{
    function ubah_topbar()
    {
        $config['upload_path']   = './assets/setting';
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('icon')) :
            $icon = htmlentities($this->input->post('icon_lama'));
        else :
            $_FILES['file']['name'] = $_FILES['icon']['name'];
            $_FILES['file']['type'] = $_FILES['icon']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['icon']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['icon']['size'];
            $uploadDataIcon = $this->upload->data();
            $icon = $uploadDataIcon['file_name'];
            $ads_lama = htmlentities($this->input->post('icon_lama'));
            unlink('./assets/setting/' . $ads_lama . '');
        endif;
        if (!$this->upload->do_upload('logo_1')) :
            $logo1 = htmlentities($this->input->post('logo_1_lama'));
        else :
            $_FILES['file']['name'] = $_FILES['logo_1']['name'];
            $_FILES['file']['type'] = $_FILES['logo_1']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['logo_1']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['logo_1']['size'];
            $uploadDataLogo_1 = $this->upload->data();
            $logo1 = $uploadDataLogo_1['file_name'];
            $ads_lama = htmlentities($this->input->post('logo_1_lama'));
            unlink('./assets/setting/' . $ads_lama . '');
        endif;
        if (!$this->upload->do_upload('logo_2')) :
            $logo2 = htmlentities($this->input->post('logo_2_lama'));
        else :
            $_FILES['file']['name'] = $_FILES['logo_2']['name'];
            $_FILES['file']['type'] = $_FILES['logo_2']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['logo_2']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['logo_2']['size'];
            $uploadDataLogo_2 = $this->upload->data();
            $logo2 = $uploadDataLogo_2['file_name'];
            $ads_lama = htmlentities($this->input->post('logo_2_lama'));
            unlink('./assets/setting/' . $ads_lama . '');
        endif;
        if (!$this->upload->do_upload('ads_1')) :
            $ads_1 = htmlentities($this->input->post('ads_1_lama'));
        else :
            $_FILES['file']['name'] = $_FILES['ads_1']['name'];
            $_FILES['file']['type'] = $_FILES['ads_1']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ads_1']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['ads_1']['size'];
            $uploadDataAds_1 = $this->upload->data();
            $ads_1 = $uploadDataAds_1['file_name'];
            $ads_lama = htmlentities($this->input->post('ads_1_lama'));
            unlink('./assets/setting/' . $ads_lama . '');
        endif;
        if (!$this->upload->do_upload('ads_2')) :
            $ads_2 = htmlentities($this->input->post('ads_2_lama'));
        else :
            $_FILES['file']['name'] = $_FILES['ads_2']['name'];
            $_FILES['file']['type'] = $_FILES['ads_2']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ads_2']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['ads_2']['size'];
            $uploadDataAds_2 = $this->upload->data();
            $ads_2 = $uploadDataAds_2['file_name'];
            $ads_lama = htmlentities($this->input->post('ads_2_lama'));
            unlink('./assets/setting/' . $ads_lama . '');
        endif;
        $data = array(
            'jdl_web'       => htmlentities($this->input->post('jdl_web')),
            'desc_web'      => htmlentities($this->input->post('desc_web')),
            'icon_web'      => $icon,
            'logo_1'        => $logo1,
            'logo_2'        => $logo2,
            'ads_1'         => $ads_1,
            'ads_2'         => $ads_2,
            'link_ads1'     => htmlentities($this->input->post('link_ads1')),
            'link_ads2'     => htmlentities($this->input->post('link_ads2'))
        );
        $this->db->update('tbl_sett_topbar', $data);
    }
    function menu_baru()
    {
        $data = array(
            'id_menu'     => '',
            'nm_menu'     => htmlentities($this->input->post('nm_menu')),
            'urut'        => htmlentities($this->input->post('urut')),
            'ket_menu'    => htmlentities($this->input->post('ket_menu')),
            'id_menu_sub' => null,
            'link_menu'   => htmlentities($this->input->post('link_menu')),
            'status'      => 'ADA'
        );
        $this->db->insert('tbl_sett_menu', $data);
    }
    function sub_menu_baru()
    {
        $data = array(
            'id_menu'     => '',
            'nm_menu'     => htmlentities($this->input->post('nm_menu')),
            'urut'        => htmlentities($this->input->post('urut')),
            'ket_menu'    => htmlentities($this->input->post('ket_menu')),
            'id_menu_sub' => htmlentities($this->input->post('id_menu_sub')),
            'link_menu'   => htmlentities($this->input->post('link_menu')),
            'status'      => 'ADA'
        );
        $this->db->insert('tbl_sett_menu', $data);
    }
    function simpan_kategori()
    {
        $kata_dasar = htmlentities($this->input->post('nm_kategori'));
        $slug = url_title($kata_dasar, 'dash', true);
        $data  = array(
            'id_kategori'      => '',
            'slug'             => $slug,
            'nm_kategori'      => $kata_dasar,
            'ket_kategori'     => htmlentities($this->input->post('ket_kategori')),
            'status'           => 'ADA',
            'tgl_buat'         => date('Y-m-d')
        );
        $this->db->insert('tbl_kategori', $data);
    }
    function simpan_tags()
    {
        $data = array(
            'id_tags'    => '',
            'nm_tags'    => htmlentities($this->input->post('nm_tags')),
            'status'     => 'ADA'
        );
        $this->db->insert('tbl_tags', $data);
    }
    function simpan_administrator()
    {
        $data = array(
            'id_login'         => '',
            'email'            => htmlentities($this->input->post('email')),
            'password'         => password_hash(htmlentities($this->input->post('password')), PASSWORD_DEFAULT),
            'username'         => htmlentities($this->input->post('username')),
            'nm_pengguna'      => htmlentities($this->input->post('nm_pengguna')),
            'status'           => 'AKTIF',
            'tgl_gabung'       => date('Y-m-d')
        );
        $this->db->insert('tbl_login', $data);
    }
}
