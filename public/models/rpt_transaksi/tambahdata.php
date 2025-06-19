<?php
   require_once ("../../models/koneksi.php");
   $connection =$database->open_connection();


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


  $cek = 0;
  $valid = 0;

  $divisi = test_input($_POST["divisi"]);
  $kategory= test_input($_POST["kategory"]);
  $bulan =test_input($_POST["bulan"]);
  $tahun = test_input($_POST["tahun"]);
  $jumlah = test_input($_POST["jumlah"]);
  $target = test_input($_POST["target"]);
 

 //cek hewan tidak boleh sama
 $query = "SELECT DISTINCT * FROM master_video where kategory ='$kategory' ";
 $sql=odbc_exec($connection,$query);
 $rows= odbc_fetch_array($sql); 

 if($rows > 0){
       $valid=1;
   }

   if($valid == 0){
    $sql="INSERT INTO [master_video] (kategory,bulan, tahun, jumlah, target,divisi ) Values ('". $kategory ."','".$bulan."', '". $tahun ."', '". $jumlah ."', '". $target."', '". $divisi."')"; 
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

