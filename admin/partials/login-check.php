<?php
 if(!isset($_SESSION['user']))
 {
    $_SESSION['no-login-message'] ="<div class='error'>Vui lòng đăng nhập.</div>";
    header('location:'.SITEURL.'admin/login.php');
 }

?>
