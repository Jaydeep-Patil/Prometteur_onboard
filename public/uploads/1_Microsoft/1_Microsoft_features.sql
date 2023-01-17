-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 11:38 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u419739786_prometteur21`
--

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `module_id` int(11) NOT NULL,
  `timeline` float NOT NULL COMMENT 'web end hrs',
  `mobile_timeline` int(11) NOT NULL DEFAULT 0 COMMENT 'mobile end hours',
  `price` float NOT NULL COMMENT 'base price',
  `admin_panel` int(11) NOT NULL DEFAULT 0 COMMENT 'hrs',
  `web_services` int(11) NOT NULL DEFAULT 0 COMMENT 'hrs',
  `database_hrs` int(11) NOT NULL DEFAULT 0 COMMENT 'hrs',
  `support` int(11) NOT NULL DEFAULT 0,
  `is_selected` int(1) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `module_id`, `timeline`, `mobile_timeline`, `price`, `admin_panel`, `web_services`, `database_hrs`, `support`, `is_selected`, `created`) VALUES
(13, 'Via Email and password', 1, 8, 8, 15, 2, 2, 2, 0, 1, '2022-02-23 04:13:11'),
(14, 'Facebook & Google', 1, 16, 30, 15, 4, 0, 2, 0, 0, '2022-02-23 04:13:24'),
(17, 'Map view', 2, 8, 8, 15, 0, 1, 1, 0, 1, '2022-02-18 06:01:38'),
(18, 'Grid View', 2, 6, 6, 15, 0, 1, 1, 0, 0, '2022-02-18 06:01:38'),
(19, 'Order tracking Process for deliveries', 2, 15, 15, 15, 20, 4, 4, 0, 1, '2022-02-18 06:01:38'),
(20, 'Advanced Search functionality', 3, 20, 20, 15, 4, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(21, 'Advanced filters', 3, 24, 24, 15, 8, 4, 2, 0, 1, '2022-02-18 06:01:38'),
(22, 'Each language integration', 4, 24, 24, 15, 20, 8, 8, 0, 1, '2022-02-18 06:01:38'),
(23, 'Currency conversion possible ', 5, 16, 16, 15, 16, 4, 4, 0, 1, '2022-02-18 06:01:38'),
(24, 'Multi vendor for E-Commerce', 6, 160, 160, 15, 160, 80, 80, 0, 1, '2022-02-18 06:01:38'),
(25, 'Integration for Booking', 7, 40, 40, 15, 16, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(26, ' Integration for event reminders', 7, 24, 24, 15, 8, 4, 4, 0, 1, '2022-02-18 06:01:38'),
(27, 'Text chat', 8, 40, 40, 15, 10, 8, 4, 0, 1, '2022-02-18 06:01:38'),
(28, 'Voice chat', 8, 40, 40, 15, 10, 8, 4, 0, 0, '2022-02-18 06:01:38'),
(29, 'Video Chat', 8, 40, 40, 15, 10, 8, 4, 0, 1, '2022-02-18 06:01:38'),
(30, 'For OTP as well as Custom messages', 9, 16, 16, 15, 4, 4, 2, 0, 1, '2022-02-18 06:01:38'),
(31, 'Stripe', 11, 40, 40, 15, 8, 4, 2, 0, 0, '2022-02-18 06:01:38'),
(32, 'CCAvenue', 11, 40, 40, 15, 8, 4, 2, 0, 0, '2022-02-18 06:01:38'),
(33, 'Netbanking', 11, 40, 40, 15, 8, 4, 2, 0, 0, '2022-02-18 06:01:38'),
(34, 'CC / DC / Mastercard', 11, 40, 40, 15, 8, 4, 2, 0, 0, '2022-02-18 06:01:38'),
(35, 'Airtel Money', 11, 60, 60, 15, 8, 4, 2, 0, 0, '2022-02-18 06:01:38'),
(36, 'Orange money', 11, 60, 60, 15, 8, 4, 2, 0, 0, '2022-02-18 06:01:38'),
(37, 'MTN money', 11, 60, 60, 15, 8, 4, 2, 0, 0, '2022-02-18 06:01:38'),
(38, 'Moov Money', 11, 60, 60, 15, 8, 4, 2, 0, 0, '2022-02-18 06:01:38'),
(39, 'Google Pay', 11, 24, 24, 15, 8, 4, 2, 0, 0, '2022-02-18 06:24:32'),
(40, 'Paytm', 11, 24, 24, 15, 8, 4, 2, 0, 0, '2022-02-18 06:01:38'),
(41, 'PayPal', 11, 16, 16, 15, 4, 2, 1, 0, 1, '2022-02-18 06:01:38'),
(42, 'Add / Withdraw amount to bank account', 12, 24, 24, 15, 4, 2, 1, 0, 1, '2022-02-18 06:01:38'),
(43, 'Email Notifications', 13, 6, 6, 15, 4, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(44, 'Product Category range with products range under each category', 37, 20, 20, 15, 8, 8, 8, 0, 0, '2022-02-18 06:01:38'),
(45, 'Third Party Integrations', 15, 24, 24, 15, 8, 8, 4, 0, 0, '2022-02-18 06:25:38'),
(46, 'Images / Videos / Docs / PDFs / Sheets / CSV / XML', 38, 24, 24, 15, 4, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(47, 'Payment History', 39, 12, 12, 15, 8, 2, 2, 0, 0, '2022-02-18 06:01:38'),
(48, 'Booking/Order History', 39, 16, 16, 15, 10, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(49, 'Coupon Codes ', 18, 16, 16, 15, 10, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(50, 'Reward Points ', 18, 24, 24, 15, 10, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(51, 'Promotional Offers ', 18, 16, 16, 15, 10, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(52, 'Referral Points', 18, 16, 16, 15, 10, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(53, 'Advertisment area in app or website', 40, 20, 20, 15, 10, 4, 4, 0, 0, '2022-02-18 06:01:38'),
(56, 'In case of Betting apps or site', 41, 80, 80, 15, 40, 24, 16, 0, 0, '2022-02-18 06:01:38'),
(57, 'For E-commerce integration', 42, 40, 40, 15, 24, 16, 16, 0, 0, '2022-02-18 06:01:38'),
(58, 'One Page Checkout', 43, 24, 24, 15, 8, 8, 8, 0, 0, '2022-02-18 06:33:24'),
(59, 'Wishlist Integration', 44, 12, 12, 15, 4, 4, 4, 0, 0, '2022-02-18 06:33:52'),
(60, 'Customisable Product Module', 26, 40, 40, 15, 24, 16, 8, 0, 0, '2022-02-18 06:34:28'),
(61, 'Rating and Review Integration', 27, 16, 16, 15, 8, 4, 4, 0, 0, '2022-02-18 06:34:48'),
(62, 'Forum Integration', 28, 8, 8, 15, 4, 4, 4, 0, 0, '2022-02-18 06:35:12'),
(63, 'Newsletter Integration', 29, 8, 8, 15, 8, 4, 4, 0, 0, '2022-02-18 06:36:15'),
(64, 'Single vendor - Multiple Stores', 45, 60, 60, 15, 40, 20, 20, 0, 0, '2022-02-23 07:17:03'),
(66, 'OTP Verification', 1, 8, 8, 15, 2, 2, 2, 0, 0, '2022-02-17 10:30:58'),
(67, 'Razor Pay', 11, 24, 20, 15, 4, 2, 1, 0, 0, '2022-02-17 10:55:07'),
(68, 'Video Conference integration', 10, 40, 40, 15, 8, 8, 2, 0, 0, '2022-02-17 11:50:23'),
(69, 'Integrate Google Analytics in Dashboard', 46, 24, 24, 15, 0, 0, 0, 0, 0, '2022-02-17 11:52:40'),
(70, 'In App Purchases', 32, 0, 8, 15, 2, 1, 1, 0, 0, '2022-02-18 06:30:20'),
(71, 'Subscription Plans', 33, 8, 8, 15, 2, 4, 4, 0, 0, '2022-02-18 06:36:49'),
(73, 'Online Booking Module - Select time and date for Booking', 35, 12, 12, 15, 4, 2, 2, 0, 0, '2022-02-18 06:01:38'),
(74, 'Integrate Reports - 5 to 6 reports considered', 36, 0, 0, 15, 8, 2, 4, 0, 0, '2022-02-18 06:01:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
