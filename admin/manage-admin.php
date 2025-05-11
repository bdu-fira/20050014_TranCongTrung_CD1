<?php include('partials/menu.php');?>
<div class="Main-Content">
    <div class="wrapper">
        <h1>QUẢN LÝ ADMIN</h1>

        <br /><br /><br />
        <a href="add-admin.php" class="btn-primary">Thêm admin</a>
        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Tên đầy đủ</th>
                <th>Tên đăng nhập</th>
                <th>Hành động</th>
            </tr>
            <?php
            $sql = "SELECT * FROM tbl_admin";
            $res = mysqli_query($conn, $sql);
            if ($res == TRUE) {
                $count = mysqli_num_rows($res);
                $sn=1;
            }
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $full_name = $rows['full_name'];
                    $username = $rows['username'];

                   ?>
                <tr>
                <td><?php echo $sn++;?></td>
                <td><?php echo $full_name;?></td>
                <td><?php echo $username;?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Đổi Mật Khẩu</a>
                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondery">Cập Nhật</a>
                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Xóa Admin</a>
                </td>
            </tr>

                   <?php
                }
            } else {

            }
            ?>

        </table>
    </div>

</div>
<?php include('partials/footer.php'); ?>
