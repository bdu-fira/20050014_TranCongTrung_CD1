<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Quán Cà Phê</title>
    <style>
        /* CSS cho footer */
        .footer {
            background-color: #f8f9fa;
            padding: 30px 0;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            text-align: left;
            flex-wrap: wrap; /* Đảm bảo rằng các cột sẽ xếp lại khi màn hình nhỏ */
        }

        .footer-column {
            width: 30%;
            padding: 15px;
        }

        .footer-column h4 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .footer-column ul {
            list-style-type: none;
            padding: 0;
        }

        .footer-column ul li {
            margin: 5px 0;
        }

        .footer-column a {
            color: #333;
            text-decoration: none;
        }

        .footer-column a:hover {
            color: #007BFF;
        }

        /* CSS cho phần mạng xã hội */
        .social {
            background-color: #343a40;
            padding: 20px 0;
        }

        .social ul {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
        }

        .social ul li {
            margin: 0 15px;
        }

        .social ul li a {
            display: block;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #fff;
            padding: 10px;
        }

        .social ul li a img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
    </style>
</head>
<body>

    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="https://www.facebook.com/yourpage" target="_blank"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" alt="Facebook"/></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/yourprofile" target="_blank"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" alt="Instagram"/></a>
                </li>
                <li>
                    <a href="https://twitter.com/yourprofile" target="_blank"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" alt="Twitter"/></a>
                </li>
            </ul>
        </div>
    </section>

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <div class="footer-content">
                <div class="footer-column">
                    <h4><strong>Café Shop</strong></h4>
                    <p><a href="#">Địa chỉ: 123 Quang Trung, Bình Dương</a></p>
                    <p><a href="tel:+84900000000">Điện thoại: +84 90 000 0000</a></p>
                    <p><a href="mailto:contact@cafeshop.com">Email: contact@cafeshop.com</a></p>
                </div>
                <div class="footer-column">
                    <h4><strong>Giờ Mở Cửa</strong></h4>
                    <p>8:00 AM - 10:00 PM</p>
                </div>
                <div class="footer-column">
                    <h4><strong>Kết Nối</strong></h4>
                    <ul>
                        <li><a href="https://www.facebook.com/" target="_blank">Facebook</a></li>
                        <li><a href="https://www.instagram.com/" target="_blank">Instagram</a></li>
                        <li><a href="https://twitter.com/" target="_blank">Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>
