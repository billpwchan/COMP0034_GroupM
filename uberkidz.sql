flush privileges;
create user 'uberkidz'@'localhost' identified by 'uberkidz';

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `uberkidz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `uberkidz`;

GRANT ALL PRIVILEGES ON uberkidz.* To 'uberkidz'@'localhost' IDENTIFIED BY 'uberkidz';

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_ID` int(50) UNSIGNED NOT NULL,
  `user_ID` int(50) NOT NULL,
  `event_ID` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `quality` varchar(10) NOT NULL,
  `eventStartTime` datetime NOT NULL,
  `eventLocation` varchar(200) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cart` (`cart_ID`, `user_ID`, `event_ID`, `quantity`, `quality`, `eventStartTime`, `eventLocation`, `price`) VALUES
(23, 2, 1, 1, 'basic', '2019-05-11 22:00:00', '', 224.3);

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `user_ID` int(50) NOT NULL,
  `account_balance` float(65,0) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `pinterest` varchar(100) DEFAULT NULL,
  `tumblr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`user_ID`, `account_balance`, `description`, `facebook`, `twitter`, `pinterest`, `tumblr`) VALUES
(2, 994, 'I\'m a sample customer for demo purpose', 'facebook_demo', 'twitter_demo', 'pinterest_demo', 'tumblr_demo'),
(5, 1560, 'Overlap Customer', NULL, NULL, NULL, NULL);

