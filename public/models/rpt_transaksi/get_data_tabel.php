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
 

if(!empty($tahun)){

  $sql =" SELECT DISTINCT bulan,angka_bulan FROM master_video WHERE  tahun='".$tahun."'";
  $result = odbc_exec($conn,$sql);
  while($arr = odbc_fetch_array($result)){
        $data_bln[] = $arr['angka_bulan'];
  };
 
  foreach($data_bln as $bln){
       
    if($bln == 1){
          $mont = 01;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata[] = $get_data;
          
        }
        elseif($bln == 2){
          $mont = 02;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata2[] = $get_data;
        }
        elseif($bln == 3){
          $mont = 03;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata3[] = $get_data;

        }
        elseif($bln == 4){
          $mont = 04;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata4[] = $get_data;

        }
        elseif($bln == 5){
          $mont = 05;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata5[] = $get_data;

        }
        elseif($bln == 6){
          $mont = 06;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata6[] = $get_data;

        }
        elseif($bln == 7){
          $mont = 07;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata7[] = $get_data;

        }
        elseif($bln == 8){
          $mont = 08;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata8[] = $get_data;

        }
        elseif($bln == 9){
          $mont = 09;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata9[] = $get_data;

        }
        elseif($bln == 10){
          $mont = 10;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata10[] = $get_data;

        }
        elseif($bln == 11){
          $mont = 11;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata11[] = $get_data;

        }
        elseif($bln == 12){
          $mont = 12;
          $get_data =get_data($conn,$tahun,$mont);
          $rowdata12[] = $get_data;

        }
  } 

//join array
if(!empty($rowdata12[0])){
      $row =json_encode($rowdata[0]);
      $row2 =json_encode($rowdata2[0]);
      $row3 =json_encode($rowdata3[0]);
      $row4 =json_encode($rowdata4[0]);
      $row5 =json_encode($rowdata5[0]);
      $row6 =json_encode($rowdata6[0]);
      $row7 =json_encode($rowdata7[0]);
      $row8 =json_encode($rowdata8[0]);
      $row9 =json_encode($rowdata9[0]);
      $row10 =json_encode($rowdata10[0]);
      $row11 =json_encode($rowdata11[0]);
      $row12 =json_encode($rowdata12[0]);
        $array_merge= array_merge(
          json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
          json_decode($row4,true),json_decode($row5,true),json_decode($row6,true),
          json_decode($row7,true),json_decode($row8,true),json_decode($row9,true),
          json_decode($row10,true),json_decode($row11,true),json_decode($row12,true)
        );
        $array_merge;
}
elseif(!empty($rowdata11[0])){
  $row =json_encode($rowdata[0]);
  $row2 =json_encode($rowdata2[0]);
  $row3 =json_encode($rowdata3[0]);
  $row4 =json_encode($rowdata4[0]);
  $row5 =json_encode($rowdata5[0]);
  $row6 =json_encode($rowdata6[0]);
  $row7 =json_encode($rowdata7[0]);
  $row8 =json_encode($rowdata8[0]);
  $row9 =json_encode($rowdata9[0]);
  $row10 =json_encode($rowdata10[0]);
  $row11 =json_encode($rowdata11[0]);
    $array_merge= array_merge(
      json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
      json_decode($row4,true),json_decode($row5,true),json_decode($row6,true),
      json_decode($row7,true),json_decode($row8,true),json_decode($row9,true),
      json_decode($row10,true),json_decode($row11,true)
    );
    $array_merge;
}
elseif(!empty($rowdata10[0])){
  $row =json_encode($rowdata[0]);
  $row2 =json_encode($rowdata2[0]);
  $row3 =json_encode($rowdata3[0]);
  $row4 =json_encode($rowdata4[0]);
  $row5 =json_encode($rowdata5[0]);
  $row6 =json_encode($rowdata6[0]);
  $row7 =json_encode($rowdata7[0]);
  $row8 =json_encode($rowdata8[0]);
  $row9 =json_encode($rowdata9[0]);
  $row10 =json_encode($rowdata10[0]);
    $array_merge= array_merge(
      json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
      json_decode($row4,true),json_decode($row5,true),json_decode($row6,true),
      json_decode($row7,true),json_decode($row8,true),json_decode($row9,true),
      json_decode($row10,true)
    );
    $array_merge;
}
elseif(!empty($rowdata9[0])){
  $row =json_encode($rowdata[0]);
  $row2 =json_encode($rowdata2[0]);
  $row3 =json_encode($rowdata3[0]);
  $row4 =json_encode($rowdata4[0]);
  $row5 =json_encode($rowdata5[0]);
  $row6 =json_encode($rowdata6[0]);
  $row7 =json_encode($rowdata7[0]);
  $row8 =json_encode($rowdata8[0]);
  $row9 =json_encode($rowdata9[0]);
    $array_merge= array_merge(
      json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
      json_decode($row4,true),json_decode($row5,true),json_decode($row6,true),
      json_decode($row7,true),json_decode($row8,true),json_decode($row9,true)
    );
    $array_merge;
}
elseif(!empty($rowdata8[0])){
  $row =json_encode($rowdata[0]);
  $row2 =json_encode($rowdata2[0]);
  $row3 =json_encode($rowdata3[0]);
  $row4 =json_encode($rowdata4[0]);
  $row5 =json_encode($rowdata5[0]);
  $row6 =json_encode($rowdata6[0]);
  $row7 =json_encode($rowdata7[0]);
  $row8 =json_encode($rowdata8[0]);
    $array_merge= array_merge(
      json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
      json_decode($row4,true),json_decode($row5,true),json_decode($row6,true),
      json_decode($row7,true),json_decode($row8,true)
    );
    $array_merge;
}
elseif(!empty($rowdata7[0])){
  $row =json_encode($rowdata[0]);
  $row2 =json_encode($rowdata2[0]);
  $row3 =json_encode($rowdata3[0]);
  $row4 =json_encode($rowdata4[0]);
  $row5 =json_encode($rowdata5[0]);
  $row6 =json_encode($rowdata6[0]);
  $row7 =json_encode($rowdata7[0]);
    $array_merge= array_merge(
      json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
      json_decode($row4,true),json_decode($row5,true),json_decode($row6,true),
      json_decode($row7,true)
    );
    $array_merge;
}
elseif(!empty($rowdata6[0])){
  $row =json_encode($rowdata[0]);
  $row2 =json_encode($rowdata2[0]);
  $row3 =json_encode($rowdata3[0]);
  $row4 =json_encode($rowdata4[0]);
  $row5 =json_encode($rowdata5[0]);
  $row6 =json_encode($rowdata6[0]);
    $array_merge= array_merge(
      json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
      json_decode($row4,true),json_decode($row5,true),json_decode($row6,true)
    );
    $array_merge;
}
elseif(!empty($rowdata5[0])){
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
}
elseif(!empty($rowdata4[0])){
  $row =json_encode($rowdata[0]);
  $row2 =json_encode($rowdata2[0]);
  $row3 =json_encode($rowdata3[0]);
  $row4 =json_encode($rowdata4[0]);
  $row5 =json_encode($rowdata5[0]);
    $array_merge= array_merge(
      json_decode($row,true),json_decode($row2,true),json_decode($row3,true),
      json_decode($row4,true)
    );
    $array_merge;
}
elseif(!empty($rowdata3[0])){
  $row =json_encode($rowdata[0]);
  $row2 =json_encode($rowdata2[0]);
  $row3 =json_encode($rowdata3[0]);

    $array_merge= array_merge(
      json_decode($row,true),json_decode($row2,true),json_decode($row3,true)
 
    );
    $array_merge;
}
elseif(!empty($rowdata2[0])){
  $row =json_encode($rowdata[0]);
  $row2 =json_encode($rowdata2[0]);

    $array_merge= array_merge(
      json_decode($row,true),json_decode($row2,true)
 
    );
    $array_merge;
}
elseif(!empty($rowdata1[0])){
  $row =json_encode($rowdata[0]);
 
   $array_merge= array_merge(
      json_decode($row,true)
 
    );
    $array_merge;
}




  if(empty($array_merge)){
    $array_merge = null;
    echo ($array_merge);
  }else{
    
    echo json_encode($array_merge);
  }
}






