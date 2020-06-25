<?php


function is_logged_in()
{

    $ainu = get_instance();
    if (!$ainu->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ainu->session->userdata('role_id');
        $menu = $ainu->uri->segment(1);

        $queryMenu = $ainu->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ainu->db->get_where(
            'user_access_menu',
            [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]
        );

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{

    $ainu = get_instance();

    $ainu->db->where('role_id', $role_id);
    $ainu->db->where('menu_id', $menu_id);
    $result = $ainu->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked = 'checked'";
    }
}

function convertRupiah($nominal)
{
    $result = "Rp " . number_format($nominal, 0, ',', '.');
    return $result;
}

function rupiah1($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ".", ".");
    return $hasil_rupiah;
}

function rupiah2($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 1, ",", ".");
    return $hasil_rupiah;
}

function rupiah3($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ".", ",");
    return $hasil_rupiah;
}

function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    echo $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
