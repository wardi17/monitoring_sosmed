<?php

//include library
require_once ("../../models/koneksi.php");
$connection =$database->open_connection();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$kode = test_input($_POST["kode"]);
$nama = test_input($_POST["nama"]);
$cek = 0;
$valid = 0;

if(!empty($kode && $nama)){
  $query = "SELECT DISTINCT * FROM ms_divisi_upload_video where kode_divisi ='$kode' ";
  $sql=odbc_exec($connection,$query);
  $rows= odbc_fetch_array($sql); 
 
  if($rows > 0){
        $valid=1;
    }
    if($valid == 0){
     $sql="INSERT INTO [ms_divisi_upload_video] (kode_divisi,nama_divisi) 
     Values ('". $kode ."','".$nama."')"; 
    
     $result = odbc_exec($connection, $sql);
     if(!$result){
       $cek =$cek+1;
     }
   
     if ($cek==0){
       odbc_commit($connection);
       $status['nilai']=1; //bernilai benar
       $status['error']="Data Berhasil Ditambahkan";
     }else{
       odbc_rollback($connection);
       $status['nilai']=0; //bernilai benar
       $status['error']="Data Gagal Ditambahkan";
     }
     odbc_close($connection);
   
   
 
    }
    else{
     $status['nilai']= 0; //bernilai salah
     $status['error']="id Sudah terdaftar silahkan ganti";
     }
 
     echo json_encode($status);

}else{
  $satuts = 0;

  echo json_encode($nilai);
}