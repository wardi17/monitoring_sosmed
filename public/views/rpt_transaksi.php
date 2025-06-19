
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="assets/js/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>


<div id="main">
<?php include 'views/pages/burger.php' ?>

    <div id="filter"></div>
<div id="header_data"></div>
<!-- <div id="filter"> -->

<div id="tabelhead"></div>

     <div id="tbl_detail"></div>

    <div id="container"></div>
 

</div>


<script>
$(document).ready(function(){
    const dateya = new Date();
    let bulan = dateya.getMonth()+1;
    let tahun = dateya.getFullYear(); 
    let div ="All";
    filter();
    get_tahun();
    divisi();
    $("#filter_tahun").val(tahun);
    get_divisi(tahun,div)
    // klik detail
    $("#tabel1").on("click","tbody tr td", function(){

        let tahun = "";
        let bulan = "";
        let kategory ="";
        let divisi = "";
        let upload = "";
        let tdk_target ="";
        let row = jQuery(this).closest('tr');
        let columns = row.find('td'); 
        columns.addClass('row-highlight');
        
        $.each(columns, function(key, item){
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
                    case 5 :
                    upload = item.innerHTML;
                    break;
                    case 6 :
                    tdk_target = item.innerHTML;
                    break;
                
                }
        });
        let formData = new FormData();
            formData.append('tahun', tahun);
            formData.append('bulan', bulan);
            formData.append('kategory', kategory);
            formData.append('divisi', divisi);
            formData.append('upload', upload);
            formData.append('tdk_target', tdk_target);
            $.ajax({
            url:'models/rpt_transaksi/detail.php',
            method:'POST',
            
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType:'json',
            success:function(result){
                $("#tbl_detail").show();
                $("#header_data").hide();
                $("#tabelhead").hide();
                get_tables_detail();

            
                $("#tabel_detail").DataTable({
                            "ordering": false,
                            "destroy":true,
                            // dom: 'Bfrtip',
                            // buttons: [
                            //     'print'
                            // ],
                            //     scrollCollapse: true,
                            //     paging:false,
                            //     "bPaginate":true,
                            //     "bLengthChange": false,
                            //     "bFilter": true,
                            //     "bInfo": false,
                            //     "bAutoWidth": false,
                            //     dom: 'lrt',
                                fixedColumns:   {
                                // left: 1,
                                    right: 1
                                },
                            "order":[[0,'desc']],
                            
                                data: result,
                                pageLength: 5,
                                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                            
                                    columns: [
                                
                                    { 'data': 'tanggal' ,
                                     
                                    },
                                    { 'data': 'kategory' },
                                    { 'data': 'divisi' },
                                        { 'data': 'kode' },
                                        { 'data': 'judul' },
                                        { 'data': 'tujuan' }, 
                                        { 'data': 'link',
                                        "render" : function(data,type,row,meta){
                                            if(type === 'display'){
                                                data = '<a href="' + data + '" target="_blank">' + data + '</a>';
                                            }
                                            return data;
                                        }
                                        },

                                    
                                    ]      
                        
                    });
            }
            })
    });
    //end klik detail
       //filter data

   $("#tambah").on("submit",function(e){
    
 
            e.preventDefault()
            let tahun = $('#filter_tahun').find(":selected").val();
            let  div = $('#filter_divisi').find(":selected").val();
            get_header(tahun);
            $.ajax({
                url:'models/rpt_transaksi/get_divisi.php',
                method:'POST',
                data:{tahun:tahun,divisi:div},
                dataType:'json',      
                success:function(result){
               
               let titles =`<h1 style="text-align:center;color:black;">Data Report Tranksasi ${tahun}</h1>`;
               $("#tabel1").DataTable({
                       "ordering": false,
                       "destroy":true,
                       dom: 'Bfrtip',
                       buttons: [
                       'copy', 'csv', 'excel', 'pdf', 'print'
                       ],
                       "searching": true,
                   
                       buttons: [
                       {extend: 'print',
                         messageTop: function () {
                           return titles ;
                         },
                         title:" "
   
                       },
                 
                       ],
                       "order":[[0,'desc']],
                       
                           data: result,
                           'rowCallback': function(row, data, index){
                             let target = data.target
                             let tdk_target=data.tidak_target;
                           
                          
                            if(tdk_target< target){
                                $(row).find('td:eq(6)').css('color', 'red');
                            }else{
                              $(row).find('td:eq(6)').css('color', 'black');
   
                            }
                          
                          },
                               columns: [
                               
                                   { 'data': 'tahun' },
                                   { 'data': 'bulan' },
                                     { 'data': 'kategory' },
                                   { 'data': 'divisi' },
                                   {
                                     data: 'target',render: $.fn.dataTable.render.number(',', '.', 0, '')
                                   },
                                   {
                                     data: 'upload',render: $.fn.dataTable.render.number(',', '.', 0, '')
                                   },
                                   {
                                     data: 'tidak_target', render: $.fn.dataTable.render.number(',', '.', 0, '')
                                   },
                                
                               ]      
                   
                 });
               
              
            }
        });    
    });
    //end filter data 

// Landscape export, 2×4 inches





});

