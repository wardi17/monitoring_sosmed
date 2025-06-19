
<div id="main">
<?php include 'views/pages/burger.php' ?>
    <div id="container"></div>
</div>

<script>
$(document).ready(function(){
    const dateya = new Date();
    let bulan = dateya.getMonth()+1;
    let tahun = dateya.getFullYear();
    get_datagrafik(tahun,bulan)
});


function get_datagrafik(tahun,bulan){
    $.ajax({
            url:'models/rpt_transaksi/get_data_grafik.php',
            method:'POST',
            data:{tahun:tahun,bulan:bulan},
            dataType:'json',      
            success:function(result){
                get_grafik(result,tahun)
            }
        });

    }

function get_grafik(result,tahun){
    let text_t = 'Grafik Upload Sosment'+' '+ tahun;
    Highcharts.chart('container', {
        title: {
            text: text_t,
            align: 'center'
        },

        subtitle: {
            text: 'upload',
            align: 'left'
        },

        yAxis: {
            title: {
                text: 'Upload'
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

</script>
