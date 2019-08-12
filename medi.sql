-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2015 at 08:00 AM
-- Server version: 5.5.43-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medi`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `CODE` varchar(20) DEFAULT NULL,
  `COUNTRY` varchar(50) DEFAULT NULL,
  `SH_CODE` varchar(2) DEFAULT NULL,
  `SERI_NO` bigint(20) DEFAULT NULL,
  `Head` varchar(100) DEFAULT NULL,
  `REF_NO` int(11) DEFAULT NULL,
  `REF_NO_C` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CODE`, `COUNTRY`, `SH_CODE`, `SERI_NO`, `Head`, `REF_NO`, `REF_NO_C`) VALUES
('1', 'KUWAIT', 'KU', 1, NULL, 1, 'KU');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE IF NOT EXISTS `doc` (
  `docid` bigint(20) DEFAULT NULL,
  `docname` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `grp` varchar(30) DEFAULT NULL,
  `id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`docid`, `docname`, `name`, `grp`, `id`) VALUES
(4, 'Lab Test Master File', 'mnusinv', 'Master Files', 1),
(5, 'Doctor Master File', 'mnucrn', 'Master Files', 2),
(6, 'OPD Medical', 'mnu_p_ret', 'Data Capture', 9),
(7, 'Test Results Entry', 'mnucruti', 'Data Capture', 10),
(2, 'Create User', '', 'Administration', 62),
(1, 'Change Password', '', 'Administration', 63),
(3, 'Manage Permission', '', 'Administration', 64),
(8, 'Customer Master File', NULL, 'Master Files', NULL),
(9, 'Medical Master File', NULL, 'Master Files', NULL),
(10, 'Country Master File', NULL, 'Master Files', NULL),
(11, 'Medical Register', NULL, 'Data Capture', NULL),
(12, 'Medical Entry', NULL, 'Data Capture', NULL),
(13, 'Label Print', NULL, 'Inquiry', NULL),
(14, 'OPD Summery', NULL, 'Report', NULL),
(15, 'Channeling Summery', NULL, 'Report', NULL),
(16, 'Patient Registration', NULL, 'Data Capture', NULL),
(17, 'Channeling Entry', NULL, 'Data Capture', NULL),
(18, 'Puchase', NULL, 'Data Capture', NULL),
(19, 'Invoice', NULL, 'Data Capture', NULL),
(20, 'Patient History', NULL, 'Inquiry', NULL),
(21, 'Lab Report', NULL, 'Report', NULL),
(22, 'Discount Approval', NULL, 'Administration', NULL),
(23, 'Item Master', NULL, 'Master Files', NULL),
(24, 'Medical Inquiry', NULL, 'Inquiry', NULL),
(25, 'Package Master', NULL, 'Master Files', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `docmas`
--

CREATE TABLE IF NOT EXISTS `docmas` (
  `code` varchar(25) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `charges` decimal(10,2) DEFAULT NULL,
`id` int(11) NOT NULL,
  `tele` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `address3` varchar(50) DEFAULT NULL,
  `totchar` decimal(10,2) DEFAULT NULL,
  `doccharge` int(11) DEFAULT NULL,
  `hoscharge` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `docmas`
--

INSERT INTO `docmas` (`code`, `name`, `charges`, `id`, `tele`, `fax`, `email`, `address`, `address2`, `address3`, `totchar`, `doccharge`, `hoscharge`) VALUES
('4', 'OPD', 0.00, 38, '', '', NULL, '', NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emas`
--

CREATE TABLE IF NOT EXISTS `emas` (
  `CODE` varchar(15) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `ADD1` varchar(100) DEFAULT NULL,
  `ADD2` varchar(100) DEFAULT NULL,
  `OPBAL` decimal(20,2) DEFAULT NULL,
  `TELE` varchar(50) DEFAULT NULL,
  `CONT` varchar(30) DEFAULT NULL,
  `CUR_BAL` decimal(20,2) DEFAULT NULL,
  `OPDATE` date DEFAULT NULL,
  `LIMIT1` decimal(20,2) DEFAULT NULL,
  `PEN` decimal(20,2) DEFAULT NULL,
  `PENDA` date DEFAULT NULL,
  `FAX` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `LABLI` varchar(50) DEFAULT NULL,
  `chklimi` smallint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emas`
--

INSERT INTO `emas` (`CODE`, `NAME`, `ADD1`, `ADD2`, `OPBAL`, `TELE`, `CONT`, `CUR_BAL`, `OPDATE`, `LIMIT1`, `PEN`, `PENDA`, `FAX`, `EMAIL`, `LABLI`, `chklimi`) VALUES
('A005', 'ABC Company', 'Colombo 15', NULL, 0.00, '234234', '', 343423423.00, '2014-02-06', 234234.00, NULL, NULL, '234234', '2342frwerf', '', 0),
('B006', 'BCD Company', 'Colombo 10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('C007', 'CEF Company', 'Colombo 06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('E001', 'eee', 'eeee', NULL, 1212312.00, '123123', 'eee', 123123.00, '0000-00-00', 123132.00, NULL, NULL, '123123', '123123', 'eee', 0),
('H001', 'ede', 'erer', NULL, 0.00, '', '', 0.00, '0000-00-00', 0.00, NULL, NULL, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `entry_log`
--

CREATE TABLE IF NOT EXISTS `entry_log` (
`id` bigint(20) NOT NULL,
  `refno` varchar(50) DEFAULT NULL,
  `serino` varchar(20) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `docid` bigint(20) DEFAULT NULL,
  `docname` varchar(200) DEFAULT NULL,
  `trnType` varchar(20) DEFAULT NULL,
  `stime` datetime DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `c_code` varchar(20) DEFAULT NULL,
  `ppno` varchar(20) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `paid` decimal(20,2) DEFAULT NULL,
  `exe` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `entry_log`
--

INSERT INTO `entry_log` (`id`, `refno`, `serino`, `username`, `docid`, `docname`, `trnType`, `stime`, `sdate`, `c_code`, `ppno`, `amount`, `paid`, `exe`) VALUES
(1, '1', '1', '', 3, 'REGE', 'SAVE', '2015-05-29 00:00:00', '2015-05-29', NULL, NULL, NULL, NULL, NULL),
(2, '2', '2', '', 3, 'REGE', 'SAVE', '2015-05-29 00:00:00', '2015-05-29', NULL, NULL, NULL, NULL, NULL),
(3, '3', '2', '', 3, 'REGE', 'SAVE', '2015-05-29 00:00:00', '2015-05-29', NULL, NULL, NULL, NULL, NULL),
(4, '3', '1', '-', 3, 'REGE', 'EDIT', '2015-05-29 00:00:00', '2015-05-29', '', 'N 333333', 7500.00, 0.00, NULL),
(5, '5', '2', '', 3, 'REGE', 'SAVE', '2015-05-29 00:00:00', '2015-05-29', NULL, NULL, NULL, NULL, NULL),
(6, '5', '1', '-', 3, 'REGE', 'EDIT', '2015-05-29 00:00:00', '2015-05-29', '', 'n 1215346', 7500.00, 0.00, NULL),
(7, '', '2', '', 3, 'REGE', 'SAVE', '2015-05-29 00:00:00', '2015-05-29', NULL, NULL, NULL, NULL, NULL),
(8, '1', '1', '-', 3, 'REGE', 'EDIT', '2015-05-29 00:00:00', '2015-05-29', 'A005', 'N 1111111', 7500.00, 7500.00, NULL),
(9, '2', '1', '-', 3, 'REGE', 'EDIT', '2015-05-29 00:00:00', '2015-05-29', '', 'N 222222', 7500.00, 0.00, NULL),
(10, '3', '1', '-', 3, 'REGE', 'EDIT', '2015-05-29 00:00:00', '2015-05-29', '', 'N 333333', 7500.00, 0.00, NULL),
(11, '3', '1', '', 3, 'REGE', 'SAVE', '2015-05-29 00:00:00', '2015-05-29', NULL, NULL, NULL, NULL, NULL),
(12, '2', '6', '', 3, 'REGE', 'SAVE', '2015-05-29 00:00:00', '2015-05-29', NULL, NULL, NULL, NULL, NULL),
(13, '3', '5', '-', 3, 'REGE', 'EDIT', '2015-05-29 00:00:00', '2015-05-29', '', 'n34234', 0.00, 0.00, NULL),
(15, '3', '1', '', 3, 'REGE', 'SAVE', '2015-05-29 00:00:00', '2015-05-29', NULL, NULL, NULL, NULL, NULL),
(16, '3', '1', '-', 3, 'REGE', 'EDIT', '2015-05-29 00:00:00', '2015-05-29', '', 'N 232323', 0.00, 0.00, NULL),
(17, '3', '1', '-', 3, 'REGE', 'EDIT', '2015-05-29 00:00:00', '2015-05-29', '', 'N 232323', 0.00, 0.00, NULL),
(18, '3', NULL, '', 12, 'SUMEDI', 'SAVE', '2015-05-29 00:00:00', '0000-00-00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invpara`
--

CREATE TABLE IF NOT EXISTS `invpara` (
  `COMPANY` varchar(50) NOT NULL DEFAULT '',
  `ADD1` varchar(50) DEFAULT NULL,
  `ADD2` varchar(50) DEFAULT NULL,
  `ADD3` varchar(50) DEFAULT NULL,
  `TELE` varchar(50) DEFAULT NULL,
  `FAX` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `appno` bigint(20) DEFAULT '0',
  `master_dev` char(5) DEFAULT NULL,
  `labtest` bigint(20) DEFAULT NULL,
  `testno` bigint(20) DEFAULT NULL,
  `tmpappno` bigint(20) DEFAULT NULL,
  `tmptestno` bigint(20) DEFAULT NULL,
  `itemno` bigint(20) DEFAULT NULL,
  `tmpitemno` bigint(20) DEFAULT NULL,
  `SPINV` bigint(20) DEFAULT NULL,
  `tmpinvno` bigint(20) DEFAULT NULL,
  `tmplabtest` bigint(20) DEFAULT NULL,
  `arno` bigint(20) DEFAULT NULL,
  `tmparno` bigint(20) DEFAULT NULL,
  `tmpchano` bigint(20) DEFAULT NULL,
  `chano` bigint(20) DEFAULT NULL,
  `tmppareg` bigint(20) DEFAULT NULL,
  `pareg` bigint(20) DEFAULT NULL,
  `A` int(11) DEFAULT NULL,
  `B` int(11) DEFAULT NULL,
  `C` int(11) DEFAULT NULL,
  `D` int(11) DEFAULT NULL,
  `E` int(11) DEFAULT NULL,
  `F` int(11) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `H` int(11) DEFAULT NULL,
  `I` int(11) DEFAULT NULL,
  `J` int(11) DEFAULT NULL,
  `K` int(11) DEFAULT NULL,
  `L` int(11) DEFAULT NULL,
  `M` int(11) DEFAULT NULL,
  `N` int(11) DEFAULT NULL,
  `O` int(11) DEFAULT NULL,
  `P` int(11) DEFAULT NULL,
  `Q` int(11) DEFAULT NULL,
  `R` int(11) DEFAULT NULL,
  `S` int(11) DEFAULT NULL,
  `T` int(11) DEFAULT NULL,
  `U` int(11) DEFAULT NULL,
  `V` int(11) DEFAULT NULL,
  `W` int(11) DEFAULT NULL,
  `X` int(11) DEFAULT NULL,
  `Y` int(11) DEFAULT NULL,
  `Z` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invpara`
--

INSERT INTO `invpara` (`COMPANY`, `ADD1`, `ADD2`, `ADD3`, `TELE`, `FAX`, `EMAIL`, `appno`, `master_dev`, `labtest`, `testno`, `tmpappno`, `tmptestno`, `itemno`, `tmpitemno`, `SPINV`, `tmpinvno`, `tmplabtest`, `arno`, `tmparno`, `tmpchano`, `chano`, `tmppareg`, `pareg`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`, `J`, `K`, `L`, `M`, `N`, `O`, `P`, `Q`, `R`, `S`, `T`, `U`, `V`, `W`, `X`, `Y`, `Z`) VALUES
('CONFIDENCE MEDICAL', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE IF NOT EXISTS `lab_test` (
`id` int(11) NOT NULL,
  `testname` varchar(200) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `des` varchar(1000) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `rfrom` varchar(100) DEFAULT NULL,
  `rto` varchar(53) DEFAULT NULL,
  `rfrom_msg` varchar(30) DEFAULT NULL,
  `rto_msg` varchar(30) DEFAULT NULL,
  `pen` varchar(1) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `rnorm` varchar(50) DEFAULT NULL,
  `rfromfe` varchar(100) DEFAULT NULL,
  `rtofe` varchar(100) DEFAULT NULL,
  `rangesep` varchar(50) DEFAULT NULL,
  `h` varchar(1) DEFAULT NULL,
  `u` varchar(1) DEFAULT NULL,
  `tmpno` bigint(20) DEFAULT NULL,
  `bgroup` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4079 ;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`id`, `testname`, `code`, `des`, `unit`, `rfrom`, `rto`, `rfrom_msg`, `rto_msg`, `pen`, `price`, `rnorm`, `rfromfe`, `rtofe`, `rangesep`, `h`, `u`, `tmpno`, `bgroup`) VALUES
(1055, 'XRAY', '183', '', '', '', '', '', 'HIGH                          ', '', 0.00, 'NORMAL', '', '', '', 'N', 'N', 631, 'OTHERS'),
(1056, 'TRIGLYCERIDES ', 'BC135', '', '', '', '', '', 'HIGH                          ', '', 400.00, 'NORMAL', '', '', '', 'N', 'N', 568, 'BIOCHEMISTRY'),
(1066, 'HERPES SIMPLEX VIRUS   2  lgM ANTIBODY', 'SR044', '', '', '', '', '', 'HIGH                          ', '', 1080.00, 'NORMAL', '', '', '', 'N', 'N', 314, 'SEROLOGY'),
(1071, 'COPPER', 'BC036', '', '', '', '', '', 'HIGH                          ', '', 1730.00, 'NORMAL', '', '', '', 'N', 'N', 146, 'BIOCHEMISTRY'),
(1074, 'BETA - HCG - SERUM', 'TM002', '', '', '', '', '', 'HIGH                          ', '', 1640.00, 'NORMAL', '', '', '', 'N', 'N', 69, 'TUMOUR MARKERS'),
(1084, 'FERRITIN ', 'BC052', '', '', '', '', '', 'HIGH                          ', '', 1050.00, 'NORMAL', '', '', '', 'N', 'N', 214, 'BIOCHEMISTRY'),
(1087, 'TESTOSTERONE ', 'BC132', '', '', '', '', '', 'HIGH                          ', '', 2020.00, 'NORMAL', '', '', '', 'N', 'N', 540, 'BIOCHEMISTRY'),
(1088, 'ELECTROPHORESIS - PROTEIN', 'BC047', '', '', '', '', '', 'HIGH                          ', '', 2020.00, 'NORMAL', '', '', '', 'N', 'N', 193, 'BIOCHEMISTRY'),
(1090, 'LH  (LUTEINIZING HORMONE) ', 'BC096', '', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', 'N', 'N', 367, 'BIOCHEMISTRY'),
(1091, 'XRAY - CHEST', '189', '', '', '', '', '', 'HIGH                          ', '', 600.00, 'NORMAL', '', '', '', 'N', 'N', 637, 'OTHERS'),
(1094, 'PROTHROMBIN TIME   (PT) ', 'HM035', '', '', '', '', '', 'HIGH                          ', '', 730.00, 'NORMAL', '', '', '', 'N', 'N', 454, 'HAEMATOLOGY'),
(1098, 'THYROID ANTIBODY ', 'SR070', '', '', '', '', '', 'HIGH                          ', '', 4690.00, 'NORMAL', '', '', '', 'N', 'N', 545, 'SEROLOGY'),
(1100, 'SWAB FOR CULTURE & ABST   ', 'MB082', '', '', '', '', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '', 'N', 'N', 518, 'MICROBIOLOGY'),
(1102, 'GC SMEAR ', 'MB038', '', '', '', '', '', 'HIGH                          ', '', 400.00, 'NORMAL', '', '', '', 'N', 'N', 239, 'MICROBIOLOGY'),
(1104, 'GROIN SWAB CULTURE & ABST   ', 'MB043', '', '', '', '', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '', 'N', 'N', 271, 'MICROBIOLOGY'),
(1106, 'PROGESTERONE ', 'BC116', '', '', '', '', '', 'HIGH                          ', '', 1800.00, 'NORMAL', '', '', '', 'N', 'N', 448, 'BIOCHEMISTRY'),
(1112, 'PCV  (HAEMATOCRIT) ', 'HM036', '', '', '', '', '', 'HIGH                          ', '', 330.00, 'NORMAL', '', '', '', 'N', 'N', 414, 'HAEMATOLOGY'),
(1114, 'CORTISOL', 'BC037', '', '', '', '', '', 'HIGH                          ', '', 1950.00, 'NORMAL', '', '', '', 'N', 'N', 147, 'BIOCHEMISTRY'),
(1124, 'ELECTROPHORESIS - URINE', 'BC048', '', '', '', '', '', 'HIGH                          ', '', 2270.00, 'NORMAL', '', '', '', 'N', 'N', 194, 'BIOCHEMISTRY'),
(1125, 'XRAY - ABDOMEN', '184', '', '', '', '', '', 'HIGH                          ', '', 1000.00, 'NORMAL', '', '', '', 'N', 'N', 632, 'OTHERS'),
(1134, 'BLOOD CULTURE & ABST   ', 'MB011', '', '', '', '', '', 'HIGH                          ', '', 1010.00, 'NORMAL', '', '', '', 'N', 'N', 77, 'MICROBIOLOGY'),
(1135, 'THROAT SWAB CULTURE & ABST   ', 'MB087', '', '', '', '', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '', 'N', 'N', 542, 'MICROBIOLOGY'),
(1141, 'D - DIMERS - URINE ', 'HM012', '', '', '', '', '', 'HIGH                          ', '', 1420.00, 'NORMAL', '', '', '', 'N', 'N', 174, 'HAEMATOLOGY'),
(1142, 'D - DIMERS - BLOOD ', 'HM011', '', '', '', '', '', 'HIGH                          ', '', 3760.00, 'NORMAL', '', '', '', 'N', 'N', 173, 'HAEMATOLOGY'),
(1143, 'DRESSING CHARGES', '43', '', '', '', '', '', 'HIGH                          ', '', 0.00, 'NORMAL', '', '', '', 'N', 'N', 182, 'OTHERS'),
(1154, 'BLOOD PICTURE', 'HM004', '', '', '', '', '', 'HIGH                          ', '', 810.00, 'NORMAL', '', '', '', 'N', 'N', 81, 'HAEMATOLOGY'),
(1157, 'PROLACTIN ', 'BC117', '', '', '', '', '', 'HIGH                          ', '', 1390.00, 'NORMAL', '', '', '', 'N', 'N', 449, 'BIOCHEMISTRY'),
(1160, 'GLUCOSE - FASTING  ', 'BC074', 'FASTING BLOOD SUGAR', 'mg/dl', '75                                                                                                  ', '115', '', 'HIGH                          ', '', 300.00, 'NORMAL', '', '', '-', 'N', 'N', 212, 'BIOCHEMISTRY'),
(1184, 'CHOLESTEROL  (TOTAL) ', 'BC033', 'TOTAL CHOLESTEROL', 'mg/dl', '150                                                                                                 ', '240', '', 'HIGH                          ', '', 260.00, 'NORMAL', '', '', '-', 'N', 'N', 553, 'BIOCHEMISTRY'),
(1187, 'WBC & DC ', 'HM048', 'WBC', 'cu.mm', '4000                                                                                                ', '11000', '', 'HIGH                          ', '', 290.00, 'NORMAL', '', '', '-', 'N', 'N', 624, 'HAEMATOLOGY'),
(1188, 'WBC & DC ', 'HM048', 'Neutrophil', '%', '40                                                                                                  ', '75', '', 'HIGH                          ', '', 290.00, 'NORMAL', '', '', '-', 'N', 'N', 624, 'HAEMATOLOGY'),
(1189, 'WBC & DC ', 'HM048', 'Lymphocyte', '%', '10                                                                                                  ', '45', '', 'HIGH                          ', '', 290.00, 'NORMAL', '', '', '-', 'N', 'N', 624, 'HAEMATOLOGY'),
(1190, 'WBC & DC ', 'HM048', 'Eosinophil', '%', '1                                                                                                   ', '6', '', 'HIGH                          ', '', 290.00, 'NORMAL', '', '', '-', 'N', 'N', 624, 'HAEMATOLOGY'),
(1191, 'WBC & DC ', 'HM048', 'Monocyte', '%', '( <10 )                                                                                            ', '', '', 'HIGH                          ', '', 290.00, 'NORMAL', '', '', '', 'N', 'N', 624, 'HAEMATOLOGY'),
(1194, 'H.I.V.  1 & 2', 'SR047', 'H.I.V. ANTIBODY TEST', '', '', '', '', 'HIGH                          ', '', 1310.00, 'NORMAL', '', '', '', 'N', 'N', 274, 'SEROLOGY'),
(1195, 'H.I.V.  1 & 2', 'SR047', '.', '', '', '', '', 'HIGH                          ', '', 1310.00, 'NORMAL', '', '', '', 'N', 'N', 274, 'SEROLOGY'),
(1196, 'H.I.V.  1 & 2', 'SR047', '.', '', '', '', '', 'HIGH                          ', '', 1310.00, 'NORMAL', '', '', '', 'N', 'N', 274, 'SEROLOGY'),
(1198, 'BLOOD GROUP ', 'HM003', 'ABO GROUP', '', '', '', '', 'HIGH                          ', '', 340.00, 'NORMAL', '', '', '', 'N', 'N', 80, 'HAEMATOLOGY'),
(1199, 'BLOOD GROUP ', 'HM003', 'Rh TYPE (D)', '', '', '', '', 'HIGH                          ', '', 340.00, 'NORMAL', '', '', '', 'N', 'N', 80, 'HAEMATOLOGY'),
(1200, 'BLOOD GROUP ', 'HM003', 'BLOOD GROUP', '', '', '', '', 'HIGH                          ', '', 340.00, 'NORMAL', '', '', '', 'N', 'N', 80, 'HAEMATOLOGY'),
(1202, 'ASPARTATE AMINOTRANSFERASE    (SGOT/AST) ', 'BC014', 'S.G.O.T.', 'IU/L', '13                                                                                                  ', '31', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', 'N', 'N', 475, 'BIOCHEMISTRY'),
(1203, 'GLUCOSE - RANDOM', 'BC078', 'R.B.S.', 'mg/dl', '', '', '', 'HIGH                          ', '', 300.00, 'NORMAL', '', '', '', 'N', 'N', 457, 'BIOCHEMISTRY'),
(1227, 'WIDAL TEST  (SAT) -  TUBE METHOD ', 'SR081', 'S.TYPHI O', '', '', '', '', 'HIGH                          ', '', 1030.00, 'NORMAL', '', '', '', 'N', 'N', 474, 'SEROLOGY'),
(1228, 'WIDAL TEST  (SAT) -  TUBE METHOD ', 'SR081', 'S.TYPHI H', '', '', '', '', 'HIGH                          ', '', 1030.00, 'NORMAL', '', '', '', 'N', 'N', 474, 'SEROLOGY'),
(1240, 'VENERAL DISEASE REFERENCE LAB   (VDRL) ', 'SR078', 'VDRL', '', '', '', '', 'HIGH                          ', '', 300.00, 'NORMAL', '', '', '', 'N', 'N', 621, 'SEROLOGY'),
(1241, 'WIDAL TEST  (SAT) -  TUBE METHOD ', 'SR081', 'S.PARA TYPHI AH', '', '', '', '', 'HIGH                          ', '', 1030.00, 'NORMAL', '', '', '', 'N', 'N', 474, 'SEROLOGY'),
(1242, 'HEPATITIS - B SURFACE ANTIGEN  (HBsAg) ', 'SR037', 'HBsAg  TEST', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', 'N', 'N', 283, 'SEROLOGY'),
(1245, 'WBC & DC ', 'HM048', 'Basohil', '', '', '', '', 'HIGH                          ', '', 290.00, 'NORMAL', '', '', '', 'N', 'N', 624, 'HAEMATOLOGY'),
(1246, 'URINE - SUGAR ', 'GP033', 'URINE SUGAR', '', '', '', '', 'HIGH                          ', '', 150.00, 'NORMAL', '', '', '', 'N', 'N', 598, 'GENERAL PATHOLOGY'),
(1247, 'MALARIA PARASITE - FILM ', 'HM030', 'MALARIAL PARASITES', '', '', '', '', 'HIGH                          ', '', 230.00, 'NORMAL', '', '', '', 'N', 'N', 382, 'HAEMATOLOGY'),
(1261, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'COLOUR', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1262, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'VISCOSITY', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1263, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'PH', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1264, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'LIQUEFATION TIME', 'Minutes', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1265, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'TOTAL COUNT', 'Million/ml', '60                                                                                                  ', '150', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '-', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1266, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'MOTILITY', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1267, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', '.', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1268, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'ACTIVE', '%', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1269, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'SLUGGISH', '%', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1270, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'NON MOTILE', '%', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1271, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'VOLUME', 'ml', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1272, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'PUS CELLS', 'h.p.f.', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1273, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'RED CELLS', 'h.p.f.', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1274, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'EPITHELIAL CELLS', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1275, 'SEMINAL FLUID ANALYSIS   (Please Inquire) ', 'GP011', 'ORGANISM', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 479, 'GENERAL PATHOLOGY'),
(1286, 'BILIRUBIN - TOTAL', 'BC019', 'TOTAL BILIRUBIN', 'mg/dl', '0.2                                                                                                 ', '1.2', '', 'HIGH                          ', '', 340.00, 'NORMAL', '', '', '-', 'N', 'N', 552, 'BIOCHEMISTRY'),
(1287, 'CPK ', 'BC024', 'C.P.K', 'u/l', '24.00                                                                                               ', '195', '', 'HIGH                          ', '', 470.00, 'NORMAL', '', '', '-', 'N', 'N', 103, 'BIOCHEMISTRY'),
(1288, 'CREATININE CLEARANCE ', 'BC038', 'SERUM CREATININE', 'mg/dl', '0.5                                                                                                 ', '1.7', '', 'HIGH                          ', '', 850.00, 'NORMAL', '', '', '-', 'N', 'N', 154, 'BIOCHEMISTRY'),
(1290, 'CREATININE CLEARANCE ', 'BC038', 'URINE CREATININE', 'mg/dl', '', '', '', 'HIGH                          ', '', 850.00, 'NORMAL', '', '', '', 'N', 'N', 154, 'BIOCHEMISTRY'),
(1291, 'CREATININE CLEARANCE ', 'BC038', '24 Hrs VOLUME OF URINE', 'ml', '', '', '', 'HIGH                          ', '', 850.00, 'NORMAL', '', '', '', 'N', 'N', 154, 'BIOCHEMISTRY'),
(1292, 'CREATININE CLEARANCE ', 'BC038', 'CREATININE CLEARANCE', 'ml/min', '75                                                                                                  ', '125', '', 'HIGH                          ', '', 850.00, 'NORMAL', '', '', '-', 'N', 'N', 154, 'BIOCHEMISTRY'),
(1302, 'GLUCOSE - FASTING  (GLUCOMETER)', 'BC073', 'FBS-GLUCOMETER', 'mg/dl', '75                                                                                                  ', '115', '', 'HIGH                          ', '', 300.00, 'NORMAL', '', '', '-', 'N', 'N', 213, 'BIOCHEMISTRY'),
(1303, 'HEPATITIS - C ANTIBODY ', 'SR040', 'HCV ANTIBODY TEST', '', '', '', '', 'HIGH                          ', '', 1910.00, 'NORMAL', '', '', '', 'N', 'N', 288, 'SEROLOGY'),
(1314, 'SPUTUM FULL REPORT ', 'MB076', 'MACROSCOPIC APPEARANCE', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 505, 'MICROBIOLOGY'),
(1315, 'SPUTUM FULL REPORT ', 'MB076', 'RED CELLS', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 505, 'MICROBIOLOGY'),
(1316, 'SPUTUM FULL REPORT ', 'MB076', 'PUS CELLS', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 505, 'MICROBIOLOGY'),
(1317, 'SPUTUM FULL REPORT ', 'MB076', 'EPITHELIAL CELLS', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 505, 'MICROBIOLOGY'),
(1318, 'SPUTUM FULL REPORT ', 'MB076', 'GRAM NEGATIVE BACILLI', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 505, 'MICROBIOLOGY'),
(1319, 'SPUTUM FULL REPORT ', 'MB076', 'GRAM POSITIVE DIPLOCOCCI', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 505, 'MICROBIOLOGY'),
(1320, 'SPUTUM FULL REPORT ', 'MB076', 'FUNGAL FILAMENTS', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 505, 'MICROBIOLOGY'),
(1321, 'SPUTUM FULL REPORT ', 'MB076', 'ZIEHL NEELSON STAIN', '', '', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', 'N', 'N', 505, 'MICROBIOLOGY'),
(1324, 'ANTI STREPTOLYSIN "0" TITRE  (ASOT) ', 'SR009', 'A.S.O.T.', 'IU/ml', '(Less than 200)                                                                                     ', '', '', 'HIGH                          ', '', 430.00, 'NORMAL', '', '', ' ', 'N', 'N', 19, 'SEROLOGY'),
(1325, 'FILARIAL ANTIBODY TEST (FAT) ', 'SR027', 'FILARIAL ANTIBODY TEST(F.A.T.)', '', '', '', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '', 'N', 'N', 216, 'SEROLOGY'),
(1329, 'LACTATE DEHYDROGENASE  (LDH) ', 'BC094', 'L.D.H.', 'U/L', '230.00                                                                                              ', '460', '', 'HIGH                          ', '', 510.00, 'NORMAL', '', '', '-', 'N', 'N', 358, 'BIOCHEMISTRY'),
(1338, 'HEPATITIS - A lgM & lgG ANTIBODY ', 'SR030', 'IgM ANTIBODY TO HEPATITIS   A', '', '', '', '', 'HIGH                          ', '', 2830.00, 'NORMAL', '', '', '', 'N', 'N', 306, 'SEROLOGY'),
(1341, 'ANTI NEUCLEAR ANTIBODY  (ANA/ANF) ', 'SR006', 'ANTI NUCLEAR ANTIBODY (A.N.A.)', '-', '-                                                                                                   ', '', '', 'HIGH                          ', '', 1010.00, 'NORMAL', '', '', NULL, 'N', 'N', 50, 'SEROLOGY'),
(1343, 'T3 (TRIIODOTHYRONINE) FREE T3', 'BC130', 'T3 ( TOTAL)', 'ng/ml', '1.4                                                                                                 ', '4.2', '', 'HIGH                          ', '', 1130.00, 'NORMAL', '', '', '-', 'N', 'N', 524, 'BIOCHEMISTRY'),
(1344, 'BLEEDING TIME / CLOTTING TIME   (Please Inquire) ', 'HM002', 'BLEEDING TIME', '', '3  -  7  MINS.                                                                                      ', '', '', 'HIGH                          ', '', 340.00, 'NORMAL', '', '', '', 'N', 'N', 75, 'HAEMATOLOGY'),
(1345, 'BLEEDING TIME / CLOTTING TIME   (Please Inquire) ', 'HM002', 'CLOTTING TIME', '', 'LESS THAN 10                                                                                        ', '', '', 'HIGH                          ', '', 340.00, 'NORMAL', '', '', '', 'N', 'N', 75, 'HAEMATOLOGY'),
(1346, 'URINE CULTURE & ABST    ', 'MB098', 'URINE CULTURE  & A.B.S.T.', '', '', '', '', 'HIGH                          ', '', 690.00, 'NORMAL', '', '', '', 'N', 'N', 605, 'MICROBIOLOGY'),
(1347, 'GLUCOSE - RANDOM  (GLUCOMETER) ', 'BC077', 'RBS-GLUCOMETER', 'mg/dl', '', '', '', 'HIGH                          ', '', 300.00, 'NORMAL', '', '', '', 'N', 'N', 461, 'BIOCHEMISTRY'),
(1348, 'GAMMA GLUTAMYL TRANSFERACE  (GGT) ', 'BC062', 'GAMMA GT(G.G.T.)', 'IU/L', '11.0                                                                                                ', '50', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '-', 'N', 'N', 238, 'BIOCHEMISTRY'),
(1349, 'CALCIUM - SERUM ', 'BC025', 'CALCIUM(+)', 'mg/dl', '6.10                                                                                                ', '11', '', 'HIGH                          ', '', 450.00, 'NORMAL', '', '', '-', 'N', 'N', 111, 'BIOCHEMISTRY'),
(1351, 'CHOLESTEROL  (TOTAL) ', 'BC033', 'RANDOM CHOLESTEROL', '', '', '', '', 'HIGH                          ', '', 260.00, 'NORMAL', '', '', '', 'N', 'N', 459, 'BIOCHEMISTRY'),
(1352, 'PHOSPHORUS INORGANIC - SERUM ', 'BC106', 'PHOSPHOROUS', 'mg/dl', '2.50                                                                                                ', '4.9', '', 'HIGH                          ', '', 390.00, 'NORMAL', '', '', '-', 'N', 'N', 418, 'BIOCHEMISTRY'),
(1353, 'STOOLS FOR OCCULT BLOOD ', 'GP016', 'STOOLS FOR OCCULT BLOOD TEST', '', '', '', '', 'HIGH                          ', '', 460.00, 'NORMAL', '', '', '', 'N', 'N', 513, 'GENERAL PATHOLOGY'),
(1354, 'GLUCOSE - POST PRANDIAL  (GLUCOMETER)', 'BC075', 'PPBS - GLUCOMETER', '', '', '', '', 'HIGH                          ', '', 300.00, 'NORMAL', '', '', '', 'N', 'N', 434, 'BIOCHEMISTRY'),
(1355, 'HERPES SIMPLEX VIRUS   1  lgM ANTIBODY', 'SR043', 'HERPES SIMPLEX VIRUS 1 (IgM) ANTIBODY', '', '', '', '', 'HIGH                          ', '', 1080.00, 'NORMAL', '', '', '', 'N', 'N', 313, 'SEROLOGY'),
(1356, 'HERPES SIMPLEX VIRUS   1  lgG ANTIBODY ', 'SR042', 'HERPES SIMPLEX VIRUS 1 (IgG) ANTIBODY', '', '', '', '', 'HIGH                          ', '', 1080.00, 'NORMAL', '', '', '', 'N', 'N', 312, 'SEROLOGY'),
(1357, 'T4 (THYROXINE) FREE T4', 'BC131', 'T4(FREE)', 'ng/dl', '0.8                                                                                                 ', '2', '', 'HIGH                          ', '', 1130.00, 'NORMAL', '', '', '-', 'N', 'N', 528, 'BIOCHEMISTRY'),
(1358, 'URINE - KETONE BODIES ', 'GP030', 'URINE - KETONE BODIES', '', '', '', '', 'HIGH                          ', '', 150.00, 'NORMAL', '', '', '', 'N', 'N', 591, 'GENERAL PATHOLOGY'),
(1360, 'BLOOD SUGAR SERIES TEST ', 'BC061', 'FASTING BLOOD SUGAR', 'mg/dl', '75.00                                                                                               ', '115', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '-', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1361, 'BLOOD SUGAR SERIES TEST ', 'BC061', '.', '', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1362, 'BLOOD SUGAR SERIES TEST ', 'BC061', 'BLOOD SUGAR 2 HRS. AFTER BREAKFAST', 'mg/dl', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1363, 'BLOOD SUGAR SERIES TEST ', 'BC061', '.', '', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1364, 'BLOOD SUGAR SERIES TEST ', 'BC061', 'BLOOD SUGAR 1/2 HR. BEFORE LUNCH', 'mg/dl', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1365, 'BLOOD SUGAR SERIES TEST ', 'BC061', '.', '', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1366, 'BLOOD SUGAR SERIES TEST ', 'BC061', 'BLOOD SUGAR 2 HRS. AFTER LUNCH', 'mg/dl', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1367, 'BLOOD SUGAR SERIES TEST ', 'BC061', '.', '', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1368, 'BLOOD SUGAR SERIES TEST ', 'BC061', 'BLOOD SUGAR 1/2 HR. BEFORE DINNER', 'mg/dl', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1369, 'BLOOD SUGAR SERIES TEST ', 'BC061', '.', '', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1370, 'BLOOD SUGAR SERIES TEST ', 'BC061', 'BLOOD SUGAR 2 HRS. AFTER DINNER', 'mg/dl', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 86, 'BIOCHEMISTRY'),
(1378, 'PLATELET COUNT ', 'HM034', 'PLATELET COUNT', 'cu.mm.', '150000                                                                                              ', '450000', '', 'HIGH                          ', '', 290.00, 'NORMAL', '', '', '-', 'N', 'N', 421, 'HAEMATOLOGY'),
(1381, 'SPUTUM FOR  A.F.B.', 'MB074', 'ZIEHL NEELSON  STAIN', '', '', '', '', 'HIGH                          ', '', 400.00, 'NORMAL', '', '', '', 'N', 'N', 502, 'MICROBIOLOGY'),
(1385, 'ECG', '47', 'ECG', '', '', '', '', 'HIGH                          ', '', 400.00, 'NORMAL', '', '', '', 'N', 'N', 189, 'OTHERS'),
(1387, 'HEPATITIS - A lgM & lgG ANTIBODY ', 'SR030', 'VIRUS - (IgM Anti - HAV)', '', '', '', '', 'HIGH                          ', '', 2830.00, 'NORMAL', '', '', '', 'N', 'N', 306, 'SEROLOGY'),
(1388, 'HEPATITIS - A lgM & lgG ANTIBODY ', 'SR030', 'IgG ANTIBODY TO HEPATITIS   A', '', '', '', '', 'HIGH                          ', '', 2830.00, 'NORMAL', '', '', '', 'N', 'N', 306, 'SEROLOGY'),
(1389, 'HEPATITIS - A lgM & lgG ANTIBODY ', 'SR030', 'VIRUS - (IgG Anti - HAV)', '', '', '', '', 'HIGH                          ', '', 2830.00, 'NORMAL', '', '', '', 'N', 'N', 306, 'SEROLOGY'),
(1394, 'STOOL CULTURE & ABST    ', 'MB078', 'CULTURE SOURCE : STOOL', '', '', '', '', 'HIGH                          ', '', 990.00, 'NORMAL', '', '', '', 'N', 'N', 508, 'MICROBIOLOGY'),
(1395, 'STOOL CULTURE & ABST    ', 'MB078', '.', '', '', '', '', 'HIGH                          ', '', 990.00, 'NORMAL', '', '', '', 'N', 'N', 508, 'MICROBIOLOGY'),
(1396, 'STOOL CULTURE & ABST    ', 'MB078', 'CULTURE RESULT :', '', '', '', '', 'HIGH                          ', '', 990.00, 'NORMAL', '', '', '', 'N', 'N', 508, 'MICROBIOLOGY'),
(1397, 'STOOL CULTURE & ABST    ', 'MB078', '.', '', '', '', '', 'HIGH                          ', '', 990.00, 'NORMAL', '', '', '', 'N', 'N', 508, 'MICROBIOLOGY'),
(1398, 'STOOL CULTURE & ABST    ', 'MB078', 'Organism (1) = ', 'NOT ISOLATED', '', '', '', 'HIGH                          ', '', 990.00, 'NORMAL', '', '', '', 'N', 'N', 508, 'MICROBIOLOGY'),
(1399, 'STOOL CULTURE & ABST    ', 'MB078', '.', 'NOT ISOLATED', '', '', '', 'HIGH                          ', '', 990.00, 'NORMAL', '', '', '', 'N', 'N', 508, 'MICROBIOLOGY'),
(1400, 'HEPATITIS - B SURFACE ANTIBODY  (Anti HBsAb) ', 'SR039', 'ANTI HBsAb ', 'ml IU / ml', '< 10.00                                                                                            ', '', '', 'HIGH                          ', '', 3270.00, 'NORMAL', '', '', '', 'N', 'N', 44, 'SEROLOGY'),
(1406, 'T3 (TRIIODOTHYRONINE) FREE T3', 'BC130', 'T3 (FREE)', 'ng/dl', '1.4                                                                                                 ', '4.22', '', 'HIGH                          ', '', 1130.00, 'NORMAL', '', '', '-', 'N', 'N', 525, 'BIOCHEMISTRY'),
(1415, 'TROPONIN '' T '' ', 'BC137', 'TROPONIN  T ', '', '', '', '', 'HIGH                          ', '', 2660.00, 'NORMAL', '', '', '', 'N', 'N', 569, 'BIOCHEMISTRY'),
(1416, 'URIC ACID - SERUM ', 'BC141', 'SERUM URIC ACID', 'mg/dl', '2.50                                                                                                ', '6.6', '', 'HIGH                          ', '', 400.00, 'NORMAL', '', '', '-', 'N', 'N', 583, 'BIOCHEMISTRY'),
(1424, 'BLOOD SUGAR SERIES TEST ', 'BC061', 'BLOOD SUGAR 2 HRS. AFTER BREAKFAST', 'mg/dl', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 85, 'BIOCHEMISTRY'),
(1425, 'BLOOD SUGAR SERIES TEST ', 'BC061', '.', '', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 85, 'BIOCHEMISTRY'),
(1426, 'BLOOD SUGAR SERIES TEST ', 'BC061', 'BLOOD SUGAR 2 HRS. AFTER LUNCH', 'mg/dl', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 85, 'BIOCHEMISTRY'),
(1427, 'BLOOD SUGAR SERIES TEST ', 'BC061', '.', '', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 85, 'BIOCHEMISTRY'),
(1428, 'BLOOD SUGAR SERIES TEST ', 'BC061', 'BLOOD SUGAR 2 HRS. AFTER DINNER', 'mg/dl', '', '', '', 'HIGH                          ', '', 1510.00, 'NORMAL', '', '', '', 'N', 'N', 85, 'BIOCHEMISTRY'),
(1431, 'HEPATITIS - A lgG ANTIBODY ', 'SR031', 'IgG ANTIBODY TO HEPATITIS  A  VIRUS', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', 'N', 'N', 293, 'SEROLOGY'),
(1432, 'HEPATITIS - A lgG ANTIBODY ', 'SR031', '( IgG Anti - HAV )', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', 'N', 'N', 293, 'SEROLOGY'),
(1433, 'SODIUM - SERUM ', 'BC124', 'SERUM SODIUM', 'mmol/l', '136.00                                                                                              ', '146', '', 'HIGH                          ', '', 460.00, 'NORMAL', '', '', '-', 'N', 'N', 488, 'BIOCHEMISTRY'),
(1434, 'POTASSIUM - SERUM ', 'BC108', 'SERUM POTASSIUM', 'mmol/l', '3.50                                                                                                ', '5.3', '', 'HIGH                          ', '', 470.00, 'NORMAL', '', '', '-', 'N', 'N', 487, 'BIOCHEMISTRY'),
(1517, 'C-REACTIVE PROTEIN   (CRP) ', 'SR019', 'C REACTIVE PROTEIN (C.R.P)', 'mg/dl', '(Less than 6)                                                                                       ', '', '', 'HIGH                          ', '', 490.00, 'NORMAL', '', '', '', 'N', 'N', 98, 'SEROLOGY'),
(1518, 'C-REACTIVE PROTEIN   (CRP) ', 'SR019', '', '', '', '', '', '', '', 490.00, 'NORMAL', '', '', '', 'N', 'N', 98, 'SEROLOGY'),
(1519, 'C-REACTIVE PROTEIN   (CRP) ', 'SR019', '', '', '', '', '', '', '', 490.00, 'NORMAL', '', '', '', 'N', 'N', 98, 'SEROLOGY'),
(1534, 'UREA - BLOOD ', 'BC139', 'BLOOD UREA', 'mg/dl', '10                                                                                                  ', '50', '', 'HIGH                          ', '', 370.00, 'NORMAL', '', '', '-', 'N', 'N', 88, 'BIOCHEMISTRY'),
(1535, 'UREA - BLOOD ', 'BC139', '', '', '', '', '', '', '', 370.00, 'NORMAL', '', '', '', 'N', 'N', 88, 'BIOCHEMISTRY'),
(1697, 'CREATININE - SERUM', 'BC039', 'SERUM CREATININE', 'mg/dl', '0.9                                                                                                 ', '1.3', '', 'HIGH                          ', '', 310.00, 'NORMAL', '0.6                                                                                                 ', '1.1                                                                                                 ', '-', 'N', 'N', 484, 'BIOCHEMISTRY'),
(1698, 'CREATININE - SERUM', 'BC039', '', '', '', '', '', '', '', 310.00, '', '', '', '', 'N', 'N', 484, 'BIOCHEMISTRY'),
(1896, 'BILIRUBIN - DIRECT + TOTAL', 'BC018', 'TOTAL BILIRUBIN', 'mg/dl', '0.2                                                                                                 ', '1.1', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '-', 'N', 'N', 72, 'BIOCHEMISTRY'),
(1897, 'BILIRUBIN - DIRECT + TOTAL', 'BC018', '.', '', '', '', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '', 'N', 'N', 72, 'BIOCHEMISTRY'),
(1898, 'BILIRUBIN - DIRECT + TOTAL', 'BC018', 'DIRECT BILIRUBIN', '', '0                                                                                                   ', '0.2', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '-', 'N', 'N', 72, 'BIOCHEMISTRY'),
(1899, 'BILIRUBIN - DIRECT + TOTAL', 'BC018', '.', '', '', '', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '', 'N', 'N', 72, 'BIOCHEMISTRY'),
(1900, 'BILIRUBIN - DIRECT + TOTAL', 'BC018', 'INDIRECT BILIRUBIN', 'mg/dl', '', '', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '', 'N', 'N', 72, 'BIOCHEMISTRY'),
(1901, 'BILIRUBIN - DIRECT + TOTAL', 'BC018', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 72, 'BIOCHEMISTRY'),
(1925, 'HAEMOGLOBIN ', 'HM020', 'Hb%', 'g/dl', '12.0                                                                                                ', '17.5', '', 'HIGH                          ', '', 290.00, 'NORMAL', '', '', '-', 'N', 'N', 280, 'HAEMATOLOGY'),
(1926, 'HAEMOGLOBIN ', 'HM020', 'RBC', 'million/cu.mm', '3.5                                                                                                 ', '6', '', 'HIGH                          ', '', 290.00, 'NORMAL', '', '', '-', 'N', 'N', 280, 'HAEMATOLOGY'),
(1927, 'HAEMOGLOBIN ', 'HM020', 'PCV', '%', '40.0                                                                                                ', '54', '', 'HIGH                          ', '', 290.00, 'NORMAL', '36                                                                                                  ', '45                                                                                                  ', '-', 'N', 'N', 280, 'HAEMATOLOGY'),
(1928, 'HAEMOGLOBIN ', 'HM020', '', '', '', '', '', '', '', 290.00, '', '', '', '', 'N', 'N', 280, 'HAEMATOLOGY'),
(1929, 'HAEMOGLOBIN ', 'HM020', '', '', '', '', '', '', '', 290.00, '', '', '', '', 'N', 'N', 280, 'HAEMATOLOGY'),
(2085, 'T4 (THYROXINE) FREE T4', 'BC131', 'T4 (TOTAL)', 'ng/dl', '0.8                                                                                                 ', '2', '', 'HIGH                          ', '', 1130.00, 'NORMAL', '', '', '-', 'N', 'N', 527, 'BIOCHEMISTRY'),
(2086, 'T4 (THYROXINE) FREE T4', 'BC131', '', '', '', '', '', '', '', 1130.00, '', '', '', '', 'N', 'N', 527, 'BIOCHEMISTRY'),
(2235, 'PREGNANCY TEST - URINE ', 'GP007', 'URINE FOR PREGNANCY', '', '', '', '', 'HIGH                          ', '', 340.00, 'NORMAL', '', '', '', '', '', 614, 'GENERAL PATHOLOGY'),
(2236, 'PREGNANCY TEST - URINE ', 'GP007', '', '', '', '', '', '', '', 340.00, '', '', '', '', '', '', 614, 'GENERAL PATHOLOGY'),
(2249, 'MONOSPOT / INFECTIOUS MONONUCLEOSIS ', 'SR055', '', '', '', '', '', 'HIGH                          ', '', 430.00, 'NORMAL', '', '', '', '', '', 388, 'SEROLOGY'),
(2250, 'MONOSPOT / INFECTIOUS MONONUCLEOSIS ', 'SR055', '', '', '', '', '', '', '', 430.00, '', '', '', '', '', '', 388, 'SEROLOGY'),
(2272, 'PROFILE THYROID ', 'BC115', 'T3 (FREE)', 'Pg/ml', '1.4                                                                                                 ', '4.2', '', 'HIGH                          ', '', 2980.00, 'NORMAL', '', '', '-', '', '', 548, 'BIOCHEMISTRY'),
(2273, 'PROFILE THYROID ', 'BC115', 'T4 (FREE)', 'ng/dl', '0.8                                                                                                 ', '2.0', '', 'HIGH                          ', '', 2980.00, 'NORMAL', '', '', '-', '', '', 548, 'BIOCHEMISTRY'),
(2274, 'PROFILE THYROID ', 'BC115', 'TSH', 'uIu/ml', '0.4                                                                                                 ', '7.0', '', 'HIGH                          ', '', 2980.00, 'NORMAL', '', '', '-', '', '', 548, 'BIOCHEMISTRY'),
(2275, 'PROFILE THYROID ', 'BC115', '', '', '', '', '', '', '', 2980.00, '', '', '', '', '', '', 548, 'BIOCHEMISTRY'),
(2276, 'PROFILE THYROID ', 'BC115', '', '', '', '', '', '', '', 2980.00, '', '', '', '', '', '', 548, 'BIOCHEMISTRY'),
(2277, 'PROFILE THYROID ', 'BC115', '', '', '', '', '', '', '', 2980.00, '', '', '', '', '', '', 548, 'BIOCHEMISTRY'),
(2283, 'HEPATITIS - A lgM ANTIBODY ', 'SR032', 'HEPATITIS - A IgM ANTIBODY', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 294, 'SEROLOGY'),
(2284, 'HEPATITIS - A lgM ANTIBODY ', 'SR032', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 294, 'SEROLOGY'),
(2285, 'HEPATITIS - A lgM ANTIBODY ', 'SR032', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 294, 'SEROLOGY'),
(2288, 'URIC ACID - URINE ', 'BC142', '', 'mg/dl', '37                                                                                                  ', '92', '', 'HIGH                          ', '', 400.00, 'NORMAL', '', '', '-', '', '', 584, 'BIOCHEMISTRY'),
(2289, 'URIC ACID - URINE ', 'BC142', '', '', '', '', '', '', '', 400.00, '', '', '', '', '', '', 584, 'BIOCHEMISTRY'),
(2292, 'PHOSPHORUS INORGANIC - SERUM ', 'BC106', 'PHOSPHORUS INORGANIC', '', '2.7                                                                                                 ', '4.5', '', 'HIGH                          ', '', 390.00, 'NORMAL', '', '', '-', '', '', 419, 'BIOCHEMISTRY'),
(2293, 'PHOSPHORUS INORGANIC - SERUM ', 'BC106', '', '', '', '', '', '', '', 390.00, '', '', '', '', '', '', 419, 'BIOCHEMISTRY'),
(2294, 'PHOSPHORUS INORGANIC - SERUM ', 'BC106', '', '', '', '', '', '', '', 390.00, '', '', '', '', '', '', 419, 'BIOCHEMISTRY'),
(2295, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', 'URINE FOR MICRO ALBUMIN', 'mg/l', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2296, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '.', '', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2297, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', 'URINE CREATININE', 'mg/dl', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2298, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '.', '', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2299, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', 'URINE ALBUMIN / CREATININE', 'mg/g', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2300, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '.', '', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2301, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '.', '', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2302, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', 'REFERENCE RANGE', '', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2303, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '.', '', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2304, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '< 30 mg ALBUMIN /g CREATININE', '=', 'NORMAL                                                                                              ', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2305, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '.', '', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2306, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '30 - 300 mg ALBUMIN /g CREATININE', '=', 'MICROALBUMINURIA                                                                                    ', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2307, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '.', '', '', '', '', 'HIGH                          ', '', 480.00, 'NORMAL', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2308, 'URINE ALBUMIN: CREATININE RATIO', 'BC144', '', '', '', '', '', '', '', 480.00, '', '', '', '', '', '', 601, 'BIOCHEMISTRY'),
(2375, 'XRAY - ANKLE ( AP)', '185', '', '', '', '', '', 'HIGH                          ', '', 600.00, 'NORMAL', '', '', '', '', '', 633, 'OTHERS'),
(2376, 'XRAY - ANKLE ( AP)', '185', '', '', '', '', '', '', '', 600.00, '', '', '', '', '', '', 633, 'OTHERS'),
(2377, 'XRAY - ANKLE ( AP/LAT)', '186', '', '', '', '', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '', '', '', 634, 'OTHERS'),
(2378, 'XRAY - ANKLE ( AP/LAT)', '186', '', '', '', '', '', '', '', 800.00, '', '', '', '', '', '', 634, 'OTHERS'),
(2379, 'XRAY - CERVICAL SPINE ( AP)', '187', '', '', '', '', '', 'HIGH                          ', '', 600.00, 'NORMAL', '', '', '', '', '', 635, 'OTHERS'),
(2380, 'XRAY - CERVICAL SPINE ( AP)', '187', '', '', '', '', '', '', '', 600.00, '', '', '', '', '', '', 635, 'OTHERS'),
(2381, 'XRAY - CERVICAL SPINE ( AP/LAT)', '188', '', '', '', '', '', 'HIGH                          ', '', 1000.00, 'NORMAL', '', '', '', '', '', 636, 'OTHERS'),
(2382, 'XRAY - CERVICAL SPINE ( AP/LAT)', '188', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 636, 'OTHERS'),
(2391, 'XRAY - DENTAL 1', '193', '', '', '', '', '', 'HIGH                          ', '', 300.00, 'NORMAL', '', '', '', '', '', 641, 'OTHERS'),
(2392, 'XRAY - DENTAL 1', '193', '', '', '', '', '', '', '', 300.00, '', '', '', '', '', '', 641, 'OTHERS'),
(2393, 'XRAY - DENTAL 2', '194', '', '', '', '', '', 'HIGH                          ', '', 550.00, 'NORMAL', '', '', '', '', '', 642, 'OTHERS'),
(2394, 'XRAY - DENTAL 2', '194', '', '', '', '', '', '', '', 550.00, '', '', '', '', '', '', 642, 'OTHERS'),
(2395, 'XRAY - ELBOW', '196', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 644, 'OTHERS'),
(2396, 'XRAY - ELBOW', '196', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 644, 'OTHERS'),
(2397, 'XRAY - FEMUR', '197', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 645, 'OTHERS'),
(2398, 'XRAY - FEMUR', '197', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 645, 'OTHERS'),
(2399, 'XRAY - FINGER', '198', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 646, 'OTHERS'),
(2400, 'XRAY - FINGER', '198', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 646, 'OTHERS'),
(2401, 'XRAY - FOOT', '199', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 647, 'OTHERS'),
(2402, 'XRAY - FOOT', '199', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 647, 'OTHERS'),
(2403, 'XRAY - FOREARM', '200', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 648, 'OTHERS'),
(2404, 'XRAY - FOREARM', '200', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 648, 'OTHERS'),
(2405, 'XRAY - HAND', '201', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 649, 'OTHERS'),
(2406, 'XRAY - HAND', '201', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 649, 'OTHERS'),
(2407, 'XRAY - HUMERUS', '202', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 650, 'OTHERS'),
(2408, 'XRAY - HUMERUS', '202', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 650, 'OTHERS'),
(2409, 'XRAY - KNEE ( AP)', '203', '', '', '', '', '', 'HIGH                          ', '', 600.00, 'NORMAL', '', '', '', '', '', 651, 'OTHERS'),
(2410, 'XRAY - KNEE ( AP)', '203', '', '', '', '', '', '', '', 600.00, '', '', '', '', '', '', 651, 'OTHERS'),
(2411, 'XRAY - KNEE ( AP/LAT)', '204', '', '', '', '', '', 'HIGH                          ', '', 800.00, 'NORMAL', '', '', '', '', '', 652, 'OTHERS'),
(2412, 'XRAY - KNEE ( AP/LAT)', '204', '', '', '', '', '', '', '', 800.00, '', '', '', '', '', '', 652, 'OTHERS'),
(2413, 'XRAY - LEG', '206', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 654, 'OTHERS'),
(2414, 'XRAY - LEG', '206', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 654, 'OTHERS'),
(2415, 'XRAY - LUMBAR SPINE (AP/LAT)', '207', '', '', '', '', '', 'HIGH                          ', '', 1000.00, 'NORMAL', '', '', '', '', '', 655, 'OTHERS'),
(2416, 'XRAY - LUMBAR SPINE (AP/LAT)', '207', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 655, 'OTHERS'),
(2417, 'XRAY - PELVIS', '209', '', '', '', '', '', 'HIGH                          ', '', 1000.00, 'NORMAL', '', '', '', '', '', 657, 'OTHERS'),
(2418, 'XRAY - PELVIS', '209', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 657, 'OTHERS'),
(2419, 'XRAY - SHOULDER', '211', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 659, 'OTHERS'),
(2420, 'XRAY - SHOULDER', '211', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 659, 'OTHERS'),
(2421, 'XRAY - SKULL', '213', '', '', '', '', '', 'HIGH                          ', '', 1000.00, 'NORMAL', '', '', '', '', '', 661, 'OTHERS'),
(2422, 'XRAY - SKULL', '213', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 661, 'OTHERS'),
(2423, 'XRAY - WRIST', '214', '', '', '', '', '', 'HIGH                          ', '', 650.00, 'NORMAL', '', '', '', '', '', 662, 'OTHERS'),
(2424, 'XRAY - WRIST', '214', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 662, 'OTHERS'),
(2425, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2426, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2427, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2428, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2429, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2430, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2431, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2432, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2433, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2434, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2435, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2436, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2437, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2438, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2439, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2440, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2441, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2442, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2443, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2444, 'DOUBLE STRANDED DNA  (d/s DNA) ', 'SR026', '', '', '', '', '', '', '', 2630.00, '', '', '', '', '', '', 181, 'SEROLOGY'),
(2524, 'ALBUMIN', 'BC004', 'SERUM ALBUMIN', 'mg/dl', '', '', '', '', '', 340.00, '', '', '', '', '', '', 482, 'BIOCHEMISTRY'),
(2525, 'ALBUMIN', 'BC004', '', '', '', '', '', '', '', 340.00, '', '', '', '', '', '', 482, 'BIOCHEMISTRY'),
(2590, 'HEPATITIS - B Core/Total ANTIBODY ', 'SR034', '', '', '', '', '', '', '', 1270.00, '', '', '', '', '', '', 299, 'SEROLOGY'),
(2591, 'HEPATITIS - B Core/Total ANTIBODY ', 'SR034', 'IgM &  IgG  ANTIBODIES TO', '', '', '', '', '', '', 1270.00, '', '', '', '', '', '', 299, 'SEROLOGY'),
(2592, 'HEPATITIS - B Core/Total ANTIBODY ', 'SR034', 'HEPATITIS   B  VIRUS CORE ANTIGEN', '', '', '', '', '', '', 1270.00, '', '', '', '', '', '', 299, 'SEROLOGY'),
(2593, 'HEPATITIS - B Core/Total ANTIBODY ', 'SR034', '( Anti - HBcAg )', '', '', '', '', '', '', 1270.00, '', '', '', '', '', '', 299, 'SEROLOGY'),
(2594, 'XRAY - NECK', '208', '', '', '', '', '', '', '', 650.00, '', '', '', '', '', '', 656, 'OTHERS'),
(2608, 'ALANINE AMINOTRANSFERASE    (SGPT/ALT)', 'BC003', 'S.G.P.T.', 'IU/L', '0                                                                                                   ', '40', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 476, 'BIOCHEMISTRY'),
(2609, 'ALANINE AMINOTRANSFERASE    (SGPT/ALT)', 'BC003', '', '', '', '', '', '', '', 360.00, '', '', '', '', '', '', 476, 'BIOCHEMISTRY'),
(2610, 'ALANINE AMINOTRANSFERASE    (SGPT/ALT)', 'BC003', '', '', '', '', '', '', '', 360.00, '', '', '', '', '', '', 476, 'BIOCHEMISTRY'),
(2612, 'XRAY - SINUS VIEW', '212', '', '', '', '', '', '', '', 600.00, '', '', '', '', '', '', 660, 'OTHERS'),
(2613, 'XRAY - SINUS VIEW', '212', '', '', '', '', '', '', '', 600.00, '', '', '', '', '', '', 660, 'OTHERS'),
(2614, 'XRAY - SINUS VIEW', '212', '', '', '', '', '', '', '', 600.00, '', '', '', '', '', '', 660, 'OTHERS'),
(2620, 'XRAY - CHEST (AP/LAT)', '190', '', '', '', '', '', 'HIGH                          ', '', 1000.00, 'NORMAL', '', '', '', '', '', 638, 'OTHERS'),
(2641, 'XRAY - KUB', '205', '.', '', '', '', '', 'HIGH                          ', '', 1000.00, 'NORMAL', '', '', '', '', '', 653, 'OTHERS'),
(2642, 'XRAY - KUB', '205', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 653, 'OTHERS'),
(2643, 'XRAY - KUB', '205', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 653, 'OTHERS'),
(2646, 'HEPATITIS - B e  ANTIBODY ', 'SR035', 'ANTIBODY TO HEPATITIS - B', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 291, 'SEROLOGY'),
(2647, 'HEPATITIS - B e  ANTIBODY ', 'SR035', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 291, 'SEROLOGY'),
(2648, 'HEPATITIS - B e  ANTIGEN ', 'SR036', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 292, 'SEROLOGY'),
(2649, 'HEPATITIS - B e  ANTIGEN ', 'SR036', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 292, 'SEROLOGY'),
(2650, 'HEPATITIS - B e  ANTIGEN ', 'SR036', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 292, 'SEROLOGY'),
(2652, 'STOOLS FOR FULL REPORT ', 'GP015', 'COLOUR', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2653, 'STOOLS FOR FULL REPORT ', 'GP015', 'MUCUS', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2654, 'STOOLS FOR FULL REPORT ', 'GP015', 'AMOEBAE', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2655, 'STOOLS FOR FULL REPORT ', 'GP015', 'OVA', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2656, 'STOOLS FOR FULL REPORT ', 'GP015', 'CYSTS', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2657, 'STOOLS FOR FULL REPORT ', 'GP015', 'PUS CELLS', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2658, 'STOOLS FOR FULL REPORT ', 'GP015', 'UNDIGESTED VEGETABLE CELLS', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2659, 'STOOLS FOR FULL REPORT ', 'GP015', 'FIBRES', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2660, 'STOOLS FOR FULL REPORT ', 'GP015', 'RED CELLS', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY');
INSERT INTO `lab_test` (`id`, `testname`, `code`, `des`, `unit`, `rfrom`, `rto`, `rfrom_msg`, `rto_msg`, `pen`, `price`, `rnorm`, `rfromfe`, `rtofe`, `rangesep`, `h`, `u`, `tmpno`, `bgroup`) VALUES
(2661, 'STOOLS FOR FULL REPORT ', 'GP015', 'EPITHELIAL CELLS', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2662, 'STOOLS FOR FULL REPORT ', 'GP015', 'CONSISTENCY', '', '', '', '', 'HIGH                          ', '', 170.00, 'NORMAL', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2663, 'STOOLS FOR FULL REPORT ', 'GP015', '', '', '', '', '', '', '', 170.00, '', '', '', '', '', '', 509, 'GENERAL PATHOLOGY'),
(2672, 'RETICULOCYTE COUNT ', 'HM037', 'RETICULOCYTE COUNT', '%', '0.50                                                                                                ', '1.50', '', 'HIGH                          ', '', 340.00, 'NORMAL', '', '', '-', '', '', 464, 'HAEMATOLOGY'),
(2673, 'RETICULOCYTE COUNT ', 'HM037', '', '', '', '', '', '', '', 340.00, '', '', '', '', '', '', 464, 'HAEMATOLOGY'),
(2722, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', 'HBA1C', '%', '', '', '', 'HIGH                          ', '', 880.00, 'NORMAL', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2723, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', '', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2724, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', 'NORMAL', '4.2                                                                                                 ', '6.3', '', 'HIGH                          ', '', 880.00, 'NORMAL', '', '', '-', '', '', 282, 'BIOCHEMISTRY'),
(2725, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', '', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2726, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', 'DIABETIC', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2727, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', '', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2728, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', 'GOOD CONTROL', '5.5                                                                                                 ', '6.8', '', 'HIGH                          ', '', 880.00, 'NORMAL', '', '', '-', '', '', 282, 'BIOCHEMISTRY'),
(2729, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', '', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2730, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', 'FAIR CONTROL', '6.8                                                                                                 ', '7.6', '', 'HIGH                          ', '', 880.00, 'NORMAL', '', '', '-', '', '', 282, 'BIOCHEMISTRY'),
(2731, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', '', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2732, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '.', 'POOR CONTROL', 'ABOVE 7.6                                                                                           ', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2733, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '', '', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2734, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '', '', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2735, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '', '', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2736, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '', '', '', '', '', '', '', 880.00, '', '', '', '', '', '', 282, 'BIOCHEMISTRY'),
(2758, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(2759, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(2760, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(2761, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(2762, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(2763, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(2764, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(2765, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(2766, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(2767, 'HERPES SIMPLEX VIRUS   1 & 2  lgG & lgM ANTIBODY', 'SR046', '', '', '', '', '', '', '', 4280.00, '', '', '', '', '', '', 311, 'SEROLOGY'),
(3056, 'PROFILE LIVER ', 'BC113', 'SERUM TOTAL PROTEINS', 'g/dl', '6.60                                                                                                ', '8.7', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '-', '', '', 373, 'BIOCHEMISTRY'),
(3057, 'PROFILE LIVER ', 'BC113', 'SERUM ALBUMIN', 'g/dl', '3.50                                                                                                ', '5.3', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '-', '', '', 373, 'BIOCHEMISTRY'),
(3058, 'PROFILE LIVER ', 'BC113', 'GLOBULIN', 'g/dl', '1.80                                                                                                ', '3.6', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '-', '', '', 373, 'BIOCHEMISTRY'),
(3059, 'PROFILE LIVER ', 'BC113', 'A/G RATIO', '', '', '', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '', '', '', 373, 'BIOCHEMISTRY'),
(3060, 'PROFILE LIVER ', 'BC113', '.', '', '', '', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '', '', '', 373, 'BIOCHEMISTRY'),
(3061, 'PROFILE LIVER ', 'BC113', 'ALKALINE PHOSPHATASE', 'u/l', '98.0                                                                                                ', '298', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '-', '', '', 373, 'BIOCHEMISTRY'),
(3062, 'PROFILE LIVER ', 'BC113', 'TOTAL BILIRUBIN', 'mg/dl', '0.20                                                                                                ', '1.2', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '-', '', '', 373, 'BIOCHEMISTRY'),
(3063, 'PROFILE LIVER ', 'BC113', 'GAMMA GT', 'u/l', '2.00                                                                                                ', '30', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '-', '', '', 373, 'BIOCHEMISTRY'),
(3064, 'PROFILE LIVER ', 'BC113', 'S.G.O.T.', 'Iu/l', '13.0                                                                                                ', '31', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '-', '', '', 373, 'BIOCHEMISTRY'),
(3065, 'PROFILE LIVER ', 'BC113', 'S.G.P.T.', 'Iu/l', '0.00                                                                                                ', '40', '', 'HIGH                          ', '', 1930.00, 'NORMAL', '', '', '-', '', '', 373, 'BIOCHEMISTRY'),
(3066, 'PROFILE LIVER ', 'BC113', '', '', '', '', '', '', '', 1930.00, '', '', '', '', '', '', 373, 'BIOCHEMISTRY'),
(3067, 'PROFILE LIVER ', 'BC113', '', '', '', '', '', '', '', 1930.00, '', '', '', '', '', '', 373, 'BIOCHEMISTRY'),
(3068, 'PROFILE LIVER ', 'BC113', '', '', '', '', '', '', '', 1930.00, '', '', '', '', '', '', 373, 'BIOCHEMISTRY'),
(3069, 'ALKALINE PHOSPHATASE', 'BC007', 'ALKALINE PHOSPHATASE', 'IU/L', '98                                                                                                  ', '298', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 31, 'BIOCHEMISTRY'),
(3070, 'ALKALINE PHOSPHATASE', 'BC007', '', '', '', '', '', '', '', 360.00, '', '', '', '', '', '', 31, 'BIOCHEMISTRY'),
(3071, 'ALKALINE PHOSPHATASE', 'BC007', '', '', '', '', '', '', '', 360.00, '', '', '', '', '', '', 31, 'BIOCHEMISTRY'),
(3110, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '. F.B.S.', 'mg/dl  U/Sugar- Nil', '75                                                                                                  ', '115', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '-', '', '', 264, 'BIOCHEMISTRY'),
(3111, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '.', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3112, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '.', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3113, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '75 gms.of Glucose given orally  at  09.45 a..m.', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3114, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '1st hour Blood Sugar on     a.m.', 'mg/dl U/Sugar -', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3115, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '.', '.', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3116, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '2 nd. hour Blood Sugar  on 11.45 a.m.', 'mg/dl U/Sugar - NIL', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3117, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3118, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '.', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3119, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '.', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3120, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '.', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3121, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '.', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3122, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '.', '', '', '', '', 'HIGH                          ', '', 1410.00, 'NORMAL', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3123, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3124, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3125, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3126, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3127, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3128, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3129, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3130, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3131, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3132, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', '', '', 264, 'BIOCHEMISTRY'),
(3133, 'CREATININE WITH ESTIMATED GFR ', 'BC165', 'SERUM CREATININE', 'mg/dl', '0.50                                                                                                ', '1.3', '', 'HIGH                          ', '', 400.00, 'NORMAL', '', '', '-', '', '', 244, 'BIOCHEMISTRY'),
(3134, 'CREATININE WITH ESTIMATED GFR ', 'BC165', 'ESTIMATED GFR', 'ml/min', '', '', '', '', '', 400.00, '', '', '', '', '', '', 244, 'BIOCHEMISTRY'),
(3135, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '', '', '', '', '', '', '', 400.00, '', '', '', '', '', '', 244, 'BIOCHEMISTRY'),
(3136, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '', '', '', '', '', '', '', 400.00, '', '', '', '', '', '', 244, 'BIOCHEMISTRY'),
(3137, 'CREATININE WITH ESTIMATED GFR ', 'BC165', 'AGE', '', '', '', '', '', '', 400.00, '', '', '', '', '', '', 244, 'BIOCHEMISTRY'),
(3138, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '', '', '', '', '', '', '', 400.00, '', '', '', '', '', '', 244, 'BIOCHEMISTRY'),
(3139, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '>   70', 'ml/min', '55                                                                                                  ', '95', '', '', '', 400.00, '', '', '', '-', '', '', 244, 'BIOCHEMISTRY'),
(3140, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '60  -  69', 'ml/min', '65                                                                                                  ', '105', '', '', '', 400.00, '', '', '', '-', '', '', 244, 'BIOCHEMISTRY'),
(3141, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '50  -  59', 'ml/min', '73                                                                                                  ', '113', '', '', '', 400.00, '', '', '', '-', '', '', 244, 'BIOCHEMISTRY'),
(3142, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '40  -  49', 'ml/min', '79                                                                                                  ', '119', '', '', '', 400.00, '', '', '', '-', '', '', 244, 'BIOCHEMISTRY'),
(3143, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '30  -  39', 'ml/min', '87                                                                                                  ', '127', '', '', '', 400.00, '', '', '', '-', '', '', 244, 'BIOCHEMISTRY'),
(3144, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '20  -  29', 'ml/min', '96                                                                                                  ', '136', '', '', '', 400.00, '', '', '', '-', '', '', 244, 'BIOCHEMISTRY'),
(3145, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '', '', '', '', '', '', '', 400.00, '', '', '', '', '', '', 244, 'BIOCHEMISTRY'),
(3146, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '', '', '', '', '', '', '', 400.00, '', '', '', '', '', '', 244, 'BIOCHEMISTRY'),
(3212, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', 'URINE CREATININE', 'mg/dl', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3213, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', 'URINE MICRO ALBUMIN', 'mg/L', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3214, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', 'URI MICRO ALBUMIN / CREATININE', 'mg of Albu / g Cre', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3215, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3216, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3217, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3218, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3219, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3220, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3221, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3222, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3223, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', 'mg of Albumin / gm of Creatinine', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3224, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', 'Urine Microalbumin Ref Range', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3225, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '<20.00 mg of albumin / gm of Creatinine', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3226, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3227, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3228, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3229, 'MICROALBUMIN WITH CREATININE IN URINE ', 'BC099', '', '', '', '', '', '', '', 760.00, '', '', '', '', '', '', 387, 'BIOCHEMISTRY'),
(3233, 'PROFILE LIPID ', 'BC112', 'Total Cholesterol', 'mg/dl', '150                                                                                                 ', '240', '', 'HIGH                          ', '', 980.00, 'NORMAL', '', '', '-', '', '', 369, 'BIOCHEMISTRY'),
(3234, 'PROFILE LIPID ', 'BC112', 'H.D.L. Cholesterol', 'mg/dl', '30                                                                                                  ', '70', '', 'HIGH                          ', '', 980.00, 'NORMAL', '30                                                                                                  ', '85                                                                                                  ', '-', '', '', 369, 'BIOCHEMISTRY'),
(3235, 'PROFILE LIPID ', 'BC112', 'L.D.L. Cholesterol', 'mg/dl', '0                                                                                                   ', '160', '', 'HIGH                          ', '', 980.00, 'NORMAL', '', '', '-', '', '', 369, 'BIOCHEMISTRY'),
(3236, 'PROFILE LIPID ', 'BC112', 'Triglyceride', 'mg/dl', '60                                                                                                  ', '150', '', 'HIGH                          ', '', 980.00, 'NORMAL', '', '', '-', '', '', 369, 'BIOCHEMISTRY'),
(3237, 'PROFILE LIPID ', 'BC112', 'Ratio', '', '', '', '', 'HIGH                          ', '', 980.00, 'NORMAL', '', '', '', '', '', 369, 'BIOCHEMISTRY'),
(3238, 'PROFILE LIPID ', 'BC112', '', '', '', '', '', '', '', 980.00, '', '', '', '', '', '', 369, 'BIOCHEMISTRY'),
(3239, 'PROFILE LIPID ', 'BC112', '', '', '', '', '', '', '', 980.00, '', '', '', '', '', '', 369, 'BIOCHEMISTRY'),
(3240, 'PROFILE LIPID ', 'BC112', '', '', '', '', '', '', '', 980.00, '', '', '', '', '', '', 369, 'BIOCHEMISTRY'),
(3241, 'PROFILE LIPID ', 'BC112', '', '', '', '', '', '', '', 980.00, '', '', '', '', '', '', 369, 'BIOCHEMISTRY'),
(3242, 'PROFILE LIPID ', 'BC112', '', '', '', '', '', '', '', 980.00, '', '', '', '', '', '', 369, 'BIOCHEMISTRY'),
(3248, 'PROTEIN TOTAL ', 'BC122', 'SERUM PROTEIN TOTAL', 'g/dl', '6.40                                                                                                ', '8.40', '', 'HIGH                          ', '', 510.00, 'NORMAL', '', '', '-', '', '', 453, 'BIOCHEMISTRY'),
(3249, 'PROTEIN TOTAL ', 'BC122', 'ALBUMIN', 'g/dl', '3.70                                                                                                ', '5.0', '', 'HIGH                          ', '', 510.00, 'NORMAL', '', '', '-', '', '', 453, 'BIOCHEMISTRY'),
(3250, 'PROTEIN TOTAL ', 'BC122', 'GLOBULIN', 'g/dl', '2.20                                                                                                ', '3.40', '', 'HIGH                          ', '', 510.00, 'NORMAL', '', '', '-', '', '', 453, 'BIOCHEMISTRY'),
(3251, 'PROTEIN TOTAL ', 'BC122', 'A/G RATIO', '', '', '', '', 'HIGH                          ', '', 510.00, 'NORMAL', '', '', '', '', '', 453, 'BIOCHEMISTRY'),
(3252, 'PROTEIN TOTAL ', 'BC122', '', '', '', '', '', '', '', 510.00, '', '', '', '', '', '', 453, 'BIOCHEMISTRY'),
(3253, 'PROTEIN TOTAL ', 'BC122', '', '', '', '', '', '', '', 510.00, '', '', '', '', '', '', 453, 'BIOCHEMISTRY'),
(3254, 'CONSULTATION', '30', '', '', '', '', '', 'HIGH                          ', '', 200.00, 'NORMAL', '', '', '', '', '', 143, 'OTHERS'),
(3255, 'CONSULTATION', '30', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 143, 'OTHERS'),
(3282, 'IONIZED CALCIUM ', 'BC088', 'IONIZED CALCIUM', 'mmol/L', '1.1                                                                                                 ', '1.4', '', 'HIGH                          ', '', 420.00, 'NORMAL', '', '', '-', '', '', 351, 'BIOCHEMISTRY'),
(3283, 'IONIZED CALCIUM ', 'BC088', '', '', '', '', '', '', '', 420.00, '', '', '', '', '', '', 351, 'BIOCHEMISTRY'),
(3284, 'IONIZED CALCIUM ', 'BC088', '', '', '', '', '', '', '', 420.00, '', '', '', '', '', '', 351, 'BIOCHEMISTRY'),
(3294, 'BUN   (BLOOD UREA NITROGEN) ', 'BC020', 'BUN', 'mg/dl', '8                                                                                                   ', '17', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 96, 'BIOCHEMISTRY'),
(3295, 'BUN   (BLOOD UREA NITROGEN) ', 'BC020', '', '', '', '', '', '', '', 360.00, '', '', '', '', '', '', 96, 'BIOCHEMISTRY'),
(3296, 'XRAY - CHEST WITH REPORT (OPD)', '192', '', '', '', '', '', 'HIGH                          ', '', 900.00, 'NORMAL', '', '', '', '', '', 640, 'OTHERS'),
(3297, 'XRAY - CHEST WITH REPORT (OPD)', '192', '', '', '', '', '', '', '', 900.00, '', '', '', '', '', '', 640, 'OTHERS'),
(3298, 'XRAY - CHEST WITH REPORT (OPD)', '192', '', '', '', '', '', '', '', 900.00, '', '', '', '', '', '', 640, 'OTHERS'),
(3299, 'XRAY - CHEST WITH REPORT (GAMCA)', '191', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 639, 'OTHERS'),
(3302, 'XRAY - REPORT', '210', '', '', '', '', '', 'HIGH                          ', '', 300.00, 'NORMAL', '', '', '', '', '', 658, 'OTHERS'),
(3303, 'XRAY - REPORT', '210', '', '', '', '', '', '', '', 300.00, '', '', '', '', '', '', 658, 'OTHERS'),
(3304, 'XRAY - DORSAL', '195', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 643, 'OTHERS'),
(3305, 'XRAY - DORSAL', '195', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 643, 'OTHERS'),
(3306, 'XRAY - DORSAL', '195', '', '', '', '', '', '', '', 1000.00, '', '', '', '', '', '', 643, 'OTHERS'),
(3325, 'GLUCOSE CHALLENGE TEST  (GCT) ', 'BC063', '50gms Glucose given at 11.00 a.m.', '', '', 'Non fasting', '', 'HIGH                          ', '', 520.00, 'NORMAL', '', '', '', '', '', 263, 'BIOCHEMISTRY'),
(3326, 'GLUCOSE CHALLENGE TEST  (GCT) ', 'BC063', '', '', '', '', '', 'HIGH                          ', '', 520.00, 'NORMAL', '', '', '', '', '', 263, 'BIOCHEMISTRY'),
(3327, 'GLUCOSE CHALLENGE TEST  (GCT) ', 'BC063', 'After 2 hours Blood Sugar 1.00 p.m.', 'mg/dl', '', 'Urine Sugar - Nil', '', 'HIGH                          ', '', 520.00, 'NORMAL', '', '', '', '', '', 263, 'BIOCHEMISTRY'),
(3328, 'GLUCOSE CHALLENGE TEST  (GCT) ', 'BC063', '', '', '', '', '', 'HIGH                          ', '', 520.00, 'NORMAL', '', '', '', '', '', 263, 'BIOCHEMISTRY'),
(3329, 'GLUCOSE CHALLENGE TEST  (GCT) ', 'BC063', '', '', '', '', '', '', '', 520.00, '', '', '', '', '', '', 263, 'BIOCHEMISTRY'),
(3330, 'GLUCOSE CHALLENGE TEST  (GCT) ', 'BC063', '', '', '', '', '', '', '', 520.00, '', '', '', '', '', '', 263, 'BIOCHEMISTRY'),
(3331, 'GLUCOSE CHALLENGE TEST  (GCT) ', 'BC063', '', '', '', '', '', '', '', 520.00, '', '', '', '', '', '', 263, 'BIOCHEMISTRY'),
(3332, 'GLUCOSE CHALLENGE TEST  (GCT) ', 'BC063', '', '', '', '', '', '', '', 520.00, '', '', '', '', '', '', 263, 'BIOCHEMISTRY'),
(3405, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '1 st  HOUR', 'mm', '', '', '', 'HIGH                          ', '', 200.00, 'NORMAL', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3406, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '2 nd HOUR', 'mm', '', '', '', 'HIGH                          ', '', 200.00, 'NORMAL', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3407, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3408, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3409, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3410, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3411, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3412, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', 'REFERENCE VALUE', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3413, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3414, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', 'AGE (Years)       Male             Female', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3415, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3416, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '18   -  30           <   7                   <   11', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3417, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '31  -  40            <   8                  <   11', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3418, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '41  -  50            <  11                 <  13', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3419, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '51  -  60             <  12                 <  19', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3420, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '61  -  70            <  13                 <  20', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3421, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', 'OVER 70          <  30                 <  35', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3422, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3423, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', 'NEW  BORN             :    0   -   2', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3424, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3425, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3426, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3427, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3428, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3429, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3430, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', '', '', 186, 'HAEMATOLOGY'),
(3453, 'FULL BLOOD COUNT ', 'HM019', 'Hb', 'g/dl', '12.0                                                                                                ', '17.5', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3454, 'FULL BLOOD COUNT ', 'HM019', 'RBC', 'million/cu.mm', '3.5                                                                                                 ', '6', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3455, 'FULL BLOOD COUNT ', 'HM019', 'PCV', '%', '36.0                                                                                                ', '50', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3456, 'FULL BLOOD COUNT ', 'HM019', 'MCV', 'fl', '70.0                                                                                                ', '96', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3457, 'FULL BLOOD COUNT ', 'HM019', 'MCH', 'pg', '27.0                                                                                                ', '32', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3458, 'FULL BLOOD COUNT ', 'HM019', 'MCHC', 'g/dl', '30.0                                                                                                ', '35', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3459, 'FULL BLOOD COUNT ', 'HM019', 'WBC', 'cu.mm', '4,000                                                                                               ', '11,000', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3460, 'FULL BLOOD COUNT ', 'HM019', '.', '', '', '', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3461, 'FULL BLOOD COUNT ', 'HM019', 'DC', '', '', '', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3462, 'FULL BLOOD COUNT ', 'HM019', 'Neutrophil', '%', '40                                                                                                  ', '75', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3463, 'FULL BLOOD COUNT ', 'HM019', 'Lymphocytes', '%', '10                                                                                                  ', '45', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3464, 'FULL BLOOD COUNT ', 'HM019', 'Eosinophil', '%', '1                                                                                                   ', '6', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3465, 'FULL BLOOD COUNT ', 'HM019', 'Monocyte', '%', '0                                                                                                   ', '10', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3466, 'FULL BLOOD COUNT ', 'HM019', 'Basophil', '%', '', '', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3467, 'FULL BLOOD COUNT ', 'HM019', '..', '', '', '', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3468, 'FULL BLOOD COUNT ', 'HM019', 'Platelet Count', 'cu.mm', '150,000                                                                                             ', '450,000', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '-', '', '', 235, 'HAEMATOLOGY'),
(3469, 'FULL BLOOD COUNT ', 'HM019', '.', '', '', '', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3470, 'FULL BLOOD COUNT ', 'HM019', '.', '', '', '', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3471, 'FULL BLOOD COUNT ', 'HM019', '', '', '', '', '', 'HIGH                          ', '', 360.00, 'NORMAL', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3472, 'FULL BLOOD COUNT ', 'HM019', '', '', '', '', '', '', '', 360.00, '', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3473, 'FULL BLOOD COUNT ', 'HM019', '', '', '', '', '', '', '', 360.00, '', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3474, 'FULL BLOOD COUNT ', 'HM019', '', '', '', '', '', '', '', 360.00, '', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3475, 'FULL BLOOD COUNT ', 'HM019', '', '', '', '', '', '', '', 360.00, '', '', '', '', '', '', 235, 'HAEMATOLOGY'),
(3494, 'GLUCOSE - POST PRANDIAL ', 'BC076', '', '', '', '', '', '', '', 300.00, '', '', '', '', '', '', 432, 'BIOCHEMISTRY'),
(3495, 'GLUCOSE - POST PRANDIAL ', 'BC076', '', '', '', '', '', '', '', 300.00, '', '', '', '', '', '', 432, 'BIOCHEMISTRY'),
(3496, 'GLUCOSE - POST PRANDIAL ', 'BC076', '', '', '', '', '', '', '', 300.00, '', '', '', '', '', '', 432, 'BIOCHEMISTRY'),
(3497, 'GLUCOSE - POST PRANDIAL ', 'BC076', 'P.P.B.S.', 'mg/dl', '', '', '', 'HIGH                          ', '', 300.00, 'NORMAL', '', '', '', '', '', 432, 'BIOCHEMISTRY'),
(3509, 'URINE - ALBUMIN ', 'GP023', '', '', '', '', '', '', '', 150.00, '', '', '', '', '', '', 600, 'GENERAL PATHOLOGY'),
(3510, 'URINE - ALBUMIN ', 'GP023', 'URINE ALBUMIN', '', '', '', '', '', '', 150.00, '', '', '', '', '', '', 600, 'GENERAL PATHOLOGY'),
(3511, 'URINE - ALBUMIN ', 'GP023', '', '', '', '', '', '', '', 150.00, '', '', '', '', '', '', 600, 'GENERAL PATHOLOGY'),
(3512, 'URINE - ALBUMIN ', 'GP023', '', '', '', '', '', '', '', 150.00, '', '', '', '', '', '', 600, 'GENERAL PATHOLOGY'),
(3515, 'RHEUMATOID FACTOR ', 'SR060', 'RHEUMATOID FACTOR', 'iu/ml', '(Less than 8)                                                                                       ', '', '', 'HIGH                          ', '', 410.00, 'NORMAL', '', '', '', '', '', 468, 'SEROLOGY'),
(3516, 'RHEUMATOID FACTOR ', 'SR060', '', '', '', '', '', '', '', 410.00, '', '', '', '', '', '', 468, 'SEROLOGY'),
(3517, 'RHEUMATOID FACTOR ', 'SR060', '', '', '', '', '', '', '', 410.00, '', '', '', '', '', '', 468, 'SEROLOGY'),
(3518, 'ELECTROLYTES - SERUM ', 'BC045', 'SERUM SODIUM', 'mmol/l', '135.00                                                                                              ', '148', '', 'HIGH                          ', '', 630.00, 'NORMAL', '', '', '-', '', '', 192, 'BIOCHEMISTRY'),
(3519, 'ELECTROLYTES - SERUM ', 'BC045', 'SERUM POTASSIUM', 'mmol/l', '3.50                                                                                                ', '5.5', '', 'HIGH                          ', '', 630.00, 'NORMAL', '', '', '-', '', '', 192, 'BIOCHEMISTRY'),
(3520, 'ELECTROLYTES - SERUM ', 'BC045', 'CHLORIDE', 'mmol/l', '95.00                                                                                               ', '111', '', 'HIGH                          ', '', 630.00, 'NORMAL', '', '', '-', '', '', 192, 'BIOCHEMISTRY'),
(3521, 'ELECTROLYTES - SERUM ', 'BC045', '', '', '', '', '', '', '', 630.00, '', '', '', '', '', '', 192, 'BIOCHEMISTRY'),
(3522, 'ELECTROLYTES - SERUM ', 'BC045', '', '', '', '', '', '', '', 630.00, '', '', '', '', '', '', 192, 'BIOCHEMISTRY'),
(3535, 'DENGUE lgM & lgG ANTIBODY ', 'SR024', '', '', '', '', '', 'HIGH                          ', '', 2330.00, 'NORMAL', '', '', '', '', '', 175, 'SEROLOGY'),
(3536, 'DENGUE lgM & lgG ANTIBODY ', 'SR024', '', '', '', '', '', '', '', 2330.00, '', '', '', '', '', '', 175, 'SEROLOGY'),
(3537, 'P S A ', 'TM007', 'P S A', '', '< 40 yrs.  0.6                                                                                      ', '1.3', '', 'HIGH                          ', '', 3550.00, 'NORMAL', '', '', '-', '', '', 408, 'TUMOUR MARKERS'),
(3538, 'P S A ', 'TM007', '', '', '41-50yrs.  0.6                                                                                      ', '2.0', '', 'HIGH                          ', '', 3550.00, 'NORMAL', '', '', '-', '', '', 408, 'TUMOUR MARKERS'),
(3539, 'P S A ', 'TM007', '', '', '', '', '', '', '', 3550.00, '', '', '', '', '', '', 408, 'TUMOUR MARKERS'),
(3540, 'P S A ', 'TM007', '', '', '', '', '', '', '', 3550.00, '', '', '', '', '', '', 408, 'TUMOUR MARKERS'),
(3543, 'TSH  (THYROID STIMULATING HORMONE)  3rd Generation ', 'BC138', 'TSH', 'Iu/ml', '0.3                                                                                                 ', '4.2', '', 'HIGH                          ', '', 990.00, 'NORMAL', '', '', '-', '', '', 572, 'BIOCHEMISTRY'),
(3544, 'TSH  (THYROID STIMULATING HORMONE)  3rd Generation ', 'BC138', '', '', '', '', '', '', '', 990.00, '', '', '', '', '', '', 572, 'BIOCHEMISTRY'),
(3545, 'TSH  (THYROID STIMULATING HORMONE)  3rd Generation ', 'BC138', '', '', '', '', '', '', '', 990.00, '', '', '', '', '', '', 572, 'BIOCHEMISTRY'),
(3546, 'TSH  (THYROID STIMULATING HORMONE)  3rd Generation ', 'BC138', '', '', '', '', '', '', '', 990.00, '', '', '', '', '', '', 572, 'BIOCHEMISTRY'),
(3565, 'Scl - 70', 'SR066', '', '', '', '', '', '', '', 1790.00, '', '', '', '', 'N', 'N', 477, 'SEROLOGY'),
(3566, 'SCRAPING FOR FUNGI MICROSCOPY ', 'MB037', '', '', '', '', '', '', '', 410.00, '', '', '', '', 'N', 'N', 478, 'MICROBIOLOGY'),
(3567, 'SEMINAL FLUID CULTURE ', 'MB067', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 480, 'MICROBIOLOGY'),
(3568, 'SEMINAL FLUID CULTURE & ABST   ', 'MB068', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 481, 'MICROBIOLOGY'),
(3569, 'SICKLING TEST ', 'HM040', '', '', '', '', '', '', '', 410.00, '', '', '', '', 'N', 'N', 489, 'HAEMATOLOGY'),
(3570, 'SKIN SWAB CULTURE ', 'MB069', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 490, 'MICROBIOLOGY'),
(3571, 'SKIN SWAB CULTURE & ABST     ', 'MB070', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 491, 'MICROBIOLOGY'),
(3572, 'Sm (SMITH) ANTIBODY', 'SR067', '', '', '', '', '', '', '', 1790.00, '', '', '', '', 'N', 'N', 492, 'SEROLOGY'),
(3573, 'SODIUM - SERUM ', 'BC124', '', '', '', '', '', '', '', 460.00, '', '', '', '', 'N', 'N', 493, 'BIOCHEMISTRY'),
(3574, 'SODIUM - URINE ', 'BC125', '', '', '', '', '', '', '', 460.00, '', '', '', '', 'N', 'N', 494, 'BIOCHEMISTRY'),
(3575, 'SOYA BEAN SPECIFIC lgE ', 'SR068', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 495, 'SEROLOGY'),
(3576, 'SPECIFIC GRAVITY ', 'GP012', '', '', '', '', '', '', '', 150.00, '', '', '', '', 'N', 'N', 496, 'GENERAL PATHOLOGY'),
(3577, 'SPECIMEN FOR M.R.S.A.', 'MB071', '', '', '', '', '', '', '', 790.00, '', '', '', '', 'N', 'N', 497, 'MICROBIOLOGY'),
(3578, 'SPUTUM CULTURE & ABST   ', 'MB073', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 499, 'MICROBIOLOGY'),
(3579, 'SPUTUM CULTURE ONLY ', 'MB072', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 500, 'MICROBIOLOGY'),
(3580, 'SPUTUM FOR  A.F.B.', 'MB074', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 501, 'MICROBIOLOGY'),
(3581, 'SPUTUM FOR ASPERGILLUS ', 'MB075', '', '', '', '', '', '', '', 650.00, '', '', '', '', 'N', 'N', 503, 'MICROBIOLOGY'),
(3582, 'SPUTUM FOR EOSINOPHILS', 'HM042', '', '', '', '', '', '', '', 230.00, '', '', '', '', 'N', 'N', 504, 'HAEMATOLOGY'),
(3583, 'STONE ANALYSIS ', 'BC128', '', '', '', '', '', '', '', 1460.00, '', '', '', '', 'N', 'N', 506, 'BIOCHEMISTRY'),
(3584, 'STOOL CULTURE ', 'MB077', '', '', '', '', '', '', '', 590.00, '', '', '', '', 'N', 'N', 507, 'MICROBIOLOGY'),
(3585, 'STOOLS FOR CRYPTOSPORIDIUM ', 'MB080', '', '', '', '', '', '', '', 150.00, '', '', '', '', 'N', 'N', 510, 'MICROBIOLOGY'),
(3586, 'STOOLS FOR ELECTROLYTES ', 'BC126', '', '', '', '', '', '', '', 630.00, '', '', '', '', 'N', 'N', 511, 'BIOCHEMISTRY'),
(3587, 'STOOLS FOR FAT GLOBULES ', 'GP013', '', '', '', '', '', '', '', 320.00, '', '', '', '', 'N', 'N', 512, 'GENERAL PATHOLOGY'),
(3588, 'STOOLS FOR REDUCING SUBSTANCES ', 'GP017', '', '', '', '', '', '', '', 230.00, '', '', '', '', 'N', 'N', 514, 'GENERAL PATHOLOGY'),
(3589, 'STOOLS FOR ROTA VIRUS SCREENING ', 'MB079', '', '', '', '', '', '', '', 970.00, '', '', '', '', 'N', 'N', 515, 'MICROBIOLOGY'),
(3590, 'STOOLS FOR STERCOBILINOGEN', 'GP018', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 516, 'GENERAL PATHOLOGY'),
(3591, 'STOOLS FOR TRYPSINS ', 'GP014', '', '', '', '', '', '', '', 150.00, '', '', '', '', 'N', 'N', 517, 'GENERAL PATHOLOGY'),
(3592, 'SWAB FOR CULTURE ', 'MB081', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 519, 'MICROBIOLOGY'),
(3593, 'SWINE INFLUENZAA (H1N1) VIRAL RNA RT -PCR', 'MO034', '', '', '', '', '', '', '', 5860.00, '', '', '', '', 'N', 'N', 520, 'MOLECULAR DIAGNOSTICS'),
(3594, 'SYNOVIAL FLUID FOR CULTURE ', 'MB083', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 521, 'MICROBIOLOGY'),
(3595, 'SYNOVIAL FLUID FOR CULTURE & ABST    ', 'MB084', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 522, 'MICROBIOLOGY'),
(3596, 'SYNOVIAL FLUID FULL REPORT ', 'BC129', '', '', '', '', '', '', '', 900.00, '', '', '', '', 'N', 'N', 523, 'BIOCHEMISTRY'),
(3597, 'ABST  (ANTI MICROBIAL SENSITIVITY TEST )', 'MB001', '', '', '', '', '', '', '', 410.00, '', '', '', '', 'N', 'N', 20, 'MICROBIOLOGY'),
(3598, 'ACID PHOSPHATASE      (TOTAL & PROSTATE)', 'BC001', '', '', '', '', '', '', '', 900.00, '', '', '', '', 'N', 'N', 22, 'BIOCHEMISTRY'),
(3599, 'ACTIVATED PARTIAL THROMBOPLASTIN TIME  (APTT)', 'HM001', '', '', '', '', '', '', '', 560.00, '', '', '', '', 'N', 'N', 23, 'HAEMATOLOGY'),
(3600, 'ADENOSINE DEAMINASE ', 'BC002', '', '', '', '', '', '', '', 1540.00, '', '', '', '', 'N', 'N', 24, 'BIOCHEMISTRY'),
(3601, 'AFB SMEAR ', 'MB002', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 25, 'MICROBIOLOGY'),
(3602, 'ALANINE AMINOTRANSFERASE    (SGPT/ALT)', 'BC003', '', '', '', '', '', '', '', 360.00, '', '', '', '', 'N', 'N', 27, 'BIOCHEMISTRY'),
(3603, 'ALBUMIN', 'BC004', '', '', '', '', '', '', '', 340.00, '', '', '', '', 'N', 'N', 28, 'BIOCHEMISTRY'),
(3604, 'ALCOHOL LEVEL', 'BC005', '', '', '', '', '', '', '', 1610.00, '', '', '', '', 'N', 'N', 29, 'BIOCHEMISTRY'),
(3605, 'ALDOLASE ', 'BC006', '', '', '', '', '', '', '', 580.00, '', '', '', '', 'N', 'N', 30, 'BIOCHEMISTRY'),
(3606, 'ALKALINE PHOSPHATASE    (ISOENZYMES)', 'BC008', '', '', '', '', '', '', '', 2790.00, '', '', '', '', 'N', 'N', 32, 'BIOCHEMISTRY'),
(3607, 'ALLERGEN APECIFIC lgE SCREEN ', 'SR001', '', '', '', '', '', '', '', 10180.00, '', '', '', '', 'N', 'N', 33, 'SEROLOGY'),
(3608, 'ALPHA - FETO PROTEIN ', 'TM001', '', '', '', '', '', '', '', 2230.00, '', '', '', '', 'N', 'N', 34, 'TUMOUR MARKERS'),
(3609, 'ALPHA-1  ANTITRYPSIN', 'BC009', '', '', '', '', '', '', '', 3040.00, '', '', '', '', 'N', 'N', 35, 'BIOCHEMISTRY'),
(3610, 'AML - 1 ETO ; t (8,21) 4500', 'MO036', '', '', '', '', '', '', '', 4500.00, '', '', '', '', 'N', 'N', 36, 'MOLECULAR DIAGNOSTICS'),
(3611, 'AMMONIA (Please inquire)', 'BC010', '', '', '', '', '', '', '', 3620.00, '', '', '', '', 'N', 'N', 37, 'BIOCHEMISTRY'),
(3612, 'AMYLASE  (PANCREATIC FRACTION)', 'BC011', '', '', '', '', '', '', '', 2950.00, '', '', '', '', 'N', 'N', 38, 'BIOCHEMISTRY'),
(3613, 'AMYLASE - SERUM ', 'BC012', '', '', '', '', '', '', '', 570.00, '', '', '', '', 'N', 'N', 39, 'BIOCHEMISTRY'),
(3614, 'AMYLASE - URINE', 'BC013', '', '', '', '', '', '', '', 570.00, '', '', '', '', 'N', 'N', 40, 'BIOCHEMISTRY'),
(3615, 'ANTI CARDIOLIPIN  ANTIBODY lgG & lgM', 'SR002', '', '', '', '', '', '', '', 3010.00, '', '', '', '', 'N', 'N', 41, 'SEROLOGY'),
(3616, 'ANTI CARDIOLIPIN ANTIBODY lgG OR lgM ', 'SR003', '', '', '', '', '', '', '', 2150.00, '', '', '', '', 'N', 'N', 43, 'SEROLOGY'),
(3617, 'ANTI MITOCHRONDIAL ANTIBODY ', 'SR004', '', '', '', '', '', '', '', 2200.00, '', '', '', '', 'N', 'N', 45, 'SEROLOGY'),
(3618, 'ANTI NEUCLEAR ANTIBODY  (ANA/ANF) ', 'SR006', '', '', '', '', '', '', '', 1010.00, '', '', '', '', 'N', 'N', 46, 'SEROLOGY'),
(3619, 'ANTI NEUCLEAR ANTIBODY IN DILUTION ', 'SR007', '', '', '', '', '', '', '', 2020.00, '', '', '', '', 'N', 'N', 47, 'SEROLOGY'),
(3620, 'ANTI NEUTROPHIL CYTOPLASMIC ANTIBODY  (ANCA) ', 'SR005', '', '', '', '', '', '', '', 2900.00, '', '', '', '', 'N', 'N', 48, 'SEROLOGY'),
(3621, 'ANTI PHOSPHOLIPID ANTIBODY ', 'SR008', '', '', '', '', '', '', '', 6910.00, '', '', '', '', 'N', 'N', 51, 'SEROLOGY'),
(3622, 'ANTI SMOOTH MUSCLE ANTIBODY  (ASM) ', 'SR010', '', '', '', '', '', '', '', 2900.00, '', '', '', '', 'N', 'N', 52, 'SEROLOGY'),
(3623, 'ANTI STREPTOLYSIN "0" TITRE  (ASOT) ', 'SR009', '', '', '', '', '', '', '', 430.00, '', '', '', '', 'N', 'N', 53, 'SEROLOGY'),
(3624, 'ASCITIC FLUID CELLS ', 'MB004', '', '', '', '', '', '', '', 410.00, '', '', '', '', 'N', 'N', 54, 'MICROBIOLOGY'),
(3625, 'ASCITIC FLUID CULTURE ', 'MB003', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 55, 'MICROBIOLOGY'),
(3626, 'ASCITIC FLUID CULTURE & ABST   ', 'MB005', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 56, 'MICROBIOLOGY'),
(3627, 'ASCITIC FLUID FOR FULL REPORT ', 'GP001', '', '', '', '', '', '', '', 900.00, '', '', '', '', 'N', 'N', 57, 'GENERAL PATHOLOGY'),
(3628, 'ASPARTATE AMINOTRANSFERASE    (SGOT/AST) ', 'BC014', '', '', '', '', '', '', '', 360.00, '', '', '', '', 'N', 'N', 58, 'BIOCHEMISTRY'),
(3629, 'ASPIRATION FLUID FOR FULL REPORT', 'GP002', '', '', '', '', '', '', '', 900.00, '', '', '', '', 'N', 'N', 59, 'GENERAL PATHOLOGY'),
(3630, 'AURAL SWAB CULTURE ', 'MB006', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 60, 'MICROBIOLOGY'),
(3631, 'AURAL SWAB CULTURE & ABST   ', 'MB007', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 61, 'MICROBIOLOGY'),
(3632, 'AUTO ANTIBODY PROFILE ', 'SR011', '', '', '', '', '', '', '', 7820.00, '', '', '', '', 'N', 'N', 62, 'SEROLOGY'),
(3634, 'AXILLA SWAB CULTURE & ABST   ', 'MB009', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 65, 'MICROBIOLOGY'),
(3635, 'B12', 'BC015', '', '', '', '', '', '', '', 2880.00, '', '', '', '', 'N', 'N', 66, 'BIOCHEMISTRY'),
(3636, 'BCR - ABL p190, BCR -ABL p210 Philadelphia chromosome: t(9:22)', 'MO032', '', '', '', '', '', '', '', 4500.00, '', '', '', '', 'N', 'N', 68, 'MOLECULAR DIAGNOSTICS'),
(3637, 'BETA -2 MICROGLOBULIN ', 'BC016', '', '', '', '', '', '', '', 6280.00, '', '', '', '', 'N', 'N', 70, 'BIOCHEMISTRY'),
(3638, 'BICARBONATE', 'BC017', '', '', '', '', '', '', '', 500.00, '', '', '', '', 'N', 'N', 71, 'BIOCHEMISTRY'),
(3639, 'BILIRUBIN - DIRECT + TOTAL', 'BC018', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 73, 'BIOCHEMISTRY'),
(3640, 'BILIRUBIN - TOTAL', 'BC019', '', '', '', '', '', '', '', 340.00, '', '', '', '', 'N', 'N', 74, 'BIOCHEMISTRY'),
(3641, 'BLOOD CULTURE ', 'MB010', '', '', '', '', '', '', '', 610.00, '', '', '', '', 'N', 'N', 76, 'MICROBIOLOGY'),
(3642, 'BLOOD CULTURE - BACTEC', 'MB012', '', '', '', '', '', '', '', 2010.00, '', '', '', '', 'N', 'N', 79, 'MICROBIOLOGY'),
(3643, 'BLOOD CULTURE & ABST - BACTEC   ', 'MB013', '', '', '', '', '', '', '', 2430.00, '', '', '', '', 'N', 'N', 78, 'MICROBIOLOGY'),
(3644, 'BLOOD SUGAR BEFORE DINNER ', 'BC059', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 83, 'BIOCHEMISTRY'),
(3645, 'BLOOD SUGAR BEFORE LUNCH ', 'BC060', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 84, 'BIOCHEMISTRY'),
(3646, 'BONE MARROW  (Please Inquire)', 'HM005', '', '', '', '', '', '', '', 8120.00, '', '', '', '', 'N', 'N', 89, 'HAEMATOLOGY'),
(3647, 'BONE MARROW  (SLIDE SENT) ', 'HM007', '', '', '', '', '', '', '', 3070.00, '', '', '', '', 'N', 'N', 90, 'HAEMATOLOGY'),
(3648, 'BONE MARROW - WITH TREPHINE  (Please Inquire)', 'HM006', '', '', '', '', '', '', '', 11000.00, '', '', '', '', 'N', 'N', 91, 'HAEMATOLOGY'),
(3649, 'BRONCHIAL WASH CULTURE ', 'MB014', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 92, 'MICROBIOLOGY'),
(3650, 'BRONCHIAL WASH CULTURE & ABST   ', 'MB015', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 93, 'MICROBIOLOGY'),
(3651, 'BRUCELLA ANTIBODY ', 'SR012', '', '', '', '', '', '', '', 430.00, '', '', '', '', 'N', 'N', 94, 'SEROLOGY'),
(3652, 'BUCCAL SMEAR FOR BARR BODIES ', 'HS008', '', '', '', '', '', '', '', 1220.00, '', '', '', '', 'N', 'N', 95, 'HISTOLOGY'),
(3653, 'C E A ', 'TM003', '', '', '', '', '', '', '', 3030.00, '', '', '', '', 'N', 'N', 97, 'TUMOUR MARKERS'),
(3654, 'C3c   ( Compliment C3c ) ', 'BC021', '', '', '', '', '', '', '', 2180.00, '', '', '', '', 'N', 'N', 105, 'BIOCHEMISTRY'),
(3655, 'C4     (  Compliment C4  ) ', 'BC022', '', '', '', '', '', '', '', 2180.00, '', '', '', '', 'N', 'N', 106, 'BIOCHEMISTRY'),
(3657, 'CA 15.3 ', 'TM005', '', '', '', '', '', '', '', 6720.00, '', '', '', '', 'N', 'N', 109, 'TUMOUR MARKERS'),
(3658, 'CA 19.9', 'TM008', '', '', '', '', '', '', '', 5190.00, '', '', '', '', 'N', 'N', 110, 'TUMOUR MARKERS'),
(3659, 'CALCIUM - SERUM ', 'BC025', '', '', '', '', '', '', '', 450.00, '', '', '', '', 'N', 'N', 112, 'BIOCHEMISTRY'),
(3660, 'CALCIUM - URINE', 'BC026', '', '', '', '', '', '', '', 450.00, '', '', '', '', 'N', 'N', 113, 'BIOCHEMISTRY'),
(3661, 'CALCIUM : CREATININE RATIO', 'BC027', '', '', '', '', '', '', '', 640.00, '', '', '', '', 'N', 'N', 114, 'BIOCHEMISTRY'),
(3662, 'CAT DANDER SPECIFIC lgE', 'SR014', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 115, 'SEROLOGY');
INSERT INTO `lab_test` (`id`, `testname`, `code`, `des`, `unit`, `rfrom`, `rto`, `rfrom_msg`, `rto_msg`, `pen`, `price`, `rnorm`, `rfromfe`, `rtofe`, `rangesep`, `h`, `u`, `tmpno`, `bgroup`) VALUES
(3663, 'CATHETER TIP FOR CULTURE ', 'MB020', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 116, 'MICROBIOLOGY'),
(3664, 'CATHETER TIP FOR CULTURE & ABST     ', 'MB021', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 118, 'MICROBIOLOGY'),
(3665, 'CCP ANTIBODY ', 'SR013', '', '', '', '', '', '', '', 4620.00, '', '', '', '', 'N', 'N', 119, 'SEROLOGY'),
(3666, 'CEREBROSPINAL FLUID FULL REPORT    ( CSF FR) ', 'BC028', '', '', '', '', '', '', '', 900.00, '', '', '', '', 'N', 'N', 120, 'BIOCHEMISTRY'),
(3667, 'CERULOPLASMIN', 'BC029', '', '', '', '', '', '', '', 3380.00, '', '', '', '', 'N', 'N', 121, 'BIOCHEMISTRY'),
(3668, 'CHIKUNGUNYA lgM', 'SR015', '', '', '', '', '', '', '', 1660.00, '', '', '', '', 'N', 'N', 124, 'SEROLOGY'),
(3669, 'CHIKUNGUNYA RT - PCR    ', 'MO018', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 125, 'MOLECULAR DIAGNOSTICS'),
(3670, 'CHLORIDE', 'BC030', '', '', '', '', '', '', '', 340.00, '', '', '', '', 'N', 'N', 126, 'BIOCHEMISTRY'),
(3671, 'CHOLESTEROL  (TOTAL) ', 'BC033', '', '', '', '', '', '', '', 260.00, '', '', '', '', 'N', 'N', 127, 'BIOCHEMISTRY'),
(3672, 'CHOLESTEROL - HDL', 'BC031', '', '', '', '', '', '', '', 510.00, '', '', '', '', 'N', 'N', 128, 'BIOCHEMISTRY'),
(3673, 'CHOLESTEROL - LDL', 'BC032', '', '', '', '', '', '', '', 510.00, '', '', '', '', 'N', 'N', 129, 'BIOCHEMISTRY'),
(3674, 'CHOLINESTERASE ', 'BC034', '', '', '', '', '', '', '', 1230.00, '', '', '', '', 'N', 'N', 130, 'BIOCHEMISTRY'),
(3675, 'CLOT CULTURE ', 'MB022', '', '', '', '', '', '', '', 610.00, '', '', '', '', 'N', 'N', 131, 'MICROBIOLOGY'),
(3676, 'CLOT CULTURE & ABST   ', 'MB023', '', '', '', '', '', '', '', 1010.00, '', '', '', '', 'N', 'N', 133, 'MICROBIOLOGY'),
(3677, 'CLOT SOLIBILITY ', 'HM050', '', '', '', '', '', '', '', 910.00, '', '', '', '', 'N', 'N', 134, 'HAEMATOLOGY'),
(3678, 'CLOTTING PROFILE ', 'HM008', '', '', '', '', '', '', '', 2490.00, '', '', '', '', 'N', 'N', 135, 'HAEMATOLOGY'),
(3679, 'CMV QUANTITATIVE PCR ', 'MO016', '', '', '', '', '', '', '', 7520.00, '', '', '', '', 'N', 'N', 136, 'MOLECULAR DIAGNOSTICS'),
(3680, 'COAGULATION FACTOR  IX', 'HM010', '', '', '', '', '', '', '', 4770.00, '', '', '', '', 'N', 'N', 137, 'HAEMATOLOGY'),
(3681, 'COAGULATION FACTOR  VIII', 'HM009', '', '', '', '', '', '', '', 4770.00, '', '', '', '', 'N', 'N', 138, 'HAEMATOLOGY'),
(3682, 'COCKROACH  (PERIPLANATA AMERICANA) ', 'SR016', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 139, 'SEROLOGY'),
(3683, 'COLD AGGLUTINATION ', 'SR017', '', '', '', '', '', '', '', 1070.00, '', '', '', '', 'N', 'N', 140, 'SEROLOGY'),
(3684, 'CONJUNCTIVAL SWAB CULTURE ', 'MB024', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 141, 'MICROBIOLOGY'),
(3685, 'CONJUNCTIVAL SWAB CULTURE & ABST  ', 'MB025', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 142, 'MICROBIOLOGY'),
(3686, 'COW'' S MILK SPECIFIC  lgE', 'SR018', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 148, 'SEROLOGY'),
(3687, 'C-PEPTIDE', 'BC035', '', '', '', '', '', '', '', 3760.00, '', '', '', '', 'N', 'N', 99, 'BIOCHEMISTRY'),
(3688, 'CPK ', 'BC024', '', '', '', '', '', '', '', 470.00, '', '', '', '', 'N', 'N', 149, 'BIOCHEMISTRY'),
(3689, 'CPK - MB ', 'BC023', '', '', '', '', '', '', '', 1010.00, '', '', '', '', 'N', 'N', 150, 'BIOCHEMISTRY'),
(3690, 'C-REACTIVE PROTEIN   (CRP) ', 'SR019', '', '', '', '', '', '', '', 490.00, '', '', '', '', 'N', 'N', 101, 'SEROLOGY'),
(3691, 'C-REACTIVE PROTEIN ULTRA SENSITIVE ', 'SR020', '', '', '', '', '', '', '', 1080.00, '', '', '', '', 'N', 'N', 102, 'SEROLOGY'),
(3692, 'CREATININE - SERUM', 'BC039', '', '', '', '', '', '', '', 310.00, '', '', '', '', 'N', 'N', 151, 'BIOCHEMISTRY'),
(3693, 'CREATININE - URINE ', 'BC040', '', '', '', '', '', '', '', 380.00, '', '', '', '', 'N', 'N', 152, 'BIOCHEMISTRY'),
(3694, 'CREATININE CLEARANCE ', 'BC038', '', '', '', '', '', '', '', 850.00, '', '', '', '', 'N', 'N', 153, 'BIOCHEMISTRY'),
(3695, 'CREATININE WITH ESTIMATED GFR ', 'BC165', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 155, 'BIOCHEMISTRY'),
(3696, 'CRYOGLOBULIN ', 'HM051', '', '', '', '', '', '', '', 950.00, '', '', '', '', 'N', 'N', 156, 'HAEMATOLOGY'),
(3697, 'CSF - ELECTROLYTES ', 'BC041', '', '', '', '', '', '', '', 520.00, '', '', '', '', 'N', 'N', 157, 'BIOCHEMISTRY'),
(3698, 'CSF - PROTEIN ', 'BC042', '', '', '', '', '', '', '', 500.00, '', '', '', '', 'N', 'N', 158, 'BIOCHEMISTRY'),
(3699, 'CSF - SUGAR', 'BC043', '', '', '', '', '', '', '', 260.00, '', '', '', '', 'N', 'N', 159, 'BIOCHEMISTRY'),
(3700, 'CSF CULTURE ', 'MB016', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 160, 'MICROBIOLOGY'),
(3701, 'CSF CULTURE & ABST     ', 'MB017', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 162, 'MICROBIOLOGY'),
(3702, 'CULTURE  (OTHERS) ', 'MB026', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 163, 'MICROBIOLOGY'),
(3703, 'CULTURE & ABST  (OTHERS)    ', 'MB027', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 164, 'MICROBIOLOGY'),
(3704, 'CVP TIP FOR CULTURE ', 'MB018', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 165, 'MICROBIOLOGY'),
(3705, 'CVP TIP FOR CULTURE & ABST    ', 'MB019', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 166, 'MICROBIOLOGY'),
(3706, 'CYCLOSPORINE ', 'TD001', '', '', '', '', '', '', '', 5230.00, '', '', '', '', 'N', 'N', 167, 'THERAPEUTIC DRUGS ASSAY'),
(3707, 'CYTOLOGY ', 'HS009', '', '', '', '', '', '', '', 1380.00, '', '', '', '', 'N', 'N', 168, 'HISTOLOGY'),
(3708, 'CYTOMEGALO VIRUS /CMV PCR', 'MO015', '', '', '', '', '', '', '', 3930.00, '', '', '', '', 'N', 'N', 169, 'MOLECULAR DIAGNOSTICS'),
(3709, 'CYTOMEGALO VIRUS ANTIBODY   (lgG & lgM) ', 'SR021', '', '', '', '', '', '', '', 2500.00, '', '', '', '', 'N', 'N', 170, 'SEROLOGY'),
(3710, 'CYTOMEGALO VIRUS lgG ANTIBODY ', 'SR023', '', '', '', '', '', '', '', 1250.00, '', '', '', '', 'N', 'N', 171, 'SEROLOGY'),
(3711, 'CYTOMEGALO VIRUS lgM ANTIBODY ', 'SR022', '', '', '', '', '', '', '', 1250.00, '', '', '', '', 'N', 'N', 172, 'SEROLOGY'),
(3712, 'DENGUE RT - PCR ', 'MO017', '', '', '', '', '', '', '', 3570.00, '', '', '', '', 'N', 'N', 176, 'MOLECULAR DIAGNOSTICS'),
(3713, 'DENGUE RT - PCR & SEROTYPING ', 'MO028', '', '', '', '', '', '', '', 7550.00, '', '', '', '', 'N', 'N', 177, 'MOLECULAR DIAGNOSTICS'),
(3714, 'DHEA - S', 'BC044', '', '', '', '', '', '', '', 2300.00, '', '', '', '', 'N', 'N', 178, 'BIOCHEMISTRY'),
(3715, 'DIRECT COOMBS''', 'HM025', '', '', '', '', '', '', '', 370.00, '', '', '', '', 'N', 'N', 179, 'HAEMATOLOGY'),
(3716, 'DOG HAIR SPECIFIC lgE ', 'SR025', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 180, 'SEROLOGY'),
(3717, 'E.B.  VIRUS (lgM) ANTIBODY', 'MB030', '', '', '', '', '', '', '', 2700.00, '', '', '', '', 'N', 'N', 185, 'MICROBIOLOGY'),
(3718, 'EAR SWAB CULTURE ', 'MB028', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 187, 'MICROBIOLOGY'),
(3719, 'EAR SWAB CULTURE & ABST   ', 'MB029', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 188, 'MICROBIOLOGY'),
(3720, 'ELECTROLYTES - SERUM ', 'BC045', '', '', '', '', '', '', '', 630.00, '', '', '', '', 'N', 'N', 190, 'BIOCHEMISTRY'),
(3721, 'ELECTROLYTES - URINE ', 'BC046', '', '', '', '', '', '', '', 630.00, '', '', '', '', 'N', 'N', 191, 'BIOCHEMISTRY'),
(3722, 'ENDOSCOPY BIOPSY 1 SAMPLE', 'HS010', '', '', '', '', '', '', '', 2310.00, '', '', '', '', 'N', 'N', 195, 'HISTOLOGY'),
(3723, 'ENDOSCOPY BIOPSY 10 SAMPLES ', 'HS015', '', '', '', '', '', '', '', 8140.00, '', '', '', '', 'N', 'N', 196, 'HISTOLOGY'),
(3724, 'ENDOSCOPY BIOPSY 2 SAMPLE ', 'HS011', '', '', '', '', '', '', '', 3280.00, '', '', '', '', 'N', 'N', 197, 'HISTOLOGY'),
(3725, 'ENDOSCOPY BIOPSY 3-4 SAMPLES ', 'HS012', '', '', '', '', '', '', '', 4260.00, '', '', '', '', 'N', 'N', 198, 'HISTOLOGY'),
(3726, 'ENDOSCOPY BIOPSY 5-7 SAMPLES ', 'HS013', '', '', '', '', '', '', '', 4910.00, '', '', '', '', 'N', 'N', 199, 'HISTOLOGY'),
(3727, 'ENDOSCOPY BIOPSY 8-9 SAMPLES ', 'HS014', '', '', '', '', '', '', '', 6530.00, '', '', '', '', 'N', 'N', 200, 'HISTOLOGY'),
(3728, 'ENDOTRACHEAL SECRETION CULTURE', 'MB031', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 201, 'MICROBIOLOGY'),
(3729, 'ENDOTRACHEAL SECRETION CULTURE & ABST    ', 'MB032', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 202, 'MICROBIOLOGY'),
(3730, 'ER ', 'HS016', '', '', '', '', '', '', '', 4310.00, '', '', '', '', 'N', 'N', 203, 'HISTOLOGY'),
(3731, 'ER - PR - HER 2   (Please Inquire) ', 'HS030', '', '', '', '', '', '', '', 17360.00, '', '', '', '', 'N', 'N', 204, 'HISTOLOGY'),
(3732, 'ERYTHROCYTE SEDIMENTATION RATE   (ESR) ', 'HM013', '', '', '', '', '', '', '', 200.00, '', '', '', '', 'N', 'N', 205, 'HAEMATOLOGY'),
(3733, 'ERYTHROPOIETIN ', 'BC049', '', '', '', '', '', '', '', 5780.00, '', '', '', '', 'N', 'N', 206, 'BIOCHEMISTRY'),
(3734, 'ESTRADIOL ', 'BC050', '', '', '', '', '', '', '', 1960.00, '', '', '', '', 'N', 'N', 207, 'BIOCHEMISTRY'),
(3735, 'EYE SWAB CULTURE ', 'MB033', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 209, 'MICROBIOLOGY'),
(3736, 'EYE SWAB CULTURE & ABST     ', 'MB034', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 210, 'MICROBIOLOGY'),
(3737, 'FIBRINOGEN ', 'HM014', '', '', '', '', '', '', '', 670.00, '', '', '', '', 'N', 'N', 215, 'HAEMATOLOGY'),
(3738, 'FILARIAL ANTIBODY TEST (FAT) ', 'SR027', '', '', '', '', '', '', '', 360.00, '', '', '', '', 'N', 'N', 217, 'SEROLOGY'),
(3739, 'FILARIAL ANTIGEN TEST ', 'HM015', '', '', '', '', '', '', '', 1490.00, '', '', '', '', 'N', 'N', 218, 'HAEMATOLOGY'),
(3740, 'FLUID FOR CELL COUNT ', 'HM016', '', '', '', '', '', '', '', 340.00, '', '', '', '', 'N', 'N', 219, 'HAEMATOLOGY'),
(3741, 'FLUID FOR FULL REPORT', 'GP003', '', '', '', '', '', '', '', 900.00, '', '', '', '', 'N', 'N', 220, 'GENERAL PATHOLOGY'),
(3742, 'FLUID FOR RHEUMATOID FACTOR  ', 'SR028', '', '', '', '', '', '', '', 390.00, '', '', '', '', 'N', 'N', 221, 'SEROLOGY'),
(3743, 'FNA', 'HS018', '', '', '', '', '', '', '', 2400.00, '', '', '', '', 'N', 'N', 222, 'HISTOLOGY'),
(3744, 'FNA - BOTH SIDES/2SPOTS', 'HS017', '', '', '', '', '', '', '', 4810.00, '', '', '', '', 'N', 'N', 223, 'HISTOLOGY'),
(3745, 'FNAB  (Slide Sent)', 'HS019', '', '', '', '', '', '', '', 1310.00, '', '', '', '', 'N', 'N', 224, 'HISTOLOGY'),
(3746, 'FOETAL HAEMOGLOBIN   (HbF) ', 'HM017', '', '', '', '', '', '', '', 1520.00, '', '', '', '', 'N', 'N', 225, 'HAEMATOLOGY'),
(3747, 'FOLATE', 'BC053', '', '', '', '', '', '', '', 4140.00, '', '', '', '', 'N', 'N', 226, 'BIOCHEMISTRY'),
(3748, 'FREE P S A', 'TM006', '', '', '', '', '', '', '', 4480.00, '', '', '', '', 'N', 'N', 227, 'TUMOUR MARKERS'),
(3749, 'FREE TESTOSTERONE', 'BC056', '', '', '', '', '', '', '', 3470.00, '', '', '', '', 'N', 'N', 228, 'BIOCHEMISTRY'),
(3750, 'FREE T3', 'BC054', '', '', '', '', '', '', '', 1130.00, '', '', '', '', 'N', 'N', 229, 'BIOCHEMISTRY'),
(3751, 'FREE T4', 'BC055', '', '', '', '', '', '', '', 1130.00, '', '', '', '', 'N', 'N', 230, 'BIOCHEMISTRY'),
(3752, 'FROZEN SECTIONS HISTOLOGY ', 'HS020', '', '', '', '', '', '', '', 6160.00, '', '', '', '', 'N', 'N', 231, 'HISTOLOGY'),
(3753, 'FRUCTOSAMINE', 'BC057', '', '', '', '', '', '', '', 580.00, '', '', '', '', 'N', 'N', 232, 'BIOCHEMISTRY'),
(3754, 'FSH  (FOLLICULAR STIMULATING HORMONE )', 'BC051', '', '', '', '', '', '', '', 1360.00, '', '', '', '', 'N', 'N', 233, 'BIOCHEMISTRY'),
(3755, 'FSH/LH/PRL', 'BC058', '', '', '', '', '', '', '', 4160.00, '', '', '', '', 'N', 'N', 234, 'BIOCHEMISTRY'),
(3756, 'FULL BLOOD REPORT WITH ABSOLUTE VALUE ', 'HM018', '', '', '', '', '', '', '', 410.00, '', '', '', '', 'N', 'N', 236, 'HAEMATOLOGY'),
(3757, 'FUNGAL CULTURE ', 'MB035', '', '', '', '', '', '', '', 420.00, '', '', '', '', 'N', 'N', 237, 'MICROBIOLOGY'),
(3758, 'GENITAL ULCER SWAB CULTURE ', 'MB040', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 241, 'MICROBIOLOGY'),
(3759, 'GENITAL ULCER SWAB CULTURE & ABST     ', 'MB041', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 242, 'MICROBIOLOGY'),
(3760, 'GENOMIC DNA EXTRACTION FORM BLOOD ', 'MO035', '', '', '', '', '', '', '', 1180.00, '', '', '', '', 'N', 'N', 243, 'MOLECULAR DIAGNOSTICS'),
(3761, 'GLUCOSE - 1 1/2 H AFTER 75G', 'BC066', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 245, 'BIOCHEMISTRY'),
(3762, 'GLUCOSE - 1 H AFTER 100G', 'BC064', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 246, 'BIOCHEMISTRY'),
(3763, 'GLUCOSE - 1 H AFTER 75G', 'BC065', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 247, 'BIOCHEMISTRY'),
(3764, 'GLUCOSE - 1/2 H AFTER 75G ', 'BC067', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 248, 'BIOCHEMISTRY'),
(3765, 'GLUCOSE - 2 H AFTER 100G', 'BC068', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 249, 'BIOCHEMISTRY'),
(3766, 'GLUCOSE - 2 H AFTER 75G', 'BC069', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 250, 'BIOCHEMISTRY'),
(3767, 'GLUCOSE - 3 H AFTER 100G', 'BC070', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 251, 'BIOCHEMISTRY'),
(3768, 'GLUCOSE - 3 H AFTER 75G', 'BC071', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 252, 'BIOCHEMISTRY'),
(3769, 'GLUCOSE - 4 H AFTER 100G', 'BC072', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 253, 'BIOCHEMISTRY'),
(3770, 'GLUCOSE - 6 PHOSPHATE DEHYDROG  (G6PD) ', 'BC081', '', '', '', '', '', '', '', 1660.00, '', '', '', '', 'N', 'N', 254, 'BIOCHEMISTRY'),
(3771, 'GLUCOSE - FASTING  ', 'BC074', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 255, 'BIOCHEMISTRY'),
(3772, 'GLUCOSE - FASTING  (GLUCOMETER)', 'BC073', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 256, 'BIOCHEMISTRY'),
(3773, 'GLUCOSE - POST PRANDIAL ', 'BC076', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 257, 'BIOCHEMISTRY'),
(3774, 'GLUCOSE - POST PRANDIAL  (GLUCOMETER)', 'BC075', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 258, 'BIOCHEMISTRY'),
(3775, 'GLUCOSE - RANDOM', 'BC078', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 259, 'BIOCHEMISTRY'),
(3776, 'GLUCOSE - RANDOM  (GLUCOMETER) ', 'BC077', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 260, 'BIOCHEMISTRY'),
(3777, 'GLUCOSE - TOLERANCE TEST (100G)', 'BC079', '', '', '', '', '', '', '', 1410.00, '', '', '', '', 'N', 'N', 261, 'BIOCHEMISTRY'),
(3778, 'GLUCOSE - TOLERANCE TEST (75G) ', 'BC080', '', '', '', '', '', '', '', 1410.00, '', '', '', '', 'N', 'N', 262, 'BIOCHEMISTRY'),
(3779, 'GLYCOHAEMOGLOBIN (HbA1C) HPLC Method', 'BC082', '', '', '', '', '', '', '', 1220.00, '', '', '', '', 'N', 'N', 266, 'BIOCHEMISTRY'),
(3780, 'GLYCOHAEMOGLOBIN (HbA1C) Turbidimetric Method ', 'BC166', '', '', '', '', '', '', '', 880.00, '', '', '', '', 'N', 'N', 267, 'BIOCHEMISTRY'),
(3781, 'GRAM STAIN ', 'MB039', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 268, 'MICROBIOLOGY'),
(3782, 'GRASS MIXTURE SPECIFIC lgE ', 'SR029', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 269, 'SEROLOGY'),
(3783, 'GROIN SWAB CULTURE ', 'MB042', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 270, 'MICROBIOLOGY'),
(3784, 'GROWTH HORMONE ', 'BC083', '', '', '', '', '', '', '', 1330.00, '', '', '', '', 'N', 'N', 272, 'BIOCHEMISTRY'),
(3785, 'H.I.V.  1 & 2', 'SR047', '', '', '', '', '', '', '', 1310.00, '', '', '', '', 'N', 'N', 273, 'SEROLOGY'),
(3786, 'HAEMOGLOBIN ', 'HM020', '', '', '', '', '', '', '', 290.00, '', '', '', '', 'N', 'N', 275, 'HAEMATOLOGY'),
(3787, 'HAEMOGLOBIN - A2   (HbA2) ', 'HM021', '', '', '', '', '', '', '', 2000.00, '', '', '', '', 'N', 'N', 276, 'HAEMATOLOGY'),
(3788, 'HAEMOGLOBIN ELECTROPHORESIS', 'HM022', '', '', '', '', '', '', '', 3010.00, '', '', '', '', 'N', 'N', 277, 'HAEMATOLOGY'),
(3789, 'HAMOCYSTEINE ', 'BC085', '', '', '', '', '', '', '', 2920.00, '', '', '', '', 'N', 'N', 279, 'BIOCHEMISTRY'),
(3790, 'HAM''S TEST   (Please Inquire) ', 'HM023', '', '', '', '', '', '', '', 1310.00, '', '', '', '', 'N', 'N', 278, 'HAEMATOLOGY'),
(3791, 'HBV PCR & GENOTYPING ', 'MO030', '', '', '', '', '', '', '', 5920.00, '', '', '', '', 'N', 'N', 284, 'MOLECULAR DIAGNOSTICS'),
(3792, 'HBV QUANTITATIVE PCR ', 'MO012', '', '', '', '', '', '', '', 7520.00, '', '', '', '', 'N', 'N', 285, 'MOLECULAR DIAGNOSTICS'),
(3793, 'HCV QUANTITATIVE PCR ', 'MO014', '', '', '', '', '', '', '', 7520.00, '', '', '', '', 'N', 'N', 286, 'MOLECULAR DIAGNOSTICS'),
(3794, 'HCV RT - PCR & GENOTYPING ', 'MO029', '', '', '', '', '', '', '', 7810.00, '', '', '', '', 'N', 'N', 287, 'MOLECULAR DIAGNOSTICS'),
(3795, 'HELICOBACTER PYLORI ANTIBODY TEST ', 'MB044', '', '', '', '', '', '', '', 1860.00, '', '', '', '', 'N', 'N', 290, 'MICROBIOLOGY'),
(3796, 'HEPATITIS - A lgG ANTIBODY ', 'SR031', '', '', '', '', '', '', '', 1410.00, '', '', '', '', 'N', 'N', 295, 'SEROLOGY'),
(3797, 'HEPATITIS - A lgM & lgG ANTIBODY ', 'SR030', '', '', '', '', '', '', '', 2830.00, '', '', '', '', 'N', 'N', 296, 'SEROLOGY'),
(3798, 'HEPATITIS - A lgM ANTIBODY ', 'SR032', '', '', '', '', '', '', '', 1410.00, '', '', '', '', 'N', 'N', 297, 'SEROLOGY'),
(3799, 'HEPATITIS - B   PROFILE ', 'SR038', '', '', '', '', '', '', '', 6010.00, '', '', '', '', 'N', 'N', 298, 'SEROLOGY'),
(3800, 'HEPATITIS - B CORE lgM ANTIBODY  ', 'SR033', '', '', '', '', '', '', '', 1410.00, '', '', '', '', 'N', 'N', 301, 'SEROLOGY'),
(3801, 'HEPATITIS - B Core/Total ANTIBODY ', 'SR034', '', '', '', '', '', '', '', 1270.00, '', '', '', '', 'N', 'N', 302, 'SEROLOGY'),
(3802, 'HEPATITIS - B SURFACE ANTIBODY  (Anti HBsAb) ', 'SR039', '', '', '', '', '', '', '', 3270.00, '', '', '', '', 'N', 'N', 303, 'SEROLOGY'),
(3803, 'HEPATITIS - B SURFACE ANTIGEN  (HBsAg) ', 'SR037', '', '', '', '', '', '', '', 650.00, '', '', '', '', 'N', 'N', 304, 'SEROLOGY'),
(3804, 'HEPATITIS - C ANTIBODY ', 'SR040', '', '', '', '', '', '', '', 1910.00, '', '', '', '', 'N', 'N', 305, 'SEROLOGY'),
(3805, 'HEPATITIS B VIRUS/ HBV PCR ', 'MO011', '', '', '', '', '', '', '', 5490.00, '', '', '', '', 'N', 'N', 307, 'MOLECULAR DIAGNOSTICS'),
(3806, 'HEPATITIS C VIRUS / HCV RT - PCR', 'MO013', '', '', '', '', '', '', '', 5720.00, '', '', '', '', 'N', 'N', 308, 'MOLECULAR DIAGNOSTICS'),
(3807, 'HEPATITIS PROFILE A B C ', 'SR041', '', '', '', '', '', '', '', 6780.00, '', '', '', '', 'N', 'N', 309, 'SEROLOGY'),
(3808, 'HER 2', 'HS021', '', '', '', '', '', '', '', 5210.00, '', '', '', '', 'N', 'N', 310, 'HISTOLOGY'),
(3809, 'HERPES SIMPLEX VIRUS HSV I/II PCR - BLOOD ', 'MO020', '', '', '', '', '', '', '', 5920.00, '', '', '', '', 'N', 'N', 315, 'MOLECULAR DIAGNOSTICS'),
(3810, 'HERPES SIMPLEX VIRUS HSV I/II PCR - CSF', 'MO019', '', '', '', '', '', '', '', 5260.00, '', '', '', '', 'N', 'N', 316, 'MOLECULAR DIAGNOSTICS'),
(3811, 'HIGH VAGINAL SWAB CULTURE ', 'MB045', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 317, 'MICROBIOLOGY'),
(3812, 'HIGH VAGINAL SWAB CULTURE & ABST    ', 'MB046', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 318, 'MICROBIOLOGY'),
(3813, 'HIGH VAGINAL SWAB FULL REPORT ', 'MB047', '', '', '', '', '', '', '', 470.00, '', '', '', '', 'N', 'N', 319, 'MICROBIOLOGY'),
(3814, 'HISTO LARGE SAMPLE ', 'HS022', '', '', '', '', '', '', '', 5680.00, '', '', '', '', 'N', 'N', 320, 'HISTOLOGY'),
(3815, 'HISTO MEDIUM 1 SAMPLE ', 'HS023', '', '', '', '', '', '', '', 3790.00, '', '', '', '', 'N', 'N', 321, 'HISTOLOGY'),
(3816, 'HISTO MEDIUM 2 SAMPLES', 'HS024', '', '', '', '', '', '', '', 7070.00, '', '', '', '', 'N', 'N', 322, 'HISTOLOGY'),
(3817, 'HISTO MEDIUM 3 SAMPLES ', 'HS025', '', '', '', '', '', '', '', 10390.00, '', '', '', '', 'N', 'N', 323, 'HISTOLOGY'),
(3818, 'HISTO VERY LARGE SAMPLE ', 'HS026', '', '', '', '', '', '', '', 7570.00, '', '', '', '', 'N', 'N', 324, 'HISTOLOGY'),
(3819, 'HISTOLOGY - SLIDE SENT ', 'HS027', '', '', '', '', '', '', '', 1800.00, '', '', '', '', 'N', 'N', 325, 'HISTOLOGY'),
(3820, 'HISTOLOGY 1  (SMALL)', 'HS001', '', '', '', '', '', '', '', 2400.00, '', '', '', '', 'N', 'N', 326, 'HISTOLOGY'),
(3821, 'HISTOLOGY 2 (SMALL)', 'HS002', '', '', '', '', '', '', '', 2950.00, '', '', '', '', 'N', 'N', 327, 'HISTOLOGY'),
(3822, 'HISTOLOGY 3 (SMALL)', 'HS003', '', '', '', '', '', '', '', 4260.00, '', '', '', '', 'N', 'N', 328, 'HISTOLOGY'),
(3823, 'HISTOLOGY 4 (SMALL)', 'HS004', '', '', '', '', '', '', '', 5460.00, '', '', '', '', 'N', 'N', 329, 'HISTOLOGY'),
(3825, 'HISTOLOGY 6 (SMALL) ', 'HS006', '', '', '', '', '', '', '', 7820.00, '', '', '', '', 'N', 'N', 331, 'HISTOLOGY'),
(3827, 'HIV QUANTITATIVE PCR ', 'MO023', '', '', '', '', '', '', '', 12380.00, '', '', '', '', 'N', 'N', 333, 'MOLECULAR DIAGNOSTICS'),
(3828, 'HOUSE DUST MITE SPECIFIC lgE ', 'SR048', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 335, 'SEROLOGY'),
(3829, 'HPLC  (HBA?, HBF, Hb Electrophoresis )', 'HM049', '', '', '', '', '', '', '', 2740.00, '', '', '', '', 'N', 'N', 336, 'HAEMATOLOGY'),
(3830, 'HSV I & II - CSF ', 'MO021', '', '', '', '', '', '', '', 7460.00, '', '', '', '', 'N', 'N', 337, 'MOLECULAR DIAGNOSTICS'),
(3831, 'HUMAN IMMUNODEFICIENCY VIRUS / HIV DNA - PCR', 'MO024', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 338, 'MOLECULAR DIAGNOSTICS'),
(3832, 'HUMAN IMMUNODEFICIENCY VIRUS / HIV RT - PCR ', 'MO022', '', '', '', '', '', '', '', 9940.00, '', '', '', '', 'N', 'N', 339, 'MOLECULAR DIAGNOSTICS'),
(3833, 'HYDROXY BUTYRYL DEHYDROGENASE  (HBDH) ', 'BC084', '', '', '', '', '', '', '', 390.00, '', '', '', '', 'N', 'N', 340, 'BIOCHEMISTRY'),
(3834, 'IMMUNOGLOBULIN - A  (lgA)', 'BC089', '', '', '', '', '', '', '', 1690.00, '', '', '', '', 'N', 'N', 342, 'BIOCHEMISTRY'),
(3835, 'IMMUNOGLOBULIN - G  (lgG) ', 'BC090', '', '', '', '', '', '', '', 1690.00, '', '', '', '', 'N', 'N', 343, 'BIOCHEMISTRY'),
(3836, 'IMMUNOGLOBULIN - M (lgM) ', 'BC091', '', '', '', '', '', '', '', 1690.00, '', '', '', '', 'N', 'N', 344, 'BIOCHEMISTRY'),
(3837, 'IMMUNOGLOBULIN PROFILE   (lgA, lgG, lgM)', 'BC121', '', '', '', '', '', '', '', 5070.00, '', '', '', '', 'N', 'N', 345, 'BIOCHEMISTRY'),
(3838, 'INDIRECT COOMBS''', 'HM024', '', '', '', '', '', '', '', 660.00, '', '', '', '', 'N', 'N', 346, 'HAEMATOLOGY'),
(3839, 'INFLUENZA A & B ', 'MB104', '', '', '', '', '', '', '', 1600.00, '', '', '', '', 'N', 'N', 347, 'MICROBIOLOGY'),
(3840, 'INSULIN', 'BC087', '', '', '', '', '', '', '', 2480.00, '', '', '', '', 'N', 'N', 348, 'BIOCHEMISTRY'),
(3841, 'IONIZED CALCIUM ', 'BC088', '', '', '', '', '', '', '', 420.00, '', '', '', '', 'N', 'N', 351, 'BIOCHEMISTRY'),
(3842, 'IRON ', 'BC092', '', '', '', '', '', '', '', 620.00, '', '', '', '', 'N', 'N', 352, 'BIOCHEMISTRY'),
(3843, 'L.E. CELLS ', 'HM026', '', '', '', '', '', '', '', 590.00, '', '', '', '', 'N', 'N', 359, 'HAEMATOLOGY'),
(3844, 'La  (SSb)', 'SR051', '', '', '', '', '', '', '', 1790.00, '', '', '', '', 'N', 'N', 361, 'SEROLOGY'),
(3845, 'LACTATE DEHYDROGENASE  (LDH) ', 'BC094', '', '', '', '', '', '', '', 510.00, '', '', '', '', 'N', 'N', 362, 'BIOCHEMISTRY'),
(3846, 'LEISHMANIA PCR ', 'MO027', '', '', '', '', '', '', '', 3390.00, '', '', '', '', 'N', 'N', 363, 'MOLECULAR DIAGNOSTICS'),
(3847, 'LEPTOSPIRA ANTIBODY - SERUM ', 'SR052', '', '', '', '', '', '', '', 3490.00, '', '', '', '', 'N', 'N', 364, 'SEROLOGY'),
(3848, 'LEPTOSPIRA ANTIBODY - URINE ', 'SR053', '', '', '', '', '', '', '', 3490.00, '', '', '', '', 'N', 'N', 365, 'SEROLOGY'),
(3849, 'lgE LEVEL ', 'SR049', '', '', '', '', '', '', '', 3730.00, '', '', '', '', 'N', 'N', 366, 'SEROLOGY'),
(3850, 'LIPASE ', 'BC095', '', '', '', '', '', '', '', 1130.00, '', '', '', '', 'N', 'N', 368, 'BIOCHEMISTRY'),
(3851, 'LITHIUM ', 'TD002', '', '', '', '', '', '', '', 1130.00, '', '', '', '', 'N', 'N', 370, 'THERAPEUTIC DRUGS ASSAY'),
(3852, 'LIVER KIDNEY MICROSOME ANTIBODY ', 'SR054', '', '', '', '', '', '', '', 4770.00, '', '', '', '', 'N', 'N', 372, 'SEROLOGY'),
(3853, 'LUPUS ANTICOAGULANT ', 'HM027', '', '', '', '', '', '', '', 5930.00, '', '', '', '', 'N', 'N', 374, 'HAEMATOLOGY'),
(3854, 'MAGNESIUM - SERUM', 'BC097', '', '', '', '', '', '', '', 560.00, '', '', '', '', 'N', 'N', 375, 'BIOCHEMISTRY'),
(3855, 'MAGNESIUM - URINE ', 'BC098', '', '', '', '', '', '', '', 560.00, '', '', '', '', 'N', 'N', 376, 'BIOCHEMISTRY'),
(3856, 'MALARIA PARASITE - FILM ', 'HM030', '', '', '', '', '', '', '', 230.00, '', '', '', '', 'N', 'N', 377, 'HAEMATOLOGY'),
(3857, 'MALARIA PARASITE FALCIPARUM ANTIGEN', 'HM028', '', '', '', '', '', '', '', 1130.00, '', '', '', '', 'N', 'N', 378, 'HAEMATOLOGY'),
(3858, 'MALARIA PARASITE P.  VIVAX ANTIGEN ', 'HM029', '', '', '', '', '', '', '', 1130.00, '', '', '', '', 'N', 'N', 379, 'HAEMATOLOGY'),
(3859, 'MALARIA PCR  (SPECIES SPECIFIC) P. Vivax/P. Falciparum', 'MO026', '', '', '', '', '', '', '', 3810.00, '', '', '', '', 'N', 'N', 380, 'MOLECULAR DIAGNOSTICS'),
(3860, 'MALARIAL PARASITE THICK & THIN FILM ', 'HM031', '', '', '', '', '', '', '', 450.00, '', '', '', '', 'N', 'N', 381, 'HAEMATOLOGY'),
(3861, 'MICRO FILARIA - FILM   (Please inquire) ', 'HM032', '', '', '', '', '', '', '', 230.00, '', '', '', '', 'N', 'N', 386, 'HAEMATOLOGY'),
(3862, 'MOULD MIX  lgE', 'SR056', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 389, 'SEROLOGY'),
(3863, 'MYCOPLASMA ANTIBODY ', 'SR057', '', '', '', '', '', '', '', 1460.00, '', '', '', '', 'N', 'N', 390, 'SEROLOGY'),
(3864, 'MYOGLOBIN - SERUM ', 'BC100', '', '', '', '', '', '', '', 2110.00, '', '', '', '', 'N', 'N', 391, 'BIOCHEMISTRY'),
(3865, 'MYOGLOBIN - URINE ', 'BC101', '', '', '', '', '', '', '', 2110.00, '', '', '', '', 'N', 'N', 392, 'BIOCHEMISTRY'),
(3866, 'PALM SWAB CULTURE ', 'MB058', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 410, 'MICROBIOLOGY'),
(3867, 'PALM SWAB CULTURE & ABST   ', 'MB059', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 411, 'MICROBIOLOGY'),
(3868, 'PAP SMEAR ', 'HS028', '', '', '', '', '', '', '', 1380.00, '', '', '', '', 'N', 'N', 412, 'HISTOLOGY'),
(3869, 'PARATHYROID HORMONE ', 'BC105', '', '', '', '', '', '', '', 4810.00, '', '', '', '', 'N', 'N', 413, 'BIOCHEMISTRY'),
(3870, 'PERITONEAL ASPIRATION FLUID CULTURE ', 'MB060', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 415, 'MICROBIOLOGY'),
(3871, 'PERITONEAL ASPIRATION FLUID CULTURE & ABST   ', 'MB061', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 416, 'MICROBIOLOGY'),
(3872, 'PERITONEAL FLUID FULL REPORT ', 'GP004', '', '', '', '', '', '', '', 900.00, '', '', '', '', 'N', 'N', 417, 'GENERAL PATHOLOGY'),
(3873, 'PHOSPHORUS INORGANIC - URINE ', 'BC107', '', '', '', '', '', '', '', 410.00, '', '', '', '', 'N', 'N', 420, 'BIOCHEMISTRY'),
(3874, 'PLEURAL FLUID CELLS', 'MB062', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 423, 'MICROBIOLOGY'),
(3875, 'PLEURAL FLUID CULTURE ', 'MB063', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 424, 'MICROBIOLOGY'),
(3876, 'PLEURAL FLUID CULTURE & ABST     ', 'MB064', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 425, 'MICROBIOLOGY'),
(3877, 'PLEURAL FLUID FULL REPORT', 'GP005', '', '', '', '', '', '', '', 900.00, '', '', '', '', 'N', 'N', 426, 'GENERAL PATHOLOGY'),
(3878, 'PLEURAL FLUID PROTEIN ', 'BC123', '', '', '', '', '', '', '', 510.00, '', '', '', '', 'N', 'N', 427, 'BIOCHEMISTRY'),
(3879, 'PML - RARA : t (15:17) ', 'MO033', '', '', '', '', '', '', '', 6380.00, '', '', '', '', 'N', 'N', 428, 'MOLECULAR DIAGNOSTICS'),
(3880, 'POST PRANDIAL URINE SUGAR ', 'GP006', '', '', '', '', '', '', '', 150.00, '', '', '', '', 'N', 'N', 429, 'GENERAL PATHOLOGY'),
(3881, 'POTASSIUM - SERUM ', 'BC108', '', '', '', '', '', '', '', 470.00, '', '', '', '', 'N', 'N', 430, 'BIOCHEMISTRY'),
(3882, 'POTASSIUM - URINE ', 'BC109', '', '', '', '', '', '', '', 470.00, '', '', '', '', 'N', 'N', 431, 'BIOCHEMISTRY'),
(3883, 'PR  (PROGESTERONE RECEPTOR) ', 'HS029', '', '', '', '', '', '', '', 5210.00, '', '', '', '', 'N', 'N', 435, 'HISTOLOGY'),
(3884, 'PRAWN SPECIFIC lgE', 'SR059', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 436, 'SEROLOGY'),
(3885, 'PREGNANCY TEST - BLOOD  (Method Elisa) ', 'GP009', '', '', '', '', '', '', '', 630.00, '', '', '', '', 'N', 'N', 438, 'GENERAL PATHOLOGY'),
(3886, 'PREGNANCY TEST - IN DILUTIONS - URINE ', 'GP008', '', '', '', '', '', '', '', 960.00, '', '', '', '', 'N', 'N', 439, 'GENERAL PATHOLOGY'),
(3887, 'PREGNANCY TEST - URINE ', 'GP007', '', '', '', '', '', '', '', 340.00, '', '', '', '', 'N', 'N', 440, 'GENERAL PATHOLOGY'),
(3888, 'PREGNANCY TEST - URINE   (Method Elisa) ', 'GP010', '', '', '', '', '', '', '', 570.00, '', '', '', '', 'N', 'N', 441, 'GENERAL PATHOLOGY'),
(3889, 'PROFILE BONE ', 'BC110', '', '', '', '', '', '', '', 1890.00, '', '', '', '', 'N', 'N', 442, 'BIOCHEMISTRY'),
(3890, 'PROFILE CARDIAC ', 'BC111', '', '', '', '', '', '', '', 2710.00, '', '', '', '', 'N', 'N', 443, 'BIOCHEMISTRY'),
(3891, 'PROFILE LIPID ', 'BC112', '', '', '', '', '', '', '', 980.00, '', '', '', '', 'N', 'N', 444, 'BIOCHEMISTRY'),
(3892, 'PROFILE LIVER ', 'BC113', '', '', '', '', '', '', '', 1930.00, '', '', '', '', 'N', 'N', 445, 'BIOCHEMISTRY'),
(3893, 'PROFILE RENAL ', 'BC114', '', '', '', '', '', '', '', 2390.00, '', '', '', '', 'N', 'N', 446, 'BIOCHEMISTRY'),
(3894, 'PROFILE THYROID ', 'BC115', '', '', '', '', '', '', '', 2980.00, '', '', '', '', 'N', 'N', 447, 'BIOCHEMISTRY'),
(3895, 'PROTEIN & IMMUNOGLOBULIN ELECTROPHORESIS ', 'BC120', '', '', '', '', '', '', '', 12550.00, '', '', '', '', 'N', 'N', 450, 'BIOCHEMISTRY'),
(3896, 'PROTEIN C ', 'BC118', '', '', '', '', '', '', '', 7950.00, '', '', '', '', 'N', 'N', 451, 'BIOCHEMISTRY'),
(3897, 'PROTEIN S ', 'BC119', '', '', '', '', '', '', '', 7950.00, '', '', '', '', 'N', 'N', 452, 'BIOCHEMISTRY'),
(3898, 'PUS CULTURE ', 'MB065', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 455, 'MICROBIOLOGY'),
(3899, 'PUS CULTURE & ABST   ', 'MB066', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 456, 'MICROBIOLOGY'),
(3900, 'TB ANTIBODY   (MYCODOT) ', 'SR069', '', '', '', '', '', '', '', 1010.00, '', '', '', '', 'N', 'N', 529, 'SEROLOGY'),
(3901, 'TB PCR - ASPIRATION FLUID ', 'MO008', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 530, 'MOLECULAR DIAGNOSTICS'),
(3902, 'TB PCR - BLOOD ', 'MO002', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 531, 'MOLECULAR DIAGNOSTICS'),
(3903, 'TB PCR - BONE MARROW ', 'MO009', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 532, 'MOLECULAR DIAGNOSTICS'),
(3904, 'TB PCR - BRONCHIAL WASH ', 'MO004', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 533, 'MOLECULAR DIAGNOSTICS'),
(3905, 'TB PCR - CSF', 'MO007', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 534, 'MOLECULAR DIAGNOSTICS'),
(3906, 'TB PCR - PERITONEAL FLUID ', 'MO006', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 535, 'MOLECULAR DIAGNOSTICS'),
(3907, 'TB PCR - PLEURAL FLUID ', 'MO005', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 536, 'MOLECULAR DIAGNOSTICS'),
(3908, 'TB PCR - SPUTUM ', 'MO003', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 537, 'MOLECULAR DIAGNOSTICS'),
(3909, 'TB PCR - TISSUE  (BIOPSY) ', 'MO010', '', '', '', '', '', '', '', 3850.00, '', '', '', '', 'N', 'N', 538, 'MOLECULAR DIAGNOSTICS'),
(3910, 'TB PCR - URINE ', 'MO001', '', '', '', '', '', '', '', 3670.00, '', '', '', '', 'N', 'N', 539, 'MOLECULAR DIAGNOSTICS'),
(3911, 'THROAT SWAB CULTURE ', 'MB086', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 541, 'MICROBIOLOGY'),
(3912, 'THROMBIN TIME ', 'HM045', '', '', '', '', '', '', '', 1080.00, '', '', '', '', 'N', 'N', 543, 'HAEMATOLOGY'),
(3913, 'THYROGLOBULIN STUDIES ', 'BC133', '', '', '', '', '', '', '', 3170.00, '', '', '', '', 'N', 'N', 544, 'BIOCHEMISTRY'),
(3914, 'THYROID ANTIBODY MICROSOMAL ', 'SR071', '', '', '', '', '', '', '', 2470.00, '', '', '', '', 'N', 'N', 546, 'SEROLOGY'),
(3915, 'THYROID ANTIBODY THYROGLOBULIN ', 'SR072', '', '', '', '', '', '', '', 2230.00, '', '', '', '', 'N', 'N', 547, 'SEROLOGY'),
(3916, 'TONGUE SWAB CULTURE ', 'MB088', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 549, 'MICROBIOLOGY'),
(3917, 'TONGUE SWAB CULTURE   ', 'MB089', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 550, 'MICROBIOLOGY'),
(3918, 'TORCH SCREEN ', 'SR073', '', '', '', '', '', '', '', 5590.00, '', '', '', '', 'N', 'N', 551, 'SEROLOGY'),
(3919, 'TOTAL IRON BINDING CAPACITY ', 'BC093', '', '', '', '', '', '', '', 960.00, '', '', '', '', 'N', 'N', 554, 'BIOCHEMISTRY'),
(3920, 'TOXOCARA ANTIBODY ', 'SR074', '', '', '', '', '', '', '', 3200.00, '', '', '', '', 'N', 'N', 555, 'SEROLOGY'),
(3921, 'TOXOPLASMA ANTIBODY   lgG', 'SR077', '', '', '', '', '', '', '', 1330.00, '', '', '', '', 'N', 'N', 557, 'SEROLOGY'),
(3922, 'TOXOPLASMA ANTIBODY   lgG & lgM ', 'SR075', '', '', '', '', '', '', '', 2590.00, '', '', '', '', 'N', 'N', 558, 'SEROLOGY'),
(3923, 'TOXOPLASMA ANTIBODY   lgM', 'SR076', '', '', '', '', '', '', '', 1270.00, '', '', '', '', 'N', 'N', 559, 'SEROLOGY'),
(3924, 'TOXOPLASMA GONDII PCR ', 'MO025', '', '', '', '', '', '', '', 3330.00, '', '', '', '', 'N', 'N', 560, 'MOLECULAR DIAGNOSTICS'),
(3925, 'TRANSFERRIN  (IRON SATURATION )', 'BC134', '', '', '', '', '', '', '', 2270.00, '', '', '', '', 'N', 'N', 563, 'BIOCHEMISTRY'),
(3926, 'TREPHINE BIOPSY   (Please Inquire) ', 'HM041', '', '', '', '', '', '', '', 6290.00, '', '', '', '', 'N', 'N', 566, 'HAEMATOLOGY'),
(3927, 'TREPONEMA PALLIDUM HAEMAGGLUTINATION TEST  (TPPA)', 'MB085', '', '', '', '', '', '', '', 870.00, '', '', '', '', 'N', 'N', 567, 'MICROBIOLOGY'),
(3928, 'TROPONIN '' I '' ', 'BC136', '', '', '', '', '', '', '', 1330.00, '', '', '', '', 'N', 'N', 570, 'BIOCHEMISTRY'),
(3929, 'TROPONIN I TITRE ', 'BC127', '', '', '', '', '', '', '', 2380.00, '', '', '', '', 'N', 'N', 571, 'BIOCHEMISTRY'),
(3930, 'UMBILICAL SWAB CULTURE ', 'MB090', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 574, 'MICROBIOLOGY'),
(3931, 'UMBILICAL SWAB CULTURE & ABST    ', 'MB091', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 575, 'MICROBIOLOGY'),
(3932, 'UNEXPECTED ANTIBODIES ', 'HM043', '', '', '', '', '', '', '', 4930.00, '', '', '', '', 'N', 'N', 576, 'HAEMATOLOGY'),
(3933, 'UREA - BLOOD ', 'BC139', '', '', '', '', '', '', '', 370.00, '', '', '', '', 'N', 'N', 577, 'BIOCHEMISTRY'),
(3934, 'UREA - URINE ', 'BC140', '', '', '', '', '', '', '', 370.00, '', '', '', '', 'N', 'N', 578, 'BIOCHEMISTRY'),
(3935, 'URETHRAL SMEAR CULTURE ', 'MB093', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 579, 'MICROBIOLOGY'),
(3936, 'URETHRAL SMEAR CULTURE & ABST    ', 'MB094', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 580, 'MICROBIOLOGY'),
(3937, 'URETHRAL SMEAR FOR G. C. ', 'MB092', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 581, 'MICROBIOLOGY'),
(3938, 'URETHRAL SMEAR FULL REPORT', 'MB095', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 582, 'MICROBIOLOGY'),
(3939, 'URINE - ACETONE ', 'GP022', '', '', '', '', '', '', '', 150.00, '', '', '', '', 'N', 'N', 585, 'GENERAL PATHOLOGY'),
(3940, 'URINE - BENCE JONES PROTEIN ', 'GP024', '', '', '', '', '', '', '', 610.00, '', '', '', '', 'N', 'N', 586, 'GENERAL PATHOLOGY'),
(3941, 'URINE - BILE ', 'GP025', '', '', '', '', '', '', '', 150.00, '', '', '', '', 'N', 'N', 587, 'GENERAL PATHOLOGY'),
(3942, 'URINE - CHYLE', 'GP026', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 588, 'GENERAL PATHOLOGY'),
(3943, 'URINE - DYSMORPHIC RED CELLS ', 'GP027', '', '', '', '', '', '', '', 850.00, '', '', '', '', 'N', 'N', 589, 'GENERAL PATHOLOGY'),
(3944, 'URINE - HAEMOGLOBIN ', 'GP029', '', '', '', '', '', '', '', 690.00, '', '', '', '', 'N', 'N', 590, 'GENERAL PATHOLOGY'),
(3945, 'URINE - KETONE BODIES ', 'GP030', '', '', '', '', '', '', '', 150.00, '', '', '', '', 'N', 'N', 591, 'GENERAL PATHOLOGY'),
(3946, 'URINE - PHENYL KETONURIA ', 'GP031', '', '', '', '', '', '', '', 470.00, '', '', '', '', 'N', 'N', 592, 'GENERAL PATHOLOGY'),
(3947, 'URINE - PORPHOBILINOGEN ', 'GP021', '', '', '', '', '', '', '', 680.00, '', '', '', '', 'N', 'N', 593, 'GENERAL PATHOLOGY'),
(3948, 'URINE - PORPHYRINS ', 'GP020', '', '', '', '', '', '', '', 470.00, '', '', '', '', 'N', 'N', 594, 'GENERAL PATHOLOGY'),
(3949, 'URINE - PROTEIN ', 'GP032', '', '', '', '', '', '', '', 150.00, '', '', '', '', 'N', 'N', 596, 'GENERAL PATHOLOGY'),
(3950, 'URINE - UROBILINOGEN', 'GP034', '', '', '', '', '', '', '', 150.00, '', '', '', '', 'N', 'N', 597, 'GENERAL PATHOLOGY'),
(3951, 'URINE CREATININE, SODIUM: CALCIUM RATIO', 'BC145', '', '', '', '', '', '', '', 1250.00, '', '', '', '', 'N', 'N', 603, 'BIOCHEMISTRY'),
(3952, 'URINE CULTURE ', 'MB097', '', '', '', '', '', '', '', 360.00, '', '', '', '', 'N', 'N', 604, 'MICROBIOLOGY'),
(3953, 'URINE FLOW RATE    (Please Inquire) ', 'GP019', '', '', '', '', '', '', '', 760.00, '', '', '', '', 'N', 'N', 607, 'GENERAL PATHOLOGY'),
(3954, 'URINE FOR A.F.B.', 'MB096', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 608, 'MICROBIOLOGY'),
(3955, 'URINE FOR ABUSED DRUGS SCREENING ', 'BC146', '', '', '', '', '', '', '', 3540.00, '', '', '', '', 'N', 'N', 609, 'BIOCHEMISTRY'),
(3956, 'URINE FOR CALCIUM : PHOSPHOROUS RATIO', 'BC148', '', '', '', '', '', '', '', 880.00, '', '', '', '', 'N', 'N', 610, 'BIOCHEMISTRY'),
(3957, 'URINE FOR CHLORIDE ', 'BC143', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 611, 'BIOCHEMISTRY'),
(3958, 'URINE FOR EOSINOPHILS ', 'HM046', '', '', '', '', '', '', '', 130.00, '', '', '', '', 'N', 'N', 612, 'HAEMATOLOGY'),
(3959, 'URINE FOR HAEMOSIDERIN', 'HM047', '', '', '', '', '', '', '', 1220.00, '', '', '', '', 'N', 'N', 613, 'HAEMATOLOGY'),
(3960, 'JAK 2 MUTATION DETECTION ', 'MO031', '', '', '', '', '', '', '', 5730.00, '', '', '', '', 'N', 'N', 354, 'MOLECULAR DIAGNOSTICS'),
(3961, 'JO - 1', 'SR050', '', '', '', '', '', '', '', 1790.00, '', '', '', '', 'N', 'N', 355, 'SEROLOGY'),
(3962, 'KNEE JOINT FLUID CULTURE ', 'MB048', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 356, 'MICROBIOLOGY'),
(3963, 'KNEE JOINT FLUID CULTURE & ABST    ', 'MB049', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 357, 'MICROBIOLOGY'),
(3964, 'NAIL CLIPPINGS FOR MICROSCOPY ', 'MB050', '', '', '', '', '', '', '', 410.00, '', '', '', '', 'N', 'N', 393, 'MICROBIOLOGY'),
(3965, 'NAIL SWAB FOR CULTURE ', 'MB051', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 394, 'MICROBIOLOGY'),
(3966, 'NAIL SWAB FOR CULTURE & ABST    ', 'MB052', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 395, 'MICROBIOLOGY'),
(3967, 'NASAL SMEAR ', 'MB053', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 396, 'MICROBIOLOGY'),
(3968, 'NASAL SWAB CULTURE ', 'MB054', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 397, 'MICROBIOLOGY'),
(3969, 'NASAL SWAB CULTURE & ABST      ', 'MB055', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 399, 'MICROBIOLOGY'),
(3970, 'NUT MIXURE  (PEANUT, WALNUT, HAZELNUT, ALMOND)  lgE', 'SR058', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 400, 'SEROLOGY'),
(3971, 'ORAL SWAB CULTURE ', 'MB056', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 401, 'MICROBIOLOGY'),
(3972, 'ORAL SWAB CULTURE & ABST  ', 'MB057', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 402, 'MICROBIOLOGY'),
(3973, 'OSMOLALITY - SERUM ', 'BC103', '', '', '', '', '', '', '', 1200.00, '', '', '', '', 'N', 'N', 403, 'BIOCHEMISTRY'),
(3974, 'OSMOLALITY - URINE ', 'BC104', '', '', '', '', '', '', '', 1200.00, '', '', '', '', 'N', 'N', 404, 'BIOCHEMISTRY'),
(3975, 'OSMOLALITY SERUM & URINE ', 'BC102', '', '', '', '', '', '', '', 2410.00, '', '', '', '', 'N', 'N', 405, 'BIOCHEMISTRY'),
(3976, 'OSMOTIC FRAGILITY   (Please inquire) ', 'HM033', '', '', '', '', '', '', '', 1510.00, '', '', '', '', 'N', 'N', 406, 'HAEMATOLOGY'),
(3977, 'R.N.P  ANTIBODY ', 'SR061', '', '', '', '', '', '', '', 1880.00, '', '', '', '', 'N', 'N', 458, 'SEROLOGY'),
(3978, 'RBC', 'HM044', '', '', '', '', '', '', '', 280.00, '', '', '', '', 'N', 'N', 460, 'HAEMATOLOGY'),
(3979, 'RETICULOCYTE COUNT ', 'HM037', '', '', '', '', '', '', '', 340.00, '', '', '', '', 'N', 'N', 463, 'HAEMATOLOGY'),
(3980, 'RHESUS ANTIBODY', 'HM038', '', '', '', '', '', '', '', 970.00, '', '', '', '', 'N', 'N', 466, 'HAEMATOLOGY'),
(3981, 'RHESUS ANTIBODY GENOTYPING ', 'HM039', '', '', '', '', '', '', '', 6610.00, '', '', '', '', 'N', 'N', 467, 'HAEMATOLOGY'),
(3982, 'RHEUMATOID FACTOR ', 'SR060', '', '', '', '', '', '', '', 410.00, '', '', '', '', 'N', 'N', 468, 'SEROLOGY'),
(3983, 'RO (SSa) ', 'SR062', '', '', '', '', '', '', '', 1880.00, '', '', '', '', 'N', 'N', 469, 'SEROLOGY'),
(3984, 'RUBELLA ANTIBODY  (lg G & lg M) ', 'SR065', '', '', '', '', '', '', '', 2820.00, '', '', '', '', 'N', 'N', 470, 'SEROLOGY'),
(3985, 'RUBELLA lgG ANTIBODY ', 'SR063', '', '', '', '', '', '', '', 1410.00, '', '', '', '', 'N', 'N', 472, 'SEROLOGY'),
(3986, 'RUBELLA lgM ANTIBODY ', 'SR064', '', '', '', '', '', '', '', 1410.00, '', '', '', '', 'N', 'N', 473, 'SEROLOGY'),
(3987, 'TSH  (THYROID STIMULATING HORMONE)  3rd Generation ', 'BC138', '', '', '', '', '', '', '', 990.00, '', '', '', '', 'N', 'N', 573, 'BIOCHEMISTRY'),
(3988, 'VAGINAL DISCHARGE CULTURE ', 'MB099', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 618, 'MICROBIOLOGY'),
(3989, 'VAGINAL DISCHARGE CULTURE & ABST    ', 'MB100', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 619, 'MICROBIOLOGY'),
(3990, 'VAGINAL SERUM FULL REPORT ', 'MB101', '', '', '', '', '', '', '', 470.00, '', '', '', '', 'N', 'N', 620, 'MICROBIOLOGY'),
(3991, 'VENERAL DISEASE REFERENCE LAB   (VDRL) ', 'SR078', '', '', '', '', '', '', '', 300.00, '', '', '', '', 'N', 'N', 622, 'SEROLOGY'),
(3992, 'WBC & DC ', 'HM048', '', '', '', '', '', '', '', 290.00, '', '', '', '', 'N', 'N', 623, 'HAEMATOLOGY'),
(3993, 'WEIL - FELIX  ', 'SR079', '', '', '', '', '', '', '', 480.00, '', '', '', '', 'N', 'N', 626, 'SEROLOGY'),
(3994, 'WHOLE EGG SPECIFIC   lgE', 'SR080', '', '', '', '', '', '', '', 920.00, '', '', '', '', 'N', 'N', 627, 'SEROLOGY'),
(3995, 'WIDAL TEST  (SAT) -  TUBE METHOD ', 'SR081', '', '', '', '', '', '', '', 1030.00, '', '', '', '', 'N', 'N', 628, 'SEROLOGY'),
(3996, 'WOUND SWAB CULTURE ', 'MB102', '', '', '', '', '', '', '', 400.00, '', '', '', '', 'N', 'N', 629, 'MICROBIOLOGY'),
(3997, 'WOUND SWAB CULTURE & ABST   ', 'MB103', '', '', '', '', '', '', '', 800.00, '', '', '', '', 'N', 'N', 630, 'MICROBIOLOGY'),
(3998, 'ZINC ', 'BC164', '', '', '', '', '', '', '', 4370.00, '', '', '', '', 'N', 'N', 663, 'BIOCHEMISTRY'),
(3999, '17 - HYDROXY PROGESTERONE ', 'BC147', '', '', '', '', '', '', '', 2840.00, '', '', '', '', 'N', 'N', 1, 'BIOCHEMISTRY'),
(4000, '24 H URINE AMYLASE ', 'BC149', '', '', '', '', '', '', '', 560.00, '', '', '', '', 'N', 'N', 2, 'BIOCHEMISTRY'),
(4001, '24 H URINE CALCIUM ', 'BC150', '', '', '', '', '', '', '', 610.00, '', '', '', '', 'N', 'N', 3, 'BIOCHEMISTRY'),
(4002, '24 H URINE CITRATE ', 'BC154', '', '', '', '', '', '', '', 2970.00, '', '', '', '', 'N', 'N', 4, 'BIOCHEMISTRY'),
(4003, '24 H URINE COPPER ', 'BC161', '', '', '', '', '', '', '', 2560.00, '', '', '', '', 'N', 'N', 5, 'BIOCHEMISTRY'),
(4004, '24 H URINE ELECTROLYTES ', 'BC151', '', '', '', '', '', '', '', 680.00, '', '', '', '', 'N', 'N', 6, 'BIOCHEMISTRY'),
(4005, '24 H URINE MAGNESIUM ', 'BC152', '', '', '', '', '', '', '', 560.00, '', '', '', '', 'N', 'N', 7, 'BIOCHEMISTRY'),
(4006, '24 H URINE MICROALBUMINURIA ', 'BC160', '', '', '', '', '', '', '', 680.00, '', '', '', '', 'N', 'N', 8, 'BIOCHEMISTRY'),
(4007, '24 H URINE OXALATE ', 'BC153', '', '', '', '', '', '', '', 2970.00, '', '', '', '', 'N', 'N', 9, 'BIOCHEMISTRY'),
(4008, '24 H URINE pH', 'BC156', '', '', '', '', '', '', '', 680.00, '', '', '', '', 'N', 'N', 10, 'BIOCHEMISTRY'),
(4009, '24 H URINE PHOSPHORUS', 'BC155', '', '', '', '', '', '', '', 610.00, '', '', '', '', 'N', 'N', 11, 'BIOCHEMISTRY'),
(4010, '24 H URINE POTASSIUM ', 'BC157', '', '', '', '', '', '', '', 680.00, '', '', '', '', 'N', 'N', 12, 'BIOCHEMISTRY'),
(4011, '24 H URINE POTASSIUM & SODIUM', 'BC158', '', '', '', '', '', '', '', 680.00, '', '', '', '', 'N', 'N', 13, 'BIOCHEMISTRY'),
(4012, '24 H URINE PROTEIN ', 'BC159', '', '', '', '', '', '', '', 680.00, '', '', '', '', 'N', 'N', 14, 'BIOCHEMISTRY'),
(4013, '24 H URINE URIC ACID ', 'BC162', '', '', '', '', '', '', '', 600.00, '', '', '', '', 'N', 'N', 15, 'BIOCHEMISTRY'),
(4014, '24 H URINE V.M.A.', 'BC163', '', '', '', '', '', '', '', 3560.00, '', '', '', '', 'N', 'N', 16, 'BIOCHEMISTRY'),
(4015, '24 HOURS URINE FUNGAL CULTURE ', 'MB036', '', '', '', '', '', '', '', 1020.00, '', '', '', '', 'N', 'N', 17, 'MICROBIOLOGY'),
(4016, '5 - HIAA  (HYDROXY INDOLE ACETIC ACID) ', 'BC086', '', '', '', '', '', '', '', 5650.00, '', '', '', '', 'N', 'N', 18, 'BIOCHEMISTRY'),
(4017, 'AXILLA SWAB CULTURE ', 'MB008', '', '', '', '', '', '', NULL, 400.00, '', '', '', '', NULL, NULL, 63, 'MICROBIOLOGY'),
(4018, 'AXILLA SWAB CULTURE ', 'MB008', '.', '', '', '', '', '', NULL, 400.00, '', '', '', '', NULL, NULL, 63, 'MICROBIOLOGY'),
(4042, 'URINE - FULL REPORT ', 'GP028', 'COLOUR', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4043, 'URINE - FULL REPORT ', 'GP028', 'APPEARANCE', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4044, 'URINE - FULL REPORT ', 'GP028', 'SPECIFIC GRAVITY', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4045, 'URINE - FULL REPORT ', 'GP028', 'Ph', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4046, 'URINE - FULL REPORT ', 'GP028', 'PROTEIN', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4047, 'URINE - FULL REPORT ', 'GP028', 'SUGAR', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4048, 'URINE - FULL REPORT ', 'GP028', 'KETONES', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4049, 'URINE - FULL REPORT ', 'GP028', 'BILE', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4050, 'URINE - FULL REPORT ', 'GP028', 'NITRITE', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4051, 'URINE - FULL REPORT ', 'GP028', 'UROBILINOGEN', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4052, 'URINE - FULL REPORT ', 'GP028', '', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4053, 'URINE - FULL REPORT ', 'GP028', 'CENTRIFUGED DEPOSIT', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4054, 'URINE - FULL REPORT ', 'GP028', '', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4055, 'URINE - FULL REPORT ', 'GP028', 'PUS CELLS', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4056, 'URINE - FULL REPORT ', 'GP028', 'RBC', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4057, 'URINE - FULL REPORT ', 'GP028', 'EPITHELIAL CELLS', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4058, 'URINE - FULL REPORT ', 'GP028', 'CRYSTALS', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4059, 'URINE - FULL REPORT ', 'GP028', 'CAST', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4060, 'URINE - FULL REPORT ', 'GP028', 'ORGANISM', '', '', '', '', 'HIGH                          ', NULL, 230.00, 'NORMAL', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4061, 'URINE - FULL REPORT ', 'GP028', '', '', '', '', '', '', NULL, 230.00, '', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4062, 'URINE - FULL REPORT ', 'GP028', '', '', '', '', '', '', NULL, 230.00, '', '', '', '', NULL, NULL, 615, 'GENERAL PATHOLOGY'),
(4063, 'PROFILE RENAL ', 'BC114', 'SERUM UREA', 'mg/dl', '10.00                                                                                               ', '45', 'LOW', 'HIGH                          ', NULL, 2390.00, 'NORMAL', '', '', '-', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4064, 'PROFILE RENAL ', 'BC114', 'SERUM CREATININIE', 'mg/dl', '0.50                                                                                                ', '1.3', 'LOW', 'HIGH                          ', NULL, 2390.00, 'NORMAL', '', '', '-', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4065, 'PROFILE RENAL ', 'BC114', 'SERUM URIC ACID', 'mg/dl', '3.40                                                                                                ', '7', 'LOW', 'HIGH                          ', NULL, 2390.00, 'NORMAL', '', '', '-', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4066, 'PROFILE RENAL ', 'BC114', 'SERUM IONIZED CALCIUM', 'mmol/l', '1.1                                                                                                 ', '1.4', 'LOW', 'HIGH                          ', NULL, 2390.00, 'NORMAL', '', '', '-', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4067, 'PROFILE RENAL ', 'BC114', 'SERUM PHOSPHAROUS INORGANIC', 'mg/dl', '2.50                                                                                                ', '4.9', 'LOW', 'HIGH                          ', NULL, 2390.00, 'NORMAL', '', '', '-', NULL, NULL, 462, 'BIOCHEMISTRY');
INSERT INTO `lab_test` (`id`, `testname`, `code`, `des`, `unit`, `rfrom`, `rto`, `rfrom_msg`, `rto_msg`, `pen`, `price`, `rnorm`, `rfromfe`, `rtofe`, `rangesep`, `h`, `u`, `tmpno`, `bgroup`) VALUES
(4068, 'PROFILE RENAL ', 'BC114', 'SERUM SODIUM', 'mmol/l', '135.00                                                                                              ', '148', 'LOW', 'HIGH                          ', NULL, 2390.00, 'NORMAL', '', '', '-', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4069, 'PROFILE RENAL ', 'BC114', 'SERUM POTASSIUM', 'mmol/l', '3.50                                                                                                ', '5.5', 'LOW', 'HIGH                          ', NULL, 2390.00, 'NORMAL', '', '', '-', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4070, 'PROFILE RENAL ', 'BC114', 'SERUM CHLORIDE', 'mmol/l', '95.00                                                                                               ', '111', 'LOW', 'HIGH                          ', NULL, 2390.00, 'NORMAL', '', '', '-', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4071, 'PROFILE RENAL ', 'BC114', '', '', '', '', '', '', NULL, 2390.00, '', '', '', '', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4072, 'PROFILE RENAL ', 'BC114', '', '', '', '', '', '', NULL, 2390.00, '', '', '', '', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4073, 'PROFILE RENAL ', 'BC114', '', '', '', '', '', '', NULL, 2390.00, '', '', '', '', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4074, 'PROFILE RENAL ', 'BC114', '', '', '', '', '', '', NULL, 2390.00, '', '', '', '', NULL, NULL, 462, 'BIOCHEMISTRY'),
(4075, 'GENERAL HEALTH CHECK - UP', 'HC001', '', '', '', '', '', '', NULL, 4360.00, '', '', '', '', NULL, NULL, 330, 'HEALTH CHECK - UP'),
(4076, 'EXECUTIVE HEALTH CHECK - UP', 'HC002', '', '', '', '', '', '', NULL, 5100.00, '', '', '', '', NULL, NULL, 332, 'HEALTH CHECK - UP'),
(4077, 'COMPREHENSIVE CARDIAC CHECK - UP', 'HC003', '', '', '', '', '', '', NULL, 5260.00, '', '', '', '', NULL, NULL, 334, 'HEALTH CHECK - UP'),
(4078, 'CA 125  (OVARIAN) ', 'TM004', '', '', '', '', '', '', NULL, 4040.00, '', '', '', '', NULL, NULL, 107, 'TUMOUR MARKERS');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_pa_app_mas`
--

CREATE TABLE IF NOT EXISTS `lab_test_pa_app_mas` (
  `refno` varchar(50) DEFAULT NULL,
  `testdes` varchar(100) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
`id` int(11) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `xamount` decimal(10,2) DEFAULT NULL,
  `testcode` varchar(11) DEFAULT NULL,
  `tmpno` bigint(10) DEFAULT NULL,
  `cancell` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_pa_app_trn`
--

CREATE TABLE IF NOT EXISTS `lab_test_pa_app_trn` (
  `refno` varchar(50) DEFAULT NULL,
  `paname` varchar(255) DEFAULT NULL,
  `testname` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `result` varchar(100) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
`id` int(11) NOT NULL,
  `labdate` date DEFAULT NULL,
  `recdet` varchar(20) DEFAULT NULL,
  `rem1` varchar(255) DEFAULT NULL,
  `rangef` varchar(50) DEFAULT NULL,
  `rangeto` varchar(50) DEFAULT NULL,
  `timee` varchar(50) DEFAULT NULL,
  `doctr` varchar(50) DEFAULT NULL,
  `test_code` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tmpno` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ledge`
--

CREATE TABLE IF NOT EXISTS `ledge` (
  `REFNO` varchar(20) DEFAULT NULL,
  `SERI_NO` varchar(20) DEFAULT NULL,
  `SERI_NO1` varchar(20) DEFAULT NULL,
  `CODE` varchar(20) DEFAULT NULL,
  `sDATE` date DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `AMOUNT` decimal(20,2) DEFAULT NULL,
  `AMOUNT1` decimal(20,2) DEFAULT NULL,
  `TYPE` varchar(30) DEFAULT NULL,
  `CHNO` varchar(20) DEFAULT NULL,
  `RESON` varchar(100) DEFAULT NULL,
`id` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ledge`
--

INSERT INTO `ledge` (`REFNO`, `SERI_NO`, `SERI_NO1`, `CODE`, `sDATE`, `NAME`, `AMOUNT`, `AMOUNT1`, `TYPE`, `CHNO`, `RESON`, `id`) VALUES
('5', '1', NULL, '', '2015-05-29', '', 7500.00, 0.00, 'REP', '', NULL, 6),
('', '2', NULL, '', '2015-05-29', '', 0.00, 0.00, 'REP', '', NULL, 7),
('1', '3', NULL, '', '2015-05-29', '', 7500.00, 7500.00, 'REP', '', NULL, 8),
('2', '4', NULL, '', '2015-05-29', '', 0.00, 0.00, 'REP', '', NULL, 9),
('2', '6', NULL, '', '2015-05-29', '', 0.00, 0.00, 'REP', '', NULL, 12),
('3', '1', NULL, 'C007', '2015-05-29', 'CEF Company', 0.00, 0.00, 'REP', '', NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `package_mas`
--

CREATE TABLE IF NOT EXISTS `package_mas` (
  `package_no` varchar(10) DEFAULT NULL,
  `code` varchar(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `sel` varchar(5) DEFAULT '0',
  `user_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `para`
--

CREATE TABLE IF NOT EXISTS `para` (
  `ARR` bigint(20) DEFAULT NULL,
  `D_REFNO` bigint(20) DEFAULT NULL,
  `RE_PAY` bigint(20) DEFAULT NULL,
  `A` bigint(20) DEFAULT NULL,
  `B` bigint(20) DEFAULT NULL,
  `C` bigint(20) DEFAULT NULL,
  `D` bigint(20) DEFAULT NULL,
  `E` bigint(20) DEFAULT NULL,
  `F` bigint(20) DEFAULT NULL,
  `G` bigint(20) DEFAULT NULL,
  `H` bigint(20) DEFAULT NULL,
  `I` bigint(20) DEFAULT NULL,
  `J` bigint(20) DEFAULT NULL,
  `K` bigint(20) DEFAULT NULL,
  `L` bigint(20) DEFAULT NULL,
  `M` bigint(20) DEFAULT NULL,
  `N` bigint(20) DEFAULT NULL,
  `O` bigint(20) DEFAULT NULL,
  `P` bigint(20) DEFAULT NULL,
  `Q` bigint(20) DEFAULT NULL,
  `R` bigint(20) DEFAULT NULL,
  `S` bigint(20) DEFAULT NULL,
  `T` bigint(20) DEFAULT NULL,
  `U` bigint(20) DEFAULT NULL,
  `V` bigint(20) DEFAULT NULL,
  `W` bigint(20) DEFAULT NULL,
  `X` bigint(20) DEFAULT NULL,
  `Y` bigint(20) DEFAULT NULL,
  `Z` bigint(20) DEFAULT NULL,
  `PAYMENT` bigint(20) DEFAULT NULL,
  `UP_DATE` date DEFAULT NULL,
  `PARMIT` smallint(6) DEFAULT NULL,
  `PROCESS` varchar(5) DEFAULT NULL,
  `PRO_DATE` date DEFAULT NULL,
  `SOU_DRIVE` varchar(5) DEFAULT NULL,
  `TAR_DRIVE` varchar(5) DEFAULT NULL,
  `MARK_DATE` date DEFAULT NULL,
  `itemno` varchar(15) DEFAULT NULL,
  `ARN` bigint(20) DEFAULT NULL,
  `INV_RECNO` bigint(20) DEFAULT NULL,
  `INV_RECNO_m` bigint(20) DEFAULT NULL,
  `lab_rep` bigint(20) DEFAULT NULL,
  `lentry` bigint(20) DEFAULT NULL,
  `payrec` bigint(20) DEFAULT NULL,
  `COMPANY` varchar(50) DEFAULT NULL,
  `ADD1` varchar(50) DEFAULT NULL,
  `ADD2` varchar(50) DEFAULT NULL,
  `ADD3` varchar(50) DEFAULT NULL,
  `pri_medno` bigint(20) DEFAULT NULL,
  `guti` bigint(20) DEFAULT NULL,
  `testNo` bigint(20) DEFAULT NULL,
  `SAU_NO` bigint(20) DEFAULT NULL,
  `SAU_C` varchar(5) DEFAULT NULL,
  `medino` bigint(20) DEFAULT NULL,
  `MEDICALTEST` bigint(20) DEFAULT NULL,
  `GMCANO` bigint(20) DEFAULT NULL,
  `appno` bigint(20) DEFAULT NULL,
  `sysdate` date DEFAULT NULL,
  `recdet` bigint(20) DEFAULT NULL,
  `cashinvo` bigint(20) DEFAULT NULL,
  `chequeinvo` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `para`
--

INSERT INTO `para` (`ARR`, `D_REFNO`, `RE_PAY`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`, `J`, `K`, `L`, `M`, `N`, `O`, `P`, `Q`, `R`, `S`, `T`, `U`, `V`, `W`, `X`, `Y`, `Z`, `PAYMENT`, `UP_DATE`, `PARMIT`, `PROCESS`, `PRO_DATE`, `SOU_DRIVE`, `TAR_DRIVE`, `MARK_DATE`, `itemno`, `ARN`, `INV_RECNO`, `INV_RECNO_m`, `lab_rep`, `lentry`, `payrec`, `COMPANY`, `ADD1`, `ADD2`, `ADD3`, `pri_medno`, `guti`, `testNo`, `SAU_NO`, `SAU_C`, `medino`, `MEDICALTEST`, `GMCANO`, `appno`, `sysdate`, `recdet`, `cashinvo`, `chequeinvo`) VALUES
(NULL, 4, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pa_app`
--

CREATE TABLE IF NOT EXISTS `pa_app` (
  `refno` varchar(20) NOT NULL DEFAULT '',
  `entdate` date DEFAULT NULL,
  `serino` int(11) DEFAULT NULL,
  `doc_code` varchar(10) DEFAULT NULL,
  `docnname` varchar(255) DEFAULT NULL,
  `paname` varchar(255) DEFAULT NULL,
  `apptime` varchar(50) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `paadd` varchar(255) DEFAULT NULL,
  `charges` decimal(10,2) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `hoscha` decimal(10,2) DEFAULT NULL,
`id` int(11) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `mob` varchar(20) DEFAULT NULL,
  `xrayamt` decimal(10,2) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `totalamount` decimal(10,2) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT NULL,
  `cheqamt` decimal(10,2) DEFAULT NULL,
  `chqdt` date DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `chqno` varchar(50) DEFAULT NULL,
  `delvt` varchar(20) DEFAULT NULL,
  `initial` varchar(50) DEFAULT NULL,
  `colby` varchar(50) DEFAULT NULL,
  `bloodtime` varchar(50) DEFAULT NULL,
  `agencyn` varchar(50) DEFAULT NULL,
  `pp_no` varchar(20) DEFAULT NULL,
  `tmpno` bigint(10) DEFAULT NULL,
  `fileno` varchar(20) DEFAULT NULL,
  `cancell` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pa_app_channel`
--

CREATE TABLE IF NOT EXISTS `pa_app_channel` (
  `refno` varchar(20) NOT NULL DEFAULT '',
  `entdate` date DEFAULT NULL,
  `serino` int(11) DEFAULT NULL,
  `doc_code` varchar(10) DEFAULT NULL,
  `docnname` varchar(255) DEFAULT NULL,
  `paname` varchar(255) DEFAULT NULL,
  `apptime` varchar(50) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `paadd` varchar(255) DEFAULT NULL,
  `charges` decimal(10,2) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `hoscha` decimal(10,2) DEFAULT NULL,
`id` int(11) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `mob` varchar(20) DEFAULT NULL,
  `xrayamt` decimal(10,2) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `totalamount` decimal(10,2) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT NULL,
  `cheqamt` decimal(10,2) DEFAULT NULL,
  `chqdt` date DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `chqno` varchar(50) DEFAULT NULL,
  `delvt` varchar(20) DEFAULT NULL,
  `initial` varchar(50) DEFAULT NULL,
  `colby` varchar(50) DEFAULT NULL,
  `bloodtime` varchar(50) DEFAULT NULL,
  `agencyn` varchar(50) DEFAULT NULL,
  `pp_no` varchar(20) DEFAULT NULL,
  `tmpno` bigint(10) DEFAULT NULL,
  `fileno` varchar(50) DEFAULT NULL,
  `cancell` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pa_disapp`
--

CREATE TABLE IF NOT EXISTS `pa_disapp` (
  `fileno` varchar(255) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `appp` float DEFAULT NULL,
  `uss` float DEFAULT '0',
  `user_nm` varchar(255) DEFAULT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pa_reg`
--

CREATE TABLE IF NOT EXISTS `pa_reg` (
  `refno` varchar(20) NOT NULL DEFAULT '',
  `paname` varchar(255) DEFAULT NULL,
  `apptime` varchar(50) DEFAULT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `paadd` varchar(255) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
`id` int(11) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `mob` varchar(20) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL,
  `initial` varchar(50) DEFAULT NULL,
  `tmpno` bigint(10) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rege`
--

CREATE TABLE IF NOT EXISTS `rege` (
`id` bigint(20) NOT NULL,
  `DREFNO` varchar(20) DEFAULT NULL,
  `COUNTRY` varchar(50) DEFAULT NULL,
  `CMB_NO` varchar(20) DEFAULT NULL,
  `SERI_NO` bigint(20) DEFAULT NULL,
  `XRAYNO` varchar(20) DEFAULT NULL,
  `GCC_NO` varchar(50) DEFAULT NULL,
  `CODE` varchar(10) DEFAULT NULL,
  `cou_NAME` varchar(50) DEFAULT NULL,
  `AGNAME` varchar(150) DEFAULT NULL,
  `SDATE` date DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `AGE_Y` varchar(50) DEFAULT NULL,
  `AGE_M` int(11) DEFAULT NULL,
  `DEST` varchar(15) DEFAULT NULL,
  `AMOUNT` decimal(20,2) DEFAULT NULL,
  `AMOUNT1` decimal(20,2) DEFAULT NULL,
  `AMOUNT2` decimal(20,2) DEFAULT NULL,
  `AMOUNT3` decimal(20,2) DEFAULT NULL,
  `PAID` decimal(20,2) DEFAULT NULL,
  `TYPE` varchar(100) DEFAULT NULL,
  `TREE1` varchar(5) DEFAULT NULL,
  `TREEA1` decimal(20,0) DEFAULT NULL,
  `TREE2` varchar(5) DEFAULT NULL,
  `TREEA2` decimal(20,0) DEFAULT NULL,
  `SERI_NO1` decimal(20,0) DEFAULT NULL,
  `L_R_M_PDA` datetime DEFAULT NULL,
  `FA_PLAN` varchar(40) DEFAULT NULL,
  `MARK` varchar(5) DEFAULT NULL,
  `PA_NO` varchar(12) DEFAULT NULL,
  `DEL_DATE` datetime DEFAULT NULL,
  `DEL_REMARK` varchar(40) DEFAULT NULL,
  `DEL_BY` varchar(30) DEFAULT NULL,
  `ISSUED` varchar(5) DEFAULT NULL,
  `PRINT_FL` varchar(5) DEFAULT NULL,
  `PRI_NO_COU` varchar(5) DEFAULT NULL,
  `REJ_DATE` datetime DEFAULT NULL,
  `REJ_ENT` datetime DEFAULT NULL,
  `REJ_REMA` varchar(60) DEFAULT NULL,
  `REJ_REMA1` varchar(60) DEFAULT NULL,
  `REJ_CODE1` varchar(5) DEFAULT NULL,
  `REJ_CODE2` varchar(5) DEFAULT NULL,
  `REJ_CODE3` varchar(5) DEFAULT NULL,
  `G_NO` varchar(25) DEFAULT NULL,
  `DIG1` varchar(5) DEFAULT NULL,
  `DIG2` varchar(5) DEFAULT NULL,
  `DIG3` varchar(5) DEFAULT NULL,
  `CUS_REMARK` varchar(100) DEFAULT NULL,
  `RE_CHECHK` varchar(100) DEFAULT NULL,
  `picture` varchar(150) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `SEX` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `NATIONL` varchar(50) DEFAULT NULL,
  `PLA_OF_IS` varchar(50) DEFAULT NULL,
  `POS_APP` varchar(50) DEFAULT NULL,
  `No_child` smallint(6) DEFAULT NULL,
  `last_ch_age` varchar(10) DEFAULT NULL,
  `reject` varchar(5) DEFAULT NULL,
  `dev` varchar(5) DEFAULT NULL,
  `cusadd` varchar(100) DEFAULT NULL,
  `CHKNO` varchar(10) DEFAULT NULL,
  `CASH` decimal(20,2) DEFAULT NULL,
  `isLRMP` varchar(10) DEFAULT NULL,
  `Ag_ref` varchar(20) DEFAULT NULL,
  `Med_type` varchar(10) DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  `Remark_rej` varchar(100) DEFAULT NULL,
  `userrefno` varchar(20) DEFAULT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `LAB_NO` varchar(20) DEFAULT NULL,
  `HDTX` int(11) DEFAULT NULL,
  `initial` varchar(20) DEFAULT NULL,
  `stime` datetime DEFAULT NULL,
  `chkdt` datetime DEFAULT NULL,
  `chkamt` decimal(20,2) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `religon` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `mfile` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `rege`
--

INSERT INTO `rege` (`id`, `DREFNO`, `COUNTRY`, `CMB_NO`, `SERI_NO`, `XRAYNO`, `GCC_NO`, `CODE`, `cou_NAME`, `AGNAME`, `SDATE`, `NAME`, `AGE_Y`, `AGE_M`, `DEST`, `AMOUNT`, `AMOUNT1`, `AMOUNT2`, `AMOUNT3`, `PAID`, `TYPE`, `TREE1`, `TREEA1`, `TREE2`, `TREEA2`, `SERI_NO1`, `L_R_M_PDA`, `FA_PLAN`, `MARK`, `PA_NO`, `DEL_DATE`, `DEL_REMARK`, `DEL_BY`, `ISSUED`, `PRINT_FL`, `PRI_NO_COU`, `REJ_DATE`, `REJ_ENT`, `REJ_REMA`, `REJ_REMA1`, `REJ_CODE1`, `REJ_CODE2`, `REJ_CODE3`, `G_NO`, `DIG1`, `DIG2`, `DIG3`, `CUS_REMARK`, `RE_CHECHK`, `picture`, `pic`, `SEX`, `status`, `NATIONL`, `PLA_OF_IS`, `POS_APP`, `No_child`, `last_ch_age`, `reject`, `dev`, `cusadd`, `CHKNO`, `CASH`, `isLRMP`, `Ag_ref`, `Med_type`, `Remark`, `Remark_rej`, `userrefno`, `Lastname`, `LAB_NO`, `HDTX`, `initial`, `stime`, `chkdt`, `chkamt`, `bank`, `religon`, `tel`, `mfile`) VALUES
(16, '3', '', NULL, 1, '', '', 'C007', '', 'CEF Company', '2015-05-29', 'SDFSDFSDF', '', 0, '', 0.00, 0.00, NULL, NULL, NULL, 'CASH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N 232323', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', '', 'upload/image1/N 232323.png', NULL, 'MALE', 'SINGLE', 'Sri Lankan', '', '', 0, '', NULL, NULL, '', '', 0.00, '', NULL, NULL, NULL, '', '', 'DSF', NULL, NULL, '', '2015-05-29 21:47:41', '0000-00-00 00:00:00', 0.00, '', 'Buddhist', '', 'mfile');

-- --------------------------------------------------------

--
-- Table structure for table `regtran`
--

CREATE TABLE IF NOT EXISTS `regtran` (
`id` bigint(20) NOT NULL,
  `drefno` varchar(20) DEFAULT NULL,
  `tcode` varchar(20) DEFAULT NULL,
  `tdes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `regtran`
--

INSERT INTO `regtran` (`id`, `drefno`, `tcode`, `tdes`) VALUES
(1, '5', '7', 'GAMCA FULL MEDICAL'),
(2, '', '7', 'GAMCA FULL MEDICAL'),
(3, '1', '7', 'GAMCA FULL MEDICAL'),
(7, '2', '7', 'GAMCA FULL MEDICAL');

-- --------------------------------------------------------

--
-- Table structure for table `resulton`
--

CREATE TABLE IF NOT EXISTS `resulton` (
  `drefno` varchar(100) DEFAULT NULL,
  `pa_no` varchar(15) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `xray1` varchar(500) DEFAULT NULL,
  `xray2` varchar(500) DEFAULT NULL,
  `xray3` varchar(500) DEFAULT NULL,
  `lab1` varchar(500) DEFAULT NULL,
  `lab2` varchar(500) DEFAULT NULL,
  `lab3` varchar(500) DEFAULT NULL,
  `xray4` varchar(500) DEFAULT NULL,
  `lab4` varchar(500) DEFAULT NULL,
  `ltime1` date DEFAULT NULL,
  `ltime2` date DEFAULT NULL,
  `ltime3` date DEFAULT NULL,
  `ltime4` date DEFAULT NULL,
  `xtime1` date DEFAULT NULL,
  `xtime2` date DEFAULT NULL,
  `xtime3` date DEFAULT NULL,
  `xtime4` date DEFAULT NULL,
  `result` varchar(500) DEFAULT NULL,
  `xresult` varchar(500) DEFAULT NULL,
  `xrestime` date DEFAULT NULL,
  `restime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sumedi`
--

CREATE TABLE IF NOT EXISTS `sumedi` (
  `DREFNO` varchar(12) DEFAULT NULL,
  `SERINO` int(11) DEFAULT NULL,
  `CMB_NO` varchar(10) DEFAULT NULL,
  `sDATE` date DEFAULT NULL,
  `ENT_DATE` date DEFAULT NULL,
  `DO_ACC_NO` varchar(12) DEFAULT NULL,
  `CODE` varchar(5) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `LASTNAME` varchar(50) DEFAULT NULL,
  `ADDRESS` varchar(500) DEFAULT NULL,
  `M` varchar(6) DEFAULT NULL,
  `SEX` varchar(8) DEFAULT NULL,
  `AGE` varchar(53) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `NATIONL` varchar(20) DEFAULT NULL,
  `HI_FT` decimal(10,2) DEFAULT NULL,
  `hi_in` decimal(10,2) DEFAULT NULL,
  `WE` decimal(10,2) DEFAULT NULL,
  `PAS_NO` varchar(12) DEFAULT NULL,
  `PLA_OF_IS` varchar(20) DEFAULT NULL,
  `POS_APP` varchar(100) DEFAULT NULL,
  `REC_AG` varchar(150) DEFAULT NULL,
  `P_N_D_RE` varchar(10) DEFAULT NULL,
  `ALLERGY_RE` varchar(10) DEFAULT NULL,
  `OTHERS_RE` varchar(10) DEFAULT NULL,
  `EYE_VISON` varchar(20) DEFAULT NULL,
  `EYE_NE_R` varchar(10) DEFAULT NULL,
  `EYE_NE_L` varchar(10) DEFAULT NULL,
  `EYE_NE_RE` varchar(10) DEFAULT NULL,
  `EYE_FA` varchar(10) DEFAULT NULL,
  `EYE_FA_R` varchar(10) DEFAULT NULL,
  `EYE_FA_L` varchar(10) DEFAULT NULL,
  `EYE_FA_RE` varchar(10) DEFAULT NULL,
  `EYE_CO` varchar(20) DEFAULT NULL,
  `EYE_CO_R` varchar(20) DEFAULT NULL,
  `EYE_CO_L` varchar(20) DEFAULT NULL,
  `YEAR_R` varchar(20) DEFAULT NULL,
  `YEAR_L` varchar(20) DEFAULT NULL,
  `YEAR_RRE` varchar(10) DEFAULT NULL,
  `YEAR_LRE` varchar(10) DEFAULT NULL,
  `CH_XRA_NO` varchar(20) DEFAULT NULL,
  `CH_XRA_RE` varchar(10) DEFAULT NULL,
  `LORD_NO` varchar(20) DEFAULT NULL,
  `LORD_RE` varchar(10) DEFAULT NULL,
  `BL_PRES` varchar(20) DEFAULT NULL,
  `BL_PR_RE` varchar(10) DEFAULT NULL,
  `HEAR_RE` varchar(10) DEFAULT NULL,
  `LUN_RE` varchar(10) DEFAULT NULL,
  `ABD_RE` varchar(10) DEFAULT NULL,
  `HER_RE` varchar(10) DEFAULT NULL,
  `VARI_RE` varchar(10) DEFAULT NULL,
  `EXTR_RE` varchar(10) DEFAULT NULL,
  `SKIN_RE` varchar(10) DEFAULT NULL,
  `CLINICAL` varchar(20) DEFAULT NULL,
  `LAB_RE` varchar(10) DEFAULT NULL,
  `VDRL_RE` varchar(10) DEFAULT NULL,
  `TPHA_RE` varchar(10) DEFAULT NULL,
  `QUA_EL_HIV` varchar(20) DEFAULT NULL,
  `SUG_RE` varchar(10) DEFAULT NULL,
  `ALB_RE` varchar(10) DEFAULT NULL,
  `BIL_RE` varchar(10) DEFAULT NULL,
  `OTH_RE` varchar(10) DEFAULT NULL,
  `HEL_RE` varchar(10) DEFAULT NULL,
  `S_BIL_RE` varchar(10) DEFAULT NULL,
  `SAL_RE` varchar(10) DEFAULT NULL,
  `V_CH_RE` varchar(10) DEFAULT NULL,
  `OTHER0` varchar(10) DEFAULT NULL,
  `AOC` varchar(10) DEFAULT NULL,
  `HEM` varchar(10) DEFAULT NULL,
  `HEM_RE` varchar(10) DEFAULT NULL,
  `MAL` varchar(10) DEFAULT NULL,
  `MAL_RE` varchar(10) DEFAULT NULL,
  `B_OTH_RE` varchar(20) DEFAULT NULL,
  `ABD` varchar(10) DEFAULT NULL,
  `SERO_RE` varchar(10) DEFAULT NULL,
  `HIV_RE` varchar(10) DEFAULT NULL,
  `F_B_S` varchar(10) DEFAULT NULL,
  `F_B_S_RE` varchar(10) DEFAULT NULL,
  `HBSA` varchar(10) DEFAULT NULL,
  `HBSA_RE` varchar(10) DEFAULT NULL,
  `ANTI` varchar(10) DEFAULT NULL,
  `ANTI_RE` varchar(10) DEFAULT NULL,
  `ALP` varchar(10) DEFAULT NULL,
  `BILI` varchar(10) DEFAULT NULL,
  `SGPT` varchar(10) DEFAULT NULL,
  `L_F_T` varchar(10) DEFAULT NULL,
  `L_F_T_RE` varchar(10) DEFAULT NULL,
  `CREA` varchar(10) DEFAULT NULL,
  `CREA_RE` varchar(10) DEFAULT NULL,
  `UREA` varchar(10) DEFAULT NULL,
  `UREA_RE` varchar(10) DEFAULT NULL,
  `PREG_TEST` varchar(10) DEFAULT NULL,
  `PRE_NOT_RE` varchar(10) DEFAULT NULL,
  `PRE_NOT_DO` varchar(10) DEFAULT NULL,
  `PRE_RECO` varchar(10) DEFAULT NULL,
  `PSYCHOLGI` varchar(10) DEFAULT NULL,
  `E_C_G` varchar(10) DEFAULT NULL,
  `E_C_G_RE` varchar(10) DEFAULT NULL,
  `OTH_1` varchar(10) DEFAULT NULL,
  `OTH_2` varchar(10) DEFAULT NULL,
  `darem1` varchar(150) DEFAULT NULL,
  `darem2` varchar(150) DEFAULT NULL,
  `darem3` varchar(150) DEFAULT NULL,
  `rem1np` varchar(150) DEFAULT NULL,
  `rem2np` varchar(150) DEFAULT NULL,
  `larem1` varchar(500) DEFAULT NULL,
  `larnp1` varchar(500) DEFAULT NULL,
  `labrem` varchar(500) DEFAULT NULL,
  `xarem1` varchar(500) DEFAULT NULL,
  `xaremnp` varchar(500) DEFAULT NULL,
  `DIG1` varchar(5) DEFAULT NULL,
  `DIG2` varchar(5) DEFAULT NULL,
  `DIG3` varchar(5) DEFAULT NULL,
  `reject` varchar(100) DEFAULT NULL,
  `print_date` date DEFAULT NULL,
  `Print_TIME` datetime DEFAULT NULL,
  `unfit_re` varchar(100) DEFAULT NULL,
  `DEFORMITIES` varchar(10) DEFAULT NULL,
  `CNS_RE` varchar(10) DEFAULT NULL,
  `PSYCHIATRY_RE` varchar(10) DEFAULT NULL,
  `MICROFILARIA_re` varchar(10) DEFAULT NULL,
  `GIARDIA_re` varchar(10) DEFAULT NULL,
  `REJ_CON` varchar(10) DEFAULT NULL,
  `REJ_NO` int(11) DEFAULT NULL,
  `hdtx` int(11) DEFAULT NULL,
  `uai` varchar(50) DEFAULT NULL,
  `xres` varchar(100) DEFAULT NULL,
  `xrea` varchar(150) DEFAULT NULL,
  `lres` varchar(100) DEFAULT NULL,
  `lrea` varchar(150) DEFAULT NULL,
  `fres` varchar(100) DEFAULT NULL,
  `pres` varchar(100) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `uploaded` int(11) DEFAULT NULL,
  `mfile` varchar(50) DEFAULT NULL,
  `HEAR` varchar(20) DEFAULT NULL,
  `LUN` varchar(20) DEFAULT NULL,
  `qua_el_hiv_RE` varchar(20) DEFAULT NULL,
  `CLINICAL_RE` varchar(10) DEFAULT NULL,
  `res` varchar(50) DEFAULT NULL,
  `ltime` varchar(50) DEFAULT NULL,
  `resx` varchar(50) DEFAULT NULL,
  `xtime` varchar(50) DEFAULT NULL,
  `B_OTH` varchar(20) DEFAULT NULL,
  `B_GROUP` varchar(20) DEFAULT NULL,
  `B_GROUP_RE` varchar(10) DEFAULT NULL,
  `HEL` varchar(20) DEFAULT NULL,
  `S_BIL` varchar(20) DEFAULT NULL,
  `SAL` varchar(20) DEFAULT NULL,
  `V_CH` varchar(20) DEFAULT NULL,
  `OTHER0_RE` varchar(10) DEFAULT NULL,
  `AOC_RE` varchar(10) DEFAULT NULL,
  `PREG_TEST_RE` varchar(10) DEFAULT NULL,
  `PSYCHOLGI_RE` varchar(10) DEFAULT NULL,
  `OTH_1_RE` varchar(10) DEFAULT NULL,
  `SUG` varchar(20) DEFAULT NULL,
  `ALB` varchar(20) DEFAULT NULL,
  `BIL` varchar(20) DEFAULT NULL,
  `OTH` varchar(20) DEFAULT NULL,
  `UAI_RE` varchar(10) DEFAULT NULL,
  `HIV` varchar(20) DEFAULT NULL,
  `LAB` varchar(20) DEFAULT NULL,
  `VDRL` varchar(20) DEFAULT NULL,
  `tpha` varchar(20) DEFAULT NULL,
  `HER` varchar(20) DEFAULT NULL,
  `VARI` varchar(20) DEFAULT NULL,
  `head` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumedi`
--

INSERT INTO `sumedi` (`DREFNO`, `SERINO`, `CMB_NO`, `sDATE`, `ENT_DATE`, `DO_ACC_NO`, `CODE`, `NAME`, `LASTNAME`, `ADDRESS`, `M`, `SEX`, `AGE`, `STATUS`, `NATIONL`, `HI_FT`, `hi_in`, `WE`, `PAS_NO`, `PLA_OF_IS`, `POS_APP`, `REC_AG`, `P_N_D_RE`, `ALLERGY_RE`, `OTHERS_RE`, `EYE_VISON`, `EYE_NE_R`, `EYE_NE_L`, `EYE_NE_RE`, `EYE_FA`, `EYE_FA_R`, `EYE_FA_L`, `EYE_FA_RE`, `EYE_CO`, `EYE_CO_R`, `EYE_CO_L`, `YEAR_R`, `YEAR_L`, `YEAR_RRE`, `YEAR_LRE`, `CH_XRA_NO`, `CH_XRA_RE`, `LORD_NO`, `LORD_RE`, `BL_PRES`, `BL_PR_RE`, `HEAR_RE`, `LUN_RE`, `ABD_RE`, `HER_RE`, `VARI_RE`, `EXTR_RE`, `SKIN_RE`, `CLINICAL`, `LAB_RE`, `VDRL_RE`, `TPHA_RE`, `QUA_EL_HIV`, `SUG_RE`, `ALB_RE`, `BIL_RE`, `OTH_RE`, `HEL_RE`, `S_BIL_RE`, `SAL_RE`, `V_CH_RE`, `OTHER0`, `AOC`, `HEM`, `HEM_RE`, `MAL`, `MAL_RE`, `B_OTH_RE`, `ABD`, `SERO_RE`, `HIV_RE`, `F_B_S`, `F_B_S_RE`, `HBSA`, `HBSA_RE`, `ANTI`, `ANTI_RE`, `ALP`, `BILI`, `SGPT`, `L_F_T`, `L_F_T_RE`, `CREA`, `CREA_RE`, `UREA`, `UREA_RE`, `PREG_TEST`, `PRE_NOT_RE`, `PRE_NOT_DO`, `PRE_RECO`, `PSYCHOLGI`, `E_C_G`, `E_C_G_RE`, `OTH_1`, `OTH_2`, `darem1`, `darem2`, `darem3`, `rem1np`, `rem2np`, `larem1`, `larnp1`, `labrem`, `xarem1`, `xaremnp`, `DIG1`, `DIG2`, `DIG3`, `reject`, `print_date`, `Print_TIME`, `unfit_re`, `DEFORMITIES`, `CNS_RE`, `PSYCHIATRY_RE`, `MICROFILARIA_re`, `GIARDIA_re`, `REJ_CON`, `REJ_NO`, `hdtx`, `uai`, `xres`, `xrea`, `lres`, `lrea`, `fres`, `pres`, `id`, `uploaded`, `mfile`, `HEAR`, `LUN`, `qua_el_hiv_RE`, `CLINICAL_RE`, `res`, `ltime`, `resx`, `xtime`, `B_OTH`, `B_GROUP`, `B_GROUP_RE`, `HEL`, `S_BIL`, `SAL`, `V_CH`, `OTHER0_RE`, `AOC_RE`, `PREG_TEST_RE`, `PSYCHOLGI_RE`, `OTH_1_RE`, `SUG`, `ALB`, `BIL`, `OTH`, `UAI_RE`, `HIV`, `LAB`, `VDRL`, `tpha`, `HER`, `VARI`, `head`) VALUES
('3', 1, '', '2015-05-29', NULL, '', 'C007', 'SDFSDFSDF', 'DSF', '', '', 'MALE', '', 'SINGLE', 'SRI LANKAN', 0.00, 0.00, 0.00, 'N 232323', 'COLOMBO', '', 'CEF Company', 'NO', 'NO', 'NO', '1', 'NORMAL', 'NORMAL', '1', NULL, 'NORMAL', '', '1', '1', '', '', '', '', '1', '1', '', '1', '', '1', '120/60 mmHg', '1', '1', '1', '1', '1', '1', '1', '1', '', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', '1', '1', '', '', '', '1', '', '1', '1', '', '1', '1', '', '1', '', '1', '', '1', '', '', '', '', '1', '', '1', '', '1', '2', '', '', '', '', '', '1', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', 'N/A', NULL, NULL, 'NONE', NULL, '', '', '', '', NULL, NULL, NULL, '', 'N/A', '', 'N/A', '', 'FIT', 'FIT', NULL, NULL, '', '80', 'NORMAL', NULL, '1', '', '', '', '', '', '', '1', '', '', '', '', '1', '1', '1', '1', '1', '', '', '', '', '1', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `s_invcheq`
--

CREATE TABLE IF NOT EXISTS `s_invcheq` (
`ID` int(11) NOT NULL,
  `refno` varchar(20) DEFAULT NULL,
  `Sdate` date DEFAULT NULL,
  `cus_code` varchar(8) DEFAULT NULL,
  `CUS_NAME` varchar(100) DEFAULT NULL,
  `cheque_no` varchar(12) DEFAULT NULL,
  `che_date` date DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `che_amount` decimal(20,2) DEFAULT '0.00',
  `dev` char(1) DEFAULT '0',
  `sal_ex` varchar(5) DEFAULT NULL,
  `trn_type` char(10) DEFAULT NULL,
  `ex_date1` date DEFAULT NULL,
  `ex_date2` date DEFAULT NULL,
  `ex_flag` char(10) DEFAULT NULL,
  `ret_chno` char(10) DEFAULT NULL,
  `ret_chdate` date DEFAULT NULL,
  `noof` int(1) DEFAULT NULL,
  `ret_refno` char(20) DEFAULT NULL,
  `ch_owner` char(3) DEFAULT NULL,
  `ch_count_ret` char(1) DEFAULT NULL,
  `department` char(1) DEFAULT NULL,
  `SERI_NO` char(10) DEFAULT NULL,
  `W` varchar(255) DEFAULT NULL,
  `tmp_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `s_invo`
--

CREATE TABLE IF NOT EXISTS `s_invo` (
`id` int(11) NOT NULL,
  `REF_NO` varchar(20) DEFAULT NULL,
  `SDATE` date DEFAULT NULL,
  `STK_NO` varchar(20) DEFAULT NULL,
  `DESCRIPT` varchar(100) DEFAULT NULL,
  `UNIT` varchar(20) DEFAULT NULL,
  `PART_NO` varchar(50) DEFAULT NULL,
  `COST` decimal(20,2) DEFAULT '0.00',
  `PRICE` decimal(20,2) DEFAULT '0.00',
  `QTY` decimal(10,2) DEFAULT '0.00',
  `DEPARTMENT` varchar(30) DEFAULT NULL,
  `DIS_per` decimal(10,2) DEFAULT '0.00',
  `DIS_rs` decimal(20,2) DEFAULT '0.00',
  `GROUP` varchar(50) DEFAULT NULL,
  `REP` varchar(20) DEFAULT NULL,
  `TAX_PER` varchar(10) DEFAULT NULL,
  `ret_qty` varchar(20) DEFAULT NULL,
  `BRAND` varchar(20) DEFAULT NULL,
  `DEV` varchar(5) DEFAULT '0',
  `CANCELL` varchar(5) DEFAULT '0',
  `c_code` varchar(20) DEFAULT NULL,
  `seri_no` varchar(20) DEFAULT NULL,
  `Print_dis1` decimal(10,2) DEFAULT '0.00',
  `Print_dis2` decimal(10,2) DEFAULT '0.00',
  `Print_dis3` decimal(10,2) DEFAULT '0.00',
  `subtot` decimal(20,2) DEFAULT '0.00',
  `vatrate` varchar(10) DEFAULT NULL,
  `ad` varchar(20) DEFAULT NULL,
  `tmp_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `s_mas`
--

CREATE TABLE IF NOT EXISTS `s_mas` (
  `SDATE` date DEFAULT NULL,
  `STK_NO` decimal(20,0) DEFAULT NULL,
  `GROUP1` varchar(30) DEFAULT NULL,
  `SUBSTITUTE` varchar(30) DEFAULT NULL,
  `BRAND_NAME` varchar(30) DEFAULT NULL,
  `GEN_NO` varchar(20) DEFAULT NULL,
  `PART_NO` varchar(20) DEFAULT NULL,
  `DESCRIPT` varchar(100) DEFAULT NULL,
  `LOCATE_1` varchar(20) DEFAULT NULL,
  `LOCATE_2` varchar(20) DEFAULT NULL,
  `LOCATE_3` varchar(20) DEFAULT NULL,
  `LOCATE_4` varchar(20) DEFAULT NULL,
  `CAT` varchar(20) DEFAULT NULL,
  `COST` decimal(15,2) DEFAULT '0.00',
  `MARGIN` decimal(15,2) DEFAULT '0.00',
  `SELLING` decimal(51,2) DEFAULT '0.00',
  `AR_selling` decimal(15,2) DEFAULT '0.00',
  `OPEN_STK` decimal(51,2) DEFAULT '0.00',
  `STKQTY` decimal(15,2) DEFAULT '0.00',
  `QTYINHAND` decimal(15,2) DEFAULT '0.00',
  `QTYINHAND_STORES` decimal(15,2) DEFAULT '0.00',
  `UNIT` varchar(30) DEFAULT '0.00',
  `SIZE` decimal(15,2) DEFAULT '0.00',
  `RE_O_LEVEL` decimal(15,2) DEFAULT '0.00',
  `RE_O_QTY` decimal(15,2) DEFAULT '0.00',
  `SALE01` decimal(15,2) DEFAULT '0.00',
  `SALE02` decimal(15,2) DEFAULT '0.00',
  `SALE03` decimal(15,2) DEFAULT NULL,
  `SALE04` decimal(15,2) DEFAULT '0.00',
  `SALE05` decimal(15,2) DEFAULT '0.00',
  `SALE06` decimal(15,2) DEFAULT '0.00',
  `SALE07` decimal(15,2) DEFAULT '0.00',
  `SALE08` decimal(15,2) DEFAULT '0.00',
  `SALE09` decimal(15,2) DEFAULT '0.00',
  `SALE10` decimal(15,2) DEFAULT '0.00',
  `SALE11` decimal(15,2) DEFAULT '0.00',
  `SALE12` decimal(15,2) DEFAULT '0.00',
  `ENT_DATE` datetime DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `GROUP2` varchar(20) DEFAULT NULL,
  `GROUP3` varchar(20) DEFAULT NULL,
  `GROUP4` varchar(20) DEFAULT NULL,
  `Account` varchar(20) DEFAULT NULL,
  `costcenter` varchar(20) DEFAULT NULL,
  `acc_cost` varchar(20) DEFAULT NULL,
  `cus_ord` varchar(20) DEFAULT NULL,
  `delivered` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `Cat1` varchar(20) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `spType` char(50) DEFAULT NULL,
  `tmp_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_purmas`
--

CREATE TABLE IF NOT EXISTS `s_purmas` (
  `REFNO` varchar(30) DEFAULT NULL,
  `SDATE` date DEFAULT NULL,
  `ORDNO` varchar(30) DEFAULT NULL,
  `LCNO` varchar(50) DEFAULT NULL,
  `COUNTRY` varchar(30) DEFAULT NULL,
  `SUP_CODE` varchar(30) DEFAULT NULL,
  `SUP_NAME` varchar(100) DEFAULT NULL,
  `REMARK` varchar(100) DEFAULT NULL,
  `DEPARTMENT` varchar(30) DEFAULT NULL,
  `AMOUNT` varchar(20) DEFAULT NULL,
  `CANCEL` varchar(5) DEFAULT '0',
  `PUR_DATE` varchar(20) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
`id` bigint(20) NOT NULL,
  `TYPE` varchar(10) DEFAULT NULL,
  `tmp_no` varchar(30) DEFAULT NULL,
  `pi_no` varchar(50) DEFAULT NULL,
  `book_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `s_purrtrn`
--

CREATE TABLE IF NOT EXISTS `s_purrtrn` (
  `REFNO` varchar(30) DEFAULT NULL,
  `sDATE` date DEFAULT NULL,
  `STK_NO` varchar(30) DEFAULT NULL,
  `DESCRIPT` varchar(50) DEFAULT NULL,
  `COST` decimal(20,5) DEFAULT '0.00000',
  `MARGIN` decimal(20,5) DEFAULT '0.00000',
  `SELLING` decimal(20,5) DEFAULT '0.00000',
  `REC_QTY` decimal(20,5) DEFAULT '0.00000',
  `FOB` decimal(20,0) DEFAULT '0',
  `DEPARTMENT` varchar(150) DEFAULT NULL,
  `QTYINHAND` decimal(20,2) DEFAULT '0.00',
  `O_QTY` decimal(20,2) DEFAULT '0.00',
  `DISCOUNT` decimal(20,2) DEFAULT '0.00',
  `ret_qty` decimal(20,2) DEFAULT '0.00',
  `Cost_c` decimal(20,2) DEFAULT '0.00',
  `cost_seling` decimal(20,2) DEFAULT '0.00',
  `cost_margin` decimal(20,2) DEFAULT '0.00',
  `acc_COST` decimal(20,2) DEFAULT '0.00',
  `acc_COST_c` decimal(20,2) DEFAULT '0.00',
  `vatrate` decimal(20,2) DEFAULT '0.00',
  `tmp_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_salma`
--

CREATE TABLE IF NOT EXISTS `s_salma` (
`id` bigint(20) NOT NULL,
  `REF_NO` varchar(25) DEFAULT NULL,
  `TRN_TYPE` varchar(10) DEFAULT NULL,
  `SDATE` date DEFAULT NULL,
  `C_CODE` varchar(20) DEFAULT NULL,
  `CUS_NAME` varchar(100) DEFAULT NULL,
  `C_ADD1` varchar(100) DEFAULT NULL,
  `TYPE` varchar(10) DEFAULT NULL,
  `SAL_EX` varchar(20) DEFAULT NULL,
  `DISCOU` decimal(20,2) DEFAULT '0.00',
  `AMOUNT` decimal(20,2) DEFAULT '0.00',
  `GST` decimal(20,2) DEFAULT '0.00',
  `GRAND_TOT` decimal(20,2) DEFAULT '0.00',
  `DUMMY_VAL` decimal(20,2) DEFAULT '0.00',
  `DIS` decimal(20,2) DEFAULT '0.00',
  `DIS1` decimal(20,2) DEFAULT '0.00',
  `DIS2` decimal(20,2) DEFAULT '0.00',
  `DIS_RUP` decimal(20,2) DEFAULT '0.00',
  `CASH` decimal(20,2) DEFAULT '0.00',
  `TOTPAY` decimal(20,2) DEFAULT '0.00',
  `ORD_NO` varchar(25) DEFAULT NULL,
  `ORD_DA` varchar(25) DEFAULT NULL,
  `SETTLED` varchar(10) DEFAULT NULL,
  `TOTPAY1` varchar(20) DEFAULT NULL,
  `DES_CAT` varchar(20) DEFAULT NULL,
  `DEPARTMENT` varchar(20) DEFAULT NULL,
  `REMARK` varchar(50) DEFAULT NULL,
  `CANCELL` varchar(10) DEFAULT '0',
  `BTT` varchar(20) DEFAULT NULL,
  `VAT` varchar(20) DEFAULT NULL,
  `VAT_VAL` decimal(20,2) DEFAULT '0.00',
  `Brand` varchar(20) DEFAULT NULL,
  `DEV` varchar(10) DEFAULT '0',
  `Account` varchar(10) DEFAULT NULL,
  `Accname` varchar(10) DEFAULT NULL,
  `Costcenter` varchar(10) DEFAULT NULL,
  `RET_AMO` decimal(20,2) DEFAULT '0.00',
  `cre_pe` int(11) DEFAULT NULL,
  `Comm` varchar(20) DEFAULT NULL,
  `red` varchar(20) DEFAULT NULL,
  `deli_date` date DEFAULT NULL,
  `seri_no` varchar(20) DEFAULT NULL,
  `points` varchar(20) DEFAULT NULL,
  `LOCK1` varchar(10) DEFAULT NULL,
  `deliin` varchar(10) DEFAULT NULL,
  `SVAT` decimal(8,0) DEFAULT '0',
  `REQ_DATE` date DEFAULT NULL,
  `tmp_no` varchar(30) DEFAULT NULL,
  `vat_no` varchar(20) DEFAULT NULL,
  `s_vat_no` varchar(20) DEFAULT NULL,
  `veheno` varchar(30) DEFAULT NULL,
  `driver` varchar(30) DEFAULT NULL,
  `loaddate` date DEFAULT NULL,
  `pirnt_serial` varchar(5) DEFAULT '0',
  `userid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `s_salma`
--

INSERT INTO `s_salma` (`id`, `REF_NO`, `TRN_TYPE`, `SDATE`, `C_CODE`, `CUS_NAME`, `C_ADD1`, `TYPE`, `SAL_EX`, `DISCOU`, `AMOUNT`, `GST`, `GRAND_TOT`, `DUMMY_VAL`, `DIS`, `DIS1`, `DIS2`, `DIS_RUP`, `CASH`, `TOTPAY`, `ORD_NO`, `ORD_DA`, `SETTLED`, `TOTPAY1`, `DES_CAT`, `DEPARTMENT`, `REMARK`, `CANCELL`, `BTT`, `VAT`, `VAT_VAL`, `Brand`, `DEV`, `Account`, `Accname`, `Costcenter`, `RET_AMO`, `cre_pe`, `Comm`, `red`, `deli_date`, `seri_no`, `points`, `LOCK1`, `deliin`, `SVAT`, `REQ_DATE`, `tmp_no`, `vat_no`, `s_vat_no`, `veheno`, `driver`, `loaddate`, `pirnt_serial`, `userid`) VALUES
(6, '5', NULL, '2015-05-29', '', '', NULL, NULL, NULL, 0.00, 0.00, 0.00, 7500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, 0.00, NULL, '', NULL, 'n 1215346', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL),
(7, '', NULL, '2015-05-29', '', '', NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, 0.00, NULL, '', NULL, 'N12121212', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL),
(8, '1', NULL, '2015-05-29', '', '', NULL, NULL, NULL, 0.00, 0.00, 0.00, 7500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 7500.00, 7500.00, '', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, 0.00, NULL, '', NULL, 'N 5557773', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL),
(9, '2', NULL, '2015-05-29', '', '', NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, 0.00, NULL, '', NULL, 'N12121121', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL),
(12, '2', NULL, '2015-05-29', '', '', NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, 0.00, NULL, '', NULL, 'N2322132', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL),
(17, '3', NULL, '2015-05-29', 'C007', 'CEF Company', NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, 0.00, NULL, '', NULL, 'N 232323', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s_salrep`
--

CREATE TABLE IF NOT EXISTS `s_salrep` (
  `REPCODE` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `target` varchar(50) DEFAULT NULL,
  `DEL` varchar(50) DEFAULT NULL,
  `ordNo` varchar(50) DEFAULT NULL,
  `cat` varchar(50) DEFAULT NULL,
  `cancel` varchar(5) DEFAULT '0',
  `RGROUP` varchar(50) DEFAULT NULL,
  `DONO` decimal(15,2) DEFAULT '0.00',
  `tmp_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_stomas`
--

CREATE TABLE IF NOT EXISTS `s_stomas` (
  `CODE` varchar(5) DEFAULT NULL,
  `DESCRIPTION` varchar(50) DEFAULT NULL,
  `act` char(10) DEFAULT NULL,
  `tmp_no` varchar(30) DEFAULT NULL,
  `cancel` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_submas`
--

CREATE TABLE IF NOT EXISTS `s_submas` (
  `STO_CODE` varchar(5) DEFAULT NULL,
  `STK_NO` varchar(5) DEFAULT NULL,
  `DESCRIPt` varchar(55) DEFAULT NULL,
  `OPEN_STK` decimal(20,2) DEFAULT '0.00',
  `OPENT_DATE` datetime DEFAULT NULL,
  `QTYINHAND` double(20,2) DEFAULT '0.00',
  `tmp_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_trn`
--

CREATE TABLE IF NOT EXISTS `s_trn` (
`ID` int(11) NOT NULL,
  `SDATE` date DEFAULT NULL,
  `STK_NO` varchar(50) DEFAULT NULL,
  `REFNO` varchar(50) DEFAULT NULL,
  `QTY` decimal(15,2) DEFAULT '0.00',
  `LEDINDI` varchar(50) DEFAULT NULL,
  `DEPARTMENT` varchar(50) DEFAULT NULL,
  `seri_no` varchar(50) DEFAULT NULL,
  `Dev` varchar(50) DEFAULT '0',
  `SAL_EX` varchar(50) DEFAULT NULL,
  `ACTIVE` varchar(10) DEFAULT NULL,
  `DONO` char(20) DEFAULT NULL,
  `tmp_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbmed`
--

CREATE TABLE IF NOT EXISTS `tbmed` (
  `drefno` varchar(50) DEFAULT NULL,
  `ppno` varchar(50) DEFAULT NULL,
  `seri_no` int(11) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(500) DEFAULT NULL,
  `show` varchar(5) DEFAULT NULL,
  `PDATE` date DEFAULT NULL,
  `PTIME` datetime DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmpitem`
--

CREATE TABLE IF NOT EXISTS `tmpitem` (
  `itemcode` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_inv_data`
--

CREATE TABLE IF NOT EXISTS `tmp_inv_data` (
`id` bigint(20) NOT NULL,
  `str_invno` varchar(20) NOT NULL DEFAULT '',
  `str_code` varchar(20) DEFAULT NULL,
  `str_description` varchar(50) DEFAULT NULL,
  `cur_rate` decimal(20,2) DEFAULT '0.00',
  `cur_qty` decimal(20,2) DEFAULT '0.00',
  `dis_per` decimal(20,10) DEFAULT '0.0000000000',
  `cur_discount` decimal(20,2) DEFAULT '0.00',
  `cur_subtot` decimal(20,2) DEFAULT '0.00',
  `actual_selling` decimal(20,2) DEFAULT '0.00',
  `brand` varchar(20) DEFAULT NULL,
  `ad` varchar(20) DEFAULT NULL,
  `tmp_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_lab_test_data`
--

CREATE TABLE IF NOT EXISTS `tmp_lab_test_data` (
  `code` varchar(20) DEFAULT NULL,
  `test_desc` varchar(50) DEFAULT NULL,
  `munit` varchar(20) DEFAULT NULL,
  `range_from` varchar(50) DEFAULT NULL,
  `range_to` varchar(50) DEFAULT NULL,
  `under_range` varchar(50) DEFAULT NULL,
  `exceed_range` varchar(50) DEFAULT NULL,
  `normal_range` varchar(50) DEFAULT NULL,
  `female_range_from` varchar(50) DEFAULT NULL,
  `female_range_to` varchar(50) DEFAULT NULL,
  `range_sep` varchar(50) DEFAULT NULL,
  `mtype` varchar(50) DEFAULT NULL,
  `under` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `tmpno` bigint(20) DEFAULT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_lab_test_pa_app_trn`
--

CREATE TABLE IF NOT EXISTS `tmp_lab_test_pa_app_trn` (
  `refno` varchar(50) DEFAULT NULL,
  `paname` varchar(255) DEFAULT NULL,
  `testname` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `result` varchar(100) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
`id` int(11) NOT NULL,
  `labdate` date DEFAULT NULL,
  `recdet` varchar(55) DEFAULT NULL,
  `rem1` varchar(255) DEFAULT NULL,
  `rangef` varchar(50) DEFAULT NULL,
  `rangeto` varchar(50) DEFAULT NULL,
  `timee` varchar(50) DEFAULT NULL,
  `doctr` varchar(50) DEFAULT NULL,
  `test_code` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `tmpno` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_opd_med_test`
--

CREATE TABLE IF NOT EXISTS `tmp_opd_med_test` (
  `refno` varchar(50) DEFAULT NULL,
  `test_name` varchar(50) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT '0.00',
  `xamount` decimal(15,2) DEFAULT NULL,
  `net` decimal(15,2) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `test_name1` varchar(255) DEFAULT NULL,
  `tmpno` varchar(255) DEFAULT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pur_data`
--

CREATE TABLE IF NOT EXISTS `tmp_pur_data` (
`id` bigint(20) NOT NULL,
  `str_invno` varchar(20) NOT NULL DEFAULT '',
  `str_code` varchar(20) DEFAULT NULL,
  `str_description` varchar(50) DEFAULT NULL,
  `cur_rate` decimal(20,2) DEFAULT '0.00',
  `cur_qty` decimal(20,2) DEFAULT '0.00',
  `dis_per` decimal(20,10) DEFAULT '0.0000000000',
  `cur_discount` decimal(20,2) DEFAULT '0.00',
  `cur_subtot` decimal(20,2) DEFAULT '0.00',
  `actual_selling` decimal(20,2) DEFAULT '0.00',
  `brand` varchar(20) DEFAULT NULL,
  `ad` varchar(20) DEFAULT NULL,
  `tmp_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_treatment`
--

CREATE TABLE IF NOT EXISTS `tmp_treatment` (
  `pkg_code` varchar(10) DEFAULT NULL,
  `code` varchar(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `sel` varchar(5) DEFAULT '0',
  `user_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tremas`
--

CREATE TABLE IF NOT EXISTS `tremas` (
  `TCODE` int(11) NOT NULL DEFAULT '0',
  `TDESCRIPT` varchar(50) DEFAULT NULL,
  `TAMOUNT` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tremas`
--

INSERT INTO `tremas` (`TCODE`, `TDESCRIPT`, `TAMOUNT`) VALUES
(7, 'GAMCA FULL MEDICAL', 7500.00),
(8, 'QUTAR MEDICAL', 7500.00);

-- --------------------------------------------------------

--
-- Table structure for table `userpermission`
--

CREATE TABLE IF NOT EXISTS `userpermission` (
  `username` varchar(200) DEFAULT NULL,
  `userpass` varchar(50) DEFAULT NULL,
  `grp` varchar(50) DEFAULT NULL,
  `docid` bigint(20) DEFAULT '0',
  `doc_view` smallint(11) DEFAULT '0',
  `doc_feed` smallint(1) DEFAULT '0',
  `doc_mod` smallint(1) DEFAULT '0',
  `price_edit` smallint(1) DEFAULT '0',
  `admin` smallint(1) DEFAULT '0',
  `dev` smallint(1) DEFAULT '0',
  `doc_print` smallint(1) DEFAULT '0',
  `comcode` smallint(1) DEFAULT '0',
  `comname` smallint(1) DEFAULT '0',
  `sal_ex` varchar(100) DEFAULT NULL,
  `logdate` date DEFAULT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8993 ;

--
-- Dumping data for table `userpermission`
--

INSERT INTO `userpermission` (`username`, `userpass`, `grp`, `docid`, `doc_view`, `doc_feed`, `doc_mod`, `price_edit`, `admin`, `dev`, `doc_print`, `comcode`, `comname`, `sal_ex`, `logdate`, `id`) VALUES
('user', 'aeb3135b436aa55373822c010763dd54', 'Administration', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8741),
('user', 'aeb3135b436aa55373822c010763dd54', 'Administration', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8742),
('user', 'aeb3135b436aa55373822c010763dd54', 'Administration', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8743),
('user', 'aeb3135b436aa55373822c010763dd54', 'Master Files', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8744),
('user', 'aeb3135b436aa55373822c010763dd54', 'Master Files', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8745),
('user', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8746),
('user', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8747),
('user', 'aeb3135b436aa55373822c010763dd54', 'Reports-Sales', 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8748),
('user', 'aeb3135b436aa55373822c010763dd54', 'Reports-Sales', 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8749),
('user', 'aeb3135b436aa55373822c010763dd54', 'Master Files', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8750),
('user', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8751),
('user', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8752),
('user', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8753),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Administration', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8802),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Administration', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8803),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Administration', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8804),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Master Files', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8805),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Master Files', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8806),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Data Capture', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8807),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Data Capture', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8808),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Reports-Sales', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8809),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Reports-Sales', 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8810),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Master Files', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8811),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Data Capture', 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8812),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Data Capture', 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8813),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Data Capture', 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8814),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Inquiry', 14, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8815),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Administration', 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8816),
('fathima', '81dc9bdb52d04dc20036dbd8313ed055', 'Data Capture', 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8817),
('user2', '202cb962ac59075b964b07152d234b70', 'Administration', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8834),
('user2', '202cb962ac59075b964b07152d234b70', 'Administration', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8835),
('user2', '202cb962ac59075b964b07152d234b70', 'Administration', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8836),
('user2', '202cb962ac59075b964b07152d234b70', 'Master Files', 4, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8837),
('user2', '202cb962ac59075b964b07152d234b70', 'Master Files', 5, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8838),
('user2', '202cb962ac59075b964b07152d234b70', 'Data Capture', 6, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8839),
('user2', '202cb962ac59075b964b07152d234b70', 'Data Capture', 7, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8840),
('user2', '202cb962ac59075b964b07152d234b70', 'Reports-Sales', 8, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8841),
('user2', '202cb962ac59075b964b07152d234b70', 'Reports-Sales', 9, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8842),
('user2', '202cb962ac59075b964b07152d234b70', 'Master Files', 10, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8843),
('user2', '202cb962ac59075b964b07152d234b70', 'Data Capture', 11, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8844),
('user2', '202cb962ac59075b964b07152d234b70', 'Data Capture', 12, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8845),
('user2', '202cb962ac59075b964b07152d234b70', 'Data Capture', 13, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8846),
('user2', '202cb962ac59075b964b07152d234b70', 'Inquiry', 14, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8847),
('user2', '202cb962ac59075b964b07152d234b70', 'Administration', 15, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8848),
('user2', '202cb962ac59075b964b07152d234b70', 'Data Capture', 16, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8849),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Administration', 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8866),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Administration', 2, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8867),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Administration', 3, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8868),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Master Files', 4, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8869),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Master Files', 5, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8870),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 6, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8871),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 7, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8872),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Reports-Sales', 8, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8873),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Reports-Sales', 9, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8874),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Master Files', 10, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8875),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 11, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8876),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 12, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8877),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 13, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8878),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Inquiry', 14, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8879),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Administration', 15, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8880),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Data Capture', 16, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8881),
('admin', 'aeb3135b436aa55373822c010763dd54', 'Reports-Sales', 17, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8882),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Administration', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8900),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Administration', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8901),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Administration', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8902),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Master Files', 4, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8903),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Master Files', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8904),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Data Capture', 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8905),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Data Capture', 7, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8906),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Reports-Sales', 8, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8907),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Reports-Sales', 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8908),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Master Files', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8909),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Data Capture', 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8910),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Data Capture', 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8911),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Data Capture', 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8912),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Inquiry', 14, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8913),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Administration', 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8914),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Data Capture', 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8915),
('lab', 'e10adc3949ba59abbe56e057f20f883e', 'Reports-Sales', 17, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8916),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Administration', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8917),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Administration', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8918),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Administration', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8919),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Master Files', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8920),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Master Files', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8921),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Data Capture', 6, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8922),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Data Capture', 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8923),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Reports-Sales', 8, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8924),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Reports-Sales', 9, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8925),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Master Files', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8926),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Data Capture', 11, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8927),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Data Capture', 12, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8928),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Data Capture', 13, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8929),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Inquiry', 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8930),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Administration', 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8931),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Data Capture', 16, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8932),
('shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', 'Reports-Sales', 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8933),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Administration', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8934),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Administration', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8935),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Administration', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8936),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Master Files', 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8937),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Master Files', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8938),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Data Capture', 6, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8939),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Data Capture', 7, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8940),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Reports-Sales', 8, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8941),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Reports-Sales', 9, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8942),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Master Files', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8943),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Data Capture', 11, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8944),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Data Capture', 12, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8945),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Data Capture', 13, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8946),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Inquiry', 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8947),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Administration', 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8948),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Data Capture', 16, 1, 1, 0, 0, 0, 0, 1, 0, 0, NULL, NULL, 8949),
('shihana', '3a5b36b35446ef83efee49ba6038e2e9', 'Reports-Sales', 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 8950),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Administration', 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8951),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Administration', 2, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8952),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Administration', 3, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8953),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Master Files', 4, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8954),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Master Files', 5, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8955),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Data Capture', 6, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8956),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Data Capture', 7, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8957),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Reports-Sales', 8, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8958),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Reports-Sales', 9, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8959),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Master Files', 10, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8960),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Data Capture', 11, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8961),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Data Capture', 12, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8962),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Data Capture', 13, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8963),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Inquiry', 14, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8964),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Administration', 15, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8965),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Data Capture', 16, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8966),
('Ishraq', '00fe51522363321812319dc8923130f3', 'Reports-Sales', 17, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8967),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Administration', 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8968),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Administration', 2, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8969),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Administration', 3, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8970),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Master Files', 4, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8971),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Master Files', 5, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8972),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Data Capture', 6, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8973),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Data Capture', 7, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8974),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Master Files', 8, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8975),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Master Files', 9, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8976),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Master Files', 10, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8977),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Data Capture', 11, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8978),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Data Capture', 12, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8979),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Inquiry', 13, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8980),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Report', 14, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8981),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Report', 15, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8982),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Data Capture', 16, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8983),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Data Capture', 17, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8984),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Data Capture', 18, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8985),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Data Capture', 19, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8986),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Inquiry', 20, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8987),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Report', 21, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8988),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Administration', 22, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8989),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Master Files', 23, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8990),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Inquiry', 24, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8991),
('gayal', '94304e17f516f16475409b1ec68f4f60', 'Master Files', 25, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 8992);

