-- -----------------------------
-- Table: tbl_admin
-- -----------------------------
CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'abhi', 'abhi', '21232f297a57a5a743894a0e4a801fc3');

-- -----------------------------
-- Table: tbl_category
-- -----------------------------
CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255),
  `featured` varchar(10),
  `active` varchar(10),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Coffee', 'coffee-category.jpg', 'Yes', 'Yes'),
(2, 'Tea', 'tea-category.jpg', 'Yes', 'Yes'),
(3, 'Cake', 'cake-category.jpg', 'No', 'Yes'),
(4, 'Juice', 'juice-category.jpg', 'No', 'Yes');

-- -----------------------------
-- Table: tbl_food
-- -----------------------------
CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2),
  `image_name` varchar(255),
  `category_id` int(10) UNSIGNED,
  `featured` varchar(10),
  `active` varchar(10),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Espresso', 'Cà phê espresso đậm đà và mạnh mẽ.', 45000, 'espresso.jpg', 1, 'Yes', 'Yes'),
(2, 'Cappuccino', 'Cappuccino mượt mà với lớp bọt sữa.', 50000, 'cappuccino.jpg', 1, 'Yes', 'Yes'),
(3, 'Matcha Latte', 'Latte trà xanh tươi mát với sữa.', 55000, 'matcha-latte.jpg', 2, 'No', 'Yes'),
(4, 'Bánh Socola', 'Bánh socola nhiều lớp thơm ngon.', 60000, 'chocolate-cake.jpg', 3, 'Yes', 'Yes'),
(5, 'Nước Dâu', 'Nước ép dâu tươi nguyên chất.', 40000, 'strawberry-juice.jpg', 4, 'No', 'Yes');

-- -----------------------------
-- Table: tbl_order
-- -----------------------------
CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'Ordered',
  `order_type` varchar(20) NOT NULL DEFAULT 'offline',  -- offline / online
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `customer_address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;;


-- -----------------------------
-- Table: tbl_customer
-- -----------------------------
CREATE TABLE `tbl_customer` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20),
  `address` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------
-- Table: tbl_feedback
-- -----------------------------
CREATE TABLE `tbl_feedback` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) UNSIGNED,
  `message` text NOT NULL,
  `rating` int(1),
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------
-- Table: tbl_reservation
-- -----------------------------
CREATE TABLE `tbl_reservation` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) UNSIGNED,
  `table_number` int(5),
  `reservation_time` datetime NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------
-- Table: tbl_blog
-- -----------------------------
CREATE TABLE `tbl_blog` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image_name` varchar(255),
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------
-- Table: tbl_promotion
-- -----------------------------
CREATE TABLE `tbl_promotion` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `discount_percent` int(3),
  `start_date` date,
  `end_date` date,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------
-- Table: tbl_payment
-- -----------------------------
CREATE TABLE `tbl_payment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED,
  `amount` decimal(10,2),
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `payment_method` varchar(50),
  `status` varchar(50),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
