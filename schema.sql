CREATE DATABASE taskforce_db
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE taskforce_db;

CREATE TABLE `user` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(50) NOT NULL, UNIQUE (`email`),
            `email` VARCHAR(50) NOT NULL,
            `birthday` DATE NOT NULL,
            `phone` VARCHAR(50) NULL,
            `skype` VARCHAR(50) NULL,
            `telegram` VARCHAR(50) NULL,
            `about` text NOT NULL,
            `password` VARCHAR(64) NOT NULL,
            `city_id` INT(11) NOT NULL,
            `role_id` INT(11) NOT NULL,
            PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `city` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(150) NOT NULL,
            `ltd` POINT NULL,
            `lgd` POINT NULL,
            PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `category` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(100) NOT NULL,
            PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `task` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(100) NOT NULL,
            `details` VARCHAR(250) NOT NULL,
            `category_id` INT(11) NOT NULL,
            `link` VARCHAR(100) NULL,
            `city_id` INT(11) NULL,
            `status_id` INT(11) NOT NULL,
            `price_task` INT UNSIGNED  NULL,
            `deadline` DATE NULL,
            `user_id` INT(11) NOT NULL,
            `executor_id` INT(11) NOT NULL,
            `pub_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `response` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `price_offer` INT UNSIGNED NULL,
            `comment` TEXT NULL,
            `user_id` INT(11) NOT NULL,
            `task_id` INT(11) NOT NULL,
            PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `completing_task` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `status_completed_id` INT UNSIGNED NOT NULL,
            `comment_completing` VARCHAR(250) NULL,
            `stars` INT(5) NULL,
            PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `status_completed` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(10) NOT NULL,
            PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `message` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `text` VARCHAR(250) NOT NULL,
            `user_id` INT(11) NOT NULL,
            PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `users_categories` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `category_id` INT(11) NOT NULL,
            `user_id` INT(11) NOT NULL,
            PRIMARY KEY (`id`)
) ENGINE = InnoDB;
