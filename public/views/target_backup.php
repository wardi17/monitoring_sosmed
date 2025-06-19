<div id="main">
<?php include 'views/pages/burger.php' ?>
  <div id="header_data"></div>
  <div class ="col-md-12 col-12">
      <!-- <h3 class="text-center">Target upload</h3> -->
            <div class="col-md-12 text-end">
                            <button type="button" class="btn btn-lg" data-bs-toggle="modal" data-bs-target="#TambaModal">
                            <i class="fa-regular fa-file"></i>
                            </button>    
                              <!-- <button type="button" class="btn"  id="Print">
                                  <i class="fa-solid fa-print fa-lg text-secondary"></i>
                              </button> -->
            </div>
    
  </div>
 
    <!-- Basic Tables start -->
    <div id="tabelhead"></div>
    <!-- Basic Tables end -->

</div>
<!-- Modal  tambah baru -->
<div class="modal fade" id="TambaModal" tabindex="-1" aria-labelledby="TambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form  id ="formtambah" enctype="multipart/form-data" action="" method="POST" class ="form form-horizontal">
                <div class ="row col-md-12 mb-2">
                        <label class="col-sm-3 col-form-label" >Divisi</label>
                          <div id="divisi" class ="col-md-2"></div>
                          
                  </div>
                  <div class ="row col-md-12 mb-3">
                                    <label for="tahun" class="col-sm-3 col-form-label">Year</label>
                                    <div class="col-md-3">
                                    <select class="form-select form-select" id="tahuntambah" aria-label=".form-select-sm example">                            
                                      <?php  
                                      for($i=date("Y")-0; $i <=date("Y")+5; $i++){
                                      ?>
                                        <option value="<?php echo $i;?>">
                                      <?php echo $i;?></option>
                                      <?php }?>
                                      </select>
                                    </div>
                    </div>
                    <div class ="row col-md-12 mb-3">
                        <label for="priode" class="col-sm-3 col-form-label">Month</label>
                        <div class="col-md-4">
                        <select class="form-select form-select" id="bulanName" aria-label=".form-select-sm">
                          <?php 
                              $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                              foreach ($bulan as $bulans) {
                            ?>
                            <option value="<?php echo $bulans;?>">
                          <?php echo $bulans;?></option>
                          <?php }?>
                          </select>
                        </div>
                    </div>
                  <div class="row col-md-12 mb-3">
                                <label for="kategory" class="col-sm-3 col-form-label">Category</label>
                                <?php $kategory =["Youtube","TikTok","Instagram","Facebook","Twitter"] ?>
                                  <div class ="col-md-4">
                                  <select class="form-select form-select" id="kategory" aria-label=".form-select-sm">
                                    <?php  foreach($kategory as $file):?>
                                      <option value="<?= $file?>"><?=$file?></option>
                                    <?php endforeach;?>
                                  </select>
                                  </div>
                  </div>
                  
                        <div class="row col-md-12">  
                                <label for="target" class="col-sm-3 col-form-label">Target </label>
                                <div class="col-sm-3">
                                  <input type="number" class="form-control"  name="target" id="target" value="" required>
                                </div>
                        </div>
                          
                        </div>
                            <div class="col-sm-11 d-flex justify-content-end">
                                    <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Createdata">Save</button>
                                    <button type="button" class="btn btn-secondary me-1 mb-3" data-bs-dismiss="modal">Close</button>
                                  </div>
      </form>
        </div>
</div>
</div>
<!-- end modal tambah -->

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
                  <input  type="hidden" class="form-control" id="div_delete">                            

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
                  <div class ="row col-md-12 mb-3">
                          <label for="tahun_delete" class="col-sm-3 col-form-label">Year</label>
                          <div class="col-md-3">
                          <input  disabled class="form-select form-select" id="tahun_delete">                            
                          
                            
                          </div>
                  </div>
                 
                      <div class ="row col-md-12 mb-3">
                        <label for="bulan_delete" class="col-sm-3 col-form-label">Month</label>
                        <div class="col-md-4">
                        <select disabled class="form-select form-select" id="bulan_delete" aria-label=".form-select-sm example">
                          <?php 
                              $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                              foreach ($bulan as $bulans) {
                            ?>
                            <option value="<?php echo $bulans;?>">
                          <?php echo $bulans;?></option>
                          <?php }?>
                          </select>
                        </div>
                    </div>
                    <div class="row col-md-12 mb-3">
                                <label for="kategory" class="col-sm-3 col-form-label">Category</label>
                                <?php $kategory =["Youtube","TikTok","Instagram","Facebook","Twitter"] ?>
                                  <div class ="col-md-4">
                                  <select disabled class="form-select form-select" id="ktg_delete" aria-label=".form-select-sm">
                                    <?php  foreach($kategory as $file):?>
                                      <option value="<?= $file?>"><?=$file?></option>
                                    <?php endforeach;?>
                                  </select>
                                  </div>
                     </div>
                        <div class="row col-md-12">  
                                <label for="target_delete" class="col-sm-3 col-form-label">Target </label>
                                <div class="col-sm-3">
                                  <input  disabled type="number" class="form-control"  name="target" id="target_delete" value="" required>
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

