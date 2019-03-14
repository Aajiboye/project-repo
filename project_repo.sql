-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 02:14 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_repo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `fld_projectid` int(11) NOT NULL,
  `fld_projecttitle` varchar(300) NOT NULL,
  `fld_filename` varchar(60) NOT NULL,
  `fld_supervisor` int(3) NOT NULL,
  `fld_datecompleted` date NOT NULL,
  `fld_description` varchar(200) NOT NULL,
  `fld_studentid` int(3) NOT NULL,
  `fld_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`fld_projectid`, `fld_projecttitle`, `fld_filename`, `fld_supervisor`, `fld_datecompleted`, `fld_description`, `fld_studentid`, `fld_status`) VALUES
(11, 'THE ROLE OF NIGERIAN YOUTHS IN PERPETRATION OF CYBER CRIME ', 'Abraham72.pdf', 1, '2015-08-01', 'Cybercrime in a narrow sense (computer crime) covers any illegal behaviour directed by means of electronic operations that target the security of computer systems and the data processed by them.', 3, 1),
(12, 'Video Surveillance And Monitoring System For Examination Malpractice Detection', 'Abraham37.pdf', 1, '2019-02-27', 'The objective of this paper is to design and develop a video surveillance and monitoring system that will\r\nprovide easy access to both live and archived images during and after an institutions examina', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisors`
--

CREATE TABLE `tbl_supervisors` (
  `fld_supervisorid` int(3) NOT NULL,
  `fld_firstname` varchar(20) NOT NULL,
  `fld_surname` varchar(20) NOT NULL,
  `fld_staffcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supervisors`
--

INSERT INTO `tbl_supervisors` (`fld_supervisorid`, `fld_firstname`, `fld_surname`, `fld_staffcode`) VALUES
(1, 'bolaji', 'adetoba', 'yct001'),
(2, 'Victor', 'haastrup', 'yct002'),
(3, '', 'ayannuga', 'yct003'),
(4, '', 'oludipe', 'yct004'),
(5, '', 'lawal', 'yct005'),
(6, '', 'shokunbi', 'yct006'),
(7, '', 'okikiola', 'yct007');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `fld_id` int(11) NOT NULL,
  `fld_firstname` varchar(20) NOT NULL,
  `fld_lastname` varchar(20) NOT NULL,
  `fld_matricno` varchar(20) NOT NULL,
  `fld_phone` text NOT NULL,
  `fld_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`fld_id`, `fld_firstname`, `fld_lastname`, `fld_matricno`, `fld_phone`, `fld_email`) VALUES
(3, 'Abraham', 'Ajiboye', 'F/HD/16/3210004', '08135541567', 'siracube@gmail.com'),
(4, 'Adebanji', 'Idowu', 'F/HD/16/3210005', '08145667777', 'adebanjiidowu@gmail.com'),
(5, 'Shola', 'Adeleye', 'F/HD/16/3210009', '08123456788', 'shola@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`fld_projectid`);

--
-- Indexes for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  ADD PRIMARY KEY (`fld_supervisorid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`fld_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `fld_projectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_supervisors`
--
ALTER TABLE `tbl_supervisors`
  MODIFY `fld_supervisorid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
