<?php defined('BASEPATH') or exit('No direct script access allowed');

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

class Global_model extends CI_Model
{
    function produk_pertama()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_produk');
        $query = $this->db->where('status', 'PUBLISH');
        $query = $this->db->order_by('tgl_publish', 'DESC');
        $query = $this->db->get();
        return $query->row_array();
    }
    function getDataProdukLaris()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('config_produk_laris as A');
        $query = $this->db->join('tbl_produk as B', 'A.id_produk=B.id_produk');
        $query = $this->db->where('B.status', 'PUBLISH');
        $query = $this->db->get();
        return $query->result();
    }
    function getDataProdukTerbaru($id_produk)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_produk');
        $query = $this->db->where('status', 'PUBLISH');
        $query = $this->db->where('id_produk !=', $id_produk);
        $query = $this->db->order_by('tgl_publish', 'DESC');
        $query = $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();
    }
    function getDataProdukRandom()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_produk');
        $query = $this->db->where('status', 'PUBLISH');
        $query = $this->db->order_by('rand()');;
        $query = $this->db->limit(6);
        $query = $this->db->get();
        return $query->result();
    }
    function getDataNotaMax()
    {
        $tgl_ini = date('Y-m-d');
        $query  = $this->db->select('max(id_transaksi) as max_kode');
        $query  = $this->db->from('tbl_transaksi');
        $query  = $this->db->where('tgl_transaksi', $tgl_ini);
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getDataJmlBayar()
    {
        $query  = $this->db->select('sum(harga) as bayaran');
        $query  = $this->db->from('tbl_produk');
        $query  = $this->db->where('status', 'PUBLISH');
        $query  = $this->db->get();
        return $query->row_array();
    }
    function transaksi_langsung($id_produk, $harga, $order_id, $nm_pelanggan, $email, $no_hp)
    {
        $cek_email = $this->db->get_where('tbl_transaksi', ['email' => $email, 'status_transaksi' => 'PROSES'])->row_array();
        if ($cek_email > 0) :
            $order_id_lama = $cek_email['id_transaksi'];
            $this->db->where('id_transaksi', $order_id_lama);
            $this->db->delete('rinci_transaksi');
            $this->db->where('id_transaksi', $order_id_lama);
            $this->db->delete('tbl_transaksi');
            // Tambah Data
            $data_transaksi = array(
                'id_transaksi'     => $order_id,
                'tgl_transaksi'    => date('Y-m-d'),
                'tgl_kadaluarsa'   => null,
                'nama'             => $nm_pelanggan,
                'email'            => $email,
                'no_hp'            => $no_hp,
                'type_transaksi'   => null,
                'jml_bayar'        => $harga,
                'status_transaksi' => 'PROSES',
                'pdf_url'          => null
            );
            $this->db->insert('tbl_transaksi', $data_transaksi);
            $rinci_transaksi = array(
                'id_transaksi'     => $order_id,
                'id_produk'        => $id_produk,
                'harga'            => $harga
            );
            $this->db->insert('rinci_transaksi', $rinci_transaksi);
        else :
            $data_transaksi = array(
                'id_transaksi'     => $order_id,
                'tgl_transaksi'    => date('Y-m-d'),
                'tgl_kadaluarsa'   => null,
                'nama'             => $nm_pelanggan,
                'email'            => $email,
                'no_hp'            => $no_hp,
                'type_transaksi'   => null,
                'jml_bayar'        => $harga,
                'status_transaksi' => 'PROSES',
                'pdf_url'          => null
            );
            $this->db->insert('tbl_transaksi', $data_transaksi);
            $rinci_transaksi = array(
                'id_transaksi'     => $order_id,
                'id_produk'        => $id_produk,
                'harga'            => $harga
            );
            $this->db->insert('rinci_transaksi', $rinci_transaksi);
        endif;
    }
    function getDataIlmu($order_id)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('rinci_transaksi as A');
        $query = $this->db->join('tbl_produk as B', 'A.id_produk=B.id_produk');
        $query = $this->db->where('A.id_transksi', $order_id);
        $query = $this->db->get();
        return $query->result();
    }
    function tambah_keranjang()
    {
        $data = array(
            'id_produk'    => $this->input->post('id_produk'),
            'harga'        => $this->input->post('harga'),
            'ip_pelanggan' => $this->input->post('ip_address'),
            'browser'      => $this->input->post('browser'),
            'OS'           => $this->input->post('os')
        );
        $this->db->insert('rinci_transaksi_baru', $data);
    }
    function getDataKeranjang($ip_address, $browser, $os)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('rinci_transaksi_baru as A');
        $query = $this->db->join('tbl_produk as B', 'A.id_produk=B.id_produk');
        $query = $this->db->where('A.ip_pelanggan', $ip_address);
        $query = $this->db->where('A.browser', $browser);
        $query = $this->db->where('A.OS', $os);
        $query = $this->db->get();
        return $query->result();
    }
    function getTotalHarga($ip_address, $browser, $os)
    {
        $query = $this->db->select('sum(A.harga) as jml_harga');
        $query = $this->db->from('rinci_transaksi_baru as A');
        $query = $this->db->join('tbl_produk as B', 'A.id_produk=B.id_produk');
        $query = $this->db->where('A.ip_pelanggan', $ip_address);
        $query = $this->db->where('A.browser', $browser);
        $query = $this->db->where('A.OS', $os);
        $query = $this->db->get();
        return $query->row_array();
    }
}
