-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 05:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_virtuallibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(10, 'Admin', 'admin@gmail.com', 'admin123'),
(11, 'govind', 'govind@gmail.com', 'govind123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article`
--

CREATE TABLE `tbl_article` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(100) NOT NULL,
  `article_content` varchar(200) NOT NULL,
  `article_datetime` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_article`
--

INSERT INTO `tbl_article` (`article_id`, `article_title`, `article_content`, `article_datetime`, `user_id`) VALUES
(4, 'Post', 'HELLO', '2024-05-25 10:56:46', 14),
(5, 'Post 2', 'HEY THERE', '2024-05-25 11:11:59', 14),
(6, 'Post 3', 'HEHE', '2024-05-25 11:12:57', 15),
(7, 'Post 4', 'HAHA', '2024-05-25 11:13:09', 15),
(8, 'Post 5', 'EEE', '2024-05-25 11:16:43', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(20) NOT NULL,
  `author_email` varchar(30) NOT NULL,
  `author_contact` int(15) NOT NULL,
  `author_address` varchar(40) NOT NULL,
  `author_district` varchar(20) NOT NULL,
  `author_place` varchar(20) NOT NULL,
  `author_photo` varchar(150) NOT NULL,
  `author_proof` varchar(150) NOT NULL,
  `author_pass` varchar(30) NOT NULL,
  `author_flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`author_id`, `author_name`, `author_email`, `author_contact`, `author_address`, `author_district`, `author_place`, `author_photo`, `author_proof`, `author_pass`, `author_flag`) VALUES
