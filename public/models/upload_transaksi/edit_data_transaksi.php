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

if ($_POST["kode"]){
    $kode = test_input($_POST["kode"]);
    $kategory = test_input($_POST["kategory"]);
    $divisi = test_input($_POST["divisi"]);
    $tanggal = test_input($_POST["tanggal"]);
    $judul = test_input($_POST["judul"]);
    $tujuan = test_input($_POST["tujuan"]);
    $link = test_input($_POST["link"]);
    $ket = test_input($_POST["ket"]);

   
    $sql="UPDATE [transaksi_video_upload] SET kategory = '". $kategory ."', divisi = '". $divisi ."', tanggal = '". $tanggal ."',
     judul ='". $judul ."', tujuan ='". $tujuan ."', link ='". $link ."', ket ='". $ket ."' WHERE kode = '". $kode ."'
 
    "; 
      $result = odbc_exec($connection, $sql);
  
    if(!$result){
      $cek = $cek+1;
    }
    if ($cek==0){
      odbc_commit($connection);
      $status['nilai']=1; //bernilai benar
      $status['error']="Data Berhasil di edit";
    }else{
      odbc_rollback($connection);
      $status['nilai']=0; //bernilai benar
      $status['error']="Data Gagal di edit";
    }
    odbc_close($connection);
    echo json_encode($status);
  }
