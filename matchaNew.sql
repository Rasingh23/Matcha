-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2020 at 10:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matcha`
--
CREATE DATABASE IF NOT EXISTS `matcha` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `matcha`;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `img_id` int(255) NOT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(255) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`img_id`, `img_name`, `user_id`, `time_stamp`) VALUES
(8, 'images/gallery/Black_Cupid_oboimira_ru_201103162231484640.jpg_0.jpeg', 10, '2019-01-11 06:42:16'),
(9, 'images/gallery/Black_Cupid_e22a4d9416fc3c46188751a651ada965.jpg_1.jpeg', 10, '2019-01-11 06:42:37'),
(18, 'images/gallery/Black_Cupid_soufiane-idrassi-sss.jpg_4.jpeg', 10, '2019-01-17 06:24:02'),
(47, 'https://vignette.wikia.nocookie.net/markiplier/images/0/0a/BrunetteAmyNelson.jpg/revision/latest/scale-to-width-down/340?cb=20180126225752', 17, '2019-01-30 07:23:02'),
(48, 'https://pbs.twimg.com/profile_images/543749134076088320/_5IGZSJ2.jpeg', 19, '2019-01-30 07:23:02'),
(49, 'https://pbs.twimg.com/profile_images/575446987408982019/9M56UceZ_400x400.jpeg', 20, '2019-01-30 07:23:02'),
(50, 'https://cdn.tobi.com/product_images/lg/1/black-carol-cat-collar-bodysuit.jpg', 21, '2019-01-30 07:23:02'),
(51, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQy8J7Goz7J1C9NWD97M8ldp8gdkQo8krZ6Sn-7EJ0AiqovMB91', 22, '2019-01-30 07:23:02'),
(52, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_RMkP8CDiRR_ZRlifwHKAnEzSXSs_V3_3Hd6k346529pv13xmTg', 23, '2019-01-30 07:23:02'),
(53, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpQnrd1QNordX09u5rChr5RAuog0_n5Zc8BxRkuZ64NyL325Ti&s', 25, '2019-01-30 07:23:02'),
(54, 'http://www.babynameshub.com/upload/user_photos/Shelby-female-20160326-000542714.jpg', 26, '2019-01-30 07:23:02'),
(55, 'https://i0.wp.com/www.teleblog.it/wp-content/uploads/2017/03/camilla-mangiapelo.jpg?resize=620%2C400&ssl=1', 27, '2019-01-30 07:23:02'),
(56, 'https://tinathemusical.com/content/uploads/2017/11/Adreinne-Warren-Approved-Image-600x600.jpeg', 28, '2019-01-30 07:23:02'),
(57, 'https://assets2.hrc.org/files/images/blog/KarlaPatriciaFloresPavon-1600x900.jpg', 29, '2019-01-30 07:23:02'),
(58, 'https://pbs.twimg.com/media/BzeF125IAAIDZG-.jpg', 30, '2019-01-30 07:23:02'),
(59, 'https://s3.amazonaws.com/giveffect-assets/system/photos/users/small/27245x72c2b2a8e71e1e8a4a7b21a2394a1efae22d9f40.jpg', 31, '2019-01-30 07:23:02'),
(60, 'https://yt3.ggpht.com/a-/AAuE7mCqNsRrh7FHP0sDd6vqzX6kh0bQ1hoYiyGCLw=s900-mo-c-c0xffffffff-rj-k-no', 32, '2019-01-30 07:23:02'),
(61, 'https://pbs.twimg.com/profile_images/741922249255575552/sRldcO3g_400x400.jpg', 33, '2019-01-30 07:23:02'),
(62, 'https://pbs.twimg.com/profile_images/905702521728937984/rzoNtLDy_400x400.jpg', 18, '2019-01-30 07:23:02'),
(63, 'https://m.media-amazon.com/images/M/MV5BYmI5YWZhM2YtOTJlYy00NjBmLTliZTItYzUzNmJlODBkMzVmXkEyXkFqcGdeQXVyNTI5NjIyMw@@._V1_UY317_CR20,0,214,317_AL_.jpg', 24, '2019-01-30 07:23:02'),
(64, 'https://i.dailymail.co.uk/i/pix/2015/05/01/22/2834A4C600000578-0-image-m-64_1430515905072.jpg', 34, '2019-01-30 07:23:02'),
(65, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNb1J4iSJVzt__CyMUpmYEGP5S_vGf5OqztePLxbwrG9ZsiGE2OA', 35, '2019-01-30 07:23:02'),
(66, 'https://s.hdnux.com/photos/72/20/65/15273324/3/920x920.jpg', 36, '2019-01-30 07:23:02'),
(67, 'https://cdn.newsapi.com.au/image/v1/575f468bd1ba0718afbac35f62f21f8e?width=650', 37, '2019-01-30 07:23:02'),
(68, 'https://static1.squarespace.com/static/534346f2e4b01edccd7213e3/t/546ec5e4e4b0cb681e1d6871/1416545765510/About-Josh.jpg', 38, '2019-01-30 07:23:02'),
(69, 'https://www.michael-patrick-kelly.com/img/MPK_by_Andreas_H_Bitesnich_4.jpg', 39, '2019-01-30 07:23:02'),
(70, 'http://wavenewspapers.com/wp-content/uploads/2017/02/Simply-Jessica-01.jpg', 40, '2019-01-30 07:23:02'),
(71, 'https://pixel.nymag.com/imgs/daily/vulture/2014/09/05/magazine/05-michael-egan.w330.h412.jpg', 41, '2019-01-30 07:23:02'),
(72, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnM8bT-vZLLxxG-lb9c6XcqP9LJ_2Ffqd4PKR-CP-CM3Q8hHLDbA', 42, '2019-01-30 07:23:02'),
(73, 'https://i.pinimg.com/280x280_RS/a2/e8/8f/a2e88fce83ef753322443ecab3880c11.jpg', 43, '2019-01-30 07:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `liker_id` int(11) NOT NULL,
  `likee_id` int(11) NOT NULL,
  `liker_stat` int(11) NOT NULL DEFAULT 0,
  `likee_stat` int(11) NOT NULL DEFAULT 0,
  `chat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `liker_id`, `likee_id`, `liker_stat`, `likee_stat`, `chat`) VALUES
