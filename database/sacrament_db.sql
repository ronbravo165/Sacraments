-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 01:51 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sacrament_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `baprequest_tbl`
--

CREATE TABLE IF NOT EXISTS `baprequest_tbl` (
`id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baprequest_tbl`
--

INSERT INTO `baprequest_tbl` (`id`, `fullname`, `address`, `birthday`) VALUES
(1, 'Ronald Bravo', 'Puncan, Carranglan, Nueva Ecija', 'July 12, 1990');

-- --------------------------------------------------------

--
-- Table structure for table `baptism_tbl`
--

CREATE TABLE IF NOT EXISTS `baptism_tbl` (
`id` int(11) NOT NULL,
  `bn` int(11) NOT NULL,
  `pn` int(11) NOT NULL,
  `ln` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `bday` int(11) NOT NULL,
  `bmonth` varchar(255) NOT NULL,
  `byear` int(11) NOT NULL,
  `bapday` int(11) NOT NULL,
  `bapmonth` varchar(255) NOT NULL,
  `bapyear` int(11) NOT NULL,
  `godfather` varchar(255) NOT NULL,
  `godmother` varchar(255) NOT NULL,
  `presider` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `priest` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baptism_tbl`
--

INSERT INTO `baptism_tbl` (`id`, `bn`, `pn`, `ln`, `fullname`, `father`, `mother`, `birthplace`, `bday`, `bmonth`, `byear`, `bapday`, `bapmonth`, `bapyear`, `godfather`, `godmother`, `presider`, `purpose`, `priest`) VALUES
(3, 1, 1, 1, 'Juan Dela Cruz', 'Juan Dela Cruz III', 'Honorata Sample ', 'Sta. Maria, Bulacan', 13, 'April', 1994, 17, 'October', 1995, 'Sample Godfather', 'Sample Godmother', 'Sample Presider', 'For Employment', 'Fr. Jimmy D. Reyes'),
(4, 1, 1, 5, 'Sample Name', 'Juan Dela Cruz Sr.', 'Honorata Sample', 'Sta. Maria, Bulacan', 5, 'May', 1994, 5, 'May', 1995, 'Sample Godfather', 'Sample Godmother', 'Fr. Jimmy D. Reyes', 'NA', 'Fr. Jimmy D. Reyes');

-- --------------------------------------------------------

--
-- Table structure for table `communion_tbl`
--

CREATE TABLE IF NOT EXISTS `communion_tbl` (
`id` int(11) NOT NULL,
  `bn` int(11) NOT NULL,
  `pn` int(11) NOT NULL,
  `ln` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `bday` int(11) NOT NULL,
  `bmonth` varchar(255) NOT NULL,
  `byear` int(11) NOT NULL,
  `comday` int(11) NOT NULL,
  `commonth` varchar(255) NOT NULL,
  `comyear` int(11) NOT NULL,
  `godfather` varchar(255) NOT NULL,
  `godmother` varchar(255) NOT NULL,
  `presider` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `priest` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communion_tbl`
--

INSERT INTO `communion_tbl` (`id`, `bn`, `pn`, `ln`, `fullname`, `father`, `mother`, `birthplace`, `bday`, `bmonth`, `byear`, `comday`, `commonth`, `comyear`, `godfather`, `godmother`, `presider`, `purpose`, `priest`) VALUES
(3, 1, 1, 1, 'Juan Dela Cruz', 'Juan Dela Cruz Sr.', 'Honorata Sample', 'Sta. Maria, Bulacan', 16, 'February', 1994, 16, 'November', 2014, 'Sample Godfather', 'Sample Godmother', 'Sample Presider', 'NA', 'Fr. Jimmy D. Reyes');

-- --------------------------------------------------------

--
-- Table structure for table `comrequest_tbl`
--

CREATE TABLE IF NOT EXISTS `comrequest_tbl` (
`id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comrequest_tbl`
--

INSERT INTO `comrequest_tbl` (`id`, `fullname`, `address`, `birthday`) VALUES
(1, 'Sample Name', 'Puncan, Carranglan, Nueva Ecija', 'July 12, 1990');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_tbl`
--

CREATE TABLE IF NOT EXISTS `confirmation_tbl` (
`id` int(11) NOT NULL,
  `bn` int(11) NOT NULL,
  `pn` int(11) NOT NULL,
  `ln` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `bday` varchar(255) NOT NULL,
  `bmonth` varchar(255) NOT NULL,
  `byear` int(11) NOT NULL,
  `conday` varchar(255) NOT NULL,
  `conmonth` varchar(255) NOT NULL,
  `conyear` int(11) NOT NULL,
  `godfather` varchar(255) NOT NULL,
  `godmother` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `presider` varchar(255) NOT NULL,
  `priest` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmation_tbl`
--

INSERT INTO `confirmation_tbl` (`id`, `bn`, `pn`, `ln`, `fullname`, `father`, `mother`, `birthplace`, `bday`, `bmonth`, `byear`, `conday`, `conmonth`, `conyear`, `godfather`, `godmother`, `purpose`, `presider`, `priest`) VALUES
(2, 1, 1, 1, 'Juan Dela Cruz', 'Juan Dela Cruz Sr.', 'Honorata Sample', 'Sta. Maria, Bulacan', '12', 'February', 1994, '17', 'October', 2014, 'Sample Godfather', 'Sample Godmother', 'NA', 'Sample Presider', 'Fr. Jimmy D. Reyes');

-- --------------------------------------------------------

--
-- Table structure for table `conrequest_tbl`
--

CREATE TABLE IF NOT EXISTS `conrequest_tbl` (
`id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conrequest_tbl`
--

INSERT INTO `conrequest_tbl` (`id`, `fullname`, `address`, `birthday`) VALUES
(2, 'Juan Dela Cruz', 'Puncan, Carranglan, Nueva Ecija', 'July 12, 1990');

-- --------------------------------------------------------

--
-- Table structure for table `deceased_tbl`
--

CREATE TABLE IF NOT EXISTS `deceased_tbl` (
`id` int(11) NOT NULL,
  `bn` int(11) NOT NULL,
  `pn` int(11) NOT NULL,
  `ln` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `bday` int(11) NOT NULL,
  `bmonth` varchar(255) NOT NULL,
  `byear` int(11) NOT NULL,
  `decday` int(11) NOT NULL,
  `decmonth` varchar(255) NOT NULL,
  `decyear` int(11) NOT NULL,
  `presider` varchar(255) NOT NULL,
  `priest` varchar(255) NOT NULL,
  `caused` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deceased_tbl`
--

INSERT INTO `deceased_tbl` (`id`, `bn`, `pn`, `ln`, `fullname`, `father`, `mother`, `birthplace`, `bday`, `bmonth`, `byear`, `decday`, `decmonth`, `decyear`, `presider`, `priest`, `caused`) VALUES
(2, 1, 1, 2, 'abcded', 'abcded', 'abcded', 'abcded', 11, 'January', 1999, 11, 'February', 1999, 'abcded', 'abcded', 'abcded'),
(3, 1, 1, 5, 'Juan Dela Cruz', 'Juan Dela Cruz Sr.', 'Honorata Sample', 'Sta. Maria, Bulacan', 17, 'March', 1994, 0, 'December', 2004, 'Sample Presider', 'Fr. Jimmy D. Reyes', 'Old Age');

-- --------------------------------------------------------

--
-- Table structure for table `decrequest_tbl`
--

CREATE TABLE IF NOT EXISTS `decrequest_tbl` (
`id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `caused` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decrequest_tbl`
--

INSERT INTO `decrequest_tbl` (`id`, `fullname`, `address`, `caused`) VALUES
(2, 'Juan Dela Cruz', 'Puncan, Carranglan, Nueva Ecija', 'Old Age');

-- --------------------------------------------------------

--
-- Table structure for table `register_tbl`
--

CREATE TABLE IF NOT EXISTS `register_tbl` (
`id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_tbl`
--

INSERT INTO `register_tbl` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Juan Dela Cruz', 'SAMPLE1', 'sample1'),
(2, 'Ronald Bravo', 'admin123', 'admin123'),
(3, 'Ronald Bravo', 'admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'admin', 'admin123', 'Juan Dela Cruz');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_tbl`
--

CREATE TABLE IF NOT EXISTS `wedding_tbl` (
`id` int(11) NOT NULL,
  `bn` int(11) NOT NULL,
  `pn` int(11) NOT NULL,
  `ln` int(11) NOT NULL,
  `groom` varchar(255) NOT NULL,
  `groomage` int(11) NOT NULL,
  `groombday` varchar(255) NOT NULL,
  `groombmonth` varchar(255) NOT NULL,
  `groombyear` int(11) NOT NULL,
  `groomfather` varchar(255) NOT NULL,
  `groommother` varchar(255) NOT NULL,
  `groomaddress` varchar(255) NOT NULL,
  `bride` varchar(255) NOT NULL,
  `brideage` int(11) NOT NULL,
  `bridebday` varchar(255) NOT NULL,
  `bridebmonth` varchar(255) NOT NULL,
  `bridebyear` int(11) NOT NULL,
  `bridefather` varchar(255) NOT NULL,
  `bridemother` varchar(255) NOT NULL,
  `brideaddress` varchar(255) NOT NULL,
  `godfather` varchar(255) NOT NULL,
  `godmother` varchar(255) NOT NULL,
  `wedday` varchar(255) NOT NULL,
  `wedmonth` varchar(255) NOT NULL,
  `wedyear` int(11) NOT NULL,
  `presider` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding_tbl`
--

INSERT INTO `wedding_tbl` (`id`, `bn`, `pn`, `ln`, `groom`, `groomage`, `groombday`, `groombmonth`, `groombyear`, `groomfather`, `groommother`, `groomaddress`, `bride`, `brideage`, `bridebday`, `bridebmonth`, `bridebyear`, `bridefather`, `bridemother`, `brideaddress`, `godfather`, `godmother`, `wedday`, `wedmonth`, `wedyear`, `presider`) VALUES
(1, 1, 1, 1, 'Sample Groom', 30, '23', 'March', 1994, 'Groom Father', 'Groom Mother', 'Groom Address', 'Bride Sample', 25, '23', 'August', 1999, 'Bride Father', 'Bride Mother', 'Bride Address', 'Sample Godfather', 'Sample Godmother', '23', 'August', 2023, 'Fr. Jimmy D. Reyes'),
(3, 1, 1, 3, 'Sample Groom', 30, '29', 'March', 1994, 'Sample Father', 'Sample Mother', 'Sample ADdress', 'Sample Bride', 23, '16', 'October', 1997, 'Sample Father', 'Sample Mother', 'Sample Address', 'Sample Godfather', 'Sample Godmother', '16', 'August', 2023, 'Ediwow');

-- --------------------------------------------------------

--
-- Table structure for table `wedrequest_tbl`
--

CREATE TABLE IF NOT EXISTS `wedrequest_tbl` (
`id` int(11) NOT NULL,
  `groom` varchar(255) NOT NULL,
  `bride` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedrequest_tbl`
--

INSERT INTO `wedrequest_tbl` (`id`, `groom`, `bride`, `address`) VALUES
(3, 'Sample Groom', 'Sample Bride', 'Puncan, Carranglan, Nueva Ecija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baprequest_tbl`
--
ALTER TABLE `baprequest_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baptism_tbl`
--
ALTER TABLE `baptism_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communion_tbl`
--
ALTER TABLE `communion_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comrequest_tbl`
--
ALTER TABLE `comrequest_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmation_tbl`
--
ALTER TABLE `confirmation_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conrequest_tbl`
--
ALTER TABLE `conrequest_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deceased_tbl`
--
ALTER TABLE `deceased_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decrequest_tbl`
--
ALTER TABLE `decrequest_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_tbl`
--
ALTER TABLE `register_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding_tbl`
--
ALTER TABLE `wedding_tbl`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedrequest_tbl`
--
ALTER TABLE `wedrequest_tbl`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baprequest_tbl`
--
ALTER TABLE `baprequest_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `baptism_tbl`
--
ALTER TABLE `baptism_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `communion_tbl`
--
ALTER TABLE `communion_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comrequest_tbl`
--
ALTER TABLE `comrequest_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `confirmation_tbl`
--
ALTER TABLE `confirmation_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `conrequest_tbl`
--
ALTER TABLE `conrequest_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `deceased_tbl`
--
ALTER TABLE `deceased_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `decrequest_tbl`
--
ALTER TABLE `decrequest_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `register_tbl`
--
ALTER TABLE `register_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wedding_tbl`
--
ALTER TABLE `wedding_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wedrequest_tbl`
--
ALTER TABLE `wedrequest_tbl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
