<?php
require_once ("models/koneksi.php");
$page = (isset($_GET['page']))? $_GET['page'] : '';
$conn =$database->open_connection();
$query ="SELECT * FROM a_user WHERE email ='".$user_log."'";
$sql=odbc_exec($conn,$query);
 $rows= odbc_fetch_array($sql); 

 $kode_log = (isset($_SESSION['kode_log_smd']))? $_SESSION['kode_log_smd'] : '';


?>
<body>
<div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <h5><a href="index.php?page=home"><?=$rows['nama']?></a><h5>
            </div>
          <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                        <div class="form-check form-switch fs-6">
                            <input class="me-0" type="hidden" id="toggle-dark">
                        </div>
                    </div>
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li
                class="sidebar-item  <?php if ($page == '' Or $page =='home') echo 'active'; ?>" aria-current="page">
                <a class="sidebar-link" href="index.php?page=home">

                <!-- <a aria-current="page"  href="index.html" class='sidebar-link'> -->
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-title">Master</li>
            
       
            <li
                class="sidebar-item <?php if ($page == 'divisi') {echo 'active';} else {echo'';} ?> ">
                <a href="index.php?page=divisi" class='sidebar-link'>
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>Divisi</span>
                </a>
            </li>
            
            <li class="sidebar-title">Upload Sosmed</li>
            
       
            <li
                class="sidebar-item <?php if ($page == 'target') {echo 'active';} else {echo'';} ?> ">
                <a href="index.php?page=target" class='sidebar-link'>
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>Target Upload</span>
                </a>
            </li>
            <li
                class="sidebar-item   <?php if ($page == 'transaksi') {echo 'active';} else {echo'';} ?> " aria-current="page">
                <a href="index.php?page=transaksi" class='sidebar-link'>
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>Upload</span>
                </a>
            </li>
            <li
                class="sidebar-item   <?php if ($page == 'edit_transaksi') {echo 'active';} else {echo'';} ?> " aria-current="page">
                <a href="index.php?page=edit_transaksi" class='sidebar-link'>
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>Edit Upload</span>
                </a>
            </li>
            <li class="sidebar-title">Laporan Sosmed</li>
            <li
                class="sidebar-item  <?php if($page =='riport'){echo 'active';} else {echo'';} ?>">
                <a href="index.php?page=riport" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Report</span>
                </a>
            </li>
      
            
          
        </ul>
        <?php if($kode_log !==''):?>
        <ul class ="menu">
        <li
                class="sidebar-item" aria-current="page">
                <a href="../index.php" class='sidebar-link'>
                <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Sign Out</span>
                </a>
            </li>
        </ul>
        <?php endif; ?>
    </div>
</div>