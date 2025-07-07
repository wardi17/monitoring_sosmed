<div id="main">
<?php include 'views/pages/burger.php' ?>
<?php require_once ("models/master_target/get_kategory.php");

  ?>
<style>
     .error {
      color: red;
    }

      .ldBar path.mainline {
        stroke-width: 10;
        stroke: #09f;
        stroke-linecap: round;
      }
      .ldBar path.baseline {
        stroke-width: 14;
        stroke: #f1f2f3;
        stroke-linecap: round;
        filter:url(#custom-shadow);
      }

      .loading-spinner{
      width:30px;
      height:30px;
      border:2px solid indigo;
      border-radius:50%;
      border-top-color:#0001;
      display:inline-block;
      animation:loadingspinner .7s linear infinite;
    }


    @keyframes loadingspinner{
      0%{
        transform:rotate(0deg)
      }
      100%{
        transform:rotate(360deg)
      }
    }
    #progressBar {
            width: 100%;
            background-color: #f3f3f3;
            border-radius: 5px;
            display: none;
        }

     #progressBar div {
            height: 20px;
            width: 0%;
            background-color: #4caf50;
            text-align: center;
            line-height: 20px;
            color: white;
            border-radius: 5px;
        }
</style>
<div class ="col-md-12 col-12">
  <div class="card">
    <di class="card-header">
    <h3>Upload</h3>
    </di>
    <div class="card-content">
      <div class="card-body">
        <div id="progressBar"><div>0%</div></div>
        <p id="status"></p>
      <form  id ="formtambah" class ="form form-horizontal">
                <div class ="row col-md-12 mb-2">
                  <label class="col-sm-3 col-form-label" >Divisi</label>
                    <div id="divisi" class ="col-md-2"></div>
                       <span id="divisiError" class="error"></span>
                  </div>
                <div class =" row col-md-12 mb-3">
                <label for="tanggal" class="col-sm-3 col-form-label" >Tanggal Upload</label>
                  <div class = "col-md-2">
                      <input type="text"  class="form-control" name ="tanggal" id="tanggal" value="" required>
                  </div>
                </div>
                 
                  
                  <?php $upload_file = $category->category();?>
                    
                        <div class ="row col-md-12 mb-2">
                        <label for="uplod" class="col-sm-3 col-form-label" >Kategori</label>
                        <div  id="kategori" class ="col-md-9"></div>
                         <span id="kategoriError" class="error"></span>
                     </div>
                   
                      <div class="row col-md-12 mb-2">
                                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-4">
                                <input type="text"  class="form-control" name ="judul" id="judul" value="" required>
                                </div>
                              <span id="judulError" class="error"></span>
                        </div>
                        <div class="row col-md-12 mb-2">
                                <label for="kode" class="col-sm-3 col-form-label">Kode</label>
                                <div class="col-sm-4">
                                <input type="text"  class="form-control" name ="kode" id="kode" value="" required>
                                </div>
                             <span id="kodeError" class="error"></span>
                        </div>
                      <div class="row col-md-12 mb-2">
                                <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
                                <div class="col-sm-4">
                                <textarea  class="form-control" name ="tujuan" id="tujuan" value="" required></textarea>
                                </div>
                        </div>
                           <div class="row mb-12 mb-2">
                                        <label for="videoUpload" class="col-sm-3 col-form-label">Upload Video (MP4):</label>
                                        <div  class="col-sm-4">
                                          <input  type="file"  id="videoUpload"  accept="video/mp4" required class="form-control">
                                        </div>
                                        <span id="videoUploadError" class="error"></span>
                            </div>
                           <div class="row col-md-12 mb-2">
                                <label for="link" class="col-sm-3 col-form-label">Link_url</label>
                                <div class="col-sm-4">
                                  <input type="url"  class="form-control" name ="link" id="link" value="" required>
                                </div>
                               <span id="linkError" class="error"></span>
                              </div>
                        <div class="row col-md-12">  
                                <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-4">
                                  <textarea type="text" class="form-control"  name="ket" id="ket" value="" required> </textarea>
                                </div>
                        </div>
                            </div>
                            <div class="col-sm-11 d-flex justify-content-end">
                                    <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Createdata">Save</button>
                                  </div>
          </form>
      </div>
    </div>
  </div>
  </div>
