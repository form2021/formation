-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 fév. 2021 à 16:35
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog-poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `picture` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `content`, `created_at`, `picture`, `category`, `priority`) VALUES
(1, 'premier article', 'article1', 'le contenu du premier article', '2021-02-04 14:24:38', 'picture1.jpg', 'news', 1),
(2, 'deuxième article', 'article2', 'le contenu du deuxième article', '2021-02-04 14:26:00', 'picture2.jpg', 'news', 2),
(3, 'troisième article', 'article3', 'le contenu du troisième article', '2021-02-04 14:27:00', 'picture3.jpg', 'news', 3),
(4, 'La page crédits', 'credits', 'Le contenu de la page crédits. Merci à tout le monde.', '2021-02-08 14:28:05', 'picture3.jpg', 'page', 1),
(5, 'Les mentions légales', 'mentions-legales', 'JE NE SUIS RESPONSABLE DE RIEN...', '2021-02-08 14:31:56', 'picture4.jpg', 'page', 1),
(6, 'photo1', 'photo1', 'la description de ma photo1', '2021-02-08 14:47:40', 'photo1.jpg', 'galerie', 1),
(7, 'photo2', 'photo2', 'la description de ma photo2', '2021-02-08 14:47:40', 'photo2.jpg', 'galerie', 1),
(8, 'photo3', 'photo3', 'la description de ma photo3', '2021-02-08 14:47:40', 'photo3.jpg', 'galerie', 1),
(9, 'titre1539', 'slug1539', 'contenu1539', '0000-00-00 00:00:00', 'picture1539.jpg', 'cat1539', 1),
(10, 'titre1604', 'slug1604', 'contenu de 1604', '2021-02-08 16:05:26', 'picture1604.jpg', 'news', 1),
(11, 'titre1615', 'slug1615', 'contenu de 1615', '2021-02-08 16:16:20', 'picture1615.jpg', 'news', 1),
(12, 'html', 'html', 'structure de la page web.', '2021-02-09 14:22:46', 'picture1.jpg', 'competences', 1),
(13, 'css', 'css', 'mise en page et rendu visuel.', '2021-02-09 14:23:42', 'picture2.jpg', 'competences', 2),
(14, 'javascript', 'javascript', 'animation et interaction avec le visiteur.', '2021-02-09 14:28:29', 'picture3.jpg', 'competences', 3),
(15, 'onepage', 'onepage', 'mon cv sur une page.', '2021-02-09 14:43:45', 'photo1.jpg', 'projets', 1),
(16, 'blog en fonctionnel', 'blog-fonctionnel', 'un blog en code PHP+SQL avec des fonctions.', '2021-02-09 14:45:10', 'photo2.jpg', 'projets', 2),
(17, 'blog en POO', 'blog-poo', 'un autre blog en code PHP+SQL en MVC et POO.', '2021-02-09 14:46:03', 'photo3.jpg', 'projets', 3),
(18, 'accueil', 'menu-index', 'index.php', '2021-02-09 15:05:52', 'picture1.jpg', 'menu', 1),
(19, 'galerie', 'menu-galerie', 'galerie.php', '2021-02-09 15:06:52', 'picture1.jpg', 'menu', 2),
(20, 'blog', 'menu-blog', 'blog.php', '2021-02-09 15:07:14', 'picture1.jpg', 'menu', 3),
(21, 'contactez-nous', 'menu-contact', 'contact.php', '2021-02-09 15:07:34', 'picture1.jpg', 'menu', 4),
(22, 'test1521', 'slug1521', 'contenu1521', '2021-02-09 15:22:13', 'picture1521', 'test', 123),
(23, 'toto', 'kjfdhdsjk', 'titreA', '2021-02-09 15:23:36', 'fhjksd', 'test', 3),
(24, 'hack', 'kack', '', '2021-02-09 15:29:12', 'sfdjklhs', 'kjqdqhfkjq', 0),
(25, 'hack2', 'slug2', '<?php echo \"<h1>COUCOU TON SITE EST HACKE</h1>\"?>', '2021-02-09 15:31:42', 'jdkhfqsj', 'hdskjqfsk', 0),
(26, 'test1607', 'slug1607', 'contenu1607', '2021-02-09 16:07:39', 'picture1607', 'categorie1607', 1),
(27, 'test1626', 'slug1626', 'contenu 1627', '2021-02-09 16:27:14', '0c81b20e5621c7400f5ea8cc7380cdd7.jpg', 'galerie', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
