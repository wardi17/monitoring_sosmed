<?php
require_once ("../../models/koneksi.php");
$connection = $database->open_connection();

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$tahun = test_input($_POST["tahun"]);
$divisi = test_input($_POST["divisi"]);
$data_full = [];

$query = "SELECT DISTINCT tahun FROM master_video WHERE tahun = '$tahun'";
$sql = odbc_exec($connection, $query);
$rowas = odbc_fetch_array($sql);

if (!empty($rowas)) {
    $bln_k = [];
    $ktg = [];

    $sql = "SELECT DISTINCT angka_bulan FROM master_video WHERE tahun='$tahun'";
	//. ($divisi !== "All" ? " AND divisi='$divisi'" : "");
    $result = odbc_exec($connection, $sql);
    while ($arr = odbc_fetch_array($result)) {
        $bln_k[] = $arr['angka_bulan'];
    }

    $query = "
	SELECT DISTINCT kategory FROM master_video 
WHERE tahun='$tahun'".($divisi !== "All" ? " AND divisi='$divisi'" : "")."
UNION 
SELECT '0'
WHERE NOT EXISTS (
    SELECT 1 FROM master_video WHERE tahun='$tahun'".($divisi !== "All" ? " AND divisi='$divisi'" : "").")";
	
	

	
    $result_k = odbc_exec($connection, $query);
    while ($arr = odbc_fetch_array($result_k)) {
        $ktg[] = $arr['kategory'];
    }


    foreach ($ktg as $ktg_data) {
        $bln_data = ($divisi === "All") ? data_kategory($connection, $tahun, $bln_k, $ktg_data) 
                                       : data_kategory_filter($connection, $tahun, $bln_k, $ktg_data, $divisi);
        $data_full[] = $bln_data;
    }
} else {
    $data_full['error'] = "Tahun belum ada data nya";
}

echo json_encode($data_full);

function data_kategory($conn, $tahun, $bln_k, $ktg) {
    return process_data($conn, $tahun, $bln_k, $ktg, "");
}

function data_kategory_filter($conn, $tahun, $bln_k, $ktg, $divisi) {
    return process_data($conn, $tahun, $bln_k, $ktg, $divisi);
}

function process_data($conn, $tahun, $bln_k, $ktg, $divisi) {
    $rowdata = [];
	
    foreach ($bln_k as $bln) {
        $get_data = get_data($conn, $tahun, $bln, $ktg, $divisi);
        $rowdata[] = $get_data['upload'];
    }

    return [
        'name' => $ktg,
        'data' => array_map('intval', $rowdata)
    ];
}

function get_data($connection, $tahun, $bln, $ktg, $divisi) {
    $divisi_filter = $divisi ? " AND divisi='$divisi'" : "";
    $sql = "SELECT COUNT(kategory) as trs_kategory FROM transaksi_video_upload 
            WHERE YEAR(tanggal) ='$tahun' AND MONTH(tanggal) ='$bln' AND kategory='$ktg' $divisi_filter";
    $result = odbc_exec($connection, $sql);
    $arr = odbc_fetch_array($result);
    
    return ['upload' => $arr['trs_kategory']];
}
