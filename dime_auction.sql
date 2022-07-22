-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2015 at 04:37 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dime_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `link` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `image`, `status`, `heading`, `discription`, `link`) VALUES
(95, '1343032582water lilies.jpg', 1, 'dfgdfg', 'dfgfdg', 'dfgfdg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `position`) VALUES
(1, 'cisco', 1),
(2, 'test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categoryinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_categoryinfo` (
  `Category_id` int(11) NOT NULL,
  `Category_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categoryinfo`
--

INSERT INTO `tbl_categoryinfo` (`Category_id`, `Category_Name`) VALUES
(1, 'बिद्यालय र बालमन्दीर'),
(2, 'गा बि स भवन\r'),
(3, 'सबै सरकारी कार्यालयहरु\r'),
(4, 'कृषि तथा पशु सेवा केन्द्र\r'),
(5, 'इलाका हुलाक कार्यालय\r'),
(6, 'नगरपालीकाहरु\r'),
(7, 'जि बि स / अतिथी गृहहरु\r'),
(8, 'स्वास्थ्य चौकि, उप. स्वा. चौकि\r'),
(9, 'इलाका बन, रेन्जपोष्ट\r'),
(10, 'भन्सार कार्यालय\r'),
(11, 'बिमानस्थल कार्यालय\r'),
(12, 'रेडियो, टि भि, एफएम, टेलीफोन\r'),
(13, 'खानेपानी योजना,सरसफाइ,शौचालय\r'),
(14, 'झो. पु. योजना\r'),
(15, 'सडक र पक्की पुल\r'),
(16, 'सिचाइ योजना, तटबन्ध\r'),
(17, 'आर्युबेद अस्पताल\r'),
(18, 'राष्ट्रिय निकुञ्ज\r'),
(19, 'अदालतहरु, वकील कार्यालय\r'),
(20, 'इलाका प्रहरी, चौकि,  बिट\r'),
(21, 'मठ,मन्दीर,रेडक्रस,खाद्यडिपो, जलविद्युत, कृषिबैंक, सहकारी, सामाजिक संस्था, मतदान केन्द्र, सामुदायिक भवन, गुम्बा, पुस्तकालय\r'),
(22, 'नमूना बस्ती,  सहिद पार्क, स्मारक\r');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE IF NOT EXISTS `tbl_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `partner_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `name`, `detail`, `image`, `description`, `partner_id`, `position`) VALUES
(26, 'Media', 'THis is the test brand...', '', '<p>&nbsp;It is the brand that is to be used for various purposes....</p>', 0, 1),
(7, 'Router World', '', 'gallery/router_featuredimage-610x2502152.jpg', '', 53, 1),
(39, 'nn', 'dfdf', 'gallery/utube65398492.png', '<p>dfsdfds</p>', 0, 1),
(40, 'jdfdjflj', 'dlfjsdlfj', '', '<p>dfsdafdsf</p>', 0, 2),
(36, 'Kathmandu Brand', 'this is the desctiption of kathmandu related brand', 'gallery/logo4468.png', '<p>hello you can access the following equipment on this brand</p>', 0, 1),
(33, 'Nepali Brand', 'this is all about nepali brand', 'gallery/news_next5230.png', '<p>this is about the nepali brand.................</p>', 0, 2),
(41, 'dfsdf', 'sdfsdf', 'gallery/prev2183.png', '<p>dsfdsfsdf</p>', 0, 2),
(42, 'fddsfsdfd', 'sdfsdfsdfdfd', 'gallery/logo5564.jpg', '<p>dfsdfsdfsdfdsfdf</p>', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail` longtext NOT NULL,
  `position` tinyint(3) NOT NULL,
  `heading` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `detail`, `position`, `heading`) VALUES
(1, 'this is footer', 0, 'this is heading');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_front`
--

CREATE TABLE IF NOT EXISTS `tbl_front` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(45) NOT NULL,
  `image` varchar(250) NOT NULL,
  `position` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `tbl_front`
--

INSERT INTO `tbl_front` (`id`, `heading`, `image`, `position`, `description`, `detail`) VALUES
(29, 'Trainings and Courses', 'gallery/Blue hills2772.jpg', 'Footer Middle', '<ul class="listing">\r\n    <li><a href="http://localhost/Dristi_Nawaraj/menudetails.php?type=Mainmenu&amp;id=7">Basic Networking </a></li>\r\n    <li><a href="http://dristi.com.np/site/menudetails.php?type=Mainmenu&amp;id=7">Basic Linux Training</a></li>\r\n    <li><a href="http://dristi.com.np/site/menudetails.php?type=Mainmenu&amp;id=7">CCNA (Cisco Certified Network Associate)</a></li>\r\n    <li><a href="http://dristi.com.np/site/menudetails.php?type=Mainmenu&amp;id=7">ISP Essential (System and Network Administration) </a></li>\r\n    <li>newly edited</li>\r\n</ul>', 'hello this is training section'),
(97, 'ttttt', '12_07_27_09_29_51_Blue hills.jpg', 'Front Left', '<p>ttttt</p>', 'tttttt'),
(98, 'ttttt', '12_07_27_09_30_03_Blue hills.jpg', 'Front Left', '<p>ttttt</p>', 'tttttt'),
(94, 'Footer', '', 'Footer Bottom', '<p>@media guru</p>', 'edited and complie by nawaraj bhandari '),
(96, 'client testiomony', '', 'Footer Left', '<p><a href="http://testimonials_details.php">dsagda</a></p>', 'here you can get');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mainmenu`
--

CREATE TABLE IF NOT EXISTS `tbl_mainmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `method` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `position` int(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_mainmenu`
--

INSERT INTO `tbl_mainmenu` (`id`, `menu_name`, `method`, `link`, `position`, `status`) VALUES
(1, 'Home', 'Link', 'index.php', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menucontent`
--

CREATE TABLE IF NOT EXISTS `tbl_menucontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `details` longtext NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_menucontent`
--

INSERT INTO `tbl_menucontent` (`id`, `menu_id`, `menu`, `menu_name`, `page_title`, `keyword`, `attribute`, `image`, `description`, `details`, `position`, `status`) VALUES
(33, 2, 'Mainmenu', '', 'Company Profile', 'About Dristitech', 'Read all', '', '', '<p>Established in 2009, Dristi Tech is a diversified, competitive and  professional service oriented organization to serve and facilitate  prospective clients in the field of ICT in particular Network Design,  Integration and Network Security. We are established to fulfill growing  demands of ICT solutions in Nepal.</p>\r\n<br />\r\n<p>Dristi Tech advocates a new business design, which emphasizes a finely tuned integration of business, technology and people.</p>\r\n<br />\r\n<p>Our mission is to become your one stop solution provider for Network,  Security and Communication requirement. We provide prime IT Solutions  and Services to your business so that you can focus on your core  business, maximize your business output while reducing delivery time and  hence adding value to the relationship.</p>', 1, 1),
(34, 7, 'Mainmenu', '', 'Distritech training', '', 'Read all', '', '', '<p><!--[if gte mso 9]><xml>\r\n<w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\nDefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\nLatentStyleCount="267">\r\n<w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Normal" />\r\n<w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="heading 1" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8" />\r\n<w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 1" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 2" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 3" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 4" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 5" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 6" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 7" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 8" />\r\n<w:LsdException Locked="false" Priority="39" Name="toc 9" />\r\n<w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption" />\r\n<w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Title" />\r\n<w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font" />\r\n<w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Subtitle" />\r\n<w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Strong" />\r\n<w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Emphasis" />\r\n<w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Table Grid" />\r\n<w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text" />\r\n<w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="No Spacing" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 1" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 1" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 1" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 1" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 1" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 1" />\r\n<w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision" />\r\n<w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="List Paragraph" />\r\n<w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Quote" />\r\n<w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Intense Quote" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 1" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 1" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 1" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 1" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 1" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 1" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 1" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 1" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 2" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 2" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 2" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 2" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 2" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 2" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 2" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 2" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 2" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 2" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 2" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 2" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 2" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 2" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 3" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 3" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 3" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 3" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 3" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 3" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 3" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 3" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 3" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 3" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 3" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 3" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 3" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 3" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 4" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 4" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 4" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 4" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 4" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 4" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 4" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 4" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 4" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 4" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 4" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 4" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 4" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 4" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 5" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 5" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 5" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 5" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 5" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 5" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 5" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 5" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 5" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 5" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 5" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 5" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 5" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 5" />\r\n<w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Shading Accent 6" />\r\n<w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light List Accent 6" />\r\n<w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Light Grid Accent 6" />\r\n<w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 1 Accent 6" />\r\n<w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Shading 2 Accent 6" />\r\n<w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 1 Accent 6" />\r\n<w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium List 2 Accent 6" />\r\n<w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 1 Accent 6" />\r\n<w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 2 Accent 6" />\r\n<w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Medium Grid 3 Accent 6" />\r\n<w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Dark List Accent 6" />\r\n<w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Shading Accent 6" />\r\n<w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful List Accent 6" />\r\n<w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\nUnhideWhenUsed="false" Name="Colorful Grid Accent 6" />\r\n<w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis" />\r\n<w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis" />\r\n<w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Subtle Reference" />\r\n<w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Intense Reference" />\r\n<w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\nUnhideWhenUsed="false" QFormat="true" Name="Book Title" />\r\n<w:LsdException Locked="false" Priority="37" Name="Bibliography" />\r\n<w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading" />\r\n</w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n/* Style Definitions */\r\ntable.MsoNormalTable\r\n{mso-style-name:"Table Normal";\r\nmso-tstyle-rowband-size:0;\r\nmso-tstyle-colband-size:0;\r\nmso-style-noshow:yes;\r\nmso-style-priority:99;\r\nmso-style-qformat:yes;\r\nmso-style-parent:"";\r\nmso-padding-alt:0in 5.4pt 0in 5.4pt;\r\nmso-para-margin-top:0in;\r\nmso-para-margin-right:0in;\r\nmso-para-margin-bottom:10.0pt;\r\nmso-para-margin-left:0in;\r\nline-height:115%;\r\nmso-pagination:widow-orphan;\r\nfont-size:11.0pt;\r\nfont-family:"Calibri","sans-serif";\r\nmso-ascii-font-family:Calibri;\r\nmso-ascii-theme-font:minor-latin;\r\nmso-hansi-font-family:Calibri;\r\nmso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:"Times New Roman";\r\nmso-bidi-theme-font:minor-bidi;}\r\n</style>\r\n<![endif]--></p>\r\n<div id="content-wrapper">\r\n<div class="content">\r\n<p>DRISTI PROFESSIONAL ACADEMY, established by group of IT  professionals specializes in providing premium training in the field of  Internetworking Technologies (Data/Voice Technologies, Network  Securities/Firewalls, Operating Systems and Servers). We not only  provide students with theory but practically train them with instructors  having practical working experiences in a industry standard real time  LAB environment.</p>\r\n<br />\r\n<p>Professional courses we offer -</p>\r\n<ul class="listing">\r\n    <li>Basic Networking - 2 weeks</li>\r\n    <li>Basic Linux Training - 2 weeks</li>\r\n    <li>CCNA (Cisco Certified Network Associate) - 7 weeks</li>\r\n    <li>ISP Essential (System and Network Administration) - 12 weeks</li>\r\n</ul>\r\n<p>We can also prepare course outline as you want for corporate or group training. Some of our specialized package courses are:</p>\r\n<ul class="listing">\r\n    <li>Mail Server Administration - 1 week</li>\r\n    <li>Web Server Administration - 1 week</li>\r\n    <li>Linux Firewall - 1 week</li>\r\n    <li>Fortigate Network Administration - 2 weeks</li>\r\n    <li>Corporate Essential (ICT Management) - 2 weeks</li>\r\n</ul>\r\n<p>For more information <a href="http://www.dristi.edu.np/" target="_blank">http://www.dristi.edu.np</a></p>\r\n</div>\r\n</div>\r\n<p>&nbsp;</p>', 1, 1),
(35, 6, 'Mainmenu', '', 'Some of our valued customers are:', '', 'Read all', '', '', '<ul class="listing">\r\n    <li>Green Ventures</li>\r\n    <li>Everest Bank Limited</li>\r\n    <li>Nabil Bank Limited</li>\r\n    <li>DCBL Bank Limited</li>\r\n    <li>NMB Bank Limited</li>\r\n    <li>APCA Nepal</li>\r\n    <li>Sanima Bikash Bank Limited</li>\r\n    <li>Jyoti Bikash Bank Limited</li>\r\n    <li>Kasthamandap Development Bank Limited</li>\r\n    <li>Sewa Bikash Bank Limited</li>\r\n    <li>Smart Choice Technologies Pvt. Ltd.</li>\r\n    <li>International Development Bank Limited</li>\r\n    <li>Business Development Bank Limited</li>\r\n    <li>Bright Development Bank Limited</li>\r\n    <li>Sindhu Bikash Bank Limited</li>\r\n    <li>Excel Development Bank Limited</li>\r\n    <li>Standard Finance Limited</li>\r\n    <li>Sagarmatha Insurance Company Limited</li>\r\n    <li>Yeti Finance Limited</li>\r\n    <li>Capital Merchant Banking and Finance Limited.</li>\r\n</ul>', 0, 1),
(31, 10, 'Mainmenu', '', 'Services', 'test', 'Read all', 'gallery/34932.png', 'dfsdfdsfds', '<p>We primarily deal with System, Network design with high-end security solution. In an arena of ICT solution providers, we are one of the emerging leaders in Nepal.<br />\r\n<br />\r\nOur service and market ranges are not only limited to system and network design, we also provide other services as per our customers&rsquo; requirements. This would be Notebooks to Servers, Printers to Photocopiers, UPS to Generators, Routers, Managed/Unmanaged Switches, LAN/WAN equipment, Office automation equipment including PABX systems.<br />\r\n<br />\r\nWe are more specific into following core ICT services:<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp; <br />\r\n&nbsp;&nbsp; Network Architecture and Design<br />\r\n&nbsp;&nbsp;&nbsp; Structured Cabling</p>\r\n<ul>\r\n    <li>&nbsp;&nbsp;&nbsp; Wireless Survey and Installation</li>\r\n    <li>&nbsp;&nbsp;&nbsp; System Design and Implementation (Linux and Windows)</li>\r\n    <li>&nbsp;&nbsp;&nbsp; System and Network Security Solutions</li>\r\n    <li>&nbsp;&nbsp;&nbsp; Annual Operation and Maintenance</li>\r\n    <li>&nbsp;&nbsp;&nbsp; New Technology Testing and Implementation</li>\r\n    <li>&nbsp;&nbsp;&nbsp; CCTV surveillance system</li>\r\n    <li>&nbsp;&nbsp;&nbsp; PABX and IP-PABX Installation and Maintenance (VOIP)</li>\r\n</ul>\r\n<p>&nbsp;&nbsp;&nbsp;</p>', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `detail` text NOT NULL,
  `price` varchar(45) NOT NULL,
  `oprice` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `lproduct` tinyint(6) NOT NULL,
  `company_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `detail`, `price`, `oprice`, `description`, `image`, `lproduct`, `company_id`, `subcategory_id`) VALUES
(15, 'dfgfsyfsf', 'nawaraj fgdfgdfg  gfdgfdg fgfdgfdsdfsfsfsffdfsfsfsf jfdjfld f fdljfdjf fjd fdljf df djf dfljd fd fd', '23233', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aenean ac purus eget odio feugiat dictum quis non metus.</p>', 'gallery/cisco6973.jpg', 0, 6, 57),
(14, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\n                      Aenean ac purus eget odio feugiat dictum quis non metus.', 'ooooo', '11111', '', 'gallery/product4033.jpg', 1, 10, 53),
(12, 'fge', '', '45345', '3453', '', '$destination', 0, 0, 0),
(29, 'tttt', 'rfe', '43443', '34443', '', 'gallery/b_prev1266.png', 0, 9, 52),
(30, 'teeee', '', '543453', '3543', '', '', 0, 9, 53),
(17, 'kgfkgkfk', 'jfjgjgggggggggggg', '547474', '', '<p>hgkgkkgkgh</p>', 'gallery/categories75358516.jpg', 0, 10, 54),
(6, 'Very Good', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\n                      Aenean ac purus eget odio feugiat dictum quis non metus.', '', '', '', 'gallery/825088_ Linksys_Router_wiki_big1702.jpg', 1, 10, 54),
(16, 'ljhlhl', 'gfkkkkkkkkkkkkkkkkkkkkk', '100000000', '', '', 'gallery/ae69811693.png', 1, 6, 54),
(59, 'dsfasdfsad', '', '', '', '', '12_08_14_08_53_06_12_07_23_08_15_42_Winter.jpg', 1, 7, 52),
(34, 'TK-3412', 'THis is the router for high peformance work....', '50000', '45000', '<p>&nbsp;drsgdfg dhgkasdhkj &nbsp;sad</p>\r\n<p>sadf osdajf</p>\r\n<p>[sdaf psadfsd</p>\r\n<p>&nbsp;sadjflsdakf</p>\r\n<p>&nbsp;asdoifjlsdf</p>', 'gallery/Winter6207.jpg', 1, 27, 53),
(21, 'jllllllllllllll', 'ljjjjjjjjjjjjjjjjjjj', '6666666666666', '', '<p>jllllllllllhlhljkhkj</p>', 'gallery/48297.png', 0, 10, 55),
(23, 'hth', 'gffffffffffffffffff', '45555555', '', '<p>hfghhhhhhhhhhhhhfffffffffff</p>', 'gallery/product4317.jpg', 0, 8, 54),
(24, 'hgfhfgf', 'fhhhhhhhh', '45456', '', '<p>fhfhfhf</p>', 'gallery/juniper2774.jpg', 0, 6, 54),
(25, 'hfhfh', 'gffhgfhf', '45454', '', '<p>fhfghfhgf</p>', 'gallery/44850.png', 0, 6, 54),
(26, 'infgdgdg', 'dfgdgdfgf', '45454', '', '<p>fgfhh</p>', 'gallery/37128.png', 0, 6, 52),
(27, 'vfdg', 'vcsdv', '3443', '', '<p>dsgsg</p>', 'gallery/32765.png', 0, 9, 54),
(28, 'dgdfg', '', '353455', '11111111', '<p>dfdgfgh</p>', '', 0, 8, 53),
(31, 'ttddtt', '', '545', '456', '', 'gallery/b_next7050.png', 0, 9, 54),
(32, 'teedde', '', '4654', '5665', '', 'gallery/next9468.png', 0, 8, 53),
(33, 'txddfggv', '', '2343', '4334', '', '', 0, 9, 54),
(35, 'nawaraj', 'dfdsfsdfsd', '10000', '1250', '<p>fsdfsdfsdf</p>', '', 0, 0, 52),
(58, 'dsfasdfsad', '', '', '', '', '12_08_14_08_52_22_12_07_23_08_15_42_Winter.jpg', 1, 7, 52),
(39, 'dfdsf', 'dfdfsd', 'sdfdsf', 'dfdf', '<p>fdsdfs</p>', '', 0, 38, 52),
(57, 'tttttt', 'test', '1000', '100', '<p>&nbsp;test</p>', '12_08_14_08_42_16_10-170273608.jpg', 1, 7, 62),
(50, 'ttttttttt', 'dfsadf', '100', '80', '<p>&nbsp;fsfdsfds</p>', '12_08_14_07_42_33_Chrysanthemum.jpg', 1, 7, 52),
(51, 'terte', '', '', '', '', '12_08_14_07_44_14_Penguins.jpg', 1, 0, 0),
(52, 'dfasdf', '', '', '', '<p>&nbsp;dfasd</p>', '12_08_14_07_44_32_Penguins.jpg', 1, 7, 52),
(53, 'dfsdfsdfasdf', '', '', '', '', '12_08_14_07_49_04_ws-c2960-48tt-l8583.jpg', 1, 7, 52),
(56, 'testing image', 'tt', '100', '80', '', '12_08_14_08_41_53_5-55465.jpg', 1, 0, 52),
(55, 'testing image', 'tt', '100', '80', '', '12_08_14_08_41_45_5-55465.jpg', 1, 0, 52),
(60, 'dfgdg', '', '', '', '', '12_08_14_08_53_27_12_08_05_04_52_10_2100_LS3814.jpg', 1, 7, 56),
(61, 'fsdfsaf', 'tt', '10000', '500', '', '12_08_14_08_57_40_2120_LS40457862.jpg', 1, 7, 52);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_middle`
--

CREATE TABLE IF NOT EXISTS `tbl_product_middle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_detail` varchar(500) NOT NULL,
  `link` varchar(45) NOT NULL,
  `position` int(11) NOT NULL,
  `level` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_product_middle`
--

INSERT INTO `tbl_product_middle` (`id`, `link_detail`, `link`, `position`, `level`) VALUES
(16, 'gallery/ad6579.jpg', 'index.php', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_name` varchar(45) NOT NULL,
  `category_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `banner_visibility` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`id`, `subcat_name`, `category_id`, `position`, `image`, `banner_visibility`) VALUES
(55, 'Borderless Network', 0, 4, '', 0),
(56, 'Unified Computing and Servers', 0, 5, '', 0),
(54, 'Voice and Conferencing', 0, 3, '', 0),
(52, ' Survillence and Security', 0, 1, '', 0),
(53, 'Routers and Switches', 0, 2, '', 0),
(57, 'Wireless', 0, 6, '', 0),
(58, 'Physical Security and Building Systems', 0, 7, '', 0),
(60, 'nawaraj', 0, 2, 'gallery/nopic5119.jpg', 0),
(61, 'media guru types category', 0, 2, '', 0),
(62, 'dfgfdsgfdsg', 0, 0, 'gallery/Winter2391.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjectinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_subjectinfo` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(300) NOT NULL,
  `Category_id` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subjectinfo`
--

INSERT INTO `tbl_subjectinfo` (`subject_id`, `subject_name`, `Category_id`) VALUES
(1, 'क्याम्पस', 1),
(2, 'उच्च मा बि', 1),
(3, 'मा बि', 1),
(4, 'नि मा बि', 1),
(5, 'प्रा बि', 1),
(6, 'बाल गृह', 1),
(7, 'बाल मन्दीर', 1),
(8, 'पुस्तकालय', 1),
(9, 'छात्रवास', 1),
(10, 'छात्रावास', 1),
(11, 'संगठन भवन', 1),
(12, 'अध्ययन केन्द्र', 1),
(13, 'गा बि स भवन', 2),
(14, 'सम्पर्क कार्यालय', 2),
(15, 'कार्यालय भवन', 3),
(16, 'कारागार भवन', 3),
(17, 'कैदी र पाले घर', 3),
(18, 'कारागार कम्पाउण्ड वाल', 3),
(19, 'आवास भवन', 3),
(20, 'कृषिसेवा केन्द्र', 4),
(21, 'पशुसेवा केन्द्र', 4),
(22, 'ईलाका हुलाक कार्यालय', 5),
(23, 'अतिरिक्त हुलाक कार्यालय', 5),
(24, 'नगरपालीका भवन', 6),
(25, 'वडा कार्यालय', 6),
(26, 'जि बि स भवन', 7),
(27, 'जि प्रा का भवन', 7),
(28, 'अतिथि गृह', 7),
(29, 'स्वाश्थ्य चौकी', 8),
(30, 'उपस्वाश्थ्य चौकी', 8),
(31, 'ईलाका बन कार्यालय', 9),
(32, 'रेन्ज पोष्ट भवन', 9),
(33, 'भन्सार', 10),
(34, 'बिमानस्थल', 11),
(35, 'बिमानस्थल टर्मिनल टावर', 11),
(36, 'बिमानस्थल सुरक्षा भवन', 11),
(37, 'रेडियो स्टेशन', 12),
(38, 'टेलिफोन टावर', 12),
(39, 'टि भि स्टेशन', 12),
(40, 'एफ एम स्टेशन', 12),
(41, 'खा पा आयोजना', 13),
(42, 'ढल विकास आयोजना', 13),
(43, 'शौचालय निर्माण आयोजना', 13),
(44, 'झो पु', 14),
(45, 'काठे पुल', 14),
(46, 'सडक', 15),
(47, 'पक्की पुल', 15),
(48, 'ट्रस बृज', 15),
(49, 'सिचाई', 16),
(50, 'तटबन्ध', 16),
(51, 'अस्पताल', 17),
(52, 'आयुर्वेद अस्पताल', 17),
(53, 'औषधालय भवन', 17),
(54, 'राष्टिय निकुञ्ज', 18),
(55, 'निकुञ्ज पोष्ट', 18),
(56, 'अदालत भवन', 19),
(57, 'बकिल कार्यालय', 19),
(58, 'अंचल प्रहरी कार्यालय', 20),
(59, 'जिल्ला प्रहरी कार्यालय', 20),
(60, 'सिमा प्रहरी चौकी', 20),
(61, 'ईलाका प्रहरी कार्यालय', 20),
(62, 'ईलाका प्रहरी चौकी', 20),
(63, 'प्रहरी चौकी', 20),
(64, 'प्रहरी पोष्ट', 20),
(65, 'प्रहरी बिट', 20),
(66, 'बैक भवन', 21),
(67, 'जलबिध्युत', 21),
(68, 'विधुतीकरण', 21),
(69, 'रेडक्रस भवन', 21),
(70, 'सामुदायिक भवन', 21),
(71, 'सामाजिक सस्था भवन', 21),
(72, 'सस्थान भवन', 21),
(73, 'समिति भवन', 21),
(74, 'केन्द्र भवन ', 21),
(75, 'कभर्ड हल ', 21),
(76, 'खेल मैदान', 21),
(77, 'सहकारी भवन', 21),
(78, 'मतदान केन्द्र', 21),
(79, 'कम्पाउण्ड वाल', 21),
(80, 'खाध्यडिपो', 21),
(81, 'धार्मिक स्थल', 21),
(82, 'पर्यटन क्षेत्र संरक्षण ', 21),
(83, 'बसपार्क', 21),
(84, 'मन्दिर', 21),
(85, 'गुम्बा', 21),
(86, 'मठ', 21),
(87, 'आश्रम', 21),
(88, 'चिहान', 21),
(89, 'नमुना बस्ती', 22),
(90, 'शहीद पार्क', 22),
(91, 'शान्ति पार्क', 22),
(92, 'स्मृति भवन ', 22),
(93, 'शहीद गेट', 22),
(94, 'बाटीका तथा उध्यान', 22),
(95, 'स्मारक', 22),
(96, 'सालिक ', 22),
(97, 'प्रतिक्षलय ', 22),
(98, 'प्रतिष्ठान भवन', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE IF NOT EXISTS `tbl_submenu` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `sub_menu` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `position` int(50) NOT NULL,
  `status` int(10) NOT NULL,
  `mainmenuid` int(11) NOT NULL,
  `bottom_position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE IF NOT EXISTS `tbl_testimonial` (
  `id` int(11) NOT NULL,
  `heading` varchar(45) NOT NULL,
  `details` text NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(250) NOT NULL,
  `ftestimonial` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trimenu`
--

CREATE TABLE IF NOT EXISTS `tbl_trimenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tri_menu` varchar(45) NOT NULL,
  `method` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `position` int(45) NOT NULL,
  `status` int(11) NOT NULL,
  `submenuid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_trimenu`
--

INSERT INTO `tbl_trimenu` (`id`, `tri_menu`, `method`, `link`, `position`, `status`, `submenuid`) VALUES
(1, 'Test Trimenu1', 'Post', '', 1, 1, 1),
(2, 'Cisco', 'Post', '', 1, 1, 2),
(3, 'juniper', 'Post', '', 2, 1, 2),
(4, 'Router', 'Post', '', 1, 1, 3),
(5, 'Cell Phone', 'Post', '', 1, 1, 3),
(6, 'tcp-ip touter', 'Post', '', 1, 1, 8),
(7, 'Typical Categories', 'Post', '', 1, 1, 9),
(8, 'test1', 'Post', '', 1, 1, 10),
(10, 'fdfgdg', 'Post', '', 1, 1, 12),
(11, 'test_hi', 'Post', '', 1, 1, 12),
(12, 'jfdkfgd', 'Post', '', 1, 1, 13),
(16, 'gfdfg', '0', '', 1, 1, 9),
(17, 'fgdg', '0', '', 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(40, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(39, 'nawaraj', 'd0b3b7d8157c3057b45342df1493d39e'),
(41, 'niru', 'd0b3b7d8157c3057b45342df1493d39e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmcode` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `name`, `email`, `username`, `password`, `confirmcode`) VALUES
(1, 'nawaraj', 'sun2006bhandari@gmail.com', 'nawaraj', '4314178fe54df0651ee50d060fea2b4a', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`) VALUES
('nawaraj'),
('pradip');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
