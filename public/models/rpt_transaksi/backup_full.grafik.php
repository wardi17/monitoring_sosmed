<?php
      require_once ("../../models/koneksi.php");
      $connection =$database->open_connection();
      
   function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

        $tahun = test_input($_POST["tahun"]);
       $bulan = test_input($_POST["bulan"]);
        $bulan1 = 1;
        $monts = bulan($bulan1);
        $data_full=[];
        $sql =" SELECT DISTINCT angka_bulan FROM master_video WHERE  tahun='".$tahun."'  ";
        $result = odbc_exec($connection,$sql);
        while($arr = odbc_fetch_array($result)){
              $bln_k[] =  $arr['angka_bulan'];
             // $bln_k[] =  date("m",strtotime($arr['bulan']));
        }; 
    
     
        $query =" SELECT DISTINCT kategory FROM master_video WHERE  tahun='".$tahun."'  ";
        $result_k = odbc_exec($connection,$query);
        while($arr = odbc_fetch_array($result_k)){
              $ktg[] = $arr['kategory'];
        };
     $data_full =[];
    
        foreach($ktg as $ktg_data){

       
         if($ktg_data =="Youtube"){
          
              $bln_data = data_kategory($connection,$tahun,$bln_k,$ktg_data);
              $data_full[] =$bln_data;
         }
         elseif($ktg_data =="Facebook"){
          $bln_data = data_kategory($connection,$tahun,$bln_k,$ktg_data);
          $data_full[] =$bln_data;
         }
         elseif($ktg_data =="Instagram"){
          $bln_data = data_kategory($connection,$tahun,$bln_k,$ktg_data);
          $data_full[] =$bln_data;
         }
         elseif($ktg_data =="TikTok"){
          $bln_data = data_kategory($connection,$tahun,$bln_k,$ktg_data);
          $data_full[] =$bln_data;
         }
         elseif($ktg_data =="Twitter"){
          $bln_data = data_kategory($connection,$tahun,$bln_k,$ktg_data);
          $data_full[] =$bln_data;
         }
  

    }
    
  $json_encode = json_encode($data_full);
  echo $json_encode;
    //$bulans = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

    function data_kategory($conn,$tahun,$bln_k,$ktg){


      foreach($bln_k as $bln){
       
        if($bln == 1){
              $mont = 01;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
              
            }
            elseif($bln == 2){
              $mont = 02;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
            }
            elseif($bln == 3){
              $mont = 03;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
    
            }
            elseif($bln == 4){
              $mont = 04;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
    
            }
            elseif($bln == 5){
              $mont = 05;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
    
            }
            elseif($bln == 6){
              $mont = 06;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
    
            }
            elseif($bln == 7){
              $mont = 07;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
    
            }
            elseif($bln == 8){
              $mont = 08;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
    
            }
            elseif($bln == 9){
              $mont = 09;
              $get_data =get_data($conn,$tahun,$mont,$ktg);

              $rowdata[] = $get_data['upload'];
    
            }
            elseif($bln == 10){
              $mont = 10;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
    
            }
            elseif($bln == 11){
              $mont = 11;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
    
            }
            elseif($bln == 12){
              $mont = 12;
              $get_data =get_data($conn,$tahun,$mont,$ktg);
              $rowdata[] = $get_data['upload'];
    
            }
      }  
     
      $expload = implode(",",$rowdata);
      $int = array_map('intval', explode(',', $expload));
     
      $data_array=[
        'name'=>$ktg,
        'data'=> $int
      ];
	 
      return $data_array;
    }





  
  
        

function get_data($connection,$tahun,$mont,$ktg){
  
  $sql =" SELECT COUNT(kategory) as trs_kategory FROM transaksi_video_upload WHERE YEAR(tanggal) ='".$tahun."'AND MONTH(tanggal) ='".$mont."'
  AND kategory='".$ktg."'";
  	
  $result = odbc_exec($connection,$sql);
  $arr = odbc_fetch_array($result); 
  $trs_kategory = $arr['trs_kategory'];

	
  $sql2 =" SELECT  DISTINCT kategory as kategory,'".$trs_kategory."' as upload    FROM transaksi_video_upload WHERE YEAR(tanggal) ='".$tahun."' AND MONTH(tanggal) ='".$mont."'
 AND kategory='Instagram' ";
  $result2 = odbc_exec($connection,$sql2);
  $arr2 = odbc_fetch_array($result2); 
  $trs_kategory2 = $arr2;
  
 	
  return $trs_kategory2;
 
 
}

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
    case 7 : 
      $bulan="Juli";
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
?>