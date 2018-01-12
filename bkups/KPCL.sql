-- Database: `sales` --
-- Table `braches` --
CREATE TABLE `braches` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `branchName` text NOT NULL,
  `Location` text NOT NULL,
  `Contact` text NOT NULL,
  `date_added` text NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `braches` (`id`, `branchName`, `Location`, `Contact`, `date_added`, `active`) VALUES
(1, 'AFRANCHO', 'AFRANCHO KSI', '0240066322', '16th December, 2017', 'yes'),
(2, 'PANKRONO', 'PANKRONO', '024006632', '16th December, 2017', 'yes'),
(3, 'FUMESUA', 'FUMESUA-KSI', '249456789', '7th January, 2018', 'yes');

-- Table `branchitems` --
CREATE TABLE `branchitems` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `branch` int(255) NOT NULL,
  `itemid` text NOT NULL,
  `totalqtyReceives` text NOT NULL,
  `quantity` text NOT NULL,
  `itemPrice` text NOT NULL,
  `tAmt` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` text NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `branchitems` (`id`, `branch`, `itemid`, `totalqtyReceives`, `quantity`, `itemPrice`, `tAmt`, `date_added`, `lastupdate`, `active`) VALUES
(1, 3, '1', '850', '250', '21', '2100', '2018-01-06 23:51:02', '2018-01-07', 'yes'),
(2, 1, '1', '500', '87', '21', '0', '2018-01-06 23:53:25', '2018-01-07', 'yes'),
(3, 2, '1', '4', '4', '21', '', '2018-01-07 00:15:21', '', 'yes'),
(4, 1, '2', '500', '500', '21', '', '2018-01-08 16:51:09', '2018-01-08', 'yes'),
(5, 1, '6', '1000', '800', '27', '2700', '2018-01-09 22:11:13', '2018-01-09', 'yes');

-- Table `customerinfo` --
CREATE TABLE `customerinfo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Customername` text NOT NULL,
  `Companyname` text NOT NULL,
  `mobile` text NOT NULL,
  `tel` text NOT NULL,
  `address` text NOT NULL,
  `Folio` text NOT NULL,
  `debt` text NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `customerinfo` (`id`, `Customername`, `Companyname`, `mobile`, `tel`, `address`, `Folio`, `debt`, `active`) VALUES
(1, 'Samuel Annin Yeboah', 'Nsromapa', '0240066392', '0559685442', 'Gso', '123/332e', '4600', 'yes'),
(2, 'Samuel Annin Yeboah', 'Microsoft', '1234567800', '', '', '', '0', 'yes'),
(3, 'Godson Oheneba Dac', 'Nsromapa', '0549507279', '', 'Goaso', '21901', '', 'yes'),
(4, 'G K BOAKYE', 'GK BOAKYE COMPANY LMT', '0244565656', '', 'GOASO ABOTANSO', 'D123/1', '4242', 'yes');

-- Table `customers_account` --
CREATE TABLE `customers_account` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `cust_id` int(32) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `QUANTITY` text NOT NULL,
  `WAYBILL` text NOT NULL,
  `DEBIT` text NOT NULL,
  `CREDIT` text NOT NULL,
  `BALANCE` text NOT NULL,
  `acc_date` text NOT NULL,
  `price_per_sing` text NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` varchar(3) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO `customers_account` (`id`, `cust_id`, `DESCRIPTION`, `QUANTITY`, `WAYBILL`, `DEBIT`, `CREDIT`, `BALANCE`, `acc_date`, `price_per_sing`, `entry_date`, `active`) VALUES
(1, 1, '', '', '', '', '', '', '', '', '2017-12-23 08:39:40', 'yes'),
(2, 1, 'I LOVE PROGRAMMING (EBSAY)', '30', '33333333', '600', '10.00', '1150', '2017-12-16', '200', '2017-12-23 08:43:48', 'yes'),
(3, 1, 'Cement (GHACEM)', '30', '33333333', '600', '10.00', '1740', '2017-12-16', '200', '2017-12-23 08:48:40', 'yes'),
(4, 1, 'Cash Payment', '', '', '', '', '1000', '2017-12-23', '', '2017-12-23 10:59:46', 'yes'),
(5, 1, 'Cash Payment', '', '', '', '50', '950', '2017-12-23', '', '2017-12-23 11:01:18', 'yes'),
(26, 2, 'Cement (GHACEM)', '3', '33333333', '63', '', '63', '2018-01-07', '21', '2018-01-07 00:47:21', 'yes'),
(27, 2, 'Cement (GHACEM)', '2', '33333', '42', '', '105', '2018-01-07', '21', '2018-01-07 00:49:01', 'yes'),
(28, 2, 'Cement (GHACEM)', '100', '33333333', '2100', '', '2205', '2018-01-07', '21', '2018-01-07 00:51:08', 'yes'),
(29, 2, 'Cement (GHACEM)', '2', '33333', '42', '', '2247', '2018-01-07', '21', '2018-01-07 00:51:50', 'yes'),
(30, 2, 'Cement (GHACEM)', '2', '33333', '42', '', '2289', '2018-01-07', '21', '2018-01-07 00:52:02', 'yes'),
(31, 2, 'Cash Payment', '', '', '', '2000', '289', '2018-01-07', '', '2018-01-07 01:06:55', 'yes'),
(32, 2, 'Cheque No. 23344 aha', '', '', '', '289', '0', '2018-01-07', '', '2018-01-07 01:07:31', 'yes'),
(33, 4, 'Cement (GHACEM)', '200', '123HJYB', '4200', '', '4200', '2018-01-10', '21', '2018-01-09 23:56:02', 'yes'),
(34, 4, 'Cement (GHACEM)', '2', '33333BMHVGJB ', '42', '', '4242', '2018-01-10', '21', '2018-01-09 23:57:23', 'yes'),
(35, 1, 'Cement (GHACEM)', '100', '33333ss', '2100', '', '2100', '2018-01-10', '21', '2018-01-10 10:09:34', 'yes'),
(36, 1, 'Iron rod (5/8)', '100', 'KHJ35445', '3000', '500', '4600', '2018-01-10', '30', '2018-01-10 11:05:04', 'yes');

