-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 09:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mental-health-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ano` int(11) NOT NULL,
  `firstname` char(20) NOT NULL,
  `secondname` char(20) NOT NULL,
  `email` char(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` char(20) NOT NULL,
  `location` char(30) NOT NULL,
  `phone` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ano`, `firstname`, `secondname`, `email`, `password`, `age`, `gender`, `location`, `phone`) VALUES
(1, 'Braveen', '', 'braveen@gmail.com', 'braveen', 42, 'Male', 'Chennai', '9426678460');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `counsellorid` int(11) NOT NULL,
  `helpseekerid` int(11) NOT NULL,
  `date` date NOT NULL,
  `slotno` int(11) NOT NULL,
  `PaymentType` varchar(20) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `counsellorid`, `helpseekerid`, `date`, `slotno`, `PaymentType`, `link`) VALUES
(8, 2, 2, '2021-11-23', 3, 'Debit Card', 'https://zoom.us/j/97414237893?pwd=WkpSaTZlZFlHR01NNEJTZU82VHB5QT09'),
(9, 5, 2, '2021-11-23', 2, 'Debit Card', 'https://zoom.us/j/92008862581?pwd=R2haUHBucTdlUTdpa3JMOWIrZks1QT09'),
(10, 4, 4, '2021-11-23', 4, 'Debit Card', 'https://zoom.us/j/93780055713?pwd=R3hRWXdsakJVWThJVmlKQnkxRCtwUT09'),
(11, 5, 4, '2021-11-27', 4, 'Debit Card', 'https://zoom.us/j/99015206976?pwd=aCtuekc2dlBRcFI0NFZxY0lNSVZYUT09');

-- --------------------------------------------------------

--
-- Table structure for table `counsellors`
--

CREATE TABLE `counsellors` (
  `cno` int(11) NOT NULL,
  `firstname` char(20) NOT NULL,
  `secondname` char(20) NOT NULL,
  `email` char(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` char(20) NOT NULL,
  `location` char(30) NOT NULL,
  `phone` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellors`
--

INSERT INTO `counsellors` (`cno`, `firstname`, `secondname`, `email`, `password`, `age`, `gender`, `location`, `phone`) VALUES
(1, 'Santhosh', 'r', 'santhoshspark31@gmail.com', 'santhosh', 38, 'Male', 'Mumbai', '9977913678'),
(2, 'Anand', 'shekar', 'anand@gmail.com', 'anand', 40, 'Male', 'Mumbai', '7199926701'),
(3, 'karthik', 'deepu', 'karthik123@gmail.com', 'karthik', 45, 'Male', 'Bangalore', '9786867658'),
(4, 'Kaushik', 'k', 'kaushik@gmail.com', 'kaushik', 40, 'Male', 'chennai', '7667898086'),
(5, 'Harika', 'R', 'harika123@gmail.com', 'harika', 45, 'Female', 'Hyderabad', '7267782745');

-- --------------------------------------------------------

--
-- Table structure for table `counsellor_exper`
--

CREATE TABLE `counsellor_exper` (
  `cno` int(11) NOT NULL,
  `counsellor_exp` int(20) NOT NULL,
  `cerfication` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellor_exper`
--

INSERT INTO `counsellor_exper` (`cno`, `counsellor_exp`, `cerfication`) VALUES
(1, 8, 'certified'),
(2, 6, 'certified'),
(3, 10, 'certified'),
(4, 8, 'certified'),
(5, 5, 'certified');

-- --------------------------------------------------------

--
-- Table structure for table `hotline`
--

CREATE TABLE `hotline` (
  `Hotno` int(11) NOT NULL,
  `phoneNum` char(12) NOT NULL,
  `typeOfHelp` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotline`
--

INSERT INTO `hotline` (`Hotno`, `phoneNum`, `typeOfHelp`, `name`) VALUES
(1, '9932445128', 'General', 'OT General'),
(2, '6787715672', 'Suicide', 'Suicide Hotline '),
(3, '9567739786', 'Suicide', 'Indian Suicide prevention'),
(4, '9008765834', 'Addiction', 'Addiction Hotline'),
(5, '9876634221', 'General', 'General Hotline');

-- --------------------------------------------------------

--
-- Table structure for table `resourcecentre`
--

CREATE TABLE `resourcecentre` (
  `centreID` int(11) NOT NULL,
  `centreName` varchar(125) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `postalCode` char(80) NOT NULL,
  `phoneNum` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resourcecentre`
--

INSERT INTO `resourcecentre` (`centreID`, `centreName`, `address`, `email`, `postalCode`, `phoneNum`) VALUES
(1, 'Helping Hands', 'Chennai', 'hhands@gmail.com', '522011', '7789987836'),
(2, 'Addiction Centre', 'Bangalore', 'centreaddiction@gmail.com', '533281', '7786673847'),
(3, 'Resource General', 'Hyderabad', 'vgeneralhos@gmail.com', '566600', '7788893748'),
(4, 'ON Medical', 'Kolkata', 'onmedical@gmail.com', '534212', '6457239182'),
(5, 'Support Centre', 'Mumbai', 'supportcentrewhyte@gmail.com', '562287', '7800998372');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewid` int(11) NOT NULL,
  `authorid` int(100) NOT NULL,
  `counsellorid` int(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewid`, `authorid`, `counsellorid`, `rating`, `feedback`) VALUES
