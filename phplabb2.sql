SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Databas: `phplabb2`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `bid`
--

DROP TABLE IF EXISTS `bid`;
CREATE TABLE IF NOT EXISTS `bid` (
  `bidAmount` int(11) DEFAULT NULL,
  `bidId` int(11) NOT NULL AUTO_INCREMENT,
  `bidProductPId` int(11) DEFAULT NULL,
  `bidProductUId` int(11) DEFAULT NULL,
  PRIMARY KEY (`bidId`),
  KEY `bidProductPId` (`bidProductPId`),
  KEY `bidProductUId` (`bidProductUId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `bid`
--

INSERT INTO `bid` (`bidAmount`, `bidId`, `bidProductPId`, `bidProductUId`) VALUES
(5000, 16, 32, 3),
(3000, 14, 32, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(30) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'Instruments'),
(5, 'Miscellaneous'),
(3, 'vehicles'),
(4, 'Guns'),
(7, 'Watches');

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `askingPrice` int(20) NOT NULL,
  `productDescription` varchar(10000) NOT NULL,
  `productUserId` int(11) DEFAULT NULL,
  `productCatId` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `pictureUrl` varchar(500) NOT NULL,
  PRIMARY KEY (`productId`),
  KEY `productUserId` (`productUserId`),
  KEY `productCatId` (`productCatId`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`productId`, `productName`, `askingPrice`, `productDescription`, `productUserId`, `productCatId`, `created_at`, `pictureUrl`) VALUES
(32, '2007 Fender Custom Shop 1960 Stratocaster NOS', 2956, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, 1, '2019-05-17 09:29:58', 'http://www.rollysguitars.co.uk/wp-content/uploads/2007-Fender-Custom-Shop-1960-Stratocaster-NOS-01.jpg'),
(27, 'Gibson Les Paul 1959', 16920, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, '2019-05-16 10:06:40', 'https://images.reverb.com/image/upload/s--rXfhM5tQ--/f_auto,t_supersize/v1535994079/tnjhifqexmyyhkzujrl3.jpg'),
(33, '1965 FORD MUSTANG SHELBY ', 34000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, 3, '2019-05-17 09:35:49', 'https://i.pinimg.com/originals/25/f3/31/25f3316ceb0b36b0ab081709eb9c0c4b.jpg'),
(34, 'Springfield Armory M1 Garand 30-06 24&quot; Proto-type', 3495, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, 4, '2019-05-17 09:39:21', 'https://www.fernwoodarmory.com/assets/images/20181217AN.jpg'),
(35, 'Rolex - Daytona - 16523 seriale A ', 1700, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, 7, '2019-05-17 09:44:29', 'https://usatsneakhype.files.wordpress.com/2018/07/paul-newman-rolex-daytona-2.jpg'),
(37, 'Winter Snow River Painting 1958', 764, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 5, '2019-05-17 10:11:20', 'https://images.wallpaperscraft.com/image/landscape_painting_art_winter_snow_river_48071_1600x900.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 'andre', 'andre@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-05-10 09:12:04'),
(3, 'kalle', 'kallela@live.com', 'c16e24898200c27d89cd30e9abd51984', '2019-05-16 08:32:53'),
(4, 'thomas', 'thomas@gmail.com', 'ef6e65efc188e7dffd7335b646a85a21', '2019-05-17 07:37:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
