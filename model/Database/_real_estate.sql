-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2016 at 12:39 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `_real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `_alerts`
--

CREATE TABLE IF NOT EXISTS `_alerts` (
  `xx_alert_id` int(7) NOT NULL,
  `xx_email_alert` varchar(3) NOT NULL,
  `xx_message_alert` varchar(3) NOT NULL,
  `xx_property_type` varchar(12) NOT NULL,
  `xx_property_category` enum('House','Land') NOT NULL,
  `xx_county` varchar(30) NOT NULL,
  `xx_sub_county` varchar(30) NOT NULL,
  `xx_buy_rent` varchar(4) NOT NULL,
  `xx_price_from` float NOT NULL,
  `xx_price_to` float NOT NULL,
  `xx_bedroom` int(11) NOT NULL,
  `xx_bathroom` int(3) NOT NULL,
  `xx_acres` float NOT NULL,
  `xx_userId` int(6) NOT NULL,
  `xx_start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xx_end_time` date NOT NULL,
  `xx_alert_status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_alerts`
--

INSERT INTO `_alerts` (`xx_alert_id`, `xx_email_alert`, `xx_message_alert`, `xx_property_type`, `xx_property_category`, `xx_county`, `xx_sub_county`, `xx_buy_rent`, `xx_price_from`, `xx_price_to`, `xx_bedroom`, `xx_bathroom`, `xx_acres`, `xx_userId`, `xx_start_time`, `xx_end_time`, `xx_alert_status`) VALUES
(1, '', '1', '', 'House', 'Kirinyaga County', 'Kerugoya', 'Sale', 8000, 12000, 0, 0, 0, 2, '2016-04-10 11:26:12', '2016-04-06', 'enabled'),
(2, '', '1', '', 'House', 'Bungoma County', 'Bokoli', 'Rent', 45000, 50000, 0, 0, 0, 1, '2016-04-10 11:26:07', '2016-04-06', 'enabled'),
(3, '1', '', '', 'House', 'Kericho County', 'Belgut', 'Rent', 5600, 7000, 0, 0, 0, 1, '2016-04-10 11:26:00', '2016-04-06', 'enabled'),
(6, '1', '', '', 'Land', 'Kirifi County', 'Kilifi North', 'Sale', 150000, 200000, 0, 0, 2, 1, '2016-04-10 11:25:56', '2016-04-06', 'enabled'),
(13, '', '1', 'Bedsitter', 'House', 'Kiambu County', 'Gatundu Nort', 'Rent', 456456, 123412, 6, 3, 0, 1, '2016-04-16 20:58:32', '2016-04-06', 'enabled'),
(14, '1', '', 'Room', 'House', 'Siaya County', 'All', 'Sale', 56756, 789078, 2, 3, 0, 2, '2016-03-06 01:13:11', '2016-04-06', 'enabled'),
(15, '', '1', '', 'Land', 'Taita Taveta', 'Taveta', 'Sale', 2000000, 5000000, 0, 0, 8, 2, '2016-03-06 01:14:25', '2016-04-06', 'enabled'),
(16, '1', '', '', 'Land', 'Nakuru County', 'Kureoi North', 'unde', 5000000, 10000000, 0, 0, 10, 1, '2016-04-10 11:25:41', '2016-04-06', 'enabled'),
(17, '1', '', 'Apartment', 'House', 'Samburu Coun', 'Samburu Nort', 'unde', 20000, 40000, 4, 3, 0, 1, '2016-03-06 01:46:53', '2016-04-06', 'enabled'),
(18, '', '567', 'Bedsitter', 'House', 'Bomet County', 'Bomet County', 'unde', 56767, 567, 56, 76, 0, 1, '2016-03-07 13:04:52', '2016-04-07', 'enabled'),
(19, '', '1', 'House', 'House', 'Nairobi County', 'Kariobangi', 'Rent', 10000, 80000, 1, 1, 0, 3, '2016-04-10 11:44:10', '2016-05-09', 'enabled'),
(20, '1', '', '', 'Land', 'Kiumu County', 'Milimani', 'Rent', 500000, 5000000, 0, 0, 5, 3, '2016-04-10 11:44:17', '2016-05-09', 'enabled'),
(21, '', '1', 'Apartment', 'House', 'Mombasa County', 'Jomvu', 'Rent', 5000, 7002, 5, 1, 0, 1, '2016-04-20 11:22:33', '2016-05-20', 'enabled'),
(22, '', '1', 'Apartment', 'House', 'Kajiando  County', 'Kajiado North', 'Sale', 500000, 1000000, 2, 3, 0, 7, '2016-04-23 15:16:46', '2016-05-23', 'enabled'),
(23, '', '1', 'Apartment', 'House', 'Nairobi County', 'Githurai', 'Sale', 500000, 1000000, 3, 3, 0, 9, '2016-04-25 22:28:29', '2016-05-25', 'enabled'),
(24, '', '1', 'Bedsitter', 'House', 'Kirinyaga County', 'Kerugoya', 'Rent', 10000, 20000, 1, 1, 0, 9, '2016-04-25 22:28:08', '2016-05-26', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `_land`
--

CREATE TABLE IF NOT EXISTS `_land` (
  `xx_land_id` int(6) NOT NULL,
  `xx_acres` float NOT NULL,
  `xx_propertyID` int(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_land`
