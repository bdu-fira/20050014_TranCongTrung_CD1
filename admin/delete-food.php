<?php 
    //Bao gồm trang Constants
    include('config/constants.php');

    if(isset($_GET['id']))
    {
        //1. Lấy ID
        $id = $_GET['id'];

        //3. Xóa món ăn
        $sql = "DELETE FROM tbl_food WHERE id='$id'";
        //Thực thi câu truy vấn
        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            //Món ăn đã bị xóa
            $_SESSION['delete'] = "<div class='success'>Xóa món ăn thành công.</div>";
            header('location:' . SITEURL . 'admin/manage-food.php');
        }
        else
        {
            //Xóa thất bại
            $_SESSION['delete'] = "<div class='error'>Xóa món ăn thất bại.</div>";
            header('location:' . SITEURL . 'admin/manage-food.php');
        }
    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Truy cập không được phép.</div>";
        header('location:' . SITEURL . 'admin/manage-food.php');
    }
?>
