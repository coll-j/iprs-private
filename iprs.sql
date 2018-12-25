-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 06:33 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iprs`
--

-- --------------------------------------------------------

--
-- Table structure for table `iprs_announcement`
--

CREATE TABLE `iprs_announcement` (
  `id` int(4) NOT NULL,
  `username` varchar(32) NOT NULL,
  `input_date` datetime NOT NULL,
  `until_date` datetime NOT NULL,
  `text` text NOT NULL,
  `active` enum('yes','no') NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iprs_comp_type`
--

CREATE TABLE `iprs_comp_type` (
  `id` int(2) NOT NULL,
  `name` varchar(64) NOT NULL,
  `active` enum('yes','no') NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_comp_type`
--

INSERT INTO `iprs_comp_type` (`id`, `name`, `active`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'Agricultural Company', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(2, 'Extractive Company', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(3, 'Industrial and Manufacture Company', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(4, 'Service Company', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(5, 'Trading Company', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_contact`
--

CREATE TABLE `iprs_contact` (
  `id` int(4) NOT NULL COMMENT 'User ID Not Auto Increment',
  `address` varchar(256) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `website` varchar(128) DEFAULT NULL,
  `instagram` varchar(128) DEFAULT NULL,
  `line` varchar(16) DEFAULT NULL,
  `facebook` varchar(128) DEFAULT NULL,
  `twitter` varchar(128) DEFAULT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_contact`
--

INSERT INTO `iprs_contact` (`id`, `address`, `phone`, `website`, `instagram`, `line`, `facebook`, `twitter`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(0, 'Not Found.', '085732405860', 'ayung.udah.pw', 'ayungavis', 'ayungavis', 'ayungavis', 'ayungavis', 'admin', '2018-09-03 10:35:15', 'admin', '2018-11-30 06:23:34', 8);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_database`
--

CREATE TABLE `iprs_database` (
  `id` int(8) NOT NULL,
  `name` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `position` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `company` varchar(512) NOT NULL,
  `comp_types` varchar(64) NOT NULL,
  `comp_address` text NOT NULL,
  `comp_email` varchar(64) NOT NULL,
  `comp_contact` varchar(64) NOT NULL,
  `comp_fax` varchar(64) NOT NULL,
  `stats` enum('alumni','non_alumni') NOT NULL,
  `department` varchar(64) NOT NULL,
  `generation` int(4) DEFAULT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iprs_department`
--

CREATE TABLE `iprs_department` (
  `id` int(2) NOT NULL,
  `faculty` int(2) NOT NULL,
  `name` varchar(64) NOT NULL,
  `slug` varchar(32) NOT NULL,
  `active` enum('yes','no') NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_department`
--

INSERT INTO `iprs_department` (`id`, `faculty`, `name`, `slug`, `active`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 1, 'Physics', 'physics', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(2, 1, 'Chemistry', 'chemistry', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(3, 1, 'Biology', 'biology', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(4, 2, 'Mechanical Engineering', 'mechanical', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(5, 2, 'Chemical Engineering', 'chemical', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(6, 2, 'Engineering Physics', 'physics_eng', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(7, 2, 'Industrial Engineering', 'industry', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(8, 2, 'Material Engineering', 'material', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(9, 3, 'Electrical Engineering', 'electrical', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(10, 3, 'Computer Engineering', 'computer', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(11, 3, 'Biomedical Engineering', 'biomedical', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(12, 4, 'Civil Engineering', 'civil', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(13, 4, 'Enviromental Engineering', 'enviromental', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(14, 4, 'Geomatics Engineering', 'geomatics', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(15, 4, 'Geophysics Engineering', 'geophysics', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(16, 5, 'Architecture', 'architecture', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(17, 5, 'Industrial Product Design', 'product', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(18, 5, 'Interior Design', 'interior', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(19, 5, 'Visual Communication Design', 'visual', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(20, 5, 'Regional and Urban Planning', 'planning', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(21, 6, 'Naval Architecture', 'naval', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(22, 6, 'Marine Engineering', 'marine', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(23, 6, 'Ocean Engineering', 'ocean', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(24, 6, 'Marine Transportaion', 'transportation', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(25, 7, 'Mathematics', 'mathematics', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(26, 7, 'Statistics', 'statistics', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(27, 7, 'Actuarial Science', 'actuarial', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(28, 7, 'Business Statistics', 'business_statistics', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(29, 8, 'Informatics', 'informatics', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(30, 8, 'Information Systems', 'information_systems', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(31, 8, 'Information Technology', 'information_technology', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(32, 9, 'Business Management', 'business_management', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(33, 9, 'Technology Management', 'technology_management', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(34, 9, 'Development Studies', 'development_studies', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(35, 10, 'Civil Infrastructure Engineering', 'diploma_civil', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(36, 10, 'Industrial Mechanical Engineering', 'diploma_mechanical', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(37, 10, 'Automation Electronic Engineering', 'diploma_electrical', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(38, 10, 'Industrial Chemical Engineering', 'diploma_chemical', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(39, 10, 'Instrumentation Engineering', 'diploma_instrumentation', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(40, 10, 'Business Statistics', 'diploma_statistics', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_event_type`
--

CREATE TABLE `iprs_event_type` (
  `id` int(2) NOT NULL,
  `name` varchar(256) NOT NULL,
  `active` enum('yes','no') NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_event_type`
--

INSERT INTO `iprs_event_type` (`id`, `name`, `active`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'Seminar Internal KM ITS', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(2, 'Seminar National', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(3, 'Seminar International', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(4, 'Training', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(5, 'Social Service Activities', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(6, 'Conference / Summit', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(7, 'Big Event', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(8, 'Internalisation', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(9, 'Visit to College', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(10, 'Visit to Government', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(11, 'Visit to Alumni', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(12, 'Visit to National Figures', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_faculty`
--

CREATE TABLE `iprs_faculty` (
  `id` int(2) NOT NULL,
  `name` varchar(64) NOT NULL,
  `slug` varchar(32) NOT NULL,
  `active` enum('yes','no') NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_faculty`
--

INSERT INTO `iprs_faculty` (`id`, `name`, `slug`, `active`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'Science', 'fs', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(2, 'Industrial Technology', 'fti', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(3, 'Electrical Technology', 'fte', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(4, 'Civil, Enviromental, and Geo Engineering', 'ftslk', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(5, 'Architecture, Design, and Planning', 'fadp', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(6, 'Marine Technology', 'ftk', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(7, 'Mathematics, Computation, and Data Science', 'fmksd', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(8, 'Information and Communication Technology', 'ftik', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(9, 'Business and Technology Management', 'fbmt', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(10, 'Vocational Studies', 'fv', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_log`
--

CREATE TABLE `iprs_log` (
  `id` int(16) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `username` varchar(32) NOT NULL,
  `slug` varchar(16) NOT NULL,
  `stats` enum('success','error','edit','delete') NOT NULL,
  `logdate` datetime NOT NULL,
  `activity` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iprs_menu`
--

CREATE TABLE `iprs_menu` (
  `id` int(2) NOT NULL,
  `label` varchar(16) NOT NULL,
  `link` varchar(32) NOT NULL DEFAULT '#',
  `information` text,
  `parent_id` int(2) NOT NULL DEFAULT '0',
  `type` enum('user','admin','sidebar','panel') NOT NULL DEFAULT 'user',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `icon` varchar(32) DEFAULT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_menu`
--

INSERT INTO `iprs_menu` (`id`, `label`, `link`, `information`, `parent_id`, `type`, `active`, `icon`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'Admin Panel', 'admin', 'Administration menu', 0, 'admin', 'yes', 'fi-monitor', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(2, 'My Account', 'profile', 'User account', 0, 'user', 'yes', 'fi-head', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(3, 'Settings', 'setting', 'User settings', 0, 'user', 'yes', 'fi-cog', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(4, 'Logout', 'logout', 'User logout', 0, 'user', 'yes', 'fi-power', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(5, 'Dashboard', 'dashboard', 'Dashboard menu', 0, 'sidebar', 'yes', 'fi-air-play', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(6, 'Proposals', '#', 'Parent menu of proposals', 0, 'sidebar', 'yes', 'fi-paper', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(7, 'My Proposal', 'myproposal', 'Sub menu of proposals', 6, 'sidebar', 'yes', '', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(8, 'Input Proposal', 'proposal', 'Sub menu of proposals', 6, 'sidebar', 'yes', '', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(9, 'Databases', '#', 'Parent menu of databases', 0, 'sidebar', 'yes', 'fi-server', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(10, 'My Database', 'mydatabase', 'Sub menu of databases', 9, 'sidebar', 'yes', '', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(11, 'Input Database', 'database', 'Sub menu of databases', 9, 'sidebar', 'yes', '', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(12, 'Edit Proposal', 'editproposal', 'Hidden menu of proposal', 6, 'sidebar', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(13, 'Account', '#', 'Parent menu of account', 0, 'sidebar', 'yes', 'fi-head', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(14, 'My Account', 'profile', 'Sub menu of account', 13, 'sidebar', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(15, 'Setting', 'setting', 'Sub menu of account', 13, 'sidebar', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(16, 'Dashboard', 'dashboard', 'Dashboard menu of admin panel', 0, 'panel', 'yes', 'icon-speedometer', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(17, 'Proposals', '#', 'Parent menu of proposal', 0, 'panel', 'yes', 'icon-docs', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(18, 'All Proposals', 'proposal-list', 'Sub menu of proposals', 17, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(19, 'Proposal Files', 'proposal-file', 'Sub menu of proposal', 17, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(20, 'Databases', '#', 'Parent menu of databases', 0, 'panel', 'yes', 'icon-book-open', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(21, 'Users', '#', 'Parent menu of users', 0, 'panel', 'yes', 'icon-people', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(22, 'Add New', 'database-add', 'Sub menu of databases', 20, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(23, 'All Databases', 'database-list', 'Sub menu of databases', 20, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(24, 'Add New', 'user-add', 'Sub menu of users', 21, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(25, 'All Users', 'user-list', 'Sub menu of users', 21, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(26, 'Messages', '#', 'Parent menu of messages', 0, 'panel', 'no', 'icon-bubbles', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(27, 'Supports', '#', 'Parent menu of support', 0, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(28, 'Edit Proposal', 'proposal-edit', 'Hidden menu of proposals', 17, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(29, 'Edit Database', 'database-edit', 'Hidden menu of database', 20, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(30, 'Edit User', 'user-edit', 'Hidden menu of user', 21, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_page`
--

CREATE TABLE `iprs_page` (
  `id` int(4) NOT NULL,
  `url` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL,
  `label` enum('admin','user') NOT NULL,
  `description` varchar(256) NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_page`
--

INSERT INTO `iprs_page` (`id`, `url`, `title`, `label`, `description`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, '/iprs/login.php', 'Login', 'user', 'Login page of IPRS BEM ITS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(2, '/iprs/dashboard.php', 'Dashboard', 'user', 'Dashboard page', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(3, '/iprs/register.php', 'Register', 'user', 'Register page of IPRS BEM ITS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(4, '/iprs/proposal.php', 'Input Proposal', 'user', 'Page to input a proposal', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(5, '/iprs/myproposal.php', 'My Proposal', 'user', 'Page to view list of user proposal', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(6, '/iprs/database.php', 'Input Database', 'user', 'Page to add database', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(7, '/iprs/mydatabase.php', 'My Database', 'user', 'Page to view list of user database', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(8, '/iprs/editproposal.php', 'Edit Proposal', 'user', 'Page to edit proposal by user', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(9, '/iprs/editdatabase.php', 'Edit Database', 'user', 'Page to edit database by user', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(10, '/iprs/404.php', '404 - Page Not Found', 'user', 'Error 404 page not found', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(11, '/iprs/profile.php', 'Profile', 'user', 'View the profile of user', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(12, '/iprs/setting.php', 'Setting', 'user', 'User setting pages', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(13, '/iprs/admin/dashboard.php', 'Dashboard - Admin Panel', 'admin', 'Dashboard of admin panel of IPRS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(14, '/iprs/admin/proposal-list.php', 'All Proposals - Admin Panel', 'admin', 'List of all proposal', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(15, '/iprs/admin/proposal-edit.php', 'Edit Proposal - Admin Panel', 'admin', 'Edit proposal user in admin panel', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(16, '/iprs/500.php', '500 - Internal Server Error', 'user', 'Error 500 internal server error', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(17, '/iprs/admin/proposal-file.php', 'Proposal Files - Admin Panel', 'admin', 'View all files of proposal', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(18, '/iprs/admin/database-list.php', 'All Datbaases - Admin Panel', 'admin', 'View all databases by user', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(19, '/iprs/admin/database-edit.php', 'Edit Database - Admin Panel', 'admin', 'Edit database by user', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(20, '/iprs/admin/database-add.php', 'Add Database - Admin Panel', 'admin', 'Add new database from admin panel', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(21, '/iprs/admin/user-list.php', 'User List - Admin Panel', 'admin', 'List of all user in IPRS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(22, '/iprs/admin/user-add.php', 'Add User - Admin Panel', 'admin', 'Add new user', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(23, '/iprs/admin/user-edit.php', 'Edit User - Admin Panel', 'admin', 'Edit a user', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_password_stats`
--

CREATE TABLE `iprs_password_stats` (
  `id` int(4) NOT NULL COMMENT 'User ID Not Auto Increment',
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `stats` enum('changed','not changed') NOT NULL DEFAULT 'not changed',
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `revision` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_password_stats`
--

INSERT INTO `iprs_password_stats` (`id`, `username`, `password`, `stats`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(0, 'admin', '', 'changed', '', '0000-00-00 00:00:00', 'admin', '2018-11-29 23:23:12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_proposal`
--

CREATE TABLE `iprs_proposal` (
  `id` int(8) NOT NULL,
  `username` varchar(32) NOT NULL,
  `input_date` datetime NOT NULL,
  `event_name` varchar(256) NOT NULL,
  `event_type` varchar(128) NOT NULL,
  `event_desc` text NOT NULL,
  `event_time` date NOT NULL,
  `event_target` varchar(256) NOT NULL,
  `event_pic` varchar(64) NOT NULL,
  `event_cp` varchar(16) NOT NULL,
  `stakeholder1` varchar(128) NOT NULL,
  `stakeholder2` varchar(128) NOT NULL,
  `stakeholder3` varchar(128) NOT NULL,
  `stakeholder4` varchar(128) NOT NULL,
  `stakeholder5` varchar(128) NOT NULL,
  `relation1` varchar(128) NOT NULL,
  `relation2` varchar(128) NOT NULL,
  `relation3` varchar(128) NOT NULL,
  `relation4` varchar(128) NOT NULL,
  `relation5` varchar(128) NOT NULL,
  `file_name` varchar(256) NOT NULL,
  `file_type` varchar(256) NOT NULL,
  `file_size` int(64) NOT NULL,
  `stats` enum('approve','disapprove','nothing') NOT NULL DEFAULT 'disapprove',
  `approved_by` varchar(32) NOT NULL,
  `approved_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iprs_setting`
--

CREATE TABLE `iprs_setting` (
  `id` int(4) NOT NULL,
  `name` varchar(32) NOT NULL,
  `value` text NOT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `information` text,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_setting`
--

INSERT INTO `iprs_setting` (`id`, `name`, `value`, `active`, `information`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'system_name', 'IPRS BEM ITS', 'yes', 'Name of the system', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(2, 'assets_folder', 'assets', 'yes', 'Assets folder place', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(3, 'login_background', 'bg.jpg', 'yes', 'Login background image', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(4, 'author', 'unicorn', 'yes', 'The author of IPRS BEM ITS system', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(5, 'logo', 'logo.png', 'yes', 'Official logo of IPRS BEM ITS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(6, 'favicon', 'favicon.png', 'yes', 'Favicon image', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(7, 'footer', '2018 © IPRS BEM ITS', 'yes', 'Footer copyright text', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(9, 'logo_icon', 'assets/images/logo_sm.png', 'yes', 'Official logo icon of IPRS BEM ITS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(10, 'plugins_folder', 'plugins', 'yes', 'The plugins folder place', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(11, 'timezone', 'Asia/Jakarta', 'yes', 'Default timezone of system', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(12, 'base_path', 'iprs', 'yes', 'Base path of the system', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_user`
--

CREATE TABLE `iprs_user` (
  `id` int(4) NOT NULL COMMENT 'User ID',
  `username` varchar(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL COMMENT 'SHA512',
  `salt` varchar(64) NOT NULL COMMENT 'Random String SHA256',
  `email` varchar(128) DEFAULT NULL,
  `level` enum('user','admin','developer') NOT NULL DEFAULT 'user' COMMENT 'User Level Permission',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes' COMMENT 'User Active Status',
  `photo` text COMMENT 'User Photo Profile',
  `form` enum('active','deactive') NOT NULL DEFAULT 'active',
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'Total Profile Changes/Revision'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_user`
--

INSERT INTO `iprs_user` (`id`, `username`, `name`, `password`, `salt`, `email`, `level`, `active`, `photo`, `form`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(0, 'admin', 'Administration', 'd512a07fba67660e7ec77c0e6774212f5718bc9a5458a03f69a5fc73a9ad5da53f7907de4cb2109dd9e2e9c97b8b8a12c05290e1a6b053cdd0e129128466c9de', 'c33ced4203835c500014f6971006ee38b74d3406e24b4f3c11d230db9e252647', 'ayungavis@gmail.com', 'developer', 'yes', '9651_admin_unicorn.jpg', 'deactive', 'admin', '2018-09-03 10:35:15', 'admin', '2018-11-30 06:23:11', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iprs_announcement`
--
ALTER TABLE `iprs_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_comp_type`
--
ALTER TABLE `iprs_comp_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_contact`
--
ALTER TABLE `iprs_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_database`
--
ALTER TABLE `iprs_database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_department`
--
ALTER TABLE `iprs_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_event_type`
--
ALTER TABLE `iprs_event_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_faculty`
--
ALTER TABLE `iprs_faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_log`
--
ALTER TABLE `iprs_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_menu`
--
ALTER TABLE `iprs_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_page`
--
ALTER TABLE `iprs_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_password_stats`
--
ALTER TABLE `iprs_password_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_proposal`
--
ALTER TABLE `iprs_proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_setting`
--
ALTER TABLE `iprs_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_user`
--
ALTER TABLE `iprs_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iprs_announcement`
--
ALTER TABLE `iprs_announcement`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iprs_comp_type`
--
ALTER TABLE `iprs_comp_type`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iprs_database`
--
ALTER TABLE `iprs_database`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `iprs_department`
--
ALTER TABLE `iprs_department`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `iprs_event_type`
--
ALTER TABLE `iprs_event_type`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `iprs_faculty`
--
ALTER TABLE `iprs_faculty`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `iprs_log`
--
ALTER TABLE `iprs_log`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `iprs_menu`
--
ALTER TABLE `iprs_menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `iprs_page`
--
ALTER TABLE `iprs_page`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `iprs_proposal`
--
ALTER TABLE `iprs_proposal`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `iprs_setting`
--
ALTER TABLE `iprs_setting`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `iprs_user`
--
ALTER TABLE `iprs_user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'User ID', AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
