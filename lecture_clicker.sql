-- phpMyAdmin SQL Dump
-- version 3.5.5-rc1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2015 at 03:10 PM
-- Server version: 5.0.96-community-nt
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lecture clicker`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `a_id` int(11) NOT NULL auto_increment,
  `q_id` int(11) NOT NULL,
  `answerLabel` varchar(1) NOT NULL,
  `answerDesc` varchar(255) NOT NULL,
  `answerFlag` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`a_id`),
  UNIQUE KEY `a_id` (`a_id`),
  KEY `q_id` (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`a_id`, `q_id`, `answerLabel`, `answerDesc`, `answerFlag`) VALUES
(1, 1, 'A', 'Test Analysis and Design ', 1),
(2, 1, 'B', 'Test Planning and control ', 0),
(3, 1, 'C', 'Test Implementation and execution ', 0),
(4, 1, 'D', 'Evaluating exit criteria and reporting ', 0),
(5, 2, 'A', 'CLASS ', 0),
(6, 2, 'B', 'cLASS', 0),
(7, 2, 'C', 'CLass', 0),
(8, 2, 'D', 'CLa01ss', 1),
(9, 3, 'A', 'Designed by persons who write the software under test ', 0),
(10, 3, 'B', 'Designed by a person from a different section ', 0),
(11, 3, 'C', 'Designed by a person from a different organization', 1),
(12, 3, 'D', 'Designed by another person ', 0),
(13, 4, 'A', 'User Acceptance Test Cases', 1),
(14, 4, 'B', 'Integration Level Test Cases ', 0),
(15, 4, 'C', 'Unit Level Test Cases ', 0),
(16, 4, 'D', 'Program specifications ', 0),
(17, 5, 'A', 'Component testing ', 0),
(18, 5, 'B', 'Non-functional system testing ', 0),
(19, 5, 'C', 'User acceptance testing ', 0),
(20, 5, 'D', 'Maintenance testing ', 1),
(21, 6, 'A', 'Inspection ', 0),
(22, 6, 'B', 'Walkthrough', 0),
(23, 6, 'C', 'Technical Review', 1),
(24, 6, 'D', 'Formal Review ', 0),
(25, 7, 'A', 'State transition testing ', 0),
(26, 7, 'B', 'LCSAJ (Linear Code Sequence and Jump) ', 1),
(27, 7, 'C', 'syntax testing ', 0),
(28, 7, 'D', 'boundary value analysis ', 0),
(29, 8, 'A', 'Specifications', 1),
(30, 8, 'B', 'Test Cases ', 0),
(31, 8, 'C', 'Test Data ', 0),
(32, 8, 'D', 'Test Design ', 0),
(33, 9, 'A', 'Equivalance partitioning, Decision Table and Control flow are White box Testing Techniques. ', 0),
(34, 9, 'B', 'Equivalence partitioning , Boundary Value Analysis , Data Flow are Black Box Testing Techniques. ', 0),
(35, 9, 'C', 'Equivalence partitioning , State Transition , Use Case Testing are black box Testing Techniques. ', 1),
(36, 9, 'D', 'Equivalence Partioning , State Transition , Use Case Testing and Decision Table are White Box Testing', 0),
(37, 10, 'A', 'Independent testers are much more qualified than Developers', 0),
(38, 10, 'B', 'Independent testers see other and different defects and are unbiased. ', 1),
(39, 10, 'C', 'Independent Testers cannot identify defects. ', 0),
(40, 10, 'D', 'Independent Testers can test better than developers ', 0),
(41, 11, 'A', 'testing to see where the system does not function properly', 0),
(42, 11, 'B', 'testing quality attributes of the system including performance and usability ', 1),
(43, 11, 'C', 'testing a system feature using only the software required for that function ', 0),
(44, 11, 'D', 'testing for functions that should not exist ', 0),
(45, 12, 'A', 'status accounting of configuration items ', 0),
(46, 12, 'B', 'auditing conformance to ISO9001 ', 1),
(47, 12, 'C', 'identification of test versions ', 0),
(48, 12, 'D', 'record of changes to documentation over time ', 0),
(49, 13, 'A', 'Search the internet ', 0),
(50, 13, 'B', 'Analyse your needs and requirements ', 1),
(51, 13, 'C', 'Find out what your budget would be for the tool ', 0),
(52, 13, 'D', 'Attend a tool exhibition ', 0),
(53, 14, 'A', 'Performed by customers at their own site', 1),
(54, 14, 'B', 'Performed by customers at their software developers site', 0),
(55, 14, 'C', 'Performed by an independent test team ', 0),
(56, 14, 'D', 'Performed as early as possible in the lifecycle ', 0),
(57, 15, 'A', 'finding faults in the system', 0),
(58, 15, 'B', 'ensuring that the system is acceptable to all users', 0),
(59, 15, 'C', 'testing the system with other systems', 0),
(60, 15, 'D', 'testing for a business perspective ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `c_id` int(11) NOT NULL auto_increment,
  `courseCode` int(4) NOT NULL,
  `courseName` varchar(30) default NULL,
  PRIMARY KEY  (`c_id`),
  UNIQUE KEY `c_id` (`c_id`),
  UNIQUE KEY `courseCode` (`courseCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `courseCode`, `courseName`) VALUES