</div>

<script>
$(document).ready(function(){

    //upadet terbaru  2025
       document.getElementById("videoUpload").addEventListener("change", function () {
        let file = this.files[0]; // Ambil file yang dipilih
        let errorMessage = document.getElementById("videoUploadError");

        if (file) {
            let fileType = file.type; // Ambil tipe file
            if (fileType !== "video/mp4") {
                errorMessage.textContent = "Hanya file MP4 yang diperbolehkan!";
                this.value = ""; // Reset input file
            } else {
                errorMessage.textContent = ""; // Hapus pesan error jika valid
            }
        }
      });


        ValidasiInputan();
    // and


  var d = new Date();
  var month = d.getMonth()+1;
  var day = d.getDate();
  var output =(day<10 ? '0' : '') + day + '/' +
   (month<10 ? '0' : '') + month + '/' +
    d.getFullYear() 
  $("#tanggal").val(output);
  $(".checkdivisi").on("click",function(){
    $(".checkdivisi").not(this).prop('checked',false);
  });

  $(".checkupload").on("click",function(){
    $(".checkupload").not(this).prop('checked',false);
  });

  get_data_divisi();
  get_data_kategori();
    
  $("#Createdata").on('click',function(e){
    e.preventDefault();
    let tgl = $("#tanggal").val();
    let tanggal = myformat(tgl);
    let divisi = $("input[type=radio][name=divisi]:checked").val();
    let kategori = $("input[type=radio][name=kategori]:checked").val();

    let judul = $("#judul").val();
    let kode = $("#kode").val();
 
    let tujuan = $("#tujuan").val();
    let videoUpload = $("#videoUpload")[0].files[0];
    let link = $("#link").val();
    let ket = $("#ket").val();

     // Reset pesan error
    $("#divisiError, #kategoriError, #judulError,#videoUploadError, #linkError").text("");
  
    // Validasi input kosong
    let isValid = true;
    if(!divisi){
       $("#divisiError").text("divisi harus di pilih");
       isValid = false;
    }

    if(!kategori){
      $("#kategoriError").text("kategori harus di pilih");
       isValid = false;
    }

    if(!kode){
      $("#kodeError").text("kode harus di isi dulu !!!");
       isValid = false;
    }

    if (!videoUpload) {
        $("#videoUploadError").text("Harap pilih file sebelum menyimpan.");
        isValid = false;
    }

   if(!link){
      $("#linkError").text("link harus di isi dulu !!!");
       isValid = false;
    }

    if(!isValid) return;

       // Validasi ukuran file (maksimal 2GB)
    let maxSize = 2 * 1024 * 1024 * 1024; // 2GB
    if (videoUpload.size > maxSize) {
        Swal.fire({
            icon: "error",
            title: "File terlalu besar!",
            text: "Maksimal file yang diperbolehkan adalah 2GB.",
            confirmButtonText: "OK"
        });
        return;
    }


    // Buat objek FormData
    let formData = new FormData();
    formData.append("tanggal", tanggal);
    formData.append("divisi", divisi);
    formData.append("kategori", kategori);
    formData.append("judul", judul);
    formData.append("kode", kode);
    formData.append("tujuan", tujuan);
    formData.append("link", link);
    formData.append("ket", ket);
    formData.append("file", videoUpload);

    saveData(formData);
    
  })

  });
  $( function() {
        $( "#tanggal" ).datepicker(
          {dateFormat : 'dd/mm/yy'}
        );
     
  });

  //fungsi baru 2025
      function ValidasiInputan(){
            $("#divisi").blur(function() {
            let email = $(this).val();
            if (email === "") {
              $("#divisiError").text("divisi harus di pilih");
            } else {
              $("#divisiError").text("");
            }
            });

            $("#kategori").blur(function() {
            let email = $(this).val();
            if (email === "") {
              $("#kategoriError").text("kategori harus di pilih");
            } else {
              $("#kategoriError").text("");
            }
            });

            $("#kode").blur(function() {
            let email = $(this).val();
            if (email === "") {
              $("#kodeError").text("kode harus di isi dulu !!!");
            } else {
              $("#kodeError").text("");
            }
            });

              $("#videoUpload").on("change", function() {
              let file = this.files[0];
              let maxSize = 2 * 1024 * 1024 * 1024; // 2GB
              let errorMessage = document.getElementById("videoUploadError");

              if (file && file.size > maxSize) {
                errorMessage.textContent="Ukuran file terlalu besar! Maksimal 2GB";
                  this.value = ""; // Reset input file
              }else{
                errorMessage.textContent ="";
              }
          });


             $("#link").blur(function() {
            let email = $(this).val();
            if (email === "") {
              $("#linkError").text("link harus di isi dulu !!!");
            } else {
              $("#linkError").text("");
            }
            });

      }



   saveData=(datas)=>{
    $("#status").text("Uploading...");
   $("#Createdata").prop("disabled", true).text("Uploading...");
      $.ajax({
      url:'models/upload_transaksi/tambahdata.php',
      method:'POST',
       data:datas,
       processData: false, // Tambahkan ini agar FormData tidak diproses sebagai string
        contentType: false, // Tambahkan ini agar FormData dikirim dengan header yang benar
            xhr: function() {
                        let xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(e) {
                            if (e.lengthComputable) {
                                let percent = Math.round((e.loaded / e.total) * 100);
                                let progressBar = $("#progressBar div");

                                // Set warna berdasarkan progress
                                let color = percent < 30 ? "#FF5733" : percent < 70 ? "#FFC300" : "#4CAF50";
                                progressBar.css({"width": percent + "%", "background-color": color}).text(percent + "%");
                            }
                        }, false);
                        return xhr;
                    },

       success:function(result){
        let nilai = result.nilai;
        let status = result.error;
         $("#progressBar").hide();

  
         $("#Createdata").prop("disabled", false).text("Save");
          if(nilai === 1){
            $("#formtambah").trigger("reset");
                     Swal.fire({         
                            position: 'top-center',
                            icon: 'success',
                            title: status,
                          }).then(function(){ 
                            window.location ="index.php?page=riport";
                          }); 

          }else{
            $("#formtambah").trigger("reset");
            Swal.fire({         
                            position: 'top-center',
                            icon: 'success',
                            title: status,
                          }).then(function(){ 
                            window.location ="index.php?page=riport";
                          }); 

          }
       },
      error: function (xhr, status, error) {
              Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Terjadi kesalahan!',
                    text:"Gagal simpan data !! 400",
                    showConfirmButton: true
                });
              //$("#status").text("Terjadi kesalahan dalam upload.");
              $("#progressBar").hide();
              $("#Createdata").show();
            }
    })
   }   
  //and fungsi baru 2025
  
  // UNTUK MENAMILKAN DATA DIVISI
