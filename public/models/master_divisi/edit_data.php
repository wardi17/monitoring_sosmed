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

if (!empty($_POST["kode"] && $_POST["nama"])) {
    $kode_divisi = test_input($_POST["kode"]);
    $nama_divisi = test_input($_POST["nama"]);

   
    $sql="UPDATE [ms_divisi_upload_video] SET kode_divisi = '". $kode_divisi ."', nama_divisi = '". $nama_divisi ."'WHERE kode_divisi = '". $kode_divisi ."' "; 
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
