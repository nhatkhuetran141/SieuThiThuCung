-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 01:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meow_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(5) NOT NULL,
  `account_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `account_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `block` int(1) DEFAULT NULL,
  `created_date_account` datetime DEFAULT current_timestamp(),
  `update_date_account` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `email`, `password`, `date_of_birth`, `account_address`, `gender`, `phone`, `avatar`, `role`, `block`, `created_date_account`, `update_date_account`) VALUES
(1, 'Lê Ngọc Tuấn', 'lengoctuan2406@gmail.com', '1', '2001-06-24', 'Hồ Chí Minh', 'Male', '0984121942', 'anhdh.jpg', 1, 0, '2022-06-10 20:52:30', '1900-01-31 20:55:23'),
(2, 'Trần Thị Giang', 'tranthigiang@gmail.com', '1', '2001-06-24', 'Hồ Chí Minh', 'Male', '098342233', 'anh-avatar-dep-56.jpg', 0, 0, '2022-06-10 20:54:56', '2022-06-18 22:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `product_id` int(5) DEFAULT NULL,
  `cart_quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `count_others`
--

CREATE TABLE `count_others` (
  `count_other_id` int(5) NOT NULL,
  `count_other_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count_other` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `count_others`
--

INSERT INTO `count_others` (`count_other_id`, `count_other_name`, `count_other`) VALUES
(1, 'account_online', 13),
(2, 'product', 0),
(3, 'customer', 0),
(4, 'employee', 0);

-- --------------------------------------------------------

--
-- Table structure for table `count_sales`
--

CREATE TABLE `count_sales` (
  `count_sales_id` int(5) NOT NULL,
  `product_id` int(5) DEFAULT NULL,
  `count_sale` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `count_sales`
--

INSERT INTO `count_sales` (`count_sales_id`, `product_id`, `count_sale`) VALUES
(1, 1, 10),
(2, 2, 3),
(3, 3, 40);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(5) NOT NULL,
  `coupon_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `date_start_coupon` datetime DEFAULT current_timestamp(),
  `date_end_coupon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_name`, `discount`, `date_start_coupon`, `date_end_coupon`) VALUES
(1, 'Giam 20 phan tram', 20, '2022-06-10 22:09:11', '2022-06-17 22:08:45'),
(2, 'Giam 10 phan tram', 10, '2022-06-10 22:09:11', '2022-06-17 22:08:45'),
(3, 'Giam 5 phan tram', 5, '2022-06-10 22:09:11', '2022-06-17 22:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `customer_bio` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `account_id`, `customer_bio`) VALUES
(1, 2, 'là một người thật thà');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `employee_position` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `order_product_all_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_all_quantity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_notes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_invoice_order` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(5) NOT NULL,
  `order_status_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `order_status_name`) VALUES
(1, 'Waiting'),
(2, 'Delivery'),
(3, 'Completely'),
(4, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_type_id` int(5) DEFAULT NULL,
  `brand` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_quantity` int(10) DEFAULT NULL,
  `product_description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_price` int(10) DEFAULT NULL,
  `product_image_1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image_2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image_3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_type_id`, `brand`, `product_quantity`, `product_description`, `product_price`, `product_image_1`, `product_image_2`, `product_image_3`) VALUES
(1, 'ten san pham 1', 1, 'thuong hieu', 0, 'mo ta san pham co the co nhjieu cai hay ho ma ta quan tam roi so sanh voi cai hay ho khac', 10, '866-300x300.jpg', '20d2.jpg', '866-300x300.jpg'),
(2, 'ten san pham 2', 2, 'thuong hieu 2', 5, 'mo ta san pham co the co nhjieu cai hay ho ma ta quan tam roi so sanh voi cai hay ho khac 2', 100, '866-300x300.jpg', '20d2.jpg', '866-300x300.jpg'),
(3, 'ten san pham 3', 3, 'thuong hieu 3', 5, 'mo ta san pham co the co nhjieu cai hay ho ma ta quan tam roi so sanh voi cai hay ho khac 3', 120, '866-300x300.jpg', '20d2.jpg', '866-300x300.jpg'),
(4, 'ten san pham 4', 1, 'thuong hieu 4', 10, 'mo ta san pham co the co nhjieu cai hay ho ma ta quan tam roi so sanh voi cai hay ho khac 4', 10, '866-300x300.jpg', '20d2.jpg', '866-300x300.jpg'),
(5, 'ten san pham 5', 1, 'thuong hieu 5', 10, 'mo ta san pham co the co nhjieu cai hay ho ma ta quan tam roi so sanh voi cai hay ho khac', 10, '866-300x300.jpg', '20d2.jpg', '866-300x300.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `product_type_id` int(5) NOT NULL,
  `product_type_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`product_type_id`, `product_type_name`, `coupon_id`) VALUES
(1, 'loai san pham 1', 1),
(2, 'loai san pham 2', 2),
(3, 'loai san pham 3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchases_history`
--

CREATE TABLE `purchases_history` (
  `purchase_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `purchase_history_product_all_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_history_all_quantity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_history_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_history_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchases_history_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_history_total_price` int(10) DEFAULT NULL,
  `created_date_purchase_history` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `count_others`
--
ALTER TABLE `count_others`
  ADD PRIMARY KEY (`count_other_id`);

--
-- Indexes for table `count_sales`
--
ALTER TABLE `count_sales`
  ADD PRIMARY KEY (`count_sales_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `purchases_history`
--
ALTER TABLE `purchases_history`
  ADD PRIMARY KEY (`purchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `count_others`
--
ALTER TABLE `count_others`
  MODIFY `count_other_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `count_sales`
--
ALTER TABLE `count_sales`
  MODIFY `count_sales_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `product_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases_history`
--
ALTER TABLE `purchases_history`
  MODIFY `purchase_id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
