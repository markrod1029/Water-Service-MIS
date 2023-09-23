-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2023 at 05:54 AM
-- Server version: 5.7.42-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `time_loged` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_ID`, `name`, `position`, `time_loged`, `status`) VALUES
(392, 'William V Gusto', 'Admin', '2023-02-27 09:39:43', 'Logged in'),
(393, 'William V Gusto', 'Admin', '2023-02-27 09:40:05', ' View Luzviminda  Buaya Buaya Information'),
(394, 'William V Gusto', 'Admin', '2023-02-27 09:42:10', 'Added as a new Advisory'),
(395, 'William V Gusto', 'Admin', '2023-02-27 09:42:13', 'Private Advisory Turn Public'),
(396, 'William V Gusto', 'Admin', '2023-02-27 09:43:05', ' View Luzviminda  Buaya Buaya Information'),
(397, '', 'Admin', '2023-02-27 09:43:36', 'Send to a Plumber a Pending Client'),
(398, 'Leonardo Cancino Mejia', 'Plumber', '2023-02-27 09:44:56', 'Logged in'),
(399, 'Leonardo Cancino Mejia', 'Plumber', '2023-02-27 09:45:31', 'Client For Inspection Already Visited!'),
(400, 'William V Gusto', 'Admin', '2023-02-27 09:45:38', 'Logged in'),
(401, 'William V Gusto', 'Admin', '2023-02-27 09:46:20', 'Approved The Inspection'),
(402, 'Leonardo Cancino Mejia', 'Plumber', '2023-02-27 09:47:36', 'Logged in'),
(403, 'Leonardo Cancino Mejia', 'Plumber', '2023-02-27 09:47:47', 'Already Installed'),
(404, 'William V Gusto', 'Admin', '2023-02-27 09:48:06', 'Logged in'),
(405, 'William V Gusto', 'Admin', '2023-02-27 09:49:18', 'Added as a new SOA'),
(406, 'William V Gusto', 'Admin', '2023-02-28 22:39:57', 'Logged in'),
(407, 'William V Gusto', 'Admin', '2023-03-08 09:07:21', 'Logged in'),
(408, 'William V Gusto', 'Admin', '2023-03-08 09:09:46', ' View Mark Pandoy Pandoy Information'),
(409, 'William V Gusto', 'Admin', '2023-03-08 09:10:03', 'Updated a Client'),
(410, 'William V Gusto', 'Admin', '2023-03-08 09:10:06', 'Updated a Client'),
(411, 'William V Gusto', 'Admin', '2023-03-08 09:10:19', 'Updated a Client'),
(412, 'William V Gusto', 'Admin', '2023-03-08 09:10:24', 'Updated a Client'),
(413, 'William V Gusto', 'Admin', '2023-03-08 09:10:38', 'Updated a Client'),
(414, 'William V Gusto', 'Admin', '2023-03-08 09:10:42', 'Updated a Client'),
(415, 'William V Gusto', 'Admin', '2023-03-08 13:26:33', 'Logged in'),
(416, 'William V Gusto', 'Admin', '2023-03-08 15:40:10', 'Logged in'),
(417, 'Luzviminda  G. Buaya', 'Client', '2023-03-08 15:42:33', 'Logged in'),
(418, 'William V Gusto', 'Admin', '2023-03-08 15:43:08', 'Logged in'),
(419, 'William V Gusto', 'Admin', '2023-03-08 15:50:19', ' View Luzviminda  Buaya Buaya Information'),
(420, 'William V Gusto', 'Admin', '2023-03-08 15:51:07', ' View Luzviminda  Buaya Buaya Information'),
(421, 'William V Gusto', 'Admin', '2023-03-08 21:18:06', 'Logged in'),
(422, 'William V Gusto', 'Admin', '2023-03-15 20:25:33', 'Logged in'),
(423, 'Luzviminda  G. Buaya', 'Client', '2023-03-15 20:56:45', 'Logged in'),
(424, 'Luzviminda  G. Buaya', 'Client', '2023-03-15 20:57:09', 'Send  Complaint'),
(425, 'William V Gusto', 'Admin', '2023-03-15 20:57:20', 'Logged in'),
(426, 'William V Gusto', 'Admin', '2023-03-15 20:58:45', 'Logged in'),
(427, 'William V Gusto', 'Admin', '2023-03-15 21:16:32', 'Updated as a SOA'),
(428, 'William V Gusto', 'Admin', '2023-03-15 21:16:38', 'Updated as a SOA'),
(429, 'Leonardo Cancino Mejia', 'Plumber', '2023-03-15 21:19:07', 'Logged in'),
(430, 'William V Gusto', 'Admin', '2023-03-15 21:19:32', 'Logged in'),
(431, 'William V Gusto', 'Admin', '2023-03-15 21:20:02', 'Successfully Scheduled (2023-03-15T21:19) and Sent'),
(432, 'Leonardo Cancino Mejia', 'Plumber', '2023-03-15 21:20:40', 'Logged in'),
(433, 'Luzviminda  G. Buaya', 'Client', '2023-03-15 21:22:44', 'Logged in'),
(434, 'William V Gusto', 'Admin', '2023-03-16 20:07:02', 'Logged in'),
(435, 'William V Gusto', 'Admin', '2023-03-16 20:30:31', 'Logged in'),
(436, 'William V Gusto', 'Admin', '2023-03-17 06:42:37', 'Logged in'),
(437, 'Luzviminda  G. Buaya', 'Client', '2023-03-17 06:48:23', 'Logged in'),
(438, 'Luzviminda  G. Buaya', 'Client', '2023-03-17 07:12:07', 'Send  Complaint'),
(439, 'Leonardo Cancino Mejia', 'Plumber', '2023-03-17 07:19:40', 'Logged in'),
(440, 'William V Gusto', 'Admin', '2023-03-17 07:21:44', 'Logged in'),
(441, 'William V Gusto', 'Admin', '2023-03-17 07:22:05', ' View Mary Joy  De Guzman De Guzman Information'),
(442, '', 'Admin', '2023-03-17 07:22:16', 'Send to a Plumber a Pending Client'),
(443, 'William V Gusto', 'Admin', '2023-03-17 07:23:19', ' View Mary Joy  De Guzman De Guzman Information'),
(444, 'Felix Lamon Soriano', 'Plumber', '2023-03-17 07:24:11', 'Logged in'),
(445, 'Felix Lamon Soriano', 'Plumber', '2023-03-17 07:25:25', 'Client For Inspection Already Visited!'),
(446, 'Leonardo Cancino Mejia', 'Plumber', '2023-03-17 07:26:39', 'Logged in'),
(447, 'William V Gusto', 'Admin', '2023-03-17 07:38:50', 'Approved The Inspection'),
(448, 'Felix Lamon Soriano', 'Plumber', '2023-03-17 07:39:15', 'Logged in'),
(449, 'William V Gusto', 'Admin', '2023-03-17 09:24:23', 'Logged in'),
(450, 'William V Gusto', 'Admin', '2023-03-17 09:25:22', 'Added as a new SOA'),
(451, 'William V Gusto', 'Admin', '2023-03-17 13:25:01', 'Logged in'),
(452, 'William V Gusto', 'Admin', '2023-03-17 13:32:46', ' View Luzviminda  Buaya Buaya Information'),
(453, 'William V Gusto', 'Admin', '2023-03-17 13:36:08', 'Logged in'),
(454, 'William V Gusto', 'Admin', '2023-03-17 13:42:11', 'Logged in'),
(455, 'William V Gusto', 'Admin', '2023-03-17 13:42:38', ' View Luzviminda  Buaya Buaya Information'),
(456, 'William V Gusto', 'Admin', '2023-03-18 21:01:38', 'Logged in'),
(457, 'William V Gusto', 'Admin', '2023-03-18 21:01:50', ' View Luzviminda  Buaya Buaya Information'),
(458, 'William V Gusto', 'Admin', '2023-04-27 09:30:17', 'Logged in'),
(459, 'William V Gusto', 'Admin', '2023-05-04 11:02:26', 'Logged in'),
(460, 'William V Gusto', 'Admin', '2023-05-04 11:02:26', 'Logged in'),
(461, 'William V Gusto', 'Admin', '2023-05-04 11:05:27', 'Logged in'),
(462, 'William V Gusto', 'Admin', '2023-05-04 11:17:01', ' View Luzviminda  Buaya Buaya Information'),
(463, 'William V Gusto', 'Admin', '2023-05-04 11:17:45', ' View Luzviminda  Buaya Buaya Information'),
(464, 'William V Gusto', 'Admin', '2023-05-04 11:18:27', ' View Mary Joy  De Guzman De Guzman Information'),
(465, 'William V Gusto', 'Admin', '2023-05-04 11:27:36', ' View Mark Pandoy Pandoy Information'),
(466, 'William V Gusto', 'Admin', '2023-05-04 11:31:11', ' View Luzviminda  Buaya Buaya Information'),
(467, 'William V Gusto', 'Admin', '2023-05-04 11:39:01', ' View Luzviminda  Buaya Buaya Information'),
(468, 'William V Gusto', 'Admin', '2023-05-04 11:55:06', ' View Mary Joy  De Guzman De Guzman Information'),
(469, 'William V Gusto', 'Admin', '2023-05-04 17:40:04', 'Logged in'),
(470, 'William V Gusto', 'Admin', '2023-05-04 18:05:45', ' View Luzviminda  Buaya Buaya Information'),
(471, 'William V Gusto', 'Admin', '2023-05-04 18:16:26', ' View Luzviminda  Buaya Buaya Information'),
(472, 'William V Gusto', 'Admin', '2023-05-04 18:16:39', ' View Mary Joy  De Guzman De Guzman Information'),
(473, 'William V Gusto', 'Admin', '2023-05-04 18:49:01', ' View Luzviminda  Buaya Buaya Information'),
(474, 'William V Gusto', 'Admin', '2023-05-05 06:00:23', 'Logged in'),
(475, 'William V Gusto', 'Admin', '2023-05-05 09:27:41', 'Logged in'),
(476, 'William V Gusto', 'Admin', '2023-05-05 10:53:11', ' View Luzviminda  Buaya Buaya Information'),
(477, 'William V Gusto', 'Admin', '2023-05-05 10:59:52', 'Added as a new Advisory'),
(478, 'William V Gusto', 'Admin', '2023-05-05 10:59:52', 'Added as a new Advisory'),
(479, 'William V Gusto', 'Admin', '2023-05-05 10:59:52', 'Added as a new Advisory'),
(480, 'William V Gusto', 'Admin', '2023-05-05 10:59:52', 'Added as a new Advisory'),
(481, 'William V Gusto', 'Admin', '2023-05-05 11:09:40', 'Selected  Private Advisory  Deleted '),
(482, 'William V Gusto', 'Admin', '2023-05-05 11:10:11', 'Added as a new Advisory'),
(483, 'William V Gusto', 'Admin', '2023-05-05 11:11:13', 'Added as a new Advisory'),
(484, 'William V Gusto', 'Admin', '2023-05-05 11:15:19', 'Added as a new Advisory'),
(485, 'William V Gusto', 'Admin', '2023-05-07 07:29:03', 'Logged in'),
(486, 'William V Gusto', 'Admin', '2023-05-07 07:30:04', ' View Mary Joy  De Guzman De Guzman Information'),
(487, 'William V Gusto', 'Admin', '2023-05-08 10:19:53', 'Logged in'),
(488, 'William V Gusto', 'Admin', '2023-05-09 09:50:04', 'Logged in'),
(489, 'William V Gusto', 'Admin', '2023-05-09 09:50:13', ' View Luzviminda  Buaya Buaya Information'),
(490, 'William V Gusto', 'Admin', '2023-05-09 09:54:33', ' View Mary Joy  De Guzman De Guzman Information'),
(491, 'William V Gusto', 'Admin', '2023-05-09 09:54:49', ' View Luzviminda  Buaya Buaya Information'),
(492, 'William V Gusto', 'Admin', '2023-05-09 11:04:32', 'Logged in'),
(493, 'William V Gusto', 'Admin', '2023-05-09 11:14:06', 'Added as a new Client'),
(494, 'William V Gusto', 'Admin', '2023-05-09 11:41:45', 'Added as a new Client'),
(495, 'William V Gusto', 'Admin', '2023-05-09 11:43:38', ' View dsfsdf asfdfd asfdfd Information'),
(496, 'William V Gusto', 'Admin', '2023-05-09 11:44:03', ' View Luzviminda  Buaya Buaya Information'),
(497, 'William V Gusto', 'Admin', '2023-05-09 16:04:05', 'Logged in'),
(498, 'William V Gusto', 'Admin', '2023-05-10 20:40:31', 'Logged in'),
(499, 'William V Gusto', 'Admin', '2023-05-10 20:41:02', ' View Luzviminda  Buaya Buaya Information'),
(500, 'William V Gusto', 'Admin', '2023-05-10 20:42:51', ' View dsfsdf asfdfd asfdfd Information'),
(501, 'William V Gusto', 'Admin', '2023-05-10 20:44:10', ' View Luzviminda  Buaya Buaya Information'),
(502, 'William V Gusto', 'Admin', '2023-05-10 20:46:32', ' View dsfsdf asfdfd asfdfd Information'),
(503, 'William V Gusto', 'Admin', '2023-05-10 20:52:43', ' View dsfsdf asfdfd asfdfd Information'),
(504, 'William V Gusto', 'Admin', '2023-05-10 20:53:45', ' View dsfsdf asfdfd asfdfd Information'),
(505, 'William V Gusto', 'Admin', '2023-05-10 20:55:10', ' View dsfsdf asfdfd asfdfd Information'),
(506, 'William V Gusto', 'Admin', '2023-05-10 20:55:17', ' View Luzviminda  Buaya Buaya Information'),
(507, 'William V Gusto', 'Admin', '2023-05-10 20:59:42', ' View Luzviminda  Buaya Buaya Information'),
(508, 'Luzviminda  G. Buaya', 'Client', '2023-05-10 21:03:39', 'Logged in'),
(509, 'William V Gusto', 'Admin', '2023-05-11 06:14:01', 'Logged in'),
(510, 'William V Gusto', 'Admin', '2023-05-11 06:20:57', 'Logged in'),
(511, 'William V Gusto', 'Admin', '2023-05-11 09:04:39', 'Logged in'),
(512, 'William V Gusto', 'Admin', '2023-05-11 09:05:08', ' View dsfsdf asfdfd asfdfd Information'),
(513, 'William V Gusto', 'Admin', '2023-05-11 09:21:36', ' View Luzviminda  Buaya Buaya Information'),
(514, 'William V Gusto', 'Admin', '2023-05-11 09:26:13', ' View dsfsdf asfdfd asfdfd Information'),
(515, 'William V Gusto', 'Admin', '2023-05-11 09:28:57', ' View dsfsdf asfdfd asfdfd Information'),
(516, 'William V Gusto', 'Admin', '2023-05-11 09:29:03', ' View Luzviminda  Buaya Buaya Information'),
(517, 'William V Gusto', 'Admin', '2023-05-11 09:40:19', ' View dsfsdf asfdfd asfdfd Information'),
(518, 'William V Gusto', 'Admin', '2023-05-11 09:42:59', ' View dsfsdf asfdfd asfdfd Information'),
(519, 'William V Gusto', 'Admin', '2023-05-11 12:58:17', ' View Luzviminda  Buaya Buaya Information'),
(520, 'William V Gusto', 'Admin', '2023-05-11 13:06:16', ' View Luzviminda  Buaya Buaya Information'),
(521, 'William V Gusto', 'Admin', '2023-05-11 13:11:38', ' View dsfsdf asfdfd asfdfd Information'),
(522, 'William V Gusto', 'Admin', '2023-05-11 13:21:11', 'Logged in'),
(523, 'William V Gusto', 'Admin', '2023-05-11 13:22:25', ' View dsfsdf asfdfd asfdfd Information'),
(524, 'William V Gusto', 'Admin', '2023-05-11 13:27:24', ' View dsfsdf asfdfd asfdfd Information'),
(525, 'William V Gusto', 'Admin', '2023-05-11 14:24:17', ' View dsfsdf asfdfd asfdfd Information'),
(526, 'Leonardo Cancino Mejia', 'Plumber', '2023-05-11 14:26:51', 'Logged in'),
(527, 'William V Gusto', 'Admin', '2023-05-11 14:27:41', 'Logged in'),
(528, 'William V Gusto', 'Admin', '2023-05-11 20:50:06', 'Logged in'),
(529, 'William V Gusto', 'Admin', '2023-05-11 21:10:38', ' View dsfsdf asfdfd asfdfd Information'),
(530, 'William V Gusto', 'Admin', '2023-05-11 21:11:37', ' View dsfsdf asfdfd asfdfd Information'),
(531, 'William V Gusto', 'Admin', '2023-05-11 21:11:54', ' View Luzviminda  Buaya Buaya Information'),
(532, 'William V Gusto', 'Admin', '2023-05-12 13:37:39', 'Logged in'),
(533, 'William V Gusto', 'Admin', '2023-05-13 14:26:02', 'Logged in'),
(534, 'William V Gusto', 'Admin', '2023-05-13 14:26:57', ' View Luzviminda  Buaya Buaya Information'),
(535, 'William V Gusto', 'Admin', '2023-05-13 14:27:56', ' View dsfsdf asfdfd asfdfd Information'),
(536, 'William V Gusto', 'Admin', '2023-05-13 14:37:32', ' View dsfsdf asfdfd asfdfd Information'),
(537, 'William V Gusto', 'Admin', '2023-05-13 14:43:28', ' View dsfsdf asfdfd asfdfd Information'),
(538, 'William V Gusto', 'Admin', '2023-05-13 15:14:49', ' View dsfsdf asfdfd asfdfd Information'),
(539, 'William V Gusto', 'Admin', '2023-05-13 15:24:04', ' View dsfsdf asfdfd asfdfd Information'),
(540, 'William V Gusto', 'Admin', '2023-05-13 15:26:32', ' View dsfsdf asfdfd asfdfd Information'),
(541, 'William V Gusto', 'Admin', '2023-05-14 06:17:45', 'Logged in'),
(542, 'William V Gusto', 'Admin', '2023-05-14 06:23:11', ' View dsfsdf asfdfd asfdfd Information'),
(543, 'William V Gusto', 'Admin', '2023-05-14 06:28:19', ' View Luzviminda  Buaya Buaya Information'),
(544, 'William V Gusto', 'Admin', '2023-05-14 07:28:36', 'Logged in'),
(545, 'William V Gusto', 'Admin', '2023-05-14 08:44:30', 'Logged in'),
(546, 'William V Gusto', 'Admin', '2023-05-15 08:59:36', 'Logged in'),
(547, 'William V Gusto', 'Admin', '2023-05-15 09:09:22', 'Updated a Client'),
(548, 'William V Gusto', 'Admin', '2023-05-15 09:09:24', 'Updated a Client'),
(549, 'William V Gusto', 'Admin', '2023-05-15 09:09:30', 'Updated a Client'),
(550, 'William V Gusto', 'Admin', '2023-05-15 09:12:27', ' View Luzviminda  Buaya Buaya Information'),
(551, 'William V Gusto', 'Admin', '2023-05-15 10:10:31', 'Logged in'),
(552, 'William V Gusto', 'Admin', '2023-05-15 11:01:48', ' View Luzviminda  Buaya Buaya Information'),
(553, 'William V Gusto', 'Admin', '2023-05-15 11:10:00', ' View dsfsdf asfdfd asfdfd Information'),
(554, 'William V Gusto', 'Admin', '2023-05-15 11:12:09', ' View Luzviminda  Buaya Buaya Information'),
(555, 'William V Gusto', 'Admin', '2023-05-15 11:12:26', ' View dsfsdf asfdfd asfdfd Information'),
(556, 'William V Gusto', 'Admin', '2023-05-15 11:12:47', ' View dsfsdf asfdfd asfdfd Information'),
(557, 'William V Gusto', 'Admin', '2023-05-15 11:13:01', ' View Luzviminda  Buaya Buaya Information'),
(558, 'William V Gusto', 'Admin', '2023-05-15 11:30:31', 'Logged in'),
(559, 'William V Gusto', 'Admin', '2023-05-15 11:33:47', 'Added as a new Advisory'),
(560, 'Luzviminda  G. Buaya', 'Client', '2023-05-15 12:51:43', 'Logged in'),
(561, 'William V Gusto', 'Admin', '2023-05-15 13:01:17', 'Logged in'),
(562, 'Leonardo Cancino Mejia', 'Plumber', '2023-05-15 13:15:15', 'Logged in'),
(563, 'William V Gusto', 'Admin', '2023-05-15 13:34:53', ' View Luzviminda  Buaya Buaya Information'),
(564, 'William V Gusto', 'Admin', '2023-05-15 14:12:12', 'Logged in'),
(565, 'William V Gusto', 'Admin', '2023-05-15 14:13:28', ' View Mary Joy  De Guzman De Guzman Information'),
(566, 'William V Gusto', 'Admin', '2023-05-15 14:13:41', ' View dfds fsfsd fsfsd Information'),
(567, 'William V Gusto', 'Admin', '2023-05-15 14:13:47', ' View dsfsdf asfdfd asfdfd Information'),
(568, 'William V Gusto', 'Admin', '2023-05-15 14:13:52', ' View Mary Joy  De Guzman De Guzman Information'),
(569, 'William V Gusto', 'Admin', '2023-05-15 14:14:15', ' View dsfsdf asfdfd asfdfd Information'),
(570, 'William V Gusto', 'Admin', '2023-05-15 14:14:29', ' View dsfsdf asfdfd asfdfd Information'),
(571, 'William V Gusto', 'Admin', '2023-05-15 14:15:23', ' View Luzviminda  Buaya Buaya Information'),
(572, 'William V Gusto', 'Admin', '2023-05-15 14:17:29', ' View dsfsdf asfdfd asfdfd Information'),
(573, 'William V Gusto', 'Admin', '2023-05-15 14:17:33', ' View Mary Joy  De Guzman De Guzman Information'),
(574, 'William V Gusto', 'Admin', '2023-05-15 14:21:34', ' View Luzviminda  Buaya Buaya Information'),
(575, 'William V Gusto', 'Admin', '2023-05-15 14:22:40', ' View dfds fsfsd fsfsd Information'),
(576, 'Luzviminda  G. Buaya', 'Client', '2023-05-15 14:45:55', 'Logged in'),
(577, 'Leonardo Cancino Mejia', 'Plumber', '2023-05-15 14:50:56', 'Logged in'),
(578, 'William V Gusto', 'Admin', '2023-05-15 20:17:47', 'Logged in'),
(579, 'William V Gusto', 'Admin', '2023-05-16 20:08:03', 'Logged in'),
(580, 'William V Gusto', 'Admin', '2023-05-16 20:25:26', 'Added as a new SOA'),
(581, 'William V Gusto', 'Admin', '2023-05-16 22:44:42', 'Logged in'),
(582, 'William V Gusto', 'Admin', '2023-05-16 22:46:17', ' View dsfsdf asfdfd asfdfd Information'),
(583, 'William V Gusto', 'Admin', '2023-05-16 22:53:59', ' View Luzviminda  Buaya Buaya Information'),
(584, 'William V Gusto', 'Admin', '2023-05-16 22:54:12', ' View Mary Joy  De Guzman De Guzman Information'),
(585, 'William V Gusto', 'Admin', '2023-05-16 22:54:24', ' View dsfsdf asfdfd asfdfd Information'),
(586, '', 'Admin', '2023-05-16 23:11:00', 'Send to a Plumber a Pending Client'),
(587, 'William V Gusto', 'Admin', '2023-05-16 23:11:18', ' View Mary Joy  De Guzman De Guzman Information'),
(588, 'Lando Cayago Mejia', 'Plumber', '2023-05-16 23:14:27', 'Logged in'),
(589, 'William V Gusto', 'Admin', '2023-05-16 23:20:18', ' View Mary Joy  De Guzman De Guzman Information'),
(590, 'William V Gusto', 'Admin', '2023-05-16 23:20:26', ' View dsfsdf asfdfd asfdfd Information'),
(591, 'William V Gusto', 'Admin', '2023-05-17 10:34:14', 'Logged in'),
(592, 'William V Gusto', 'Admin', '2023-05-17 10:37:07', 'Logged in'),
(593, 'William V Gusto', 'Admin', '2023-05-17 13:29:45', 'Logged in'),
(594, 'William V Gusto', 'Admin', '2023-05-17 20:54:28', 'Logged in'),
(595, 'William V Gusto', 'Admin', '2023-05-17 21:10:00', 'Added as a new Date Billed'),
(596, 'William V Gusto', 'Admin', '2023-05-17 21:25:44', 'Updated a Date Billed'),
(597, 'Lando Cayago Mejia', 'Plumber', '2023-05-17 21:31:17', 'Logged in'),
(598, 'Leonardo Cancino Mejia', 'Plumber', '2023-05-17 22:36:54', 'Logged in'),
(599, 'Leonardo Cancino Mejia', 'Plumber', '2023-05-17 22:37:42', 'Complaint Fixed and Visited'),
(600, '  ', 'Plumber', '2023-05-17 22:45:50', 'Complaint Date (2023-05-17 22:44:PM) Unavailable'),
(601, 'Leonardo Cancino Mejia', 'Plumber', '2023-05-17 22:51:46', 'Complaint Fixed and Visited'),
(602, 'William V Gusto', 'Admin', '2023-05-17 22:55:11', ' View Mary Joy  De Guzman De Guzman Information'),
(603, 'Felix Lamon Soriano', 'Plumber', '2023-05-17 22:56:11', 'Logged in'),
(604, 'Felix Lamon Soriano', 'Plumber', '2023-05-17 23:01:33', 'Already Installed'),
(605, 'William V Gusto', 'Admin', '2023-05-17 23:08:09', ' View dsfsdf asfdfd asfdfd Information'),
(606, 'William V Gusto', 'Admin', '2023-05-17 23:08:21', ' View dfds fsfsd fsfsd Information'),
(607, '', 'Admin', '2023-05-17 23:08:33', 'Send to a Plumber a Pending Client'),
(608, 'Felix Lamon Soriano', 'Plumber', '2023-05-17 23:08:45', 'Client For Inspection Already Visited!'),
(609, 'William V Gusto', 'Admin', '2023-05-17 23:18:40', 'Approved The Inspection'),
(610, 'Felix Lamon Soriano', 'Plumber', '2023-05-17 23:21:07', 'Already Installed'),
(611, 'William V Gusto', 'Admin', '2023-05-17 23:23:38', ' View dsfsdf asfdfd asfdfd Information'),
(612, 'Lando Cayago Mejia', 'Plumber', '2023-05-17 23:24:01', 'Logged in'),
(613, 'Lando Cayago Mejia', 'Plumber', '2023-05-17 23:24:13', 'Client For Inspection Already Visited!'),
(614, 'William V Gusto', 'Admin', '2023-05-17 23:24:36', 'Approved The Inspection'),
(615, 'William V Gusto', 'Admin', '2023-05-17 23:25:19', 'Approved The Inspection'),
(616, 'Luzviminda  G. Buaya', 'Client', '2023-05-17 23:27:43', 'Logged in'),
(617, 'William V Gusto', 'Admin', '2023-05-18 10:06:15', 'Logged in'),
(618, 'William V Gusto', 'Admin', '2023-05-18 10:06:54', ' View dsfsdf asfdfd asfdfd Information'),
(619, 'William V Gusto', 'Admin', '2023-05-18 10:18:45', ' View dsfsdf asfdfd asfdfd Information'),
(620, 'William V Gusto', 'Admin', '2023-05-18 10:18:54', ' View Luzviminda  Buaya Buaya Information'),
(621, 'William V Gusto', 'Admin', '2023-05-18 18:15:54', 'Logged in'),
(622, 'William V Gusto', 'Admin', '2023-05-18 18:17:26', ' View dsfsdf asfdfd asfdfd Information'),
(623, 'William V Gusto', 'Admin', '2023-05-18 18:17:50', ' View dsfsdf asfdfd asfdfd Information'),
(624, 'William V Gusto', 'Admin', '2023-05-18 18:18:43', ' View Luzviminda  Buaya Buaya Information'),
(625, 'William V Gusto', 'Admin', '2023-05-18 18:25:07', ' View dsfsdf asfdfd asfdfd Information'),
(626, 'William V Gusto', 'Admin', '2023-05-18 18:28:15', ' View Luzviminda  Buaya Buaya Information'),
(627, 'William V Gusto', 'Admin', '2023-05-18 18:28:34', ' View dsfsdf asfdfd asfdfd Information'),
(628, 'William V Gusto', 'Admin', '2023-05-18 18:29:03', ' View Luzviminda  Buaya Buaya Information'),
(629, 'William V Gusto', 'Admin', '2023-05-18 18:33:54', ' View dsfsdf asfdfd asfdfd Information'),
(630, 'William V Gusto', 'Admin', '2023-05-18 18:40:45', ' View Luzviminda  Buaya Buaya Information'),
(631, 'Luzviminda  G. Buaya', 'Client', '2023-05-18 19:00:42', 'Logged in'),
(632, 'Luzviminda  G. Buaya', 'Client', '2023-05-18 19:01:56', 'Send  Complaint'),
(633, 'Leonardo Cancino Mejia', 'Plumber', '2023-05-18 19:59:39', 'Logged in'),
(634, 'Luzviminda  G. Buaya', 'Client', '2023-05-18 20:24:45', 'Logged in'),
(635, 'William V Gusto', 'Admin', '2023-05-18 20:28:28', ' View dsfsdf asfdfd asfdfd Information'),
(636, 'William V Gusto', 'Admin', '2023-05-18 20:30:31', ' View Luzviminda  Buaya Buaya Information'),
(637, 'William V Gusto', 'Admin', '2023-05-18 20:31:53', ' View dsfsdf asfdfd asfdfd Information'),
(638, 'William V Gusto', 'Admin', '2023-05-18 20:32:25', ' View dsfsdf asfdfd asfdfd Information'),
(639, 'William V Gusto', 'Admin', '2023-05-18 20:34:52', ' View dsfsdf asfdfd asfdfd Information'),
(640, 'William V Gusto', 'Admin', '2023-05-18 20:36:21', ' View dsfsdf asfdfd asfdfd Information'),
(641, 'Luzviminda  G. Buaya', 'Client', '2023-05-18 21:13:42', 'Logged in'),
(642, 'William V Gusto', 'Admin', '2023-05-18 21:45:30', ' View dsfsdf asfdfd asfdfd Information'),
(643, 'William V Gusto', 'Admin', '2023-05-19 05:49:04', 'Logged in'),
(644, 'William V Gusto', 'Admin', '2023-05-19 05:54:20', 'Logged in'),
(645, 'William V Gusto', 'Admin', '2023-05-19 05:59:26', 'Added as a new Client'),
(646, 'William V Gusto', 'Admin', '2023-05-19 05:59:35', ' View Mark Allen Pandoy Pandoy Information'),
(647, 'William V Gusto', 'Admin', '2023-05-19 06:00:22', ' View dsfsdf asfdfd asfdfd Information'),
(648, 'William V Gusto', 'Admin', '2023-05-19 06:14:46', ' View Mark Allen Pandoy Pandoy Information'),
(649, 'William V Gusto', 'Admin', '2023-05-19 07:54:52', 'Logged in'),
(650, 'William V Gusto', 'Admin', '2023-05-19 07:55:11', ' View dsfsdf asfdfd asfdfd Information'),
(651, 'William V Gusto', 'Admin', '2023-05-19 08:00:55', ' View Mark Allen Pandoy Pandoy Information'),
(652, 'William V Gusto', 'Admin', '2023-05-19 08:01:06', ' View dsfsdf asfdfd asfdfd Information'),
(653, 'William V Gusto', 'Admin', '2023-05-19 08:03:35', ' View dsfsdf asfdfd asfdfd Information'),
(654, 'William V Gusto', 'Admin', '2023-05-19 08:03:43', ' View Luzviminda  Buaya Buaya Information'),
(655, 'William V Gusto', 'Admin', '2023-05-19 08:32:35', ' View Luzviminda  Buaya Buaya Information'),
(656, 'William V Gusto', 'Admin', '2023-05-19 08:32:47', ' View Luzviminda  Buaya Buaya Information'),
(657, 'William V Gusto', 'Admin', '2023-05-19 08:34:01', ' View Mark Allen Pandoy Pandoy Information'),
(658, 'Luzviminda  G. Buaya', 'Client', '2023-05-19 08:39:47', 'Logged in'),
(659, 'Leonardo Cancino Mejia', 'Plumber', '2023-05-19 08:41:51', 'Logged in'),
(660, 'William V Gusto', 'Admin', '2023-05-19 08:43:38', 'Logged in'),
(661, 'Luzviminda  G. Buaya', 'Client', '2023-05-19 09:07:27', 'Logged in'),
(662, 'Luzviminda  G. Buaya', 'Client', '2023-05-19 09:07:36', 'Send  Complaint'),
(663, 'William V Gusto', 'Admin', '2023-05-19 09:22:59', 'Logged in'),
(664, 'William V Gusto', 'Admin', '2023-05-19 12:53:52', 'Added as a new SOA'),
(665, 'William V Gusto', 'Admin', '2023-05-19 13:04:20', 'Added as a new SOA'),
(666, 'William V Gusto', 'Admin', '2023-05-19 13:46:38', ' View Luzviminda  Buaya Buaya Information'),
(667, 'William V Gusto', 'Admin', '2023-05-19 13:48:09', ' View dsfsdf asfdfd asfdfd Information'),
(668, 'William V Gusto', 'Admin', '2023-05-19 13:48:18', ' View Luzviminda  Buaya Buaya Information'),
(669, 'William V Gusto', 'Admin', '2023-05-19 13:48:34', ' View Luzviminda  Buaya Buaya Information'),
(670, 'William V Gusto', 'Admin', '2023-05-19 13:50:30', ' View Luzviminda  Buaya Buaya Information'),
(671, 'William V Gusto', 'Admin', '2023-05-19 13:52:12', ' View Mary Joy  De Guzman De Guzman Information'),
(672, 'William V Gusto', 'Admin', '2023-05-19 13:55:49', ' View dsfsdf asfdfd asfdfd Information'),
(673, 'Lando Cayago Mejia', 'Plumber', '2023-05-19 13:57:46', 'Logged in'),
(674, 'Lando Cayago Mejia', 'Plumber', '2023-05-19 13:58:15', 'Already Installed'),
(675, 'William V Gusto', 'Admin', '2023-05-19 13:58:59', ' View Mark Allen Pandoy Pandoy Information'),
(676, '', 'Admin', '2023-05-19 13:59:08', 'Send to a Plumber a Pending Client'),
(677, 'Lando Cayago Mejia', 'Plumber', '2023-05-19 13:59:42', 'Client For Inspection Already Visited!'),
(678, 'William V Gusto', 'Admin', '2023-05-19 14:02:07', 'Approved The Inspection'),
(679, 'William V Gusto', 'Admin', '2023-05-19 14:14:30', ' View Mark Allen Pandoy Pandoy Information'),
(680, 'William V Gusto', 'Admin', '2023-05-19 14:22:38', ' View Mark Allen Pandoy Pandoy Information'),
(681, 'William V Gusto', 'Admin', '2023-05-19 14:23:21', 'Added as a new Client'),
(682, 'William V Gusto', 'Admin', '2023-05-19 14:23:25', ' View asdddasa adsdsdsaasds adsdsdsaasds Informati'),
(683, '', 'Admin', '2023-05-19 14:24:21', 'Send to a Plumber a Pending Client'),
(684, 'Felix Lamon Soriano', 'Plumber', '2023-05-19 14:25:24', 'Logged in'),
(685, 'Felix Lamon Soriano', 'Plumber', '2023-05-19 14:25:39', 'Client For Inspection Already Visited!'),
(686, 'William V Gusto', 'Admin', '2023-05-19 14:30:47', 'Approved The Inspection'),
(687, 'William V Gusto', 'Admin', '2023-05-19 14:30:53', 'Approved The Inspection'),
(688, 'William V Gusto', 'Admin', '2023-05-19 14:31:03', 'Approved The Inspection'),
(689, 'Felix Lamon Soriano', 'Plumber', '2023-05-19 14:31:13', 'Already Installed'),
(690, 'William V Gusto', 'Admin', '2023-05-19 14:31:38', 'Added as a new Client'),
(691, 'William V Gusto', 'Admin', '2023-05-19 14:31:43', ' View dasds asasadsa asasadsa Information'),
(692, '', 'Admin', '2023-05-19 14:31:48', 'Send to a Plumber a Pending Client'),
(693, 'Felix Lamon Soriano', 'Plumber', '2023-05-19 14:31:55', 'Client For Inspection Already Visited!'),
(694, 'William V Gusto', 'Admin', '2023-05-19 20:19:39', 'Updated as a SOA'),
(695, 'William V Gusto', 'Admin', '2023-05-19 20:34:35', ' View Luzviminda  Buaya Buaya Information'),
(696, 'William V Gusto', 'Admin', '2023-05-19 20:38:34', ' View Luzviminda  Buaya Buaya Information'),
(697, 'William V Gusto', 'Admin', '2023-05-19 20:40:15', 'Updated as a SOA'),
(698, 'William V Gusto', 'Admin', '2023-05-19 20:44:27', 'Updated as a SOA'),
(699, 'William V Gusto', 'Admin', '2023-05-19 20:44:37', 'Updated as a SOA'),
(700, 'William V Gusto', 'Admin', '2023-05-19 20:44:58', 'Updated as a SOA'),
(701, 'William V Gusto', 'Admin', '2023-05-19 20:45:22', 'Updated as a SOA'),
(702, 'William V Gusto', 'Admin', '2023-05-19 20:45:52', 'Updated as a SOA'),
(703, 'William V Gusto', 'Admin', '2023-05-19 20:46:05', 'Updated as a SOA'),
(704, 'William V Gusto', 'Admin', '2023-05-19 20:54:28', 'Added as a new Client'),
(705, 'William V Gusto', 'Admin', '2023-05-19 20:55:26', ' View Mark Rod Cadayong Cadayong Information'),
(706, '', 'Admin', '2023-05-19 20:56:02', 'Send to a Plumber a Pending Client'),
(707, 'Felix Lamon Soriano', 'Plumber', '2023-05-19 20:58:24', 'Logged in'),
(708, 'Felix Lamon Soriano', 'Plumber', '2023-05-19 21:00:55', 'Client For Inspection Already Visited!'),
(709, 'William V Gusto', 'Admin', '2023-05-19 21:03:01', 'Approved The Inspection'),
(710, 'William V Gusto', 'Admin', '2023-05-19 21:03:11', 'Approved The Inspection'),
(711, 'William V Gusto', 'Admin', '2023-05-19 21:03:45', 'Approved The Inspection'),
(712, 'Felix Lamon Soriano', 'Plumber', '2023-05-19 21:04:02', 'Already Installed'),
(713, 'William V Gusto', 'Admin', '2023-05-19 21:04:18', 'Logged in'),
(714, 'William V Gusto', 'Admin', '2023-05-19 21:07:39', 'Added as a new Client'),
(715, 'William V Gusto', 'Admin', '2023-05-19 21:08:00', ' View dfssddfs asdfdf asdfdf Information'),
(716, '', 'Admin', '2023-05-19 21:08:05', 'Send to a Plumber a Pending Client'),
(717, 'Felix Lamon Soriano', 'Plumber', '2023-05-19 21:11:22', 'Client For Inspection Already Visited!'),
(718, 'William V Gusto', 'Admin', '2023-05-19 21:11:32', 'Approved The Inspection'),
(719, 'William V Gusto', 'Admin', '2023-05-19 21:12:20', 'Approved The Inspection'),
(720, 'Lando Cayago Mejia', 'Plumber', '2023-05-19 23:00:19', 'Logged in'),
(721, 'Leonardo Cancino Mejia', 'Plumber', '2023-05-19 23:00:31', 'Logged in'),
(722, 'Leonardo Cancino Mejia', 'Clerk', '2023-05-19 23:01:17', 'Logged in'),
(723, 'Mark Rod P Cadayong', 'Client', '2023-05-19 23:33:48', 'Logged in'),
(724, 'Mark Rod P Cadayong', 'Client', '2023-05-19 23:34:15', 'Send  Complaint'),
(725, 'William V Gusto', 'Admin', '2023-05-20 16:31:17', 'Logged in'),
(726, 'Felix Lamon Soriano', 'Plumber', '2023-05-20 16:38:45', 'Logged in'),
(727, 'Leonardo Cancino Mejia', 'Clerk', '2023-05-20 16:39:47', 'Logged in'),
(728, 'Mark Rod P Cadayong', 'Client', '2023-05-20 16:47:22', 'Logged in'),
(729, 'William V Gusto', 'Admin', '2023-05-20 20:20:44', 'Logged in'),
(730, 'Leonardo Cancino Mejia', 'Clerk', '2023-05-20 20:21:36', 'Logged in'),
(731, 'William V Gusto', 'Admin', '2023-05-20 21:15:23', 'Logged in'),
(732, '  ', 'Clerk', '2023-05-20 21:27:22', 'Cocern Sent to Clerk'),
(733, 'Mark Rod P Cadayong', 'Client', '2023-05-20 21:30:07', 'Send  Complaint'),
(734, '  ', 'Clerk', '2023-05-20 21:30:30', 'Cocern Sent to Clerk'),
(735, 'William V Gusto', 'Clerk', '2023-05-20 21:31:26', 'Cocern Sent to Clerk'),
(736, 'William V Gusto', 'Admin', '2023-05-21 17:07:02', 'Logged in'),
(737, 'William V Gusto', 'Admin', '2023-05-21 17:31:47', 'Logged in'),
(738, 'William V Gusto', 'Admin', '2023-05-21 17:32:02', 'Updated a Plumber'),
(739, 'William V Gusto', 'Admin', '2023-05-21 17:32:39', 'Updated a Plumber'),
(740, 'William V Gusto', 'Admin', '2023-05-21 17:32:43', 'Updated a Plumber'),
(741, 'William V Gusto', 'Admin', '2023-05-21 17:32:45', 'Updated a Plumber'),
(742, 'William V Gusto', 'Admin', '2023-05-21 17:32:54', 'Updated a Plumber'),
(743, 'William V Gusto', 'Admin', '2023-05-21 19:31:49', 'Import  as a new Client'),
(744, 'William V Gusto', 'Admin', '2023-05-21 19:31:50', 'Import  as a new Client'),
(745, 'William V Gusto', 'Admin', '2023-05-21 19:31:50', 'Import  as a new Client'),
(746, 'William V Gusto', 'Admin', '2023-05-21 19:32:01', 'Import  as a new Client'),
(747, 'William V Gusto', 'Admin', '2023-05-21 19:32:01', 'Import  as a new Client'),
(748, 'William V Gusto', 'Admin', '2023-05-21 19:32:01', 'Import  as a new Client'),
(749, 'William V Gusto', 'Admin', '2023-05-21 19:32:12', 'Import  as a new Client'),
(750, 'William V Gusto', 'Admin', '2023-05-21 19:32:12', 'Import  as a new Client'),
(751, 'William V Gusto', 'Admin', '2023-05-21 19:32:12', 'Import  as a new Client'),
(752, 'William V Gusto', 'Admin', '2023-05-21 19:33:37', 'Import  as a new Client'),
(753, 'William V Gusto', 'Admin', '2023-05-21 19:33:37', 'Import  as a new Client'),
(754, 'William V Gusto', 'Admin', '2023-05-21 19:33:37', 'Import  as a new Client'),
(755, 'William V Gusto', 'Admin', '2023-05-21 19:35:14', 'Import  as a new Client'),
(756, 'William V Gusto', 'Admin', '2023-05-21 19:35:14', 'Import  as a new Client'),
(757, 'William V Gusto', 'Admin', '2023-05-21 19:35:14', 'Import  as a new Client'),
(758, 'William V Gusto', 'Admin', '2023-05-21 19:41:41', 'Import  as a new Client'),
(759, 'William V Gusto', 'Admin', '2023-05-21 19:41:41', 'Import  as a new Client'),
(760, 'William V Gusto', 'Admin', '2023-05-21 19:43:11', ' View mary joy Deguzman Deguzman Information'),
(761, 'William V Gusto', 'Admin', '2023-05-21 19:45:59', 'Import  as a new Client'),
(762, 'William V Gusto', 'Admin', '2023-05-21 19:45:59', 'Import  as a new Client'),
(763, 'William V Gusto', 'Admin', '2023-05-21 19:45:59', 'Import  as a new Client'),
(764, 'William V Gusto', 'Admin', '2023-05-21 20:01:03', ' View mary joy Deguzman Deguzman Information'),
(765, 'William V Gusto', 'Admin', '2023-05-21 20:25:28', 'Import  as a new SOA'),
(766, 'William V Gusto', 'Admin', '2023-05-21 20:25:28', 'Import  as a new SOA'),
(767, 'William V Gusto', 'Admin', '2023-05-21 20:25:28', 'Import  as a new SOA'),
(768, 'William V Gusto', 'Admin', '2023-05-21 20:49:59', 'Import  as a new SOA'),
(769, 'William V Gusto', 'Admin', '2023-05-21 20:49:59', 'Import  as a new SOA'),
(770, 'William V Gusto', 'Admin', '2023-05-21 20:49:59', 'Import  as a new SOA'),
(771, 'William V Gusto', 'Admin', '2023-05-21 06:36:10', 'Logged in'),
(772, 'William V Gusto', 'Admin', '2023-05-21 06:50:23', 'Logged in'),
(773, 'William V Gusto', 'Admin', '2023-05-21 07:38:52', 'Logged in'),
(774, 'William V Gusto', 'Admin', '2023-05-21 18:22:54', 'Logged in'),
(775, 'William V Gusto', 'Admin', '2023-05-21 18:23:54', 'Added as a new Client'),
(776, 'William V Gusto', 'Admin', '2023-05-21 18:24:33', ' View Luzviminda  Buaya Buaya Information'),
(777, 'William V Gusto', 'Admin', '2023-05-21 23:05:54', 'Logged in'),
(778, 'William V Gusto', 'Admin', '2023-05-21 23:05:55', 'Logged in'),
(779, 'William V Gusto', 'Admin', '2023-05-23 18:39:06', 'Logged in'),
(780, 'William V Gusto', 'Admin', '2023-05-23 18:45:13', 'Logged in'),
(781, 'William V Gusto', 'Admin', '2023-05-23 18:45:32', ' View Luzviminda  Buaya Buaya Information'),
(782, 'William V Gusto', 'Admin', '2023-05-23 18:56:35', 'Logged in'),
(783, 'Felix Lamon Soriano', 'Plumber', '2023-05-23 18:57:04', 'Logged in'),
(784, 'William V Gusto', 'Admin', '2023-05-23 18:57:18', 'Logged in'),
(785, 'William V Gusto', 'Admin', '2023-05-23 18:57:29', ' View Luzviminda  Buaya Buaya Information'),
(786, '', 'Admin', '2023-05-23 18:57:33', 'Send to a Plumber a Pending Client'),
(787, 'Felix Lamon Soriano', 'Plumber', '2023-05-23 18:57:53', 'Logged in'),
(788, 'Felix Lamon Soriano', 'Plumber', '2023-05-23 18:58:20', 'Client For Inspection Already Visited!'),
(789, 'William V Gusto', 'Admin', '2023-05-23 18:59:58', 'Logged in'),
(790, 'William V Gusto', 'Admin', '2023-05-23 19:00:18', 'Approved The Inspection'),
(791, 'Felix Lamon Soriano', 'Plumber', '2023-05-23 19:00:43', 'Logged in'),
(792, 'Felix Lamon Soriano', 'Plumber', '2023-05-23 19:04:16', 'Logged in'),
(793, 'William V Gusto', 'Admin', '2023-05-23 19:15:21', 'Logged in'),
(794, 'William V Gusto', 'Admin', '2023-05-23 19:15:55', 'Approved The Inspection'),
(795, 'Felix Lamon Soriano', 'Plumber', '2023-05-23 19:17:28', 'Already Installed'),
(796, 'William V Gusto', 'Admin', '2023-05-24 05:31:41', 'Logged in'),
(797, 'William V Gusto', 'Admin', '2023-05-24 05:34:44', 'Logged in'),
(798, 'William V Gusto', 'Admin', '2023-05-24 05:34:49', ' View Mark Allen Pandoy Pandoy Information'),
(799, '', 'Admin', '2023-05-24 05:34:53', 'Send to a Plumber a Pending Client'),
(800, 'Felix Lamon Soriano', 'Plumber', '2023-05-24 05:35:49', 'Logged in'),
(801, 'Felix Lamon Soriano', 'Plumber', '2023-05-24 05:36:10', 'Client For Inspection Already Visited!'),
(802, 'William V Gusto', 'Admin', '2023-05-24 05:36:19', 'Logged in'),
(803, 'William V Gusto', 'Admin', '2023-05-24 05:36:34', 'Approved The Inspection'),
(804, 'William V Gusto', 'Admin', '2023-05-24 05:36:47', 'Approved The Inspection'),
(805, 'Felix Lamon Soriano', 'Plumber', '2023-05-24 05:37:17', 'Already Installed'),
(806, 'Mark Allen  Pandoy', 'Client', '2023-05-24 05:38:32', 'Logged in'),
(807, 'William V Gusto', 'Admin', '2023-05-24 05:38:54', 'Logged in'),
(808, 'William V Gusto', 'Admin', '2023-05-24 05:39:42', 'Added as a new Date Billed'),
(809, 'William V Gusto', 'Admin', '2023-05-24 05:42:05', 'Logged in'),
(810, 'William V Gusto', 'Admin', '2023-05-24 05:42:33', 'Added as a new Client'),
(811, 'Mark P dasd', 'Client', '2023-05-24 05:43:26', 'Logged in'),
(812, 'William V Gusto', 'Admin', '2023-05-24 05:46:59', 'Updated a Client'),
(813, 'Luzviminda   Buaya', 'Client', '2023-05-24 05:47:17', 'Logged in'),
(814, 'William V Gusto', 'Admin', '2023-05-24 05:47:24', 'Updated a Client'),
(815, 'William V Gusto', 'Admin', '2023-05-24 06:39:33', 'Logged in'),
(816, 'William V Gusto', 'Admin', '2023-05-24 06:40:43', 'Added as a new Client'),
(817, 'William V Gusto', 'Admin', '2023-05-24 06:40:55', ' View Mary Joy De Guzman De Guzman Information'),
(818, '', 'Admin', '2023-05-24 06:40:58', 'Send to a Plumber a Pending Client'),
(819, 'Felix Lamon Soriano', 'Plumber', '2023-05-24 06:42:02', 'Logged in'),
(820, 'Felix Lamon Soriano', 'Plumber', '2023-05-24 06:42:24', 'Client For Inspection Already Visited!'),
(821, 'William V Gusto', 'Admin', '2023-05-24 06:42:36', 'Logged in'),
(822, 'William V Gusto', 'Admin', '2023-05-24 06:43:10', 'Approved The Inspection'),
(823, 'William V Gusto', 'Admin', '2023-05-24 06:56:54', 'Logged in'),
(824, 'William V Gusto', 'Admin', '2023-05-24 07:12:07', 'Logged in'),
(825, 'William V Gusto', 'Admin', '2023-05-25 02:55:48', 'Logged in'),
(826, 'William V Gusto', 'Admin', '2023-05-25 02:58:27', 'Added as a new Advisory'),
(827, 'Leonardo Cancino Mejia', 'Clerk', '2023-05-25 03:11:40', 'Logged in'),
(828, 'William V Gusto', 'Admin', '2023-05-25 03:27:34', 'Logged in'),
(829, 'William V Gusto', 'Admin', '2023-05-25 03:27:45', ' View Luzviminda  Buaya Buaya Information'),
(830, 'William V Gusto', 'Admin', '2023-05-25 03:31:33', 'Logged in'),
(831, 'William V Gusto', 'Admin', '2023-05-25 03:39:01', ' View Rosielyn Datuin Datuin Information'),
(832, 'William V Gusto', 'Admin', '2023-05-25 03:40:05', ' View Luzviminda  Buaya Buaya Information'),
(833, 'William V Gusto', 'Admin', '2023-05-25 03:42:03', ' View Luzviminda  Buaya Buaya Information'),
(834, 'William V Gusto', 'Admin', '2023-05-25 03:49:30', ' View Luzviminda  Buaya Buaya Information'),
(835, 'William V Gusto', 'Admin', '2023-05-25 03:49:42', ' View Mark Allen Pandoy Pandoy Information'),
(836, 'William V Gusto', 'Admin', '2023-05-25 03:50:42', ' View Mark Allen Pandoy Pandoy Information'),
(837, 'William V Gusto', 'Admin', '2023-05-25 03:50:49', ' View Luzviminda  Buaya Buaya Information'),
(838, 'William V Gusto', 'Admin', '2023-05-25 04:21:05', 'Added as a new Complaint Category'),
(839, 'William V Gusto', 'Admin', '2023-05-25 04:21:32', 'Added as a new Complaint Category'),
(840, 'William V Gusto', 'Admin', '2023-05-25 04:39:42', 'Logged in'),
(841, 'William V Gusto', 'Admin', '2023-05-25 04:51:14', 'Logged in'),
(842, 'William V Gusto', 'Admin', '2023-05-25 04:55:20', 'Logged in'),
(843, 'William V Gusto', 'Admin', '2023-05-25 04:55:32', 'Delete a Client'),
(844, 'William V Gusto', 'Admin', '2023-05-25 04:56:52', 'Logged in'),
(845, 'William V Gusto', 'Admin', '2023-05-25 04:57:02', ' View Luzviminda  Buaya Buaya Information'),
(846, '', 'Admin', '2023-05-25 04:57:07', 'Send to a Plumber a Pending Client'),
(847, 'William V Gusto', 'Admin', '2023-05-25 04:59:23', ' View Luzviminda  Buaya Buaya Information'),
(848, 'William V Gusto', 'Admin', '2023-05-25 05:01:23', ' View Luzviminda  Buaya Buaya Information'),
(849, 'William V Gusto', 'Admin', '2023-05-25 05:02:22', 'Logged in'),
(850, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 05:02:53', 'Logged in'),
(851, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 05:03:05', 'Client For Inspection Already Visited!'),
(852, 'William V Gusto', 'Admin', '2023-05-25 05:03:12', 'Logged in'),
(853, 'William V Gusto', 'Admin', '2023-05-25 05:03:27', 'Approved The Inspection'),
(854, 'William V Gusto', 'Admin', '2023-05-25 05:05:39', 'Approved The Inspection'),
(855, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 05:06:04', 'Logged in'),
(856, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 05:06:10', 'Already Installed'),
(857, 'William V Gusto', 'Admin', '2023-05-25 05:18:25', 'Logged in'),
(858, 'William V Gusto', 'Admin', '2023-05-25 05:18:43', 'Updated a Client'),
(859, 'Mark Allen  Pandoy', 'Client', '2023-05-25 05:19:54', 'Logged in'),
(860, 'William V Gusto', 'Admin', '2023-05-25 05:27:58', 'Logged in'),
(861, 'William V Gusto', 'Admin', '2023-05-25 05:28:09', 'Logged in'),
(862, 'William V Gusto', 'Admin', '2023-05-25 05:35:12', 'Logged in'),
(863, 'William V Gusto', 'Admin', '2023-05-25 05:35:23', ' View Mark Rod Cadayong Cadayong Information'),
(864, '', 'Admin', '2023-05-25 05:35:31', 'Send to a Plumber a Pending Client'),
(865, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 05:37:18', 'Logged in'),
(866, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 05:37:43', 'Client For Inspection Already Visited!'),
(867, 'William V Gusto', 'Admin', '2023-05-25 05:38:50', 'Approved The Inspection'),
(868, 'William V Gusto', 'Admin', '2023-05-25 05:40:50', 'Approved The Inspection'),
(869, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 05:41:05', 'Already Installed'),
(870, 'Mark Rod P Cadayong', 'Client', '2023-05-25 05:42:09', 'Logged in'),
(871, 'William V Gusto', 'Admin', '2023-05-25 05:45:59', 'Added as a new Client'),
(872, 'William V Gusto', 'Admin', '2023-05-25 05:46:03', ' View mark Cadayong Cadayong Information'),
(873, '', 'Admin', '2023-05-25 05:46:10', 'Send to a Plumber a Pending Client'),
(874, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 05:48:08', 'Client For Inspection Already Visited!'),
(875, 'William V Gusto', 'Admin', '2023-05-25 05:48:17', 'Approved The Inspection'),
(876, 'William V Gusto', 'Admin', '2023-05-25 05:48:28', 'Approved The Inspection'),
(877, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 05:49:05', 'Already Installed'),
(878, 'mark  Cadayong', 'Client', '2023-05-25 05:49:28', 'Logged in'),
(879, 'William V Gusto', 'Admin', '2023-05-25 05:52:56', ' View Mark Rod Cadayong Cadayong Information'),
(880, 'William V Gusto', 'Admin', '2023-05-25 06:02:20', 'Updated a Advisory'),
(881, 'William V Gusto', 'Admin', '2023-05-25 06:02:40', 'Updated a Advisory'),
(882, 'William V Gusto', 'Admin', '2023-05-25 06:02:58', 'Updated a Advisory'),
(883, 'William V Gusto', 'Admin', '2023-05-25 07:22:07', 'Logged in'),
(884, 'William V Gusto', 'Admin', '2023-05-25 14:53:56', 'Logged in'),
(885, 'William V Gusto', 'Admin', '2023-05-25 14:54:06', ' View Luzviminda  Buaya Buaya Information'),
(886, '', 'Admin', '2023-05-25 14:55:20', 'Send to a Plumber a Pending Client'),
(887, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 14:55:40', 'Logged in'),
(888, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 14:57:01', 'Client For Inspection Already Visited!'),
(889, 'William V Gusto', 'Admin', '2023-05-25 14:58:24', 'Approved The Inspection'),
(890, 'William V Gusto', 'Admin', '2023-05-25 15:00:27', 'Approved The Inspection'),
(891, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 15:02:02', 'Already Installed'),
(892, 'William V Gusto', 'Admin', '2023-05-25 15:02:38', ' View Luzviminda  Buaya Buaya Information'),
(893, 'Luzviminda   Buaya', 'Client', '2023-05-25 15:03:21', 'Logged in'),
(894, 'Luzviminda   Buaya', 'Client', '2023-05-25 15:05:20', 'Send  Complaint'),
(895, 'William V Gusto', 'Clerk', '2023-05-25 15:06:07', 'Cocern Sent to Clerk'),
(896, 'Leonardo Cancino Mejia', 'Clerk', '2023-05-25 15:06:29', 'Logged in'),
(897, 'Leonardo Cancino Mejia', 'Clerk', '2023-05-25 15:09:02', 'Logged in'),
(898, 'Luzviminda   Buaya', 'Client', '2023-05-25 15:11:42', 'Logged in'),
(899, 'Leonardo Cancino Mejia', 'Clerk', '2023-05-25 15:18:23', 'Logged in'),
(900, 'William V Gusto', 'Admin', '2023-05-25 15:20:37', 'Logged in'),
(901, 'William V Gusto', 'Admin', '2023-05-25 17:04:39', 'Logged in'),
(902, 'William V Gusto', 'Admin', '2023-05-25 17:28:01', 'Logged in'),
(903, 'William V Gusto', 'Admin', '2023-05-25 17:34:58', ' View Mary Joy   De Guzman Information'),
(904, 'William V Gusto', 'Admin', '2023-05-25 17:35:40', ' View Luzviminda  Buaya Buaya Information'),
(905, 'William V Gusto', 'Admin', '2023-05-25 17:36:22', ' View Luzviminda   Buaya Information'),
(906, 'William V Gusto', 'Admin', '2023-05-25 19:43:02', 'Logged in'),
(907, 'William V Gusto', 'Admin', '2023-05-25 19:46:14', 'Logged in'),
(908, 'William V Gusto', 'Admin', '2023-05-25 19:46:38', ' View Rosielyn  Datuin Information'),
(909, '', 'Admin', '2023-05-25 19:46:53', 'Send to a Plumber a Pending Client'),
(910, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 19:47:21', 'Logged in'),
(911, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 19:49:35', 'Client For Inspection Already Visited!'),
(912, 'William V Gusto', 'Admin', '2023-05-25 19:49:54', 'Approved The Inspection'),
(913, 'William V Gusto', 'Admin', '2023-05-25 19:50:10', 'Approved The Inspection'),
(914, 'Felix Lamon Soriano', 'Plumber', '2023-05-25 19:50:26', 'Already Installed'),
(915, 'Rosielyn  Datuin', 'Client', '2023-05-25 19:51:03', 'Logged in'),
(916, 'Rosielyn  Datuin', 'Client', '2023-05-25 20:03:56', 'Send  Complaint'),
(917, 'William V Gusto', 'Admin', '2023-05-25 20:12:47', 'Added as a new Date Billed'),
(918, 'William V Gusto', 'Admin', '2023-05-25 20:24:26', 'Import  as a new SOA'),
(919, 'William V Gusto', 'Admin', '2023-05-25 20:24:26', 'Import  as a new SOA'),
(920, 'Rosielyn  Datuin', 'Client', '2023-05-25 20:29:48', 'Send  Complaint'),
(921, 'Rosielyn  Datuin', 'Client', '2023-05-25 20:29:57', 'Send  Complaint'),
(922, 'Rosielyn  Datuin', 'Client', '2023-05-25 20:31:09', 'Send  Complaint'),
(923, 'William V Gusto', 'Admin', '2023-05-25 20:32:11', 'Added as a new SOA'),
(924, 'William V Gusto', 'Admin', '2023-05-25 23:35:42', 'Logged in'),
(925, 'William V Gusto', 'Admin', '2023-05-25 23:49:33', 'Logged in'),
(926, 'Rosielyn  Datuin', 'Client', '2023-05-25 23:50:16', 'Logged in'),
(927, 'William V Gusto', 'Admin', '2023-05-25 23:56:32', 'Logged in'),
(928, 'William V Gusto', 'Admin', '2023-05-25 23:58:54', 'Added as a new SOA'),
(929, 'William V Gusto', 'Admin', '2023-05-25 23:59:01', 'Delete a Billing'),
(930, 'William V Gusto', 'Admin', '2023-05-26 00:11:05', 'Logged in'),
(931, 'William V Gusto', 'Admin', '2023-05-26 00:11:15', ' View Mary Joy   De Guzman Information'),
(932, 'William V Gusto', 'Admin', '2023-05-26 00:11:23', ' View Mary Joy   De Guzman Information'),
(933, 'William V Gusto', 'Admin', '2023-05-26 00:11:27', ' View Clarence Joy  Nanlabi Information'),
(934, '', 'Admin', '2023-05-26 00:11:46', 'Send to a Plumber a Pending Client'),
(935, 'Felix Lamon Soriano', 'Plumber', '2023-05-26 00:12:19', 'Logged in'),
(936, 'Felix Lamon Soriano', 'Plumber', '2023-05-26 00:12:29', 'Client For Inspection Already Visited!'),
(937, 'William V Gusto', 'Admin', '2023-05-26 00:12:42', 'Approved The Inspection'),
(938, 'William V Gusto', 'Admin', '2023-05-26 00:13:04', 'Approved The Inspection'),
(939, 'Felix Lamon Soriano', 'Plumber', '2023-05-26 00:13:19', 'Already Installed'),
(940, 'William V Gusto', 'Admin', '2023-05-26 00:14:02', 'Updated a Client'),
(941, 'William V Gusto', 'Admin', '2023-05-26 00:14:47', 'Updated a Client'),
(942, 'William V Gusto', 'Admin', '2023-05-26 00:26:27', 'Logged in'),
(943, 'William V Gusto', 'Admin', '2023-05-26 00:34:54', 'Logged in'),
(944, 'William V Gusto', 'Admin', '2023-05-26 00:53:03', 'Logged in'),
(945, 'William V Gusto', 'Admin', '2023-05-26 00:55:08', 'Added as a new Advisory'),
(946, 'William V Gusto', 'Admin', '2023-05-26 00:59:29', 'Logged in'),
(947, 'William V Gusto', 'Admin', '2023-05-26 01:03:27', 'Logged in'),
(948, 'William V Gusto', 'Admin', '2023-05-26 01:03:36', ' View Gelil David  Galang Information'),
(949, '', 'Admin', '2023-05-26 01:03:39', 'Send to a Plumber a Pending Client'),
(950, 'Felix Lamon Soriano', 'Plumber', '2023-05-26 01:04:18', 'Logged in'),
(951, 'Felix Lamon Soriano', 'Plumber', '2023-05-26 01:04:32', 'Client For Inspection Already Visited!'),
(952, 'William V Gusto', 'Admin', '2023-05-26 01:04:47', 'Approved The Inspection'),
(953, 'William V Gusto', 'Admin', '2023-05-26 01:05:05', 'Approved The Inspection'),
(954, 'Felix Lamon Soriano', 'Plumber', '2023-05-26 01:05:20', 'Already Installed'),
(955, 'Gelil David  Galang', 'Client', '2023-05-26 01:05:45', 'Logged in'),
(956, 'Leonardo Cancino Mejia', 'Clerk', '2023-05-26 01:09:32', 'Logged in'),
(957, 'William V Gusto', 'Admin', '2023-05-26 01:14:33', 'Logged in'),
(958, 'William V Gusto', 'Admin', '2023-06-03 05:33:27', 'Logged in'),
(959, 'William V Gusto', 'Admin', '2023-06-03 06:06:02', 'Logged in'),
(960, 'William V Gusto', 'Admin', '2023-06-03 06:06:57', 'Updated a About Us'),
(961, 'William V Gusto', 'Admin', '2023-06-03 06:10:16', 'Logged in'),
(962, 'William V Gusto', 'Admin', '2023-06-03 06:11:58', ' View Mary Joy   De Guzman Information'),
(963, 'William V Gusto', 'Admin', '2023-06-03 06:12:11', ' View ,..hjgh jjj&#039; &lt;h1&gt;Hello&lt;/h1&gt;'),
(964, 'Luzviminda   Buaya', 'Client', '2023-06-03 06:27:13', 'Logged in'),
(965, 'Leonardo Cancino Mejia', 'Clerk', '2023-06-03 23:27:05', 'Logged in'),
(966, 'Felix Lamon Soriano', 'Plumber', '2023-06-03 23:28:15', 'Logged in'),
(967, 'William V Gusto', 'Admin', '2023-06-03 23:29:26', 'Logged in'),
(968, 'William V Gusto', 'Admin', '2023-06-03 23:29:32', ' View ,..hjgh jjj&#039; &lt;h1&gt;Hello&lt;/h1&gt;'),
(969, '', 'Admin', '2023-06-03 23:29:36', 'Send to a Plumber a Pending Client'),
(970, 'William V Gusto', 'Admin', '2023-06-03 23:29:56', 'Logged in'),
(971, 'Felix Lamon Soriano', 'Plumber', '2023-06-03 23:30:13', 'Logged in'),
(972, 'William V Gusto', 'Admin', '2023-06-03 23:31:54', 'Logged in'),
(973, 'William V Gusto', 'Admin', '2023-06-03 23:32:43', ' View Mary Joy   De Guzman Information'),
(974, 'William V Gusto', 'Admin', '2023-06-03 23:33:45', ' View Rosielyn  Datuin Information'),
(975, 'William V Gusto', 'Admin', '2023-06-05 22:50:21', 'Logged in'),
(976, 'William V Gusto', 'Admin', '2023-06-05 22:55:05', ' View Mary Joy   De Guzman Information'),
(977, 'William V Gusto', 'Admin', '2023-06-05 23:01:34', 'Added as a new Advisory'),
(978, 'William V Gusto', 'Admin', '2023-06-05 23:01:52', ' View ,..hjgh jjj&#039; &lt;h1&gt;Hello&lt;/h1&gt;'),
(979, 'William V Gusto', 'Admin', '2023-06-05 23:03:13', 'Added as a new Client'),
(980, 'William V Gusto', 'Admin', '2023-06-05 23:03:19', ' View Mary Joy   De Guzman Information'),
(981, '', 'Admin', '2023-06-05 23:04:28', 'Send to a Plumber a Pending Client'),
(982, 'William V Gusto', 'Admin', '2023-06-05 23:28:50', 'Logged in'),
(983, 'William V Gusto', 'Admin', '2023-06-06 17:08:18', 'Logged in'),
(984, 'William V Gusto', 'Admin', '2023-06-06 20:54:18', 'Logged in');
INSERT INTO `activity` (`activity_ID`, `name`, `position`, `time_loged`, `status`) VALUES
(985, 'William V Gusto', 'Admin', '2023-06-07 01:05:53', 'Logged in'),
(986, 'William V Gusto', 'Admin', '2023-06-07 06:29:18', 'Logged in'),
(987, 'William V Gusto', 'Admin', '2023-06-07 06:54:00', 'Logged in'),
(988, 'Luzviminda   Buaya', 'Client', '2023-06-07 06:54:24', 'Logged in'),
(989, 'William V Gusto', 'Admin', '2023-06-07 07:04:44', 'Logged in'),
(990, 'William V Gusto', 'Admin', '2023-06-07 07:05:31', 'Added as a new Date Billed'),
(991, 'William V Gusto', 'Admin', '2023-06-07 07:06:10', 'Added as a new SOA'),
(992, 'Luzviminda   Buaya', 'Client', '2023-06-07 07:06:58', 'Logged in'),
(993, 'Leonardo Cancino Mejia', 'Clerk', '2023-06-07 07:15:48', 'Logged in'),
(994, 'Luzviminda   Buaya', 'Client', '2023-06-07 07:21:10', 'Logged in'),
(995, 'William V Gusto', 'Admin', '2023-06-07 15:02:21', 'Logged in'),
(996, 'William V Gusto', 'Admin', '2023-06-07 15:20:45', ' View Luzviminda   Buaya Information'),
(997, 'William V Gusto', 'Admin', '2023-06-07 15:23:17', ' View Luzviminda   Buaya Information'),
(998, 'William V Gusto', 'Admin', '2023-06-07 17:32:50', 'Logged in'),
(999, 'William V Gusto', 'Admin', '2023-06-07 18:32:23', 'Logged in'),
(1000, 'William V Gusto', 'Admin', '2023-06-07 20:19:37', 'Logged in'),
(1001, 'William V Gusto', 'Admin', '2023-06-07 21:58:05', 'Logged in'),
(1002, 'Felix Lamon Soriano', 'Plumber', '2023-06-07 22:02:13', 'Logged in'),
(1003, 'William V Gusto', 'Admin', '2023-06-07 22:04:07', 'Logged in'),
(1004, 'Felix Lamon Soriano', 'Plumber', '2023-06-07 22:12:05', 'Client For Inspection Already Visited!'),
(1005, 'William V Gusto', 'Admin', '2023-06-07 22:14:32', 'Approved The Inspection'),
(1006, 'William V Gusto', 'Admin', '2023-06-07 22:16:15', 'Approved The Inspection'),
(1007, 'Luzviminda   Buaya', 'Client', '2023-06-07 22:17:57', 'Logged in'),
(1008, 'Luzviminda   Buaya', 'Client', '2023-06-07 22:18:31', 'Send  Complaint'),
(1009, 'William V Gusto', 'Clerk', '2023-06-07 22:18:55', 'Cocern Sent to Clerk'),
(1010, 'Leonardo Cancino Mejia', 'Clerk', '2023-06-07 22:19:25', 'Logged in'),
(1011, 'William V Gusto', 'Admin', '2023-06-07 22:25:19', ' View Melanie   Buaya Information'),
(1012, 'Luzviminda   Buaya', 'Client', '2023-06-07 23:08:06', 'Logged in'),
(1013, 'William V Gusto', 'Admin', '2023-06-07 23:10:07', 'Logged in'),
(1014, 'William V Gusto', 'Admin', '2023-06-17 21:45:58', 'Logged in'),
(1015, 'William V Gusto', 'Admin', '2023-08-22 02:03:06', 'Logged in'),
(1016, 'William V Gusto', 'Admin', '2023-08-22 02:04:13', ' View gfgdfg dfgdgdfgd dffgdg Information'),
(1017, 'William V Gusto', 'Admin', '2023-08-22 02:14:22', 'Logged in'),
(1018, 'William V Gusto', 'Admin', '2023-08-23 05:40:40', 'Logged in'),
(1019, 'William V Gusto', 'Admin', '2023-08-23 05:41:35', ' View ,..hjgh jjj&#039; &lt;h1&gt;Hello&lt;/h1&gt;'),
(1020, 'William V Gusto', 'Admin', '2023-09-01 23:53:56', 'Logged in'),
(1021, 'William V Gusto', 'Admin', '2023-09-11 05:34:51', 'Logged in'),
(1022, 'William V Gusto', 'Admin', '2023-09-11 05:35:00', ' View Luzviminda   Buaya Information'),
(1023, 'William V Gusto', 'Admin', '2023-09-11 05:36:20', ' View gfgdfg dfgdgdfgd dffgdg Information'),
(1024, 'William V Gusto', 'Clerk', '2023-09-11 05:36:49', 'Cocern Sent to Clerk'),
(1025, 'William V Gusto', 'Admin', '2023-09-11 18:33:37', 'Logged in'),
(1026, 'William V Gusto', 'Admin', '2023-09-11 19:28:04', 'Logged in');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `chat_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `UserName`, `Password`, `position`, `Lastname`, `Firstname`, `Middlename`, `Email`, `Address`, `chat_status`) VALUES
(99122, 'admin', '$2y$10$sqLxiQuOYLDyZHbag6m1JeYakCEFP1Mg.hjwDH0s1PgnA3/xFQayi', 'Admin', 'Gusto', 'William', 'V', 'Luzvimindabuaya@gmail.com', 'Urbiztondo', 'Offline now');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_ID` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `billed_ID` int(11) NOT NULL,
  `present` int(50) NOT NULL,
  `previous` int(50) NOT NULL,
  `cubic_meter` int(50) NOT NULL,
  `penalties` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_category`
