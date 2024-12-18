-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 04:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uww`
--

-- --------------------------------------------------------

--
-- Table structure for table `uww_schedule`
--
DROP TABLE IF EXISTS `uww_schedule`;

CREATE TABLE IF NOT EXISTS `uww_schedule` (
  `id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `number` int(11) NOT NULL,
  `instructor` varchar(50) CHARACTER SET latin1 NOT NULL,
  `section` int(11) NOT NULL,
  `days` varchar(20) CHARACTER SET latin1 NOT NULL,
  `time` varchar(30) NOT NULL,
  `location` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uww_schedule`
--

INSERT INTO `uww_schedule` (`id`, `subject`, `number`, `instructor`, `section`, `days`, `time`, `location`) VALUES
(1, 'COMPSCI', 162, 'Cao,Tina Y', 2, 'W', '12:30 13:45', 'McGraw 0125'),
(2, 'COMPSCI', 162, 'Gunawardena,Athula D. A.', 4, 'TBA', 'TBA', 'CANVAS ONLINE'),
(3, 'COMPSCI', 162, 'Ma,Jiehui', 1, 'Tu', '15:30 16:45', 'McGraw 0115'),
(4, 'COMPSCI', 162, 'Gunawardena,Athula D. A.', 3, 'TBA', 'TBA', 'CANVAS ONLINE'),
(5, 'COMPSCI', 165, 'Maresso,Brian S', 1, 'MW', '14:00 15:15', 'McGraw 0115'),
(6, 'COMPSCI', 170, 'Ma,Jiehui', 1, 'Tu', '12:30 13:45', 'McGraw 0115'),
(7, 'COMPSCI', 172, 'Maresso,Brian S', 2, 'TuTh', '12:30 13:45', 'McGraw 0125'),
(8, 'COMPSCI', 172, 'Ma,Jiehui', 1, 'MW', '15:30 16:45', 'Hyer Hall 0210'),
(9, 'COMPSCI', 172, 'Maresso,Brian S', 2, 'Th', '14:00 14:50', 'McGraw 0125'),
(10, 'COMPSCI', 172, 'Ma,Jiehui', 1, 'Th', '15:30 16:20', 'McGraw 0115'),
(11, 'COMPSCI', 174, 'Sharma,Chandra', 2, 'Th', '11:00 11:50', 'McGraw 0125'),
(12, 'COMPSCI', 174, 'Sharma,Chandra', 2, 'TuTh', '09:30 10:45', 'McGraw 0125'),
(13, 'COMPSCI', 174, 'Sharma,Chandra', 1, 'Th', '14:00 14:50', 'McGraw 0115'),
(14, 'COMPSCI', 174, 'Sharma,Chandra', 1, 'MW', '14:00 15:15', 'McGraw 0125'),
(15, 'COMPSCI', 181, 'Ma,Jiehui', 1, 'W', '12:30 13:45', 'McGraw 0115'),
(16, 'COMPSCI', 215, 'Mukherjee,Lopamudra', 2, 'TBA', 'TBA', 'CANVAS ONLINE'),
(17, 'COMPSCI', 215, 'Mukherjee,Lopamudra', 1, 'MW', '11:00 12:15', 'Heide Hall 0311'),
(18, 'COMPSCI', 220, 'Cao,Tina Y', 1, 'MW', '11:00 12:15', 'Hyer Hall 0210'),
(19, 'COMPSCI', 220, 'Cao,Tina Y', 1, 'W', '14:00 14:50', 'Hyer Hall 0210'),
(20, 'COMPSCI', 221, 'Maresso,Brian S', 1, 'TuTh', '17:00 18:15', 'Hyer Hall 0210'),
(21, 'COMPSCI', 222, 'Maresso,Brian S', 1, 'Th', '12:30 13:20', 'McGraw 0115'),
(22, 'COMPSCI', 222, 'Maresso,Brian S', 1, 'MW', '15:30 16:45', 'McGraw 0115'),
(23, 'COMPSCI', 223, 'Ganguly,Arnab', 1, 'Tu', '14:00 15:15', 'McGraw 0115'),
(24, 'COMPSCI', 223, 'Ganguly,Arnab', 2, 'W', '15:30 16:45', 'McGraw 0125'),
(25, 'COMPSCI', 271, 'Gunawardena,Athula D. A.', 1, 'M', '14:00 15:15', 'Hyer Hall 0210'),
(26, 'COMPSCI', 271, 'Gunawardena,Athula D. A.', 2, 'Tu', '11:00 12:15', 'McGraw 0125'),
(27, 'COMPSCI', 332, 'Mukherjee,Lopamudra', 1, 'TuTh', '12:30 13:45', 'Hyer Hall 0210'),
(28, 'COMPSCI', 353, 'Wei,Ruzhen', 1, 'TuTh', '11:00 12:15', 'Hyer Hall 0210'),
(29, 'COMPSCI', 354, 'Zhou,Jiazhen', 1, 'MW', '11:00 12:15', 'McGraw 0125'),
(30, 'COMPSCI', 366, 'Nguyen,Hien M', 2, 'TuTh', '11:00 12:15', 'McGraw 0115'),
(31, 'COMPSCI', 366, 'Nguyen,Hien M', 1, 'MW', '09:30 10:45', 'McGraw 0115'),
(32, 'COMPSCI', 381, 'Cao,Tina Y', 1, 'TuTh', '09:30 10:45', 'McGraw 0115'),
(33, 'COMPSCI', 382, 'Cao,Tina Y', 1, 'TuTh', '14:00 15:15', 'Hyer Hall 0210'),
(34, 'COMPSCI', 412, 'Yavuzcetin,Ozgur', 2, 'M', '17:00 18:15', 'Upham Hall 0166'),
(35, 'COMPSCI', 412, 'Yavuzcetin,Ozgur', 1, 'M', '17:00 18:15', 'Upham Hall 0141'),
(36, 'COMPSCI', 424, 'Oster,Zachary J', 1, 'TuTh', '12:30 13:45', 'Heide Hall 0219'),
(37, 'COMPSCI', 433, 'Ganguly,Arnab', 1, 'MW', '14:00 15:15', 'Hyer Hall 0215'),
(38, 'COMPSCI', 434, 'Nguyen,Hien M', 1, 'MW', '11:00 12:15', 'McGraw 0115'),
(39, 'COMPSCI', 456, 'Sharma,Chandra', 1, 'MW', '15:30 16:45', 'McGraw 0117'),
(40, 'COMPSCI', 460, 'Maresso,Brian S', 1, 'TuTh', '15:30 16:45', 'McGraw 0125'),
(41, 'COMPSCI', 476, 'Oster,Zachary J', 1, 'MW', '09:30 10:45', 'McGraw 0117'),
(42, 'COMPSCI', 482, 'Samaranayake,Sobitha W', 1, 'TuTh', '15:30 16:45', 'Hyer Hall 0210'),
(43, 'COMPSCI', 493, 'Oster,Zachary J', 1, 'TBA', 'TBA', 'SEE INSTRUCTOR INDST'),
(44, 'COMPSCI', 498, 'Arranged,To Be', 1, 'TBA', 'TBA', 'SEE INSTRUCTOR INDST'),
(45, 'COMPSCI', 498, 'Arranged,To Be', 1, 'TBA', 'TBA', 'SEE INSTRUCTOR INDST'),
(46, 'COMPSCI', 736, 'Mukherjee,Lopamudra', 1, 'TBA', 'TBA', 'CANVAS ONLINE'),
(47, 'COMPSCI', 738, 'Ganguly,Arnab', 1, 'M', '17:00 19:30', 'McGraw 0117'),
(48, 'COMPSCI', 739, 'Gunawardena,Athula D. A.', 1, 'W', '17:00 19:30', 'McGraw 0125'),
(49, 'COMPSCI', 755, 'Zhou,Jiazhen', 22, 'TBA', 'TBA', 'CANVAS ONLINE'),
(50, 'COMPSCI', 776, 'Oster,Zachary J', 1, 'Tu', '17:00 19:30', 'McGraw 0125'),
(51, 'COMPSCI', 789, 'Arranged,To Be', 4, 'TBA', 'TBA', 'SEE INSTRUCTOR INDST'),
(52, 'COMPSCI', 789, 'Arranged,To Be', 3, 'TBA', 'TBA', 'SEE INSTRUCTOR INDST'),
(53, 'COMPSCI', 789, 'Arranged,To Be', 2, 'TBA', 'TBA', 'SEE INSTRUCTOR INDST'),
(54, 'COMPSCI', 789, 'Arranged,To Be', 1, 'TBA', 'TBA', 'SEE INSTRUCTOR INDST'),
(55, 'COMPSCI', 799, 'Arranged,To Be', 1, 'TBA', 'TBA', 'SEE INSTRUCTOR INDST'),
(56, 'MAGD', 150, 'Leighton,Fred', 1, 'M', '12:30 13:45', 'Anderson Library 123'),
(57, 'MAGD', 150, 'Leighton,Fred', 1, 'W', '12:30 13:45', 'Anderson Library 123'),
(58, 'MAGD', 210, 'Melton,Renee M', 3, 'TBA', '14:00 16:45', 'CANVAS ONLINE'),
(59, 'MAGD', 210, 'Zhang,Xiaohong', 2, 'MW', '10:00 11:50', 'Center of the Arts 2'),
(60, 'MAGD', 210, 'Zhang,Xiaohong', 1, 'MW', '08:00 09:50', 'Center of the Arts 2'),
(61, 'MAGD', 220, 'Arranged,To Be', 3, 'TBA', 'TBA', 'CANVAS ONLINE'),
(62, 'MAGD', 220, 'Howen,Michael', 1, 'TuTh', '11:00 13:45', 'Center of the Arts 2'),
(63, 'MAGD', 220, 'Harper,Jim E', 2, 'TBA', 'TBA', 'CANVAS ONLINE'),
(64, 'MAGD', 270, 'Vichot,Rhea', 1, 'TBA', 'TBA', 'CANVAS ONLINE'),
(65, 'MAGD', 271, 'Leighton,Fred', 1, 'TuTh', '09:30 10:45', 'Anderson Library 123'),
(66, 'MAGD', 272, 'Leighton,Fred', 1, 'MW', '09:30 10:45', 'Anderson Library 123'),
(67, 'MAGD', 372, 'Hwang,Nick', 1, 'MW', '14:15 15:30', 'Anderson Library 123'),
(68, 'MAGD', 487, 'Hwang,Nick Vichot,Rhea', 1, 'TuTh', '14:00 15:15', 'Anderson Library 123'),
(69, 'MAGD', 488, 'Hwang,Nick Vichot,Rhea', 1, 'TuTh', '15:30 16:45', 'Anderson Library 123'),
(70, 'MATH', 124, 'Gauvin,Morgan', 1, 'W', '13:00 13:50', 'Heide Hall 0117'),
(71, 'MATH', 139, 'Bruns,Corey T', 15, 'TuTh', '14:00 15:15', 'Heide Hall 0112'),
(72, 'MATH', 139, 'Felcyn,Pawel', 16, 'MW', '15:30 16:45', 'Heide Hall 0102'),
(73, 'MATH', 139, 'Felcyn,Pawel', 16, 'MW', '15:30 16:45', 'Heide Hall 0102'),
(74, 'MATH', 139, 'Pandiyan,Balamurugan', 17, 'MW', '15:30 16:45', 'Heide Hall 0112'),
(75, 'MATH', 139, 'Pandiyan,Balamurugan', 17, 'MW', '15:30 16:45', 'Heide Hall 0112'),
(76, 'MATH', 139, 'Arranged,To Be', 18, 'TuTh', '15:30 16:45', 'Heide Hall 0102'),
(77, 'MATH', 139, 'Arranged,To Be', 19, 'TuTh', '15:30 16:45', 'Heide Hall 0112'),
(78, 'MATH', 139, 'Bruns,Corey T', 20, 'TBA', 'TBA', 'CANVAS ONLINE'),
(79, 'MATH', 139, 'Bruns,Corey T', 20, 'TBA', 'TBA', 'CANVAS ONLINE'),
(80, 'MATH', 139, 'Conte,Heather L', 21, 'TBA', 'TBA', 'CANVAS ONLINE'),
(81, 'MATH', 139, 'Conte,Heather L', 21, 'TBA', 'TBA', 'CANVAS ONLINE'),
(82, 'MATH', 139, 'Arranged,To Be', 22, 'TBA', 'TBA', 'CANVAS ONLINE'),
(83, 'MATH', 139, 'Arranged,To Be', 22, 'TBA', 'TBA', 'CANVAS ONLINE'),
(84, 'MATH', 139, 'Rahr,Huckleberry', 23, 'MW', '14:00 15:15', 'Heide Hall 0113'),
(85, 'MATH', 139, 'Arranged,To Be', 14, 'TuTh', '14:00 15:15', 'Heide Hall 0102'),
(86, 'MATH', 139, 'Gauvin,Morgan', 13, 'MW', '14:00 15:15', 'Heide Hall 0102'),
(87, 'MATH', 139, 'Reilly,John', 1, 'TuTh', '08:00 09:15', 'Heide Hall 0102'),
(88, 'MATH', 139, 'Rahr,Huckleberry', 3, 'MW', '09:30 10:45', 'Heide Hall 0112'),
(89, 'MATH', 139, 'Arranged,To Be', 4, 'TuTh', '09:30 10:45', 'Heide Hall 0102'),
(90, 'MATH', 139, 'Gauvin,Morgan', 5, 'MW', '11:00 12:15', 'Heide Hall 0102'),
(91, 'MATH', 139, 'Pandiyan,Balamurugan', 6, 'MW', '11:00 12:15', 'Heide Hall 0112'),
(92, 'MATH', 139, 'Reilly,John', 7, 'TuTh', '11:00 12:15', 'Heide Hall 0102'),
(93, 'MATH', 139, 'Lampe,Peter H', 8, 'TuTh', '11:00 12:15', 'Heide Hall 0112'),
(94, 'MATH', 139, 'Felcyn,Pawel', 9, 'MW', '12:30 13:45', 'Heide Hall 0102'),
(95, 'MATH', 139, 'Felcyn,Pawel', 9, 'MW', '12:30 13:45', 'Heide Hall 0102'),
(96, 'MATH', 139, 'Bruns,Corey T', 12, 'TuTh', '12:30 13:45', 'Heide Hall 0112'),
(97, 'MATH', 139, 'Bruns,Corey T', 2, 'MW', '09:30 10:45', 'Heide Hall 0102'),
(98, 'MATH', 139, 'Bruns,Corey T', 12, 'TuTh', '12:30 13:45', 'Heide Hall 0112'),
(99, 'MATH', 139, 'Felcyn,Pawel', 11, 'TuTh', '12:30 13:45', 'Heide Hall 0102'),
(100, 'MATH', 139, 'Felcyn,Pawel', 11, 'TuTh', '12:30 13:45', 'Heide Hall 0102'),
(101, 'MATH', 139, 'Ruk,Josh', 10, 'MW', '12:30 13:45', 'Heide Hall 0112'),
(102, 'MATH', 139, 'Ruk,Josh', 10, 'MW', '12:30 13:45', 'Heide Hall 0112'),
(103, 'MATH', 140, 'Hough,Wesley K', 1, 'TuTh', '09:30 10:45', 'Heide Hall 0117'),
(104, 'MATH', 142, 'Chen,Xueqing', 3, 'MTuWTh', '13:00 13:50', 'Hyland Hall 1310'),
(105, 'MATH', 142, 'Chen,Xueqing', 2, 'MTuWTh', '11:00 11:50', 'Hyland Hall 1310'),
(106, 'MATH', 142, 'Gauvin,Morgan', 1, 'MTuWTh', '09:00 09:50', 'Hyland Hall 1310'),
(107, 'MATH', 143, 'Nam,Ki Bong', 10, 'MW', '14:00 15:15', 'Hyland Hall 1317'),
(108, 'MATH', 143, 'Rahr,Huckleberry', 14, 'TBA', 'TBA', 'CANVAS ONLINE'),
(109, 'MATH', 143, 'Pandiyan,Balamurugan', 13, 'TBA', 'TBA', 'CANVAS ONLINE'),
(110, 'MATH', 143, 'Pandiyan,Balamurugan', 13, 'TBA', 'TBA', 'CANVAS ONLINE'),
(111, 'MATH', 143, 'Hough,Wesley K', 12, 'MW', '15:30 16:45', 'Hyland Hall 1317'),
(112, 'MATH', 143, 'Nam,Ki Bong', 11, 'TuTh', '14:00 15:15', 'Hyland Hall 1317'),
(113, 'MATH', 143, 'Rahr,Huckleberry', 14, 'TBA', 'TBA', 'CANVAS ONLINE'),
(114, 'MATH', 143, 'Pandiyan,Balamurugan', 9, 'TuTh', '12:30 13:45', 'Hyland Hall 1317'),
(115, 'MATH', 143, 'Nam,Ki Bong', 1, 'MW', '08:00 09:15', 'Hyland Hall 1317'),
(116, 'MATH', 143, 'Nam,Ki Bong', 2, 'MW', '09:30 10:45', 'Hyland Hall 1317'),
(117, 'MATH', 143, 'Rahr,Huckleberry', 3, 'TuTh', '09:30 10:45', 'Hyland Hall 1317'),
(118, 'MATH', 143, 'Arriola,Leon M', 4, 'MW', '11:00 12:15', 'Hyland Hall 1317'),
(119, 'MATH', 143, 'Rahr,Huckleberry', 5, 'TuTh', '11:00 12:15', 'Hyland Hall 1317'),
(120, 'MATH', 143, 'Nam,Ki Bong', 7, 'MW', '12:30 13:45', 'Hyland Hall 1317'),
(121, 'MATH', 143, 'Arranged,To Be', 8, 'MW', '12:30 13:45', 'Heide Hall 0219'),
(122, 'MATH', 143, 'Samaranayake,Sobitha W', 6, 'TuTh', '11:00 12:15', 'Heide Hall 0219'),
(123, 'MATH', 147, 'Chaphalkar,Rachel M', 2, 'TBA', 'TBA', 'CANVAS ONLINE'),
(124, 'MATH', 147, 'Chaphalkar,Rachel M', 2, 'TBA', 'TBA', 'CANVAS ONLINE'),
(125, 'MATH', 147, 'Szabo,Tamas', 1, 'MTuWTh', '14:00 14:50', 'Hyer Hall 0216'),
(126, 'MATH', 148, 'Ruk,Josh', 1, 'MW', '09:30 10:45', 'Hyer Hall 0216'),
(127, 'MATH', 148, 'Ruk,Josh', 2, 'TuTh', '12:30 13:45', 'Hyer Hall 0216'),
(128, 'MATH', 149, 'Bertrand,Hayley', 1, 'TuTh', '09:30 10:45', 'Hyer Hall 0216'),
(129, 'MATH', 149, 'Bertrand,Hayley', 2, 'MW', '12:30 13:45', 'Hyer Hall 0216'),
(130, 'MATH', 151, 'Ruk,Josh', 3, 'TuTh', '15:30 16:45', 'McGraw 0117'),
(131, 'MATH', 151, 'Spence,Dylan', 2, 'MW', '11:00 12:15', 'McGraw 0117'),
(132, 'MATH', 151, 'Spence,Dylan', 1, 'TuTh', '09:30 10:45', 'McGraw 0117'),
(133, 'MATH', 152, 'Lampe,Peter H', 1, 'MW', '14:00 14:50', 'McGraw 0117'),
(134, 'MATH', 200, 'Hough,Wesley K', 1, 'MW', '13:00 13:50', 'Upham Hall 0144'),
(135, 'MATH', 250, 'Arriola,Leon M', 1, 'MW', '14:00 14:50', 'Heide Hall 0219'),
(136, 'MATH', 253, 'Samaranayake,Geethamali G', 1, 'MTuWTh', '10:00 10:50', 'Hyland Hall 1310'),
(137, 'MATH', 253, 'Chen,Xueqing', 2, 'MW', '14:00 14:50', 'Hyland Hall 1310'),
(138, 'MATH', 254, 'Felcyn,Pawel', 1, 'MTuWTh', '10:00 10:50', 'Upham Hall 0144'),
(139, 'MATH', 254, 'Lampe,Peter H', 2, 'MTuWTh', '13:00 13:50', 'McGraw 0117'),
(140, 'MATH', 255, 'Samaranayake,Sobitha W', 1, 'MW', '11:00 12:15', 'Upham Hall 0144'),
(141, 'MATH', 280, 'Hough,Wesley K', 1, 'MW', '14:00 15:15', 'Upham Hall 0144'),
(142, 'MATH', 301, 'Spence,Dylan', 1, 'MW', '14:00 15:15', 'Heide Hall 0117'),
(143, 'MATH', 346, 'Pandiyan,Balamurugan', 1, 'TuTh', '09:30 10:45', 'Heide Hall 0112'),
(144, 'MATH', 353, 'Szabo,Tamas', 1, 'MW', '11:00 11:50', 'Hyer Hall 0216'),
(145, 'MATH', 355, 'Samaranayake,Sobitha W', 1, 'MW', '15:30 16:45', 'Upham Hall 0144'),
(146, 'MATH', 359, 'Chaphalkar,Rachel M', 1, 'MTuWTh', '09:00 09:50', 'Heide Hall 0219'),
(147, 'MATH', 375, 'Bruns,Corey T', 1, 'MW', '11:00 12:15', 'Heide Hall 0219'),
(148, 'MATH', 415, 'Bertrand,Hayley', 1, 'TuTh', '14:00 15:15', 'Heide Hall 0117'),
(149, 'MATH', 421, 'Szabo,Tamas', 1, 'MW', '15:30 16:45', 'Hyer Hall 0216'),
(150, 'MATH', 431, 'Chen,Xueqing', 1, 'MW', '09:30 10:45', 'Heide Hall 0117'),
(151, 'MATH', 442, 'Hough,Wesley K', 1, 'MTuWTh', '11:00 11:50', 'Heide Hall 0117'),
(152, 'MATH', 458, 'Arriola,Leon M', 1, 'TuTh', '12:30 13:45', 'Heide Hall 0117'),
(153, 'MATH', 143, 'Trevor Zellmer', 1, 'TuTh', '12:30 13:45', 'Heide Hall 0117'),
(154, 'COMPSCI', 382, 'Trevor Zellmer', 1, 'TuTh', '13:45 13:56', 'Heide Hall 0117');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `uww_schedule`
--
ALTER TABLE `uww_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uww_schedule`
--
ALTER TABLE `uww_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
