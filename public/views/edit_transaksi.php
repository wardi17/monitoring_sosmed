<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<div id="main">
<?php include 'views/pages/burger.php' ?>
  <div id="header_data"></div>

 
    <!-- Basic Tables start -->
    <div id="tabelhead"></div>
    <!-- Basic Tables end -->

</div>


  <!-- Modal delete -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class ="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditModalLabel">Delete data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
                <div class="modal-body">
                  <form id="formdelete">
                  <div class ="row col-md-12 mb-3">
                      <label for="tanggal_delete" class="col-sm-3 col-form-label">Tanggal</label>
                      <div class="col-md-4">
                      <input  type="text" disabled class="form-control" id="tanggal_delete" value="">  </input>                            
                        
                      </div>
                </div>                     
                <div class ="row col-md-12 mb-3">
                      <label for="tahun_delete" class="col-sm-3 col-form-label">Kode</label>
                      <div class="col-md-3">
                      <input  type="text" disabled class="form-control" id="kode_delete" value=""> </input>                             
                        
                      </div>
                </div>
                <div class="row col-md-12 mb-3">
                                <label for="kategory" class="col-sm-3 col-form-label">Categori</label>
                                <div class="col-md-3">
                      <input  type="text" disabled class="form-control" id="ktg_delete" value=""> </input>                             
                        
                      </div>
                     </div>
                  
                  <div class ="row col-md-12 mb-2">
                    <label class="col-sm-3 col-form-label" >Divisi</label>
                    <div class ="col-md-2">
                          <div class="form-check form-check-inline">
                          <input class="form-check-input checkdivisi_dl" type="checkbox" id="cs_dl" name="divisi" value="" required>
                          <label class="form-check-label" for="cs">CS</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input checkdivisi_dl" type="checkbox" id="pd3r_dl" name="divisi" value="" required>
                          <label class="form-check-label" for="pd3r">PD3R</label>
                        </div>
                    </div>
                  </div>
           
                  
      
              
                      <div class="col-sm-11 d-flex justify-content-end">
                            <button type="sumbit" id="delete" class="btn btn-primary me-1 mb-3" name="delete_user"><span class="glyphicon glyphicon-ok"></span>Yes</button> 
                          <button type="button" class="btn btn-secondary me-1 mb-3" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                        </div>
                        
                  </form>
                </div>
              </div>
    </div>
  </div>
<!-- end form delete  -->

 <!-- form untuk edit transaksi -->
    <div id ="formdata_edit">
    <div id="main">
      <div class ="col-md-12 col-12">
        <div class="card">
        <di class="card-header">
        <h3> Edit Upload</h3>
  
        <div class="card-content">
          <div class="card-body">
          <button onclick="goBack()" class="btn btn-lg mb-4"><i class="fa-solid fa-arrow-left"></i></button>
          <form  id ="formedit" class ="form form-horizontal">
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
                                    <input type="text"  disabled class="form-control" name ="kode" id="kode" value="" required>
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
                                        <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Save_edit">Save</button>
                                        <button  type="button" class="btn btn-danger me-1 mb-3" id="Deletedata">Delete</button>
                                        <button  type="button"  class="btn btn-secondary me-1 mb-3" onclick="goBack()">Close</button>
                                      </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- end edit transaksi -->
<script>
$(document).ready(function(){
  $("#formdata_edit").hide();
  const dateya = new Date();
    let bulandefault = dateya.getMonth()+1;
    let tahundefault = dateya.getFullYear();
    let tahun = tahundefault;
    getbulan(tahun);
    tahun_edit();
    get_data_divisi();
    get_data_kategori();
   
   

    // delete data 
    $("#Deletedata").on("click",function(e){
        e.preventDefault();
        let kode = $("#kode").val();
      
        $.ajax({
            url:"models/upload_transaksi/delete_data.php",
            type:"POST",
            data:{kode:kode},
                dataType:'json',                  
            success: function(result){ 
          
                  Swal.fire({         
                            position: 'top-center',
                            icon: 'success',
                            title:"Data Berhasi di hapus",
                          }).then(function(){ 
                            location.reload();
                          }); 
            }
        
        })
    });
    //end delete data


    //edit data
    $(document).on("click",".open-edit",function(){
      
      $("#header_data").hide();
      $("#tabelhead").hide();
      $("#formdata_edit").show();
        let kode = $(this).data('id');
        
        $.ajax({
          url: 'models/upload_transaksi/update_data.php',
            method :'POST',
            data:{kode:kode},
            cache:true,
            dataType:'json',
            success: function(response){
              

              $.each(response,function(key,value){
                let kode = value.kode;
                let tgl = value.tanggal;
                let tgls = moment(tgl).toDate();
                let tanggal = moment(tgls).format('DD/MM/YYYY');
                let divisi = value.divisi;
                let kategory = value.kategory;
                let judul = value.judul;
                let ket = value.ket;
                let link = value.link;
                let tujuan = value.tujuan;

                if(kategory !== ''){
                  let ktg ="#"+kategory;
                  $(ktg).prop("checked",true);
                }
                if(divisi !== ''){
                let id_div ="#"+divisi;
                        $(id_div).prop("checked",true);	
                }	
                $("#kode").val(kode);
                $("#tanggal").val(tanggal);
                $("#judul").val(judul);
                $("#tujuan").val(tujuan);
                $("#link").val(link);
                $("#ket").val(ket);
                
              });
            }
        })

    });
   //end data edit
   
   //simpan edit data
  $("#Save_edit").on('click',function(e){
    e.preventDefault();
    let divisi = $("input[type=radio][name=divisi]:checked").val();
    let kategory = $("input[type=radio][name=kategori]:checked").val();
    let kode = $("#kode").val();
    let tgl = $('#tanggal').val();
    let tanggal = myformat(tgl);

    let judul = $('#judul').val();
    let tujuan = $('#tujuan').val();
    let link = $("#link").val();
    let ket = $("#ket").val();
    $.ajax({
      url:'models/upload_transaksi/edit_data_transaksi.php',
      method:'POST',
       data:{kode:kode,kategory:kategory,divisi:divisi,tanggal:tanggal,judul:judul,tujuan:tujuan,link:link,ket:ket},
       cache:true,
       dataType:'json',
       success:function(result){
        let status = result.error;
        Swal.fire({
                position: 'top-center',
              icon: 'success',
              title: status,
              }).then(function(){
                location.reload();
              }); 
          
       }
    })
  });
  //end simpan edit data

});


  

