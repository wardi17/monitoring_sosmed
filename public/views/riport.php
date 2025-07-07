<style>

element.style {
    /* color: rgb(51, 51, 51);
    font-size: 1.2em;
    font-weight: bold;
    fill: rgb(51, 51, 51); */
    fill: #25396f;
  
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 0.5rem;
    margin-top: 0;
}
@media print {
  @page {
    margin-top: 0;
    margin-bottom: 0;
  }
}

/* .dataTables_wrapper .dt-buttons {
  float:none;  
  text-align:right;
} */

    /* Form Styling */
form {
    margin: 0;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
}

/* Video Styling */
#video2 {
    width: 100px !important;
    height: 100px !important;
    cursor: pointer;
    transition: 0.3s;
    object-fit: cover;
    display: block;
}

video:hover {
    transform: scale(1.1);
}

/* Modal Styling */
.modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height:100%;
    max-width: 800px;
    background: black;
    padding: 10px;
    border-radius: 8px;
    z-index: 1000;
}

.modal video {
    width: 100%;
    height: 100%;
    max-height: 80vh;
    max-width: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.modal.show {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Overlay Styling */
.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 999;
}

.overlay.show {
    display: block;
}

/* Modal Content Styling */
.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: black;
    padding: 10px;
    border-radius: 8px;
    width: 80%;
    max-width: 900px;
    text-align: center;
}

/* Close Button Styling */
.close {
    float: right;
    top: 20px;
    right: 15px;
    color: white;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s ease-in-out;
    text-shadow: 0px 0px 10px rgba(248, 241, 241, 0.7);
}

.close:hover {
    color: red;
    text-shadow: 0px 0px 10px rgba(255, 0, 0, 0.7);
}

/* Responsive Design */
@media (max-width: 768px) {
    .modal-content {
        width: 90%;
    }
    .modal video {
        max-height: 70vh;
    }
}

@media (max-width: 480px) {
    .modal-content {
        width: 100%;
        border-radius: 0;
    }
    .modal video {
        max-height: 65vh;
    }
}

</style>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="assets/js/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>


<div id="main">
     <!-- Modal -->
    <div id="videoModal" class="modal">
        <div class="modal-content">
            <div>
            <span class="close" onclick="closeModal()">&times;</span> 
            </div>
            <div class="modal-body">
                <video id="modalVideo" controls>
                        <source id="modalSource" src="" type="video/mp4">
                    </video>
            </div>
                <!-- <span class="close" onclick="closeModal()">&times;</span> -->
            </div>
      </div>   
<?php include 'views/pages/burger.php' ?>

    <div id="filter"></div>
    <!-- untuk tapil grafik  -->
                        <div class="card"> 
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                            <div  id="container"></div>
                            </div>
                        </div></br></br>
   <!-- end grapik -->
<div id="header_data"></div>
<!-- <div id="filter"> -->

<div id="tabelhead"></div>

<div id="tabelhead2"></div>

 <!-- tabel tahun  detail_thn -->
<div id="tabelhead_tahun"></div>
 <!-- end tahun detail -->
     <div id="tbl_detail"></div>
     <div id="tbl_detail_all"></div>


 

</div>