-- --------------------------------------------------------

--
-- Table structure for table `user_mast`
--

CREATE TABLE IF NOT EXISTS `user_mast` (
`id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pass` varchar(100) DEFAULT NULL,
  `user_level` varchar(10) DEFAULT NULL,
  `dev` varchar(10) DEFAULT NULL,
  `sal_ex` varchar(10) DEFAULT '0',
  `sal_dep` varchar(10) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `user_mast`
--

INSERT INTO `user_mast` (`id`, `user_name`, `user_pass`, `user_level`, `dev`, `sal_ex`, `sal_dep`) VALUES
(10, 'gayal', '94304e17f516f16475409b1ec68f4f60', '1', '0', NULL, NULL),
(81, 'admin', 'aeb3135b436aa55373822c010763dd54', '1', '0', '0', '0'),
(82, 'user', 'aeb3135b436aa55373822c010763dd54', '0', '0', '0', '0'),
(83, 'shafna.zameen', '54e29b3faa79dec48b39ce060a92c4c9', '0', '0', '0', '0'),
(84, 'shihana', '3a5b36b35446ef83efee49ba6038e2e9', '0', '0', '0', '0'),
(85, 'broom', '202cb962ac59075b964b07152d234b70', '0', '0', '0', '0'),
(86, 'fathima', '81dc9bdb52d04dc20036dbd8313ed055', '0', '0', '0', '0'),
(87, 'lab', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '0', '0'),
(88, 'user2', '202cb962ac59075b964b07152d234b70', '0', '0', '0', '0'),
(89, 'Ishraq', '00fe51522363321812319dc8923130f3', '1', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `CODE` varchar(30) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `ADD1` varchar(100) DEFAULT NULL,
  `ADD2` varchar(100) DEFAULT NULL,
  `OPBAL` float(30,0) DEFAULT NULL,
  `TELE1` varchar(50) DEFAULT NULL,
  `TELE2` varchar(50) DEFAULT NULL,
  `CONT` varchar(50) DEFAULT NULL,
  `CUR_BAL` varchar(30) DEFAULT NULL,
  `OPDATE` date DEFAULT NULL,
  `cLIMIT` varchar(30) DEFAULT NULL,
  `PEN` varchar(30) DEFAULT NULL,
  `PENDA` varchar(30) DEFAULT NULL,
  `FAX` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `vatno` varchar(50) DEFAULT NULL,
  `acno` varchar(30) DEFAULT NULL,
  `CAT` varchar(10) DEFAULT NULL,
  `RET_CHEQ` varchar(30) DEFAULT NULL,
  `rep` varchar(20) DEFAULT NULL,
  `cus_type` varchar(30) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `AltMessage` varchar(100) DEFAULT NULL,
  `bank_gr_date` date DEFAULT NULL,
  `temp_limit` varchar(30) DEFAULT NULL,
  `blacklist` varchar(30) DEFAULT NULL,
  `o90` varchar(30) DEFAULT NULL,
  `Over_DUE_IG_Date` date DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `provi` varchar(50) DEFAULT NULL,
  `pen2` varchar(50) DEFAULT NULL,
  `incdays` varchar(30) DEFAULT NULL,
  `chk_bangr` varchar(30) DEFAULT NULL,
  `field1` varchar(30) DEFAULT NULL,
  `PEN0` varchar(30) DEFAULT NULL,
  `svatno` varchar(50) DEFAULT NULL,
  `commoncode` varchar(50) DEFAULT NULL,
  `tmp_no` varchar(50) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pa_app_lab_mas`
--
CREATE TABLE IF NOT EXISTS `view_pa_app_lab_mas` (
`refno` varchar(20)
,`entdate` date
,`serino` int(11)
,`doc_code` varchar(10)
,`docnname` varchar(255)
,`paname` varchar(255)
,`apptime` varchar(50)
,`tele` varchar(20)
,`remark` varchar(255)
,`paadd` varchar(255)
,`charges` decimal(10,2)
,`hoscha` decimal(10,2)
,`sdate` date
,`id` int(11)
,`type` varchar(15)
,`age` varchar(10)
,`testdes` varchar(100)
,`rate` decimal(10,2)
,`discount` decimal(10,2)
,`xamount` decimal(10,2)
,`testcode` varchar(11)
,`tmpno` bigint(10)
,`cancell` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_userpermission`
--
CREATE TABLE IF NOT EXISTS `view_userpermission` (
`docname` varchar(100)
,`name` varchar(30)
,`grp` varchar(30)
,`docid` bigint(20)
,`username` varchar(200)
,`userpass` varchar(50)
,`doc_view` smallint(11)
,`doc_feed` smallint(1)
,`doc_mod` smallint(1)
,`price_edit` smallint(1)
,`admin` smallint(1)
,`dev` smallint(1)
,`doc_print` smallint(1)
,`sal_ex` varchar(100)
);
-- --------------------------------------------------------

--
-- Structure for view `view_pa_app_lab_mas`
--
DROP TABLE IF EXISTS `view_pa_app_lab_mas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lotterix`@`112.134.%.%` SQL SECURITY DEFINER VIEW `view_pa_app_lab_mas` AS select `pa_app`.`refno` AS `refno`,`pa_app`.`entdate` AS `entdate`,`pa_app`.`serino` AS `serino`,`pa_app`.`doc_code` AS `doc_code`,`pa_app`.`docnname` AS `docnname`,`pa_app`.`paname` AS `paname`,`pa_app`.`apptime` AS `apptime`,`pa_app`.`tele` AS `tele`,`pa_app`.`remark` AS `remark`,`pa_app`.`paadd` AS `paadd`,`pa_app`.`charges` AS `charges`,`pa_app`.`hoscha` AS `hoscha`,`pa_app`.`sdate` AS `sdate`,`pa_app`.`id` AS `id`,`pa_app`.`type` AS `type`,`pa_app`.`age` AS `age`,`lab_test_pa_app_mas`.`testdes` AS `testdes`,`lab_test_pa_app_mas`.`rate` AS `rate`,`lab_test_pa_app_mas`.`discount` AS `discount`,`lab_test_pa_app_mas`.`xamount` AS `xamount`,`lab_test_pa_app_mas`.`testcode` AS `testcode`,`lab_test_pa_app_mas`.`tmpno` AS `tmpno`,`pa_app`.`cancell` AS `cancell` from (`pa_app` join `lab_test_pa_app_mas` on((`pa_app`.`refno` = `lab_test_pa_app_mas`.`refno`)));

-- --------------------------------------------------------

--
-- Structure for view `view_userpermission`
--
DROP TABLE IF EXISTS `view_userpermission`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_userpermission` AS select `doc`.`docname` AS `docname`,`doc`.`name` AS `name`,`doc`.`grp` AS `grp`,`doc`.`docid` AS `docid`,`userpermission`.`username` AS `username`,`userpermission`.`userpass` AS `userpass`,`userpermission`.`doc_view` AS `doc_view`,`userpermission`.`doc_feed` AS `doc_feed`,`userpermission`.`doc_mod` AS `doc_mod`,`userpermission`.`price_edit` AS `price_edit`,`userpermission`.`admin` AS `admin`,`userpermission`.`dev` AS `dev`,`userpermission`.`doc_print` AS `doc_print`,`userpermission`.`sal_ex` AS `sal_ex` from (`userpermission` join `doc` on((`userpermission`.`docid` = `doc`.`docid`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
 ADD KEY `doc` (`docid`,`grp`);

--
-- Indexes for table `docmas`
--
ALTER TABLE `docmas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry_log`
--
ALTER TABLE `entry_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invpara`
--
ALTER TABLE `invpara`
 ADD PRIMARY KEY (`COMPANY`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test_pa_app_mas`
--
ALTER TABLE `lab_test_pa_app_mas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test_pa_app_trn`
--
ALTER TABLE `lab_test_pa_app_trn`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledge`
--
ALTER TABLE `ledge`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pa_app`
--
ALTER TABLE `pa_app`
 ADD PRIMARY KEY (`id`,`refno`);

--
-- Indexes for table `pa_app_channel`
--
ALTER TABLE `pa_app_channel`
 ADD PRIMARY KEY (`id`,`refno`);

--
-- Indexes for table `pa_disapp`
--
ALTER TABLE `pa_disapp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pa_reg`
--
ALTER TABLE `pa_reg`
 ADD PRIMARY KEY (`id`,`refno`);

--
-- Indexes for table `rege`
--
ALTER TABLE `rege`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regtran`
--
ALTER TABLE `regtran`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_invcheq`
--
ALTER TABLE `s_invcheq`
 ADD PRIMARY KEY (`ID`), ADD KEY `s_invcheq` (`refno`,`Sdate`,`cus_code`,`che_date`);

--
-- Indexes for table `s_invo`
--
ALTER TABLE `s_invo`
 ADD PRIMARY KEY (`id`), ADD KEY `s_invo` (`REF_NO`,`SDATE`,`STK_NO`);

--
-- Indexes for table `s_mas`
--
ALTER TABLE `s_mas`
 ADD KEY `s_mas` (`SDATE`,`STK_NO`);

--
-- Indexes for table `s_purmas`
--
ALTER TABLE `s_purmas`
 ADD PRIMARY KEY (`id`), ADD KEY `s_purmas` (`REFNO`,`SDATE`,`ORDNO`);

--
-- Indexes for table `s_purrtrn`
--
ALTER TABLE `s_purrtrn`
 ADD KEY `s_purrtrn` (`REFNO`,`sDATE`,`STK_NO`);

--
-- Indexes for table `s_salma`
--
ALTER TABLE `s_salma`
 ADD PRIMARY KEY (`id`), ADD KEY `s_salma` (`REF_NO`,`SDATE`,`C_CODE`,`SAL_EX`);

--
-- Indexes for table `s_salrep`
--
ALTER TABLE `s_salrep`
 ADD PRIMARY KEY (`REPCODE`), ADD KEY `s_salrep` (`REPCODE`,`Name`);

--
-- Indexes for table `s_stomas`
--
ALTER TABLE `s_stomas`
 ADD KEY `s_stomas` (`CODE`);

--
-- Indexes for table `s_submas`
--
ALTER TABLE `s_submas`
 ADD KEY `s_submas` (`STO_CODE`,`STK_NO`);

--
-- Indexes for table `s_trn`
--
ALTER TABLE `s_trn`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tmp_inv_data`
--
ALTER TABLE `tmp_inv_data`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_lab_test_data`
--
ALTER TABLE `tmp_lab_test_data`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_lab_test_pa_app_trn`
--
ALTER TABLE `tmp_lab_test_pa_app_trn`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_opd_med_test`
--
ALTER TABLE `tmp_opd_med_test`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_pur_data`
--
ALTER TABLE `tmp_pur_data`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tremas`
--
ALTER TABLE `tremas`
 ADD PRIMARY KEY (`TCODE`);

--
-- Indexes for table `userpermission`
--
ALTER TABLE `userpermission`
 ADD PRIMARY KEY (`id`), ADD KEY `userpermission` (`username`,`grp`,`docid`);

--
-- Indexes for table `user_mast`
--
ALTER TABLE `user_mast`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
 ADD KEY `vendor` (`CODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docmas`
--
ALTER TABLE `docmas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `entry_log`
--
ALTER TABLE `entry_log`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4079;
--
-- AUTO_INCREMENT for table `lab_test_pa_app_mas`
--
ALTER TABLE `lab_test_pa_app_mas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_test_pa_app_trn`
--
ALTER TABLE `lab_test_pa_app_trn`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ledge`
--
ALTER TABLE `ledge`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pa_app`
--
ALTER TABLE `pa_app`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pa_app_channel`
--
ALTER TABLE `pa_app_channel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pa_disapp`
--
ALTER TABLE `pa_disapp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pa_reg`
--
ALTER TABLE `pa_reg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rege`
--
ALTER TABLE `rege`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `regtran`
--
ALTER TABLE `regtran`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `s_invcheq`
--
ALTER TABLE `s_invcheq`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `s_invo`
--
ALTER TABLE `s_invo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `s_purmas`
--
ALTER TABLE `s_purmas`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `s_salma`
--
ALTER TABLE `s_salma`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `s_trn`
--
ALTER TABLE `s_trn`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_inv_data`
--
ALTER TABLE `tmp_inv_data`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_lab_test_data`
--
ALTER TABLE `tmp_lab_test_data`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_lab_test_pa_app_trn`
--
ALTER TABLE `tmp_lab_test_pa_app_trn`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_opd_med_test`
--
ALTER TABLE `tmp_opd_med_test`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_pur_data`
--
ALTER TABLE `tmp_pur_data`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userpermission`
--
ALTER TABLE `userpermission`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8993;
--
-- AUTO_INCREMENT for table `user_mast`
--
ALTER TABLE `user_mast`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