<!-- Modal  edit data  -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class ="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditModalLabel">Edit data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
                <div class="modal-body">
                  <form id="formedit">
                  <div class ="row col-md-12 mb-2">
                    <label class="col-sm-3 col-form-label" >Divisi</label>
                    <div id="divisi" class ="col-md-2"></div>
                   </div>
                  </div>
                  <div class ="row col-md-12 mb-3">
                          <label for="tahun" class="col-sm-3 col-form-label">Year</label>
                          <div class="col-md-3">
                          <select disabled class="form-select form-select" id="tahunedit" aria-label=".form-select-sm example">                            
                          
                            </select>
                          </div>
                  </div>
                 
                      <div class ="row col-md-12 mb-3">
                        <label for="priode" class="col-sm-3 col-form-label">Month</label>
                        <div class="col-md-4">
                        <select disabled class="form-select form-select" id="bulanedit" aria-label=".form-select-sm example">
                          <?php 
                              $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                              foreach ($bulan as $bulans) {
                            ?>
                            <option value="<?php echo $bulans;?>">
                          <?php echo $bulans;?></option>
                          <?php }?>
                          </select>
                        </div>
                    </div>
                    <div class="row col-md-12 mb-3">
                                <label for="kategory" class="col-sm-3 col-form-label">Category</label>
                                <?php $kategory =["Youtube","TikTok","Instagram","Facebook","Twitter"] ?>
                                  <div class ="col-md-4">
                                  <select disabled class="form-select form-select" id="kategoryedit" aria-label=".form-select-sm">
                                    <?php  foreach($kategory as $file):?>
                                      <option value="<?= $file?>"><?=$file?></option>
                                    <?php endforeach;?>
                                  </select>
                                  </div>
                     </div>
                        <div class="row col-md-12">  
                                <label for="target" class="col-sm-3 col-form-label">Target </label>
                                <div class="col-sm-3">
                                  <input type="number" class="form-control"  name="target" id="targetedit" value="" required>
                                </div>
                        </div>
                    </div>
                        <div class="col-sm-11 d-flex justify-content-end">
                                    <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Editdata">Save</button>
                                    <button type="button" class="btn btn-secondary me-1 mb-3" id="close" data-bs-dismiss="modal">Close</button>
                        </div>
                        
                  </form>
                </div>
              </div>
    </div>
<!-- end modal edit -->

