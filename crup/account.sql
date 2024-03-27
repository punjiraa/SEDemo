-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 07:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `programming_world`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(50) NOT NULL,
  `username_account` varchar(40) DEFAULT NULL,
  `email_account` varchar(40) DEFAULT NULL,
  `password_account` varchar(97) DEFAULT NULL,
  `salt_account` varchar(256) DEFAULT NULL,
  `role_account` varchar(6) DEFAULT NULL,
  `images_account` varchar(50) DEFAULT NULL,
  `login_count_account` int(1) NOT NULL,
  `lock_account` int(1) NOT NULL,
  `ban_account` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `username_account`, `email_account`, `password_account`, `salt_account`, `role_account`, `images_account`, `login_count_account`, `lock_account`, `ban_account`) VALUES
(1, 'admin', 'admin@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$WEZkZGVHZWNCc2FkQVZKMw$47mcuhtnPRWFxx7/Xp5kviKAmgJvjOEz9OvI8R3JEHw', 'd508348f74389c52ca05a4f404af411467e070ce8dad59b6c71d6ea294d5a347c19e4d2d1d016c94c8190d1d4125001d66f6779d9026d454cd5657df3122956810c349e1c56849e591e22b6ec54743cc28772f7ff4c3e0e3c904e757dc95576f7477416533ca79554445741e4c2262b97de82187aff99042c4', 'admin', 'default_images_account.jpg', 0, 0, '2024-03-24 13:25:59'),
(2, 'user', 'user@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Vk1jYURQL015aGpkbDhxcw$OsMbBxfQePtM2LxBYQ1zTLaz05mk6QdnkIkD7Nsfq4o', '2dc2ebac44cc20a842d35c18dd8c00a4f641c5453980712398de61d1899d241384380fa8e73b9d76f29c00e6f0972a0fdea3cf5c0fdfc350c8f9189ee10d2b6ff3ae993d042287cb8ffa223eb06de390c363305c4ddcff79382a078619709a0e583fedb0cc176440f8e5801c4ea5f161a4ef8d585d', 'member', 'default_images_account.jpg', 0, 0, '2024-03-24 02:00:57'),
(4, 'user1', 'user1@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZURCSktCZG9QU2tiS2FVOQ$wbS+eZxxRML7f3O90kkpYv9sAJXYk6+G/IcYJdkWOyg', 'f9f85680324b5fd0b9a359ddc31a45e781854899d57a370c265b89445b999af8804c78f9d78f19ca2927ee7f7f1373264db973725f005072b0218ee974fc06614e3b9690ab97f3f413967ae9232882356b678854f2f53dc5f5d1886a496e098a965b2cbb8f7820967c6d83cc4620459c20647de91abd7cda', 'member', 'default_images_account.jpg', 0, 0, '0000-00-00 00:00:00'),
(5, 'phanjira rueangkanna', 'sework67@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Lk5YNzRidzhUcGlxeFl5Zg$DCv6KKIqJeNS0oi8sZ4oe3MjKZ5lNF67tai8SoLMhvw', 'd903cd77604fe5d4f4adba872bd74ad05718803c82744df56edaa88b7d0ae93e060a19246edd91708a728296381f8b7dedd93d494e988c88945501b7d198458975a4060315fa47b6a44ccd382838ef26e22d164ab116fb12d103ec5cae1e328113', 'admin', 'default_images_account.jpg', 0, 0, '0000-00-00 00:00:00'),
(6, 'พรรณจิรา เรืองการนา', 'pppan@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UmZSQ2tnemJIMTJlTmhyNw$t4BhJI5GSreUCTImZ91pOzUKDZNcZN5W7ESUN0kn3II', '15854cb45c0d5ff0460263ca9060341d24226467bc53322a6a402ab98462eacbe1d8359a02a8d28ba6be7024845539ae1341c3f99afb990594b29942a051b1992b33c83cd687c1471e133550427bc26b49479ece2237dca3a46bf020d4deeeb0dbb7ddfa8c2e9d17ad069e', 'member', 'default_images_account.jpg', 0, 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
