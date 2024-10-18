-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 07:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_amount`, `booking_status`, `booking_qty`, `book_id`, `user_id`) VALUES
(37, '2024-08-17', 2000, 5, 1, 1, 14);

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
  `book_cover` varchar(200) NOT NULL,
  `book_isbn` bigint(20) DEFAULT NULL,
  `book_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`book_id`, `book_author`, `book_genre`, `book_name`, `book_des`, `book_sell`, `book_rent`, `book_type`, `book_file`, `book_cover`, `book_isbn`, `book_cat`) VALUES
(1, 1, 1, 'DragonBall', 'Dragon Ball is a popular Japanese media franchise created by Akira Toriyama. It began as a manga series serialized in Weekly Shōnen Jump from 1984 to 1995 and later adapted into several anime series, movies, and video games. The story follows the adventures of Goku, a Saiyan warrior with superhuman abilities, as he trains in martial arts and searches for the Dragon Balls—magical orbs that summon a wish-granting dragon when gathered. The series is known for its epic battles, iconic characters like Vegeta and Piccolo, and the concept of \"power levels\" and transformations like Super Saiyan. Dragon Ball has had a significant impact on global pop culture and remains one of the most influential anime and manga series of all time.', 2000, 300, 2, 'wp11656026-manga-covers-wallpapers.jpg', 'wp11656026-manga-covers-wallpapers.jpg', 1, 1),
(2, 1, 1, 'Jujutsu Kaisen', 'Jujutsu Kaisen is a popular Japanese anime and manga series created by Gege Akutami. The story follows Yuji Itadori, a high school student who becomes involved in the world of jujutsu sorcerers after consuming a powerful cursed object, the finger of the cursed spirit Sukuna. To prevent Sukuna from fully resurrecting and wreaking havoc, Yuji joins the Tokyo Jujutsu High school, where he learns to fight curses—malevolent spirits that are born from human negativity. The series blends dark fantasy, action, and horror, with a strong emphasis on complex characters, intense battles, and moral dilemmas.', 0, 400, 0, 'wp11656024-manga-covers-wallpapers.jpg', 'wp11656024-manga-covers-wallpapers.jpg', 2, 1),
(3, 1, 1, 'Demon Slayer Kimetsu no Yaiba', 'Demon Slayer: Kimetsu no Yaiba is a Japanese anime and manga series created by Koyoharu Gotouge. The story follows Tanjiro Kamado, a kind-hearted boy who becomes a demon slayer after his family is slaughtered by demons and his younger sister, Nezuko, is turned into one. Set in Taisho-era Japan, the series is known for its stunning animation, intense battles, and deep emotional themes, exploring the bonds of family, the struggle between good and evil, and the human will to survive. The series has gained widespread popularity for its unique art style, compelling characters, and gripping storyline.', 1600, 300, 2, 'wp11656034-manga-covers-wallpapers.jpg', 'wp11656034-manga-covers-wallpapers.jpg', 3, 1),
(4, 1, 12, 'It Ends With Us', '\"It Ends with Us\" is a novel by Colleen Hoover that explores the complexities of love, relationships, and the cycle of abuse. The story follows Lily Bloom, a young woman who falls in love with a charming neurosurgeon, Ryle Kincaid. As their relationship deepens, dark secrets from Ryle\'s past emerge, forcing Lily to confront difficult choices about love, family, and self-preservation. The novel is both heart-wrenching and empowering, offering a poignant look at the strength it takes to break free from toxic patterns.', 0, 300, 0, 'It Ends with Us_ A Novel (Volume 1).jpg', 'It Ends with Us_ A Novel (Volume 1).jpg', 4, 6),
(6, 1, 15, 'In Your Eyes', 'In a bustling city where technology reigns supreme, a brilliant but reclusive inventor stumbles upon a groundbreaking discovery: a device that can manipulate time. As he experiments with his creation, he realizes that altering the past comes with unforeseen consequences. Each small change ripples through time, creating an increasingly chaotic present. When a powerful organization learns of his invention, they’ll stop at nothing to control it, forcing the inventor into a high-stakes game of cat and mouse. As the lines between past, present, and future blur, he must decide whether to risk everything to fix his mistakes or let the world spiral into a new and unpredictable reality. This is a thrilling journey through time, where every choice has the potential to rewrite history.', 0, 0, 3, 'WhatsApp Image 2024-08-17 at 12.44.43 AM.jpeg', 'WhatsApp Image 2024-08-17 at 12.44.43 AM.jpeg', 6, 6),
(7, 2, 8, 'Tough Luck', 'In a bustling city where technology reigns supreme, a brilliant but reclusive inventor stumbles upon a groundbreaking discovery: a device that can manipulate time. As he experiments with his creation, he realizes that altering the past comes with unforeseen consequences. Each small change ripples through time, creating an increasingly chaotic present. When a powerful organization learns of his invention, they’ll stop at nothing to control it, forcing the inventor into a high-stakes game of cat and mouse. As the lines between past, present, and future blur, he must decide whether to risk everything to fix his mistakes or let the world spiral into a new and unpredictable reality. This is a thrilling journey through time, where every choice has the potential to rewrite history.', 1000, 200, 2, 'Dark Blue Modern Noisy Sky Photo Novel Book Cover.jpg', 'Dark Blue Modern Noisy Sky Photo Novel Book Cover.jpg', 7, 5),
(8, 2, 3, 'Talking Heads', 'In a bustling city where technology reigns supreme, a brilliant but reclusive inventor stumbles upon a groundbreaking discovery: a device that can manipulate time. As he experiments with his creation, he realizes that altering the past comes with unforeseen consequences. Each small change ripples through time, creating an increasingly chaotic present. When a powerful organization learns of his invention, they’ll stop at nothing to control it, forcing the inventor into a high-stakes game of cat and mouse. As the lines between past, present, and future blur, he must decide whether to risk everything to fix his mistakes or let the world spiral into a new and unpredictable reality. This is a thrilling journey through time, where every choice has the potential to rewrite history.', 2000, 0, 1, 'Brown Minimal Vintage Talking Heads Photo Textile Book Cover.jpg', 'Brown Minimal Vintage Talking Heads Photo Textile Book Cover.jpg', 8, 7),
(9, 2, 5, 'The Village', 'In a bustling city where technology reigns supreme, a brilliant but reclusive inventor stumbles upon a groundbreaking discovery: a device that can manipulate time. As he experiments with his creation, he realizes that altering the past comes with unforeseen consequences. Each small change ripples through time, creating an increasingly chaotic present. When a powerful organization learns of his invention, they’ll stop at nothing to control it, forcing the inventor into a high-stakes game of cat and mouse. As the lines between past, present, and future blur, he must decide whether to risk everything to fix his mistakes or let the world spiral into a new and unpredictable reality. This is a thrilling journey through time, where every choice has the potential to rewrite history.', 0, 20, 0, 'Dark Minimal Modern Village Photo Field Book Cover.jpg', 'Dark Minimal Modern Village Photo Field Book Cover.jpg', 9, 1),
(10, 2, 14, 'The Invisible Man', 'In a bustling city where technology reigns supreme, a brilliant but reclusive inventor stumbles upon a groundbreaking discovery: a device that can manipulate time. As he experiments with his creation, he realizes that altering the past comes with unforeseen consequences. Each small change ripples through time, creating an increasingly chaotic present. When a powerful organization learns of his invention, they’ll stop at nothing to control it, forcing the inventor into a high-stakes game of cat and mouse. As the lines between past, present, and future blur, he must decide whether to risk everything to fix his mistakes or let the world spiral into a new and unpredictable reality. This is a thrilling journey through time, where every choice has the potential to rewrite history.', 2000, 100, 2, 'WhatsApp Image 2024-08-17 at 12.44.42 AM.jpeg', 'WhatsApp Image 2024-08-17 at 12.44.42 AM.jpeg', 10, 6),
(11, 2, 11, 'The Sound Of Silence', 'In a bustling city where technology reigns supreme, a brilliant but reclusive inventor stumbles upon a groundbreaking discovery: a device that can manipulate time. As he experiments with his creation, he realizes that altering the past comes with unforeseen consequences. Each small change ripples through time, creating an increasingly chaotic present. When a powerful organization learns of his invention, they’ll stop at nothing to control it, forcing the inventor into a high-stakes game of cat and mouse. As the lines between past, present, and future blur, he must decide whether to risk everything to fix his mistakes or let the world spiral into a new and unpredictable reality. This is a thrilling journey through time, where every choice has the potential to rewrite history.', 0, 0, 3, 'WhatsApp Image 2024-08-17 at 12.44.43 AM (1).jpeg', 'WhatsApp Image 2024-08-17 at 12.44.43 AM (1).jpeg', 11, 4),
(12, 2, 2, 'The Bird', 'In a bustling city where technology reigns supreme, a brilliant but reclusive inventor stumbles upon a groundbreaking discovery: a device that can manipulate time. As he experiments with his creation, he realizes that altering the past comes with unforeseen consequences. Each small change ripples through time, creating an increasingly chaotic present. When a powerful organization learns of his invention, they’ll stop at nothing to control it, forcing the inventor into a high-stakes game of cat and mouse. As the lines between past, present, and future blur, he must decide whether to risk everything to fix his mistakes or let the world spiral into a new and unpredictable reality. This is a thrilling journey through time, where every choice has the potential to rewrite history.', 0, 0, 3, 'Dark Minimal Modern Girl Landscape Photo Book Cover.jpg', 'Dark Minimal Modern Girl Landscape Photo Book Cover.jpg', 12, 7),
(13, 1, 10, 'Sky', 'In a bustling city where technology reigns supreme, a brilliant but reclusive inventor stumbles upon a groundbreaking discovery: a device that can manipulate time. As he experiments with his creation, he realizes that altering the past comes with unforeseen consequences. Each small change ripples through time, creating an increasingly chaotic present. When a powerful organization learns of his invention, they’ll stop at nothing to control it, forcing the inventor into a high-stakes game of cat and mouse. As the lines between past, present, and future blur, he must decide whether to risk everything to fix his mistakes or let the world spiral into a new and unpredictable reality. This is a thrilling journey through time, where every choice has the potential to rewrite history.', 1000, 200, 2, 'WhatsApp Image 2024-08-17 at 12.44.44 AM.jpeg', 'WhatsApp Image 2024-08-17 at 12.44.44 AM.jpeg', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'Manga'),
(2, 'Childrens Literature'),
(3, 'Cookbooks'),
(4, 'Travel'),
(5, 'Drama'),
(6, 'Fiction'),
(7, 'Nonfiction');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `genre_name` varchar(50) NOT NULL,
  `genre_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_genre`
