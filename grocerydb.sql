-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 08:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adm_id` int(10) NOT NULL,
  `adm_name` varchar(30) NOT NULL,
  `adm_email` varchar(50) NOT NULL,
  `adm_pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adm_id`, `adm_name`, `adm_email`, `adm_pwd`) VALUES
(1, 'kaif', 'a.kaif8469@gmail.com', '8469'),
(3, 'soni akash', 'soni@gmail.com', '8320');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `total_price` int(20) NOT NULL,
  `total_qty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'Oil & Ghee'),
(2, 'Snacks & Beverages'),
(3, 'Kitchen & Household'),
(4, 'Grains, Masalas & Spices'),
(5, 'Dry Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(10) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_subject` varchar(50) NOT NULL,
  `contact_msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_msg`) VALUES
(1, 'MOHAMMAD WASIM S ANSARI', 'wasim@gmail.com', 'complain', 'kkk'),
(2, 'kaif ansari', 'a.kaif8469@gmail.com', 'complain', 'kxwnsxkw');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feed_id` int(10) NOT NULL,
  `feed_date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `feed_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feed_id`, `feed_date`, `user_id`, `feed_details`) VALUES
(1, '2022-12-29', 2, 'nice product');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `order_total` int(11) NOT NULL DEFAULT 0,
  `shipping_name` varchar(200) DEFAULT NULL,
  `shipping_mobile_no` bigint(20) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `payment_method` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_date`, `user_id`, `order_status`, `order_total`, `shipping_name`, `shipping_mobile_no`, `shipping_address`, `payment_method`) VALUES
(1, '2023-03-10', 19, 'Cancelled', 3600, 'Prince Shah', 9909901212, 'jp', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetails`
--

CREATE TABLE `tbl_orderdetails` (
  `orderdetails_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `pro_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orderdetails`
--

INSERT INTO `tbl_orderdetails` (`orderdetails_id`, `order_id`, `price`, `qty`, `pro_id`) VALUES
(1, 1, 600, 1, 12),
(2, 1, 1000, 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `paym_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `paym_details` varchar(50) NOT NULL,
  `order_id` int(10) NOT NULL,
  `paym_method` varchar(30) NOT NULL,
  `pro_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`paym_id`, `user_id`, `paym_details`, `order_id`, `paym_method`, `pro_id`) VALUES
(1, 6, 'clear', 5, 'credit card', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_price` int(20) NOT NULL,
  `pro_details` varchar(50) NOT NULL,
  `pro_image` varchar(50) NOT NULL,
  `subcat_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_name`, `pro_price`, `pro_details`, `pro_image`, `subcat_id`) VALUES
