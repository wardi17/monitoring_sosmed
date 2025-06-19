<script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-base.min.js"></script>

<div id="main">
<?php include 'views/pages/burger.php' ?>

<div id="header_data"></div>
<!-- <div id="filter"> -->

<div id="tabelhead"></div>
    <!-- Basic Tables start -->
  <!-- <div class ="col-md-12 row">
  <div class="col-md-6" id="tabelhead"></div>
  <div class="col-md-6" id="myChart2"></div>

  </div>   -->

 <div id="tbl_detail"></div>


    <div id="container"></div>
    <!-- <p class="highcharts-description">
        Basic line chart showing trends in a dataset. This chart includes the
        <code>series-label</code> module, which adds a label to each line for
        enhanced readability.
    </p> -->

</div>



<script>
$(document).ready(function(){
    const dateya = new Date();
    let bulan = dateya.getMonth()+1;
    let tahun = dateya.getFullYear();
  
    //get_divisi(tahun,bulan);
    get_grafik(tahun,bulan);
    //filter();

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
                kategory = item.innerHTML;
                break;
              case 1:
                tahun = item.innerHTML;
                break;
              case 2 :
                bulan = item.innerHTML;
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
                    // dom: 'Plfrtip',
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
                          
                              { 'data': 'tanggal' },
                              { 'data': 'kategory' },
                              { 'data': 'divisi' },
                                { 'data': 'kode' },
                                { 'data': 'judul' },
                                { 'data': 'tujuan' }, 
                                { 'data': 'link',
                                  "render" : function(data,type,row,meta){
                                    if(type === 'display'){
                                          data = '<a href="' + data + '">' + data + '</a>';
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
  });

  function get_divisi(tahun,bulan){
    get_header(tahun);
    get_tables();
    let dataTable =``;
    $.ajax({
            url:'models/rpt_transaksi/get_divisi.php',
            method:'POST',
            data:{tahun:tahun,bulan:bulan},
            dataType:'json',      
            success:function(result){
              //$.each(result,function(key,value))
              $("#tabel1").DataTable({
                    "ordering": false,
                    "destroy":true,
                    // dom: 'Plfrtip',
                    //     scrollCollapse: true,
                    //     paging:false,
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
                              { 'data': 'kategory' },
                                { 'data': 'tahun' },
                                { 'data': 'bulan' },
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

   
function get_grafik(tahun,bulan){
    $.ajax({
            url:'models/rpt_transaksi/get_data_grafik.php',
            method:'POST',
            data:{tahun:tahun,bulan:bulan},
            dataType:'json',      
            success:function(result){
                
             
                anychart.onDocumentReady(function (result) {
                    $.each(result,function(a,b){
                    console.log(b.upload);
                });
                                // this column represents JS equivalents every JSON object
                    var chart = anychart.fromJson(
                        // set chart type
                        {chart: {type: "line",              // var chart = anychart.line();

                        // set series type
                        series:[{seriesType: "spline",    // chart.spline(
                    // set series data
                    data: [                         //   [
                        result
                    ]}
                ],                            //   ]);

                        // set chart container
                        container: "container"}}          //   chart.container("container"); 
                    ).draw();                             
                    });
          
            }
    }); 
   
    
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
    //   let id ="#"+tabel;
    //   let substr_bulan = bulan.substr(0,3);
        let dataTable =`
        <section class="section">
                <div class="card">
                    <div class="card-body">
                    <table id="tabel1" class='display table-info'>                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                                <th>Kategory</th>
                                                <th>Tahun</th>
                                                <th>Bulan</th>
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




    // function filter(){
//   let datafilter = `
//   <div class="col-md-12 row mt-6">
//     <div class ="col-md-2">
//           <label>Tahun</label>
//           <select class ="form-control" id="selectahun">
//           </select>
//     </div>
//     <div class ="col-md-2">
//           <label>Bulan</label>
//           <select class ="form-control" id="selectbulan">
//           </select>
//     </div>
//     <div class ="col-md-2">
//           <label>Divisi</label>
//           <select class ="form-control" id="selectdivisi">
//           </select>
//     </div>
//     <div class ="col-md-2">
//           <label>Kategory</label>
//           <select class ="form-control" id="seleckategory">
//           </select>
//     </div>
//   </div>
//   </div>
//   `;
//   $("#filter").empty().html(datafilter);
// }



</script>
<script type="text/javascript">
     document.addEventListener("DOMContentLoaded", ready);
    function ready() {
		
	
    Highcharts.setOptions({
    lang: {
        numericSymbols: [' Rb', ' Jt', ' M', ' T']
    },
	  xAxis: {
            tickInterval: 1,
            minRange: 1,
            allowDecimals: false,
            startOnTick: true,
            endOnTick: true
    }
    });
    Highcharts.chart('container', {
        credits: {
    enabled: false
  },
  chart: {
        height: (9 / 16 * 100) + '%' // 16:9 ratio
    },
    data: {
        table: 'datatable3'
    },
    lang: {
        numericSymbols: [' Rb', ' Jt', ' M', ' T']
    },
    chart: {

        type: 'area'
    },
    title: {
        text: '',
        
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: false
        },
         lang: {
    thousandsSep: ','
  },
  xAxis: {
            tickInterval: 1,
            minRange: 1,
            allowDecimals: false,
            startOnTick: true,
            endOnTick: true
    }
  
  
  
    },

    legend: { symbolHeight: '0px' },
    plotOptions: {
        global: {
            useUTC: false,
            
        },
        lang: {
          decimalPoint: ',',
          thousandsSep: '.'
        },
        series: {
			color: '#FF0000',
            dataGrouping: {
                enabled: false
            },
            cursor: 'pointer',
            point: {
                    events: {
                        click: function () {
                            location.href = "menuutama.php?crm=" + this.name;
                        }
                    }
                },
                fillColor: {
                linearGradient: {
                    x1: 0,
                    y1: 0,
                    x2: 0,
                    y2: 1
                },
                stops: [
                    [0, Highcharts.getOptions().colors[0]],
                    [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                ]
				}
        },
        
        column: {
          // This per-chart-type colors value is never used.
          // Documented at: http://api.highcharts.com/highstock#plotOptions.column.colors
          // Setting color: 'red' works as intended, but does not help when having multiple series.
          colors: ['#DD4132', '#9E1030', '#FE840E', '#FF6F61', '#C62168', '#8D9440',   
             '#FFD662', '#00539C', '#755139', '#DD4132', '#D69C2F', '#616247', '#E8B5CE', '#D2C29D', '#FF6F61',   
             '#9B1B30', '#F5D6C6', '#FA9A85']
        }

      },

    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                Highcharts.numberFormat(this.y, 0, '', ',') + ' ' + this.point.name.toUpperCase();
        }
    }
    
});

}
   
     
</script>
