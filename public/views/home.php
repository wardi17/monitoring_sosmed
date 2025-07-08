<style> 

   


    .highcharts-exporting-group{
        visibility: hidden;
    }

    .highcharts-figure,
    .highcharts-data-table table {
    min-width: 360px;
    max-width: 800px;
    margin: 1em auto;
    }

    .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
    }

    .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
    }

    .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
    padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
    background: #f1f7ff;
    }

 .nowrap{
    white-space: nowrap !important;
 }


        /* ini untuk mengilangak scrollbar di samping */
    .scrollbar::-webkit-scrollbar
        {
            width: 1px;
            background-color: #FFFFFF;
        }
        .scrollbar::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 1px rgba(0,0,0,.9);
            background-color: #FFFFFF;
        }

        /* end scrolbar */
 /* unutk tabel comment mengilangkan garis head dan footer  */
    .dataTables_scrollBody {
            overflow-x: hidden !important;
             
        border-top: none !important;
        border-bottom: none !important;
        }
     
 /* end tabel comment */
 

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
  


 
  
<!--fonts-->



<div id="main">
          <?php include 'views/pages/burger.php';
          require_once ("models/dahasboard/tampildata.php");
          ?>
        
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

    <div class="page-content">
        <section class="row">
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                        <i class="fa-brands fa-facebook-f"></i>
                                        </div>
                                    </div>
                                    <div id ="fab"class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                        <i class="fa-brands fa-youtube"></i>                                    </div>
                                    </div>
                                    <div id ="ytb"class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                        <i class="fa-brands fa-instagram"></i>                                    </div>
                                    </div>
                                    <div id="ig"class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon black mb-2">
                                        <i class="fa-brands fa-tiktok"></i>                                    </div>
                                    </div>
                                    <div id="tw"class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div id="grafik"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                <span id="tabelhead" class="align-text-bottom"></span>
                                <span  id="tabeldetail" class=""></span>
                                <span id="tabelhead_tahun"></span>

                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                        <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                        <i class="fa-brands fa-twitter"></i>                                    
                                    </div>
                                    </div>
                                    <div id="twit"class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    </div>
                                </div>
                        </div>
                </div>
                <div class="card">
                
                    <div class="card-body">
                 
                                <div class="table-responsive">
                                    <table id="tabel_comment" class="table">
                                        <thead>
                                            <tr>
                                        
                                                <th>Name</th>
                                                <th>Comment<button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#message">
                                                 <i class="fa-regular fa-file"></i></button></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $datacome = $data->get_data(); 
                                        ?>
                                        <?php 
                                        $tanggal ="";
                                        $nama ="";
                                        $comment ="";
                                        while(odbc_fetch_row($datacome)){
                                                $tanggal = rtrim(odbc_result($datacome,"tanggal"));
                                                $nama = rtrim(odbc_result($datacome,"user_name"));
                                                $comment = rtrim(odbc_result($datacome,"comment"));
                                            ?>
                                                <tr>
                                                <td class="col-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="row">
                                                        <p class="font-bold ms-3 mb-0"><?=$nama?></p>
                                                        <p class=" ms-3 mb-0"><?=date("d-F-Y",strtotime($tanggal))?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0"><?=$comment?></p>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                </div>
            
            </div>
        </section>
    </div>
</div>


<!-- Modal message -->
<div class="modal fade" id="message" tabindex="-1" aria-labelledby="messageLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageLabel">Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_user" id="id_user" value="<?=$rows['id_user']?>">
        <input type="hidden" name="username" id="username" value="<?=$rows['nama']?>">

        <textarea type="text" class="form-control" name="com_mesage" id="com_mesage"></textarea>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" id="kirim">Kirim</button>
        <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

   
 <script>
//unutk grafik
$(document).ready(function(){
    const dateya = new Date();
    let bulan = dateya.getMonth()+1;
    let tahun = dateya.getFullYear();
    let div ="All";
    get_datagrafik(tahun,bulan,div);
    get_datatabel(tahun,bulan);
    getdata(tahun,bulan);
 
    get_header(tahun,div)
    //klik detail all divisi
 

    // $("#tabel2").on("click","tbody tr td", function(){
    //     $("#tabelhead").hide();
    //     $("#tabeldetail").show();

    //         let tahun = "";
    //         let kategory ="";
    //         let row = jQuery(this).closest('tr');
    //         let columns = row.find('td'); 
    //         columns.addClass('row-highlight');
    //         $.each(columns, function(key, item){
    //         switch(key){
    //                 case 0:
    //                     tahun = item.innerHTML;
    //                     break;
    //                 case 1:
    //                     kategory = item.innerHTML;
    //                     break;
                  
                    
    //                 }
    //         });
    //         let divisi ="All";
    //         let formData = new FormData();
    //             formData.append('tahun', tahun);
    //             formData.append('kategory', kategory);
    //             formData.append('divisi', divisi);

    //             $.ajax({
    //             url:'models/rpt_transaksi/detail_all.php',
    //             method:'POST',
    //             data: formData,
    //             cache: false,
    //             processData: false,
    //             contentType: false,
    //             dataType:'json',
    //                 success:function(result){
    //                     get_tables_detail();
                   

    //                     $("#tabel_detail").DataTable({
    //                             responsive: true,
    //                                 "ordering": false,
    //                                 "destroy":true,
    //                                 autoWidth: false,
    //                                 columnDefs: [
    //                                 {
    //                                     targets:[0,1,2,3,4,5],
    //                                     className: 'nowrap'}
    //                                 ],
    //                                 "order":[[0,'desc']],
                                    
    //                                     data: result,
    //                                     pageLength: 5,
    //                                     lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
                                      
    //                                         columns: [
                                        
    //                                         { 'data': 'tanggal'
    //                                         },
    //                                         { 'data': 'kategory'},
    //                                         { 'data': 'divisi'},
    //                                             { 'data': 'kode'},
    //                                             { 'data': 'judul'},
    //                                             { 'data': 'tujuan'}, 
    //                                             { 'data': 'link',
    //                                             "render" : function(data,type,row,meta){
    //                                                 if(type === 'display'){
    //                                                     data = '<a href="' + data + '" target="_blank">' + data + '</a>';
    //                                                 }
    //                                                 return data;
    //                                             }
    //                                             },

                                            
    //                                         ]      
                                
    //                         });
    //                 }
    //             });
    // });
        //end klik detail all

//untuk tabel comment
$("#tabel_comment").DataTable({
                "ordering": false,
               "destroy":true,
                //dom: 'Plfrtip',
                  scrollCollapse: true,
                  paging:false,
                  "bPaginate":false,
                  "bLengthChange": false,
                  "bFilter": true,
                  "bInfo": false,
                  "bAutoWidth": false,
                  dom: 'lrt',
            "scrollY": "360px",
            "scrollCollapse": true,
            "initComplete": function(settings, json) {
            $('body').find('.dataTables_scrollBody').addClass("scrollbar");
    }      
  });


  $('.dataTables_length').addClass('bs-select');
//end 
});
//untuk tambil data kategory data target
function getdata(tahun,bulan){
    $("#color5").css("color","red");
      $.ajax({
          url:'models/dahasboard/ds_kategory.php',
          method:'POST',
          data:{tahun:tahun,bulan:bulan},
          dataType:'json',
      success:function(result){
   
          $.each(result,function(key,value){
          
              let kategory = value.kategory;
              let target = Math.ceil(value.target);
              let upload = Math.ceil(value.upload);
              let total =  Math.ceil(value.tidak_target);
             if(upload < target){
             
                $("#color").css("color","red");
                $("#color2").css("color","red");
                $("#color3").css("color","red");
                $("#color4").css("color","red");
             }else{
                $("#color").css("color","black");
                $("#color2").css("color","black");
                $("#color3").css("color","black");
                $("#color4").css("color","black");
             

             }
              if(kategory == "Facebook"){
              
                  let fab =`
                  <h6 class="text-muted font-semibold">${kategory}</h6>
                      <h6 class="col-md-10 font-semibold">T.${target} &nbsp; U.${upload}</h6>
                      <div class="col-md-8">
                      <h6 id="color" class="text-center mb-0">${total}</h6>
                      </div>                    
                      `;
                  $("#fab").empty().html(fab);
              }
              if(kategory == "Youtube"){
           
                  let fab =`
                  <h6 class="text-muted font-semibold">${kategory}</h6>
                      <h6 class="col-md-10 font-semibold">T.${target} &nbsp; U.${upload}</h6>
                      <div class="col-md-8">
                      <h6 id="color2" class="text-center  mb-0">${total}</h6>
                      </div>    
                  `;
                  $("#ytb").empty().html(fab);
              }
              if(kategory == "Instagram"){
                  let fab =`
                  <h6 class="text-muted font-semibold">${kategory}</h6>
                  <h6 class="col-md-10 font-semibold">T.${target} &nbsp; U.${upload}</h6>
                      <div class="col-md-8">
                      <h6 id="color3" class="text-center  mb-0">${total}</h6>
                      </div>    
                  `;
                  $("#ig").empty().html(fab);
              }
              if(kategory == "TikTok"){
                  let fab =`
                  <h6 class="text-muted font-semibold">${kategory}</h6>
                  <h6 class="col-md-10 font-semibold">T.${target} &nbsp; U.${upload}</h6>
                      <div class="col-md-8">
                      <h6 id="color4" class="text-center  mb-0">${total}</h6>
                      </div>    
                  `;
                  $("#tw").empty().html(fab);
              }
              if(kategory == "Twitter"){
                if(upload < target){
                    let fab =`
                  <h6 class="text-muted font-semibold">${kategory}</h6>
                  <h6 class="col-md-10 font-semibold">T.${target} &nbsp; U.${upload}</h6>
                      <div class="col-md-5">
                      <h6 id="color5" style="color:red" class="text-center  mb-0">${total}</h6>
                      </div>    
                  `;
                  $("#twit").empty().html(fab);
              }else{
                let fab =`
                  <h6 class="text-muted font-semibold">${kategory}</h6>
                  <h6 class="col-md-10 font-semibold">T.${target} &nbsp; U.${upload}</h6>
                      <div class="col-md-5">
                      <h6 id="color5" style="color:black" class="text-center mb-0">${total}</h6>
                      </div>    
                  `;
                  $("#twit").empty().html(fab);
              }
            }
             
      })
  }
  });
  //untuk kirim data
      $("#kirim").on("click",function(e){
          e.preventDefault();
          let kirim = $("#com_mesage").val();
          let user = $("#username").val();
          let id_user = $("#id_user").val();
          $.ajax({
              url:'models/dahasboard/comment.php',
              type:'POST',
              dataType :'json',
              data :{user:user,kirim:kirim,user_id:id_user},
              success:function(result){
                  console.log(result)
                  window.location.href ="index.php?page=home";
              }
          });
      });
  // and kirim
      $("#close").on("click",function(){
      $("#com_mesage").val('');
      });
  //

}
//end
function get_datagrafik(tahun,bulan,div){
	
    $.ajax({
            url:'models/rpt_transaksi/get_full_grafik.php',
            method:'POST',
            data:{tahun:tahun,bulan:bulan},
            dataType:'json',      
            success:function(result){
                get_grafik(result,tahun,div)
            }
        });

    }

function get_grafik(result,tahun,div){
    $(".highcharts-title").css('color','red');
    let text_t = 'Grafik Upload Sosmed'+' '+ tahun +' '+ '('+div+')';
  
    Highcharts.chart('grafik', {
            navigation: {
            buttonOptions: {
                enabled: true
            }
        },
        title: {
            text: text_t,
            align: 'center',
            style: {"color": "#25396f",fontFamily: 'Nunito',
                 "fontSize": "1.25rem"}

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

//untuk fungsitabel tahun detail 
function head_thndetail(tahun){
        let dataTable =`
        <section class="section">
                <div class="card">
                <div class="card-header">
                </div>
                    <div class="card-body">
                    <button onclick="goBack()" class="btn btn-lg mb-2"><i class="fa-solid fa-arrow-left"></i></button>

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

//untuk tampildata tabel
    function get_datatabel(tahun,bulan){
        get_table_head();
        $.ajax({
            url:'models/rpt_transaksi/get_full_divisi.php',
            method:'POST',
            data:{tahun:tahun,bulan:bulan},
            dataType:'json',      
            success:function(result){
            
               
              //$.each(result,function(key,value))
              $("#tabel2").DataTable({
                    responsive:true,
                    "ordering": false,
                    "destroy":true,
                    dom: 'Bfrtip',
                        fixedColumns:   {
                        // left: 1,
                            right: 1
                        },
                    "order":[[0,'desc']],
                    
                        data: result,
                        'rowCallback': function(row, data, index){
                          let target = data.target
                          let tdk_target=data.tidak_target;
                        
                       
                         if(tdk_target< target){
                             $(row).find('td:eq(4)').css('color', 'red');
                         }else{
                           $(row).find('td:eq(4)').css('color', 'black');

                         }
                       
                       },
                            columns: [
                                { 'data': 'tahun',"render":function(data,type,row,metal){
                               
                                let div ='All';
                                if(type === 'display'){
                                    data = `<span  type="button" style="cursor:pointer"type="submit" onclick="detail_thn('${data}','${div}'); return true" target="_blank">${data}</span>`;
                                    }
                                return data;
                                }},
                                  { 'data': 'kategory' },
                                {
                                  data: 'target',render: $.fn.dataTable.render.number(',', '.', 0, '')
                                },
                                {
                                 data: 'upload',
                                    "render":function(data,type,row,metal){
                                     
                                            let thn = row.tahun;
                                            let ktg = row.kategory;
                                            let div = 'All';
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
    }
    function get_header(tahun,div){

        let data_headr =`
        <h5 class="text-center">Data Upload Sosmed ${tahun} (${div})</h5>
        `;
        $("#title").html(data_headr);
    }
    function get_table_head(){
        let dataTable =`
                    <p id="title" class="page-title">
                    </p>
                    <table id="tabel2" class='display'>                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>  
                                                <th>Tahun</th>
                                                <th>Kategori</th>
                                                <th>Target</th>
                                                <th>Upload</th>
                                                <th>Tidak Target</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
        `;
        $("#tabelhead").empty().html(dataTable);

    
    };
//end tampildata tabelu
//untuk tampilan tabel detail
function get_tables_detail(kategory){
    //   let id ="#"+tabel;
    //   let substr_bulan = bulan.substr(0,3);
        let dataTable =`
                    
 
                        <div class ="row col=md-12">
                        <p class="text-start">  <button onclick="goBack()" class="btn btn-lg mb-3 mt-2"><i class="fa-solid fa-arrow-left"></i></button>
                       
                      </p>
                      <h6 class="text-center">${kategory}</h6>
                        </div>
                      
                     
                    <table id="tabel_detail" class="display">                    
                                    <thead>
                                    <tr>
                                                    <th>Tanggal</th>
                                                    <th>Divisi</th>
                                                    <th>Kode</th>
                                                    <th>Judul</th>
                                                    <th>Tujuan</th>
                                                    <th>Link</th>
                                                    <th style="width:13%">Nama File</th>
                                                    <th style="width:11%">Size</th>
                                                    <th style="width:11%">Play</th>   
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
        
        `;
    $("#tabeldetail").empty().html(dataTable);
};
//end 
function goBack(){
    $("#tabelhead").show();
    $("#tabeldetail").hide();
    $("#tabelhead_tahun").hide();
}

//onclick untuk tampildata detail tahun revisi 30/05/2023 by:wardi
function detail_thn(data,div){
    $("#tabelhead_tahun").show();
    $("#tabelhead").hide();
    head_thndetail(data);
        $.ajax({
            url:'models/rpt_transaksi/get_tahun_data.php',
            method :'POST',
            data:{tahun:data,div:div},
            dataType:'json',    
            success:function(result){
                $("#tabel_thd").DataTable({
                    responsive:true,
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
                 
                        get_tables_detail(ktg);
                        $("#tabeldetail").show();
                        $("#header_data").hide();
                        $("#tabelhead").hide();
                     

                        $("#tabel_detail").DataTable({
                                    responsive:true,
                                    "ordering": false,
                                    "destroy":true,
                                        fixedColumns:   {
                                        // left: 1,
                                            right: 1
                                        },
                                    "order":[[0,'desc']],
                                    autoWidth: false,
                                    columnDefs: [
                                    {
                                        targets:[0,1,2,3,4,5],
                                        className: 'nowrap'}
                                    ],
    //                                 
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

           function closeModal() {
            let modalVideo = document.getElementById("modalVideo");
           
            modalVideo.pause(); // Pause video saat modal ditutup
            modalVideo.currentTime = 0;  
            $("#videoModal").fadeOut();
        }
</script> 


<!-- end modal message-->
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; BAMBI</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://bambifiles.com/">bambifile</a></p>
                    </div>
                </div>
            </footer>
        </div>