--

INSERT INTO `tbl_genre` (`genre_id`, `genre_name`, `genre_cat`) VALUES
(1, 'Action', 1),
(2, 'Biography', 7),
(3, 'Autobiography', 7),
(5, 'Slice of life', 1),
(6, 'Romance', 1),
(7, 'Mystery', 1),
(8, 'Comedy', 5),
(9, 'Comedy', 1),
(10, 'Picture book', 2),
(11, 'Exploration', 4),
(12, 'Romance', 6),
(13, 'Fantasy', 6),
(14, 'Thriller', 6),
(15, 'Mystery', 6),
(16, 'Horror', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mygenre`
--

CREATE TABLE `tbl_mygenre` (
  `mygenre_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rent`
--

INSERT INTO `tbl_rent` (`rent_id`, `rent_date`, `rent_amount`, `rent_status`, `book_id`, `rent_return`, `user_id`, `rent_exp`) VALUES
(1, '2024-08-17', 300, 1, 4, 30, 14, '2024-09-16'),
(2, '2024-08-17', 0, 1, 11, 30, 14, ''),
(3, '2024-08-17', 400, 1, 2, 30, 14, '2024-09-16');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_rating`, `review_content`, `review_datetime`, `book_id`, `user_id`) VALUES
(6, 5, 'As expected.great book for the price', '2024-07-04 21:18:21', 1, 14),
(7, 5, 'Great', '2024-07-04 23:21:14', 2, 14),
(8, 5, 'Great book. Happy to get this for free', '2024-08-16 23:20:27', 3, 14),
(9, 5, 'Damn.......', '2024-08-17 11:06:48', 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_quan` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quan`, `book_id`) VALUES
(1, 10, 7),
(2, 10, 8),
(3, 10, 9),
(4, 9, 10),
(5, 18, 11),
(6, 8, 12),
(7, 20, 1),
(8, 20, 2),
(9, 15, 3),
(10, 10, 4),
(11, 10, 6),
(12, 0, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`sub_id`, `sub_status`, `user_id`, `author_id`, `package_id`, `sub_date`, `sub_exp`) VALUES
(28, 1, 14, 0, 1, '2024-05-22', '2024-07-29'),
(30, 1, 0, 1, 1, '2024-05-23', '2024-06-22'),
(31, 1, 15, 0, 1, '2024-05-25', '2024-06-24'),
(32, 1, 0, 2, 1, '2024-07-01', '2024-07-31'),
(33, 1, 17, 0, 1, '2024-08-13', '2024-09-12');

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
  `user_pass` varchar(50) NOT NULL,
  `user_flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_address`, `user_district`, `user_place`, `user_photo`, `user_proof`, `user_pass`, `user_flag`) VALUES
