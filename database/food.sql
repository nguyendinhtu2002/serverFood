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
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`id`, `name`, `image`, `description`, `price`, `discount`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 'Cánh gà rán', 'https://as2.ftcdn.net/v2/jpg/03/45/51/07/1000_F_345510783_jAd8S4GbXwXfYNvBIExqV0BTuSSzhoKG.jpg', 'Cánh gà rán sốt mật ong', '35000', '0', 1, '2023-06-28 02:49:45', '2023-06-28 02:49:45'),
(2, 'Gà rán BBQ', 'https://img.freepik.com/premium-photo/korean-fried-chicken-with-black-backdrop_220770-545.jpg?w=1060', 'Gà rán cay vị BBQ', '35000', '0', 1, '2023-06-28 02:49:45', '2023-06-28 02:49:45'),
(3, 'Gà popcorn', 'https://thumbs.dreamstime.com/b/crispy-fried-breadcrumb-covered-chicken-popcorn-ketchup-black-background-top-view-crispy-fried-breadcrumb-covered-chicken-241437753.jpg', 'Gà popcorn', '25000', '0', 1, '2023-06-28 02:49:45', '2023-06-28 02:49:45'),
(4, 'Gà rán', 'https://img.freepik.com/free-photo/crispy-kentucky-fried-chicken-black-slate-background_123827-22525.jpg', 'Gà rán không gia vị', '29000', '0', 1, '2023-06-28 02:49:45', '2023-06-28 02:49:45'),
(5, 'Gà nugget', 'https://img.freepik.com/premium-photo/pile-chicken-nuggets-isolated-black-color-background_135427-8051.jpg', 'Gà viên nugget', '25000', '0', 1, '2023-06-28 02:49:45', '2023-06-28 02:49:45'),
(6, 'Burger bò', 'https://st4.depositphotos.com/1009628/20306/i/600/depositphotos_203067720-stock-photo-homemade-hamburger-burger-fresh-vegetables.jpg', 'Hamburger bò phô mai', '35000', '0', 2, '2023-06-28 02:50:03', '2023-06-28 02:50:03'),
(7, 'Burger chay', 'https://thumbs.dreamstime.com/b/fresh-tasty-burger-black-background-tasty-appetizing-cheeseburger-vegetarian-burger-fresh-tasty-burger-black-background-115420761.jpg', 'Burger rau củ', '15000', '0', 2, '2023-06-28 02:50:03', '2023-06-28 02:50:03'),
(8, 'Burger bò 2 tầng', 'https://img.freepik.com/premium-photo/hamburger-black-background-food-photography_131346-989.jpg', 'Gấp đôi bò, gấp đôi phô mai', '49000', '0', 2, '2023-06-28 02:50:03', '2023-06-28 02:50:03'),
(9, 'Burger than tre', 'https://img.freepik.com/premium-photo/tasty-craft-burger-with-black-bun-black-background_210435-4244.jpg', 'Hamburger than tre', '39000', '0', 2, '2023-06-28 02:50:03', '2023-06-28 02:50:03'),
(10, 'Pizza chay', 'https://previews.123rf.com/images/radionphoto/radionphoto1702/radionphoto170200379/71598598-vegetarian-pizza-with-vegetables-on-a-black-background.jpg', 'Pizza chay', '39000', '0', 3, '2023-06-28 02:50:17', '2023-06-28 02:50:17'),
(11, 'Pizza peperoni', 'https://static.vecteezy.com/system/resources/thumbnails/022/007/048/small/pizza-slice-and-hot-pizza-on-black-background-generative-ai-photo.jpg', 'Pizza peperoni', '59000', '0', 3, '2023-06-28 02:50:17', '2023-06-28 02:50:17'),
(12, 'Pizza phô mai', 'https://img.freepik.com/premium-photo/pizza-black-background-illustration-images_796580-21.jpg?w=996', 'Pizza phô mai', '59000', '0', 3, '2023-06-28 02:50:17', '2023-06-28 02:50:17'),
(13, 'Pizza Chicago', 'https://vietnamtoursm.com/wp-content/uploads/2014/12/nhung-ly-do-khien-thuc-khach-phat-cuong-vi-pizza-de-day-o-chicago-1.jpg', 'Pizza Chicago đế dày', '69000', '0', 3, '2023-06-28 02:50:18', '2023-06-28 02:50:18'),
(14, 'Pizza hải sản', 'https://previews.123rf.com/images/radionphoto/radionphoto1702/radionphoto170200370/71598640-seafood-pizza-with-squid-shrimp-mussels-on-a-black-background.jpg', 'Pizza hải sản', '59000', '0', 3, '2023-06-28 02:50:18', '2023-06-28 02:50:18'),
(15, 'Salad', 'https://as2.ftcdn.net/v2/jpg/02/43/66/89/1000_F_243668957_5DQYlBdtCPfBfsxD9YqcIWSK16lPmMOh.jpg', 'Salad rau củ', '19000', '0', 4, '2023-06-28 02:50:38', '2023-06-28 02:50:38'),
(16, 'Bánh Croissant', 'https://img.freepik.com/premium-photo/croissants-black-background_131346-635.jpg?w=2000', 'Bánh sừng bò', '15000', '0', 4, '2023-06-28 02:50:38', '2023-06-28 02:50:38'),
(17, 'Salad', 'https://as2.ftcdn.net/v2/jpg/02/43/66/89/1000_F_243668957_5DQYlBdtCPfBfsxD9YqcIWSK16lPmMOh.jpg', 'Salad rau củ', '19000', '0', 4, '2023-06-28 02:50:53', '2023-06-28 02:50:53'),
(18, 'Bánh Croissant', 'https://img.freepik.com/premium-photo/croissants-black-background_131346-635.jpg?w=2000', 'Bánh sừng bò', '15000', '0', 4, '2023-06-28 02:50:53', '2023-06-28 02:50:53'),
(19, 'Aquafina', 'https://live.staticflickr.com/1291/835861381_56d34023c0_b.jpg', 'Nước lọc aquafina', '5000', '0', 5, '2023-06-28 02:51:18', '2023-06-28 02:51:18'),
(20, 'Fanta cam', 'https://c4.wallpaperflare.com/wallpaper/893/469/256/drink-fanta-can-wallpaper-preview.jpg', 'Fanta cam', '9000', '0', 5, '2023-06-28 02:51:18', '2023-06-28 02:51:18'),
(21, 'Coca cola', 'https://images.unsplash.com/photo-1628340650580-0b2ffda8b807?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8M3x8fGVufDB8fHx8&w=1000&q=80', 'Coca cola', '9000', '0', 5, '2023-06-28 02:51:18', '2023-06-28 02:51:18'),
(22, 'Pepsi', 'https://cdnb.artstation.com/p/assets/images/images/041/576/171/large/3d-pro-club-a540d7126542929-612f83f928d25.jpg?1632102481', 'Pepsi', '9000', '0', 5, '2023-06-28 02:51:18', '2023-06-28 02:51:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
