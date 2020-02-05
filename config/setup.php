<?php
    include "database.php";

    try {
        $dbh = new PDO("mysql:host=$DB_DNS", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $dbh->exec("CREATE DATABASE IF NOT EXISTS `matcher` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;")
        or die(print_r($dbh->errorInfo(), true));
        $dbh->exec("CREATE TABLE IF NOT EXISTS `matcher`.`users`(
            `user_id` INT(255) NOT NULL AUTO_INCREMENT,
            `username` VARCHAR(255) NOT NULL,
            `first_name` varchar(255) NOT NULL,
            `last_name` varchar(255) NOT NULL,
            `passwd` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `joined` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `active` INT(255) NOT NULL DEFAULT '0',
            `ver_code` VARCHAR(255) NOT NULL,
            `notify` INT(255) NOT NULL DEFAULT '0',
            `profile` json DEFAULT NULL,
            PRIMARY KEY(`user_id`),
            UNIQUE `username`(`username`),
            UNIQUE `email`(`email`)
        )");
        $dbh->exec("CREATE TABLE IF NOT EXISTS `matcher`.`gallery`(
            `img_id` INT(255) NOT NULL AUTO_INCREMENT,
            `img_name` VARCHAR(255) NOT NULL,
            `user_id` INT(255) NOT NULL,
            `time_stamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(`img_id`)
        )");
        $dbh->exec("CREATE TABLE IF NOT EXISTS `matcher`.`likes`(
            `likie` INT NOT NULL,
            `likers_id` INT NOT NULL,
            `likie_status` INT NOT NULL
            `liker_status` INT NOT NULL
        )");
        $dbh->exec("ALTER TABLE
        `matcha`.`likes` ADD UNIQUE(`likie`, `likers_id`)");
        
        header('Location: ../index.php');
    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }

?>
