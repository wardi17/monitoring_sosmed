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

if(!empty($_POST["kategory"])){
  $tahun = test_input($_POST["tahun"]);
  $bulan = test_input($_POST["bulan"]);
  $kategory = test_input($_POST["kategory"]);
  $divisi = test_input($_POST["divisi"]);
  $sql="DELETE FROM master_video WHERE tahun = '".$tahun."' AND bulan = '".$bulan."' AND kategory = '".$kategory."'AND divisi = '".$divisi."'"; 
	$result = odbc_exec($connection, $sql); 

  if(!$result){
    $cek = $cek+1;
  }
  if ($cek==0){
    odbc_commit($connection);
    $status['nilai']=1; //bernilai benar
    $status['error']="Data Berhasil Dihapus";
  }else{
    odbc_rollback($connection);
    $status['nilai']=0; //bernilai benar
    $status['error']="Data Gagal Dihapus";
  }

  odbc_close($connection);
  echo json_encode($status);

}
