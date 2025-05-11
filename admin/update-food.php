<?php include('partials/menu.php'); ?>

<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

    }
    else
    {
        header('location:' . SITEURL . 'admin/manage-food.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhật sản phẩm</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Tên sản phẩm: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td>Mô tả: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Giá: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>

            <tr>
                <td>Danh mục: </td>
                <td>
                    <select name="category">

                        <?php 
                            // Lấy danh sách các danh mục còn hoạt động
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if($count > 0)
                            {
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    
                                    ?>
                                    <option <?php if($current_category == $category_id) { echo "selected"; } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<option value='0'>Danh mục không có sẵn.</option>";
                            }
                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Nổi bật: </td>
                <td>
                    <input <?php if($featured == "Yes") { echo "checked"; } ?> type="radio" name="featured" value="Yes"> Có 
                    <input <?php if($featured == "No") { echo "checked"; } ?> type="radio" name="featured" value="No"> Không 
                </td>
            </tr>

            <tr>
                <td>Ẩn/Hiện: </td>
                <td>
                    <input <?php if($active == "Yes") { echo "checked"; } ?> type="radio" name="active" value="Yes"> Có 
                    <input <?php if($active == "No") { echo "checked"; } ?> type="radio" name="active" value="No"> Không 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Cập Nhật" class="btn-secondery">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                // Lấy giá trị từ form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                // Cập nhật thông tin sản phẩm
                $sql3 = "UPDATE tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3 == true)
                {
                    $_SESSION['update'] = "<div class='success'>Cập nhật sản phẩm thành công.</div>";
                    header('location:' . SITEURL . 'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Cập nhật sản phẩm thất bại.</div>";
                    header('location:' . SITEURL . 'admin/manage-food.php');
                }
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