function tahun_edit(){
 
 let startyear = 2020;
 let date = new Date().getFullYear();
 
 let endyear = date + 2;
 
 for(let i = startyear; i <=endyear; i++){
   var selected = (i !== date) ? 'selected' : date; 

  $("#tahunedit").append($(`<option />`).val(i).html(i).prop('selected', selected));

 }
}


function getbulan(tahun){

    let dataTable =``;
    $.ajax({
            url:'models/rpt_target/get_bulanjs.php',
            method:'POST',
            data:{tahun:tahun},
            dataType:'json',      
            success:function(result){
             

                if(result == null){
                    get_header(tahun);
                }else{
                    get_header(tahun);
                    get_tables();
                    $.each(result,function(key,value){
                       let month =value.bulan;
                       let years = value.tahun
                       showdata(years);
                    })
                }
            }
    });      
} 
function get_header(tahun){
    let data_headr =`

    <div  class="page-heading mb-3">
    <div class="page-title">
    <h4 class="text-center">Edit Transaksi Upload </h4>
    </div></div>

    `;
    $("#header_data").html(data_headr);
}
function get_tables(){
    //   let id ="#"+tabel;
    //   let substr_bulan = bulan.substr(0,3);
        let dataTable =`
        <section class="section">
                <div class="card">
                    <div class="card-body">
                    <table id="tabel1" class='display table-info' style='width:100%'>                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                                <th style="width:7%">Tanggal</th>
                                                <th style="width:2%">Kode</th>
                                                <th style="width:2%">Kategori</th>
                                                <th style="width:2%">Divisi</th>
                                                <th style="width:15%">Judul</th>
                                                <th style="width:15%">Tujuan</th>
                                                <th style="width:15%">Ket</th>
                                                <th style="width:1%"><p class="text-center">Action &nbsp &nbsp</p></th>  
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table><br>
                                </div>
                            </div>
                        </section>

        `;
    $("#tabelhead").empty().html(dataTable);
};
function showdata(years){
     $("#formdata_edit").hide();
        $.ajax({
            url: 'models/upload_transaksi/tampildata.php',
            method :'POST',
            data:{tahun:years},
            cache:true,
            dataType:'json',
            success: function(response){

                $("#tabel1").DataTable({
                    response :true,
                    "ordering": false,
                    "destroy":true,
                    // dom: 'Plfrtip',
                    //     scrollCollapse: true,
                    paging:true,
                    //     "bPaginate":false,
                    //     "bLengthChange": false,
                    //     "bFilter": true,
                    //     "bInfo": false,
                    //     "bAutoWidth": false,
                    //     dom: 'lrt',
                        fixedColumns:   {
                        // left: 1,
                            right: 1
                        },
                        pageLength: 5,
                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
                                    
                        data: response,
                            columns: [
                                { 'data': 'tanggal' },
                                { 'data': 'kode' },
                                { 'data': 'kategory' },
                                { 'data': 'divisi' },
                                { 'data': 'judul' },
                                { 'data': 'tujuan' },
                                { 'data': 'ket' },

                                { "render": function ( data, type,row) { // Tampilkan kolom aksi
                                  let html  =`<button type="button"   data-id="${row.kode}" class=" open-edit btn btn-lg btn-space"><i class="fa-regular fa-pen-to-square"></i></button>`

                                return html
                                 }
                                },
                            ]      
                
                });
            }
        });

    };

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
                                <input class="form-check-input check_divisi" for ="${divisi}" type="radio" id="${divisi}" name="divisi" value="${divisi}" required>
                                <label class="form-check-label" for ="${divisi}">${divisi}</label>
                    </div>
                `;

              });
              $("#divisi").empty().html(data);  
          }

        });
}
//END DATA DIVISI
      // UNTUK MENAMILKAN DATA DIVISI
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
//END DATA DIVISI
function goBack(){
  $("#formedit").trigger("reset");
  $("#tabelhead").show();
    $("#formdata_edit").hide();
    $("#header_data").show();

     
}
//untuk format tanggal simpan edit
function myformat(date){
   
    let d = date.split('/')[0];
    let m = date.split('/')[1];
    let y = date.split('/')[2];
    let format = y + "-" + m + "-" + d;
    
    return format;
  }

  $( function() {
        $( "#tanggal" ).datepicker(
          {dateFormat : 'dd/mm/yy'}
        );
     
  });
</script>