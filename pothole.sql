-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 04:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pothole`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `photo` varchar(25) NOT NULL,
  `latitude` varchar(40) NOT NULL,
  `longitude` varchar(40) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `uid`, `photo`, `latitude`, `longitude`, `status`, `timestamp`, `addr`) VALUES
(10, 5, 'IMG_20190303_162022.jpg', '37.421998333333335', '-122.08400000000002', 'done', '2019-03-04 11:20:33', 'dddsavevee e'),
(11, 5, 'IMG_20190303_163849.jpg', '37.421998333333335', '-122.08400000000002', 'rejected', '2019-02-19 11:20:38', 'ssssssssssssss'),
(12, 5, 'IMG_20190303_173145.jpg', '37.421998333333335', '-122.08400000000002', 'pending', '2019-01-08 11:20:42', 'KANDIVALI WEST');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `number`, `email`) VALUES
(5, 's', '1122', 'nidhipkathiriya@gmail.com'),
(6, '99nk', '9999', 'ssas@sasa.com'),
(7, 'wghvzxc', '11111', 'vdcd');

--
-- Triggers `userdata`
--
DELIMITER $$
CREATE TRIGGER `addprivilege` AFTER INSERT ON `userdata` FOR EACH ROW INSERT INTO `userprivilege`(`username`, `type`) VALUES (new.number,'user')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `userprivilege`
--

CREATE TABLE `userprivilege` (
  `username` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprivilege`
--

INSERT INTO `userprivilege` (`username`, `type`) VALUES
('1211', 'usser'),
('1122', 'user'),
('9999', 'admin'),
('11111', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `complain_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `userdata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