(1, 10, 17, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `notif_hist`
--

CREATE TABLE `notif_hist` (
  `id` int(11) NOT NULL,
  `usersid` int(11) NOT NULL,
  `notification` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif_hist`
--

INSERT INTO `notif_hist` (`id`, `usersid`, `notification`) VALUES
(1, 10, 'Amy liked your profile'),
(2, 10, 'Amy unliked your profile'),
(3, 17, 'Black_Cupid viewed your page'),
(4, 17, 'Black_Cupid liked your profile'),
(5, 17, 'Black_Cupid unliked your profile'),
(6, 21, 'Black_Cupid viewed your page'),
(7, 33, 'Black_Cupid viewed your page'),
(8, 18, 'Black_Cupid viewed your page');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(255) NOT NULL DEFAULT 0,
  `ver_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notify` int(255) NOT NULL DEFAULT 0,
  `profile` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `views` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `blocked` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `passwd`, `email`, `joined`, `active`, `ver_code`, `notify`, `profile`, `views`, `blocked`) VALUES
(10, 'Black_Cupid', 'Marcelle', 'Bond', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'marcelle@mailinator.com', '2019-01-10 16:19:51', 1, '', 2, '{\"DOB\":\"1997-09-11\",\"bio\":\"young and reckless \",\"fame\":146,\"gender\":\"Male\",\"interest\":{\"ART\":\"ART\",\"PHOTOGRAPHY\":\"PHOTOGRAPHY\",\"GETING STONED\":\"GETING STONED\",\"CODING\":\"CODING\",\"FRIENDS\":\"FRIENDS\"},\"location\":\"Johannesburg\",\"last_login\":\"online\",\"preference\":\"Female\",\"dp\":\"http:\\/\\/localhost\\/matcher\\/images\\/gallery\\/Black_Cupid_e22a4d9416fc3c46188751a651ada965.jpg_1.jpeg\",\"notifications\":[\"Amy viewed your page\",\"Amy liked your profile\",\"Amy unliked your profile\"],\"age\":22}', '[\"Black_Cupid\", \"Amy\"]', '{\"blockee\":[\"Tyler\"],\"blocker\":[]}'),
(17, 'Amy', 'Amy', 'Willson', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'amy@mailinator.com', '2019-01-29 10:30:52', 1, '', 0, '{\"dp\":\"https:\\/\\/vignette.wikia.nocookie.net\\/markiplier\\/images\\/0\\/0a\\/BrunetteAmyNelson.jpg\\/revision\\/latest\\/scale-to-width-down\\/340?cb=20180126225752\",\"DOB\":\"1997-09-11\",\"bio\":\"young and reckless SHOW ME SOMETHING\",\"fame\":20,\"gender\":\"Female\",\"interest\":{\"ART\":\"ART\",\"FOOD\":\"FOOD\",\"CODING\":\"CODING\",\"GAMING\":\"GAMING\",\"SPORTS\":\"SPORTS\",\"DANCING\":\"DANCING\",\"FRIENDS\":\"FRIENDS\",\"READING\":\"READING\",\"PHOTOGRAPHY\":\"PHOTOGRAPHY\",\"GETING STONED\":\"GETING STONED\"},\"location\":\"Johannesburg\",\"last_login\":\"2nd of January 03:10 PM\",\"preference\":\"Male\",\"notifications\":[\"Amy viewed you page\",\"Black_Cupid viewed you page\",\"Black_Cupid viewed your page\",\"Black_Cupid liked your profile\",\"Black_Cupid unliked your profile\"],\"age\":22}', '[\"Amy\", \"Black_Cupid\"]', '{\"blockee\": [], \"blocker\": []}'),
(18, 'Tyler', 'Tyler', 'Fisher', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'tylerfisher@mailinator.com', '2019-01-29 10:32:38', 1, '', 0, '{\"dp\":\"https:\\/\\/pbs.twimg.com\\/profile_images\\/905702521728937984\\/rzoNtLDy_400x400.jpg\",\"DOB\":\"1997-09-11\",\"fame\":26,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"notifications\":[\"Amy viewed you page\",\"Black_Cupid viewed you page\",\"Black_Cupid viewed your page\"],\"age\":22}', '[\"Amy\", \"Black_Cupid\"]', '{\"blockee\":[],\"blocker\":[\"Black_Cupid\"]}'),
(19, 'Jessy', 'Jessy', 'Anderson', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'jessy@mailinator.com', '2019-01-29 10:38:22', 1, '', 0, '{\"dp\":\"https:\\/\\/pbs.twimg.com\\/profile_images\\/543749134076088320\\/_5IGZSJ2.jpeg\",\"DOB\":\"1997-09-11\",\"fame\":6,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"notifications\":[\"Black_Cupid viewed your page\"],\"age\":22}', '[\"Black_Cupid\"]', '{\"blockee\": [], \"blocker\": []}'),
(20, 'Priellost', 'Aimee', 'Bunce', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Aimee@mailinator.com', '2019-01-29 10:42:45', 1, '', 0, '{\"dp\":\"https:\\/\\/pbs.twimg.com\\/profile_images\\/575446987408982019\\/9M56UceZ_400x400.jpeg\",\"DOB\":\"1972-11-13\",\"fame\":0,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":47}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(21, 'Hictle1969', 'Carol', 'Despres', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Carol@mailinator.com', '2019-01-29 10:45:03', 1, '', 0, '{\"dp\":\"https:\\/\\/cdn.tobi.com\\/product_images\\/lg\\/1\\/black-carol-cat-collar-bodysuit.jpg\",\"DOB\":\"1968-01-27\",\"fame\":4,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"notifications\":[\"Amy viewed you page\",\"Black_Cupid viewed your page\"],\"age\":51}', '[\"Amy\",\"Black_Cupid\"]', '{\"blockee\": [], \"blocker\": []}'),
(22, 'Doperis', 'Melanie', 'Waters', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Melanie@mailinator.com', '2019-01-29 10:47:10', 1, '', 0, '{\"dp\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcQy8J7Goz7J1C9NWD97M8ldp8gdkQo8krZ6Sn-7EJ0AiqovMB91\",\"DOB\":\"1972-08-03\",\"fame\":0,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":47}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(23, 'Scoged', 'Tara', 'Jordan', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Tara@mailinator.com', '2019-01-29 10:49:06', 1, '', 0, '{\"dp\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcR_RMkP8CDiRR_ZRlifwHKAnEzSXSs_V3_3Hd6k346529pv13xmTg\",\"DOB\":\"1949-03-06\",\"fame\":0,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":70}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(24, 'Whinarand', 'Ronnie', 'McBride', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Ronnie@mailinator.com', '2019-01-29 10:50:24', 1, '', 0, '{\"dp\":\"https:\\/\\/m.media-amazon.com\\/images\\/M\\/MV5BYmI5YWZhM2YtOTJlYy00NjBmLTliZTItYzUzNmJlODBkMzVmXkEyXkFqcGdeQXVyNTI5NjIyMw@@._V1_UY317_CR20,0,214,317_AL_.jpg\",\"DOB\":\"1988-11-27\",\"fame\":2,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"notifications\":[\"Black_Cupid viewed you page\"],\"age\":31}', '[\"Black_Cupid\"]', '{\"blockee\": [], \"blocker\": []}'),
(25, 'Pubjessity', 'Mary', 'Goldman', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Mary@mailinator.com', '2019-01-29 10:53:16', 1, '', 0, '{\"dp\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcTpQnrd1QNordX09u5rChr5RAuog0_n5Zc8BxRkuZ64NyL325Ti&s\",\"DOB\":\"1997-08-06\",\"fame\":0,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":22}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(26, 'Refort', 'Shelby', 'Becerra', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Shelby@mailinator.com', '2019-01-29 10:54:23', 1, '', 0, '{\"dp\":\"http:\\/\\/www.babynameshub.com\\/upload\\/user_photos\\/Shelby-female-20160326-000542714.jpg\",\"DOB\":\"1997-03-11\",\"fame\":0,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":22}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(27, 'Cothy1998', 'Beatrice', 'Johnson', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Beatrice@mailinator.com', '2019-01-29 10:56:39', 1, '', 0, '{\"dp\":\"https:\\/\\/i0.wp.com\\/www.teleblog.it\\/wp-content\\/uploads\\/2017\\/03\\/camilla-mangiapelo.jpg?resize=620%2C400&ssl=1\",\"DOB\":\"1998-02-27\",\"fame\":0,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":21}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(28, 'Rofeend', 'Adrienne', 'Dixon', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Adrienne@mailinator.com', '2019-01-29 10:58:55', 1, '', 0, '{\"dp\":\"https:\\/\\/tinathemusical.com\\/content\\/uploads\\/2017\\/11\\/Adreinne-Warren-Approved-Image-600x600.jpeg\",\"DOB\":\"1981-06-17\",\"fame\":0,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":38}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(29, 'Wifurrive', 'Patricia', 'Smart', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Patricia@mailinator.com', '2019-01-29 11:01:00', 1, '', 0, '{\"dp\":\"https:\\/\\/assets2.hrc.org\\/files\\/images\\/blog\\/KarlaPatriciaFloresPavon-1600x900.jpg\",\"DOB\":\"1964-09-13\",\"fame\":2,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"notifications\":[\"Black_Cupid viewed you page\"],\"age\":55}', '[\"Black_Cupid\"]', '{\"blockee\": [], \"blocker\": []}'),
(30, 'Marrined1992', 'Helen', 'Harper', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Helen@mailinator.com', '2019-01-29 11:04:32', 1, '', 0, '{\"dp\":\"https:\\/\\/pbs.twimg.com\\/media\\/BzeF125IAAIDZG-.jpg\",\"DOB\":\"1992-09-26\",\"fame\":2,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"notifications\":[\"Amy viewed you page\"],\"age\":27}', '[\"Amy\"]', '{\"blockee\": [], \"blocker\": []}'),
(31, 'Junted', 'Mattie', 'Andre', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Mattie@mailinator.com', '2019-01-29 11:06:24', 1, '', 0, '{\"dp\":\"https:\\/\\/s3.amazonaws.com\\/giveffect-assets\\/system\\/photos\\/users\\/small\\/27245x72c2b2a8e71e1e8a4a7b21a2394a1efae22d9f40.jpg\",\"DOB\":\"1984-06-05\",\"fame\":0,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":35}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(32, 'Exproul', 'Sarah', 'Pierce', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Sarah@mailinator.com', '2019-01-29 11:07:54', 1, '', 0, '{\"dp\":\"https:\\/\\/yt3.ggpht.com\\/a-\\/AAuE7mCqNsRrh7FHP0sDd6vqzX6kh0bQ1hoYiyGCLw=s900-mo-c-c0xffffffff-rj-k-no\",\"DOB\":\"1989-06-10\",\"fame\":0,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":30}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(33, 'Handrey', 'Margery', 'Neil', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Margery@mailinator.com', '2019-01-29 11:09:04', 1, '', 0, '{\"dp\":\"https:\\/\\/pbs.twimg.com\\/profile_images\\/741922249255575552\\/sRldcO3g_400x400.jpg\",\"DOB\":\"1998-01-12\",\"fame\":4,\"gender\":\"Female\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"notifications\":[\"Black_Cupid viewed you page\",\"Black_Cupid viewed your page\"],\"age\":21}', '[\"Black_Cupid\"]', '{\"blockee\": [], \"blocker\": []}'),
(34, 'Nelf1991', 'Jose', 'Garza', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Jose@mailinator.com', '2019-01-29 11:11:25', 1, '', 0, '{\"dp\":\"https:\\/\\/i.dailymail.co.uk\\/i\\/pix\\/2015\\/05\\/01\\/22\\/2834A4C600000578-0-image-m-64_1430515905072.jpg\",\"DOB\":\"1991-11-16\",\"fame\":0,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":28}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(35, 'Swervage', 'Charles', 'Allen', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Charles@mailinator.com', '2019-01-29 11:33:29', 1, '', 0, '{\"dp\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcTNb1J4iSJVzt__CyMUpmYEGP5S_vGf5OqztePLxbwrG9ZsiGE2OA\",\"DOB\":\"1991-04-26\",\"fame\":0,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":28}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(36, 'Antoomp', 'Ronald', 'Steinmetz', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Ronald@mailinator.com', '2019-01-29 13:20:52', 1, '', 0, '{\"dp\":\"https:\\/\\/s.hdnux.com\\/photos\\/72\\/20\\/65\\/15273324\\/3\\/920x920.jpg\",\"DOB\":\"1993-03-23\",\"fame\":0,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":26}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(37, 'Spokis', 'Jason', 'Larue', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Jason@mailinator.com', '2019-01-29 13:38:02', 1, '', 0, '{\"dp\":\"https:\\/\\/cdn.newsapi.com.au\\/image\\/v1\\/575f468bd1ba0718afbac35f62f21f8e?width=650\",\"DOB\":\"1997-09-24\",\"fame\":0,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":22}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(38, 'Vaggrosen92', 'Joshua', 'Heaton', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Joshua@mailinator.com', '2019-01-29 13:39:29', 1, '', 0, '{\"dp\":\"https:\\/\\/static1.squarespace.com\\/static\\/534346f2e4b01edccd7213e3\\/t\\/546ec5e4e4b0cb681e1d6871\\/1416545765510\\/About-Josh.jpg\",\"DOB\":\"1992-11-25\",\"fame\":0,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":27}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(39, 'Praces', 'Patrick', 'Stevens', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Patrick@mailinator.com', '2019-01-29 13:40:54', 1, '', 0, '{\"dp\":\"https:\\/\\/www.michael-patrick-kelly.com\\/img\\/MPK_by_Andreas_H_Bitesnich_4.jpg\",\"DOB\":\"1992-01-26\",\"fame\":0,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":27}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(40, 'Camle1983', 'Ralph', 'Forest', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Ralph@mailinator.com', '2019-01-29 13:42:55', 1, '', 0, '{\"dp\":\"http:\\/\\/wavenewspapers.com\\/wp-content\\/uploads\\/2017\\/02\\/Simply-Jessica-01.jpg\",\"DOB\":\"1983-12-23\",\"fame\":0,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":36}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(41, 'Alar1985', 'Michael', 'Stowe', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Michael@mailinator.com', '2019-01-29 13:44:05', 1, '', 0, '{\"dp\":\"https:\\/\\/pixel.nymag.com\\/imgs\\/daily\\/vulture\\/2014\\/09\\/05\\/magazine\\/05-michael-egan.w330.h412.jpg\",\"DOB\":\"1985-08-10\",\"fame\":0,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":34}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(42, 'Billostrand', 'Nicholas', 'Summers', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Nicholas@mailinator.com', '2019-01-29 13:47:08', 1, '', 0, '{\"dp\":\"https:\\/\\/encrypted-tbn0.gstatic.com\\/images?q=tbn:ANd9GcRnM8bT-vZLLxxG-lb9c6XcqP9LJ_2Ffqd4PKR-CP-CM3Q8hHLDbA\",\"DOB\":\"1952-08-24\",\"fame\":0,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"age\":67}', NULL, '{\"blockee\": [], \"blocker\": []}'),
(43, 'Ustenexce', 'Wilford', 'Estey', '3de1244694191a92f1b0a516df476cb6df269aa1b9047643fdd671dde008a80433ab9aa5d6b7cdd940fd7535c51b8fb0c53c60c320a65a2c7fa08514008d00f9', 'Wilford@mailinator.com', '2019-01-29 13:52:06', 1, '', 0, '{\"dp\":\"https:\\/\\/i.pinimg.com\\/280x280_RS\\/a2\\/e8\\/8f\\/a2e88fce83ef753322443ecab3880c11.jpg\",\"DOB\":\"1952-06-12\",\"fame\":2,\"gender\":\"Male\",\"location\":\"Johannesburg\",\"last_login\":\"not active\",\"preference\":\"BI-SEXUAL\",\"notifications\":[\"Black_Cupid viewed your page\"],\"age\":67}', '[\"Black_Cupid\"]', '{\"blockee\": [], \"blocker\": []}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_hist`
--
ALTER TABLE `notif_hist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `img_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notif_hist`
--
ALTER TABLE `notif_hist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
