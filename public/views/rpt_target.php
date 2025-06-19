<div id="main">
<?php include 'views/pages/burger.php' ?>

<div id="header_data"></div>
    <!-- Basic Tables start -->
 <div id="tabelhead"></div>
    <!-- Basic Tables end -->
</div>
<script>
$(document).ready(function(){
    const dateya = new Date();
    let bulandefault = dateya.getMonth()+1;
    let tahundefault = dateya.getFullYear();
    let tahun = tahundefault;
    getbulan(tahun);

  });
  
  // delete data 
    $(document).on("click",".open-delete",function(){
        let kategory = "";
    let row = jQuery(this).closest('tr');
        let columns = row.find('td'); 
    
        columns.addClass('row-highlight');
        
        jQuery.each(columns, function(key, item) { 
        
            if( key == 2){
            kategory = item.innerHTML;
            }
        
        });
    
        $(".modal-body #ktg_delete").val(kategory);
    });

    $("#delete").on("click",function(e){
        e.preventDefault();
        let kategory = $("#ktg_delete").val();
        console.log(kategory);
        $.ajax({
            url:"models/rpt_target/delete_data.php",
            type:"POST",
            data:{kategory:kategory},
                dataType:'json',                  
            success: function(result){ 
            let obj = result;
            if (obj.nilai === 1) {
                            $("#formdelete").trigger("reset");
                            $('#deleteModal').modal("hide");
                            showdata();           
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
          case 2 :
            kategory = item.innerHTML;
            break;
          case 3 :
            jumlah = item.innerHTML;
            break;
            case 4 :
            target = item.innerHTML;
            break;
        }

    });
          $(".modal-body #tahun").val(tahun);
          $(".modal-body #bulan").val(bulan);
          $(".modal-body #kategory").val(kategory);
          $(".modal-body #jumlah").val(jumlah);
          $(".modal-body #target").val(target);

});


    $("#Editdata").on("click",function(e){
       
        e.preventDefault();
        let  kategory = $("#kategory").val();
        let  bulan = $("#bulanName").find(":selected").val();
        let  tahun = $("#tahunedit").find(":selected").val();
        let  jumlah = $("#jumlah").val();
        let  target = $("#target").val();

        
        $.ajax({
            url:'models/rpt_target/edit_data.php',
            type:'POST',
            dataType:'json',
            data :{kategory:kategory,bulan:bulan,tahun:tahun,jumlah:jumlah,target:target},
        
            success:function(result){
            $("#formedit").trigger("reset");
            $('#EditModal').modal("hide");
            showdata(bulan,tahun);           
            return false;    
            }
        });
    });
//end edit
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
                       showdata(month,years);
                    })
                }
            }
    });      
} 

    function showdata(month,years){
        $.ajax({
            url: 'models/rpt_target/tampildata.php',
            method :'POST',
            data:{bulan:month,tahun:years},
            cache:true,
            dataType:'json',
            success: function(response){

                $("#tabel1").DataTable({
                    "ordering": false,
                    "destroy":true,
                    dom: 'Plfrtip',
                        scrollCollapse: true,
                        paging:false,
                        "bPaginate":false,
                        "bLengthChange": false,
                        "bFilter": true,
                        "bInfo": false,
                        "bAutoWidth": false,
                        dom: 'lrt',
                        fixedColumns:   {
                        // left: 1,
                            right: 1
                        },
                    "order":[[0,'desc']],
                    
                        data: response,
                            columns: [
                                { 'data': 'tahun' },
                                { 'data': 'bulan' },
                                { 'data': 'kategory' },
                            
                                    {
                                    data: 'jumlah', className: "text-end", render: $.fn.dataTable.render.number(',', '.', 2, '')
                                },
                                {
                                    data: 'target', className: "text-end",render: $.fn.dataTable.render.number(',', '.', 2, ''),
                                    
                                },
                                { "render": function ( data, type) { // Tampilkan kolom aksi
                            let html  ='<button type="button"  class=" open-edit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="fa-solid fa-pencil"></i></button>'

                                html += '<button type="button" class=" open-delete  btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-remove"></i></button>'
                                return html
                            }
                            },
                            ]      
                
                });
            }
        });

    };

function get_header(tahun){

  let data_headr =`
  
  <div  class="page-heading mb-3">
  <div class="page-title">
  <h4 class="text-center">Data Report Target ${tahun}</h4>
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
                                                <th>Tahun</th>
                                                <th>Bulan</th>
                                                <th>Kategory</th>
                                                <th>Jumlah</th>
                                                <th>Target</th>
                                                <th>Action</th>  
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

</script>

  <!-- Modal delete -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class ="modal-content">
                <div class="modal-body">
                  <form id="formdelete">
                          <h4 class="text-center">Are you sure?</h4>
                      <input type="hidden" name="ktg_delete" id="ktg_delete" value="">
                      
                      
                        <div class="text-center">
                            <button type="sumbit" id="delete" class="btn btn-primary text-center" name="delete_user"><span class="glyphicon glyphicon-ok"></span>Yes</button> 
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                        </div>
                        
                  </form>
                </div>
              </div>
    </div>
  </div>
<!-- end form delete  -->


<!-- Modal  edit data  -->
<div class="modal " tabindex="-1" id="EditModal" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role ="document">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditModalLabel">Edit data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <form  id ="formedit" enctype="multipart/form-data" action="" method="POST" class ="form form-horizontal">
                  <div class="row col-md-12 mb-3">
                                <label for="kategory" class="col-sm-3 col-form-label">Kategory</label>
                                <div class="col-sm-7">
                                <input type="text"  class="form-control" name ="kategory" id="kategory" value="" required>
                                </div>
                        </div>
                    
                        <div class ="row col-md-12 mb-3">
                        <label for="priode" class="col-sm-3 col-form-label">Month</label>
                        <div class="col-md-7">
                        <select class="form-select form-select" id="bulanName" aria-label=".form-select-sm example">
                          <?php 
                              $bulan = ["Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                              foreach ($bulan as $bulans) {
                            ?>
                            <option value="<?php echo $bulans;?>">
                          <?php echo $bulans;?></option>
                          <?php }?>
                          </select>
                        </div>
                    </div>

                      <div class ="row col-md-12 mb-3">
                          <label for="tahun" class="col-sm-3 col-form-label">Year</label>
                          <div class="col-md-7">
                          <select class="form-select form-select" id="tahunedit" aria-label=".form-select-sm example">                            
                            <?php  
                            for($i=date("Y")-0; $i <=date("Y")+5; $i++){
                            ?>
                              <option value="<?php echo $i;?>">
                            <?php echo $i;?></option>
                            <?php }?>
                            </select>
                          </div>
                      </div>
                      <div class="row col-md-12 mb-3">
                                <label for="jumlah" class="col-sm-3 col-form-label">jumlah</label>
                                <div class="col-sm-7">
                                  <input type="number"  class="form-control" name ="jumlah" id="jumlah" value="" required>
                                </div></div>
                        <div class="row col-md-12">  
                                <label for="target" class="col-sm-3 col-form-label">Target </label>
                                <div class="col-sm-7">
                                  <input type="number" class="form-control"  name="target" id="target" value="" required>
                                </div>
                        </div>
                          
                        </div>
                            <div class="col-sm-11 d-flex justify-content-end">
                                    <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Editdata">Save</button>
                                    <button type="button" class="btn btn-secondary me-1 mb-3" data-bs-dismiss="modal">Close</button>
                                  </div>
      </form>
          </div>
     
      </div>
    </div>
</div>
<!-- end modal edit -->