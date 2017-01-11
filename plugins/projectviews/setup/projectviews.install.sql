CREATE TABLE IF NOT EXISTS `cg_projectviews` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`userid` INT(11) NOT NULL DEFAULT '0',
	`areaid` INT(11) NOT NULL DEFAULT '0',
	`dat` INT(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`),
	INDEX `projectid` (`areaid`)
);