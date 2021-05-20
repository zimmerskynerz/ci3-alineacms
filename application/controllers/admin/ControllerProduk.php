<?php

use App\Exceptions\CategoryInsertException;
use App\Exceptions\TagInsertException;

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This project was built and developed by awbimasakti
 * 
 * @package OnlineShop Non-Courir
 * @author AWBimasakti <aw.bimasakti@gmail.com>
 * @author ajid2 <yusuf1bimasakti@gmail.com>
 * @copyright 2021 https://ilmuparanormal.com
 */

class ControllerProduk extends CI_Controller
{

    private $relation   = [
        ['tags', ['id_tags', 'nm_tags']],
        ['kategori', ['id_kategori', 'nm_kategori', 'slug']],
    ];

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
        $data = [
            'folder'        => 'produk',
            'halaman'       => 'index',
            'data_kategori' => $this->select_model->getProdukKategori(),
            'data_tags'     => $this->select_model->getProdukTags(),
            'data_produk'   => $this->db->get_where('tbl_produk', ['status' => 'PUBLISH'])->result()
        ];
        return $this->load->view('admin/include/index', $data);
    }

    public function create()
    {
        $data = [
            'folder'        => 'produk',
            'halaman'       => 'tambah_produk',
            'categories'    => $this->db->get_where('tbl_kategori', ['status' => 'ADA'])->result(),
            'tags'          => $this->db->get_where('tbl_tags', ['status' => 'ADA'])->result()
        ];

        return $this->load->view('admin/include/index', $data);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            return redirect('administrator/produk/tambah_produk');

        try {
            $pdf    = (!empty($_FILES['pdf']['name'])) ? $this->uploadFile('pdf', './assets/produk/pdf', 'file')['file_name'] : null;
            $foto   = (!empty($_FILES['gambar']['name'])) ? $this->uploadFile('gambar', './assets/produk/img', 'image')['file_name'] : null;
            if ($pdf) {
                $link = $this->update_model->shortLink('https://ilmuparanormal.com/assets/produk/pdf' . $pdf);
            }
        } catch (Throwable $e) {
            if (!$pdf)
                $link = null;
        }

        $id   = $this->randomString();
        $data = [
            'id_produk'   => $id,
            'slug_produk' => url_title($this->input->post('nm_produk'), '-', true),
            'nm_produk'   => htmlentities($this->input->post('nm_produk')),
            'foto'        => $foto,
            'penjelasan'  => htmlentities($this->input->post('penjelasan')),
            'harga'       => preg_replace("/[^0-9]/", '', $this->input->post('harga')),
            'nm_file'     => $pdf,
            'link_produk' => ($pdf) ? $link : null,
            'status'      => 'PUBLISH',
            'tgl_publish' => date('Y-m-d')
        ];

        try {
            $this->db->insert('tbl_produk', $data);
            $this->insert_model->attachPostCategory($id, $_POST['categories']);
            $this->insert_model->attachPostTag($id, $_POST['tags']);
        } catch (Throwable $e) {
            return redirect($_SERVER['HTTP_REFERER']);
        } catch (CategoryInsertException $e) {
            set_flash('produk', ['error', 'Error saat menambahkan kategori ke produk']);
            return redirect($_SERVER['HTTP_REFERER']);
        } catch (TagInsertException $e) {
            set_flash('produk', ['error', 'Error saat menambahkan tag ke produk']);
            return redirect($_SERVER['HTTP_REFERER']);
        }

        set_flash('produk', ['success', 'Berhasil publish produk']);
        redirect('administrator/produk');
    }

    public function edit($id)
    {
        $data = [
            'folder'        => 'produk',
            'halaman'       => 'detail_produk',
            'categories'    => $this->db->get_where('tbl_kategori', ['status' => 'ADA'])->result(),
            'tags'          => $this->db->get_where('tbl_tags', ['status' => 'ADA'])->result(),
            'produk'        => $this->select_model->produkWith(decrypt_url($id), $this->relation)
        ];

        return $this->load->view('admin/include/index', $data);
    }

    /**
     * @todo Update tags with dynamic creation
     * @param int $id
     * @return void
     */
    public function update($id)
    {
        if (empty($id) || $_SERVER['REQUEST_METHOD'] != 'POST')
            return redirect('administrator/produk');

        $produk = $this->select_model->produkWith($id, $this->relation);

        try {
            $pdf    = (!empty($_FILES['pdf']['name'])) ? $this->uploadFile('pdf', './assets/produk/pdf', 'file', $produk->nm_file)['file_name'] : $produk->nm_file;
            $foto   = (!empty($_FILES['gambar']['name'])) ? $this->uploadFile('gambar', './assets/produk/img', 'image', $produk->foto)['file_name'] : $produk->foto;
            if ($pdf) {
                $link = $this->update_model->shortLink('https://ilmuparanormal.com/assets/produk/pdf' . $pdf);
            }
        } catch (Throwable $e) {
            if (!$pdf)
                $link = $produk->link_produk;
        }

        $data = [
            'slug_produk' => url_title($this->input->post('nm_produk'), '-', true),
            'nm_produk'   => htmlentities($this->input->post('nm_produk')),
            'foto'        => $foto,
            'penjelasan'  => htmlentities($this->input->post('penjelasan')),
            'harga'       => preg_replace("/[^0-9]/", '', $this->input->post('harga')),
            'nm_file'     => $pdf,
            'link_produk' => $link ?? $produk->link_produk,
            'status'      => 'PUBLISH',
            'tgl_publish' => date('Y-m-d')
        ];
        try {
            $this->update_model->syncPostCategory($id, array_column($produk->kategori, 'id_kategori'), $_POST['categories']);
            $this->update_model->syncPostTags($id, array_column($produk->tags, 'id_tags'), $_POST['tags']);

            $this->db->where('id_produk', $id);
            $this->db->update('tbl_produk', $data);
        } catch (Throwable $e) {
            set_flash('produk', ['error', 'Error saat update produk']);
            return redirect($_SERVER['HTTP_REFERER']);
        }

        set_flash('produk', ['success', 'Berhasil update produk']);
        return redirect('administrator/produk');
    }

    public function destroy($id)
    {
        if (empty($id))
            return redirect('administrator/produk');

        $this->db->where('id_produk', $id);
        $this->db->update('tbl_produk', ['status' => 'DELETE']);
        set_flash('produk', ['success', 'Berhasil hapus produk']);

        return redirect('administrator/produk');
    }


    private function uploadFile($file, $path = null, $type = 'image', $oldfile = null)
    {
        $ext    = ['file' => ['pdf', 'doc', 'docx'], 'image' => ['jpg', 'png', 'gif', 'jpeg']];
        $config = [
            'upload_path'   => (is_null($path)) ? './assets/produk/img' : $path,
            'allowed_types' => implode('|', $ext[$type]),
            'encrypt_name'  => true,
            'overwrite'     => true,
            'max_size'      => 10024
        ];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file)) {
            throw new \Exception($this->upload->display_errors() . ' File ' . $file . ' ' . implode('|', $ext[$type]));
        }

        if (file_exists($path . '/' . $oldfile))
            unlink($path . '/' . $oldfile);

        return $this->upload->data();
    }

    private function randomString()
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
