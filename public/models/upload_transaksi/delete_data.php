<?php

$cek = 0;
require_once ("../../models/koneksi.php");
require_once ("../../config.php"); 
$connection =$database->open_connection();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(!empty($_POST["kode"])){
 
  $kode = test_input($_POST["kode"]);
  $nama_document = test_input($_POST["nama_document"]);
  $kategori = test_input($_POST["kategori"]);
  $divisi = test_input($_POST["divisi"]);

      if (!empty($nama_document)) {
            // Pastikan nama file aman (tanpa path ilegal)
            $nama_document = basename(trim($nama_document));
            $path = FOLDER . $nama_document;
            // Jika file ada, hapus
            if (file_exists($path)) {
                unlink($path);
            }
        }

  $sql="DELETE FROM transaksi_video_upload WHERE kode = '".$kode."' AND kategory ='{$kategori}' AND divisi='{$divisi}'  "; 
	$result = odbc_exec($connection, $sql); 

  if(!$result){
    $cek = $cek+1;
  }
  if ($cek==0){
    odbc_commit($connection);
    $status['nilai']=1; //bernilai benar
    $status['error']="Data Berhasil Dihapus";
  }else{
    odbc_rollback($connection);
    $status['nilai']=0; //bernilai benar
    $status['error']="Data Gagal Dihapus";
  }

  odbc_close($connection);
  echo json_encode($status);

}
