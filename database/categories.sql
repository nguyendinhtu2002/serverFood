-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 28, 2023 lúc 01:43 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `foodapp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Gà rán', 'https://img.freepik.com/premium-photo/korean-fried-chicken-with-black-backdrop_220770-545.jpg?w=1060', '2023-06-28 01:58:38', '2023-06-28 01:58:38'),
(2, 'Pizza', 'https://vietnamtoursm.com/wp-content/uploads/2014/12/nhung-ly-do-khien-thuc-khach-phat-cuong-vi-pizza-de-day-o-chicago-1.jpg', '2023-06-28 01:58:38', '2023-06-28 01:58:38'),
(3, 'Hamburger', 'https://img.freepik.com/premium-photo/hamburger-black-background-food-photography_131346-989.jpg', '2023-06-28 01:58:38', '2023-06-28 01:58:38'),
(4, 'Món ăn kèm', 'https://previews.123rf.com/images/martinak/martinak1308/martinak130800127/21858983-luxurious-fresh-colorful-vegetable-salad-isolated-on-black-background-healthy-eating.jpg', '2023-06-28 01:58:38', '2023-06-28 01:58:38'),
(5, 'Nước uống', 'https://images.unsplash.com/photo-1628340650580-0b2ffda8b807?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8M3x8fGVufDB8fHx8&w=1000&q=80', '2023-06-28 01:58:39', '2023-06-28 01:58:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
