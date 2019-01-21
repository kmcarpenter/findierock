
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- album
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `album`;


CREATE TABLE `album`
(
	`AlbumId` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`ArtistId` INTEGER(11)  NOT NULL,
	`Name` VARCHAR(250)  NOT NULL,
	`Label` VARCHAR(45),
	`Copyright` DATE,
	`Producer` VARCHAR(100),
	`lastFmId` CHAR(36) default '',
	`ReleaseDate` DATE,
	`AlbumType` VARCHAR(255),
	`Slug` VARCHAR(250),
	`HasPhotos` TINYINT(1) default 0 NOT NULL,
	`SubmittedByUser` INTEGER(11),
	PRIMARY KEY (`AlbumId`),
	UNIQUE KEY `IDX_ALBUM_SLUG` (`Slug`),
	KEY `IDX_ALBUM_NAME`(`Name`),
	KEY `FK_ALBUM_ARTIST`(`ArtistId`),
	KEY `IDX_ALBUM_LASTFMID`(`lastFmId`),
	KEY `SubmittedByUser`(`SubmittedByUser`),
	CONSTRAINT `album_ibfk_1`
		FOREIGN KEY (`SubmittedByUser`)
		REFERENCES `user` (`userid`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `FK_ALBUM_ARTIST`
		FOREIGN KEY (`ArtistId`)
		REFERENCES `artist` (`ArtistId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- albumrating
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `albumrating`;


CREATE TABLE `albumrating`
(
	`AlbumId` INTEGER(11)  NOT NULL,
	`UserId` INTEGER(11)  NOT NULL,
	`Rating` SMALLINT(6),
	`Comments` TEXT,
	PRIMARY KEY (`AlbumId`,`UserId`),
	KEY `FK_ALBUMRATING_USER`(`UserId`),
	CONSTRAINT `FK_ALBUMRATING_ALBUM`
		FOREIGN KEY (`AlbumId`)
		REFERENCES `album` (`AlbumId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `FK_ALBUMRATING_USER`
		FOREIGN KEY (`UserId`)
		REFERENCES `user` (`userid`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- albumtrack
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `albumtrack`;


CREATE TABLE `albumtrack`
(
	`TrackId` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`AlbumId` INTEGER(11)  NOT NULL,
	`Name` VARCHAR(255)  NOT NULL,
	`File` VARCHAR(255),
	`Length` INTEGER(11),
	`lastFmId` CHAR(36),
	PRIMARY KEY (`TrackId`),
	KEY `IDX_ALBUMTRACK_NAME`(`Name`),
	KEY `FK_ALBUMTRACK_ALBUM`(`AlbumId`),
	KEY `IDX_ALBUMTRACK_LASTFMID`(`lastFmId`),
	CONSTRAINT `FK_ALBUMTRACK_ALBUM`
		FOREIGN KEY (`AlbumId`)
		REFERENCES `album` (`AlbumId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- artist
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `artist`;


CREATE TABLE `artist`
(
	`ArtistId` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`Name` VARCHAR(250)  NOT NULL,
	`City` VARCHAR(45),
	`Province` VARCHAR(45),
	`Country` VARCHAR(45),
	`Intro` TEXT,
	`Biography` LONGTEXT,
	`Website` VARCHAR(100),
	`Twitter` VARCHAR(45),
	`Facebook` VARCHAR(45),
	`RSS` VARCHAR(45),
	`BrokenUp` TINYINT(4) default 0 NOT NULL,
	`lastFmId` CHAR(36),
	`artistcol` VARCHAR(45),
	`Slug` VARCHAR(250),
	`HasPhotos` TINYINT(1) default 0 NOT NULL,
	`SubmittedByUser` INTEGER(11),
	PRIMARY KEY (`ArtistId`),
	UNIQUE KEY `IDX_ARTIST_SLUG` (`Slug`),
	KEY `IDX_ARTIST_NAME`(`Name`),
	KEY `IDX_ARTIST_LASTFMID`(`lastFmId`),
	KEY `SubmittedByUser`(`SubmittedByUser`),
	CONSTRAINT `artist_ibfk_1`
		FOREIGN KEY (`SubmittedByUser`)
		REFERENCES `user` (`userid`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- artistrating
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `artistrating`;


CREATE TABLE `artistrating`
(
	`ArtistId` INTEGER(11)  NOT NULL,
	`UserId` INTEGER(11)  NOT NULL,
	`Rating` SMALLINT(6),
	`Comments` TEXT,
	PRIMARY KEY (`ArtistId`,`UserId`),
	KEY `FK_ARTISTRATING_USER`(`UserId`),
	CONSTRAINT `FK_ARTISTRATING_ARIST`
		FOREIGN KEY (`ArtistId`)
		REFERENCES `artist` (`ArtistId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `FK_ARTISTRATING_USER`
		FOREIGN KEY (`UserId`)
		REFERENCES `user` (`userid`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- event
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `event`;


CREATE TABLE `event`
(
	`EventId` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`Name` VARCHAR(250)  NOT NULL,
	`Start` DATETIME  NOT NULL,
	`Finish` VARCHAR(45),
	`Cover` DECIMAL(5,2),
	`AgeOfMajority` TINYINT(4) default 1 NOT NULL,
	`EventTypeId` INTEGER(11)  NOT NULL,
	`lastFmId` INTEGER(11),
	`VenueId` INTEGER(11)  NOT NULL,
	`Cancelled` TINYINT(4) default 0 NOT NULL,
	`Description` TEXT,
	`Slug` VARCHAR(250),
	`SubmittedByUser` INTEGER(11),
	PRIMARY KEY (`EventId`),
	UNIQUE KEY `IDX_EVENT_SLUG` (`Slug`),
	KEY `IDX_EVENT_NAME`(`Name`),
	KEY `IDX_EVENT_START`(`Start`),
	KEY `FK_EVENT_EVENTTYPE`(`EventTypeId`),
	KEY `FK_EVENT_VENUE`(`VenueId`),
	KEY `IDX_EVENT_LASTFMID`(`lastFmId`),
	KEY `SubmittedByUser`(`SubmittedByUser`),
	CONSTRAINT `event_ibfk_1`
		FOREIGN KEY (`SubmittedByUser`)
		REFERENCES `user` (`userid`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `FK_EVENT_EVENTTYPE`
		FOREIGN KEY (`EventTypeId`)
		REFERENCES `eventtype` (`EventTypeId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `FK_EVENT_VENUE`
		FOREIGN KEY (`VenueId`)
		REFERENCES `venue` (`VenueId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- eventartist
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `eventartist`;


CREATE TABLE `eventartist`
(
	`EventId` INTEGER(11)  NOT NULL,
	`ArtistId` INTEGER(11)  NOT NULL,
	`Comments` TEXT,
	`HeadLiner` TINYINT(4) default 0,
	PRIMARY KEY (`EventId`,`ArtistId`),
	KEY `FK_EVENTARTIST_ARTIST`(`ArtistId`),
	KEY `FK_EVENTARTIST_EVENT`(`EventId`),
	CONSTRAINT `FK_EVENTARTIST_ARTIST`
		FOREIGN KEY (`ArtistId`)
		REFERENCES `artist` (`ArtistId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `FK_EVENTARTIST_EVENT`
		FOREIGN KEY (`EventId`)
		REFERENCES `event` (`EventId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- eventtype
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `eventtype`;


CREATE TABLE `eventtype`
(
	`EventTypeId` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`Type` VARCHAR(45)  NOT NULL,
	PRIMARY KEY (`EventTypeId`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- findie_wp_users
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `findie_wp_users`;


CREATE TABLE `findie_wp_users`
(
	`ID` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`user_login` VARCHAR(60) default '' NOT NULL,
	`user_pass` VARCHAR(64) default '' NOT NULL,
	`user_nicename` VARCHAR(50) default '' NOT NULL,
	`user_email` VARCHAR(100) default '' NOT NULL,
	`user_url` VARCHAR(100) default '' NOT NULL,
	`user_registered` DATETIME default '0000-00-00 00:00:00' NOT NULL,
	`user_activation_key` VARCHAR(60) default '' NOT NULL,
	`user_status` INTEGER(11) default 0 NOT NULL,
	`display_name` VARCHAR(250) default '' NOT NULL,
	PRIMARY KEY (`ID`),
	UNIQUE KEY `user_login` (`user_login`),
	KEY `user_login_key`(`user_login`),
	KEY `user_nicename`(`user_nicename`),
	KEY `user_registered`(`user_registered`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- member
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `member`;


CREATE TABLE `member`
(
	`MemberId` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`ScreenName` VARCHAR(45)  NOT NULL,
	PRIMARY KEY (`MemberId`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- trend
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `trend`;


CREATE TABLE `trend`
(
	`TrendId` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`TrendTypeId` INTEGER(11)  NOT NULL,
	`TimeStamp` DATE  NOT NULL,
	`TrendTarget` INTEGER(11)  NOT NULL,
	`SessionId` CHAR(32)  NOT NULL,
	PRIMARY KEY (`TrendId`),
	UNIQUE KEY `IDX_TREND_UNIQUETREND` (`TrendTypeId`, `TrendTarget`, `SessionId`, `TimeStamp`),
	KEY `IDX_TREND_TARGET`(`TrendTarget`),
	KEY `FK_TREND_TRENDTYPE`(`TrendTypeId`),
	KEY `IDX_TREND_TIME`(`TimeStamp`),
	CONSTRAINT `FK_TREND_TRENDTYPE`
		FOREIGN KEY (`TrendTypeId`)
		REFERENCES `trendtype` (`TrendTypeId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- trendtype
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `trendtype`;


CREATE TABLE `trendtype`
(
	`TrendTypeId` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`Name` VARCHAR(45),
	PRIMARY KEY (`TrendTypeId`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`userid` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(100)  NOT NULL,
	`password` CHAR(40)  NOT NULL,
	`email` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`userid`),
	UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- user_link_wp
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user_link_wp`;


CREATE TABLE `user_link_wp`
(
	`id_zend` INTEGER(11)  NOT NULL,
	`id_wordpress` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id_zend`,`id_wordpress`),
	KEY `id_wordpress`(`id_wordpress`),
	CONSTRAINT `user_link_wp_ibfk_2`
		FOREIGN KEY (`id_wordpress`)
		REFERENCES `findie_wp_users` (`ID`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `user_link_wp_ibfk_1`
		FOREIGN KEY (`id_zend`)
		REFERENCES `user` (`userid`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- venue
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `venue`;


CREATE TABLE `venue`
(
	`VenueId` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`Address` VARCHAR(100)  NOT NULL,
	`Address2` VARCHAR(100),
	`City` VARCHAR(45)  NOT NULL,
	`Province` VARCHAR(45)  NOT NULL,
	`Country` VARCHAR(45)  NOT NULL,
	`Latitude` DOUBLE  NOT NULL,
	`Longitude` DOUBLE  NOT NULL,
	`Phone` VARCHAR(15),
	`Name` VARCHAR(250)  NOT NULL,
	`Description` TEXT,
	`Website` VARCHAR(1000),
	`Twitter` VARCHAR(200),
	`Facebook` VARCHAR(200),
	`RSSFeed` VARCHAR(200),
	`Closed` TINYINT(4) default 0 NOT NULL,
	`lastFmId` INTEGER(11) default 0,
	`Slug` VARCHAR(250),
	`HasPhotos` TINYINT(1) default 0 NOT NULL,
	`SubmittedByUser` INTEGER(11),
	PRIMARY KEY (`VenueId`),
	UNIQUE KEY `IDX_VENUE_SLUG` (`Slug`),
	KEY `IDX_VENUE_NAME`(`Name`),
	KEY `IDX_VENUE_LASTFMID`(`lastFmId`),
	KEY `SubmittedByUser`(`SubmittedByUser`),
	CONSTRAINT `venue_ibfk_1`
		FOREIGN KEY (`SubmittedByUser`)
		REFERENCES `user` (`userid`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- venuerating
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `venuerating`;


CREATE TABLE `venuerating`
(
	`VenueId` INTEGER(11)  NOT NULL,
	`UserId` INTEGER(11)  NOT NULL,
	`Rating` SMALLINT(6),
	`Comments` TEXT,
	PRIMARY KEY (`VenueId`,`UserId`),
	KEY `FK_VENUERATING_USER`(`UserId`),
	CONSTRAINT `FK_VENUERATING_VENUE`
		FOREIGN KEY (`VenueId`)
		REFERENCES `venue` (`VenueId`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `FK_VENUERATING_USER`
		FOREIGN KEY (`UserId`)
		REFERENCES `user` (`userid`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
