-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 21 mars 2021 à 20:35
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `DBProjetMobile`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `id` int NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`id`, `telephone`, `latitude`, `longitude`, `adresse`) VALUES
(1, '33737737', 24, 87, 'Colobane'),
(2, '77237377', 76, 98, 'Thies'),
(4, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `nom_complet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_cni` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom_complet`, `telephone`, `num_cni`) VALUES
(5, 'fatou Diop', '221775543566', '2454199303352'),
(6, 'modou Diop', '221785543566', '1454199303352'),
(7, 'papa Diop', '221775543566', '1454199303352'),
(8, 'modou Diop', '221785543566', '1454199303352'),
(9, 'papa Diop', '221775543566', '1454199303352'),
(10, 'modou Diop', '221785543566', '1454199303352'),
(11, 'papa Diop', '221775543566', '1454199303352'),
(12, 'modou Diop', '221785543566', '1454199303352'),
(13, 'papa Diop', '221775543566', '1454199303352'),
(14, 'modou Diop', '221785543566', NULL),
(15, 'papa Diop', '221775543566', '1454199303352'),
(16, 'modou Diop', '221785543566', NULL),
(17, 'papa Diop', '221775543566', '1454199303352'),
(18, 'modou Diop', '221785543566', NULL),
(19, 'papa Diop', '221775543566', '1454199303352'),
(20, 'modou Diop', '221785543566', NULL),
(21, 'papa Diop', '221775543566', '1454199303352'),
(22, 'modou Diop', '221785543566', NULL),
(23, 'papa Diop', '221775543566', '1454199303352'),
(24, 'modou Diop', '221785543566', NULL),
(25, 'papa Diop', '221775543566', '1454199303352'),
(26, 'modou Diop', '221785543566', NULL),
(27, 'papa Diop', '221775543566', '1454199303352'),
(28, 'modou Diop', '221785543566', NULL),
(29, 'papa Diop', '221775543566', '1454199303352'),
(30, 'modou Diop', '221785543566', NULL),
(31, 'papa Diop', '221775543566', '1454199303352'),
(32, 'modou Diop', '221785543566', NULL),
(33, 'nene diouf', '221776543543', '1213199003357'),
(36, 'papa Diop', '221775543566', '1454199303352'),
(37, 'modou Diop', '221785543566', NULL),
(38, 'Baila wane', '221775543566', '1454199303352'),
(39, 'aly Diop', '221785543566', '1454199303352'),
(40, 'Baila wane', '221775543566', '1454199303352'),
(41, 'aly Diop', '221785543566', NULL),
(42, 'Baila wane', '221775543566', '1454199303352'),
(43, 'aly Diop', '221785543566', NULL),
(44, 'modou wane', '221775543566', '1454199303352'),
(45, 'pathe Diop', '221785543566', NULL),
(46, 'sy', '221776354367', '2145367891761'),
(47, 'ly', '221787363564', NULL),
(48, 'sy', '221776354367', '2145367891761'),
(49, 'ly', '221787363564', NULL),
(50, 'sy', '221776354367', '2145367891761'),
(51, 'ly', '221787363564', NULL),
(52, 'sy', '221765343231', '1256334683361'),
(53, 'diop', '221776543246', NULL),
(54, 'ly', '776543234', '1276543456771'),
(55, 'DIOP', '777654254', NULL),
(56, 'fall', '787653364', '2876265343321'),
(57, 'DIOP', '776554345', NULL),
(58, 'sy', '773873654', '1777665456342'),
(59, 'Ly', '786544321', NULL),
(60, 'sy', '787655432', '1876533245691'),
(61, 'bou', '770261006', NULL),
(62, 'fall', '776554328', '2376554315671'),
(63, 'sY', '787654329', NULL),
(64, 'fatou', '776536372', '1653536782765'),
(65, 'maty', '778654322', NULL),
(66, 'filly', '786543287', '2765431987631'),
(67, 'soda', '779877654', NULL),
(68, 'diop', '776543289', '1987765433456'),
(69, 'SY', '776542788', NULL),
(70, 'fall', '765432298', '2876543129876'),
(71, 'SY', '776543478', NULL),
(72, 'SY', '776543278', '1876543298761'),
(73, 'Ly', '765432987', NULL),
(74, 'lo', '765433893', '1877653324569'),
(75, 'dia', '786543221', NULL),
(76, 'ly', '776544567', '2876545678998'),
(77, 'Sy', '776534568', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `numero_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solde` int NOT NULL,
  `date_creation` date NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `agence_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `user_id`, `numero_compte`, `solde`, `date_creation`, `statut`, `agence_id`) VALUES