DROP TABLE IF EXISTS `entertainer`;
CREATE TABLE `entertainer` (
  `entertainer_ID` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `entertainer` (`entertainer_ID`, `name`, `skill`) VALUES
(1, 'Noah', 'Performing'),
(2, 'Liam', 'Singing'),
(3, 'William', 'Dancing'),
(4, 'JacobElijah', 'Making balloons'),
(5, 'Ethan', 'Kids\' Game'),
(6, 'Alexander', 'Performing'),
(7, 'Emma', 'Dancing'),
(8, 'Isabella', 'Playing piano'),
(9, 'Abigail', 'Joking'),
(10, 'Elizabeth', 'Singing');

DROP TABLE IF EXISTS `entertainmentpackage`;
CREATE TABLE `entertainmentpackage` (
  `event_ID` int(50) NOT NULL,
  `duration` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `entertainmentpackage` (`event_ID`, `duration`) VALUES
(4, 4);

DROP TABLE IF EXISTS `entertainmentpackagemap`;
CREATE TABLE `entertainmentpackagemap` (
  `entertainment_ID` int(50) NOT NULL,
  `entertainer_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `entertainmentpackagemap` (`entertainment_ID`, `entertainer_ID`) VALUES
(4, 3),
(4, 5),
(4, 8),
(4, 10);

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `event_ID` int(50) NOT NULL,
  `provider_ID` int(50) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `eventimage1` text NOT NULL,
  `eventimage2` text NOT NULL,
  `eventimage3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `event` (`event_ID`, `provider_ID`, `event_type`, `name`, `price`, `description`, `created`, `eventimage1`, `eventimage2`, `eventimage3`) VALUES
(1, 1, 'venue', 'CCT Venues', 224.3, 'CCT Venues Plus-Bank Street, Canary Wharf', '2019-03-20 17:38:36', '27_the_venue_horseshoe_casino_hammond.jpg', 'e14157image11.jpg', 'ME_StarlightExpress2_Bochum_c_MehrEntertainment-700x455.jpg'),
(2, 1, 'venue', 'The Brewery', 539.3, 'Great Place for Performance', '2019-03-20 17:42:22', 'private-party-venues.jpg', 'company-and-corporate-christmas-dinner-parties.jpg', 'christmas-party-venues-event-management-london.jpg'),
(3, 3, 'menu', 'La Bell Cuisine', 110, 'Chinese-Style Catering Service', '2019-03-20 18:20:54', '0318fs_tostadasCeviche-1240x827.jpg', '15173328-platos-de-pescados-filete-de-salmÃ³n-con-verduras-lavash-y-salsa-tÃ¡rtara.jpg', 'receta-para-preparar-bandeja-paisa-colombiana.jpg'),
(4, 3, 'entertainment', 'Birthday Party', 220, 'The best birthday party for Kids', '2019-03-20 18:26:36', '243588019-H.jpg', 'Summer-bithday-parties-for-kids.jpg', 'z.jpg'),
(5, 4, 'menu', 'Thai Foods', 200.3, 'Demo Thai Food', '2019-03-22 16:31:37', '1800ss_thinkstock_rf_red_lentil_dal.jpg', 'a0001674_main.jpg', 'sheetpanshrimpscampiwithbroccoliandtomatoes.jpg');

DROP TABLE IF EXISTS `loginauth`;
CREATE TABLE `loginauth` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `selector_hash` varchar(255) NOT NULL,
  `is_expired` int(11) NOT NULL DEFAULT '0',
  `expiry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `loginauth` (`id`, `email`, `password_hash`, `selector_hash`, `is_expired`, `expiry_date`) VALUES
(1, 'servicedemo@mailinator.com', '$2y$10$XM/yhmx1nmevz.XPLcBrm.OSJDMtrfsvdWhZzlDKQ0emDgRwIdVEe', '$2y$10$A3290IuF9ZFiMl9QCtNHsOSf6begW57TeciOWKegNgktrT8VcWmiu', 1, '2019-04-18 01:34:50'),
(2, 'servicedemo@mailinator.com', '$2y$10$6Jv2MBfGBImeE11xoWCRpeiwScvdG0fH8dPVvE3pl1TDRf9b0.gNK', '$2y$10$3rByAJR4FwohLthlo.HOcOM1hTAnUFXYL/P/hq8v2seDYC6UXZSCK', 0, '2019-04-18 01:35:57'),
(3, 'customerdemo@mailinator.com', '$2y$10$8ppleU9BGCVtMA1bYvaHEu7ESEidXBebQS0kCGgYWbDZEln5bPvyK', '$2y$10$R4jK78vtvIs8.Q..ldqGs.ct26JEutTD9X4GcsN5pZP50PU8al8VW', 1, '2019-04-18 01:40:27'),
(4, 'entertainmentdemo@mailinator.com', '$2y$10$PRYVfK5trBIThWCzr/1hO.M3AGwAQsAFbcN1gWMrr9y87hdne2vje', '$2y$10$5yeL0vv.4spqBowT43XtlutmFpNEBk/.UX2P2B4NHQWSlsgdmo41e', 0, '2019-04-19 17:46:07'),
(5, 'customerdemo@mailinator.com', '$2y$10$nlTZKWckOUocKm/1stSsxO4/uM8oEMUy8mJ.YKWjHPTaCERyk98cy', '$2y$10$r5ib6aSeJhZOlgjJGZS9sOBC2v9Fp5UA.t6w9QxH1d/6mblAMbzuy', 1, '2019-04-19 18:29:27'),
(6, 'customerdemo@mailinator.com', '$2y$10$979Of2Wz2Rn0D5RVcLII7uIQShpk9ZNPr0paItqjvdDIuQMl7R91O', '$2y$10$pd6Gj0oeYiF5ijC0SfqoDOUVG9zAIR1KHgZ151MoWLVNUk6eih7SO', 1, '2019-04-21 16:37:53'),
(7, 'customerdemo@mailinator.com', '$2y$10$7hZ5yQEClaDLbYmst90IMuqW04JBnapORqR4ytltvaKbe4fN/QIlu', '$2y$10$erjBjR0xS5m6X5p2IVYWDOnvlP9WlamozRiS0BLcpbvdzG//dMl0S', 1, '2019-04-21 16:39:16'),
(8, 'customerdemo@mailinator.com', '$2y$10$GXnIWyV87Ik060nI1YSfEOyh8Nyv1Sd/MeoCVFVeCT1IobPmBuHvS', '$2y$10$iuVUJzV7NyPMQzQRtSRZFOKQp5ce0RtINPnVGp6jS4oRgWk9M2uNC', 0, '2019-04-21 16:40:31');

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `event_ID` int(50) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`event_ID`, `duration`) VALUES
(3, 3),
(5, 4);

DROP TABLE IF EXISTS `menuitem`;
CREATE TABLE `menuitem` (
  `menuitem_ID` int(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menuitem` (`menuitem_ID`, `name`) VALUES
(1, 'Chicken & tofu noodle soup'),
(2, 'Chicken katsu curry'),
(3, 'Cracker ravioli'),
(4, 'Black bean burgers'),
(5, 'Spanish tortilla'),
(6, 'Quick fish cakes'),
(7, 'Sliced fennel, orange and almond salad'),
(8, 'Chicken in a potWild rice salad'),
(9, 'Thai-style mussels'),
(10, 'Tomato & caper linguine'),
(11, 'Spring chicken pie');

DROP TABLE IF EXISTS `menumap`;
CREATE TABLE `menumap` (
  `event_ID` int(50) NOT NULL,
  `menuitem_ID` int(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menumap` (`event_ID`, `menuitem_ID`, `quantity`) VALUES
(3, 1, 3),
(3, 2, 2),
(3, 5, 4),
(3, 6, 5),
(5, 9, 4),
(5, 10, 2);

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `messageID` int(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `message` (`messageID`, `name`, `email`, `message`) VALUES
(1, 'Sample Name', 'a@b.com', 'Sample Message'),
(2, 'Feedback', 'Feedback@mailinator.com', 'Demo Feedback'),
(4, 'tom', 'testing2@mailinator.com', 'Message 2'),
(5, 'Sample Name', 'a@b.com', 'Sample Message'),
(6, 'Sample Name', 'a@b.com', 'Sample Message'),
(7, 'Sample Name', 'a@b.com', 'Sample Message'),
(8, 'Sample Name', 'a@b.com', 'Sample Message');

DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `orderdetail` (
  `orderdetail_ID` bigint(20) NOT NULL,
  `order_ID` bigint(20) NOT NULL,
  `event_ID` int(50) NOT NULL,
  `quality` varchar(10) NOT NULL DEFAULT 'basic',
  `event_startTime` datetime NOT NULL,
  `event_location` text NOT NULL,
  `price` float NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `orderdetail` (`orderdetail_ID`, `order_ID`, `event_ID`, `quality`, `event_startTime`, `event_location`, `price`, `status`) VALUES
(1, 1, 4, 'premium', '2019-03-22 18:00:00', 'IOE', 440, 'Pending'),
(6, 3, 3, 'advanced', '2019-03-22 18:00:00', 'IOE', 165, 'Pending'),
(7, 3, 4, 'premium', '2019-03-23 18:30:00', 'IOE', 440, 'Pending'),
(8, 3, 5, 'premium', '2019-03-22 18:30:00', 'IOE', 400.6, 'Pending');

DROP TABLE IF EXISTS `orderhistory`;
CREATE TABLE `orderhistory` (
  `order_ID` bigint(20) NOT NULL,
  `customer_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `orderhistory` (`order_ID`, `customer_ID`) VALUES
(3, 2),
(1, 5);

DROP TABLE IF EXISTS `passwordreset`;
CREATE TABLE `passwordreset` (
  `resetID` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `selector` char(16) NOT NULL,
  `token` char(64) NOT NULL,
  `expires` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `servicesupplier`;
CREATE TABLE `servicesupplier` (
  `user_ID` int(50) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `servicesupplier` (`user_ID`, `company_name`) VALUES
(1, 'UberKidz Company'),
(3, 'UberKidz Company'),
(4, 'UberKidz Company');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_ID` int(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` char(15) DEFAULT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `registration_date` date NOT NULL,
  `avatar` text,
  `status` int(2) NOT NULL DEFAULT '0',
  `email_activation_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`user_ID`, `first_name`, `last_name`, `gender`, `email_address`, `password`, `contact_number`, `registration_date`, `avatar`, `status`, `email_activation_key`) VALUES
(1, 'Service', 'Provider', 'Male', 'servicedemo@mailinator.com', '$2y$10$PVKZ8QbQU.07nEdzoIGLJ.pOC9bRmQjQ1uEx9s.n418T88gY2SSQW', '1234567890', '2019-03-19', '9f0e6b298f77a730ef0b47c801d01480_r.jpg', 1, ''),
(2, 'Customer', 'Demo', 'Male', 'customerdemo@mailinator.com', '$2y$10$EebUhRSZdoTRoRoM4No66OvCHKKPdpBejUzg5n/awcHtOkkmJNga2', '1234567890', '2019-03-19', '6374355381984a0f26cb91caf58a0c28_hd.jpg', 1, ''),
(3, 'Entertainment', 'Provider', 'Female', 'entertainmentdemo@mailinator.com', '$2y$10$IOqpVULqlucT1BEbkAEquO4jD0NqgyHQKRUM2EBgSB1fMp5/7Knu6', '1234567890', '2019-03-20', '', 1, ''),
(4, 'Service', 'Provider', 'Male', 'serviceaccount@mailinator.com', '$2y$10$qPTGTW1ZqORjrb6883SDKe6erHfs2jDxsfv9QlYJLeh4PSCGN2LlC', '1234567890', '2019-03-22', '9f0e6b298f77a730ef0b47c801d01480_r.jpg', 1, ''),
(5, 'Overlap', 'Customer', 'Male', 'overlapcustomer@mailinator.com', '$2y$10$0I/PbA7gSpl/E4d0jYjXK.6cEX3nr4DZsmNBb47n5trdz8.b3fc5K', '1234567890', '2019-03-22', '', 1, '');

DROP TABLE IF EXISTS `venue`;
CREATE TABLE `venue` (
  `event_ID` int(50) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `capacity` int(11) NOT NULL,
  `region` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `venue` (`event_ID`, `address_line1`, `address_line2`, `post_code`, `capacity`, `region`) VALUES
(1, ' 40 Bank St, Canary Wharf', 'London', 'E14 5NR', 300, 'Canary Wharf'),
(2, '52 Chiswell St', 'London', 'EC1Y 4SD', 600, 'London');

DROP TABLE IF EXISTS `voucher`;
CREATE TABLE `voucher` (
  `voucher_ID` int(11) NOT NULL,
  `voucher_code` varchar(100) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_ID`),
  ADD UNIQUE KEY `user_ID` (`user_ID`,`event_ID`,`quantity`,`quality`,`eventStartTime`,`eventLocation`,`price`),
  ADD KEY `event_ID` (`event_ID`);

ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_ID` (`user_ID`);

ALTER TABLE `entertainer`
  ADD PRIMARY KEY (`entertainer_ID`);

ALTER TABLE `entertainmentpackage`
  ADD UNIQUE KEY `event_ID` (`event_ID`) USING BTREE;

ALTER TABLE `entertainmentpackagemap`
  ADD PRIMARY KEY (`entertainment_ID`,`entertainer_ID`),
  ADD KEY `entertainmentpackagemap_ibfk_3` (`entertainer_ID`);

ALTER TABLE `event`
  ADD PRIMARY KEY (`event_ID`),
  ADD UNIQUE KEY `event_ID` (`event_ID`),
  ADD KEY `provider_ID` (`provider_ID`);

ALTER TABLE `loginauth`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `menu`
  ADD UNIQUE KEY `event_ID` (`event_ID`) USING BTREE;

ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`menuitem_ID`);

ALTER TABLE `menumap`
  ADD UNIQUE KEY `event_ID_2` (`event_ID`,`menuitem_ID`,`quantity`),
  ADD KEY `menuitem_ID` (`menuitem_ID`),
  ADD KEY `event_ID` (`event_ID`);

ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderdetail_ID`),
  ADD KEY `event_ID` (`event_ID`),
  ADD KEY `order_ID` (`order_ID`);

ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `customer_ID` (`customer_ID`);

ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`resetID`),
  ADD KEY `email` (`email`);

ALTER TABLE `servicesupplier`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_ID` (`user_ID`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`) USING BTREE,
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `email_address_2` (`email_address`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`);

ALTER TABLE `venue`
  ADD UNIQUE KEY `event_ID` (`event_ID`) USING BTREE;

ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_ID`);


ALTER TABLE `cart`
  MODIFY `cart_ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `entertainer`
  MODIFY `entertainer_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `event`
  MODIFY `event_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `loginauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `menuitem`
  MODIFY `menuitem_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `message`
  MODIFY `messageID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `orderdetail`
  MODIFY `orderdetail_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `orderhistory`
  MODIFY `order_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `passwordreset`
  MODIFY `resetID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `user_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `voucher`
  MODIFY `voucher_ID` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `customer` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `entertainmentpackage`
  ADD CONSTRAINT `entertainmentpackage_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `entertainmentpackagemap`
  ADD CONSTRAINT `entertainmentpackagemap_ibfk_2` FOREIGN KEY (`entertainment_ID`) REFERENCES `entertainmentpackage` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entertainmentpackagemap_ibfk_3` FOREIGN KEY (`entertainer_ID`) REFERENCES `entertainer` (`entertainer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`provider_ID`) REFERENCES `servicesupplier` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `menumap`
  ADD CONSTRAINT `menumap_ibfk_2` FOREIGN KEY (`menuitem_ID`) REFERENCES `menuitem` (`menuitem_ID`),
  ADD CONSTRAINT `menumap_ibfk_3` FOREIGN KEY (`event_ID`) REFERENCES `menu` (`event_ID`);

ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`order_ID`) REFERENCES `orderhistory` (`order_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `orderhistory`
  ADD CONSTRAINT `orderhistory_ibfk_2` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `passwordreset`
  ADD CONSTRAINT `passwordreset_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email_address`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `servicesupplier`
  ADD CONSTRAINT `servicesupplier_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
