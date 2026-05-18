-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2026 at 01:05 AM
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
-- Database: `vehicle_maintenance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_name` varchar(100) DEFAULT NULL,
  `license_no` varchar(50) DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` enum('pending','confirmed','in-progress','completed','cancelled') NOT NULL DEFAULT 'pending',
  `total_amount` decimal(10,2) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `customer_id`, `vehicle_id`, `vehicle_name`, `license_no`, `appointment_date`, `appointment_time`, `status`, `total_amount`, `notes`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 'Toyota Camry', 'ABC-1234', '2026-03-15', '09:00:00', 'completed', 49.99, 'Routine oil change', 1, NULL, NULL),
(2, 15, 2, 'Honda Civic', 'XYZ-5678', '2026-03-16', '10:30:00', 'completed', 79.98, 'Oil change and tire rotation', 1, NULL, NULL),
(3, 16, 3, 'Ford F-150', 'DEF-9012', '2026-03-17', '14:00:00', 'completed', 149.99, 'Brake pad replacement', 2, NULL, NULL),
(4, 17, 4, 'Chevrolet Malibu', 'GHI-3456', '2026-03-18', '11:00:00', 'completed', 129.99, 'Battery replacement', NULL, NULL, NULL),
(5, 18, 5, 'Nissan Altima', 'JKL-7890', '2026-03-19', '15:30:00', 'completed', 89.99, 'Wheel alignment', 1, NULL, NULL),
(6, 19, 7, 'Mazda CX-5', 'MNO-2345', '2026-03-20', '09:30:00', 'completed', 49.99, 'Oil change', NULL, NULL, NULL),
(7, 20, 8, 'Hyundai Elantra', 'PQR-6789', '2026-03-21', '13:00:00', 'completed', 179.99, 'Transmission fluid change', 2, NULL, NULL),
(8, 21, 9, 'Kia Sorento', 'STU-0123', '2026-03-22', '10:00:00', 'completed', 99.99, 'Coolant flush', 1, NULL, NULL),
(9, 22, 10, 'Subaru Outback', 'VWX-4567', '2026-03-23', '14:30:00', 'completed', 119.99, 'Spark plug replacement', NULL, NULL, NULL),
(10, 23, 11, 'Volkswagen Jetta', 'YZA-8901', '2026-03-24', '11:30:00', 'completed', 89.99, 'Engine diagnostic', 1, NULL, NULL),
(11, 24, 12, 'Jeep Grand Cherokee', 'BCD-2345', '2026-03-25', '09:00:00', 'completed', 149.99, 'AC system service', 2, NULL, NULL),
(12, 25, 13, 'GMC Sierra', 'EFG-6789', '2026-03-26', '15:00:00', 'completed', 29.99, 'Wiper blade replacement', NULL, NULL, NULL),
(13, 26, 14, 'Ram 1500', 'HIJ-0123', '2026-03-27', '10:30:00', 'completed', 79.99, 'Headlight restoration', 1, NULL, NULL),
(14, 27, 15, 'Acura TLX', 'KLM-4567', '2026-03-28', '13:30:00', 'completed', 69.99, 'Full vehicle inspection', NULL, NULL, NULL),
(15, 28, 16, 'Lexus RX 350', 'NOP-8901', '2026-03-29', '09:30:00', 'completed', 49.99, 'Oil change', 2, NULL, NULL),
(16, 29, 17, 'BMW 3 Series', 'QRS-2345', '2026-03-30', '14:00:00', 'completed', 29.99, 'Tire rotation', 1, NULL, NULL),
(17, 30, 18, 'Mercedes-Benz C-Class', 'TUV-6789', '2026-03-31', '11:00:00', 'completed', 59.99, 'Brake inspection', NULL, NULL, NULL),
(18, 31, 19, 'Audi A4', 'WXY-0123', '2026-04-01', '15:30:00', 'completed', 149.99, 'Brake pad replacement', 1, NULL, NULL),
(19, 32, 20, 'Dodge Charger', 'ZAB-4567', '2026-04-02', '10:00:00', 'completed', 129.99, 'Battery replacement', 2, NULL, NULL),
(20, 33, 21, 'Chrysler 300', 'CDE-8901', '2026-04-03', '13:00:00', 'completed', 89.99, 'Wheel alignment', NULL, NULL, NULL),
(21, 34, 22, 'Buick Encore', 'FGH-2345', '2026-04-04', '09:00:00', 'completed', 39.99, 'Air filter replacement', 1, NULL, NULL),
(22, 35, 23, 'Cadillac XT5', 'IJK-6789', '2026-04-05', '14:30:00', 'completed', 179.99, 'Transmission fluid change', NULL, NULL, NULL),
(23, 36, 24, 'Lincoln Corsair', 'LMN-0123', '2026-04-06', '11:30:00', 'completed', 99.99, 'Coolant flush', 2, NULL, NULL),
(24, 37, 25, 'Infiniti Q50', 'OPQ-4567', '2026-04-07', '08:00:00', 'in-progress', 119.99, 'Spark plug replacement', 1, NULL, NULL),
(25, 38, 26, 'Volvo XC90', 'RST-8901', '2026-04-07', '09:00:00', 'in-progress', 89.99, 'Engine diagnostic', NULL, NULL, NULL),
(26, 39, 27, 'Porsche Macan', 'UVW-2345', '2026-04-07', '10:00:00', 'in-progress', 149.99, 'AC system service', 2, NULL, NULL),
(27, 40, 28, 'Tesla Model 3', 'XYZ-6789', '2026-04-07', '11:00:00', 'in-progress', 49.99, 'Oil change', 1, NULL, NULL),
(28, 41, 29, 'Toyota Corolla', 'ABC-0123', '2026-04-07', '13:00:00', 'in-progress', 29.99, 'Tire rotation', NULL, NULL, NULL),
(29, 42, 30, 'Honda Accord', 'DEF-4567', '2026-04-07', '14:00:00', 'in-progress', 69.99, 'Full vehicle inspection', 2, NULL, NULL),
(30, 43, 31, 'Ford Escape', 'GHI-8901', '2026-04-07', '15:00:00', 'in-progress', 49.99, 'Oil change', 1, NULL, NULL),
(31, 44, 32, 'Chevrolet Equinox', 'JKL-2345', '2026-04-08', '09:00:00', 'confirmed', 79.98, 'Oil change and tire rotation', 1, NULL, NULL),
(32, 45, 33, 'Nissan Rogue', 'MNO-6789', '2026-04-08', '10:30:00', 'confirmed', 149.99, 'Brake pad replacement', NULL, NULL, NULL),
(33, 46, 34, 'Mazda Mazda3', 'PQR-0123', '2026-04-08', '13:00:00', 'confirmed', 129.99, 'Battery replacement', 2, NULL, NULL),
(34, 47, 35, 'Hyundai Tucson', 'STU-4567', '2026-04-08', '14:30:00', 'confirmed', 89.99, 'Wheel alignment', 1, NULL, NULL),
(35, 48, 36, 'Kia Optima', 'VWX-8901', '2026-04-09', '09:00:00', 'confirmed', 39.99, 'Air filter replacement', NULL, NULL, NULL),
(36, 49, 37, 'Subaru Forester', 'YZA-2345', '2026-04-09', '10:00:00', 'confirmed', 179.99, 'Transmission fluid change', 1, NULL, NULL),
(37, 50, 38, 'Volkswagen Passat', 'BCD-6789', '2026-04-09', '11:30:00', 'confirmed', 99.99, 'Coolant flush', 2, NULL, NULL),
(38, 51, 39, 'Jeep Wrangler', 'EFG-0123', '2026-04-09', '14:00:00', 'confirmed', 119.99, 'Spark plug replacement', NULL, NULL, NULL),
(39, 52, 40, 'GMC Terrain', 'HIJ-4567', '2026-04-10', '08:30:00', 'confirmed', 89.99, 'Engine diagnostic', 1, NULL, NULL),
(40, 53, 41, 'Ram 2500', 'KLM-8901', '2026-04-10', '10:00:00', 'confirmed', 149.99, 'AC system service', NULL, NULL, NULL),
(41, 54, 42, 'Acura RDX', 'NOP-2345', '2026-04-10', '13:00:00', 'confirmed', 29.99, 'Wiper blade replacement', 2, NULL, NULL),
(42, 55, 43, 'Lexus ES 350', 'QRS-6789', '2026-04-10', '15:00:00', 'confirmed', 79.99, 'Headlight restoration', 1, NULL, NULL),
(43, 56, 44, 'BMW X5', 'TUV-0123', '2026-04-11', '09:00:00', 'confirmed', 69.99, 'Full vehicle inspection', NULL, NULL, NULL),
(44, 57, 45, 'Mercedes-Benz GLE', 'WXY-4567', '2026-04-11', '11:00:00', 'confirmed', 49.99, 'Oil change', 1, NULL, NULL),
(45, 58, 46, 'Audi Q5', 'ZAB-8901', '2026-04-11', '13:30:00', 'confirmed', 29.99, 'Tire rotation', 2, NULL, NULL),
(46, 59, 47, 'Dodge Durango', 'CDE-2345', '2026-04-11', '15:00:00', 'confirmed', 59.99, 'Brake inspection', NULL, NULL, NULL),
(47, 60, 48, 'Chrysler Pacifica', 'FGH-6789', '2026-04-12', '09:30:00', 'confirmed', 149.99, 'Brake pad replacement', 1, NULL, NULL),
(48, 61, 49, 'Buick Enclave', 'IJK-0123', '2026-04-12', '11:00:00', 'confirmed', 129.99, 'Battery replacement', NULL, NULL, NULL),
(49, 62, 50, 'Cadillac Escalade', 'LMN-4567', '2026-04-14', '09:00:00', 'pending', 89.99, 'Wheel alignment', 2, NULL, NULL),
(50, 63, 51, 'Lincoln Navigator', 'OPQ-8901', '2026-04-14', '10:30:00', 'pending', 39.99, 'Air filter replacement', 1, NULL, NULL),
(51, 64, 52, 'Infiniti QX60', 'RST-2345', '2026-04-14', '13:00:00', 'pending', 179.99, 'Transmission fluid change', NULL, NULL, NULL),
(52, 65, 53, 'Volvo S60', 'UVW-6789', '2026-04-14', '14:30:00', 'pending', 99.99, 'Coolant flush', 1, NULL, NULL),
(53, 66, 54, 'Toyota Highlander', 'XYZ-0123', '2026-04-15', '09:00:00', 'pending', 119.99, 'Spark plug replacement', 2, NULL, NULL),
(54, 67, 55, 'Honda CR-V', 'ABC-4567', '2026-04-15', '10:30:00', 'pending', 89.99, 'Engine diagnostic', NULL, NULL, NULL),
(55, 68, 56, 'Ford Explorer', 'DEF-8901', '2026-04-15', '13:00:00', 'pending', 149.99, 'AC system service', 1, NULL, NULL),
(56, 69, 57, 'Chevrolet Traverse', 'GHI-2345', '2026-04-15', '15:00:00', 'pending', 49.99, 'Oil change', NULL, NULL, NULL),
(57, 70, 58, 'Nissan Murano', 'JKL-6789', '2026-04-16', '09:00:00', 'pending', 79.98, 'Oil change and tire rotation', 2, NULL, NULL),
(58, 71, 59, 'Mazda CX-9', 'MNO-0123', '2026-04-16', '11:00:00', 'pending', 69.99, 'Full vehicle inspection', 1, NULL, NULL),
(59, 72, 60, 'Hyundai Santa Fe', 'PQR-4567', '2026-04-16', '13:30:00', 'pending', 29.99, 'Wiper blade replacement', NULL, NULL, NULL),
(60, 73, 61, 'Kia Telluride', 'STU-8901', '2026-04-16', '15:00:00', 'pending', 149.99, 'Brake pad replacement', 1, NULL, NULL),
(61, 74, 62, 'Subaru Crosstrek', 'VWX-2345', '2026-04-17', '09:00:00', 'pending', 129.99, 'Battery replacement', 2, NULL, NULL),
(62, 75, 63, 'Volkswagen Tiguan', 'YZA-6789', '2026-04-17', '10:30:00', 'pending', 89.99, 'Wheel alignment', NULL, NULL, NULL),
(63, 76, 64, 'Jeep Cherokee', 'BCD-0123', '2026-04-17', '13:00:00', 'pending', 49.99, 'Oil change', 1, NULL, NULL),
(64, 77, 65, 'GMC Acadia', 'EFG-4567', '2026-04-17', '14:30:00', 'pending', 59.99, 'Brake inspection', NULL, NULL, NULL),
(65, 78, 66, 'Toyota Tacoma', 'HIJ-8901', '2026-04-18', '09:00:00', 'pending', 179.99, 'Transmission fluid change', 2, NULL, NULL),
(66, 79, 67, 'Honda Pilot', 'KLM-2345', '2026-04-18', '11:00:00', 'pending', 99.99, 'Coolant flush', 1, NULL, NULL),
(67, 80, 68, 'Ford Ranger', 'NOP-6789', '2026-04-18', '13:30:00', 'pending', 119.99, 'Spark plug replacement', NULL, NULL, NULL),
(68, 81, 69, 'Chevrolet Colorado', 'QRS-0123', '2026-04-18', '15:00:00', 'pending', 89.99, 'Engine diagnostic', 1, NULL, NULL),
(69, 82, 70, 'Nissan Frontier', 'TUV-4567', '2026-04-19', '09:00:00', 'pending', 149.99, 'AC system service', 2, NULL, NULL),
(70, 83, 71, 'Toyota Tundra', 'WXY-8901', '2026-03-10', '10:00:00', 'completed', 49.99, 'Oil change', NULL, NULL, NULL),
(71, 84, 72, 'Honda Ridgeline', 'ZAB-2345', '2026-03-11', '11:30:00', 'completed', 29.99, 'Tire rotation', 1, NULL, NULL),
(72, 85, 73, 'Ford Bronco', 'CDE-6789', '2026-03-12', '14:00:00', 'completed', 79.99, 'Headlight restoration', 2, NULL, NULL),
(73, 86, 74, 'Chevrolet Tahoe', 'FGH-0123', '2026-03-13', '09:30:00', 'completed', 69.99, 'Full vehicle inspection', NULL, NULL, NULL),
(74, 87, 75, 'Nissan Armada', 'IJK-4567', '2026-03-14', '13:00:00', 'completed', 49.99, 'Oil change', 1, NULL, NULL),
(75, 88, 76, 'Toyota Sequoia', 'LMN-8901', '2026-02-28', '10:00:00', 'completed', 149.99, 'Brake pad replacement', 2, NULL, NULL),
(76, 89, 77, 'Honda Odyssey', 'OPQ-2345', '2026-02-27', '11:30:00', 'completed', 129.99, 'Battery replacement', NULL, NULL, NULL),
(77, 90, 78, 'Ford Edge', 'RST-6789', '2026-02-26', '14:00:00', 'completed', 89.99, 'Wheel alignment', 1, NULL, NULL),
(78, 91, 79, 'Chevrolet Blazer', 'UVW-0123', '2026-02-25', '09:00:00', 'completed', 39.99, 'Air filter replacement', NULL, NULL, NULL),
(79, 92, 80, 'Nissan Pathfinder', 'XYZ-4567', '2026-02-24', '13:30:00', 'completed', 179.99, 'Transmission fluid change', 2, NULL, NULL),
(80, 93, 81, 'Mazda CX-30', 'ABC-8901', '2026-02-23', '10:30:00', 'completed', 99.99, 'Coolant flush', 1, NULL, NULL),
(81, 94, 82, 'Hyundai Kona', 'DEF-2345', '2026-02-22', '14:00:00', 'completed', 119.99, 'Spark plug replacement', NULL, NULL, NULL),
(82, 95, 83, 'Kia Sportage', 'GHI-6789', '2026-02-21', '09:00:00', 'completed', 89.99, 'Engine diagnostic', 1, NULL, NULL),
(83, 96, 84, 'Subaru Ascent', 'JKL-0123', '2026-02-20', '11:00:00', 'completed', 149.99, 'AC system service', 2, NULL, NULL),
(84, 97, 85, 'Volkswagen Atlas', 'MNO-4567', '2026-02-19', '13:00:00', 'completed', 29.99, 'Wiper blade replacement', NULL, NULL, NULL),
(85, 98, 86, 'Jeep Compass', 'PQR-8901', '2026-02-18', '15:00:00', 'completed', 79.99, 'Headlight restoration', 1, NULL, NULL),
(86, 99, 87, 'GMC Yukon', 'STU-2345', '2026-02-17', '10:00:00', 'completed', 69.99, 'Full vehicle inspection', NULL, NULL, NULL),
(87, 100, 88, 'Toyota Prius', 'VWX-6789', '2026-02-16', '11:30:00', 'completed', 49.99, 'Oil change', 2, NULL, NULL),
(88, 101, 89, 'Honda Insight', 'YZA-0123', '2026-02-15', '14:00:00', 'completed', 29.99, 'Tire rotation', 1, NULL, NULL),
(89, 102, 90, 'Ford Fusion', 'BCD-4567', '2026-02-14', '09:30:00', 'completed', 59.99, 'Brake inspection', NULL, NULL, NULL),
(90, 103, 91, 'Chevrolet Impala', 'EFG-8901', '2026-02-13', '13:00:00', 'completed', 149.99, 'Brake pad replacement', 1, NULL, NULL),
(91, 104, 92, 'Nissan Maxima', 'HIJ-2345', '2026-02-12', '10:00:00', 'completed', 129.99, 'Battery replacement', 2, NULL, NULL),
(92, 105, 93, 'Mazda Mazda6', 'KLM-6789', '2026-02-11', '11:30:00', 'completed', 89.99, 'Wheel alignment', NULL, NULL, NULL),
(93, 106, 94, 'Hyundai Sonata', 'NOP-0123', '2026-02-10', '14:00:00', 'completed', 39.99, 'Air filter replacement', 1, NULL, NULL),
(94, 107, 95, 'Kia K5', 'QRS-4567', '2026-02-09', '09:00:00', 'completed', 179.99, 'Transmission fluid change', NULL, NULL, NULL),
(95, 108, 96, 'Subaru Legacy', 'TUV-8901', '2026-02-08', '13:30:00', 'completed', 99.99, 'Coolant flush', 2, NULL, NULL),
(96, 109, 97, 'Volkswagen Arteon', 'WXY-2345', '2026-02-07', '10:30:00', 'completed', 119.99, 'Spark plug replacement', 1, NULL, NULL),
(97, 110, 98, 'Acura ILX', 'ZAB-6789', '2026-02-06', '14:00:00', 'completed', 89.99, 'Engine diagnostic', NULL, NULL, NULL),
(98, 111, 99, 'Lexus IS 300', 'CDE-0123', '2026-02-05', '09:00:00', 'completed', 149.99, 'AC system service', 1, NULL, NULL),
(99, 112, 100, 'BMW 5 Series', 'FGH-4567', '2026-02-04', '11:00:00', 'completed', 49.99, 'Oil change', 2, NULL, NULL),
(100, 113, 101, 'Mercedes-Benz E-Class', 'IJK-8901', '2026-02-03', '13:00:00', 'completed', 79.98, 'Oil change and tire rotation', NULL, NULL, NULL),
(101, 14, 1, 'Toyota Camry', 'ABC-1234', '2026-04-21', '09:00:00', 'confirmed', 49.99, 'Regular maintenance', NULL, NULL, NULL),
(102, 15, 2, 'Honda Civic', 'XYZ-5678', '2026-04-21', '10:30:00', 'confirmed', 69.99, 'Vehicle inspection', 1, NULL, NULL),
(103, 16, 3, 'Ford F-150', 'DEF-9012', '2026-04-21', '13:00:00', 'confirmed', 89.99, 'Alignment check', 2, NULL, NULL),
(104, 17, 4, 'Chevrolet Malibu', 'GHI-3456', '2026-04-22', '09:00:00', 'pending', 49.99, 'Oil change', NULL, NULL, NULL),
(105, 18, 5, 'Nissan Altima', 'JKL-7890', '2026-04-22', '11:00:00', 'pending', 29.99, 'Tire rotation', 1, NULL, NULL),
(106, 19, 7, 'Mazda CX-5', 'MNO-2345', '2026-04-22', '14:00:00', 'pending', 149.99, 'Brake service', NULL, NULL, NULL),
(107, 20, 8, 'Hyundai Elantra', 'PQR-6789', '2026-04-23', '09:30:00', 'pending', 129.99, 'Battery check', 2, NULL, NULL),
(108, 21, 9, 'Kia Sorento', 'STU-0123', '2026-04-23', '11:00:00', 'pending', 99.99, 'Coolant service', 1, NULL, NULL),
(109, 22, 10, 'Subaru Outback', 'VWX-4567', '2026-04-23', '13:30:00', 'pending', 119.99, 'Spark plugs', NULL, NULL, NULL),
(110, 23, 11, 'Volkswagen Jetta', 'YZA-8901', '2026-04-24', '09:00:00', 'pending', 89.99, 'Diagnostic', 1, NULL, NULL),
(111, 24, 12, 'Jeep Grand Cherokee', 'BCD-2345', '2026-04-24', '10:30:00', 'pending', 149.99, 'AC service', 2, NULL, NULL),
(112, 25, 13, 'GMC Sierra', 'EFG-6789', '2026-04-24', '13:00:00', 'pending', 39.99, 'Air filter', NULL, NULL, NULL),
(113, 26, 14, 'Ram 1500', 'HIJ-0123', '2026-04-25', '09:00:00', 'pending', 49.99, 'Oil change', 1, NULL, NULL),
(114, 27, 15, 'Acura TLX', 'KLM-4567', '2026-04-25', '11:00:00', 'pending', 29.99, 'Wiper blades', NULL, NULL, NULL),
(115, 28, 16, 'Lexus RX 350', 'NOP-8901', '2026-04-25', '14:00:00', 'pending', 179.99, 'Transmission service', 2, NULL, NULL),
(116, 29, 17, 'BMW 3 Series', 'QRS-2345', '2026-04-26', '09:30:00', 'pending', 69.99, 'Inspection', 1, NULL, NULL),
(117, 30, 18, 'Mercedes-Benz C-Class', 'TUV-6789', '2026-04-26', '11:00:00', 'pending', 49.99, 'Oil change', NULL, NULL, NULL),
(118, 31, 19, 'Audi A4', 'WXY-0123', '2026-04-26', '13:30:00', 'pending', 89.99, 'Wheel alignment', 1, NULL, NULL),
(119, 32, 20, 'Dodge Charger', 'ZAB-4567', '2026-04-28', '09:00:00', 'pending', 59.99, 'Brake check', 2, NULL, NULL),
(120, 33, 21, 'Chrysler 300', 'CDE-8901', '2026-04-28', '10:30:00', 'pending', 149.99, 'Brake replacement', NULL, NULL, NULL),
(121, 34, 22, 'Buick Encore', 'FGH-2345', '2026-04-28', '13:00:00', 'pending', 129.99, 'Battery service', 1, NULL, NULL),
(122, 35, 23, 'Cadillac XT5', 'IJK-6789', '2026-04-29', '09:00:00', 'pending', 99.99, 'Coolant flush', NULL, NULL, NULL),
(123, 36, 24, 'Lincoln Corsair', 'LMN-0123', '2026-04-29', '11:00:00', 'pending', 119.99, 'Tune-up', 2, NULL, NULL),
(124, 37, 25, 'Infiniti Q50', 'OPQ-4567', '2026-04-29', '14:00:00', 'pending', 89.99, 'Computer scan', 1, NULL, NULL),
(125, 38, 26, 'Volvo XC90', 'RST-8901', '2026-04-30', '09:30:00', 'pending', 149.99, 'AC repair', NULL, NULL, NULL),
(126, 39, 27, 'Porsche Macan', 'UVW-2345', '2026-04-30', '11:00:00', 'pending', 49.99, 'Oil change', 1, NULL, NULL),
(127, 40, 28, 'Tesla Model 3', 'XYZ-6789', '2026-04-30', '13:30:00', 'pending', 79.98, 'Oil and rotation', 2, NULL, NULL),
(128, 41, 29, 'Toyota Corolla', 'ABC-0123', '2026-03-05', '10:00:00', 'cancelled', 0.00, 'Customer cancelled - scheduling conflict', 1, NULL, NULL),
(129, 42, 30, 'Honda Accord', 'DEF-4567', '2026-03-08', '14:00:00', 'cancelled', 0.00, 'Rescheduled to later date', NULL, NULL, NULL),
(130, 43, 31, 'Ford Escape', 'GHI-8901', '2026-03-09', '09:00:00', 'cancelled', 0.00, 'Vehicle sold', 2, NULL, NULL),
(131, 44, 32, 'Chevrolet Equinox', 'JKL-2345', '2026-02-28', '11:00:00', 'cancelled', 0.00, 'Customer no-show', 1, NULL, NULL),
(132, 45, 33, 'Nissan Rogue', 'MNO-6789', '2026-02-15', '13:00:00', 'cancelled', 0.00, 'Service not needed', NULL, NULL, NULL),
(133, 14, 109, 'Toyota VIOS', 'AAA666', '2026-04-17', '16:00:00', 'pending', NULL, 'Low aircon status than before', NULL, '2026-04-16 19:29:10', '2026-04-16 19:29:10'),
(134, 14, 102, 'Ford Mustang', 'ABC-1235', '2026-04-30', '10:00:00', 'cancelled', NULL, '....', NULL, '2026-04-29 10:29:48', '2026-04-29 10:30:23'),
(135, 41, 29, 'Toyota Corolla', 'ABC-0123', '2026-05-01', '08:00:00', 'completed', 49.99, 'Oil change', 1, NULL, NULL),
(136, 42, 30, 'Honda Accord', 'DEF-4567', '2026-05-01', '09:30:00', 'completed', 149.99, 'Brake pad replacement', 2, NULL, NULL),
(137, 43, 31, 'Ford Escape', 'GHI-8901', '2026-05-01', '11:00:00', 'completed', 89.99, 'Wheel alignment', 1, NULL, NULL),
(138, 44, 32, 'Chevrolet Equinox', 'JKL-2345', '2026-05-01', '13:30:00', 'completed', 29.99, 'Tire rotation', NULL, NULL, NULL),
(139, 45, 33, 'Nissan Rogue', 'MNO-6789', '2026-05-02', '08:30:00', 'completed', 129.99, 'Battery replacement', 1, NULL, NULL),
(140, 46, 34, 'Mazda Mazda3', 'PQR-0123', '2026-05-02', '10:00:00', 'completed', 99.99, 'Coolant flush', 2, NULL, NULL),
(141, 47, 35, 'Hyundai Tucson', 'STU-4567', '2026-05-02', '13:00:00', 'completed', 119.99, 'Spark plug replacement', 1, NULL, NULL),
(142, 48, 36, 'Kia Optima', 'VWX-8901', '2026-05-02', '15:00:00', 'completed', 79.99, 'Headlight restoration', NULL, NULL, NULL),
(143, 49, 37, 'Subaru Forester', 'YZA-2345', '2026-05-03', '08:00:00', 'completed', 49.99, 'Oil change', 2, NULL, NULL),
(144, 50, 38, 'Volkswagen Passat', 'BCD-6789', '2026-05-03', '10:30:00', 'completed', 89.99, 'Engine diagnostic', 1, NULL, NULL),
(145, 51, 39, 'Jeep Wrangler', 'EFG-0123', '2026-05-03', '13:00:00', 'completed', 149.99, 'AC system service', NULL, NULL, NULL),
(146, 52, 40, 'GMC Terrain', 'HIJ-4567', '2026-05-03', '15:00:00', 'completed', 39.99, 'Air filter replacement', 1, NULL, NULL),
(147, 53, 41, 'Ram 2500', 'KLM-8901', '2026-05-04', '08:30:00', 'completed', 179.99, 'Transmission fluid change', 2, NULL, NULL),
(148, 54, 42, 'Acura RDX', 'NOP-2345', '2026-05-04', '10:00:00', 'completed', 69.99, 'Full vehicle inspection', 1, NULL, NULL),
(149, 55, 43, 'Lexus ES 350', 'QRS-6789', '2026-05-04', '13:00:00', 'completed', 49.99, 'Oil change', NULL, NULL, NULL),
(150, 56, 44, 'BMW X5', 'TUV-0123', '2026-05-04', '15:00:00', 'completed', 59.99, 'Brake inspection', 1, NULL, NULL),
(151, 57, 45, 'Mercedes-Benz GLE', 'WXY-4567', '2026-05-05', '08:00:00', 'completed', 149.99, 'Brake pad replacement', 2, NULL, NULL),
(152, 58, 46, 'Audi Q5', 'ZAB-8901', '2026-05-05', '10:30:00', 'completed', 129.99, 'Battery replacement', 1, NULL, NULL),
(153, 59, 47, 'Dodge Durango', 'CDE-2345', '2026-05-05', '13:00:00', 'completed', 29.99, 'Wiper blade replacement', NULL, NULL, NULL),
(154, 60, 48, 'Chrysler Pacifica', 'FGH-6789', '2026-05-05', '15:00:00', 'completed', 89.99, 'Wheel alignment', 1, NULL, NULL),
(155, 61, 49, 'Buick Enclave', 'IJK-0123', '2026-05-06', '08:30:00', 'completed', 99.99, 'Coolant flush', 2, NULL, NULL),
(156, 62, 50, 'Cadillac Escalade', 'LMN-4567', '2026-05-06', '10:00:00', 'completed', 119.99, 'Spark plug replacement', 1, NULL, NULL),
(157, 63, 51, 'Lincoln Navigator', 'OPQ-8901', '2026-05-06', '13:30:00', 'completed', 49.99, 'Oil change', NULL, NULL, NULL),
(158, 64, 52, 'Infiniti QX60', 'RST-2345', '2026-05-06', '15:00:00', 'completed', 79.99, 'Headlight restoration', 1, NULL, NULL),
(159, 65, 53, 'Volvo S60', 'UVW-6789', '2026-05-07', '08:00:00', 'in-progress', 49.99, 'Oil change', 1, NULL, NULL),
(160, 66, 54, 'Toyota Highlander', 'XYZ-0123', '2026-05-07', '09:30:00', 'in-progress', 149.99, 'Brake pad replacement', 2, NULL, NULL),
(161, 67, 55, 'Honda CR-V', 'ABC-4567', '2026-05-07', '11:00:00', 'in-progress', 89.99, 'Engine diagnostic', 1, NULL, NULL),
(162, 68, 56, 'Ford Explorer', 'DEF-8901', '2026-05-07', '13:00:00', 'in-progress', 119.99, 'Spark plug replacement', NULL, NULL, NULL),
(163, 69, 57, 'Chevrolet Traverse', 'GHI-2345', '2026-05-07', '14:30:00', 'in-progress', 39.99, 'Air filter replacement', 1, NULL, NULL),
(164, 70, 58, 'Nissan Murano', 'JKL-6789', '2026-05-08', '08:30:00', 'confirmed', 79.98, 'Oil change and tire rotation', 2, NULL, NULL),
(165, 71, 59, 'Mazda CX-9', 'MNO-0123', '2026-05-08', '10:00:00', 'confirmed', 129.99, 'Battery replacement', 1, NULL, NULL),
(166, 72, 60, 'Hyundai Santa Fe', 'PQR-4567', '2026-05-08', '13:00:00', 'confirmed', 99.99, 'Coolant flush', NULL, NULL, NULL),
(167, 73, 61, 'Kia Telluride', 'STU-8901', '2026-05-08', '15:00:00', 'confirmed', 149.99, 'AC system service', 1, NULL, NULL),
(168, 74, 62, 'Subaru Crosstrek', 'VWX-2345', '2026-05-09', '08:00:00', 'confirmed', 89.99, 'Wheel alignment', 2, NULL, NULL),
(169, 75, 63, 'Volkswagen Tiguan', 'YZA-6789', '2026-05-09', '10:30:00', 'confirmed', 49.99, 'Oil change', 1, NULL, NULL),
(170, 76, 64, 'Jeep Cherokee', 'BCD-0123', '2026-05-09', '13:00:00', 'confirmed', 179.99, 'Transmission fluid change', NULL, NULL, NULL),
(171, 77, 65, 'GMC Acadia', 'EFG-4567', '2026-05-09', '15:00:00', 'confirmed', 69.99, 'Full vehicle inspection', 1, NULL, NULL),
(172, 78, 66, 'Toyota Tacoma', 'HIJ-8901', '2026-05-10', '08:30:00', 'confirmed', 149.99, 'Brake pad replacement', 2, NULL, NULL),
(173, 79, 67, 'Honda Pilot', 'KLM-2345', '2026-05-10', '10:00:00', 'confirmed', 49.99, 'Oil change', 1, NULL, NULL),
(174, 80, 68, 'Ford Ranger', 'NOP-6789', '2026-05-10', '13:30:00', 'confirmed', 89.99, 'Engine diagnostic', NULL, NULL, NULL),
(175, 81, 69, 'Chevrolet Colorado', 'QRS-0123', '2026-05-12', '09:00:00', 'confirmed', 119.99, 'Spark plug replacement', 1, NULL, NULL),
(176, 82, 70, 'Nissan Frontier', 'TUV-4567', '2026-05-12', '11:00:00', 'confirmed', 129.99, 'Battery replacement', 2, NULL, NULL),
(177, 83, 71, 'Toyota Tundra', 'WXY-8901', '2026-05-12', '14:00:00', 'confirmed', 59.99, 'Brake inspection', NULL, NULL, NULL),
(178, 84, 72, 'Honda Ridgeline', 'ZAB-2345', '2026-05-13', '08:30:00', 'pending', 49.99, 'Oil change', 1, NULL, NULL),
(179, 85, 73, 'Ford Bronco', 'CDE-6789', '2026-05-13', '10:00:00', 'pending', 99.99, 'Coolant flush', NULL, NULL, NULL),
(180, 86, 74, 'Chevrolet Tahoe', 'FGH-0123', '2026-05-13', '13:00:00', 'pending', 149.99, 'AC system service', 2, NULL, NULL),
(181, 87, 75, 'Nissan Armada', 'IJK-4567', '2026-05-13', '15:00:00', 'pending', 39.99, 'Air filter replacement', 1, NULL, NULL),
(182, 88, 76, 'Toyota Sequoia', 'LMN-8901', '2026-05-14', '09:00:00', 'pending', 89.99, 'Wheel alignment', 2, NULL, NULL),
(183, 89, 77, 'Honda Odyssey', 'OPQ-2345', '2026-05-14', '10:30:00', 'pending', 179.99, 'Transmission fluid change', 1, NULL, NULL),
(184, 90, 78, 'Ford Edge', 'RST-6789', '2026-05-14', '13:00:00', 'pending', 149.99, 'Brake pad replacement', NULL, NULL, NULL),
(185, 91, 79, 'Chevrolet Blazer', 'UVW-0123', '2026-05-14', '15:00:00', 'pending', 129.99, 'Battery replacement', 1, NULL, NULL),
(186, 92, 80, 'Nissan Pathfinder', 'XYZ-4567', '2026-05-15', '08:30:00', 'pending', 79.98, 'Oil change and tire rotation', 2, NULL, NULL),
(187, 93, 81, 'Mazda CX-30', 'ABC-8901', '2026-05-15', '10:00:00', 'pending', 69.99, 'Full vehicle inspection', 1, NULL, NULL),
(188, 94, 82, 'Hyundai Kona', 'DEF-2345', '2026-05-15', '13:30:00', 'pending', 119.99, 'Spark plug replacement', NULL, NULL, NULL),
(189, 95, 83, 'Kia Sportage', 'GHI-6789', '2026-05-16', '09:00:00', 'pending', 49.99, 'Oil change', 1, NULL, NULL),
(190, 96, 84, 'Subaru Ascent', 'JKL-0123', '2026-05-16', '11:00:00', 'pending', 89.99, 'Engine diagnostic', 2, NULL, NULL),
(191, 97, 85, 'Volkswagen Atlas', 'MNO-4567', '2026-05-16', '14:00:00', 'pending', 149.99, 'AC system service', 1, NULL, NULL),
(192, 98, 86, 'Jeep Compass', 'PQR-8901', '2026-05-19', '09:00:00', 'pending', 99.99, 'Coolant flush', NULL, NULL, NULL),
(193, 99, 87, 'GMC Yukon', 'STU-2345', '2026-05-19', '10:30:00', 'pending', 149.99, 'Brake pad replacement', 1, NULL, NULL),
(194, 100, 88, 'Toyota Prius', 'VWX-6789', '2026-05-19', '13:00:00', 'pending', 89.99, 'Wheel alignment', 2, NULL, NULL),
(195, 101, 89, 'Honda Insight', 'YZA-0123', '2026-05-20', '08:30:00', 'pending', 179.99, 'Transmission fluid change', 1, NULL, NULL),
(196, 102, 90, 'Ford Fusion', 'BCD-4567', '2026-05-20', '10:00:00', 'pending', 49.99, 'Oil change', NULL, NULL, NULL),
(197, 103, 91, 'Chevrolet Impala', 'EFG-8901', '2026-05-20', '13:00:00', 'pending', 129.99, 'Battery replacement', 2, NULL, NULL),
(198, 104, 92, 'Nissan Maxima', 'HIJ-2345', '2026-05-20', '15:00:00', 'pending', 69.99, 'Full vehicle inspection', 1, NULL, NULL),
(199, 105, 93, 'Mazda Mazda6', 'KLM-6789', '2026-05-21', '09:00:00', 'pending', 119.99, 'Spark plug replacement', NULL, NULL, NULL),
(200, 106, 94, 'Hyundai Sonata', 'NOP-0123', '2026-05-21', '10:30:00', 'pending', 39.99, 'Air filter replacement', 1, NULL, NULL),
(201, 107, 95, 'Kia K5', 'QRS-4567', '2026-05-21', '13:00:00', 'pending', 149.99, 'Brake pad replacement', 2, NULL, NULL),
(202, 108, 96, 'Subaru Legacy', 'TUV-8901', '2026-05-22', '09:00:00', 'pending', 49.99, 'Oil change', 1, NULL, NULL),
(203, 109, 97, 'Volkswagen Arteon', 'WXY-2345', '2026-05-22', '10:30:00', 'pending', 89.99, 'Wheel alignment', NULL, NULL, NULL),
(204, 110, 98, 'Acura ILX', 'ZAB-6789', '2026-05-22', '13:00:00', 'pending', 99.99, 'Coolant flush', 2, NULL, NULL),
(205, 111, 99, 'Lexus IS 300', 'CDE-0123', '2026-05-22', '15:00:00', 'pending', 129.99, 'Battery replacement', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_services`
--

