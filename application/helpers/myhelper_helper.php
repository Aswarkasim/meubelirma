
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('nominal')) {
    function nominal($angka)
    {
        $jd = number_format($angka, 0, ',', '.');
        return $jd;
    }
}

function is_logged_in_user()
{
    $ci = get_instance();
    if (($ci->session->userdata('id_user') == '') && $ci->session->userdata('role') == '') {
        redirect('home/auth');
    }
}

function __is_boolean($table, $where, $id, $field, $value)
{
    $ci = get_instance();
    $data = [
        $field => $value
    ];
    $ci->Crud_model->edit($table, $where, $id, $data);
}


function post($name)
{
    $ci = get_instance();
    $ci->input->post($name);
}

if (!function_exists('convert_number')) {
    function convert_number($no)
    {
        if (!preg_match('/[+0-9]/', trim($no))) {
            //cek apakah no hp karakter 1-3 ada +62
            if (substr(trim($no), 0, 3) == '+62') {
                $hp = trim($no);
            }
            //cek appakah no hp karakter 1 adlah 0
            elseif (substr(trim($no), 0, 1) == '0') {
                $hp = '+62' . substr(trim($no), 1);
            } else {
                $hp = '00000';
            }
            return $hp;
        }
    }
}



if (!function_exists('format_indo')) {
    function format_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

        return $result;
    }
}

function is_read($table, $field = null, $value = null)
{
    $ci = get_instance();
    $data = [
        'is_read' => '1'
    ];
    $ci->Crud_model->edit($table, $field, $value, $data);
}
