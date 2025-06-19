<?php 

require_once ("../../models/koneksi.php");
$connection =$database->open_connection();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };
 
  $year = date("Y");
  $query = "SELECT DISTINCT kategory FROM master_video  WHERE tahun ='".$year."'";
//$result_set =odbc_exec($connection,$query);
$result2 = odbc_exec($connection,$query);
while(odbc_fetch_row($result2)){


    $data[] = array(
        "kategory"=>rtrim(odbc_result($result2,'kategory')),
      
    
    
    );
    
    }

if(empty($data)){
    $data = null;
  
    echo json_encode($data);
  }else{
    
    echo json_encode($data);
  }
