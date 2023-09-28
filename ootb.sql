-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 12:14 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ootb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ootb_accessories`
--

CREATE TABLE `ootb_accessories` (
  `product_id` int(11) NOT NULL,
  `product_sku` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_brand` varchar(250) NOT NULL,
  `product_details` varchar(1000) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_quantity` varchar(250) NOT NULL,
  `product_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_accessories`
--

INSERT INTO `ootb_accessories` (`product_id`, `product_sku`, `product_name`, `product_brand`, `product_details`, `product_price`, `product_quantity`, `product_image`) VALUES
(1, 'fg6768', 'Interchangeable Cables', 'Yarnspirations', 'n/a', '65', '0', 'KPCABLESET47.jpg'),
(2, 'df67658', 'Eucalan Wool Wash', 'Jimmy Beans Wool', 'Eucalan No Rinse Delicate Wash provides superb cleaning and conditioning for any natural fiber and is ideal for use by hand or machine. It is nontoxic, biodegradable, and phosphate free.', '200', '0', '2376.R169.zoom.1.jpg'),
(3, 'rey76897', 'WEBS Plastic and Metal Swift and Ball Winder Combo', 'Red Heart', 'Tired of using up time winding twist hanks and skeins into balls instead of knitting? Stop using chair backs, family and friends and invest in a ball winder and swift.', '500', '0', '2519.zoom.1.jpg'),
(4, 'ght65876', 'Katrinkles Dachshund Wraps Per Inch Tool', 'Premier', 'This cute little Dachshund Wraps Per Inch Tool from Katrinkles is handy for measuring the thickness of any yarn. Simply wrap the yarn around his long little belly into the inch wide notch.', '600', '0', 'KTR-DACHSHUNWPI.jpg'),
(5, 'rgrtyu78', 'The Knit Kit', 'Brown Sheep Co', 'Tired of searching in your knitting bag or purse for all the items you need for knitting? Then The Knit Kit is your perfect solution! This kit includes a tape measure, stitch counter, thread cutter, scissors, crochet hook, darning needle, needle gauge, stitch markers and tip protectors all on one compact device.', '999', '100', 'THEKNITKIT.zoom.1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_account`
--