-- Table `dbmanager` --
CREATE TABLE `dbmanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateGiven` text NOT NULL,
  `Alert1` text NOT NULL,
  `Alert2` text NOT NULL,
  `Alert3` text NOT NULL,
  `Alert4` text NOT NULL,
  `Alert5` text NOT NULL,
  `dateEnding` text NOT NULL,
  `DoneWithPeriod` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `dbmanager` (`id`, `dateGiven`, `Alert1`, `Alert2`, `Alert3`, `Alert4`, `Alert5`, `dateEnding`, `DoneWithPeriod`) VALUES
(1, '2017-12-02', '', '2017-12-06', '2017-12-06', '2017-12-06', '2017-12-05', '2018-12-25', 'no');

-- Table `inventories` --
CREATE TABLE `inventories` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `itemName` text NOT NULL,
  `itemDifferentiator` text NOT NULL,
  `Description` text NOT NULL,
  `WAY_BILL` text NOT NULL,
  `Quantity` text NOT NULL,
  `Total` text NOT NULL,
  `Driver_Info` text NOT NULL,
  `Contact` text NOT NULL,
  `destination` text NOT NULL,
  `invent_Date` text NOT NULL,
  `year` text NOT NULL,
  `month` text NOT NULL,
  `day` text NOT NULL,
  `EnteryDate` text NOT NULL,
  `Price_Before_Invent` text NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `inventories` (`id`, `itemName`, `itemDifferentiator`, `Description`, `WAY_BILL`, `Quantity`, `Total`, `Driver_Info`, `Contact`, `destination`, `invent_Date`, `year`, `month`, `day`, `EnteryDate`, `Price_Before_Invent`, `active`) VALUES
(1, 'Cement', 'GHACEM', 'WG2001A', '000223', '850', '850', 'Asumadu', '0240000330', '3', '2018-01-07', '2018', '01', '07', '7th January, 2018', '21', 'yes'),
(2, 'Cement', 'GHACEM', 'FUMESUA(FUMESUA-KSI)', '1293013', '500', '1350', '', '', '1', '2018-01-07', '2018', '01', '07', '7th January, 2018', '21', 'yes'),
(3, 'Cement', 'GHACEM', 'AFRANCHO(AFRANCHO KSI)', '1293013', '2', '1352', '', '', '2', '2018-01-07', '2018', '01', '07', '7th January, 2018', '21', 'yes'),
(4, 'Cement', 'GHACEM', 'AFRANCHO(AFRANCHO KSI)', '1293013', '2', '1354', '', '', '2', '2018-01-07', '2018', '01', '07', '7th January, 2018', '21', 'yes'),
(5, 'Cement', 'SOL', 'WG2001A', '000223ZWW', '500', '500', 'Asumadu', '0240000330', '1', '2019-01-09', '2019', '01', '09', '8th January, 2018', '21', 'yes'),
(6, 'Iron rod', '5/8', 'AS 4545 G', '000223', '1000', '1000', 'Asumadu', '0246453171', '1', '2018-01-09', '2018', '01', '09', '9th January, 2018', '27', 'yes');

-- Table `items` --
CREATE TABLE `items` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `itemName` text NOT NULL,
  `differentiator` text NOT NULL,
  `itemPrice` text NOT NULL,
  `quantity` text NOT NULL,
  `date_added` text NOT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `items` (`id`, `itemName`, `differentiator`, `itemPrice`, `quantity`, `date_added`, `active`) VALUES
(1, 'Cement', 'GHACEM', '21', '339', '7th January, 2018', 'yes'),
(2, 'Cement', 'SOL', '21', '500', '7th January, 2018', 'yes'),
(3, 'Cement', 'Dimond', '22', '', '7th January, 2018', 'yes'),
(4, 'Cement', 'WP', '21', '', '7th January, 2018', 'yes'),
(5, 'Cement', 'FCL', '22', '', '7th January, 2018', 'yes'),
(6, 'Iron rod', '5/8', '30', '800', '9th January, 2018', 'yes');

