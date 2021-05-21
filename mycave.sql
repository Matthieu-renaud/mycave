-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 21 mai 2021 à 06:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my_cave`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `enabled` tinyint(1) DEFAULT NULL,
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `year` int(4) NOT NULL,
  `grapes` varchar(50) CHARACTER SET utf8 NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 NOT NULL,
  `region` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`enabled`, `id`, `name`, `year`, `grapes`, `country`, `region`, `description`, `picture`, `date_creation`) VALUES
(1, 1, 'CHATEAU DE SAINT COSME', 2009, 'Grenache / Syrah', 'France', 'Southern Rhone / Gigondas', 'The aromas of fruit and spice give one a hint of the light drinkability of this lovely wine, which makes an excellent complement to fish dishes.', 'assets/img/bottles/picture.jpg', '2021-05-08 12:06:09'),
(1, 2, 'LAN RIOJA CRIANZA', 2006, 'Tempranillo', 'Spain', 'Rioja', 'A resurgence of interest in boutique vineyards has opened the door for this excellent foray into the dessert wine market. Light and bouncy, with a hint of black truffle, this wine will not fail to tickle the taste buds.', 'assets/img/bottles/saint_cosme.jpg', '2021-05-08 12:07:33'),
(1, 3, 'MARGERUM SYBARITE', 2010, 'Sauvignon Blanc', 'USA', 'California Central Cosat', 'The cache of a fine Cabernet in ones wine cellar can now be replaced with a childishly playful wine bubbling over with tempting tastes of\r\nblack cherry and licorice. This is a taste sure to transport you back in time.', 'assets/img/bottles/margerum.jpg', '2021-05-08 12:08:54'),
(1, 4, 'OWEN ROE \"EX UMBRIS\"', 2009, 'Syrah', 'USA', 'Washington', 'A one-two punch of black pepper and jalapeno will send your senses reeling, as the orange essence snaps you back to reality. Don\'t miss this award-winning taste sensation.', 'assets/img/bottles/ex_umbris.jpg', '2021-05-08 12:10:27'),
(1, 5, 'REX HILL', 2009, 'Pinot Noir', 'USA', 'Oregon', 'One cannot doubt that this will be the wine served at the Hollywood award shows, because it has undeniable star power. Be the first to catch\r\nthe debut that everyone will be talking about tomorrow.', 'assets/img/bottles/rex_hill.jpg', '2021-05-08 12:12:14'),
(1, 6, 'VITICCIO CLASSICO RISERVA', 2007, 'Sangiovese Merlot', 'Italy', 'Tuscany', 'Though soft and rounded in texture, the body of this wine is full and rich and oh-so-appealing. This delivery is even more impressive when one takes note of the tender tannins that leave the taste buds wholly satisfied.', 'assets/img/bottles/viticcio.jpg', '2021-05-08 12:13:08'),
(1, 7, 'CHATEAU LE DOYENNE', 2005, 'Merlot', 'France', 'Bordeaux', 'Though dense and chewy, this wine does not overpower with its finely balanced depth and structure. It is a truly luxurious experience for the senses.', 'assets/img/bottles/le_doyenne.jpg', '2021-05-08 12:14:16'),
(1, 8, 'DOMAINE DU BOUSCAT', 2009, 'Merlot', 'France', 'Bordeaux', 'The light golden color of this wine belies the bright flavor it holds. A true summer wine, it begs for a picnic lunch in a sun-soaked vineyard.', 'assets/img/bottles/bouscat.jpg', '2021-05-08 12:15:11'),
(1, 9, 'BLOCK NINE', 2009, 'Pinot Noir', 'USA', 'California', 'With hints of ginger and spice, this wine makes an excellent complement to light appetizer and dessert fare for a holiday gathering.', 'assets/img/bottles/block_nine.jpg', '2021-05-08 12:16:04'),
(1, 10, 'DOMAINE SERENE', 2007, 'Pinot Noir', 'USA', 'Oregon', 'Though subtle in its complexities, this wine is sure to please a wide range of enthusiasts. Notes of pomegranate will delight as the nutty finish completes the picture of a fine sipping experience.', 'assets/img/bottles/domaine_serene.jpg', '2021-05-08 12:16:46'),
(1, 11, 'BODEGA LURTON', 2011, 'Pinot Gris', 'Argentina', 'Mendoza', 'Solid notes of black currant blended with a light citrus make this wine an easy pour for varied palates.Solid notes of black currant blended with a light citrus make this wine an easy pour for varied palates.', 'assets/img/bottles/bodega_lurton.jpg', '2021-05-08 12:17:44'),
(1, 12, 'LES MORIZOTTES', 2009, 'Chardonnay', 'France', 'Burgundy', 'Breaking the mold of the classics, this offering will surprise and undoubtedly get tongues wagging with the hints of coffee and tobacco in\r\nperfect alignment with more traditional notes. Breaking the mold of the classics, this offering will surprise and\r\nundoubtedly get tongues wagging with the hints of coffee and tobacco in\r\nperfect alignment with more traditional notes. Sure to please the late-night crowd with the slight jolt of adrenaline it brings.', 'assets/img/bottles/morizottes.jpg', '2021-05-08 12:20:29');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `enabled`, `firstname`, `lastname`, `pseudo`, `email`, `mdp`, `admin`) VALUES
(1, 1, 'Joey', 'Van Stokeren', 'jovsn98', 'vanstokerenjoey@gmail.com', 'Bonjour', NULL),
(2, 1, 'Bob', 'Bob', 'NigloChoukar', 'bob@bob.fr', '$2y$10$HTXZRmaureydQRKXXnGSGejDxuBdoa5IJLi/vVx09ITYHfE1THeSO', NULL),
(3, 1, 'aze', 'aze', 'aze', 'aze@gmail.com', '$2y$10$jFe77IF7Q31lHD854BYRgeDNTtxmR/4ykPEFpCyIiIDH/qEH/UqWa', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
