<?php
date_default_timezone_set('Asia/Jakarta');
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? "https://" : "http://";

$host = $_SERVER['HTTP_HOST'];
//$currentUrl = $protocol . $host;
$currentUrl = $protocol . $host;

// Konstanta global
define('FOLDER', 'C:/UploadVideoSOSMED/');
define('url_store',"http://localhost/UploadVideoSOSMED/");
// atau jika di komputer lain:
// define('FOLDER', 'D:/UploadVideoSOSMED/');
