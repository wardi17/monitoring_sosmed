<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';


// View without Login
switch($page){
    case "home":
        include 'views/home.php';
        break;
        case "transaksi":
            include 'views/transaksi.php';
            break;
        case "target":
            include 'views/target.php';
            break;
        case "rpt_target":
            include 'views/rpt_target.php';
            break;
        case "rpt_transaksi":
                include 'views/rpt_transaksi.php';
                break;
        case "rpt_grafik":
                include 'views/rpt_grafik.php';
                break;
        case "riport":
                include 'views/riport.php';
                break;

        case "edit_transaksi":
               include 'views/edit_transaksi.php';
               break;
        case "divisi":
                include 'views/divisi.php';
                break;
    default:
    include 'views/home.php';
    break;
}

