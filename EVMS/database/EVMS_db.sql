-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 08:44 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EVMS_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `client_id` int(30) NOT NULL,
  `hall_id` int(30) NOT NULL,
  `services_ids` text DEFAULT NULL,
  `wedding_schedule` date NOT NULL,
  `total_guests` float NOT NULL DEFAULT 0,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`id`, `code`, `client_id`, `hall_id`, `services_ids`, `wedding_schedule`, `total_guests`, `remarks`, `status`, `date_created`, `date_updated`) VALUES
(1, '202201-00001', 2, 2, '|1|,|2|', '2022-02-23', 300, 'This a sample remarks only.', 1, '2022-01-31 14:24:38', '2022-01-31 15:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `avatar` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `address`, `email`, `password`, `status`, `avatar`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Claire', 'C', 'Blake', 'Female', '09123456789', 'This is my sample Address only.', 'cblake@sample.com', '4744ddea876b11dcb1d169fadf494418', 1, 'uploads/clients/1.png?v=1643609613', 0, '2022-01-31 13:33:27', '2023-01-31 14:13:33'),
(2, 'John', 'D', 'Smith', 'Male', '09123456987', 'This my address.', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', 1, '', 0, '2023-01-31 13:34:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hall_list`
--

CREATE TABLE `hall_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `image_path` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall_list`
--

INSERT INTO `hall_list` (`id`, `code`, `name`, `price`, `description`, `image_path`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Hall-101', 'Sample 101', 3500, 'Maecenas in efficitur magna. Donec cursus sollicitudin orci, at placerat turpis pulvinar id. Nullam scelerisque eleifend molestie. Duis id vulputate est. Phasellus efficitur non urna id pulvinar. Fusce iaculis massa ut risus ultrices rhoncus. Sed ultricies ligula eu cursus vestibulum. Curabitur efficitur nisi nisi, facilisis consequat lacus congue id.', 'uploads/halls/1.png?v=1643594690', 1, 0, '2023-01-31 09:59:18', '2023-01-31 10:04:50'),
(2, 'Hall-102', 'Hall 2', 4500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin finibus mi felis, et euismod magna rutrum sollicitudin. Phasellus maximus accumsan neque ut rhoncus. Fusce sit amet lacus pellentesque, lacinia massa ac, feugiat massa. Sed dignissim mi et faucibus auctor. Sed vel vestibulum elit. Pellentesque id ligula erat. Proin dictum tempor rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed dictum venenatis dui eu finibus.', NULL, 1, 0, '2023-01-31 10:10:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_list`
--

CREATE TABLE `message_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_list`
--

INSERT INTO `message_list` (`id`, `fullname`, `contact`, `email`, `message`, `status`, `date_created`) VALUES
(1, 'John Smith', '09123456789', 'jsmith@sample.com', 'This is a sample inquiry only.', 1, '2022-01-31 15:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_list`
--

INSERT INTO `service_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Service 101', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin finibus mi felis, et euismod magna rutrum sollicitudin. Phasellus maximus accumsan neque ut rhoncus. Fusce sit amet lacus pellentesque, lacinia massa ac, feugiat massa. Sed dignissim mi et faucibus auctor. Sed vel vestibulum elit. Pellentesque id ligula erat. Proin dictum tempor rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed dictum venenatis dui eu finibus. Nullam at sem ultricies urna pellentesque viverra. Phasellus ornare metus pellentesque neque dapibus, ac posuere magna semper. Nam libero lacus, posuere in tristique sed, aliquet sit amet dolor. Duis a erat est. Phasellus ac mauris non turpis dignissim cursus. Quisque eget risus non justo ultrices lacinia.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Maecenas in efficitur magna. Donec cursus sollicitudin orci, at placerat turpis pulvinar id. Nullam scelerisque eleifend molestie. Duis id vulputate est. Phasellus efficitur non urna id pulvinar. Fusce iaculis massa ut risus ultrices rhoncus. Sed ultricies ligula eu cursus vestibulum. Curabitur efficitur nisi nisi, facilisis consequat lacus congue id.&lt;/p&gt;', 1, 0, '2022-01-31 10:22:31', NULL),
(2, 'Service 102', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Ut at magna pulvinar, posuere sapien quis, mollis turpis. Maecenas non vulputate magna. Etiam vel turpis metus. Nullam porta sem metus, non aliquet lacus dapibus sit amet. Sed eu diam facilisis, accumsan sapien eu, rhoncus quam. Sed vitae orci in risus efficitur tristique. Suspendisse potenti. Donec varius, lacus non vestibulum feugiat, turpis urna elementum mi, vitae vulputate turpis ipsum eu dolor. Mauris quis libero ut lacus imperdiet porta id eget dui. Morbi ac elementum lorem.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Etiam pulvinar facilisis ligula. Suspendisse eros tortor, dictum ut bibendum id, suscipit et ipsum. Donec dictum lectus sed urna gravida, quis viverra lacus rutrum. Sed volutpat bibendum libero, sit amet ultricies odio vestibulum quis. Curabitur vehicula vulputate magna sit amet condimentum. Integer ultrices erat eu tortor faucibus, quis sagittis eros congue. In placerat mattis diam ac blandit. Aliquam quis diam vitae eros ultrices tristique. Phasellus consequat ante ac convallis ultrices. Proin tincidunt quam sed feugiat tristique. Fusce quis nunc ac nulla ultrices lobortis. Quisque dapibus eros nec massa varius tincidunt. Phasellus sed pulvinar odio. Suspendisse sed ornare nibh. Maecenas libero dui, malesuada sed justo nec, egestas feugiat orci.&lt;/p&gt;', 1, 0, '2022-01-31 10:23:22', NULL),
(3, 'Service 103', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;In et mauris dolor. In nec pretium metus, in aliquam magna. Sed dictum nulla diam, at dapibus ipsum tempus id. Praesent tristique neque dignissim risus venenatis, ut dignissim velit gravida. Etiam nec justo nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam vehicula orci vitae sapien pellentesque pulvinar. Nullam congue fringilla dapibus.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px;&quot;&gt;Suspendisse mollis rhoncus orci, non condimentum tortor. Vestibulum quis lorem velit. Donec sollicitudin hendrerit ex, vel molestie elit sodales quis. Proin et mi elementum, euismod est quis, rhoncus magna. Morbi semper massa sit amet malesuada tincidunt. Quisque imperdiet consequat justo. Vestibulum ornare erat et elit tincidunt ultrices. Aenean euismod dui quam, ut sodales quam rutrum ut. Duis eget ipsum nisl. Aliquam eu ex mauris. Nam at tempus augue. Pellentesque ac mollis eros, quis aliquet orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eget porttitor purus, sit amet convallis dolor. Curabitur molestie odio in porta bibendum.&lt;/p&gt;', 1, 0, '2022-01-31 10:24:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Wedding Hall Booking System'),
(6, 'short_name', 'WHBS - PHP'),
(11, 'logo', 'uploads/logo-1643592116.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1643592116.png'),
(15, 'content', 'Array'),
(16, 'email', 'info@xyzweddinghalls.com'),
(17, 'contact', '09854698789 / 78945632'),
(18, 'from_time', '11:00'),
(19, 'to_time', '21:30'),
(20, 'address', 'XYZ Street, There City, Here, 2306');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', NULL, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1639468007', NULL, 1, 1, '2023-03-20 14:02:37', '2021-04-14 15:47:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_id` (`hall_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall_list`
--
ALTER TABLE `hall_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_list`
--
ALTER TABLE `message_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hall_list`
--
ALTER TABLE `hall_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_list`
--
ALTER TABLE `message_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_list`
--
ALTER TABLE `service_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD CONSTRAINT `booking_list_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_list_ibfk_2` FOREIGN KEY (`hall_id`) REFERENCES `hall_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
