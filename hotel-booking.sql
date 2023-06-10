-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 11:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `type` int(11) NOT NULL,
  `title` text NOT NULL,
  `order_date` text NOT NULL,
  `status` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `type`, `title`, `order_date`, `status`, `customer`, `payment_method`, `total`, `invoice_id`) VALUES
(1, 1, 'Hotel 2', '2023-05-31', 0, 5, 1, '150.00', 0);

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
  `creation_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `price`, `location`, `description`, `banner`, `images`, `terms`, `creation_date`) VALUES
(1, 'Test Hotel Edit', '450.00', 'Maadi', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579962910.jpg,168579962917.jpg,168579962987.jpg', ' 1,2,3,4,5,6,7,8,9', '2023-05-31'),
(2, 'Hotel 2', '400.00', 'Alexandria', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '1685795520.jpg,1685795520.jpg', '  1,2,3,4,5,6,7,8,9', '2023-05-31'),
(3, 'Hotel 3', '350.00', 'Alexandria', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '2023-05-31'),
(4, 'Hotel 4', '500.00', 'Hurghada', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', ' 1,2,3,4,5,6,7,8,9', '2023-05-31'),
(5, 'Hotel 6', '650.00', 'Sharm El-shiekh', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '2023-05-31'),
(6, 'Hotel 10', '150.00', 'Cairo', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '2023-06-01'),
(7, 'Hotel 10', '420.00', 'Maaddi', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '2023-06-01'),
(8, 'Hotel 1', '250.00', 'Cairo', 'test', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '2023-06-03'),
(9, 'Al Maza Hotel', '700.00', 'Cairo', '<h2>Al Maza Hotel</h2><ul><li><strong>Test 1</strong></li><li><strong>Test 2</strong></li><li><strong>Test 3</strong></li><li><strong>Test 4</strong></li></ul>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '2023-06-03'),
(10, 'Hotel Pics', '250.00', 'Cairo', '<h1>TEST</h1>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', '  1,2,3,4,5,6,7,8,9', '2023-06-03'),
(11, 'Hotel 1', '350.00', 'Alexandria', '<p>daaddada</p>', '', '168579890438.jpg,168579890469.jpg,168579890416.jpeg', ' 1,2,3,4,5,6,7,8,9', '2023-06-03'),
(12, 'Test Hotel', '40.00', 'Test', '<p>test</p>', '168622302524.jpg', '168622302533.jpeg,168622302555.jpg,168622302540.PNG', '1,2,3,8,9,10,11,18,19,21', '2023-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_attr`
--

CREATE TABLE `hotel_attr` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_attr`
--

INSERT INTO `hotel_attr` (`id`, `name`) VALUES
(1, 'Hotel Service'),
(5, 'Property type'),
(6, 'Facilities');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_exceptions`
--

CREATE TABLE `hotel_exceptions` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `new_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_exceptions`
--

