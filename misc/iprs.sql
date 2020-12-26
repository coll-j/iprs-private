-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 04:12 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
  `input_date` date NOT NULL,
  `until_date` date NOT NULL,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `active` enum('yes','no') NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iprs_changelog`
--

CREATE TABLE `iprs_changelog` (
  `id` int(4) NOT NULL,
  `title` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `version` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_changelog`
--

INSERT INTO `iprs_changelog` (`id`, `title`, `content`, `version`, `date`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'IPRS BEM ITS Launched!', '<p>In this day, IPRS BEM ITS first launched in public!</p><p>At that time, the management of BEM ITS was still held by the Wahana Juang cabinet 2016/2018<br></p>', 'v1.00', '2017-05-02', 'admin', '2018-12-22 13:04:34', 'admin', '2018-12-22 13:25:44', 1),
(2, 'IPRS BEM ITS Re-launched', '<p>Because there was a server migration on ITS so that all the data in the IPRS BEM ITS v1.00 was lost, then the IPRS BEM ITS was made from the beginning.</span> During the process of making IPRS BEM ITS v2.00 there was released with a new design.</p>', 'v2.00', '2018-11-30', 'admin', '2018-12-22 13:32:12', 'admin', '2018-12-22 13:40:08', 1),
(3, 'Added Some Features', '<p>In this update, we added some features that is:</p><p>Added Frequently Asked and Question</p><p>Added Changelog</p><p>Added Contact Message<br></p>', 'v2.50', '2018-12-22', 'admin', '2018-12-22 13:38:33', 'admin', '2018-12-22 13:39:13', 1);

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
  `revision` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_contact`
--

INSERT INTO `iprs_contact` (`id`, `address`, `phone`, `website`, `instagram`, `line`, `facebook`, `twitter`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(0, 'Not Found.', '085732405860', 'ayung.udah.pw', 'ayungavis', 'ayungavis', 'ayungavis', 'ayungavis', 'admin', '2018-09-03 10:35:15', 'admin', '2018-12-22 12:52:37', 9),
(1, 'Sekretariat BEM ITS SCC lt. 2 Kampus ITS Sukolilo, Surabaya', '', 'arek.its.ac.id/iprs', '', '', '', '', 'admin', '2018-11-30 06:49:56', '', '0000-00-00 00:00:00', 0),
(2, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 16:54:29', '', '0000-00-00 00:00:00', 0),
(3, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:06:36', '', '0000-00-00 00:00:00', 0),
(4, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:12:17', '', '0000-00-00 00:00:00', 0),
(5, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:12:57', '', '0000-00-00 00:00:00', 0),
(6, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:13:48', '', '0000-00-00 00:00:00', 0),
(7, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:14:40', '', '0000-00-00 00:00:00', 0),
(8, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:14:55', '', '0000-00-00 00:00:00', 0),
(9, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:15:27', '', '0000-00-00 00:00:00', 0),
(10, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:15:51', '', '0000-00-00 00:00:00', 0),
(11, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:16:20', '', '0000-00-00 00:00:00', 0),
(12, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:16:48', '', '0000-00-00 00:00:00', 0),
(13, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:18:55', '', '0000-00-00 00:00:00', 0),
(14, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:19:55', '', '0000-00-00 00:00:00', 0),
(15, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:20:23', '', '0000-00-00 00:00:00', 0),
(16, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:20:59', '', '0000-00-00 00:00:00', 0),
(17, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:21:49', '', '0000-00-00 00:00:00', 0),
(18, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:22:20', '', '0000-00-00 00:00:00', 0),
(19, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:22:50', '', '0000-00-00 00:00:00', 0),
(20, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:23:30', '', '0000-00-00 00:00:00', 0),
(21, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:23:58', '', '0000-00-00 00:00:00', 0),
(22, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:24:23', '', '0000-00-00 00:00:00', 0),
(23, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:24:31', '', '0000-00-00 00:00:00', 0),
(24, 'Student Center Teknik Kimia ITS', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:24:55', 'himatekk', '2018-12-14 21:24:25', 1),
(25, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:25:13', '', '0000-00-00 00:00:00', 0),
(26, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:25:24', '', '0000-00-00 00:00:00', 0),
(27, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:26:31', '', '0000-00-00 00:00:00', 0),
(28, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:26:31', '', '0000-00-00 00:00:00', 0),
(29, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:26:52', '', '0000-00-00 00:00:00', 0),
(30, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:27:15', '', '0000-00-00 00:00:00', 0),
(31, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:27:29', '', '0000-00-00 00:00:00', 0),
(32, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:27:42', '', '0000-00-00 00:00:00', 0),
(33, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:27:48', '', '0000-00-00 00:00:00', 0),
(34, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:28:09', '', '0000-00-00 00:00:00', 0),
(35, 'Departemen Arsitektur Institut Teknologi Sepuluh Nopember Surabaya', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:28:39', 'himasthapati', '2019-01-18 11:18:48', 1),
(36, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:29:04', '', '0000-00-00 00:00:00', 0),
(37, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:29:40', '', '0000-00-00 00:00:00', 0),
(38, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:30:03', '', '0000-00-00 00:00:00', 0),
(39, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:30:06', '', '0000-00-00 00:00:00', 0),
(40, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:30:22', '', '0000-00-00 00:00:00', 0),
(41, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:30:45', '', '0000-00-00 00:00:00', 0),
(42, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:31:05', '', '0000-00-00 00:00:00', 0),
(43, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:31:07', '', '0000-00-00 00:00:00', 0),
(44, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:31:23', '', '0000-00-00 00:00:00', 0),
(45, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:31:49', '', '0000-00-00 00:00:00', 0),
(46, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:32:07', '', '0000-00-00 00:00:00', 0),
(47, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:32:11', '', '0000-00-00 00:00:00', 0),
(48, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:32:33', '', '0000-00-00 00:00:00', 0),
(49, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:32:51', '', '0000-00-00 00:00:00', 0),
(50, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:33:10', '', '0000-00-00 00:00:00', 0),
(51, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:33:21', '', '0000-00-00 00:00:00', 0),
(52, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:34:28', '', '0000-00-00 00:00:00', 0),
(53, '', '', '', '', '', '', '', 'hublubemits', '2018-12-13 17:35:34', '', '0000-00-00 00:00:00', 0),
(54, '', '', '', '', '', '', '', 'hublubemits', '2018-12-27 17:17:39', '', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `iprs_database`
--

INSERT INTO `iprs_database` (`id`, `name`, `phone`, `address`, `position`, `email`, `company`, `comp_types`, `comp_address`, `comp_email`, `comp_contact`, `comp_fax`, `stats`, `department`, `generation`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'Ismanto', '081931038090', '-', 'Field Service Manager', 'ismanto.ismanto@id.abb.com', 'PT. ABB Sakti Industri', 'Industrial and Manufacture Company', '-', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-08-28 21:06:38', '', '0000-00-00 00:00:00', 0),
(2, 'Linda Kusumastuie', '081282125866', '', 'Supply Chain & Prdocution Manager', '', 'PT. Graha Teknomedika', 'Industrial and Manufacture Company', '', '', '', '', 'alumni', '', 1998, 'hublubemits', '2019-08-28 21:09:44', '', '0000-00-00 00:00:00', 0),
(3, 'Steve Mario Virdianto', '08111900713', '', 'Surveyor', 'steve.virdianto@lr.org', 'Lloyd\'s Register Asia', 'Service Company', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-08-28 21:44:03', '', '0000-00-00 00:00:00', 0),
(4, 'Rudy', '081231635661', '', 'staff ahli', '', 'PT. Pelindo III', 'Industrial and Manufacture Company', 'JL. Perak barat no.1', '', '', '', 'alumni', 'Civil Engineering', 0, 'hublubemits', '2019-09-02 22:30:31', '', '0000-00-00 00:00:00', 0),
(5, 'Iwan Setiawan', '082156090128', '', 'Manager Jakarta Representative Off', 'iwan@jkt.ihi-grp.com', 'IHI Corporation', 'Industrial and Manufacture Company', '', '', '', '', 'alumni', '', 95, 'hublubemits', '2019-09-02 22:32:45', '', '0000-00-00 00:00:00', 0),
(6, 'Didik Zainudin', '081316544686', 'Jakarta', 'Senior Manager', '', 'Saipem EPC Indonesia', 'Oil and Gas', 'Jakarta', '', '-', '-', 'alumni', 'Engineering Physics', 1997, 'hublubemits', '2019-09-02 22:33:12', '', '0000-00-00 00:00:00', 0),
(7, 'yunike maris', '087854360592', '', 'Marketting Communications', '', 'PT. insera sena ( polygon bikes indonesia )', 'sepeda polygon', 'JL. Jawa 393, Ds. wadungasih, buduran-sidoarjo 6152, indonesia', 'marcomm@polygonbikes.com', '0318963951', '0318961781', '', '', 0, 'hublubemits', '2019-09-02 22:37:03', '', '0000-00-00 00:00:00', 0),
(8, 'Sony Prijantono', '08128086280', 'Jakarta', 'Learning and resources center dept', '', 'PT Yokogawa Indonesia', 'Service Company', 'Jakarta', '', '', '', 'alumni', 'Engineering Physics', 1989, 'hublubemits', '2019-09-02 22:37:16', '', '0000-00-00 00:00:00', 0),
(9, 'Soni Fahruri', '081290291005 / 089507248921', '', 'founder', 'soni.fahruri@gmail.com', 'Alsonia ', 'Renewable energy solutions', 'Komplek Patra II No. 52, JL. Ahmad Yani by pass, Cempaka Putih jakarta timur, Jakarta pusat 10510', '', '0214267886', '0214216803', '', '', 0, 'hublubemits', '2019-09-02 22:42:40', '', '0000-00-00 00:00:00', 0),
(10, 'Wahyu Widodo', '', '', 'Direktur keuangan SDM dan Umum', 'wahyu.widodo@bijtiport.co.id', 'BIJTI PORT ( PT. Berlian Jasa terminal Indonesia )', 'Service Company', 'Kl. perak barat No. 379, surabaya 60165', '', '0313287120 / 03132915967', '0313291598', 'non_alumni', '', 0, 'hublubemits', '2019-09-02 22:44:02', 'hublubemits', '2019-09-02 22:47:18', 1),
(11, 'Heru Basuki', '0811249435', 'Bandung', 'Dosen MM', 'herbas76@gmail.com', 'Telkom University', 'Dosen Kampus', 'Bandung', '', '', '', 'alumni', 'Engineering Physics', 0, 'hublubemits', '2019-09-02 22:45:21', '', '0000-00-00 00:00:00', 0),
(12, 'Murawan', '08111094078', '', 'operation manager', 'murawan@maerks.com', 'Maersk Line', 'Service Company', '', '', '', '', 'alumni', '', 87, 'hublubemits', '2019-09-02 22:51:24', '', '0000-00-00 00:00:00', 0),
(13, 'Dr. Ir. Andang Bachtiar, M.Sc', '', '', 'Anggota Dewan Energi Nasional ( 2014-2019 )', '', 'dewan energi nasional', 'pemerintahan', 'Kav. 49, JL. Jend Gatot Subroto, kota jakarta selatan, DKI jakarta', 'sekretarian@den.go.id', '02152921621', '02152920190', 'non_alumni', '', 0, 'hublubemits', '2019-09-02 22:51:31', 'hublubemits', '2019-09-02 22:58:42', 2),
(14, 'Ismail Syah', '087777928945', '', 'Marketing Director', 'ismail@infosis-blu.com', 'PT. Certiport', 'Service Company', 'Jakarta', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 22:52:58', '', '0000-00-00 00:00:00', 0),
(15, 'Ronny Liyanto', '', '', 'Director', 'ronny@polygoncycle.com', 'PT. Disploy Indonesia', 'Sepeda polygon', 'Graha polygon JL. agung timur ii blok O4 No. 5, Sunter Agung Podomoro Jakarta utara 14350', '', '0216503677', '0216520269', '', '', 0, 'hublubemits', '2019-09-02 22:55:15', '', '0000-00-00 00:00:00', 0),
(16, 'Andika Dwipramana', '', 'bandung', 'Field Engineer Well Intervention Services', 'andikadwiparana@gmail.com', 'Schlumberger', 'Oil and Gas', 'Malaysia', '', '', '', 'alumni', 'Engineering Physics', 2011, 'hublubemits', '2019-09-02 22:58:36', '', '0000-00-00 00:00:00', 0),
(17, 'Prof Dr Ir Tri Yogi Yuwini DEA', '0818321259', 'Perumdos ITS blok P', 'rektor ITS', '', 'ITS', 'Institusi', 'Sukolilo, Surabaya', '', '', '', 'alumni', 'Mechanical Engineering', 0, 'hublubemits', '2019-09-02 23:02:10', '', '0000-00-00 00:00:00', 0),
(18, 'Dr. Bambang Sumintomo', '0167793619', 'Level 11 wisma R&D, university of malaya ', 'senior lecturer. institute of educational leadership', 'bambang@um.edu.my', 'university of malaya', 'university', 'JL. pantai baru 59990 kuala lumpur malaysia', '', '60322463416', '60322463327', '', '', 0, 'hublubemits', '2019-09-02 23:02:43', '', '0000-00-00 00:00:00', 0),
(19, 'Prof Dr Ing Ir Herman Sasongko', '081330429298', 'Perumdos ITS', 'Wakil Rektor ITS', '', 'ITS', 'Institusi', 'Sukolilo, Surabya', '', '', '', 'alumni', 'Mechanical Engineering', 0, 'hublubemits', '2019-09-02 23:04:31', '', '0000-00-00 00:00:00', 0),
(20, 'Anggiawan Pratama', '08118708020', '', 'Branch Manager', '', 'Fujifilm Indonesia', 'kamera', 'sinarmas land plaza 7th floor #704-705, jl. pemuda 60-70 surabaya, 60271', 'anggi.pratama@fujifilm.com', '0315359175', '0315359176', '', '', 0, 'hublubemits', '2019-09-02 23:07:59', '', '0000-00-00 00:00:00', 0),
(21, 'Ir. Muhammad Faqih, MSA, Ph.D', '08123014093', 'Perumdos ITS', 'Wakil Rektor II ITS', '', 'ITS', 'Institusi', 'Sukolilo, Surabaya', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:09:21', '', '0000-00-00 00:00:00', 0),
(22, 'adilah nur hanifati', '0813333370237', '', 'Community Development Manager', 'adilah.hanifati@go-jek.com', 'GO-BOX', 'Service Company', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:10:52', '', '0000-00-00 00:00:00', 0),
(23, 'Prof. Dr darminto', '081330489698', 'Perumdos ITS', 'Wakil Rektor 4 ITS, Ketua LPPM', '', 'ITS', 'Institusi', 'Sukolilo, Surabaya ', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:12:15', '', '0000-00-00 00:00:00', 0),
(24, 'Nuchan', '08115450701', '', 'Marine Asset Specialist', 'NVZZ@chevron.com', 'Chevron', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-02 23:12:32', '', '0000-00-00 00:00:00', 0),
(25, 'Resieka ( bu ika )', '0811377995', '', 'Telkomsel Youth Community', '', 'Telkomsel', 'telekomunikasi', 'GRAPARI Telkomsel', 'resieka_M_nuryatno@telkomsel.co.id', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:13:53', '', '0000-00-00 00:00:00', 0),
(26, 'Dr Ir Bambang Sampurno M T', '081216840619', 'Perumdos ITS', 'Kepala Lembaga Akademik dan Kemahasiswaan', '', 'ITS', 'Institusi', 'Sukolilo, Surabaya', '', '', '', 'alumni', 'Mechanical Engineering', 0, 'hublubemits', '2019-09-02 23:15:34', '', '0000-00-00 00:00:00', 0),
(27, 'Angga J utomo', '081908199910', '', 'Offline Community Dev. manager', 'angga.jatmiko@liputan6.com', 'PT. Kretif media ( KMK online )', 'liputan', 'SCTV tower 14th FI/ senayan city/ JL.asia afrika lot 19/ jakarta 10270/ indonesia', '', '021319040555', '', '', '', 0, 'hublubemits', '2019-09-02 23:19:56', '', '0000-00-00 00:00:00', 0),
(28, 'Bekti Cahyo Hidayanto SSi M Kom', '085850788475', 'Perumdos ITS', 'Anggota SNMPTN Pusat 2014', '', '', 'education', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:21:35', '', '0000-00-00 00:00:00', 0),
(29, 'Alfan', '086257076430', '', '', '', 'Art and Blue Entertaiment', 'event organizer, talent management', 'JL. Nginden baru vii blok A No. 2 surabaya 60118', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:22:27', '', '0000-00-00 00:00:00', 0),
(30, 'Prof Ir Eko Budi Djatmiko, M Sc., Ph.D.', '0816513170', '', 'Dekan FTK', '', 'ITS', 'Institusi', 'Sukolilo, Surabaya', '', '', '', 'alumni', 'Marine Engineering', 0, 'hublubemits', '2019-09-02 23:25:47', '', '0000-00-00 00:00:00', 0),
(31, 'Ir. Satya Widya Yudha, M.SC', '081314412323', '', 'Anggota komisi VII DPR RI', 'Satyawyudha@gmail.com', 'dewan perwakilan rakyat ( DPR ) RI ', 'pemerintahan', 'Gedung Nusantara I MPR/DPR RI LT. XII / R. 1305 JL. jend. Gatot Soebroto no.6, jakarta 10270', 'bag_humas@dpr.go.id', '0215715924', '0215715925', 'alumni', 'Chemical Engineering', 0, 'hublubemits', '2019-09-02 23:27:18', '', '0000-00-00 00:00:00', 0),
(32, 'Novianto dwi wibowo, ST', '08118112025', 'jl. kalimantan 4/53 jember', 'HALLIBURTON COMPLETION TOOLS  PRODUCT SERVICE LINE - COMPLETION TOOLS  FIELD SERVICE MANAGER', 'ivanperfetto@gmail.com', 'Halliburton', 'Extractive Company', '', '', '', '', 'alumni', 'Mechanical Engineering', 0, 'hublubemits', '2019-09-02 23:31:09', '', '0000-00-00 00:00:00', 0),
(33, 'Dwi Sutjipto', '08123416600', '', 'Direktur Utama', '', 'PT. Pertamina (Persero)', 'Extractive Company', '', '', '', '', 'alumni', 'Chemical Engineering', 0, 'hublubemits', '2019-09-02 23:31:34', '', '0000-00-00 00:00:00', 0),
(34, 'Sulistyo Hadi', '081806550818', '', 'Head of Community Development', 'sulistyo.hadi@liputan6.com', 'PT. Kreatif Media Karya (Liputan 6, KMK Online)', 'Media Partner', 'SCTV Tower 14th fl/Senayan City/Jl. Asia Afrika lot 19/Jakarta 10270/Indonesia', '', '02131904555', '', '', '', 0, 'hublubemits', '2019-09-02 23:32:45', '', '0000-00-00 00:00:00', 0),
(35, 'Aan Saputra', '083894783271', '', 'Anggota IKA ITS Pusat', '', 'IKA ITS Pusat', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:33:20', '', '0000-00-00 00:00:00', 0),
(36, 'Ir. Marwan Batubara, M.Sc', '08111771911', '', 'Direktur Eksekutif', 'marwanbatubara@yahoo.co.id', 'Indonesian Resources Studies (IRESS)', 'Lembaga Independen', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:33:53', '', '0000-00-00 00:00:00', 0),
(37, 'Dalu Nuzlul Kirom', '085648065443', '', 'Direktur Melukis Harapan', '', 'Melukis Harapan', 'Service Company', '', '', '', '', 'alumni', 'Electrical Engineering', 0, 'hublubemits', '2019-09-02 23:35:04', '', '0000-00-00 00:00:00', 0),
(38, 'Ir Irnanda Laksanawan', '0816964717', '', 'Ketua PP IKA ITS Pusat', '', 'IKA ITS Pusat', '', '', '', '', '', 'alumni', 'Mechanical Engineering', 0, 'hublubemits', '2019-09-02 23:37:00', '', '0000-00-00 00:00:00', 0),
(39, 'Adnan Mubarak', '0812222622559', '', 'Innovation Adolescent and Youth Engagement Officer', 'amubarak@unicef.org', 'Unicef (United Nations Children\'s Fund)', 'non profit organization', 'World Trade Center 6, 10th floor. Jalan Jenderal Sudirman Kav.31 Jakarta 12920, Indonesia', '', '021-29968159', '021-5711215', '', '', 0, 'hublubemits', '2019-09-02 23:37:02', '', '0000-00-00 00:00:00', 0),
(40, 'Ir. Agus Cahyono Adi, MT.', '0811163343', '', 'Direktur Pembinaan Program Migas Direktorat Jenderal Minyak dan Gas Bumi Kementerian Energi dan Sumber Daya Mineral Republik Indonesia', 'agusadi@gmail.com', 'Ditjen Migas', 'government', 'Gedung Plaza Centris\r\nJl. H.R Rasuna Said Kav. B-5\r\nJakarta 12910\"', '', '021-5268910', '021-5205469', '', '', 0, 'hublubemits', '2019-09-02 23:39:56', '', '0000-00-00 00:00:00', 0),
(41, 'Rudy Ermawan', '0811339859', '', 'Owner Kampoeng Djawi', 'rudyermawan@yahoo.com', 'Kampoeng Djawi', 'Service Company', '', '', '', '', 'alumni', 'Architecture', 0, 'hublubemits', '2019-09-02 23:40:27', '', '0000-00-00 00:00:00', 0),
(42, 'Ir.Teguh Hari Prasetyo MM', '0821231211374', '', '', 'teguh.hari@iss-indoacademy.com', 'Lean Six Sigma - Indoacademy', 'Service Company', 'Ruko Chi-Walk Marina 6 Citra Harmony', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:42:07', '', '0000-00-00 00:00:00', 0),
(43, 'Rudy', '081231635661', '', 'Staff Ahli PELINDO 3', '', 'PELINDO 3', 'Service Company', '', '', '', '', 'alumni', 'Civil Engineering', 0, 'hublubemits', '2019-09-02 23:42:31', '', '0000-00-00 00:00:00', 0),
(44, 'Hardi Istijanto', '', '', 'Sr. Manager Supply Chain Management', '', 'PC Muriah Ltd.', 'Extractive Company', 'Talavera Office Park\r\nTalavera Suite, 3rd - 10th Floor\r\nJl.  Letjen TB Simatupang Kav. 22-26 Cilandak\r\nJakarta Selatan 12430, Indonesia\"', 'hardi_istijanto@petronas.com.my', '+62-21 7592 5200 ', ' +62-21 7592 5222', 'alumni', 'Mechanical Engineering', 1986, 'hublubemits', '2019-09-02 23:44:31', '', '0000-00-00 00:00:00', 0),
(45, 'Iba Yasid', '0811580416', '', 'PW KALTIM', 'sid_bintoro@yahoo.co.id', 'PW KALTIM', 'Pengurus Wilayah', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:50:16', '', '0000-00-00 00:00:00', 0),
(46, 'Didik Eko BS', '08179502553', '', 'PW JATENG', 'didikekobudisantoso@yahoo.com', 'PW JATENG', 'Pengurus Wilayah', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:52:59', '', '0000-00-00 00:00:00', 0),
(47, 'Agus Rochadi', '08122901427', '', 'Sekum PW JATENG', '', 'PW JATENG', 'Pengurus Wilayah', '', 'ir_aro@yahoo.com', '', '', '', '', 0, 'hublubemits', '2019-09-02 23:54:36', '', '0000-00-00 00:00:00', 0),
(48, 'Abdul Mutholib', '087867521(700) / (708)', '', 'PW SUMUT', 'abd_mutholib@yahoo.co.id', 'PW SUMUT', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-06 14:30:51', '', '0000-00-00 00:00:00', 0),
(49, 'Suyanto', '087879151962', '', 'PW BANTEN', 'suyanto1111@gmail.com', 'PW BANTEN', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-06 14:32:07', '', '0000-00-00 00:00:00', 0),
(50, 'M. Djohan Safri', '0811288963', '', 'PW SUMSEL', 'cakdjo1203@gmail.com', 'PW SUMSEL', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-06 14:33:51', '', '0000-00-00 00:00:00', 0),
(51, 'Agus Santoso S', '08153225879', '', 'PW JABAR', 'ags.setiawan@yahoo.com', 'PW JABAR', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-06 14:34:47', '', '0000-00-00 00:00:00', 0),
(52, 'Rizal Munadi', '08126900406', '', 'PW ACEH', 'rizal.munadi@gmail.com', 'PW ACEH', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-06 14:35:33', '', '0000-00-00 00:00:00', 0),
(53, 'Doddy H. D', '0811526585', '', 'Sekum PW KALTENG', 'ddwinarjawan@gmail.com', 'Sekum PW KALTENG', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-06 14:36:20', '', '0000-00-00 00:00:00', 0),
(54, 'Harry Purwanto', '0811784263', '', 'PUSRI', 'harrypurwanto@yahoo.com', 'PUSRI', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-06 14:37:00', '', '0000-00-00 00:00:00', 0),
(55, 'Dr. Ir. Dwi Soetjipto, MM', '0811664985', '', 'Presiden Direktur', '', 'Semen Indonesia', 'Extractive Company', 'Jl. Veteran, Gresik  61122', '', '031-3981732', '031-3982323', '', '', 0, 'hublubemits', '2019-09-06 14:40:46', '', '0000-00-00 00:00:00', 0),
(56, 'Ir. Bambang Haryanto', '081342759760', '', 'Kepala Departemen Produksi Terak', '', 'PT. Semen Tonasa (Persero)', '', 'Graha Irama LT. 11 Jl. HR. Rasuna Said Kav 1-2 Jakarta 12950', '', '021-5261161-4', '021-5261160', '', '', 0, 'hublubemits', '2019-09-06 14:42:10', '', '0000-00-00 00:00:00', 0),
(57, 'Dr. Ir. Imam Hidayat, MM', '0811378819', '', 'Komisaris', '', 'PT. Semen Padang (Persero)', 'Extractive Company', 'Jl. Raya Indarung, Padang 25237', '', '0751-815250', '0751-815590', '', '', 0, 'hublubemits', '2019-09-06 14:43:27', '', '0000-00-00 00:00:00', 0),
(58, 'Ir. Anas Rosjidi', '0811325266', '', 'Direktur SDM', '', 'PT, Semen Baturaja (Persero)', 'Extractive Company', 'Jl. Abikusno Cokrosuyoso, Kertapati, Palembang 30258', '', '0711-515343', '0711-515680', '', '', 0, 'hublubemits', '2019-09-06 14:44:59', '', '0000-00-00 00:00:00', 0),
(59, 'Ir. Rukmi Hadihartini', '0811190934', '', 'Direktur SDM', '', 'PT Pertamina (Persero) Tbk', 'Extractive Company', 'Jl. Medan Merdeka Timur 1A Gdg Utama Pertamina Pusat Lt  5, Jakarta Pusat', '', '021-3815720', '021-3451410', '', '', 0, 'hublubemits', '2019-09-06 14:46:14', '', '0000-00-00 00:00:00', 0),
(60, 'Ir. Lukman Mahfoedz', '', '', 'Corporate Project Director', '', 'PT. Medco Energi International, Tbk', 'Extractive Company', 'The Energi Building 55 floor SCBD Lot 11A Jl. Jend. Sudirman Jakarta 12190', '', '021-29953013', '021-29951395', '', '', 0, 'hublubemits', '2019-09-06 14:47:40', '', '0000-00-00 00:00:00', 0),
(61, 'I Nyoman G.Wiryanata', '0811650666', '', 'Direktur', '', 'Telkom Indonesia, PT Telekomunikasi Indonesia', 'Service Company', ' Graha Citra Caraka 5th Fl Lt 2 Jl. Gatot Subroto Kav. 52 Jakarta', '', '021- 5215109', '021- 5220 500', '', '', 0, 'hublubemits', '2019-09-06 14:50:26', '', '0000-00-00 00:00:00', 0),
(62, 'Ir. Harsusanto, MM', '', '', 'Direktur Utama', '', 'PT. PAL INDONESIA', 'Industrial and Manufacture Company', 'Jl. Ujung Surabaya, PO BOX 1134', '', '031-3292275', '031-3292530', '', '', 0, 'hublubemits', '2019-09-06 14:52:18', '', '0000-00-00 00:00:00', 0),
(63, 'Ida Bagus Agra Kusuma', '08123005501', '', 'Direktur Pemasaran', '', 'PT. Pupuk Kaltim', 'Extractive Company', 'Plaza Pupuk Kaltim Jl. Kebon Sirih Raya No.6A Jakarta Pusat 10110', '', '021-34503334', '021-3443444', '', '', 0, 'hublubemits', '2019-09-06 14:54:23', '', '0000-00-00 00:00:00', 0),
(64, 'Ir. M. Djohan Safri, MM', '0811788963', '', 'Direktur', '', 'PT. Pupuk Sriwijaya (Persero)', 'Extractive Company', 'Jl. Mayor Zen Palembang 30118', '', '0711-712222', '0711-712100', '', '', 0, 'hublubemits', '2019-09-06 14:55:27', '', '0000-00-00 00:00:00', 0),
(65, 'Ir. Andi Soko Setiabudi', '0818680780', '', 'Direktur Utama', '', 'PT. Krakatau Engineering (Persero)', 'Industrial and Manufacture Company', 'Jl. Asia Raya Kav 03 Kawasan Industri Krakatau, Gdg. K-E, Cilegon 42435 Banten', '', '0254-394100', '0254-391602', '', '', 0, 'hublubemits', '2019-09-06 14:57:44', '', '0000-00-00 00:00:00', 0),
(66, 'Ir. Yerry Idroes', '0811803355', '', 'Direktur ', '', 'PT. Krakatau Steel (Persero)', 'Industrial and Manufacture Company', 'Jl. Gatot Soebroto Kav 54 Wisma Baja, Jakarta Selatan', '', '021-5235574', '', '', '', 0, 'hublubemits', '2019-09-06 14:58:56', '', '0000-00-00 00:00:00', 0),
(67, 'Ir. Sukrisno', '', '', 'Direktur Utama', '', 'PT. Timah (Persero), Tbk', 'Extractive Company', 'Jl. Jenderal Sudirman 51, Pangkal Pinang 33121, Bangka', '', '+62 717 425 8000', '+62 717 425 8080', '', '', 0, 'hublubemits', '2019-09-06 15:03:36', '', '0000-00-00 00:00:00', 0),
(68, 'Ir. Kiswo Darmawan ', '0811-903006', '', 'Direktur Utama', '', 'PT. Adhi Karya (Persero), Tbk', 'Service Company', 'Jl. Raya  Pasar Minggu Km 18, Pasar Minggu Jakarta Selatan', '', '021-7975312', '021-7975311', '', '', 0, 'hublubemits', '2019-09-06 15:05:21', '', '0000-00-00 00:00:00', 0),
(69, 'Ir. Slamet Maryono', '', '', 'Director', '', 'PT. Wijaya Karya ( Persero ) Tbk.', 'Service Company', 'Jl. D.I. Panjaitan Kav. 9, Jakarta 13340, PO.BOX. 4174/JKT', '', '021-8508627', '021-8199713', '', '', 0, 'hublubemits', '2019-09-06 15:29:51', '', '0000-00-00 00:00:00', 0),
(70, 'Ir. Kasman Muhammad, MM', '08123023003', '', 'Direktur Utama', '', 'PT. Istaka Karya ( Persero )', 'Service Company', 'Jl. Iskandarsyah Raya 66, Graha Iskandarsyah Lt 9, Kebayoran Baru Jakarta Selatan', '', '021-7258686', '021-7258787', '', '', 0, 'hublubemits', '2019-09-06 15:31:04', '', '0000-00-00 00:00:00', 0),
(71, 'Ir. Harun Al Rasyid (Canada)', '0811-834254', '', 'Direktur Utama', '', 'PT. Mafhindo Utama', 'Extractive Company', 'Jl. Raya Pasar Minggu 21 - Wisma Haroen, Pancoran Jakarta Selatan', '', '021-7943783', '021-7971109', '', '', 0, 'hublubemits', '2019-09-06 15:32:55', '', '0000-00-00 00:00:00', 0),
(72, 'Ir. Sardjono', '0816-790571', '', 'Direktur Utama', '', 'PT. Media Karya Sentosa', 'Extractive Company', 'Gd. The Energy Lt. 17 , SCBD, Lot 11A Jl. Jend Sudirman Kav 52-53, Daerah Khusus Ibukota Jakarta 12190', '', '021-51400088', '021-51400099', '', '', 0, 'hublubemits', '2019-09-06 15:35:29', '', '0000-00-00 00:00:00', 0),
(73, 'Ir. Lilia Setiprawarti Sukotjo', '0816907661', '', 'Direktur', '', 'PT Alfa Goldland Realty', 'Service Company', 'Jl. Alam Sutera Boulevard Alam Sutera, Serpong, Tangerang', '', '021-5373838', '021-5375050', '', '', 0, 'hublubemits', '2019-09-08 12:14:28', '', '0000-00-00 00:00:00', 0),
(74, 'Ir. Fahmi Shadiq', '', '', 'Direktur ', '', 'PT. Surveyor Indonesia', 'Service Company', 'Graha Surveyor Indonesia, Jl. Gatot Subroto Kav. 56 Jakarta', '', '62-21 526 5526', '62-21 526 5525', '', '', 0, 'hublubemits', '2019-09-08 12:15:59', '', '0000-00-00 00:00:00', 0),
(75, 'Ir. Agus Purnomo', '08123217616', '', 'Direktur Utama', '', 'PT. Barata Indonesia ( Persero )', 'Industrial and Manufacture Company', 'Jl Veteran 241 Gresik - Jawa Timur', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 12:18:05', '', '0000-00-00 00:00:00', 0),
(76, 'Lalak Idiyono M.eng, Ph.D', '085924017610', '', 'President Director', '', 'PT. Boma Bisma Indra ( Persero )', '', 'Jl. KH.M Mansyur 229 Surabaya, 60162', '', '031-3530513, 5330514', '031-3531686', '', '', 0, 'hublubemits', '2019-09-08 12:19:29', '', '0000-00-00 00:00:00', 0),
(77, 'Ir. I Wayan  Karioka, MM', '08127540765', '', 'Director', '', 'PT. Pembangunan Perumahan', 'Service Company', 'Plaza PP - Wisma Subiyanto Jl Letjen TB Simatupang No 57 Pasar Rebo, Jakarta', '', '(021) 840 3883', '(021) 840 3936 & 840 3890', '', '', 0, 'hublubemits', '2019-09-08 12:21:05', '', '0000-00-00 00:00:00', 0),
(78, 'Ir. Bambang Soenjaswono', '08125937699', '', 'Direktur Adm&Keu', '', 'PT INKA (Persero)', 'Industrial and Manufacture Company', 'Jl. Yos Sudarso 71 Madiun 63211', '', '0351-452272-452271', '0351-452275-453555', '', '', 0, 'hublubemits', '2019-09-08 12:22:29', '', '0000-00-00 00:00:00', 0),
(79, 'Nurhudin', '08121200885', '', 'Opeartional Director', '', 'PT. Purna Baja Heckett.', 'Industrial and Manufacture Company', 'Jl. Nitrogen Komp.Krakatau Steel Cilegon - Banten ', '', '0254-371132', '0254-385560', '', '', 0, 'hublubemits', '2019-09-08 12:24:21', '', '0000-00-00 00:00:00', 0),
(80, 'Ir. Abdul Aziez Bahalwan', '0811132079', '', 'Direktur Utama', '', 'PT. Serambi Ilmu Semesta', 'Trading Company', 'Jln. Kemang Timur Raya No. 16 Jakarta Selatan', '', '(021) 7199621', '(021) 7199623', '', '', 0, 'hublubemits', '2019-09-08 12:26:30', '', '0000-00-00 00:00:00', 0),
(81, 'Ir. Asjhar Imron MSE, PhD.', '', '', 'Komisaris Utama', '', 'PT. Dok & Perkapalan Surabaya. ( Persero)', 'Industrial and Manufacture Company', 'Jl. Tanjung Perak Barat 433-435, Surabaya', '', '031-3291286', '', '', '', 0, 'hublubemits', '2019-09-08 12:33:47', '', '0000-00-00 00:00:00', 0),
(82, 'Tjahyono Roesdianto', '0811187787', '', 'Direktur', '', 'PT.Daya Radar Utama (DRU)', 'Service Company', 'Jl. Sindang Laut No. 101 Cilincing Jakarta 14110', '', '021-4302228/4302232', '021-4303039/4303059', '', '', 0, 'hublubemits', '2019-09-08 12:34:47', '', '0000-00-00 00:00:00', 0),
(83, 'Joni Harsono', '0811939313', '', 'Operation Director', '', 'PT. Pertamina Tongkang', 'Extractive Company', 'Jl. Kramat Raya No. 29 Jakarta 10450', '', '021-3106805', '021-31922423', '', '', 0, 'hublubemits', '2019-09-08 13:31:11', '', '0000-00-00 00:00:00', 0),
(84, 'Ir. Widya Purnama', '', '', 'Commissioner', '', 'PT. Perusahaan Gas Negara ( Persero ) Tbk.', 'Extractive Company', 'Jl. K.H. Zainul Arifin No. 20. Jakarta 11140', '', '021-6334838, 6334848 Ext. 6100', '021-6326650', '', '', 0, 'hublubemits', '2019-09-08 13:34:55', '', '0000-00-00 00:00:00', 0),
(85, 'Ir. Syahroni', '081932577888', '', 'Program Manager', '', 'PT. Rekayasa Industri', 'Industrial and Manufacture Company', 'Jl. Kalibata Timur I No. 36, Jakarta Selatan 12740', '', '021-7988700, 7988707 Ext. 1487', '021-7988701, 7988702', '', '', 0, 'hublubemits', '2019-09-08 13:36:24', '', '0000-00-00 00:00:00', 0),
(86, 'Dzulfikar Arifuddin', '', '', 'Process Engineer', '', 'PT. Astra Honda Motor', 'Industrial and Manufacture Company', 'Jl. Raya Pegangsaan 2 Km. 2 Kelapa Gading Jakarta 14250', '', '021-4682-2510 Ext. 55572, 55582', '021-460-2767', '', '', 0, 'hublubemits', '2019-09-08 13:37:39', '', '0000-00-00 00:00:00', 0),
(87, 'Ir. Irsan Haroen, MBA', '08121255959', '', 'President Director', '', 'PT. Domex Energy', 'Extractive Company', 'Jl. Wisma Nugra Santana Jl. Jend. Sudirman Kav. 7-8 Jakarta 10220', '', '021-5700295', '021-5700293', '', '', 0, 'hublubemits', '2019-09-08 13:39:06', '', '0000-00-00 00:00:00', 0),
(88, 'Harry Sasongko Tirtotjondro ', '', '', 'President Director', '', 'Indosat', 'Service Company', 'Jl Medan Merdeka Barat No 21 Gambir Jakarta Pusat', '', '021-3003001', '021-3840389', '', '', 0, 'hublubemits', '2019-09-08 13:40:21', '', '0000-00-00 00:00:00', 0),
(89, 'Zainal Arifin', '081231001001', '', 'Direktur Keuangan', '', 'PT. Kertas Leces', 'Extractive Company', 'Jl. Raya Leces, Leces probolinggo 67202, Jawa Timur', '', '0335-680993', '0335-680954', '', '', 0, 'hublubemits', '2019-09-08 13:43:00', '', '0000-00-00 00:00:00', 0),
(90, 'Joni Harsono', '0811939313', '', 'Operation Director', '', 'PT. Pertamina Tongkang', 'Extractive Company', 'Jl. Kramat Raya No. 29 Jakarta 10450', '', '021-3106805', '021-31922423', '', '', 0, 'hublubemits', '2019-09-08 13:44:08', '', '0000-00-00 00:00:00', 0),
(91, 'Hari Susanto', '', '', 'Direktur Utama', '', 'PT. Harita', 'Extractive Company', 'Komp. Pasadena R1-19 Jl. Caringin 177A Bandung', '', '022-85440760', '022-85440723', '', '', 0, 'hublubemits', '2019-09-08 13:46:03', '', '0000-00-00 00:00:00', 0),
(92, 'E. Antoni M', '', '', 'Director', '', 'PT. Jadimas Agro Prima Abadi', 'Extractive Company', 'Gedung Andika Lt. 3 R. VI Jl. Simpang Dukuh 38-40, Surabaya 60275', '', '031-5467507', '031-5467507', '', '', 0, 'hublubemits', '2019-09-08 13:49:13', '', '0000-00-00 00:00:00', 0),
(93, 'Ir. Siswanto', '085882210269', '', 'Kabid Inkomar & Jasa Umum', '', 'PT. Biro Klasifikasi Indonesia ( Persero )', 'Service Company', 'Jl. Yos Sudarso No. 38-39-40, Tanjung Priok - Jakarta 14320 ', '', '021-4301017, 4301703,4300993', '021-4300139', '', '', 0, 'hublubemits', '2019-09-08 13:50:19', '', '0000-00-00 00:00:00', 0),
(94, 'Bambang Sugiharta', '081514752546', '', 'President Director', '', 'Klaras Pusaka International', 'Extractive Company', 'Jl. H. Saikin 12 Pondok Pinang Kebayoran Lama, Jakarta Selatan 12310', '', '021-7694487, 75913175', '021-70311683', '', '', 0, 'hublubemits', '2019-09-08 13:53:13', '', '0000-00-00 00:00:00', 0),
(95, 'Ir. Rose Kusumanadi', '', '', 'President Director', '', 'PT. IG Property Development', 'Industrial and Manufacture Company', 'STC Senayan 1st Floor, Suite 1073-1078, Jakarta Pusat', '', '021-57931515', '021-57932020', '', '', 0, 'hublubemits', '2019-09-08 14:00:53', '', '0000-00-00 00:00:00', 0),
(96, 'Ketut Rumandiana, Mech Eng', '081572159498', '', 'Manager Program', '', 'PT.Dirgantara Indonesia ( Persero)', 'Service Company', 'Jl. Pajajaran 154 Bandung, 40174', '', '022-6054794', '', '', '', 0, 'hublubemits', '2019-09-08 14:01:46', '', '0000-00-00 00:00:00', 0),
(97, 'Handoko', '0811851761', '', 'Director', '', 'PT. J. Ray Mcdermott Indonesia', 'construction', 'Wisma Tugu II Jl. H.R. Rasuna Said Kav. C. 7-9 Kuningan Jakarta 12920', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 14:03:35', '', '0000-00-00 00:00:00', 0),
(98, 'Arief Wisnu', '081378902', '', 'Managing Director', '', 'PT. Siskem Aneka Timindo', 'Industrial and Manufacture Company', 'Menara MTH Jl. MT. Haryono Kav. 23 Jakarta 128200', '', '021-83782340', '021-83782341', '', '', 0, 'hublubemits', '2019-09-08 14:05:19', '', '0000-00-00 00:00:00', 0),
(99, 'Ir. Evan Eriko Mandar', '08113443545', '', 'President Director', '', 'PT. Garuda Emas Niaga Internusa', 'Extractive Company', 'Ruko Villa Bukit Mas, Blok RO-16, Surabaya', '', '031-5616225', '031-5613243', '', '', 0, 'hublubemits', '2019-09-08 14:14:32', '', '0000-00-00 00:00:00', 0),
(100, 'Ir. Bambang Isworo, MT', '', '', 'Vice Presiden', '', 'PT. Surveyor Indonesia ( Persero )', 'Service Company', 'Graha Surveyor Indonesia Jl. Jenderal Gatot Subroto Kav. 56 Jakarta 12950', '', '021-5265526 Ext. 692', '021-5265525', '', '', 0, 'hublubemits', '2019-09-08 14:16:18', '', '0000-00-00 00:00:00', 0),
(101, 'Ir. Firmansyah', '0811167288', 'PT. Jasa Marga (Persero), Tbk', 'Direktur', '', 'PT. Jasa Marga (Persero), Tbk', 'Service Company', 'Jl. Tol Jagorawi - Plaza Tol TMII, Jakarta Timur', '', '021-8413630 / 8413526', '021-8413540', '', '', 0, 'hublubemits', '2019-09-08 14:18:40', '', '0000-00-00 00:00:00', 0),
(102, 'Ngurah Kresnawan', '0811894503', '', 'Vice Presiden', '', 'BP', 'Extractive Company', 'Perkantoran Akrcadia Hijau Jl. TB Simatupang â?? Jakarta', '', '021-78548070', '', '', '', 0, 'hublubemits', '2019-09-08 14:20:00', '', '0000-00-00 00:00:00', 0),
(103, 'Pudjojoko', '0811826807', '', 'CEO', '', 'PT Surya Mutiara Group', '', 'Gedung Menara DEA ruang 801, Mega Kuningan â?? Jakarta', '', '021-5762945-6', '021-5762947', '', '', 0, 'hublubemits', '2019-09-08 14:21:44', '', '0000-00-00 00:00:00', 0),
(104, 'Ir. Anas Rosjidi', '711515343', '', 'Direktur ', 'tumenggungwiroguno@yahoo.co.id', 'PT Semen Baturaja, Palembang', '', 'Jl. Abikusno Cokrosuyoso Kertapati-Palembang 30258', '', '711515680', '', 'alumni', 'Electrical Engineering', 1971, 'hublubemits', '2019-09-08 14:24:16', '', '0000-00-00 00:00:00', 0),
(105, 'Ir. Bambang Setiobroto', '', '', 'Direktur', '', ' SDM Petrokimia Gresik', '', 'Jl. Argon no 4 Perum Petro Gresik, Jawa Timur', 'setiobroto@petrokimia-gresik.com', '031-3981811', '031-3981722', '', 'Engineering Physics', 1975, 'hublubemits', '2019-09-08 14:25:50', '', '0000-00-00 00:00:00', 0),
(106, 'Ir. Bing Soekianto', '', '', 'Komisaris Presiden Direktur', '', 'PT Aneka Gas Industri', 'Industrial and Manufacture Company', 'Jl. S Parman Kav 77 Wisma 77 lt 6 Jakbar 11410 DKI Jakarta', 'kianbing@pacific.net.id', '021-53670071', '021-53670066', '', 'Chemical Engineering', 1960, 'hublubemits', '2019-09-08 14:27:23', '', '0000-00-00 00:00:00', 0),
(107, 'Ir. Giri Sudaryono', '', '', 'Ka. Biro Pengembangan Pasar', '', ' PT Adhi Karya Tbk', '', 'Jl. Raya Pasar Minggu Km 18 Ps. Minggu Jaksel 12510 DKI Jakarta', '', '021-7975312', '', '', 'Civil Engineering', 1977, 'hublubemits', '2019-09-08 14:28:33', '', '0000-00-00 00:00:00', 0),
(108, 'Ir. Harsusanto MM', '', '', 'Direktur Utama', '', ' PT PAL', 'Industrial and Manufacture Company', '', 'palsub@pal.co.id', '031-3292275', '', '', 'Electrical Engineering', 1974, 'hublubemits', '2019-09-08 14:29:53', '', '0000-00-00 00:00:00', 0),
(109, 'Ir. Lukman Mahfoedz', '', '', 'Coorporate Project Director', '', 'PT Medco Energi International Tbk', '', '', '', '', '', '', 'Mechanical Engineering', 1973, 'hublubemits', '2019-09-08 14:31:00', '', '0000-00-00 00:00:00', 0),
(110, 'Ir. Ida Bagus Agra Kusuma, MM', '', '', 'Direktur Pemasaran', '', 'PT  Pupuk Kalimantan Timur', 'Extractive Company', 'Jl. Kebon Sirih Raya 6A-Plaza Pupuk Kaltim Jakpus 10110 DKI Jakarta', 'agrakusuma@pupukkaltim.com', '021-34503334', '021-3443444', '', 'Chemical Engineering', 1971, 'hublubemits', '2019-09-08 14:32:32', '', '0000-00-00 00:00:00', 0),
(111, 'Ir. M. Djohan Safri, MM.', '', '', 'Sekretaris ', '', 'PT. Pupuk Sriwidjaja', 'Extractive Company', 'Jl. Mayor Zen Palembang ', 'djohan@pusri.co.id', '0711-712111ext', '0711-718037', '', 'Chemical Engineering', 1982, 'hublubemits', '2019-09-08 14:35:07', '', '0000-00-00 00:00:00', 0),
(112, 'Ir. Roosediana Renny Pr., MT.', '', '', 'Ka Dinas Pertahanan dan Pemetaan', '', 'Pemda DKI Jakarta', 'government', '', '', '', '', '', 'Architecture', 1974, 'hublubemits', '2019-09-08 14:36:23', '', '0000-00-00 00:00:00', 0),
(113, 'Dr. Ir. Agus Mulyanto, Msc', '', '', 'Business Development and Technology Director', '', ' PT Media Nusantara Citra', '', '', '', '', '', '', 'Electrical Engineering', 1972, 'hublubemits', '2019-09-08 14:37:08', '', '0000-00-00 00:00:00', 0),
(114, 'Ir. Ngurah Kresnawan, MBA', '', '', 'Vice President', '', 'PT British Petroleum Indonesia', 'Extractive Company', 'Jl. TB Simatupang Kav 88 Perkantoran Hijau Arcadia Cilandak Jaksel 12520, DKI Jakarta', 'Ngurah.k@bp.com', '021-78548070', '', '', 'Mechanical Engineering', 1984, 'hublubemits', '2019-09-08 14:38:44', '', '0000-00-00 00:00:00', 0),
(115, 'Ir. Sardjono', '', '', 'President Director ', 'sardjono@mediaenergi', 'PT Media Karya Sentosa', '', '', '', '', '', '', 'Chemical Engineering', 1982, 'hublubemits', '2019-09-08 14:43:51', '', '0000-00-00 00:00:00', 0),
(116, 'Ir. Sukrisno', '', '', 'Direktur Utama ', '', 'PT Tambang Batu Bara Bukit Asam (Persero) Tbk', 'Extractive Company', 'Jl. HR Rasuna Said Blok X-5 Kav 2-3 Jaksel 12950 DKI Jakarta', 'sukrisno@bukitasam.co.id', '021-5254446', '021-57903603', '', 'Civil Engineering', 1972, 'hublubemits', '2019-09-08 14:55:14', '', '0000-00-00 00:00:00', 0),
(117, 'Ir. Supriyanto', '', '', 'Sekretaris Perusahaan ', '', 'PT PLN (Persero)', '', '', '', '', '', '', 'Electrical Engineering', 1973, 'hublubemits', '2019-09-08 14:56:02', '', '0000-00-00 00:00:00', 0),
(118, 'Ir. Widya Purnama', '', '', 'Independent Commissioner ', '', 'PT Media Nusantara Citra', 'media', 'Jl. Kebon Sirih 17-19 Menara Kebon Sirih lt 27 Jakbar 10340 DKI Jakarta', 'widyap@mncgroup.com', '021-3900885', '021-3909174', '', 'Electrical Engineering', 1977, 'hublubemits', '2019-09-08 14:57:56', '', '0000-00-00 00:00:00', 0),
(119, 'Ir. Yerry Idroes', '', '', 'Project Manager', '', ' PT Krakatau Steel', 'Industrial and Manufacture Company', 'Jl. Gatot Soebroto Kav 54 Wisma Baja Jaksel DKI Jakarta', 'yerry@krakatausteel.com', '021-5235574', '', '', 'Mechanical Engineering', 1978, 'hublubemits', '2019-09-08 15:00:19', '', '0000-00-00 00:00:00', 0),
(120, 'Citra Rosalina Anggraini', '', '', 'Staff ', '', 'Badan Penanggulangan Lumpur Sidoarjo', '', 'Jl. Gayung Kebonsari no.50 Surabaya', 'citra_rosalia@yahoo.com', '031-8285746', '031-8290997', '', '', 0, 'hublubemits', '2019-09-08 15:01:40', '', '0000-00-00 00:00:00', 0),
(121, 'Ikrom Syahri, ST.', '', '', 'Staff Teknis I ', '', 'Badan Penanggulangan Lumpur Sidoarjo', '', 'Jl. Gayung Kebonsari no.50 Surabaya', 'ikromisyahri@yahoo.co.id', '031-8285746', '031-8290732', '', 'Civil Engineering', 2001, 'hublubemits', '2019-09-08 15:07:11', '', '0000-00-00 00:00:00', 0),
(122, 'Yohan Wahyudi', '', '', 'Senior Staff ', '', 'PT PLN (Persero)', '', 'Jl. Ir. P.M. Noor no 33 Banjarmasin', 'bluemoohan@yahoo.com', '0511-4366683', '0511-4366697', '', 'Enviromental Engineering', 1998, 'hublubemits', '2019-09-08 15:08:37', '', '0000-00-00 00:00:00', 0),
(123, 'Eddy Subagyo', '', '', 'Senior Advisory 1 ', '', 'PT PLN Kantor pusat', '', 'Jl. Trinojoyo Blok M1/135 Jakarta Selatan', 'esubagyo2003@yahoo.com', '021-7251274', '', '', 'Mechanical Engineering', 1973, 'hublubemits', '2019-09-08 15:09:53', '', '0000-00-00 00:00:00', 0),
(124, 'Dwi Sutjipto ', '08123416600', '', 'Direktur Utama', '', 'PT. Pertamina (Persero)', '', '', '', '', '', 'alumni', 'Chemical Engineering', 0, 'hublubemits', '2019-09-08 15:11:33', '', '0000-00-00 00:00:00', 0),
(125, 'Dini', '085890011360', '', 'Corporate Secretary', 'corp_sec@indonesiaport.co.id', 'PT. Pelindo II', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:12:43', '', '0000-00-00 00:00:00', 0),
(126, 'Rima Novianti', '08119936009', '', 'Sekretaris Direktur', '', 'PT. Pelindo II', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:13:30', '', '0000-00-00 00:00:00', 0),
(127, 'Tety', '08121372209', '', 'Sekretaris ', '', 'LIPI', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:20:14', '', '0000-00-00 00:00:00', 0),
(128, 'Aan Saputra', '083894783271', '', 'Anggota', '', 'IKA ITS Pusat', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 15:22:01', '', '0000-00-00 00:00:00', 0),
(129, 'Dalu Nuzlul Kirom', '085648065443', '', 'Direktur', '', 'Melukis Harapan', '', '', '', '', '', 'alumni', 'Electrical Engineering', 0, 'hublubemits', '2019-09-08 15:22:47', '', '0000-00-00 00:00:00', 0),
(130, 'Dedy Dahlan', '085220040804', '', 'Penulis', 'dedy.dahlan@gmail.com', 'Penulis', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:23:47', '', '0000-00-00 00:00:00', 0),
(131, 'Ir Irnanda Laksanawan', '0816964717', '', 'Ketua PP IKA ITS', '', 'IKA ITS Pusat', '', '', '', '', '', 'alumni', 'Mechanical Engineering', 80, 'hublubemits', '2019-09-08 15:24:48', '', '0000-00-00 00:00:00', 0),
(132, 'Rudy Ermawan', '0811339859', '', 'Owner', 'rudyermawan@yahoo.com', 'Kampoeng Djawi', '', 'Jl. Gayung Sari Timur, Surabaya', '', '', '', 'alumni', 'Architecture', 0, 'hublubemits', '2019-09-08 15:25:56', '', '0000-00-00 00:00:00', 0),
(133, 'Cici', '08121645867', '', 'Kepala Bidang Pariwisata Kab. Jombang', 'we.citrawatie@gmail.com', 'Dinas Pemuda dan Olahraga, Budaya, dan Pariwisata Kab. Jombang', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:26:37', '', '0000-00-00 00:00:00', 0),
(134, 'Kurniawan Gunadi', '0856 43335000', '', 'Penulis', 'kurniawangunadi@gmail.com', '', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:27:34', '', '0000-00-00 00:00:00', 0),
(135, 'Agustinus Wibowo', '082121911911', '', 'Penulis', 'agustinus@agustinuswibowo.com', '', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:28:30', '', '0000-00-00 00:00:00', 0),
(136, 'Claudia Kaunang', '08557898998', '', '', 'contactclaudiakaunang@gmail.com', '', '', 'Jakarta', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:29:34', '', '0000-00-00 00:00:00', 0),
(137, 'Dudi', '', '', 'Ketua', '', 'PPI Brunei', '', '', '', '61414295678', '', '', '', 0, 'hublubemits', '2019-09-08 15:30:26', '', '0000-00-00 00:00:00', 0),
(138, 'Wanrat Abdullakasim, Ph.D', '66857049416', '', 'Associate Dean for Foreign Affairs', 'fengwra@ku.ac.th', 'Faculty of Engineering, Kasetsart University', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:31:10', '', '0000-00-00 00:00:00', 0),
(139, 'Sasima Juwasophi', '6624708342', '', 'Acting Director', 'sasima.juw@kmutt.ac.id', 'The Office of International Affairs, King Mongkut\'s University of Technology Thonbury', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:31:58', '', '0000-00-00 00:00:00', 0),
(140, 'Parichart Kreaktarvuth', '6624708344', '', 'International Coordinator', 'parichart.kre@kmutt.ac.id', '', '', 'The Office of International Affairs, King Mongkut\'s University of Technology Thonbury', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:32:47', '', '0000-00-00 00:00:00', 0),
(141, 'Joaquin Vicente C. Ferrer', '639209762477', '', '', 'jvc.ferrer@gmail.com', 'University of The Philippines', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:33:31', '', '0000-00-00 00:00:00', 0),
(142, 'Joaquin Vicente C. Ferrer', '639209762477', '', '', 'jvc.ferrer@gmail.com', 'University of The Philippines', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:37:47', '', '0000-00-00 00:00:00', 0),
(143, 'Dyah Kusumawardani', '081212160430', '', 'Asisten Dirjen Komunikasi dan Diplomasi Publik', '', 'Kementrian Luar Negeri RI', '', '', 'dirjenidpset@gmail.com', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:38:57', '', '0000-00-00 00:00:00', 0),
(144, 'Drs. Sigit Priyo Sembodo', '08123174117', '', '', '', 'Disdikbud Kota Surabaya', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:39:34', '', '0000-00-00 00:00:00', 0),
(145, 'Prof. Makarim Wibisono', '', '', 'Guru Besar HI', '', 'Universitas Airlangga', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:40:29', '', '0000-00-00 00:00:00', 0),
(146, 'Satria Rizaldi Alchatib', '085739989181', '', 'Deputy Secretary-General for Community Development', 'ayla.asean@gmail.com', 'ASEAN Youth Leader Association', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:41:39', '', '0000-00-00 00:00:00', 0),
(147, 'Deni', '081234256111', '', 'Protokoler', '', 'Pemkot', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:42:27', '', '0000-00-00 00:00:00', 0),
(148, 'Christian K', '+44 20 8123 1354', '', '', 'info@heysuccess.com', 'Heysuccess', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:42:59', '', '0000-00-00 00:00:00', 0),
(149, 'Andri Saputra', '081389303001', '', 'Program & Business Development Officer   ', 'andri.saputra@kabarkampus.com', 'KabarKampus.com', '', '', 'marketing@kabarkampus.com', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:46:52', '', '0000-00-00 00:00:00', 0),
(150, 'Muhfid', '0822335874675', '', 'Kontributor', '', 'NET TV', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:47:29', '', '0000-00-00 00:00:00', 0),
(151, 'Ingan Malem', '(844)38253353/38257969 ext 114', '', 'First Secretary of Information and Socio Cultural Affairs', 'imalem@gmail.com', 'KBRI HANOI', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:48:25', '', '0000-00-00 00:00:00', 0),
(152, 'Dr. Ir. Paristiyanti Nurwardani, MP', '', '', 'Education and Culture Attache', '', 'KBRI MANILA', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:49:04', '', '0000-00-00 00:00:00', 0),
(153, 'Afifah Nurrosyidah', '0856 488 70571', '', 'PR', '', 'Radio Unair', '', '', 'pr.radiounair@gmail.com', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:50:03', '', '0000-00-00 00:00:00', 0),
(154, 'Luu Tran Vinh Trinh', '(84)947562565', '', '', 'luutranvinhtrinh@gmail.com', '', '', 'Vietnam', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:50:53', '', '0000-00-00 00:00:00', 0),
(155, 'Ratih', '', '', 'Sekretariat ASEAN', 'ratih@asean.org', 'Sekretariat ASEAN', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:57:35', '', '0000-00-00 00:00:00', 0),
(156, 'Wisnu Darmawan', '0817173188, 08158073188', '', 'Manager Dian Sastro', 'wisnu_ga@yahoo.com', '', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:58:10', '', '0000-00-00 00:00:00', 0),
(157, 'George Lantu', '081282237457', '', 'Direktur Kerjasama Fungsional ASEAN', '', 'Kementrian Luar Negeri RI', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 15:58:54', '', '0000-00-00 00:00:00', 0),
(158, 'Aula', '08111152480', '', 'Sekretaris Menteri LN', '', 'Kementrian Luar Negeri RI', '', '', 'setmenlu@kemlu.go.id', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:05:19', '', '0000-00-00 00:00:00', 0),
(159, 'Monica', '08111981874', '', 'Sekretaris Wakil Menteri LN', '', 'Kementrian Luar Negeri RI', '', '', 'setwamen@kemlu.go.id', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:32:56', '', '0000-00-00 00:00:00', 0),
(160, 'Retno Marsudi', '081586409313', '', 'Menteri LN', 'ratnasuranti@gmail.com', 'Kementrian Luar Negeri RI', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:40:53', '', '0000-00-00 00:00:00', 0),
(161, 'Arief Yahya', '0811881234', '', 'Menteri Pariwisata', '', 'Kementrian Pariwisata RI', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:41:33', '', '0000-00-00 00:00:00', 0),
(162, 'Imam Nahrawi', '0811194972', '', 'Menpora', '', 'Kementrian Pemuda dan Olahraga', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:42:06', '', '0000-00-00 00:00:00', 0),
(163, 'Susi Pudjiastuti', '0811211365', '', 'Menteri Kelautan dan Perikanan', '', 'Kementrian Kelautan dan Perikanan RI', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:43:09', '', '0000-00-00 00:00:00', 0),
(164, 'Anisa', '081299074650', '', 'Sekretaris Dirjen Informasi dan Diplomasi Publik', 'dirjenidpset@gmail.com', 'Kementrian Luar Negeri RI', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:43:53', '', '0000-00-00 00:00:00', 0),
(165, 'Ugan Gandar', '081932412037', '', 'Mantan Ketua FSPPB', '', 'Pertamina', 'Extractive Company', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:44:35', '', '0000-00-00 00:00:00', 0),
(166, 'Pieter Tobing', '08111755644', '', 'Commercial Director', 'pieter.tobing@manilawater.com', 'PT. Manila Water Asia Pacific (Pty) Ltd', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:45:20', '', '0000-00-00 00:00:00', 0),
(167, 'Dipl.Ing. Roestiandi Tsamanov (manov)', '08129971584', '', 'CEO', '', 'PT. DSI Laser Intl. Indonesia', 'Industrial and Manufacture Company', '', 'info@dsilaser.co.id', '', '', '', '', 0, 'hublubemits', '2019-09-08 16:46:11', '', '0000-00-00 00:00:00', 0),
(168, 'Rudy', '081231635661', '', 'Staff ahli', '', 'PELINDO 3', '', '', '', '', '', 'alumni', 'Civil Engineering', 0, 'hublubemits', '2019-09-08 16:47:05', '', '0000-00-00 00:00:00', 0),
(169, 'Iba Yasid', '0811580416', '', 'Ketua', 'sid_bintoro@yahoo.co.id', 'PW KALTIM', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 16:49:33', '', '0000-00-00 00:00:00', 0),
(170, 'Didik Eko BS', '08179502553', '', 'Ketua', 'didikekobudisantoso@yahoo.com', 'PW JATENG', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 16:50:30', '', '0000-00-00 00:00:00', 0),
(171, 'Agus Rochadi', '08122901427', '', 'Sekretaris', 'ir_aro@yahoo.com', 'PW JATENG', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 16:51:26', '', '0000-00-00 00:00:00', 0),
(172, 'Abdul Mutholib', '087867521(700) / (708)', '', 'Ketua', 'abd_mutholib@yahoo.co.id', 'PW SUMUT', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 16:52:18', '', '0000-00-00 00:00:00', 0),
(173, 'Suyanto', '087879151962', '', 'Ketua', 'suyanto1111@gmail.com', 'PW BANTEN', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 16:52:59', '', '0000-00-00 00:00:00', 0),
(174, 'M. Djohan Safri', '0811288963', '', 'Ketua', 'cakdjo1203@gmail.com', 'PW SUMSEL', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 16:53:52', '', '0000-00-00 00:00:00', 0),
(175, 'Agus Santoso S', '08153225879', '', 'Ketua', 'ags.setiawan@yahoo.com', 'PW JABAR', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 16:58:33', '', '0000-00-00 00:00:00', 0),
(176, 'Rizal Munadi', '08126900406', '', 'Ketua', 'rizal.munadi@gmail.com', 'PW ACEH', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 16:59:29', '', '0000-00-00 00:00:00', 0),
(177, 'Doddy H. D', '0811526585', '', 'Sekum', 'ddwinarjawan@gmail.com', 'PW KALTENG', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 17:00:16', '', '0000-00-00 00:00:00', 0),
(178, 'Harry Purwanto', '0811784263', '', '', 'harrypurwanto@yahoo.com', 'PUSRI', '', '', '', '', '', 'alumni', '', 0, 'hublubemits', '2019-09-08 17:01:04', '', '0000-00-00 00:00:00', 0),
(179, 'Ugan Gandar, Pak Agung', '', '', 'Mantan Ketua FSPPB pertamina, Ketua HRD PT CF', '', 'Pertamina, PT Cilegon Fabricator', '', '', '', '12569741146324', '', '', '', 0, 'hublubemits', '2019-09-08 17:01:56', '', '0000-00-00 00:00:00', 0),
(180, 'Budhianto Marbun', '08179958835', '', 'Pemilik', '', 'CV. Lamtama', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 17:02:31', '', '0000-00-00 00:00:00', 0),
(181, 'Zaid Marhi Nugraha (ARI)', '089664828852', '', 'Presiden BEM 2012/2013', '', 'Makaryo Cafe', '', 'Jalan Rungkut Menanggal Harapan Blok O/36 Surabaya', '', '', '', 'alumni', 'Engineering Physics', 2009, 'hublubemits', '2019-09-08 17:03:48', '', '0000-00-00 00:00:00', 0),
(182, 'Dalu Kirom', '081232632030', '', 'Presiden BEM 2010/2011', '', '', '', '', '', '', '', 'alumni', 'Electrical Engineering', 2007, 'hublubemits', '2019-09-08 17:05:02', '', '0000-00-00 00:00:00', 0),
(183, 'Imron Gozali', '085655529090', '', 'Presiden BEM 2011/2012', '', '', '', '', '', '', '', 'alumni', 'Chemical Engineering', 2008, 'hublubemits', '2019-09-08 17:05:47', '', '0000-00-00 00:00:00', 0),
(184, 'Ir. Kamir Raziudin Brata, M.Sc', '', '', 'Dosen', 'kamirbrata@gmail.com', 'KM IPB', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-09-08 17:06:26', '', '0000-00-00 00:00:00', 0),
(185, 'Denny Ferdiansyah', '085730189612', '', 'HRD', 'ferdyansyah.deny@gmail.com', 'Kementerian Sosial Masyarakat', '', '', '', '', '', 'alumni', 'Regional and Urban Planning', 2008, 'hublubemits', '2019-09-08 17:09:22', '', '0000-00-00 00:00:00', 0),
(186, 'Mohammad Sofyan', '+6281319531605', '', 'Direktur Operasional', 'sofyan_mohammad@yahoo.com', 'Jasa Marga', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-11-20 20:42:52', '', '0000-00-00 00:00:00', 0),
(187, 'kak indri', '08118073571', '', '-', 'unvr.indonesia@unilever.com', 'Unilever', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-11-26 16:41:18', '', '0000-00-00 00:00:00', 0),
(188, 'Aris', '08175181001', 'Kenjeran', '', '', 'Wika ', '', '', '', '', '', 'alumni', 'Civil Engineering', 0, 'hublubemits', '2019-11-26 16:43:37', '', '0000-00-00 00:00:00', 0),
(189, 'Wiwin', '08121765783', '', '', '', 'PT Garam', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-03 20:05:47', '', '0000-00-00 00:00:00', 0),
(190, 'Jesslyn', '087779785626', '', '', '', 'GOJEK', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 08:13:24', '', '0000-00-00 00:00:00', 0),
(191, 'Hesti', '082234854276', '', '', '', 'Telkomsel', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 08:13:53', '', '0000-00-00 00:00:00', 0),
(192, 'Niela', '08111880120', '', '', '', 'Telkomsel', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 08:14:14', '', '0000-00-00 00:00:00', 0),
(193, 'Vansessa Velindra', '082139229209', '', '', '', 'Oakwood Hotel', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 08:14:51', '', '0000-00-00 00:00:00', 0),
(194, 'Sammy', '08993332448', '', '', '', 'Fabercastel Surabaya', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 08:15:12', '', '0000-00-00 00:00:00', 0),
(195, 'Alex', '081217174702', '', '', '', 'Xiaomi Surabaya', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 08:15:32', '', '0000-00-00 00:00:00', 0),
(196, 'Edo', '081259949899', '', '', '', 'Realme Surabay', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 08:15:48', '', '0000-00-00 00:00:00', 0),
(197, 'Hilmy', '08970757079', '', '', '', 'Garuda Indonesia', '', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 08:16:06', '', '0000-00-00 00:00:00', 0),
(198, 'Data Iranata', '08121663533', 'surabaya', 'Dosen teknik sipil', '', 'Teknik Sipil ITS', '', '', '', '', '', 'alumni', 'Civil Engineering', 0, 'hublubemits', '2019-12-04 21:40:20', '', '0000-00-00 00:00:00', 0);
INSERT INTO `iprs_database` (`id`, `name`, `phone`, `address`, `position`, `email`, `company`, `comp_types`, `comp_address`, `comp_email`, `comp_contact`, `comp_fax`, `stats`, `department`, `generation`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(199, 'Pudjo Adji', '081331808909', '', 'Dosen Teknik Sipil', '', 'Institut Teknologi Sepuluh Nopember', '', 'Surabaya', '', '', '', '', 'Civil Engineering', 0, 'hublubemits', '2019-12-04 21:42:01', '', '0000-00-00 00:00:00', 0),
(200, 'Bambang Piscesa', '0899069829', '', 'Dosen Tenik SIpil', '', 'Institut Teknologi Sepuluh Nopember', '', '', '', '', '', '', 'Civil Engineering', 0, 'hublubemits', '2019-12-04 21:43:36', '', '0000-00-00 00:00:00', 0),
(201, 'Ervina Ahyudanari', '081330607601', '', 'Dosen', '', 'Institut Teknologi Sepuluh Nopember', '', '', '', '', '', 'alumni', 'Civil Engineering', 0, 'hublubemits', '2019-12-04 21:45:30', '', '0000-00-00 00:00:00', 0),
(202, 'Putri', '08111892299', '', '', '', 'PT BASF', 'Industrial and Manufacture Company', '', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 21:47:08', '', '0000-00-00 00:00:00', 0),
(203, 'Teo', '082219994989', '', 'second owner', '', 'Janji Jiwa', '', 'Jl Soekarno no 89, Surabaya', '', '', '', '', '', 0, 'hublubemits', '2019-12-04 21:51:31', '', '0000-00-00 00:00:00', 0);

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
(10, 'Visit to Government', 'yes', 'admin', '2018-09-03 10:35:15', 'admin', '2018-12-16 23:56:48', 3),
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
-- Table structure for table `iprs_faq`
--

CREATE TABLE `iprs_faq` (
  `id` int(2) NOT NULL,
  `question` varchar(128) NOT NULL,
  `answer` text NOT NULL,
  `active` enum('yes','no') NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `iprs_log`
--

INSERT INTO `iprs_log` (`id`, `ip`, `username`, `slug`, `stats`, `logdate`, `activity`) VALUES
(1, '36.81.155.82', 'admin', 'login', 'success', '2018-11-30 06:48:35', 'Successfully login.'),
(2, '36.81.155.82', 'admin', 'admin', 'success', '2018-11-30 06:49:56', 'Successfully added user hublubemits!'),
(3, '36.81.155.82', 'admin', 'admin', 'edit', '2018-11-30 06:50:34', 'hublubemits\'s account information successfully changed.'),
(4, '36.81.155.82', 'admin', 'login', 'success', '2018-11-30 06:54:49', 'Successfully login.'),
(5, '139.228.37.22', 'hublubemits', 'login', 'success', '2018-11-30 14:18:01', 'Successfully login.'),
(6, '114.4.214.205', 'hublubemits', 'login', 'success', '2018-12-03 19:50:55', 'Successfully login.'),
(7, '182.1.110.49', 'hublubemits', 'login', 'success', '2018-12-03 19:51:08', 'Successfully login.'),
(8, '114.4.212.197', 'hublubemits', 'login', 'success', '2018-12-03 19:51:28', 'Successfully login.'),
(9, '180.251.88.18', 'admin', 'login', 'success', '2018-12-07 16:47:25', 'Successfully login.'),
(10, '180.251.88.18', 'admin', 'login', 'success', '2018-12-07 18:16:12', 'Successfully login.'),
(11, '180.251.88.18', 'hublubemits', 'login', 'success', '2018-12-07 18:16:39', 'Successfully login.'),
(12, '180.251.88.18', 'hublubemits', 'login', 'success', '2018-12-07 18:35:11', 'Successfully login.'),
(13, '180.251.88.18', 'admin', 'login', 'success', '2018-12-07 18:35:54', 'Successfully login.'),
(14, '202.43.249.61', 'hublusabi1819', 'login', 'error', '2018-12-07 19:18:11', 'Login failed! Username not found.'),
(15, '202.43.249.61', 'hublubemits', 'login', 'success', '2018-12-07 19:26:13', 'Successfully login.'),
(16, '125.164.159.80', 'admin', 'login', 'success', '2018-12-10 05:17:13', 'Successfully login.'),
(17, '125.164.159.80', 'admin', 'login', 'success', '2018-12-10 11:35:21', 'Successfully login.'),
(18, '180.251.92.37', 'admin', 'login', 'success', '2018-12-12 18:52:03', 'Successfully login.'),
(19, '139.228.37.114', 'hublubemits', 'login', 'success', '2018-12-13 15:54:57', 'Successfully login.'),
(20, '139.228.37.114', 'hublusabi1819', 'login', 'error', '2018-12-13 16:42:19', 'Login failed! Username not found.'),
(21, '139.228.37.114', 'hublusabi', 'login', 'error', '2018-12-13 16:42:24', 'Login failed! Username not found.'),
(22, '139.228.37.114', 'hublusabi', 'login', 'error', '2018-12-13 16:42:28', 'Login failed! Username not found.'),
(23, '139.228.37.114', 'hublubemits', 'login', 'success', '2018-12-13 16:43:02', 'Successfully login.'),
(24, '139.228.37.114', 'hublubemits', 'login', 'error', '2018-12-13 16:43:05', 'Login failed! Password doesn\'t match.'),
(25, '139.228.37.114', 'hublubemits', 'login', 'success', '2018-12-13 16:43:08', 'Successfully login.'),
(26, '139.228.37.114', 'hublubemits', 'login', 'success', '2018-12-13 16:43:12', 'Successfully login.'),
(27, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 16:54:29', 'Successfully added user inkabemits!'),
(28, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:06:36', 'Successfully added user menkoperkerakanbemits!'),
(29, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:12:17', 'Successfully added user bakorits!'),
(30, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:12:57', 'Successfully added user ieccits!'),
(31, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:13:48', 'Successfully added user bemfs!'),
(32, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:14:40', 'Successfully added user menkodinamobemits!'),
(33, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:14:55', 'Successfully added user bemfti!'),
(34, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:15:27', 'Successfully added user bemfadp!'),
(35, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:15:51', 'Successfully added user bemftslk!'),
(36, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:16:20', 'Successfully added user bemftk!'),
(37, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:16:48', 'Successfully added user bemftik!'),
(38, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:18:55', 'Successfully added user himasika!'),
(39, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:19:55', 'Successfully added user himatika!'),
(40, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:20:23', 'Successfully added user himasta!'),
(41, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:20:59', 'Successfully added user himadata!'),
(42, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:21:49', 'Successfully added user himka!'),
(43, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:22:20', 'Successfully added user himabits!'),
(44, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:22:50', 'Successfully added user hmm!'),
(45, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:23:30', 'Successfully added user hmdm!'),
(46, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:23:58', 'Successfully added user himatektro!'),
(47, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:24:23', 'Successfully added user himad3kim!'),
(48, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:24:31', 'Successfully added user himad3tektro!'),
(49, '139.228.37.114', 'hublubemits', 'login', 'success', '2018-12-13 17:24:39', 'Successfully login.'),
(50, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:24:55', 'Successfully added user himatekk!'),
(51, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:25:13', 'Successfully added user ristekbemits!'),
(52, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:25:24', 'Successfully added user bemfmksd!'),
(53, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:26:31', 'Successfully added user sosmasbemits!'),
(54, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:26:31', 'Successfully added user hmtf!'),
(55, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:26:52', 'Successfully added user hmti!'),
(56, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:27:15', 'Successfully added user hmmt!'),
(57, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:27:29', 'Successfully added user bmsa!'),
(58, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:27:43', 'Successfully added user perkombemits!'),
(59, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:27:48', 'Successfully added user hms!'),
(60, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:28:09', 'Successfully added user hmds!'),
(61, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:28:39', 'Successfully added user himasthapati!'),
(62, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:29:04', 'Successfully added user hmtl!'),
(63, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:29:40', 'Successfully added user hmpl!'),
(64, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:30:03', 'Successfully added user himage!'),
(65, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:30:06', 'Successfully added user adkesmabemits!'),
(66, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:30:22', 'Successfully added user himaide!'),
(67, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:30:45', 'Successfully added user hmdi!'),
(68, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:31:05', 'Successfully added user hmtg!'),
(69, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:31:07', 'Successfully added user aksprobemits!'),
(70, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:31:23', 'Successfully added user himatekpal!'),
(71, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:31:49', 'Successfully added user himasiskal!'),
(72, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:32:07', 'Successfully added user himatekla!'),
(73, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:32:11', 'Successfully added user dagribemits!'),
(74, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:32:33', 'Successfully added user himaseatrans!'),
(75, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:32:51', 'Successfully added user hmtc!'),
(76, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:33:10', 'Successfully added user hmsi!'),
(77, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:33:21', 'Successfully added user psdmbemits!'),
(78, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:34:28', 'Successfully added user kominfobemits!'),
(79, '139.228.37.114', 'hublubemits', 'admin', 'success', '2018-12-13 17:35:34', 'Successfully added user kpbemits!'),
(80, '202.46.129.184', 'hublubemits', 'login', 'success', '2018-12-13 19:25:06', 'Successfully login.'),
(81, '202.46.129.184', 'presbemits', 'login', 'error', '2018-12-13 20:03:22', 'Login failed! Username not found.'),
(82, '202.46.129.184', 'hmm', 'login', 'success', '2018-12-13 20:03:55', 'Successfully login.'),
(83, '36.82.103.78', 'hublubemits', 'login', 'success', '2018-12-13 23:43:00', 'Successfully login.'),
(84, '36.82.103.17', 'hublubemits', 'login', 'success', '2018-12-14 00:03:59', 'Successfully login.'),
(85, '110.139.52.161', 'hublubemits', 'login', 'success', '2018-12-14 03:01:47', 'Successfully login.'),
(86, '202.46.129.184', 'himasta', 'login', 'success', '2018-12-14 15:15:27', 'Successfully login.'),
(87, '202.46.129.184', 'hublubemits', 'login', 'success', '2018-12-14 21:14:33', 'Successfully login.'),
(88, '114.125.85.211', 'irsyadaufa', 'login', 'error', '2018-12-14 21:14:47', 'Login failed! Username not found.'),
(89, '114.125.124.70', 'himatekk', 'login', 'success', '2018-12-14 21:17:03', 'Successfully login.'),
(90, '120.188.38.246', 'himasthapati', 'login', 'success', '2018-12-14 21:18:11', 'Successfully login.'),
(91, '114.125.124.70', 'himatekk', 'user', 'error', '2018-12-14 21:20:56', 'Failed change photo because format file not suitable (format: ).'),
(92, '182.1.100.17', 'hmtg', 'login', 'success', '2018-12-14 21:21:05', 'Successfully login.'),
(93, '114.125.124.70', 'himatekk', 'user', 'edit', '2018-12-14 21:21:20', 'Account information successfully changed.'),
(94, '114.125.86.70', 'himatekla', 'login', 'success', '2018-12-14 21:21:54', 'Successfully login.'),
(95, '114.125.124.70', 'himatekk', 'user', 'edit', '2018-12-14 21:23:23', 'Account information successfully changed.'),
(96, '114.125.124.70', 'himatekk', 'user', 'edit', '2018-12-14 21:23:35', 'Account information successfully changed.'),
(97, '114.125.124.70', 'himatekk', 'user', 'edit', '2018-12-14 21:24:26', 'Account information successfully changed.'),
(98, '112.215.200.243', 'hmti', 'login', 'success', '2018-12-14 21:24:44', 'Successfully login.'),
(99, '139.228.208.67', 'himatektro', 'login', 'error', '2018-12-14 21:36:08', 'Login failed! Password doesn\'t match.'),
(100, '139.228.208.67', 'himatektro', 'login', 'success', '2018-12-14 21:36:14', 'Successfully login.'),
(101, '182.1.86.162', 'hmtf', 'login', 'success', '2018-12-14 22:04:49', 'Successfully login.'),
(102, '36.80.66.250', 'himatekk', 'login', 'success', '2018-12-14 22:12:36', 'Successfully login.'),
(103, '103.86.148.161', 'hublubemits', 'login', 'success', '2018-12-15 16:34:29', 'Successfully login.'),
(104, '36.80.65.103', 'admin', 'login', 'error', '2018-12-22 12:44:08', 'Login failed! Password doesn\'t match.'),
(105, '36.80.65.103', 'admin', 'login', 'success', '2018-12-22 12:44:11', 'Successfully login.'),
(106, '36.80.65.103', 'admin', 'user', 'edit', '2018-12-22 12:52:34', 'Account information successfully changed.'),
(107, '36.80.65.103', 'admin', 'user', 'edit', '2018-12-22 12:52:37', 'Account information successfully changed.'),
(108, '36.80.65.103', 'admin', 'admin', 'success', '2018-12-22 13:04:34', 'A changelog has been created (Version: v1.00)'),
(109, '36.80.65.103', 'admin', 'admin', 'edit', '2018-12-22 13:25:44', 'Changelo version v1.00 has been updated.'),
(110, '36.80.65.103', 'admin', 'admin', 'success', '2018-12-22 13:32:13', 'A changelog has been created (Version: v2.00)'),
(111, '36.80.65.103', 'admin', 'admin', 'success', '2018-12-22 13:38:33', 'A changelog has been created (Version: v2.50)'),
(112, '36.80.65.103', 'admin', 'admin', 'edit', '2018-12-22 13:39:13', 'Changelo version v2.50 has been updated.'),
(113, '36.80.65.103', 'admin', 'admin', 'edit', '2018-12-22 13:40:08', 'Changelo version v2.00 has been updated.'),
(114, '36.80.65.103', 'admin', 'message', 'success', '2018-12-22 13:41:46', 'Message sent (Subject: Test'),
(115, '36.70.9.26', 'hublubemits', 'login', 'success', '2018-12-27 17:12:50', 'Successfully login.'),
(116, '36.70.9.26', 'hublubemits', 'admin', 'success', '2018-12-27 17:17:39', 'Successfully created user himatekins.'),
(117, '36.70.9.26', 'himatekins', 'login', 'success', '2018-12-27 17:18:48', 'Successfully login.'),
(118, '36.70.9.26', 'hublubemits', 'login', 'success', '2018-12-27 20:08:01', 'Successfully login.'),
(119, '36.82.98.93', 'admin', 'login', 'success', '2019-01-02 23:42:20', 'Successfully login.'),
(120, '180.245.71.218', 'hublubemits', 'login', 'success', '2019-01-08 23:47:36', 'Successfully login.'),
(121, '182.1.121.228', 'admin', 'login', 'success', '2019-01-17 14:03:43', 'Successfully login.'),
(122, '125.165.146.129', 'himasthapati', 'login', 'success', '2019-01-18 11:16:48', 'Successfully login.'),
(123, '125.165.146.129', 'himasthapati', 'user', 'edit', '2019-01-18 11:17:43', 'Account information successfully changed.'),
(124, '125.165.146.129', 'himasthapati', 'user', 'edit', '2019-01-18 11:18:48', 'Account information successfully changed.'),
(125, '125.165.146.129', 'himasthapati', 'user', 'error', '2019-01-18 11:20:33', 'Edit failed! Phone number was entered is not numeric.'),
(126, '125.165.146.129', 'himasthapati', 'login', 'success', '2019-01-18 15:30:26', 'Successfully login.'),
(127, '139.192.27.214', 'admin', 'login', 'error', '2019-03-08 21:56:15', 'Login failed! Password doesn\'t match.'),
(128, '139.192.27.214', 'admin', 'login', 'success', '2019-03-08 21:56:18', 'Successfully login.'),
(129, '36.81.122.78', 'bemfti', 'login', 'success', '2019-03-10 21:58:26', 'Successfully login.'),
(130, '180.245.149.58', 'admin', 'login', 'error', '2019-03-18 14:01:34', 'Login failed! Password doesn\'t match.'),
(131, '180.245.149.58', 'admin', 'login', 'success', '2019-03-18 14:01:39', 'Successfully login.'),
(132, '180.245.149.58', 'admin', 'login', 'success', '2019-03-18 14:17:19', 'Successfully login.'),
(133, '180.245.149.58', 'ayungavis', 'login', 'error', '2019-03-18 14:17:39', 'Login failed! Username not found.'),
(134, '180.245.149.58', 'hublubemits', 'login', 'success', '2019-03-18 14:17:45', 'Successfully login.'),
(135, '180.245.149.58', 'himatekins', 'login', 'success', '2019-03-18 14:18:00', 'Successfully login.'),
(136, '180.245.149.58', 'admin', 'login', 'success', '2019-03-18 14:42:49', 'Successfully login.'),
(137, '158.140.187.210', '\\\' or 1=1 limit 1 -- -+', 'login', 'error', '2019-06-26 21:43:45', 'Login failed! Username not found.'),
(138, '202.46.129.184', '05111740000132', 'login', 'error', '2019-07-04 11:43:55', 'Login failed! Username not found.'),
(139, '125.161.189.40', '\\\'', 'login', 'error', '2019-08-11 12:03:11', 'Login failed! Username not found.'),
(140, '140.0.84.166', 'fadhilasyahira', 'login', 'error', '2019-08-27 20:03:11', 'Login failed! Username not found.'),
(141, '140.0.84.166', 'fadhilasyahira', 'login', 'error', '2019-08-27 20:03:40', 'Login failed! Username not found.'),
(142, '140.0.84.166', 'hublubemits', 'login', 'success', '2019-08-27 20:05:21', 'Successfully login.'),
(143, '103.86.148.150', 'hublubemits', 'login', 'success', '2019-08-28 20:52:28', 'Successfully login.'),
(144, '103.86.148.150', 'hublubemits', 'admin', 'success', '2019-08-28 21:06:38', 'Add database success! (Ismanto)'),
(145, '103.86.148.150', 'hublubemits', 'admin', 'success', '2019-08-28 21:09:44', 'Add database success! (Linda Kusumastuie)'),
(146, '103.86.148.150', 'hublubemits', 'admin', 'success', '2019-08-28 21:44:03', 'Add database success! (Steve Mario Virdianto)'),
(147, '103.86.148.150', 'hublubemits', 'login', 'success', '2019-08-28 21:44:09', 'Successfully login.'),
(148, '202.46.129.184', 'hublubemits', 'login', 'success', '2019-08-29 18:57:35', 'Successfully login.'),
(149, '202.46.129.184', 'hublubemits', 'login', 'success', '2019-08-29 18:58:03', 'Successfully login.'),
(150, '115.178.251.35', 'hublubemits', 'login', 'success', '2019-09-02 20:32:06', 'Successfully login.'),
(151, '182.1.105.188', 'hublubemits', 'login', 'success', '2019-09-02 20:38:30', 'Successfully login.'),
(152, '36.82.19.49', 'hublubemits', 'login', 'success', '2019-09-02 22:12:04', 'Successfully login.'),
(153, '120.188.77.243', 'hublubemits', 'login', 'success', '2019-09-02 22:12:12', 'Successfully login.'),
(154, '114.125.111.122', 'hublubemits', 'login', 'success', '2019-09-02 22:20:56', 'Successfully login.'),
(155, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 22:30:31', 'Add database success! (Rudy)'),
(156, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 22:32:45', 'Add database success! (Iwan Setiawan)'),
(157, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 22:33:12', 'Add database success! (Didik Zainudin)'),
(158, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 22:37:03', 'Add database success! (yunike maris)'),
(159, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 22:37:16', 'Add database success! (Sony Prijantono)'),
(160, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 22:42:40', 'Add database success! (Soni Fahruri)'),
(161, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 22:44:02', 'Add database success! (Wahyu Widodo)'),
(162, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 22:45:21', 'Add database success! (Heru Basuki)'),
(163, '36.82.19.49', 'hublubemits', 'admin', 'edit', '2019-09-02 22:47:18', 'Edit database success! (ID 10)'),
(164, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 22:51:24', 'Add database success! (Murawan)'),
(165, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 22:51:31', 'Add database success! (Dr. Ir. Andang Bachtiar, M.Sc)'),
(166, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 22:52:58', 'Add database success! (Ismail Syah)'),
(167, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 22:55:15', 'Add database success! (Ronny Liyanto)'),
(168, '36.82.19.49', 'hublubemits', 'admin', 'edit', '2019-09-02 22:58:29', 'Edit database success! (ID 13)'),
(169, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 22:58:36', 'Add database success! (Andika Dwipramana)'),
(170, '36.82.19.49', 'hublubemits', 'admin', 'edit', '2019-09-02 22:58:42', 'Edit database success! (ID 13)'),
(171, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:02:10', 'Add database success! (Prof Dr Ir Tri Yogi Yuwini DEA)'),
(172, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:02:43', 'Add database success! (Dr. Bambang Sumintomo)'),
(173, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:04:31', 'Add database success! (Prof Dr Ing Ir Herman Sasongko)'),
(174, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:07:59', 'Add database success! (Anggiawan Pratama)'),
(175, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:09:21', 'Add database success! (Ir. Muhammad Faqih, MSA, Ph.D)'),
(176, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:10:52', 'Add database success! (adilah nur hanifati)'),
(177, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:12:15', 'Add database success! (Prof. Dr darminto)'),
(178, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:12:32', 'Add database success! (Nuchan)'),
(179, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:13:53', 'Add database success! (Resieka ( bu ika ))'),
(180, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:15:34', 'Add database success! (Dr Ir Bambang Sampurno M T)'),
(181, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:19:56', 'Add database success! (Angga J utomo)'),
(182, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:21:35', 'Add database success! (Bekti Cahyo Hidayanto SSi M Kom)'),
(183, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:22:27', 'Add database success! (Alfan)'),
(184, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:25:47', 'Add database success! (Prof Ir Eko Budi Djatmiko, M Sc., Ph.D.)'),
(185, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:27:18', 'Add database success! (Ir. Satya Widya Yudha, M.SC)'),
(186, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:31:09', 'Add database success! (Novianto dwi wibowo, ST)'),
(187, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:31:34', 'Add database success! (Dwi Sutjipto)'),
(188, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:32:45', 'Add database success! (Sulistyo Hadi)'),
(189, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:33:20', 'Add database success! (Aan Saputra)'),
(190, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:33:53', 'Add database success! (Ir. Marwan Batubara, M.Sc)'),
(191, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:35:04', 'Add database success! (Dalu Nuzlul Kirom)'),
(192, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:37:00', 'Add database success! (Ir Irnanda Laksanawan)'),
(193, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:37:02', 'Add database success! (Adnan Mubarak)'),
(194, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:39:56', 'Add database success! (Ir. Agus Cahyono Adi, MT.)'),
(195, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:40:27', 'Add database success! (Rudy Ermawan)'),
(196, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:42:07', 'Add database success! (Ir.Teguh Hari Prasetyo MM)'),
(197, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:42:31', 'Add database success! (Rudy)'),
(198, '36.82.19.49', 'hublubemits', 'admin', 'success', '2019-09-02 23:44:31', 'Add database success! (Hardi Istijanto)'),
(199, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:50:16', 'Add database success! (Iba Yasid)'),
(200, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:52:59', 'Add database success! (Didik Eko BS)'),
(201, '114.125.111.122', 'hublubemits', 'admin', 'success', '2019-09-02 23:54:36', 'Add database success! (Agus Rochadi)'),
(202, '115.178.254.248', 'hublubemits', 'login', 'success', '2019-09-03 01:37:11', 'Successfully login.'),
(203, '36.73.222.51', 'hublubemits', 'login', 'success', '2019-09-03 18:02:51', 'Successfully login.'),
(204, '202.46.129.184', 'hublubemits', 'login', 'success', '2019-09-04 13:41:32', 'Successfully login.'),
(205, '103.119.54.233', 'admin', 'login', 'success', '2019-09-05 13:58:32', 'Successfully login.'),
(206, '103.86.148.152', 'hublubemits', 'login', 'success', '2019-09-06 14:23:55', 'Successfully login.'),
(207, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:30:51', 'Add database success! (Abdul Mutholib)'),
(208, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:32:07', 'Add database success! (Suyanto)'),
(209, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:33:51', 'Add database success! (M. Djohan Safri)'),
(210, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:34:47', 'Add database success! (Agus Santoso S)'),
(211, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:35:33', 'Add database success! (Rizal Munadi)'),
(212, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:36:20', 'Add database success! (Doddy H. D)'),
(213, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:37:00', 'Add database success! (Harry Purwanto)'),
(214, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:40:46', 'Add database success! (Dr. Ir. Dwi Soetjipto, MM)'),
(215, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:42:10', 'Add database success! (Ir. Bambang Haryanto)'),
(216, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:43:27', 'Add database success! (Dr. Ir. Imam Hidayat, MM)'),
(217, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:44:59', 'Add database success! (Ir. Anas Rosjidi)'),
(218, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:46:14', 'Add database success! (Ir. Rukmi Hadihartini)'),
(219, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:47:40', 'Add database success! (Ir. Lukman Mahfoedz)'),
(220, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:50:26', 'Add database success! (I Nyoman G.Wiryanata)'),
(221, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:52:18', 'Add database success! (Ir. Harsusanto, MM)'),
(222, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:54:23', 'Add database success! (Ida Bagus Agra Kusuma)'),
(223, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:55:27', 'Add database success! (Ir. M. Djohan Safri, MM)'),
(224, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:57:44', 'Add database success! (Ir. Andi Soko Setiabudi)'),
(225, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 14:58:56', 'Add database success! (Ir. Yerry Idroes)'),
(226, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 15:03:36', 'Add database success! (Ir. Sukrisno)'),
(227, '103.86.148.152', 'hublubemits', 'admin', 'success', '2019-09-06 15:05:21', 'Add database success! (Ir. Kiswo Darmawan )'),
(228, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-06 15:29:51', 'Add database success! (Ir. Slamet Maryono)'),
(229, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-06 15:31:04', 'Add database success! (Ir. Kasman Muhammad, MM)'),
(230, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-06 15:32:55', 'Add database success! (Ir. Harun Al Rasyid (Canada))'),
(231, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-06 15:35:29', 'Add database success! (Ir. Sardjono)'),
(232, '202.46.129.184', 'hublubemits', 'login', 'success', '2019-09-08 12:03:13', 'Successfully login.'),
(233, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:14:28', 'Add database success! (Ir. Lilia Setiprawarti Sukotjo)'),
(234, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:15:59', 'Add database success! (Ir. Fahmi Shadiq)'),
(235, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:18:05', 'Add database success! (Ir. Agus Purnomo)'),
(236, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:19:29', 'Add database success! (Lalak Idiyono M.eng, Ph.D)'),
(237, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:21:05', 'Add database success! (Ir. I Wayan  Karioka, MM)'),
(238, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:22:29', 'Add database success! (Ir. Bambang Soenjaswono)'),
(239, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:24:21', 'Add database success! (Nurhudin)'),
(240, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:26:30', 'Add database success! (Ir. Abdul Aziez Bahalwan)'),
(241, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:33:47', 'Add database success! (Ir. Asjhar Imron MSE, PhD.)'),
(242, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 12:34:47', 'Add database success! (Tjahyono Roesdianto)'),
(243, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:31:11', 'Add database success! (Joni Harsono)'),
(244, '202.46.129.184', 'hublubemits', 'login', 'success', '2019-09-08 13:31:25', 'Successfully login.'),
(245, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:34:55', 'Add database success! (Ir. Widya Purnama)'),
(246, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:36:24', 'Add database success! (Ir. Syahroni)'),
(247, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:37:39', 'Add database success! (Dzulfikar Arifuddin)'),
(248, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:39:06', 'Add database success! (Ir. Irsan Haroen, MBA)'),
(249, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:40:21', 'Add database success! (Harry Sasongko Tirtotjondro )'),
(250, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:43:00', 'Add database success! (Zainal Arifin)'),
(251, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:44:08', 'Add database success! (Joni Harsono)'),
(252, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:46:03', 'Add database success! (Hari Susanto)'),
(253, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:49:13', 'Add database success! (E. Antoni M)'),
(254, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:50:19', 'Add database success! (Ir. Siswanto)'),
(255, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 13:53:13', 'Add database success! (Bambang Sugiharta)'),
(256, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:00:53', 'Add database success! (Ir. Rose Kusumanadi)'),
(257, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:01:46', 'Add database success! (Ketut Rumandiana, Mech Eng)'),
(258, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:03:35', 'Add database success! (Handoko)'),
(259, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:05:19', 'Add database success! (Arief Wisnu)'),
(260, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:14:32', 'Add database success! (Ir. Evan Eriko Mandar)'),
(261, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:16:18', 'Add database success! (Ir. Bambang Isworo, MT)'),
(262, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:18:40', 'Add database success! (Ir. Firmansyah)'),
(263, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:20:00', 'Add database success! (Ngurah Kresnawan)'),
(264, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:21:44', 'Add database success! (Pudjojoko)'),
(265, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:24:16', 'Add database success! (Ir. Anas Rosjidi)'),
(266, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:25:50', 'Add database success! (Ir. Bambang Setiobroto)'),
(267, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:27:23', 'Add database success! (Ir. Bing Soekianto)'),
(268, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:28:33', 'Add database success! (Ir. Giri Sudaryono)'),
(269, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:29:53', 'Add database success! (Ir. Harsusanto MM)'),
(270, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:31:00', 'Add database success! (Ir. Lukman Mahfoedz)'),
(271, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:32:32', 'Add database success! (Ir. Ida Bagus Agra Kusuma, MM)'),
(272, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:35:07', 'Add database success! (Ir. M. Djohan Safri, MM.)'),
(273, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:36:23', 'Add database success! (Ir. Roosediana Renny Pr., MT.)'),
(274, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:37:08', 'Add database success! (Dr. Ir. Agus Mulyanto, Msc)'),
(275, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:38:44', 'Add database success! (Ir. Ngurah Kresnawan, MBA)'),
(276, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:43:51', 'Add database success! (Ir. Sardjono)'),
(277, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:55:14', 'Add database success! (Ir. Sukrisno)'),
(278, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:56:02', 'Add database success! (Ir. Supriyanto)'),
(279, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 14:57:56', 'Add database success! (Ir. Widya Purnama)'),
(280, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:00:19', 'Add database success! (Ir. Yerry Idroes)'),
(281, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:01:40', 'Add database success! (Citra Rosalina Anggraini)'),
(282, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:07:11', 'Add database success! (Ikrom Syahri, ST.)'),
(283, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:08:37', 'Add database success! (Yohan Wahyudi)'),
(284, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:09:53', 'Add database success! (Eddy Subagyo)'),
(285, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:11:33', 'Add database success! (Dwi Sutjipto )'),
(286, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:12:43', 'Add database success! (Dini)'),
(287, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:13:30', 'Add database success! (Rima Novianti)'),
(288, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:20:14', 'Add database success! (Tety)'),
(289, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:22:01', 'Add database success! (Aan Saputra)'),
(290, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:22:47', 'Add database success! (Dalu Nuzlul Kirom)'),
(291, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:23:47', 'Add database success! (Dedy Dahlan)'),
(292, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:24:48', 'Add database success! (Ir Irnanda Laksanawan)'),
(293, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:25:56', 'Add database success! (Rudy Ermawan)'),
(294, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:26:37', 'Add database success! (Cici)'),
(295, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:27:34', 'Add database success! (Kurniawan Gunadi)'),
(296, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:28:30', 'Add database success! (Agustinus Wibowo)'),
(297, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:29:34', 'Add database success! (Claudia Kaunang)'),
(298, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:30:26', 'Add database success! (Dudi)'),
(299, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:31:10', 'Add database success! (Wanrat Abdullakasim, Ph.D)'),
(300, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:31:58', 'Add database success! (Sasima Juwasophi)'),
(301, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:32:47', 'Add database success! (Parichart Kreaktarvuth)'),
(302, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:33:31', 'Add database success! (Joaquin Vicente C. Ferrer)'),
(303, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:37:47', 'Add database success! (Joaquin Vicente C. Ferrer)'),
(304, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:38:57', 'Add database success! (Dyah Kusumawardani)'),
(305, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:39:34', 'Add database success! (Drs. Sigit Priyo Sembodo)'),
(306, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:40:29', 'Add database success! (Prof. Makarim Wibisono)'),
(307, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:41:39', 'Add database success! (Satria Rizaldi Alchatib)'),
(308, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:42:27', 'Add database success! (Deni)'),
(309, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:42:59', 'Add database success! (Christian K)'),
(310, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:46:52', 'Add database success! (Andri Saputra)'),
(311, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:47:29', 'Add database success! (Muhfid)'),
(312, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:48:25', 'Add database success! (Ingan Malem)'),
(313, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:49:04', 'Add database success! (Dr. Ir. Paristiyanti Nurwardani, MP)'),
(314, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:50:03', 'Add database success! (Afifah Nurrosyidah)'),
(315, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:50:53', 'Add database success! (Luu Tran Vinh Trinh)'),
(316, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:57:35', 'Add database success! (Ratih)'),
(317, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:58:10', 'Add database success! (Wisnu Darmawan)'),
(318, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 15:58:54', 'Add database success! (George Lantu)'),
(319, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:05:19', 'Add database success! (Aula)'),
(320, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:32:56', 'Add database success! (Monica)'),
(321, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:40:53', 'Add database success! (Retno Marsudi)'),
(322, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:41:33', 'Add database success! (Arief Yahya)'),
(323, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:42:06', 'Add database success! (Imam Nahrawi)'),
(324, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:43:09', 'Add database success! (Susi Pudjiastuti)'),
(325, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:43:53', 'Add database success! (Anisa)'),
(326, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:44:35', 'Add database success! (Ugan Gandar)'),
(327, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:45:20', 'Add database success! (Pieter Tobing)'),
(328, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:46:11', 'Add database success! (Dipl.Ing. Roestiandi Tsamanov (manov))'),
(329, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:47:05', 'Add database success! (Rudy)'),
(330, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:49:33', 'Add database success! (Iba Yasid)'),
(331, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:50:30', 'Add database success! (Didik Eko BS)'),
(332, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:51:26', 'Add database success! (Agus Rochadi)'),
(333, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:52:18', 'Add database success! (Abdul Mutholib)'),
(334, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:52:59', 'Add database success! (Suyanto)'),
(335, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:53:52', 'Add database success! (M. Djohan Safri)'),
(336, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:58:33', 'Add database success! (Agus Santoso S)'),
(337, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 16:59:29', 'Add database success! (Rizal Munadi)'),
(338, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 17:00:16', 'Add database success! (Doddy H. D)'),
(339, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 17:01:04', 'Add database success! (Harry Purwanto)'),
(340, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 17:01:56', 'Add database success! (Ugan Gandar, Pak Agung)'),
(341, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 17:02:31', 'Add database success! (Budhianto Marbun)'),
(342, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 17:03:48', 'Add database success! (Zaid Marhi Nugraha (ARI))'),
(343, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 17:05:02', 'Add database success! (Dalu Kirom)'),
(344, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 17:05:47', 'Add database success! (Imron Gozali)'),
(345, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 17:06:26', 'Add database success! (Ir. Kamir Raziudin Brata, M.Sc)'),
(346, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-09-08 17:09:22', 'Add database success! (Denny Ferdiansyah)'),
(347, '103.86.148.158', 'hublubemits', 'login', 'success', '2019-09-13 22:37:23', 'Successfully login.'),
(348, '103.86.148.158', 'presidenbemits', 'login', 'error', '2019-09-13 22:50:04', 'Login failed! Username not found.'),
(349, '103.86.148.152', 'hms', 'login', 'success', '2019-09-13 23:12:04', 'Successfully login.'),
(350, '182.1.78.119', 'himatekins', 'login', 'success', '2019-09-18 19:19:15', 'Successfully login.'),
(351, '202.46.129.184', 'hublubemits', 'login', 'success', '2019-09-18 19:42:16', 'Successfully login.'),
(352, '202.46.129.184', 'himasta', 'login', 'success', '2019-09-18 19:45:27', 'Successfully login.'),
(353, '182.1.81.112', 'hmmt', 'login', 'success', '2019-09-18 19:45:32', 'Successfully login.'),
(354, '114.125.118.144', 'hmsi', 'login', 'success', '2019-09-18 19:45:33', 'Successfully login.'),
(355, '202.46.129.184', 'hmtf', 'login', 'success', '2019-09-18 19:45:34', 'Successfully login.'),
(356, '114.125.100.208', 'hmsi', 'login', 'success', '2019-09-18 19:45:40', 'Successfully login.'),
(357, '120.188.85.143', 'himasthapati', 'login', 'success', '2019-09-18 19:45:40', 'Successfully login.'),
(358, '202.46.129.184', 'himasta', 'login', 'success', '2019-09-18 19:45:47', 'Successfully login.'),
(359, '202.46.129.184', '1516100008', 'login', 'error', '2019-09-18 19:46:05', 'Login failed! Username not found.'),
(360, '202.46.129.184', 'hmti', 'login', 'success', '2019-09-18 19:46:09', 'Successfully login.'),
(361, '114.125.85.147', 'himasthapati', 'login', 'success', '2019-09-18 19:46:10', 'Successfully login.'),
(362, '114.124.136.117', 'himka', 'login', 'success', '2019-09-18 19:46:13', 'Successfully login.'),
(363, '182.1.92.151', 'himatekla', 'login', 'success', '2019-09-18 19:46:17', 'Successfully login.'),
(364, '202.67.46.250', 'himatekins', 'login', 'success', '2019-09-18 19:46:19', 'Successfully login.'),
(365, '114.125.127.113', 'himatektro', 'login', 'error', '2019-09-18 19:46:20', 'Login failed! Password doesn\'t match.'),
(366, '202.46.129.184', '1516100008', 'login', 'error', '2019-09-18 19:46:21', 'Login failed! Username not found.'),
(367, '202.46.129.184', 'hmtl', 'login', 'success', '2019-09-18 19:46:22', 'Successfully login.'),
(368, '112.215.244.6', 'himatektro', 'login', 'success', '2019-09-18 19:46:24', 'Successfully login.'),
(369, '202.46.129.184', 'hmti', 'login', 'success', '2019-09-18 19:46:31', 'Successfully login.'),
(370, '114.125.127.113', 'himatektro', 'login', 'success', '2019-09-18 19:46:39', 'Successfully login.'),
(371, '202.46.129.184', 'chindyaramadhanty@gmail.com', 'login', 'error', '2019-09-18 19:46:42', 'Login failed! Username not found.'),
(372, '114.4.218.233', 'himasika', 'login', 'success', '2019-09-18 19:53:33', 'Successfully login.'),
(373, '114.124.136.117', 'himka', 'login', 'success', '2019-09-18 19:55:38', 'Successfully login.'),
(374, '202.46.129.184', 'hima@bio.its.ac.id', 'login', 'error', '2019-09-18 20:01:16', 'Login failed! Username not found.'),
(375, '202.46.129.184', 'hmsi', 'login', 'success', '2019-09-18 23:13:20', 'Successfully login.'),
(376, '66.228.4.18', 'test', 'login', 'error', '2019-09-23 15:00:24', 'Login failed! Username not found.'),
(377, '66.228.4.18', '0 or 1=1', 'login', 'error', '2019-09-23 15:01:12', 'Login failed! Username not found.'),
(378, '66.228.4.18', '0 or 1=1', 'login', 'error', '2019-09-23 15:01:26', 'Login failed! Username not found.'),
(379, '66.228.4.18', '0 or 1=1', 'login', 'error', '2019-09-23 15:01:30', 'Login failed! Username not found.'),
(380, '66.228.4.18', '\\\" or \\\"\\\"=\\\"', 'login', 'error', '2019-09-23 15:02:53', 'Login failed! Username not found.'),
(381, '66.228.4.18', '\\\' or \\\"\\\"=\\\"', 'login', 'error', '2019-09-23 15:04:08', 'Login failed! Username not found.'),
(382, '66.228.4.18', '\\\" or 1=1', 'login', 'error', '2019-09-23 15:04:21', 'Login failed! Username not found.'),
(383, '66.228.4.18', '\\\' or 1=1', 'login', 'error', '2019-09-23 15:04:28', 'Login failed! Username not found.'),
(384, '182.1.120.11', 'hmsi', 'login', 'success', '2019-09-27 15:34:12', 'Successfully login.'),
(385, '202.80.219.42', 'himatektro', 'login', 'success', '2019-10-04 08:05:27', 'Successfully login.'),
(386, '36.89.125.156', 'himad3tektro', 'login', 'success', '2019-10-04 14:43:43', 'Successfully login.'),
(387, '180.253.55.61', 'himad3tektro', 'login', 'success', '2019-10-04 14:46:11', 'Successfully login.'),
(388, '202.46.129.184', 'hmti', 'login', 'success', '2019-10-04 23:32:46', 'Successfully login.'),
(389, '114.125.118.191', 'himage', 'login', 'success', '2019-10-06 17:43:01', 'Successfully login.'),
(390, '180.247.174.188', 'hmti', 'login', 'success', '2019-10-06 19:51:00', 'Successfully login.'),
(391, '182.1.78.36', 'hmti', 'login', 'success', '2019-10-08 15:12:04', 'Successfully login.'),
(392, '125.164.132.153', 'hublubemits', 'login', 'success', '2019-10-11 04:47:54', 'Successfully login.'),
(393, '180.254.41.12', 'bmsa', 'login', 'success', '2019-10-12 11:10:49', 'Successfully login.'),
(394, '36.73.201.110', 'bemfte', 'login', 'error', '2019-10-15 01:21:40', 'Login failed! Username not found.'),
(395, '36.73.201.110', 'bemfte', 'login', 'error', '2019-10-15 01:21:53', 'Login failed! Username not found.'),
(396, '202.46.129.184', 'ieccits', 'login', 'success', '2019-10-16 20:51:43', 'Successfully login.'),
(397, '125.164.132.153', 'hublubemits', 'login', 'success', '2019-10-16 20:54:19', 'Successfully login.'),
(398, '103.213.131.70', 'ieccits', 'proposal', 'success', '2019-10-16 22:34:30', 'Upload proposal success! (Edufest 2019)'),
(399, '103.213.131.70', 'ieccits', 'login', 'success', '2019-10-16 22:35:00', 'Successfully login.'),
(400, '125.164.132.153', 'hublubemits', 'login', 'success', '2019-10-17 06:26:30', 'Successfully login.'),
(401, '125.164.132.153', 'hublubemits', 'login', 'success', '2019-10-17 09:04:14', 'Successfully login.'),
(402, '125.164.132.153', 'hublubemits', 'login', 'success', '2019-10-17 18:41:30', 'Successfully login.'),
(403, '125.164.132.153', 'hublubemits', 'admin', 'edit', '2019-10-17 18:50:11', 'Edit proposal success! (ID: 1)'),
(404, '140.0.48.230', 'hmti', 'login', 'success', '2019-10-18 07:09:26', 'Successfully login.'),
(405, '139.228.50.11', 'himasiskal', 'login', 'success', '2019-10-23 08:54:27', 'Successfully login.'),
(406, '202.46.129.184', 'hublubemits', 'login', 'error', '2019-10-23 09:02:19', 'Login failed! Password doesn\'t match.'),
(407, '202.46.129.184', 'hublubemits', 'login', 'success', '2019-10-23 09:02:33', 'Successfully login.'),
(408, '114.4.220.101', 'hmmt', 'login', 'success', '2019-10-28 07:43:20', 'Successfully login.'),
(409, '103.111.83.114', 'himad3tektro', 'login', 'success', '2019-10-30 14:43:41', 'Successfully login.'),
(410, '103.86.148.135', 'hublubemits', 'login', 'success', '2019-11-20 16:50:58', 'Successfully login.'),
(411, '36.73.244.160', 'hublubemits', 'login', 'success', '2019-11-20 18:23:24', 'Successfully login.'),
(412, '202.46.129.184', 'hublubemits', 'login', 'success', '2019-11-20 20:40:32', 'Successfully login.'),
(413, '202.46.129.184', 'hublubemits', 'admin', 'success', '2019-11-20 20:42:52', 'Add database success! (Mohammad Sofyan)'),
(414, '36.82.101.10', 'hublubemits', 'login', 'success', '2019-11-26 16:30:21', 'Successfully login.'),
(415, '36.82.101.10', 'hublubemits', 'admin', 'success', '2019-11-26 16:41:18', 'Add database success! (kak indri)'),
(416, '36.82.101.10', 'hublubemits', 'admin', 'success', '2019-11-26 16:43:37', 'Add database success! (Aris)'),
(417, '36.85.46.217', 'hublubemits', 'login', 'success', '2019-12-03 20:04:18', 'Successfully login.'),
(418, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-03 20:05:47', 'Add database success! (Wiwin)'),
(419, '36.85.46.217', 'hublubemits', 'login', 'success', '2019-12-04 08:12:26', 'Successfully login.'),
(420, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 08:13:24', 'Add database success! (Jesslyn)'),
(421, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 08:13:53', 'Add database success! (Hesti)'),
(422, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 08:14:14', 'Add database success! (Niela)'),
(423, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 08:14:51', 'Add database success! (Vansessa Velindra)'),
(424, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 08:15:12', 'Add database success! (Sammy)'),
(425, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 08:15:32', 'Add database success! (Alex)'),
(426, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 08:15:48', 'Add database success! (Edo)'),
(427, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 08:16:06', 'Add database success! (Hilmy)'),
(428, '36.85.46.217', 'hublubemits', 'login', 'success', '2019-12-04 21:37:20', 'Successfully login.'),
(429, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 21:40:20', 'Add database success! (Data Iranata)'),
(430, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 21:42:01', 'Add database success! (Pudjo Adji)');
INSERT INTO `iprs_log` (`id`, `ip`, `username`, `slug`, `stats`, `logdate`, `activity`) VALUES
(431, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 21:43:36', 'Add database success! (Bambang Piscesa)'),
(432, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 21:45:30', 'Add database success! (Ervina Ahyudanari)'),
(433, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 21:47:08', 'Add database success! (Putri)'),
(434, '36.85.46.217', 'hublubemits', 'admin', 'success', '2019-12-04 21:51:31', 'Add database success! (Teo)'),
(435, '110.139.55.58', '\\\' or 1=1 limit 1 -- -+', 'login', 'error', '2019-12-31 18:59:57', 'Login failed! Username not found.'),
(436, '182.1.76.113', '06211940000115', 'login', 'error', '2020-01-06 09:32:19', 'Login failed! Username not found.'),
(437, '180.247.78.19', '42', 'login', 'error', '2020-05-18 08:49:07', 'Login failed! Username not found.'),
(438, '180.247.78.19', 'admin', 'login', 'success', '2020-05-18 08:49:18', 'Successfully login.'),
(439, '180.247.78.19', 'admin', 'admin', 'edit', '2020-05-18 08:55:51', 'Setting has been updated.'),
(440, '36.79.248.27', 'hublubemits', 'login', 'success', '2020-08-09 06:05:12', 'Successfully login.'),
(441, '203.207.56.92', 'hublubemits', 'login', 'success', '2020-08-12 08:34:28', 'Successfully login.'),
(442, '203.207.56.92', 'hublubemits', 'login', 'success', '2020-08-14 10:55:10', 'Successfully login.'),
(443, '36.79.249.77', 'hublubemits', 'login', 'success', '2020-11-03 16:17:08', 'Successfully login.'),
(444, '180.248.57.108', 'hublubemits', 'login', 'success', '2020-11-03 16:17:14', 'Successfully login.'),
(445, '36.68.223.132', 'hmti', 'login', 'success', '2020-11-10 09:28:50', 'Successfully login.'),
(446, '36.68.223.132', 'hublubemits', 'login', 'success', '2020-11-10 09:29:30', 'Successfully login.'),
(447, '36.81.147.239', 'himatekla', 'login', 'success', '2020-11-10 10:00:20', 'Successfully login.'),
(448, '36.81.136.191', 'hublubemits', 'login', 'success', '2020-12-04 21:23:49', 'Successfully login.'),
(449, '36.74.88.226', 'hublubemits', 'login', 'success', '2020-12-04 21:23:56', 'Successfully login.'),
(450, '182.30.146.15', 'hublubemits', 'login', 'success', '2020-12-04 21:26:39', 'Successfully login.'),
(451, '180.251.125.144', 'wahyu.adi15@mhs.ep.its.ac.id', 'login', 'error', '2020-12-06 12:46:09', 'Login failed! Username not found.'),
(452, '180.251.125.144', 'admin', 'login', 'error', '2020-12-06 12:46:17', 'Login failed! Password doesn\'t match.'),
(453, '182.0.173.142', 'hublubemits', 'login', 'success', '2020-12-06 13:01:39', 'Successfully login.'),
(454, '36.70.71.40', 'hublubemits', 'login', 'success', '2020-12-06 13:05:57', 'Successfully login.'),
(455, '36.70.71.40', 'hubluhmtcits', 'login', 'error', '2020-12-06 13:09:21', 'Login failed! Username not found.'),
(456, '36.70.71.40', 'hubluhmtcits', 'login', 'error', '2020-12-06 13:09:33', 'Login failed! Username not found.'),
(457, '36.70.71.40', 'hubluhmtc', 'login', 'error', '2020-12-06 13:09:43', 'Login failed! Username not found.'),
(458, '36.70.71.40', 'hublubemits', 'login', 'success', '2020-12-06 13:09:54', 'Successfully login.'),
(459, '114.125.250.113', 'hublubemits', 'login', 'success', '2020-12-06 17:36:45', 'Successfully login.'),
(460, '36.70.71.40', 'hublubemits', 'login', 'success', '2020-12-06 20:31:21', 'Successfully login.'),
(461, '36.70.71.40', 'hublubemits', 'login', 'success', '2020-12-07 14:32:39', 'Successfully login.'),
(462, '36.70.71.40', 'hmtc', 'login', 'success', '2020-12-07 14:34:31', 'Successfully login.'),
(463, '36.70.71.40', 'hublubemits', 'login', 'success', '2020-12-07 14:51:41', 'Successfully login.'),
(464, '36.70.71.40', 'hublubemits', 'login', 'success', '2020-12-07 18:05:51', 'Successfully login.'),
(465, '36.88.63.229', 'hubluhmtcits', 'login', 'error', '2020-12-11 13:58:09', 'Login failed! Username not found.'),
(466, '36.88.63.229', 'hmtcits', 'login', 'error', '2020-12-11 13:58:21', 'Login failed! Username not found.'),
(467, '36.88.63.229', 'hmtcits', 'login', 'error', '2020-12-11 13:58:30', 'Login failed! Username not found.'),
(468, '36.88.63.229', 'hmtc', 'login', 'success', '2020-12-11 13:58:46', 'Successfully login.'),
(469, '36.88.63.229', 'hublubemits', 'login', 'success', '2020-12-11 13:59:48', 'Successfully login.'),
(470, '36.88.63.229', 'hmtc', 'login', 'success', '2020-12-11 14:00:28', 'Successfully login.'),
(471, '36.88.63.229', 'hublubemits', 'login', 'success', '2020-12-11 14:03:52', 'Successfully login.'),
(472, '36.88.63.229', 'hmtc', 'login', 'success', '2020-12-11 14:11:08', 'Successfully login.'),
(473, '36.88.63.229', 'hublubemits', 'login', 'success', '2020-12-11 14:16:17', 'Successfully login.'),
(474, '139.0.174.121', 'iprsbemits', 'login', 'error', '2020-12-19 18:58:10', 'Login failed! Username not found.'),
(475, '125.164.129.133', 'iprsbemits', 'login', 'error', '2020-12-20 20:37:25', 'Login failed! Username not found.'),
(476, '::1', 'admin', 'login', 'error', '2020-12-26 15:37:05', 'Login failed! Password doesn\'t match.'),
(477, '::1', 'admin', 'login', 'error', '2020-12-26 15:37:12', 'Login failed! Password doesn\'t match.'),
(478, '::1', 'admin', 'login', 'error', '2020-12-26 15:37:18', 'Login failed! Password doesn\'t match.'),
(479, '::1', 'admin', 'login', 'error', '2020-12-26 15:37:21', 'Login failed! Password doesn\'t match.'),
(480, '::1', 'admin', 'login', 'success', '2020-12-26 21:34:43', 'Successfully login.'),
(481, '::1', 'admin', 'login', 'success', '2020-12-26 21:35:45', 'Successfully login.'),
(482, '::1', 'admin', 'login', 'error', '2020-12-26 21:38:18', 'Login failed! Password doesn\'t match.'),
(483, '::1', 'admin', 'login', 'success', '2020-12-26 21:44:59', 'Successfully login.'),
(484, '::1', 'hmtc', 'login', 'success', '2020-12-26 21:57:20', 'Successfully login.'),
(485, '::1', 'hublubemits', 'login', 'success', '2020-12-26 22:02:33', 'Successfully login.');

-- --------------------------------------------------------

--
-- Table structure for table `iprs_menu`
--

CREATE TABLE `iprs_menu` (
  `id` int(2) NOT NULL,
  `label` varchar(32) NOT NULL,
  `link` varchar(32) NOT NULL DEFAULT '#',
  `information` text DEFAULT NULL,
  `parent_id` int(2) NOT NULL DEFAULT 0,
  `type` enum('user','admin','sidebar','panel') NOT NULL DEFAULT 'user',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `icon` varchar(32) DEFAULT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT 0
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
(27, 'Supports', '#', 'Parent menu of announcement', 0, 'panel', 'yes', ' icon-support', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(28, 'Edit Proposal', 'proposal-edit', 'Hidden menu of proposals', 17, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(29, 'Edit Database', 'database-edit', 'Hidden menu of database', 20, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(30, 'Edit User', 'user-edit', 'Hidden menu of user', 21, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(31, 'FAQ', '#', 'Parent menu of FAQ', 0, 'panel', 'no', ' icon-support', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(32, 'Settings', '#', 'Parent menu of settings', 0, 'panel', 'yes', 'icon-wrench', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(33, 'Event Types', 'proposal-types', 'Sub menu of proposal', 17, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(34, 'Company Types', 'database-company', 'Sub menu of databases', 20, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(35, 'Departments', 'user-department', 'Sub menu of users', 21, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(36, 'Faculties', 'user-faculty', 'Sub menu of users', 21, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(37, 'New Message', 'message-new', 'Sub menu of messages', 26, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(38, 'Add Announcement', 'announcement-add', 'Sub menu of announcement', 27, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(39, 'Announcements', 'announcement-list', 'Sub menu of announcement', 27, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(40, 'Add New', 'faq-new', 'Sub menu of FAQ', 31, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(41, 'FAQs', 'faq-list', 'Sub menu of FAQ', 27, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(42, 'Main System', 'setting-main', 'Sub menu of settings', 32, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(43, 'User Logs', 'log-user', 'Sub menu of settings', 32, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(44, 'Admin Logs', 'log-admin', 'Sub menu of settings', 32, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(45, 'Login History', 'log-login', 'Sub menu of settings', 32, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(46, 'Changelogs', 'changelog-list', 'Sub menu of settings', 32, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(47, 'Edit Announcement', 'announcement-edit', 'Sub menu of announcement', 27, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(48, 'Support', '#', 'Parent menu of support of user panel', 0, 'sidebar', 'yes', 'fi-help', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(49, 'FAQ', 'faq', 'Sub menu of support', 48, 'sidebar', 'yes', '', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(50, 'Changelog', 'changelog', 'Sub menu of support', 48, 'sidebar', 'yes', '', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(51, 'Contact', 'contact', 'Sub menu of support', 48, 'sidebar', 'yes', '', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(52, 'Add FAQ', 'faq-add', 'Sub menu of support', 27, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(53, 'Edit FAQ', 'faq-edit', 'Sub menu of support', 27, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(54, 'Contact Person', 'contact-list', 'Sub menu of support', 27, 'panel', 'yes', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(55, 'Edit Contact', 'contact-edit', 'Sub menu of support', 27, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(56, 'Add Contact', 'contact-add', 'Sub menu of support', 27, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(57, 'Add Changelog', 'changelog-add', 'Sub menu of settings', 32, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(58, 'Edit Changelog', 'changelog-edit', 'Sub menu of settings', 32, 'panel', 'no', NULL, 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(61, 'All Database', 'alldatabase', 'Sub menu of databases', 9, 'sidebar', 'yes', NULL, 'admin', '2020-12-26 00:00:00', '', '2020-12-26 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_page`
--

