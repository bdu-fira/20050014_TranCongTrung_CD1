<?php 
ob_start(); // Bắt đầu bộ đệm output
session_start();
include('partials-front/menu.php');

header('location:'.SITEURL.'admin/login.php');

?>