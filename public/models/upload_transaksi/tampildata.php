<?php 

require_once ("../../models/koneksi.php");
$connection =$database->open_connection();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };
  
// $bulanpage = test_input($_POST['bulan']);
$tahunpage =test_input($_POST['tahun']);

$query = "SELECT tanggal,kode,kategory,divisi,judul,tujuan,ket FROM transaksi_video_upload  WHERE YEAR(tanggal)= '".$tahunpage."' ORDER BY tanggal,kategory,divisi ASC ";
$result_set =odbc_exec($connection,$query);
while(odbc_fetch_row($result_set)){

 
    $data[] = array(
      "tanggal"=>date('d-m-y',strtotime(rtrim(odbc_result($result_set,'tanggal')))),
      "kode"=>rtrim(odbc_result($result_set,'kode')),
      "kategory"=>rtrim(odbc_result($result_set,'kategory')),
      "divisi"=>rtrim(odbc_result($result_set,'divisi')),
      "judul"=>rtrim(odbc_result($result_set,'judul')),
      "tujuan"=>rtrim(odbc_result($result_set,'tujuan')),
      "ket"=>rtrim(odbc_result($result_set,'ket'))


    );
  
  
  }
  
  
  if(empty($data)){
    $data = null;
  
    echo json_encode($data);
  }else{
    
    echo json_encode($data);
  }