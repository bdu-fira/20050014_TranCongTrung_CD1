<?php
include('config/constants.php');
$id = $_GET['id'];

$sql ="DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res == true)
{
   // echo "Admin Deleted";
   $_SESSION['delete'] = "Xóa quản trị viên thành công";
   header('location:' . SITEURL . 'admin/manage-admin.php');
}
else
{
  // echo "Failed to Delete Admin";
  $_SESSION['delete'] = "Xóa quản trị viên thất bại";
  header('location:' . SITEURL . 'admin/manage-admin.php');
}
?>
