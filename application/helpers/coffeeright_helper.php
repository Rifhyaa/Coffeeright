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

function check_role($id_role)
{
    if ($id_role == 1) {
        return 'Admin';
    } else if ($id_role == 2) {
        return 'Member';
    } else {
        return 'Kurir';
    }
}

function hariIndo($hari)
{
    switch ($hari) {
        case 'Sunday':
            return 'Minggu';
        case 'Monday':
            return 'Senin';
        case 'Tuesday':
            return 'Selasa';
        case 'Wednesday':
            return 'Rabu';
        case 'Thursday':
            return 'Kamis';
        case 'Friday':
            return 'Jumat';
        case 'Saturday':
            return 'Sabtu';
        default:
            return 'hari tidak valid';
    }
}

function bulanIndo($bulan)
{
    switch ($bulan) {
        case 'January':
            return 'Januari';
        case 'February':
            return 'Februari';
        case 'March':
            return 'Maret';
        case 'April':
            return 'April';
        case 'May':
            return 'Mei';
        case 'June':
            return 'Juni';
        case 'July':
            return 'Juli';
        case 'August':
            return 'Agustus';
        case 'September':
            return 'September';
        case 'October':
            return 'Oktober';
        case 'November':
            return 'November';
        case 'December':
            return 'Desember';
        default:
            return 'bulan tidak valid';
    }
}

function randomString($length = 3)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
