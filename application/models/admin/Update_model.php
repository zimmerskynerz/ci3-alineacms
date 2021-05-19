<?php defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class Update_model extends CI_Model
{
    // CRUD Kategori Berita
    function hapus_kategori()
    {
        $data = array(
            'status'    => 'HAPUS'
        );
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('tbl_kategori', $data);
    }
    function ubah_kategori()
    {
        $kata_dasar = htmlentities($this->input->post('nm_kategori'));
        $slug = url_title($kata_dasar, 'dash', true);
        $data = array(
            'slug'      => $slug,
            'nm_kategori'  => htmlentities($this->input->post('nm_kategori')),
            'ket_kategori'  => htmlentities($this->input->post('ket_kategori'))
        );
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('tbl_kategori', $data);
    }
    function hapus_tags()
    {
        $data = array(
            'status'     => 'HAPUS'
        );
        $this->db->where('id_tags', $this->input->post('id_tags'));
        $this->db->update('tbl_tags', $data);
    }
    function ubah_tags()
    {
        $data = array(
            'nm_tags'    => htmlentities($this->input->post('nm_tags'))
        );
        $this->db->where('id_tags', $this->input->post('id_tags'));
        $this->db->update('tbl_tags', $data);
    }
    function upload_sampul_awal()
    {
        $id_produk = decrypt_url($this->input->post('id_produk'));
        $config['upload_path']   = './assets/produk/img';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('gagal_upload_sampul', '<div class="gagal_upload_sampul"></div>');
        } else {
            $_FILES['file']['name'] = $_FILES['foto']['name'];
            $_FILES['file']['type'] = $_FILES['foto']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['foto']['size'];
            $uploadData = $this->upload->data();
            $data = array(
                'foto' => $uploadData['file_name']
            );
            $this->db->where('id_produk', $id_produk);
            $this->db->update('tbl_produk', $data);
            $this->session->set_flashdata('berhasil_upload_sampul', '<div class="berhasil_upload_sampul"></div>');
        }
    }
    function upload_sampul_akhir($foto_lama)
    {
        $id_produk = decrypt_url($this->input->post('id_produk'));
        $config['upload_path']   = './assets/produk/img';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('gagal_upload_sampul', '<div class="gagal_upload_sampul"></div>');
        } else {
            $_FILES['file']['name'] = $_FILES['foto']['name'];
            $_FILES['file']['type'] = $_FILES['foto']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['foto']['size'];
            $uploadData = $this->upload->data();
            $data = array(
                'foto' => $uploadData['file_name']
            );
            $this->db->where('id_produk', $id_produk);
            $this->db->update('tbl_produk', $data);
            $berkas_lama = './assets/produk/img/' . $foto_lama . '';
            unlink($berkas_lama);
            $this->session->set_flashdata('berhasil_upload_sampul', '<div class="berhasil_upload_sampul"></div>');
        }
    }
    function upload_berkas_awal()
    {
        $id_produk = decrypt_url($this->input->post('id_produk'));
        $config['upload_path']   = './assets/produk/pdf';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas')) {
            $this->session->set_flashdata('gagal_upload_berkas', '<div class="gagal_upload_berkas"></div>');
        } else {
            $_FILES['file']['name'] = $_FILES['berkas']['name'];
            $_FILES['file']['type'] = $_FILES['berkas']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['berkas']['size'];
            $uploadData = $this->upload->data();
            $pesan       = 'https://ilmuparanormal.com/assets/produk/pdf' . $uploadData['file_name'] . '';
            $link_pdf      = $this->_cobalink($pesan);
            $data = array(
                'nm_file'     => $uploadData['file_name'],
                'link_produk' => $link_pdf
            );
            $this->db->where('id_produk', $id_produk);
            $this->db->update('tbl_produk', $data);
            $this->session->set_flashdata('berhasil_upload_berkas', '<div class="berhasil_upload_berkas"></div>');
        }
    }
    function upload_berkas_akhir($berkas_lama)
    {
        $id_produk = decrypt_url($this->input->post('id_produk'));
        $config['upload_path']   = './assets/produk/pdf';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('berkas')) {
            $this->session->set_flashdata('gagal_upload_berkas', '<div class="gagal_upload_berkas"></div>');
        } else {
            $_FILES['file']['name'] = $_FILES['berkas']['name'];
            $_FILES['file']['type'] = $_FILES['berkas']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['berkas']['size'];
            $uploadData = $this->upload->data();
            $pesan       = 'https://ilmuparanormal.com/assets/produk/pdf' . $uploadData['file_name'] . '';
            $link_pdf      = $this->_cobalink($pesan);
            $data = array(
                'nm_file'     => $uploadData['file_name'],
                'link_produk' => $link_pdf
            );
            $this->db->where('id_produk', $id_produk);
            $this->db->update('tbl_produk', $data);
            $berkas_lama_hapus = './assets/produk/pdf/' . $berkas_lama . '';
            unlink($berkas_lama_hapus);
            $this->session->set_flashdata('berhasil_upload_berkas', '<div class="berhasil_upload_berkas"></div>');
        }
    }
    private function _cobalink($pesan)
    {
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-ssl.bitly.com/v4/bitlinks');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"domain": "bit.ly",  "long_url": "' . $pesan . '"}');

        $headers = array();
        $headers[] = 'Authorization: Bearer ff9ed62768951946879976860f5c6fa079cdfb98';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $bitly = json_decode($result);
        return $bitly->link;
    }
}
