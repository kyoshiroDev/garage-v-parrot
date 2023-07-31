-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 18 juil. 2023 à 23:32
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage-v-parrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `card_cars`
--

CREATE TABLE `card_cars` (
  `id` int(11) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `kilometre` int(11) NOT NULL,
  `porte` int(11) NOT NULL,
  `puissance` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `prix` double NOT NULL,
  `energie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230703220940', '2023-07-04 00:12:04', 28),
('DoctrineMigrations\\Version20230703221745', '2023-07-04 00:17:50', 15),
('DoctrineMigrations\\Version20230704044028', '2023-07-04 06:40:48', 18),
('DoctrineMigrations\\Version20230704182021', '2023-07-04 20:20:36', 7),
('DoctrineMigrations\\Version20230705173828', '2023-07-05 19:38:45', 13),
('DoctrineMigrations\\Version20230705190119', '2023-07-05 21:01:22', 8),
('DoctrineMigrations\\Version20230706195255', '2023-07-06 21:53:07', 15),
('DoctrineMigrations\\Version20230706213056', '2023-07-06 23:31:00', 14),
('DoctrineMigrations\\Version20230709085905', '2023-07-09 10:59:17', 9),
('DoctrineMigrations\\Version20230709095407', '2023-07-09 11:54:16', 13),
('DoctrineMigrations\\Version20230709095859', '2023-07-09 11:59:13', 13),
('DoctrineMigrations\\Version20230709110617', '2023-07-09 13:06:22', 11),
('DoctrineMigrations\\Version20230709111049', '2023-07-09 13:10:53', 14),
('DoctrineMigrations\\Version20230711162649', '2023-07-11 18:26:58', 8),
('DoctrineMigrations\\Version20230711163630', '2023-07-11 18:36:34', 11);

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `id` int(11) NOT NULL,
  `jours` varchar(10) NOT NULL,
  `heures` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE `prestations` (
  `id` int(11) NOT NULL,
  `prestation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `created_at`, `last_name`, `first_name`) VALUES
(40, 'corinne.dumas@pelletier.fr', '[\"ROLE_USER\"]', '$2y$13$obNMeUPQ31I3p4sxXAw0SOw6Sak9oNmjyk1NUu5qeqwkXwED9Rki.', '2023-07-13 00:12:27', 'Navarro', 'sanches'),
(43, 'vsamson@dbmail.com', '[\"ROLE_USER\"]', '$2y$13$yPOBc9dPT8XH.LdjKaU8CeuMpJtN9avZQxcLI3vpQMaqIFD0H/YUu', '2023-07-13 00:12:29', 'Mallet', 'Marguerite'),
(44, 'aubry.christiane@tele2.fr', '[\"ROLE_USER\"]', '$2y$13$1jfexYqqcHoBCCozAtgsieAYre.iD.LT5ukjR8haypRmO4PpixnTG', '2023-07-13 00:12:29', 'Renaud', 'Adrien'),
(45, 'kbruneau@blanc.fr', '[\"ROLE_USER\"]', '$2y$13$hBjnEcflJoyxqu9DiswxGObMguFZBuE63g9Hnp/ae0SyS32Bz851e', '2023-07-13 00:12:30', 'Maury', 'Alex'),
(47, 'claude.navarro@rousseau.fr', '[\"ROLE_USER\"]', '$2y$13$JgtmKheY5OwFYS0xlvKgpOq3I51WWKshevdPPVPztzSoFYO54/wN2', '2023-07-13 00:12:31', 'David', 'gggggg'),
(88, 'tahir.gregory@gmail.com', '[\"ROLE_USER\"]', '$2y$13$CQbZNEig0LuTm4L.dwg4de6aC4zmRTs1g1NH8ll0egPi7kNw0TPT2', '2023-07-17 16:58:16', 'tahir', 'gregory'),
(89, 'vincent.parrot@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$xYCHrKWD6zUFW4kurWEF4.LQS0EbEgF06Ls0LGiZbxcSb.n9v5oie', '2023-07-17 19:00:00', 'vincent', 'parrot');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `card_cars`
--
ALTER TABLE `card_cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `card_cars`
--
ALTER TABLE `card_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
