-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 03:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TL', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GG', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'YT', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Eswatini'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `Object_id` int(225) NOT NULL,
  `title` text DEFAULT NULL,
  `order_date` text DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `customer` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `invoice_id` varchar(225) DEFAULT NULL,
  `confirm_id` varchar(225) DEFAULT NULL,
  `price` bigint(225) DEFAULT NULL,
  `currency_id` int(20) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `type`, `Object_id`, `title`, `order_date`, `payment_status`, `status`, `customer`, `payment_method`, `total`, `invoice_id`, `confirm_id`, `price`, `currency_id`, `start_date`, `end_date`) VALUES
(1, 'room', 42, 'Hotel 2', '2023-05-31', '0', 'Pending', 5, 1, '150.00', '0', '020230623', 0, 0, '2023-06-23 14:16:42', '2023-06-25 00:00:00'),
(11, 'room', 7, 'type', '2023-06-23 11:57:17', NULL, '0', 3, 1, '79200.00', '202306231157172789627', NULL, 7200, 0, '2023-06-24 00:00:00', '2023-07-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` int(10) UNSIGNED NOT NULL,
  `currency_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `currency_name`) VALUES
(1, 'Egyptian Pound (EGP)'),
(2, 'United States Dollar (USD)'),
(3, 'Euro (EUR)'),
(4, 'Japanese Yen (JPY)'),
(5, 'British Pound (GBP)'),
(6, 'Canadian Dollar (CAD)'),
(7, 'Australian Dollar (AUD)'),
(8, 'Swiss Franc (CHF)'),
(9, 'Chinese Yuan (CNY)'),
(10, 'Swedish Krona (SEK)'),
(11, 'New Zealand Dollar (NZD)'),
(12, 'Mexican Peso (MXN)'),
(13, 'Singapore Dollar (SGD)'),
(14, 'Hong Kong Dollar (HKD)'),
(15, 'Norwegian Krone (NOK)'),
(16, 'South Korean Won (KRW)'),
(17, 'Turkish Lira (TRY)'),
(18, 'Russian Ruble (RUB)'),
(19, 'Indian Rupee (INR)'),
(20, 'Brazilian Real (BRL)'),
(21, 'South African Rand (ZAR)');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `banner` text NOT NULL,
  `images` text NOT NULL DEFAULT ' ',
  `terms` text NOT NULL DEFAULT ' ',
  `cancellation` text NOT NULL DEFAULT '\' \'',
  `creation_date` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `price`, `location`, `description`, `banner`, `images`, `terms`, `cancellation`, `creation_date`, `updated_at`) VALUES
(1, 'Test Hotel Edit', '450.00', 'Maadi', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579962910.jpg,168579962917.jpg,168579962987.jpg', ' 1,2,3,4,5,6,7,8,9', '\' \'', '2023-05-31', '2023-06-11 07:44:38'),
(2, 'Hotel 2', '400.00', 'Alexandria', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '1685795520.jpg,1685795520.jpg', '  1,2,3,4,5,6,7,8,9', '\' \'', '2023-05-31', '2023-06-11 07:44:38'),
(3, 'Hotel 3', '350.00', 'Alexandria', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '\' \'', '2023-05-31', '2023-06-11 07:44:38'),
(4, 'Hotel 4', '500.00', 'Hurghada', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', ' 1,2,3,4,5,6,7,8,9', '\' \'', '2023-05-31', '2023-06-11 07:44:38'),
(5, 'Hotel 6', '650.00', 'Sharm El-shiekh', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '\' \'', '2023-05-31', '2023-06-11 07:44:38'),
(6, 'Hotel 10', '150.00', 'Cairo', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '\' \'', '2023-06-01', '2023-06-11 07:44:38'),
(7, 'Hotel 10', '420.00', 'Maaddi', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '\' \'', '2023-06-01', '2023-06-11 07:44:38'),
(8, 'Hotel 1', '250.00', 'Cairo', 'test', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '\' \'', '2023-06-03', '2023-06-11 07:44:38'),
(9, 'Al Maza Hotel', '700.00', 'Cairo', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '\' \'', '2023-06-03', '2023-06-11 07:44:38'),
(10, 'Hotel Pics', '250.00', 'Cairo', '<h1>TEST</h1>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '\' \'', '2023-06-03', '2023-06-11 07:44:38'),
(18, 'Hotel ABCe222', '12.00', '2aaa', '<p>aaaa</p>', '168688352688.jpeg', '168688352636.jpeg', '1,10,19', '\' \'', '2023-06-16', '2023-06-16 02:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_attr`
--

CREATE TABLE `hotel_attr` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_attr`
--

INSERT INTO `hotel_attr` (`id`, `name`) VALUES
(1, 'up'),
(5, 'عمر سيد سلامة محمد'),
(6, 'Facilities'),
(9, 'new-attr'),
(11, 'del');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_cancellation`
--

CREATE TABLE `hotel_cancellation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `days_before_checkin` int(11) NOT NULL,
  `refund_percentage` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_cancellation`
--

INSERT INTO `hotel_cancellation` (`id`, `name`, `days_before_checkin`, `refund_percentage`, `created_at`, `updated_at`) VALUES
(1, 'flexible', 1, 100.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_exceptions`
--

CREATE TABLE `hotel_exceptions` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_name` text DEFAULT NULL,
  `location` text NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `new_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_terms`
--

CREATE TABLE `hotel_terms` (
  `id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_terms`
--

INSERT INTO `hotel_terms` (`id`, `attr_id`, `name`) VALUES
(1, 1, 'Havana Lobby bar'),
(2, 1, 'Fiesta Restaurant'),
(4, 1, 'zxcvb'),
(5, 1, 'Laundry Services'),
(6, 1, 'Pets welcome'),
(7, 1, 'Tickets'),
(9, 5, 'Hotels'),
(10, 5, 'Homestays'),
(11, 5, 'Villas'),
(12, 5, 'Boats'),
(13, 5, 'Motels'),
(15, 5, 'delwa'),
(16, 5, 'Holiday homes'),
(17, 5, 'Cruises'),
(18, 6, 'Wake-up call'),
(19, 6, 'Car hire'),
(20, 6, 'Bicycle hire'),
(21, 6, 'Flat Tv'),
(22, 6, 'Laundry and dry cleaning'),
(23, 6, 'Internet – Wifi'),
(24, 6, 'Coffee and tea'),
(25, 1, 'new-term'),
(29, 1, 'new-term'),
(30, 1, 'new-term'),
(32, 14, 'toooooo'),
(36, 1, 'عمر سيد سلامة محمد'),
(37, 1, 'عمر سيد سلامة محمد');

-- --------------------------------------------------------

--
-- Table structure for table `house_policy`
--

CREATE TABLE `house_policy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Half Board', 'Half Board', '2023-06-21 09:06:08', '2023-06-21 06:26:25'),
(7, 'Very good breakfast ', '0', '2023-06-22 08:46:31', '2023-06-22 08:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `meal_room`
--

CREATE TABLE `meal_room` (
  `room_id` int(255) NOT NULL,
  `meal_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_room`
--

INSERT INTO `meal_room` (`room_id`, `meal_id`) VALUES
(42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_06_15_093457_create_room_exceptions_table', 2),
(5, '2023_06_15_094955_create_room_attr_table', 3),
(6, '2023_06_15_095200_create_room_terms_table', 4),
(7, '2023_06_16_031152_create_room_types_table', 5),
(8, '2023_06_18_174918_create_tour_types_table', 6),
(9, '2023_06_18_175758_update_room_types_table', 6),
(10, '2023_06_18_190631_update_room_terms_table', 7),
(11, '2023_06_17_191235_create_room_subs_table', 8),
(12, '2023_06_17_191235_create_room_sups_table', 9),
(13, '2023_06_21_025409_create_house_policy', 10),
(14, '2023_06_21_025646_update_house_policy', 11),
(15, '2023_06_21_062034_create_hotel_cancel_policy', 12),
(16, '2023_06_21_074211_create_meals_table', 13),
(17, '2023_06_30_114932_create_currencies_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp(4) NOT NULL DEFAULT current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-06-01 00:00:00', '2023-06-11 07:01:58.4448'),
(2, 'User', '2023-06-01 00:00:00', '2023-06-11 07:01:58.4448');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(255) NOT NULL,
  `hotel_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `currency` int(11) NOT NULL,
  `max_adult` int(11) NOT NULL,
  `max_child` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `images` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `terms` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '\' \'',
  `sups` text DEFAULT '\'\\\' \\\'\'',
  `type` bigint(20) UNSIGNED DEFAULT NULL,
  `has_meal` tinyint(1) DEFAULT NULL,
  `free_meal` tinyint(1) DEFAULT NULL,
  `meal_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '\'\\\' \\\'\'',
  `meal_price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `name`, `price`, `currency`, `max_adult`, `max_child`, `creation_date`, `images`, `banner`, `description`, `terms`, `sups`, `type`, `has_meal`, `free_meal`, `meal_type`, `meal_price`, `created_at`, `updated_at`) VALUES
(4, 9, 'جديدh', '7200.00', 0, 2, 2, '2023-06-15', '168689351566.jpg', 'C:\\xampp\\tmp\\phpC70A.tmp', '<p>n</p>', '[\"3\"]', '\' \'', 1, 0, NULL, NULL, NULL, NULL, NULL),
(7, 18, 'type', '7200.00', 0, 2, 3, '2023-06-16', '168688642089.jpeg', '168688642088.jpeg', '<p>e</p>', '1', '\' \'', 1, 0, NULL, NULL, NULL, NULL, NULL),
(8, 5, 'جديد', '7200.00', 0, 2, 2, '2023-06-16', '168688781347.jpeg', '168688781373.jpeg', '<p>1512</p>', '', '\' \'', 1, 0, NULL, NULL, NULL, NULL, NULL),
(35, 1, 'جديد', '1.00', 0, 1, 2, '2023-06-22', '168740629262.jpeg', '168740629266.jpeg', '<p>0</p>', '4,5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 1, 'جديد', '20.00', 0, 2, 2, '2023-06-22', '168740646989.jpeg', '168740646978.jpeg', '<p>0</p>', '4,5', '', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 1, 'عمر سيد سلامة محمد', '1.00', 0, 1, 2, '2023-06-22', '168740669022.jpeg', '168740669019.jpg', '<p>0</p>', '4,5', '2', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 1, 'عمر سيد سلامة محمد', '1.00', 0, 2, 2, '2023-06-22', '168740695610.jpeg', '168740695691.jpg', '<p>0</p>', '4,5', '', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 1, 'del', '1.00', 0, 1, 1, '2023-06-22', '168740758143.jpeg,168740758143.jpeg,168740758143.jpeg', '168740758159.jpeg', '<p>0</p>', '6,5', '2', 1, 1, 1, '0', NULL, NULL, NULL),
(41, 1, 'del', '20.00', 0, 1, 1, '2023-06-22', '168740859498.jpeg', '168740859418.jpeg', '<p>0</p>', '4,5', '2', 2, 1, 1, '1', NULL, NULL, NULL),
(42, 1, 'عمر سيد سلامة محمد', '1.00', 0, 4, 2, '2023-06-22', '168740862974.jpeg,168740862949.jpeg,168740862996.jpeg,168740862998.jpg,168740862937.jpeg,168740862924.jpeg', '168740862912.jpeg', '<p>0</p>', '6,5', '2', 2, 1, 1, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_attr`
--

CREATE TABLE `room_attr` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_attr`
--

INSERT INTO `room_attr` (`id`, `name`) VALUES
(1, 'جديد'),
(3, 'five');

-- --------------------------------------------------------

--
-- Table structure for table `room_exceptions`
--

CREATE TABLE `room_exceptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `new_price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_sups`
--

CREATE TABLE `room_sups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_sups`
--

INSERT INTO `room_sups` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(2, 'five', '7200.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_terms`
--

CREATE TABLE `room_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attr_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_terms`
--

INSERT INTO `room_terms` (`id`, `attr_id`, `name`, `price`) VALUES
(4, 1, 'mnbvc', '100.00'),
(5, 3, 'h', '60.00');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `Beds` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `price`, `Beds`, `created_at`, `updated_at`) VALUES
(1, 'Single', '5.00', 0, NULL, NULL),
(2, 'Double', '6.00', 0, NULL, NULL),
(4, 'Triple', '20.00', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE `subcribers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcribers`
--

INSERT INTO `subcribers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Test Subscriber', 'subscriber@gmail.com', '2023-06-03', '2023-06-11 07:36:23'),
(2, 'updatedsubs', 'updatedsubs@new.com', '2023-06-11', '2023-06-10 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(225) NOT NULL,
  `title` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `duration` text NOT NULL,
  `min_people` int(11) NOT NULL,
  `max_people` int(11) NOT NULL,
  `location` text DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `banner` text DEFAULT NULL,
  `images` text DEFAULT '\' \'',
  `terms` text NOT NULL DEFAULT '\' \'',
  `description` text NOT NULL,
  `type` bigint(20) UNSIGNED DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `tour_date` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `category_id`, `duration`, `min_people`, `max_people`, `location`, `latitude`, `longitude`, `price`, `banner`, `images`, `terms`, `description`, `type`, `sale_price`, `tour_date`, `created_at`) VALUES
(1, 'Dream Park Edited', 2, '12 hours', 10, 50, 'Madinat Nasr', NULL, NULL, '300.00', '', '\' \'', '\' \'', '', 0, NULL, '2023-06-14', '2023-06-02'),
(6, 'test', 1, '2', 20, 50, 'cairo', NULL, NULL, '200.00', '', '', '1,2,8', '<p>v</p>', 0, '50.00', '2023-06-30', '2023-06-16'),
(14, 'gmhm', 2, '2', 20, 50, 'cairo', NULL, NULL, '200.00', NULL, '', '2,9', '<p>0</p>', 2, '50.00', '2023-07-06', '2023-06-27'),
(17, 'gmhm', 2, '2', 20, 50, 'cairo', NULL, NULL, '200.00', NULL, '', '1,9', '<p>0</p>', 2, '50.00', '2023-07-06', '2023-06-27'),
(19, 'test', 2, '2', 20, 50, 'cairo', '24.7314800', '46.6551936', '200.00', NULL, '', '2,9', '<p>0</p>', 2, '50.00', '2023-07-06', '2023-06-27'),
(21, '45454545', 2, '2', 1, 50, 'cairo', NULL, NULL, '200.00', NULL, '', '4,10', '<p>0000000</p>', 2, '50.00', '2023-07-07', '2023-06-29'),
(22, '54', 2, '2', 20, 50, NULL, NULL, NULL, '200.00', NULL, '', '2,9', '<p>0</p>', 2, '50.00', '2023-06-30', '2023-06-29'),
(23, 'test', 2, '2', 20, 50, NULL, NULL, NULL, '200.00', NULL, '', '2,11', '<p>0</p>', 2, '50.00', '2023-07-06', '2023-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `tour_attr`
--

CREATE TABLE `tour_attr` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_attr`
--

INSERT INTO `tour_attr` (`id`, `name`) VALUES
(1, 'Travel Styles'),
(2, 'Facilities');

-- --------------------------------------------------------

--
-- Table structure for table `tour_category`
--

CREATE TABLE `tour_category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_category`
--

INSERT INTO `tour_category` (`id`, `name`, `created_at`) VALUES
(1, 'Daytour', '2023-06-02'),
(2, 'Multi-Day Packages', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `tour_locations`
--

CREATE TABLE `tour_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_locations`
--

INSERT INTO `tour_locations` (`id`, `tour_id`, `location`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(2, 21, 'cairo', '24.75084660', '46.67413929', '2023-06-29 10:18:52', '2023-06-29 10:18:52'),
(3, 22, 'cairo', '24.74099036', '46.58006886', '2023-06-29 11:11:13', '2023-06-29 11:11:13'),
(4, 23, '3', '24.73631314', '46.57629231', '2023-06-29 12:27:40', '2023-06-29 12:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `tour_terms`
--

CREATE TABLE `tour_terms` (
  `id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_terms`
--

INSERT INTO `tour_terms` (`id`, `attr_id`, `name`) VALUES
(1, 1, 'Cultural'),
(2, 1, 'Nature & Adventure'),
(3, 1, 'Marine'),
(4, 1, 'Independent'),
(6, 1, 'Festival & Events'),
(7, 1, 'Special Interest'),
(8, 2, 'Wifi'),
(9, 2, 'Gymnasium'),
(10, 2, 'Mountain Bike'),
(11, 2, 'Satellite Office'),
(12, 2, 'Staff Lounge'),
(13, 2, 'Golf Cages'),
(14, 2, 'Aerobics Room'),
(17, 16, 'جديد'),
(18, 16, 'قديم'),
(19, 16, 'عمر سيد سلامة محمد');

-- --------------------------------------------------------

--
-- Table structure for table `tour_types`
--

CREATE TABLE `tour_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_types`
--

INSERT INTO `tour_types` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(2, 'عمر سيد سلامة محمد', '7200.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `gender` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` text NOT NULL,
  `bio` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `gender`, `phone`, `country`, `bio`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 'hotels admin', 'admin_hotels', 'admin@yahoo.com', '$2y$10$D3wRvyUHjMpKAuskS.T6JuuAin8u0OLYtyYHZ0XgfmROjp1Jc1zTC', 1, '01007046215', 'Egypt', '<p><em>Admin</em></p><p><br></p>', 1, '2023-05-31 21:00:00', '2023-05-31 21:00:00'),
(3, 'test user', 'user_hotels', 'user@gmail.com', '$2y$10$1H3KzNc8U44NhiYBhvFPPeLRMc58fowrz0yC7ZH8U2uREOhep6TDi', 1, '01024178367', 'Egypt', '<p><strong>User Test</strong></p>', 2, '2023-05-31 21:00:00', '2023-05-31 21:00:00'),
(4, 'user 1', 'user1', 'user1@gmail.com', '$2y$10$A4rNmMq9wQaLgXQzPCROiePZgcutyipOUYsCKvoy/IC.QCgbeERcy', 1, '01007046258', 'Egypt', '', 2, '2023-05-31 21:00:00', '0000-00-00 00:00:00'),
(5, 'ahmed samy', 'ahmed_samy15', 'ahmed@gmail.com', '$2y$10$CKUVuqfubenx1dObxwsAcuCOpqY6MYO5GJU9ob5nnZOuPi5nrvZra', 1, '0100405421', 'Egypt', '', 2, '2023-05-31 21:00:00', '0000-00-00 00:00:00'),
(8, 'Mohamed Wael', 'wael74_', 'wael@gmail.com', '$2y$10$q0LgBTsDJH3wAHUTej8fnOcvaIx4ZQrMtEUcyedvua7HmxZotGxLa', 1, '01147856932', 'Egypt', '', 2, '2023-05-31 21:00:00', '0000-00-00 00:00:00'),
(9, 'Mahmoud Adel', 'mahmoud_adel77', 'mahmoud_adel@gmail.com', '$2y$10$e5.EWYmCFNoWE1FiE1OIY.l1kArN6r24yG/aULPuRj3i85jcaKWpm', 1, '01002536987', 'Egypt', '', 2, '2023-05-31 21:00:00', '0000-00-00 00:00:00'),
(10, 'Ahmed Samy', 'ahmed_samy2020', 'ahmed_samy@gmail.com', '$2y$10$1iAw5o0DNDrGA2P03QEN6Obw5mDDz4r2iC8e/SgQ7zqPiEIeXDsdy', 1, '01007046215', 'Egypt', '<p><strong>Ahmed Samy</strong></p>', 2, '2023-05-31 21:00:00', '0000-00-00 00:00:00'),
(11, 'Mohamed Essam', 'mo_essam', 'mo_essam@gmail.com', '$2y$10$D4NIyp9ppiBf0MCwlKmNp.z/zaP2Z4dwfkXtGF7kluf9K87jI34q.', 1, '01024178367', 'United Arab Emirates', '<p><br></p>', 2, '2023-05-31 21:00:00', '0000-00-00 00:00:00'),
(12, 'Test Admin Aadd', 'test_admin', 'test@gmail.com', '$2y$10$fcwmaJ2lNjZZykRwWhR0ru0oqikYO4Cc/ZEORt0jWvGwFzZ79TKVO', 1, '01123654789', 'Afghanistan', '<p><u>Test</u></p>', 1, '2023-05-31 21:00:00', '0000-00-00 00:00:00'),
(13, 'dev', 'dev_test', 'dev@mail.com', '$2y$10$.fP3nN1P5OPdrDVxvlQWyekhKjsduFVg3Z7j9kJhgr94MlCF43VUe', 1, '123456789', 'Afghanistan', '<p><br></p>', 1, '2023-06-09 21:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_attr`
--
ALTER TABLE `hotel_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_cancellation`
--
ALTER TABLE `hotel_cancellation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_exceptions`
--
ALTER TABLE `hotel_exceptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `hotel_terms`
--
ALTER TABLE `hotel_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_policy`
--
ALTER TABLE `house_policy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_room`
--
ALTER TABLE `meal_room`
  ADD KEY `meal_id` (`meal_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `room_attr`
--
ALTER TABLE `room_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_exceptions`
--
ALTER TABLE `room_exceptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_exceptions_hotel_id_foreign` (`hotel_id`),
  ADD KEY `room_exceptions_room_id_foreign` (`room_id`);

--
-- Indexes for table `room_sups`
--
ALTER TABLE `room_sups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_terms`
--
ALTER TABLE `room_terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_terms_attr_id_foreign` (`attr_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcribers`
--
ALTER TABLE `subcribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_attr`
--
ALTER TABLE `tour_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_category`
--
ALTER TABLE `tour_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_locations`
--
ALTER TABLE `tour_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `tour_terms`
--
ALTER TABLE `tour_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_types`
--
ALTER TABLE `tour_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hotel_attr`
--
ALTER TABLE `hotel_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hotel_cancellation`
--
ALTER TABLE `hotel_cancellation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel_exceptions`
--
ALTER TABLE `hotel_exceptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hotel_terms`
--
ALTER TABLE `hotel_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `house_policy`
--
ALTER TABLE `house_policy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `room_attr`
--
ALTER TABLE `room_attr`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_exceptions`
--
ALTER TABLE `room_exceptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_sups`
--
ALTER TABLE `room_sups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_terms`
--
ALTER TABLE `room_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcribers`
--
ALTER TABLE `subcribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tour_attr`
--
ALTER TABLE `tour_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tour_category`
--
ALTER TABLE `tour_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tour_locations`
--
ALTER TABLE `tour_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_terms`
--
ALTER TABLE `tour_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tour_types`
--
ALTER TABLE `tour_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_exceptions`
--
ALTER TABLE `hotel_exceptions`
  ADD CONSTRAINT `hotel_exceptions_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `house_policy`
--
ALTER TABLE `house_policy`
  ADD CONSTRAINT `house_policy_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `meal_room`
--
ALTER TABLE `meal_room`
  ADD CONSTRAINT `meal_room_ibfk_1` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`),
  ADD CONSTRAINT `meal_room_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`type`) REFERENCES `room_types` (`id`);

--
-- Constraints for table `room_exceptions`
--
ALTER TABLE `room_exceptions`
  ADD CONSTRAINT `room_exceptions_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_exceptions_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_terms`
--
ALTER TABLE `room_terms`
  ADD CONSTRAINT `room_terms_attr_id_foreign` FOREIGN KEY (`attr_id`) REFERENCES `room_attr` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
