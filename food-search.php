<?php include('partials-front/menu.php'); ?>

<section class="food-search text-center">
    <div class="container">
        <?php 
            $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>

        <h2>Sản phẩm tìm kiếm: <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Danh sách sản phẩm</h2>

        <?php 
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name']; // Xử lý hình ảnh
                    
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                                if($image_name != "") {
                                    echo "<img src='".SITEURL."images/food/".$image_name."' alt='".$title."' class='img-responsive img-curve'>";
                                } else {
                                    echo "<div class='error'>Không có hình ảnh</div>";
                                }
                            ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price"><?php echo $price; ?> VND</p>
                            <p class="food-detail"><?php echo $description; ?></p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Đặt món</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='error'>Không tìm thấy sản phẩm nào.</div>";
            }
        ?>

        <div class="clearfix"></div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>
