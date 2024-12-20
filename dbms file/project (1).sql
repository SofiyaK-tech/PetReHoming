-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 27, 2024 at 06:31 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoptionhistory`
--

CREATE TABLE `adoptionhistory` (
  `AdoptionId` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Pet` int(11) NOT NULL,
  `PetName` varchar(20) NOT NULL,
  `AdoptionDate` date NOT NULL,
  `Status` enum('Pending','Completed','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoptionhistory`
--

INSERT INTO `adoptionhistory` (`AdoptionId`, `User`, `Pet`, `PetName`, `AdoptionDate`, `Status`) VALUES
(1, 2, 2, 'Monty', '2024-03-01', 'Completed'),
(2, 4, 3, 'Simba', '2024-01-04', 'Completed'),
(3, 5, 1, 'Rocky', '2023-11-23', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `adoptionrequest`
--

CREATE TABLE `adoptionrequest` (
  `RequestId` int(20) NOT NULL,
  `QuestionnaireAnswers` varchar(100) NOT NULL,
  `QuestionnaireEligibility` enum('Eligible','Not eligible','','') NOT NULL,
  `RequestDate` date NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adoptionrequest`
--

INSERT INTO `adoptionrequest` (`RequestId`, `QuestionnaireAnswers`, `QuestionnaireEligibility`, `RequestDate`, `FullName`, `Email`) VALUES
(1, '1,1,1,1,1,1,1,1,1,1,1,1', 'Eligible', '2024-03-30', 'Sonam Sharma', 'sonamsharma@gmail.com'),
(2, '1,1,1,1,1,1,1,1,1,1,1,1', 'Eligible', '2024-03-30', 'Abhay Raj Dixit', 'dixitabhayraj2603@gmail.com'),
(3, '1,1,1,0,1,0,0,0,0,0,0,0', 'Not eligible', '2024-03-30', 'Sameeksha shrivastava', 'samshri@gmail.com'),
(6, '1,1,1,1,1,1,1,1,1,1,1,1', 'Eligible', '2024-03-31', 'Kratika bhadauria', 'kratikabhadauria6083@gmail.com'),
(7, '1,1,1,1,1,1,1,1,1,1,1,1', 'Eligible', '2024-04-01', 'Mahi Pandey', 'pandeymahi@gmail.com'),
(8, '1,1,1,1,1,1,1,1,1,1,1,1', 'Eligible', '2024-04-05', 'Riyans Bhadauria', 'bhadauriariyans@gmail.com'),
(9, '1,1,1,1,1,1,1,1,1,1,0,1', 'Eligible', '2024-04-07', 'Sofiya khan', 'sofiya13feb@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactId` int(20) NOT NULL,
  `FullName` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactId`, `FullName`, `Email`, `Message`) VALUES
(1, 'Sofiya Khan', 'sofiya13feb@gmail.com', 'adadd');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `DonationId` int(20) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(80) NOT NULL,
  `DonationAmount` int(50) NOT NULL,
  `DonationMethod` enum('Online','Cash','','') NOT NULL,
  `DonationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`DonationId`, `FullName`, `Email`, `Address`, `DonationAmount`, `DonationMethod`, `DonationDate`) VALUES
(1, 'Sofiya khan', 'sofiya13feb@gmail.com', 'CE-453, DD NAGAR', 1000, 'Online', '2024-04-01'),
(2, 'Kratika bhadauria', 'kratikabhadauria6083@gmail.com', 'CH-70, D.D.Nagar', 5000, 'Online', '2024-04-02'),
(3, 'Abhay Raj Dixit', 'dixitabhayraj2603@gmail.com', 'Padav,Gandhi-nagar, Gwalior', 4000, 'Online', '2024-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `inqquiry`
--

CREATE TABLE `inqquiry` (
  `InquiryId` int(11) NOT NULL,
  `Method` enum('Video Call','Audio Call','In person meet','Reviews from family and friends') NOT NULL,
  `InquiryDate` date NOT NULL,
  `Result` enum('Approved','Not Approved','Not sure','') NOT NULL,
  `SessionTalk` varchar(200) NOT NULL,
  `user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inqquiry`
--

INSERT INTO `inqquiry` (`InquiryId`, `Method`, `InquiryDate`, `Result`, `SessionTalk`, `user`) VALUES
(1, 'In person meet', '2024-04-06', 'Approved', 'During the conversation with the pet owner, I inquire about the well-being of their pet, ensuring they are adjusting well to their new home. I ask about any observations regarding the pet\'s behavior a', 2),
(2, 'Video Call', '2024-04-06', 'Approved', 'In the course of our conversation, I engage the pet owner in a discussion about their pet\'s daily routine and habits. I inquire about the pet\'s sleeping patterns, meal preferences, and any specific ac', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `PetId` int(11) NOT NULL,
  `PetName` varchar(50) NOT NULL,
  `Gender` enum('Male','Female','','') NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Description` varchar(80) NOT NULL,
  `AvailabilityStatus` enum('Available','Not Available','','') NOT NULL,
  `User` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`PetId`, `PetName`, `Gender`, `Type`, `Description`, `AvailabilityStatus`, `User`) VALUES
(1, 'Rocky', 'Male', 'Indian', 'Resilient, courageous, and loving couch potato', 'Available', 0),
(2, 'Monty', 'Male', 'Indie', 'Loyal canine companion', 'Available', 0),
(3, 'Simba', 'Female', 'Indie', 'Intelligence, and diverse roles as a companion, protector, and worker', 'Not Available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `UserId` int(200) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `FullName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `PhoneNumber` int(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`UserId`, `UserName`, `FullName`, `Password`, `PhoneNumber`, `Email`, `Address`) VALUES
(2, 'abc@', 'abcdeeff', 'addadada', 2147483647, 'sofiya13feb@gmail.co', 'Deen dayal nagar'),
(4, 'abrakadabra', 'KB', 'abcd', 2147483647, 'sofiya13feb@gmail.co', 'CE-453, DD NAGAR'),
(5, 'gusgf', 'sf', 'sgzzvu', 2147483647, 'sofiya13feb@gmail.co', 'CE-453, DD NAGAR'),
(6, 'Admin', 'ABC', '12345678', 2147483647, 'sofiya13feb@gmail.co', 'Deen dayal nagar'),
(7, 'AbhayR', 'Abhay Raj Dixit', '09090909', 2147483647, 'dixitabhayraj2603@gm', 'Gandhinagar, Padav, Gwalior');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptionhistory`
--
ALTER TABLE `adoptionhistory`
  ADD PRIMARY KEY (`AdoptionId`),
  ADD KEY `user_fk` (`User`),
  ADD KEY `pet_fk` (`Pet`);

--
-- Indexes for table `adoptionrequest`
--
ALTER TABLE `adoptionrequest`
  ADD PRIMARY KEY (`RequestId`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`DonationId`);

--
-- Indexes for table `inqquiry`
--
ALTER TABLE `inqquiry`
  ADD PRIMARY KEY (`InquiryId`),
  ADD KEY `user_id_fk` (`user`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`PetId`),
  ADD KEY `user_fk` (`User`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptionhistory`
--
ALTER TABLE `adoptionhistory`
  MODIFY `AdoptionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adoptionrequest`
--
ALTER TABLE `adoptionrequest`
  MODIFY `RequestId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `DonationId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `PetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `UserId` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoptionhistory`
--
ALTER TABLE `adoptionhistory`
  ADD CONSTRAINT `adoptionhistory_ibfk_1` FOREIGN KEY (`User`) REFERENCES `reg` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adoptionhistory_ibfk_2` FOREIGN KEY (`Pet`) REFERENCES `pet` (`PetId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inqquiry`
--
ALTER TABLE `inqquiry`
  ADD CONSTRAINT `inqquiry_ibfk_1` FOREIGN KEY (`user`) REFERENCES `reg` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
