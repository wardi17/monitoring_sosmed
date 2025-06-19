<div id="main">
<?php include 'views/pages/burger.php' ?>
<?php require_once ("models/master_target/get_kategory.php");

  ?>

<div class ="col-md-12 col-12">
  <div class="card">
    <di class="card-header">
    <h3>Upload</h3>
    </di>
    <div class="card-content">
      <div class="card-body">
      <form  id ="formtambah" class ="form form-horizontal">
                <div class ="row col-md-12 mb-2">
                  <label class="col-sm-3 col-form-label" >Divisi</label>
                    <div id="divisi" class ="col-md-2">
                      
                    </div>
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
                     </div>
                   
                      <div class="row col-md-12 mb-2">
                                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-4">
                                <input type="text"  class="form-control" name ="judul" id="judul" value="" required>
                                </div>
                        </div>
                        <div class="row col-md-12 mb-2">
                                <label for="kode" class="col-sm-3 col-form-label">Kode</label>
                                <div class="col-sm-4">
                                <input type="text"  class="form-control" name ="kode" id="kode" value="" required>
                                </div>
                        </div>
                      <div class="row col-md-12 mb-2">
                                <label for="tujuan" class="col-sm-3 col-form-label">Tujuan</label>
                                <div class="col-sm-4">
                                <textarea  class="form-control" name ="tujuan" id="tujuan" value="" required></textarea>
                                </div>
                        </div>
                      <div class="row col-md-12 mb-2">
                                <label for="link" class="col-sm-3 col-form-label">Link_url</label>
                                <div class="col-sm-4">
                                  <input type="url"  class="form-control" name ="link" id="link" value="" required>
                                </div></div>
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
    let link = $("#link").val();
    let ket = $("#ket").val();

 
    

    $.ajax({
      url:'models/upload_transaksi/tambahdata.php',
      method:'POST',
       data:{tanggal:tanggal,divisi:divisi,kategori:kategori,judul:judul,kode:kode,tujuan:tujuan,link:link,ket:ket},
       cache:true,
       dataType:'json',
      //  beforeSend :function(){
      //         Swal.fire({
      //           title: 'Loading Save...',
      //           html: 'Please wait...',
      //           allowEscapeKey: false,
      //           allowOutsideClick: false,
      //           didOpen: () => {
      //             Swal.showLoading()
      //         }
      //           });
      //       },
       success:function(result){
        let nilai = result.nilai;
        let status = result.error;
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
       }
    })
  })

  });
  $( function() {
        $( "#tanggal" ).datepicker(
          {dateFormat : 'dd/mm/yy'}
        );
     
  });

  
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