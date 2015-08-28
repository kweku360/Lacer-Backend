
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- defendants
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `defendants`;

CREATE TABLE `defendants`
(
    `id` INTEGER(12) NOT NULL AUTO_INCREMENT,
    `suitno` VARCHAR(255) NOT NULL,
    `fullname` VARCHAR(255) NOT NULL,
    `address` TEXT,
    `phone` INTEGER(12),
    `created` INTEGER NOT NULL,
    `modified` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- documents
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents`
(
    `id` INTEGER(12) NOT NULL,
    `code` VARCHAR(64) NOT NULL,
    `typeid` INTEGER(12) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `suitid` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `datefiled` INTEGER NOT NULL,
    `format` VARCHAR(255) NOT NULL,
    `pagecount` INTEGER NOT NULL,
    `dataentrypersonid` INTEGER NOT NULL,
    `accessstatus` VARCHAR(255) NOT NULL,
    `created` INTEGER NOT NULL,
    `modified` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- documenttypes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `documenttypes`;

CREATE TABLE `documenttypes`
(
    `id` INTEGER(12) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `created` INTEGER NOT NULL,
    `modified` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- judges
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `judges`;

CREATE TABLE `judges`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `fullname` VARCHAR(255) NOT NULL,
    `phone` INTEGER(12) NOT NULL,
    `phonealt` INTEGER(12),
    `email` VARCHAR(255),
    `address` TEXT,
    `created` INTEGER NOT NULL,
    `modified` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- lawyers
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lawyers`;

CREATE TABLE `lawyers`
(
    `id` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `fullname` VARCHAR(255) NOT NULL,
    `phone` INTEGER(12) NOT NULL,
    `phonealt` INTEGER(12),
    `email` VARCHAR(255),
    `address` TEXT,
    `created` INTEGER NOT NULL,
    `modified` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- notifications
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(255) NOT NULL,
    `suitnumber` VARCHAR(255) NOT NULL,
    `datetimesent` INTEGER NOT NULL,
    `recipients` TEXT NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `created` INTEGER NOT NULL,
    `modified` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- plaintiffs
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `plaintiffs`;

CREATE TABLE `plaintiffs`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `suitnumber` VARCHAR(255) NOT NULL,
    `fullname` VARCHAR(255) NOT NULL,
    `address` TEXT,
    `phone` INTEGER(12),
    `created` INTEGER(12) NOT NULL,
    `modified` INTEGER(12) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- suits
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `suits`;

CREATE TABLE `suits`
(
    `id` INTEGER(12) NOT NULL AUTO_INCREMENT,
    `suitnumber` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `plaintifflawyerid` INTEGER(12) NOT NULL,
    `plaintifflawyername` VARCHAR(255) NOT NULL,
    `defendantlawyerid` INTEGER(12),
    `defendantlawyername` VARCHAR(255),
    `datefiled` INTEGER NOT NULL,
    `judgeid` INTEGER(12),
    `judgename` VARCHAR(255),
    `suitstatus` VARCHAR(255) NOT NULL,
    `dateofadjournment` INTEGER,
    `created` INTEGER NOT NULL,
    `modified` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `suitnumber` (`suitnumber`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- token
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `token`;

CREATE TABLE `token`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `selector` CHAR(12) NOT NULL,
    `token` CHAR(64) NOT NULL,
    `userid` INTEGER NOT NULL,
    `expires` INTEGER NOT NULL,
    `created` INTEGER NOT NULL,
    `modified` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id` INTEGER(12) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(45) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255),
    `status` VARCHAR(255) NOT NULL,
    `picture` VARCHAR(255),
    `created` INTEGER NOT NULL,
    `modified` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `username` (`username`),
    UNIQUE INDEX `email` (`email`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