CREATE TABLE `ootb_account` (
  `id` int(11) NOT NULL,
  `account_number` varchar(250) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `contact_number1` varchar(20) NOT NULL,
  `contact_number2` varchar(20) NOT NULL,
  `fb_account` varchar(1000) NOT NULL,
  `type` varchar(50) NOT NULL,
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_account`
--

INSERT INTO `ootb_account` (`id`, `account_number`, `username`, `email`, `password`, `fullname`, `birthdate`, `gender`, `address`, `contact_number1`, `contact_number2`, `fb_account`, `type`, `photo`) VALUES
(1, '68637', 'admin', 'admin@yahoo.com', 'admin', 'dana pulido', '2016-11-18', 'Male', 'naguillian', '24656765', '', '', 'admin', ''),
(3, '92350quismorio27', 'member', 'dsadasdsadas@yahoo.com', 'member', 'dsadsa dasd', '2016-11-11', 'Female', 'f asfas f', '32432432', '', '', 'member', ''),
(4, '25538kobe24', 'kobe24', 'kobe@gmail.com', 'kobe24', 'kobe bryant', '2017-01-19', 'Male', 'los angeles CA', '2524242424', '', '', 'member', ''),
(5, '65144kobe24b', 'kobe24b', 'kobe24@gmail.com', 'kobe24b', 'kobe bryant', '2017-01-10', 'Male', 'los angeles california', '242424242', '', '', 'member', '');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_brands`
--

CREATE TABLE `ootb_brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_brands`
--

INSERT INTO `ootb_brands` (`id`, `brand_name`) VALUES
(10, 'Ancient Arts'),
(9, 'Brown Sheep Co'),
(6, 'Darn Good Yarn'),
(5, 'Jimmy Beans Wool'),
(2, 'Lion Brand'),
(8, 'Lornas Laces'),
(4, 'Premier'),
(1, 'Red Heart'),
(7, 'Sullivans USA'),
(3, 'Yarnspirations');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_colors`
--

CREATE TABLE `ootb_colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_colors`
--

INSERT INTO `ootb_colors` (`id`, `color_name`, `code`) VALUES
(46, 'blue', '#0000FF'),
(47, 'green', '#008000'),
(48, 'lightgray', '#D3D3D3'),
(49, 'red', '#FF0000'),
(50, 'gray', '#808080'),
(51, 'purple', '#800080'),
(52, 'black', '#000000'),
(53, 'brown', '#A52A2A'),
(54, 'yellow', '#FFFF00'),
(55, 'pink', '#FFC0CB'),
(56, 'orange', '#FFA500'),
(57, 'white', '	#FFFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_han_category`
--

CREATE TABLE `ootb_han_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_han_category`
--

INSERT INTO `ootb_han_category` (`id`, `category_name`) VALUES
(1, 'Crochet Hooks'),
(2, 'Knitting Needle'),
(3, 'Tatting Shuttles');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_hooks_and_needles`
--

CREATE TABLE `ootb_hooks_and_needles` (
  `product_id` int(11) NOT NULL,
  `product_sku` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `product_brand` varchar(250) NOT NULL,
  `product_details` varchar(1000) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_quantity` varchar(250) NOT NULL,
  `product_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_hooks_and_needles`
--

INSERT INTO `ootb_hooks_and_needles` (`product_id`, `product_sku`, `product_name`, `product_category`, `product_brand`, `product_details`, `product_price`, `product_quantity`, `product_image`) VALUES
(2, 'fd6678', 'Interchangeable Needle Set', 'Knitting Needle', 'Sullivans USA', 'This Limited Edition set is only available for a short time. It includes a range of 9 interchangeable knitting needles from size US 4 to 11', '2999', '100', 'ZingNeedlesMainImage.jpg'),
(3, '563fdsfs', 'Starter Interchangeable Needle Set', 'Knitting Needle', 'Darn Good Yarn', 'Starter Interchangeable Needle Set includes everything you need to get started with knitting on interchangeable needles! The set includes colored birch wood needles', '2500', '50', 'ROYALSTART.zoom.1.jpg'),
(4, 'gh76869', 'Susan Bates Silvalume Aluminum Crochet Hook', 'Crochet Hooks', 'Red Heart', 'Each Silvalume&reg; product undergoes a special anodizing process, which etches away all surface impurities, resulting in a velvet-smooth finish and a color that is pleasing to the eye', '100', '0', '2611.B1.zoom.1.jpg'),
(5, 'ytry5768', 'Susan Bates Steelites Steel Crochet Hook', 'Crochet Hooks', 'Others', 'Susan Bates offers a complete range of the finest nickel-plated steel crochet hooks. These hooks are the perfect choice to create fine crochet lace doilies, tablecloths and edgings. ', '99', '200', 'BATESHOOK.0.zoom.1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_products`
--

CREATE TABLE `ootb_products` (
  `product_id` int(11) NOT NULL,
  `product_sku` varchar(100) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_color` varchar(250) NOT NULL,
  `product_style` varchar(250) NOT NULL,
  `product_thickness` varchar(250) NOT NULL,
  `product_brand` varchar(250) NOT NULL,
  `product_details` varchar(1000) NOT NULL,
  `product_quantity` varchar(250) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_products`
--

INSERT INTO `ootb_products` (`product_id`, `product_sku`, `product_name`, `product_color`, `product_style`, `product_thickness`, `product_brand`, `product_details`, `product_quantity`, `product_price`, `product_image`) VALUES
(2, 'sad4658', 'Valley Yarns Northampton', 'purple', 'Angora', 'Super bulky', 'Ancient Arts', 'Even though we love all of our Valley Yarns Northampton has become a fast favorite! We sourced the softest wool we could find and dyed it in a beautiful collection of solid colors and heathered shades.', '100', '300', '3797.AMETHYST.zoom.1.jpg'),
(3, 'gfd575685', 'Malabrigo Rios', 'green', 'Silk', 'Light', 'Darn Good Yarn', 'Malabrigo Rios takes the incredible softness of Malabrigos yarns and makes it machine washable! This plied yarn comes in rich, beautiful colors, and you wont have to worry about felting.', '200', '500', 'RIOSMALABR.AGUAS.zoom.1.jpg'),
(4, 'dg45765765', 'Cascade Yarns 220', 'brown', 'Egyptian cotton', 'Lace', 'Sullivans USA', 'Cascade 220 is just simply one of our most popular yarns. This 100% wool, worsted weight yarn is available in an incredible selection of colors, including a huge number of beautiful heathers.', '200', '599', '1117.2401.zoom.1.jpg'),
(5, '43543', 'aweawewa', 'red', 'American cotton', 'Lace', 'Jimmy Beans Wool', 'dsadsadas', '60', '344', 'redyarn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_projects`
--

CREATE TABLE `ootb_projects` (
  `product_id` int(11) NOT NULL,
  `product_sku` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_category` varchar(250) NOT NULL,
  `product_brand` varchar(250) NOT NULL,
  `product_details` varchar(1000) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_quantity` varchar(250) NOT NULL,
  `product_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_projects`
--

INSERT INTO `ootb_projects` (`product_id`, `product_sku`, `product_name`, `product_category`, `product_brand`, `product_details`, `product_price`, `product_quantity`, `product_image`) VALUES
(1, 'few56457', 'Third Piece The Stowe Blanket ', 'Clothing', 'Others', 'This winter keep warm under The Stowe Blanket from Third Piece. This beautiful throw features a broad central cable surrounded by seed stitch details and is knit in Funky Chunky, a super bulky wool yarn that feels like pure warmth and comfort. ', '400', '20', 'cabled blanket.jpg'),
(2, 'w32564', 'Designs Blackstone Road', 'Clothing', 'Premier', 'Blackstone Road from The Stitches of My Life Designs is a striped cowl with a fashionable buttoned placket. Knit in a sturdy worsted weight yarn, this is a quick project that would make an excellent gift. ', '300', '99', 'blackstone 1.jpg'),
(3, 'qwr547', 'Third Piece Textured Interweave Pillow', 'Others', 'Brown Sheep Co', 'An intriguing reversible stitch pattern characterizes the Textured Interweave Pillow from Third Piece. This decorative pillow is knit in Third Piece Funky Chunky, a single-ply super bulky yarn that is available in a wide range of colors.', '250', '0', 'textured pillow 3.jpg'),
(4, 'qwr347', 'Third Piece The Loopy Pillow', 'Others', 'Brown Sheep Co', 'Elevate your interior style with the Loopy Pillow from Third Piece. This richly textured living room accent is knit in Funky Chunky, a super bulky, 100% Merino wool yarn that is as soft as can be. ', '300', '8', 'loopy pillow 2.jpg'),
(5, 's54377', 'Adventure Du Jour Designs Oopsie Daisy Mitts', 'Clothing', 'Red Heart', 'Adventure Du Jour Designs Oopsie Daisy Mitts are so much fun that you&rsquo;ll want a pair in every color! Knit in Valley Yarns Valley Superwash Super Bulky, these fingerless gloves will be done in no time. ', '600', '0', 'Oopsie mitts.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_projects_category`
--

CREATE TABLE `ootb_projects_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_projects_category`
--

INSERT INTO `ootb_projects_category` (`id`, `category_name`) VALUES
(1, 'Accessories'),
(2, 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_temp_transaction`
--

CREATE TABLE `ootb_temp_transaction` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `account_number` varchar(250) NOT NULL,
  `product_sku` varchar(250) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `transaction_dtime` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_temp_transaction`
--

INSERT INTO `ootb_temp_transaction` (`id`, `transaction_id`, `account_number`, `product_sku`, `quantity`, `price`, `status`, `transaction_dtime`) VALUES
(1, '369851216', '92350quismorio27', 'gfd575685', '799', '399500', 'ordered', '2016-12-16 05:28:59'),
(2, '369851216', '92350quismorio27', '563fdsfs', '37', '92500', 'ordered', '2016-12-16 05:29:08'),
(3, '369851216', '92350quismorio27', 'rey76897', '87', '43500', 'ordered', '2016-12-16 05:29:16'),
(4, '369851216', '92350quismorio27', 'qwt4364', '9', '63000', 'ordered', '2016-12-16 05:29:22'),
(5, '369851216', '92350quismorio27', 'qwr547', '29', '7250', 'ordered', '2016-12-16 05:29:29'),
(6, '422971216', '92350quismorio27', 'dg45765765', '250', '149750', 'ordered', '2016-12-16 05:53:16'),
(7, '422971216', '92350quismorio27', 'gh76869', '99', '9900', 'ordered', '2016-12-16 05:53:25'),
(8, '422971216', '92350quismorio27', 'ght65876', '55', '33000', 'ordered', '2016-12-16 05:53:36'),
(9, '422971216', '92350quismorio27', 's54377', '27', '16200', 'ordered', '2016-12-16 05:53:55'),
(11, '173690117', '25538kobe24', 'dsg4568', '12', '2880', 'pending', '2017-01-13 18:54:22'),
(12, '173690117', '25538kobe24', 'ytry5768', '4', '396', 'pending', '2017-01-13 18:54:35'),
(13, '173690117', '25538kobe24', 'rgrtyu78', '1', '999', 'pending', '2017-01-13 18:54:49'),
(14, '809010117', '65144kobe24b', 'dsg4568', '2', '480', 'pending', '2017-01-13 19:03:11'),
(15, '809010117', '65144kobe24b', 'rgrtyu78', '99', '98901', 'pending', '2017-01-13 19:03:32'),
(17, '809010117', '65144kobe24b', 'qwr347', '4', '1200', 'pending', '2017-01-13 19:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_thickness`
--

CREATE TABLE `ootb_thickness` (
  `id` int(11) NOT NULL,
  `thickness_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_thickness`
--

INSERT INTO `ootb_thickness` (`id`, `thickness_name`) VALUES
(6, 'Bulky'),
(3, 'Fine'),
(1, 'Lace'),
(4, 'Light'),
(5, 'Medium'),
(7, 'Super bulky'),
(2, 'Super fine');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_tools`
--

CREATE TABLE `ootb_tools` (
  `product_id` int(11) NOT NULL,
  `product_sku` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_brand` varchar(250) NOT NULL,
  `product_details` varchar(1000) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `product_quantity` varchar(250) NOT NULL,
  `product_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_tools`
--

INSERT INTO `ootb_tools` (`product_id`, `product_sku`, `product_name`, `product_brand`, `product_details`, `product_price`, `product_quantity`, `product_image`) VALUES
(1, 'qwr5789', 'Schacht Raddles', 'Brown Sheep Co', 'Schacht Raddles have built-in clamps and can be attached to either the looms back beam or the shuttle race of the beater. The raddles come with plated pins inserted every inch, and with holes drilled every half inch, with enough extra pins included should you prefer half-inch spacing. ', '5000', '0', '1431.7203.zoom.1.jpg'),
(2, 'gret655', 'Treeditions Scarf Set', 'Darn Good Yarn', 'The scarf set is a convenient way to put scarves on your loom. Load the lease sticks and raddle while comfortably seated, then easily carry the warp bundle to the loom. Clamp the raddle to the back beam. Comes with 2 lease sticks.', '600', '0', 'WTRSCARFSE.CHERRY.zoom.1.jpg'),
(3, 'qwt4364', 'TOIKA Upright Swift', 'Lion Brand', 'An essential tool for spinners, weavers and dyers, swifts are ideal for unwinding skeins.  Also called a squirrel, this tool can accommodate very large skeins.  ', '7000', '0', 'uprightswift.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_transactions`
--

CREATE TABLE `ootb_transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `account_number` varchar(250) NOT NULL,
  `total_quantity` varchar(250) NOT NULL,
  `total_price` varchar(250) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `transaction_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_transactions`
--

INSERT INTO `ootb_transactions` (`id`, `transaction_id`, `account_number`, `total_quantity`, `total_price`, `payment_method`, `transaction_date`) VALUES
(1, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 05:54:45'),
(2, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:06:33'),
(3, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:13:08'),
(4, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:13:27'),
(5, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:13:38'),
(6, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:14:07'),
(7, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:14:34'),
(8, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:18:51'),
(9, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:18:52'),
(10, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:20:30'),
(11, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:22:13'),
(12, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:23:01'),
(13, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:24:35'),
(14, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:26:12'),
(15, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:27:48'),
(16, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:29:06'),
(17, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:29:08'),
(18, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:30:00'),
(19, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:30:01'),
(20, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:30:01'),
(21, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:30:26'),
(22, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:30:42'),
(23, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:30:43'),
(24, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:30:43'),
(25, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:30:43'),
(26, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:31:35'),
(27, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:31:36'),
(28, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:31:36'),
(29, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:31:37'),
(30, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:31:37'),
(31, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:32:21'),
(32, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:33:37'),
(33, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:37:29'),
(34, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:38:14'),
(35, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:38:59'),
(36, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:40:19'),
(37, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:40:57'),
(38, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:43:15'),
(39, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:47:06'),
(40, '422971216', '92350quismorio27', '431', '208850', 'cash on delivery', '2016-12-16 06:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `ootb_types`
--

CREATE TABLE `ootb_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootb_types`
--

INSERT INTO `ootb_types` (`id`, `type_name`) VALUES
(13, 'Acrylic'),
(10, 'Alpaca'),
(3, 'American cotton'),
(11, 'Angora'),
(5, 'Bamboo bast'),
(9, 'Cashmere'),
(1, 'Egyptian cotton'),
(7, 'Icelandic wool'),
(4, 'Linen'),
(6, 'Merino wool'),
(8, 'Mohair'),
(14, 'Nylon'),
(2, 'Pima cotton'),
(15, 'Rayon'),
(12, 'Silk');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ootb_accessories`
--
ALTER TABLE `ootb_accessories`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_sku` (`product_sku`);

--
-- Indexes for table `ootb_account`
--
ALTER TABLE `ootb_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ootb_brands`
--
ALTER TABLE `ootb_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `ootb_colors`
--
ALTER TABLE `ootb_colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `color_name` (`color_name`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `ootb_han_category`
--
ALTER TABLE `ootb_han_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ootb_hooks_and_needles`
--
ALTER TABLE `ootb_hooks_and_needles`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_sku` (`product_sku`);

--
-- Indexes for table `ootb_products`
--
ALTER TABLE `ootb_products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_sku` (`product_sku`);

--
-- Indexes for table `ootb_projects`
--
ALTER TABLE `ootb_projects`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_sku` (`product_sku`);

--
-- Indexes for table `ootb_projects_category`
--
ALTER TABLE `ootb_projects_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `ootb_temp_transaction`
--
ALTER TABLE `ootb_temp_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ootb_thickness`
--
ALTER TABLE `ootb_thickness`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thickness_name` (`thickness_name`);

--
-- Indexes for table `ootb_tools`
--
ALTER TABLE `ootb_tools`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_sku` (`product_sku`);

--
-- Indexes for table `ootb_transactions`
--
ALTER TABLE `ootb_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ootb_types`
--
ALTER TABLE `ootb_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_name` (`type_name`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ootb_accessories`
--
ALTER TABLE `ootb_accessories`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ootb_account`
--
ALTER TABLE `ootb_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ootb_brands`
--
ALTER TABLE `ootb_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ootb_colors`
--
ALTER TABLE `ootb_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `ootb_han_category`
--
ALTER TABLE `ootb_han_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ootb_hooks_and_needles`
--
ALTER TABLE `ootb_hooks_and_needles`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ootb_products`
--
ALTER TABLE `ootb_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ootb_projects`
--
ALTER TABLE `ootb_projects`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ootb_projects_category`
--
ALTER TABLE `ootb_projects_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ootb_temp_transaction`
--
ALTER TABLE `ootb_temp_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ootb_thickness`
--
ALTER TABLE `ootb_thickness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ootb_tools`
--
ALTER TABLE `ootb_tools`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ootb_transactions`
--
ALTER TABLE `ootb_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `ootb_types`
--
ALTER TABLE `ootb_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
