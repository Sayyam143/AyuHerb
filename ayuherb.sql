-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 11:56 AM
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
-- Database: `ayuherb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Sayyam jain', 'Sayyam@gmail.com', '123'),
(2, 'aman', 'aman@gmail.com', '123'),
(3, 'shubham', 'shubham@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cake_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `s_weight` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `suggestion` varchar(1000) NOT NULL,
  `photo` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cake_id`, `user_id`, `price`, `total_price`, `s_weight`, `qty`, `suggestion`, `photo`, `status`) VALUES
(3, '2', '1', '600', '4000', '1', '4', 'Chandan', '', 'Completed'),
(4, '3', '1', '1000', '3000', '1', '3', 'fsdf', '', 'Completed'),
(5, '9', '2', '600', '600', '', '1', 'Ravi', '', 'Pending'),
(6, '8', '2', '500', '600', '6', '1', 'cj', '', 'Pending'),
(8, '5', '1', '1200', '1800', '1.5', '1', 'cj', '', 'Completed'),
(9, '9', '1', '600', '3600', '6', '1', 'd', '', 'Completed'),
(10, '13', '1', '1500', '3750', '2.5', '1', 'chandan', 'B_M_W-wallpaper-10261601 - Copy - Copy.jpg', 'Completed'),
(11, '9', '1', '600', '3600', '6', '1', 'chandan', '', 'Completed'),
(12, '8', '1', '500', '3000', '6', '1', 'cj', '', 'Completed'),
(18, '12', '1', '1000', '12000', '2', '6', 'd', '3.jpg', 'Completed'),
(20, '20', '1', '1200', '7200', '2', '3', '12', '', 'Completed'),
(21, '10', '1', '1000', '12000', '4', '3', 'cj', '', 'Completed'),
(22, '20', '1', '1200', '2400', '2', '1', 'v', '', 'Completed'),
(23, '28', '1', '600', '1200', '2', '1', 'cj', '', 'Completed'),
(24, '34', '1', '600', '1200', '2', '1', 'cj', '', 'Completed'),
(25, '20', '1', '1200', '2400', '2', '1', 'cj', '', 'Completed'),
(26, '9', '1', '600', '1200', '1', '2', 'rj', '', 'Completed'),
(28, '42', '1', '2300', '2300', '0.5', '2', 'test', '', 'Pending'),
(29, '27', '1', '550', '2200', '2', '2', 'test', '', 'Pending'),
(33, '2', '4', '600', '600', '1.0', '1', 'jnm', '', 'Completed'),
(34, '3', '4', '700', '140', '0.1', '2', 'mk', '', 'Completed'),
(37, '64', '5', '800', '800', '1.0', '1', 'aman buy', '', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category_name`, `class`) VALUES
(1, 'Natural Health Care', 'flaticon-029-cupcake-3'),
(2, 'Ayurvedic Medicine', 'flaticon-034-chocolate-roll'),
(3, 'Natural Personal Care', 'flaticon-005-pancake');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `order_id` int(11) NOT NULL,
  `cake_id` varchar(100) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `checkout_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`order_id`, `cake_id`, `cart_id`, `user_id`, `name`, `country`, `address`, `city`, `state`, `zip`, `contact_no`, `email`, `payment`, `payment_method`, `status`, `checkout_time`) VALUES
