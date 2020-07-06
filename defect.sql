-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 11:49 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defect`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `line_id` int(11) NOT NULL,
  `defect_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `date`, `total`, `line_id`, `defect_code`) VALUES
(8, '2020-07-06', 4, 1, 2),
(9, '2020-07-06', 3, 2, 2),
(10, '2020-07-06', 5, 1, 6),
(11, '2020-07-06', 4, 2, 6),
(12, '2020-07-06', 6, 1, 9),
(13, '2020-07-06', 5, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `defect`
--

CREATE TABLE `defect` (
  `id` int(11) NOT NULL,
  `defect_code` varchar(10) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defect`
--

INSERT INTO `defect` (`id`, `defect_code`, `remarks`) VALUES
(1, '101', 'Burn / Scorch marks , Moiree , Ring marks , Delamination , Creases , Pleats , Molding discoloration'),
(2, '102', 'Assymmetrical or unbalanced , Uneven Shape'),
(3, '102.1', 'High Low Cf'),
(4, '102.2', 'Uneven Wing'),
(5, '102.3', 'Uneven Shape Cf'),
(6, '103', 'Uneven set back / Overlap'),
(7, '104', 'Loose Threads'),
(8, '105', 'Untidy / Unfinished'),
(9, '106', 'Mis matched checks, Plaids or Stripes'),
(10, '107', 'Mis shaped Parts , Loose / tight molding '),
(11, '108', 'Misplaced Parts , Wrong Side'),
(12, '109', 'Marks , Stains , Dirt or Oil Stains'),
(13, '110', 'Stretched Panel , Wavy Panel '),
(14, '201', 'Holes , Runs , Tears , Cuts , Snags or Creases in fabric'),
(15, '202', 'Slubs , Foreign particles , fabric flaws , dirt oil stains'),
(16, '203', 'Irregular Shape , Thickness , repeat '),
(17, '204', 'Printing Faults , Dye Spots , Streaky appearance'),
(18, '205', 'Shade Variation'),
(19, '301', 'Uncut Ends ( Threads / Elastiec)'),
(20, '302', 'Broken Stitches , Cut Stitches ( M /C or Manual )'),
(21, '303', 'Open Seam'),
(22, '304', 'Skip / Slip stitches'),
(23, '305', 'Seam Grinning , Loop Stitch'),
(24, '306', 'Twisted or ripped seam'),
(25, '307', 'Uneven seam allowance ( margin ) or uneven bight ( throw )'),
(26, '308.1', 'Wavy seam'),
(27, '308.2', 'Puckering'),
(28, '308.3', 'Bubling'),
(29, '309', 'Caught parts or non  Inclusion'),
(30, '310', 'Run off stitch , non inclusion'),
(31, '311', 'Seam Slippage'),
(32, '312', 'Cracking ( Tension Tight )'),
(33, '313', 'S.P.I Off Spec'),
(34, '314', 'Incorrect Seam Securing'),
(35, '315', 'Incorrect Wire Play'),
(36, '316', 'Incorrect Positioning '),
(37, '317', 'Needle Damages or Holes'),
(38, '318', 'Uneven Gathering or Shirr'),
(39, '319', 'Cut ( Trimming ) Damages'),
(40, '401', 'Over / Under Spec'),
(41, '501', 'Defective / Incorrect / Missing Label or Trim'),
(42, '601', 'Packing List Incorrect or Incomplete'),
(43, '602', 'Merchandise , Labels , Packing List , Cartons Mis - Matched'),
(44, '603', 'Incorrect Carton Size , Numbering , Odds not Marked'),
(45, '604', 'Incorrect Packing ( Meathod / Sequence )');

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `line` varchar(10) NOT NULL,
  `section` enum('Section A1','Section A2','Section B','Section C','Section D','Section E') NOT NULL,
  `shift` enum('Shift A','Shift B') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id`, `line`, `section`, `shift`) VALUES
(1, '1A', 'Section A1', 'Shift A'),
(2, '1B', 'Section A1', 'Shift B'),
(3, '2A', 'Section A1', 'Shift A'),
(4, '2B', 'Section A1', 'Shift B'),
(5, '3A', 'Section A1', 'Shift A'),
(6, '3B', 'Section A1', 'Shift B'),
(7, '4A', 'Section A1', 'Shift A'),
(8, '4B', 'Section A1', 'Shift B'),
(9, '5A', 'Section A1', 'Shift A'),
(10, '5B', 'Section A1', 'Shift B'),
(11, '6A', 'Section A1', 'Shift A'),
(12, '6B', 'Section A1', 'Shift B'),
(13, '7A', 'Section A2', 'Shift A'),
(14, '7B', 'Section A2', 'Shift B'),
(15, '8A', 'Section A2', 'Shift A'),
(16, '8B', 'Section A2', 'Shift B'),
(17, '9A', 'Section A2', 'Shift A'),
(18, '9B', 'Section A2', 'Shift B'),
(19, '10A', 'Section A2', 'Shift A'),
(20, '10B', 'Section A2', 'Shift B'),
(21, '11A', 'Section B', 'Shift A'),
(22, '11B', 'Section B', 'Shift B'),
(23, '12A', 'Section A2', 'Shift A'),
(24, '12B', 'Section A2', 'Shift B'),
(25, '13A', 'Section B', 'Shift A'),
(26, '13B', 'Section B', 'Shift B'),
(27, '14A', 'Section B', 'Shift A'),
(28, '14B', 'Section B', 'Shift B'),
(29, '15A', 'Section B', 'Shift A'),
(30, '15B', 'Section B', 'Shift B'),
(31, '16A', 'Section D', 'Shift A'),
(32, '16B', 'Section D', 'Shift B'),
(33, '17A', 'Section D', 'Shift A'),
(34, '17B', 'Section D', 'Shift B'),
(35, '18A', 'Section B', 'Shift A'),
(36, '18B', 'Section B', 'Shift B'),
(37, '21A', 'Section B', 'Shift A'),
(38, '21B', 'Section B', 'Shift B'),
(39, '22A', 'Section D', 'Shift A'),
(40, '22B', 'Section D', 'Shift B'),
(41, '23A', 'Section D', 'Shift A'),
(42, '23B', 'Section D', 'Shift B'),
(43, '24A', 'Section D', 'Shift A'),
(44, '24B', 'Section D', 'Shift B'),
(45, '25A', 'Section C', 'Shift A'),
(46, '25B', 'Section C', 'Shift B'),
(47, '26A', 'Section C', 'Shift A'),
(48, '26B', 'Section C', 'Shift B'),
(49, '27A', 'Section C', 'Shift A'),
(50, '27B', 'Section C', 'Shift B'),
(51, '28A', 'Section C', 'Shift A'),
(52, '28B', 'Section C', 'Shift B'),
(53, '29A', 'Section C', 'Shift A'),
(54, '29B', 'Section C', 'Shift B'),
(55, '30A', 'Section C', 'Shift A'),
(56, '30B', 'Section C', 'Shift B'),
(57, '31A', 'Section D', 'Shift A'),
(58, '31B', 'Section D', 'Shift B'),
(59, '32A', 'Section C', 'Shift A'),
(60, '32B', 'Section C', 'Shift B'),
(61, '33A', 'Section C', 'Shift A'),
(62, '33B', 'Section C', 'Shift B'),
(63, '34A', 'Section C', 'Shift A'),
(64, '34B', 'Section C', 'Shift B'),
(65, '35A', 'Section D', 'Shift A'),
(66, '35B', 'Section D', 'Shift B'),
(67, '36A', 'Section D', 'Shift A'),
(68, '36B', 'Section D', 'Shift B'),
(69, '37A', 'Section D', 'Shift A'),
(70, '37B', 'Section D', 'Shift B'),
(71, '38A', 'Section B', 'Shift A'),
(72, '38B', 'Section B', 'Shift B'),
(73, '39A', 'Section B', 'Shift A'),
(74, '39B', 'Section B', 'Shift B'),
(75, '40A', 'Section B', 'Shift A'),
(76, '40B', 'Section B', 'Shift B'),
(77, '41A', 'Section A2', 'Shift A'),
(78, '41B', 'Section A2', 'Shift B'),
(79, '42A', 'Section A2', 'Shift A'),
(80, '42B', 'Section A2', 'Shift B'),
(81, '43A', 'Section A1', 'Shift A'),
(82, '43B', 'Section A1', 'Shift B'),
(83, '44A', 'Section B', 'Shift A'),
(84, '44B', 'Section B', 'Shift B'),
(85, '45A', 'Section A2', 'Shift A'),
(86, '45B', 'Section A2', 'Shift B'),
(87, '46A', 'Section A2', 'Shift A'),
(88, '46B', 'Section A2', 'Shift B'),
(89, '47A', 'Section A2', 'Shift A'),
(90, '47B', 'Section A2', 'Shift B'),
(91, '48A', 'Section A2', 'Shift A'),
(92, '48B', 'Section A2', 'Shift B'),
(93, '49A', 'Section A1', 'Shift A'),
(94, '49B', 'Section A1', 'Shift B'),
(95, '51A', 'Section E', 'Shift A'),
(96, '51B', 'Section E', 'Shift B'),
(97, '52A', 'Section E', 'Shift A'),
(98, '52B', 'Section E', 'Shift B'),
(99, '53A', 'Section E', 'Shift A'),
(100, '53B', 'Section E', 'Shift B'),
(101, '54A', 'Section E', 'Shift A'),
(102, '54B', 'Section E', 'Shift B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `epf` varchar(6) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`epf`, `password`) VALUES
('8497', '4ef42b32bccc9485b10b8183507e5d82');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defect`
--
ALTER TABLE `defect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`epf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `defect`
--
ALTER TABLE `defect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
