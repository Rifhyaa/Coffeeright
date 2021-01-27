<?php

function is_logged_in()
{
    // Instansiasi CI untuk mendapat session
    $ci = get_instance();

    // Cek user sudah login atau belum
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }
    // Cek role untuk mengakses controller
    else {
        $id_role = $ci->session->userdata('id_role');
        $menu = $ci->uri->segment(1);

        // Isi Controller untuk admin
        $array = ['kategori', 'admin'];

        foreach ($array as $arr) {
            if ($menu == $arr && $id_role != 1) {
                redirect('auth/blocked');
            }
        }
    }
}
