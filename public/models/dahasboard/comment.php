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


  $cek = 0;
  $valid = 0;

 

  $user_id = test_input($_POST["user_id"]);
  $username = test_input($_POST["user"]);
  $kirim = test_input($_POST["kirim"]);
  //$tanggal = date_time();
  $tanggal =  date('Y-m-d H:i');
 //cek hewan tidak boleh sama
//  $query = "SELECT DISTINCT * FROM master_video where kategory ='$kategory' ";
//  $sql=odbc_exec($connection,$query);
//  $rows= odbc_fetch_array($sql); 

//  if($rows > 0){
//        $valid=1;
//    }

   if($valid == 0){
    $sql="INSERT INTO [comment_video] (tanggal,id_user,user_name,comment) Values ('". $tanggal."','". $user_id."','". $username."','". $kirim."')"; 

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
   

    echo json_encode($status);

