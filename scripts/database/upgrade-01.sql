ALTER TABLE  `album` ADD `SubmittedByUser` INT( 11 ) NULL;
ALTER TABLE  `album` ADD INDEX (  `SubmittedByUser` );
ALTER TABLE  `album` ADD FOREIGN KEY (  `SubmittedByUser` ) REFERENCES  `user` ( `userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE  `event` ADD `SubmittedByUser` INT( 11 ) NULL;
ALTER TABLE  `event` ADD INDEX (  `SubmittedByUser` );
ALTER TABLE  `event` ADD FOREIGN KEY (  `SubmittedByUser` ) REFERENCES  `user` ( `userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE  `artist` ADD `SubmittedByUser` INT( 11 ) NULL;
ALTER TABLE  `artist` ADD INDEX (  `SubmittedByUser` );
ALTER TABLE  `artist` ADD FOREIGN KEY (  `SubmittedByUser` ) REFERENCES  `user` ( `userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE  `venue` ADD `SubmittedByUser` INT( 11 ) NULL;
ALTER TABLE  `venue` ADD INDEX (  `SubmittedByUser` );
ALTER TABLE  `venue` ADD FOREIGN KEY (  `SubmittedByUser` ) REFERENCES  `user` ( `userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;