CREATE TABLE `iprs_page` (
  `id` int(4) NOT NULL,
  `url` varchar(64) NOT NULL,
  `title` varchar(32) NOT NULL,
  `label` enum('admin','user') NOT NULL,
  `description` varchar(256) NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT 0
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
(23, '/iprs/admin/user-edit.php', 'Edit User - Admin Panel', 'admin', 'Edit a user', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(24, '/iprs/admin/proposal-types.php', 'Event Types - Admin Panel', 'admin', 'List of event types', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(25, '/iprs/admin/database-company.php', 'Company Types - Admin Panel', 'admin', 'List of company types', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(26, '/iprs/admin/user-faculty.php', 'Faculties - Admin Panel', 'admin', 'List of faculties', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(27, '/iprs/admin/user-department.php', 'Departments - Admin Panel', 'admin', 'List of departments', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(28, '/iprs/admin/announcement-list.php', 'Announcements - Admin Panel', 'admin', 'List of announcements', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(29, '/iprs/admin/announcement-add.php', 'Add Announcement - Admin Panel', 'admin', 'Add an announcement', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(30, '/iprs/admin/announcement-edit.php', 'Edit Announcement - Admin Panel', 'admin', 'Edit an announcement', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(31, '/iprs/admin/faq-list.php', 'FAQs - Admin Panel', 'admin', 'List of frequently asked questions', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(32, '/iprs/admin/faq-add.php', 'Add FAQ - Admin Panel', 'admin', 'Add a frequently asked questions', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(33, '/iprs/admin/faq-edit.php', 'Edit FAQ - Admin Panel', 'admin', 'Edit a frequently asked questions', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(34, '/iprs/faq.php', 'Frequently Asked Question', 'user', 'Page to view faq', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(35, '/iprs/changelog.php', 'Changelog', 'user', 'Page to view changelog', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(36, '/iprs/contact.php', 'Contact', 'user', 'Page to view contact person', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(37, '/iprs/admin/log-user.php', 'User Logs - Admin Panel', 'admin', 'Show all logs by user', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(38, '/iprs/admin/log-admin.php', 'Admin Logs - Admin Panel', 'admin', 'Show all logs by admin', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(39, '/iprs/admin/log-login.php', 'Login History - Admin Panel', 'admin', 'Show all login history to IPRS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(40, '/iprs/admin/setting-main.php', 'Main Setting - Admin Panel', 'admin', 'Set the setting of IPRS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(41, '/iprs/admin/changelog-list.php', 'Changelogs - Admin Panel', 'admin', 'List of all changelogs', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(42, '/iprs/admin/contact-list.php', 'Contact Person - Admin Panel', 'admin', 'List of all contact person', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(43, '/iprs/admin/contact-add.php', 'Add Contact - Admin Panel', 'admin', 'Add new contact person', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(44, '/iprs/admin/contact-edit.php', 'Edit Contact - Admin Panel', 'admin', 'Edit a contact person', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(45, '/iprs/admin/changelog-add.php', 'Add Changelog - Admin Panel', 'admin', 'Add a changelog', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(46, '/iprs/admin/changelog-edit.php', 'Edit Changelog - Admin Panel', 'admin', 'Edit a changelog', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(47, '/iprs/alldatabase.php', 'All Database', 'user', 'Page to view all database for all users', 'admin', '2020-12-26 00:00:00', '', '2020-12-26 00:00:00', 0);

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
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `revision` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_password_stats`
--

INSERT INTO `iprs_password_stats` (`id`, `username`, `password`, `stats`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(0, 'admin', '', 'changed', '', '0000-00-00 00:00:00', 'admin', '2018-11-29 23:23:12', 5),
(1, 'hublubemits', '', 'not changed', 'admin', '2018-11-30 06:49:56', '', '0000-00-00 00:00:00', 0),
(2, 'inkabemits', '', 'not changed', 'hublubemits', '2018-12-13 16:54:29', '', '0000-00-00 00:00:00', 0),
(3, 'menkoperkerakanbemits', '', 'not changed', 'hublubemits', '2018-12-13 17:06:36', '', '0000-00-00 00:00:00', 0),
(4, 'bakorits', '', 'not changed', 'hublubemits', '2018-12-13 17:12:17', '', '0000-00-00 00:00:00', 0),
(5, 'ieccits', '', 'not changed', 'hublubemits', '2018-12-13 17:12:57', '', '0000-00-00 00:00:00', 0),
(6, 'bemfs', '', 'not changed', 'hublubemits', '2018-12-13 17:13:48', '', '0000-00-00 00:00:00', 0),
(7, 'menkodinamobemits', '', 'not changed', 'hublubemits', '2018-12-13 17:14:40', '', '0000-00-00 00:00:00', 0),
(8, 'bemfti', '', 'not changed', 'hublubemits', '2018-12-13 17:14:55', '', '0000-00-00 00:00:00', 0),
(9, 'bemfadp', '', 'not changed', 'hublubemits', '2018-12-13 17:15:27', '', '0000-00-00 00:00:00', 0),
(10, 'bemftslk', '', 'not changed', 'hublubemits', '2018-12-13 17:15:51', '', '0000-00-00 00:00:00', 0),
(11, 'bemftk', '', 'not changed', 'hublubemits', '2018-12-13 17:16:20', '', '0000-00-00 00:00:00', 0),
(12, 'bemftik', '', 'not changed', 'hublubemits', '2018-12-13 17:16:48', '', '0000-00-00 00:00:00', 0),
(13, 'himasika', '', 'not changed', 'hublubemits', '2018-12-13 17:18:55', '', '0000-00-00 00:00:00', 0),
(14, 'himatika', '', 'not changed', 'hublubemits', '2018-12-13 17:19:55', '', '0000-00-00 00:00:00', 0),
(15, 'himasta', '', 'not changed', 'hublubemits', '2018-12-13 17:20:23', '', '0000-00-00 00:00:00', 0),
(16, 'himadata', '', 'not changed', 'hublubemits', '2018-12-13 17:20:59', '', '0000-00-00 00:00:00', 0),
(17, 'himka', '', 'not changed', 'hublubemits', '2018-12-13 17:21:49', '', '0000-00-00 00:00:00', 0),
(18, 'himabits', '', 'not changed', 'hublubemits', '2018-12-13 17:22:20', '', '0000-00-00 00:00:00', 0),
(19, 'hmm', '', 'not changed', 'hublubemits', '2018-12-13 17:22:50', '', '0000-00-00 00:00:00', 0),
(20, 'hmdm', '', 'not changed', 'hublubemits', '2018-12-13 17:23:30', '', '0000-00-00 00:00:00', 0),
(21, 'himatektro', '', 'not changed', 'hublubemits', '2018-12-13 17:23:58', '', '0000-00-00 00:00:00', 0),
(22, 'himad3kim', '', 'not changed', 'hublubemits', '2018-12-13 17:24:23', '', '0000-00-00 00:00:00', 0),
(23, 'himad3tektro', '', 'not changed', 'hublubemits', '2018-12-13 17:24:31', '', '0000-00-00 00:00:00', 0),
(24, 'himatekk', '', 'not changed', 'hublubemits', '2018-12-13 17:24:55', '', '0000-00-00 00:00:00', 0),
(25, 'ristekbemits', '', 'not changed', 'hublubemits', '2018-12-13 17:25:13', '', '0000-00-00 00:00:00', 0),
(26, 'bemfmksd', '', 'not changed', 'hublubemits', '2018-12-13 17:25:24', '', '0000-00-00 00:00:00', 0),
(27, 'sosmasbemits', '', 'not changed', 'hublubemits', '2018-12-13 17:26:31', '', '0000-00-00 00:00:00', 0),
(28, 'hmtf', '', 'not changed', 'hublubemits', '2018-12-13 17:26:31', '', '0000-00-00 00:00:00', 0),
(29, 'hmti', '', 'not changed', 'hublubemits', '2018-12-13 17:26:52', '', '0000-00-00 00:00:00', 0),
(30, 'hmmt', '', 'not changed', 'hublubemits', '2018-12-13 17:27:15', '', '0000-00-00 00:00:00', 0),
(31, 'bmsa', '', 'not changed', 'hublubemits', '2018-12-13 17:27:29', '', '0000-00-00 00:00:00', 0),
(32, 'perkombemits', '', 'not changed', 'hublubemits', '2018-12-13 17:27:43', '', '0000-00-00 00:00:00', 0),
(33, 'hms', '', 'not changed', 'hublubemits', '2018-12-13 17:27:48', '', '0000-00-00 00:00:00', 0),
(34, 'hmds', '', 'not changed', 'hublubemits', '2018-12-13 17:28:09', '', '0000-00-00 00:00:00', 0),
(35, 'himasthapati', '', 'not changed', 'hublubemits', '2018-12-13 17:28:39', '', '0000-00-00 00:00:00', 0),
(36, 'hmtl', '', 'not changed', 'hublubemits', '2018-12-13 17:29:04', '', '0000-00-00 00:00:00', 0),
(37, 'hmpl', '', 'not changed', 'hublubemits', '2018-12-13 17:29:40', '', '0000-00-00 00:00:00', 0),
(38, 'himage', '', 'not changed', 'hublubemits', '2018-12-13 17:30:03', '', '0000-00-00 00:00:00', 0),
(39, 'adkesmabemits', '', 'not changed', 'hublubemits', '2018-12-13 17:30:06', '', '0000-00-00 00:00:00', 0),
(40, 'himaide', '', 'not changed', 'hublubemits', '2018-12-13 17:30:22', '', '0000-00-00 00:00:00', 0),
(41, 'hmdi', '', 'not changed', 'hublubemits', '2018-12-13 17:30:45', '', '0000-00-00 00:00:00', 0),
(42, 'hmtg', '', 'not changed', 'hublubemits', '2018-12-13 17:31:05', '', '0000-00-00 00:00:00', 0),
(43, 'aksprobemits', '', 'not changed', 'hublubemits', '2018-12-13 17:31:07', '', '0000-00-00 00:00:00', 0),
(44, 'himatekpal', '', 'not changed', 'hublubemits', '2018-12-13 17:31:23', '', '0000-00-00 00:00:00', 0),
(45, 'himasiskal', '', 'not changed', 'hublubemits', '2018-12-13 17:31:49', '', '0000-00-00 00:00:00', 0),
(46, 'himatekla', '', 'not changed', 'hublubemits', '2018-12-13 17:32:07', '', '0000-00-00 00:00:00', 0),
(47, 'dagribemits', '', 'not changed', 'hublubemits', '2018-12-13 17:32:11', '', '0000-00-00 00:00:00', 0),
(48, 'himaseatrans', '', 'not changed', 'hublubemits', '2018-12-13 17:32:33', '', '0000-00-00 00:00:00', 0),
(49, 'hmtc', '', 'not changed', 'hublubemits', '2018-12-13 17:32:51', '', '0000-00-00 00:00:00', 0),
(50, 'hmsi', '', 'not changed', 'hublubemits', '2018-12-13 17:33:10', '', '0000-00-00 00:00:00', 0),
(51, 'psdmbemits', '', 'not changed', 'hublubemits', '2018-12-13 17:33:21', '', '0000-00-00 00:00:00', 0),
(52, 'kominfobemits', '', 'not changed', 'hublubemits', '2018-12-13 17:34:28', '', '0000-00-00 00:00:00', 0),
(53, 'kpbemits', '', 'not changed', 'hublubemits', '2018-12-13 17:35:34', '', '0000-00-00 00:00:00', 0),
(54, 'himatekins', 'himatekins', 'not changed', 'hublubemits', '2018-12-27 17:17:39', '', '0000-00-00 00:00:00', 0);

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

--
-- Dumping data for table `iprs_proposal`
--

INSERT INTO `iprs_proposal` (`id`, `username`, `input_date`, `event_name`, `event_type`, `event_desc`, `event_time`, `event_target`, `event_pic`, `event_cp`, `stakeholder1`, `stakeholder2`, `stakeholder3`, `stakeholder4`, `stakeholder5`, `relation1`, `relation2`, `relation3`, `relation4`, `relation5`, `file_name`, `file_type`, `file_size`, `stats`, `approved_by`, `approved_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'ieccits', '2019-10-16 22:34:26', 'Edufest 2019', 'Seminar National', 'Edu Project Expo (EPO)\r\nEPO diselenggarakan dalam bentuk beberapa kegiatan, yaitu stand pameran yang dibuka untuk HMD dan BEM Fakultas sebagai media untuk mengenalkan education project yang selama ini telah dilakukan, pertunjukan bakat anak-anak kampung binaan HMD dan BEM Fakultas, dan berbagai macam perlombaan bagi anak-anak kampung binaan. Kegiatan ini bersifat umum, sehingga seluruh mahasiswa ITS dan akademisi lainnya dapat mengetahui perkembangan pengajaran yang telah dilakukan oleh HMD dan BEM Fakultas ITS.\r\n\r\nTalkshow Pendidikan \r\nTalkshow yang diadakan dalam bentuk diskusi interaktif antara KM ITS dengan narasumber skala nasional yaitu dari pemerintah provinsi dan komunitas penggiat pendidikan. Talkshow Pendidikan mengusung tema Ã¢??Menyapa Pendidikan Indonesia Saat IniÃ¢?Â diselenggarakan untuk membahas terkait masalah pendidikan secara general maupun masalah pendidikan yang ada di lingkungan sekitar pada saat ini, serta membahas upaya-upaya yang bisa dipersiapkan untuk menyongsong pendidikan yang lebih baik di masa depan. \r\n\r\n', '2019-11-03', 'Anak-anak kampung binaan HMD dan BEM Fakultas, Perwakilan dari Departemen Sosial Masyarakat dari HMD dan BEM Fakultas, KM ITS, masyarakat umum', 'Chandra Arianto Firmansyah', '082335964231/cha', 'Unilever, PLN, Pertamina, Jasamarga, Gramedia, semen gresik, buka lapak, indosat, coca colla, larita bake, PT. indosat', '', '', '', '', 'Sponsorship', '', '', '', '', '8713_ieccits_Proposal Education Festival 2019 selesai revisi (1).pdf', 'pdf', 1200494, 'approve', 'hublubemits', '2019-10-17 18:50:11', 'hublubemits', '2019-10-17 18:50:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_setting`
--

CREATE TABLE `iprs_setting` (
  `id` int(4) NOT NULL,
  `name` varchar(32) NOT NULL,
  `value` text NOT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `information` text DEFAULT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_setting`
--

INSERT INTO `iprs_setting` (`id`, `name`, `value`, `active`, `information`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'system_name', 'IPRS BEM ITS', 'yes', 'Name of the system', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(2, 'assets_folder', 'assets', 'yes', 'Assets folder place', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(3, 'login_background', 'bg.jpg', 'yes', 'Login background image', 'admin', '2018-09-03 10:35:15', 'admin', '2018-12-20 16:15:37', 2),
(4, 'author', 'unicorn', 'yes', 'The author of IPRS BEM ITS system', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(5, 'logo', 'logo.png', 'yes', 'Official logo of IPRS BEM ITS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-12-20 16:14:19', 2),
(6, 'favicon', 'favicon.png', 'yes', 'Favicon image', 'admin', '2018-09-03 10:35:15', 'admin', '2018-12-20 16:15:07', 2),
(7, 'footer', '2017 - 2020 © IPRS BEM ITS', 'yes', 'Footer copyright text', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(9, 'logo_icon', 'assets/images/logo_sm.png', 'yes', 'Official logo icon of IPRS BEM ITS', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(10, 'plugins_folder', 'plugins', 'yes', 'The plugins folder place', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(11, 'timezone', 'Asia/Jakarta', 'yes', 'Default timezone of system', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(12, 'base_path', 'iprs', 'yes', 'Base path of the system', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0),
(13, 'main_email', 'hubunganluar1819@gmail.com', 'yes', 'Main email to contact a message', 'admin', '2018-09-03 10:35:15', 'admin', '2018-09-03 10:35:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iprs_staff`
--

CREATE TABLE `iprs_staff` (
  `id` int(2) NOT NULL,
  `name` varchar(64) NOT NULL,
  `position` varchar(64) NOT NULL,
  `photo` text NOT NULL,
  `facebook` varchar(128) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `instagram` varchar(128) NOT NULL,
  `lineid` varchar(128) NOT NULL,
  `whatsapp` varchar(32) NOT NULL,
  `active` enum('yes','no') NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iprs_timezone`
--

CREATE TABLE `iprs_timezone` (
  `id` int(4) NOT NULL,
  `timezone` varchar(64) NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `craeted_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_timezone`
--

INSERT INTO `iprs_timezone` (`id`, `timezone`, `created_by`, `craeted_date`, `updated_by`, `updated_date`, `revision`) VALUES
(1, 'Africa/Abidjan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(2, 'Africa/Accra', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(3, 'Africa/Abidjan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(4, 'Africa/Accra', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(5, 'Africa/Addis_Ababa', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(6, 'Africa/Algiers', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(7, 'Africa/Asmara', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(8, 'Africa/Asmera', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(9, 'Africa/Bamako', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(10, 'Africa/Bangui', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(11, 'Africa/Banjul', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(12, 'Africa/Bissau', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(13, 'Africa/Blantyre', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(14, 'Africa/Brazzaville', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(15, 'Africa/Bujumbura', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(16, 'Africa/Cairo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(17, 'Africa/Casablanca', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(18, 'Africa/Ceuta', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(19, 'Africa/Conakry', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(20, 'Africa/Dakar', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(21, 'Africa/Dar_es_Salaam', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(22, 'Africa/Djibouti', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(23, 'Africa/Douala', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(24, 'Africa/El_Aaiun', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(25, 'Africa/Freetown', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(26, 'Africa/Gaborone', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(27, 'Africa/Harare', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(28, 'Africa/Johannesburg', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(29, 'Africa/Juba', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(30, 'Africa/Kampala', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(31, 'Africa/Khartoum', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(32, 'Africa/Kigali', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(33, 'Africa/Kinshasa', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(34, 'Africa/Lagos', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(35, 'Africa/Libreville', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(36, 'Africa/Lome', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(37, 'Africa/Luanda', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(38, 'Africa/Lubumbashi', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(39, 'Africa/Lusaka', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(40, 'Africa/Malabo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(41, 'Africa/Maputo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(42, 'Africa/Maseru', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(43, 'Africa/Mbabane', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(44, 'Africa/Mogadishu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(45, 'Africa/Monrovia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(46, 'Africa/Nairobi', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(47, 'Africa/Ndjamena', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(48, 'Africa/Niamey', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(49, 'Africa/Nouakchott', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(50, 'Africa/Ouagadougou', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(51, 'Africa/Porto-Novo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(52, 'Africa/Sao_Tome', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(53, 'Africa/Timbuktu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(54, 'Africa/Tripoli', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(55, 'Africa/Tunis', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(56, 'Africa/Windhoek', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(57, 'America/Adak', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(58, 'America/Anchorage', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(59, 'America/Anguilla', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(60, 'America/Antigua', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(61, 'America/Araguaina', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(62, 'America/Argentina/Buenos_Aires', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(63, 'America/Argentina/Catamarca', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(64, 'America/Argentina/ComodRivadavia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(65, 'America/Argentina/Cordoba', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(66, 'America/Argentina/Jujuy', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(67, 'America/Argentina/La_Rioja', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(68, 'America/Argentina/Mendoza', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(69, 'America/Argentina/Rio_Gallegos', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(70, 'America/Argentina/Salta', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(71, 'America/Argentina/San_Juan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(72, 'America/Argentina/San_Luis', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(73, 'America/Argentina/Tucuman', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(74, 'America/Argentina/Ushuaia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(75, 'America/Aruba', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(76, 'America/Asuncion', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(77, 'America/Atikokan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(78, 'America/Atka', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(79, 'America/Bahia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(80, 'America/Bahia_Banderas', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(81, 'America/Barbados', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(82, 'America/Belem', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(83, 'America/Belize', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(84, 'America/Blanc-Sablon', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(85, 'America/Boa_Vista', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(86, 'America/Bogota', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(87, 'America/Boise', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(88, 'America/Buenos_Aires', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(89, 'America/Cambridge_Bay', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(90, 'America/Campo_Grande', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(91, 'America/Cancun', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(92, 'America/Caracas', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(93, 'America/Catamarca', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(94, 'America/Cayenne', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(95, 'America/Cayman', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(96, 'America/Chicago', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(97, 'America/Chihuahua', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(98, 'America/Coral_Harbour', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(99, 'America/Cordoba', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(100, 'America/Costa_Rica', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(101, 'America/Cuiaba', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(102, 'America/Curacao', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(103, 'America/Danmarkshavn', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(104, 'America/Dawson', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(105, 'America/Dawson_Creek', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(106, 'America/Denver', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(107, 'America/Detroit', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(108, 'America/Dominica', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(109, 'America/Edmonton', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(110, 'America/Eirunepe', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(111, 'America/El_Salvador', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(112, 'America/Ensenada', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(113, 'America/Fortaleza', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(114, 'America/Fort_Wayne', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(115, 'America/Glace_Bay', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(116, 'America/Godthab', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(117, 'America/Goose_Bay', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(118, 'America/Grand_Turk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(119, 'America/Grenada', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(120, 'America/Guadeloupe', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(121, 'America/Guatemala', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(122, 'America/Guayaquil', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(123, 'America/Guyana', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(124, 'America/Halifax', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(125, 'America/Havana', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(126, 'America/Hermosillo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(127, 'America/Indiana/Indianapolis', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(128, 'America/Indiana/Knox', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(129, 'America/Indiana/Marengo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(130, 'America/Indiana/Petersburg', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(131, 'America/Indiana/Tell_City', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(132, 'America/Indiana/Vevay', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(133, 'America/Indiana/Vincennes', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(134, 'America/Indiana/Winamac', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(135, 'America/Indianapolis', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(136, 'America/Inuvik', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(137, 'America/Iqaluit', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(138, 'America/Jamaica', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(139, 'America/Jujuy', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(140, 'America/Juneau', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(141, 'America/Kentucky/Louisville', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(142, 'America/Kentucky/Monticello', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(143, 'America/Knox_IN', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(144, 'America/Kralendijk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(145, 'America/La_Paz', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(146, 'America/Lima', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(147, 'America/Los_Angeles', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(148, 'America/Louisville', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(149, 'America/Lower_Princes', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(150, 'America/Maceio', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(151, 'America/Managua', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(152, 'America/Manaus', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(153, 'America/Marigot', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(154, 'America/Martinique', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(155, 'America/Matamoros', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(156, 'America/Mazatlan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(157, 'America/Mendoza', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(158, 'America/Menominee', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(159, 'America/Merida', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(160, 'America/Metlakatla', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(161, 'America/Mexico_City', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(162, 'America/Miquelon', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(163, 'America/Moncton', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(164, 'America/Monterrey', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(165, 'America/Montevideo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(166, 'America/Montreal', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(167, 'America/Montserrat', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(168, 'America/Nassau', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(169, 'America/New_York', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(170, 'America/Nipigon', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(171, 'America/Nome', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(172, 'America/Noronha', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(173, 'America/North_Dakota/Beulah', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(174, 'America/North_Dakota/Center', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(175, 'America/North_Dakota/New_Salem', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(176, 'America/Ojinaga', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(177, 'America/Panama', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(178, 'America/Pangnirtung', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(179, 'America/Paramaribo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(180, 'America/Phoenix', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(181, 'America/Port-au-Prince', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(182, 'America/Porto_Acre', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(183, 'America/Porto_Velho', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(184, 'America/Port_of_Spain', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(185, 'America/Puerto_Rico', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(186, 'America/Rainy_River', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(187, 'America/Rankin_Inlet', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(188, 'America/Recife', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(189, 'America/Regina', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(190, 'America/Resolute', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(191, 'America/Rio_Branco', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(192, 'America/Rosario', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(193, 'America/Santarem', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(194, 'America/Santa_Isabel', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(195, 'America/Santiago', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(196, 'America/Santo_Domingo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(197, 'America/Sao_Paulo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(198, 'America/Scoresbysund', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(199, 'America/Shiprock', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(200, 'America/Sitka', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(201, 'America/St_Barthelemy', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(202, 'America/St_Johns', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(203, 'America/St_Kitts', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(204, 'America/St_Lucia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(205, 'America/St_Thomas', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(206, 'America/St_Vincent', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(207, 'America/Swift_Current', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(208, 'America/Tegucigalpa', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(209, 'America/Thule', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(210, 'America/Thunder_Bay', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(211, 'America/Tijuana', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(212, 'America/Toronto', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(213, 'America/Tortola', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(214, 'America/Vancouver', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(215, 'America/Virgin', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(216, 'America/Whitehorse', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(217, 'America/Winnipeg', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(218, 'America/Yakutat', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(219, 'America/Yellowknife', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(220, 'Antarctica/Casey', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(221, 'Antarctica/Davis', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(222, 'Antarctica/DumontDUrville', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(223, 'Antarctica/Macquarie', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(224, 'Antarctica/Mawson', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(225, 'Antarctica/McMurdo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(226, 'Antarctica/Palmer', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(227, 'Antarctica/Rothera', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(228, 'Antarctica/South_Pole', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(229, 'Antarctica/Syowa', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(230, 'Antarctica/Vostok', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(231, 'Arctic/Longyearbyen', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(232, 'Asia/Aden', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(233, 'Asia/Almaty', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(234, 'Asia/Amman', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(235, 'Asia/Anadyr', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(236, 'Asia/Aqtau', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(237, 'Asia/Aqtobe', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(238, 'Asia/Ashgabat', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(239, 'Asia/Ashkhabad', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(240, 'Asia/Baghdad', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(241, 'Asia/Bahrain', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(242, 'Asia/Baku', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(243, 'Asia/Bangkok', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(244, 'Asia/Beirut', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(245, 'Asia/Bishkek', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(246, 'Asia/Brunei', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(247, 'Asia/Calcutta', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(248, 'Asia/Choibalsan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(249, 'Asia/Chongqing', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(250, 'Asia/Chungking', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(251, 'Asia/Colombo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(252, 'Asia/Dacca', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(253, 'Asia/Damascus', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(254, 'Asia/Dhaka', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(255, 'Asia/Dili', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(256, 'Asia/Dubai', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(257, 'Asia/Dushanbe', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(258, 'Asia/Gaza', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(259, 'Asia/Harbin', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(260, 'Asia/Hebron', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(261, 'Asia/Hong_Kong', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(262, 'Asia/Hovd', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(263, 'Asia/Ho_Chi_Minh', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(264, 'Asia/Irkutsk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(265, 'Asia/Istanbul', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(266, 'Asia/Jakarta', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(267, 'Asia/Jayapura', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(268, 'Asia/Jerusalem', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(269, 'Asia/Kabul', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(270, 'Asia/Kamchatka', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(271, 'Asia/Karachi', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(272, 'Asia/Kashgar', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(273, 'Asia/Kathmandu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(274, 'Asia/Katmandu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(275, 'Asia/Kolkata', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(276, 'Asia/Krasnoyarsk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(277, 'Asia/Kuala_Lumpur', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(278, 'Asia/Kuching', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(279, 'Asia/Kuwait', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(280, 'Asia/Macao', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(281, 'Asia/Macau', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(282, 'Asia/Magadan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(283, 'Asia/Makassar', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(284, 'Asia/Manila', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(285, 'Asia/Muscat', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(286, 'Asia/Nicosia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(287, 'Asia/Novokuznetsk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(288, 'Asia/Novosibirsk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(289, 'Asia/Omsk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(290, 'Asia/Oral', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(291, 'Asia/Phnom_Penh', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(292, 'Asia/Pontianak', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(293, 'Asia/Pyongyang', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(294, 'Asia/Qatar', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(295, 'Asia/Qyzylorda', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(296, 'Asia/Rangoon', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(297, 'Asia/Riyadh', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(298, 'Asia/Saigon', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(299, 'Asia/Sakhalin', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(300, 'Asia/Samarkand', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(301, 'Asia/Seoul', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(302, 'Asia/Shanghai', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(303, 'Asia/Singapore', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(304, 'Asia/Taipei', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(305, 'Asia/Tashkent', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(306, 'Asia/Tbilisi', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(307, 'Asia/Tehran', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(308, 'Asia/Tel_Aviv', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(309, 'Asia/Thimbu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(310, 'Asia/Thimphu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(311, 'Asia/Tokyo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(312, 'Asia/Ujung_Pandang', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(313, 'Asia/Ulaanbaatar', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(314, 'Asia/Ulan_Bator', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(315, 'Asia/Urumqi', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(316, 'Asia/Vientiane', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(317, 'Asia/Vladivostok', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(318, 'Asia/Yakutsk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(319, 'Asia/Yekaterinburg', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(320, 'Asia/Yerevan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(321, 'Atlantic/Azores', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(322, 'Atlantic/Bermuda', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(323, 'Atlantic/Canary', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(324, 'Atlantic/Cape_Verde', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(325, 'Atlantic/Faeroe', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(326, 'Atlantic/Faroe', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(327, 'Atlantic/Jan_Mayen', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(328, 'Atlantic/Madeira', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(329, 'Atlantic/Reykjavik', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(330, 'Atlantic/South_Georgia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(331, 'Atlantic/Stanley', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(332, 'Atlantic/St_Helena', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(333, 'Australia/ACT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(334, 'Australia/Adelaide', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(335, 'Australia/Brisbane', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(336, 'Australia/Broken_Hill', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(337, 'Australia/Canberra', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(338, 'Australia/Currie', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(339, 'Australia/Darwin', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(340, 'Australia/Eucla', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(341, 'Australia/Hobart', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(342, 'Australia/LHI', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(343, 'Australia/Lindeman', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(344, 'Australia/Lord_Howe', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(345, 'Australia/Melbourne', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(346, 'Australia/North', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(347, 'Australia/NSW', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(348, 'Australia/Perth', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(349, 'Australia/Queensland', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(350, 'Australia/South', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(351, 'Australia/Sydney', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(352, 'Australia/Tasmania', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(353, 'Australia/Victoria', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(354, 'Australia/West', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(355, 'Australia/Yancowinna', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(356, 'Brazil/Acre', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(357, 'Brazil/DeNoronha', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(358, 'Brazil/East', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(359, 'Brazil/West', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(360, 'Canada/Atlantic', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(361, 'Canada/Central', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(362, 'Canada/East-Saskatchewan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(363, 'Canada/Eastern', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(364, 'Canada/Mountain', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(365, 'Canada/Newfoundland', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(366, 'Canada/Pacific', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(367, 'Canada/Saskatchewan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(368, 'Canada/Yukon', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(369, 'CET', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(370, 'Chile/Continental', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(371, 'Chile/EasterIsland', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(372, 'CST6CDT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(373, 'Cuba', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(374, 'EET', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(375, 'Egypt', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(376, 'Eire', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(377, 'EST', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(378, 'EST5EDT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(379, 'Etc/GMT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(380, 'Etc/GMT+0', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(381, 'Etc/GMT+1', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(382, 'Etc/GMT+10', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(383, 'Etc/GMT+11', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(384, 'Etc/GMT+12', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(385, 'Etc/GMT+2', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(386, 'Etc/GMT+3', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(387, 'Etc/GMT+4', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(388, 'Etc/GMT+5', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(389, 'Etc/GMT+6', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(390, 'Etc/GMT+7', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(391, 'Etc/GMT+8', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(392, 'Etc/GMT+9', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(393, 'Etc/GMT-0', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(394, 'Etc/GMT-1', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(395, 'Etc/GMT-10', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(396, 'Etc/GMT-11', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(397, 'Etc/GMT-12', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(398, 'Etc/GMT-13', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(399, 'Etc/GMT-14', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(400, 'Etc/GMT-2', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(401, 'Etc/GMT-3', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(402, 'Etc/GMT-4', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(403, 'Etc/GMT-5', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(404, 'Etc/GMT-6', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(405, 'Etc/GMT-7', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(406, 'Etc/GMT-8', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(407, 'Etc/GMT-9', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(408, 'Etc/GMT0', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(409, 'Etc/Greenwich', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(410, 'Etc/UCT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(411, 'Etc/Universal', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(412, 'Etc/UTC', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(413, 'Etc/Zulu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(414, 'Europe/Amsterdam', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(415, 'Europe/Andorra', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(416, 'Europe/Athens', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(417, 'Europe/Belfast', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(418, 'Europe/Belgrade', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(419, 'Europe/Berlin', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(420, 'Europe/Bratislava', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(421, 'Europe/Brussels', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(422, 'Europe/Bucharest', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(423, 'Europe/Budapest', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(424, 'Europe/Chisinau', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(425, 'Europe/Copenhagen', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(426, 'Europe/Dublin', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(427, 'Europe/Gibraltar', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(428, 'Europe/Guernsey', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(429, 'Europe/Helsinki', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(430, 'Europe/Isle_of_Man', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(431, 'Europe/Istanbul', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(432, 'Europe/Jersey', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(433, 'Europe/Kaliningrad', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(434, 'Europe/Kiev', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(435, 'Europe/Lisbon', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(436, 'Europe/Ljubljana', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(437, 'Europe/London', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(438, 'Europe/Luxembourg', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(439, 'Europe/Madrid', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(440, 'Europe/Malta', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(441, 'Europe/Mariehamn', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(442, 'Europe/Minsk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(443, 'Europe/Monaco', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(444, 'Europe/Moscow', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(445, 'Europe/Nicosia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(446, 'Europe/Oslo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(447, 'Europe/Paris', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(448, 'Europe/Podgorica', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(449, 'Europe/Prague', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(450, 'Europe/Riga', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(451, 'Europe/Rome', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(452, 'Europe/Samara', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(453, 'Europe/San_Marino', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(454, 'Europe/Sarajevo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(455, 'Europe/Simferopol', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(456, 'Europe/Skopje', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(457, 'Europe/Sofia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(458, 'Europe/Stockholm', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(459, 'Europe/Tallinn', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(460, 'Europe/Tirane', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(461, 'Europe/Tiraspol', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(462, 'Europe/Uzhgorod', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(463, 'Europe/Vaduz', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(464, 'Europe/Vatican', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(465, 'Europe/Vienna', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(466, 'Europe/Vilnius', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(467, 'Europe/Volgograd', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(468, 'Europe/Warsaw', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(469, 'Europe/Zagreb', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(470, 'Europe/Zaporozhye', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(471, 'Europe/Zurich', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(472, 'Factory', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(473, 'GB', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(474, 'GB-Eire', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(475, 'GMT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(476, 'GMT+0', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(477, 'GMT-0', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(478, 'GMT0', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(479, 'Greenwich', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(480, 'Hongkong', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(481, 'HST', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(482, 'Iceland', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(483, 'Indian/Antananarivo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(484, 'Indian/Chagos', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(485, 'Indian/Christmas', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(486, 'Indian/Cocos', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(487, 'Indian/Comoro', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(488, 'Indian/Kerguelen', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(489, 'Indian/Mahe', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(490, 'Indian/Maldives', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(491, 'Indian/Mauritius', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(492, 'Indian/Mayotte', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(493, 'Indian/Reunion', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(494, 'Iran', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(495, 'Israel', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(496, 'Jamaica', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(497, 'Japan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(498, 'Kwajalein', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(499, 'Libya', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(500, 'MET', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(501, 'Mexico/BajaNorte', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(502, 'Mexico/BajaSur', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(503, 'Mexico/General', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(504, 'MST', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(505, 'MST7MDT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(506, 'Navajo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(507, 'NZ', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(508, 'NZ-CHAT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(509, 'Pacific/Apia', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(510, 'Pacific/Auckland', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(511, 'Pacific/Chatham', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(512, 'Pacific/Chuuk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(513, 'Pacific/Easter', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(514, 'Pacific/Efate', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(515, 'Pacific/Enderbury', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(516, 'Pacific/Fakaofo', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(517, 'Pacific/Fiji', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(518, 'Pacific/Funafuti', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(519, 'Pacific/Galapagos', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(520, 'Pacific/Gambier', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(521, 'Pacific/Guadalcanal', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(522, 'Pacific/Guam', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(523, 'Pacific/Honolulu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(524, 'Pacific/Johnston', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(525, 'Pacific/Kiritimati', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(526, 'Pacific/Kosrae', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(527, 'Pacific/Kwajalein', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(528, 'Pacific/Majuro', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(529, 'Pacific/Marquesas', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(530, 'Pacific/Midway', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(531, 'Pacific/Nauru', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(532, 'Pacific/Niue', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(533, 'Pacific/Norfolk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(534, 'Pacific/Noumea', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(535, 'Pacific/Pago_Pago', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(536, 'Pacific/Palau', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(537, 'Pacific/Pitcairn', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(538, 'Pacific/Pohnpei', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(539, 'Pacific/Ponape', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(540, 'Pacific/Port_Moresby', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(541, 'Pacific/Rarotonga', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(542, 'Pacific/Saipan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(543, 'Pacific/Samoa', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(544, 'Pacific/Tahiti', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(545, 'Pacific/Tarawa', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(546, 'Pacific/Tongatapu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(547, 'Pacific/Truk', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(548, 'Pacific/Wake', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(549, 'Pacific/Wallis', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(550, 'Pacific/Yap', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(551, 'Poland', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(552, 'Portugal', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(553, 'PRC', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(554, 'PST8PDT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(555, 'ROC', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(556, 'ROK', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(557, 'Singapore', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(558, 'Turkey', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(559, 'UCT', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(560, 'Universal', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(561, 'US/Alaska', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(562, 'US/Aleutian', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(563, 'US/Arizona', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(564, 'US/Central', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(565, 'US/East-Indiana', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(566, 'US/Eastern', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(567, 'US/Hawaii', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(568, 'US/Indiana-Starke', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(569, 'US/Michigan', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(570, 'US/Mountain', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(571, 'US/Pacific', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(572, 'US/Pacific-New', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(573, 'US/Samoa', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(574, 'UTC', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(575, 'W-SU', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(576, 'WET', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0),
(577, 'Zulu', 'admin', '2018-09-03 10:35:15', '', '0000-00-00 00:00:00', 0);

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
  `photo` text DEFAULT NULL COMMENT 'User Photo Profile',
  `form` enum('active','deactive') NOT NULL DEFAULT 'active',
  `created_by` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(32) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT 0 COMMENT 'Total Profile Changes/Revision'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iprs_user`
--

INSERT INTO `iprs_user` (`id`, `username`, `name`, `password`, `salt`, `email`, `level`, `active`, `photo`, `form`, `created_by`, `created_date`, `updated_by`, `updated_date`, `revision`) VALUES
(0, 'admin', 'Administration', '8a3efe63a50f818872c87360720c0e844bdd3ba3bfab9878566cea4d0bd3566f363ee241334b07c1b2f2f25061227c2f51c4c05e6d82be3dc9518eba112e2e1c', 'c33ced4203835c500014f6971006ee38b74d3406e24b4f3c11d230db9e252647', 'ayungavis@gmail.com', 'developer', 'yes', '5231_admin_unicorn.jpg', 'deactive', 'admin', '2018-09-03 10:35:15', 'admin', '2018-12-22 12:52:37', 18),
(1, 'hublubemits', 'Kementerian Hubungan Luar BEM ITS', 'a4054aa09c68796d0dc97fe77629748999e35726d9d6c62147b8211ef35522e05afee012fec4851dcbed944f926a0cd58583df2289f60027fb60dbd94d77e221', '59e3cf8b408abb21ab8b77b8a4ef0b1e8b9dd33febb19dcb1930d0c7323dd322', 'hubunganluarbemits1819@gmail.com', 'admin', 'yes', 'avatar.png', 'active', 'admin', '2018-11-30 06:49:56', 'admin', '2018-11-30 06:50:34', 1),
(2, 'inkabemits', 'Kementerian Inkubator Kajian BEM ITS', '4e9c2cc49e624715cea10ffe7d90151ee86e9c80f86482a17235266c2805566764971394622f830970000aa41c3c32d66be72b741588230bfb777bbf3bea67da', '5ef816a91ed73c426ce7d6c10af091051d2bd405e0a0e01698f1c6603a631865', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 16:54:29', '', '0000-00-00 00:00:00', 0),
(3, 'menkoperkerakanbemits', 'kemenkoan pergerakan bem its', 'f54911da5c06855b3f76dfd029d91df001cd6ed9daabb4a3831171a680747b2292249d01e70eb14fb659ffddcd9b36b8d8a0a3074b51b4370a25479d93701c1b', '76c41eddb9ca0f6af500a40ca7cef6564a67d6dbf568b71bcc435b5513dd236d', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:06:36', '', '0000-00-00 00:00:00', 0),
(4, 'bakorits', 'BSO BAKOR PEMANDU ITS', 'f1dcb51975a0e30a86f8e44976ea15ae5379ad04139afc16311e07c4e3bc3b456e01a1c34fc4f236024032019bbc54704329b04e60f09ee78447ae169fdd6bf0', '519e3d3e51d24ab4e683d15b5110f75a17fad5c662afaea90b06c304d0934dac', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:12:17', '', '0000-00-00 00:00:00', 0),
(5, 'ieccits', 'BSO IECC ', '83d49a60257421206a2c10242f8279ffb2b08fdb91088f5d2618046b1a3e665c5f6c49268a5656d56137c98f5bea5e931e4d112b575ae94994c3d8f486628b6f', 'b220d0411611f03a17a78f0c3760903c0b531c96cd363a21eda6f9c54fd08689', '', 'user', 'yes', 'avatar.png', 'deactive', 'hublubemits', '2018-12-13 17:12:57', '', '0000-00-00 00:00:00', 0),
(6, 'bemfs', 'BEM FS', '839d6435028e0d5e96286a0a001c3b41becb43f668a037739b43554667200db592b60b0cdf93c147133a8327ab62c80f6e99eaebb276ab7478e4155288fe488a', '2574f7353d41c256f4096201a364c01e8bdeff321464ae61de1a000e00ab487a', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:13:48', '', '0000-00-00 00:00:00', 0),
(7, 'menkodinamobemits', 'Kemenkoan Dinamisasi dan Harmonisasi Kampus', 'a79515238f0cd5c6d2b47962519785b0de35c645b00dbf47843d666d1c39822890e10782acdea281659e03731f25c22b3885d172ea57c89c9f6a62102750d781', 'c15c3c76f0214a2a9b46e6991adce2f49345ca4b0c0da821fa167ddcf7979318', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:14:40', '', '0000-00-00 00:00:00', 0),
(8, 'bemfti', 'BEM FTI', '44c764236a0a7de41570568bfbb09387894e0ecc8c490afd405063216eb8797af52fb1d5500cbe83b071357447daebbdb830f33adcc0c75443cfd5e38e83fcde', '9e1b2a1c5751ac447a1ad81ebdfa494bc5ed538eb0353163b7376e3e57dc7210', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:14:55', '', '0000-00-00 00:00:00', 0),
(9, 'bemfadp', 'BEM FADP', 'b64212a33833443e62b9b95d10196739397517453635858ec217a2b3d721ae322051939e0eb5ec279ba0880e2c6daac2bc6f3cc5a0e7b02e1ce62880a46ad142', '326fb27638fa7745d4a7330541211722eb92968a34a89ae46f368156d78fe3fc', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:15:27', '', '0000-00-00 00:00:00', 0),
(10, 'bemftslk', 'BEM FTSLK', '196cdceac3f1dfa1b5a405d5765e3572e2b07c5ae7f0ef65783e6b7b587e9b3f1696aa9721aba40253e7a704724e7cc7762cec01a9ea4033a66eca173cb21597', '310fa6282a236f33c48dd27c94523f22324b5183ad6d517d953c5599cdc5c7c5', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:15:51', '', '0000-00-00 00:00:00', 0),
(11, 'bemftk', 'BEM FTK', 'f60de0344debfaa7ead7630c42f5bb1b4f84098b1008a0a92497b0cb529dc788494100bffcaec13616b6b65ae3760600034daf3b11c4633ac496c0534f53eaa3', '4c81b194726b125322772a7a146385b8ab6d27d57820fb1fbbc07bf15a010795', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:16:20', '', '0000-00-00 00:00:00', 0),
(12, 'bemftik', 'BEM FTIK', '55e080872ff5ebcb847b38eee38c54d1324e9090948882c0b0c0ebf4e3ca2ec9dea5a93eb16c987c1aea763edd4c31de9b74d2241ba71f76d67987ec90e50b1e', 'b6de3a1f68271a82754e881764345b1a75095ee8c18c41ba01c9e37652540fc0', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:16:48', '', '0000-00-00 00:00:00', 0),
(13, 'himasika', 'HIMASIKA ITS', '6ea8880bdb9ffaeaa745c1a1b0e94e19c6c1123b98847d6453a126e9144a7a3dee7dea62d289e67f3e42024faad9a4673db4fd4bf9116b5ecdcdf995fd5418dd', 'a518d0ca731fdfe59d6b76d3ef32b89c822490c7c06dc0fbdeb23599db4a972d', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:18:55', '', '0000-00-00 00:00:00', 0),
(14, 'himatika', 'HIMATIKA ITS', '1d010b7d4b8107cbd33c945eccb0323cd6c0e2cb5e9b6d3d722ad574495ca7db2d9ebb86279fb101bebd6a77db14a441a68bbf15f4bd8555b5712b981ccb28be', 'ca1b6f10e7de684e42c525d0cae335b9298dd5758e58af7222292f74bf132e06', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:19:55', '', '0000-00-00 00:00:00', 0),
(15, 'himasta', 'HIMASTA ITS', 'f0ceaeaeb1115dc788f0b69c08c311acf44367c71b07d44dc3f21be99d04ac82fee795749dc757772479307b5f548119c5cfa69635de154bb2e39e88389c74d5', '79028698da7b3dc4ff84f5c586c8cfc1cc1729a5153971874a39682d09c7cd47', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:20:23', '', '0000-00-00 00:00:00', 0),
(16, 'himadata', 'HIMADATA ITS', 'e11dd65537f5a8fb1ee634e3fa3c5379add17f54ec80d6c982b2830230d4c68cfb3ac435f4b2f27c71530d9249185fe3b737356f77c316dfcbf0297e3074bdbb', 'c540288c08f905367a4726407889afde5d902cf9977e27d0d20b635c0d32d766', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:20:59', '', '0000-00-00 00:00:00', 0),
(17, 'himka', 'HIMKA ITS', 'e2d3ebd7f1e204c0becf0d554c0abd33b79a72f033234e09fdcb6898ff28c1b47816ed4fdddfd9e3fe3f29a541032d70190532b6856bfcd6dae0a4841c1e61e8', 'cbe9d210d4497085591214ef9047cdafc2507ae28e9f3fd8fbf3f937575fdcf7', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:21:49', '', '0000-00-00 00:00:00', 0),
(18, 'himabits', 'HIMABITS ITS', '5bb42caec8edac6c6996c71c731798e0b06c6f4a6ec9f3a89819ae601814e88bd0e19ff19470fb44098d9484bbc1c105f695e2681817ea55a50380678ac0e951', 'a2434ce06d3ccc2554a43a30108095debafc3b9c89530e396575cea088e109e4', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:22:20', '', '0000-00-00 00:00:00', 0),
(19, 'hmm', 'HMM ITS', 'ebb4a5075e886fc0dc23148438a8dc3d78246a0a104783392b9d3f4af60169c409080a1d9ea0339bf8159b410e418ac3dfec5ea36cebdd7a4275bc6280c4d68c', '0fbf69543bfa61425774cc77406dc5d2fc144a70f4f8f9aa2d9fa5703a01de88', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:22:50', '', '0000-00-00 00:00:00', 0),
(20, 'hmdm', 'HMDM ITS', '6ffc00cc4ca48197ebedeb79726504176aea3ab201805907d0719002d9a10ad5af26a2bcee851faae71c956b7d663e17524c81d7b597d2eaa916b362a3d3ea25', 'a4e73dba53c3b86fdd41efe84ef831da23a5aa3f335927d0dc17d49e0aca7fd6', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:23:30', '', '0000-00-00 00:00:00', 0),
(21, 'himatektro', 'HIMATEKTRO ITS', '6d63a478397a0c49a0c514b73a8c60ca351b656dba1a0345ea6ccc5a5427bf246ce4f48e005ae6db6ef19dbe18dbe9553613f071c8e90fea81151262a563d7b0', 'a92d48adf7cf40f3e24a060397a8f60cc0da78b77b5935a0cd2be25f4f0350ad', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:23:58', '', '0000-00-00 00:00:00', 0),
(22, 'himad3kim', 'Himpunan Mahasiswa Diploma Teknik Kimia', '8c0ddcab9e8389f090a9a787686c1216b8d35d22bb1f461f7074cf06bd34e0b353f8c9c4f1460c0b6275ec2358889b69c83613b56bcf408887a759a75ae0949e', 'ff7d1a223dbe221a1fce95ae25c0b806990bd699c7d4591e8ab574cc5cabe911', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:24:23', '', '0000-00-00 00:00:00', 0),
(23, 'himad3tektro', 'HIMAD3TEKTRO', 'd8b5588b693ad60e1b9731e794fecab2508db1fe908ab811e90f25f00b8e9528add28342da1cf8a5f99fd2b71800ae0ebb09469dc04fbb3174ce6a679242ad57', 'd859c4d74b52db415e82de5fc02919ff8fec96b513a4fb731f73f7c98f263cb8', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:24:31', '', '0000-00-00 00:00:00', 0),
(24, 'himatekk', 'HIMATEKK ITS', '33adc6f1512a093a5864d5691d380f44840340d79e56f41da4cc096f0fcb83afa056ae0dfcaec990667c13e167acdb96170e761128a6afbb9f54d9acb801ee1d', '3ee4e739cb577bc732aa9c3c66510e61d36414f3f3b8a74715c3a774e00f60f0', 'himatekkits@gmail.com', 'user', 'yes', '6062_himatekk_Screenshot_20181214-212230_Gallery.jpg', 'active', 'hublubemits', '2018-12-13 17:24:55', 'himatekk', '2018-12-14 21:24:25', 4),
(25, 'ristekbemits', 'Kementrian Riset dan Teknologi', '39817a3160fc73acf246bd96007379e8d4ec1d7bd1c18e08db8517924153c36f6bbac88db5c7f3f3c992f4c7c7ff7aa67cf12ace3ea726ea640bd74819655216', '56fb2159da30b1755ba06e6eae6895fdf54ca9d8d7802d24b873003278fd8b56', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:25:13', '', '0000-00-00 00:00:00', 0),
(26, 'bemfmksd', 'BEM FMKSD', '68454f29ea77ac803eb87204456b2319ce7a1fb9e30f992e234a7f83d96e8ea0fe2c005a243121cca3fb6ad7f76a5d4089eed6bef086a0620f062a12b17fee96', 'ebf67b2d794566b3a30d70318766c62a19f3a23f77cbb028221dff4b1a33d932', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:25:24', '', '0000-00-00 00:00:00', 0),
(27, 'sosmasbemits', 'Kementrian Sosial Masyarakat', '01028570af1c353f156629aaec029e9783c92540c99e0ba65538ce2a4d775fc2ab5c8434f75c153cd7b580f5cb0d01ce0d65ca3c2d1edd0e9c2b77a01d4af618', '20288eadfec95398d19dab2b65a363f081da40de5774c5c83688928ee52266ee', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:26:31', '', '0000-00-00 00:00:00', 0),
(28, 'hmtf', 'Himpunan Mahasiswa Teknik Fisika', 'd7a3f510d4b3b69ffac3350c19ddbbd103741745bd5889be7d053cfacea35536aa00c3dde46f763c1ecabb184c2cc53e5849853c2a58c456d2e50e8ba9bc5f7e', '8ce24a72af63025a8863aea34d1779a776b478bbdbf2feefebf55798bd6ccaf7', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:26:31', '', '0000-00-00 00:00:00', 0),
(29, 'hmti', 'Himpunan Mahasiswa Teknik Industri', '0b765f6402b7772d986f25f09bb85e35a161062afe4e446b96f023294dba738b166b36ca0a40a66c12393b697776958f77a5e8fdb343e0f2e5358d33f48fbc56', 'bed998b99ae5b3ef2dad19cbde4a81cb2ae2573219e10fe0ebd74d437dec8018', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:26:52', '', '0000-00-00 00:00:00', 0),
(30, 'hmmt', 'Himpunan Mahasiswa Teknik Material dan Metalurgi', 'c3d320fcc44b10b61f368c4a8fc81ecc622cc9db16af46e59e91f08ea92324c6052e6a93d037fecf689d6e88c025bb1546dfe5f66c54006a23d2b9c10af505c5', '9e5ac48171bd72b58b6895e20bd4838d5d86471edd9a1cdee93f76b079229faa', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:27:15', '', '0000-00-00 00:00:00', 0),
(31, 'bmsa', 'Himpunan Mahasiswa Manajemen Bisnis', 'd78446dbabf74036ed0db8b2fc80d625e5895350450558725e685f9bccac30da6b295980891b6eaad265b563f35e90949052293dcd8c0fc2fb96aeb3dfa59f1b', 'a84ddc5ea1b324988ef38415123d4db2afd55fe6aa33e0a1bc35caa7fa1bec98', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:27:29', '', '0000-00-00 00:00:00', 0),
(32, 'perkombemits', 'Kementrian Perekonomian', '26dbcbee29476d2af4313d9d935191b7b2bff9fc2f975a821965d27e865096594ad8e264371b15d254cf1ac7bd83977a543d9158ede8b31d5e26671d98f2a592', '70bae542618c425d367c37fd41713f47a1718350bee0aa6332e7bc5048ac4a07', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:27:42', '', '0000-00-00 00:00:00', 0),
(33, 'hms', 'Himpunan Mahasiswa Teknik Sipil', '51a1a5ed054dfe71d6a80f5bd20fb1fc5e8f56d1d53d1ccb0525b0dcff2463cef61ad54fda8632370cf12273fe7be3408f16c192fdfc273c8c19f2caed4f4999', '4894d0ff9cd344c78e40784bbe49e9896748e5c04ab1d1866cb1c92a924fecbf', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:27:48', '', '0000-00-00 00:00:00', 0),
(34, 'hmds', 'Himpunan Mahasiswa Diploma Teknik Sipil', '9ad90d05da87e1d7ad82eb120df43b937d4ebea11abacc12e733805a40666c72577286603aabcd84049bb65547b3ab4b276ef52ab6039fe89b125047a36bf9fe', '17a84ad958bb1e3c25d9c889821f3cd10f15c574e27b4b431ccd29490cf06255', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:28:09', '', '0000-00-00 00:00:00', 0),
(35, 'himasthapati', 'Himpunan Mahasiswa Sthapati Arsitektur', '64152763922de416ec34fe6150c04e9045debf37132ef72d7eb8abf0ebe78bbceec8e27a924b7264d0051c90d2c8b481c3f8ec5082dfb6b2e04c69bf13709b76', '82746ae8050549871b321f0398dacee4494371508b5c4f11b43c509bfb85836f', 'himasthapati.arch.its@gmail.com', 'user', 'yes', '9113_himasthapati_uuf1P4vF_400x400.jpeg', 'active', 'hublubemits', '2018-12-13 17:28:39', 'himasthapati', '2019-01-18 11:18:48', 2),
(36, 'hmtl', 'Himpunan Mahasiswa Teknik Lingkungan', 'bd7adfe0c584fa91facee9bd597ac6a61b05b17ad52c27f5063ede3663d60b4571df44e7ae12a43ae3b7841c46a19ffa8ec3702f2905b1331aa9403263647540', 'cc9c68ec83b21d72a73a4e94e20f386b07992a2b2c50d158f2b1043e08cee5ab', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:29:04', '', '0000-00-00 00:00:00', 0),
(37, 'hmpl', 'Himpunan Mahasiswa Planologi', '24add1991a91615d6e73baf8c6642b3ced503bca6894eb4fcfe4b6c5d3fc0e53d4fc833486d1e031a55090b841852702d987495ecc7e0051c9c0c5c298962a19', '7ae8b13e6b121391f138161a8e049ce203fba9b241fab6c38288a986c7c3b6e2', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:29:40', '', '0000-00-00 00:00:00', 0),
(38, 'himage', 'Himpunan Mahasiswa Teknik Geomatika', '4a07afa2f6bb304642fc3a50cfec6db9afafdc8fe42e1e8724d25f737bfd4c22b35cb43403a563d02e6a4b9e5ff91fefe8a05d5d0ea9ca13ae0e6fe0a8144a78', '2ebdd0897f8226d2df0f20d22d5d077fe5ff281d7a46edeeffac17a2b569d00f', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:30:03', '', '0000-00-00 00:00:00', 0),
(39, 'adkesmabemits', 'Kementian Advokasi Kesejahteraan Mahasiswa', 'bb693f31d8d02b23410b479bfc9d93544207871ce66d8b6d5cd7e0ca6769d7b57d1209f62dc1bc84921c447e50624331e9f9f7bb1136218a474267b33e37423e', '4e83caf94b201c2c8702f3cba70af820a717f7f1c74e77d562d576cf42888b8f', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:30:06', '', '0000-00-00 00:00:00', 0),
(40, 'himaide', 'Himpunan Mahasiswa Desain Produk', '533ebf8ce45da4716e8964d700bd0cfc554dbb075c41de26c06c7b19d9ffeaf38709d5bd7a38ae870900ce9c77f9993edc30c33eebae18bb07a3ed53feded34a', '3ea675042cc72ae49d675c190388d066ef18c0f1b656368eb90695be240c42e9', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:30:22', '', '0000-00-00 00:00:00', 0),
(41, 'hmdi', 'Himpunan Mahasiswa Desain Interior', 'cbc81d27f98cb4b47adef31aac006817a513b60c36392c102245cf3212444e5ca8a53346e986e0fb6d88eefb769de18f7ff7ef6e707ab37f09505e7d2a420db0', '962679ccae76602ad092764278ff7815d3c2083ae044a7eb1c8e123cf042c8d8', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:30:45', '', '0000-00-00 00:00:00', 0),
(42, 'hmtg', 'Himpunan Mahasiswa Teknik Geofisika', '5f2d5aa3a640b6f09aa5e7c3432c4560da4327c73af39ae9a9a61200175dd2b678fe30ec7f42d7b8b1c99e6dfe460cc6331762f1aef13d0c4254c48b4efcc1f8', 'c269138bc603e46ed707762b09b601e1d44fa16614621ddc089b2c00fce99fc5', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:31:05', '', '0000-00-00 00:00:00', 0),
(43, 'aksprobemits', 'Kementrian Aksi dan Propaganda', 'c8aca65b27ed7141873c53b3a870ba251f5d5f5ba5da0db1f92d0deb2416badc1fe9d2520c120ed5374af4fa674ec3dc3bfe551da71977c2ffff102ad39aedd1', 'fab88db7e90398eca298af1fd4b7dabbeb324d21e0e071d95b6845e2e9fc80cc', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:31:07', '', '0000-00-00 00:00:00', 0),
(44, 'himatekpal', 'Himpunan Mahasiswa Teknik Perkapalan', '9d0233378e57d64bc0de36d24a8d459c8b51865d9a1a5d34ce9bbeb9ccd9cefc2295d0d4e696edc1457a5ce3b8e45d484ff78e266ee2cf0e34a10e28a1a93a15', 'a3ec6efeafc59927345f59bcaa1e5628ed1b8692914fa8965710e79629e1880c', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:31:23', '', '0000-00-00 00:00:00', 0),
(45, 'himasiskal', 'Himpunan Mahasiswa Teknik Sistem Perkapalan', '5b16fecd6ea4c8f697d087a43dbb82539ebc93d930488ed308639d1e692d92f85dc62891c1ca1d6f34b324b0208181314cd069cedb76873197d57c0e78a647f2', '5de035dbb8f79c051987f42bca3d368ed77a65ba4848a30581d97b35bb90a1d7', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:31:49', '', '0000-00-00 00:00:00', 0),
(46, 'himatekla', 'Himpunan Mahasiswa Teknik Kelautan', '4de879f6423d7b3e85e69706574428ca5c5a7fc8a54a0e88143add2d11c3c4c6317aac402a5602f534071461a94e6b33e6c98ff9bfc92e59898b188c4b00d3e1', 'c5b9278be73f06337b11a9d578a8d179a6bbbeaaa522cf29638b1153e3029c44', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:32:07', '', '0000-00-00 00:00:00', 0),
(47, 'dagribemits', 'Kementrian Dalam Negri', '0e890b2f8082262fd66d7fef6d30602910a97e0d3c7957df1f941ae96031ecbdadc6eff145d95434d96705ae203090f89c9c34ff1b8c1b84199842cac4c50b33', 'a6b1e5ba707f52f4a26fd3a5d67b695b0ad04d7f63bc5093f4a7be37083e812f', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:32:11', '', '0000-00-00 00:00:00', 0),
(48, 'himaseatrans', 'Himpunan Mahasiswa Transportasi Laut', '3bb562b118c4c367bee74eb32f9e9d6ebde3b6933c5f38cf108aa334bbdfcb0efd6a93accb8c91c4aed83d683618c412eeb4f432af31fb57e9127d572f78188e', 'f094c046a31fd0b6afde3af4faeeb34cd4c3c7598d68d804a68c7a25f97b670f', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:32:33', '', '0000-00-00 00:00:00', 0),
(49, 'hmtc', 'Himpunan Mahasiswa Teknik Informatika', 'd9f559754466e46117f8e191721bcb34d23867f46cd8dc99cb699f50b6e6c30a85ccf54712a1472425dc95486e3ad30d4c933b5c4af8b0fca1c1073a4d0336e4', 'a0122a407921e5de73002c41ac6f79d4a366b3bd2c4d33c594fa6002178c9de3', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:32:51', '', '0000-00-00 00:00:00', 0),
(50, 'hmsi', 'Himpunan Mahasiswa Sistem Informasi', '2cf0ceee68f3b27ccdef61b4eab8c92f80f786da90c78989271942a7d6e582da12daa128c72e1cfa25772f2901cb61cc3595744b316f573c2c554c359de10c43', '52d0a692bed30e2a267870f6099695e7a7831ad41ade8eb211c52644fb9f1269', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:33:10', '', '0000-00-00 00:00:00', 0),
(51, 'psdmbemits', 'Kementrian Pengembangan Sumber Daya Mahasiswa', '6f7a62fca0b6d88c4b10fc2a5e46d8bd413213a94eeaf8ca1659bc8c459e1ab39fe160458b6f2b944d8e508ccd73b72b7b9732bd6b158e41f34b336d64ac986e', 'b7d70d111d0a579a5abadf4ece603455d0e1b6f8b4013229b2284d35d943cadc', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:33:21', '', '0000-00-00 00:00:00', 0),
(52, 'kominfobemits', 'Kementrian Komunikasi dan Informatika', 'f23556e61a4633a9ad900f2bfa341e48d9b50959104b8c27be75ec2a080ffbce2673ead8ef46c0a2d1fe6fc3d4fff26ef87f629c1cc72f25f5293519e211373c', '9bf7ee689f786536fad08ede3c610e574edde21bd13fa3adb2c1d4a02ee409d3', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:34:28', '', '0000-00-00 00:00:00', 0),
(53, 'kpbemits', 'Kementrian Kebijakan Publik', 'f9dfff10b38f1a489dea0aa56f3324126288b1daeaf3a5387d106c3bc777b9e7e7fc46ae1c7cf81b233e699af3e1fc8a3c00e2225237e2eadab835acb22e09d9', '392ef05b7c7c19a968aeee98af75620537f092a71aad0a92ade100ea21b30518', '', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-13 17:35:34', '', '0000-00-00 00:00:00', 0),
(54, 'himatekins', 'Himpunan Mahasiswa Teknik Instrumentasi', 'd75b9a9a38b356b2a6228311c011fdb802145cb9350e11642d8d47f0baec5ab555962c440eb50621c198ed10852444097334628dbea264b773eeee58d42f76de', '0c03940963aa0604b67196d11ab9c00cdc9eb6b623e777b77bb7e6e59f6d1c64', 'himatekins@gmail.com', 'user', 'yes', 'avatar.png', 'active', 'hublubemits', '2018-12-27 17:17:39', '', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iprs_announcement`
--
ALTER TABLE `iprs_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_changelog`
--
ALTER TABLE `iprs_changelog`
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
-- Indexes for table `iprs_faq`
--
ALTER TABLE `iprs_faq`
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
-- Indexes for table `iprs_staff`
--
ALTER TABLE `iprs_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iprs_timezone`
--
ALTER TABLE `iprs_timezone`
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
-- AUTO_INCREMENT for table `iprs_changelog`
--
ALTER TABLE `iprs_changelog`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iprs_comp_type`
--
ALTER TABLE `iprs_comp_type`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iprs_database`
--
ALTER TABLE `iprs_database`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

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
-- AUTO_INCREMENT for table `iprs_faq`
--
ALTER TABLE `iprs_faq`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iprs_log`
--
ALTER TABLE `iprs_log`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `iprs_menu`
--
ALTER TABLE `iprs_menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `iprs_page`
--
ALTER TABLE `iprs_page`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `iprs_proposal`
--
ALTER TABLE `iprs_proposal`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iprs_setting`
--
ALTER TABLE `iprs_setting`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `iprs_staff`
--
ALTER TABLE `iprs_staff`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iprs_timezone`
--
ALTER TABLE `iprs_timezone`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;

--
-- AUTO_INCREMENT for table `iprs_user`
--
ALTER TABLE `iprs_user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'User ID', AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
