<?php include('partials-front/menu.php'); ?>

<?php 
    if(isset($_GET['food_id']))
    {
        $food_id = $_GET['food_id'];

        $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $row = mysqli_fetch_assoc($res);

            $title = $row['title'];
            $price = $row['price'];
        }
        else
        {
            header('location:'.SITEURL);
        }
    }
    else
    {
        header('location:'.SITEURL);
    }
?>

<section class="food-search">
    <div class="container">
        <h2 class="text-center text-white">HÃY ĐIỀN MẪU NÀY ĐỂ THƯỞNG THỨC MÓN YÊU THÍCH CỦA BẠN</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Sản phẩm</legend>

                <div class="food-menu-img">
                    <!-- Thêm hình ảnh món ăn nếu cần -->
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price">VND<?php echo number_format($price, 0); ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                </div>
            </fieldset>

            <fieldset>
                <legend>Thông tin</legend>
                <div class="order-label">Tên</div>
                <input type="text" name="full-name" placeholder="Tên của bạn" class="input-responsive" required>

                <div class="order-label">SĐT</div>
                <input type="tel" name="contact" placeholder="084xxxx" class="input-responsive">

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="cafeshop@gmail.com" class="input-responsive">

                <div class="order-label">Số bàn</div>
                <textarea name="no" rows="1" placeholder="Bàn của bạn" class="input-responsive" required></textarea>

                <div class="order-label">Số lượng</div>
                <input type="number" name="qty" class="input-responsive" required>

                <div class="order-label">Hình thức đặt hàng</div>
                <select name="order_type" class="input-responsive" required>
                    <option value="offline">Tại quầy</option>
                    <option value="online">Đặt online</option>
                </select>

                <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary">
            </fieldset>
        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;

                $order_date = date("Y-m-d H:i:s"); // sửa chuẩn datetime (giờ 24h)
                $status = "Đã đặt";

                $customer_name = $_POST['full-name'];
                $customer_contact = isset($_POST['contact']) && $_POST['contact'] !== '' ? $_POST['contact'] : null;
                $customer_email = isset($_POST['email']) && $_POST['email'] !== '' ? $_POST['email'] : null;
                $table_no = $_POST['no'];
                $order_type = $_POST['order_type'];

                $sql2 = "INSERT INTO tbl_order SET 
                    food = '$food',
                    price = $price,
                    qty = $qty,
                    total = $total,
                    order_date = '$order_date',
                    status = '$status',
                    order_type = '$order_type',
                    customer_name = '$customer_name',
                    customer_contact = " . ($customer_contact !== null ? "'$customer_contact'" : "NULL") . ",
                    customer_email = " . ($customer_email !== null ? "'$customer_email'" : "NULL") . ",
                    customer_address = '$table_no'
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true)
                {
                    $_SESSION['order'] = "<div class='success text-center'>Đặt món thành công.</div>";
                    header('location:'.SITEURL);
                }
                else
                {
                    $_SESSION['order'] = "<div class='error text-center'>Không thể đặt món. Vui lòng thử lại.</div>";
                    header('location:'.SITEURL);
                }
            }
        ?>

    </div>
</section>

<?php include('partials-front/footer.php'); ?>
