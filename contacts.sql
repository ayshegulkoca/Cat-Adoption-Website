-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2025 at 02:09 AM
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
-- Database: `purrfect`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `ph_no` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_name`, `email`, `ph_no`, `type`, `message`) VALUES
(13, 'Sarah ', 'sarah@gmail.com', '+66 81 234 5678', 'Luna', 'Hi! I live in a quiet condo in Bangkok with plenty of sunny spots and soft blankets—perfect for a gentle, affectionate kitty. I work from home most days, so Luna would have lots of company and lap time. I’m experienced with regular grooming and vet checkups. Would love to meet her and learn about her routine and favorite treats.'),
(14, 'Kevin', 'kevin@gmail.com', '+66 86 555 9012', 'Mochi', 'Hello! I’m looking for a playful companion and Mochi sounds like the perfect match. I have lots of interactive toys and time for daily play sessions. My apartment is fully cat-proofed with scratching posts and cozy beds. Could you share Mochi’s feeding schedule, any sensitivities, and preferred toys?\\r\\n\\r\\n'),
(15, 'Mark', 'mark14@gmail.com', ' +66 82 777 3344', 'Bella', 'Hi there! I adore calm, regal cats and Bella’s temperament sounds lovely. I have a spacious, quiet home with a bird-safe window perch. I’m comfortable with regular brushing and nail trims. Can you tell me more about her diet, grooming needs, and how she does with visitors?\\r\\n\\r\\n'),
(16, 'Troy', 'troy@gmail.com', '+66 89 210 4433', 'Neko', 'Sawasdee krub! I’d love a chatty companion—Neko’s personality is exactly what I’m looking for. I’m home evenings and weekends and happy to provide lots of attention. I have experience with vocal breeds. Does Neko enjoy puzzle feeders or specific playtimes? Also curious about his vet history.'),
(17, 'Jessica', 'jessica@gmail.com', '+66 80 345 6677', 'Pumpkin', 'Hello! Pumpkin sounds like such a sweet orange tabby. I have a cosy home with cat trees and soft blankets. I’m looking for a cuddly buddy who enjoys calm evenings. Could you share more about Pumpkin’s social preferences, favourite treats, and how he handles car rides?'),
(18, 'Justin', 'justin@gmail.com', '+66 83 999 2244', 'Daisy', 'Hi! I love Maine Coons and have experience with larger cats. I’m prepared for regular brushing sessions and enrichment play. My home has ample space and sturdy scratching posts. Could you let me know Daisy’s grooming routine, any dietary needs, and energy level day-to-day?'),
(19, 'Babra', 'babra@gmail.com', '+66 84 612 7788', 'Coco', 'Greetings! I’m drawn to Coco’s quiet, gentle nature. My apartment is peaceful with sunny spots and a dedicated grooming area. I’m attentive to eye and coat care for Persians. May I have details on Coco’s grooming schedule, preferred food, and how she handles brushing/combing?'),
(20, 'Selena', 'selena@hotmail.com', '+66 85 730 1155', 'Mimi', 'Hi! Mimi’s spunky, smart personality sounds delightful. I have lots of feather toys and time for daily play and training. I enjoy teaching tricks with positive reinforcement. Could you share Mimi’s current routine, favorite games, and any known quirks or sensitivities?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
