<?php
   require_once ("../../models/koneksi.php");
   $connection =$database->open_connection();
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  
        $tahun = test_input($_POST['tahun']);
        $kategory = test_input($_POST['kategory']);
        $divisi = test_input($_POST['divisi']);

if($divisi == "All"){
  $query ="SELECT * FROM transaksi_video_upload WHERE  YEAR(tanggal)='".$tahun."'  AND kategory ='".$kategory."' ORDER BY tanggal";
  $result2 = odbc_exec($connection,$query);
}
elseif($divisi == "CS"){
  $query ="SELECT * FROM transaksi_video_upload WHERE  YEAR(tanggal)='".$tahun."'  AND kategory ='".$kategory."'AND divisi ='".$divisi."' ORDER BY tanggal";
  $result2 = odbc_exec($connection,$query);
}
elseif($divisi == "PD3R"){
  $query ="SELECT * FROM transaksi_video_upload WHERE  YEAR(tanggal)='".$tahun."'  AND kategory ='".$kategory."'AND divisi ='".$divisi."' ORDER BY tanggal";
  $result2 = odbc_exec($connection,$query);
}
    $datas =[];
    while(odbc_fetch_row($result2)){

      $datas[] = [
        "tanggal"=>date('d-m-y',strtotime(rtrim(odbc_result($result2,'tanggal')))),
        "kategory"=>rtrim(odbc_result($result2,'kategory')),
        "divisi"=>rtrim(odbc_result($result2,'divisi')),
        "kode"=>rtrim(odbc_result($result2,'kode')),
        "judul"=>rtrim(odbc_result($result2,'judul')),
        "tujuan"=>rtrim(odbc_result($result2,'tujuan')),
        "link"=>rtrim(odbc_result($result2,'link')),
        "nama_document"=>rtrim(odbc_result($result2,'nama_document')),
        "ukuran_file"=>number_format(rtrim(odbc_result($result2,'ukuran_file')),2,",",",")." ". rtrim(odbc_result($result2,'size_type')),
        "type_file"=>rtrim(odbc_result($result2,'type_file')),
      ];
    
    }
          if(empty($datas)){
            $datas = null;
            echo json_encode($datas);
          }else{
            
            echo json_encode($datas);
          }






?>