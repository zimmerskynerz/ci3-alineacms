<?php defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class Select_model extends CI_Model
{
    function getDataKategoriPost()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_kategori');
        $query = $this->db->where('status', 'ADA');
        $query = $this->db->order_by('nm_kategori', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    function getDataTagsBerita()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_tags');
        $query = $this->db->where('status', 'ADA');
        $query = $this->db->order_by('nm_tags', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    function getProdukKategori()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('produk_kategori as A');
        $query = $this->db->join('tbl_kategori as B', 'A.id_kategori=B.id_kategori');
        $query = $this->db->get();
        return $query->result();
    }
    function getProdukTags()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('produk_tags as A');
        $query = $this->db->join('tbl_tags as B', 'A.id_tags=B.id_tags');
        $query = $this->db->get();
        return $query->result();
    }
}