-- Table `onlineupdate` --
CREATE TABLE `onlineupdate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dated` text NOT NULL,
  `seconds` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `onlineupdate` (`id`, `dated`, `seconds`) VALUES
(1, '9h January, 2018', '51');

-- Table `salesandsupplies` --
CREATE TABLE `salesandsupplies` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `branch` int(255) NOT NULL,
  `itemID` int(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `WAY_BILL` text NOT NULL,
  `QTY` text NOT NULL,
  `COST_PRICE` text NOT NULL,
  `SALESandSUPPLY` text NOT NULL,
  `SALES_AMT` text NOT NULL,
  `TOTAL_AMT` text NOT NULL,
  `BALANCE` text NOT NULL,
  `invent_Date` text NOT NULL,
  `Year` text NOT NULL,
  `Month` text NOT NULL,
  `Day` text NOT NULL,
  `EnteryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` varchar(3) NOT NULL DEFAULT 'not',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `salesandsupplies` (`id`, `branch`, `itemID`, `DESCRIPTION`, `WAY_BILL`, `QTY`, `COST_PRICE`, `SALESandSUPPLY`, `SALES_AMT`, `TOTAL_AMT`, `BALANCE`, `invent_Date`, `Year`, `Month`, `Day`, `EnteryDate`, `active`) VALUES
(1, 3, 1, 'WG2001A', '000223', '850', '17850', '', '', '', '850', '2018-01-07', '2018', '01', '07', '2018-01-06 23:50:12', 'yes'),
(2, 3, 1, 'AFRANCHO(AFRANCHO KSI)', '', '', '', '500', '', '0', '350', '2018-01-07', '', '', '', '2018-01-06 23:51:48', 'yes'),
(3, 1, 1, 'FUMESUA(FUMESUA-KSI)', '1293013', '500', '10500', '', '', '', '500', '2018-01-07', '2018', '01', '07', '2018-01-06 23:51:48', 'yes'),
(4, 3, 1, 'SALES/SUPPLY', '', '', '', '100', '2100', '2100', '250', '2018-01-07', '', '', '', '2018-01-06 23:52:26', 'yes'),
(5, 1, 1, 'PANKRONO(PANKRONO)', '', '', '', '2', '', '0', '498', '2018-01-07', '', '', '', '2018-01-07 00:14:09', 'yes'),
(6, 2, 1, 'AFRANCHO(AFRANCHO KSI)', '1293013', '2', '42', '', '', '', '4', '2018-01-07', '2018', '01', '07', '2018-01-07 00:14:09', 'yes'),
(7, 1, 2, 'WG2001A', '000223ZWW', '500', '10500', '', '', '', '500', '2019-01-09', '2019', '01', '09', '2018-01-08 16:50:21', 'yes'),
(8, 1, 6, 'AS 4545 G', '000223', '1000', '27000', '', '', '', '1000', '2018-01-09', '2018', '01', '09', '2018-01-09 22:09:36', 'yes'),
(9, 1, 6, 'SALES/SUPPLY', '', '', '', '100', '2700', '2700', '900', '2018-01-09', '', '', '', '2018-01-09 22:12:00', 'yes');

-- Table `theme` --
CREATE TABLE `theme` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `themes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `theme` (`id`, `themes`) VALUES
(1, 'other_Side_all_dark');

-- Table `users` --
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `fullname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `mobile` text NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` varchar(3) NOT NULL DEFAULT 'yes',
  `login` varchar(3) NOT NULL DEFAULT 'no',
  `last_entry` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `user_id`, `fullname`, `username`, `password`, `mobile`, `tel`, `email`, `address`, `add_date`, `active`, `login`, `last_entry`) VALUES
(0, 'ADMINISTRATOR', 'ADMINISTRATOR', 'adminns', '319f4d26e3c536b5dd871bb2c52e3178', '', '', '', '', '2018-01-11 06:07:42', 'yes', 'no', '11th January, 2018 - 5:07 AM'),
(1, 'AN455', 'Say Nana Yaw Samuel', 'say', '319f4d26e3c536b5dd871bb2c52e3178', '0240066392', '', '', 'F22/1 GAB', '2018-01-11 11:22:52', 'yes', 'yes', '11th January, 2018 -  10:22 PM'),
(2, 'KPCL1', 'Godson Dacosta', 'ayayay', '3677da84ef8e0675a4ca74280da07a3a', '0240066392', '', '', 'PO 11 POKU', '2018-01-03 19:14:15', 'yes', 'no', ''),
(3, '123', 'Nana Yaw Dedrick', 'sayt', '202cb962ac59075b964b07152d234b70', '02400663931', '05596854421', 'RASSAY32@GMAIL.COM', 'Gso Her', '2018-01-03 10:12:27', 'yes', 'yes', '3rd January, 2018 -  12:08 AM'),
(5, 'aaaa;', 'SAY SAY', 'AN488748796', '4baff08d7dda0337125dfa9ea94b1028', '02020202020220', '00000000', 'rassay31@gmail.com', 'GS 44', '2018-01-08 09:36:19', 'yes', 'no', '');

