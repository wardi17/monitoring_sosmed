
<?php
        session_start();
        
        $user_log = $_SESSION['login_user'];
      
        $class = $_SESSION['classku'];
        
        if($user_log==""){
            header('Location: /monitoring_sosmed');
        }
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Sosmed</title>
    
    <link rel="stylesheet" href="assets/css/main/app.css">
    <!-- <link rel="stylesheet" href="assets/css/main/app-dark.css"> -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/grafik.css">
  
<link rel="stylesheet" href="assets/css/shared/iconly.css">
<script src="assets/js/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->

<link href="assets/css/datatables.min.css" rel="stylesheet"/>
<script src="assets/js/datatables.min.js"></script>
<!-- <script src="assets/js/sweetalert2@11"></script> -->
<!-- <link href="assets/css/fontawesome.css"  rel="stylesheet"/> -->
<link href="assets/fontawesome/css/all.min.css"  rel="stylesheet"/>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  rel="stylesheet"/> -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="assets/css/jquery-ui.css">
  <script src="assets/js/jquery-ui.js"></script>

<style>
    .btn-space {
    margin-right: 5px;
    }
    /* span{
        font-size: 12px;
    }
    li{
        font-size: 12px;
    } */
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<!-- untuk print pdf -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css" />
<style>
    .ui-icon{
      color: black;
    }

    .ui-datepicker {
      font-size: 20px;
    }
    .ui-datepicker .ui-datepicker-next .ui-icon{
      background: url(assets/images/next.png);
      
      width: 50px;
      height: 50px;
      top: 6px;
      left: -10px;
    }
    .ui-datepicker .ui-datepicker-prev .ui-icon {
      background: url(assets/images/back.png);
      width: 50px;
      height: 50px;
      top: 6px;
      left: 6px;
    }
    .ui-datepicker div.ui-datepicker-title {
      line-height: 2.4em;
    }
</style>   
</head>
