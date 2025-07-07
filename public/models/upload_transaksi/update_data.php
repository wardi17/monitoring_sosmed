<?php

$cek = 0;
require_once ("../../models/koneksi.php");
$connection =$database->open_connection();


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (!empty($_POST["kode"])) {
 
    $kode = test_input($_POST["kode"]);

   
    $query="SELECT kode,divisi,tanggal,kategory,judul,tujuan,link,ket,nama_document FROM transaksi_video_upload WHERE kode ='".$kode."'
    "; 
    $result_set =odbc_exec($connection,$query);
while(odbc_fetch_row($result_set)){

 
    $data[] = array(
      "kode"=>rtrim(odbc_result($result_set,'kode')),
      "divisi"=>rtrim(odbc_result($result_set,'divisi')),
      "tanggal"=>rtrim(odbc_result($result_set,'tanggal')),
      "kategory"=>rtrim(odbc_result($result_set,'kategory')),
      "judul"=>rtrim(odbc_result($result_set,'judul')),
      "tujuan"=>rtrim(odbc_result($result_set,'tujuan')),
      "link"=>rtrim(odbc_result($result_set,'link')),
      "ket"=>rtrim(odbc_result($result_set,'ket')),
      "nama_document"=>rtrim(odbc_result($result_set,'nama_document')),
    );
  
  
  }
  
  
  if(empty($data)){
    $data = null;
  
    echo json_encode($data);
  }else{
    
    echo json_encode($data);
  }
  }
