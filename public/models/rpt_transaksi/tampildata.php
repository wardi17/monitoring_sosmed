<?php 

require_once ("../../models/koneksi.php");
$connection =$database->open_connection();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };
  
$bulanpage = test_input($_POST['bulan']);
$tahunpage =test_input($_POST['tahun']);

$query = "SELECT * FROM master_video  WHERE bulan='".$bulanpage."' AND tahun= '".$tahunpage."' ORDER BY kategory ASC ";
$result_set =odbc_exec($connection,$query);
while(odbc_fetch_row($result_set)){

 
    $data[] = array(
      "kategory"=>rtrim(odbc_result($result_set,'kategory')),
      "bulan"=>rtrim(odbc_result($result_set,'bulan')),
      "tahun"=>rtrim(odbc_result($result_set,'tahun')),
      "target"=>rtrim(odbc_result($result_set,'target')),
      "divisi"=>rtrim(odbc_result($result_set,'divisi')),

    );
  
  
  }
  
  
  if(empty($data)){
    $data = null;
  
    echo json_encode($data);
  }else{
    
    echo json_encode($data);
  }