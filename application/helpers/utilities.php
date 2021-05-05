<?php

// Website ini dibuat dan dikembangkan oleh awbimasakti
// Nama Template : OnlineShop Non-Courir
// Pencipta      : AWBimasakti and Yusuf1bimasakti
// Author        : PT. Bimasakti Indera Gemilang
// Creator       : https://ilmuparanormal.com

if (!function_exists('auth')) {
    function auth()
    {
        $CI = &get_instance();
        $auth = $CI->db->get_where('tbl_login', ['email' => $CI->session->userdata('email'), 'status' => 'AKTIF'])->row();
        return ($auth) ? $auth : false;
    }
}

if (!function_exists('should_auth')) {
    function should_auth()
    {
        return (auth()) ? true : redirect('/login/logout');
    }
}

if (!function_exists('csrf_name')) {
    function csrf_name()
    {
        $CI = &get_instance();
        return $CI->security->get_csrf_token_name();
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token()
    {
        $CI = &get_instance();
        return $CI->security->get_csrf_hash();
    }
}