INSERT INTO `hotel_exceptions` (`id`, `hotel_id`, `start_date`, `end_date`, `new_price`) VALUES
(2, 3, '2023-07-05', '2023-08-05', '500.00'),
(3, 1, '2023-07-07', '2023-07-10', '50.00'),
(4, 1, '2023-06-13', '2023-06-23', '140.00'),
(5, 2, '2023-07-29', '2023-08-10', '700.00');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_terms`
--

CREATE TABLE `hotel_terms` (
  `id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_terms`
--

INSERT INTO `hotel_terms` (`id`, `attr_id`, `name`) VALUES
(1, 1, 'Havana Lobby bar'),
(2, 1, 'Fiesta Restaurant'),
(3, 1, 'Hotel transport services'),
(4, 1, 'Free luggage deposit'),
(5, 1, 'Laundry Services'),
(6, 1, 'Pets welcome'),
(7, 1, 'Tickets'),
(8, 5, 'Apartments'),
(9, 5, 'Hotels'),
(10, 5, 'Homestays'),
(11, 5, 'Villas'),
(12, 5, 'Boats'),
(13, 5, 'Motels'),
(14, 5, 'Resorts'),
(15, 5, 'Lodges'),
(16, 5, 'Holiday homes'),
(17, 5, 'Cruises'),
(18, 6, 'Wake-up call'),
(19, 6, 'Car hire'),
(20, 6, 'Bicycle hire'),
(21, 6, 'Flat Tv'),
(22, 6, 'Laundry and dry cleaning'),
(23, 6, 'Internet – Wifi'),
(24, 6, 'Coffee and tea');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`) VALUES
(1, 'Admin', '2023-06-01'),
(2, 'User', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE `subcribers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcribers`
--

INSERT INTO `subcribers` (`id`, `name`, `email`, `created_at`) VALUES
(1, 'Test Subscriber', 'subscriber@gmail.com', '2023-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `duration` text NOT NULL,
  `min_people` int(11) NOT NULL,
  `max_people` int(11) NOT NULL,
  `location` text NOT NULL,
  `latitude` text DEFAULT NULL,
  `longtuide` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `tour_date` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `title`, `category_id`, `duration`, `min_people`, `max_people`, `location`, `latitude`, `longtuide`, `price`, `sale_price`, `tour_date`, `created_at`) VALUES
(1, 'Dream Park Edited', 1, '12 hours', 10, 50, 'Madinat Nasr', NULL, NULL, '300.00', NULL, '2023-06-14', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `tour_attr`
--

CREATE TABLE `tour_attr` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_category`
--

INSERT INTO `tour_category` (`id`, `name`, `created_at`) VALUES
(1, 'Daytour', '2023-06-02'),
(2, 'Multi-Day Packages', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `tour_terms`
--

CREATE TABLE `tour_terms` (
  `id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_terms`
--

INSERT INTO `tour_terms` (`id`, `attr_id`, `name`) VALUES
(1, 1, 'Cultural'),
(2, 1, 'Nature & Adventure'),
(3, 1, 'Marine'),
(4, 1, 'Independent'),
(5, 1, 'Activities'),
(6, 1, 'Festival & Events'),
(7, 1, 'Special Interest'),
(8, 2, 'Wifi'),
(9, 2, 'Gymnasium'),
(10, 2, 'Mountain Bike'),
(11, 2, 'Satellite Office'),
(12, 2, 'Staff Lounge'),
(13, 2, 'Golf Cages'),
(14, 2, 'Aerobics Room');

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
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `gender`, `phone`, `country`, `bio`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 'hotels admin', 'admin_hotels', 'admin@yahoo.com', '$2y$10$D3wRvyUHjMpKAuskS.T6JuuAin8u0OLYtyYHZ0XgfmROjp1Jc1zTC', 1, '01007046215', 'Egypt', '<p><em>Admin</em></p><p><br></p>', 1, '2023-06-01', '2023-06-01'),
(3, 'test user', 'user_hotels', 'user@gmail.com', '$2y$10$1H3KzNc8U44NhiYBhvFPPeLRMc58fowrz0yC7ZH8U2uREOhep6TDi', 1, '01024178367', 'Egypt', '<p><strong>User Test</strong></p>', 2, '2023-06-01', '2023-06-01'),
(4, 'user 1', 'user1', 'user1@gmail.com', '$2y$10$A4rNmMq9wQaLgXQzPCROiePZgcutyipOUYsCKvoy/IC.QCgbeERcy', 1, '01007046258', 'Egypt', '', 2, '2023-06-01', ''),
(5, 'ahmed samy', 'ahmed_samy15', 'ahmed@gmail.com', '$2y$10$CKUVuqfubenx1dObxwsAcuCOpqY6MYO5GJU9ob5nnZOuPi5nrvZra', 1, '0100405421', 'Egypt', '', 2, '2023-06-01', ''),
(6, 'Farida samy', 'farida_samy', 'farida@gmail.com', '$2y$10$F.9ombsnLYNGgitNOvn8Yu5ct1EMyLq3hAYjUVJiCSmQRDI8F4./6', 2, '01004536987', 'Egypt', '', 2, '2023-06-01', ''),
(7, 'samy mohamed', 'samy_admin', 'samy@gmail.com', '$2y$10$7QfN9t5TeTOpmoj2ab0CF.hormy0H9fFGmdY15Uy4SxQBk3A/kWhm', 1, '01002547852', 'Egypt', '', 1, '2023-06-01', ''),
(8, 'Mohamed Wael', 'wael74_', 'wael@gmail.com', '$2y$10$q0LgBTsDJH3wAHUTej8fnOcvaIx4ZQrMtEUcyedvua7HmxZotGxLa', 1, '01147856932', 'Egypt', '', 2, '2023-06-01', ''),
(9, 'Mahmoud Adel', 'mahmoud_adel77', 'mahmoud_adel@gmail.com', '$2y$10$e5.EWYmCFNoWE1FiE1OIY.l1kArN6r24yG/aULPuRj3i85jcaKWpm', 1, '01002536987', 'Egypt', '', 2, '2023-06-01', ''),
(10, 'Ahmed Samy', 'ahmed_samy2020', 'ahmed_samy@gmail.com', '$2y$10$1iAw5o0DNDrGA2P03QEN6Obw5mDDz4r2iC8e/SgQ7zqPiEIeXDsdy', 1, '01007046215', 'Egypt', '<p><strong>Ahmed Samy</strong></p>', 2, '2023-06-01', ''),
(11, 'Mohamed Essam', 'mo_essam', 'mo_essam@gmail.com', '$2y$10$D4NIyp9ppiBf0MCwlKmNp.z/zaP2Z4dwfkXtGF7kluf9K87jI34q.', 1, '01024178367', 'United Arab Emirates', '<p><br></p>', 2, '2023-06-01', ' '),
(12, 'Test Admin Aadd', 'test_admin', 'test@gmail.com', '$2y$10$fcwmaJ2lNjZZykRwWhR0ru0oqikYO4Cc/ZEORt0jWvGwFzZ79TKVO', 1, '01123654789', 'Afghanistan', '<p><u>Test</u></p>', 1, '2023-06-01', ' ');

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
-- Indexes for table `hotel_exceptions`
--
ALTER TABLE `hotel_exceptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_terms`
--
ALTER TABLE `hotel_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- Indexes for table `tour_terms`
--
ALTER TABLE `tour_terms`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotel_attr`
--
ALTER TABLE `hotel_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotel_exceptions`
--
ALTER TABLE `hotel_exceptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel_terms`
--
ALTER TABLE `hotel_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcribers`
--
ALTER TABLE `subcribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour_attr`
--
ALTER TABLE `tour_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tour_category`
--
ALTER TABLE `tour_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tour_terms`
--
ALTER TABLE `tour_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
