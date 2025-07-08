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
 
if ($_POST["kode"]){
    $kode = test_input($_POST["kode"]);
    $kategori = test_input($_POST["kategori"]);
    $divisi = test_input($_POST["divisi"]);
    $tanggal = test_input($_POST["tanggal"]);
    $judul = test_input($_POST["judul"]);
    $tujuan = test_input($_POST["tujuan"]);
    $link = test_input($_POST["link"]);
    $ket = test_input($_POST["ket"]);

 if(!empty($_FILES)){
        // Query untuk mendapatkan nama dokumen lama
        $query1 = "SELECT nama_document FROM transaksi_video_upload 
                  WHERE kode = '{$kode}' AND kategory = '{$kategori}' AND divisi = '{$divisi}'";
        $result1 = odbc_exec($connection, $query1);
        // Ambil hasil nama dokumen
        $nama_document_old = odbc_result($result1, "nama_document");
        // Jika nama dokumen tidak kosong
        if (!empty($nama_document_old)) {
            // Pastikan nama file aman (tanpa path ilegal)
            $nama_document_old = basename(trim($nama_document_old));
            $path = FOLDER . $nama_document_old;
            // Jika file ada, hapus
            if (file_exists($path)) {
                unlink($path);
            }
        }
    
         $files = $_FILES['file'];
					$file_name = $files['name'];
					$file_tmp = $files['tmp_name'];
					$file_size = $files['size'];
					$file_error = $files['error'];
					$fileType = $files['type'];
					
						if ($file_error !== UPLOAD_ERR_OK) {
							return "Error uploading $file_name. Error code: $file_error<br>";
						}
						if(($fileType == "video/mp4")){
                            $new_nama 	 = $file_name;
                            $destination = FOLDER.$new_nama;
                            if (move_uploaded_file($file_tmp, $destination)) {
                            $nama_atter = $new_nama;
                            }
					   } 

    }
   
 

 if(isset($nama_atter)){
     $size_file =  KomperseSizeUkuran($file_size);
		 $size_type = sizeType($file_size);

 $sql="UPDATE [transaksi_video_upload] SET  tanggal = '". $tanggal ."',
     judul ='". $judul ."', tujuan ='". $tujuan ."', link ='". $link ."', ket ='". $ket ."' ,
     nama_document='{$nama_atter}',ukuran_file='{$size_file}',size_type='{$size_type}',type_file='{$fileType}'
    WHERE kode ='{$kode}' AND kategory = '{$kategori}' AND divisi = '{$divisi}'
    "; 
 }else{
 $sql="UPDATE [transaksi_video_upload] SET  tanggal = '". $tanggal ."',
     judul ='". $judul ."', tujuan ='". $tujuan ."', link ='". $link ."', ket ='". $ket ."' 
    WHERE kode = '{$kode}' AND kategory = '{$kategori}' AND divisi = '{$divisi}'
    "; 
 }
  

      $result = odbc_exec($connection, $sql);
  
    if(!$result){
      $cek = $cek+1;
    }
    if ($cek==0){
      odbc_commit($connection);
      $status['nilai']=1; //bernilai benar
      $status['error']="Data Berhasil di edit";
    }else{
      odbc_rollback($connection);
      $status['nilai']=0; //bernilai benar
      $status['error']="Data Gagal di edit";
    }
    odbc_close($connection);
    echo json_encode($status);
  }


   function KomperseSizeUkuran($fileSizeBytes){
		if ($fileSizeBytes < 1024) {
			$sizeFormatted = $fileSizeBytes;
		} elseif ($fileSizeBytes < (1024 * 1024)) {
			$sizeFormatted = number_format($fileSizeBytes / 1024, 2);
		} elseif ($fileSizeBytes < (1024 * 1024 * 1024)) {
			$sizeFormatted = number_format($fileSizeBytes / (1024 * 1024), 2);
		} else {
			$sizeFormatted = number_format($fileSizeBytes / (1024 * 1024 * 1024), 2);
		}
	

		return $sizeFormatted;
		
	}


  function sizeType($fileSizeBytes) {
		switch (true) {
			case ($fileSizeBytes < 1024):
				return "Bytes";
			case ($fileSizeBytes < (1024 * 1024)):
				return "KB";
			case ($fileSizeBytes < (1024 * 1024 * 1024)):
				return "MB";
			default:
				return "GB";
		}
	}