(14, 'Govind', 'user1@gmail.com', '222', 'HOME', '8', '6', 'e70fbe500f5550b520c93dfae4c71555.jpg', 'e70fbe500f5550b520c93dfae4c71555.jpg', '123', 1),
(15, 'User', 'user2@gmail.com', '12345', 'HOME', '8', '6', 'e70fbe500f5550b520c93dfae4c71555.jpg', '', '123', 1),
(17, 'Kohai', 'kohai333@gamil.com', '9947360394', 'Home is where i live', '8', '6', 'e70fbe500f5550b520c93dfae4c71555.jpg', 'squids-z-Kys8KWkDfcI.jpg', 'Kohai1234567', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`wallet_id`, `wallet_date`, `wallet_credited`, `wallet_withdrawel`, `author_id`) VALUES
(1, '2024-07-16', 140, 0, 2),
(6, '2024-07-16', 0, 140, 2),
(7, '2024-07-23', 326, 0, 1),
(8, '2024-07-23', 21, 0, 1),
(9, '2024-08-17', 1400, 0, 1),
(10, '2024-08-17', 210, 0, 1),
(11, '2024-08-17', 280, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `book_id`, `user_id`) VALUES
(41, 3, 14),
(42, 7, 14);

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
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_mygenre`
--
ALTER TABLE `tbl_mygenre`
  MODIFY `mygenre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
