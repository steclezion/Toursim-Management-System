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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `establishment_entry` (`Establishment_Id`, `No_Rooms`, `No_Beds`, `Establishment_Name`, `Permit_Number`, `Tin_No`, `Activity`, `Establishment_Zoba`, `Establishment_Town`, `Mobile_Tel`, `Land_Tel`, `Pobox`, `sub_zoba_id`) VALUES
(1, 124, 987, 'Asmara Palace', '1230-33', '124', 'Hotel', 'Maekel', 'Weki Zagr', 7459736, 123, '211', 0),
(2, 123, 123, 'Mainefhi', '122', '124', 'Hotel', 'Maekel', 'mainefhi', 234, 117498, '211', 0),
(3, 76543, 876, 'Sawass', '12398', '12-984-12', 'Guest House', 'Debub', 'ASuiriono', 98765432, 87654, '12345', 0),
(4, 123456, 12, 'Sawa', '1456', '123', 'Hotel', 'Maekel', 'Weki Zagr', 7459736, 765432, '1200', 0),
(5, 124, 1111, 'Samosn Hotel', '12398', '123', 'Guest House', 'Southern Red Sea', 'sam', 1234, 123, '211', 0),
(6, 1234, 1111, 'warsa', '12cdafds', '12-984-12', 'Hotel', 'Debub', 'ASuiriono', 7426666, 117498, '272', 0),
(7, 98, 12, 'fuool', '89', '98', 'Hotel', 'Maekel', 'sam', 7459736, 117498, '8373', 0);

-- Table `excel` --
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `excel` AS (select `sample3`.`Establishment_Id` AS `Establishment_Id`,`sample3`.`Establishment_Name` AS `Establishment_Name`,`sample3`.`Month` AS `Month`,`sample3`.`Year` AS `Year`,`sample3`.`Male` AS `Male`,`sample3`.`Female` AS `Female`,`sample3`.`Activity` AS `Activity`,`sample3`.`Establishment_Zoba` AS `Establishment_Zoba`,`sample3`.`Establishment_Town` AS `Establishment_Town`,`sample3`.`Check_Status` AS `Check_Status` from `sample3`);