function get_data_divisi(){

  $.ajax({
          url:'models/master_divisi/tampildata.php',
          method:'POST',
          dataType:'json',      
          success:function(response){
                let data =``;
              $.each(response,function(key,value){
                let divisi = value.nama_divisi;
                data +=`
                <div class="form-check form-check-inline">
                                <input class="form-check-input checktambah" for ="${divisi}" type="radio" id="${divisi}" name="divisi" value="${divisi}" required>
                                <label class="form-check-label" for ="${divisi}">${divisi}</label>
                    </div>
                `;

              });
              $("#divisi").empty().html(data);  
          }

        });
}
//END DATA DIVISI
// untuk kategory
function get_data_kategori(){
        $.ajax({
                url:'models/master_target/tampildata.php',
                method:'POST',
                dataType:'json',      
                success:function(response){
                  
                      let data =``;
                    $.each(response,function(key,value){
                     
                      let ktg = value.kategory;
                      data +=`
                      <div class="form-check form-check-inline">
                                      <input class="form-check-input check_kategori" for ="${ktg}" type="radio" id="${ktg}" name="kategori" value="${ktg}" required>
                                      <label class="form-check-label" for ="${ktg}">${ktg}</label>
                          </div>
                      `;

                    });
                    $("#kategori").empty().html(data);  
                }

              });
      
      }
//end kategory
//untuk format tanggal simpan edit
function myformat(date){
   let d = date.split('/')[0];
   let m = date.split('/')[1];
   let y = date.split('/')[2];
   let format = y + "-" + m + "-" + d;
   
   return format;
 }
  //end format tanggal 
</script>