<script>
$(document).ready(function(){
  const dateya = new Date();
    let bulandefault = dateya.getMonth()+1;
    let tahundefault = dateya.getFullYear();
    let tahun = tahundefault;
    getbulan(tahun);
    tahun_edit();
    get_data_divisi();
    $(document).on('click', 'input[type="checkbox"]', function() {      
        $('input[type="checkbox"]').not(this).prop('checked', false);      
    });
//tambah data
  $("#Createdata").on('click',function(e){
    e.preventDefault();
    let divisi = $("input[type=checkbox][name=divisi]:checked").val();
    let kategory = $("#kategory").find(":selected").val();
    let bulan = $('#bulanName').find(":selected").val();
    let tahun = $('#tahuntambah').find(":selected").val();
    let target = $("#target").val();

    $.ajax({
      url:'models/master_target/tambahdata.php',
      method:'POST',
       data:{kategory:kategory,divisi:divisi,bulan:bulan,tahun:tahun,target:target},
       cache:true,
       dataType:'json',
       success:function(result){
        let nilai = result.nilai;
          if(nilai === 1){
            $("#formtambah").trigger("reset");
            $('#TambaModal').modal("hide");
            location.reload();
          Swal.fire(nilai) 

          }else{
            location.reload();

          }
       }
    })
  });
  //end tambah data
    // delete data 
    $(document).on("click",".open-delete",function(){
      let row = jQuery(this).closest('tr');
        let columns = row.find('td'); 
        let tahun ="";
        let bulan ="";
        let target ="";
        let divisi ="";
        let kategory ="";
        columns.addClass('row-highlight');
        jQuery.each(columns, function(key, item) { 
            switch(key){
              case 0:
            tahun = item.innerHTML;
            break;
            case 1:
             bulan = item.innerHTML;
          
              break;
            case 2 :
              kategory = item.innerHTML;
           
              break;
            case 3 :
               divisi = item.innerHTML;
           
              break;
            case 4 :
                  target = item.innerHTML;
              break;
          }
        
        });
        if(divisi =="CS"){
          $(".checkdivisi_dl").attr("disabled", true);
          $(".modal-body #cs_dl").prop("checked",true);
          $(".modal-body #pd3r_dl").prop("checked",false);
        }else if(divisi =="PD3R"){
          $(".checkdivisi_dl").attr("disabled", true);
          $(".modal-body #pd3r_dl").prop("checked",true);
          $(".modal-body #cs_dl").prop("checked",false);

        }
        $(".modal-body #tahun_delete").val(tahun);
        $(".modal-body #bulan_delete").val(bulan);
        $(".modal-body #target_delete").val(target);
        $(".modal-body #div_delete").val(divisi);
        $(".modal-body #ktg_delete").val(kategory);
        
    });

    $("#delete").on("click",function(e){
        e.preventDefault();
        let kategory = $("#ktg_delete").val();
     
        let tahun = $("#tahun_delete").val();
        let bulan = $("#bulan_delete").val();

        let divisi = $("#div_delete").val();
       

        $.ajax({
            url:"models/rpt_target/delete_data.php",
            type:"POST",
            data:{kategory:kategory,tahun:tahun,bulan:bulan,divisi:divisi},
                dataType:'json',                  
            success: function(result){ 
            let obj = result;
            if (obj.nilai === 1) {
                            $("#formdelete").trigger("reset");
                            $('#deleteModal').modal("hide");
                            location.reload();
                      
                            return false;                         
                            }
            }
        
        })
    });
    //end delete data
    //edit data
    $(document).on("click",".open-edit",function(){
     
          let tahun = "";
          let bulan = "";
          let kategory ="";
          let jumlah = "";
          let target = "" ;
          let divisi ="";
          let row = jQuery(this).closest('tr');
          let columns = row.find('td'); 
          columns.addClass('row-highlight'); 
          jQuery.each(columns, function(key, item) { 
              switch(key){
                case 0:
                  tahun = item.innerHTML;
                  break;
                case 1:
                  bulan = item.innerHTML;
                  break;
                  case 2:
                  kategory = item.innerHTML;
                  break;
                case 3 :
                  divisi = item.innerHTML;

                  break;
                case 4 :
                  target = item.innerHTML;
                  break;
                
              }

    });
   
    if(divisi =="CS"){
      $(".checkdivisi_edit").attr("disabled", true);
      $(".modal-body #cs_edit").prop("checked",true);
    }else if(divisi =="PD3R"){
      $(".checkdivisi_edit").attr("disabled", true);
      $(".modal-body #pd3r_edit").prop("checked",true);
    }
    
 
    $(".modal-body #bulanedit").val(bulan);
    $(".modal-body #tahunedit").val(tahun);
    $(".modal-body #kategoryedit").val(kategory);
    $(".modal-body #targetedit").val(target);

});

$("#close").on("click",function(e){
  e.preventDefault();
  $("#formedit").trigger("reset");
})
    $("#Editdata").on("click",function(e){
        e.preventDefault();
       
        let  tahun = $("#tahunedit").find(":selected").val();
        let  bulan = $("#bulanedit").find(":selected").val();
        let  kategory = $("#kategoryedit").find(":selected").val();
        let  target = $("#targetedit").val();
        let divisi = $("input[type=checkbox][name=divisi]:checked").val();

        $.ajax({
            url:'models/rpt_target/edit_data.php',
            type:'POST',
            dataType:'json',
            data :{kategory:kategory,bulan:bulan,tahun:tahun,target:target,divisi:divisi},
        
            success:function(result){
            $("#formedit").trigger("reset");
            window.location.href="index.php?page=target";
            return false;    
            }
        });
    });
//end edit
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
    <h4 class="text-center">Target Upload </h4>
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
                                                <th style="width:2%">Tahun</th>
                                                <th style="width:2%">Bulan</th>
                                                <th style="width:2%">Kategori</th>
                                                <th style="width:2%">Divisi</th>
                                                <th style="width:2%">Target</th>
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
        $.ajax({
            url: 'models/rpt_target/tampildata.php',
            method :'POST',
            data:{tahun:years},
            cache:true,
            dataType:'json',
            success: function(response){

                $("#tabel1").DataTable({
                
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
                                { 'data': 'tahun' },
                                { 'data': 'bulan' },
                                { 'data': 'kategory' },
                                { 'data': 'divisi' },
                                
                               
                                {
                                    data: 'target',render: $.fn.dataTable.render.number(',', 0, ''),
                                    
                                },
                                { "render": function ( data, type) { // Tampilkan kolom aksi
                                  let html  ='<button type="button"   class=" open-edit btn btn-lg btn-space" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="fa-regular fa-pen-to-square"></i></button>'

                                html += '<button type="button" class=" open-delete  btn  btn-lg" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-regular fa-trash-can"></i></button>'
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
                                  <input class="form-check-input checkdivisi_tambah" for ="${divisi}" type="checkbox" id="checkdivisi_tambah" name="divisi" value="${divisi}" required>
                                  <label class="form-check-label" for ="${divisi}">${divisi}</label>
                      </div>
                  `;

                });
                $("#divisi").empty().html(data);  
            }

          });
}
//END DATA DIVISI
</script>