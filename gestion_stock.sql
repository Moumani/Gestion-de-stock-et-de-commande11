-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 juin 2023 à 11:39
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(30) NOT NULL,
  `nom_client` varchar(200) NOT NULL,
  `Localisation_client` varchar(200) NOT NULL,
  `matricefiscal_client` varchar(200) NOT NULL,
  `registrecommunal` varchar(200) NOT NULL,
  `email_client` varchar(200) NOT NULL,
  `siteweb_client` varchar(200) NOT NULL,
  `telephone_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `Localisation_client`, `matricefiscal_client`, `registrecommunal`, `email_client`, `siteweb_client`, `telephone_client`) VALUES
(1, 'Moumani André', 'quartier bami', '5532555', 'gestiond', 'moumaniandre5@gmail.com', 'dfsdsddds', 658698988),
(2, 'Brasserie du Cameroun', 'Soiri', 'ezer785e', 'poste tal', 'moumaniandre5@gmail.com', 'brasserie du cameroun', 237),
(3, 'FME', 'POUMPORE', '2443JL3K4', '34.N3?343', 'moumaniandre5@gmail.com', '3433MK?', 656677889),
(4, 'Aladi', 'rond point deydo', '78687687', 'UI68976987', 'moumaniandre5@gmail.com', '32233', 678987667);

-- --------------------------------------------------------

--
-- Structure de la table `commandre`
--

CREATE TABLE `commandre` (
  `id_commande` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite_commande` int(11) NOT NULL,
  `total_ht_commande` int(11) NOT NULL,
  `total_ttc_commande` int(11) NOT NULL,
  `tva_commande` int(11) NOT NULL,
  `delai_livraison_commande` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `objet_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(50) NOT NULL,
  `nom_fournisseur` varchar(50) NOT NULL,
  `telephone_fournisseur` varchar(50) NOT NULL,
  `adresse_fournisseur` varchar(50) NOT NULL,
  `email_fournisseur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(50) NOT NULL,
  `catégorie_produit` varchar(50) NOT NULL,
  `quantité_produit` int(50) NOT NULL,
  `PU_produit` int(50) NOT NULL,
  `Nom_produit` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `catégorie_produit`, `quantité_produit`, `PU_produit`, `Nom_produit`) VALUES
(1, 'vehicule', 1, 200000, 'voiture'),
(3, 'appareil electronique', 4, 5000, 'imprimente'),
(5, 'habit', 2, 52222, 'marteau'),
(6, 'habit', 2, 52222, 'marteau'),
(7, 'habit', 25, 4565, 'André André'),
(8, 'ordinateur', 44, 377873, 'Bouteilles à gaz'),
(9, 'vehicule', 55, 5000, 'vin rouge'),
(10, 'appareil electronique', 1, 4000, 'porte carte de visite de table');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(80) NOT NULL,
  `email_utilisateur` varchar(80) NOT NULL,
  `password_utilisateur` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `id_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantité_vente` int(11) NOT NULL,
  `prix_vente` int(11) NOT NULL,
  `date_vente` datetime NOT NULL DEFAULT current_timestamp(),
  `id_vente` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id_client`, `id_produit`, `quantité_vente`, `prix_vente`, `date_vente`, `id_vente`) VALUES
(2, 3, 2, 7000, '2023-06-09 18:07:39', 1),
(1, 1, 1, 546656, '2023-06-09 11:40:43', 2),
(1, 3, 4, 9877, '2023-06-09 12:29:35', 3),
(1, 7, 20, 546456546, '2023-06-09 12:34:14', 4),
(4, 10, 3, 5000, '2023-06-26 15:31:29', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commandre`
--
ALTER TABLE `commandre`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id_vente`),
  ADD KEY `id_article` (`id_produit`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `id_vente` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandre`
--
ALTER TABLE `commandre`
  ADD CONSTRAINT `commandre_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `commandre_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `commandre_ibfk_3` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
