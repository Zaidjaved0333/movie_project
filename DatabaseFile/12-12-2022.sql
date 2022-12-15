-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 12:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_theater`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `ID` int(11) NOT NULL,
  `Theater_Name` varchar(225) NOT NULL,
  `Movie_Name` varchar(225) NOT NULL,
  `First_Name` varchar(225) NOT NULL,
  `Last_Name` varchar(225) NOT NULL,
  `Seates_Number` int(11) NOT NULL,
  `address_1` varchar(500) NOT NULL,
  `address_2` varchar(500) NOT NULL,
  `Price` varchar(225) NOT NULL,
  `t_price` varchar(225) NOT NULL,
  `Select_Seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`ID`, `Theater_Name`, `Movie_Name`, `First_Name`, `Last_Name`, `Seates_Number`, `address_1`, `address_2`, `Price`, `t_price`, `Select_Seat`) VALUES
(3, 'gold theater', 'punisher', 'muhammad', 'zaid javed', 150, 'karachi', 'orangi town', '300', '900', 3),
(4, 'gold theater', 'punisher', 'muhammad', 'zaid javed', 150, 'karachi', 'orangi town', '300', '900', 3);

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE `movie_category` (
  `movie_cat_id` int(11) NOT NULL,
  `movie_cat_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_category`
--

INSERT INTO `movie_category` (`movie_cat_id`, `movie_cat_name`) VALUES
(3, 'horrors'),
(5, 'Bollywood'),
(6, 'Action'),
(8, 'intertainment');

-- --------------------------------------------------------

--
-- Table structure for table `movie_product`
--

CREATE TABLE `movie_product` (
  `product_id` int(11) NOT NULL,
  `movie_name` varchar(225) NOT NULL,
  `movie_cast` varchar(225) NOT NULL,
  `movie_release_date` date NOT NULL,
  `movie_category` int(11) NOT NULL,
  `movie_description` varchar(500) NOT NULL,
  `Image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_product`
--

INSERT INTO `movie_product` (`product_id`, `movie_name`, `movie_cast`, `movie_release_date`, `movie_category`, `movie_description`, `Image`) VALUES
(9, 'thor', 'aalyan', '2011-11-11', 5, 'this is amazing movie', '../MainLayout/assets/images/download (1).jfif'),
(10, 'golmaal', 'ajay devgan', '2010-10-10', 5, 'funny movie', '../MainLayout/assets/images/download.jfif'),
(11, 'iron manssfdg', 'zaid1', '0002-02-22', 5, 'this is good movie', '../MainLayout/assets/images/iron_man.jpg'),
(12, 'punisher', 'marvel', '0000-00-00', 6, 'amazing movies', '../MainLayout/assets/images/Punisher .jpg'),
(13, '365 days', 'zaid', '0000-00-00', 6, 'this is very horror movie', '../MainLayout/assets/images/365 days .jpg');

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `screen` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `no_of_seat` int(11) NOT NULL,
  `amount_per_seat` varchar(225) NOT NULL,
  `movie_Product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`id`, `name`, `screen`, `date`, `no_of_seat`, `amount_per_seat`, `movie_Product`) VALUES
(1, 'gold theater', 'HD', '0000-00-00', 150, '300', 12),
(2, 'gold theater', 'HD', '0000-00-00', 150, '300', 9),
(3, 'Diamond theater', 'HD', '0000-00-00', 150, '300', 13),
(4, 'Diamond theater', 'HD', '0000-00-00', 150, '300', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_pass` varchar(225) NOT NULL,
  `user_cpass` varchar(225) NOT NULL,
  `Role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_cpass`, `Role`) VALUES
(3, 'Zaid', 'Zaid@gmail.com', '$2y$10$LF3ZCJzxQavO.5v0ZdObXeeQCz6211URplTvw5L8MbvXl.jKiPQVG', '$2y$10$sKdO6xLL29I2iJ.JHDyGX.z8sh32yfy4mh2PF5cwo5fScvFi7lxQa', 'V'),
(5, 'Admin', 'admin@gmail.com', '$2y$10$7U35EQepTtzEXGpUbSgoXuIgmq0otULIuJffYeauUH0/qINxTFDDa', '$2y$10$/Bj3c8spKgdVG1CvostPWu1HzcNPfX8JPLdZtH5wmboAV/R65E.vW', 'A'),
(6, 'Abc', 'abc@gmail.com', '$2y$10$KTLTbh/3ioUqdtVeJekzXudnDtE.iupOFy28SOfkTigVc4QAUmHIC', '$2y$10$8m0d.e/hy90tXoT46RR/TuYpFee74WQyagpgZab.H6j0zVvD8lVuK', 'V'),
(7, '', '', '$2y$10$ife4MlYcTve0ED.yvJbNie6kD6nY0WMdQ2UHqj71/lHcuaO7zGk8K', '$2y$10$wxyAXnBZbqmDc00MZFVarOs4NcoeS1FEXozjUayO0hHiM09pufQMW', 'V');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`movie_cat_id`);

--
-- Indexes for table `movie_product`
--
ALTER TABLE `movie_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Fk_Movie_CatId` (`movie_category`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Movie_ProdId` (`movie_Product`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `movie_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movie_product`
--
ALTER TABLE `movie_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `theater`
--
ALTER TABLE `theater`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_product`
--
ALTER TABLE `movie_product`
  ADD CONSTRAINT `Fk_Movie_CatId` FOREIGN KEY (`movie_category`) REFERENCES `movie_category` (`movie_cat_id`);

--
-- Constraints for table `theater`
--
ALTER TABLE `theater`
  ADD CONSTRAINT `Fk_Movie_ProdId` FOREIGN KEY (`movie_Product`) REFERENCES `movie_product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