(1, 'GRB Ghee', 350, 'Desi Ghee with high quality', 'grb.jfif', 1),
(3, 'Kelapo Ghee', 400, 'fresh desi cow ghee', 'kelapo.jfif', 1),
(4, 'Jersey Ghee', 250, 'American  Pure Ghee  ', 'jersey.jfif', 1),
(5, 'Amul Ghee', 300, 'Amul india desi ghee ', 'amul.jfif', 1),
(6, 'Govind Ghee', 500, 'Fresh and reliable desi ghee', 'govind.jfif', 1),
(7, 'Sunflower Oil', 1200, 'High quality refines oil 10 kg  ', 'sunflower oil.jfif', 2),
(8, 'Dalda Oil', 1000, 'Best Cooking oil with high quality 10 kg', 'dalda.jfif', 2),
(9, 'Seasons Oil', 800, 'Refined oil highly fibers oil 5 kg', 'seasons.jfif', 2),
(10, 'Greenlove Oil', 1500, 'Country best cooking oil', 'greenlove.jfif', 2),
(11, 'Sunfoil Oil', 400, 'Fresh and refined oil', 'sunfoil.jfif', 2),
(12, 'Baja precious Oil', 600, 'Rice bran oil best quality oil', 'baja precious.jfif', 3),
(13, 'Harvest Oil', 1000, 'Best rice bran oil refined with fibres of oil ', 'harvest.jfif', 3),
(14, 'Ricefield Oil', 1500, 'This is a best quality oil provides us and best oi', 'rice field.jfif', 3),
(15, 'IMC Oil', 1300, 'Rice bran oil highly refined ', 'imc.jfif', 3),
(16, 'Alfa One Oil', 450, 'Alfa one is best rice bran oil in country ', 'alfa one.jfif', 3),
(17, 'Mantra Oil', 550, 'Best groundnut oil ', 'mantra.jfif', 4),
(18, 'King Oil', 650, 'India best groundnut refined oil', 'king.jfif', 4),
(19, 'Arya Oil', 320, 'Best groundnut oil quality and fresh ', 'arya.jfif', 4),
(20, 'Freedom Oil', 560, 'Groundnut oil is best for cooking', 'freedom.jfif', 4),
(21, 'Tez Oil', 320, 'Tez is best mustard oil in all over market', 'tez.jfif', 5),
(22, 'Fortune Oil', 560, 'It is a best mustard oil ang high quality oil', 'fortune.jfif', 5),
(23, 'Dabur Oil', 650, 'Best Cooking mustard Oil  ', 'dabur.jfif', 5),
(24, 'Olive Oil', 1110, 'It is best olive oil ', 'olive.jfif', 6),
(25, 'Swanson Oil', 400, 'It is best pumpkin oil', 'swanson pumpkin oil.jfif', 6),
(26, 'Red Label', 260, 'Best quality tea is making with great flavour', 'red label.jfif', 7),
(27, 'Forest Tea', 530, 'Its best quality tea', 'forest tea.jfif', 7),
(28, 'Bagh Bakri', 320, 'India best tea ', 'wagh bakri.jfif', 7),
(29, 'Classic Tea', 120, 'High quality tea maker', 'classic.jfif', 7),
(30, 'Twining', 460, 'World most used tea product', 'tiwining.jfif', 7),
(31, 'Logo cafe', 150, 'Fresh coffee with best taste', 'logo cafe.jfif', 8),
(32, 'Peets Coffee', 330, 'Best quality coffee ', 'peets coffee.jfif', 8),
(33, 'Double Joy Select Coffee', 520, 'Highly fresh coffee powder instant coffee make.', 'double joy select coffee.jfif', 8),
(34, 'Startbucks', 450, 'Starbucks coffee with better taste', 'starbucks.jfif', 8),
(35, 'Nescafe', 340, 'Best coffee for instant making coffee just mix wit', 'nescafe.jfif', 8),
(36, 'Red Bull', 100, 'Best Refresher soft drink ', 'red bull.jfif', 9),
(37, 'Coco Cola', 70, 'It is best quality taste of soft drink', 'coco cola.jfif', 9),
(38, 'Pepsi', 80, 'Best taste of pepsi soft drink', 'pepsi.jfif', 9),
(39, 'Sprite', 50, 'Sprite soft drink with lemon flavour', 'sprite.jfif', 9),
(40, 'Mirinda', 65, 'Its best soft drink with orange mix flavour', 'mirinda.jfif', 9),
(41, 'Thumps Up', 90, 'Thumps up is best quality taste soft drink with ca', 'thums up.jfif', 9),
(42, 'Bour Bon ', 30, 'It is best taste cookies', 'bour bon.jfif', 10),
(43, 'Tasties', 50, 'Sweeter biscuits', 'tasties.jfif', 10),
(44, 'Snack Biscuits', 55, 'Better taste biscuit with ingredient', 'snack biscuit.jfif', 10),
(45, 'Butter Bite', 100, 'Best butter flavour cookies ', 'butter bite.jfif', 10),
(46, 'Orea', 50, 'Chocolate and milk biscuits', 'oreo.jfif', 10),
(47, 'Marie Gold', 60, 'Best biscuit with tea ', 'marie.jfif', 10),
(48, 'Good Day', 120, 'Best Quality with ingredients of almonds and cashe', 'good day.jfif', 10),
(49, 'Five Star', 20, 'Five start soft chocolate,', 'five star.jfif', 11),
(50, 'Fabelle', 150, 'Dark Chocloates.', 'fabelle.jfif', 11),
(51, 'KitKat', 200, 'Chocolate wafer ', 'kitkat.jfif', 11),
(52, 'KitKat Pop', 250, 'Pop kitkat chocolates', 'pop chocolate kitkat.jfif', 11),
(53, 'Dairy Milk', 200, 'Best quality chocolate', 'dairy milk.jfif', 11),
(54, 'Bingo', 30, 'Wafer with salt taste', 'bingo.jfif', 12),
(55, 'Chataka Pataka', 25, 'Best taste of Kurkure', 'chataka pataka.jfif', 12),
(56, 'Real Bite', 100, 'Best Mix Nakeen ', 'real bite.jfif', 12),
(57, 'Parle', 90, 'Parle namkeen with multiple ingredients', 'parle namkeen.jfif', 12),
(58, 'Fundae', 80, 'Fundae Namkeen best quality namkeen', 'fundae namkeen.jfif', 12),
(59, 'Cina Crokery', 1200, 'China crockery full set.', 'china crokery.jfif', 13),
(60, 'Plates', 250, 'Best quality plates', 'plates.jfif', 13),
(61, 'Knife', 150, 'Best quality knife with steel metal', 'knife.jfif', 14),
(62, 'Spoon', 200, 'Best spoon quality', 'spoon.jfif', 14),
(63, 'Cups', 300, 'Best cups set of best design', 'cups.jfif', 14),
(64, 'Kitchenaid', 800, 'Best kitchenaid of better quality of cooking', 'kitchenaid.jfif', 15),
(65, 'Copper Kitchen Set', 2000, 'Best and design kitchen set', 'copper kitchen set.jfif', 15),
(66, 'Grinder', 5000, 'All rounder kitchen grinder.', 'mixer.jfif', 15),
(67, 'Wooden Spoon', 350, 'Wooden Spoon for cooking expertise better', 'kitchen wooden spoons.jfif', 15),
(68, 'Cooker', 1500, 'Best quality cooker with 5 liter capacity.', 'cookers.jfif', 15),
(69, 'Cleaner Sticks', 1400, 'Best handly stick for cleaning the surface', 'cleaner tools.jfif', 16),
(70, 'Cleaner', 420, 'Best liquid for floor cleaning.', 'cleaners.jfif', 16),
(71, 'Bona Cleaner', 330, 'Bona Cleaner is 500ml for floor cleaning', 'bona cleaner.jfif', 16),
(72, 'Pledge Cleaner', 250, 'Pledge Cleaner is used to clean a floor with bette', 'pledge cleaner.jfif', 16),
(73, 'Floor Cleaner', 450, 'Best Floor Cleaner ', 'floor cleaner.jfif', 16),
(74, 'Clenox', 660, 'Best for utensils cleaner to kill the gem on utens', 'clenox.jfif', 17),
(75, 'Brush', 75, 'It is used to clean the utensils and it is very ni', 'brush cleaner.jfif', 17),
(76, 'Pril', 250, 'Pril is the gel of material to use to clean utensi', 'pril.jfif', 17),
(77, 'Vim', 150, 'Vim is the gel to clean the utensils', 'vim.jfif', 17),
(78, 'Harpi', 310, 'Harpi Active fresh it release fresh smells', 'harpi active fresh.jfif', 18),
(79, 'Spar Toilet Cleaner', 540, 'Spar Toilet cleaner is the best in toilet', 'spar toilet cleaner.jfif', 18),
(80, 'Harpic', 440, 'Harpic is the best toilet cleaner', 'harpic.jfif', 18),
(81, 'Premium Atta', 1900, 'Best premium quality atta', 'premium.jfif', 19),
(82, 'Hathi Atta', 2200, 'It is best quality atta with premium fibers', 'hathi.jfif', 19),
(83, 'Atta Pouch', 500, '5 kg atta packet best quality', 'atta pouch.jfif', 19),
(84, 'Ashirvad', 3500, 'Ashirvad atta 25 kg high quality atta', 'ashirvad.jfif', 19),
(85, 'Utsav Atta', 2400, 'Utsav atta 25kg packet high quality atta', 'utsav.jfif', 19),
(86, 'Basmati Rice', 3600, 'High quality rice', 'basmati rice.jfif', 20),
(87, 'Kohinoor Rice', 2500, '25 kg Kohinoor rice', 'kohinoor.jfif', 20),
(88, 'Dawaat Rice', 3000, '25 kh Dawaat rice high Quality rice', 'dawaat rice.jfif', 20),
(89, 'Nature Gift', 2800, '25 kg nature gift rice', 'nature gift.jfif', 20),
(90, 'Standard Rice', 2700, 'Simple standard rice ', 'standard rice.jfif', 20),
(91, 'Tata Urad', 250, 'Tata Urad dal high quality', 'tata urad.jfif', 21),
(92, 'Patanjali Urad', 300, 'Patanjali urad dal', 'patanjali urad.jfif', 21),
(93, 'Agropur Urad', 250, 'Agropur urad dal', 'agropur urad dal.jfif', 21),
(94, 'Tata Toor', 150, 'Tata toor dal', 'tata toor.jfif', 21),
(95, 'TRS Toor', 250, 'Trs toor dal', 'trs toor.jfif', 21),
(96, 'Frontier', 150, 'Frontier spices masalas', 'frontier.jfif', 22),
(97, 'Coriander', 100, 'Coriander powdered masalas', 'coriander.jfif', 22),
(98, 'Tata Chilly', 130, 'tata chillyred  powdered ', 'tata chilly.jfif', 22),
(99, 'Chilly', 140, 'Red chilly powdered masalas', 'chilly.jfif', 22),
(100, 'Kamadhenu', 260, 'Kamadhenu turmeric powdered', 'kamadhenu turmeric.jfif', 22),
(101, 'Crush Sugar', 390, 'Crush sugar free 500g', 'crush sugar free.jfif', 23),
(102, 'Sugar Free', 440, 'Sugar free no sugar', 'sugar free.jfif', 23),
(103, 'Sky Plus Sugar', 600, 'Sky plus sugar more sweeter', 'sky plus sugar.jfif', 23),
(104, 'Benefiber', 700, 'No sugar highly sugar free', 'benefiber.jfif', 23),
(105, 'BSF Salt', 140, 'Best iodizes salt', 'bsf salt.jfif', 24),
(106, 'Hathi Himalayan', 210, 'Hathi himalayan salt more iodized', 'hathi himalayan salt.jfif', 24),
(107, 'Himalayan Pink Salt', 370, 'Himalayan pin salt high quality', 'himalayan pink salt.jfif', 24),
(108, 'Tata Salt', 480, 'Best quality salt Tata salt', 'tata salt.jfif', 24),
(109, 'Austin Garlic', 70, 'Austin garlic paste', 'austin garlic paste.jfif', 25),
(110, 'Fiamma Tomato', 150, 'Fiamma tomato paste', 'fiamma tomato.jfif', 25),
(111, 'Double Horse Turmeric', 240, 'Double Horse Turmeric paste', 'double horse tamarind paste.jfif', 25),
(112, 'Ronald Chestnut', 330, 'Ronald Chestnut Puree', 'roland chestnut puree.jfif', 25),
(113, 'Hello Pepper Puree', 140, 'Hello pepper puree', 'hello pepper puree.jfif', 25),
(114, 'Fudco', 800, 'Fudco Almond best quality', 'fudco.jfif', 26),
(115, 'Rosted Almond', 680, 'Roasted Almonds highly fabrics', 'roasted.jfif', 26),
(116, 'Nutree', 900, 'Nutree Almond roasted', 'nutree.jfif', 26),
(117, 'Going Nuts', 1000, 'Going nut best quality almonds', 'going nuts.jfif', 26),
(118, 'Mother Earth', 1200, 'Mother earth cashews ', 'mother earth.jfif', 27),
(119, 'Star Nuts', 960, 'Star Nuts cashew high quality', 'star nut.jfif', 27),
(120, 'Tong Garden', 1050, 'Tong garden cashew african cashews', 'tong garden.jfif', 27),
(121, 'Camels', 850, 'Camel cashews', 'camel.jfif', 27),
(122, 'Royal', 980, 'Royal cashews high quality', 'royal.jfif', 27),
(123, 'Raisins', 1320, 'Best quality raisins', 'raisins.jfif', 28),
(124, 'Quaker', 960, 'Best quality raisins', 'quaker.jfif', 28),
(125, 'Organic Raisins', 1340, 'best quality organic raisins', 'organic raisins.jfif', 28),
(126, 'Great Raisins', 870, 'best quality raisins', 'great grains.jfif', 28),
(127, 'Mariani', 900, 'Best quality dates', 'mariani.jfif', 28),
(128, 'Confresh', 970, 'Best quality Pistachios', 'confresh.jfif', 29),
(129, 'Wonderul', 1040, 'Wonder pistachios high quality roasted', 'wonderful.jfif', 29),
(130, 'Oh Nuts', 1000, 'Best quality nuts mix nuts', 'oh nuts.jfif', 29),
(131, 'Tasti Apricots', 1200, 'Best Apricots', 'tasti apricots.jfif', 30),
(132, 'Apricots', 1060, 'Dried Apricots', 'dried apricots.jfif', 30),
(133, 'Dried Fig', 1140, 'Best quality fig dried figs', 'deied fig.jfif', 30),
(134, 'Fresh Anjeer', 1200, 'Fresh anjeer high quality', 'fresh anjeer.jfif', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcat`
--

CREATE TABLE `tbl_subcat` (
  `subcat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `subcat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcat`
--

INSERT INTO `tbl_subcat` (`subcat_id`, `cat_id`, `subcat_name`) VALUES
(1, 1, 'Ghee'),
(2, 1, 'Sunflower Oil'),
(3, 1, 'Rice Bran Oil'),
(4, 1, 'Groundnut Oil'),
(5, 1, 'Mustard Oil'),
(6, 1, 'Others Oil'),
(7, 2, 'Tea'),
(8, 2, 'Coffee'),
(9, 2, 'Soft Drinks'),
(10, 2, 'Biscuits & Cookies'),
(11, 2, 'Chocolates'),
(12, 2, 'Chips & Namkeen'),
(13, 3, 'Cookware & Non sticks'),
(14, 3, 'Crockery & Cutlery'),
(15, 3, 'Kitchen Accessories'),
(16, 3, 'Floor & Other Cleaners'),
(17, 3, 'Utensils Cleaners'),
(18, 3, 'Toilet Cleaners'),
(19, 4, 'Atta'),
(20, 4, 'Basmati Rice'),
(21, 4, 'Toor, Urad & Other Dals'),
(22, 1, 'Powdered Spices'),
(23, 4, 'Sugar & Sugar Free'),
(24, 4, 'Salt'),
(25, 4, 'Cooking Pastes & Purees'),
(26, 5, 'Almonds'),
(27, 5, 'Cashews'),
(28, 5, 'Dates & Raisins'),
(29, 5, 'Pistachios & Other Nuts'),
(30, 5, 'Figs,  Apricots & More'),
(31, 5, 'Cashews');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pwd` varchar(20) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `firstname`, `lastname`, `user_email`, `user_pwd`, `user_gender`, `user_address`) VALUES
(4, 'akash', 'soni', 'soni@gmail.com', '623585222', 'male', 'cg road'),
(5, 'kaif', 'ansari', 'a.kaif8469@gmail.com', '8320', 'male', 'saxac'),
(11, 'kaif', 'ansari', 'sonu@gmail.com', '8320', 'male', '      maninagar                      '),
(12, 'rudra', 'dholakiya', 'rudra756@gmail.com', 'rudra', 'male', ' bhavnagar                    '),
(13, 'akash', 'soni', 'akash@gmail.com', '5656', 'male', '      nadiad                      '),
(17, 'manish', 'kumar', 'manish@gmail.com', '8989', 'Male', 'surat'),
(19, 'Prince', 'Shah', 'prince@gmail.com', 'prince', 'Male', 'jp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adm_id`),
  ADD UNIQUE KEY `adm_email` (`adm_email`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD UNIQUE KEY `contact_email` (`contact_email`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`orderdetails_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`paym_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD UNIQUE KEY `pro_id` (`pro_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feed_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `orderdetails_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `paym_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
