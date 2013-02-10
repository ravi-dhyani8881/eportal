-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2013 at 05:14 PM
-- Server version: 5.5.14
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prijal`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `ADDRESS_ID` int(11) NOT NULL,
  `is_US_ADDRESS` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_street1` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ADDR_street2` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_street3` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_CITY` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ZIP_CD` varchar(28) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_STATE` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `WORK_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CELL_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ADDRESS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ADDRESS_ID`, `is_US_ADDRESS`, `ADDR_street1`, `ADDR_street2`, `ADDR_street3`, `ADDR_CITY`, `ZIP_CD`, `ADDR_STATE`, `WORK_PHONE`, `CELL_PHONE`) VALUES
(0, NULL, '213 Organizationnnn Streetas', '', '', 'baltimore', NULL, 'VA', '', ''),
(4, NULL, '123 any street', '', '', 'germantown', NULL, 'va', '111-111-1111', '222-222-2222'),
(5, NULL, '567 main street', '', '', 'baltimore', NULL, 'wv', '200-100-3000', '111-222-3333'),
(6, NULL, '5544 street', '', '', 'boyds', NULL, 'md', '222-444-5555', '111-222-3333'),
(9, NULL, 'd31 streeet ', '', '', 'germantown', NULL, 'md', '222-111-3333', '333-222-5555'),
(16, NULL, 'yyyyyy', '', '', 'fffff', '88888-8888', 'md', '(000) 000-0000', '(444) 444-4444'),
(17, NULL, '123 org stree', '', '', 'boyds', NULL, 'md', '00work', '00cell'),
(25, NULL, '123 p45 street', '', '', 'new city', NULL, 'VA', '111-111-1111', '222-111-2222'),
(29, NULL, '1234 main street', '', '', 'fairfax', NULL, 'VA', '571-212-5555', '202-111-2222'),
(32, NULL, '123 patient1 street', '', '', 'fairfax', NULL, 'VA', '111-222-3333', '222-111-4444'),
(35, NULL, '712 main street', '', '', 'falls church', NULL, 'VA', '', ''),
(39, NULL, '722 any street', '', '', 'new town', NULL, 'VA', '222-111-4444', '444-111-2222'),
(48, NULL, '610 orga street', '', '', 'boyds', NULL, 'md', '00work', '00cell'),
(49, NULL, '10 main street', '', '', 'boyds', NULL, 'md', '00work', '00cell'),
(58, NULL, '511 any street', '', '', 'any town', NULL, 'VA', '444-111-2222', '111-555-2222'),
(59, NULL, '512 main street', '', '', 'falls church', NULL, 'VA', '888-111-4444', '777-333-2222'),
(61, NULL, '333 main street', '', '', 'McLean', NULL, 'VA', '444-234-1234', '555-212-1212'),
(62, NULL, '522 any street', '', '', 'any town', NULL, 'VA', '212-555-1212', '555-121-1212'),
(64, NULL, '21 main street', '', '', 'boyds', NULL, 'md', '00work', '00cell'),
(66, NULL, '155 main street', '', '', 'falls church', NULL, 'va', '00work', '00cell'),
(69, NULL, '1432 Prince Edward Drive', '', '', 'Herndon', NULL, 'va', '00work', '00cell'),
(70, NULL, '8793 Rockledge Drive', '', '', 'Bethesda', NULL, 'md', '00work', '00cell'),
(73, NULL, '887 Stoney Ridge Way', '', '', 'Vienna', NULL, 'va', '00work', '00cell'),
(84, NULL, 'hggf', '', '', 'ghfhg', '44444-4444', 'md', '(444) 444-4444 x444', '(444) 444-4444'),
(167, NULL, 'hhg', '', '', 'vbbvbv', NULL, 'md', '00work', '00cell');

-- --------------------------------------------------------

--
-- Table structure for table `address_phone`
--

CREATE TABLE IF NOT EXISTS `address_phone` (
  `PHONE_ID` int(11) NOT NULL,
  `ADDRESS_ID` int(11) NOT NULL,
  `PHONE_TYPE_CD` smallint(6) NOT NULL,
  `PHONE_NUMBER` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PHONE_ID`),
  UNIQUE KEY `ADDRESS_PHONE_U1` (`ADDRESS_ID`,`PHONE_ID`),
  KEY `ADDRESS_PHONE_I1` (`PHONE_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address_phone`
--


-- --------------------------------------------------------

--
-- Table structure for table `doctor_patient`
--

CREATE TABLE IF NOT EXISTS `doctor_patient` (
  `STAFF_ID` int(11) NOT NULL,
  `PATIENT_ID` int(11) NOT NULL,
  PRIMARY KEY (`STAFF_ID`,`PATIENT_ID`),
  KEY `DOCTOR_PATIENT_FK2` (`PATIENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_patient`
--

INSERT INTO `doctor_patient` (`STAFF_ID`, `PATIENT_ID`) VALUES
(6, 8),
(7, 9),
(8, 11),
(8, 12),
(9, 13),
(9, 14),
(10, 15),
(10, 16),
(10, 17),
(11, 18),
(11, 19),
(11, 20),
(12, 21),
(12, 22),
(13, 23),
(13, 24),
(14, 25),
(14, 26),
(15, 27),
(15, 28),
(17, 29),
(18, 30),
(18, 31),
(19, 32),
(19, 33),
(20, 34),
(21, 42);

-- --------------------------------------------------------

--
-- Table structure for table `dr_patient_refrl`
--

CREATE TABLE IF NOT EXISTS `dr_patient_refrl` (
  `REFERRAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STAFF_ID` int(11) NOT NULL,
  `PATIENT_ID` int(11) NOT NULL,
  `RFRNG_STATUS_CD` smallint(6) DEFAULT NULL,
  `RFRNG_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TESTS_TO_PERFORM_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SPCL_INST_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OTHER_COMMENTS_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RFRD_STAFF_ID` int(11) NOT NULL,
  `RFRD_STATUS_CD` smallint(6) DEFAULT NULL,
  `RFRD_DATE` date DEFAULT NULL,
  `RFRD_RESULTS_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RFRD_COMMENTS_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RFRD_RECMMD_TRMT_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `APPOINTMENT_DATE` date DEFAULT NULL,
  PRIMARY KEY (`REFERRAL_ID`),
  KEY `DR_PATIENT_REFRL_FK1` (`STAFF_ID`,`PATIENT_ID`),
  KEY `DR_PATIENT_REFRL_FK2` (`RFRNG_STATUS_CD`),
  KEY `DR_PATIENT_REFRL_FK3` (`RFRD_STAFF_ID`),
  KEY `DR_PATIENT_REFRL_FK4` (`RFRD_STATUS_CD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `dr_patient_refrl`
--

INSERT INTO `dr_patient_refrl` (`REFERRAL_ID`, `STAFF_ID`, `PATIENT_ID`, `RFRNG_STATUS_CD`, `RFRNG_DATE`, `TESTS_TO_PERFORM_TXT`, `SPCL_INST_TXT`, `OTHER_COMMENTS_TXT`, `RFRD_STAFF_ID`, `RFRD_STATUS_CD`, `RFRD_DATE`, `RFRD_RESULTS_TXT`, `RFRD_COMMENTS_TXT`, `RFRD_RECMMD_TRMT_TXT`, `APPOINTMENT_DATE`) VALUES
(1, 9, 13, 1, NULL, 'tests - two', 'instructions - two', 'comments - two', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 9, 13, 2, NULL, 'doctor 48 tests', 'doctor 48 instructions', 'doctor 48 comments', 8, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 9, 14, 1, NULL, 'doctor 41 - tests', 'doctor 41 - instructions', 'doctor 41 - commetns', 7, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 9, 13, 2, NULL, 'd33 - test', 'd33 - instr', 'd33 - comments', 4, 3, NULL, NULL, NULL, NULL, NULL),
(5, 11, 19, 2, NULL, 'test for 723', 'instr for 723', 'comments for 723', 10, 3, NULL, NULL, NULL, NULL, NULL),
(6, 11, 20, 2, NULL, 'p724 - test', 'p724 - instructions', 'p724 - comments', 10, 3, NULL, NULL, NULL, NULL, NULL),
(7, 10, 15, 2, NULL, '712 test', '712 instructions', '712 comments', 11, 3, NULL, NULL, NULL, NULL, NULL),
(8, 10, 16, 2, NULL, '713 tests', '713 instructions', '713 comments', 11, 3, NULL, NULL, NULL, NULL, NULL),
(9, 13, 23, 2, NULL, 'p822 test', 'p822 instructions', 'p8222 comments', 12, 3, NULL, NULL, NULL, NULL, NULL),
(10, 14, 25, 2, NULL, 'tests for patient 511', 'instr for 511', 'comments for 511', 15, 3, NULL, NULL, NULL, NULL, NULL),
(11, 14, 26, 2, NULL, '512 tests', '512 instructions', '512 comments', 15, 3, NULL, NULL, NULL, NULL, NULL),
(12, 10, 15, 2, '2012-12-12 03:22:22', 'dsaaf', 'gadsgsa', 'gadsgsadg', 2, 3, NULL, NULL, NULL, NULL, NULL),
(13, 10, 15, 2, '2012-12-12 05:56:08', 'dgag', 'gadsga', 'sgsadgwdag', 11, 3, NULL, '\r\ntest results added', 'comments - added', NULL, NULL),
(14, 11, 18, 2, '2012-12-12 04:27:44', 'vdfa', 'qgasdgad', 'dsfgfdsfhsj', 2, 3, NULL, NULL, NULL, NULL, NULL),
(15, 17, 29, 2, '2012-12-12 15:50:08', 'test for pd15', 'instr for pd15', 'comments for pd15', 10, 3, NULL, NULL, NULL, NULL, NULL),
(16, 17, 29, 2, '2012-12-12 15:50:55', 'csdfcsda', 'fdsag', 'sddeg', 2, 3, NULL, NULL, NULL, NULL, NULL),
(17, 17, 29, 2, '2012-12-12 15:56:52', 'burke patient tests', 'burke patient instr', 'burke patient comments', 11, 3, NULL, NULL, NULL, NULL, NULL),
(18, 18, 30, 2, '2012-12-12 17:59:28', 'jdoe - blood, sugar', 'has high bp', 'weekend preferred', 19, 3, NULL, NULL, NULL, NULL, NULL),
(19, 18, 31, 2, '2012-12-12 18:00:54', 'jsmith - cholestrol', 'no instructions', 'call for scheduling', 20, 3, NULL, NULL, NULL, NULL, NULL),
(20, 19, 33, 2, '2012-12-12 18:03:46', 'yearly follow up', 'none', 'needs 1 week notice', 20, 3, NULL, NULL, NULL, NULL, NULL),
(21, 19, 33, 2, '2012-12-12 18:04:28', 'quarterly checkup', 'special diet', 'none', 18, 3, NULL, NULL, NULL, NULL, NULL),
(22, 19, 32, 2, '2012-12-12 18:05:33', 'sugar', 'needs to fast', 'call for scheduling', 20, 3, NULL, NULL, NULL, NULL, NULL),
(23, 20, 34, 2, '2012-12-12 18:08:12', 'mk - standard tests', 'needs assistance', 'send results in two weeks', 18, 3, NULL, NULL, NULL, NULL, NULL),
(27, 21, 42, 2, '2013-02-10 22:14:40', 'sugar\r\n                                    ', 'done \r\n    \r\n                                    ', 'done2\r\n    \r\n                                    ', 20, 3, NULL, NULL, NULL, NULL, NULL),
(28, 21, 42, 2, '2013-02-10 22:19:33', '\r\n    \r\n         dentaj                           ', 'see heart beat\r\n    \r\n                                    ', 'no\r\n    \r\n                                    ', 9, 3, NULL, NULL, NULL, NULL, NULL),
(29, 21, 42, 1, '2013-02-10 22:20:10', '\r\n    \r\n                                    ', '\r\n    \r\n                                    ', '\r\n    \r\n                                    ', 6, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dr_refrl_template`
--

CREATE TABLE IF NOT EXISTS `dr_refrl_template` (
  `TEMPLATE_ID` int(11) NOT NULL,
  `STAFF_ID` int(11) NOT NULL,
  `INFO_REQUIRED` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `PRACTICE_COL2` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TEMPLATE_ID`),
  KEY `DR_REFRL_TEMPLATE_FK1` (`STAFF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dr_refrl_template`
--


-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `ORG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `ORG_NAME` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ORG_TYPE_CD` smallint(6) DEFAULT NULL,
  `WEBSITE_URL` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PARENT_ORG_ID` int(11) DEFAULT NULL,
  `CREATED_DTTM` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CREATED_BY` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UPDATED_DTTM` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `UPDATED_BY` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORG_EMAIL` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ORG_ID`),
  UNIQUE KEY `ORGANIZATION_U1` (`ORG_NAME`),
  KEY `ORGANIZATION_I1` (`ORG_TYPE_CD`),
  KEY `ORGANIZATION_I2` (`PARENT_ORG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`ORG_ID`, `ACCOUNT_ID`, `ORG_NAME`, `ORG_TYPE_CD`, `WEBSITE_URL`, `PARENT_ORG_ID`, `CREATED_DTTM`, `CREATED_BY`, `UPDATED_DTTM`, `UPDATED_BY`, `ORG_EMAIL`) VALUES
(0, 16, 'yyyyyyyyyyyy', NULL, 'dhhhhh', NULL, '2013-02-10 10:55:07', NULL, '0000-00-00 00:00:00', NULL, 'ssssssss'),
(1, 17, 'o2-OrganizationName', NULL, NULL, NULL, '2012-12-02 04:06:50', NULL, '0000-00-00 00:00:00', NULL, NULL),
(2, 0, 'o3-Organizatoin', NULL, NULL, NULL, '2012-12-08 18:02:22', NULL, '0000-00-00 00:00:00', NULL, NULL),
(3, 0, '4-OrganizationName', NULL, NULL, NULL, '2012-12-08 18:06:37', NULL, '0000-00-00 00:00:00', NULL, NULL),
(4, 0, 'o5-OrganizationName', NULL, NULL, NULL, '2012-12-08 18:17:11', NULL, '0000-00-00 00:00:00', NULL, NULL),
(5, 0, 'o9-OrganizationName', NULL, NULL, NULL, '2012-12-08 18:24:04', NULL, '0000-00-00 00:00:00', NULL, NULL),
(7, 49, 'o10-OrganizationName', NULL, NULL, NULL, '2012-12-08 18:28:14', NULL, '0000-00-00 00:00:00', NULL, NULL),
(9, 64, 'Organization 21', NULL, NULL, NULL, '2012-12-12 08:39:38', NULL, '0000-00-00 00:00:00', NULL, NULL),
(10, 66, 'New Organization', NULL, NULL, NULL, '2012-12-12 15:45:36', NULL, '0000-00-00 00:00:00', NULL, NULL),
(11, 69, 'Doctors Medical Group', NULL, NULL, NULL, '2012-12-12 16:19:46', NULL, '0000-00-00 00:00:00', NULL, NULL),
(12, 70, 'Captial Womens Care', NULL, NULL, NULL, '2012-12-12 16:20:46', NULL, '0000-00-00 00:00:00', NULL, NULL),
(13, 73, 'Medical Practice of NOVA', NULL, NULL, NULL, '2012-12-12 17:31:12', NULL, '0000-00-00 00:00:00', NULL, NULL),
(19, 84, 'ravi raj', NULL, 'yahoo.com', NULL, '2013-02-10 20:37:38', NULL, '0000-00-00 00:00:00', NULL, 'ravi_happy28@yahoo.co.in');

-- --------------------------------------------------------

--
-- Table structure for table `org_address`
--

CREATE TABLE IF NOT EXISTS `org_address` (
  `ADDRESS_ID` int(11) NOT NULL,
  `ADDRESS_TYPE_CD` smallint(6) NOT NULL,
  `ORG_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ADDRESS_ID`,`ADDRESS_TYPE_CD`),
  KEY `ORG_ADDRESS_I1` (`ORG_ID`),
  KEY `ORG_ADDRESS_FK3` (`ADDRESS_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `org_address`
--


-- --------------------------------------------------------

--
-- Table structure for table `org_service`
--

CREATE TABLE IF NOT EXISTS `org_service` (
  `ORG_ID` int(11) NOT NULL,
  `SERVICE_TYPE_CD` smallint(6) NOT NULL,
  PRIMARY KEY (`ORG_ID`,`SERVICE_TYPE_CD`),
  KEY `ORG_SERVICE_FK2` (`SERVICE_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `org_service`
--


-- --------------------------------------------------------

--
-- Table structure for table `org_staff`
--

CREATE TABLE IF NOT EXISTS `org_staff` (
  `STAFF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORG_ID` int(11) DEFAULT NULL,
  `ORG_NAME` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STAFF_TYPE_CD` smallint(6) DEFAULT NULL,
  `SPCLTY_TYPE_CD` smallint(6) DEFAULT NULL,
  `SPECIALTY` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LAST_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MIDDLE_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FIRST_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GENDER` varchar(16) COLLATE utf8_unicode_ci DEFAULT 'M',
  `EMAIL_ADDRESS` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WORK_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CELL_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTIFICATION_PRE` varchar(16) COLLATE utf8_unicode_ci DEFAULT 'E',
  `ACCOUNT_ID` int(11) NOT NULL,
  PRIMARY KEY (`STAFF_ID`),
  UNIQUE KEY `ORG_STAFF_U1` (`ACCOUNT_ID`),
  KEY `ORG_STAFF_FK1` (`ORG_ID`),
  KEY `ORG_STAFF_FK2` (`STAFF_TYPE_CD`),
  KEY `ORG_STAFF_FK3` (`SPCLTY_TYPE_CD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `org_staff`
--

INSERT INTO `org_staff` (`STAFF_ID`, `ORG_ID`, `ORG_NAME`, `STAFF_TYPE_CD`, `SPCLTY_TYPE_CD`, `SPECIALTY`, `LAST_NAME`, `MIDDLE_NAME`, `FIRST_NAME`, `GENDER`, `EMAIL_ADDRESS`, `WORK_PHONE`, `CELL_PHONE`, `NOTIFICATION_PRE`, `ACCOUNT_ID`) VALUES
(2, NULL, '4-OrganizationName', NULL, 2, 'skin', 's1LN', 'dhyani', 's1FN', 'F', 'ravi@gmail.com', '(344) 444-4444 x4444', '(122) 222-2222', 'E', 3),
(4, NULL, NULL, NULL, NULL, NULL, 'd33-ln', '', 'd33-fn', '', 'dsafaskj@df.com', '333-333-2222', NULL, 'E', 11),
(6, NULL, 'o2-OrganizationName', NULL, NULL, 'Cardiology', 'd35-ln', '', 'd35-fn', '', 'd35@test.com', '000-111-222', '222-111-2222', 'E', 18),
(7, NULL, 'o2-OrganizationName', NULL, NULL, 'Dental', 'd41-ln', '', 'd41-fn', '', 'd41email@test.com', '111-111-1111', '222-222-2233', 'E', 23),
(8, NULL, NULL, NULL, 5, NULL, 'd48-ln', '', 'd48-fn', '', 'd48test@test.com', '222-111-3333', '222-333-1111', 'E', 27),
(9, NULL, NULL, NULL, 4, NULL, 'd60-ln', '', 'd60-fn', '', 'd60test@test.com', '555-111-2222', '333-222-1111', 'E', 31),
(10, NULL, '4-OrganizationName', NULL, 3, NULL, 'd71-ln', '', 'd71-fn', '', 'd71test@test.com', '710-111-7777', '017-111-8888', 'E', 34),
(11, NULL, 'o3-Organizatoin', NULL, 1, NULL, 'd72-ln', '', 'd72-fn', '', 'd72test@test.com', '702-222-3333', '702-555-3333', 'E', 38),
(12, NULL, NULL, NULL, 3, NULL, 'd81-ln', '', 'd81-fn', '', 'd81test@test.com', '222-111-3333', '111-222-3333', 'E', 50),
(13, NULL, NULL, NULL, 1, NULL, 'd82-ln', '', 'd82-fn', '', 'd82@test.com', '555-111-222', '555-222-333', 'E', 53),
(14, NULL, NULL, NULL, 3, NULL, 'd51-ln', '', 'd51-fn', '', 'd51@test.com', '111-222-3333', '222-111-4444', 'E', 57),
(15, NULL, NULL, NULL, 1, NULL, 'd52-ln', '', 'd52-fn', '', 'd52@test.com', '555-234-1111', '212-111-2222', 'E', 60),
(16, NULL, 'o10-OrganizationName', NULL, 2, NULL, 'd101-ln', '', 'd101-fn', '', 'd101@test.com', '222-111-2222', '111-222-3333', 'E', 63),
(17, NULL, 'New Organization', NULL, 2, NULL, 'd15-ln', '', 'd15-fn', '', 'd15@test.com', '151-155-5555', '151-212-5555', 'E', 67),
(18, NULL, 'Doctors Medical Group', NULL, 3, NULL, 'Elizabeth', '', 'Merzer', '', 'emerzer@dmg.com', '202-393-9990', '', 'E', 71),
(19, NULL, 'Captial Womens Care', NULL, 8, NULL, 'Houser', '', 'Jane', '', 'jhouser@cwc.com', '301-778-0998', '', 'E', 72),
(20, NULL, 'Medical Practice of NOVA', NULL, 1, NULL, 'Camp', '', 'John', '', 'jcamp@mmpnova.com', '703-886-7775', '', 'E', 74),
(21, NULL, '4-OrganizationName', NULL, 4, NULL, 'dhyani', 'ghfghfgh', 'anand', 'M', 'ravi_happy28@yahoo.co.in', '(199) 999-9999 x99999', '(666) 666-6666', 'E', 83);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `PATIENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LAST_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MIDDLE_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FIRST_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MEDICAL_HISTORY_ID` int(11) DEFAULT NULL,
  `ALLERGY_ID` int(11) DEFAULT NULL,
  `EMAIL_ADDRESS` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GENDER_CD` smallint(6) DEFAULT NULL,
  `DATE_OF_BIRTH` date DEFAULT NULL,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `ADDR_street1` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_CITY` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_STATE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ZIP_CD` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WORK_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CELL_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PATIENT_ID`),
  UNIQUE KEY `PATIENT_U1` (`ACCOUNT_ID`),
  KEY `PATIENT_FK1` (`GENDER_CD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PATIENT_ID`, `LAST_NAME`, `MIDDLE_NAME`, `FIRST_NAME`, `MEDICAL_HISTORY_ID`, `ALLERGY_ID`, `EMAIL_ADDRESS`, `GENDER_CD`, `DATE_OF_BIRTH`, `ACCOUNT_ID`, `ADDR_street1`, `ADDR_CITY`, `ADDR_STATE`, `ZIP_CD`, `WORK_PHONE`, `CELL_PHONE`) VALUES
(1, 'dhyani', 'raj', 'ravi', NULL, NULL, 'ravi.dhyani8881@gmail.com', 2, NULL, 1, 'hhhhhhhhh', 'newyork', '', '14700-01', '(017) 222-8582 x1', '(805) 429-9282'),
(3, 'newtest-ln', '', 'newtest-fn', NULL, NULL, 'sdafa@afda.com', NULL, NULL, 6, '', '', '', '0', '', ''),
(4, 'd30-ln', '', 'd30-fn', NULL, NULL, 'd30-patient@test.com', NULL, NULL, 8, '', '', '', '0', '', ''),
(5, 'd31-ln', '', 'd31-fn', NULL, NULL, 'd31email@test.com', NULL, NULL, 9, '', '', '', '0', '', ''),
(6, 'd33-patient-ln', '', 'd33-patient-fn', NULL, NULL, 'd33-pateint@test..com', NULL, NULL, 12, '', '', '', '0', '', ''),
(7, 'd33-newpatient-ln', '', 'd33-newpatient-fn', NULL, NULL, 'newpatient@test.com', NULL, NULL, 14, '', '', '', '0', '', ''),
(8, 'd35-patient-ln', '', 'd35-patient-fn', NULL, NULL, 'd35-pat@test.com', NULL, NULL, 19, '', '', '', '0', '', ''),
(9, 'd41-patient-ln', '', 'd41-patient-fn', NULL, NULL, 'd41patient@test41.com', NULL, NULL, 24, '', '', '', '0', '', ''),
(10, 'p45-ln-new', '', 'p45-fn-new', NULL, NULL, 'p45email@test.com', NULL, NULL, 25, '', '', '', '0', '', ''),
(11, 'patient-d48-ln', '', 'pateint-d48-fn', NULL, NULL, 'p48@test.com', NULL, NULL, 28, '', '', '', '0', '', ''),
(12, 'Test-d48P-LastName', '', 'Test-d48P-FirstName', NULL, NULL, 'testd48p@test.com', NULL, NULL, 29, '', '', '', '0', '', ''),
(13, 'd60patient1-ln', '', 'd60patient-fn', NULL, NULL, 'd60patient1@test.com', NULL, NULL, 32, '', '', '', '0', '', ''),
(14, 'd60patient2-ln', '', 'd60patient2-fn', NULL, NULL, 'd60patient2@test.com', NULL, NULL, 33, '', '', '', '0', '', ''),
(15, 'p712-ln', '', 'p712-fn', NULL, NULL, 'p712@test.com', NULL, NULL, 35, '', '', '', '0', '', ''),
(16, 'p713-ln', '', 'p713-fn', NULL, NULL, 'p713@test.com', NULL, NULL, 36, '', '', '', '0', '', ''),
(17, 'p714-ln', '', 'p714-fn', NULL, NULL, 'p714@test.com', NULL, NULL, 37, '', '', '', '0', '', ''),
(18, 'p722-ln', '', 'p722-fn', NULL, NULL, 'p722@test.com', NULL, NULL, 39, '', '', '', '0', '', ''),
(19, 'p723-ln', '', 'p723-fn', NULL, NULL, 'p723@test.com', NULL, NULL, 40, '', '', '', '0', '', ''),
(20, 'p724-ln', '', 'p724-fn', NULL, NULL, 'p724@test.com', NULL, NULL, 41, '', '', '', '0', '', ''),
(21, 'p-d812-ln', '', 'p-d812-fn', NULL, NULL, 'p812@test.com', NULL, NULL, 51, '', '', '', '0', '', ''),
(22, 'p-d813-ln', '', 'p-d813-fn', NULL, NULL, 'p813@test.com', NULL, NULL, 52, '', '', '', '0', '', ''),
(23, 'p-d822-ln', '', 'p-d822-fn', NULL, NULL, 'p822@test.com', NULL, NULL, 54, '', '', '', '0', '', ''),
(24, 'p-d823-ln', '', 'p-d823-fn', NULL, NULL, 'p823@test.com', NULL, NULL, 55, '', '', '', '0', '', ''),
(25, 'p511-ln', '', 'p511-fn', NULL, NULL, 'p511@test.com', NULL, NULL, 58, '', '', '', '0', '', ''),
(26, 'p512-ln', '', 'p512-fn', NULL, NULL, 'p512@test.com', NULL, NULL, 59, '', '', '', '0', '', ''),
(27, 'p521-ln', '', 'p521-fn', NULL, NULL, 'p521@test.com', NULL, NULL, 61, '', '', '', '0', '', ''),
(28, 'p522-ln', '', 'p522-fn', NULL, NULL, 'p522@test.com', NULL, NULL, 62, '', '', '', '0', '', ''),
(29, 'p-d15-ln', '', 'p-d15-fn', NULL, NULL, 'p-d15@test.com', NULL, NULL, 68, '', '', '', '0', '', ''),
(30, 'Doe', '', 'John', NULL, NULL, 'jdoe@test.com', NULL, NULL, 75, '', '', '', '0', '', ''),
(31, 'Smith', '', 'Jane', NULL, NULL, 'jsmith@test.com', NULL, NULL, 76, '', '', '', '0', '', ''),
(32, 'Long', '', 'Mike', NULL, NULL, 'mlong@test.com', NULL, NULL, 77, '', '', '', '0', '', ''),
(33, 'Nguyen', '', 'James', NULL, NULL, 'jnguyen@test.com', NULL, NULL, 78, '', '', '', '0', '', ''),
(34, 'Kaiser', '', 'Michael', NULL, NULL, 'mkaiser@test.com', NULL, NULL, 79, '', '', '', '0', '', ''),
(42, 'dhyani', NULL, 'ravi', NULL, NULL, 'ravi8881', NULL, NULL, 89, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_address`
--

CREATE TABLE IF NOT EXISTS `patient_address` (
  `ADDRESS_ID` int(11) NOT NULL,
  `ADDRESS_TYPE_CD` smallint(6) NOT NULL,
  `PATIENT_ID` int(11) NOT NULL,
  PRIMARY KEY (`ADDRESS_ID`,`ADDRESS_TYPE_CD`),
  KEY `PAT_ADDRESS_FK2` (`ADDRESS_TYPE_CD`),
  KEY `PAT_ADDRESS_FK3` (`PATIENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient_address`
--


-- --------------------------------------------------------

--
-- Table structure for table `rf_address_type`
--

CREATE TABLE IF NOT EXISTS `rf_address_type` (
  `ADDRESS_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ADDRESS_TYPE_CD`),
  UNIQUE KEY `U1_RF_ADDRESS_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_address_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `rf_gender`
--

CREATE TABLE IF NOT EXISTS `rf_gender` (
  `GENDER_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`GENDER_CD`),
  UNIQUE KEY `U1_RF_GENDER` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_gender`
--

INSERT INTO `rf_gender` (`GENDER_CD`, `DESCRIPTION`) VALUES
(2, 'Female'),
(1, 'Male'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `rf_org_type`
--

CREATE TABLE IF NOT EXISTS `rf_org_type` (
  `ORG_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ORG_TYPE_CD`),
  UNIQUE KEY `U1_RF_ORG_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_org_type`
--

INSERT INTO `rf_org_type` (`ORG_TYPE_CD`, `DESCRIPTION`) VALUES
(1, 'Hospital'),
(3, 'Insurance Company'),
(4, 'Laboratory'),
(2, 'Specialty');

-- --------------------------------------------------------

--
-- Table structure for table `rf_phone_type`
--

CREATE TABLE IF NOT EXISTS `rf_phone_type` (
  `PHONE_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`PHONE_TYPE_CD`),
  UNIQUE KEY `U1_RF_PHONE_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_phone_type`
--

INSERT INTO `rf_phone_type` (`PHONE_TYPE_CD`, `DESCRIPTION`) VALUES
(8, 'Assistance Overseas'),
(3, 'Cell'),
(1, 'Customer Service'),
(7, 'Mail Service Pharmacy'),
(5, 'Mental Health/Substance Abuse Pr'),
(9, 'Other'),
(4, 'Precertification'),
(6, 'Retail Service Pharmacy'),
(2, 'Work');

-- --------------------------------------------------------

--
-- Table structure for table `rf_rfrl_status`
--

CREATE TABLE IF NOT EXISTS `rf_rfrl_status` (
  `RFRL_STATUS_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`RFRL_STATUS_CD`),
  UNIQUE KEY `U1_RF_RFRL_STATUS` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_rfrl_status`
--

INSERT INTO `rf_rfrl_status` (`RFRL_STATUS_CD`, `DESCRIPTION`) VALUES
(5, 'Appointment Set'),
(6, 'Closed'),
(1, 'Pending'),
(3, 'Received'),
(2, 'Sent'),
(4, 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `rf_service_type`
--

CREATE TABLE IF NOT EXISTS `rf_service_type` (
  `SERVICE_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SERVICE_TYPE_CD`),
  UNIQUE KEY `U1_RF_SERVICE_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_service_type`
--

INSERT INTO `rf_service_type` (`SERVICE_TYPE_CD`, `DESCRIPTION`) VALUES
(2, 'EKG'),
(3, 'MRI'),
(4, 'Stress Test'),
(1, 'X-RAY');

-- --------------------------------------------------------

--
-- Table structure for table `rf_spclty_type`
--

CREATE TABLE IF NOT EXISTS `rf_spclty_type` (
  `SPCLTY_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SPCLTY_TYPE_CD`),
  UNIQUE KEY `U1_RF_SPCLTY_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_spclty_type`
--

INSERT INTO `rf_spclty_type` (`SPCLTY_TYPE_CD`, `DESCRIPTION`) VALUES
(2, 'Allergy'),
(3, 'Cardiology'),
(4, 'Dental'),
(5, 'Dermatology'),
(6, 'Endocrinology'),
(7, 'Gastroenterology'),
(8, 'Gynecology'),
(1, 'Internal Medicine'),
(15, 'Nephrology'),
(9, 'Oncology'),
(10, 'Ophthalmology'),
(11, 'Orthopedics'),
(12, 'Physiatrist'),
(13, 'Podiatrist'),
(14, 'Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `rf_staff_type`
--

CREATE TABLE IF NOT EXISTS `rf_staff_type` (
  `STAFF_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`STAFF_TYPE_CD`),
  UNIQUE KEY `U1_RF_STAFF_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_staff_type`
--

INSERT INTO `rf_staff_type` (`STAFF_TYPE_CD`, `DESCRIPTION`) VALUES
(3, 'Administrator'),
(7, 'Doctor'),
(4, 'Head Nurse'),
(6, 'Lab Technician'),
(1, 'Main'),
(5, 'Nurse'),
(8, 'Other'),
(2, 'Primary Contact'),
(99, 'System Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `rf_state`
--

CREATE TABLE IF NOT EXISTS `rf_state` (
  `state_cd` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_descr` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_state`
--

INSERT INTO `rf_state` (`state_cd`, `state_descr`) VALUES
('VA', 'Virginia'),
('MD', 'Maryland'),
('WV', 'West Virginia');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_TYPE` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `LOGIN_ID` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CHALLENGE_Q1` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ANSWER_1` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `CHALLENGE_Q2` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ANSWER_2` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `CHALLENGE_Q3` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ANSWER_3` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ACCOUNT_ID`),
  UNIQUE KEY `USER_ACCOUNT_U1` (`LOGIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=90 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`ACCOUNT_ID`, `ACCOUNT_TYPE`, `LOGIN_ID`, `PASSWORD`, `CHALLENGE_Q1`, `ANSWER_1`, `CHALLENGE_Q2`, `ANSWER_2`, `CHALLENGE_Q3`, `ANSWER_3`) VALUES
(1, 'patient', 'a1', '63dd3e154ca6d948fc380fa576343ba6', '', '', '', '', '', ''),
(2, 'staff', 's1', '63dd3e154ca6d948fc380fa576343ba6', '', '', '', '', '', ''),
(3, 'staff', 's2', '63dd3e154ca6d948fc380fa576343ba6', '', '', '', '', '', ''),
(4, 'patient', 'patient2', '63dd3e154ca6d948fc380fa576343ba6', '', '', '', '', '', ''),
(5, 'patient', 'patient5', 'ec151e9561bbc6ba', '', '', '', '', '', ''),
(6, 'patient', 'newtest', '0876b6b0db0707db', '', '', '', '', '', ''),
(7, 'staff', 'doctor30', '57ac5f96fd9bc409', '', '', '', '', '', ''),
(8, 'patient', 'd30-patient@test.com', '1f46fe44bf19c91f', '', '', '', '', '', ''),
(9, 'patient', 'doctor31', 'a153cf2d4dcff8c2', '', '', '', '', '', ''),
(10, 'staff', 'd32', 'b4d7fcb1aac27e05', '', '', '', '', '', ''),
(11, 'staff', 'd33', '408e78f25cd0b317', '', '', '', '', '', ''),
(12, 'patient', 'd33-pateint@test..com', '8517c25ffff82d0c', '', '', '', '', '', ''),
(13, 'patient', '', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(14, 'patient', 'newpatient@test.com', 'a3a1515805dc095d', '', '', '', '', '', ''),
(15, 'staff', 'd34', 'd0f3dc437da6e631', '', '', '', '', '', ''),
(16, 'organization', 'o1', '63dd3e154ca6d948fc380fa576343ba6', '', '', '', '', '', ''),
(17, 'organization', 'o2', '2d387ab98437e5f5', '', '', '', '', '', ''),
(18, 'staff', 'd35', 'de000668f8becda6', '', '', '', '', '', ''),
(19, 'patient', 'd35-pat@test.com', 'de000668f8becda6', '', '', '', '', '', ''),
(20, 'organization', 'o3', '417c4fa3b4135a6c', '', '', '', '', '', ''),
(21, 'staff', 'd36', '85ef939c6c3ff396', '', '', '', '', '', ''),
(22, 'staff', 'd40', '31ed63ae87c44e83', '', '', '', '', '', ''),
(23, 'staff', 'd41', 'deb3292f208a7e5b', '', '', '', '', '', ''),
(24, 'patient', 'd41patient@test41.com', '2ab3f69cd5e446d6', '', '', '', '', '', ''),
(25, 'patient', 'p45', 'b56abada5090ed5a', '', '', '', '', '', ''),
(26, 'staff', 'd46', '119f7f00d4188a58', '', '', '', '', '', ''),
(27, 'staff', 'd48', '88a9c54b00c85f6d', '', '', '', '', '', ''),
(28, 'patient', 'p48@test.com', '24c158d68994dbc4', '', '', '', '', '', ''),
(29, 'patient', 'testd48p@test.com', 'ccd936700304ba91', '', '', '', '', '', ''),
(30, 'organization', 'TieWater', 'cefb757a9b5b2426', '', '', '', '', '', ''),
(31, 'staff', 'd60', '7ea38a238a11ae60', '', '', '', '', '', ''),
(32, 'patient', 'd60patient1@test.com', '7bb982a553468863', '', '', '', '', '', ''),
(33, 'patient', 'd60patient2@test.com', '4a4ea568e1b911e4', '', '', '', '', '', ''),
(34, 'staff', 'd71', '81d11c21f282d6d9', '', '', '', '', '', ''),
(35, 'patient', 'p712@test.com', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(36, 'patient', 'p713@test.com', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(37, 'patient', 'p714@test.com', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(38, 'staff', 'd72', 'd7624a07bef79868', '', '', '', '', '', ''),
(39, 'patient', 'p722@test.com', '406754db5f1e9c31', '', '', '', '', '', ''),
(40, 'patient', 'p723@test.com', 'f43474fa30c477d4', '', '', '', '', '', ''),
(41, 'patient', 'p724@test.com', '19a4ab28ab132131', '', '', '', '', '', ''),
(45, 'organization', 'o4', '500dbb501d3577b1', '', '', '', '', '', ''),
(46, 'organization', 'o5', '46fa5a234958dba5', '', '', '', '', '', ''),
(47, 'organization', 'o6', '39d987fd8304752b', '', '', '', '', '', ''),
(48, 'organization', 'o9', 'ab0fd361fde5c362', '', '', '', '', '', ''),
(49, 'organization', 'o10', 'd98801486a65c815', '', '', '', '', '', ''),
(50, 'staff', 'd81', 'ec46ecd7201b284b', '', '', '', '', '', ''),
(51, 'patient', 'p812@test.com', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(52, 'patient', 'p813@test.com', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(53, 'staff', 'd82', '1f7f31128359ac99', '', '', '', '', '', ''),
(54, 'patient', 'p822@test.com', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(55, 'patient', 'p823@test.com', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(57, 'staff', 'd51', '751145ad37c5e8dc', '', '', '', '', '', ''),
(58, 'patient', 'p511@test.com', '44494ac80912fe36', '', '', '', '', '', ''),
(59, 'patient', 'p512@test.com', '09b7600a6bc65ca2', '', '', '', '', '', ''),
(60, 'staff', 'd52', 'b2eaa5f4f4079e25', '', '', '', '', '', ''),
(61, 'patient', 'p521@test.com', '569056c1355ca983', '', '', '', '', '', ''),
(62, 'patient', 'p522@test.com', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(63, 'staff', 'd101', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(64, 'organization', 'o21', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(65, 'patient', 'o15', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(66, 'organization', '15', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(67, 'staff', 'd15', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(68, 'patient', 'p-d15@test.com', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(69, 'organization', 'dmg', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(70, 'organization', 'cwc', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(71, 'staff', 'emerzer', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(72, 'staff', 'jhouser', '261f3391b7a77b05', '', '', '', '', '', ''),
(73, 'organization', 'mpnova', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(74, 'staff', 'jcamp', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(75, 'patient', 'jdoe@test.com', 'a31405d272b94e5d', '', '', '', '', '', ''),
(76, 'patient', 'jsmith@test.com', '39ce7e2a8573b41c', '', '', '', '', '', ''),
(77, 'patient', 'mlong@test.com', '5f7096ae10fde8bd', '', '', '', '', '', ''),
(78, 'patient', 'jnguyen@test.com', 'c385ac8b3709e26d', '', '', '', '', '', ''),
(79, 'patient', 'mkaiser@test.com', 'a51a20c8b96b381b', '', '', '', '', '', ''),
(80, 'patient', 'sgupta@test.com', 'e04c70c7fd696d34', '', '', '', '', '', ''),
(81, 'patient', 'ravi', '719106471f92313b71a249c36f9b2d17', '', '', '', '', '', ''),
(82, 'patient', 'raviraj', 'bb84d91cc6b0eafdbff085f3d7ec9277', '', '', '', '', '', ''),
(83, 'staff', 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992', '', '', '', '', '', ''),
(84, 'organization', 'organization', 'bb84d91cc6b0eafdbff085f3d7ec9277', '', '', '', '', '', ''),
(85, 'patient', 'ravi_happy28@yahoo.co.in', 'ff2f24f8b6d253bb5a8bc55728ca7372', '', '', '', '', '', ''),
(86, 'patient', 'ravi.dhyani8881@gmail.com', 'ff2f24f8b6d253bb5a8bc55728ca7372', '', '', '', '', '', ''),
(87, 'patient', 'jjjj', '3abf00fa61bfae2fff9133375e142416', '', '', '', '', '', ''),
(89, 'patient', 'ravi8881', 'bb84d91cc6b0eafdbff085f3d7ec9277', '', '', '', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_phone`
--
ALTER TABLE `address_phone`
  ADD CONSTRAINT `ADDRESS_PHONE_FK1` FOREIGN KEY (`PHONE_TYPE_CD`) REFERENCES `rf_phone_type` (`PHONE_TYPE_CD`),
  ADD CONSTRAINT `ADDRESS_PHONE_FK2` FOREIGN KEY (`ADDRESS_ID`) REFERENCES `address` (`ADDRESS_ID`);

--
-- Constraints for table `doctor_patient`
--
ALTER TABLE `doctor_patient`
  ADD CONSTRAINT `DOCTOR_PATIENT_FK1` FOREIGN KEY (`STAFF_ID`) REFERENCES `org_staff` (`STAFF_ID`),
  ADD CONSTRAINT `DOCTOR_PATIENT_FK2` FOREIGN KEY (`PATIENT_ID`) REFERENCES `patient` (`PATIENT_ID`);

--
-- Constraints for table `dr_patient_refrl`
--
ALTER TABLE `dr_patient_refrl`
  ADD CONSTRAINT `DR_PATIENT_REFRL_FK1` FOREIGN KEY (`STAFF_ID`, `PATIENT_ID`) REFERENCES `doctor_patient` (`STAFF_ID`, `PATIENT_ID`),
  ADD CONSTRAINT `DR_PATIENT_REFRL_FK2` FOREIGN KEY (`RFRNG_STATUS_CD`) REFERENCES `rf_rfrl_status` (`RFRL_STATUS_CD`),
  ADD CONSTRAINT `DR_PATIENT_REFRL_FK3` FOREIGN KEY (`RFRD_STAFF_ID`) REFERENCES `org_staff` (`STAFF_ID`),
  ADD CONSTRAINT `DR_PATIENT_REFRL_FK4` FOREIGN KEY (`RFRD_STATUS_CD`) REFERENCES `rf_rfrl_status` (`RFRL_STATUS_CD`);

--
-- Constraints for table `dr_refrl_template`
--
ALTER TABLE `dr_refrl_template`
  ADD CONSTRAINT `DR_REFRL_TEMPLATE_FK1` FOREIGN KEY (`STAFF_ID`) REFERENCES `org_staff` (`STAFF_ID`);

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `ORGANIZATION_FK1` FOREIGN KEY (`ORG_TYPE_CD`) REFERENCES `rf_org_type` (`ORG_TYPE_CD`),
  ADD CONSTRAINT `ORGANIZATION_FK2` FOREIGN KEY (`PARENT_ORG_ID`) REFERENCES `organization` (`ORG_ID`);

--
-- Constraints for table `org_address`
--
ALTER TABLE `org_address`
  ADD CONSTRAINT `ORG_ADDRESS_FK1` FOREIGN KEY (`ADDRESS_ID`) REFERENCES `address` (`ADDRESS_ID`),
  ADD CONSTRAINT `ORG_ADDRESS_FK2` FOREIGN KEY (`ORG_ID`) REFERENCES `organization` (`ORG_ID`),
  ADD CONSTRAINT `ORG_ADDRESS_FK3` FOREIGN KEY (`ADDRESS_TYPE_CD`) REFERENCES `rf_address_type` (`ADDRESS_TYPE_CD`);

--
-- Constraints for table `org_service`
--
ALTER TABLE `org_service`
  ADD CONSTRAINT `ORG_SERVICE_FK1` FOREIGN KEY (`ORG_ID`) REFERENCES `organization` (`ORG_ID`),
  ADD CONSTRAINT `ORG_SERVICE_FK2` FOREIGN KEY (`SERVICE_TYPE_CD`) REFERENCES `rf_service_type` (`SERVICE_TYPE_CD`);

--
-- Constraints for table `org_staff`
--
ALTER TABLE `org_staff`
  ADD CONSTRAINT `ORG_STAFF_FK1` FOREIGN KEY (`ORG_ID`) REFERENCES `organization` (`ORG_ID`),
  ADD CONSTRAINT `ORG_STAFF_FK2` FOREIGN KEY (`STAFF_TYPE_CD`) REFERENCES `rf_staff_type` (`STAFF_TYPE_CD`),
  ADD CONSTRAINT `ORG_STAFF_FK3` FOREIGN KEY (`SPCLTY_TYPE_CD`) REFERENCES `rf_spclty_type` (`SPCLTY_TYPE_CD`),
  ADD CONSTRAINT `ORG_STAFF_FK4` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `user_account` (`ACCOUNT_ID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `PATIENT_FK1` FOREIGN KEY (`GENDER_CD`) REFERENCES `rf_gender` (`GENDER_CD`),
  ADD CONSTRAINT `PATIENT_FK2` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `user_account` (`ACCOUNT_ID`);

--
-- Constraints for table `patient_address`
--
ALTER TABLE `patient_address`
  ADD CONSTRAINT `PAT_ADDRESS_FK1` FOREIGN KEY (`ADDRESS_ID`) REFERENCES `address` (`ADDRESS_ID`),
  ADD CONSTRAINT `PAT_ADDRESS_FK2` FOREIGN KEY (`ADDRESS_TYPE_CD`) REFERENCES `rf_address_type` (`ADDRESS_TYPE_CD`),
  ADD CONSTRAINT `PAT_ADDRESS_FK3` FOREIGN KEY (`PATIENT_ID`) REFERENCES `patient` (`PATIENT_ID`);
