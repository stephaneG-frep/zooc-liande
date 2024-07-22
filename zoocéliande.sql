-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 22 juil. 2024 à 06:38
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zoocéliande`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int(11) NOT NULL,
  `race` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `espece` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `race`, `name`, `age`, `description`, `espece`, `image`, `image_id`) VALUES
(1, 'Lion', 'Léon', '33', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', ' Félidés:(Panthera leo) ', 'lion.jpg', 4),
(2, 'Perroquet', 'Coco', '12', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'cocos.jpg', NULL),
(3, 'Girafe', 'Elise', '2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'giraffe.jpg', 6),
(4, 'Panda', 'Paul', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'panda.jpeg', 2),
(5, 'jaguar', 'Bob', '3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'jaguars.jpg', NULL),
(6, 'Orang-outan', 'Barth', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', '', 'orang-outan.jpg', NULL),
(8, 'Elephant', 'Joey', '6', 'it laborum ab, eius fugit doloribus tenetur \r\nfugiat, temporibus enim commodi iusto libero magni deleniti quod quam \r\nconsequuntur! Commodi minima excepturi repudiandae velit hic maxime\r\ndoloremque.', '', 'elephant.jpg', 1),
(17, 'Serpent-bleu', 'Ajax', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem', '', 'serpent.jpg', NULL),
(20, 'Tigre (femelle)', 'Mimounne', '2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'Félidés (Panthera leo) ', 'wall.jpeg', NULL),
(26, 'Tigre (femelle)', 'Praline', '2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum.', '669d6efd512ed-tigre1-jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `job` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employers`
--

INSERT INTO `employers` (`id`, `firstname`, `lastname`, `job`, `image`) VALUES
(1, 'Harry', 'Stockath', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', 'homme2.jpg'),
(3, 'Laurent', 'Barre', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', 'anim3.jpg'),
(5, 'Stéphane', 'Gaillet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. ', 'comptable.jpg'),
(8, 'Débra', 'Hamlin', ' Soigneuse et animatrice: \r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d718bf3e6c-soin7-jpg'),
(9, 'Barth ', 'Simpson', 'Cuisinier :\r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d72234a0f8-669b8295ef0f7-gettyimages-1191874227-612x612-jpg'),
(10, 'Jean-pierre', 'Laroche', 'Cuisinier :\r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d726374dca-669b7a1f7bdde-gettyimages-108225739-612x612-jpg'),
(11, 'Emma ', 'Verdes', 'Jardinière paysagiste :\r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d72e8d44dd-jardi1-jpg'),
(12, 'Patricia', 'Dumont', 'Vétérinaire chirurgien:\r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d7368d98bf-veto3-jpg'),
(13, 'Yvette', 'Sablé', 'Vétérinaire urgentiste :\r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d73ae67ab4-veto7-jpg'),
(14, 'Claire', 'Fontaine', 'Caissière animatrice :\r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d73f9dd102-caisse5-jpg'),
(15, 'Martin ', 'Desplamches', 'Maintenance :\r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d746708fcc-brico2-jpg'),
(16, 'Robert', 'Labriq', 'Maintenance :\r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d74a6a9533-brico1-jpg'),
(17, 'Louise', 'Coussin', 'Maintenance : \r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d74e38de33-brico8-jpg'),
(18, 'Christy', 'Larson', 'Animatrice  soigneuse :\r\nImpedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid.', '669d759d24fbd-soignante5-jpg');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `name`, `image`) VALUES
(1, ' Harry Stockath Vétérinaire', 'homme2.jpg'),
(2, 'Lisa Maunna animatrice', 'anim2.jpg'),
(3, 'Laurent Barre animatuer', 'anim3.jpg'),
(4, 'Le petit Arthur ', 'bbfélin.jpg'),
(5, 'Eglantine la girafe ', 'giraffe.jpg'),
(6, 'Les enfants et Eglantine', 'giraf.jpg'),
(14, 'Amandine la petite jardinière', 'jardi3.jpg'),
(25, 'Crusty le custo', '669b83fc3f71f-crusty-jpg'),
(27, 'Nos amis roses de la famille flamant sont de sortie', '669d6dad9bd87-rose1-jpg'),
(28, 'Le repos des lions après le repas', '669d761a08216-lions2-jpg'),
(29, 'Polo l\'ours le plus calme pendant une animation avec des enfants', '669d76668d416-ours1-jpg'),
(31, 'Scéance photo pour les autruches', '669d7701115ab-autr4-jpg'),
(32, 'Les autruches ont des invités pour le repas', '669d77342ba48-autr3-jpg'),
(33, 'ça rigole bien dans la famille des chimpanzés', '669d7784be359-singe5-jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `role`) VALUES
(1, 'homer@simpson.com', '$2y$10$z0RHqBPvz.W3H2BLYAwgmuhMWspP2LHhJYJOeG7EQ4Xf6GLgc41ny', 'Homer', 'Simpson', 'admin'),
(2, 'solo@solo.com', '$2y$10$/DW2Q1pGRlfWI79pJYweJOrO2/acUxF2d9GZGTWFp0/Qversv5c8m', 'Han', 'Solo', 'user'),
(3, 'spider@man.com', '$2y$10$yIax0W/3CAhkNbget7uF2OmWNvkh32Vaswz76BMAow7kLjKRbCrT6', 'Peter', 'Parker', 'user'),
(4, 'chubba@ka.com', '$2y$10$5p9Y42RYcSlrq5LmWBs.0u6j68CMQtI1IKeo/NElZGbgRuERSbO1C', 'Chubba', 'Ka', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Index pour la table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `animaux_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