(1, 6280, 'Software Testing');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `q_id` int(11) NOT NULL auto_increment,
  `qs_id` int(11) NOT NULL,
  `questionLabel` int(2) NOT NULL,
  `questionDesc` varchar(255) NOT NULL,
  PRIMARY KEY  (`q_id`),
  UNIQUE KEY `q_id` (`q_id`),
  KEY `qs_id` (`qs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `qs_id`, `questionLabel`, `questionDesc`) VALUES
(1, 1, 1, 'Evaluating testability of the requirements and system are a part of which phase:-'),
(2, 1, 2, 'One of the fields on a form contains a text box which accepts alphabets in lower or upper case.'),
(3, 1, 3, 'Which of the following has highest level of independence in which test cases are :'),
(4, 1, 4, 'We use the output of the requirement analysis, the requirement specification as the input for'),
(5, 1, 5, 'Which of the following uses Impact Analysis most?'),
(6, 2, 1, 'Peer Reviews are also called as :-'),
(7, 2, 2, 'Which of the following techniques is NOT a black box technique?'),
(8, 2, 3, 'Test Conditions are derived from :-'),
(9, 2, 4, 'Which of the following is true about White and Black Box Testing Technique:-'),
(10, 2, 5, 'Benefits of Independent Testing'),
(11, 3, 1, 'Non-functional system testing includes:'),
(12, 3, 2, 'Which of the following is NOT part of configuration management:'),
(13, 3, 3, 'The place to start if you want a (new) test tool is:'),
(14, 3, 4, 'Beta testing is:'),
(15, 3, 5, 'The main focus of acceptance testing is:');

-- --------------------------------------------------------

--
-- Table structure for table `questionset`
--

CREATE TABLE IF NOT EXISTS `questionset` (
  `qs_id` int(11) NOT NULL auto_increment,
  `c_id` int(11) default NULL,
  `questionSetName` varchar(30) NOT NULL,
  PRIMARY KEY  (`qs_id`),
  UNIQUE KEY `qs_id` (`qs_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `questionset`
--

INSERT INTO `questionset` (`qs_id`, `c_id`, `questionSetName`) VALUES
(1, 1, 'Lecture 1'),
(2, 1, 'Lecture 2'),
(3, 1, 'Lecture 3');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `s_id` int(11) NOT NULL auto_increment,
  `u_id` int(11) default NULL,
  `qs_id` int(11) default NULL,
  `sessionName` varchar(255) NOT NULL,
  `sessionValid` tinyint(1) NOT NULL default '0',
  `dateCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`s_id`),
  UNIQUE KEY `s_id` (`s_id`),
  KEY `u_id` (`u_id`),
  KEY `qs_id` (`qs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`s_id`, `u_id`, `qs_id`, `sessionName`, `sessionValid`, `dateCreated`) VALUES
