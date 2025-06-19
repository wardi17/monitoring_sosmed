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

if (!empty($_POST["kategory"])) {
    $kategory = test_input($_POST["kategory"]);
    $bulan = test_input($_POST["bulan"]);
    $tahun = test_input($_POST["tahun"]);
    $target = test_input($_POST["target"]);
    $divisi = test_input($_POST["divisi"]);

   
    $sql="UPDATE [master_video] SET kategory = '". $kategory ."', bulan = '". $bulan ."', tahun = '". $tahun ."', target ='". $target ."'WHERE kategory = '". $kategory ."'
    AND tahun = '". $tahun ."' AND bulan = '". $bulan ."' AND kategory = '". $kategory ."'AND divisi = '". $divisi ."'
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
