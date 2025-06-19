<?php
   require_once ("../../models/koneksi.php");
   $connection =$database->open_connection();
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

        $upload = test_input($_POST['upload']);
        $tdk_target = test_input($_POST['tdk_target']);

        $tahun = test_input($_POST['tahun']);
        $bulan = test_input($_POST['bulan']);
     
        $kategory = test_input($_POST['kategory']);
        $divisi = test_input($_POST['divisi']);
        $bln_angka =bulanangka($bulan);

      
        // $sql =" SELECT COUNT(kategory) as trs_kategory FROM transaksi_video_upload WHERE YEAR(tanggal) ='".$tahun."' AND MONTH(tanggal) ='".$bln_angka."'
        // AND divisi ='".$dvs."'AND kategory='".$ktg."' ";
        // $result = odbc_exec($connection,$sql);
        // $arr = odbc_fetch_array($result); 
        // $trs_kategory = $arr['trs_kategory'];
      

    // $query = "SELECT t.tanggal as tanggal,m.kategory as kategory ,m.divisi as divisi,
    // t.kode as kode,t.judul as judul,t.tujuan as tujuan,t.link as link
    // FROM master_video as m 
    // LEFT JOIN transaksi_video_upload as t  ON m.kategory = t.kategory
    // WHERE  MONTH(t.tanggal)='".$bln_angka."'AND m.tahun='".$tahun."' AND m.bulan ='".$bulan."'AND m.kategory ='".$kategory."'AND t.divisi ='".$divisi."'
    //  ";

    $query ="SELECT * FROM transaksi_video_upload WHERE  YEAR(tanggal)='".$tahun."'  AND MONTH(tanggal)='".$bln_angka."'  AND kategory ='".$kategory."' AND divisi ='".$divisi."'";
    $result2 = odbc_exec($connection,$query);
 
    while(odbc_fetch_row($result2)){

 
      $data[] = array(
        "tanggal"=>date('d-m-Y',strtotime(rtrim(odbc_result($result2,'tanggal')))),
        "kategory"=>rtrim(odbc_result($result2,'kategory')),
        "divisi"=>rtrim(odbc_result($result2,'divisi')),
        "kode"=>rtrim(odbc_result($result2,'kode')),
        "judul"=>rtrim(odbc_result($result2,'judul')),
        "tujuan"=>rtrim(odbc_result($result2,'tujuan')),
        "link"=>rtrim(odbc_result($result2,'link'))
      );
    
    }
    
          if(empty($data)){
            $data = null;
            echo json_encode($data);
          }else{
            
            echo json_encode($data);
          }
          
function get_divisi($connection,$tahun){
  
  $sql  ="SELECT DISTINCT divisi FROM master_video  WHERE tahun ='".$tahun."'";
  $result = odbc_exec($connection,$sql);
  while(odbc_fetch_row($result)){
    $array[] =[
      rtrim(odbc_result($result,'divisi')),
    ];
  }

 
  return $array;
}
function bulanangka($bulan)
{
  Switch ($bulan){
    case  "Januari": 
      $bulan= 1;
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

?>