(21, '2,3', '33,34', '4', 'sayyam jain', 'india', 'surat 204', 'surat', 'Gujarat', '', '8965547569', 'sayyambhogar66@gmail.com', '740', 'cod', 'confirm', '2023-12-11 16:22:00'),
(22, '64', '37', '5', 'aman1 patel', 'india', 'surat gujrat', 'surat', 'Gujarati', '', '8965547569', 'aman1@gmail.com', '800', 'cod', 'confirm', '2023-12-12 10:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `chef_id` int(11) NOT NULL,
  `chef_name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`chef_id`, `chef_name`, `designation`, `image`) VALUES
(1, 'Sayyam Jain', 'Manager', '9685Photograph.jpg'),
(2, 'Shubham ', 'CEO', '3185CEO.jpg'),
(3, 'Aman', 'CTO', '1857profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `requirement` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `contact_no`, `class`, `requirement`) VALUES
(1, 'Chandan Bhalala', '9998012456', 'Writting Class', 'please made this king of cake');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `cake_id` int(11) NOT NULL,
  `c_id` varchar(100) NOT NULL,
  `s_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `flavour` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `mimage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`cake_id`, `c_id`, `s_id`, `name`, `price`, `description`, `weight`, `flavour`, `image`, `mimage`) VALUES
(2, '1', '1', 'Amul Ghee', '600', 'Pure Ghee', '1000', 'Cow', '8870pro_15520.jpg', '10000IMG_20200204_162234.jpg,9999IMG_20200204_155627.jpg'),
(3, '1', '1', 'Mother Dairy', '700', 'Made From Cow Milk', '1.0', 'Pure Test', '345861ZYYrmeHuL.jpg', '9999IMG_20200204_161209.jpg,9999IMG_20200204_161347.jpg,10000IMG_20200204_162134.jpg'),
(6, '1', '2', 'Dabur Honey', '350	', '100% Pure Honey', '100', 'Honey', '1793dabur.png', '9999download (5).jpg,9999images (16).jpg,10000images (17).jpg'),
(7, '1', '2', 'Bee Honey', '440', 'orange Blossom', '340 Gm', 'Honey', '6084bee.png', '9999product-2.jpg,9999product-3.jpg,10000product-4.jpg'),
(12, '1', '3', 'Moringa Powder', '950', 'Best for Healthy', '100', 'Pure Moringa Powder', '2659moringa.png', '10000download (2).jpg,10000download (4).jpg'),
(13, '1', '4', 'Himalaya Chyawanprash', '900', 'This Product containing a variety of Ayurvedic herbs.', '1000', 'Chyawanprash', '2586Chyavanaprasha1.png', '10000images (13).jpg,9999images (14).jpg'),
(15, '1', '4', 'Dabur Chyawanprash', '700', 'This Product contains a blend of herbs and Ayurvedic ingredients.', '1000', 'Chyawanprash', '3051Chyawanpras.png', '10000download.jpg'),
(17, '2', '5', 'Neem Oil', '550', 'Dabur Organic Neem Oil', '1000', 'Pure Oil', '4056Organic-Neem-Oil.png', '9999Organic-Neem-Oil.png'),
(18, '2', '6', 'Dabur Triphala Churna	', '1000', 'Best Churna', '1000', 'Pure Churna', '9159darbchurn.png', '10000darbchurn.png'),
(19, '2', '7', 'Patanjali Vati', '850', 'Arogya vati', '1000', '100% Pure Vati', '7975vatii.png', '10000vatii.png'),
(21, '3', '8', 'Best Ayurvedic Shampoos', '630', 'Pure Shampoos', '1000', 'Shampoos for hair', '4605shampo.png', '10000shampo.png'),
(23, '3', '9', 'Ayurvedic Face Wash', '500', 'Medimix Ayurvedic Face Wash for All Skin Types', '1', 'Pure Face Wash', '8030facewash.png', '9999facewash.png'),
(26, '3', '11', 'Ayurvedic Toothpase', '350', 'Vicoo Ayurvedic Toothpase', '100', 'Pure Test', '2601vico.png', '9999vico.png'),
(28, '3', '12', 'Chandan Ayurvedic Soap', '600', 'Nagarjuna Raktha Chandan Ayurvedic Soap', '1000', 'Chandan Soap', '8137soap.png', '9999soap.png'),
(30, '3', '35', 'mothers day special', '1550', 'with cream', '3.5', 'Vanilla', 'IMG_20200302_155354.jpg', '100001c6d854b1f94cc2ba3e204d45bfc674e.jpg,10000download.jpg,9999happy mothers day flower cake.jpg,10000images.jpg,9999IMG_20200302_155337.jpg,9999mothers-day-kitkat-chocolate-cake-500x500.png'),
(31, '3', '36', 'fathers day special	', '1000', 'with cream', '2.5', 'Vanilla', 'IMG_20200302_155622.jpg', '10000download (1).jpg,10000download.jpg,10000IMG_20200302_155448.jpg,9999download (2).jpg'),
(32, '4', '13', 'Black Forest	', '1200', 'with chocolate', '1', 'Black Forest', 'IMG_20200204_163435.jpg', '10000Blackforest-cake-1B-480x480.jpg,9999Blackforest-cake-2Kg-eggless-A.jpg,10000flakey-hearts-black-forest-cake-half-kg_1.jpg'),
(33, '4', '13', 'Black Forest	', '1100', 'with chocolate', '1.5', 'Black Forest	', 'IMG_20200204_154401.jpg', '1000035905_delicious-black-forest-cake.jpeg,9999Blackforest-cake-1B-480x480.jpg,9999Blackforest-cake-2Kg-eggless-A.jpg,9999flakey-hearts-black-forest-cake-half-kg_1.jpg'),
(34, '4', '14', 'Butter Scotch', '600', 'with chocolate layer', '1.5', 'ButterScotch', 'Indian-butterscotch-cake.jpg', '10000download.jpg,10000flakey-hearts-black-forest-cake-half-kg_1.jpg,9999Heart-shape-buttersco.jpg'),
(35, '4', '14', 'Butter Scotch', '1000', 'with fruit and chocolate layer', '5', 'ButterScotch', 'Butterscotch-Cake-2_2400x.jpg', '99991570003121IMG_2494-600x600.jpg,10000Blackforest-cake-2Kg-eggless-A.jpg,10000Butterscotch-Cake.jpg'),
(36, '4', '14', 'Butter Scotch', '800', 'with almond layer', '2.5', 'ButterScotch', '38844_affable-butterscotch-cake.jpeg', '999971DGmFpiaPL._SL1500_.jpg,10000download.jpg,10000Indian-butterscotch-cake.jpg'),
(37, '4', '15', 'Fruit Cake', '1000', 'with fruit', '3', 'Vanilla', '5733rich-fruit-cake-half-kg_1.jpg', '9999download.jpg,9999fruit-cake.jpg,10000images (1).jpg,10000images.jpg'),
(38, '4', '16', 'Chocolate Cake', '1500', 'With chocolate', '3', 'chocolate cake	', 'IMG_20200204_161616.jpg', '10000IMG_20200204_154420.jpg,10000IMG_20200204_162253.jpg,9999IMG_20200204_163435.jpg'),
(39, '4', '18', 'Red Velvet spacial', '1000', 'Jar Cake', '2', 'Red Velvet', 'IMG_20200204_160322.jpg', '10000IMG_20200204_154537.jpg,10000IMG_20200204_160055.jpg,9999IMG_20200204_162438.jpg'),
(40, '4', '18', 'Red Velvet with hart style', '1200', 'with heart style	', '2', 'sweet', 'IMG_20200204_163005.jpg', '10000IMG_20200204_155818.jpg,10000IMG_20200204_160322.jpg'),
(41, '4', '19', 'Coffee Special with Flower Style	', '2000', 'Coffee Special with Flower Style	 with liar', '2', 'coffee cakes', 'IMG_20200204_163435.jpg', '9999IMG_20200204_154654.jpg,10000IMG_20200204_155627.jpg,9999IMG_20200204_162253.jpg'),
(42, '4', '20', 'Jar cake', '2300', 'Strawberry with Vanilla', '0.5', 'Strawberry', 'IMG_20200302_155228.jpg', '10000IMG_20200204_160728.jpg,10000IMG_20200204_161937.jpg'),
(43, '4', '20', 'photo cake', '1200', 'Chota Bheem Cartoon', '2.5', 'Strawberry', '3568download.jpg', '10000Strawberry-Cake-1-720x720.jpg,1000038989_strawberry-photo-cake.jpeg'),
(44, '4', '20', 'Strawberry with Flower Style', '2400', 'with chocolate layer', '0.5', 'Strawberry', 'IMG_20200204_160640.jpg', '9999-delivery-cake-sunrise-bakery-.jpg,9999GAIHDMOT201912.jpg,10000images.jpg,9999Strawberry-Cake-1-720x720.jpg'),
(45, '4', '21', 'Cartoon Special', '1200', 'Venilla with Cartoon Style', '1', 'Vanilla', 'IMG_20200204_162505.jpg', '9999IMG_20200204_165516.jpg,9999IMG_20200302_155523.jpg,9999IMG_20200302_155649.jpg'),
(46, '4', '21', 'vanila', '1000', 'with simple chocolate layer', '0.5', 'Vanilla', 'IMG_20200204_162905.jpg', '9999images (3).jpg,10000IMG_20200204_161958.jpg,10000IMG_20200204_162438.jpg'),
(47, '5', '22', 'Princess Special	', '1250', 'Princess Theme', '3', 'Vanilla', '8464RoPrCa_47163-1.jpg', '9999IMG_20200204_163349.jpg,10000IMG_20200204_163417.jpg,9999IMG_20200204_165516.jpg'),
(48, '5', '22', 'Princess Cake	', '1400', 'With Princess theme	', '3', 'Butter Scotch With Vanilla', 'IMG_20200204_165516.jpg', '99995734-barbie-princess-cake.jpg,1000020210112015605_large_Cinderella-Cake.webp,10000RoPrCa_47163-1.jpg'),
(49, '5', '23', 'Mickey Mouse	', '500', 'with cream	', '2', 'chocolate cake	', 'IMG_20200204_165448.jpg', '10000IMG_20200204_164909.jpg,10000IMG_20200204_164945.jpg'),
(50, '5', '23', 'Mickey mouse special', '1500', 'Disney world theme', '2', 'Vanilla	', 'Minnie-Mouse-Cake.jpg', '999933976_mickey-mouse-blackforest-cake.jpeg,999933977_clever-mickey-mouse-cake.jpeg,10000154297541817-600x600.jpg'),
(51, '5', '24', 'Chota Bheem Cartoon Special', '700', 'With Chota Bheem cartoon style', '3', 'Vanilla	', '6203images.jpg', '10000images (25).jpg'),
(52, '5', '25', 'Animals style', '900', 'By theme is forest	', '3', 'Pineapple', 'IMG_20200204_160539.jpg', '9999images (25).jpg,9999IMG_20200204_161958.jpg,10000IMG_20200204_162037.jpg'),
(53, '5', '25', 'Rainbow style', '850', 'Animals with rainbow style', '1', 'mixed flavour', 'images.jpg', '100000026017_minnie_mouse_cartoon_cake_385_512x.jpeg,999933976_mickey-mouse-blackforest-cake.jpeg,9999fae49362fae43e69e3c7e8f142ef9cc9.jpg,10000images (1).jpg'),
(54, '5', '26', 'Car special', '400', 'for care race lover	', '1', 'Vanilla', 'mcqueen-car-cake-with-race-track-500x500.png', '99991f05662d261958cd018a1aea86163ba2.jpg,9999mcqueen-cars.jpg,10000red-car-poster-cake-them1049flav-A_0.jpg'),
(55, '5', '27', 'New barbie cake', '1200', 'new stock features', '1', 'Strawberry', '5734-barbie-princess-cake.jpg', '10000212-chocolatey-barbie-cake-3345-1-OCD4149-550x550.jpg,9999Barbie_Doll_Cake.jpg,9999barbie-doll-cream-cake-them1045flav-B_0.jpg,10000FGFCAKE182-pink-dress-barbie-cake-1000x1000.jpg,10000p-pretty-pink-barbie-fondant-cake-5-kg--112266-m.jpg'),
(56, '5', '28', 'Baby Shower Special', '450', 'with baby style	', '0.5', 'Vanilla', 'IMG_20200204_162840.jpg', '9999he-or-she-baby-shower-cake-500x500.jpg,10000IMG_20200204_155709.jpg,10000IMG_20200204_155752.jpg'),
(57, '5', '28', 'Baby Shower	', '250', 'with venila	', '0.5', 'Vanilla', 'PFBSWCAK04-booties-baby-shower-cake.jpg', '999941277_baby-shower-cake.jpeg,9999Baby-Shower-Cake.jpg,9999delicate-baby-shower-cake-9934150ca.jpg,9999download.jpg'),
(58, '5', '29', 'spider man special	', '350', 'with spider man style', '1', 'Vanilla', 'IMG_20200204_161855.jpg', '100004212.jpg,9999round-fondant-spiderman-cake-2kg-pineapple_1.jpg,10000spiderman-cake-1kg-500x500.png'),
(59, '5', '30', 'minion cake', '500', 'minion special	', '0.5', 'Vanilla	', 'IMG_20200204_164644.jpg', '100002e112d4cbe67b9aa6893d49909267395.jpg,99992-tier-minion-cake-3kg_1.jpg,9999cute-yellow-minion-cake-1-kg-500x500.png,10000FGFCAKE60-cute-minion-cake-1000x1000.jpg,9999p-adorable-minion-fondant-cake-5-kg--112822-m.jpg'),
(60, '5', '31', 'Tiger special', '450', 'with tiger theme', '1', 'Vanilla', 'IMG_20200204_164824.jpg', '10000download (1).jpg,10000download.jpg,10000images.jpg'),
(61, '5', '32', 'BossBaby Speicial', '1500', 'With Boss Baby Style', '2', 'Vanilla', '43761527949087-4.jpg', '100008fc5e5498be0b2c63abedebaa29000e5.jpg,9999boss_baby_cake_10.jpg,9999CakeToppercopy_6_650x.jpg'),
(62, '5', '33', 'Tom Special', '500', 'with venila', '1', 'Vanilla', 'IMG_20200204_163453.jpg', '10000FAM0195-tom-jerry-cake.jpg,10000unnamed.jpg'),
(63, '5', '17', 'Pineapple nutt', '1050', 'New Pineapple cake', '2', 'Pineapple', 'p-cherry-pineapple-cake-1-kg--4807-m.jpg', '10000images (1).jpg,9999images.jpg,9999p-classic-pineapple-cake-2-kg--6120-m.jpg,10000Pineapple-Cake-Five-Star-C.jpg'),
(64, '1', '1', 'Patanjali Ghee', '800', 'Patanjali Pure Cow Ghee ', '100', 'Cow', '3903patanjali.png', '3696'),
(65, '2', '5', 'Himalaya Ashwagandha', '450', 'Pure Ayurvedic Oil', '1000', 'Pure Oil', '4824ashwagandha.png', '6664');

-- --------------------------------------------------------

--
-- Table structure for table `review_by`
--

CREATE TABLE `review_by` (
  `review_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `review` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_by`
--

INSERT INTO `review_by` (`review_id`, `user_id`, `name`, `contact_no`, `review`, `rating`) VALUES
(3, '1', 'Chandan Bhalala', '9998012456', 'This is good experience ever..!', '5'),
(4, '2', 'Ravi Bhalala', '09033405609', 'Better experience forever', '4'),
(6, '3', 'Admin', '09033405609', 'This well-known app is all about the business of helping people find cakes.', '5'),
(7, '4', 'sayyam', '8965547569', 'This website provide Awesome Product of Ayuvedik', '5');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `s_id` int(11) NOT NULL,
  `c_id` varchar(100) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`s_id`, `c_id`, `subcategory_name`) VALUES
(1, '1', 'Ghee'),
(2, '1', 'Honey'),
(3, '1', 'Diet Food'),
(4, '1', 'Chyawanprash'),
(5, '2', 'Oil'),
(6, '2', 'Churna'),
(7, '2', 'vati'),
(8, '3', 'Shampoo'),
(9, '3', 'Facewash'),
(10, '3', 'Face Cream'),
(11, '3', 'Tooth Paste'),
(12, '3', 'Soap'),
(13, '4', 'Black Forest'),
(14, '4', 'Butter Scotch'),
(15, '4', 'Fruit Cakes'),
(16, '4', 'Chocolate Cake'),
(17, '5', 'Pineapple'),
(18, '4', 'Red Velvet'),
(19, '4', 'Coffee Cakes'),
(20, '4', 'Strawberry'),
(21, '4', 'Vanilla'),
(22, '5', 'Princess'),
(23, '5', 'Mickey Mouse'),
(24, '5', 'Chota Bheem'),
(25, '5', 'Cartoon'),
(26, '5', 'Car'),
(27, '5', 'Barbie'),
(28, '5', 'Baby Shower'),
(29, '5', 'Spider Man'),
(30, '5', 'Minion'),
(31, '5', 'Tiger'),
(32, '5', 'Boss Baby'),
(33, '5', 'Tom&Jerry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `item_number` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `payment_response` text NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `cake_id` varchar(100) NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `email`, `item_number`, `amount`, `currency_code`, `txn_id`, `payment_status`, `payment_response`, `order_id`, `user_id`, `cake_id`, `payment_time`) VALUES
(1, 'chandan.bhalala1@gmail.com', 'PHPPOTEG#1', '9000', 'inr', 'txn_1IJjmIFU60UGhrjaVumFEHhx', 'succeeded', '{\"id\":\"ch_1IJjmHFU60UGhrja4gzpEVjK\",\"object\":\"charge\",\"amount\":900000,\"amount_captured\":900000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1IJjmIFU60UGhrjaVumFEHhx\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1613067633,\"currency\":\"inr\",\"customer\":\"cus_IvayxtOhT6smgl\",\"description\":\"Test Product\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"PHPPOTEG#1\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":7,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1IJjmCFU60UGhrja0ZjL9YOs\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https://pay.stripe.com/receipts/acct_1H9AmZFU60UGhrja/ch_1IJjmHFU60UGhrja4gzpEVjK/rcpt_IvayF8VqvoA7iqp5iBRG56wBva0xEir\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"/v1/charges/ch_1IJjmHFU60UGhrja4gzpEVjK/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1IJjmCFU60UGhrja0ZjL9YOs\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_IvayxtOhT6smgl\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '6', '1', '', '2021-02-11 18:20:35'),
(2, 'chandan.bhalala1@gmail.com', 'PHPPOTEG#1', '1800', 'inr', 'txn_1IJjqeFU60UGhrjauDMYtPSb', 'succeeded', '{\"id\":\"ch_1IJjqeFU60UGhrjaeJXqkuAA\",\"object\":\"charge\",\"amount\":180000,\"amount_captured\":180000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1IJjqeFU60UGhrjauDMYtPSb\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1613067904,\"currency\":\"inr\",\"customer\":\"cus_Ivb2nVLCiNFyWg\",\"description\":\"Test Product\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"PHPPOTEG#1\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":14,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1IJjqcFU60UGhrjahLU8XDTL\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https://pay.stripe.com/receipts/acct_1H9AmZFU60UGhrja/ch_1IJjqeFU60UGhrjaeJXqkuAA/rcpt_Ivb2SHaJkAcuqJMUjwTg2hbPffWY3MV\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"/v1/charges/ch_1IJjqeFU60UGhrjaeJXqkuAA/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1IJjqcFU60UGhrjahLU8XDTL\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_Ivb2nVLCiNFyWg\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '7', '1', '', '2021-02-11 18:25:04'),
(3, 'chandan.bhalala1@gmail.com', 'PHPPOTEG#1', '3600', 'inr', 'txn_1IJjs0FU60UGhrjahwoUKnvC', 'succeeded', '{\"id\":\"ch_1IJjs0FU60UGhrja147ET4Hu\",\"object\":\"charge\",\"amount\":360000,\"amount_captured\":360000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1IJjs0FU60UGhrjahwoUKnvC\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1613067988,\"currency\":\"inr\",\"customer\":\"cus_Ivb4d0XGAraVML\",\"description\":\"Test Product\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"PHPPOTEG#1\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":34,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1IJjryFU60UGhrjaVUptLGP8\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https://pay.stripe.com/receipts/acct_1H9AmZFU60UGhrja/ch_1IJjs0FU60UGhrja147ET4Hu/rcpt_Ivb4LJLAK29oPzTXdQ2ksJnOwyRLazA\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"/v1/charges/ch_1IJjs0FU60UGhrja147ET4Hu/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1IJjryFU60UGhrjaVUptLGP8\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_Ivb4d0XGAraVML\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '8', '1', '9', '2021-02-11 18:26:28'),
(4, 'chandan.bhalala1@gmail.com', 'PHPPOTEG#1', '7350', 'inr', 'txn_1IJk5KFU60UGhrjaJs8hIB4i', 'succeeded', '{\"id\":\"ch_1IJk5JFU60UGhrjawviSVhY4\",\"object\":\"charge\",\"amount\":735000,\"amount_captured\":735000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1IJk5KFU60UGhrjaJs8hIB4i\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1613068813,\"currency\":\"inr\",\"customer\":\"cus_IvbHrSJiOLNMlO\",\"description\":\"Test Product\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"PHPPOTEG#1\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":21,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1IJk5HFU60UGhrjaHdRbYqCa\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https://pay.stripe.com/receipts/acct_1H9AmZFU60UGhrja/ch_1IJk5JFU60UGhrjawviSVhY4/rcpt_IvbHQielbyPvMFzOqfFtG480X93pcOU\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"/v1/charges/ch_1IJk5JFU60UGhrjawviSVhY4/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1IJk5HFU60UGhrjaHdRbYqCa\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_IvbHrSJiOLNMlO\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '9', '1', '13,9', '2021-02-11 18:40:14'),
(5, 'chandan.bhalala1@gmail.com', 'PHPPOTEG#1', '3000', 'inr', 'txn_1IJse6FU60UGhrjac7qFG5Zx', 'succeeded', '{\"id\":\"ch_1IJse5FU60UGhrjayWOAs9CY\",\"object\":\"charge\",\"amount\":300000,\"amount_captured\":300000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1IJse6FU60UGhrjac7qFG5Zx\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1613101721,\"currency\":\"inr\",\"customer\":\"cus_Ivk8kovkNu3R5f\",\"description\":\"Test Product\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"PHPPOTEG#1\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":33,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1IJse0FU60UGhrjaakfiY58P\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https://pay.stripe.com/receipts/acct_1H9AmZFU60UGhrja/ch_1IJse5FU60UGhrjayWOAs9CY/rcpt_Ivk8ks0JcG2bSm5krBW5V1LSpmNxnhX\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"/v1/charges/ch_1IJse5FU60UGhrjayWOAs9CY/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1IJse0FU60UGhrjaakfiY58P\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_Ivk8kovkNu3R5f\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '10', '1', '8', '2021-02-12 00:43:52'),
(6, 'chandan.bhalala1@gmail.com', 'PHPPOTEG#1', '31200', 'inr', 'txn_1IK0k5FU60UGhrjaKazQ11Yg', 'succeeded', '{\"id\":\"ch_1IK0k4FU60UGhrjasIzKZIrz\",\"object\":\"charge\",\"amount\":3120000,\"amount_captured\":3120000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1IK0k5FU60UGhrjaKazQ11Yg\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1613132844,\"currency\":\"inr\",\"customer\":\"cus_IvsVEzhq544pzD\",\"description\":\"Test Product\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"PHPPOTEG#1\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":8,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1IK0jyFU60UGhrja0bqBEDYe\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https://pay.stripe.com/receipts/acct_1H9AmZFU60UGhrja/ch_1IK0k4FU60UGhrjasIzKZIrz/rcpt_IvsV4QmRbLHUdKXaSm5geOxmp6igx3Z\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"/v1/charges/ch_1IK0k4FU60UGhrjasIzKZIrz/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1IK0jyFU60UGhrja0bqBEDYe\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_IvsVEzhq544pzD\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '11', '1', '12,20,10', '2021-02-12 09:22:35'),
(7, 'chandan.bhalala1@gmail.com', 'PHPPOTEG#1', '31200', 'inr', 'txn_1IK0lqFU60UGhrja5QvrwYlY', 'succeeded', '{\"id\":\"ch_1IK0lpFU60UGhrja0c0k83CP\",\"object\":\"charge\",\"amount\":3120000,\"amount_captured\":3120000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1IK0lqFU60UGhrja5QvrwYlY\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1613132953,\"currency\":\"inr\",\"customer\":\"cus_IvsWaOT95IrA6z\",\"description\":\"Test Product\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"PHPPOTEG#1\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":61,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1IK0loFU60UGhrjaSvRRw9Js\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https://pay.stripe.com/receipts/acct_1H9AmZFU60UGhrja/ch_1IK0lpFU60UGhrja0c0k83CP/rcpt_IvsWOl2L8aD6uBr2iN0rtGLuLh8Pl8k\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"/v1/charges/ch_1IK0lpFU60UGhrja0c0k83CP/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1IK0loFU60UGhrjaSvRRw9Js\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_IvsWaOT95IrA6z\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '11', '1', '12,20,10', '2021-02-12 09:24:24'),
(8, 'chandan.bhalala1@gmail.com', 'PHPPOTEG#1', '31200', 'inr', 'txn_1IK0nCFU60UGhrjajDmPvhax', 'succeeded', '{\"id\":\"ch_1IK0nBFU60UGhrjaViRK8Xug\",\"object\":\"charge\",\"amount\":3120000,\"amount_captured\":3120000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1IK0nCFU60UGhrjajDmPvhax\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1613133037,\"currency\":\"inr\",\"customer\":\"cus_IvsYqfIERZlcBD\",\"description\":\"Test Product\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"PHPPOTEG#1\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":40,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1IK0nAFU60UGhrjaEP7YOwZJ\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https://pay.stripe.com/receipts/acct_1H9AmZFU60UGhrja/ch_1IK0nBFU60UGhrjaViRK8Xug/rcpt_IvsYKwF9l1TVqehwi7b0LXyaUAjCqOE\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"/v1/charges/ch_1IK0nBFU60UGhrjaViRK8Xug/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1IK0nAFU60UGhrjaEP7YOwZJ\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_IvsYqfIERZlcBD\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2022,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '11', '1', '12,20,10', '2021-02-12 09:25:48'),
(9, 'chandan.bhalala1@gmail.com', 'PHPPOTEG#1', '2400', 'inr', 'txn_1IK0nyFU60UGhrjarXApGcoA', 'succeeded', '{\"id\":\"ch_1IK0nyFU60UGhrjakIIgIGue\",\"object\":\"charge\",\"amount\":240000,\"amount_captured\":240000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1IK0nyFU60UGhrjarXApGcoA\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1613133086,\"currency\":\"inr\",\"customer\":\"cus_IvsZxkT8R4pHYg\",\"description\":\"Test Product\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"PHPPOTEG#1\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":11,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1IK0nwFU60UGhrjaEKKSkIJM\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":2,\"exp_year\":2023,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https://pay.stripe.com/receipts/acct_1H9AmZFU60UGhrja/ch_1IK0nyFU60UGhrjakIIgIGue/rcpt_IvsZEeKX0wLHuWesTgrm29HUsLYHOiR\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"/v1/charges/ch_1IK0nyFU60UGhrjakIIgIGue/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1IK0nwFU60UGhrjaEKKSkIJM\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_IvsZxkT8R4pHYg\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2023,\"fingerprint\":\"cwtVwpbHRqGK1V8z\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '12', '1', '20', '2021-02-12 09:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `contact_no`) VALUES
(1, 'Chandan Bhalala', 'chandan.bhalala1@gmail.com', '123', '9998012456'),
(2, 'Ravi Bhalala', 'ravi.bhalala1@gmail.com', '123', '09033405609'),
(3, 'Admin', 'admin@gmail.com', '123', '09033405609'),
(4, 'sayyam', 'Sayyam@gmail.com', '123', '8965547569'),
(5, 'aman1', 'aman1@gmail.com', '12345', '8966584456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`chef_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`cake_id`);

--
-- Indexes for table `review_by`
--
ALTER TABLE `review_by`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `chef_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `cake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `review_by`
--
ALTER TABLE `review_by`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
