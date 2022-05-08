-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 08 mai 2022 à 21:16
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_etudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `cin` int(10) NOT NULL,
  `date` date NOT NULL,
  `matiere` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`cin`, `date`, `matiere`) VALUES
(14273470, '2022-05-02', 'POO'),
(14273470, '2022-05-07', 'POO'),
(14273470, '2022-04-12', 'POO'),
(14273470, '2022-04-12', 'base de données'),
(14273470, '2022-04-12', 'Tech web'),
(15789410, '2022-04-12', 'POO'),
(15789417, '2022-04-20', 'POO'),
(15789421, '2022-04-01', 'Tech web'),
(15789420, '2022-04-09', 'POO'),
(15789417, '2022-04-02', 'Tech web'),
(15789420, '2022-04-21', 'Tech web'),
(15789420, '2022-04-27', 'POO'),
(1578943, '2022-04-25', 'base de données'),
(1578943, '2022-04-25', 'base de données'),
(14273470, '2022-05-23', 'POO'),
(14273470, '2022-05-09', 'POO'),
(14273470, '2022-05-10', 'POO'),
(14273470, '2022-04-25', 'POO'),
(14273470, '2022-04-18', 'POO');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` varchar(10) NOT NULL,
  `niveau` int(10) NOT NULL,
  `groupe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `niveau`, `groupe`) VALUES