--

INSERT INTO `_land` (`xx_land_id`, `xx_acres`, `xx_propertyID`) VALUES
(3, 1, 13),
(4, 2, 16),
(8, 2, 27),
(9, 4, 29),
(10, 8, 30),
(11, 2, 33),
(12, 10, 34),
(13, 5, 48),
(14, 1, 49),
(15, 2, 50),
(16, 2, 51);

-- --------------------------------------------------------

--
-- Table structure for table `_pictures`
--

CREATE TABLE IF NOT EXISTS `_pictures` (
  `xx_picture_id` int(7) NOT NULL,
  `xx_picture_url` varchar(40) NOT NULL,
  `xx_property_ID` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_pictures`
--

INSERT INTO `_pictures` (`xx_picture_id`, `xx_picture_url`, `xx_property_ID`) VALUES
(1, '../uploads/56deb9272e0c9.jpg', 5),
(3, '../uploads/56deb9475b27d.jpg', 5),
(4, '../uploads/56debcd119572.jpg', 7),
(5, '../uploads/56debcd8293dc.jpg', 7),
(6, '../uploads/56debce94d9f4.PNG', 13),
(7, '../uploads/56dedc71ebee8.jpg', 8),
(8, '../uploads/56dedc806ff4e.PNG', 12),
(9, '../uploads/56dedc71ebee8.jpg', 6),
(10, '../uploads/56dedc806ff4e.PNG', 10),
(11, '../uploads/56dedc71ebee8.jpg', 10),
(12, '../uploads/56dedc806ff4e.PNG', 6),
(13, '../uploads/56dedc71ebee8.jpg', 16),
(14, '../uploads/56dedc806ff4e.PNG', 16),
(15, '../uploads/56defb33e6354.jpg', 17),
(16, '../uploads/56e0b82a54be2.png', 18),
(17, '../uploads/56e0b8383c9e1.JPG', 18),
(18, '../uploads/56e0b891a70bb.', 18),
(19, '../uploads/56e0b89f07a57.jpg', 18),
(24, '../uploads/56edf91f13a32.jpg', 22),
(25, '../uploads/56edf93034073.jpg', 22),
(26, '../uploads/56edf93034073.jpg', 23),
(27, '../uploads/56edfc05e5e4e.jpg', 23),
(28, '../uploads/56edfc05e5e4e.jpg', 24),
(29, '../uploads/56edfd4af3267.jpg', 25),
(31, '../uploads/56ee00759f9c1.jpg', 27),
(32, '../uploads/56f3221ba0425.jpg', 28),
(33, '../uploads/56fbfdc962d00.jpg', 29),
(34, '../uploads/570480787db1e.jpg', 30),
(35, '../uploads/5705abb51ceac.jpg', 31),
(36, '../uploads/5705abbc53479.jpg', 31),
(37, '../uploads/5705abc2a8572.jpg', 31),
(38, '../uploads/5705abc9ac7bf.jpg', 31),
(39, '../uploads/5705abd03f576.jpg', 31),
(40, '../uploads/5705abda52ad5.jpg', 31),
(41, '../uploads/57064870f1b17.jpg', 32),
(42, '../uploads/57064879c9454.jpg', 32),
(43, '../uploads/57064883b9c47.jpg', 32),
(44, '../uploads/5707e95435ab5.jpg', 33),
(45, '../uploads/5707fcec5df1f.jpg', 34),
(46, '../uploads/5707fcf84e9e3.jpg', 34),
(71, '../uploads/570a4201d3228.jpg', 47),
(72, '../uploads/570a420d505fc.jpg', 47),
(73, '../uploads/570e218a6b2a3.jpg', 48),
(74, '../uploads/570e21a8a59bb.jpg', 48),
(75, '../uploads/5712d9ff596ae.jpg', 49),
(76, '../uploads/571765f562bb2.jpg', 50),
(77, '../uploads/571b9164d51ba.jpg', 51),
(78, '../uploads/571e8fa60cf60.jpg', 52),
(79, '../uploads/571e9a5d40f58.jpg', 53);

-- --------------------------------------------------------

--
-- Table structure for table `_property`
--

CREATE TABLE IF NOT EXISTS `_property` (
  `xx_property_id` int(6) NOT NULL,
  `xx_county` varchar(20) NOT NULL,
  `xx_sub_county` varchar(20) NOT NULL,
  `xx_longitude` varchar(22) NOT NULL,
  `xx_latitude` varchar(22) NOT NULL,
  `xx_property_category` varchar(6) NOT NULL,
  `xx_rent_sale` varchar(4) NOT NULL,
  `xx_description` varchar(100) NOT NULL,
  `xx_price` float NOT NULL,
  `xx_time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `xx_user_identity` int(6) NOT NULL,
  `xx_plan` varchar(9) NOT NULL,
  `xx_status` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_property`
--

INSERT INTO `_property` (`xx_property_id`, `xx_county`, `xx_sub_county`, `xx_longitude`, `xx_latitude`, `xx_property_category`, `xx_rent_sale`, `xx_description`, `xx_price`, `xx_time_added`, `xx_user_identity`, `xx_plan`, `xx_status`) VALUES
(5, 'Kirinyaga County', 'Mwea', '5', '1', 'House', 'Sale', '', 35000, '2016-03-08 02:29:18', 1, 'Free', 'Enabled'),
(6, 'Kirinyaga County', 'Ndia', '5', '1', 'House', 'Sale', 'Good house for sale ', 30000, '2016-03-08 02:30:52', 1, 'Free', 'Enabled'),
(7, 'Nairobi County', 'Hurlinghum', '5', '1', 'House', 'Rent', 'Wooow its a nice bed sitter for you ', 15000, '2016-03-08 02:40:01', 1, 'Free', 'Enabled'),
(8, 'Tana River County', 'Garsen', '5', '1', 'House', 'Rent', 'A room for rent near the main road', 20000, '2016-03-08 02:56:07', 1, 'Featured', 'Enabled'),
(10, 'Tana River County', 'Garsen', '5', '1', 'House', 'Rent', 'A room for rent', 1500, '2016-03-08 11:12:27', 1, 'Free', 'Enabled'),
(12, 'Mombasa County', 'Mombasa Town', '4.213045', '0.01254365', 'House', 'Sale', 'Luxurious house', 150000, '2016-03-08 12:07:40', 1, 'Featured', 'Enabled'),
(13, 'Machako County', 'Matungulu', '4.213045', '0.01254365', 'Land', 'Sale', 'Plot located near the main road', 1000000, '2016-03-08 14:10:58', 1, 'Featured', 'Disabled'),
(16, 'Machako County', 'Matungulu', '4.213045', '0.01254365', 'Land', 'Rent', 'Plot located near the main road', 1500000, '2016-03-08 16:08:19', 1, 'Free', 'Enabled'),
(17, 'Kiumu County', 'Nyakach', '4.213045', '0.01254365', 'House', 'Rent', 'Luxurious guest rooms around lake victoria ', 2500, '2016-03-08 16:18:49', 1, 'Free', 'Enabled'),
(18, 'Nairobi County', 'Garden Estate', '4.213045', '0.01254365', 'House', 'Rent', 'Beautiful apartment for rent', 90000, '2016-03-09 23:58:39', 1, 'Free', 'Enabled'),
(22, 'Meru County', 'Tigania East', '4.213045', '0.01254365', 'House', 'Sale', 'Awesome apartment for a couple', 50000, '2016-03-20 01:23:24', 1, 'Free', 'Enabled'),
(23, 'Nakuru County', 'Naivasha', '4.213045', '0.01254365', 'House', 'Sale', 'Awesome apartment for a couple', 22000, '2016-03-20 01:25:36', 1, 'Free', 'Enabled'),
(24, 'Nyeri County', 'Othaya', '4.213045', '0.01254365', 'House', 'Rent', 'Located in kagere ward', 15000, '2016-03-20 01:27:26', 1, 'Free', 'Enabled'),
(25, 'Muranga County', 'Kangema', '4.213045', '0.01254365', 'House', 'Rent', 'Very cold area', 10000, '2016-03-20 01:31:02', 1, 'Free', 'Enabled'),
(27, 'Laikipia County', 'Laikipia North', '4.213045', '0.01254365', 'Land', 'Rent', 'Flower farm with green houses', 780000, '2016-03-20 01:44:37', 1, 'Free', 'Enabled'),
(28, 'Nyeri County', 'Mukuwe-ini', '4.213045', '0.01254365', 'House', 'Rent', 'Hotel room for rent. Pay per day', 800, '2016-03-23 23:11:22', 1, 'Free', 'Enabled'),
(29, 'Embu County', 'Manyatta', '4.213045', '0.01254365', 'Land', 'Rent', 'Fertile tea plantation land', 2500000, '2016-03-30 16:26:01', 1, 'Free', 'Enabled'),
(30, 'Kisii County', 'Nyaribari Chache', '4.213045', '0.01254365', 'Land', 'Sale', 'Land with a lot of bananas. It is located near a stable water source', 5000000, '2016-04-06 03:24:35', 3, 'Featured', 'Enabled'),
(31, 'Muranga County', 'Kangema', '4.213045', '0.01254365', 'House', 'Rent', 'We have nice residential houses that are fully furnished', 25000, '2016-04-07 00:40:10', 3, 'Featured', 'Enabled'),
(32, 'Nairobi County', 'Kariobangi', '4.213045', '0.01254365', 'House', 'Rent', 'Self contained bedsitter for rent', 45000, '2016-04-07 11:46:25', 3, 'Free', 'Disabled'),
(33, 'Kiumu County', 'Milimani', '4.213045', '0.01254365', 'Land', 'Sale', 'A land near lake victoria', 1000000, '2016-04-08 17:25:02', 3, 'Free', 'Enabled'),
(34, 'Kiambu County', 'Thika Town', '4.213045', '0.01254365', 'Land', 'Sale', 'Farming land near a river.', 5000000, '2016-04-08 18:48:54', 3, 'Free', 'Enabled'),
(47, 'Nairobi County', 'Kariobangi', '3.01452464', '0.01254365', 'House', 'Rent', 'New apartments for rent.', 40000, '2016-04-10 15:04:18', 1, 'Featured', 'Enabled'),
(48, 'Kajiando  County', 'Kajiado Central', '3.01452464', '0.01254365', 'Land', 'Rent', 'Coffee and tea plantation', 450000, '2016-04-13 10:38:43', 4, 'Free', 'Enabled'),
(49, 'Nyeri County', 'Othaya', '3.01452464', '0.01254365', 'Land', 'Sale', 'The land is next to Gura River with good clay soil good for growing plants all seasons', 173000, '2016-04-17 00:34:22', 5, 'Featured', 'Enabled'),
(50, 'Kakamega County', 'Lugari', '3.01452464', '0.01254365', 'Land', 'Rent', 'farming land', 500000, '2016-04-20 11:20:59', 1, 'Featured', 'Enabled'),
(51, 'Mombasa County', 'Kibokoni', '3.01452464', '0.01254365', 'Land', 'Sale', 'Coconut plantation', 1200000, '2016-04-23 15:15:22', 7, 'Free', 'Enabled'),
(52, 'Nairobi County', 'Githurai', '3.01452464', '0.01254365', 'House', 'Rent', 'Nice apartment for sale', 8000000, '2016-04-25 21:47:44', 1, 'Free', 'Enabled'),
(53, 'Kirinyaga County', 'Kerugoya', '3.01452464', '0.01254365', 'House', 'Rent', 'Bedsitter near Kerugoya Stadium', 15000, '2016-04-25 22:30:24', 1, 'Free', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `_property_features`
--

CREATE TABLE IF NOT EXISTS `_property_features` (
  `xx_property_type` varchar(12) NOT NULL,
  `xx_feature_id` int(6) NOT NULL,
  `xx_bathroom` int(3) NOT NULL,
  `xx_bedroom` int(3) NOT NULL,
  `xx_gym` varchar(3) NOT NULL DEFAULT 'No',
  `xx_water_storage` varchar(3) NOT NULL DEFAULT 'No',
  `xx_swimming_pool` varchar(3) NOT NULL DEFAULT 'No',
  `xx_garden` varchar(3) NOT NULL DEFAULT 'No',
  `xx_internet_access` varchar(3) NOT NULL DEFAULT 'No',
  `xx_disability_access` varchar(3) NOT NULL DEFAULT 'No',
  `xx_24_security` varchar(3) NOT NULL DEFAULT 'No',
  `xx_cctv` varchar(3) NOT NULL DEFAULT 'No',
  `xx_alarm_system` varchar(3) NOT NULL DEFAULT 'No',
  `xx_electric_fence` varchar(3) NOT NULL DEFAULT 'No',
  `xx_watch_dog` varchar(3) NOT NULL DEFAULT 'No',
  `xx_wall` varchar(3) NOT NULL DEFAULT 'No',
  `xx_floors` int(2) NOT NULL,
  `xx_parking_space` int(3) NOT NULL,
  `xx_fully_furnished` varchar(3) NOT NULL DEFAULT 'No',
  `xx_property_no` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_property_features`
--

INSERT INTO `_property_features` (`xx_property_type`, `xx_feature_id`, `xx_bathroom`, `xx_bedroom`, `xx_gym`, `xx_water_storage`, `xx_swimming_pool`, `xx_garden`, `xx_internet_access`, `xx_disability_access`, `xx_24_security`, `xx_cctv`, `xx_alarm_system`, `xx_electric_fence`, `xx_watch_dog`, `xx_wall`, `xx_floors`, `xx_parking_space`, `xx_fully_furnished`, `xx_property_no`) VALUES
('Room', 2, 1, 1, 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'No', 'Yes', 0, 0, 'Yes', 7),
('Room', 4, 1, 1, 'No', 'No', 'No', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'No', 'Yes', 0, 0, 'Yes', 6),
('House', 5, 2, 4, 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', 1, 1, 'Yes', 10),
('Room', 7, 1, 1, 'Yes', 'No', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', 0, 1, 'Yes', 17),
('Apartment', 8, 2, 4, 'Yes', 'No', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 0, 2, 'Yes', 18),
('Apartment', 9, 2, 2, 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 0, 0, 'Yes', 22),
('Apartment', 10, 2, 2, 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'No', 'Yes', 0, 0, 'Yes', 23),
('House', 11, 1, 2, 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'No', 'Yes', 0, 0, 'Yes', 24),
('House', 12, 1, 2, 'Yes', 'No', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'No', 'No', 'Yes', 0, 0, 'Yes', 25),
('Room', 13, 1, 1, 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 0, 0, 'Yes', 28),
('House', 14, 1, 2, 'Yes', 'No', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 'No', 0, 1, 'Yes', 31),
('Bedsitter', 15, 1, 1, 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 0, 'Yes', 32),
('Apartment', 28, 2, 4, 'No', 'No', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'No', 1, 2, 'Yes', 47),
('Apartment', 29, 4, 3, 'No', 'No', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', 'No', 'No', 'No', 0, 2, 'Yes', 52),
('Bedsitter', 30, 1, 1, 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 2, 'Yes', 53);

-- --------------------------------------------------------

--
-- Table structure for table `_system_users`
--

CREATE TABLE IF NOT EXISTS `_system_users` (
  `xx_user_id` int(6) NOT NULL,
  `xx_fname` varchar(10) NOT NULL,
  `xx_lname` varchar(10) NOT NULL,
  `xx_gender` varchar(6) NOT NULL,
  `xx_dob` date NOT NULL,
  `xx_username` varchar(20) NOT NULL,
  `xx_user_email` varchar(30) NOT NULL,
  `xx_user_phone` varchar(12) NOT NULL,
  `xx_user_password` varchar(100) NOT NULL,
  `xx_user_type` enum('admin','regular') NOT NULL DEFAULT 'regular',
  `xx_user_status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `xx_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xx_password_reset_code` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_system_users`
--

INSERT INTO `_system_users` (`xx_user_id`, `xx_fname`, `xx_lname`, `xx_gender`, `xx_dob`, `xx_username`, `xx_user_email`, `xx_user_phone`, `xx_user_password`, `xx_user_type`, `xx_user_status`, `xx_created_on`, `xx_password_reset_code`) VALUES
(1, 'Benson', 'Wachira', 'Male', '2016-04-22', 'ben', 'wbenmurimi@gmail.com', '233542615890', 'ebcfd5a11d7cf5ba89f838fc766be7a4', 'regular', 'enabled', '2016-04-10 01:18:43', '9990'),
(3, 'Ebenezer', 'Addo', 'Male', '1993-05-14', 'eben', 'ebenezer.addo@ashesi.edu.gh', '233560223809', 'd998c7e40deb59785f81b66f645c2016', 'regular', 'enabled', '2016-04-10 11:41:32', ''),
(4, 'New User', 'user', 'Male', '2016-02-15', 'user1', 'use1@gmail.com', '233541267897', '24c9e15e52afc47c225b757e7bee1f9d', 'regular', 'enabled', '2016-04-13 10:32:43', ''),
(5, 'francis', 'githee', 'Male', '1991-11-18', 'frank', 'francis.wachira@ashesi.edu.gh', '233', '412ed2e9aeba86664aa62a87e296a1b5', 'regular', 'enabled', '2016-04-17 00:46:36', ''),
(6, 'USER', 'USER', 'Male', '2016-04-04', 'user', 'user@gmail.com', '233542615890', '24c9e15e52afc47c225b757e7bee1f9d', 'regular', 'enabled', '2016-04-20 11:16:17', ''),
(7, 'Daniel', 'Muchoki', 'Male', '2016-04-23', 'daniel', 'a@gfgd.com', '87346237', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'regular', 'enabled', '2016-04-23 15:28:00', ''),
(9, 'Ruth', 'Nyakio', 'Male', '2016-04-15', 'ruth', '', '233504169918', '81ea66d57d6b827ef722f4f20f8a669c', 'regular', 'enabled', '2016-04-25 21:31:51', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_alerts`
--
ALTER TABLE `_alerts`
  ADD PRIMARY KEY (`xx_alert_id`);

--
-- Indexes for table `_land`
--
ALTER TABLE `_land`
  ADD PRIMARY KEY (`xx_land_id`);

--
-- Indexes for table `_pictures`
--
ALTER TABLE `_pictures`
  ADD PRIMARY KEY (`xx_picture_id`);

--
-- Indexes for table `_property`
--
ALTER TABLE `_property`
  ADD PRIMARY KEY (`xx_property_id`);

--
-- Indexes for table `_property_features`
--
ALTER TABLE `_property_features`
  ADD PRIMARY KEY (`xx_feature_id`);

--
-- Indexes for table `_system_users`
--
ALTER TABLE `_system_users`
  ADD PRIMARY KEY (`xx_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_alerts`
--
ALTER TABLE `_alerts`
  MODIFY `xx_alert_id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `_land`
--
ALTER TABLE `_land`
  MODIFY `xx_land_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `_pictures`
--
ALTER TABLE `_pictures`
  MODIFY `xx_picture_id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `_property`
--
ALTER TABLE `_property`
  MODIFY `xx_property_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `_property_features`
--
ALTER TABLE `_property_features`
  MODIFY `xx_feature_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `_system_users`
--
ALTER TABLE `_system_users`
  MODIFY `xx_user_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
