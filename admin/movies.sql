-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2016 at 10:22 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `Actor_id` bigint(20) UNSIGNED NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`Actor_id`, `First_name`, `Last_name`, `Gender`) VALUES
(76, 'efwef', 'ewfww', 'Male'),
(75, 'wefwf', 'sdssdv', 'Male'),
(74, 'asfsf', 'ewfwfw', 'Male'),
(73, 'bruce', 'willis', 'Male'),
(72, 'asfsf', 'ewfwfw', 'Male'),
(70, 'efwef', 'ewfww', 'Male'),
(71, 'asfsf', 'ewfwfw', 'Male'),
(67, 'bruce', 'willis', 'Male'),
(77, 'bruce', 'willis', 'Male'),
(78, 'Robert', 'willa', 'Male'),
(79, 'fewfwf', 'ergrge', 'Male'),
(80, 'regeher', 'erge rgre', 'Female'),
(81, 'sdvdvs', 'dfvdbdb', 'Male'),
(82, 'Pirce', 'Brosnan', 'Male'),
(83, 'efwef', 'ewfww', 'Male'),
(84, 'efwef', 'willis', 'Male'),
(85, 'bruce', 'ewfww', 'Male'),
(86, 'efwef', 'sdssdv', 'Male'),
(87, 'thomas', 'willis', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `director_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`director_id`, `first_name`, `last_name`, `gender`) VALUES
(48, 'qwdqd', 'ewfewf', 'Male'),
(47, 'rfefef', 'EWFWF', 'Male'),
(46, 'EFEWFWF', 'EWFWF', 'Female'),
(43, 'EFEWFWF', 'EWFWF', 'Male'),
(44, 'rfefef', 'EWFWF', 'Female'),
(45, 'EFEWFWF', 'nolan', 'Male'),
(40, 'rfefef', 'rfef', 'Male'),
(49, 'eferge', 'ergre', 'Female'),
(50, 'rgegergerg', 'kbibuib', 'Male'),
(51, 'sdvvsvs', 'rthrhrth', 'Male'),
(52, 'sdcsdc', 'fvfdvd', 'Female'),
(53, 'rfefef', 'rfef', 'Female'),
(54, 'EFEWFWF', 'EWFWF', 'Female'),
(55, 'christoper', 'nolan', 'Male'),
(56, 'EFEWFWF', 'EWFWF', 'Female'),
(57, 'rfefef', 'EWFWF', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `Movie_id` bigint(20) UNSIGNED NOT NULL,
  `Year` date NOT NULL,
  `Genre` varchar(20) NOT NULL,
  `Tittle` varchar(50) NOT NULL,
  `Rating` float NOT NULL,
  `Poster` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Movie_id`, `Year`, `Genre`, `Tittle`, `Rating`, `Poster`) VALUES
