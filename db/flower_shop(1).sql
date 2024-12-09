-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 09, 2024 at 05:45 PM
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
-- Database: `flower_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `add_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `primary_add` varchar(60) NOT NULL,
  `secondary_add` varchar(60) DEFAULT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL,
  `zip` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `cid`, `primary_add`, `secondary_add`, `city`, `state`, `zip`) VALUES
(1, 113, '501 V Blvd', '1231C', 'State College', 'PA', '16803');

-- --------------------------------------------------------

--
-- Table structure for table `arrangements`
--

CREATE TABLE `arrangements` (
  `aid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `eid` varchar(60) DEFAULT NULL,
  `inv_id` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `con_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arrangements`
--

INSERT INTO `arrangements` (`aid`, `cid`, `eid`, `inv_id`, `gid`, `tid`, `sid`, `con_id`) VALUES
(1, 113, NULL, 19, 10, 1, 10, 10),
(2, 113, NULL, 5, 2, 7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE `containers` (
  `con_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `material` varchar(60) NOT NULL,
  `type` varchar(60) DEFAULT NULL,
  `color` varchar(60) DEFAULT NULL,
  `size` varchar(60) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `containers`
--

INSERT INTO `containers` (`con_id`, `name`, `material`, `type`, `color`, `size`, `stock`, `price`) VALUES
(1, 'Small Mason Jar', 'Glass', 'Jar', 'Glass', 'Small', 450, 5),
(2, 'Mason Jar', 'Glass', 'Jar', 'Glass', 'Medium', 450, 10),
(3, 'Large Mason Jar', 'Glass', 'Jar', 'Glass', 'Large', 450, 15),
(4, 'Ceramic Vase', 'Ceramic', 'Vase', 'White', 'Medium', 500, 15),
(5, 'Speckled Ceramic Vase', 'Ceramic', 'Vase', 'Multicolor', 'Medium', 550, 20),
(6, 'Flower Vase', 'Ceramic', 'Vase', 'Pink', 'Large', 500, 25),
(7, 'Envelope Vase', 'Glass', 'Vase', 'Red', 'Medium', 500, 10),
(8, 'Happy Birthday Present Shape Vase', 'Ceramic', 'Vase', 'Multicolor', 'Large', 500, 25),
(9, 'WItch\'s Cauldron Vase', 'Glass', 'Vase', 'Black', 'Large', 450, 20),
(10, 'Limited Edition Strawberry Vase', 'Glass', 'Vase', 'Red', 'Large', 300, 30),
(11, 'Limited Edition Bow Vase', 'Glass', 'Vase', 'Blue', 'Large', 300, 30);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `AGE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `fname`, `lname`, `email`, `phone`, `password`, `AGE`) VALUES
(110, 'smp', 'one', 'smp1@gmail.com', '9897675647', '$2y$10$s6TPRhiQLKa/jTHaHNVvZeqwbDTht0rhQyIa50H91qGoD4eFYFVOG', 22),
(111, 'Ninja', 'Hatori', 'ninja@psu.edu', '8489081439', '$2y$10$/3nMkfqja1Nuw7TEmqONauqQIhoFy1WrP0XkSRr244pe/rY9N9P1.', 21),
(113, 'pascal', 'newman', 'pasm@psu.edu', '8485678971', '$2y$10$yzP/3MR.RV94O83JXKaVEOWZl35iP7wkdmQL2kuHRboPmfOx7pY7a', 23),
(114, 'penster', 'bo', 'pbo@psu.edu', '8485674415', '$2y$10$dcr8DHxOjTBfq1gk11wMh.Qqdjg5v/gIjhZ6q6F6.SiWIgexus2eq', 22);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `position` varchar(60) NOT NULL,
  `ssn` char(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `years_worked` int(11) DEFAULT NULL,
  `DOB` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `fname`, `lname`, `position`, `ssn`, `password`, `years_worked`, `DOB`) VALUES
('pkm5529', 'Parinita', 'Mithepati', 'CEO', '132456789', 'Pari@mink', 10, '2002/12/26'),
('pxk5296', 'Pawan', 'Harikrishnan', 'admin', '123456789', 'welcome1234', 5, '2003/03/23'),
('smp1123', 'Sri', 'MP', 'florist', '123555678', 'srimp', 3, '2003/08/21'),
('sqb1324', 'Swayam', 'Bansal', 'CTO', '999123452', 'yammer', 14, '2001/08/01'),
('tus123', 'test', 'user', 'test', '123456788', '$2y$10$fvSlWjRH6sRCcvZbniRX6OigevtC3hLj76iIDCMK4k1fzjlbbssDC', 1, '2024/12/12');

-- --------------------------------------------------------

--
-- Table structure for table `greens`
--

CREATE TABLE `greens` (
  `gid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `season` varchar(60) NOT NULL,
  `color` varchar(60) DEFAULT NULL,
  `size` varchar(60) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `greens`
--

INSERT INTO `greens` (`gid`, `name`, `season`, `color`, `size`, `stock`, `price`) VALUES
(1, 'Eucalypus', 'All seasons', 'Dark Green', 'Small', 400, 2),
(2, 'Fern', 'All Seasons', 'Green', 'Medium', 500, 1),
(3, 'Ruscus', 'All Seasons', 'Dark Green', 'Medium', 450, 2),
(4, 'Bee Balm', 'Summer', 'Green', 'Small', 400, 2),
(5, 'Ivy', 'All Seasons', 'Green', 'Small', 450, 1),
(6, 'Dried Maple Leaf', 'Fall', 'Red', 'Medium', 400, 3),
(7, 'Dried Oak Leaf', 'Fall', 'Dark Orange', 'Medium', 400, 3),
(8, 'Corn Husk', 'Fall', 'Yellow', 'Large', 400, 3),
(9, 'Rose Leaf', 'Summer', 'Green', 'Small', 350, 3),
(10, 'Magnolia Leaf', 'Spring', 'Dark Green', 'Medium', 350, 4);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inv_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `season` varchar(60) NOT NULL,
  `color` varchar(60) DEFAULT NULL,
  `size` varchar(60) DEFAULT NULL,
  `pet_safe` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `stock`, `price`, `name`, `season`, `color`, `size`, `pet_safe`) VALUES
