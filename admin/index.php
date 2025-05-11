<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Bảng Thống Kê</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <br><br>

        <div class="col-4 text-center">

            <?php 
                //Truy vấn SQL 
                $sql = "SELECT * FROM tbl_category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
            ?>

            <h1><?php echo $count; ?></h1>
            <br />
            Loại Nước
        </div>

        <div class="col-4 text-center">

            <?php 
                //Truy vấn SQL 
                $sql2 = "SELECT * FROM tbl_food";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
            ?>

            <h1><?php echo $count2; ?></h1>
            <br />
            Số Nước
        </div>

        <div class="col-4 text-center">
            
            <?php 
                //Truy vấn SQL 
                $sql3 = "SELECT * FROM tbl_order";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
            ?>

            <h1><?php echo $count3; ?></h1>
            <br />
            Tổng Đơn
        </div>

        <div class="col-4 text-center">
            
            <?php 
                //Tạo truy vấn SQL 
                $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                $res4 = mysqli_query($conn, $sql4);

                $row4 = mysqli_fetch_assoc($res4);
                
                $total_revenue = $row4['Total'];

            ?>

            <h1>VND<?php echo $total_revenue; ?></h1>
            <br />
            Doanh Thu
        </div>

        <div class="clearfix"></div>

    </div>
</div>

<?php include('partials/footer.php') ?>
