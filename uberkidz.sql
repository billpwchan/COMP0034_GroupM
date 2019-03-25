-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 02 月 26 日 16:44
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `uberkidz`
--
CREATE DATABASE IF NOT EXISTS `uberkidz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `uberkidz`;

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--
-- 建立時間: 2019 年 02 月 26 日 15:43
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`
(
  `cart_ID`        int(50) UNSIGNED NOT NULL,
  `user_ID`        int(50)          NOT NULL,
  `event_ID`       int(50)          NOT NULL,
  `quantity`       int(50)          NOT NULL,
  `quality`        varchar(10)      NOT NULL,
  `eventStartTime` datetime         NOT NULL,
  `eventLocation`  varchar(200)     NOT NULL,
  `price`          float            NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `cart`:
--   `event_ID`
--       `event` -> `event_ID`
--   `user_ID`
--       `customer` -> `user_ID`
--

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--
-- 建立時間: 2019 年 02 月 23 日 02:08
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`
(
  `user_ID`         int(50)      NOT NULL,
  `account_balance` float(65, 0) NOT NULL,
  `description`     varchar(100) DEFAULT NULL,
  `facebook`        varchar(100) DEFAULT NULL,
  `twitter`         varchar(50)  DEFAULT NULL,
  `pinterest`       varchar(100) DEFAULT NULL,
  `tumblr`          varchar(100) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `customer`:
--   `user_ID`
--       `user` -> `user_ID`
--

--
-- 資料表的匯出資料 `customer`
--

INSERT INTO `customer` (`user_ID`, `account_balance`, `description`, `facebook`, `twitter`, `pinterest`, `tumblr`)
VALUES (18, 2000, NULL, NULL, NULL, NULL, NULL),
       (22, 2000, NULL, NULL, NULL, NULL, NULL),
       (23, 2000, NULL, NULL, NULL, NULL, NULL),
       (29, 2000, NULL, NULL, NULL, NULL, NULL),
       (30, 2000, NULL, NULL, NULL, NULL, NULL),
       (31, 2000, NULL, NULL, NULL, NULL, NULL),
       (32, 2000, NULL, NULL, NULL, NULL, NULL),
       (33, 2000, NULL, NULL, NULL, NULL, NULL),
       (34, 2000, NULL, NULL, NULL, NULL, NULL),
       (35, 2000, NULL, NULL, NULL, NULL, NULL),
       (36, 2000, NULL, NULL, NULL, NULL, NULL),
       (38, 2000, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `entertainer`
--
-- 建立時間: 2019 年 02 月 21 日 22:15
--

DROP TABLE IF EXISTS `entertainer`;
CREATE TABLE `entertainer`
(
  `entertainer_ID` int(50)      NOT NULL,
  `name`           varchar(100) NOT NULL,
  `skill`          text         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `entertainer`:
--

--
-- 資料表的匯出資料 `entertainer`
--

INSERT INTO `entertainer` (`entertainer_ID`, `name`, `skill`)
VALUES (1, 'Entertainer 1', 'Dance'),
       (2, 'Entertainer 2', 'Sing'),
       (3, 'Entertainer 3', 'Jump');

-- --------------------------------------------------------

--
-- 資料表結構 `entertainmentpackage`
--
-- 建立時間: 2019 年 02 月 21 日 22:44
--

DROP TABLE IF EXISTS `entertainmentpackage`;
CREATE TABLE `entertainmentpackage`
(
  `event_ID` int(50)  NOT NULL,
  `duration` int(225) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `entertainmentpackage`:
--   `event_ID`
--       `event` -> `event_ID`
--

--
-- 資料表的匯出資料 `entertainmentpackage`
--

INSERT INTO `entertainmentpackage` (`event_ID`, `duration`)
VALUES (1, 5),
       (2, 200),
       (3, 2),
       (4, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `entertainmentpackagemap`
--
-- 建立時間: 2019 年 02 月 21 日 22:15
--

DROP TABLE IF EXISTS `entertainmentpackagemap`;
CREATE TABLE `entertainmentpackagemap`
(
  `entertainment_ID` int(50) NOT NULL,
  `entertainer_ID`   int(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `entertainmentpackagemap`:
--   `entertainment_ID`
--       `entertainmentpackage` -> `event_ID`
--   `entertainer_ID`
--       `entertainer` -> `entertainer_ID`
--

--
-- 資料表的匯出資料 `entertainmentpackagemap`
--

INSERT INTO `entertainmentpackagemap` (`entertainment_ID`, `entertainer_ID`)
VALUES (1, 1),
       (1, 2),
       (1, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `event`
--
-- 建立時間: 2019 年 02 月 21 日 22:15
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event`
(
  `event_ID`    int(50)      NOT NULL,
  `provider_ID` int(50)      NOT NULL,
  `event_type`  varchar(50)  NOT NULL,
  `name`        varchar(100) NOT NULL,
  `price`       float        NOT NULL,
  `description` varchar(200) NOT NULL,
  `created`     datetime     NOT NULL,
  `eventimage1` text         NOT NULL,
  `eventimage2` text         NOT NULL,
  `eventimage3` text         NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `event`:
--   `provider_ID`
--       `servicesupplier` -> `user_ID`
--

--
-- 資料表的匯出資料 `event`
--

INSERT INTO `event` (`event_ID`, `provider_ID`, `event_type`, `name`, `price`, `description`, `created`, `eventimage1`,
                     `eventimage2`, `eventimage3`)
VALUES (1, 16, 'entertainment', 'Sample EP 1', 134.3,
        'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut\r\n                labore et dolore magna aliquyam\r\n                erat, At vero eos et accusam et justo duo dolores et ea rebum. Lo',
        '2019-02-04 00:00:00', 'event-preview1.jpg', 'event-preview2.jpg', 'event-preview3.jpg'),
       (2, 16, 'entertainment', 'EP 2', 293.2, 'EP 2 Description', '2019-02-08 00:00:00', 'event-preview2.jpg',
        'event-preview1.jpg', ''),
       (3, 16, 'entertainment', 'EP 2', 293.2, 'EP 2 Description', '2019-02-08 00:00:00', 'event-preview2.jpg',
        'event-preview1.jpg', ''),
       (4, 16, 'entertainment', 'Sample EP 1', 134.3, 'adfadfadsfasdfasdfa', '2019-02-04 00:00:00',
        'event-preview1.jpg', 'event-preview2.jpg', ''),
       (5, 16, 'entertainment', 'EP 2', 293.2, 'EP 2 Description', '2019-02-08 00:00:00', 'event-preview2.jpg',
        'event-preview1.jpg', ''),
       (6, 16, 'entertainment', 'EP 2', 293.2, 'EP 2 Description', '2019-02-08 00:00:00', 'event-preview2.jpg',
        'event-preview1.jpg', ''),
       (7, 16, 'entertainment', 'Sample EP 1', 134.3, 'adfadfadsfasdfasdfa', '2019-02-04 00:00:00',
        'event-preview1.jpg', 'event-preview2.jpg', ''),
       (8, 16, 'entertainment', 'EP 2', 293.2, 'EP 2 Description', '2019-02-08 00:00:00', 'event-preview2.jpg',
        'event-preview1.jpg', ''),
       (9, 39, 'entertainment', 'EP 2', 293.2, 'EP 2 Description', '2019-02-08 00:00:00', 'event-preview2.jpg',
        'event-preview1.jpg', ''),
       (10, 39, 'menu', 'Menu 1', 123.2, 'dsfajdfahldvhadvad', '2019-02-27 13:32:00', 'menu-preview1.jpg',
        'menu-preview2.jpg', 'menu-preview3.jpg'),
       (11, 39, 'venue', 'Venue 1', 120, 'asdfasdfa', '2019-02-22 00:22:00', 'venue-preview1.jpg', 'venue-preview2.jpg',
        'venue-preview3.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--
-- 建立時間: 2019 年 02 月 22 日 11:47
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`
(
  `event_ID` int(50) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `menu`:
--   `event_ID`
--       `event` -> `event_ID`
--

--
-- 資料表的匯出資料 `menu`
--

INSERT INTO `menu` (`event_ID`, `duration`)
VALUES (10, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `menuitem`
--
-- 建立時間: 2019 年 02 月 21 日 22:15
--

DROP TABLE IF EXISTS `menuitem`;
CREATE TABLE `menuitem`
(
  `menuitem_ID` int(50)      NOT NULL,
  `name`        varchar(100) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `menuitem`:
--

--
-- 資料表的匯出資料 `menuitem`
--

INSERT INTO `menuitem` (`menuitem_ID`, `name`)
VALUES (1, 'Fish and Chips'),
       (2, 'Salad'),
       (3, 'Beef Empanadas'),
       (4, 'Spinach Dip & Chips');

-- --------------------------------------------------------

--
-- 資料表結構 `menumap`
--
-- 建立時間: 2019 年 02 月 25 日 01:32
--

DROP TABLE IF EXISTS `menumap`;
CREATE TABLE `menumap`
(
  `event_ID`    int(50) NOT NULL,
  `menuitem_ID` int(50) NOT NULL,
  `quantity`    int(10) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `menumap`:
--   `menuitem_ID`
--       `menuitem` -> `menuitem_ID`
--   `event_ID`
--       `menu` -> `event_ID`
--

--
-- 資料表的匯出資料 `menumap`
--

INSERT INTO `menumap` (`event_ID`, `menuitem_ID`, `quantity`)
VALUES (10, 1, 2),
       (10, 3, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--
-- 建立時間: 2019 年 02 月 22 日 18:42
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`
(
  `messageID` int(50) NOT NULL,
  `name`      varchar(50) DEFAULT NULL,
  `email`     varchar(50) DEFAULT NULL,
  `message`   text
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `message`:
--

--
-- 資料表的匯出資料 `message`
--

INSERT INTO `message` (`messageID`, `name`, `email`, `message`)
VALUES (1, 'Hel', 'bilpwchan@hotmail.com', 'New Message'),
       (2, 'bil', 'new@mailinator.com', 'New Message');

-- --------------------------------------------------------

--
-- 資料表結構 `orderdetail`
--
-- 建立時間: 2019 年 02 月 25 日 01:25
--

DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `orderdetail`
(
  `orderdetail_ID`  bigint(20)  NOT NULL,
  `order_ID`        bigint(20)  NOT NULL,
  `event_ID`        int(50)     NOT NULL,
  `quality`         varchar(10) NOT NULL DEFAULT 'basic',
  `event_startTime` datetime    NOT NULL,
  `event_location`  text        NOT NULL,
  `price`           float       NOT NULL,
  `status`          varchar(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `orderdetail`:
--   `event_ID`
--       `event` -> `event_ID`
--   `order_ID`
--       `orderhistory` -> `order_ID`
--

--
-- 資料表的匯出資料 `orderdetail`
--

INSERT INTO `orderdetail` (`orderdetail_ID`, `order_ID`, `event_ID`, `quality`, `event_startTime`, `event_location`,
                           `price`, `status`)
VALUES (1, 1, 1, '', '2019-02-04 00:00:00', 'Somewhere', 100, 'Pending'),
       (13, 13, 1, 'basic', '2019-02-23 03:00:00', 'Farrer Place, é›ªæ¢¨å¸‚ æ–°å—å¨çˆ¾æ–¯å·žæ¾³æ´²', 134.3,
        'Pending');

-- --------------------------------------------------------

--
-- 資料表結構 `orderhistory`
--
-- 建立時間: 2019 年 02 月 25 日 01:21
--

DROP TABLE IF EXISTS `orderhistory`;
CREATE TABLE `orderhistory`
(
  `order_ID`    bigint(20) NOT NULL,
  `customer_ID` int(50)    NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `orderhistory`:
--   `customer_ID`
--       `customer` -> `user_ID`
--

--
-- 資料表的匯出資料 `orderhistory`
--

INSERT INTO `orderhistory` (`order_ID`, `customer_ID`)
VALUES (1, 18),
       (12, 32),
       (13, 32),
       (14, 32);

-- --------------------------------------------------------

--
-- 資料表結構 `passwordreset`
--
-- 建立時間: 2019 年 02 月 26 日 00:40
--

DROP TABLE IF EXISTS `passwordreset`;
CREATE TABLE `passwordreset`
(
  `resetID`  int(11) UNSIGNED NOT NULL,
  `email`    varchar(255)     NOT NULL,
  `selector` char(16)         NOT NULL,
  `token`    char(64)         NOT NULL,
  `expires`  bigint(20)       NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `passwordreset`:
--   `email`
--       `user` -> `email_address`
--

-- --------------------------------------------------------

--
-- 資料表結構 `servicesupplier`
--
-- 建立時間: 2019 年 02 月 21 日 22:15
--

DROP TABLE IF EXISTS `servicesupplier`;
CREATE TABLE `servicesupplier`
(
  `user_ID`      int(50)      NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `servicesupplier`:
--   `user_ID`
--       `user` -> `user_ID`
--

--
-- 資料表的匯出資料 `servicesupplier`
--

INSERT INTO `servicesupplier` (`user_ID`, `company_name`)
VALUES (16, '123'),
       (39, 'UberKidz Company');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--
-- 建立時間: 2019 年 02 月 26 日 00:05
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`
(
  `user_ID`              int(50)      NOT NULL,
  `first_name`           varchar(20)  NOT NULL,
  `last_name`            varchar(20)  NOT NULL,
  `gender`               char(15)              DEFAULT NULL,
  `email_address`        varchar(50)  NOT NULL,
  `password`             varchar(100) NOT NULL,
  `contact_number`       varchar(15)           DEFAULT NULL,
  `registration_date`    date         NOT NULL,
  `avatar`               text,
  `status`               int(2)       NOT NULL DEFAULT '0',
  `email_activation_key` varchar(100) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `user`:
--

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`user_ID`, `first_name`, `last_name`, `gender`, `email_address`, `password`, `contact_number`,
                    `registration_date`, `avatar`, `status`, `email_activation_key`)
VALUES (14, '123', '123', '123', '13@13.com', 'e10adc3949ba59abbe56e057f20f883e', '123', '2019-02-03',
        '6374355381984a0f26cb91caf58a0c28_hd.jpg', 0, ''),
       (15, '123', '123', '123', 'ziwiiii3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123', '2019-02-03',
        '9f0e6b298f77a730ef0b47c801d01480_r.jpg', 0, ''),
       (16, '123', '123', 'Male', '123@123.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2019-02-04',
        '6374355381984a0f26cb91caf58a0c28_hd.jpg', 0, ''),
       (17, '123', '123', 'Male', '13', '202cb962ac59075b964b07152d234b70', '123', '2019-02-04',
        '6374355381984a0f26cb91caf58a0c28_hd.jpg', 0, ''),
       (18, 'Newwwwww', 'Chan', 'Male', '1231@1.com', '$2y$10$rEhQrUKsg6xOzuVxkLmYy.RcAz8i7UGaRVZmWkyxH2we47ZTJM7f.',
        '1234567890', '2019-02-08', '6374355381984a0f26cb91caf58a0c28_hd.jpg', 1, ''),
       (22, 'asdf', 'asdf', 'Male', '1231@12.com', '$2y$10$//aHV9dqQ4FevxnfWwc/9e47EfXYbfU2JUs3Ri.zh6MNhihXxXQri',
        '1231231231', '2019-02-08', '', 0, ''),
       (23, 'Bill', 'ChanNew', 'Male', 'hi@123.com', '$2y$10$cXULt.nTWMwhZlXbuxOhZe3ppvWkv5x.IQSuUdF1333a.hspevEXe',
        '1234567890', '2019-02-08', '6374355381984a0f26cb91caf58a0c28_hd.jpg', 1, '4784b6f2cd5351f3965d46d5329fdce8'),
       (29, 'Bill', 'Chan', 'Male', 'bill@mailinator.com',
        '$2y$10$w9JMnfj6Jco7.39lMPc36OsFsiwUfbT4v3GwYvZbtzuQSiyRDXaXC', '1234567890', '2019-02-09',
        '6374355381984a0f26cb91caf58a0c28_hd.jpg', 1, '9df6b2f852d4e169c6cedefd56f713e5'),
       (30, 'Bill', 'Chan', 'Male', 'bill12@mailinator.com',
        '$2y$10$N7DylFO/Y6KbFlMN8ZukzO7n3onlTV5.ERKbbgzUsjvNabUeSnotS', '1234567890', '2019-02-16',
        '6374355381984a0f26cb91caf58a0c28_hd.jpg', 1, ''),
       (31, 'Ziwi', 'Bao', 'Female', 'ziwi@mailinator.com',
        '$2y$10$UrNGkZiw4d4L3PsuBUnUt.TelcT4uVSuyf90mQT/7pesJwaSwkm1u', '1234567890', '2019-02-16',
        '6374355381984a0f26cb91caf58a0c28_hd.jpg', 1, ''),
       (32, 'Ne', 'Acc', 'Male', 'newacc@mailinator.com',
        '$2y$10$R26Ak5yBAgAsQy9cpzHP5eZ2kZUk6QWwjN/xFTJj8fGft8EicJobW', '1234567890', '2019-02-16',
        '6374355381984a0f26cb91caf58a0c28_hd.jpg', 1, ''),
       (33, 'Mail', 'Bill', 'Male', 'uberkidz@mailinator.com',
        '$2y$10$KZjYgJjtIFmNWIkMH8kh0.cxD3AL64qCUx9k6Xq1hcXALw6a0oOi.', '1234567890', '2019-02-22',
        '6374355381984a0f26cb91caf58a0c28_hd.jpg', 0, '67c54e87f4922d04a970a3da79103335'),
       (34, 'New', 'ACCCCCC', 'Male', 'uberkidz1@mailinator.com',
        '$2y$10$pd6tJRYk/UT29nkWaJdf.uOkacoBWJgZLLmUMfZ4y.52abfhgIp.G', '1234567890', '2019-02-22',
        '6374355381984a0f26cb91caf58a0c28_hd.jpg', 0, 'd3b8fe2d86d483cbe2df2d8c0cc18f7d'),
       (35, 'sd', 'sadf', 'Male', 'tom1@mailinator.com', '$2y$10$IPEGU6gYDA3LrHnDNev8rOjk9GYEinzOizxRHBi4NQP8mJdv7s36i',
        '1234567890', '2019-02-22', '6374355381984a0f26cb91caf58a0c28_hd.jpg', 0, '0d31035da65b113c2737ceb3069f66e9'),
       (36, 'asdf', 'asdf', 'Male', 'tom2@mailinator.com',
        '$2y$10$.2TBuLzMCvA8eQHm4VmQk.n1dsKqAuqv55NYbh99oAGCCqFBdeXjq', '123456789', '2019-02-22',
        '9f0e6b298f77a730ef0b47c801d01480_r.jpg', 0, '6b3946ed66750a1bcdf7262eea886c1e'),
       (38, 'asdf', 'asdf', 'Male', 'tom3@mailinator.com',
        '$2y$10$U/KtPUxYTTnF49qfcwHMu.vQ64hI2ap/pfU9j/U/tn5lMeYN21.Be', '123456789', '2019-02-22',
        '9f0e6b298f77a730ef0b47c801d01480_r.jpg', 0, 'f0f549c375e4c2e1429df620c8ff88c0'),
       (39, 'Bill', 'Service', 'Male', 'sp@mailinator.com',
        '$2y$10$AwHTbx6g.fKErNbhp0XkPulcF3gfFjDr7F0yDQd0/fLps58RPEZBa', '1234567890', '2019-02-23', '', 1, '');

-- --------------------------------------------------------

--
-- 資料表結構 `venue`
--
-- 建立時間: 2019 年 02 月 22 日 11:46
--

DROP TABLE IF EXISTS `venue`;
CREATE TABLE `venue`
(
  `event_ID` int(50)      NOT NULL,
  `address`  varchar(100) NOT NULL,
  `capacity` int(11)      NOT NULL,
  `region`   varchar(100) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `venue`:
--   `event_ID`
--       `event` -> `event_ID`
--

--
-- 資料表的匯出資料 `venue`
--

INSERT INTO `venue` (`event_ID`, `address`, `capacity`, `region`)
VALUES (11, 'tower bridge', 200, 'Asia');

-- --------------------------------------------------------

--
-- 資料表結構 `voucher`
--
-- 建立時間: 2019 年 02 月 21 日 22:15
--

DROP TABLE IF EXISTS `voucher`;
CREATE TABLE `voucher`
(
  `voucher_ID`   int(11)      NOT NULL,
  `voucher_code` varchar(100) NOT NULL,
  `discount`     float        NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- 資料表的關聯 `voucher`:
--

--
-- 資料表的匯出資料 `voucher`
--

INSERT INTO `voucher` (`voucher_ID`, `voucher_code`, `discount`)
VALUES (1, 'ABC', 20);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_ID`),
  ADD UNIQUE KEY `user_ID` (`user_ID`, `event_ID`, `quantity`, `quality`, `eventStartTime`, `eventLocation`, `price`),
  ADD KEY `event_ID` (`event_ID`);

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_ID` (`user_ID`);

--
-- 資料表索引 `entertainer`
--
ALTER TABLE `entertainer`
  ADD PRIMARY KEY (`entertainer_ID`);

--
-- 資料表索引 `entertainmentpackage`
--
ALTER TABLE `entertainmentpackage`
  ADD UNIQUE KEY `event_ID` (`event_ID`) USING BTREE;

--
-- 資料表索引 `entertainmentpackagemap`
--
ALTER TABLE `entertainmentpackagemap`
  ADD PRIMARY KEY (`entertainment_ID`, `entertainer_ID`),
  ADD KEY `entertainmentpackagemap_ibfk_3` (`entertainer_ID`);

--
-- 資料表索引 `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_ID`),
  ADD UNIQUE KEY `event_ID` (`event_ID`),
  ADD KEY `provider_ID` (`provider_ID`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD UNIQUE KEY `event_ID` (`event_ID`) USING BTREE;

--
-- 資料表索引 `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`menuitem_ID`);

--
-- 資料表索引 `menumap`
--
ALTER TABLE `menumap`
  ADD UNIQUE KEY `event_ID_2` (`event_ID`, `menuitem_ID`, `quantity`),
  ADD KEY `menuitem_ID` (`menuitem_ID`),
  ADD KEY `event_ID` (`event_ID`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

--
-- 資料表索引 `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderdetail_ID`),
  ADD KEY `event_ID` (`event_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- 資料表索引 `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `customer_ID` (`customer_ID`);

--
-- 資料表索引 `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`resetID`),
  ADD KEY `email` (`email`);

--
-- 資料表索引 `servicesupplier`
--
ALTER TABLE `servicesupplier`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_ID` (`user_ID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`) USING BTREE,
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `email_address_2` (`email_address`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`);

--
-- 資料表索引 `venue`
--
ALTER TABLE `venue`
  ADD UNIQUE KEY `event_ID` (`event_ID`) USING BTREE;

--
-- 資料表索引 `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_ID` int(50) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `entertainer`
--
ALTER TABLE `entertainer`
  MODIFY `entertainer_ID` int(50) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

--
-- 使用資料表 AUTO_INCREMENT `event`
--
ALTER TABLE `event`
  MODIFY `event_ID` int(50) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;

--
-- 使用資料表 AUTO_INCREMENT `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `menuitem_ID` int(50) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

--
-- 使用資料表 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(50) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

--
-- 使用資料表 AUTO_INCREMENT `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderdetail_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 14;

--
-- 使用資料表 AUTO_INCREMENT `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `order_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 15;

--
-- 使用資料表 AUTO_INCREMENT `passwordreset`
--
ALTER TABLE `passwordreset`
  MODIFY `resetID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(50) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 40;

--
-- 使用資料表 AUTO_INCREMENT `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_ID` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `customer` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `entertainmentpackage`
--
ALTER TABLE `entertainmentpackage`
  ADD CONSTRAINT `entertainmentpackage_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `entertainmentpackagemap`
--
ALTER TABLE `entertainmentpackagemap`
  ADD CONSTRAINT `entertainmentpackagemap_ibfk_2` FOREIGN KEY (`entertainment_ID`) REFERENCES `entertainmentpackage` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entertainmentpackagemap_ibfk_3` FOREIGN KEY (`entertainer_ID`) REFERENCES `entertainer` (`entertainer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`provider_ID`) REFERENCES `servicesupplier` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `menumap`
--
ALTER TABLE `menumap`
  ADD CONSTRAINT `menumap_ibfk_2` FOREIGN KEY (`menuitem_ID`) REFERENCES `menuitem` (`menuitem_ID`),
  ADD CONSTRAINT `menumap_ibfk_3` FOREIGN KEY (`event_ID`) REFERENCES `menu` (`event_ID`);

--
-- 資料表的 Constraints `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`order_ID`) REFERENCES `orderhistory` (`order_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD CONSTRAINT `orderhistory_ibfk_2` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD CONSTRAINT `passwordreset_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email_address`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `servicesupplier`
--
ALTER TABLE `servicesupplier`
  ADD CONSTRAINT `servicesupplier_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`event_ID`) REFERENCES `event` (`event_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
