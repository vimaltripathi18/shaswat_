-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2019 at 06:19 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7731825_shaswat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `dp` varchar(200) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(24) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `dp`, `user`, `password`, `name`) VALUES
(1, '', 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `place` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `d1` varchar(50) NOT NULL,
  `d2` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `place`, `type`, `d1`, `d2`) VALUES
(1, 'about', 'text', '', '<p style=\"text-align: justify;\"><font size=\"3\"><i style=\"\"><span style=\"text-align: justify; background-color: rgb(255, 255, 255);\"><font face=\"comic sans ms\" style=\"\"><b style=\"\">Shashwat Mass Media Services pvt ltd</b> are fully equipped with the entire infrastructure required for providing excellent services for advertising in print, electronic and outdoor media under one roof. Based at Lucknow, With a better insight of the psyche of the populace of Uttar Pradesh, we can communicate in a more subtle and effective manner. Loaded with latest software and gadgets, our creative team can translate all thoughts and reproduce ideas that actually work. Our experienced media personnel can formulate a cost-effective media plan to ensure maximum return on your investments. Our 24x7 client servicing team is always at your beck and call.&nbsp;</font></span></i></font></p><p style=\"text-align: justify;\"><font size=\"3\" face=\"comic sans ms\"><b><i style=\"\"><span style=\"text-align: justify; background-color: rgb(255, 255, 255);\"><br></span></i></b></font><font size=\"3\" face=\"comic sans ms\"><b><i style=\"\">Working on the maxim of value for money, we strive endlessly towards the sole objective of rendering quality, cost effective services so as to \"optimise the reach of a client and establish its product\".</i></b></font></p>'),
(2, 'news', 'text', 'enable', 'database testing !!!'),
(3, 'port', 'pdf', '', 'Profile_Lucknow.pdf'),
(4, 'rate', 'star', '5', ''),
(5, 'service', 'text', 'CLIENT SERVICING', 'A team of highly motivated, energetic professionals, always at your back and call for constant interaction.'),
(9, 'service', 'text', 'MEDIA PLANING', 'A team of dedicated Media Planners for cost-effective, target specific and strategic media planning.'),
(10, 'service', 'text', 'PRINT-PRODUCTION', 'This comprises of a Production Executive along with a panel of top-of-the-line printers with hi-tech imported machines for pre-press and printing jobs in offset, screen, digital and other allied jobs.'),
(11, 'service', 'text', 'OUTDOOR ADVERTISING', 'A panel of reputed Outdoor Advertisers for expediting outdoor advertising jobs like Banners, Glow-signs, Hoardings, Tree-guards etc.'),
(12, 'service', 'text', 'EXHIBITION & DISPLAY', 'An experienced panel of experts in designing and fabrication for installation of Exhibition Pavillions, Stalls etc., including designing of display material.'),
(13, 'service', 'text', 'PUBLIC RELATIONS', 'Good relations with the media, coupled with expert guidance by experts ensures quality PR services. Soon To Offer Services In The Following Fields'),
(15, 'service', 'text', 'ELECTRONIC MEDIA', 'Creation of documentaries, advt. films, radio jingles, slide presentations, etc. along with release of advts. in the electronic media'),
(16, 'service', 'text', 'MARKETING', 'For marketing Research, Strategy Planning and Implementation.'),
(18, 'copyright', 'text', '', '<b><font size=\"6\"><i><u>Copyright</u></i></font></b>'),
(19, 'hyper', 'text', '', ''),
(20, 'tandc', 'text', '', 'g'),
(21, 'privacy', 'text', '', ''),
(22, 'dis', 'text', '', '<b><i>Disclaimer</i></b>'),
(23, 'service', 'text', 'CREATIVE DESIGNING', 'A full fledged studio with all modern equipment and comprising of Copywriter,\r\nArt Director, Visualiser, Graphics Designer and Finishing Artist for quality\r\ndesigning.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `type`, `size`, `date`) VALUES
(32, 'shashwat_32.png', 'image/png', '22953', '2019-03-27'),
(35, 'shashwat_33.jpeg', 'image/jpeg', '179170', '2019-03-31'),
(36, 'shashwat_36.jpeg', 'image/jpeg', '179170', '2019-03-31'),
(38, 'shashwat_38.png', 'image/png', '226684', '2019-03-31'),
(39, 'shashwat_39.png', 'image/png', '226684', '2019-03-31'),
(40, 'shashwat_40.png', 'image/png', '226684', '2019-03-31'),
(41, 'shashwat_41.png', 'image/png', '226684', '2019-03-31'),
(42, 'shashwat_42.jpeg', 'image/jpeg', '18214', '2019-03-31'),
(44, 'shashwat_44.jpeg', 'image/jpeg', '18214', '2019-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `page` varchar(20) NOT NULL,
  `file` varchar(50) NOT NULL,
  `valid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `page`, `file`, `valid`) VALUES
(1, 'Contact', 'contact.php', 'active'),
(2, 'Portfolio', 'port.php', 'active'),
(3, 'Gallery', 'gallery.php', 'active'),
(4, 'Associate', 'client.php', 'active'),
(5, 'Services', 'service.php', 'active'),
(6, 'About Us', 'about.php', 'active'),
(7, 'xyz', 'account.php', 'delete'),
(10, 'ss', 'account.php', 'delete'),
(11, '', 'Profile_Lucknow.pdf', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `menu_video`
--

CREATE TABLE `menu_video` (
  `id` int(11) NOT NULL,
  `place` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_video`
--

INSERT INTO `menu_video` (`id`, `place`, `name`, `size`) VALUES
(1, 'index', 'sss.mp4', '27061408'),
(2, 'review', 'kk.mp4', '59136876');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip`, `date`, `status`) VALUES
(1, '::1', '2019-03-12', 'valid'),
(10, '172.0.0.1', '2019-03-12', 'valid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page` (`page`);

--
-- Indexes for table `menu_video`
--
ALTER TABLE `menu_video`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `place` (`place`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_video`
--
ALTER TABLE `menu_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