(1, NULL, '34523898', 156000, '2021-02-27', 1, 2),
(2, NULL, '122898', 500000, '2021-02-27', 1, 1),
(3, NULL, '432355', 70000, '2021-02-28', 0, NULL),
(4, NULL, '432355', 70000, '2021-02-28', 0, NULL),
(5, NULL, '432355', 70000, '2021-02-28', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210227004153', '2021-02-27 00:42:07', 1531),
('DoctrineMigrations\\Version20210227005425', '2021-02-27 00:54:31', 33),
('DoctrineMigrations\\Version20210227010701', '2021-02-27 01:07:06', 234);

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id` int NOT NULL,
  `libelle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profils`
--

INSERT INTO `profils` (`id`, `libelle`) VALUES
(1, 'Admin_Systeme'),
(2, 'Caissier'),
(3, 'Admin_Agence'),
(4, 'User_Agence'),
(5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int NOT NULL,
  `user_depot_id` int DEFAULT NULL,
  `user_retrait_id` int DEFAULT NULL,
  `client_depot_id` int DEFAULT NULL,
  `client_retrait_id` int DEFAULT NULL,
  `compte_depot_id` int DEFAULT NULL,
  `compte_retrait_id` int DEFAULT NULL,
  `montant` int NOT NULL,
  `date_depot` date NOT NULL,
  `date_retrait` date DEFAULT NULL,
  `code_trans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frais` int DEFAULT NULL,
  `frais_depot` int DEFAULT NULL,
  `frais_retrait` int DEFAULT NULL,
  `frais_etat` int DEFAULT NULL,
  `frais_systeme` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id`, `user_depot_id`, `user_retrait_id`, `client_depot_id`, `client_retrait_id`, `compte_depot_id`, `compte_retrait_id`, `montant`, `date_depot`, `date_retrait`, `code_trans`, `frais`, `frais_depot`, `frais_retrait`, `frais_etat`, `frais_systeme`) VALUES
(1, 1, NULL, 5, 6, 2, NULL, 50000, '2021-02-27', '2021-02-28', '130-206-798', 2500, 2500, 500, 1000, 750),
(2, 1, NULL, 7, 8, 1, NULL, 50000, '2021-02-27', '2021-03-02', '515-664-887', 2500, 2500, 500, 1000, 750),
(3, 1, NULL, 9, 10, 1, NULL, 50000, '2021-02-27', '2021-03-02', '363-981-706', 2500, 2500, 500, 1000, 750),
(4, 1, NULL, 11, 12, 1, NULL, 50000, '2021-02-27', '2021-03-02', '357-936-723', 2500, 2500, 500, 1000, 750),
(5, 1, NULL, 13, 14, 1, NULL, 50000, '2021-02-27', NULL, '725-721-946', 2500, 2500, 500, 1000, 750),
(6, 1, NULL, 15, 16, 1, NULL, 50000, '2021-02-27', NULL, '532-672-481', 2500, 2500, 500, 1000, 750),
(7, 1, NULL, 17, 18, 1, NULL, 45000, '2021-02-27', NULL, '241-356-754', 2500, 2500, 500, 1000, 750),
(15, 1, NULL, 36, 37, 1, NULL, 5000, '2021-03-01', NULL, '737-573-739', 425, 425, 85, 170, 127),
(16, 1, NULL, 38, 39, 1, NULL, 1000, '2021-03-01', '2021-03-01', '808-833-730', 425, 425, 85, 170, 127),
(17, 1, NULL, 40, 41, 1, NULL, 15000, '2021-03-01', NULL, '419-366-556', 1270, 1270, 254, 508, 381),
(18, 1, NULL, 42, 43, 1, NULL, 15000, '2021-03-02', NULL, '296-642-352', 1270, 1270, 254, 508, 381),
(19, 1, NULL, 44, 45, 1, NULL, 5000, '2021-03-13', NULL, '174-152-991', 425, 425, 85, 170, 127),
(23, 1, NULL, 52, 53, 1, NULL, 1000, '2021-03-15', NULL, '350-950-990', 425, 425, 85, 170, 127),
(24, 1, NULL, 54, 55, 1, NULL, 1000, '2021-03-15', NULL, '211-279-703', 425, 425, 85, 170, 127),
(25, 1, NULL, 56, 57, 1, NULL, 5000, '2021-03-15', NULL, '887-149-293', 425, 425, 85, 170, 127),
(26, 1, NULL, 58, 59, 1, NULL, 2000, '2021-03-15', NULL, '422-187-126', 425, 425, 85, 170, 127),
(27, 1, NULL, 60, 61, 1, NULL, 1000, '2021-03-15', NULL, '512-116-456', 425, 425, 85, 170, 127),
(28, 1, NULL, 62, 63, 1, NULL, 1500, '2021-03-15', NULL, '453-862-874', 425, 425, 85, 170, 127),
(29, 1, NULL, 64, 65, 1, NULL, 2000, '2021-03-15', NULL, '275-183-642', 425, 425, 85, 170, 127),
(30, 1, NULL, 66, 67, 1, NULL, 1000, '2021-03-15', NULL, '901-763-920', 425, 425, 85, 170, 127),
(31, 1, NULL, 68, 69, 1, NULL, 1000, '2021-03-15', NULL, '469-248-715', 425, 425, 85, 170, 127),
(32, 1, NULL, 70, 71, 1, NULL, 1000, '2021-03-15', NULL, '600-915-161', 425, 425, 85, 170, 127),
(33, 1, NULL, 72, 73, 1, NULL, 1000, '2021-03-15', NULL, '141-355-462', 425, 425, 85, 170, 127),
(34, 1, NULL, 74, 75, 1, NULL, 500, '2021-03-16', NULL, '992-812-111', 425, 425, 85, 170, 127),
(35, 1, NULL, 76, 77, 1, NULL, 1000, '2021-03-16', NULL, '685-695-217', 425, 425, 85, 170, 127);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `profil_id` int DEFAULT NULL,
  `agence_id` int DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `profil_id`, `agence_id`, `email`, `roles`, `password`, `prenom`, `nom`, `telephone`, `statut`) VALUES