<script>
$(document).ready(function(){
    const dateya = new Date();
    let bulan = dateya.getMonth()+1;
    let tahun = dateya.getFullYear(); 
    let div ="All";
    let div2 ="CS";
    filter();
    get_tahun();
    divisi();
    $("#filter_tahun").val(tahun);
   
    get_divisi_all(tahun,bulan,div);
    get_datagrafik(tahun,div);
    //get_divisi(tahun,bulan,div2);
    get_header(tahun,div);

     

  
//filter data Submit
    $("#filter_data").on("submit",function(e){
                e.preventDefault()
                let tahun = $('#filter_tahun').find(":selected").val();
                let  div = $('#filter_divisi').find(":selected").val();
                const dateya = new Date();
                let bulan = dateya.getMonth()+1;
                get_datagrafik(tahun,div);
             
                //if(div =="All"){
                    // get_tables_detail_all();
                    get_header(tahun,div);

                    $("#tbl_detail_all").hide();
                    $("#tabelhead").show();
                    $.ajax({
                            url:'models/rpt_transaksi/get_divisi.php',
                            method:'POST',
                            data:{tahun:tahun,bulan:bulan,divisi:div},
                            dataType:'json',      
                            success:function(result){
                            let titles =`<h1 style="text-align:center;color:black;">Data Report Tranksasi ${tahun}</h1>`;
                            $("#tabel2").DataTable({
                                responsive:true,
                                    "ordering": false,
                                    "destroy":true,
                                    dom: 'Bfrtip',
                                    paging:true,
                                    "searching": true,
                                    buttons: [
                                    {extend: 'print',
                                    className: 'btn btn-sm',
                                    text: '<h6><i class="fa-solid fa-print fa-lg text-secondary"></i></h6>',
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
                                                $(row).find('td:eq(5)').css('color', 'red');
                                            }else{
                                            $(row).find('td:eq(5)').css('color', 'black');

                                            }
                                    
                                        },
                                            columns: [
                                            
                                                { 'data': 'tahun',"render":function(data,type,row,metal){

                                                    let div = row.divisi;
                                                    if(type === 'display'){
                                                        data = `<span  type="button" style="cursor:pointer"type="submit" onclick="detail_thn('${data}','${div}'); return true" target="_blank">${data}</span>`;
                                                        }
                                                    return data;
                                                }},
                                                { 'data': 'kategory' },
                                                { 'data': 'divisi' },
                                                {
                                                data: 'target',render: $.fn.dataTable.render.number(',', '.', 0, '')
                                                },
                                                {
                                                    data: 'upload',
                                                    "render":function(data,type,row,metal){
                                                                        let thn = row.tahun;
                                                                        let ktg = row.kategory;
                                                                        let div = row.divisi;
                                                                        if(type === 'display'){
                                                                            data = `<span  type="button" style="cursor:pointer"type="submit" onclick="detail_div('${thn}','${ktg}','${div}'); return true" target="_blank">${data}</span>`;
                                                                        }
                                                                        return data
                                                                    },
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

});



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
       // const divisi =["All","CS","PD3R"];
       $('#filter_divisi').append('<option value="All">All</option>');
        $.ajax({
            url:'models/master_divisi/tampildata.php',
            method:'POST',
            dataType:'json',      
        success:function(response){
            $.each(response,function(key,value){
              let div = value.nama_divisi;
              $("#filter_divisi").append($(`<option/>`).val(div).html(div));
            });
        }
        });
     
    }


    function get_header(tahun,div){

        let data_headr =`
        <h5 class="text-center">Data Upload Sosmed ${tahun} (${div})</h5>
        `;
        $("#title").html(data_headr);
    }



function get_header_detail(tahun,div){

        let data_headr =`
        <h5 class="text-center">Data Upload Sosmed ${tahun} (${div})</h5>
        `;
    $("#title_detail").html(data_headr);
}
//untuk menamilkan all datatabel
function get_divisi_all(tahun,bulan,div){
   $("#tabelhead").hide();

    get_tables_all(tahun,div);
    $.ajax({
            url:'models/rpt_transaksi/get_divisi.php',
            method:'POST',
            data:{tahun:tahun,bulan:bulan,divisi:div},
            dataType:'json',      
            success:function(result){

            let titles =`<h1 style="text-align:center;color:black;">Data Report Tranksasi ${tahun}</h1>`;
            $("#tabel2").DataTable({
                responsive:true,
                    "ordering": false,
                    "destroy":true,
                    dom: 'Bfrtip',
                    paging:true,
                    "searching": true,
                    buttons: [
                        
                    {extend: 'print',
                    className: 'btn btn-sm',
                    text: '<h6><i class="fa-solid fa-print fa-lg text-secondary"></i></h6>',
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
                            $(row).find('td:eq(5)').css('color', 'red');
                        }else{
                        $(row).find('td:eq(5)').css('color', 'black');

                        }
                    
                    },
                            columns: [
                                
                                { 'data': 'tahun',"render":function(data,type,row,metal){
                                 
                                    let div = row.divisi;
                                                    if(type === 'display'){
                                                        data = `<span  type="button" style="cursor:pointer"type="submit" onclick="detail_thn('${data}','${div}'); return true" target="_blank">${data}</span>`;
                                                    }
                                                    return data;
                                }},
                                { 'data': 'kategory' },
                                { 'data': 'divisi' },
                                {
                                data: 'target',render: $.fn.dataTable.render.number(',', '.', 0, '')
                                },
                                {
                                data: 'upload',
                                "render":function(data,type,row,metal){
                                                    let thn = row.tahun;
                                                    let ktg = row.kategory;
                                                    let div = row.divisi;
                                                    if(type === 'display'){
                                                        data = `<span  type="button" style="cursor:pointer"type="submit" onclick="detail_div('${thn}','${ktg}','${div}'); return true" target="_blank">${data}</span>`;
                                                    }
                                                    return data
                                                },
                                },
                                {
                                data: 'tidak_target', render: $.fn.dataTable.render.number(',', '.', 0, '')
                                },
                            
                            ]      
                
            });
            
        
        }
    });      

}; 

function get_tables_all(tahun,div){
        let dataTable =`
        <section class="section">
                <div class="card">
                <div class="card-header">
                </div>
                    <div class="card-body">
                    <p id="title" class="page-title">
                    </p>
                    <table id="tabel2"  class='display table-info' >
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                                <th style="width:5%">Tahun</th>
                                                <th style="width:5%">Kategori</th>
                                                <th style="width:5%">Divisi</th>
                                                <th style="width:5%">Target</th>
                                                <th style="width:5%">Upload</th>
                                                <th style="width:5%">Tidak Target</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                    </div>
                            </div>
                        </section>

        `;
    $("#tabelhead2").empty().html(dataTable);
};

//untuk fungsitabel tahun detail 
function head_thndetail(tahun){
        let dataTable =`
        <section class="section">
                <div class="card">
                <div class="card-header">
                </div>
                    <div class="card-body">
                    <button onclick="goBack2()" class="btn btn-lg mb-2"><i class="fa-solid fa-arrow-left"></i></button>
                 
                    <table id="tabel_thd"  class='display table-info' >
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                                <th style="width:5%">Tahun</th>
                                                <th style="width:5%">Bulan</th>
                                                <th style="width:5%">Kategori</th>
                                                <th style="width:5%">Divisi</th>
                                                <th style="width:5%">Target</th>
                                                <th style="width:5%">Upload</th>
                                                <th style="width:5%">Tidak Target</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                    </div>
                            </div>
                        </section>

        `;
    $("#tabelhead_tahun").empty().html(dataTable);
};
//end tabel tahun detail
//style="cursor:pointer"
function get_tables_detail_all(kategory){
            let dataTable =`
            <section class="section">
                    <div class="card">
                   
                        <div class="card-body">
                        <button onclick="goBack2()" class="btn btn-lg mb-2"><i class="fa-solid fa-arrow-left"></i></button>
                        <h6 class="text-center">${kategory}</h6>
                
                        <table id="tabel_detail_all" style="width:100%" class='display table-info'>                    
                                        <thead  id='thead'class ='thead'>
                                        <tr>
                                                    <th style="width:8%">Tanggal</th>
                                                    <th style="width:5%">Divisi</th>
                                                    <th style="width:5%">Kode</th>
                                                    <th style="width:35%">Judul</th>
                                                    <th style="width:30%">Tujuan</th>
                                                    <th style="width:3%">Link</th>
                                                    <th>Nama File</th>
                                                    <th>Size</th>
                                                    <th>Play</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table><br>
                                    </div>
                                </div>
                            </section>

            `;
        $("#tbl_detail_all").empty().html(dataTable);
    };
//and data tabel
function goBack() {
      $("#header_data").show();
      $("#tabelhead").show();
    $("#tbl_detail").hide();
    $("#container").show();


}

function openModal(videoSrc) {
            let modal = document.getElementById("videoModal");
            let modalVideo = document.getElementById("modalVideo");
            let modalSource = document.getElementById("modalSource");

            modalSource.src = videoSrc; // Set video src
            modalVideo.load(); // Reload video untuk memuat source baru
            modal.style.display = "block";
            modalVideo.play(); // Putar video otomatis
        }
    function closeModal() {
            let modalVideo = document.getElementById("modalVideo");
           
            modalVideo.pause(); // Pause video saat modal ditutup
            modalVideo.currentTime = 0;  
            $("#videoModal").fadeOut();
        }

function goBack2() {
      $("#header_data").show();
      $("#tabelhead2").show();
    $("#tbl_detail_all").hide();
    $("#tabelhead_tahun").hide();
    $("#container").show();

}




    function filter(){
        let datafilter = `
        <section class="section">
                            <form id="filter_data">
                                <div class=" row col-md-10">
                                    <div class="col-md-2">
                                    <select class ="form-control" id="filter_tahun"></select>
                                    </div>
                                    <div class="col-md-2">
                                    <select class="form-control" id="filter_divisi"></select>
                                    </div>
                                    <div class="col-md-2">
                                    <button  type="Submit" name="Submit" class="btn btn-primary" id="Submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                    
                    </section>
        `;
        $("#filter").empty().html(datafilter);
    }
//untuk menamilkan grafik
    function get_datagrafik(tahun,div){
        $.ajax({
                url:'models/rpt_transaksi/get_data_grafik.php',
                method:'POST',
                data:{tahun:tahun,divisi:div},
                dataType:'json',      
                success:function(result){
                    get_grafik(result,tahun,div)
                }
            });

    }

    function get_grafik(result,tahun,div){
        let text_t = 'Grafik Upload Sosmed'+' '+ tahun + ' '+'('+ div +')' ;
        Highcharts.chart('container', {
            title: {
            text: text_t,
            margin:1,
            floating:false,
            align: 'center',
            style: {"color": "#25396f",fontFamily: 'Nunito',
                 "fontSize": "1.25rem",
             
                }

        },

            subtitle: {
                text: '',
                align: 'left'
            },

            yAxis: {
                title: {
                    text: ''
                }
            },

                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },

                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },


                plotOptions: {
                        series: {
                            cursor: 'pointer',
                            point: {
                                events: {
                                    click: function() {
                                        alert ('Category: '+ this.category +', value: '+ this.y);
                                    }
                                }
                            }
                        }
            },
        
        //untuk get data
                series: 
                
                    $.each(result,function(key,value){
                    value
                    }),
        //end get data                   
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });

    }

//end grafik

//onclick untuk tampildata detail tahun revisi 30/05/2023 by:wardi
function detail_thn(data,div){
    $("#tabelhead_tahun").show();
    $("#tabelhead2").hide();
    head_thndetail(data);
        $.ajax({
            url:'models/rpt_transaksi/get_tahun_data.php',
            method :'POST',
            data:{tahun:data,div:div},
            dataType:'json',    
            success:function(result){
                $("#tabel_thd").DataTable({
                    "ordering": false,
                    "destroy":true,
                    dom: 'lfrtip',
                    lengthMenu: [
                    [ 5,10, 25, 50, -1 ],
                    [ '5','10', '25', '50', 'All' ]
                    ],
                    // dom: 'Bfrtip',
                    // buttons: [
                    // 'copy', 'csv', 'excel', 'pdf', 'print'
                    // ],
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
    }

//end onclick detail tahun

//onclick detail tampildata  where divisi
 function detail_div(tahun,ktg,div){
            let formData = new FormData();
                formData.append('tahun', tahun);
                formData.append('kategory', ktg);
                formData.append('divisi', div);
              
            $.ajax({
                url:'models/rpt_transaksi/detail_all.php',
                method:'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                dataType:'json',
                    success:function(result){
                   
                        $("#tbl_detail_all").show();
                        $("#header_data").hide();
                        $("#tabelhead2").hide();
                        get_tables_detail_all(ktg);

                        $("#tabel_detail_all").DataTable({
                                    responsive:true,
                                    "ordering": false,
                                    "destroy":true,
                                        fixedColumns:   {
                                        // left: 1,
                                            right: 1
                                        },
                                    "order":[[0,'desc']],
                                    
                                        data: result,
                                        pageLength: 5,
                                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
                                    
                                            columns: [
                                        
                                            { 'data': 'tanggal' ,
                                            },
                                            // { 'data': 'kategory' },
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
                                                { 'data': 'nama_document'},
                                                { 'data' :'ukuran_file'},
                                               {
                                                data: function(row, type, val, meta) {

                                                    const nama_document = row.nama_document;
                                                    const url = "<?= url_store ?>"+nama_document;

                                                
                                                    return `
                                                    <video id="video2" width="200" onclick="openModal('${url}')">
                                                        <source src="${url}" type="video/mp4">
                                                        Browser Anda tidak mendukung tag video.
                                                    </video>
                                                    `;
                                                }
                                                }


                                            
                                            ]      
                                
                        });
                    }
            });
 }


function openModal(videoSrc) {
            let modal = document.getElementById("videoModal");
            let modalVideo = document.getElementById("modalVideo");
            let modalSource = document.getElementById("modalSource");

            modalSource.src = videoSrc; // Set video src
            modalVideo.load(); // Reload video untuk memuat source baru
            modal.style.display = "block";
            modalVideo.play(); // Putar video otomatis
        }





</script>
