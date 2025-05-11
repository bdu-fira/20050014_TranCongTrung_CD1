<!--- Footer Section Starts -->
<style>
    .Footer {
        background-color: #222;
        color: #fff;
        padding: 25px 0;
        width: 100%;
        bottom: 0;
        left: 0;
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: auto;
        padding: 0 20px;
    }

    .footer-column {
        flex: 1;
        min-width: 250px;
        margin: 10px 0;
    }

    .footer-column h4 {
        color: #ffc107;
        margin-bottom: 10px;
    }

    .footer-column p,
    .footer-column a {
        color: #ccc;
        font-size: 14px;
        text-decoration: none;
        display: block;
        margin-bottom: 6px;
    }

    .footer-column a:hover {
        color: #fff;
    }

    .footer-bottom {
        text-align: center;
        color: #888;
        font-size: 13px;
        margin-top: 20px;
    }

    .footer-icons a {
        color: #ccc;
        margin-right: 10px;
        font-size: 18px;
    }

    .footer-icons a:hover {
        color: #fff;
    }

    body {
        margin: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .content-wrapper {
        flex: 1;
    }
</style>

<div class="Footer">
    <div class="footer-container">
        <!-- Cột trái: Thông tin liên hệ -->
        <div class="footer-column">
            <h4>Cà Phê Nhà - Bình Dương</h4>
            <p>📍 123 Đường Trà Sữa, Thủ Dầu Một, Bình Dương</p>
            <p>📞 0123 456 789</p>
            <p>✉️ caphenha@gmail.com</p>
            <div class="footer-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- Cột phải: Liên kết nhanh -->
        <div class="footer-column">
            <h4>Quản trị hệ thống</h4>
            <a href="manage-admin.php">👤 Quản lý Admin</a>
            <a href="manage-category.php">📂 Danh mục món</a>
            <a href="manage-food.php">🍔 Danh sách món</a>
            <a href="manage-order.php">🧾 Hóa đơn</a>
            <a href="index.php">🏠 Về trang người dùng</a>
        </div>
    </div>

    <!-- Bottom -->
    <div class="footer-bottom">
        © 2025 Cafe Shop Admin. Thiết kế bởi <a href="#" style="color: #ffc107;">Cà Phê BD</a>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</body>
</html>
