-- Database: `tourism` --
-- Table `activity` --
CREATE TABLE `activity` (
  `Activity_id` int(50) NOT NULL AUTO_INCREMENT,
  `Activity_Name` varchar(100) NOT NULL,
  `Activity_Description` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

INSERT INTO `activity` (`Activity_id`, `Activity_Name`, `Activity_Description`, `Timestamp`) VALUES
(100, 'Motel', 'It inludes', '2017-11-26 20:47:58'),
(101, 'Hotel', '\r\nkk\r\n', '2017-11-14 23:42:36'),
(103, 'Guest House', 'It includes\r\n1.\r\n2.\r\n3.\r\n4.\r\n', '2017-11-12 08:12:42'),
(104, 'Pension', 'it includes what is called so what i want to say and what u want to say\r\n\r\n', '2017-11-28 22:02:32'),
(105, 'Restuarant', 'jfsdkjfhsakjfhkjshfka', '2017-11-29 09:31:16');

-- Table `authentication_role` --
CREATE TABLE `authentication_role` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Type_Roles` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table `establishment_entry` --
CREATE TABLE `establishment_entry` (
  `Establishment_Id` int(255) NOT NULL AUTO_INCREMENT,
  `No_Rooms` int(255) DEFAULT NULL,
  `No_Beds` int(255) NOT NULL,
  `Establishment_Name` varchar(255) NOT NULL,
  `Permit_Number` varchar(255) NOT NULL,
  `Tin_No` varchar(255) NOT NULL,
  `Activity` varchar(255) NOT NULL,
  `Establishment_Zoba` varchar(50) NOT NULL,
  `Establishment_Town` varchar(50) NOT NULL,
  `Mobile_Tel` int(10) NOT NULL,
  `Land_Tel` int(10) NOT NULL,
  `Pobox` varchar(10) NOT NULL,
  `sub_zoba_id` int(255) NOT NULL,
  PRIMARY KEY (`Establishment_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `establishment_entry` (`Establishment_Id`, `No_Rooms`, `No_Beds`, `Establishment_Name`, `Permit_Number`, `Tin_No`, `Activity`, `Establishment_Zoba`, `Establishment_Town`, `Mobile_Tel`, `Land_Tel`, `Pobox`, `sub_zoba_id`) VALUES
(1, 124, 987, 'Asmara Palace', '1230-33', '124', 'Hotel', 'Maekel', 'Weki Zagr', 7459736, 123, '211', 0),
(2, 123, 123, 'Mainefhi', '122', '124', 'Hotel', 'Maekel', 'mainefhi', 234, 117498, '211', 0),
(3, 76543, 876, 'Sawass', '12398', '12-984-12', 'Guest House', 'Debub', 'ASuiriono', 98765432, 87654, '12345', 0),
(4, 123456, 12, 'Sawa', '1456', '123', 'Hotel', 'Maekel', 'Weki Zagr', 7459736, 765432, '1200', 0),
(5, 124, 1111, 'Samosn Hotel', '12398', '123', 'Guest House', 'Southern Red Sea', 'sam', 1234, 123, '211', 0),
(6, 1234, 1111, 'warsa', '12cdafds', '12-984-12', 'Hotel', 'Debub', 'ASuiriono', 7426666, 117498, '272', 0);

-- Table `monthly_data_entry` --
CREATE TABLE `monthly_data_entry` (
  `Monthly_Data_Id` int(255) NOT NULL AUTO_INCREMENT,
  `Date_Entry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Establishment_id` int(255) NOT NULL,
  `Month` int(32) NOT NULL,
  `Year` int(255) NOT NULL,
  `NR_Guest` int(255) NOT NULL,
  `R_NewGuest` varchar(255) NOT NULL,
  `Rooms_Occupied` varchar(255) NOT NULL,
  `TNR_Guest` varchar(255) NOT NULL,
  `TR_Guest` varchar(255) NOT NULL,
  `Total_Guest` int(100) NOT NULL,
  `NRB_Revenue` varchar(255) NOT NULL,
  `RB_Revenue` varchar(255) NOT NULL,
  `FB_Revenue` varchar(255) NOT NULL,
  `AlRevenue` varchar(255) NOT NULL,
  `HotRevenue` varchar(255) NOT NULL,
  `SRevenue` varchar(255) NOT NULL,
  `ORevenue` varchar(255) NOT NULL,
  `Male` varchar(255) NOT NULL,
  `Female` varchar(255) NOT NULL,
  `Unoffered_Rooms` varchar(255) NOT NULL,
  `Unoffered_Beds` varchar(255) NOT NULL,
  `Offered_Rooms` varchar(255) NOT NULL,
  `Offered_Beds` int(255) NOT NULL,
  `Check_Status` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Monthly_Data_Id`),
  KEY `Establishment_id` (`Establishment_id`),
  CONSTRAINT `monthly_data_entry_ibfk_1` FOREIGN KEY (`Establishment_id`) REFERENCES `establishment_entry` (`Establishment_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

INSERT INTO `monthly_data_entry` (`Monthly_Data_Id`, `Date_Entry`, `Establishment_id`, `Month`, `Year`, `NR_Guest`, `R_NewGuest`, `Rooms_Occupied`, `TNR_Guest`, `TR_Guest`, `Total_Guest`, `NRB_Revenue`, `RB_Revenue`, `FB_Revenue`, `AlRevenue`, `HotRevenue`, `SRevenue`, `ORevenue`, `Male`, `Female`, `Unoffered_Rooms`, `Unoffered_Beds`, `Offered_Rooms`, `Offered_Beds`, `Check_Status`) VALUES
(37, '2017-12-01 20:15:18', 1, 1, 2017, 87564, '12345', '0987646464', '7676', '668', 676767, ' 776', '57571', '676', '5575', '799', '7878', '677', '8787', '9888', '1233', '1233', '1231', 43211, 1),
(38, '2017-12-01 20:16:03', 1, 2, 2017, 676, '969', '6565', '787', '676', 5656, ' 987', '676', '7878', '997', '676', '565', '7878', '123', '321', '767', '767', '57579', 8787, 1),
(39, '2017-12-03 21:15:58', 1, 3, 2017, 75, '75', '8448', '449', '84844858', 449, ' 767', '567', '566', '456', '566', '677', '876', '987', '777', '95', '959', '1234', 8686, 1),
(40, '2017-12-03 11:37:24', 1, 4, 2017, 123, '1234', '123', '123', '32', 123, ' 98', '98', '88', '66', '44', '55', '33', '988', '98955', '322', '322', '123', 747, 1),
(41, '2017-11-30 18:59:35', 1, 5, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(42, '2017-11-30 18:59:35', 1, 6, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(43, '2017-12-04 01:14:23', 1, 7, 2015, 12, '98', '88', '88', '88', 88, ' 87', '99', '99', '78', '98', '78', '77', '98', '87', '87', '87', '12', 1212, 1),
(44, '2017-11-30 18:59:36', 1, 8, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(45, '2017-11-30 18:59:36', 1, 9, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(46, '2017-11-30 18:59:36', 1, 10, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(47, '2017-11-30 18:59:36', 1, 11, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(48, '2017-11-30 18:59:36', 1, 12, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(49, '2017-11-30 19:14:35', 2, 1, 2017, 676, '689', '876', '7654', '765765', 7654, ' 0987', '6767', '676', '9876', '567', '567', '879', '688', '788', '585', '585', '8585', 595, 1),
(50, '2017-11-30 19:15:11', 2, 2, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '677', '899', '788', '788', '878', 788, 1),
(51, '2017-11-30 19:15:54', 2, 3, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '67', '89', '797', '797', '7878', 787, 1),
(52, '2017-11-30 19:01:38', 2, 4, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(53, '2017-11-30 19:01:39', 2, 5, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(54, '2017-11-30 19:01:39', 2, 6, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(55, '2017-11-30 19:01:39', 2, 7, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(56, '2017-11-30 19:01:39', 2, 8, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(57, '2017-11-30 19:01:39', 2, 9, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(58, '2017-11-30 19:01:39', 2, 10, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(59, '2017-11-30 19:01:39', 2, 11, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(60, '2017-11-30 19:01:39', 2, 12, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(61, '2017-12-01 20:07:38', 3, 1, 2017, 12345, '12345', '12345', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '8', '99', '99', '99', '879', 577, 1),
(62, '2017-12-04 13:20:08', 3, 2, 2017, 22, '9', '9', '9', '9', 9, '0', '', '0', '0', '0', '0', '0', '-', '-', '888', '8', '84', 9, 1),
(63, '2017-11-30 19:03:05', 3, 3, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(64, '2017-11-30 19:03:05', 3, 4, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(65, '2017-11-30 19:03:05', 3, 5, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(66, '2017-11-30 19:03:06', 3, 6, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(67, '2017-11-30 19:03:06', 3, 7, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(68, '2017-11-30 19:03:06', 3, 8, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(69, '2017-11-30 19:03:06', 3, 9, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(70, '2017-11-30 19:03:06', 3, 10, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(71, '2017-11-30 19:03:06', 3, 11, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(72, '2017-11-30 19:03:06', 3, 12, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(73, '2017-12-03 12:02:58', 4, 1, 2017, 98, '87', '66', '98', '77', 76, ' 12', '98', '88', '87', '98', '99', '88', '12', '23', '34', '34', '123', 321, 1),
(74, '2017-11-30 19:03:48', 4, 2, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(75, '2017-11-30 19:03:48', 4, 3, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(76, '2017-11-30 19:03:48', 4, 4, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(77, '2017-11-30 19:03:48', 4, 5, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(78, '2017-11-30 19:03:48', 4, 6, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(79, '2017-11-30 19:03:48', 4, 7, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(80, '2017-11-30 19:03:48', 4, 8, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(81, '2017-11-30 19:03:48', 4, 9, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(82, '2017-11-30 19:03:48', 4, 10, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(83, '2017-11-30 19:03:48', 4, 11, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(84, '2017-11-30 19:03:48', 4, 12, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(85, '2017-12-01 20:17:45', 5, 1, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(86, '2017-12-03 12:14:57', 5, 2, 2017, 987, '766', '990', '66', '876', 66, ' 99', '99', '99', '99', '99', '99', '99', '88', '88', '678', '678', '123', 789, 1),
(87, '2017-12-01 20:17:45', 5, 3, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(88, '2017-12-01 20:17:45', 5, 4, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(89, '2017-12-01 20:17:45', 5, 5, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(90, '2017-12-01 20:17:45', 5, 6, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(91, '2017-12-01 20:17:45', 5, 7, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(92, '2017-12-01 20:17:45', 5, 8, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(93, '2017-12-01 20:17:46', 5, 9, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(94, '2017-12-01 20:17:46', 5, 10, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(95, '2017-12-01 20:17:46', 5, 11, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(96, '2017-12-01 20:17:46', 5, 12, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(97, '2017-12-03 12:13:11', 6, 1, 2017, 123, '987', '789', '897', '789', 765, ' 789', '98', '88', '88', '8', '88', '8', '78', '99', '191', '191', '9812', 192, 1),
(98, '2017-12-02 15:55:01', 6, 2, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(99, '2017-12-02 15:55:01', 6, 3, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(100, '2017-12-02 15:55:01', 6, 4, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(101, '2017-12-02 16:03:58', 6, 5, 2017, 12, '21', '12', '6', '67', 5, ' 123456', '456345', '666678', '6665333', '6567566', '1345789', '56666788', '34', '56', '128', '128', '170', 668, 1),
(102, '2017-12-02 15:55:01', 6, 6, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(103, '2017-12-02 15:55:01', 6, 7, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(104, '2017-12-02 15:55:01', 6, 8, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(105, '2017-12-02 15:55:01', 6, 9, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(106, '2017-12-02 15:55:01', 6, 10, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(107, '2017-12-02 15:55:01', 6, 11, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(108, '2017-12-02 15:55:01', 6, 12, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0);

-- Table `sub_zobas` --
CREATE TABLE `sub_zobas` (
  `sub_zoba_id` int(255) NOT NULL AUTO_INCREMENT,
  `subZoba_Name` varchar(100) NOT NULL,
  `Zoba_Name` varchar(50) NOT NULL,
  `zoba_id` int(100) NOT NULL,
  `Mark` int(11) NOT NULL DEFAULT '0',
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sub_zoba_id`),
  KEY `fk_Zoba_id` (`zoba_id`),
  CONSTRAINT `fk_Zoba_id` FOREIGN KEY (`zoba_id`) REFERENCES `zobas` (`zoba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `sub_zobas` (`sub_zoba_id`, `subZoba_Name`, `Zoba_Name`, `zoba_id`, `Mark`, `Timestamp`) VALUES
(1, 'Weki Zagr', '', 100, 0, '2017-12-02 15:54:52'),
(3, 'ASuiriono', '', 102, 0, '2017-12-02 15:55:02'),
(4, 'SA', '', 103, 0, '2017-11-16 21:18:20'),
(5, 'LAMZA', '', 103, 0, '2017-11-16 21:18:20'),
(6, 'BAHAR', '', 104, 0, '2017-11-30 11:34:18'),
(7, 'SAMIUshowUser(this.value)', '', 103, 0, '2017-11-16 21:18:20'),
(8, 'sam', '', 100, 0, '2017-12-02 15:54:52'),
(9, 'sam', '', 105, 0, '2017-12-01 20:17:46'),
(10, 'Abrihimo', '', 100, 0, '2017-12-02 15:54:52'),
(15, 'sam', '', 100, 0, '2017-12-02 15:54:52'),
(16, 'dasw', '', 100, 0, '2017-12-02 15:54:52'),
(17, 'mainefhi', '', 100, 0, '2017-12-02 15:54:52');

-- Table `users` --
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(255) NOT NULL,
  `Middle_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Tel_Number` int(255) NOT NULL,
  `user_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Time_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `First_name`, `Middle_Name`, `Last_Name`, `Tel_Number`, `user_Name`, `Password`, `Time_Created`, `Role`) VALUES
(9, 'Samson', 'Teclezion', 'Tesfamicheal', 745973, 'steclezion', 'e5cb99e93e3a3839e702691c45d6cc28ffcabf9e', '2017-11-28 22:08:05', 'Administrator'),
(12, 'yikalo', 'yebio', 'Geb', 7154571, 'yikalo', '0ba9361221db313d4274a81e3cb43644197bdbfc', '2017-11-29 10:01:08', 'Administrator'),
(16, 'fnjsdnfka', 'ksfjka', 'nfsdkjf', 877888, 'steclezion', 'e5cb99e93e3a3839e702691c45d6cc28ffcabf9e', '2017-11-29 19:14:05', 'Administrator'),
(17, 'pal', 'pal', 'pal', 0, 'pal', 'e888f350fa7bc553d2485760cd0f1a1eb66006da', '2017-11-29 19:30:38', 'User'),
(19, 'sam', 'ksfjka', 'sam', 877888, 'robel', 'f483d5f1baefc0d688f53b54787a95ef2912f1a7', '2017-11-29 19:33:40', 'Administrator'),
(20, 'Samson', 'mas', 'Manager', 745973, 'steclezion', 'b0d56feb3fb338f4eb667908a6aa39a3c2c31d50', '2017-11-29 19:45:09', 'Administrator');

-- Table `zobas` --
CREATE TABLE `zobas` (
  `zoba_id` int(10) NOT NULL AUTO_INCREMENT,
  `Zoba_Name` varchar(100) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`zoba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

INSERT INTO `zobas` (`zoba_id`, `Zoba_Name`, `Timestamp`) VALUES
(100, 'Maekel', '2017-11-12 08:40:33'),
(101, 'Northern Red Sea', '2017-11-12 11:26:45'),
(102, 'Debub', '2017-11-12 08:40:33'),
(103, 'GashBarka', '2017-11-12 08:40:33'),
(104, 'Anseba', '2017-11-12 08:40:33'),
(105, 'Southern Red Sea', '2017-11-12 08:40:33');

