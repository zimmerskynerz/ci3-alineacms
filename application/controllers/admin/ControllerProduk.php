<?php

defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class ControllerProduk extends CI_Controller
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
        $data_kategori     = $this->select_model->getProdukKategori();
        $data_tags         = $this->select_model->getProdukTags();
        $data_produk       = $this->db->get_where('tbl_produk')->result();
        // echo "<pre>";
        // var_dump($data_produk);
        // die;
        $data = array(
            'folder'        => 'produk',
            'halaman'       => 'index',
            'data_kategori' => $data_kategori,
            'data_tags'     => $data_tags,
            'data_produk'   => $data_produk
        );
        $this->load->view('admin/include/index', $data);
    }
    public function d_produk($id)
    {
        $id_produk         = decrypt_url($id);
        $data_kategori     = $this->db->get_where('tbl_kategori', ['status' => 'ADA'])->result();
        $data_tags         = $this->select_model->getProdukTags();
        $data_produk = $this->db->get_where('tbl_produk', ['id_produk' => $id_produk])->row_array();
        $data = array(
            'folder'        => 'produk',
            'halaman'       => 'detail_produk',
            // Data Produk
            'data_kategori' => $data_kategori,
            'data_tags'     => $data_tags,
            'data_produk'   => $data_produk
        );
        $this->load->view('admin/include/index', $data);
    }
    public function tambah_produk()
    {
        $random = $this->__randomPassword();
        $data = array(
            'id_produk'   => $random,
            'slug_produk' => null,
            'nm_produk'   => null,
            'foto'        => null,
            'penjelasan'  => null,
            'harga'       => '',
            'nm_file'     => null,
            'link_produk' => null,
            'status'      => 'DRAFT',
            'tgl_tambah'  => date('Y-m-d')
        );
        $this->db->insert('tbl_produk', $data);
        $id = encrypt_url($random);
        redirect('administrator/produk/d_produk/' . $id . '');
    }
    public function crudproduk()
    {
        if (isset($_POST['upload_sampul'])) :
            $id_produk = decrypt_url($this->input->post('id_produk'));
            $data_foto = $this->db->get_where('tbl_produk', ['id_produk' => $id_produk])->row_array();
            if ($data_foto['foto'] == null) :
                $this->update_model->upload_sampul_awal();
            else :
                $foto_lama = $data_foto['foto'];
                $this->update_model->upload_sampul_akhir($foto_lama);
            endif;
            $id = encrypt_url($id_produk);
            redirect('administrator/produk/d_produk/' . $id . '');
        endif;
        if (isset($_POST['upload_pdf'])) :
            $id_produk   = decrypt_url($this->input->post('id_produk'));
            $data_berkas = $this->db->get_where('tbl_produk', ['id_produk' => $id_produk])->row_array();
            if ($data_berkas['nm_file'] == null) :
                $this->update_model->upload_berkas_awal();
            else :
                $berkas_lama = $data_berkas['nm_file'];
                $this->update_model->upload_berkas_akhir($berkas_lama);
            endif;
            $id = encrypt_url($id_produk);
            redirect('administrator/produk/d_produk/' . $id . '');
        endif;
    }
    public function simpan()
    {
        if (isset($_POST['simpan_produk'])) :
            $nm_produk = htmlentities($this->input->post('nm_produk'));
            $slug = url_title($nm_produk, 'dash', true);
            $data = array(
                'slug_produk' => $slug,
                'nm_produk'   => $nm_produk,
                'penjelasan'  => htmlentities($this->input->post('penjelasan')),
                'harga'       => htmlentities($this->input->post('harga')),
                'status'      => 'PUBLISH',
                'tgl_publish' => date('Y-m-d')
            );
            $this->db->where('id_produk', htmlentities($this->input->post('id_produk')));
            $this->db->update('tbl_produk', $data);
            $this->session->set_flashdata('berhasil_publish_produk', '<div class="berhasil_publish_produk"></div>');
            redirect('administrator/produk');
        endif;
        if (isset($_POST['hapus_produk'])) :
            $data = array(
                'status'      => 'DELETE'
            );
            $this->db->where('id_produk', htmlentities($this->input->post('id_produk')));
            $this->db->update('tbl_produk', $data);
            $this->session->set_flashdata('berhasil_hapus_produk', '<div class="berhasil_hapus_produk"></div>');
            redirect('administrator/produk');
        endif;
    }
    private function __randomPassword()
    {
        $alphabet = "123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 9; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
        
    /* End of file  ControllerProduk.php */