function get_divisi(tahun,div){

    get_header(tahun);
    get_tables();
    $.ajax({
            url:'models/rpt_transaksi/get_divisi.php',
            method:'POST',
            data:{tahun:tahun,divisi:div},
            dataType:'json',      
            success:function(result){
               
            let titles =`<h1 style="text-align:center;color:black;">Data Report Tranksasi ${tahun}</h1>`;
            $("#tabel1").DataTable({
                    "ordering": false,
                    "destroy":true,
                    dom: 'Bfrtip',
                    buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    "searching": true,
                
                    buttons: [
                    {extend: 'print',
                      messageTop: function () {
                        return titles ;
                      },
                      title:" "

                    },
              
                    ],
                    "order":[[0,'desc']],
                    
                        data: result,
                        'rowCallback': function(row, data, index){
                          let target = data.target
                          let tdk_target=data.tidak_target;
                        
                       
                         if(tdk_target< target){
                             $(row).find('td:eq(6)').css('color', 'red');
                         }else{
                           $(row).find('td:eq(6)').css('color', 'black');

                         }
                       
                       },
                            columns: [
                            
                                { 'data': 'tahun' },
                                { 'data': 'bulan' },
                                  { 'data': 'kategory' },
                                { 'data': 'divisi' },
                                {
                                  data: 'target',render: $.fn.dataTable.render.number(',', '.', 0, '')
                                },
                                {
                                  data: 'upload',render: $.fn.dataTable.render.number(',', '.', 0, '')
                                },
                                {
                                  data: 'tidak_target', render: $.fn.dataTable.render.number(',', '.', 0, '')
                                },
                             
                            ]      
                
              });
            
           
         }
    });      
    
};  

 function datatabel(result,tahun){
  
 }


function get_tahun(){
 
 let startyear = 2020;
 let date = new Date().getFullYear();
 
 let endyear = date + 2;
 
 for(let i = startyear; i <=endyear; i++){
   var selected = (i !== date) ? 'selected' : date; 

  $("#filter_tahun").append($(`<option />`).val(i).html(i).prop('selected', selected));

 }
}

function divisi(){
 const divisi =["All","CS","PD3R"];
 
 for(let div of divisi){
   $("#filter_divisi").append($(`<option/>`).val(div).html(div));
   }
}
   

function get_header(tahun){

  let data_headr =`
  
  <div  class="page-heading mb-3">
  <div class="page-title">
  <h4 class="text-center">Data Report Transaksi ${tahun}</h4>
  </div></div>

  `;
  $("#header_data").html(data_headr);
}

function get_tables(){
     // <button class="btn btn-secondary" type="button" id="print"name="print" aria-label="Print" title="Print">
            // <i class="bi bi-printer"></i>
        // </button>
        let dataTable =`
        <section class="section">
                <div class="card">
                    <div class="card-body">
                 
                    <div class="columns columns-right btn-group float-right">
                   
                     </div>
                    <table id="tabel1" class='display table-info' style="width:100%">                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                               
                                                <th>Tahun</th>
                                                <th>Bulan</th>
                                                <th>Kategory</th>
                                                <th>Divisi</th>
                                                <th>Target</th>
                                                <th>upload</th>
                                                <th>Tidak Target</th>
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
function goBack() {
      $("#header_data").show();
      $("#tabelhead").show();
    $("#tbl_detail").hide();


    }
function get_tables_detail(){
    //   let id ="#"+tabel;
    //   let substr_bulan = bulan.substr(0,3);
        let dataTable =`
        <button onclick="goBack()" class="btn btn-primary"><i class="fa-solid fa-rotate-left"></i></button>
        <section class="section">
                <div class="card">
                    <div class="card-body">
                    <table id="tabel_detail" class='display table-info'>                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                                <th>Tanggal</th>
                                                <th>kategory</th>
                                                <th>Divisi</th>
                                                <th>Kode</th>
                                                <th>Judul</th>
                                                <th>Tujuan</th>
                                                <th>Link</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table><br>
                                </div>
                            </div>
                        </section>

        `;
    $("#tbl_detail").empty().html(dataTable);
};


function filter(){
  let datafilter = `
  <section class="section">
                    <form id="tambah">
                        <div class=" row col-md-10">
                            <div class="col-md-2">
                               <select class ="form-control" id="filter_tahun"></select>
                            </div>
                            <div class="col-md-2">
                            <select class="form-control" id="filter_divisi"></select>
                            </div>
                            <div class="col-md-2">
                            <button  type="sumbit" name="sumbit" class="btn btn-primary" id="Createdata">Sumbit</button>
                            </div>
                        </div>
                    </form>
            </section>
  `;
  $("#filter").empty().html(datafilter);
}



</script>