(1, 'author', 'author@gmail.com', 123, 'Home', '9', '13', 'wafer-wan-1lAiRydQVRw-unsplash.jpg', 'nik-Q3lJy5yNt6w-unsplash.jpg', '123', 1),
(2, 'author2', 'author2@gmail.com', 123, 'Home', '10', '11', 'e70fbe500f5550b520c93dfae4c71555.jpg', 'e70fbe500f5550b520c93dfae4c71555.jpg', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(200) NOT NULL,
  `booking_amount` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `booking_qty` int(11) NOT NULL DEFAULT 1,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `book_id` int(11) NOT NULL,
  `book_author` int(11) NOT NULL,
  `book_genre` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_des` varchar(1000) NOT NULL,
  `book_sell` int(11) NOT NULL,
  `book_rent` int(11) NOT NULL,
  `book_type` int(11) NOT NULL,
  `book_file` varchar(200) NOT NULL,
  `book_cover` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`book_id`, `book_author`, `book_genre`, `book_name`, `book_des`, `book_sell`, `book_rent`, `book_type`, `book_file`, `book_cover`) VALUES
(21, 1, 23, 'Book one', 'Aria, a young herbalist with a mysterious past, discovers she can hear faint whispers that others cannot. As the village\'s only hope, she embarks on a journey to uncover the source of the forest’s ailment. Alongside her are Finn, a brooding hunter with a tragic history, and Lyra, a spirited scholar eager to prove herself. Together, they navigate enchanted glades, decipher ancient runes, and face mythical creatures long thought extinct.', 1000, 300, 2, 'Blue Minimal Fantasy E-Book Cover.jpgBeige Blue White Aesthetic Modern Clean Photo Collage Book Cover.jpg', 'Beige Blue White Aesthetic Modern Clean Photo Collage Book Cover.jpg'),
(24, 1, 18, 'Book two', 'In a world where science and magic intertwine, lies the city of Aurum, a beacon of innovation and wonder. At its heart stands the grand Academy of Alchemy, where the brightest minds gather to unlock the universe\'s secrets. Among them is Liora, a gifted but unconventional alchemist whose experiments often defy the academy’s strict traditions.', 700, 0, 1, 'Blue Minimal Fantasy E-Book Cover.jpg', 'Blue Minimal Fantasy E-Book Cover.jpg'),
(25, 1, 21, 'Book three', 'In a world where science and magic intertwine, lies the city of Aurum, a beacon of innovation and wonder. At its heart stands the grand Academy of Alchemy, where the brightest minds gather to unlock the universe\'s secrets. Among them is Liora, a gifted but unconventional alchemist whose experiments often defy the academy’s strict traditions.', 250, 0, 1, 'Dark Minimal Modern Village Photo Field Book Cover.jpg', 'Dark Minimal Modern Village Photo Field Book Cover.jpg'),
(26, 1, 18, 'Book four', 'In a world where science and magic intertwine, lies the city of Aurum, a beacon of innovation and wonder. At its heart stands the grand Academy of Alchemy, where the brightest minds gather to unlock the universe\'s secrets. Among them is Liora, a gifted but unconventional alchemist whose experiments often defy the academy’s strict traditions.', 0, 60, 0, 'Elegant Girl Photo Romance Book Cover.jpg', 'Elegant Girl Photo Romance Book Cover.jpg'),
(27, 1, 17, 'Book five', 'In a world where science and magic intertwine, lies the city of Aurum, a beacon of innovation and wonder. At its heart stands the grand Academy of Alchemy, where the brightest minds gather to unlock the universe\'s secrets. Among them is Liora, a gifted but unconventional alchemist whose experiments often defy the academy’s strict traditions.', 0, 30, 0, 'Black & Grey Minimal Photo Alone Book Cover.jpg', 'Black & Grey Minimal Photo Alone Book Cover.jpg'),
(28, 2, 23, 'Book six', 'Their journey takes them deep into underground tunnels and forgotten catacombs, where they encounter relics of a bygone era and confront echoes of ancient powers. As they piece together clues left by the city\'s founders, Sofia must confront her own connection to the lost civilization and unravel the truth before dark forces awaken once more.', 1100, 200, 2, 'Brown Minimal Vintage Talking Heads Photo Textile Book Cover.jpg', 'Brown Minimal Vintage Talking Heads Photo Textile Book Cover.jpg'),
(29, 2, 17, 'Book seven', 'Their journey takes them deep into underground tunnels and forgotten catacombs, where they encounter relics of a bygone era and confront echoes of ancient powers. As they piece together clues left by the city\'s founders, Sofia must confront her own connection to the lost civilization and unravel the truth before dark forces awaken once more.', 2000, 0, 1, 'Dark Minimal Modern Girl Landscape Photo Book Cover.jpg', 'Dark Minimal Modern Girl Landscape Photo Book Cover.jpg'),
(30, 2, 22, 'Book eight', 'Their journey takes them deep into underground tunnels and forgotten catacombs, where they encounter relics of a bygone era and confront echoes of ancient powers. As they piece together clues left by the city\'s founders, Sofia must confront her own connection to the lost civilization and unravel the truth before dark forces awaken once more.', 900, 0, 1, 'White and Blue Modern Travel Photo Book Cover.jpg', 'White and Blue Modern Travel Photo Book Cover.jpg'),
(31, 2, 19, 'Book nine', 'Their journey takes them deep into underground tunnels and forgotten catacombs, where they encounter relics of a bygone era and confront echoes of ancient powers. As they piece together clues left by the city\'s founders, Sofia must confront her own connection to the lost civilization and unravel the truth before dark forces awaken once more.', 0, 450, 0, 'White Green Classic Elegant Romance Photo Book COver.jpg', 'White Green Classic Elegant Romance Photo Book COver.jpg'),
(32, 2, 17, 'Book ten', 'Their journey takes them deep into underground tunnels and forgotten catacombs, where they encounter relics of a bygone era and confront echoes of ancient powers. As they piece together clues left by the city\'s founders, Sofia must confront her own connection to the lost civilization and unravel the truth before dark forces awaken once more.', 0, 750, 0, 'Dark Blue Modern Noisy Sky Photo Novel Book Cover.jpg', 'Dark Blue Modern Noisy Sky Photo Novel Book Cover.jpg'),
(33, 1, 19, 'Book eleven', 'Their journey takes them deep into underground tunnels and forgotten catacombs, where they encounter relics of a bygone era and confront echoes of ancient powers. As they piece together clues left by the city\'s founders, Sofia must confront her own connection to the lost civilization and unravel the truth before dark forces awaken once more.', 2000, 466, 2, 'Pastel Minimal Trendy Photo Person on the Nature Book Cover.jpg', 'Pastel Minimal Trendy Photo Person on the Nature Book Cover.jpg'),
(34, 2, 19, 'Book twelve', 'Their journey takes them deep into underground tunnels and forgotten catacombs, where they encounter relics of a bygone era and confront echoes of ancient powers. As they piece together clues left by the city\'s founders, Sofia must confront her own connection to the lost civilization and unravel the truth before dark forces awaken once more.', 480, 200, 2, 'Blue White Elegant Classic Romance Book Cover.jpg', 'Blue White Elegant Classic Romance Book Cover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_des` varchar(300) NOT NULL,
  `complaint_date` varchar(150) NOT NULL,
  `complaint_reply` varchar(150) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_des`, `complaint_date`, `complaint_reply`, `complaint_status`, `user_id`, `book_id`) VALUES
(6, 'Quality', 'qwertyil;\r\n', 'curdate()', 'Ill look into it\r\n', 1, 14, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(8, 'Ernakulam'),
(9, 'Kottayam'),
(10, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_genre`
--

CREATE TABLE `tbl_genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_genre`
--

INSERT INTO `tbl_genre` (`genre_id`, `genre_name`) VALUES
(17, 'Mistery'),
(18, 'Sci-fi'),
(19, 'Drama'),
(20, 'Horror'),
(21, 'Romance'),
(22, 'Comedy'),
(23, 'Slice of life');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mygenre`
--

CREATE TABLE `tbl_mygenre` (
  `mygenre_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mygenre`
--

INSERT INTO `tbl_mygenre` (`mygenre_id`, `genre_id`, `user_id`) VALUES
(27, 23, 15),
(32, 18, 14),
(33, 19, 14),
(34, 20, 14),
(35, 21, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_title` varchar(50) NOT NULL,
  `package_des` varchar(50) NOT NULL,
  `package_amount` int(20) NOT NULL,
  `package_days` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_title`, `package_des`, `package_amount`, `package_days`) VALUES
(1, 'Sub', 'Des', 1000, 30),
(2, 'Sub 2', 'Des 2', 2000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `district_id` int(10) NOT NULL,
  `place_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `district_id`, `place_name`) VALUES
