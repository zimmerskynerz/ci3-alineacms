<?php

namespace App\Repository\Post;

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

use App\Repository\PostRepositoryInterface;
use CI_Controller;

class PostRepository extends CI_Controller implements PostRepositoryInterface
{
    protected $table    = [];
    protected $type     = 'post';
    public function __construct()
    {
        parent::__construct();
    }

    public function __call($name, $arguments)
    {
        return $this->{$name}(...$arguments);
    }

    public function getBy($id, $type = 'id')
    {
    }

    public function store(array $content)
    {
        $data = [
            'tgl_terbit'    => date('Y-m-d'),
            'id_login'      => auth()->id_login,
            'slug'          => $_POST['slug'],
            'judul'         => $_POST['judul'],
            'gambar'        => 'Test.png',
            'isi_post'      => $_POST['isi_post'],
            'status'        => 'ADA'
        ];
        $this->db->insert($this->table[$this->type], $data);
        return $this;
    }

    public function update($id, $content)
    {
    }

    public function delete($id)
    {
    }

    public function type($type)
    {
        $this->type = $type;
        return $this;
    }
}