--

CREATE TABLE `complaint_category` (
  `category_ID` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_category`
--

INSERT INTO `complaint_category` (`category_ID`, `category`) VALUES
(5, 'No Water'),
(6, 'Wrong Water Bill');

-- --------------------------------------------------------

--
-- Table structure for table `date_billed`
--

CREATE TABLE `date_billed` (
  `billed_ID` int(11) NOT NULL,
  `date_billled` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inspection_schedule_for_complaints`
--

CREATE TABLE `inspection_schedule_for_complaints` (
  `isc_ID` int(11) NOT NULL,
  `complaint_ID` int(11) NOT NULL,
  `plumber_ID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `comment` varchar(50) NOT NULL,
  `visited` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inspection_schedule_for_registration_approval`
--

CREATE TABLE `inspection_schedule_for_registration_approval` (
  `schedule_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(100) NOT NULL,
  `tools` varchar(50) NOT NULL,
  `plumber_ID` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `inspected` int(11) NOT NULL,
  `inspect_status` int(11) NOT NULL,
  `inspect_visted` int(11) NOT NULL,
  `sentToPlumber` int(11) NOT NULL,
  `date_install` datetime NOT NULL,
  `sched_visited` date NOT NULL,
  `inspection_installation` int(11) NOT NULL,
  `avail_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `message_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `system_ID` int(11) NOT NULL,
  `about` longtext NOT NULL,
  `contact` varchar(50) NOT NULL,
  `telophone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `line` varchar(100) NOT NULL,
  `picture1` varchar(100) NOT NULL,
  `picture2` varchar(100) NOT NULL,
  `picture3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`system_ID`, `about`, `contact`, `telophone`, `email`, `location`, `line`, `picture1`, `picture2`, `picture3`) VALUES
(1, '<p>Urbiztondo Water Services was formed in February 2019 and is located in the Municipality of Urbiztondo in the Province of Pangasinan.</p>', ' 09454064800', '(075) 632 3153', ' www.urbiztondopang.gov.ph', ' Urbiztondo, Pangasinan. Phil.', 'Pasimbalo Urbiztondo ï¿½Makabago, Malaya at Organisadong Bayan', 'p1.jpeg', 'p2.jpeg', 'p3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbladdress`
--

CREATE TABLE `tbladdress` (
  `address_ID` int(11) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `Municipality` varchar(50) NOT NULL,
  `Province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladdress`
--

INSERT INTO `tbladdress` (`address_ID`, `Barangay`, `Municipality`, `Province`) VALUES
(1, 'Angatel', 'Urbiztondo', 'Pangasinan'),
(2, 'Balangay', 'Urbiztondo', 'Pangasinan'),
(3, 'Batangcaoa', 'Urbiztondo', 'Pangasinan'),
(4, 'Baug', 'Urbiztondo', 'Pangasinan'),
(5, 'Bayaoas', 'Urbiztondo', 'Pangasinan'),
(6, 'Bituag', 'Urbiztondo', 'Pangasinan'),
(7, 'Camambugan', 'Urbiztondo', 'Pangasinan'),
(8, 'Dalanguiring', 'Urbiztondo', 'Pangasinan'),
(9, 'Duplac', 'Urbiztondo', 'Pangasinan'),
(10, 'Galarin', 'Urbiztondo', 'Pangasinan'),
(11, 'Gueteb', 'Urbiztondo', 'Pangasinan'),
(12, 'Malaca', 'Urbiztondo', 'Pangasinan'),
(13, 'Malayo', 'Urbiztondo', 'Pangasinan'),
(14, 'Malibong', 'Urbiztondo', 'Pangasinan'),
(15, 'Pasibi East', 'Urbiztondo', 'Pangasinan'),
(16, 'Pasibi West', 'Urbiztondo', 'Pangasinan'),
(17, 'Pisuac', 'Urbiztondo', 'Pangasinan'),
(18, 'Poblacion', 'Urbiztondo', 'Pangasinan'),
(19, 'Real', 'Urbiztondo', 'Pangasinan'),
(20, 'Salavante', 'Urbiztondo', 'Pangasinan'),
(21, 'Sawat', 'Urbiztondo', 'Pangasinan');

-- --------------------------------------------------------

--
-- Table structure for table `tbladvisory`
--

CREATE TABLE `tbladvisory` (
  `advisory_ID` int(11) NOT NULL,
  `Wht` varchar(100) NOT NULL,
  `Whn` date NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `affected_area` longtext NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `address_ID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `advisory_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladvisory`
--

INSERT INTO `tbladvisory` (`advisory_ID`, `Wht`, `Whn`, `date`, `time_start`, `time_end`, `affected_area`, `Reason`, `address_ID`, `Status`, `advisory_photo`) VALUES
(23, 'No Water All Barangay in Urbiztondo', '0000-00-00', '2023-05-26', '08:00:00', '17:00:00', 'Angatel Urbiztondo Pangasinan,Balangay Urbiztondo Pangasinan', 'Power Interruption', 0, 1, 'central-pangasinan-electric-cooperative-1685008707.jpg	'),
(24, 'Maintenance', '0000-00-00', '2023-05-26', '16:00:00', '21:54:00', 'Angatel Urbiztondo Pangasinan,Balangay Urbiztondo Pangasinan', 'Broken Pipe', 0, 1, 'g-1685087708.jpg	'),
(25, 'DIRTY WATER', '0000-00-00', '2023-06-06', '14:00:00', '19:00:00', 'Angatel Urbiztondo Pangasinan,Balangay Urbiztondo Pangasinan', 'MAINTENANCE', 0, 1, '340716656_598844615613643_799417118652013863_n-1686031294.jpg	');

-- --------------------------------------------------------

--
-- Table structure for table `tblclients`
--

CREATE TABLE `tblclients` (
  `client_ID` int(11) NOT NULL,
  `meter_no` varchar(50) DEFAULT NULL,
  `client_fname` varchar(100) NOT NULL,
  `client_mname` varchar(50) NOT NULL,
  `client_lname` varchar(50) NOT NULL,
  `address_ID` int(11) NOT NULL,
  `House_No` decimal(10,0) NOT NULL,
  `ClientEmail` varchar(100) NOT NULL,
  `Contact` decimal(20,0) NOT NULL,
  `classification` varchar(50) NOT NULL,
  `property` varchar(50) NOT NULL,
  `application` varchar(50) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `RegDate` date NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `sketch_location` varchar(100) NOT NULL,
  `Status` int(1) NOT NULL,
  `Viewed` int(11) NOT NULL,
  `meter_no_null` int(11) NOT NULL,
  `chat_status` varchar(60) NOT NULL,
  `scheduled` int(11) NOT NULL,
  `admin_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaint_ID` int(11) NOT NULL,
  `client_ID` int(11) DEFAULT NULL,
  `Date` datetime NOT NULL,
  `they_complaint` varchar(50) NOT NULL,
  `complaint` varchar(500) NOT NULL,
  `Complaint_Status` int(11) NOT NULL,
  `sentToPlumber` int(11) NOT NULL,
  `plumber_ID` int(11) NOT NULL,
  `scheduled` int(11) NOT NULL,
  `avail_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblplumber`
--

CREATE TABLE `tblplumber` (
  `plumber_ID` int(50) NOT NULL,
  `plumber_no` int(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `house_no` decimal(10,0) NOT NULL,
  `address_ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactNo` decimal(10,0) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `position` varchar(50) NOT NULL,
  `RegDate` date NOT NULL,
  `UserStatus` int(11) NOT NULL,
  `images` varchar(150) NOT NULL,
  `chat_status` varchar(50) NOT NULL,
  `admin_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblplumber`
--

INSERT INTO `tblplumber` (`plumber_ID`, `plumber_no`, `Fname`, `Mname`, `Lname`, `house_no`, `address_ID`, `Email`, `ContactNo`, `Username`, `Password`, `position`, `RegDate`, `UserStatus`, `images`, `chat_status`, `admin_ID`) VALUES
(3, 12345234, 'Leonardo', 'Cancino', 'Mejia', '123', 20, 'Leonardo5649@gmail.com', '767656', 'Leonardo', '$2y$10$LdKqe5ZIA3x1yAmWk/QuLOnH7mi5TCJdCjW2fF8h4Y9oWuoAAXsrS', 'clerk', '2022-09-02', 1, 'computer-1672931524.jpg', 'Offline now', 2),
(4, 1234523, 'Felix', 'Lamon', 'Soriano', '254', 7, 'felix5649@gmail.com', '9396548563', 'Felix', '$2y$10$H/GpHNbVGxgY0OPQMf7QxOOd.az0SmsW4WWiWoqIMeo0qfx2xj8o.', 'plumber', '2022-09-04', 1, 'computer-1672931524.jpg', 'Offline now', 2),
(5, 1238786, 'Lando', 'Cayago', 'Mejia', '56', 19, 'LandoMej@gmail.com', '9307591331', 'Lando', '$2y$10$V14iw9v5IpaPowCcMjeh4etErYdLAds5dvwzCXKhky19z1N8.hKb2', 'plumber', '2022-09-04', 1, 'computer-1672931524.jpg', 'Offline now', 2),
(6, 32454635, 'Marvin', 'Juanata', 'Flores', '87', 20, 'Mavfloresj@gmail.com', '9301458753', 'Marvin', '$2y$10$ifYqpHT71GW8F3CyKxa5menCRT6mbbq7AKd1JTun8mwHzZKcrI46S', 'plumber', '2022-09-04', 1, 'computer-1672931524.jpg', 'Offline Now', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_ID`);

--
-- Indexes for table `complaint_category`
--
ALTER TABLE `complaint_category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `date_billed`
--
ALTER TABLE `date_billed`
  ADD PRIMARY KEY (`billed_ID`);

--
-- Indexes for table `inspection_schedule_for_complaints`
--
ALTER TABLE `inspection_schedule_for_complaints`
  ADD PRIMARY KEY (`isc_ID`);

--
-- Indexes for table `inspection_schedule_for_registration_approval`
--
ALTER TABLE `inspection_schedule_for_registration_approval`
  ADD PRIMARY KEY (`schedule_ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`system_ID`);

--
-- Indexes for table `tbladdress`
--
ALTER TABLE `tbladdress`
  ADD PRIMARY KEY (`address_ID`);

--
-- Indexes for table `tbladvisory`
--
ALTER TABLE `tbladvisory`
  ADD PRIMARY KEY (`advisory_ID`);

--
-- Indexes for table `tblclients`
--
ALTER TABLE `tblclients`
  ADD PRIMARY KEY (`client_ID`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaint_ID`);

--
-- Indexes for table `tblplumber`
--
ALTER TABLE `tblplumber`
  ADD PRIMARY KEY (`plumber_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1027;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99123;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `complaint_category`
--
ALTER TABLE `complaint_category`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `date_billed`
--
ALTER TABLE `date_billed`
  MODIFY `billed_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inspection_schedule_for_complaints`
--
ALTER TABLE `inspection_schedule_for_complaints`
  MODIFY `isc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `inspection_schedule_for_registration_approval`
--
ALTER TABLE `inspection_schedule_for_registration_approval`
  MODIFY `schedule_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `system_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbladdress`
--
ALTER TABLE `tbladdress`
  MODIFY `address_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbladvisory`
--
ALTER TABLE `tbladvisory`
  MODIFY `advisory_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblclients`
--
ALTER TABLE `tblclients`
  MODIFY `client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaint_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblplumber`
--
ALTER TABLE `tblplumber`
  MODIFY `plumber_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
