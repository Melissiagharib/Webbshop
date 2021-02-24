-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 24 feb 2021 kl 08:51
-- Serverversion: 5.7.32
-- PHP-version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `Shopdb`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Contact`
--

CREATE TABLE `Contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `Contactform`
--

CREATE TABLE `Contactform` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Contactform`
--

INSERT INTO `Contactform` (`id`, `Name`, `Email`, `Message`) VALUES
(4, 'mirella', 'melissia.gharib@yh.nackademin.se', 'jhsaj'),
(5, 'mirella', 'melissia.gharib@hotmail.com', 'jhk'),
(6, 'melissia', 'mirella.gharib@yh.nackademin.se', 'hljhl');

-- --------------------------------------------------------

--
-- Tabellstruktur `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customername` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `instock` int(11) NOT NULL,
  `picturelink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `productname`, `price`, `description`, `instock`, `picturelink`) VALUES
(1, 'BMW X1', 253000, 'BMW X1 is a great luxury subcompact SUV', 2, 'Bmw-x1.jpg'),
(2, 'Volvo XC40', 350000, 'XC40 is a good luxury subcompact SUV', 1, 'Volvo-xc40.jpg'),
(3, 'Mercedes G63 Amg Brabus', 998000, 'Mercedes-Benz G-Class is a great luxury large SUV', 3, 'G63AMG.Brabus.jpg'),
(4, 'Ferrari F8-Tributo', 999999, 'The Ferrari F8 Tributo is the new mid-rear-engined sports car', 1, 'Ferrari-F8-Tributo-2020.jpg');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `Contactform`
--
ALTER TABLE `Contactform`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `getproductid` (`product_id`),
  ADD KEY `getcostumer` (`customer_id`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Contact`
--
ALTER TABLE `Contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `Contactform`
--
ALTER TABLE `Contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `getcostumer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `getproductid` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
