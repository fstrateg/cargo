CREATE TABLE `cg_userverif` (
	`userid` INT(11) NULL DEFAULT NULL,
	`dat` INT(11) NULL DEFAULT NULL,
	`fiz` INT(11) NULL DEFAULT NULL,
	`pas_status` INT(11) NULL DEFAULT '0',
	`cert_status` INT(11) NULL DEFAULT '0',
	`tax_number` INT(11) NULL DEFAULT NULL,
	`salt` VARCHAR(200) NULL DEFAULT NULL
)