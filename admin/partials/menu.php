<?php
include('config/constants.php');
include('login-check.php');
?>
<html>

<head>
    <title>Hệ Thống Quản Lý Quán Cà Phê - Trang Chủ</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <!--- Bắt đầu phần Menu -->
    <div class="Menu">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="manage-admin.php">Quản Trị Viên</a></li>
                <li><a href="manage-category.php">Danh Mục</a></li>
                <li><a href="manage-food.php">Món Ăn</a></li>
                <li><a href="manage-order.php">Đơn Hàng</a></li>
                <li><a href="logout.php">Đăng Xuất</a></li>
                <li><a href="user.php">Trang Web</a></li>
            </ul>
        </div>
    </div>
    <!--- Kết thúc phần Menu -->
