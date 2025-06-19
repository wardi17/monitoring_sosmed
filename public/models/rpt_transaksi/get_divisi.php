<?php
   
   require_once ("../../models/koneksi.php");
   $conn =$database->open_connection();


   function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };
 
  $tahun = test_input($_POST["tahun"]);
  $divisi = test_input($_POST["divisi"]);
  $bulan_k = test_input($_POST["bulan"]);

  $cek = 0;
  $valid = 0;

  $query = "SELECT DISTINCT tahun FROM master_video where tahun ='$tahun' ";
  $sql=odbc_exec($conn,$query);
  $rowas= odbc_fetch_array($sql); 

if(!empty($rowas)){

if(($divisi == "All")){

  $sql =" SELECT DISTINCT kategory FROM master_video WHERE  tahun='".$tahun."'";
  //AND angka_bulan <='".$bulan_k."'" ;
  
  //die(var_dump($sql));
  $result = odbc_exec($conn,$sql);
  while($arr = odbc_fetch_array($result)){
        $kategory[] = $arr['kategory'];
  };


  foreach($kategory as  $ktg){
      if($ktg =="Facebook"){
        $get_data = get_data($conn,$tahun,$bulan_k,$ktg,$divisi);
        $rowdata[] = $get_data;
      }
      if($ktg =="Youtube"){
        $get_data = get_data($conn,$tahun,$bulan_k,$ktg,$divisi);
        $rowdata2[] = $get_data;
      }
      if($ktg =="Instagram"){
        $get_data = get_data($conn,$tahun,$bulan_k,$ktg,$divisi);
        $rowdata3[] = $get_data;
      }
      if($ktg =="TikTok"){
        $get_data = get_data($conn,$tahun,$bulan_k,$ktg,$divisi);
        $rowdata4[] = $get_data;
      }
      if($ktg =="Twitter"){
        $get_data = get_data($conn,$tahun,$bulan_k,$ktg,$divisi);
        $rowdata5[] = $get_data;
      }

  }

$row = isset($rowdata[0]) ? json_encode($rowdata[0]) : json_encode([]);
$row2 = isset($rowdata2[0]) ? json_encode($rowdata2[0]) : json_encode([]);
$row3 = isset($rowdata3[0]) ? json_encode($rowdata3[0]) : json_encode([]);
$row4 = isset($rowdata4[0]) ? json_encode($rowdata4[0]) : json_encode([]);
$row5 = isset($rowdata5[0]) ? json_encode($rowdata5[0]) : json_encode([]);

$array_merge = array_merge(
    json_decode($row, true), 
    json_decode($row2, true), 
    json_decode($row3, true),
    json_decode($row4, true), 
    json_decode($row5, true)
);


    echo json_encode($array_merge);
      
}else{

  $sql =" SELECT DISTINCT kategory FROM master_video WHERE  tahun='".$tahun."' AND angka_bulan <='".$bulan_k."'" ;
  $result = odbc_exec($conn,$sql);
  while($arr = odbc_fetch_array($result)){
        $kategory[] = $arr['kategory'];
  };

  foreach($kategory as  $ktg){
      if($ktg =="Facebook"){
       
        $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
        //$get_data = get_data($conn,$tahun,$bulan_k,$ktg);
        $rowdata[] = $get_data;
      }
      if($ktg =="Youtube"){
        $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
        $rowdata2[] = $get_data;
      }
      if($ktg =="Instagram"){
        $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
        $rowdata3[] = $get_data;
      }
      if($ktg =="TikTok"){
        $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
        $rowdata4[] = $get_data;
      }
      if($ktg =="Twitter"){
        $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
        $rowdata5[] = $get_data;
      }

  } 
$row = isset($rowdata[0]) ? json_encode($rowdata[0]) : json_encode([]);
$row2 = isset($rowdata2[0]) ? json_encode($rowdata2[0]) : json_encode([]);
$row3 = isset($rowdata3[0]) ? json_encode($rowdata3[0]) : json_encode([]);
$row4 = isset($rowdata4[0]) ? json_encode($rowdata4[0]) : json_encode([]);
$row5 = isset($rowdata5[0]) ? json_encode($rowdata5[0]) : json_encode([]);

$array_merge = array_merge(
    json_decode($row, true), 
    json_decode($row2, true), 
    json_decode($row3, true),
    json_decode($row4, true), 
    json_decode($row5, true)
);
    echo json_encode($array_merge);


}
// elseif(($divisi == "PD3R")){

//   $sql =" SELECT DISTINCT kategory FROM master_video WHERE  tahun='".$tahun."' AND angka_bulan <='".$bulan_k."'" ;
//   $result = odbc_exec($conn,$sql);
//   while($arr = odbc_fetch_array($result)){
//         $kategory[] = $arr['kategory'];
//   };

//   foreach($kategory as  $ktg){
//       if($ktg =="Facebook"){
       
//         $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
//         //$get_data = get_data($conn,$tahun,$bulan_k,$ktg);
//         $rowdata[] = $get_data;
//       }
//       if($ktg =="Youtube"){
//         $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
//         $rowdata2[] = $get_data;
//       }
//       if($ktg =="Instagram"){
//         $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
//         $rowdata3[] = $get_data;
//       }
//       if($ktg =="TikTok"){
//         $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
//         $rowdata4[] = $get_data;
//       }
//       if($ktg =="Twitter"){
//         $get_data = get_data_cs($conn,$tahun,$ktg,$divisi,$bulan_k);
//         $rowdata5[] = $get_data;
//       }

//   } 
//   $row =json_encode($rowdata[0]);
//   $row2 =json_encode($rowdata2[0]);
//   $row3 =json_encode($rowdata3[0]);
//   $row4 =json_encode($rowdata4[0]);
//   $row5 =json_encode($rowdata5[0]);
//     $array_merge= array_merge(
//       json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
//       json_decode($row4,true),json_decode($row5,true)
//     );
//     $array_merge;
//     echo json_encode($array_merge);
      
// }


}else{
  $status['nilai']= 0; //bernilai salah
  $status['error']="Tahun belum ada data nya";
  echo json_encode($status);

}

