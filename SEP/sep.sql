  -- phpMyAdmin SQL Dump
  -- version 5.2.1
  -- https://www.phpmyadmin.net/
  --
  -- Host: 127.0.0.1
  -- Generation Time: Nov 19, 2023 at 01:25 AM
  -- Server version: 10.4.28-MariaDB
  -- PHP Version: 8.2.4

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Database: `sep`
  --

  -- --------------------------------------------------------

  --
  -- Table structure for table `admin_user`
  --

  CREATE TABLE `admin_user` (
    `id` int(11) NOT NULL,
    `username` varchar(250) NOT NULL,
    `password` varchar(250) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

  -- --------------------------------------------------------

  --
  -- Table structure for table `categories`
  --

  CREATE TABLE `categories` (
    `id` int(11) NOT NULL,
    `categories` varchar(250) NOT NULL,
    `status` tinyint(4) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

  -- --------------------------------------------------------

  --
  -- Table structure for table `product`
  --

  CREATE TABLE `product` (
    `id` int(11) NOT NULL,
    `categories_id` int(11) NOT NULL,
    `product_name` varchar(250) NOT NULL,
    `product_mrp` float NOT NULL,
    `product_price` float NOT NULL,
    `qty` int(11) NOT NULL,
    `image` varchar(255) NOT NULL,
    `short_desc` varchar(2000) NOT NULL,
    `description` text NOT NULL,
    `meta_title` text NOT NULL,
    `meta_desc` varchar(2000) NOT NULL,
    `meta_keyword` varchar(2000) NOT NULL,
    `status` tinyint(4) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `admin_user`
  --
  ALTER TABLE `admin_user`
    ADD PRIMARY KEY (`id`);

  --
  -- Indexes for table `categories`
  --
  ALTER TABLE `categories`
    ADD PRIMARY KEY (`id`);

  --
  -- Indexes for table `product`
  --
  ALTER TABLE `product`
    ADD PRIMARY KEY (`id`);

  --
  -- AUTO_INCREMENT for dumped tables
  --

  --
  -- AUTO_INCREMENT for table `categories`
  --
  ALTER TABLE `categories`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  --
  -- AUTO_INCREMENT for table `product`
  --
  ALTER TABLE `product`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