(6, 8, 'Kothamangalam'),
(8, 8, 'Fort-kochi'),
(9, 9, 'Pala'),
(11, 10, 'Thodupuzha'),
(12, 10, 'Moolamattam'),
(13, 9, 'Vaikom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rent`
--

CREATE TABLE `tbl_rent` (
  `rent_id` int(11) NOT NULL,
  `rent_date` varchar(150) NOT NULL,
  `rent_amount` int(11) NOT NULL,
  `rent_status` int(11) NOT NULL DEFAULT 0,
  `book_id` int(11) NOT NULL,
  `rent_return` int(11) NOT NULL DEFAULT 30,
  `user_id` int(11) NOT NULL,
  `rent_exp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rent`
--

INSERT INTO `tbl_rent` (`rent_id`, `rent_date`, `rent_amount`, `rent_status`, `book_id`, `rent_return`, `user_id`, `rent_exp`) VALUES
(11, '2024-07-16', 200, 1, 34, 30, 14, '2024-08-15'),
(12, '2024-07-23', 466, 1, 33, 30, 14, '2024-08-22'),
(13, '2024-07-23', 30, 1, 27, 30, 14, '2024-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_content` varchar(100) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_rating`, `review_content`, `review_datetime`, `book_id`, `user_id`) VALUES
(6, 5, 'As expected.great book for the price', '2024-07-04 21:18:21', 28, 14),
(7, 5, 'Great', '2024-07-04 23:21:14', 21, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_quan` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quan`, `book_id`) VALUES
(10, 6, 21),
(15, 4, 21),
(16, 3, 34),
(17, 0, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `sub_id` int(11) NOT NULL,
  `sub_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `author_id` int(11) NOT NULL DEFAULT 0,
  `package_id` int(11) NOT NULL,
  `sub_date` varchar(100) NOT NULL,
  `sub_exp` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`sub_id`, `sub_status`, `user_id`, `author_id`, `package_id`, `sub_date`, `sub_exp`) VALUES
(28, 1, 14, 0, 1, '2024-05-22', '2024-07-29'),
(30, 1, 0, 1, 1, '2024-05-23', '2024-06-22'),
(31, 1, 15, 0, 1, '2024-05-25', '2024-06-24'),
(32, 1, 0, 2, 1, '2024-07-01', '2024-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_contact` varchar(12) NOT NULL,
  `user_address` varchar(20) NOT NULL,
  `user_district` varchar(20) NOT NULL,
  `user_place` varchar(20) NOT NULL,
  `user_photo` varchar(150) NOT NULL,
  `user_proof` varchar(150) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_address`, `user_district`, `user_place`, `user_photo`, `user_proof`, `user_pass`, `user_flag`) VALUES
(14, 'Govind', 'user1@gmail.com', '222', 'HOME', '8', '6', 'e70fbe500f5550b520c93dfae4c71555.jpg', 'e70fbe500f5550b520c93dfae4c71555.jpg', '123', 1),
(15, 'User', 'user2@gmail.com', '12345', 'HOME', '8', '6', 'e70fbe500f5550b520c93dfae4c71555.jpg', '', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `wallet_id` int(11) NOT NULL,
  `wallet_date` varchar(30) NOT NULL,
  `wallet_credited` int(11) NOT NULL DEFAULT 0,
  `wallet_withdrawel` int(11) NOT NULL DEFAULT 0,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`wallet_id`, `wallet_date`, `wallet_credited`, `wallet_withdrawel`, `author_id`) VALUES
(1, '2024-07-16', 140, 0, 2),
(6, '2024-07-16', 0, 140, 2),
(7, '2024-07-23', 326, 0, 1),
(8, '2024-07-23', 21, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_genre`
--
ALTER TABLE `tbl_genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `tbl_mygenre`
--
ALTER TABLE `tbl_mygenre`
  ADD PRIMARY KEY (`mygenre_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_article`
--
ALTER TABLE `tbl_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_genre`
--
ALTER TABLE `tbl_genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_mygenre`
--
ALTER TABLE `tbl_mygenre`
  MODIFY `mygenre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
