<?php
ob_start();
include('config/constants.php'); ?>
<html>
    <head>
        <title>Đăng nhập - Hệ thống Quản lý Quán Cafe</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
   <body>
    
   <div class="login">
    <h1 class ="text-center">Đăng Nhập</h1>
    <br><br> 
    <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?> 
<form action="" method="POST" class="text-center">
Tên: <br>
<input type="text" name="username" placeholder="Tên Đăng Nhập"><br><br>

Mật Khẩu: <br>
<input type="password" name="password" placeholder="Mật Khẩu"><br><br>
<input type="submit" name="submit" value="Đăng Nhập" class="btn-primary">
<br><br>
</form>

</div>

   </body>
</html>

<?php
if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=md5($_POST['password']);

  $sql ="SELECT *FROM tbl_admin WHERE username='$username' AND password='$password'";
  $res =mysqli_query($conn, $sql);

  $count =mysqli_num_rows($res);

  if($count==1)
  {
      $_SESSION['login']="<div class='success'>Đăng nhập thành công</div>";
      $_SESSION['user'] =$username;
      header('location:'.SITEURL.'admin/');
  }
  else
  {
    $_SESSION['login']="<div class='error'>Đăng nhập thất bại</div>";
    header('location:'.SITEURL.'admin/login.php ');

  }

}
ob_end_flush(); ?>
