<?php

use App\Repository\Post\PostRepository;

defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class ControllerAdminBerita extends PostRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/insert_model');
        $this->load->model('admin/select_model');
        $this->load->model('admin/update_model');
        $this->set_timezone();
        $this->table = ['post' => 'tbl_post', 'tags' => 'tbl_tags', 'kategori' => 'tbl_kategori'];
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
    public function kategori()
    {
        $data_kategori = $this->select_model->getDataKategoriPost();
        $data = array(
            'folder'        => 'post',
            'halaman'       => 'kategori',
            // Data kategori
            'data_kategori' => $data_kategori
        );
        $this->load->view('admin/include/index', $data);
    }
    public function crudkategori()
    {
        if (isset($_POST['simpan_kategori'])) :
            $this->insert_model->simpan_kategori();
            $this->session->set_flashdata('berhasil_tambah_kategori', '<div class="berhasil_tambah_kategori"></div>');
            redirect('administrator/post/kategori');
        endif;
        if (isset($_POST['hapus_kategori'])) :
            $this->update_model->hapus_kategori();
            $this->session->set_flashdata('berhasil_hapus_kategori', '<div class="berhasil_hapus_kategori"></div>');
            redirect('administrator/post/kategori');
        endif;
        if (isset($_POST['ubah_kategori'])) :
            $this->update_model->ubah_kategori();
            $this->session->set_flashdata('berhasil_ubah_kategori', '<div class="berhasil_ubah_kategori"></div>');
            redirect('administrator/post/kategori');
        endif;
    }
    public function tags()
    {
        $data_tags = $this->select_model->getDataTagsBerita();
        $data = array(
            'folder'        => 'post',
            'halaman'       => 'tags',
            // Data kategori
            'data_tags' => $data_tags
        );
        $this->load->view('admin/include/index', $data);
    }
    public function crudtags()
    {
        if (isset($_POST['simpan_tags'])) :
            $this->insert_model->simpan_tags();
            $this->session->set_flashdata('berhasil_tambah_tags', '<div class="berhasil_tambah_tags"></div>');
            redirect('administrator/post/tags');
        endif;
        if (isset($_POST['hapus_tags'])) :
            $this->update_model->hapus_tags();
            $this->session->set_flashdata('berhasil_hapus_tags', '<div class="berhasil_hapus_tags"></div>');
            redirect('administrator/post/tags');
        endif;
        if (isset($_POST['ubah_tags'])) :
            $this->update_model->ubah_tags();
            $this->session->set_flashdata('berhasil_ubah_tags', '<div class="berhasil_ubah_tags"></div>');
            redirect('administrator/post/tags');
        endif;
    }

    public function tambah()
    {
        $data = [
            'folder'    => 'post',
            'halaman'   => 'tambah'
        ];
        return $this->load->view('admin/include/index', $data);
    }

    public function storePost()
    {
        parent::type('post')->store([]);

        return redirect('administrator/berita');
    }

    public function uploadImage()
    {
        return false;
    }
}
        
    /* End of file  ControllerAdminBerita.php */
