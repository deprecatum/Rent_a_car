-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 05:48 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `automoveis`
--

CREATE TABLE `automoveis` (
  `id` int(11) NOT NULL,
  `modelo_id` int(11) DEFAULT NULL,
  `cor_id` int(11) DEFAULT NULL,
  `disponibilidade` tinyint(1) DEFAULT NULL,
  `matricula` varchar(8) NOT NULL DEFAULT 'XX-XX-XX'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `automoveis`
--

INSERT INTO `automoveis` (`id`, `modelo_id`, `cor_id`, `disponibilidade`, `matricula`) VALUES
(1, 15, 2, 0, 'XX-XX-XX'),
(2, 8, 1, 0, 'XX-XX-XX'),
(4, 13, 7, 0, 'XX-XX-XX'),
(5, 4, 4, 1, 'XX-XX-XX'),
(6, 1, 6, 0, 'YY-YY-YY'),
(7, 9, 4, 1, 'XX-XX-XX'),
(8, 1, 3, 1, 'XX-XX-XX'),
(9, 6, 4, 0, 'XX-XX-XX'),
(10, 8, 4, 1, 'XX-XX-XX'),
(11, 4, 1, 1, 'XX-XX-XX'),
(12, 7, 5, 1, 'XX-XX-XX'),
(13, 4, 7, 1, 'XX-XX-XX'),
(14, 2, 6, 0, 'XX-XX-XX'),
(15, 13, 1, 1, 'XX-XX-XX'),
(16, 14, 1, 0, 'XX-XX-XX'),
(17, 7, 2, 1, 'XX-XX-XX'),
(18, 2, 3, 0, 'XX-XX-XX'),
(19, 1, 7, 1, 'XX-XX-XX'),
(20, 8, 4, 0, 'XX-XX-XX'),
(21, 3, 7, 0, 'XX-XX-XX'),
(22, 5, 5, 1, 'XX-XX-XX'),
(23, 11, 1, 1, 'XX-XX-XX'),
(24, 8, 6, 0, 'XX-XX-XX'),
(25, 7, 5, 0, 'XX-XX-XX'),
(26, 14, 5, 0, 'XX-XX-XX'),
(27, 3, 3, 1, 'XX-XX-XX'),
(28, 10, 3, 0, 'XX-XX-XX'),
(29, 11, 2, 1, 'XX-XX-XX'),
(30, 13, 7, 0, 'XX-XX-XX'),
(31, 1, 4, 1, 'XX-XX-XX'),
(32, 15, 4, 1, 'XX-XX-XX'),
(33, 12, 7, 0, 'XX-XX-XX'),
(34, 6, 3, 1, 'XX-XX-XX'),
(35, 8, 7, 1, 'XX-XX-XX'),
(36, 14, 4, 1, 'XX-XX-XX'),
(37, 5, 3, 1, 'XX-XX-XX'),
(38, 14, 5, 1, 'XX-XX-XX'),
(39, 13, 3, 1, 'XX-XX-XX'),
(40, 7, 4, 0, 'XX-XX-XX'),
(41, 1, 5, 1, 'XX-XX-XX'),
(42, 15, 6, 0, 'XX-XX-XX'),
(43, 15, 5, 0, 'XX-XX-XX'),
(44, 12, 7, 0, 'XX-XX-XX'),
(45, 9, 7, 1, 'XX-XX-XX'),
(46, 3, 2, 0, 'XX-XX-XX'),
(47, 1, 2, 1, 'XX-XX-XX'),
(48, 2, 2, 1, 'XX-XX-XX'),
(49, 4, 2, 1, 'XX-XX-XX'),
(50, 3, 3, 1, 'XX-XX-XX'),
(51, 8, 4, 1, 'XX-XX-XX'),
(52, 14, 5, 0, 'XX-XX-XX'),
(53, 1, 4, 0, 'XX-XX-XX'),
(54, 4, 7, 0, 'XX-XX-XX'),
(55, 5, 6, 1, 'XX-XX-XX'),
(56, 1, 7, 1, 'XX-XX-XX'),
(57, 6, 2, 0, 'XX-XX-XX'),
(58, 15, 5, 1, 'XX-XX-XX'),
(59, 11, 7, 1, 'XX-XX-XX'),
(60, 1, 3, 1, 'XX-XX-XX'),
(61, 12, 5, 0, 'XX-XX-XX'),
(62, 10, 5, 1, 'XX-XX-XX'),
(63, 9, 4, 0, 'XX-XX-XX'),
(64, 1, 2, 1, 'XX-XX-XX'),
(65, 4, 3, 1, 'XX-XX-XX'),
(66, 3, 6, 0, 'XX-XX-XX'),
(67, 14, 4, 1, 'XX-XX-XX'),
(68, 15, 6, 0, 'XX-XX-XX'),
(69, 12, 4, 0, 'XX-XX-XX'),
(70, 8, 4, 0, 'XX-XX-XX'),
(71, 3, 4, 0, 'XX-XX-XX'),
(72, 14, 7, 1, 'XX-XX-XX'),
(73, 15, 3, 0, 'XX-XX-XX'),
(74, 2, 7, 0, 'XX-XX-XX'),
(75, 4, 4, 0, 'XX-XX-XX'),
(76, 14, 5, 0, 'XX-XX-XX'),
(77, 15, 4, 1, 'XX-XX-XX'),
(78, 3, 3, 0, 'XX-XX-XX'),
(79, 6, 7, 0, 'XX-XX-XX'),
(80, 3, 7, 1, 'XX-XX-XX'),
(81, 3, 3, 1, 'XX-XX-XX'),
(82, 4, 5, 0, 'XX-XX-XX'),
(83, 12, 7, 1, 'XX-XX-XX'),
(84, 4, 3, 0, 'XX-XX-XX'),
(85, 12, 7, 0, 'XX-XX-XX'),
(86, 12, 7, 1, 'XX-XX-XX'),
(87, 10, 4, 1, 'XX-XX-XX'),
(88, 9, 6, 0, 'XX-XX-XX'),
(89, 7, 4, 1, 'XX-XX-XX'),
(90, 1, 4, 1, 'XX-XX-XX'),
(91, 5, 5, 1, 'XX-XX-XX'),
(92, 7, 2, 0, 'XX-XX-XX'),
(93, 3, 6, 0, 'XX-XX-XX'),
(94, 12, 4, 0, 'XX-XX-XX'),
(95, 11, 2, 0, 'XX-XX-XX'),
(96, 13, 3, 1, 'XX-XX-XX'),
(97, 5, 2, 0, 'XX-XX-XX'),
(98, 3, 1, 0, 'XX-XX-XX'),
(99, 4, 2, 0, 'XX-XX-XX'),
(100, 14, 5, 0, 'XX-XX-XX'),
(102, 1, 1, 1, 're-re-re'),
(104, 1, 1, 1, 'XX-YY-ZZ');

-- --------------------------------------------------------

--
-- Table structure for table `cores`
--

CREATE TABLE `cores` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cores`
--

INSERT INTO `cores` (`id`, `nome`) VALUES
(1, 'vermelho'),
(2, 'verde'),
(3, 'preto'),
(4, 'branco'),
(5, 'cinzento'),
(6, 'azul'),
(7, 'amarelo');

-- --------------------------------------------------------

--
-- Table structure for table `fabricantes`
--

CREATE TABLE `fabricantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabricantes`
--

INSERT INTO `fabricantes` (`id`, `nome`) VALUES
(1, 'Alfa Romeo'),
(2, 'BMW'),
(3, 'Audi'),
(4, 'Ford'),
(5, 'Fiat'),
(6, 'Nissan'),
(7, 'Peugeot'),
(8, 'Mercedes'),
(9, 'Toyota');

-- --------------------------------------------------------

--
-- Table structure for table `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `fabricante-id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modelos`
--

INSERT INTO `modelos` (`id`, `nome`, `fabricante-id`) VALUES
(1, 'Gulieta', 1),
(2, '320', 2),
(3, '120', 2),
(4, 'A3', 3),
(5, 'A4', 3),
(6, 'Escort', 4),
(7, 'Uno', 5),
(8, 'Qashqai', 6),
(9, 'Micra', 6),
(10, '106', 7),
(11, '308', 7),
(12, 'Classe A', 8),
(13, 'GLA', 8),
(14, 'Corolla', 9),
(15, 'Yaris', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'somedude@email.com', '$2y$10$tZ5MW/cBjcFRUQLtJsChe.uLfniVjzMY6BM5TcfQ5CEaqzKYkMNDS'),
(2, 'someguy@email.com', 'apassword1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automoveis`
--
ALTER TABLE `automoveis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-model_idx` (`modelo_id`),
  ADD KEY `fk-color_idx` (`cor_id`);

--
-- Indexes for table `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-fabricante_idx` (`fabricante-id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automoveis`
--
ALTER TABLE `automoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `cores`
--
ALTER TABLE `cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `automoveis`
--
ALTER TABLE `automoveis`
  ADD CONSTRAINT `fk-color` FOREIGN KEY (`cor_id`) REFERENCES `cores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk-model` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `fk-fabricante` FOREIGN KEY (`fabricante-id`) REFERENCES `fabricantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
