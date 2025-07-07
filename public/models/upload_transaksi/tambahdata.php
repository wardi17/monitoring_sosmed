<?php
//include library

session_start();
$user_log = $_SESSION['login_user'];

require_once ("../../models/koneksi.php");
require_once ("../../config.php"); 
$connection =$database->open_connection();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$dateEntry = date("m/d/Y");
$username =$user_log;
  $cek = 0;
  $valid = 0;

  $tgl_waktu= test_input($_POST["tanggal"]);
  $divisi= test_input($_POST["divisi"]);

  
  $kategory =test_input($_POST["kategori"]);
  $kode =test_input($_POST["kode"]);
  $judul = test_input($_POST["judul"]);
  $tujuan = test_input($_POST["tujuan"]);
  $link = test_input($_POST["link"]);
  $ket = test_input($_POST["ket"]);
 
 //cek transaksi tidak boleh sama
 $query = "SELECT DISTINCT * FROM transaksi_video_upload where kode ='$kode' AND kategory='{$kategory}' AND divisi='{$divisi}' ";

 $sql=odbc_exec($connection,$query);
 $rows= odbc_fetch_array($sql); 
 if($rows > 0){
       $valid=1;
   }

   if($valid == 0){

      if(!empty($_FILES)){
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



 if($nama_atter !==""){
        $size_file =  KomperseSizeUkuran($file_size);
			  $size_type = sizeType($file_size);
    $sql="INSERT INTO [transaksi_video_upload] (tanggal,kode,divisi,kategory,judul,tujuan,link,ket,dateEntry,username,
    nama_document,ukuran_file,size_type,type_file) Values ('". $tgl_waktu ."','". $kode ."','". $divisi ."','". $kategory ."','". $judul ."','".$tujuan."'
    ,'".$link."','".$ket."','".$dateEntry."','".$username."',
    '{$nama_atter}','{$size_file}','{$size_type}','{$fileType}'
    )"; 

    $result = odbc_exec($connection, $sql);
    if(!$result){
      $cek =$cek+1;
    }
  
    if ($cek==0){
      odbc_commit($connection);
      $status['nilai']=1; //bernilai benar
      $status['error']="Data Berhasil Ditambahkan";
    }else{
      odbc_rollback($connection);
      $status['nilai']=0; //bernilai benar
      $status['error']="Data Gagal Ditambahkan";
    }
    odbc_close($connection);
  }else{
				$status['nilai']=0; //bernilai benar
				$status['error'] ="gagal upload harus mp4";
			}
  

} else{
		$status['nilai']= 0; //bernilai salah
		$status['error']="nik Sudah terdaftar silahkan ganti kategory";
  }

    echo json_encode($status);




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