<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhật đơn hàng</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                // Lấy thông tin đơn hàng từ cơ sở dữ liệu
                $sql = "SELECT * FROM tbl_order WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count == 1)
                {
                    $row = mysqli_fetch_assoc($res);

                    // Lấy các thông tin đơn hàng
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $table_no = $row['table_no'];
                }
                else
                {
                    // Nếu không tìm thấy đơn hàng, chuyển hướng về trang quản lý đơn hàng
                    header('location:' . SITEURL . 'admin/manage-order.php');
                }
            }
            else
            {
                // Nếu không có ID, chuyển hướng về trang quản lý đơn hàng
                header('location:' . SITEURL . 'admin/manage-order.php');
            }
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Đơn hàng</td>
                    <td><b><?php echo $food; ?></b></td>
                </tr>

                <tr>
                    <td>Giá</td>
                    <td><b> VND <?php echo $price; ?></b></td>
                </tr>

                <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <select name="status">
                            <option <?php if($status == "Ordered") { echo "selected"; } ?> value="Ordered">Đã đặt</option>
                            <option <?php if($status == "On Delivery") { echo "selected"; } ?> value="On Delivery">Đang chuẩn bị</option>
                            <option <?php if($status == "Delivered") { echo "selected"; } ?> value="Delivered">Hoàn thành</option>
                            <option <?php if($status == "Cancelled") { echo "selected"; } ?> value="Cancelled">Đã hủy</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Khách hàng: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Liên hệ: </td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Bàn số: </td>
                    <td>
                        <textarea name="table_no" cols="30" rows="5"><?php echo $table_no; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <input type="submit" name="submit" value="Cập nhật" class="btn-secondery">
                    </td>
                </tr>
            </table>
        
        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                // Lấy dữ liệu từ form
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                // Tính tổng tiền
                $total = $price * $qty;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $table_no = $_POST['table_no'];

                // Cập nhật đơn hàng vào cơ sở dữ liệu
                $sql2 = "UPDATE tbl_order SET 
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    table_no = '$table_no'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true)
                {
                    // Cập nhật thành công
                    $_SESSION['update'] = "<div class='success'>Cập nhật thành công.</div>";
                    header('location:' . SITEURL . 'admin/manage-order.php');
                }
                else
                {
                    // Cập nhật thất bại
                    $_SESSION['update'] = "<div class='error'>Cập nhật thất bại.</div>";
                    header('location:' . SITEURL . 'admin/manage-order.php');
                }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