(1, 1, 2, 'zale@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$vf1KEaXYX0+jkG7sOsXsjw$V8CYdBRFBlz/qnaC4gqGxM9UOxKNpYwfyW11Y/vfbD0', 'zale', 'diop', '787542321', 0),
(2, 3, NULL, 'penda@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$fQRgCt7p8jFyj83FQd42VA$6fxRmAc6zaebV+EoOUOJ0QyJjptDuGfDveg3NxducLM', 'penda', 'ndiaye', '765432204', 0),
(3, 4, NULL, 'doudou@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$4zt1rqbtVlo8e0//XUpa0g$VqZSY2pmC7kIZwgQ4jQ9j3gxoAZxI66j5oKjYRkHQFA', 'doudou', 'niang', '775635523', 0),
(4, 4, 1, 'aly@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$DbKxMw8sDQwy8FyB8UT3bw$Po4pcbUFWFhP+kTAlSkKQPFyXiKCKSA5AlPWXfXFqS0', 'aly', 'tall', '787625545', 0),
(5, 5, 4, 'fatou@gmail.com', '[]', 'passer', 'fatou', 'diallo', '765432222', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CFF65260D725330D` (`agence_id`),
  ADD KEY `IDX_CFF65260A76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_723705D1659D30DE` (`user_depot_id`),
  ADD KEY `IDX_723705D1D99F8396` (`user_retrait_id`),
  ADD KEY `IDX_723705D1ABF6E41B` (`client_depot_id`),
  ADD KEY `IDX_723705D1EEAC783B` (`client_retrait_id`),
  ADD KEY `IDX_723705D17A04723` (`compte_depot_id`),
  ADD KEY `IDX_723705D1B6EC9AC4` (`compte_retrait_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD KEY `IDX_8D93D649275ED078` (`profil_id`),
  ADD KEY `IDX_8D93D649D725330D` (`agence_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `FK_CFF65260A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_CFF65260D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`);

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_723705D1659D30DE` FOREIGN KEY (`user_depot_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_723705D17A04723` FOREIGN KEY (`compte_depot_id`) REFERENCES `compte` (`id`),
  ADD CONSTRAINT `FK_723705D1ABF6E41B` FOREIGN KEY (`client_depot_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_723705D1B6EC9AC4` FOREIGN KEY (`compte_retrait_id`) REFERENCES `compte` (`id`),
  ADD CONSTRAINT `FK_723705D1D99F8396` FOREIGN KEY (`user_retrait_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_723705D1EEAC783B` FOREIGN KEY (`client_retrait_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649275ED078` FOREIGN KEY (`profil_id`) REFERENCES `profils` (`id`),
  ADD CONSTRAINT `FK_8D93D649D725330D` FOREIGN KEY (`agence_id`) REFERENCES `agence` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
