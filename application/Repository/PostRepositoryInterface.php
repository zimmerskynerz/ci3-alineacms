<?php

namespace App\Repository;

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

interface PostRepositoryInterface
{
    public function getBy($id, $type = 'id');
    public function store(array $content);
    public function update($id, $content);
    public function delete($id);
}