CREATE TABLE `appointment_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_services`
--

INSERT INTO `appointment_services` (`id`, `appointment_id`, `service_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 49.99, NULL, NULL),
(2, 2, 1, 49.99, NULL, NULL),
(3, 2, 2, 29.99, NULL, NULL),
(4, 3, 4, 149.99, NULL, NULL),
(5, 4, 5, 129.99, NULL, NULL),
(6, 5, 6, 89.99, NULL, NULL),
(7, 6, 1, 49.99, NULL, NULL),
(8, 7, 8, 179.99, NULL, NULL),
(9, 8, 9, 99.99, NULL, NULL),
(10, 9, 10, 119.99, NULL, NULL),
(11, 10, 11, 89.99, NULL, NULL),
(12, 11, 12, 149.99, NULL, NULL),
(13, 12, 13, 29.99, NULL, NULL),
(14, 13, 14, 79.99, NULL, NULL),
(15, 14, 15, 69.99, NULL, NULL),
(16, 15, 1, 49.99, NULL, NULL),
(17, 16, 2, 29.99, NULL, NULL),
(18, 17, 3, 59.99, NULL, NULL),
(19, 18, 4, 149.99, NULL, NULL),
(20, 19, 5, 129.99, NULL, NULL),
(21, 20, 6, 89.99, NULL, NULL),
(22, 21, 7, 39.99, NULL, NULL),
(23, 22, 8, 179.99, NULL, NULL),
(24, 23, 9, 99.99, NULL, NULL),
(25, 24, 10, 119.99, NULL, NULL),
(26, 25, 11, 89.99, NULL, NULL),
(27, 26, 12, 149.99, NULL, NULL),
(28, 27, 1, 49.99, NULL, NULL),
(29, 28, 2, 29.99, NULL, NULL),
(30, 29, 15, 69.99, NULL, NULL),
(31, 30, 1, 49.99, NULL, NULL),
(32, 31, 1, 49.99, NULL, NULL),
(33, 31, 2, 29.99, NULL, NULL),
(34, 32, 4, 149.99, NULL, NULL),
(35, 33, 5, 129.99, NULL, NULL),
(36, 34, 6, 89.99, NULL, NULL),
(37, 35, 7, 39.99, NULL, NULL),
(38, 36, 8, 179.99, NULL, NULL),
(39, 37, 9, 99.99, NULL, NULL),
(40, 38, 10, 119.99, NULL, NULL),
(41, 39, 11, 89.99, NULL, NULL),
(42, 40, 12, 149.99, NULL, NULL),
(43, 41, 13, 29.99, NULL, NULL),
(44, 42, 14, 79.99, NULL, NULL),
(45, 43, 15, 69.99, NULL, NULL),
(46, 44, 1, 49.99, NULL, NULL),
(47, 45, 2, 29.99, NULL, NULL),
(48, 46, 3, 59.99, NULL, NULL),
(49, 47, 4, 149.99, NULL, NULL),
(50, 48, 5, 129.99, NULL, NULL),
(51, 49, 6, 89.99, NULL, NULL),
(52, 50, 7, 39.99, NULL, NULL),
(53, 51, 8, 179.99, NULL, NULL),
(54, 52, 9, 99.99, NULL, NULL),
(55, 53, 10, 119.99, NULL, NULL),
(56, 54, 11, 89.99, NULL, NULL),
(57, 55, 12, 149.99, NULL, NULL),
(58, 56, 1, 49.99, NULL, NULL),
(59, 57, 1, 49.99, NULL, NULL),
(60, 57, 2, 29.99, NULL, NULL),
(61, 58, 15, 69.99, NULL, NULL),
(62, 59, 13, 29.99, NULL, NULL),
(63, 60, 4, 149.99, NULL, NULL),
(64, 61, 5, 129.99, NULL, NULL),
(65, 62, 6, 89.99, NULL, NULL),
(66, 63, 1, 49.99, NULL, NULL),
(67, 64, 3, 59.99, NULL, NULL),
(68, 65, 8, 179.99, NULL, NULL),
(69, 66, 9, 99.99, NULL, NULL),
(70, 67, 10, 119.99, NULL, NULL),
(71, 68, 11, 89.99, NULL, NULL),
(72, 69, 12, 149.99, NULL, NULL),
(73, 70, 1, 49.99, NULL, NULL),
(74, 71, 2, 29.99, NULL, NULL),
(75, 72, 15, 69.99, NULL, NULL),
(76, 73, 1, 49.99, NULL, NULL),
(77, 74, 2, 29.99, NULL, NULL),
(78, 75, 14, 79.99, NULL, NULL),
(79, 76, 15, 69.99, NULL, NULL),
(80, 77, 1, 49.99, NULL, NULL),
(81, 78, 4, 149.99, NULL, NULL),
(82, 79, 5, 129.99, NULL, NULL),
(83, 80, 6, 89.99, NULL, NULL),
(84, 81, 7, 39.99, NULL, NULL),
(85, 82, 8, 179.99, NULL, NULL),
(86, 83, 9, 99.99, NULL, NULL),
(87, 84, 10, 119.99, NULL, NULL),
(88, 85, 11, 89.99, NULL, NULL),
(89, 86, 12, 149.99, NULL, NULL),
(90, 87, 13, 29.99, NULL, NULL),
(91, 88, 14, 79.99, NULL, NULL),
(92, 89, 15, 69.99, NULL, NULL),
(93, 90, 1, 49.99, NULL, NULL),
(94, 91, 2, 29.99, NULL, NULL),
(95, 92, 3, 59.99, NULL, NULL),
(96, 93, 4, 149.99, NULL, NULL),
(97, 94, 5, 129.99, NULL, NULL),
(98, 95, 6, 89.99, NULL, NULL),
(99, 96, 7, 39.99, NULL, NULL),
(100, 97, 8, 179.99, NULL, NULL),
(101, 98, 9, 99.99, NULL, NULL),
(102, 99, 10, 119.99, NULL, NULL),
(103, 100, 11, 89.99, NULL, NULL),
(104, 101, 12, 149.99, NULL, NULL),
(105, 102, 1, 49.99, NULL, NULL),
(106, 103, 1, 49.99, NULL, NULL),
(107, 103, 2, 29.99, NULL, NULL),
(108, 104, 1, 49.99, NULL, NULL),
(109, 105, 15, 69.99, NULL, NULL),
(110, 106, 6, 89.99, NULL, NULL),
(111, 107, 1, 49.99, NULL, NULL),
(112, 108, 2, 29.99, NULL, NULL),
(113, 109, 4, 149.99, NULL, NULL),
(114, 110, 5, 129.99, NULL, NULL),
(115, 111, 9, 99.99, NULL, NULL),
(116, 112, 10, 119.99, NULL, NULL),
(117, 113, 11, 89.99, NULL, NULL),
(118, 114, 12, 149.99, NULL, NULL),
(119, 115, 7, 39.99, NULL, NULL),
(120, 116, 1, 49.99, NULL, NULL),
(121, 117, 13, 29.99, NULL, NULL),
(122, 118, 8, 179.99, NULL, NULL),
(123, 119, 15, 69.99, NULL, NULL),
(124, 120, 1, 49.99, NULL, NULL),
(125, 121, 6, 89.99, NULL, NULL),
(126, 122, 3, 59.99, NULL, NULL),
(127, 123, 4, 149.99, NULL, NULL),
(128, 124, 5, 129.99, NULL, NULL),
(129, 125, 9, 99.99, NULL, NULL),
(130, 126, 10, 119.99, NULL, NULL),
(131, 127, 11, 89.99, NULL, NULL),
(132, 128, 12, 149.99, NULL, NULL),
(133, 129, 1, 49.99, NULL, NULL),
(134, 130, 1, 49.99, NULL, NULL),
(135, 130, 2, 29.99, NULL, NULL),
(136, 133, 12, NULL, '2026-04-16 19:29:10', '2026-04-16 19:29:10'),
(137, 134, 6, NULL, '2026-04-29 10:29:48', '2026-04-29 10:29:48'),
(138, 131, 1, 49.99, NULL, NULL),
(139, 132, 4, 149.99, NULL, NULL),
(140, 133, 6, 89.99, NULL, NULL),
(141, 134, 2, 29.99, NULL, NULL),
(142, 135, 5, 129.99, NULL, NULL),
(143, 136, 9, 99.99, NULL, NULL),
(144, 137, 10, 119.99, NULL, NULL),
(145, 138, 14, 79.99, NULL, NULL),
(146, 139, 1, 49.99, NULL, NULL),
(147, 140, 11, 89.99, NULL, NULL),
(148, 141, 12, 149.99, NULL, NULL),
(149, 142, 7, 39.99, NULL, NULL),
(150, 143, 8, 179.99, NULL, NULL),
(151, 144, 15, 69.99, NULL, NULL),
(152, 145, 1, 49.99, NULL, NULL),
(153, 146, 3, 59.99, NULL, NULL),
(154, 147, 4, 149.99, NULL, NULL),
(155, 148, 5, 129.99, NULL, NULL),
(156, 149, 13, 29.99, NULL, NULL),
(157, 150, 6, 89.99, NULL, NULL),
(158, 151, 9, 99.99, NULL, NULL),
(159, 152, 10, 119.99, NULL, NULL),
(160, 153, 1, 49.99, NULL, NULL),
(161, 154, 14, 79.99, NULL, NULL),
(162, 155, 1, 49.99, NULL, NULL),
(163, 156, 4, 149.99, NULL, NULL),
(164, 157, 11, 89.99, NULL, NULL),
(165, 158, 10, 119.99, NULL, NULL),
(166, 159, 7, 39.99, NULL, NULL),
(167, 160, 1, 49.99, NULL, NULL),
(168, 160, 2, 29.99, NULL, NULL),
(169, 161, 5, 129.99, NULL, NULL),
(170, 162, 9, 99.99, NULL, NULL),
(171, 163, 12, 149.99, NULL, NULL),
(172, 164, 6, 89.99, NULL, NULL),
(173, 165, 1, 49.99, NULL, NULL),
(174, 166, 8, 179.99, NULL, NULL),
(175, 167, 15, 69.99, NULL, NULL),
(176, 168, 4, 149.99, NULL, NULL),
(177, 169, 1, 49.99, NULL, NULL),
(178, 170, 11, 89.99, NULL, NULL),
(179, 171, 10, 119.99, NULL, NULL),
(180, 172, 5, 129.99, NULL, NULL),
(181, 173, 3, 59.99, NULL, NULL),
(182, 174, 1, 49.99, NULL, NULL),
(183, 175, 9, 99.99, NULL, NULL),
(184, 176, 12, 149.99, NULL, NULL),
(185, 177, 7, 39.99, NULL, NULL),
(186, 178, 6, 89.99, NULL, NULL),
(187, 179, 8, 179.99, NULL, NULL),
(188, 180, 4, 149.99, NULL, NULL),
(189, 181, 5, 129.99, NULL, NULL),
(190, 182, 1, 49.99, NULL, NULL),
(191, 182, 2, 29.99, NULL, NULL),
(192, 183, 15, 69.99, NULL, NULL),
(193, 184, 10, 119.99, NULL, NULL),
(194, 185, 1, 49.99, NULL, NULL),
(195, 186, 11, 89.99, NULL, NULL),
(196, 187, 12, 149.99, NULL, NULL),
(197, 188, 9, 99.99, NULL, NULL),
(198, 189, 4, 149.99, NULL, NULL),
(199, 190, 6, 89.99, NULL, NULL),
(200, 191, 8, 179.99, NULL, NULL),
(201, 192, 1, 49.99, NULL, NULL),
(202, 193, 5, 129.99, NULL, NULL),
(203, 194, 15, 69.99, NULL, NULL),
(204, 195, 10, 119.99, NULL, NULL),
(205, 196, 7, 39.99, NULL, NULL),
(206, 197, 4, 149.99, NULL, NULL),
(207, 198, 1, 49.99, NULL, NULL),
(208, 199, 6, 89.99, NULL, NULL),
(209, 200, 9, 99.99, NULL, NULL),
(210, 201, 5, 129.99, NULL, NULL),
(211, 202, 1, 49.99, NULL, NULL),
(212, 203, 6, 89.99, NULL, NULL),
(213, 204, 9, 99.99, NULL, NULL),
(214, 205, 5, 129.99, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-matthew.mechanic@vehiclecare.co|127.0.0.1', 'i:3;', 1777469483),
('laravel-cache-matthew.mechanic@vehiclecare.co|127.0.0.1:timer', 'i:1777469483;', 1777469483);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_08_053338_create_vehicles_table', 1),
(5, '2026_04_08_053407_create_services_table', 1),
(6, '2026_04_08_053447_create_appointments_table', 1),
(7, '2026_04_08_053514_create_tasks_table', 1),
(8, '2026_04_08_053550_create_appointment_services_table', 1),
(9, '2026_04_20_061531_create_sessions_table', 2),
(10, '2026_04_29_192424_add_valid_id_to_users_table', 2),
(11, '2026_05_15_141046_add_licence_no_to_appointments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `base_price` decimal(10,2) DEFAULT NULL,
  `estimated_duration` int(11) DEFAULT NULL COMMENT 'Duration in minutes',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `description`, `base_price`, `estimated_duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Oil Change', 'Standard oil change with filter replacement', 49.99, 30, 'active', NULL, NULL),
(2, 'Tire Rotation', 'Rotate all four tires for even wear', 29.99, 30, 'active', NULL, NULL),
(3, 'Brake Inspection', 'Complete brake system inspection', 59.99, 45, 'active', NULL, NULL),
(4, 'Brake Pad Replacement', 'Replace front or rear brake pads', 149.99, 90, 'active', NULL, NULL),
(5, 'Battery Replacement', 'Replace car battery', 129.99, 30, 'active', NULL, NULL),
(6, 'Wheel Alignment', 'Four-wheel alignment service', 89.99, 60, 'active', NULL, NULL),
(7, 'Air Filter Replacement', 'Replace engine air filter', 39.99, 20, 'active', NULL, NULL),
(8, 'Transmission Fluid Change', 'Drain and refill transmission fluid', 179.99, 60, 'active', NULL, NULL),
(9, 'Coolant Flush', 'Complete cooling system flush', 99.99, 60, 'active', NULL, NULL),
(10, 'Spark Plug Replacement', 'Replace all spark plugs', 119.99, 75, 'active', NULL, NULL),
(11, 'Engine Diagnostic', 'Computer diagnostic scan', 89.99, 45, 'active', NULL, NULL),
(12, 'AC System Service', 'Air conditioning inspection and recharge', 149.99, 60, 'active', NULL, NULL),
(13, 'Wiper Blade Replacement', 'Replace windshield wiper blades', 29.99, 15, 'active', NULL, NULL),
(14, 'Headlight Restoration', 'Restore cloudy headlight lenses', 79.99, 45, 'active', NULL, NULL),
(15, 'Full Vehicle Inspection', 'Comprehensive 50-point inspection', 69.99, 60, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `mechanic_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('assigned','in-progress','completed') NOT NULL DEFAULT 'assigned',
  `assigned_by` bigint(20) UNSIGNED NOT NULL,
  `assigned_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `work_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `appointment_id`, `mechanic_id`, `service_id`, `status`, `assigned_by`, `assigned_at`, `started_at`, `completed_at`, `notes`, `work_description`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 'completed', 1, '2026-04-16 07:17:00', '2026-03-15 01:05:00', '2026-03-15 01:30:00', 'Standard oil change completed', 'Changed oil filter, replaced 5W-30 synthetic oil', NULL, NULL),
(2, 2, 5, 1, 'completed', 1, '2026-04-16 07:17:00', '2026-03-16 02:35:00', '2026-03-16 03:00:00', 'Oil change done', 'Used synthetic blend oil as requested', NULL, NULL),
(3, 2, 6, 2, 'completed', 1, '2026-04-16 07:17:00', '2026-03-16 03:00:00', '2026-03-16 03:25:00', 'Tires rotated', 'Front to back rotation, checked tire pressure', NULL, NULL),
(4, 3, 4, 4, 'completed', 2, '2026-04-16 07:17:00', '2026-03-17 06:10:00', '2026-03-17 07:30:00', 'Front brake pads replaced', 'Installed ceramic brake pads, tested braking system', NULL, NULL),
(5, 4, 7, 5, 'completed', 1, '2026-04-16 07:17:00', '2026-03-18 03:05:00', '2026-03-18 03:30:00', 'Battery replaced', 'Installed new 650 CCA battery, tested charging system', NULL, NULL),
(6, 5, 5, 6, 'completed', 1, '2026-04-16 07:17:00', '2026-03-19 07:40:00', '2026-03-19 08:35:00', 'Alignment completed', 'Four-wheel alignment, all specs within range', NULL, NULL),
(7, 6, 8, 1, 'completed', 1, '2026-04-16 07:17:00', '2026-03-20 01:35:00', '2026-03-20 02:00:00', 'Oil service done', 'Standard oil change with conventional oil', NULL, NULL),
(8, 7, 9, 8, 'completed', 2, '2026-04-16 07:17:00', '2026-03-21 05:10:00', '2026-03-21 06:05:00', 'Transmission serviced', 'Drained and refilled ATF, no leaks detected', NULL, NULL),
(9, 8, 4, 9, 'completed', 1, '2026-04-16 07:17:00', '2026-03-22 02:05:00', '2026-03-22 03:00:00', 'Coolant system flushed', 'Complete flush, refilled with 50/50 mix', NULL, NULL),
(10, 9, 10, 10, 'completed', 1, '2026-04-16 07:17:00', '2026-03-23 06:40:00', '2026-03-23 07:50:00', 'Spark plugs replaced', 'Installed iridium plugs, engine runs smooth', NULL, NULL),
(11, 10, 5, 11, 'completed', 1, '2026-04-16 07:17:00', '2026-03-24 03:35:00', '2026-03-24 04:15:00', 'Diagnostic scan complete', 'No error codes found, cleared old codes', NULL, NULL),
(12, 11, 6, 12, 'completed', 2, '2026-04-16 07:17:00', '2026-03-25 01:10:00', '2026-03-25 02:05:00', 'AC recharged', 'System recharged, cooling properly', NULL, NULL),
(13, 12, 7, 13, 'completed', 1, '2026-04-16 07:17:00', '2026-03-26 07:05:00', '2026-03-26 07:20:00', 'Wipers replaced', 'Both front wipers replaced', NULL, NULL),
(14, 13, 4, 14, 'completed', 1, '2026-04-16 07:17:00', '2026-03-27 02:35:00', '2026-03-27 03:15:00', 'Headlights restored', 'Both headlights clear now', NULL, NULL),
(15, 14, 8, 15, 'completed', 1, '2026-04-16 07:17:00', '2026-03-28 05:40:00', '2026-03-28 06:35:00', 'Full inspection done', 'All systems checked, report provided', NULL, NULL),
(16, 15, 9, 1, 'completed', 2, '2026-04-16 07:17:00', '2026-03-29 01:35:00', '2026-03-29 02:00:00', 'Oil changed', 'Synthetic oil used', NULL, NULL),
(17, 16, 5, 2, 'completed', 1, '2026-04-16 07:17:00', '2026-03-30 06:05:00', '2026-03-30 06:30:00', 'Tires rotated', 'Cross pattern rotation', NULL, NULL),
(18, 17, 10, 3, 'completed', 1, '2026-04-16 07:17:00', '2026-03-31 03:10:00', '2026-03-31 03:50:00', 'Brakes inspected', 'Front pads at 40%, rear at 60%', NULL, NULL),
(19, 18, 4, 4, 'completed', 1, '2026-04-16 07:17:00', '2026-04-01 07:40:00', '2026-04-01 09:00:00', 'Brake pads replaced', 'Rear brake pads replaced', NULL, NULL),
(20, 19, 6, 5, 'completed', 2, '2026-04-16 07:17:00', '2026-04-02 02:10:00', '2026-04-02 02:35:00', 'New battery installed', '700 CCA battery', NULL, NULL),
(21, 20, 7, 6, 'completed', 1, '2026-04-16 07:17:00', '2026-04-03 05:10:00', '2026-04-03 06:00:00', 'Alignment done', 'Adjusted camber and toe', NULL, NULL),
(22, 21, 5, 7, 'completed', 1, '2026-04-16 07:17:00', '2026-04-04 01:05:00', '2026-04-04 01:20:00', 'Air filter changed', 'OEM filter installed', NULL, NULL),
(23, 22, 8, 8, 'completed', 1, '2026-04-16 07:17:00', '2026-04-05 06:40:00', '2026-04-05 07:35:00', 'Trans fluid changed', 'Full synthetic ATF', NULL, NULL),
(24, 23, 9, 9, 'completed', 2, '2026-04-16 07:17:00', '2026-04-06 03:40:00', '2026-04-06 04:35:00', 'Coolant flushed', 'System clean, no issues', NULL, NULL),
(25, 24, 4, 10, 'in-progress', 1, '2026-04-16 07:17:00', '2026-04-07 00:05:00', NULL, 'Working on spark plugs', 'Removing old plugs, 2 of 4 done', NULL, NULL),
(26, 25, 11, 11, 'assigned', 5, '2026-04-29 05:28:48', '2026-04-07 01:10:00', NULL, 'First do the minimum engine checkup.', 'Scanning all modules', NULL, '2026-04-29 05:28:48'),
(27, 26, 6, 12, 'in-progress', 2, '2026-04-16 07:17:00', '2026-04-07 02:10:00', NULL, 'AC system service\r\nEngine', 'Checking for leaks', NULL, '2026-04-23 00:14:58'),
(28, 27, 7, 1, 'in-progress', 1, '2026-04-16 07:17:00', '2026-04-07 03:05:00', NULL, 'Oil change in progress', 'Draining old oil', NULL, NULL),
(29, 28, 8, 2, 'in-progress', 1, '2026-04-16 07:17:00', '2026-04-07 05:10:00', NULL, 'Rotating tires', 'Front left done', NULL, NULL),
(30, 29, 9, 15, 'in-progress', 2, '2026-04-16 07:17:00', '2026-04-07 06:05:00', NULL, 'Vehicle inspection', 'Checking brakes and suspension', NULL, NULL),
(31, 30, 10, 1, 'in-progress', 1, '2026-04-16 07:17:00', '2026-04-07 07:10:00', NULL, 'Oil service', 'Started oil change', NULL, NULL),
(32, 31, 4, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 31, 5, 2, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 32, 6, 4, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 33, 7, 5, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 34, 8, 6, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 35, 9, 7, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(38, 36, 10, 8, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 37, 4, 9, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(40, 38, 5, 10, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 39, 6, 11, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 40, 7, 12, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(43, 41, 8, 13, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 42, 9, 14, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 43, 10, 15, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 44, 4, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 45, 5, 2, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 46, 6, 3, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 47, 7, 4, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 48, 8, 5, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 73, 4, 1, 'completed', 1, '2026-04-16 07:17:00', '2026-03-10 02:10:00', '2026-03-10 02:35:00', 'Oil change complete', 'Standard service', NULL, NULL),
(52, 74, 5, 2, 'completed', 1, '2026-04-16 07:17:00', '2026-03-11 03:40:00', '2026-03-11 04:05:00', 'Tire rotation done', 'All tires balanced', NULL, NULL),
(53, 75, 6, 14, 'completed', 2, '2026-04-16 07:17:00', '2026-03-12 06:10:00', '2026-03-12 06:50:00', 'Headlights restored', 'Both lenses clear', NULL, NULL),
(54, 76, 7, 15, 'completed', 1, '2026-04-16 07:17:00', '2026-03-13 01:40:00', '2026-03-13 02:35:00', 'Inspection complete', 'Passed all checks', NULL, NULL),
(55, 77, 8, 1, 'completed', 1, '2026-04-16 07:17:00', '2026-03-14 05:10:00', '2026-03-14 05:35:00', 'Oil service done', 'Synthetic blend', NULL, NULL),
(56, 78, 9, 4, 'completed', 2, '2026-04-16 07:17:00', '2026-02-28 02:10:00', '2026-02-28 03:30:00', 'Brake pads replaced', 'Front and rear done', NULL, NULL),
(57, 79, 10, 5, 'completed', 1, '2026-04-16 07:17:00', '2026-02-27 03:40:00', '2026-02-27 04:05:00', 'Battery replaced', '650 CCA battery', NULL, NULL),
(58, 80, 4, 6, 'completed', 1, '2026-04-16 07:17:00', '2026-02-26 06:10:00', '2026-02-26 07:00:00', 'Alignment done', 'All wheels aligned', NULL, NULL),
(59, 81, 5, 7, 'completed', 1, '2026-04-16 07:17:00', '2026-02-25 01:10:00', '2026-02-25 01:25:00', 'Air filter replaced', 'High flow filter', NULL, NULL),
(60, 82, 6, 8, 'completed', 2, '2026-04-16 07:17:00', '2026-02-24 05:40:00', '2026-02-24 06:35:00', 'Transmission serviced', 'Fluid changed', NULL, NULL),
(61, 83, 7, 9, 'completed', 1, '2026-04-16 07:17:00', '2026-02-23 02:40:00', '2026-02-23 03:35:00', 'Coolant flush done', 'Fresh coolant', NULL, NULL),
(62, 84, 8, 10, 'completed', 1, '2026-04-16 07:17:00', '2026-02-22 06:10:00', '2026-02-22 07:20:00', 'Spark plugs done', 'All 6 replaced', NULL, NULL),
(63, 85, 9, 11, 'completed', 1, '2026-04-16 07:17:00', '2026-02-21 01:10:00', '2026-02-21 01:50:00', 'Diagnostic complete', 'No codes found', NULL, NULL),
(64, 86, 10, 12, 'completed', 2, '2026-04-16 07:17:00', '2026-02-20 03:10:00', '2026-02-20 04:05:00', 'AC serviced', 'Recharged system', NULL, NULL),
(65, 87, 4, 13, 'completed', 1, '2026-04-16 07:17:00', '2026-02-19 05:10:00', '2026-02-19 05:25:00', 'Wipers replaced', 'Premium blades', NULL, NULL),
(66, 88, 5, 14, 'completed', 1, '2026-04-16 07:17:00', '2026-02-18 07:10:00', '2026-02-18 07:50:00', 'Headlights done', 'Restoration complete', NULL, NULL),
(67, 89, 6, 15, 'completed', 1, '2026-04-16 07:17:00', '2026-02-17 02:10:00', '2026-02-17 03:05:00', 'Full inspection', 'All systems good', NULL, NULL),
(68, 90, 7, 1, 'completed', 2, '2026-04-16 07:17:00', '2026-02-16 03:40:00', '2026-02-16 04:05:00', 'Oil changed', 'Full synthetic', NULL, NULL),
(69, 91, 8, 2, 'completed', 1, '2026-04-16 07:17:00', '2026-02-15 06:10:00', '2026-02-15 06:35:00', 'Tires rotated', 'Balanced and rotated', NULL, NULL),
(70, 92, 9, 3, 'completed', 1, '2026-04-16 07:17:00', '2026-02-14 01:40:00', '2026-02-14 02:20:00', 'Brake inspection', 'Pads and rotors checked', NULL, NULL),
(71, 93, 10, 4, 'completed', 1, '2026-04-16 07:17:00', '2026-02-13 05:10:00', '2026-02-13 06:30:00', 'Brakes replaced', 'Front pads installed', NULL, NULL),
(72, 94, 4, 5, 'completed', 2, '2026-04-16 07:17:00', '2026-02-12 02:10:00', '2026-02-12 02:35:00', 'Battery installed', 'Tested charging', NULL, NULL),
(73, 95, 5, 6, 'completed', 1, '2026-04-16 07:17:00', '2026-02-11 03:40:00', '2026-02-11 04:35:00', 'Alignment service', 'Perfect alignment', NULL, NULL),
(74, 96, 6, 7, 'completed', 1, '2026-04-16 07:17:00', '2026-02-10 06:10:00', '2026-02-10 06:25:00', 'Filter changed', 'OEM air filter', NULL, NULL),
(75, 97, 7, 8, 'completed', 1, '2026-04-16 07:17:00', '2026-02-09 01:10:00', '2026-02-09 02:05:00', 'Trans fluid done', 'Fresh ATF installed', NULL, NULL),
(76, 98, 8, 9, 'completed', 2, '2026-04-16 07:17:00', '2026-02-08 05:40:00', '2026-02-08 06:35:00', 'Coolant serviced', 'System flushed', NULL, NULL),
(77, 99, 9, 10, 'completed', 1, '2026-04-16 07:17:00', '2026-02-07 02:40:00', '2026-02-07 03:50:00', 'Plugs replaced', 'Iridium plugs', NULL, NULL),
(78, 100, 10, 11, 'completed', 1, '2026-04-16 07:17:00', '2026-02-06 06:10:00', '2026-02-06 06:50:00', 'Diagnostic done', 'System check complete', NULL, NULL),
(79, 101, 4, 12, 'completed', 1, '2026-04-16 07:17:00', '2026-02-05 01:10:00', '2026-02-05 02:05:00', 'AC recharged', 'Cold air blowing', NULL, NULL),
(80, 102, 5, 1, 'completed', 2, '2026-04-16 07:17:00', '2026-02-04 03:10:00', '2026-02-04 03:35:00', 'Oil service', 'Standard oil change', NULL, NULL),
(81, 103, 6, 1, 'completed', 1, '2026-04-16 07:17:00', '2026-02-03 05:10:00', '2026-02-03 05:35:00', 'Oil changed', 'Synthetic oil', NULL, NULL),
(82, 103, 7, 2, 'completed', 1, '2026-04-16 07:17:00', '2026-02-03 05:35:00', '2026-02-03 06:00:00', 'Tires rotated', 'Rotation complete', NULL, NULL),
(83, 49, 4, 6, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(84, 50, 5, 7, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(85, 51, 6, 8, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(86, 52, 7, 9, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(87, 53, 8, 10, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(88, 54, 9, 11, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(89, 55, 10, 12, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(90, 56, 4, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(91, 57, 5, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(92, 57, 6, 2, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(93, 58, 7, 15, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(94, 59, 8, 13, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(95, 60, 9, 4, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(96, 61, 10, 5, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(97, 62, 4, 6, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(98, 63, 5, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(99, 64, 6, 3, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(100, 65, 7, 8, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(101, 66, 8, 9, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(102, 67, 9, 10, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(103, 68, 10, 11, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(104, 69, 4, 12, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(105, 70, 5, 1, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(106, 71, 6, 2, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(107, 72, 7, 15, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(108, 104, 8, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(109, 105, 9, 15, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(110, 106, 10, 6, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(111, 107, 4, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(112, 108, 5, 2, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(113, 109, 6, 4, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(114, 110, 7, 5, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(115, 111, 8, 9, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(116, 112, 9, 10, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(117, 113, 10, 11, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(118, 114, 4, 12, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(119, 115, 5, 7, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(120, 116, 6, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(121, 117, 7, 13, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(122, 118, 8, 8, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(123, 119, 9, 15, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(124, 120, 10, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(125, 121, 4, 6, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(126, 122, 5, 3, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(127, 123, 6, 4, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(128, 124, 7, 5, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(129, 125, 8, 9, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(130, 126, 9, 10, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(131, 127, 10, 11, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(132, 128, 4, 12, 'assigned', 2, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(133, 129, 5, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(134, 130, 6, 1, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(135, 130, 7, 2, 'assigned', 1, '2026-04-16 07:17:00', NULL, NULL, NULL, NULL, NULL, NULL),
(136, 131, 4, 1, 'completed', 1, '2026-05-07 03:59:08', '2026-05-01 00:05:00', '2026-05-01 00:35:00', 'Oil change done', 'Synthetic oil, new filter', NULL, NULL),
(137, 132, 5, 4, 'completed', 2, '2026-05-07 03:59:08', '2026-05-01 01:35:00', '2026-05-01 03:00:00', 'Brake pads replaced', 'Ceramic pads front and rear', NULL, NULL),
(138, 133, 6, 6, 'completed', 1, '2026-05-07 03:59:08', '2026-05-01 03:05:00', '2026-05-01 04:00:00', 'Alignment complete', 'All four wheels aligned', NULL, NULL),
(139, 134, 7, 2, 'completed', 1, '2026-05-07 03:59:08', '2026-05-01 05:35:00', '2026-05-01 06:00:00', 'Tires rotated', 'Cross rotation pattern', NULL, NULL),
(140, 135, 8, 5, 'completed', 1, '2026-05-07 03:59:08', '2026-05-02 00:35:00', '2026-05-02 01:00:00', 'Battery replaced', '700 CCA installed, tested', NULL, NULL),
(141, 136, 9, 9, 'completed', 2, '2026-05-07 03:59:08', '2026-05-02 02:05:00', '2026-05-02 03:00:00', 'Coolant flushed', 'Fresh 50/50 coolant mix', NULL, NULL),
(142, 137, 10, 10, 'completed', 1, '2026-05-07 03:59:08', '2026-05-02 05:05:00', '2026-05-02 06:20:00', 'Spark plugs replaced', 'Iridium plugs, all 4 done', NULL, NULL),
(143, 138, 4, 14, 'completed', 1, '2026-05-07 03:59:08', '2026-05-02 07:05:00', '2026-05-02 07:50:00', 'Headlights restored', 'Both lenses polished clear', NULL, NULL),
(144, 139, 5, 1, 'completed', 2, '2026-05-07 03:59:08', '2026-05-03 00:05:00', '2026-05-03 00:35:00', 'Oil service done', 'Standard synthetic oil', NULL, NULL),
(145, 140, 6, 11, 'completed', 1, '2026-05-07 03:59:08', '2026-05-03 02:35:00', '2026-05-03 03:15:00', 'Diagnostic complete', 'No fault codes found', NULL, NULL),
(146, 141, 7, 12, 'completed', 1, '2026-05-07 03:59:08', '2026-05-03 05:05:00', '2026-05-03 06:00:00', 'AC recharged', 'System pressure normal', NULL, NULL),
(147, 142, 8, 7, 'completed', 2, '2026-05-07 03:59:08', '2026-05-03 07:05:00', '2026-05-03 07:20:00', 'Air filter replaced', 'OEM filter installed', NULL, NULL),
(148, 143, 9, 8, 'completed', 1, '2026-05-07 03:59:08', '2026-05-04 00:35:00', '2026-05-04 01:30:00', 'Trans fluid changed', 'Full synthetic ATF', NULL, NULL),
(149, 144, 10, 15, 'completed', 1, '2026-05-07 03:59:08', '2026-05-04 02:05:00', '2026-05-04 03:00:00', 'Full inspection done', 'All 50 points checked', NULL, NULL),
(150, 145, 4, 1, 'completed', 2, '2026-05-07 03:59:08', '2026-05-04 05:05:00', '2026-05-04 05:35:00', 'Oil change complete', 'Conventional oil used', NULL, NULL),
(151, 146, 5, 3, 'completed', 1, '2026-05-07 03:59:08', '2026-05-04 07:05:00', '2026-05-04 07:45:00', 'Brakes inspected', 'Pads at 50%, OK to go', NULL, NULL),
(152, 147, 6, 4, 'completed', 2, '2026-05-07 03:59:08', '2026-05-05 00:05:00', '2026-05-05 01:30:00', 'Brake pads replaced', 'Front pads, new rotors', NULL, NULL),
(153, 148, 7, 5, 'completed', 1, '2026-05-07 03:59:08', '2026-05-05 02:35:00', '2026-05-05 03:00:00', 'Battery replaced', '650 CCA, charging tested', NULL, NULL),
(154, 149, 8, 13, 'completed', 1, '2026-05-07 03:59:08', '2026-05-05 05:05:00', '2026-05-05 05:20:00', 'Wipers replaced', 'Premium silicone blades', NULL, NULL),
(155, 150, 9, 6, 'completed', 2, '2026-05-07 03:59:08', '2026-05-05 07:05:00', '2026-05-05 08:00:00', 'Alignment done', 'Camber and toe corrected', NULL, NULL),
(156, 151, 10, 9, 'completed', 1, '2026-05-07 03:59:08', '2026-05-06 00:35:00', '2026-05-06 01:30:00', 'Coolant flush done', 'Clean system, no leaks', NULL, NULL),
(157, 152, 4, 10, 'completed', 1, '2026-05-07 03:59:08', '2026-05-06 02:05:00', '2026-05-06 03:20:00', 'Spark plugs done', 'All plugs replaced', NULL, NULL),
(158, 153, 5, 1, 'completed', 2, '2026-05-07 03:59:08', '2026-05-06 05:35:00', '2026-05-06 06:05:00', 'Oil changed', 'Synthetic blend oil', NULL, NULL),
(159, 154, 6, 14, 'completed', 1, '2026-05-07 03:59:08', '2026-05-06 07:05:00', '2026-05-06 07:50:00', 'Headlights restored', 'Clear finish achieved', NULL, NULL),
(160, 155, 7, 1, 'in-progress', 1, '2026-05-07 03:59:08', '2026-05-07 00:05:00', NULL, 'Oil change in progress', 'Draining old oil now', NULL, NULL),
(161, 156, 8, 4, 'in-progress', 2, '2026-05-07 03:59:08', '2026-05-07 01:35:00', NULL, 'Brake job started', 'Front pads removed', NULL, NULL),
(162, 157, 9, 11, 'in-progress', 1, '2026-05-07 03:59:08', '2026-05-07 03:05:00', NULL, 'Running diagnostics', 'Scanning all ECU modules', NULL, NULL),
(163, 158, 10, 10, 'in-progress', 1, '2026-05-07 03:59:08', '2026-05-07 05:05:00', NULL, 'Replacing spark plugs', '2 of 4 plugs done', NULL, NULL),
(164, 159, 4, 7, 'in-progress', 2, '2026-05-07 03:59:08', '2026-05-07 06:35:00', NULL, 'Air filter replacement', 'Removing old filter', NULL, NULL),
(165, 160, 5, 1, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(166, 160, 6, 2, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(167, 161, 7, 5, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(168, 162, 8, 9, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(169, 163, 9, 12, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(170, 164, 10, 6, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(171, 165, 4, 1, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(172, 166, 5, 8, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(173, 167, 6, 15, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(174, 168, 7, 4, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(175, 169, 8, 1, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(176, 170, 9, 11, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(177, 171, 10, 10, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(178, 172, 4, 5, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(179, 173, 5, 3, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(180, 174, 6, 1, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(181, 175, 7, 9, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(182, 176, 8, 12, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(183, 177, 9, 7, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(184, 178, 10, 6, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(185, 179, 4, 8, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(186, 180, 5, 4, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(187, 181, 6, 5, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(188, 182, 7, 1, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(189, 182, 8, 2, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(190, 183, 9, 15, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(191, 184, 10, 10, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(192, 185, 4, 1, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(193, 186, 5, 11, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(194, 187, 6, 12, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(195, 188, 7, 9, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(196, 189, 8, 4, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(197, 190, 9, 6, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(198, 191, 10, 8, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(199, 192, 4, 1, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(200, 193, 5, 5, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(201, 194, 6, 15, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(202, 195, 7, 10, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(203, 196, 8, 7, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(204, 197, 9, 4, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(205, 198, 10, 1, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(206, 199, 4, 6, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(207, 200, 5, 9, 'assigned', 1, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL),
(208, 201, 6, 5, 'assigned', 2, '2026-05-07 03:59:08', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `valid_id` varchar(255) DEFAULT NULL,
  `role` enum('admin','mechanic','senior_mechanic','customer') NOT NULL DEFAULT 'customer',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `last_login` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `valid_id`, `role`, `status`, `last_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@vehiclecare.com', NULL, '$2y$12$fC7Ku8HHWje6EJaQvhoUU.hRqTGc.HAxIggUnc0Id2rnC7y4QdfdG', '(555) 100-0001', NULL, 'admin', 'active', '2026-04-07 00:30:00', NULL, NULL, '2026-04-16 00:32:01'),
(2, 'Sarah Anderson', 'sarah.admin@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 100-0002', NULL, 'admin', 'active', '2026-04-06 06:20:00', NULL, NULL, NULL),
(3, 'Michael Torres', 'michael.admin@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 100-0003', NULL, 'admin', 'active', '2026-04-05 01:15:00', NULL, NULL, NULL),
(4, 'Mike Johnson', 'mike.mechanic@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0001', NULL, 'mechanic', 'active', '2026-04-06 23:00:00', NULL, NULL, NULL),
(5, 'David Martinez', 'david.mechanic@vehiclecare.com', NULL, '$2y$12$qwAc72MqqAEWT3pJ5CzdxeiXdph5BvH/9P/oXcqd6BI0L5010Gjqe', '(555) 200-0002', NULL, 'senior_mechanic', 'active', '2026-04-06 22:45:00', NULL, NULL, '2026-04-15 23:17:43'),
(6, 'Robert Garcia', 'robert.mechanic@vehiclecare.com', NULL, '$2y$12$/1eGZ7TFHsColvL1WrDGWeyS23CjbD9ISKGQaIHjdXHj03k3z6lPu', '(555) 200-0003', NULL, 'mechanic', 'inactive', '2026-04-06 08:30:00', NULL, NULL, '2026-04-29 11:52:12'),
(7, 'James Wilson', 'james.mechanic@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0004', NULL, 'mechanic', 'active', '2026-04-06 23:15:00', NULL, NULL, NULL),
(8, 'Thomas Brown', 'thomas.mechanic@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0005', NULL, 'mechanic', 'active', '2026-04-06 22:50:00', NULL, NULL, NULL),
(9, 'Christopher Lee', 'chris.mechanic@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0006', NULL, 'mechanic', 'active', '2026-04-06 07:00:00', NULL, NULL, NULL),
(10, 'Daniel Rodriguez', 'daniel.mechanic@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0007', NULL, 'mechanic', 'active', '2026-04-06 23:30:00', NULL, NULL, NULL),
(11, 'Matthew Harris', 'matthew.mechanic@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0008', NULL, 'mechanic', 'active', '2026-04-06 06:45:00', NULL, NULL, NULL),
(12, 'Anthony Clark', 'anthony.mechanic@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0009', NULL, 'mechanic', 'active', '2026-04-06 22:55:00', NULL, NULL, NULL),
(13, 'Joshua Lewis', 'joshua.mechanic@vehiclecare.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0010', NULL, 'mechanic', 'active', '2026-04-05 09:00:00', NULL, NULL, NULL),
(14, 'John Smith', 'john.smith@email.com', NULL, '$2y$12$ATzQlHvq4uuSc1iRPMXEcOl50.419OF.OGUsRRRHBHUf1Nm522kJm', '(555) 301-1001', NULL, 'customer', 'active', '2026-04-06 02:30:00', NULL, NULL, '2026-04-15 23:19:04'),
(15, 'Emma Johnson', 'emma.johnson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1002', NULL, 'customer', 'active', '2026-04-05 06:20:00', NULL, NULL, NULL),
(16, 'Michael Williams', 'michael.williams@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1003', NULL, 'customer', 'active', '2026-04-07 01:15:00', NULL, NULL, NULL),
(17, 'Olivia Brown', 'olivia.brown@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1004', NULL, 'customer', 'active', '2026-04-06 08:45:00', NULL, NULL, NULL),
(18, 'James Davis', 'james.davis@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1005', NULL, 'customer', 'active', '2026-04-04 03:30:00', NULL, NULL, NULL),
(19, 'Sophia Miller', 'sophia.miller@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1006', NULL, 'customer', 'active', '2026-04-06 05:00:00', NULL, NULL, NULL),
(20, 'William Wilson', 'william.wilson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1007', NULL, 'customer', 'active', '2026-04-07 00:20:00', NULL, NULL, NULL),
(21, 'Ava Moore', 'ava.moore@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1008', NULL, 'customer', 'active', '2026-04-05 07:40:00', NULL, NULL, NULL),
(22, 'Benjamin Taylor', 'benjamin.taylor@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1009', NULL, 'customer', 'active', '2026-04-06 04:10:00', NULL, NULL, NULL),
(23, 'Isabella Anderson', 'isabella.anderson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1010', NULL, 'customer', 'active', '2026-04-07 02:50:00', NULL, NULL, NULL),
(24, 'Lucas Thomas', 'lucas.thomas@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1011', NULL, 'customer', 'active', '2026-04-03 01:30:00', NULL, NULL, NULL),
(25, 'Mia Jackson', 'mia.jackson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1012', NULL, 'customer', 'active', '2026-04-06 06:25:00', NULL, NULL, NULL),
(26, 'Henry White', 'henry.white@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1013', NULL, 'customer', 'active', '2026-04-07 03:15:00', NULL, NULL, NULL),
(27, 'Charlotte Harris', 'charlotte.harris@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1014', NULL, 'customer', 'active', '2026-04-05 08:30:00', NULL, NULL, NULL),
(28, 'Alexander Martin', 'alexander.martin@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1015', NULL, 'customer', 'active', '2026-04-06 02:00:00', NULL, NULL, NULL),
(29, 'Amelia Thompson', 'amelia.thompson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1016', NULL, 'customer', 'active', '2026-04-07 05:45:00', NULL, NULL, NULL),
(30, 'Sebastian Garcia', 'sebastian.garcia@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1017', NULL, 'customer', 'active', '2026-04-04 04:20:00', NULL, NULL, NULL),
(31, 'Evelyn Martinez', 'evelyn.martinez@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1018', NULL, 'customer', 'active', '2026-04-06 07:10:00', NULL, NULL, NULL),
(32, 'Jack Robinson', 'jack.robinson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1019', NULL, 'customer', 'active', '2026-04-07 01:50:00', NULL, NULL, NULL),
(33, 'Harper Clark', 'harper.clark@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1020', NULL, 'customer', 'active', '2026-04-05 03:40:00', NULL, NULL, NULL),
(34, 'Daniel Rodriguez', 'daniel.rodriguez@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1021', NULL, 'customer', 'active', '2026-04-06 05:20:00', NULL, NULL, NULL),
(35, 'Ella Lewis', 'ella.lewis@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1022', NULL, 'customer', 'active', '2026-04-07 06:00:00', NULL, NULL, NULL),
(36, 'Matthew Lee', 'matthew.lee@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1023', NULL, 'customer', 'active', '2026-04-03 02:15:00', NULL, NULL, NULL),
(37, 'Avery Walker', 'avery.walker@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1024', NULL, 'customer', 'active', '2026-04-06 03:50:00', NULL, NULL, NULL),
(38, 'Jackson Hall', 'jackson.hall@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1025', NULL, 'customer', 'active', '2026-04-07 04:30:00', NULL, NULL, NULL),
(39, 'Scarlett Allen', 'scarlett.allen@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1026', NULL, 'customer', 'active', '2026-04-05 05:15:00', NULL, NULL, NULL),
(40, 'David Young', 'david.young@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1027', NULL, 'customer', 'active', '2026-04-06 06:40:00', NULL, NULL, NULL),
(41, 'Sofia Hernandez', 'sofia.hernandez@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1028', NULL, 'customer', 'active', '2026-04-07 07:20:00', NULL, NULL, NULL),
(42, 'Joseph King', 'joseph.king@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1029', NULL, 'customer', 'active', '2026-04-04 03:00:00', NULL, NULL, NULL),
(43, 'Grace Wright', 'grace.wright@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1030', NULL, 'customer', 'active', '2026-04-06 08:10:00', NULL, NULL, NULL),
(44, 'Samuel Lopez', 'samuel.lopez@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1031', NULL, 'customer', 'active', '2026-04-07 02:20:00', NULL, NULL, NULL),
(45, 'Chloe Hill', 'chloe.hill@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1032', NULL, 'customer', 'active', '2026-04-05 04:45:00', NULL, NULL, NULL),
(46, 'Carter Scott', 'carter.scott@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1033', NULL, 'customer', 'active', '2026-04-06 01:30:00', NULL, NULL, NULL),
(47, 'Lily Green', 'lily.green@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1034', NULL, 'customer', 'active', '2026-04-07 03:00:00', NULL, NULL, NULL),
(48, 'Wyatt Adams', 'wyatt.adams@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1035', NULL, 'customer', 'active', '2026-04-03 07:20:00', NULL, NULL, NULL),
(49, 'Victoria Baker', 'victoria.baker@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1036', NULL, 'customer', 'active', '2026-04-06 05:50:00', NULL, NULL, NULL),
(50, 'Luke Gonzalez', 'luke.gonzalez@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1037', NULL, 'customer', 'active', '2026-04-07 06:30:00', NULL, NULL, NULL),
(51, 'Zoe Nelson', 'zoe.nelson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1038', NULL, 'customer', 'active', '2026-04-05 02:40:00', NULL, NULL, NULL),
(52, 'Owen Carter', 'owen.carter@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1039', NULL, 'customer', 'active', '2026-04-06 04:00:00', NULL, NULL, NULL),
(53, 'Penelope Mitchell', 'penelope.mitchell@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1040', NULL, 'customer', 'active', '2026-04-07 05:10:00', NULL, NULL, NULL),
(54, 'Gabriel Perez', 'gabriel.perez@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1041', NULL, 'customer', 'active', '2026-04-04 01:50:00', NULL, NULL, NULL),
(55, 'Layla Roberts', 'layla.roberts@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1042', NULL, 'customer', 'active', '2026-04-06 07:30:00', NULL, NULL, NULL),
(56, 'Nathan Turner', 'nathan.turner@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1043', NULL, 'customer', 'active', '2026-04-07 08:00:00', NULL, NULL, NULL),
(57, 'Aria Phillips', 'aria.phillips@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1044', NULL, 'customer', 'active', '2026-04-05 03:20:00', NULL, NULL, NULL),
(58, 'Isaac Campbell', 'isaac.campbell@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1045', NULL, 'customer', 'active', '2026-04-06 02:40:00', NULL, NULL, NULL),
(59, 'Ellie Parker', 'ellie.parker@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1046', NULL, 'customer', 'active', '2026-04-07 04:50:00', NULL, NULL, NULL),
(60, 'Julian Evans', 'julian.evans@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1047', NULL, 'customer', 'active', '2026-04-03 06:10:00', NULL, NULL, NULL),
(61, 'Nora Edwards', 'nora.edwards@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1048', NULL, 'customer', 'active', '2026-04-06 03:30:00', NULL, NULL, NULL),
(62, 'Levi Collins', 'levi.collins@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1049', NULL, 'customer', 'active', '2026-04-07 01:00:00', NULL, NULL, NULL),
(63, 'Riley Stewart', 'riley.stewart@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1050', NULL, 'customer', 'active', '2026-04-05 05:40:00', NULL, NULL, NULL),
(64, 'Aaron Sanchez', 'aaron.sanchez@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1051', NULL, 'customer', 'active', '2026-04-06 06:15:00', NULL, NULL, NULL),
(65, 'Hazel Morris', 'hazel.morris@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1052', NULL, 'customer', 'active', '2026-04-07 07:45:00', NULL, NULL, NULL),
(66, 'Lincoln Rogers', 'lincoln.rogers@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1053', NULL, 'customer', 'active', '2026-04-04 02:30:00', NULL, NULL, NULL),
(67, 'Eleanor Reed', 'eleanor.reed@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1054', NULL, 'customer', 'active', '2026-04-06 08:20:00', NULL, NULL, NULL),
(68, 'Hudson Cook', 'hudson.cook@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1055', NULL, 'customer', 'active', '2026-04-07 02:10:00', NULL, NULL, NULL),
(69, 'Hannah Morgan', 'hannah.morgan@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1056', NULL, 'customer', 'active', '2026-04-05 04:00:00', NULL, NULL, NULL),
(70, 'Leo Bell', 'leo.bell@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1057', NULL, 'customer', 'active', '2026-04-06 01:45:00', NULL, NULL, NULL),
(71, 'Addison Murphy', 'addison.murphy@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1058', NULL, 'customer', 'active', '2026-04-07 03:25:00', NULL, NULL, NULL),
(72, 'Jaxon Bailey', 'jaxon.bailey@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1059', NULL, 'customer', 'active', '2026-04-03 08:00:00', NULL, NULL, NULL),
(73, 'Aubrey Rivera', 'aubrey.rivera@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1060', NULL, 'customer', 'active', '2026-04-06 05:35:00', NULL, NULL, NULL),
(74, 'Mason Cooper', 'mason.cooper@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1061', NULL, 'customer', 'active', '2026-04-07 06:50:00', NULL, NULL, NULL),
(75, 'Stella Richardson', 'stella.richardson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1062', NULL, 'customer', 'active', '2026-04-05 02:25:00', NULL, NULL, NULL),
(76, 'Ethan Cox', 'ethan.cox@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1063', NULL, 'customer', 'active', '2026-04-06 04:15:00', NULL, NULL, NULL),
(77, 'Lucy Howard', 'lucy.howard@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1064', NULL, 'customer', 'active', '2026-04-07 05:00:00', NULL, NULL, NULL),
(78, 'Logan Ward', 'logan.ward@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1065', NULL, 'customer', 'active', '2026-04-04 03:45:00', NULL, NULL, NULL),
(79, 'Violet Torres', 'violet.torres@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1066', NULL, 'customer', 'active', '2026-04-06 07:50:00', NULL, NULL, NULL),
(80, 'Grayson Peterson', 'grayson.peterson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1067', NULL, 'customer', 'active', '2026-04-07 08:30:00', NULL, NULL, NULL),
(81, 'Aurora Gray', 'aurora.gray@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1068', NULL, 'customer', 'active', '2026-04-05 03:10:00', NULL, NULL, NULL),
(82, 'Maverick Ramirez', 'maverick.ramirez@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1069', NULL, 'customer', 'active', '2026-04-06 02:55:00', NULL, NULL, NULL),
(83, 'Savannah James', 'savannah.james@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1070', NULL, 'customer', 'active', '2026-04-07 04:40:00', NULL, NULL, NULL),
(84, 'Elijah Watson', 'elijah.watson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1071', NULL, 'customer', 'active', '2026-04-03 05:55:00', NULL, NULL, NULL),
(85, 'Brooklyn Brooks', 'brooklyn.brooks@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1072', NULL, 'customer', 'active', '2026-04-06 03:40:00', NULL, NULL, NULL),
(86, 'Noah Kelly', 'noah.kelly@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1073', NULL, 'customer', 'active', '2026-04-07 01:20:00', NULL, NULL, NULL),
(87, 'Leah Sanders', 'leah.sanders@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1074', NULL, 'customer', 'active', '2026-04-05 06:05:00', NULL, NULL, NULL),
(88, 'Aiden Price', 'aiden.price@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1075', NULL, 'customer', 'active', '2026-04-06 06:30:00', NULL, NULL, NULL),
(89, 'Anna Bennett', 'anna.bennett@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1076', NULL, 'customer', 'active', '2026-04-07 07:55:00', NULL, NULL, NULL),
(90, 'Xavier Wood', 'xavier.wood@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1077', NULL, 'customer', 'active', '2026-04-04 02:20:00', NULL, NULL, NULL),
(91, 'Paisley Barnes', 'paisley.barnes@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1078', NULL, 'customer', 'active', '2026-04-06 08:40:00', NULL, NULL, NULL),
(92, 'Colton Ross', 'colton.ross@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1079', NULL, 'customer', 'active', '2026-04-07 02:35:00', NULL, NULL, NULL),
(93, 'Bella Henderson', 'bella.henderson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1080', NULL, 'customer', 'active', '2026-04-05 04:20:00', NULL, NULL, NULL),
(94, 'Ezra Coleman', 'ezra.coleman@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1081', NULL, 'customer', 'active', '2026-04-06 01:10:00', NULL, NULL, NULL),
(95, 'Skylar Jenkins', 'skylar.jenkins@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1082', NULL, 'customer', 'active', '2026-04-07 03:50:00', NULL, NULL, NULL),
(96, 'Axel Perry', 'axel.perry@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1083', NULL, 'customer', 'active', '2026-04-03 07:35:00', NULL, NULL, NULL),
(97, 'Claire Powell', 'claire.powell@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1084', NULL, 'customer', 'active', '2026-04-06 05:45:00', NULL, NULL, NULL),
(98, 'Cooper Long', 'cooper.long@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1085', NULL, 'customer', 'active', '2026-04-07 06:25:00', NULL, NULL, NULL),
(99, 'Natalie Patterson', 'natalie.patterson@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1086', NULL, 'customer', 'active', '2026-04-05 02:50:00', NULL, NULL, NULL),
(100, 'Easton Hughes', 'easton.hughes@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1087', NULL, 'customer', 'active', '2026-04-06 04:30:00', NULL, NULL, NULL),
(101, 'Caroline Flores', 'caroline.flores@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1088', NULL, 'customer', 'active', '2026-04-07 05:15:00', NULL, NULL, NULL),
(102, 'Adrian Washington', 'adrian.washington@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1089', NULL, 'customer', 'active', '2026-04-04 03:25:00', NULL, NULL, NULL),
(103, 'Kinsley Butler', 'kinsley.butler@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1090', NULL, 'customer', 'active', '2026-04-06 07:00:00', NULL, NULL, NULL),
(104, 'Kai Simmons', 'kai.simmons@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1091', NULL, 'customer', 'active', '2026-04-07 08:15:00', NULL, NULL, NULL),
(105, 'Naomi Foster', 'naomi.foster@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1092', NULL, 'customer', 'active', '2026-04-05 03:35:00', NULL, NULL, NULL),
(106, 'Brayden Gonzales', 'brayden.gonzales@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1093', NULL, 'customer', 'active', '2026-04-06 02:15:00', NULL, NULL, NULL),
(107, 'Allison Bryant', 'allison.bryant@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1094', NULL, 'customer', 'active', '2026-04-07 04:05:00', NULL, NULL, NULL),
(108, 'Greyson Alexander', 'greyson.alexander@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1095', NULL, 'customer', 'active', '2026-04-03 06:40:00', NULL, NULL, NULL),
(109, 'Samantha Russell', 'samantha.russell@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1096', NULL, 'customer', 'active', '2026-04-06 03:05:00', NULL, NULL, NULL),
(110, 'Jameson Griffin', 'jameson.griffin@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1097', NULL, 'customer', 'active', '2026-04-07 01:40:00', NULL, NULL, NULL),
(111, 'Kennedy Diaz', 'kennedy.diaz@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1098', NULL, 'customer', 'active', '2026-04-05 05:25:00', NULL, NULL, NULL),
(112, 'Bryson Hayes', 'bryson.hayes@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1099', NULL, 'customer', 'active', '2026-04-06 06:50:00', NULL, NULL, NULL),
(113, 'Madelyn Myers', 'madelyn.myers@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1100', NULL, 'customer', 'active', '2026-04-07 07:10:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `license_plate` varchar(20) NOT NULL,
  `vin` varchar(17) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `customer_id`, `make`, `model`, `year`, `license_plate`, `vin`, `color`, `mileage`, `created_at`, `updated_at`) VALUES
(1, 14, 'Toyota', 'Camry', 2022, 'ABC-1234', '1HGBH41JXMN109186', 'Silver', 35000, NULL, '2026-04-16 15:38:07'),
(2, 15, 'Honda', 'Civic', 2019, 'XYZ-5678', '2HGFC2F59KH542891', 'Blue', 42000, NULL, NULL),
(3, 16, 'Ford', 'F-150', 2021, 'DEF-9012', '1FTFW1ET5DFC10312', 'Black', 28000, NULL, NULL),
(4, 17, 'Chevrolet', 'Malibu', 2018, 'GHI-3456', '1G1ZD5ST8JF123456', 'Red', 51000, NULL, NULL),
(5, 18, 'Nissan', 'Altima', 2020, 'JKL-7890', '1N4AL3AP8JC123456', 'White', 38000, NULL, NULL),
(6, 18, 'Toyota', 'RAV4', 2022, 'JKL-7891', '2T3P1RFV8NC123456', 'Gray', 15000, NULL, NULL),
(7, 19, 'Mazda', 'CX-5', 2019, 'MNO-2345', 'JM3KFBCM8K0123456', 'Blue', 44000, NULL, NULL),
(8, 20, 'Hyundai', 'Elantra', 2021, 'PQR-6789', '5NPD84LF6MH123456', 'Silver', 22000, NULL, NULL),
(9, 21, 'Kia', 'Sorento', 2020, 'STU-0123', '5XYPGDA30LG123456', 'Black', 35000, NULL, NULL),
(10, 22, 'Subaru', 'Outback', 2019, 'VWX-4567', '4S4BSAFC6K3123456', 'Green', 48000, NULL, NULL),
(11, 23, 'Volkswagen', 'Jetta', 2020, 'YZA-8901', '3VW2B7AJ0LM123456', 'White', 33000, NULL, NULL),
(12, 24, 'Jeep', 'Grand Cherokee', 2021, 'BCD-2345', '1C4RJFBG8MC123456', 'Red', 27000, NULL, NULL),
(13, 25, 'GMC', 'Sierra', 2020, 'EFG-6789', '1GTU9EED8LZ123456', 'Silver', 40000, NULL, NULL),
(14, 26, 'Ram', '1500', 2019, 'HIJ-0123', '1C6SRFFT8KN123456', 'Blue', 52000, NULL, NULL),
(15, 27, 'Acura', 'TLX', 2021, 'KLM-4567', '19UUB2F61MA123456', 'Black', 18000, NULL, NULL),
(16, 28, 'Lexus', 'RX 350', 2020, 'NOP-8901', '2T2BZMCA3LC123456', 'Pearl White', 31000, NULL, NULL),
(17, 29, 'BMW', '3 Series', 2019, 'QRS-2345', 'WBA8E9G51KNJ12345', 'Gray', 45000, NULL, NULL),
(18, 30, 'Mercedes-Benz', 'C-Class', 2021, 'TUV-6789', 'W1KZF8DB9MA123456', 'Black', 25000, NULL, NULL),
(19, 31, 'Audi', 'A4', 2020, 'WXY-0123', 'WAUENAF49LN123456', 'Silver', 29000, NULL, NULL),
(20, 32, 'Dodge', 'Charger', 2019, 'ZAB-4567', '2C3CDXHG6KH123456', 'Red', 47000, NULL, NULL),
(21, 33, 'Chrysler', '300', 2020, 'CDE-8901', '2C3CCAEG7LH123456', 'Blue', 36000, NULL, NULL),
(22, 34, 'Buick', 'Encore', 2021, 'FGH-2345', 'KL4CJESB6MB123456', 'White', 21000, NULL, NULL),
(23, 35, 'Cadillac', 'XT5', 2020, 'IJK-6789', '1GYKNCRS8LZ123456', 'Black', 32000, NULL, NULL),
(24, 36, 'Lincoln', 'Corsair', 2021, 'LMN-0123', '5LM5J7XC6MGL12345', 'Burgundy', 19000, NULL, NULL),
(25, 37, 'Infiniti', 'Q50', 2019, 'OPQ-4567', 'JN1EV7AR8KM123456', 'Silver', 50000, NULL, NULL),
(26, 38, 'Volvo', 'XC90', 2020, 'RST-8901', 'YV4A22PK6L1123456', 'Blue', 34000, NULL, NULL),
(27, 39, 'Porsche', 'Macan', 2021, 'UVW-2345', 'WP1AB2A59MLB12345', 'Red', 16000, NULL, NULL),
(28, 40, 'Tesla', 'Model 3', 2020, 'XYZ-6789', '5YJ3E1EA4LF123456', 'White', 28000, NULL, NULL),
(29, 41, 'Toyota', 'Corolla', 2019, 'ABC-0123', '2T1BURHE5KC123456', 'Gray', 46000, NULL, NULL),
(30, 42, 'Honda', 'Accord', 2021, 'DEF-4567', '1HGCV1F36MA123456', 'Black', 20000, NULL, NULL),
(31, 43, 'Ford', 'Escape', 2020, 'GHI-8901', '1FMCU9HD0LUB12345', 'Silver', 37000, NULL, NULL),
(32, 44, 'Chevrolet', 'Equinox', 2019, 'JKL-2345', '2GNAXSEV1K6123456', 'Blue', 49000, NULL, NULL),
(33, 45, 'Nissan', 'Rogue', 2021, 'MNO-6789', '5N1AT2MV7MC123456', 'Red', 23000, NULL, NULL),
(34, 46, 'Mazda', 'Mazda3', 2020, 'PQR-0123', 'JM1BPBCM5L1123456', 'White', 30000, NULL, NULL),
(35, 47, 'Hyundai', 'Tucson', 2019, 'STU-4567', 'KM8J3CA26KU123456', 'Green', 43000, NULL, NULL),
(36, 48, 'Kia', 'Optima', 2021, 'VWX-8901', '5XXGT4L35MG123456', 'Silver', 24000, NULL, NULL),
(37, 49, 'Subaru', 'Forester', 2020, 'YZA-2345', 'JF2SKAEC0LH123456', 'Blue', 33000, NULL, NULL),
(38, 50, 'Volkswagen', 'Passat', 2019, 'BCD-6789', '1VWSA7A35KC123456', 'Black', 48000, NULL, NULL),
(39, 51, 'Jeep', 'Wrangler', 2021, 'EFG-0123', '1C4HJXDG8MW123456', 'Orange', 17000, NULL, NULL),
(40, 52, 'GMC', 'Terrain', 2020, 'HIJ-4567', '3GKALVEV0LL123456', 'Gray', 35000, NULL, NULL),
(41, 53, 'Ram', '2500', 2019, 'KLM-8901', '3C6UR5DL6KG123456', 'White', 55000, NULL, NULL),
(42, 54, 'Acura', 'RDX', 2021, 'NOP-2345', '5J8TC2H52ML123456', 'Red', 19000, NULL, NULL),
(43, 55, 'Lexus', 'ES 350', 2020, 'QRS-6789', '58ABZ1B16LU123456', 'Silver', 27000, NULL, NULL),
(44, 56, 'BMW', 'X5', 2019, 'TUV-0123', '5UXKR0C59K0K12345', 'Black', 52000, NULL, NULL),
(45, 57, 'Mercedes-Benz', 'GLE', 2021, 'WXY-4567', '4JGDF7DE7MA123456', 'White', 22000, NULL, NULL),
(46, 58, 'Audi', 'Q5', 2020, 'ZAB-8901', 'WA1ANAFY3L2123456', 'Blue', 31000, NULL, NULL),
(47, 59, 'Dodge', 'Durango', 2019, 'CDE-2345', '1C4RDJDG6KC123456', 'Gray', 47000, NULL, NULL),
(48, 60, 'Chrysler', 'Pacifica', 2021, 'FGH-6789', '2C4RC1BG4MR123456', 'Silver', 18000, NULL, NULL),
(49, 61, 'Buick', 'Enclave', 2020, 'IJK-0123', '5GAEVAKW8LJ123456', 'Red', 34000, NULL, NULL),
(50, 62, 'Cadillac', 'Escalade', 2019, 'LMN-4567', '1GYS4BKJ5KR123456', 'Black', 58000, NULL, NULL),
(51, 63, 'Lincoln', 'Navigator', 2021, 'OPQ-8901', '5LMJJ3LT8MEL12345', 'White', 16000, NULL, NULL),
(52, 64, 'Infiniti', 'QX60', 2020, 'RST-2345', '5N1DL0MN5LC123456', 'Blue', 29000, NULL, NULL),
(53, 65, 'Volvo', 'S60', 2019, 'UVW-6789', 'LYVW10EK8KB123456', 'Gray', 45000, NULL, NULL),
(54, 66, 'Toyota', 'Highlander', 2021, 'XYZ-0123', '5TDJZRFH8MS123456', 'Silver', 21000, NULL, NULL),
(55, 67, 'Honda', 'CR-V', 2020, 'ABC-4567', '2HKRW2H85LH123456', 'Red', 32000, NULL, NULL),
(56, 68, 'Ford', 'Explorer', 2019, 'DEF-8901', '1FM5K8D87KGA12345', 'Black', 50000, NULL, NULL),
(57, 69, 'Chevrolet', 'Traverse', 2021, 'GHI-2345', '1GNERHKW8MJ123456', 'White', 19000, NULL, NULL),
(58, 70, 'Nissan', 'Murano', 2020, 'JKL-6789', '5N1AZ2MH5LN123456', 'Blue', 28000, NULL, NULL),
(59, 71, 'Mazda', 'CX-9', 2019, 'MNO-0123', 'JM3TCBDY1K0123456', 'Gray', 46000, NULL, NULL),
(60, 72, 'Hyundai', 'Santa Fe', 2021, 'PQR-4567', '5NMS5CAA8MH123456', 'Silver', 22000, NULL, NULL),
(61, 73, 'Kia', 'Telluride', 2020, 'STU-8901', '5XYP5DHC7LG123456', 'Green', 31000, NULL, NULL),
(62, 74, 'Subaru', 'Crosstrek', 2019, 'VWX-2345', 'JF2GTAMC0K8123456', 'Orange', 44000, NULL, NULL),
(63, 75, 'Volkswagen', 'Tiguan', 2021, 'YZA-6789', '3VV2B7AX4MM123456', 'Black', 20000, NULL, NULL),
(64, 76, 'Jeep', 'Cherokee', 2020, 'BCD-0123', '1C4PJMCB2LD123456', 'Red', 36000, NULL, NULL),
(65, 77, 'GMC', 'Acadia', 2019, 'EFG-4567', '1GKKNPLS0KZ123456', 'White', 49000, NULL, NULL),
(66, 78, 'Toyota', 'Tacoma', 2021, 'HIJ-8901', '3TMCZ5AN8MM123456', 'Gray', 18000, NULL, NULL),
(67, 79, 'Honda', 'Pilot', 2020, 'KLM-2345', '5FNYF6H59LB123456', 'Blue', 30000, NULL, NULL),
(68, 80, 'Ford', 'Ranger', 2019, 'NOP-6789', '1FTER4FH0KLA12345', 'Silver', 51000, NULL, NULL),
(69, 81, 'Chevrolet', 'Colorado', 2021, 'QRS-0123', '1GCGTCEN9M1123456', 'Black', 23000, NULL, NULL),
(70, 82, 'Nissan', 'Frontier', 2020, 'TUV-4567', '1N6AD0ER0LN123456', 'Red', 33000, NULL, NULL),
(71, 83, 'Toyota', 'Tundra', 2019, 'WXY-8901', '5TFDY5F19KX123456', 'White', 54000, NULL, NULL),
(72, 84, 'Honda', 'Ridgeline', 2021, 'ZAB-2345', '5FPYK3F78MB123456', 'Gray', 17000, NULL, NULL),
(73, 85, 'Ford', 'Bronco', 2021, 'CDE-6789', '1FMEU8EP8MLA12345', 'Blue', 15000, NULL, NULL),
(74, 86, 'Chevrolet', 'Tahoe', 2020, 'FGH-0123', '1GNSKCKC4LR123456', 'Black', 38000, NULL, NULL),
(75, 87, 'Nissan', 'Armada', 2019, 'IJK-4567', '5N1AR2MM3KC123456', 'Silver', 53000, NULL, NULL),
(76, 88, 'Toyota', 'Sequoia', 2021, 'LMN-8901', '5TDJY5G11MS123456', 'Red', 20000, NULL, NULL),
(77, 89, 'Honda', 'Odyssey', 2020, 'OPQ-2345', '5FNRL6H76LB123456', 'White', 29000, NULL, NULL),
(78, 90, 'Ford', 'Edge', 2019, 'RST-6789', '2FMPK4J96KBC12345', 'Blue', 48000, NULL, NULL),
(79, 91, 'Chevrolet', 'Blazer', 2021, 'UVW-0123', '3GNKBHRS0MS123456', 'Gray', 21000, NULL, NULL),
(80, 92, 'Nissan', 'Pathfinder', 2020, 'XYZ-4567', '5N1DR2MM9LC123456', 'Black', 35000, NULL, NULL),
(81, 93, 'Mazda', 'CX-30', 2019, 'ABC-8901', 'JM3KPBBM8K0123456', 'Red', 42000, NULL, NULL),
(82, 94, 'Hyundai', 'Kona', 2021, 'DEF-2345', 'KM8K53A59MU123456', 'White', 19000, NULL, NULL),
(83, 95, 'Kia', 'Sportage', 2020, 'GHI-6789', 'KNDPMCAC1L7123456', 'Silver', 32000, NULL, NULL),
(84, 96, 'Subaru', 'Ascent', 2019, 'JKL-0123', '4S4WMAFD1K3123456', 'Blue', 47000, NULL, NULL),
(85, 97, 'Volkswagen', 'Atlas', 2021, 'MNO-4567', '1V2GR2CA2MC123456', 'Gray', 22000, NULL, NULL),
(86, 98, 'Jeep', 'Compass', 2020, 'PQR-8901', '3C4NJDCB8LT123456', 'Green', 34000, NULL, NULL),
(87, 99, 'GMC', 'Yukon', 2019, 'STU-2345', '1GKS2BKC3KR123456', 'Black', 56000, NULL, NULL),
(88, 100, 'Toyota', 'Prius', 2021, 'VWX-6789', 'JTDKARFP7M3123456', 'Silver', 18000, NULL, NULL),
(89, 101, 'Honda', 'Insight', 2020, 'YZA-0123', 'JHMZC5F37LC123456', 'Blue', 27000, NULL, NULL),
(90, 102, 'Ford', 'Fusion', 2019, 'BCD-4567', '3FA6P0LU6KR123456', 'White', 51000, NULL, NULL),
(91, 103, 'Chevrolet', 'Impala', 2020, 'EFG-8901', '2G1WZ5E38L1123456', 'Red', 36000, NULL, NULL),
(92, 104, 'Nissan', 'Maxima', 2019, 'HIJ-2345', '1N4AA6AV8KC123456', 'Black', 49000, NULL, NULL),
(93, 105, 'Mazda', 'Mazda6', 2021, 'KLM-6789', 'JM1GL1VM9M1123456', 'Gray', 19000, NULL, NULL),
(94, 106, 'Hyundai', 'Sonata', 2020, 'NOP-0123', '5NPE24AF4LH123456', 'Silver', 31000, NULL, NULL),
(95, 107, 'Kia', 'K5', 2021, 'QRS-4567', '5XXG74J25MG123456', 'Blue', 16000, NULL, NULL),
(96, 108, 'Subaru', 'Legacy', 2019, 'TUV-8901', '4S3BNAN69K3123456', 'White', 45000, NULL, NULL),
(97, 109, 'Volkswagen', 'Arteon', 2020, 'WXY-2345', 'WVWMR7AN1LE123456', 'Red', 28000, NULL, NULL),
(98, 110, 'Acura', 'ILX', 2019, 'ZAB-6789', '19UDE2F30KA123456', 'Black', 52000, NULL, NULL),
(99, 111, 'Lexus', 'IS 300', 2021, 'CDE-0123', 'JTHBA1D28M5123456', 'Silver', 17000, NULL, NULL),
(100, 112, 'BMW', '5 Series', 2020, 'FGH-4567', 'WBAJR7C07LCJ12345', 'Blue', 30000, NULL, NULL),
(101, 113, 'Mercedes-Benz', 'E-Class', 2019, 'IJK-8901', 'W1KZF8DB5KA123456', 'Gray', 48000, NULL, NULL),
(102, 14, 'Ford', 'Mustang', 2021, 'ABC-1235', '1FA6P8CF0M5123456', 'Red', 12000, NULL, NULL),
(103, 15, 'Chevrolet', 'Camaro', 2020, 'XYZ-5679', '1G1FE1R70L0123456', 'Yellow', 25000, NULL, NULL),
(104, 16, 'Dodge', 'Challenger', 2019, 'DEF-9013', '2C3CDZC96KH123456', 'Black', 38000, NULL, NULL),
(105, 17, 'Toyota', 'Sienna', 2021, 'GHI-3457', '5TDKZ3DC4MS123456', 'White', 14000, NULL, NULL),
(106, 20, 'Honda', 'Passport', 2020, 'PQR-6790', '5FNYF8H56LB123456', 'Gray', 27000, NULL, NULL),
(107, 25, 'Nissan', 'Sentra', 2021, 'EFG-6790', '3N1AB8BV9MY123456', 'Blue', 16000, NULL, NULL),
(108, 30, 'Mazda', 'MX-5 Miata', 2019, 'TUV-6790', 'JM1NDAD76K0123456', 'Red', 22000, NULL, NULL),
(109, 14, 'Toyota', 'VIOS', 2020, 'AAA666', NULL, 'Red', 45000, '2026-04-16 01:03:21', '2026-04-16 01:03:21'),
(110, 14, 'Suzuki', 'Swift', 2021, 'GSW-030', NULL, 'Blue', 12000, '2026-04-16 15:35:28', '2026-04-16 15:35:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_customer_id_foreign` (`customer_id`),
  ADD KEY `appointments_vehicle_id_foreign` (`vehicle_id`),
  ADD KEY `appointments_created_by_foreign` (`created_by`);

--
-- Indexes for table `appointment_services`
--
ALTER TABLE `appointment_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_services_appointment_id_foreign` (`appointment_id`),
  ADD KEY `appointment_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_appointment_id_foreign` (`appointment_id`),
  ADD KEY `tasks_mechanic_id_foreign` (`mechanic_id`),
  ADD KEY `tasks_service_id_foreign` (`service_id`),
  ADD KEY `tasks_assigned_by_foreign` (`assigned_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicles_license_plate_unique` (`license_plate`),
  ADD UNIQUE KEY `vehicles_vin_unique` (`vin`),
  ADD KEY `vehicles_customer_id_foreign` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `appointment_services`
--
ALTER TABLE `appointment_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointments_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `appointment_services`
--
ALTER TABLE `appointment_services`
  ADD CONSTRAINT `appointment_services_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `tasks_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tasks_mechanic_id_foreign` FOREIGN KEY (`mechanic_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tasks_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