INSERT INTO `excel` (`Establishment_Id`, `Establishment_Name`, `Month`, `Year`, `Male`, `Female`, `Activity`, `Establishment_Zoba`, `Establishment_Town`, `Check_Status`) VALUES
(1, 'Asmara Palace', 3, 2017, '987', '777', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(1, 'Asmara Palace', 1, 2017, '8787', '9888', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(1, 'Asmara Palace', 2, 2017, '123', '321', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(2, 'Mainefhi', 2, 2017, '677', '899', 'Hotel', 'Maekel', 'mainefhi', 1),
(2, 'Mainefhi', 3, 2017, '67', '89', 'Hotel', 'Maekel', 'mainefhi', 1),
(2, 'Mainefhi', 1, 2017, '688', '788', 'Hotel', 'Maekel', 'mainefhi', 1),
(4, 'Sawa', 1, 2017, '12', '23', 'Hotel', 'Maekel', 'Weki Zagr', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

INSERT INTO `monthly_data_entry` (`Monthly_Data_Id`, `Date_Entry`, `Establishment_id`, `Month`, `Year`, `NR_Guest`, `R_NewGuest`, `Rooms_Occupied`, `TNR_Guest`, `TR_Guest`, `Total_Guest`, `NRB_Revenue`, `RB_Revenue`, `FB_Revenue`, `AlRevenue`, `HotRevenue`, `SRevenue`, `ORevenue`, `Male`, `Female`, `Unoffered_Rooms`, `Unoffered_Beds`, `Offered_Rooms`, `Offered_Beds`, `Check_Status`) VALUES
(37, '2017-12-05 22:57:34', 1, 1, 2017, 87564, '12345', '0987', '7676', '668', 676767, ' 776', '57571', '676', '5575', '799', '7878', '677', '8787', '9888', '1233', '1233', '1231', 43211, 1),
(38, '2017-12-06 14:23:26', 1, 2, 2017, 95, '969', '6565', '787', '676', 5656, ' 987', '676', '7878', '997', '676', '565', '7878', '123', '321', '767', '767', '57579', 8787, 1),
(39, '2017-12-05 22:58:07', 1, 3, 2017, 75, '75', '8448', '449', '84844858', 449, ' 767', '567', '566', '456', '566', '677', '876', '987', '777', '95kk', '959jjj', '1238', 86888, 1),
(40, '2017-12-05 22:57:42', 1, 4, 2017, 123, '1234', '123', '123', '32', 123, ' 98', '98', '88', '66', '44', '55', '33', '988', '98955', '322', '322', '127', 747, 1),
(41, '2017-11-30 18:59:35', 1, 5, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(42, '2017-11-30 18:59:35', 1, 6, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(43, '2017-12-05 22:56:25', 1, 7, 2015, 12, '98', '88', '88', '88', 88, ' 87', '99', '99', '78', '98', '78', '77', '98', '87', '87', '87', '12', 121298, 1),
(44, '2017-11-30 18:59:36', 1, 8, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(45, '2017-11-30 18:59:36', 1, 9, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(46, '2017-11-30 18:59:36', 1, 10, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(47, '2017-11-30 18:59:36', 1, 11, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(48, '2017-11-30 18:59:36', 1, 12, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(49, '2017-11-30 19:14:35', 2, 1, 2017, 676, '689', '876', '7654', '765765', 7654, ' 0987', '6767', '676', '9876', '567', '567', '879', '688', '788', '585', '585', '8585', 595, 1),
(50, '2017-12-06 15:12:09', 2, 2, 2017, 23, '123', '1234', '12345', '234', 983, '333', '32323', '33', '33', '333', '5555', '444', '677', '899', '788', '788', '878', 788, 1),
(51, '2017-12-06 15:12:07', 2, 3, 2017, 123, '044', '322', '33', '455', 22, '3322', '33', '345', '33', '33', '456', '333', '67', '89', '797', '797', '7878', 787, 1),
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
(85, '2017-12-06 10:14:43', 5, 1, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '75', '75', '76', 56, 1),
(86, '2017-12-03 12:14:57', 5, 2, 2017, 987, '766', '990', '66', '876', 66, ' 99', '99', '99', '99', '99', '99', '99', '88', '88', '678', '678', '123', 789, 1),
(87, '2017-12-01 20:17:45', 5, 3, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(88, '2017-12-01 20:17:45', 5, 4, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(89, '2017-12-01 20:17:45', 5, 5, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(90, '2017-12-01 20:17:45', 5, 6, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(91, '2017-12-01 20:17:45', 5, 7, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(92, '2017-12-01 20:17:45', 5, 8, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(93, '2017-12-01 20:17:46', 5, 9, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(94, '2017-12-01 20:17:46', 5, 10, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(95, '2017-12-05 23:12:47', 5, 11, 2017, 484, '33', '33', '33', '33', 33, ' 84', '33', '33', '33', '33', '33', '3', '45', '44', '84', '84', '12', 75, 1),
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
(108, '2017-12-02 15:55:01', 6, 12, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(109, '2017-12-05 23:11:05', 7, 1, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(110, '2017-12-05 23:11:05', 7, 2, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(111, '2017-12-05 23:11:05', 7, 3, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(112, '2017-12-05 23:11:05', 7, 4, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(113, '2017-12-05 23:11:05', 7, 5, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(114, '2017-12-05 23:11:05', 7, 6, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(115, '2017-12-05 23:11:05', 7, 7, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(116, '2017-12-05 23:11:05', 7, 8, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(117, '2017-12-05 23:11:05', 7, 9, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(118, '2017-12-05 23:11:05', 7, 10, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(119, '2017-12-05 23:11:05', 7, 11, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0),
(120, '2017-12-05 23:11:05', 7, 12, 2017, 0, '0', '0', '0', '0', 0, '0', '', '0', '0', '0', '0', '0', '-', '-', '0', '0', '0', 0, 0);

-- Table `report_employee_town` --
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_employee_town` AS select `monthly_data_entry`.`Establishment_id` AS `Establishment_Id`,`establishment_entry`.`Establishment_Name` AS `Establishment_Name`,`monthly_data_entry`.`Month` AS `Month`,`monthly_data_entry`.`Year` AS `Year`,`monthly_data_entry`.`Male` AS `Male`,`monthly_data_entry`.`Female` AS `Female`,`establishment_entry`.`Activity` AS `Activity`,`establishment_entry`.`Establishment_Zoba` AS `Establishment_Zoba`,`establishment_entry`.`Establishment_Town` AS `Establishment_Town`,`monthly_data_entry`.`Check_Status` AS `Check_Status` from (`monthly_data_entry` join `establishment_entry` on((`monthly_data_entry`.`Establishment_id` = `establishment_entry`.`Establishment_Id`))) order by `monthly_data_entry`.`Establishment_id`;

INSERT INTO `report_employee_town` (`Establishment_Id`, `Establishment_Name`, `Month`, `Year`, `Male`, `Female`, `Activity`, `Establishment_Zoba`, `Establishment_Town`, `Check_Status`) VALUES
(1, 'Asmara Palace', 11, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(1, 'Asmara Palace', 9, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(1, 'Asmara Palace', 7, 2015, '98', '87', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(1, 'Asmara Palace', 5, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(1, 'Asmara Palace', 3, 2017, '987', '777', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(1, 'Asmara Palace', 1, 2017, '8787', '9888', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(1, 'Asmara Palace', 12, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(1, 'Asmara Palace', 10, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(1, 'Asmara Palace', 8, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(1, 'Asmara Palace', 6, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(1, 'Asmara Palace', 4, 2017, '988', '98955', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(1, 'Asmara Palace', 2, 2017, '123', '321', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(2, 'Mainefhi', 7, 2017, '-', '-', 'Hotel', 'Maekel', 'mainefhi', 0),
(2, 'Mainefhi', 5, 2017, '-', '-', 'Hotel', 'Maekel', 'mainefhi', 0),
(2, 'Mainefhi', 3, 2017, '67', '89', 'Hotel', 'Maekel', 'mainefhi', 1),
(2, 'Mainefhi', 1, 2017, '688', '788', 'Hotel', 'Maekel', 'mainefhi', 1),
(2, 'Mainefhi', 12, 2017, '-', '-', 'Hotel', 'Maekel', 'mainefhi', 0),
(2, 'Mainefhi', 10, 2017, '-', '-', 'Hotel', 'Maekel', 'mainefhi', 0),
(2, 'Mainefhi', 8, 2017, '-', '-', 'Hotel', 'Maekel', 'mainefhi', 0),
(2, 'Mainefhi', 6, 2017, '-', '-', 'Hotel', 'Maekel', 'mainefhi', 0),
(2, 'Mainefhi', 4, 2017, '-', '-', 'Hotel', 'Maekel', 'mainefhi', 0),
(2, 'Mainefhi', 2, 2017, '677', '899', 'Hotel', 'Maekel', 'mainefhi', 1),
(2, 'Mainefhi', 11, 2017, '-', '-', 'Hotel', 'Maekel', 'mainefhi', 0),
(2, 'Mainefhi', 9, 2017, '-', '-', 'Hotel', 'Maekel', 'mainefhi', 0),
(3, 'Sawass', 12, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 10, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 8, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 6, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 4, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 2, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 1),
(3, 'Sawass', 11, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 9, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 7, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 5, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 3, 2017, '-', '-', 'Guest House', 'Debub', 'ASuiriono', 0),
(3, 'Sawass', 1, 2017, '8', '99', 'Guest House', 'Debub', 'ASuiriono', 1),
(4, 'Sawa', 12, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 10, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 8, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 6, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 4, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 2, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 11, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 9, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 7, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 5, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 3, 2017, '-', '-', 'Hotel', 'Maekel', 'Weki Zagr', 0),
(4, 'Sawa', 1, 2017, '12', '23', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(5, 'Samosn Hotel', 2, 2017, '88', '88', 'Guest House', 'Southern Red Sea', 'sam', 1),
(5, 'Samosn Hotel', 11, 2017, '45', '44', 'Guest House', 'Southern Red Sea', 'sam', 1),
(5, 'Samosn Hotel', 9, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 0),
(5, 'Samosn Hotel', 7, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 0),
(5, 'Samosn Hotel', 5, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 0),
(5, 'Samosn Hotel', 3, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 0),
(5, 'Samosn Hotel', 1, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 1),
(5, 'Samosn Hotel', 12, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 0),
(5, 'Samosn Hotel', 10, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 0),
(5, 'Samosn Hotel', 8, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 0),
(5, 'Samosn Hotel', 6, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 0),
(5, 'Samosn Hotel', 4, 2017, '-', '-', 'Guest House', 'Southern Red Sea', 'sam', 0),
(6, 'warsa', 11, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(6, 'warsa', 9, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(6, 'warsa', 7, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(6, 'warsa', 5, 2017, '34', '56', 'Hotel', 'Debub', 'ASuiriono', 1),
(6, 'warsa', 3, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(6, 'warsa', 1, 2017, '78', '99', 'Hotel', 'Debub', 'ASuiriono', 1),
(6, 'warsa', 12, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(6, 'warsa', 10, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(6, 'warsa', 8, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(6, 'warsa', 6, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(6, 'warsa', 4, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(6, 'warsa', 2, 2017, '-', '-', 'Hotel', 'Debub', 'ASuiriono', 0),
(7, 'fuool', 11, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 9, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 7, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 5, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 3, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 1, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 12, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 10, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 8, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 6, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 4, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0),
(7, 'fuool', 2, 2017, '-', '-', 'Hotel', 'Maekel', 'sam', 0);

-- Table `sample2` --
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sample2` AS select `report_employee_town`.`Establishment_Id` AS `Establishment_Id`,`report_employee_town`.`Establishment_Name` AS `Establishment_Name`,`report_employee_town`.`Month` AS `Month`,`report_employee_town`.`Year` AS `Year`,`report_employee_town`.`Male` AS `Male`,`report_employee_town`.`Female` AS `Female`,`report_employee_town`.`Activity` AS `Activity`,`report_employee_town`.`Establishment_Zoba` AS `Establishment_Zoba`,`report_employee_town`.`Establishment_Town` AS `Establishment_Town`,`report_employee_town`.`Check_Status` AS `Check_Status` from `report_employee_town` where ((`report_employee_town`.`Establishment_Zoba` = 'Maekel') and (`report_employee_town`.`Activity` = 'Hotel') and (`report_employee_town`.`Check_Status` = 1) and (`report_employee_town`.`Month` between 1 and 2));

INSERT INTO `sample2` (`Establishment_Id`, `Establishment_Name`, `Month`, `Year`, `Male`, `Female`, `Activity`, `Establishment_Zoba`, `Establishment_Town`, `Check_Status`) VALUES
(1, 'Asmara Palace', 1, 2017, '8787', '9888', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(1, 'Asmara Palace', 2, 2017, '123', '321', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(2, 'Mainefhi', 1, 2017, '688', '788', 'Hotel', 'Maekel', 'mainefhi', 1),
(2, 'Mainefhi', 2, 2017, '677', '899', 'Hotel', 'Maekel', 'mainefhi', 1),
(4, 'Sawa', 1, 2017, '12', '23', 'Hotel', 'Maekel', 'Weki Zagr', 1);

-- Table `sample3` --
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sample3` AS select `report_employee_town`.`Establishment_Id` AS `Establishment_Id`,`report_employee_town`.`Establishment_Name` AS `Establishment_Name`,`report_employee_town`.`Month` AS `Month`,`report_employee_town`.`Year` AS `Year`,`report_employee_town`.`Male` AS `Male`,`report_employee_town`.`Female` AS `Female`,`report_employee_town`.`Activity` AS `Activity`,`report_employee_town`.`Establishment_Zoba` AS `Establishment_Zoba`,`report_employee_town`.`Establishment_Town` AS `Establishment_Town`,`report_employee_town`.`Check_Status` AS `Check_Status` from `report_employee_town` where ((`report_employee_town`.`Year` = '2017') and (`report_employee_town`.`Establishment_Zoba` = 'Maekel') and (`report_employee_town`.`Activity` = 'Hotel') and (`report_employee_town`.`Check_Status` = 1) and (`report_employee_town`.`Month` between '1' and '3'));

INSERT INTO `sample3` (`Establishment_Id`, `Establishment_Name`, `Month`, `Year`, `Male`, `Female`, `Activity`, `Establishment_Zoba`, `Establishment_Town`, `Check_Status`) VALUES
(1, 'Asmara Palace', 3, 2017, '987', '777', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(1, 'Asmara Palace', 1, 2017, '8787', '9888', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(1, 'Asmara Palace', 2, 2017, '123', '321', 'Hotel', 'Maekel', 'Weki Zagr', 1),
(2, 'Mainefhi', 2, 2017, '677', '899', 'Hotel', 'Maekel', 'mainefhi', 1),
(2, 'Mainefhi', 3, 2017, '67', '89', 'Hotel', 'Maekel', 'mainefhi', 1),
(2, 'Mainefhi', 1, 2017, '688', '788', 'Hotel', 'Maekel', 'mainefhi', 1),
(4, 'Sawa', 1, 2017, '12', '23', 'Hotel', 'Maekel', 'Weki Zagr', 1);

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
(1, 'Weki Zagr', '', 100, 0, '2017-12-07 11:42:14'),
(3, 'ASuiriono', '', 102, 0, '2017-12-02 15:55:02'),
(4, 'SA', '', 103, 0, '2017-11-16 21:18:20'),
(5, 'LAMZA', '', 103, 0, '2017-11-16 21:18:20'),
(6, 'BAHAR', '', 104, 0, '2017-11-30 11:34:18'),
(7, 'SAMIUshowUser(this.value)', '', 103, 0, '2017-11-16 21:18:20'),
(8, 'sam', '', 100, 0, '2017-12-07 11:42:14'),
(9, 'sam', '', 105, 0, '2017-12-01 20:17:46'),
(10, 'Abrihimo', '', 100, 0, '2017-12-07 11:42:14'),
(15, 'sam', '', 100, 0, '2017-12-07 11:42:14'),
(16, 'dasw', '', 100, 0, '2017-12-07 11:42:14'),
(17, 'mainefhi', '', 100, 0, '2017-12-07 11:42:14');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `First_name`, `Middle_Name`, `Last_Name`, `Tel_Number`, `user_Name`, `Password`, `Time_Created`, `Role`) VALUES
(9, 'Samson', 'Teclezion', 'Tesfamicheal', 745973, 'steclezion', 'e5cb99e93e3a3839e702691c45d6cc28ffcabf9e', '2017-11-28 22:08:05', 'Administrator'),
(12, 'yikalo', 'yebio', 'Geb', 7154571, 'yikalo', '0ba9361221db313d4274a81e3cb43644197bdbfc', '2017-11-29 10:01:08', 'Administrator'),
(16, 'fnjsdnfka', 'ksfjka', 'nfsdkjf', 877888, 'steclezion', 'e5cb99e93e3a3839e702691c45d6cc28ffcabf9e', '2017-11-29 19:14:05', 'Administrator'),
(20, 'Samson', 'mas', 'Manager', 745973, 'steclezion', 'b0d56feb3fb338f4eb667908a6aa39a3c2c31d50', '2017-11-29 19:45:09', 'Administrator'),
(21, '1', '1', '1', 1, 'a', '356a192b7913b04c54574d18c28d46e6395428ab', '2017-12-06 10:49:16', 'Administrator');

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
