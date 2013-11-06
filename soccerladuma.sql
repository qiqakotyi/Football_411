-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2013 at 02:04 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soccerladuma`
--
CREATE DATABASE IF NOT EXISTS `soccerladuma` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `soccerladuma`;

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

DROP TABLE IF EXISTS `fixtures`;
CREATE TABLE `fixtures` (
  `fix_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `league_id` smallint(6) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `home` varchar(35) NOT NULL,
  `away` varchar(35) NOT NULL,
  PRIMARY KEY (`fix_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

DROP TABLE IF EXISTS `leagues`;
CREATE TABLE `leagues` (
  `league_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `league_name` varchar(25) NOT NULL,
  `fixtures_url` varchar(255) NOT NULL,
  `results_url` varchar(255) NOT NULL,
  `teams_url` varchar(255) NOT NULL,
  PRIMARY KEY (`league_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `live_scores`
--

DROP TABLE IF EXISTS `live_scores`;
CREATE TABLE `live_scores` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `home` varchar(35) NOT NULL,
  `score` varchar(5) NOT NULL,
  `away` varchar(35) NOT NULL,
  `game_time` varchar(5) NOT NULL,
  `status` varchar(9) NOT NULL,
  `header` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `league_id` smallint(6) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `home` varchar(35) NOT NULL,
  `score` varchar(15) NOT NULL,
  `away` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(35) NOT NULL,
  `P` tinyint(4) NOT NULL,
  `W` tinyint(4) NOT NULL,
  `D` tinyint(4) NOT NULL,
  `L` tinyint(4) NOT NULL,
  `GS` tinyint(4) NOT NULL,
  `GA` tinyint(4) NOT NULL,
  `GD` tinyint(4) NOT NULL,
  `PTS` tinyint(4) NOT NULL,
  `league_id` varchar(35) NOT NULL,
  `header` varchar(255) NOT NULL,
  `group_name` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams_table`
--

DROP TABLE IF EXISTS `teams_table`;
CREATE TABLE `teams_table` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(35) NOT NULL,
  `P` tinyint(4) NOT NULL,
  `W` tinyint(4) NOT NULL,
  `D` tinyint(4) NOT NULL,
  `L` tinyint(4) NOT NULL,
  `GS` tinyint(4) NOT NULL,
  `GA` tinyint(4) NOT NULL,
  `GD` tinyint(4) NOT NULL,
  `PTS` tinyint(4) NOT NULL,
  `league_id` smallint(6) NOT NULL,
  `header` varchar(255) NOT NULL,
  `group_name` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tvguide`
--

DROP TABLE IF EXISTS `tvguide`;
CREATE TABLE `tvguide` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `match_col` varchar(200) NOT NULL,
  `time` time NOT NULL,
  `channel` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tvguide`
--

INSERT INTO `tvguide` (`id`, `match_col`, `time`, `channel`, `date`) VALUES
(1, 'Super Diski - Absa Premiership Bidvest Wits v Ajax Cape Town', '19:30:00', 'SS4, SHD4', 'Friday, 13 Sep 2013'),
(2, 'Bundesliga Matchday 5: Hertha Berlin v Stuttgart', '20:00:00', 'SS3, SHD3, SLSA', 'Friday, 13 Sep 2013'),
(3, 'Barclays Premier League Week 5: Man Utd v Crystal Palace', '13:00:00', 'SS3, SHD3, SSM', 'Saturday, 14 Sep 2013'),
(4, 'Super Diski - Absa Premiership University Of Pretoria v Bloemfontein Celtic', '14:00:00', 'SS4', 'Saturday, 14 Sep 2013'),
(5, 'Orange Caf Champions League AC Leopards v Orlando Pirates', '15:15:00', 'SABC1, SLSA', 'Saturday, 14 Sep 2013'),
(6, 'Bundesliga Matchday 5: Bayern Munich v Hannover', '15:25:00', 'SS7, SHD6', 'Saturday, 14 Sep 2013'),
(7, 'Barclays Premier League Week 5: Tottenham Hotspur v Norwich City', '15:40:00', 'SSM', 'Saturday, 14 Sep 2013'),
(8, 'Barclays Premier League Week 5: Stoke City v Man City', '15:45:00', 'SS3, SHD3', 'Saturday, 14 Sep 2013'),
(9, 'Barclays Premier League Week 5: Sunderland v Arsenal', '15:55:00', 'SS5, HD5', 'Saturday, 14 Sep 2013'),
(10, 'Super Diski - Absa Premiership Amazulu FC v Moroka Swallows', '17:30:00', 'SS4, SHD4', 'Saturday, 14 Sep 2013'),
(11, 'Serie A: Week 3: Inter Milan v Juventus', '17:55:00', 'SS5, SSM, HD5', 'Saturday, 14 Sep 2013'),
(12, 'Barclays Premier League Week 5: Everton v Chelsea', '18:00:00', 'SS3, SHD3', 'Saturday, 14 Sep 2013'),
(13, 'Bundesliga Matchday 5: Borussia Dortmund v Hamburg', '18:25:00', 'SS7, SHD6', 'Saturday, 14 Sep 2013'),
(14, 'Spanish La Liga Week 4: Barcelona v Sevilla', '19:55:00', 'SS5, SSM, HD5', 'Saturday, 14 Sep 2013'),
(15, 'Absa Premiership Kaizer Chiefs v Maritzburg Utd', '20:00:00', 'SABC1, SS4, SHD4, SLSA', 'Saturday, 14 Sep 2013'),
(16, 'Serie A: Week 3: Torino v AC Milan', '20:40:00', 'SS7, SHD6', 'Saturday, 14 Sep 2013'),
(17, 'Spanish La Liga Week 4: Villarreal v Real Madrid', '21:55:00', 'SS3, SHD3, SSM', 'Saturday, 14 Sep 2013'),
(18, 'Serie A: Week 3: Fiorentina v Cagliari', '13:25:00', 'SS3, SHD3, SSM', 'Sunday, 15 Sep 2013'),
(19, 'Absa Premiership MP Black Aces vs Supersport United', '14:30:00', 'SABC1', 'Sunday, 15 Sep 2013'),
(20, 'Super Diski - Absa Premiership Polokwane City v Golden Arrows', '14:30:00', 'SS4, SHD4', 'Sunday, 15 Sep 2013');
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
