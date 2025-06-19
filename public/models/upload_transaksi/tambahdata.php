<?php
//include library

session_start();
$user_log = $_SESSION['login_user'];

require_once ("../../models/koneksi.php");
$connection =$database->open_connection();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$dateEntry = date("m/d/Y");
$username =$user_log;
  $cek = 0;
  $valid = 0;

  $tgl_waktu= test_input($_POST["tanggal"]);
  $divisi= test_input($_POST["divisi"]);

  
  $kategory =test_input($_POST["kategori"]);
  $kode =test_input($_POST["kode"]);
  $judul = test_input($_POST["judul"]);
  $tujuan = test_input($_POST["tujuan"]);
  $link = test_input($_POST["link"]);
  $ket = test_input($_POST["ket"]);
 
 //cek transaksi tidak boleh sama
 $query = "SELECT DISTINCT * FROM transaksi_video_upload where kode ='$kode' ";
 $sql=odbc_exec($connection,$query);
 $rows= odbc_fetch_array($sql); 
 if($rows > 0){
       $valid=1;
   }

   if($valid == 0){
    $sql="INSERT INTO [transaksi_video_upload] (tanggal,kode,divisi,kategory,judul,tujuan,link,ket,dateEntry,username) Values ('". $tgl_waktu ."','". $kode ."','". $divisi ."','". $kategory ."','". $judul ."','".$tujuan."'
    ,'".$link."','".$ket."','".$dateEntry."','".$username."')"; 

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
		$status['error']="nik Sudah terdaftar silahkan ganti kategory";
    }

    echo json_encode($status);