(96, '2016-08-16', 'Action', 'harry potter', 7, '295047.jpg'),
(97, '2016-11-15', 'Action', 'Star wars', 9, '243097.jpg'),
(98, '2015-09-22', 'Action', 'Batman ', 9, '838846.jpg'),
(99, '1999-11-15', 'Action', 'Robocop', 8, '637418.jpg'),
(100, '2016-11-26', 'Thriller', 'Thor', 6, '153039.jpg'),
(101, '2016-07-04', 'Drama', 'Avengers', 8, '607022.jpg'),
(102, '2016-11-10', 'Action', 'Rush hour', 8, '655832.jpg'),
(103, '2016-11-09', 'Action', 'Spectre', 9, '918783.jpg'),
(104, '2016-10-05', 'Thriller', 'MIB', 8, '590864.jpg'),
(105, '2016-11-02', 'Action', 'Terminator', 9, '141027.jpg'),
(106, '2016-11-03', 'Action', 'Go nuts', 9, '529066.jpg'),
(107, '2016-11-16', 'Comedy', 'harry potter2', 9, '977989.jpg'),
(108, '1998-11-02', 'Thriller', 'Fight', 9, '425258.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actor`
--

CREATE TABLE `movie_actor` (
  `Movie_id` int(11) NOT NULL,
  `Actor_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_actor`
--

INSERT INTO `movie_actor` (`Movie_id`, `Actor_id`) VALUES
(85, 64),
(84, 63),
(82, 61),
(77, 56),
(80, 59),
(83, 62),
(86, 65),
(87, 66),
(88, 67),
(96, 75),
(94, 73),
(91, 70),
(97, 76),
(98, 77),
(99, 78),
(100, 79),
(101, 80),
(102, 81),
(103, 82),
(104, 83),
(105, 84),
(106, 85),
(107, 86),
(108, 87);

-- --------------------------------------------------------

--
-- Table structure for table `movie_director`
--

CREATE TABLE `movie_director` (
  `movie_id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_director`
--

INSERT INTO `movie_director` (`movie_id`, `director_id`) VALUES
(85, 37),
(84, 36),
(82, 34),
(77, 30),
(80, 32),
(83, 35),
(86, 38),
(87, 39),
(88, 40),
(96, 45),
(94, 44),
(91, 43),
(97, 46),
(98, 47),
(99, 48),
(100, 49),
(101, 50),
(102, 51),
(103, 52),
(104, 53),
(105, 54),
(106, 55),
(107, 56),
(108, 57);

-- --------------------------------------------------------

--
-- Table structure for table `nk`
--

CREATE TABLE `nk` (
  `id` int(11) NOT NULL,
  `test` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nk`
--

INSERT INTO `nk` (`id`, `test`) VALUES
(0, ''),
(0, 'nnvhh<br />\r\njhgvh<br />\r\n<br />\r\n'),
(1, 'sdcdscsdc\r\ndscsdcsdc\r\nsdcdsc'),
(3, 'nnvhh<br />\r\njhgvh<br />\r\n<br />\r\n'),
(3, '	wefwefwefwe<br />\r\nfwefwefwef<br />\r\njhhhhhj<br />\r\nyrjjryjryjz<br />\r\n<br />\r\nzz<br />\r\nz<br />\r\n<br />\r\n'),
(3, '	<br />\r\n<br />\r\n'),
(4, 'sdsfdsfsd\r\nsfdfsdfs\r\nsdfsfsfsd\r\ndsfsdfsfs');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'nikhil', 'nikhil@gmail.com', '$2y$10$Q8ZRsCr0p3TgD9AOAXxiv.HIG0zu5pXDR50yInujm2A2Bdf9UEf6K'),
(2, 'nishant', 'nishant@yahoo.com', '$2y$10$Bo9zueQBmaYoZ.P8bzQDVeZMI5L/Ok.4DZBhGLz77JcMNRXTl9uiW'),
(3, 'sagar', 'sagar@gmail.cpm', '$2y$10$Z6.gLltsrHFqw5glwKN1BefIaUT359DEoP7bud27p/EhoS6IlASsS'),
(4, 'nk', 'sagar@yahoo.com', '$2y$10$Al80D/tus9N43icIfRKO/.eVO/czYiRjAP/jCCB9gqM9OA1r0RSSq'),
(5, 'paresh', 'paresh@gmail.com', '$2y$10$/4UZ6.cFGDad5xwB5Fsk7ufNNbsyYUMmBPd9zvjN.5TX/eNqkPN3O'),
(6, 'rajesh', 'rajesh@yahoo.com', '$2y$10$ToedGFFkDm1HA16h8z6qi.n/W.4xrNlp7Bo218PLDwnCszv7ELNxe'),
(7, 'victor', 'victor@gmail.com', '$2y$10$ba97qYDTXzZrN2ZTYAKSk.1t77UgFpyvrcVJg8Q4XpMT6PgZml1vG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`Actor_id`),
  ADD UNIQUE KEY `Actor_id` (`Actor_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`director_id`),
  ADD UNIQUE KEY `director_id` (`director_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`Movie_id`),
  ADD UNIQUE KEY `Movie_id` (`Movie_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `Actor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `director_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `Movie_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
