<?php 


require_once ("../../models/koneksi.php");
$conn =$database->open_connection();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  };
  

$tahun = test_input($_POST['tahun']);
$bulan = test_input($_POST['bulan']);


$query = "SELECT DISTINCT kategory FROM master_video WHERE  tahun='".$tahun."' AND angka_bulan <='".$bulan."'" ;
$result =odbc_exec($conn,$query);
while($arr = odbc_fetch_array($result)){
  $kategory[] = $arr['kategory'];
}; 



foreach($kategory as  $ktg){
  if($ktg =="Facebook"){
    $get_data = data_kategory($conn,$tahun,$bulan,$ktg);
    $rowdata[] = $get_data;
  }
  if($ktg =="Youtube"){
    $get_data = data_kategory($conn,$tahun,$bulan,$ktg);
    $rowdata2[] = $get_data;
  }
  if($ktg =="Instagram"){
    $get_data = data_kategory($conn,$tahun,$bulan,$ktg);
    $rowdata3[] = $get_data;
  }
  if($ktg =="TikTok"){
    $get_data = data_kategory($conn,$tahun,$bulan,$ktg);
    $rowdata4[] = $get_data;
  }
  if($ktg =="Twitter"){
    $get_data = data_kategory($conn,$tahun,$bulan,$ktg);
    $rowdata5[] = $get_data;
  }

} 


$row =json_encode($rowdata[0]);
$row2 =json_encode($rowdata2[0]);
$row3 =json_encode($rowdata3[0]);
$row4 =json_encode($rowdata4[0]);
$row5 =json_encode($rowdata5[0]);
$array_merge= array_merge(
  json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
  json_decode($row4,true),json_decode($row5,true)
);
$array_merge;






  if(empty($array_merge)){
    $array_merge = null;
  
    echo json_encode($array_merge);
  }else{
    
    echo json_encode($array_merge);
  }


  function data_kategory($conn,$tahun,$bulan,$ktg){

    $sql =" SELECT SUM(target) as target_jml FROM master_video WHERE tahun ='".$tahun."' AND angka_bulan <='".$bulan."'AND kategory='".$ktg."' ";
    $result = odbc_exec($conn,$sql);
    $arr = odbc_fetch_array($result); 
    $target_jml = $arr['target_jml'];
  

    $query ="SELECT COUNT(kategory) as kategory_jml FROM transaksi_video_upload WHERE kategory ='".$ktg."' AND YEAR(tanggal)='".$tahun."' AND MONTH(tanggal) <='".$bulan."' ";
    $result2 = odbc_exec($conn,$query);
    $arr2 = odbc_fetch_array($result2); 
      $kategory_jml = $arr2['kategory_jml'];

      $data [] =[
        'tahun' =>$tahun,
        'kategory'=>$ktg,
        'target'=>$target_jml,
        'upload'=>$kategory_jml,
        'tidak_target'=>($kategory_jml - $target_jml),
    ];
 
  return $data ;
  }