-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 12:56 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iml`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_artist_data`
--

CREATE TABLE `book_artist_data` (
  `id` int(11) NOT NULL,
  `requester_name` text NOT NULL,
  `requester_email` text NOT NULL,
  `requester_message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_artist_data`
--

INSERT INTO `book_artist_data` (`id`, `requester_name`, `requester_email`, `requester_message`) VALUES
(1, 'gaurav', 'gr19490@gmail.com', 'testing'),
(2, 'gaurav', 'asdasd@gmail.com', 'slhalhaf'),
(3, 'djhhasgfakf', 'asjdgasd@ajshhga.com', 'dfhakfafjladdf'),
(4, 'sdgafka', 'aahhgagf@ajdagf.com', 'sjhdakfhaf'),
(5, 'gURv', 'sdasdkj@ada.com', 'askjdhasld'),
(6, 'hhdksd', 'asdasd@gmail.com', 'dmjhhaa'),
(7, 'rohit', 'rohit@unit1productions.com', 'Call me soon'),
(8, 'rohit', 'rohit@unit1productions.com', 'Call me soon'),
(9, 'rohit', 'rohit@unit1productions.com', 'Call me soon'),
(10, 'rohit', 'rohit@unit1productions.com', 'Call me soon'),
(11, 'rohit', 'rohit@unit1productions.com', 'Call me soon'),
(12, 'gaurav', 'gaurav@gmail.com', 'testing'),
(13, 'gaurav', 'gaurav@gmail.com', 'testing'),
(14, 'gaurav rao', 'gaurav@unit1productions.com', 'testing'),
(15, 'gaurav', 'gaurav@unit1productions', 'testing'),
(16, 'gaurav', 'gaurav@unit1productions', 'testing'),
(17, '', '', ''),
(18, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment_attachments`
--

CREATE TABLE `comment_attachments` (
  `att_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `attachment_type` varchar(20) NOT NULL,
  `attachment_path` text NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_attachments`
--

INSERT INTO `comment_attachments` (`att_id`, `comment_id`, `attachment_type`, `attachment_path`, `isActive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 1, 'images', '20170603085648000000IMG_20170531_212021_898.jpg', b'1', '2017-06-03 13:56:48', 1, '2017-06-03 13:56:48', 1),
(2, 13, 'images', '20170604021937000000IMG_20170329_215000_433.jpg', b'1', '2017-06-04 07:19:37', 1, '2017-06-04 07:19:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_categories`
--

CREATE TABLE `group_categories` (
  `CAT_ID` int(11) NOT NULL,
  `CAT_NAME` varchar(120) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_categories`
--

INSERT INTO `group_categories` (`CAT_ID`, `CAT_NAME`, `isActive`, `created_On`, `Created_By`, `Updated_On`, `Updated_By`) VALUES
(1, 'Solo', b'1', '2017-01-30 10:02:27', 1, '2017-01-30 10:02:27', 1),
(2, 'Duet', b'1', '2017-01-30 10:02:27', 1, '2017-01-30 10:02:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `iml_comment_song`
--

CREATE TABLE `iml_comment_song` (
  `COM_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `AUTHOR` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `EMAIL` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `COMMENTS` text COLLATE latin1_general_ci NOT NULL,
  `DATE` datetime DEFAULT NULL,
  `Song_id` int(11) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `iml_comment_song`
--

INSERT INTO `iml_comment_song` (`COM_ID`, `ID`, `parent_id`, `AUTHOR`, `EMAIL`, `COMMENTS`, `DATE`, `Song_id`, `isActive`, `created_On`, `Created_By`, `Updated_On`, `Updated_By`) VALUES
(1, 1, 0, NULL, NULL, 'New post from android', NULL, 0, b'1', '2017-06-03 13:56:48', 1, '2017-06-03 13:56:48', 1),
(2, 1, 0, NULL, NULL, 'Test post 1', NULL, 0, b'1', '2017-06-03 13:57:55', 1, '2017-06-03 13:57:55', 1),
(3, 1, 0, NULL, NULL, 'Test post 2', NULL, 0, b'1', '2017-06-03 13:58:05', 1, '2017-06-03 13:58:05', 1),
(4, 1, 0, NULL, NULL, 'Test post 3', NULL, 0, b'1', '2017-06-03 13:58:15', 1, '2017-06-03 13:58:15', 1),
(5, 1, 0, NULL, NULL, 'Test post 4', NULL, 0, b'1', '2017-06-03 13:58:27', 1, '2017-06-03 13:58:27', 1),
(6, 1, -1, NULL, NULL, 'hi ', NULL, 0, b'1', '2017-06-04 06:18:38', 1, '2017-06-04 06:18:38', 1),
(7, 1, -1, NULL, NULL, 'hello', NULL, 0, b'1', '2017-06-04 06:19:05', 1, '2017-06-04 06:19:05', 1),
(8, 1, -1, NULL, NULL, 'hi', NULL, 0, b'1', '2017-06-04 06:37:56', 1, '2017-06-04 06:37:56', 1),
(9, 1, -1, NULL, NULL, 'hello', NULL, 0, b'1', '2017-06-04 06:41:04', 1, '2017-06-04 06:41:04', 1),
(10, 1, 0, NULL, NULL, 'Hello', NULL, 0, b'1', '2017-06-04 06:47:54', 1, '2017-06-04 06:47:54', 1),
(11, 1, -1, NULL, NULL, 'jadgkhadgf', NULL, 0, b'1', '2017-06-04 06:52:29', 1, '2017-06-04 06:52:29', 1),
(12, 1, 10, NULL, NULL, 'hello to you', NULL, 0, b'1', '2017-06-04 07:08:32', 1, '2017-06-04 07:08:32', 1),
(13, 1, 0, NULL, NULL, 'Latest post with shikhar', NULL, 0, b'1', '2017-06-04 07:19:37', 1, '2017-06-04 07:19:37', 1),
(14, 22, 13, NULL, NULL, 'hello from raj', NULL, 0, b'1', '2017-06-07 11:40:18', 22, '2017-06-07 11:40:18', 22),
(15, 22, 0, NULL, NULL, 'HELLO TESTING RAJ', NULL, 0, b'1', '2017-06-07 11:40:57', 22, '2017-06-07 11:40:57', 22),
(16, 22, 15, NULL, NULL, 'again testing', NULL, 0, b'1', '2017-06-07 11:41:13', 22, '2017-06-07 11:41:13', 22),
(17, 22, 15, NULL, NULL, 'sgs', NULL, 0, b'1', '2017-06-07 12:35:31', 22, '2017-06-07 12:35:31', 22);

-- --------------------------------------------------------

--
-- Table structure for table `industry_communication`
--

CREATE TABLE `industry_communication` (
  `M_ID` int(11) NOT NULL,
  `M_Subject` varchar(150) NOT NULL,
  `M_From` int(11) NOT NULL,
  `M_To` int(11) NOT NULL,
  `M_Sent` datetime NOT NULL,
  `PM_Message` text NOT NULL,
  `M_mail` int(11) NOT NULL,
  `M_song_id` int(11) NOT NULL,
  `Song_Locked` int(11) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_reference`
--

CREATE TABLE `m_reference` (
  `reference_id` int(11) NOT NULL,
  `reference_code` varchar(20) NOT NULL,
  `reference` varchar(200) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_reference`
--

INSERT INTO `m_reference` (`reference_id`, `reference_code`, `reference`, `isActive`, `created_On`, `Created_By`, `Updated_On`, `Updated_By`) VALUES
(1, 'ur_atv', 'User Activation', b'1', '2017-01-31 13:19:04', 1, '2017-01-31 13:19:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_reference_detail`
--

CREATE TABLE `m_reference_detail` (
  `Reference_Detail_id` int(11) NOT NULL,
  `Reference_ID` int(11) NOT NULL,
  `Reference_detail_code` varchar(20) NOT NULL,
  `Reference_detail` varchar(200) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_reference_detail`
--

INSERT INTO `m_reference_detail` (`Reference_Detail_id`, `Reference_ID`, `Reference_detail_code`, `Reference_detail`, `isActive`, `created_On`, `Created_By`, `Updated_On`, `Updated_By`) VALUES
(1, 1, 'active', 'User Active', b'1', '2017-01-31 13:21:01', 1, '2017-01-31 13:21:01', 1),
(2, 1, 'deactive', 'User Deactive', b'1', '2017-01-31 13:21:01', 1, '2017-01-31 13:21:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_response`
--

CREATE TABLE `social_response` (
  `id` int(11) NOT NULL,
  `response_type` tinyint(4) NOT NULL COMMENT '0->neutral;1->like;2->dislike',
  `response_on` int(11) NOT NULL,
  `post_type` tinyint(10) NOT NULL COMMENT '1->song, 2->post, 3->comment',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_response`
--

INSERT INTO `social_response` (`id`, `response_type`, `response_on`, `post_type`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 1, 1, 2, 1, '2017-06-03 15:57:33', 1, '2017-06-03 15:57:33'),
(2, 1, 12, 3, 1, '2017-06-04 09:08:41', 1, '2017-06-04 09:08:41'),
(3, 1, 10, 2, 1, '2017-06-04 09:08:43', 1, '2017-06-04 09:08:43'),
(4, 1, 5, 2, 1, '2017-06-04 09:08:46', 1, '2017-06-04 09:08:46'),
(5, 1, 4, 2, 1, '2017-06-04 09:08:48', 1, '2017-06-04 09:08:48'),
(6, 1, 3, 2, 1, '2017-06-04 09:08:50', 1, '2017-06-04 09:08:50'),
(7, 1, 2, 2, 1, '2017-06-04 09:08:52', 1, '2017-06-04 09:08:52'),
(8, 1, 13, 2, 1, '2017-06-06 08:29:55', 1, '2017-06-06 08:29:55'),
(9, 0, 13, 2, 22, '2017-06-07 06:09:56', 22, '2017-06-07 06:10:05'),
(10, 1, 14, 3, 22, '2017-06-07 06:10:25', 22, '2017-06-07 06:10:25'),
(11, 1, 15, 2, 22, '2017-06-07 06:10:59', 22, '2017-06-07 06:10:59'),
(12, 1, 16, 3, 22, '2017-06-07 06:11:16', 22, '2017-06-07 07:05:45'),
(13, 1, 17, 3, 22, '2017-06-07 07:05:35', 22, '2017-06-07 07:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `ID` int(11) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `Song_Title` text NOT NULL,
  `composer` varchar(100) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `Writers` varchar(100) DEFAULT NULL,
  `synopsis` text,
  `Date` date DEFAULT NULL,
  `LINK_APPROVED` int(11) DEFAULT NULL,
  `HITS` int(11) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL,
  `NO_RATES` int(11) DEFAULT NULL,
  `TOTAL_COMMENTS` int(11) DEFAULT NULL,
  `HIT_DATE` datetime DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Song_status` int(11) DEFAULT '0' COMMENT '0->in Review, 1->public',
  `Song_File_Name` varchar(100) DEFAULT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `song_cat`
--

CREATE TABLE `song_cat` (
  `CAT_ID` int(11) NOT NULL,
  `CAT_TYPE` varchar(140) NOT NULL,
  `GROUPCAT` int(11) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song_cat`
--

INSERT INTO `song_cat` (`CAT_ID`, `CAT_TYPE`, `GROUPCAT`, `isActive`, `created_On`, `Created_By`, `Updated_On`, `Updated_By`) VALUES
(1, 'Male', 1, b'1', '2017-01-30 10:03:53', 1, '2017-01-30 10:03:53', 1),
(2, 'Female', 1, b'1', '2017-01-30 10:03:53', 1, '2017-01-30 10:03:53', 1),
(3, 'Both', 2, b'1', '2017-01-30 10:04:21', 1, '2017-01-30 10:04:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usermain`
--

CREATE TABLE `usermain` (
  `UID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `ContactMe` varchar(100) NOT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Email` varchar(120) NOT NULL,
  `DOB` date DEFAULT NULL,
  `AboutMe` text,
  `DateJoined` date DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL,
  `Website` varchar(100) DEFAULT NULL,
  `Hits` int(11) DEFAULT NULL,
  `LastVisit` datetime DEFAULT NULL,
  `LastUpdated` datetime DEFAULT NULL,
  `PMEmailNotification` int(11) DEFAULT NULL,
  `Activation` int(11) DEFAULT NULL,
  `ShowFriendsListinProfile` int(11) DEFAULT NULL,
  `ShowsingerProfile` int(11) DEFAULT NULL,
  `NumRecordsSongsQuickView` int(11) DEFAULT NULL,
  `NumRecordsFriendsList` int(11) DEFAULT NULL,
  `IsFirsTimeLogin` int(11) DEFAULT NULL,
  `UserType` int(11) DEFAULT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermain`
--

INSERT INTO `usermain` (`UID`, `UserName`, `Password`, `FirstName`, `LastName`, `ContactMe`, `City`, `State`, `Country`, `Email`, `DOB`, `AboutMe`, `DateJoined`, `Photo`, `Website`, `Hits`, `LastVisit`, `LastUpdated`, `PMEmailNotification`, `Activation`, `ShowFriendsListinProfile`, `ShowsingerProfile`, `NumRecordsSongsQuickView`, `NumRecordsFriendsList`, `IsFirsTimeLogin`, `UserType`, `isActive`, `created_On`, `Created_By`, `Updated_On`, `Updated_By`) VALUES
(1, 'admin', '7c39e97815e778d2d7c3ce2f56c6fd12', 'Gaurav', 'Rao', '7388458272', 'Mumbai', 'Maharastra', 'India', 'gr19490@gmail.com', '1990-04-19', 'About Me Content', '0000-00-00', '20170603102518000000IMG_20170531_212021_898.jpg', 'gaurav.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, b'1', '2017-01-30 08:50:00', 1, '2017-01-30 08:50:00', 1),
(7, 'RohitShethy', 'e10adc3949ba59abbe56e057f20f883e', 'Rohit', 'Shethy', '', '', '', '', 'rs@iml.com', '0000-00-00', '', '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, b'1', '2017-02-11 13:48:57', 1, '2017-02-11 13:48:57', 1),
(8, 'shikharkumar', '7c39e97815e778d2d7c3ce2f56c6fd12', 'Shikhar', 'Kumar', '', '', '', '', 'shikhar@indianmusiclab.com', '0000-00-00', '', '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, b'1', '2017-02-20 14:42:42', 1, '2017-02-20 14:42:42', 1),
(9, 'hansa', '7c39e97815e778d2d7c3ce2f56c6fd12', 'Hanshaduti', 'Kundu', '', '', '', '', 'hanshaduti@indianmusiclab.com', '0000-00-00', '', '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, b'1', '2017-03-07 04:07:43', 1, '2017-03-07 04:07:43', 1),
(10, 'anurag', '7c39e97815e778d2d7c3ce2f56c6fd12', 'Anurag', 'Puranik', '', '', '', '', 'anurag@indianmusiclab.com', '0000-00-00', '', '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, b'1', '2017-03-07 04:09:29', 1, '2017-03-07 04:09:29', 1),
(11, 'ashwani', '7c39e97815e778d2d7c3ce2f56c6fd12', 'Ashwani', 'Bisoya', '', '', '', '', 'ashwani@indianmusiclab.com', '0000-00-00', '', '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, b'1', '2017-03-07 04:11:24', 1, '2017-03-07 04:11:24', 1),
(12, 'sachin', '7c39e97815e778d2d7c3ce2f56c6fd12', 'Sachin', 'Dave', '', '', '', '', 'sachin@indiantimesdaily.com', '0000-00-00', 'About Me Content', '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, b'1', '2017-03-07 04:12:50', 1, '2017-03-07 04:12:50', 1),
(22, 'rajkumar', 'fcea920f7412b5da7be0cf42b8c93759', 'Raj', 'Kumar', '9839653641', 'Mumbai', 'Maharastra', 'India', 'rkgt76@gmail.com', '1970-01-01', 'About Me Content', '2017-04-10', '855354f514e70099cbd0220ded75ddc3.JPG', 'raj.kr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, b'1', '2017-04-08 11:21:51', 1, '2017-04-08 11:21:51', 22),
(23, 'test1234', '7c39e97815e778d2d7c3ce2f56c6fd12', 'test', '1234', '', '', '', '', 'test1234@gmil.com', '0000-00-00', '', '2017-04-19', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, b'1', '2017-04-19 12:58:03', 0, '2017-04-19 12:58:03', 0),
(24, 'test 45', '96e79218965eb72c92a549dd5a330112', 'Test', 'Dev', '', '', '', '', 'testdev@gmail.com', '0000-00-00', '', '2017-04-27', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, b'1', '2017-04-27 08:59:55', 0, '2017-04-27 08:59:55', 0),
(27, 'new_user', '8a31b6bc9442684ccb8b2fb207651d4b', 'new', 'user', '', NULL, NULL, NULL, 'new@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, b'1', '2017-06-02 16:53:39', 0, '2017-06-02 16:53:39', 0),
(28, 'gr19490', '7c39e97815e778d2d7c3ce2f56c6fd12', 'Gaurav', 'Rao', '', NULL, NULL, NULL, 'gr19490@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, b'1', '2017-06-02 16:55:43', 0, '2017-06-02 16:55:43', 0),
(29, 'rishabjain22', '396b223ad746c6e0bcf10f4d94cf6933', 'Rishab', 'Jain', '', NULL, NULL, NULL, 'rishuajmera22@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, b'1', '2017-06-03 10:53:11', 0, '2017-06-03 10:53:11', 0),
(30, 'prabhakararyap', 'a78ff213574ba8b097bce329305e7391', 'prabhakar', 'arya', '', NULL, NULL, NULL, 'aryap1962@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, b'1', '2017-06-04 19:30:11', 0, '2017-06-04 19:30:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersuspensionlog`
--

CREATE TABLE `usersuspensionlog` (
  `ID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Note` text NOT NULL,
  `Date` datetime NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_song`
--

CREATE TABLE `user_song` (
  `ID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `SongsID` int(11) NOT NULL,
  `Hits` int(11) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Song_Locked` int(11) DEFAULT NULL,
  `Locked_communication_id` int(11) DEFAULT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_song`
--

INSERT INTO `user_song` (`ID`, `UID`, `SongsID`, `Hits`, `Date`, `Song_Locked`, `Locked_communication_id`, `isActive`, `created_On`, `Created_By`, `Updated_On`, `Updated_By`) VALUES
(1, 8, 10, NULL, NULL, NULL, NULL, b'1', '2017-02-02 12:36:22', 1, '2017-02-02 12:36:22', 1),
(2, 9, 11, NULL, NULL, NULL, NULL, b'1', '2017-02-02 12:38:37', 1, '2017-02-02 12:38:37', 1),
(3, 10, 12, NULL, NULL, NULL, NULL, b'1', '2017-02-02 12:38:50', 1, '2017-02-02 12:38:50', 1),
(4, 11, 13, NULL, NULL, NULL, NULL, b'1', '2017-02-02 12:38:54', 1, '2017-02-02 12:38:54', 1),
(5, 12, 14, NULL, NULL, NULL, NULL, b'1', '2017-02-02 12:38:58', 1, '2017-02-02 12:38:58', 1),
(6, 8, 15, NULL, NULL, NULL, NULL, b'1', '2017-02-02 12:39:01', 1, '2017-02-02 12:39:01', 1),
(7, 9, 16, NULL, NULL, NULL, NULL, b'1', '2017-02-02 12:39:04', 1, '2017-02-02 12:39:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `ID` int(11) NOT NULL,
  `User_Type` varchar(20) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`ID`, `User_Type`, `isActive`, `created_On`, `Created_By`, `Updated_On`, `Updated_By`) VALUES
(1, 'admin', b'1', '2017-01-30 08:46:15', 1, '2017-01-30 08:46:15', 1),
(2, 'moderator', b'1', '2017-01-30 08:46:15', 1, '2017-01-30 08:46:15', 1),
(3, 'artist', b'1', '2017-01-30 12:11:54', 1, '2017-01-30 12:11:54', 1),
(4, 'public', b'1', '2017-01-30 12:11:54', 1, '2017-01-30 12:11:54', 1),
(5, 'industry', b'1', '2017-01-30 12:12:27', 1, '2017-01-30 12:12:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `whoisonline`
--

CREATE TABLE `whoisonline` (
  `UserName` varchar(200) NOT NULL,
  `UserIP` varchar(200) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `LastDateChecked` datetime NOT NULL,
  `CheckedIn` datetime NOT NULL,
  `LastChecked` datetime NOT NULL,
  `PageBrowse` text NOT NULL,
  `isActive` bit(1) NOT NULL,
  `created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Created_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_artist_data`
--
ALTER TABLE `book_artist_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_attachments`
--
ALTER TABLE `comment_attachments`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `group_categories`
--
ALTER TABLE `group_categories`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Indexes for table `iml_comment_song`
--
ALTER TABLE `iml_comment_song`
  ADD PRIMARY KEY (`COM_ID`);

--
-- Indexes for table `industry_communication`
--
ALTER TABLE `industry_communication`
  ADD PRIMARY KEY (`M_ID`);

--
-- Indexes for table `m_reference`
--
ALTER TABLE `m_reference`
  ADD PRIMARY KEY (`reference_id`);

--
-- Indexes for table `m_reference_detail`
--
ALTER TABLE `m_reference_detail`
  ADD PRIMARY KEY (`Reference_Detail_id`);

--
-- Indexes for table `social_response`
--
ALTER TABLE `social_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `song_cat`
--
ALTER TABLE `song_cat`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Indexes for table `usermain`
--
ALTER TABLE `usermain`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `usersuspensionlog`
--
ALTER TABLE `usersuspensionlog`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_song`
--
ALTER TABLE `user_song`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_artist_data`
--
ALTER TABLE `book_artist_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comment_attachments`
--
ALTER TABLE `comment_attachments`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group_categories`
--
ALTER TABLE `group_categories`
  MODIFY `CAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `iml_comment_song`
--
ALTER TABLE `iml_comment_song`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `industry_communication`
--
ALTER TABLE `industry_communication`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `m_reference`
--
ALTER TABLE `m_reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_reference_detail`
--
ALTER TABLE `m_reference_detail`
  MODIFY `Reference_Detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `social_response`
--
ALTER TABLE `social_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song_cat`
--
ALTER TABLE `song_cat`
  MODIFY `CAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usermain`
--
ALTER TABLE `usermain`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `usersuspensionlog`
--
ALTER TABLE `usersuspensionlog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_song`
--
ALTER TABLE `user_song`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
