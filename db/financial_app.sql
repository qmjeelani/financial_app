-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2015 at 08:12 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `financial_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `assumptions`
--

CREATE TABLE IF NOT EXISTS `assumptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `inflation_rate` varchar(2) DEFAULT NULL,
  `increase_food_covers` varchar(3) DEFAULT NULL,
  `employees_increase_no` varchar(2) DEFAULT NULL,
  `occupancy_increase` varchar(2) DEFAULT NULL,
  `arr_increase` varchar(2) DEFAULT NULL,
  `food_cost` varchar(3) DEFAULT NULL,
  `beverage_cost` varchar(3) DEFAULT NULL,
  `mod_cost_of_sale` varchar(3) DEFAULT NULL,
  `permit_room_cost_sale` varchar(3) DEFAULT NULL,
  `sports_recreation_cost_sale` varchar(3) DEFAULT NULL,
  `interestbank_loan` varchar(10) DEFAULT NULL,
  `depreciation` varchar(2) DEFAULT NULL,
  `taxation` varchar(3) DEFAULT NULL,
  `amortization` varchar(2) DEFAULT NULL,
  `wealth_tax` varchar(2) DEFAULT NULL,
  `deferred_tax` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `assumptions`
--

INSERT INTO `assumptions` (`id`, `branch_id`, `year_id`, `inflation_rate`, `increase_food_covers`, `employees_increase_no`, `occupancy_increase`, `arr_increase`, `food_cost`, `beverage_cost`, `mod_cost_of_sale`, `permit_room_cost_sale`, `sports_recreation_cost_sale`, `interestbank_loan`, `depreciation`, `taxation`, `amortization`, `wealth_tax`, `deferred_tax`) VALUES
(1, 1, 1, '7', '10', '1', '1', '5', '31', '18', '26', '71', '20', '18', '4', '4', '1', '1', '1'),
(2, 2, 1, '5', '1', '1', '5', '33', '20', '72', '73', '37', '2', '3', '6', '3', '1', '1', '1'),
(3, 3, 1, '5', '1', '1', '5', '33', '20', '72', '73', '37', '2', '3', '6', '4', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`) VALUES
(1, 'Islamabad Branch'),
(2, 'Faisalabad Branch'),
(3, 'Quetta Branch');

-- --------------------------------------------------------

--
-- Table structure for table `consolidated_attributes`
--

CREATE TABLE IF NOT EXISTS `consolidated_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `consolidated_attributes`
--

INSERT INTO `consolidated_attributes` (`id`, `branch_id`, `attribute`, `value`) VALUES
(1, 1, 'Room Department Sales', '767170.60'),
(2, 2, 'Room Department Sales', '125429.66'),
(3, 3, 'Room Department Sales', '149323.61'),
(4, 1, 'Payroll & Related Expenses', '33755.51'),
(5, 2, 'Payroll & Related Expenses', '10912.38'),
(6, 3, 'Payroll & Related Expenses', '8511.45'),
(7, 1, 'Other Expenses', '50633.26'),
(8, 2, 'Other Expenses', '8152.93'),
(9, 3, 'Other Expenses', '6719.56'),
(10, 1, 'Food Sales', '221453.96'),
(11, 2, 'Food Sales', '107033.90'),
(12, 3, 'Food Sales', '72034.00'),
(13, 1, 'Beverage Sales', '18127.20'),
(14, 2, 'Beverage Sales', '6447.82'),
(15, 3, 'Beverage Sales', '5762.72'),
(16, 1, 'Other Income Fnb', '38812'),
(17, 2, 'Other Income Fnb', '3543'),
(18, 3, 'Other Income Fnb', '7045'),
(19, 1, 'Total Sales FnB', '278393.16'),
(20, 2, 'Total Sales FnB', '117024.72'),
(21, 3, 'Total Sales FnB', '84841.72'),
(22, 1, 'Food Cost', '77730.34'),
(23, 2, 'Food Cost', '39067.37'),
(24, 3, 'Food Cost', '25572.07'),
(25, 1, 'Beverage Cost', '3697.95'),
(26, 2, 'Beverage Cost', '1315.36'),
(27, 3, 'Beverage Cost', '178.64'),
(28, 1, 'Other Income Cost Fnb', '0.0'),
(29, 2, 'Other Income Cost Fnb', '0.0'),
(30, 3, 'Other Income Cost Fnb', '0.0'),
(31, 1, 'Payroll & Related Expenses', '70433.47'),
(32, 2, 'Payroll & Related Expenses', '27851.88'),
(33, 3, 'Payroll & Related Expenses', '26131.25'),
(34, 1, 'Other Expenses Fnb', '39253.44'),
(35, 2, 'Other Expenses Fnb', '11468.42'),
(36, 3, 'Other Expenses Fnb', '5938.92'),
(37, 1, 'Minor Operating Sales', '18867'),
(38, 2, 'Minor Operating Sales', '18867'),
(39, 3, 'Minor Operating Sales', '1933'),
(40, 1, 'Minor Operating Cost Sales', '7037.39'),
(41, 2, 'Minor Operating Cost Sales', '13263.50'),
(42, 3, 'Minor Operating Cost Sales', '931.71'),
(43, 1, 'Sports & Recreation Sales', '11759'),
(44, 2, 'Sports & Recreation Sales', '2416'),
(45, 3, 'Sports & Recreation Sales', '1406'),
(46, 1, 'Sports & Recreation Expenses', '4127.41'),
(47, 2, 'Sports & Recreation Expenses', '947.07'),
(48, 3, 'Sports & Recreation Expenses', '677.69'),
(49, 1, 'Rental & Other Income', '6727'),
(50, 2, 'Rental & Other Income', '2513'),
(51, 3, 'Rental & Other Income', '1755'),
(52, 1, 'Head Office Income', '11211'),
(53, 2, 'Head Office Income', '7353'),
(54, 3, 'Head Office Income', '2535'),
(55, 1, 'Hotel Admin & General', '87123.84'),
(56, 2, 'Hotel Admin & General', '24515.97'),
(57, 3, 'Hotel Admin & General', '25417.51'),
(58, 1, 'Local Sales & Marketing', '29041.28'),
(59, 2, 'Local Sales & Marketing', '4745.03'),
(60, 3, 'Local Sales & Marketing', '4579.73'),
(61, 1, 'Energy Costs', '62231.31'),
(62, 2, 'Energy Costs', '30842.67'),
(63, 3, 'Energy Costs', '25417.51'),
(64, 1, 'Repair & Maintenance', '60156.94'),
(65, 2, 'Repair & Maintenance', '20298.17'),
(66, 3, 'Repair & Maintenance', '20379.81'),
(67, 1, 'Real Estate Taxes/ Insurance', '41487.54'),
(68, 2, 'Real Estate Taxes/ Insurance', '5799.48'),
(69, 3, 'Real Estate Taxes/ Insurance', '15113.12'),
(70, 1, 'Admin & Finance', '35264.41'),
(71, 2, 'Admin & Finance', '10808.11'),
(72, 3, 'Admin & Finance', '11678.32'),
(73, 1, 'Marketing', '5185.94'),
(74, 2, 'Marketing', '1845.29'),
(75, 3, 'Marketing', '1831.89'),
(76, 1, 'Management (Royalty) Fee', '36301.60'),
(77, 2, 'Management (Royalty) Fee', '9226.44'),
(78, 3, 'Management (Royalty) Fee', '8014.53'),
(79, 1, 'Depreciation', '414.88'),
(80, 2, 'Depreciation', '158.17'),
(81, 3, 'Depreciation', '137.39'),
(82, 1, 'Amortization', '103.72'),
(83, 2, 'Amortization', '26.36'),
(84, 3, 'Amortization', '22.90'),
(85, 1, 'Taxation', '18005.90'),
(86, 2, 'Taxation', '50788.01'),
(87, 3, 'Taxation', '2181.61');

-- --------------------------------------------------------

--
-- Table structure for table `heads`
--

CREATE TABLE IF NOT EXISTS `heads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `heads`
--

INSERT INTO `heads` (`id`, `branch_id`, `name`) VALUES
(1, 1, 'Rooms Department'),
(2, 1, 'Food & Beverage Department'),
(3, 1, 'Minor Operating Department'),
(4, 2, 'Rooms Department'),
(5, 2, 'Food & Beverage Department'),
(6, 2, 'Minor Operating Department'),
(7, 3, 'Rooms Department'),
(8, 3, 'Food & Beverage Department'),
(9, 3, 'Minor Operating Department'),
(10, 1, 'Undistributed Operating Expenses'),
(11, 2, 'Undistributed Operating Expenses'),
(12, 3, 'Undistributed Operating Expenses'),
(13, 1, 'Head Office Charges'),
(14, 2, 'Head Office Charges'),
(15, 3, 'Head Office Charges');

-- --------------------------------------------------------

--
-- Table structure for table `heads_values`
--

CREATE TABLE IF NOT EXISTS `heads_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `head_id` int(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `expense` tinyint(1) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='The department Head attributes and theirr Values' AUTO_INCREMENT=139 ;

--
-- Dumping data for table `heads_values`
--

INSERT INTO `heads_values` (`id`, `head_id`, `attribute`, `value`, `expense`, `year_id`) VALUES
(1, 1, 'Payroll & Related Expenses', '4.4', 1, 1),
(2, 1, 'Other Expenses', '6.6', 1, 1),
(3, 2, 'Other Income', '38812', 0, 1),
(4, 2, 'Food Cost', '35.1', 0, 1),
(5, 2, 'Beverage Cost', '20.4', 0, 1),
(6, 2, 'Other Expenses', '0.0', 1, 1),
(7, 2, 'Payroll & Related Expenses', '25.3', 1, 1),
(8, 2, 'Other Expenses', '14.1', 1, 1),
(9, 3, 'Sales', '18867', 0, 1),
(10, 3, 'Cost of Sales', '37.3', 0, 1),
(11, 3, 'Sports & Recreation Sales', '11759', 0, 1),
(12, 3, 'Sports & Recreation Expenses', '35.1', 0, 1),
(13, 3, 'Rental & Other Income', '6727', 0, 1),
(14, 3, 'Head Office Income', '11211', 0, 1),
(15, 4, 'Payroll & Related Expenses', '8.7', 1, 1),
(16, 4, 'Other Expenses', '6.5', 1, 1),
(17, 5, 'Other Income', '3543', 0, 1),
(18, 5, 'Food Cost', '36.5', 0, 1),
(19, 5, 'Beverage Cost', '20.4', 0, 1),
(20, 5, 'Other Expenses', '0.0', 1, 1),
(21, 5, 'Payroll & Related Expenses', '23.8', 1, 1),
(22, 5, 'Other Expenses', '9.8', 1, 1),
(23, 6, 'Sales', '18867', 0, 1),
(24, 6, 'Cost of Sales', '70.3', 0, 1),
(25, 6, 'Sports & Recreation Sales', '2416', 0, 1),
(26, 6, 'Sports & Recreation Expenses', '39.2', 0, 1),
(27, 6, 'Rental & Other Income', '2513', 0, 1),
(28, 6, 'Head Office Income', '7353', 0, 1),
(29, 7, 'Payroll & Related Expenses', '5.7', 1, 1),
(30, 7, 'Other Expenses', '4.5', 1, 1),
(31, 8, 'Other Income', '7045', 0, 1),
(32, 8, 'Food Cost', '35.5', 0, 1),
(33, 8, 'Beverage Cost', '3.1', 0, 1),
(34, 8, 'Other Expenses', '0.0', 1, 1),
(35, 8, 'Payroll & Related Expenses', '30.8', 1, 1),
(36, 8, 'Other Expenses', '7,6', 1, 1),
(37, 9, 'Sales', '1933', 0, 1),
(38, 9, 'Cost of Sales', '48.2', 0, 1),
(39, 9, 'Sports & Recreation Sales', '1406', 0, 1),
(40, 9, 'Sports & Recreation Expenses', '48.2', 0, 1),
(41, 9, 'Rental & Other Income', '1755', 0, 1),
(42, 9, 'Head Office Income', '2535', 0, 1),
(43, 10, 'Hotel Admin & General', '8.4', 1, 1),
(44, 10, 'Local Sales & Marketing', '2.8', 1, 1),
(45, 10, 'Energy Costs', '6.0', 1, 1),
(46, 10, 'Repair & Maintenance', '5.8', 1, 1),
(47, 10, 'Real Estate Taxes/ Insurance', '4.0', 1, 1),
(48, 11, 'Hotel Admin & General', '9.3', 1, 1),
(49, 11, 'Local Sales & Marketing', '1.8', 1, 1),
(50, 11, 'Energy Costs', '11.7', 1, 1),
(51, 11, 'Repair & Maintenance', '7.7', 1, 1),
(52, 11, 'Real Estate Taxes/ Insurance', '2.2', 1, 1),
(53, 12, 'Hotel Admin & General', '11.1', 1, 1),
(54, 12, 'Local Sales & Marketing', '2.0', 1, 1),
(55, 12, 'Energy Costs', '11.1', 1, 1),
(56, 12, 'Repair & Maintenance', '8.9', 1, 1),
(57, 12, 'Real Estate Taxes/ Insurance', '6.6', 1, 1),
(58, 13, 'Total Deductions', '7.4', 1, 1),
(59, 14, 'Total Deductions', '8.3', 1, 1),
(60, 15, 'Total Deductions', '6.6', 1, 1),
(61, 13, 'Admin & Finance', '3.4', 1, 1),
(62, 13, 'Marketing', '0.5', 1, 1),
(63, 13, 'Management Fee', '3.5', 1, 1),
(64, 14, 'Admin & Finance', '4.1', 1, 1),
(65, 14, 'Marketing', '0.7', 1, 1),
(66, 14, 'Management Fee', '3.5', 1, 1),
(67, 15, 'Admin & Finance', '5.1', 1, 1),
(68, 15, 'Marketing', '0.8', 1, 1),
(69, 15, 'Management Fee', '3.5', 1, 1),
(70, 1, 'Payroll & Related Expenses', '4.0', 1, 2),
(71, 1, 'Other Expenses', '6.6', 1, 2),
(72, 2, 'Other Income', '39768', 0, 2),
(73, 2, 'Food Cost', '35.8', 0, 2),
(74, 2, 'Beverage Cost', '17.3', 0, 2),
(75, 2, 'Other Expenses', '0.0', 1, 2),
(76, 2, 'Payroll & Related Expenses', '23.3', 1, 2),
(77, 2, 'Other Expenses', '13.1', 1, 2),
(78, 3, 'Sales', '20395', 0, 2),
(79, 3, 'Cost of Sales', '36.9', 0, 2),
(80, 3, 'Sports & Recreation Sales', '20148', 0, 2),
(81, 3, 'Sports & Recreation Expenses', '40.0', 0, 2),
(82, 3, 'Rental & Other Income', '7818', 0, 2),
(83, 3, 'Head Office Income', '13600', 0, 2),
(84, 4, 'Payroll & Related Expenses', '8.1', 1, 2),
(85, 4, 'Other Expenses', '6.0', 1, 2),
(86, 5, 'Other Income', '3,935', 0, 2),
(87, 5, 'Food Cost', '35.5', 0, 2),
(88, 5, 'Beverage Cost', '20.0', 0, 2),
(89, 5, 'Other Expenses', '0.0', 1, 2),
(90, 5, 'Payroll & Related Expenses', '24.5', 1, 2),
(91, 5, 'Other Expenses', '10.1', 1, 2),
(92, 6, 'Sales', '3476', 0, 2),
(93, 6, 'Cost of Sales', '65.0', 0, 2),
(94, 6, 'Sports & Recreation Sales', '2658', 0, 2),
(95, 6, 'Sports & Recreation Expenses', '39.2', 0, 2),
(96, 6, 'Rental & Other Income', '1975', 0, 2),
(97, 6, 'Head Office Income', '8088', 0, 2),
(98, 7, 'Payroll & Related Expenses', '5.9', 1, 2),
(99, 7, 'Other Expenses', '6.5', 1, 2),
(100, 8, 'Other Income', '8045', 0, 2),
(101, 8, 'Food Cost', '37.2', 0, 2),
(102, 8, 'Beverage Cost', '3.1', 0, 2),
(103, 8, 'Other Expenses', '0.0', 1, 2),
(104, 8, 'Payroll & Related Expenses', '31.2', 1, 2),
(105, 8, 'Other Expenses', '7,6', 1, 2),
(106, 9, 'Sales', '1933', 0, 2),
(107, 9, 'Cost of Sales', '48.2', 0, 2),
(108, 9, 'Sports & Recreation Sales', '2268', 0, 2),
(109, 9, 'Sports & Recreation Expenses', '47.0', 0, 2),
(110, 9, 'Rental & Other Income', '1930', 0, 2),
(111, 9, 'Head Office Income', '2500', 0, 2),
(112, 10, 'Hotel Admin & General', '11.0', 1, 2),
(113, 10, 'Local Sales & Marketing', '2.0', 1, 2),
(114, 10, 'Energy Costs', '11.4', 1, 2),
(115, 10, 'Repair & Maintenance', '8.7', 1, 2),
(116, 10, 'Real Estate Taxes/ Insurance', '6.0', 1, 2),
(117, 11, 'Hotel Admin & General', '9.3', 1, 2),
(118, 11, 'Local Sales & Marketing', '1.8', 1, 2),
(119, 11, 'Energy Costs', '11.7', 1, 2),
(120, 11, 'Repair & Maintenance', '7.7', 1, 2),
(121, 11, 'Real Estate Taxes/ Insurance', '2.2', 1, 2),
(122, 12, 'Hotel Admin & General', '11.1', 1, 2),
(123, 12, 'Local Sales & Marketing', '2.0', 1, 2),
(124, 12, 'Energy Costs', '11.1', 1, 2),
(125, 12, 'Repair & Maintenance', '8.9', 1, 2),
(126, 12, 'Real Estate Taxes/ Insurance', '6.6', 1, 2),
(127, 13, 'Total Deductions', '7.4', 1, 2),
(128, 14, 'Total Deductions', '8.3', 1, 2),
(129, 15, 'Total Deductions', '6.6', 1, 2),
(130, 13, 'Admin & Finance', '3.4', 1, 2),
(131, 13, 'Marketing', '0.5', 1, 2),
(132, 13, 'Management Fee', '3.5', 1, 2),
(133, 14, 'Admin & Finance', '4.1', 1, 2),
(134, 14, 'Marketing', '0.7', 1, 2),
(135, 14, 'Management Fee', '3.5', 1, 2),
(136, 15, 'Admin & Finance', '5.1', 1, 2),
(137, 15, 'Marketing', '0.8', 1, 2),
(138, 15, 'Management Fee', '3.5', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE IF NOT EXISTS `kpi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `total_rooms` float DEFAULT NULL,
  `no_of_days` float DEFAULT NULL,
  `rooms_vailable` float DEFAULT NULL,
  `rooms_occupied` decimal(6,1) DEFAULT NULL,
  `rooms_occupancy_precent` varchar(6) DEFAULT NULL,
  `average_room_rate` float DEFAULT NULL,
  `total_covers_food` float DEFAULT NULL,
  `average_spend_food` float DEFAULT NULL,
  `average_spend_beverages` float DEFAULT NULL,
  `total_average_spend` float DEFAULT NULL,
  `total_payroll` float DEFAULT NULL,
  `total_number_of_employees` float DEFAULT NULL,
  `precentage_revenue` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`id`, `branch_id`, `year_id`, `total_rooms`, `no_of_days`, `rooms_vailable`, `rooms_occupied`, `rooms_occupancy_precent`, `average_room_rate`, `total_covers_food`, `average_spend_food`, `average_spend_beverages`, `total_average_spend`, `total_payroll`, `total_number_of_employees`, `precentage_revenue`) VALUES
(1, 1, 1, 166, 31, 5146, '1801.1', '35', 900, 14000, 210, 1, 211, 810000, 145, '17'),
(2, 2, 1, 200, 366, 73200, '21418.9', '40.64', 5856, 257913, 415, 25, 440, 70269, 315, '1'),
(3, 3, 1, 140, 366, 51240, '30744.0', '60', 4857, 180085, 400, 32, 432, 60410, 246, '1'),
(4, 1, 2, 166, 31, 5146, '1801.1', '35', 900, 14000, 210, 1, 211, 810000, 145, '17');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key: Unique role ID.',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT 'Unique role name.',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Stores user roles.' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rid`, `name`) VALUES
(1, 'Branch Manager'),
(2, 'Super User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Primary Key: Unique user ID.',
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT 'Unique user name.',
  `pass` varchar(128) NOT NULL DEFAULT '' COMMENT 'User’s password (hashed).',
  `mail` varchar(254) DEFAULT '' COMMENT 'User’s e-mail address.',
  `created` int(11) NOT NULL DEFAULT '0' COMMENT 'Timestamp for when user was created.',
  `access` int(11) NOT NULL DEFAULT '0' COMMENT 'Timestamp for previous time user accessed the site.',
  `login` int(11) NOT NULL DEFAULT '0' COMMENT 'Timestamp for user’s last login.',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Whether the user is active(1) or blocked(0).',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`name`),
  KEY `access` (`access`),
  KEY `created` (`created`),
  KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores user data.';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `pass`, `mail`, `created`, `access`, `login`, `status`) VALUES
(1, 'Alan M. Whittaker', '1111', 'alan@test.com', 1427530611, 0, 0, 1),
(2, 'Smith V. Richey', '1111', 'deanna@test.com', 1427546067, 0, 0, 1),
(3, 'Paul J. Miller', '1111', 'paul@test.com', 1427546067, 0, 0, 1),
(4, 'Frederick Orville', '1111', 'frederick@dayrep.com', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_branches`
--

CREATE TABLE IF NOT EXISTS `users_branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users_branches`
--

INSERT INTO `users_branches` (`id`, `uid`, `branch_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 1),
(5, 4, 2),
(6, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Primary Key: users.uid for user.',
  `rid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Primary Key: role.rid for role.',
  PRIMARY KEY (`uid`,`rid`),
  KEY `rid` (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Maps users to roles.';

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`uid`, `rid`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`) VALUES
(1, '2008'),
(2, '2009'),
(3, ''),
(4, ''),
(5, '2010'),
(6, '2010'),
(7, '2010'),
(8, '2010'),
(9, '2010'),
(10, '2010'),
(11, '2010'),
(12, '2010'),
(13, '2010');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