(3, 2, 2, 10, 'Gives good advices and proper medication'),
(4, 3, 1, 9, 'Very Interactive to the helpseekers'),
(5, 4, 5, 9, ''),
(7, 4, 4, 9, ''),
(9, 4, 5, 10, 'Very Interactive session with this counsellor');

-- --------------------------------------------------------

--
-- Table structure for table `security_password`
--

CREATE TABLE `security_password` (
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_password`
--

INSERT INTO `security_password` (`password`) VALUES
('mentalhealthcare123@');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slotid` int(11) NOT NULL,
  `timefrom` time NOT NULL,
  `timeto` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slotid`, `timefrom`, `timeto`) VALUES
(1, '09:30:00', '10:30:00'),
(2, '11:30:00', '12:30:00'),
(3, '14:30:00', '15:30:00'),
(4, '17:30:00', '18:30:00'),
(5, '19:30:00', '20:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `typesofhelp`
--

CREATE TABLE `typesofhelp` (
  `helpType` varchar(50) NOT NULL,
  `description` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typesofhelp`
--

INSERT INTO `typesofhelp` (`helpType`, `description`) VALUES
('Addiction', 'Support for those struggling with addiction'),
('Anxiety/Depression', 'General help for those struggling with anxiety/depression'),
('General', 'General help for any concerns that one might have'),
('Medical', 'Medical support for those with mental illness'),
('Suicide', 'Help for those contemplating suicide');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `firstname` char(20) NOT NULL,
  `secondname` char(20) NOT NULL,
  `email` char(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` char(20) NOT NULL,
  `location` char(30) NOT NULL,
  `phone` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `firstname`, `secondname`, `email`, `password`, `age`, `gender`, `location`, `phone`) VALUES
(2, 'Spandan', 'Ghosh', 'spandan@gmail.com', 'spandan', 19, 'Male', 'Kolkata', '9977913678'),
(3, 'Debduhita', 'Banerjee', 'debduhitha@gmail.com', 'debduhita', 19, 'Female', 'Kolkata', '7267782715'),
(4, 'Aravind', 'P', 'aravind@gmail.com', 'aravind', 19, 'Male', 'Bangalore', '7523881278'),
(5, 'Akashian', 'p', 'akash@gmail.com', 'akash', 19, 'Male', 'chennai', '7621675678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ano`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `cid` (`counsellorid`),
  ADD KEY `uid` (`helpseekerid`),
  ADD KEY `sid` (`slotno`);

--
-- Indexes for table `counsellors`
--
ALTER TABLE `counsellors`
  ADD PRIMARY KEY (`cno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `counsellor_exper`
--
ALTER TABLE `counsellor_exper`
  ADD KEY `Cousellorid` (`cno`);

--
-- Indexes for table `hotline`
--
ALTER TABLE `hotline`
  ADD PRIMARY KEY (`Hotno`),
  ADD KEY `typeOfHelp` (`typeOfHelp`);

--
-- Indexes for table `resourcecentre`
--
ALTER TABLE `resourcecentre`
  ADD PRIMARY KEY (`centreID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `postalCode` (`postalCode`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewid`),
  ADD KEY `Couselloridrev` (`counsellorid`),
  ADD KEY `useridrev` (`authorid`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slotid`);

--
-- Indexes for table `typesofhelp`
--
ALTER TABLE `typesofhelp`
  ADD PRIMARY KEY (`helpType`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `counsellors`
--
ALTER TABLE `counsellors`
  MODIFY `cno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotline`
--
ALTER TABLE `hotline`
  MODIFY `Hotno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resourcecentre`
--
ALTER TABLE `resourcecentre`
  MODIFY `centreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slotid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `cid` FOREIGN KEY (`counsellorid`) REFERENCES `counsellors` (`cno`),
  ADD CONSTRAINT `sid` FOREIGN KEY (`slotno`) REFERENCES `slot` (`slotid`),
  ADD CONSTRAINT `uid` FOREIGN KEY (`helpseekerid`) REFERENCES `users` (`sno`);

--
-- Constraints for table `counsellor_exper`
--
ALTER TABLE `counsellor_exper`
  ADD CONSTRAINT `Cousellorid` FOREIGN KEY (`cno`) REFERENCES `counsellors` (`cno`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `Couselloridrev` FOREIGN KEY (`counsellorid`) REFERENCES `counsellors` (`cno`),
  ADD CONSTRAINT `useridrev` FOREIGN KEY (`authorid`) REFERENCES `users` (`sno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
