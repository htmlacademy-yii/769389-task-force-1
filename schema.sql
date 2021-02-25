CREATE DATABASE taskforce_db
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE taskforce_db;

CREATE TABLE `user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` CHAR(50) NOT NULL, UNIQUE (`email`),
  `email` CHAR(50) NOT NULL,
  `birthday` DATE NOT NULL,
  `phone` INT(11) NULL,
  `skype` CHAR(50) NULL,
  `telegram` CHAR(50) NULL,
  `about` text NOT NULL,
  `password` CHAR(64) NOT NULL, PRIMARY KEY (`id`),
  `city_id` INT(11) NOT NULL,
  `role_id` INT(11) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE `city` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` CHAR(150) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `role` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` INT(11) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` CHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `status` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` CHAR(100) NOT NULL,
) ENGINE=InnoDB;

CREATE TABLE `task` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` CHAR(100) NOT NULL,
  `details` CHAR(250) NOT NULL,
  `category_id` INT(11) NOT NULL,
  `link` CHAR(100) NULL,
  `city_id` INT(11) NULL,
  `ltd` POINT NULL,
  `lgd` POINT NULL,
  `status_id` INT(11) NOT NULL,
  `price_task` INT UNSIGNED  NULL,
  `deadline` DATE NULL,
  `user_id` INT(11) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `response` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `price_offer` INT UNSIGNED NULL,
  `comment` VARCHAR(250) NULL,
  `user_id` INT(11) NOT NULL,
  `task_id` INT(11) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `completing_task` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `status_completed_id` INT UNSIGNED NOT NULL,
  `comment_completing` VARCHAR(250) NULL,
  `stars` INT(5) NULL
) ENGINE=InnoDB;

CREATE TABLE `status_completed` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` CHAR(10) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `message` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(250) NOT NULL,
  `user_id` INT(11) NOT NULL
) ENGINE=InnoDB;
