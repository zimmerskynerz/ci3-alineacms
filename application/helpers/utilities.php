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


if (!function_exists('set_flash')) {
    function set_flash(string $name, array $content)
    {
        if (isset($_SESSION['msg_flash'])) {
            unset($_SESSION['msg_flash']);
        }
        $_SESSION['msg_flash'][$name] = json_encode($content);
    }
}

if (!function_exists('flasher')) {
    function flasher($name)
    {
        if (!isset($_SESSION['msg_flash'][$name]))
            return false;

        $msg = json_decode($_SESSION['msg_flash'][$name]);
        echo '<script>toastr["' . $msg[0] . '"]("' . $msg[1] . '")</script>';
        unset($_SESSION['msg_flash'][$name]);
    }
}
