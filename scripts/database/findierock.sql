-- phpMyAdmin SQL Dump
-- version 3.1.2deb1ubuntu0.2
-- http://www.phpmyadmin.net
--
-- Host: mc-server
-- Generation Time: Nov 05, 2010 at 08:17 PM
-- Server version: 5.0.75
-- PHP Version: 5.2.6-3ubuntu4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indiescene`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `AlbumId` int(11) NOT NULL auto_increment,
  `ArtistId` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Label` varchar(45) default NULL,
  `Copyright` date default NULL,
  `Producer` varchar(100) default NULL,
  `lastFmId` char(36) default '',
  `ReleaseDate` date default NULL,
  `AlbumType` varchar(255) default NULL,
  `Slug` varchar(250) default NULL,
  PRIMARY KEY  (`AlbumId`),
  UNIQUE KEY `IDX_ALBUM_SLUG` (`Slug`),
  KEY `IDX_ALBUM_NAME` (`Name`),
  KEY `FK_ALBUM_ARTIST` (`ArtistId`),
  KEY `IDX_ALBUM_LASTFMID` (`lastFmId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8119 ;

-- --------------------------------------------------------

--
-- Table structure for table `albumtrack`
--

CREATE TABLE IF NOT EXISTS `albumtrack` (
  `TrackId` int(11) NOT NULL auto_increment,
  `AlbumId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `File` varchar(255) default NULL,
  `Length` int(11) default NULL COMMENT 'Miliseconds',
  `lastFmId` char(36) default NULL,
  PRIMARY KEY  (`TrackId`),
  KEY `IDX_ALBUMTRACK_NAME` (`Name`),
  KEY `FK_ALBUMTRACK_ALBUM` (`AlbumId`),
  KEY `IDX_ALBUMTRACK_LASTFMID` (`lastFmId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75221 ;

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
  `ArtistId` int(11) NOT NULL auto_increment,
  `Name` varchar(250) NOT NULL,
  `City` varchar(45) default NULL,
  `Province` varchar(45) default NULL,
  `Country` varchar(45) default NULL,
  `Intro` text,
  `Biography` longtext,
  `Website` varchar(100) default NULL,
  `Twitter` varchar(45) default NULL,
  `Facebook` varchar(45) default NULL,
  `RSS` varchar(45) default NULL,
  `BrokenUp` tinyint(4) NOT NULL default '0',
  `lastFmId` char(36) default NULL,
  `artistcol` varchar(45) default NULL,
  `Slug` varchar(200) default NULL,
  PRIMARY KEY  (`ArtistId`),
  UNIQUE KEY `IDX_ARTIST_SLUG` (`Slug`),
  KEY `IDX_ARTIST_NAME` (`Name`),
  KEY `IDX_ARTIST_LASTFMID` (`lastFmId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1692 ;

-- --------------------------------------------------------

--
-- Table structure for table `artistrating`
--

CREATE TABLE IF NOT EXISTS `artistrating` (
  `ArtistId` int(11) NOT NULL,
  `MemberId` int(11) NOT NULL,
  `Rating` smallint(6) default NULL,
  `Comments` text,
  PRIMARY KEY  (`ArtistId`,`MemberId`),
  KEY `FK_ARTISTRATING_MEMBER` (`MemberId`),
  KEY `FK_ARTISTRATING_ARTIST` (`ArtistId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `EventId` int(11) NOT NULL auto_increment,
  `Name` varchar(250) NOT NULL,
  `Start` datetime NOT NULL,
  `Finish` varchar(45) default NULL,
  `Cover` decimal(5,2) default NULL,
  `AgeOfMajority` tinyint(4) NOT NULL default '1',
  `EventTypeId` int(11) NOT NULL,
  `lastFmId` int(11) default NULL,
  `VenueId` int(11) NOT NULL,
  `Cancelled` tinyint(4) NOT NULL default '0',
  `Description` text,
  `Slug` varchar(200) default NULL,
  PRIMARY KEY  (`EventId`),
  UNIQUE KEY `IDX_EVENT_SLUG` (`Slug`),
  KEY `IDX_EVENT_NAME` (`Name`),
  KEY `IDX_EVENT_START` (`Start`),
  KEY `FK_EVENT_EVENTTYPE` (`EventTypeId`),
  KEY `FK_EVENT_VENUE` (`VenueId`),
  KEY `IDX_EVENT_LASTFMID` (`lastFmId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2851 ;

-- --------------------------------------------------------

--
-- Table structure for table `eventartist`
--

CREATE TABLE IF NOT EXISTS `eventartist` (
  `EventId` int(11) NOT NULL,
  `ArtistId` int(11) NOT NULL,
  `Comments` text,
  `HeadLiner` tinyint(4) default '0',
  PRIMARY KEY  (`EventId`,`ArtistId`),
  KEY `FK_EVENTARTIST_ARTIST` (`ArtistId`),
  KEY `FK_EVENTARTIST_EVENT` (`EventId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE IF NOT EXISTS `eventtype` (
  `EventTypeId` int(11) NOT NULL auto_increment,
  `Type` varchar(45) NOT NULL,
  PRIMARY KEY  (`EventTypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `MemberId` int(11) NOT NULL auto_increment,
  `ScreenName` varchar(45) NOT NULL,
  PRIMARY KEY  (`MemberId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trend`
--

CREATE TABLE IF NOT EXISTS `trend` (
  `TrendId` int(11) NOT NULL auto_increment,
  `TrendTypeId` int(11) NOT NULL,
  `TimeStamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `TrendTarget` int(11) NOT NULL,
  PRIMARY KEY  (`TrendId`),
  KEY `IDX_TREND_TARGET` (`TrendTarget`),
  KEY `FK_TREND_TRENDTYPE` (`TrendTypeId`),
  KEY `IDX_TREND_TIME` (`TimeStamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trendtype`
--

CREATE TABLE IF NOT EXISTS `trendtype` (
  `TrendTypeId` int(11) NOT NULL auto_increment,
  `Name` varchar(45) default NULL,
  PRIMARY KEY  (`TrendTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `VenueId` int(11) NOT NULL auto_increment,
  `Address` varchar(100) NOT NULL,
  `Address2` varchar(45) default NULL,
  `City` varchar(45) NOT NULL,
  `Province` varchar(45) NOT NULL,
  `Country` varchar(45) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  `Phone` varchar(15) default NULL,
  `Name` varchar(250) NOT NULL,
  `Description` text,
  `Website` varchar(100) default NULL,
  `Twitter` varchar(45) default NULL,
  `Facebook` varchar(45) default NULL,
  `RSSFeed` varchar(45) default NULL,
  `Closed` tinyint(4) NOT NULL default '0',
  `lastFmId` int(11) default '0',
  `Slug` varchar(200) default NULL,
  PRIMARY KEY  (`VenueId`),
  UNIQUE KEY `IDX_VENUE_SLUG` (`Slug`),
  KEY `IDX_VENUE_NAME` (`Name`),
  KEY `IDX_VENUE_LASTFMID` (`lastFmId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1044 ;

-- --------------------------------------------------------

--
-- Table structure for table `venuerating`
--

CREATE TABLE IF NOT EXISTS `venuerating` (
  `VenueId` int(11) NOT NULL,
  `MemberId` int(11) NOT NULL,
  `Rating` smallint(6) default NULL,
  `Comments` text,
  PRIMARY KEY  (`VenueId`,`MemberId`),
  KEY `FK_VENUERATING_MEMBER` (`MemberId`),
  KEY `FK_VENUERATING_VENUE` (`VenueId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `FK_ALBUM_ARTIST` FOREIGN KEY (`ArtistId`) REFERENCES `artist` (`ArtistId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `albumtrack`
--
ALTER TABLE `albumtrack`
  ADD CONSTRAINT `FK_ALBUMTRACK_ALBUM` FOREIGN KEY (`AlbumId`) REFERENCES `album` (`AlbumId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `artistrating`
--
ALTER TABLE `artistrating`
  ADD CONSTRAINT `FK_ARTISTRATING_ARIST` FOREIGN KEY (`ArtistId`) REFERENCES `artist` (`ArtistId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_ARTISTRATING_MEMBER` FOREIGN KEY (`MemberId`) REFERENCES `member` (`MemberId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_EVENT_EVENTTYPE` FOREIGN KEY (`EventTypeId`) REFERENCES `eventtype` (`EventTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_EVENT_VENUE` FOREIGN KEY (`VenueId`) REFERENCES `venue` (`VenueId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `eventartist`
--
ALTER TABLE `eventartist`
  ADD CONSTRAINT `FK_EVENTARTIST_ARTIST` FOREIGN KEY (`ArtistId`) REFERENCES `artist` (`ArtistId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_EVENTARTIST_EVENT` FOREIGN KEY (`EventId`) REFERENCES `event` (`EventId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trend`
--
ALTER TABLE `trend`
  ADD CONSTRAINT `FK_TREND_TRENDTYPE` FOREIGN KEY (`TrendTypeId`) REFERENCES `trendtype` (`TrendTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `venuerating`
--
ALTER TABLE `venuerating`
  ADD CONSTRAINT `FK_VENUERATING_MEMBER` FOREIGN KEY (`MemberId`) REFERENCES `member` (`MemberId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_VENUERATING_VENUE` FOREIGN KEY (`VenueId`) REFERENCES `venue` (`VenueId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