(1, 350, 2, 'Spray Roses', 'All Seasons', 'Yellow', 'Small', 'May contain harmful pesticides, use caution.'),
(2, 350, 2, 'Spray Roses', 'All Seasons', 'White', 'Small', 'May contain harmful pesticides, use caution.'),
(3, 350, 2, 'Spray Roses', 'All Seasons', 'Red', 'Small ', 'May contain harmful pesticides, use caution.'),
(4, 350, 2, 'Spray Roses', 'All Seasons', 'Pink', 'Small', 'May contain harmful pesticides, use caution.'),
(5, 500, 1, 'Baby\'s Breath', 'All Seasons', 'White', 'Very Small', 'May cause mild irritation symptoms.'),
(6, 300, 4, 'Calla Lily', 'Summer', 'White', 'Medium', 'Very toxic'),
(7, 300, 4, 'Calla Lily', 'Summer', 'Black', 'Medium', 'Very Toxic'),
(8, 300, 4, 'Calla Lily', 'Summer', 'Pink', 'Medium', 'Very toxic'),
(9, 300, 4, 'Calla Lily', 'Summer', 'Red', 'Medium', 'Very toxic'),
(10, 300, 4, 'Calla Lily', 'Summer', 'Orange', 'Medium', 'Very toxic'),
(11, 300, 4, 'Calla Lily', 'Summer', 'Purple', 'Medium', 'Very toxic'),
(12, 300, 4, 'Calla Lily', 'Summer', 'Multicolor', 'Medium', 'Very toxic'),
(13, 350, 2, 'Spray Roses', 'All Seasons', 'Multicolor', 'Small', 'May contain harmful pesticides, use caution.'),
(14, 350, 3, 'Lily', 'Summer', 'Pink', 'Large', 'Toxic to cats'),
(15, 350, 3, 'Lily', 'Summer', 'White', 'Large', 'Toxic to cats'),
(16, 350, 3, 'Lily', 'Summer', 'Orange', 'Large', 'Toxic to cats'),
(17, 350, 3, 'Lily', 'Summer', 'Red', 'Large', 'Toxic to cats'),
(18, 300, 4, 'Lily Stargazer', 'Summer', 'Multicolor', 'Large', 'Toxic to cats'),
(19, 300, 6, 'Peony', 'Spring', 'White', 'Large', 'Very toxic'),
(20, 300, 6, 'Peony', 'Spring', 'Pink - Blush', 'Large', 'Very toxic'),
(21, 300, 6, 'Peony', 'Spring', 'Pink - Hot', 'Large', 'Very toxic'),
(22, 300, 6, 'Peony', 'Spring', 'Red', 'Large', 'Very toxic'),
(23, 250, 4, 'Bluebell', 'Spring', 'Blue', 'Small', 'Very toxic'),
(24, 250, 4, 'Celosia', 'Summer', 'Red', 'Small', 'Not toxic'),
(25, 250, 4, 'Celosia', 'Summer', 'Pink', 'Small', 'Not toxic'),
(26, 250, 4, 'Celosia', 'Summer', 'Yellow', 'Small', 'Not toxic'),
(27, 400, 3, 'Gerber Daisy', 'Summer', 'Pink', 'Meidum', 'Not toxic'),
(28, 400, 3, 'Gerber Daisy', 'Summer', 'Red', 'Medium', 'Not toxic'),
(29, 400, 3, 'Gerber Daisy', 'Summer', 'White', 'Medium', 'Not toxic'),
(30, 400, 3, 'Gerber Daisy', 'Summer', 'Yellow', 'Medium', 'Not toxic'),
(31, 500, 3, 'Rose', 'All Seasons', 'Red', 'Medium', 'Not toxic'),
(32, 500, 3, 'Rose', 'All Seasons', 'Pink', 'Medium', 'Not toxic'),
(33, 500, 3, 'Rose', 'All Seasons', 'White', 'Medium', 'Not toxic'),
(34, 500, 3, 'Rose', 'All Seasons', 'Yellow', 'Medium', 'Not toxic'),
(35, 450, 3, 'Carnation', 'All Seasons', 'White', 'Medium', 'Very toxic'),
(36, 450, 3, 'Carnation', 'All Seasons', 'Yellow', 'Medium', 'Very toxic'),
(37, 450, 3, 'Carnation', 'All Seasons', 'Orange', 'Medium', 'Very toxic'),
(38, 450, 3, 'Carnation', 'All Seasons', 'Red', 'Medium', 'Very toxic'),
(39, 450, 3, 'Carnation', 'All Seasons', 'Pink', 'Medium', 'Very toxic'),
(40, 450, 3, 'Carnation', 'All Seasons', 'Purple', 'Medium', 'Very toxic'),
(41, 450, 3, 'Carnation', 'All Seasons', 'Green', 'Medium', 'Very toxic'),
(42, 450, 3, 'Chrysanthemum', 'Fall', 'Yellow', 'Medium', 'Very Toxic'),
(43, 450, 3, 'Chrysanthemum', 'Fall', 'Orange', 'Medium', 'Very Toxic'),
(44, 450, 3, 'Chrysanthemum', 'Fall', 'Pink', 'Medium', 'Very Toxic'),
(45, 450, 3, 'Chrysanthemum', 'Fall', 'Magenta', 'Medium', 'Very Toxic'),
(46, 450, 3, 'Chrysanthemum', 'Fall', 'Red', 'Medium', 'Very Toxic'),
(47, 450, 3, 'Chrysanthemum', 'Fall', 'Purple', 'Medium', 'Very Toxic'),
(48, 450, 3, 'Chrysanthemum', 'Fall', 'Multicolor', 'Medium', 'Very Toxic'),
(49, 450, 3, 'Chrysanthemum', 'Fall', 'Orange', 'Green', 'Very Toxic'),
(50, 450, 3, 'Chrysanthemum', 'Fall', 'Rainbow', 'Medium', 'Very Toxic');

