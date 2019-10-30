<?php

include "database.php";

try {
$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec("CREATE DATABASE IF NOT EXISTS `matcha` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;")
or die(print_r($dbh->errorInfo(), true));
$dbh->query("use matcha");
$dbh->exec("CREATE TABLE `gallery` (
    `imgID` int(11) NOT NULL,
    `user_ID` int(11) NOT NULL,
    `img` varchar(255) NOT NULL
  )");

$dbh->exec("CREATE TABLE `likes` (
    `liker_id` int(11) NOT NULL,
    `likee_id` int(11) NOT NULL,
    `liker_stat` int(11) NOT NULL,
    `likee_stat` int(11) NOT NULL,
    `chat` json NOT NULL
  ) ");

$dbh->exec("CREATE TABLE `users` (
    `userID` int(11) NOT NULL,
    `first` varchar(255) NOT NULL,
    `surname` varchar(255) NOT NULL,
    `User` varchar(50) NOT NULL,
    `Pass` varchar(255) NOT NULL,
    `E-mail` varchar(255) NOT NULL,
    `Active` tinyint(1) NOT NULL,
    `Token` varchar(10) NOT NULL,
    `notify` json DEFAULT NULL,
    `info` json DEFAULT NULL,
    `online` varchar(255) NOT NULL,
    `views` json DEFAULT NULL,
    `blocklist` json DEFAULT NULL
  )");

$dbh->exec("INSERT INTO `gallery` (`imgID`, `user_ID`, `img`) VALUES
(17, 18, 'img/gallery/Slightly_Smiling_Face_Emoji.png'),
(18, 18, 'img/gallery/18_poo.png'),
(19, 18, 'img/gallery/18_Slightly_Smiling_Face_Emoji.png'),
(30, 5, 'img/gallery/5_download.jpeg')");

$dbh->exec("INSERT INTO `likes` (`liker_id`, `likee_id`, `liker_stat`, `likee_stat`, `chat`) VALUES
(5, 10, 1, 1, '{}'),
(5, 11, 1, 1, '{}'),
(9, 5, 1, 1, '{}'),
(12, 5, 1, 1, '{}'),
(15, 20, 1, 1, '{}'),
(20, 5, 1, 1, '{}'),
(20, 9, 0, 0, '{}'),
(20, 16, 0, 0, '{}')");

$dbh->exec("INSERT INTO `users` (`userID`, `first`, `surname`, `User`, `Pass`, `E-mail`, `Active`, `Token`, `notify`, `info`, `online`, `views`) VALUES
(5, 'rahul1', 'singh1', 'norarsdin1', '$2y$10$4OkqOA1al2FHD50ZP3D42uKyyNx3oKgbOh79JJ3J91Xo/qZFoXDKS', 'efewfewfe', 1, '', '{\"LkE\": \"rasingh liked your profile back.\", \"iWj\": \"rasingh viewed your profile.\", \"lbr\": \"rasingh viewed your profile.\"}', '{\"dp\": \"poo.png\", \"age\": \"23\", \"bio\": \"123\", \"pref\": \"bi\", \"tags\": [\"running\", \"Music\"], \"gender\": \"female\", \"rating\": \"23\", \"location\": 100}', '08:17:28', '{\"BQq\": \"rasingh\", \"HEd\": \"rasingh\", \"HyP\": \"rasingh\", \"IGB\": \"rasingh\", \"KdS\": \"rasingh\", \"Njv\": \"rasingh\", \"OkG\": \"rasingh\", \"RPN\": \"rasingh\", \"StH\": \"rasingh\", \"VHG\": \"rasingh\", \"Vac\": \"rasingh\", \"WSy\": \"rasingh\", \"XIJ\": \"rasingh\", \"XqZ\": \"rasingh\", \"eyY\": \"rasingh\", \"grt\": \"rasingh\", \"iWf\": \"rasingh\", \"lOC\": \"rasingh\", \"oIz\": \"rasingh\", \"skO\": \"rasingh\", \"uhW\": \"rasingh\", \"xXL\": \"rasingh\", \"zLB\": \"rasingh\"}'),
(9, '', '', 'Ahul', '$2y$10$4OkqOA1al2FHD50ZP3D42uKyyNx3oKgbOh79JJ3J91Xo/qZFoXDKS', 'rahulsingh5238@gmail.comfgh', 1, '', '{\"QwA\": \"rasingh viewed your profile.\"}', '{\"dp\": \"poo.png\", \"age\": \"27\", \"bio\": \"123\", \"pref\": \"male\", \"tags\": [\"running\", \"Music\"], \"gender\": \"female\", \"rating\": \"12\"}', '17:53:11', '{\"QCp\": \"rasingh\", \"QkR\": \"rasingh\", \"QoZ\": \"rasingh\", \"RMp\": \"rasingh\", \"StP\": \"rasingh\", \"TBx\": \"rasingh\", \"VzY\": \"rasingh\", \"fEU\": \"rasingh\", \"nvV\": \"rasingh\", \"yek\": \"rasingh\"}'),
(10, '', '', 'Bhul', '$2y$10\$FrI0fO1xs2ao71dEMN3Mlu0uHhxu8ENgcuz5fSUf3lP6P2ir5qPgC', 'rahulsingh5238@gmail.comfgh', 1, '', '{}', '{\"dp\": \"poo.png\", \"age\": \"23\", \"bio\": \"123\", \"pref\": \"gay\", \"tags\": [\"running\", \"Music\"], \"gender\": \"female\"}', '0', '{}'),
(11, '', '', 'Chulsdg', '$2y$10\$FrI0fO1xs2ao71dEMN3Mlu0uHhxu8ENgcuz5fSUf3lP6P2ir5qPgC', 'rahulsingh5238@gmail.comfgh', 1, '', '{}', '{\"dp\": \"poo.png\", \"age\": \"26\", \"bio\": \"123\", \"pref\": \"straight\", \"tags\": [\"running\", \"Music\"], \"gender\": \"female\", \"rating\": \"65\"}', '0', '{}'),
(12, '', '', 'AAAhul', '$2y$10\$FrI0fO1xs2ao71dEMN3Mlu0uHhxu8ENgcuz5fSUf3lP6P2ir5qPgC', 'rahulsingh5238@gmail.comfgh', 1, '', '{\"CNB\": \"rasingh viewed your profile.\", \"syU\": \"rasingh viewed your profile.\"}', '{\"dp\": \"poo.png\", \"age\": \"23\", \"bio\": \"123\", \"pref\": \"gay\", \"tags\": [\"running\", \"Music\"], \"gender\": \"female\"}', '0', '{\"WKM\": \"rasingh\", \"lkw\": \"rasingh\"}'),
(13, '', '', 'Abhul', '$2y$10\$FrI0fO1xs2ao71dEMN3Mlu0uHhxu8ENgcuz5fSUf3lP6P2ir5qPgC', 'rahulsingh5238@gmail.comfgh', 1, '', '{}', '{\"dp\": \"poo.png\", \"age\": \"23\", \"bio\": \"123\", \"pref\": \"gay\", \"tags\": [\"golf\", \"swimming\"], \"gender\": \"male\"}', '0', '{}'),
(15, 'rahul', 'singh', 'norarsdin', '$2y$10$4OkqOA1al2FHD50ZP3D42uKyyNx3oKgbOh79JJ3J91Xo/qZFoXDKS', 'ffefesf', 1, '', '{\"krV\": \"rasingh sent you a message.\"}', '{\"dp\": \"poo.png\", \"age\": \"19\", \"bio\": \"123\", \"pref\": \"bi\", \"tags\": [\"running\", \"Music\"], \"gender\": \"female\", \"rating\": \"1\"}', '0', '{}'),
(16, '', '', 'rahul', '$2y$10$4OkqOA1al2FHD50ZP3D42uKyyNx3oKgbOh79JJ3J91Xo/qZFoXDKS', 'rahulsingh5238@gmail.comddfd', 1, '', '{\"ZMX\": \"rasingh viewed your profile.\", \"dOa\": \"rasingh\"}', '{\"dp\": \"18_Slightly_Smiling_Face_Emoji.png\", \"age\": \"46\", \"bio\": \"Send bobs\", \"pref\": \"straight\", \"tags\": [\"Gorls\", \"Weemen\"], \"gender\": \"male\"}', '0', '{\"dOa\": \"rasingh\", \"vZT\": \"rasingh\"}'),
(20, 'Rahul', 'Singh', 'rasingh', '$2y$10$4OkqOA1al2FHD50ZP3D42uKyyNx3oKgbOh79JJ3J91Xo/qZFoXDKS', 'rahulsingh5238@gmail.com', 1, '', '{}', '{\"dp\": \"poo.png\", \"age\": \"23\", \"bio\": \"123\", \"pref\": \"straight\", \"tags\": [\"golf\", \"swimming\"], \"gender\": \"male\", \"location\": \"Paris, France\"}', '1', '{\"DQI\": \"rasingh\", \"Drz\": \"rasingh\", \"iPW\": \"rasingh\", \"jdN\": \"rasingh\", \"xtQ\": \"rasingh\"}')");

$dbh->exec("ALTER TABLE `gallery`
ADD PRIMARY KEY (`imgID`)");

$dbh->exec("ALTER TABLE `likes`
ADD UNIQUE KEY `liker_id` (`liker_id`,`likee_id`)");

$dbh->exec("ALTER TABLE `users`
ADD PRIMARY KEY (`userID`)");

$dbh->exec("ALTER TABLE `gallery`
MODIFY `imgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31");

$dbh->exec("ALTER TABLE `users`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT");

header('Location: ../index.php');
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}