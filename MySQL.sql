CREATE DATABASE IF NOT EXISTS `srpdb`;

USE `srpdb`;

CREATE TABLE `srpdb`.`projects` (
    `id`          INT NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(60) NOT NULL,
    `description` VARCHAR(240) NOT NULL,
    `situation`   VARCHAR(20) NOT NULL,
    `notes`       VARCHAR(240),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE
) DEFAULT CHARACTER SET = utf8mb4;

CREATE TABLE `srpdb`.`tasks` (
    `id`          INT NOT NULL AUTO_INCREMENT,
    `date`        DATE NOT NULL,
    `start_time`  VARCHAR(8) NOT NULL,
    `end_time`    VARCHAR(8) NOT NULL,
    `situation`   VARCHAR(20) NOT NULL,
    `description` VARCHAR(240) NOT NULL,
    `notes`       VARCHAR(240),
    `project_id`  INT NOT NULL,
    PRIMARY KEY (`id`, `start_time`),
    INDEX `project_id_idx` (`project_id` ASC) VISIBLE,
    CONSTRAINT `project_id`
        FOREIGN KEY (`project_id`)
        REFERENCES `srpdb`.`projects` (`id`)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
) DEFAULT CHARACTER SET = utf8mb4;

CREATE VIEW `tasks_with_projectname` AS
SELECT `srpdb`.`tasks`.*, `srpdb`.`projects`.name AS `project_name`
FROM `srpdb`.`tasks`
INNER JOIN `srpdb`.`projects`
ON `srpdb`.`tasks`.`project_id` = `srpdb`.`projects`.`id`;