function get_data($connection,$tahun,$monts){
  
   $bln_s = bulan($monts);
  $sql =" SELECT DISTINCT kategory,divisi FROM master_video WHERE  tahun='".$tahun."' AND bulan ='".$bln_s."' ";
  $result = odbc_exec($connection,$sql);
  while($arr = odbc_fetch_array($result)){
        $datas[] = $arr;
  }; 

    
  $data_trs =[];
      foreach($datas as $row){ 
        $ktg = $row["kategory"];
          $dvs = $row["divisi"];
        
        if($ktg == "Facebook"){
          
          $sql =" SELECT COUNT(kategory) as trs_kategory FROM transaksi_video_upload WHERE YEAR(tanggal) ='".$tahun."' AND MONTH(tanggal) ='".$monts."'
          AND divisi ='".$dvs."'AND kategory='".$ktg."' ";
          $result = odbc_exec($connection,$sql);
          $arr = odbc_fetch_array($result); 
          $trs_kategory = $arr['trs_kategory'];
        
            $query = "SELECT kategory ,tahun,bulan,divisi ,target ,('".$trs_kategory."'- target )as tidak_target,'".$trs_kategory."' as upload 
              FROM master_video
              WHERE tahun='".$tahun."' AND bulan ='".$bln_s."' AND divisi ='".$dvs."' AND  kategory ='".$ktg."'
              ";
          $result2 = odbc_exec($connection,$query);
              // $arr2 = odbc_fetch_array($result2); 
              while(odbc_fetch_row($result2)){

          
              $data_trs[] = array(
                  "kategory"=>rtrim(odbc_result($result2,'kategory')),
                  "tahun"=>rtrim(odbc_result($result2,'tahun')),
                  "bulan"=>rtrim(odbc_result($result2,'bulan')),
                  "divisi"=>rtrim(odbc_result($result2,'divisi')),
                  "upload"=>rtrim(odbc_result($result2,'upload')),
                  "target"=>rtrim(odbc_result($result2,'target')),
                  "tidak_target"=>rtrim(odbc_result($result2,'tidak_target')),
              );
          
          }

        }
      
        elseif($ktg =="Instagram"){
          $sql =" SELECT COUNT(kategory) as trs_kategory FROM transaksi_video_upload WHERE YEAR(tanggal) ='".$tahun."' AND MONTH(tanggal) ='".$monts."'
          AND divisi ='".$dvs."'AND kategory='".$ktg."' ";
          $result = odbc_exec($connection,$sql);
          $arr = odbc_fetch_array($result); 
          $trs_kategory = $arr['trs_kategory'];
        
            $query = "SELECT kategory ,tahun,bulan,divisi ,target ,('".$trs_kategory."'- target )as tidak_target,'".$trs_kategory."' as upload 
              FROM master_video
              WHERE tahun='".$tahun."' AND bulan ='".$bln_s."' AND divisi ='".$dvs."' AND  kategory ='".$ktg."'
              ";
          $result2 = odbc_exec($connection,$query);
              // $arr2 = odbc_fetch_array($result2); 
              while(odbc_fetch_row($result2)){

          
              $data_trs[] = array(
                  "kategory"=>rtrim(odbc_result($result2,'kategory')),
                  "tahun"=>rtrim(odbc_result($result2,'tahun')),
                  "bulan"=>rtrim(odbc_result($result2,'bulan')),
                  "divisi"=>rtrim(odbc_result($result2,'divisi')),
                  "upload"=>rtrim(odbc_result($result2,'upload')),
                  "target"=>rtrim(odbc_result($result2,'target')),
                  "tidak_target"=>rtrim(odbc_result($result2,'tidak_target')),
              );
          
          }
        }
      elseif($ktg =="TikTok"){
        $sql =" SELECT COUNT(kategory) as trs_kategory FROM transaksi_video_upload WHERE YEAR(tanggal) ='".$tahun."' AND MONTH(tanggal) ='".$monts."'
          AND divisi ='".$dvs."'AND kategory='".$ktg."' ";
          $result = odbc_exec($connection,$sql);
          $arr = odbc_fetch_array($result); 
          $trs_kategory = $arr['trs_kategory'];
        
            $query = "SELECT kategory ,tahun,bulan,divisi ,target ,('".$trs_kategory."'- target )as tidak_target,'".$trs_kategory."' as upload 
              FROM master_video
              WHERE tahun='".$tahun."' AND bulan ='".$bln_s."' AND divisi ='".$dvs."' AND  kategory ='".$ktg."'
              ";
          $result2 = odbc_exec($connection,$query);
              // $arr2 = odbc_fetch_array($result2); 
              while(odbc_fetch_row($result2)){

          
              $data_trs[] = array(
                  "kategory"=>rtrim(odbc_result($result2,'kategory')),
                  "tahun"=>rtrim(odbc_result($result2,'tahun')),
                  "bulan"=>rtrim(odbc_result($result2,'bulan')),
                  "divisi"=>rtrim(odbc_result($result2,'divisi')),
                  "upload"=>rtrim(odbc_result($result2,'upload')),
                  "target"=>rtrim(odbc_result($result2,'target')),
                  "tidak_target"=>rtrim(odbc_result($result2,'tidak_target')),
              );
          
          }
        }
      elseif($ktg =="Twitter"){
        $sql =" SELECT COUNT(kategory) as trs_kategory FROM transaksi_video_upload WHERE YEAR(tanggal) ='".$tahun."' AND MONTH(tanggal) ='".$monts."'
        AND divisi ='".$dvs."'AND kategory='".$ktg."' ";
        $result = odbc_exec($connection,$sql);
        $arr = odbc_fetch_array($result); 
        $trs_kategory = $arr['trs_kategory'];
      
          $query = "SELECT kategory ,tahun,bulan,divisi ,target ,('".$trs_kategory."'- target )as tidak_target,'".$trs_kategory."' as upload 
            FROM master_video
            WHERE tahun='".$tahun."' AND bulan ='".$bln_s."' AND divisi ='".$dvs."' AND  kategory ='".$ktg."'
            ";
        $result2 = odbc_exec($connection,$query);
            // $arr2 = odbc_fetch_array($result2); 
            while(odbc_fetch_row($result2)){

        
            $data_trs[] = array(
                "kategory"=>rtrim(odbc_result($result2,'kategory')),
                "tahun"=>rtrim(odbc_result($result2,'tahun')),
                "bulan"=>rtrim(odbc_result($result2,'bulan')),
                "divisi"=>rtrim(odbc_result($result2,'divisi')),
                "upload"=>rtrim(odbc_result($result2,'upload')),
                "target"=>rtrim(odbc_result($result2,'target')),
                "tidak_target"=>rtrim(odbc_result($result2,'tidak_target')),
            );
        
        }
        }
      elseif($ktg =="Youtube"){
        $sql =" SELECT COUNT(kategory) as trs_kategory FROM transaksi_video_upload WHERE YEAR(tanggal) ='".$tahun."' AND MONTH(tanggal) ='".$monts."'
        AND divisi ='".$dvs."'AND kategory='".$ktg."' ";
        $result = odbc_exec($connection,$sql);
        $arr = odbc_fetch_array($result); 
        $trs_kategory = $arr['trs_kategory'];
      
          $query = "SELECT kategory ,tahun,bulan,divisi ,target ,('".$trs_kategory."'- target )as tidak_target,'".$trs_kategory."' as upload 
            FROM master_video
            WHERE tahun='".$tahun."' AND bulan ='".$bln_s."' AND divisi ='".$dvs."' AND  kategory ='".$ktg."'
            ";
        $result2 = odbc_exec($connection,$query);
            // $arr2 = odbc_fetch_array($result2); 
            while(odbc_fetch_row($result2)){

        
            $data_trs[] = array(
                "kategory"=>rtrim(odbc_result($result2,'kategory')),
                "tahun"=>rtrim(odbc_result($result2,'tahun')),
                "bulan"=>rtrim(odbc_result($result2,'bulan')),
                "divisi"=>rtrim(odbc_result($result2,'divisi')),
                "upload"=>rtrim(odbc_result($result2,'upload')),
                "target"=>rtrim(odbc_result($result2,'target')),
                "tidak_target"=>rtrim(odbc_result($result2,'tidak_target')),
            );
        
        }
      }
      
    }
  return $data_trs;
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
