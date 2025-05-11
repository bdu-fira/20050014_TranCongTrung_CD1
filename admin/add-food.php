<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Thêm Nước</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Tên: </td>
                    <td>
                        <input type="text" name="title" placeholder="Nhập tên nước...">
                    </td>
                </tr>

                <tr>
                    <td>Mô tả: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Nhập mô tả nước..."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Giá: </td>
                    <td>
                        <input type="number" name="price" placeholder="Nhập giá nước...">
                    </td>
                </tr>

                <tr>
                    <td>Loại Nước: </td>
                    <td>
                        <select name="category">

                            <?php 
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                
                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">Không tìm thấy danh mục</option>
                                    <?php
                                }
                            

                            ?>

                        </select>
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
                        <input type="submit" name="submit" value="Thêm sản phẩm" class="btn-secondery">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 

            if(isset($_POST['submit']))
            {
                
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

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

                // Thêm vào cơ sở dữ liệu
                $sql2 = "INSERT INTO tbl_food SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Thêm thành công.</div>";
                    echo "Nước đã được thêm thành công!";
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Thêm thất bại.</div>";
                    echo "Thêm nước thất bại!";
                }

                
            }

        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>