-- --------------------------------------------------------

--
-- Table structure for table `sweets`
--

CREATE TABLE `sweets` (
  `sid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `dairy` varchar(60) DEFAULT NULL,
  `fruit` varchar(60) DEFAULT NULL,
  `shape` varchar(60) DEFAULT NULL,
  `color` varchar(60) DEFAULT NULL,
  `size` varchar(60) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `expiry` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sweets`
--

INSERT INTO `sweets` (`sid`, `name`, `dairy`, `fruit`, `shape`, `color`, `size`, `stock`, `price`, `expiry`) VALUES
(1, 'Raspberry Dark Chocolate Truffle', 'Yes', 'Raspberry', 'Sphere', 'Magenta', 'Small', 500, 3, 'Shelf Stable 4 Months'),
(2, 'Orange Truffle', 'Yes', 'Orange', 'Sphere', 'Orange', 'Small', 400, 3, 'Shelf Stable 4 Months'),
(3, 'White Chocolate Bites', 'Yes', NULL, 'Star', 'White', 'Small', 450, 2, 'Shelf Stable 5 Months'),
(4, 'Milk Chocolate Bites', 'Yes', NULL, 'Square', 'Chocolate', 'Small', 500, 3, 'Shelf Stable 6 Months'),
(5, 'Dark Chocolate Bites', 'Yes', NULL, 'Triangle', 'Dark Chocolate', 'Small', 450, 3, 'Shelf Stable 7 Months'),
(6, 'Chocolate Dipped Strawberry', 'Yes', 'Strawberry', 'Strawberry', 'Chocolate', 'Medium', 500, 4, 'Shelf Stable 5 Days'),
(7, 'Boo Bites', 'Yes', 'Coconut', 'Ghost', 'White', 'Small', 400, 3, 'Shelf Stable 2 Months'),
(8, 'Pumpkin Pasties', 'Yes', 'Pumpkin', 'Pumpkin', 'Orange', 'Small', 400, 4, 'Shelf Stable 1 Month'),
(9, 'Peppermint Chocolate Snowman', 'Yes', NULL, 'Snowman', 'White', 'Medium', 350, 5, 'Shelf Stable 2 Months'),
(10, 'Chocolate Jam Hearts', 'Yes', 'Mixed Berry Jam', 'Heart', 'Chocolate', 'Small', 450, 4, 'Shelf Stable 3 Months'),
(11, 'Peanut Brittle', 'No', 'Peanut', 'Bark', 'Caramel', 'Medium', 400, 5, 'Shelf Stable 5 Months');

-- --------------------------------------------------------

--
-- Table structure for table `trinkets`
--

CREATE TABLE `trinkets` (
  `tid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `event` varchar(60) DEFAULT NULL,
  `color` varchar(60) DEFAULT NULL,
  `size` varchar(60) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trinkets`
--

INSERT INTO `trinkets` (`tid`, `name`, `event`, `color`, `size`, `stock`, `price`) VALUES
(1, 'Snowflake Charm', 'Winter', 'White', 'Medium', 450, 4),
(2, 'Snowflake Charm', 'Winter', 'Blue', 'Medium', 450, 4),
(3, 'Glitter Heart', 'Valentine\'s Day', 'Pink', 'Medium', 400, 3),
(4, 'Witch Hat', 'Halloween', 'Black', 'Medium', 400, 4),
(5, 'Witch Cauldron', 'Halloween', 'Black', 'Medium', 400, 4),
(6, 'Jack O Lantern', 'Halloween', 'Orange', 'Medium', 400, 4),
(7, 'Balloons', 'Birthday', 'Multicolor', 'Medium', 500, 1),
(8, 'Happy Birthday Sign', 'Birthday', 'Multicolor', 'Large', 500, 2),
(9, 'Happy Anniversary Sign', 'Anniversary', 'Gold', 'Large', 450, 3),
(10, 'Happy Anniversary Sign', 'Anniversary', 'Silver', 'Large', 450, 3),
(11, 'Glitter Easter Egg', 'Easter', 'Multicolor', 'Medium', 450, 3),
(12, 'Hannukah Dreidel ', 'Hannukah', 'Gold', 'Large', 450, 3),
(13, 'Santa Hat', 'Christmas', 'Red', 'Large', 450, 3),
(14, 'Kwanzaa Celebration Sign', 'Kwanzaa', 'Multicolor', 'Large', 300, 3),
(15, 'Happy Diwali Sign', 'Diwali', 'Gold', 'Large', 400, 3),
(16, 'Diwali Diyas', 'Diwali', 'Gold', 'Medium', 450, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`add_id`),
  ADD KEY `fk_cid_address` (`cid`);

--
-- Indexes for table `arrangements`
--
ALTER TABLE `arrangements`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `inv_id` (`inv_id`),
  ADD KEY `gid` (`gid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `con_id` (`con_id`);

--
-- Indexes for table `containers`
--
ALTER TABLE `containers`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `ssn` (`ssn`);

--
-- Indexes for table `greens`
--
ALTER TABLE `greens`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `sweets`
--
ALTER TABLE `sweets`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `trinkets`
--
ALTER TABLE `trinkets`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arrangements`
--
ALTER TABLE `arrangements`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `containers`
--
ALTER TABLE `containers`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `greens`
--
ALTER TABLE `greens`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sweets`
--
ALTER TABLE `sweets`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trinkets`
--
ALTER TABLE `trinkets`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cid_address` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE;

--
-- Constraints for table `arrangements`
--
ALTER TABLE `arrangements`
  ADD CONSTRAINT `arrangements_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE,
  ADD CONSTRAINT `arrangements_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`),
  ADD CONSTRAINT `arrangements_ibfk_3` FOREIGN KEY (`inv_id`) REFERENCES `inventory` (`inv_id`),
  ADD CONSTRAINT `arrangements_ibfk_4` FOREIGN KEY (`gid`) REFERENCES `greens` (`gid`),
  ADD CONSTRAINT `arrangements_ibfk_5` FOREIGN KEY (`tid`) REFERENCES `trinkets` (`tid`),
  ADD CONSTRAINT `arrangements_ibfk_6` FOREIGN KEY (`sid`) REFERENCES `sweets` (`sid`),
  ADD CONSTRAINT `arrangements_ibfk_7` FOREIGN KEY (`con_id`) REFERENCES `containers` (`con_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
