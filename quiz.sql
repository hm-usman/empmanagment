-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2016 at 09:41 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(300) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(2, 'What is the capital of the United Kingdom?', 'Birmingham', 'London', 'Leeds', 'Liverpool', 2),
(3, 'What is the capital of the United States of America?', 'New York', 'California', 'Washington D.C', 'Florida', 3),
(4, 'What present of the earth is covered by water?', '90%', '71%', '64%', '88%', 2),
(5, 'What year did WWII begin in?', '1941	', '1938', '1939', '1937', 3),
(6, 'Windows operating system belongs to which of the following companies?', 'Apple			', 'Google', 'Microsoft', 'Amazon', 3),
(7, 'Which of the following boxers was given the nickname "greatest of all time"?', 'Mike Tyson	', 'Joe Frasier', 'Muhammad Ali', 'George Foreman', 3),
(8, 'Nelson Mandela was president of which country?		', 'Nigeria', 'South Africa', 'Madagascar', 'Eritrea', 2),
(9, 'According to plate tectonic theory what is the name of the first’s supercontinent? 	', 'Eurasia', 'Pangaea', 'Africa', 'Australasia ', 2),
(10, 'What is the name given to the study of flags?				', 'Cartography', 'Vexillology', 'Agrostology', 'Archaeology', 1),
(11, 'In Einstein’s famous E=mc², what does the E stand for?		', 'Elementary charge', 'Energy', 'momentum', 'Speed', 2),
(12, 'How long is the Great Wall of China? 			', '21,196km', '22,343km', '25,967km', '31,723km', 1),
(13, 'What element does K represent in the periodic table? 				', 'Silver', 'Potassium', 'Lead', 'Gold', 2),
(14, 'What is the closest galaxy to the Milky Way galaxy? ', 'Andromeda', 'Hubble', 'pinwheel', 'tadpole', 1),
(15, 'What is the highest grossing movie of all time?		', 'Avatar', 'titanic', 'Gone with the wind', 'Star wars', 3),
(16, 'Which Greek philosopher wrote a book named ''Republic''?	', 'Socrates', 'Caesar', 'Plato', 'Descartes	', 3),
(17, 'Which of the following empires is considered to be the world’s largest empire?', 'Roman', 'Egyptian			', 'British', 'French', 3),
(18, 'According the Guinness world record how tall is the tallest man who ever lived? ', '2.11m', '2.42m', '2.88m', '2.72m', 4),
(19, 'Nintendo was founded in what year?	', '1880', '1889', '1921', '1928', 2),
(20, 'Who was the lead singer of Queen?', ' Freddie Mercury', 'Michael Jackson', 'Elton John', 'Elvis Costello ', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
