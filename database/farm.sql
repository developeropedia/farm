-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 05:40 PM
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
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `breeding_records`
--

CREATE TABLE `breeding_records` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) DEFAULT NULL,
  `station_id` int(11) NOT NULL,
  `breeding_date` date DEFAULT NULL,
  `litter_size` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breeding_records`
--

INSERT INTO `breeding_records` (`id`, `animal_id`, `station_id`, `breeding_date`, `litter_size`, `comments`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2023-07-22', 2, 'Both are healthy', '2023-07-22 04:51:34', '2023-07-22 05:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `bull_service_record`
--

CREATE TABLE `bull_service_record` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `bull_name` varchar(100) NOT NULL,
  `service_date` date NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `veterinarian` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bull_service_record`
--

INSERT INTO `bull_service_record` (`id`, `station_id`, `bull_name`, `service_date`, `service_type`, `veterinarian`, `remarks`) VALUES
(1, 1, 'Bull1', '2023-07-22', 'Artificial Insemination', 'Jack', 'Test 2');

-- --------------------------------------------------------

--
-- Table structure for table `calf_status_record`
--

CREATE TABLE `calf_status_record` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `calf_name` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `health_condition` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calf_status_record`
--

INSERT INTO `calf_status_record` (`id`, `station_id`, `calf_name`, `birth_date`, `gender`, `weight`, `health_condition`, `remarks`) VALUES
(2, 1, 'Calf1', '2023-07-22', 'Female', 3.00, 'Good', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `cattle`
--

CREATE TABLE `cattle` (
  `id` int(11) UNSIGNED NOT NULL,
  `cattle_type_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `tag_num` varchar(255) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_entry` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cattle`
--

INSERT INTO `cattle` (`id`, `cattle_type_id`, `station_id`, `tag_num`, `breed`, `date_of_birth`, `date_of_entry`, `remarks`, `created_at`, `updated_at`) VALUES
(6, 1, 1, '3622FL5g', 'Sahiwali', '2023-01-22', '2023-07-22', 'Healthy cow', '2023-07-22 04:19:27', '2023-07-22 04:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `cattle_types`
--

CREATE TABLE `cattle_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cattle_types`
--

INSERT INTO `cattle_types` (`id`, `type`) VALUES
(1, 'Cow'),
(2, 'Buffalo');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(2, 'Pakistan'),
(3, 'India'),
(4, 'America');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `preventive_measures` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `station_id`, `name`, `description`, `symptoms`, `preventive_measures`, `created_at`, `updated_at`) VALUES
(2, 1, 'Disease1', 'Fatal', 'Test', 'Medicine', '2023-07-22 11:32:34', '2023-07-22 11:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `disposal_records`
--

CREATE TABLE `disposal_records` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) DEFAULT NULL,
  `station_id` int(11) NOT NULL,
  `disposal_date` date DEFAULT NULL,
  `disposal_reason` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disposal_records`
--

INSERT INTO `disposal_records` (`id`, `animal_id`, `station_id`, `disposal_date`, `disposal_reason`, `comments`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2023-07-22', 'Death', 'Test', '2023-07-22 11:49:27', '2023-07-22 11:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `milk_production`
--

CREATE TABLE `milk_production` (
  `id` int(10) UNSIGNED NOT NULL,
  `cattle_id` int(10) UNSIGNED NOT NULL,
  `production_date` date NOT NULL,
  `morning_production` decimal(8,2) NOT NULL,
  `evening_production` decimal(8,2) NOT NULL,
  `total_production` decimal(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `milk_production`
--

INSERT INTO `milk_production` (`id`, `cattle_id`, `production_date`, `morning_production`, `evening_production`, `total_production`, `created_at`, `updated_at`) VALUES
(6, 6, '2023-07-22', 5.00, 6.00, 11.00, '2023-07-22 04:20:20', '2023-07-22 04:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `country_id`, `name`) VALUES
(1, 2, 'Station 1'),
(2, 3, 'Station 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$HiNK7Vll2UejxooV/TeBNemA9tfwCuZqo8SMRRkHDl/i1JoLcazx.', 1),
(5, 'livestockmanager1', '$2y$10$pBdj1ZydsPxbCoI.wfXOMuY.KYQib8k5A0YIyHdQJn9QR4MQP08hO', 2),
(6, 'livestockmanager2', '$2y$10$Atqyz8jWf2wY0HN7teTAVug80umzE4jS8yNiMCQQbB6.ck7pQ1Gh6', 2),
(7, 'farmmanager1', '$2y$10$pvguQr2b7y3XYhEPUTeqvuPwismkLKib7GLchRT3UN/YnNxyi1Xfy', 3),
(8, 'deo1', '$2y$10$BR3V2f0LZ3MQtFsI3/LrBOf.M9HeUqwRIKlDGyCoqk8PSbkB/k6wO', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_country`
--

