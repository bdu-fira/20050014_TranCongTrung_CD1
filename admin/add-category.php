<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Thêm Danh Mục</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br><br>

        <!-- Form Thêm Danh Mục Bắt Đầu -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Tên danh mục: </td>
                    <td>
                        <input type="text" name="title" placeholder="Nhập tên danh mục...">
                    </td>
                </tr>

                <tr>
                    <td>Chọn ảnh: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Nổi bật: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Có 
                        <input type="radio" name="featured" value="No"> Không 
                    </td>
                </tr>

                <tr>
                    <td>Ẩn/Hiện: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Có 
                        <input type="radio" name="active" value="No"> Không 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Thêm Danh Mục" class="btn-secondery">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                // Kiểm tra ảnh
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    
                    if($image_name != "")
                    {
                        // Lấy phần mở rộng của ảnh
                        $tmp = explode('.', $image_name);
                        $ext = end($tmp);

                        // Tạo tên ảnh mới
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; 

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;

                        // Tải ảnh lên
                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false)
                        {
                            // Thông báo lỗi
                            $_SESSION['upload'] = "<div class='error'>Tải ảnh lên thất bại.</div>";
                            header('location:'.SITEURL.'admin/add-category.php');
                            die();
                        }
                    }
                }
                else
                {
                    $image_name = "";
                }

                // Thêm danh mục vào cơ sở dữ liệu
                $sql = "INSERT INTO tbl_category SET 
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                ";

                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    // Thông báo thành công
                    $_SESSION['add'] = "<div class='success'>Danh mục đã được thêm thành công.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    // Thông báo thất bại
                    $_SESSION['add'] = "<div class='error'>Thêm danh mục thất bại.</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