function get_data_cs($connection,$tahun,$ktg,$divisi,$bulan_k){
  $sql =" SELECT SUM(target) as target_jml FROM master_video WHERE tahun ='".$tahun."' AND kategory='".$ktg."' AND divisi='".$divisi."' ";
  $result = odbc_exec($connection,$sql);
  $arr = odbc_fetch_array($result); 
  $target_jml = $arr['target_jml'];



  $query ="SELECT COUNT(kategory) as kategory_jml FROM transaksi_video_upload WHERE kategory ='".$ktg."' AND YEAR(tanggal)='".$tahun."'AND divisi='".$divisi."' ";
  $result2 = odbc_exec($connection,$query);
  $arr2 = odbc_fetch_array($result2); 
    $kategory_jml = $arr2['kategory_jml'];

  $data [] =[
      'tahun' =>$tahun,
      'kategory'=>$ktg,
      'divisi' =>$divisi,
      'target'=>$target_jml,
      'upload'=>$kategory_jml,
      'tidak_target'=>($kategory_jml - $target_jml),
  ];
return $data ;

}


function get_data($connection,$tahun,$bulan_k,$ktg,$divisi){

          $sql =" SELECT SUM(target) as target_jml FROM master_video WHERE tahun ='".$tahun."' AND kategory='".$ktg."' ";
          $result = odbc_exec($connection,$sql);
          $arr = odbc_fetch_array($result); 
          $target_jml = $arr['target_jml'];
        

          $query ="SELECT COUNT(kategory) as kategory_jml FROM transaksi_video_upload WHERE kategory ='".$ktg."' AND YEAR(tanggal)='".$tahun."' ";
          $result2 = odbc_exec($connection,$query);
          $arr2 = odbc_fetch_array($result2); 
            $kategory_jml = $arr2['kategory_jml'];
       
          $data [] =[
              'tahun' =>$tahun,
              'kategory'=>$ktg,
              'divisi' =>$divisi,
              'target'=>$target_jml,
              'upload'=>$kategory_jml,
              'tidak_target'=>($kategory_jml - $target_jml),
          ];
        return $data ;
       
  }
      
    



//untuk perdivisi



//end
function bulan($bulan)
    {
      Switch ($bulan){
        case 1 : $bulan="Januari";
            Break;
        case 2 : $bulan="Februari";
            Break;
        case 3 : $bulan="Maret";
            Break;
        case 4 : $bulan="April";
            Break;
        case 5 : $bulan="Mei";
            Break;
        case 6 : $bulan="Juni";
            Break;
        case 7 : $bulan="Juli";
            Break;
        case 8 : $bulan="Agustus";
            Break;
        case 9 : $bulan="September";
            Break;
        case 10 : $bulan="Oktober";
            Break;
        case 11 : $bulan="November";
            Break;
        case 12 : $bulan="Desember";
            Break;
        }
      return $bulan;
    }         