CREATE TABLE `user_country` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_country`
--

INSERT INTO `user_country` (`id`, `user_id`, `country_id`) VALUES
(2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `name`) VALUES
(1, 'Super User'),
(2, 'Live Stock Manager'),
(3, 'Farm Manager'),
(4, 'DEO');

-- --------------------------------------------------------

--
-- Table structure for table `user_station`
--

CREATE TABLE `user_station` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_station`
--

INSERT INTO `user_station` (`id`, `user_id`, `station_id`) VALUES
(2, 8, 1),
(3, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breeding_records`
--
ALTER TABLE `breeding_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breeding_station_fk` (`station_id`);

--
-- Indexes for table `bull_service_record`
--
ALTER TABLE `bull_service_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bull_station_fk` (`station_id`);

--
-- Indexes for table `calf_status_record`
--
ALTER TABLE `calf_status_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calf_station_fk` (`station_id`);

--
-- Indexes for table `cattle`
--
ALTER TABLE `cattle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cattle_station_fk` (`station_id`);

--
-- Indexes for table `cattle_types`
--
ALTER TABLE `cattle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disease_station_fk` (`station_id`);

--
-- Indexes for table `disposal_records`
--
ALTER TABLE `disposal_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposal_station_fk` (`station_id`);

--
-- Indexes for table `milk_production`
--
ALTER TABLE `milk_production`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cattle_milk_fk` (`cattle_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `station_country_fk` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_country`
--
ALTER TABLE `user_country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_country_user_fk` (`user_id`),
  ADD KEY `user_country_country_fk` (`country_id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_station`
--
ALTER TABLE `user_station`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_station_user_fk` (`user_id`),
  ADD KEY `user_station_station_fk` (`station_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breeding_records`
--
ALTER TABLE `breeding_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bull_service_record`
--
ALTER TABLE `bull_service_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calf_status_record`
--
ALTER TABLE `calf_status_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cattle`
--
ALTER TABLE `cattle`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cattle_types`
--
ALTER TABLE `cattle_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disposal_records`
--
ALTER TABLE `disposal_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `milk_production`
--
ALTER TABLE `milk_production`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_country`
--
ALTER TABLE `user_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_station`
--
ALTER TABLE `user_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `breeding_records`
--
ALTER TABLE `breeding_records`
  ADD CONSTRAINT `breeding_station_fk` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `bull_service_record`
--
ALTER TABLE `bull_service_record`
  ADD CONSTRAINT `bull_station_fk` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `calf_status_record`
--
ALTER TABLE `calf_status_record`
  ADD CONSTRAINT `calf_station_fk` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cattle`
--
ALTER TABLE `cattle`
  ADD CONSTRAINT `cattle_station_fk` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `diseases`
--
ALTER TABLE `diseases`
  ADD CONSTRAINT `disease_station_fk` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `disposal_records`
--
ALTER TABLE `disposal_records`
  ADD CONSTRAINT `disposal_station_fk` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `milk_production`
--
ALTER TABLE `milk_production`
  ADD CONSTRAINT `cattle_milk_fk` FOREIGN KEY (`cattle_id`) REFERENCES `cattle` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `stations`
--
ALTER TABLE `stations`
  ADD CONSTRAINT `station_country_fk` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_country`
--
ALTER TABLE `user_country`
  ADD CONSTRAINT `user_country_country_fk` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_country_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_station`
--
ALTER TABLE `user_station`
  ADD CONSTRAINT `user_station_station_fk` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_station_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