('INFO1-A', 1, 'A'),
('INFO1-B', 1, 'B'),
('INFO1-C', 1, 'C'),
('INFO1-D', 1, 'D'),
('INFO1-E', 1, 'E'),
('INFO1-F', 1, 'F'),
('INFO2-A', 2, 'A'),
('INFO2-B', 2, 'B'),
('INFO2-C', 2, 'C'),
('INFO2-D', 2, 'D'),
('INFO2-E', 2, 'E'),
('INFO2-F', 2, 'F'),
('INFO3-A', 3, 'A'),
('INFO3-B', 3, 'B'),
('INFO3-C', 3, 'C'),
('INFO3-D', 3, 'D'),
('INFO3-E', 3, 'E'),
('INFO3-F', 3, 'F');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `login` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `date`, `nom`, `prenom`, `login`, `pass`) VALUES
(1, '2022-03-12 15:58:08', 'Saad', 'Walid', 'walid.saadd@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(4, '2022-04-16 17:26:16', 'Jbeli', 'Ons', 'onsjbeli92@gmail.com', '69e20a81a60050a6239359e266bac20b');

-- --------------------------------------------------------

--
-- Structure de la table `enseignement`
--

CREATE TABLE `enseignement` (
  `id_enseignant` int(100) NOT NULL,
  `classe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseignement`
--

INSERT INTO `enseignement` (`id_enseignant`, `classe`) VALUES
(4, 'INFO1-D'),
(4, 'INFO1-E');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `cin` int(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `cpassword` varchar(40) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `Classe` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`cin`, `email`, `password`, `cpassword`, `nom`, `prenom`, `adresse`, `Classe`) VALUES
(1578943, 'soussi.mehdi@gmail.com', '54fa9023f0abb395025977b879b78a37', '54fa9023f0abb395025977b879b78a37', 'Soussi', 'Mehdi', 'Sfax', 'INFO1-D'),
(1578944, 'souisi.yasmine@gmail.com', '0ffa193bfc3f7fd65ef015b33088fa2f', '0ffa193bfc3f7fd65ef015b33088fa2f', 'souisi', 'Yasmine', 'Jendouba', 'INFO1-D'),
(1578945, 'hajbi.baha@gmail.com', 'be387f007b3f985e985cbe629a61355a', 'be387f007b3f985e985cbe629a61355a', 'Hajbi', 'Baha', 'Bizerte', 'INFO2-A'),
(1578946, 'Bouneb.chadha@gmail.com', '164ccc163f4c84a9f9d5057a1d83e997', '164ccc163f4c84a9f9d5057a1d83e997', 'Bouneb', 'Chadha', 'Monastir', 'INFO2-A'),
(1578947, 'labidi.hamza@gmail.com', '646d6e2acb991d931b4ad1ae1817da41', '646d6e2acb991d931b4ad1ae1817da41', 'Labidi', 'Hamza', 'Mahdia', 'INFO2-A'),
(1578948, 'medini.rihab@gmail.com', '25a409b478341a21ea1297f3392f2397', '25a409b478341a21ea1297f3392f2397', 'Medini', 'Rihab', 'Beja', 'INFO2-A'),
(1578949, 'mansouri.mouhamed@gmail.com', '392c4d99a866bd585672f382c7f974b8', 'a65a3b69d2bcefbb5e632d6f92f6cbe9', 'Mansouri', 'Mohamed', 'Beja', 'INFO2-A'),
(1578950, 'saadi.youssef@gmail.com', '717d00efcdb16bf8ffbe530c4bab0f2e', '3d7fc93e5281b3e391540a1dd2a3792e', 'Saadi', 'Youssef', 'Nabeul', 'INFO2-A'),
(1578951, 'tabbessi.yassine@gmail.com', '26d1a7fd5775cd8af0f90bcc7fb99454', '26d1a7fd5775cd8af0f90bcc7fb99454', 'Tabbessi', 'Yassine', 'Sfax', 'INFO2-A'),
(1578952, 'dakhli.awatef@gmail.com', '2ca0eaf2866b978f5c4803fa21e65d1c', '2ca0eaf2866b978f5c4803fa21e65d1c', 'Dakhli', 'Awatef', 'Ariana', 'INFO2-B'),
(1578953, 'hajjeji.khouloud@gmail.com', 'e014cbcba4ebe0269ec6b6e9c8f4b8c7', 'e014cbcba4ebe0269ec6b6e9c8f4b8c7', 'Hajjeji', 'Khouloud', 'Beja', 'INFO2-B'),
(1578954, 'azmi.manar@gmail.com', '6baa3e0d9168fbc88ca2eeb861938578', '6baa3e0d9168fbc88ca2eeb861938578', 'Azmi', 'Manar', 'Gabes', 'INFO2-B'),
(1578955, 'kahil.achref@gmail.com', '4d659e4d5d93936d76a8e2ba89681d0c', '4d659e4d5d93936d76a8e2ba89681d0c', 'Kahil', 'Achref', 'Zaghouan', 'INFO2-B'),
(1578956, 'bouali.khadija@gmail.com', 'a1a4a34a30c676777b29022559e8b4a1', 'a1a4a34a30c676777b29022559e8b4a1', 'Bouali', 'Khadija', 'Beja', 'INFO2-B'),
(1578957, 'cherni.eya@gmail.com', '58e17d52675aadf177f138604aa654be', '58e17d52675aadf177f138604aa654be', 'Cherni', 'Eya', 'Kef', 'INFO2-B'),
(1578958, 'hajji.sarra@gmail.com', 'b746094c2e9678c91f4f96f25d315e3c', 'b746094c2e9678c91f4f96f25d315e3c', 'Hajji', 'Sarra', 'Seliana', 'INFO2-B'),
(1578959, 'khelifi.amira@gmail.com', '510c592f46e9a457c4e406a484052485', '341af4b2f3273d7673b2a01395503114', 'Khelifi', 'Amira', 'Jendouba', 'INFO2-C'),
(1578960, 'laribi.yossr@gmail.com', '8315ae37173f1367f22b9c8285f6d088', '8315ae37173f1367f22b9c8285f6d088', 'Laribi', 'Yossr', 'Manouba', 'INFO2-C'),
(1578961, 'dridi.aziza@gmail.com', '9d8cae856e4886acbd250509c8b26e2a', '9d8cae856e4886acbd250509c8b26e2a', 'Dridi', 'Aziza', 'Tunis', 'INFO2-C'),
(1578962, 'louati.manel@gmail.com', 'd62d44caa973ead537b26f1873922cd2', 'd62d44caa973ead537b26f1873922cd2', 'Louati', 'Manel', 'Tunis', 'INFO2-C'),
(1578963, 'mihoub.houssem@gmail.com', '3bb6919bba0606ed2c8e0a96cdf79630', '3bb6919bba0606ed2c8e0a96cdf79630', 'Mihoub', 'Houssem', 'Ariana', 'INFO2-C'),
(1578964, 'azouzi.haifa@gmail.com', 'e38d58637a7c6e580d58b69903d6ed08', 'e38d58637a7c6e580d58b69903d6ed08', 'Azouzi', 'Haifa', 'Ariana', 'INFO2-C'),
(1578965, 'cherif.salma@gmail.com', 'f67b0ffe4b32067a61a927293d84a0f3', 'f67b0ffe4b32067a61a927293d84a0f3', 'Cherif', 'Salma', 'Beja', 'INFO2-C'),
(1578966, 'trabelsi.farah@gmail.com', '5f08557711d5cc478bb0560b8777da4d', '5f08557711d5cc478bb0560b8777da4d', 'Trabelsi', 'Farah', 'Mahdia', 'INFO2-C'),
(1578967, 'kadri.jihen@gmail.com', '06e608e85f660d87431f187ff0086b36', '06e608e85f660d87431f187ff0086b36', 'Kadri', 'Jihen', 'Sousse', 'INFO2-D'),
(1578968, 'khemissi.hela@gmail.com', 'f5e5a4b310e872f8a4b9c0ab17acd8dc', 'f5e5a4b310e872f8a4b9c0ab17acd8dc', 'Khemissi', 'Hela', 'Jendouba', 'INFO2-D'),
(1578969, 'hadda.raed@gmail.com', 'ac65c0f32e6a9083b6a3f8dc8badd576', 'ac65c0f32e6a9083b6a3f8dc8badd576', 'Hadda', 'Raed', 'Bizerte', 'INFO2-D'),
(1578970, 'jaziri.arwa@gmail.com', 'aafb6306e3ecbfb2b6986a909c9e6f0e', 'aafb6306e3ecbfb2b6986a909c9e6f0e', 'Jaziri', 'Arwa', 'Tunis', 'INFO2-D'),
(1578971, 'mami.nihel@gmail.com', '9141282bafb6f268036f00ddc24019e9', '9141282bafb6f268036f00ddc24019e9', 'Mami', 'Nihel', 'Manouba', 'INFO2-D'),
(1578972, 'driss.ahmed@gmail.com', '189942a7c6ae4d9835fb94008b7d3a91', '189942a7c6ae4d9835fb94008b7d3a91', 'Driss', 'Ahmed', 'Ariana', 'INFO2-D'),
(1578973, 'sayari.nour@gmail.com', 'cf91f1e4b92b9d3269a28187399e8d10', 'cf91f1e4b92b9d3269a28187399e8d10', 'Sayari', 'Nour', 'Gafsa', 'INFO2-D'),
(1578974, 'jemaa.ilhem@gmail.com', '48d6e778c6fc7b194eae167b028d80cd', '48d6e778c6fc7b194eae167b028d80cd', 'Jemaa', 'Ilhem', 'Nabeul', 'INFO2-D'),
(1578975, 'chakroun.aymen@gmail.com', '53fa301e67d5138ccfe83f3b60bb6c73', '53fa301e67d5138ccfe83f3b60bb6c73', 'Chakroun', 'Aymen', 'Bizerte', 'INFO2-E'),
(1578976, 'loukil.ameni@gmail.com', 'db27c2bc0e5c08ab6a857e8065abc8e4', 'db27c2bc0e5c08ab6a857e8065abc8e4', 'Loukil', 'Ameni', 'Zaghouan', 'INFO2-E'),
(1578977, 'rahali.bochra@gmail.com', '4a3a9759d373f7d00f5d312196c8fed0', '4a3a9759d373f7d00f5d312196c8fed0', 'Rahali', 'Bochra', 'Gafsa', 'INFO2-E'),
(1578978, 'saidi.ines@gmail.com', '57f6dbe3c37b3838111e68ef4b6a6e9a', '57f6dbe3c37b3838111e68ef4b6a6e9a', 'Saidi', 'Ines', 'Tozeur', 'INFO2-E'),
(1578979, 'yangui.mounir@gmail.com', '23997efa7e6f7040627d5964b02b6c08', '23997efa7e6f7040627d5964b02b6c08', 'Yangui', 'Mounir', 'Sfax', 'INFO2-E'),
(1578980, 'hajji.ghaith@gmail.com', 'f6e9133d351f48cb6be5e3484569b7dc', 'd2b2d56fae2a1e55fe03905cfb280cf1', 'Hajji', 'Ghaith', 'Tunis', 'INFO2-E'),
(1578981, 'soltani.sinda@gmail.com', 'e5b30a2c042b44ef2e150c61e23c3a8c', 'e5b30a2c042b44ef2e150c61e23c3a8c', 'Soltani', 'Sinda', 'Tunis', 'INFO3-A'),
(1578982, 'soula.raja@gmail.com', 'b69e8e59718f8470b311d9d28364fd57', 'b69e8e59718f8470b311d9d28364fd57', 'Soula', 'Raja', 'Manouba', 'INFO3-A'),
(1578983, 'hasni.hana@gmail.com', '9ea1a379686c75d713a4b8b1a5f2099d', '9ea1a379686c75d713a4b8b1a5f2099d', 'Hasni', 'Hana', 'Ariana', 'INFO3-A'),
(1578984, 'kacem.safa@gmail.com', 'fe6f992c195e878410011a1b9190b25e', 'fe6f992c195e878410011a1b9190b25e', 'Kacem', 'Safa', 'Nabeul', 'INFO3-A'),
(1578985, 'tayari.abir@gmail.com', '7d45615199b8b49172e9c91bf89ab026', '7d45615199b8b49172e9c91bf89ab026', 'Tayari', 'Abir', 'Sfax', 'INFO3-A'),
(1578986, 'turki.wissal@gmail.com', 'df9018b967e01a694729b47e86a54baf', 'df9018b967e01a694729b47e86a54baf', 'Turki', 'Wissal', 'Nabeul', 'INFO3-A'),
(1578987, 'salah.ghada@gmail.com', 'a1853c7593da574c3167ef4b853d683c', 'a1853c7593da574c3167ef4b853d683c', 'Salah', 'Ghada', 'Monastir', 'INFO3-A'),
(1578988, 'amara.basma@gmail.com', 'ef3fbd7eb94f152e0acfa5ff353b12c0', 'ef3fbd7eb94f152e0acfa5ff353b12c0', 'Amara', 'Basma', 'Sousse', 'INFO3-A'),
(1578989, 'gharbi.amina@gmail.com', '1fec07e4bba89bcbad9a6b369fac7c8f', '1fec07e4bba89bcbad9a6b369fac7c8f', 'Gharbi', 'Amina', 'Tunis', 'INFO3-B'),
(14273470, 'baraket@yahoo.fr', '2945ab56d4a62a269d9ad55d6b77a6a2', '2945ab56d4a62a269d9ad55d6b77a6a2', 'Baraket', 'SHEHNEZ', '     Tunis', 'INFO1-A'),
(14987520, 'nada@gmail.com', '98eb148b5f080342609c8e5a352689a8', '98eb148b5f080342609c8e5a352689a8', 'nada', 'medini', '     beja', 'INFO1-D'),
(15749814, 'nour@gmail.com', '034d3462275ed77b9dfe9658dcb7ad7b', '034d3462275ed77b9dfe9658dcb7ad7b', 'Jnaoui', 'Nour', '     Tunis', 'INFO1-D'),
(15789154, 'boubahri.fatma@gmail.com', 'cf4d72ecabdb038e60c4a30be0064e2e', 'cf4d72ecabdb038e60c4a30be0064e2e', 'Boubahri', 'Fatma', 'Sfax', 'INFO3-C'),
(15789410, 'amani.besbes@yahoo.fr', '5e2d0c1b516ac00d3740eaca84ccf9d4', '5e2d0c1b516ac00d3740eaca84ccf9d4', 'Besbes', 'Amani', 'Ariana', 'INFO1-A'),
(15789411, 'dridibesbes@gamil.com', '189942a7c6ae4d9835fb94008b7d3a91', '189942a7c6ae4d9835fb94008b7d3a91', 'Dridi', 'Ahmed', 'Manouba', 'INFO1-A'),
(15789417, 'skanderJ@gamil.com', '1fd6da543289590d97365c69978cd500', '1fd6da543289590d97365c69978cd500', 'Jelassi', 'Skander', 'Jendouba', 'INFO1-A'),
(15789419, 'chanbiamira@gamil.com', '341af4b2f3273d7673b2a01395503114', '341af4b2f3273d7673b2a01395503114', 'Chanbi', 'Amira', 'Jendouba', 'INFO1-A'),
(15789420, 'mehdi.smiri@gmail.com', '54fa9023f0abb395025977b879b78a37', '54fa9023f0abb395025977b879b78a37', 'Smiri', 'Mehdi', 'Sfax', 'INFO1-A'),
(15789421, 'imentrabelsi@gmail.com', '6bdc0d5a2ace0dbaf53622ac104a25c3', '6bdc0d5a2ace0dbaf53622ac104a25c3', 'Trabelsi', 'Imen', 'Ariana', 'INFO1-A'),
(15789422, 'asma.amdouni@gmail.com', '2688e16d9b7cb91f66071ac4e2cbe925', '2688e16d9b7cb91f66071ac4e2cbe925', 'Amdouni', 'Asma', 'Beja', 'INFO1-B'),
(15789423, 'ayedi.nour@gmail.com', 'cf91f1e4b92b9d3269a28187399e8d10', 'cf91f1e4b92b9d3269a28187399e8d10', 'Ayedi', 'Nour', 'Medenin', 'INFO1-B'),
(15789424, 'Bettaibi.arij@gmail.com', '0678d8f66c7d9fbafb08eec47518c8db', '0678d8f66c7d9fbafb08eec47518c8db', 'Bettaibi', 'Arij', 'Gabes', 'INFO1-B'),
(15789425, 'fatma.bo@gmail.com', 'cf4d72ecabdb038e60c4a30be0064e2e', 'cf4d72ecabdb038e60c4a30be0064e2e', 'Ben Othmen', 'Fatma', 'Zaghouen', 'INFO1-B'),
(15789426, 'hamdi.ala@gmail.com', 'deaacd692fc6c8369aa035e21804116b', 'deaacd692fc6c8369aa035e21804116b', 'Hamdi', 'Ala', 'kassrine', 'INFO1-B'),
(15789427, 'kouki.wael@gmail.com', '3f20edb370212968f4082a8422fdd743', '3f20edb370212968f4082a8422fdd743', 'Kouki', 'Wael', 'Sousse', 'INFO1-B'),
(15789428, 'ousleti.rania@gmail.com', 'f330a8af6720299ced25c4e341f0c7cd', 'df784b0bd8f416adc30baaf1b9ed0832', 'Ousleti', 'Rania', 'Sousse', 'INFO1-B'),
(15789429, 'selmi.rania@gmail.com', 'df784b0bd8f416adc30baaf1b9ed0832', 'df784b0bd8f416adc30baaf1b9ed0832', 'Selmi', 'Rania', 'Mahdia', 'INFO1-B'),
(15789430, 'sahli.adam@gmail.com', '6682f94b61afe82caa432b21478de3fe', '6682f94b61afe82caa432b21478de3fe', 'Sahli', 'Adam', 'Mahdia', 'INFO1-B'),
(15789431, 'triki.tasnim@gmail.com', '79c071ccb3265d724cca647184818c71', '79c071ccb3265d724cca647184818c71', 'Triki', 'Tasnim', 'Ariana', 'INFO1-C'),
(15789432, 'kanzari.rami@gmail.com', 'e72d3896858000bb2a603f1e7328113e', 'e72d3896858000bb2a603f1e7328113e', 'Kanzari', 'Rami', 'Seliana', 'INFO1-C'),
(15789433, 'Chaabeni.omar@gmail.com', '566695fc666829ffc3ceb06e59157055', '566695fc666829ffc3ceb06e59157055', 'Chaabeni', 'Omar', 'Sfax', 'INFO1-C'),
(15789434, 'fekih.nouha@gmail.com', '30e07fb5e3e1c9f9adb88c9b735a6827', '30e07fb5e3e1c9f9adb88c9b735a6827', 'Fekih', 'Nouha', 'Sousse', 'INFO1-C'),
(15789435, 'hadad.sirine@gmail.com', '753149d8d35b7656151261bf3f55dd6c', '753149d8d35b7656151261bf3f55dd6c', 'Haddad', 'Sirine', 'Kef', 'INFO1-C'),
(15789436, 'limeme.walid@gmail.com', '60de657654d7554cd65c02a1c3e869c0', '60de657654d7554cd65c02a1c3e869c0', 'Limeme', 'Walid', 'Kef', 'INFO1-C'),
(15789437, 'jelassi.khalil@gmail.com', '3f7509da7bdd7caeeaee4defe35c271a', '3f7509da7bdd7caeeaee4defe35c271a', 'Jelassi', 'Khalil', 'Monastir', 'INFO1-C'),
(15789438, 'nasri.ahmed@gmail.com', '189942a7c6ae4d9835fb94008b7d3a91', '189942a7c6ae4d9835fb94008b7d3a91', 'Nasri', 'Ahmed', 'Monastir', 'INFO1-C'),
(15789439, 'nouri.amine@gmail.com', 'c42f0a4702347bb830bd39fdcbf594a8', 'c42f0a4702347bb830bd39fdcbf594a8', 'Nouri', 'Amine', 'Manouba', 'INFO1-D'),
(15789440, 'nouri.ahlem@gmail.com', '01ad3646831b05844f277d58242d1b9c', '8d12d4175e1e0ed98e8340ba35b4a0b7', 'Nouri', 'Ahlem', 'Nabeul', 'INFO1-D'),
(15789441, 'houissa.malek@gmail.com', '3b40123697b0c341855553c49947e356', '3b40123697b0c341855553c49947e356', 'Houissa', 'Malek', 'Nabeul', 'INFO1-D'),
(15789442, 'gharsali.souha@gmail.com', '630c605374adeb83bab1ae53f3c7a2a4', '630c605374adeb83bab1ae53f3c7a2a4', 'Gharsali', 'Souha', 'Bizerte', 'INFO1-D'),
(15789890, 'mejri.rabaa@gmail.com', 'b5bdcc11b83ddfe76cdf36d4206b4a0c', 'b5bdcc11b83ddfe76cdf36d4206b4a0c', 'Mejri', 'Rabaa', 'Ariana', 'INFO3-B'),
(15789891, 'hidri.wafa@gmail.com', '1492fe033e643164518b9349707bf563', '1492fe033e643164518b9349707bf563', 'Hidri', 'Wafa', 'Seliana', 'INFO3-B'),
(15789892, 'boubaker.bilel@gmail.com', 'ec40906097fe29b16123dace4955a95e', 'ec40906097fe29b16123dace4955a95e', 'Boubaker', 'Bilel', 'Seliana', 'INFO3-B'),
(15789893, 'ksouri.anis@gmail.com', '9dd8b53843db5101cf13f4a30da72fda', '9dd8b53843db5101cf13f4a30da72fda', 'Ksouri', 'Anis', 'Tunis', 'INFO3-B'),
(15789894, 'jawadi.chaima@gmail.com', '2cf62d910133ba5614a18d374583a4c2', 'ced73c16f6aae8fc65e67ef985d2ea93', 'Jawadi', 'Chaima', 'Tunis', 'INFO3-C'),
(15789895, 'taboubi.taher@gmail.com', 'e76b2f673de442e360f5d66327726cdd', 'e76b2f673de442e360f5d66327726cdd', 'Taboubi', 'Taher', 'Beja', 'INFO3-C'),
(15789896, 'moussa.rahma@gmail.com', '0d17b6465cabd1ca40dba18478b993b0', '0d17b6465cabd1ca40dba18478b993b0', 'Moussa', 'Rahma', 'Sfax', 'INFO3-C'),
(15789897, 'abbes.ahlem@gmail.com', '01ad3646831b05844f277d58242d1b9c', '01ad3646831b05844f277d58242d1b9c', 'Abbes', 'Ahlem', 'Manouba', 'INFO3-C'),
(15789898, 'khiari.anas@gmail.com', 'c75b4e3d301c309f7f16c1525dcd505b', 'c75b4e3d301c309f7f16c1525dcd505b', 'Khiari', 'Anas', 'Ariana', 'INFO3-C'),
(15789899, 'jendoubi.rami@gmail.com', 'e72d3896858000bb2a603f1e7328113e', 'e72d3896858000bb2a603f1e7328113e', 'Jendoubi', 'Rami', 'Jendouba', 'INFO3-C'),
(17849533, 'meriem@gmail.com', 'd3aa211e81727f39e91ce4bc6f4b93a9', 'd3aa211e81727f39e91ce4bc6f4b93a9', 'Boulifi', 'Mariem', '     Ariana', 'INFO2-B'),
(17849537, 'yassin.D@gmail.com', '1509b06cb0f16583385c54dcb4869a0a', '1509b06cb0f16583385c54dcb4869a0a', 'Dridi', 'Yassine', 'Bizert', 'INFO3-B'),
(17849585, 'omar@gmail.com', '566695fc666829ffc3ceb06e59157055', '566695fc666829ffc3ceb06e59157055', 'Hajjeji', 'Omar', '     Tunis', 'INFO1-D');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `nom` varchar(20) NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`nom`, `niveau`) VALUES
('base de données', 1),
('POO', 1),
('SGBD', 2),
('structures de donnée', 1),
('Tech web', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD UNIQUE KEY `cle` (`nom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