(24, 5, 1, 'Test', 0, '2015-02-16 23:58:23'),
(25, 5, 1, 'testing1', 0, '2015-02-17 00:36:30'),
(26, 5, 1, 'testing2', 0, '2015-02-17 00:38:55'),
(27, 5, 1, 'testing 3', 0, '2015-02-17 00:55:07'),
(28, 5, 1, 'test', 0, '2015-02-17 01:04:56'),
(29, 5, 1, 'harnkadnfkvcsad', 0, '2015-02-17 01:18:31'),
(30, 5, 1, 'testing5', 0, '2015-02-17 02:17:47'),
(31, 5, 1, 'testing6', 0, '2015-02-17 02:43:54'),
(32, 5, 1, 'REKT', 0, '2015-02-17 02:58:33'),
(33, 5, 1, 'REKT2', 0, '2015-02-17 23:18:50'),
(34, 5, 1, 'Testing', 0, '2015-02-18 00:32:19'),
(35, 5, 3, 'EK1', 0, '2015-02-18 01:07:34'),
(36, 5, 1, 'Test', 0, '2015-02-18 01:23:29'),
(37, 5, 1, 'CUNT', 0, '2015-02-18 01:41:45'),
(38, 5, 1, 'HEHE', 0, '2015-02-18 03:21:06'),
(39, 5, 1, 'Test', 0, '2015-02-19 23:50:39'),
(40, 5, NULL, 'TEST', 0, '2015-02-23 02:15:49'),
(41, 5, 1, 'testing', 1, '2015-02-23 02:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `userType` varchar(10) default NULL,
  PRIMARY KEY  (`u_id`),
  UNIQUE KEY `u_id` (`u_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `password`, `userType`) VALUES
(1, 'jevin', 'jevin', 'student'),
(2, 'treb', 'treb', 'student'),
(3, 'billy', 'cunt', 'student'),
(4, 'jhing', 'jhing', 'student'),
(5, 'evan', 'evan', 'instructor'),
(6, 'nathan', 'nathan', 'instructor'),
(7, 'student1', 'student', 'student'),
(8, 'student2', 'student', 'student'),
(9, 'student3', 'student', 'student'),
(10, 'student4', 'student', 'student'),
(11, 'student5', 'student', 'student'),
(12, 'student6', 'student', 'student'),
(13, 'student7', 'student', 'student'),
(14, 'student8', 'student', 'student'),
(15, 'student9', 'student', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `useranswer`
--

CREATE TABLE IF NOT EXISTS `useranswer` (
  `u_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  KEY `u_id` (`u_id`),
  KEY `a_id` (`a_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usersession`
--

CREATE TABLE IF NOT EXISTS `usersession` (
  `s_id` int(11) default NULL,
  `u_id` int(11) default NULL,
  UNIQUE KEY `uc_siduid` (`s_id`,`u_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `question` (`q_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`qs_id`) REFERENCES `questionset` (`qs_id`);

--
-- Constraints for table `questionset`
--
ALTER TABLE `questionset`
  ADD CONSTRAINT `questionset_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`qs_id`) REFERENCES `questionset` (`qs_id`);

--
-- Constraints for table `useranswer`
--
ALTER TABLE `useranswer`
  ADD CONSTRAINT `useranswer_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `useranswer_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `answer` (`a_id`),
  ADD CONSTRAINT `useranswer_ibfk_3` FOREIGN KEY (`s_id`) REFERENCES `session` (`s_id`);

--
-- Constraints for table `usersession`
--
ALTER TABLE `usersession`
  ADD CONSTRAINT `usersession_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `session` (`s_id`),
  ADD CONSTRAINT `usersession_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
