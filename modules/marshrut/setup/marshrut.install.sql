CREATE TABLE `cg_marshrut` (
	`item_id` INT(11) NOT NULL AUTO_INCREMENT,
	`item_db` INT(11) NULL DEFAULT '0',
	`item_de` INT(11) NULL DEFAULT '0',
	`item_country` CHAR(3) NULL DEFAULT '0',
	`item_region` INT(11) NULL DEFAULT '0',
	`item_city` INT(11) NULL DEFAULT '0',
	`item_countryto` CHAR(3) NULL DEFAULT '0',
	`item_regionto` INT(11) NULL DEFAULT '0',
	`item_cityto` INT(11) NULL DEFAULT '0',
	`item_userid` INT(11) NULL DEFAULT '0',
	`item_price` INT(11) NULL DEFAULT '0',
	`item_state` INT(11) NULL DEFAULT '0',
	PRIMARY KEY (`item_id`)
);
