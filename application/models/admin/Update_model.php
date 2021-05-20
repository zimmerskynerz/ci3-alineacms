<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This project was built and developed by awbimasakti
 * 
 * @package OnlineShop Non-Courir
 * @author AWBimasakti <aw.bimasakti@gmail.com>
 * @author ajid2 <yusuf1bimasakti@gmail.com>
 * @copyright 2021 https://ilmuparanormal.com
 */

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

    /**
     * synchronize post category
     *
     * @param int|string $id
     * @param array $exist
     * @param array $new
     * @return void
     */
    public function syncPostCategory($id, array $exist, array $new)
    {
        $deletes = array_diff($exist, $new);
        $inserts = array_diff($new, $exist);

        if (!empty($deletes)) {
            $this->db->where_in('id_kategori', $deletes);
            $this->db->where('id_produk', $id);
            $this->db->delete('produk_kategori');
        }

        if (!empty($inserts)) {
            foreach ($inserts as $insert) {
                $data[] = [
                    'id_produk'     => $id,
                    'id_kategori'   => $insert
                ];
            }
            $this->db->insert_batch('produk_kategori', $data);
        }
    }

    /**
     * synchronize post tags
     *
     * @param int|string $id
     * @param array $exist
     * @param array $new
     * @return void
     */
    public function syncPostTags($id, array $exist, array $new)
    {
        $deletes = array_diff($exist, $new);
        $inserts = array_diff($new, $exist);

        if (!empty($deletes)) {
            $this->db->where_in('id_tags', $deletes);
            $this->db->where('id_produk', $id);
            $this->db->delete('produk_tags');
        }

        if (!empty($inserts)) {
            foreach ($inserts as $insert) {
                $data[] = [
                    'id_produk'     => $id,
                    'id_tags'       => $insert
                ];
            }
            $this->db->insert_batch('produk_tags', $data);
        }
    }

    /**
     * Shorten link with bit.ly API
     *
     * @param string $longURI
     * @return string
     */
    public function shortLink($longURI)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-ssl.bitly.com/v4/bitlinks');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"domain": "bit.ly",  "long_url": "' . $longURI . '"}');

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
