-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Чрв 20 2017 р., 10:03
-- Версія сервера: 5.5.55-0+deb8u1
-- Версія PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `asterisk_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `cdr`
--

CREATE TABLE IF NOT EXISTS `cdr` (
`id` int(11) NOT NULL,
  `calldate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clid` varchar(80) NOT NULL DEFAULT '',
  `src` varchar(80) NOT NULL DEFAULT '',
  `dst` varchar(80) NOT NULL DEFAULT '',
  `dcontext` varchar(80) NOT NULL DEFAULT '',
  `channel` varchar(80) NOT NULL DEFAULT '',
  `dstchannel` varchar(80) NOT NULL DEFAULT '',
  `lastapp` varchar(80) NOT NULL DEFAULT '',
  `lastdata` varchar(80) NOT NULL DEFAULT '',
  `duration` int(11) NOT NULL DEFAULT '0',
  `billsec` int(11) NOT NULL DEFAULT '0',
  `disposition` varchar(45) NOT NULL DEFAULT '',
  `amaflags` int(11) NOT NULL DEFAULT '0',
  `accountcode` varchar(20) NOT NULL DEFAULT '',
  `uniqueid` varchar(32) NOT NULL DEFAULT '',
  `userfield` varchar(255) NOT NULL DEFAULT '',
  `did` varchar(50) NOT NULL DEFAULT '',
  `recordingfile` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `cdr`
--

INSERT INTO `cdr` (`id`, `calldate`, `clid`, `src`, `dst`, `dcontext`, `channel`, `dstchannel`, `lastapp`, `lastdata`, `duration`, `billsec`, `disposition`, `amaflags`, `accountcode`, `uniqueid`, `userfield`, `did`, `recordingfile`) VALUES
(1, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', 0, 0, '', 0, '', '', '', '', ''),
(2, '2017-05-23 15:38:28', '"501" <501>', '501', '500', 'local-office', 'SIP/501-00000000', 'SIP/500-00000001', 'Dial', 'SIP/500', 11, 9, 'ANSWERED', 3, '', '1495543108.0', '', '', ''),
(3, '2017-05-23 17:59:06', '"gsm2" <+380938007874>', '+380938007874', 'gsm2', 'openvox-gsm-no', 'SIP/gsm2-00000002', 'SIP/sip5-00000003', 'Dial', 'SIP/sip5', 11, 7, 'ANSWERED', 3, '', '1495551546.3', '', '', ''),
(4, '2017-05-24 09:53:27', '"" <555>', '555', '+380503206225', 'local-office', 'SIP/555-00000004', 'SIP/gsm0-00000005', 'Dial', 'SIP/gsm0/+380503206225', 10, 0, 'NO ANSWER', 3, '', '1495608807.6', '', '', ''),
(5, '2017-05-24 09:53:56', '"gsm0" <+380503206225>', '+380503206225', 'gsm0', 'openvox-gsm-yes', 'SIP/gsm0-00000006', 'SIP/sip4-00000007', 'Dial', 'SIP/sip4', 5, 3, 'ANSWERED', 3, '', '1495608836.9', '', '', ''),
(6, '2017-05-24 09:54:10', '"" <555>', '555', '+380677447571', 'local-office', 'SIP/555-00000008', 'SIP/gsm1-00000009', 'Dial', 'SIP/gsm1/+380677447571', 10, 5, 'ANSWERED', 3, '', '1495608850.12', '', '', ''),
(7, '2017-05-24 09:54:32', '"" <555>', '555', '+380675606791', 'local-office', 'SIP/555-0000000a', 'SIP/gsm1-0000000b', 'Dial', 'SIP/gsm1/+380675606791', 8, 4, 'ANSWERED', 3, '', '1495608872.15', '', '', ''),
(8, '2017-05-24 09:56:19', '"" <555>', '555', '+380504812594', 'local-office', 'SIP/555-0000000c', 'SIP/gsm0-0000000d', 'Dial', 'SIP/gsm0/+380504812594', 39, 19, 'ANSWERED', 3, '', '1495608979.18', '', '', ''),
(9, '2017-05-24 11:25:38', '"" <555>', '555', '+380675606791', 'local-office', 'SIP/555-0000000e', 'SIP/gsm1-0000000f', 'Dial', 'SIP/gsm1/+380675606791', 8, 4, 'ANSWERED', 3, '', '1495614338.21', '', '', ''),
(10, '2017-05-24 14:55:26', '"gsm2" <+380938007874>', '+380938007874', 'gsm2', 'openvox-gsm-no', 'SIP/gsm2-00000010', 'SIP/sip5-00000011', 'Dial', 'SIP/sip5', 3, 2, 'ANSWERED', 3, '', '1495626926.24', '', '', ''),
(11, '2017-05-24 15:06:20', '"" <555>', '555', '+380675606791', 'local-office', 'SIP/555-00000012', 'SIP/gsm1-00000013', 'Dial', 'SIP/gsm1/+380675606791', 117, 96, 'ANSWERED', 3, '', '1495627580.27', '', '', ''),
(12, '2017-05-24 15:39:12', '"" <555>', '555', '+380504624041', 'local-office', 'SIP/555-00000014', 'SIP/gsm0-00000015', 'Dial', 'SIP/gsm0/+380504624041', 122, 108, 'ANSWERED', 3, '', '1495629552.30', '', '', ''),
(13, '2017-05-24 16:50:10', '"gsm2" <+380938007874>', '+380938007874', 'gsm2', 'openvox-gsm-no', 'SIP/gsm2-00000016', 'SIP/sip5-00000017', 'Dial', 'SIP/sip5', 4, 2, 'ANSWERED', 3, '', '1495633810.33', '', '', ''),
(14, '2017-05-24 16:54:30', '"" <555>', '555', '+380503969326', 'local-office', 'SIP/555-00000018', 'SIP/gsm0-00000019', 'Dial', 'SIP/gsm0/+380503969326', 18, 0, 'BUSY', 3, '', '1495634070.36', '', '', ''),
(15, '2017-05-24 16:55:02', '"" <555>', '555', '+380504801294', 'local-office', 'SIP/555-0000001a', 'SIP/gsm0-0000001b', 'Dial', 'SIP/gsm0/+380504801294', 8, 0, 'NO ANSWER', 3, '', '1495634102.39', '', '', ''),
(16, '2017-05-24 16:55:17', '"" <555>', '555', '+380503969326', 'local-office', 'SIP/555-0000001c', 'SIP/gsm0-0000001d', 'Dial', 'SIP/gsm0/+380503969326', 5, 0, 'FAILED', 3, '', '1495634117.42', '', '', ''),
(17, '2017-05-24 16:56:24', '"" <555>', '555', '+380675670303', 'local-office', 'SIP/555-0000001e', 'SIP/gsm1-0000001f', 'Dial', 'SIP/gsm1/+380675670303', 78, 71, 'ANSWERED', 3, '', '1495634184.45', '', '', ''),
(18, '2017-05-24 17:11:01', '"gsm2" <+380938007874>', '+380938007874', 'gsm2', 'openvox-gsm-no', 'SIP/gsm2-00000020', 'SIP/sip5-00000021', 'Dial', 'SIP/sip5', 4, 2, 'ANSWERED', 3, '', '1495635061.48', '', '', ''),
(19, '2017-05-24 17:13:05', '"" <555>', '555', '+380677447571', 'local-office', 'SIP/555-00000022', 'SIP/gsm1-00000023', 'Dial', 'SIP/gsm1/+380677447571', 277, 261, 'ANSWERED', 3, '', '1495635185.51', '', '', ''),
(20, '2017-05-24 18:07:05', '"" <555>', '555', '+380509631108', 'local-office', 'SIP/555-00000024', 'SIP/gsm0-00000025', 'Dial', 'SIP/gsm0/+380509631108', 72, 50, 'ANSWERED', 3, '', '1495638425.54', '', '', ''),
(21, '2017-05-24 18:56:08', '"" <555>', '555', '+380677447571', 'local-office', 'SIP/555-00000026', 'SIP/gsm1-00000027', 'Dial', 'SIP/gsm1/+380677447571', 63, 39, 'ANSWERED', 3, '', '1495641368.57', '', '', ''),
(22, '2017-05-25 10:46:48', '"500" <500>', '500', '501', 'local-office', 'SIP/500-00000028', 'SIP/501-00000029', 'Dial', 'SIP/501', 18, 0, 'BUSY', 3, '', '1495698408.60', '', '', ''),
(23, '2017-05-26 15:49:37', '"4" <900>', '900', '380953553624', 'local-office', 'SIP/900-0000002a', 'SIP/gsm0-0000002b', 'Dial', 'SIP/gsm0/+380953553624', 23, 0, 'NO ANSWER', 3, '', '1495802977.63', '', '', ''),
(24, '2017-05-29 17:20:19', '"gsm0" <+380669258505>', '+380669258505', 'gsm0', 'openvox-gsm-yes', 'SIP/gsm0-00000000', 'SIP/sip4-00000001', 'Dial', 'SIP/sip4', 4, 3, 'ANSWERED', 3, '', '1496067619.0', '', '', ''),
(25, '2017-05-29 17:24:10', '"gsm2" <+380938007874>', '+380938007874', 'gsm2', 'openvox-gsm-no', 'SIP/gsm2-00000002', 'SIP/sip5-00000003', 'Dial', 'SIP/sip5', 4, 3, 'ANSWERED', 3, '', '1496067850.3', '', '', ''),
(26, '2017-05-29 17:25:18', '"gsm0" <+380669258505>', '+380669258505', 'gsm0', 'openvox-gsm-yes', 'SIP/gsm0-00000004', 'SIP/sip4-00000005', 'Dial', 'SIP/sip4', 4, 2, 'ANSWERED', 3, '', '1496067918.6', '', '', ''),
(27, '2017-05-29 17:25:50', '"gsm0" <+380669258505>', '+380669258505', 'gsm0', 'openvox-gsm-yes', 'SIP/gsm0-00000006', 'SIP/sip4-00000007', 'Dial', 'SIP/sip4', 3, 2, 'ANSWERED', 3, '', '1496067950.9', '', '', ''),
(28, '2017-05-29 17:53:03', '"gsm2" <+380938007874>', '+380938007874', 'gsm2', 'openvox-gsm-no', 'SIP/gsm2-00000008', 'SIP/sip5-00000009', 'Dial', 'SIP/sip5', 3, 2, 'ANSWERED', 3, '', '1496069583.12', '', '', ''),
(29, '2017-05-30 09:54:33', '"gsm2" <+380938007874>', '+380938007874', 'gsm2', 'openvox-gsm-no', 'SIP/gsm2-00000000', 'SIP/sip5-00000001', 'Dial', 'SIP/sip5', 3, 2, 'ANSWERED', 3, '', '1496127273.0', '', '', ''),
(30, '2017-06-07 09:40:33', '"4" <900>', '900', '380503403622', 'local-office', 'SIP/900-00000004', 'SIP/gsm0-00000005', 'Dial', 'SIP/gsm0/+380503403622', 46, 22, 'ANSWERED', 3, '', '1496817633.5', '', '', ''),
(31, '2017-06-07 12:07:52', '"gsm0" <+380503403622>', '+380503403622', 'gsm0', 'openvox-gsm-yes', 'SIP/gsm0-00000006', 'SIP/sip4-00000007', 'Dial', 'SIP/sip4', 2, 0, 'ANSWERED', 3, '', '1496826472.8', '', '', '');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `cdr`
--
ALTER TABLE `cdr`
 ADD PRIMARY KEY (`id`), ADD KEY `calldate` (`calldate`), ADD KEY `dst` (`dst`), ADD KEY `accountcode` (`accountcode`), ADD KEY `uniqueid` (`uniqueid`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `cdr`
--
ALTER TABLE `cdr`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
