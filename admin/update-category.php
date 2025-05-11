<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Cập nhật danh mục</h1>
        <br><br>

        <?php 
        
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_category WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                } else {
                    $_SESSION['no-category-found'] = "<div class='error'>Không tìm thấy danh mục.</div>";
                    header('location:' . SITEURL . 'admin/manage-category.php');
                }

            } else {
                header('location:' . SITEURL . 'admin/manage-category.php');
            }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Tên Mục: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Hình ảnh hiện tại: </td>
                    <td>
                        <?php 
                            if ($current_image != "") {
                                // Hiển thị ảnh hiện tại
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                                <?php
                            } else {
                                // Hiển thị thông báo không có ảnh
                                echo "<div class='error'>Chưa có ảnh.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Chọn hình ảnh mới: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Nổi bật: </td>
                    <td>
                        <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Có 
                        <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" value="No"> Không 
                    </td>
                </tr>

                <tr>
                    <td>Ẩn/Hiện: </td>
                    <td>
                        <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Có 
                        <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No"> Không 
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Cập nhật" class="btn-secondery">
                    </td>
                </tr>

            </table>
        </form>

        <?php 
        
            if (isset($_POST['submit'])) {

                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                // Kiểm tra nếu có hình ảnh mới được tải lên
                if (isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    if ($image_name != "") {
                        // Đặt tên mới cho hình ảnh
                        $tmp = explode('.', $image_name);
                        $ext = end($tmp);
                        $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/" . $image_name;

                        // Di chuyển hình ảnh đến thư mục đích
                        $upload = move_uploaded_file($source_path, $destination_path);

                        if ($upload == false) {
                            $_SESSION['upload'] = "<div class='error'>Tải hình ảnh lên thất bại.</div>";
                            header('location:' . SITEURL . 'admin/manage-category.php');
                            die();
                        }

                        // Xóa hình ảnh cũ nếu có
                        if ($current_image != "") {
                            $remove_path = "../images/category/" . $current_image;
                            $remove = unlink($remove_path);

                            if ($remove == false) {
                                $_SESSION['failed-remove'] = "<div class='error'>Xóa hình ảnh hiện tại thất bại.</div>";
                                header('location:' . SITEURL . 'admin/manage-category.php');
                                die();
                            }
                        }
                    } else {
                        $image_name = $current_image;
                    }
                } else {
                    $image_name = $current_image;
                }

                // Cập nhật thông tin vào cơ sở dữ liệu
                $sql2 = "UPDATE tbl_category SET 
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active' 
                    WHERE id = $id";

                // Thực thi truy vấn
                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {
                    // Cập nhật thành công
                    $_SESSION['update'] = "<div class='success'>Cập nhật thành công</div>";
                    header('location:' . SITEURL . 'admin/manage-category.php');
                } else {
                    // Cập nhật thất bại
                    $_SESSION['update'] = "<div class='error'>Cập nhật thất bại</div>";
                    header('location:' . SITEURL . 'admin/manage-category.php');
                }

            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
