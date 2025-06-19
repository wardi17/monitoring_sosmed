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
$data = $_POST;


  $cek = 0;
  $valid = 0;


  $divisi = test_input($_POST["divisi"]);
  $kategory= test_input($_POST["kategory"]);
  $bulan =test_input($_POST["bulan"]);
  $tahun = test_input($_POST["tahun"]);
  $target = test_input($_POST["target"]);
 //die(var_dump($divisi));
 //cek hewan tidak boleh sama

 if(!empty($bulan)){
  $bulan_k = bulanangka($bulan);
 }
 $query = "SELECT  COUNT(*) AS kondisi FROM master_video where tahun ='".$tahun."' AND bulan ='".$bulan."'
  AND divisi ='".$divisi."'AND kategory ='".$kategory."'
  " ;
 $sql=odbc_exec($connection,$query);
 $arr= odbc_fetch_array($sql); 
 $rows = $arr['kondisi'];
 if($rows > 0){
       $valid=1;
   }

   if($valid == 0){

   $sql="INSERT INTO [master_video] (kategory,bulan, tahun,target,divisi,angka_bulan) Values ('". $kategory ."','".$bulan."', '". $tahun ."', '". $target."', '". $divisi."', '". $bulan_k."')"; 
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
		$status['error']=" silahkan ganti kategory. ini sudah ada target";
    }

    echo json_encode($status);


    function bulanangka($bulan)
{

  Switch ($bulan){
    case  "Januari": 
      $bulan=1;
        Break;
    case "Februari" : 
      $bulan= 2;
        Break;
    case "Maret" : 
      $bulan= 3;
        Break;
    case "April" : 
      $bulan= 4;
        Break;
    case "Mei" : 
      $bulan= 5;
        Break;
    case "Juni" : 
      $bulan= 6 ;
        Break;
    case "Juli": 
      $bulan= 7;
        Break;
    case "Agustus" : 
      $bulan= 8;
        Break;
    case "September": 
      $bulan= 9;
        Break;
    case "Oktober" : 
      $bulan=10;
        Break;
    case "November" : 
      $bulan= 11;
        Break;
    case "Desember" : 
      $bulan= 12;
        Break;
    }
  return $bulan;
} 