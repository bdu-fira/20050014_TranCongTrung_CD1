<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Thay đổi mật khẩu</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id']; // Lấy ID người quản trị từ URL
            }
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Mật khẩu hiện tại: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Mật khẩu hiện tại">
                    </td>
                </tr>

                <tr>
                    <td>Mật khẩu mới:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="Mật khẩu mới">
                    </td>
                </tr>

                <tr>
                    <td>Xác nhận mật khẩu: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Cập nhật" class="btn-secondery">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php 
    // Kiểm tra khi người quản trị bấm nút "Cập nhật"
    if(isset($_POST['submit']))
    {
        // Lấy dữ liệu từ form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']); // Mã hóa mật khẩu hiện tại
        $new_password = md5($_POST['new_password']); // Mã hóa mật khẩu mới
        $confirm_password = md5($_POST['confirm_password']); // Mã hóa xác nhận mật khẩu

        // Kiểm tra mật khẩu hiện tại có đúng không
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $count = mysqli_num_rows($res); // Kiểm tra số lượng kết quả trả về

            if($count == 1) // Nếu tìm thấy tài khoản
            {
                // Kiểm tra mật khẩu mới và xác nhận mật khẩu có khớp không
                if($new_password == $confirm_password)
                {
                    // Cập nhật mật khẩu mới
                    $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id";
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == true)
                    {
                        // Cập nhật thành công
                        $_SESSION['change-pwd'] = "<div class='success'>Cập nhật thành công. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        // Cập nhật thất bại
                        $_SESSION['change-pwd'] = "<div class='error'>Cập nhật thất bại. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    // Mật khẩu xác nhận không khớp
                    $_SESSION['pwd-not-match'] = "<div class='error'>Mật khẩu không khớp. </div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                // Không tìm thấy tài khoản với mật khẩu hiện tại
                $_SESSION['user-not-found'] = "<div class='error'>Mật khẩu hiện tại không đúng. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
    }
?>

<?php include('partials/footer.php'); ?>
