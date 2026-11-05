-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 17 mars 2025 à 11:00
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `defnumerique`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `mailadmin` varchar(100) NOT NULL,
  `mdpadmin` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adminid`, `mailadmin`, `mdpadmin`, `date`) VALUES
(2, 'test@gmail.com', '1234', '2024-12-16 08:29:48');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `catid` int(10) NOT NULL,
  `catnom` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`catid`, `catnom`) VALUES
(1, 'Programmation'),
(2, 'IA'),
(3, 'Reseaux'),
(4, 'Web'),
(5, 'Infrastructure'),
(6, 'Interfaces');

-- --------------------------------------------------------

--
-- Structure de la table `definition`
--

CREATE TABLE `definition` (
  `defid` int(11) NOT NULL,
  `deflettre` varchar(1) CHARACTER SET latin1 NOT NULL,
  `deftitre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `definition` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `defauteur` varchar(100) CHARACTER SET latin1 NOT NULL,
  `defdate` date NOT NULL,
  `valider` int(1) NOT NULL DEFAULT '2',
  `defemail` varchar(100) NOT NULL,
  `nb_vue` int(100) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `definition`
--

INSERT INTO `definition` (`defid`, `deflettre`, `deftitre`, `definition`, `defauteur`, `defdate`, `valider`, `defemail`, `nb_vue`) VALUES
(1, 'A', 'Algorithmique', 'Ensemble d\'instructions ordonnees permettant de resoudre un probleme ou d\'accomplir une tache de maniere automatique.', '', '2024-11-04', 1, '', 9),
(2, 'A', 'API (application programming interface)', 'Interface permettant a differentes applications de communiquer entre elles, en exposant des fonctionnalites pour simplifier les interactions.', '', '2024-11-04', 2, '', 33),
(3, 'A', 'Application', 'Logiciel ou programme destine a realiser une tache ou un ensemble de taches specifiques pour l\'utilisateur.\r\n', '', '2024-11-04', 2, '', 20),
(4, 'B', 'Base de donnees', 'Ensemble organise de donnees structurees, stockees et accessibles electroniquement, souvent gerees par un systeme de gestion de base de donnees (SGBD).\r\n', '', '2024-11-04', 2, '', 6),
(5, 'B', 'Big Data', 'Ensemble massif de donnees dont le volume, la vitesse, et la variete necessitent des technologies et des outils specifiques pour etre stockes, analyses et exploites.\r\n', '', '2024-11-04', 2, '', 6),
(6, 'B', 'Bug', 'Defaut ou erreur dans un programme informatique, provoquant un comportement inattendu ou incorrect.', '', '2024-11-04', 2, '', 6),
(7, 'C', 'Cloud Computing', 'Utilisation de serveurs distants via Internet pour stocker, gerer et traiter des donnees, plutot que d\'utiliser des serveurs ou des ordinateurs locaux.', '', '2024-11-04', 2, '', 5),
(8, 'C', 'Code Source', 'Ensemble des instructions ecrites dans un langage de programmation qui definit le fonctionnement d\'un programme.', '', '2024-11-04', 2, '', 5),
(9, 'C', 'Cybersecurite', 'Ensemble de pratiques et de technologies destinees a proteger les systemes informatiques et les donnees contre les cyberattaques.', '', '2024-11-04', 2, '', 8),
(10, 'D', 'Data Science', 'Discipline qui utilise des techniques statistiques, de programmation et d\'apprentissage automatique pour analyser des donnees et en tirer des informations utiles.', '', '2024-11-04', 2, '', 5),
(11, 'D', 'DDoS (Distributed Denial of Service)', 'Attaque visant a rendre un service indisponible en surchargeant le serveur avec un nombre massif de requetes.', '', '2024-11-04', 2, '', 4),
(12, 'D', 'Debogage', 'Processus de recherche et de correction des erreurs dans un programme informatique', '', '2024-11-04', 2, '', 4),
(13, 'E', 'Encapsulation', 'Principe de programmation orientee objet qui consiste a cacher les details internes d\'un objet et a exposer seulement ce qui est necessaire pour son utilisation.', '', '2024-11-04', 2, '', 4),
(14, 'E', 'Extranet', 'Reseau securise et prive etendu, permettant un acces externe limite aux partenaires commerciaux ou clients.', '', '2024-11-04', 2, '', 4),
(15, 'F', 'Firewall (Pare-feu)', 'Systeme de securite reseau qui controle le trafic entrant et sortant en fonction de regles de securite predefinies.', '', '2024-11-04', 2, '', 5),
(16, 'F', 'Framework', 'Structure de code reutilisable qui sert de base pour le developpement d\'applications, simplifiant ainsi certaines taches repetitives.', '', '2024-11-04', 2, '', 4),
(17, 'G', 'Git', 'Logiciel de gestion de versions permettant de suivre les modifications dans le code source au fil du temps et de collaborer avec d\'autres developpeurs.', '', '2024-11-04', 2, '', 4),
(18, 'G', 'GUI (Graphical User Interface)', 'Interface graphique permettant aux utilisateurs d\'interagir avec un logiciel via des elements visuels comme des boutons, des icones, et des fenetres.', '', '2024-11-04', 2, '', 6),
(19, 'H', 'Hebergement Web', 'Service permettant de stocker et de rendre accessible un site web ou une application sur Internet.', '', '2024-11-04', 2, '', 6),
(20, 'H', 'HTML (HyperText Markup Language)', 'Langage de balisage utilise pour structurer et presenter le contenu des pages web.\r\n', '', '2024-11-04', 2, '', 5),
(21, 'I', 'IA (Intelligence Artificielle)', 'Simulation de processus d\'intelligence humaine par des machines, en particulier par des systemes informatiques.', '', '2024-11-04', 2, '', 4),
(22, 'I', 'Internet des Objets (IoT)', 'Reseau d\'objets physiques connectes a Internet, capables de collecter et d\'echanger des donnees.', '', '2024-11-04', 2, '', 4),
(23, 'J', 'JavaScript', 'Langage de programmation principalement utilise pour le developpement web et pour rendre les pages interactives.', '', '2024-11-04', 2, '', 4),
(24, 'J', 'JSON (JavaScript Object Notation)', 'Format leger de donnees structure, facile a lire et a ecrire, souvent utilise pour echanger des donnees entre serveurs et clients.', '', '2024-11-04', 2, '', 5),
(25, 'L', 'Langage de programmation', 'Langage utilise pour ecrire les instructions permettant de creer des logiciels ou des scripts.', '', '2024-11-04', 2, '', 4),
(26, 'L', 'Logiciel libre', 'Logiciel dont le code source est accessible et peut etre modifie, distribue et utilise gratuitement.', '', '2024-11-04', 2, '', 4),
(27, 'M', 'Machine Learning (Apprentissage Automatique)', 'Branche de l\'IA permettant aux machines d\'apprendre et d\'ameliorer leurs performances grace a des donnees, sans programmation explicite pour chaque tache.', '', '2024-11-04', 2, '', 4),
(28, 'M', 'Malware', 'Logiciel malveillant concu pour nuire ou exploiter un systeme informatique.', '', '2024-11-04', 2, '', 4),
(29, 'N', 'Network (Reseau)', 'Ensemble d\'ordinateurs ou de dispositifs interconnectes permettant l\'echange d\'informations et de ressources.', '', '2024-11-04', 2, '', 4),
(30, 'N', 'Noeud', 'Dispositif connecte dans un reseau, pouvant etre un ordinateur, un routeur ou un autre peripherique.', '', '2024-11-04', 2, '', 4),
(31, 'O', 'Open Source', 'Logiciel dont le code source est disponible publiquement et peut etre modifie et partage librement.', '', '2024-11-04', 2, '', 5),
(32, 'O', 'Optimisation', 'Processus d\'amelioration des performances d\'un programme, d\'un algorithme ou d\'un systeme informatique.', '', '2024-11-04', 2, '', 4),
(33, 'P', 'Programmation Oriente Objet (POO)', 'Paradigme de programmation base sur la creation et l\'interaction d\'objets, utilises pour modeliser des donnees et des comportements.', '', '2024-11-04', 2, '', 4),
(34, 'P', 'Protocole', 'Ensemble de regles permettant la communication entre des dispositifs ou des systemes informatiques (ex. : HTTP, FTP).', '', '2024-11-04', 2, '', 4),
(35, 'Q', 'QR Code', 'Type de code-barres en deux dimensions qui peut stocker des informations et etre scanne par des dispositifs comme les smartphones', '', '2024-11-04', 2, '', 4),
(36, 'R', 'Reseau Prive Virtuel (VPN)', 'Service de securite qui permet de creer une connexion Internet cryptee et securisee a travers un reseau public', '', '2024-11-04', 2, '', 4),
(37, 'R', 'Routeur', 'Dispositif reseau qui transmet des paquets de donnees entre differents reseaux informatiques.', '', '2024-11-04', 2, '', 4),
(38, 'S', 'Serveur', 'Ordinateur ou programme qui fournit des services, des donnees ou des ressources a d\'autres ordinateurs, appeles clients.', '', '2024-11-04', 2, '', 4),
(39, 'S', 'Securite Informatique', 'Ensemble de mesures visant a proteger les informations et les systemes contre les menaces numeriques.', '', '2024-11-04', 2, '', 4),
(40, 'T', 'Tableau de Bord (Dashboard)', 'Interface visuelle qui regroupe et presente des donnees cles sous forme de graphiques, facilitant l\'analyse et la prise de decision.', '', '2024-11-04', 2, '', 4),
(41, 'T', 'TCP/IP (Transmission Control Protocol/Internet Protocol)', 'Ensemble de protocoles fondamentaux permettant la transmission de donnees sur Internet', '', '2024-11-04', 2, '', 4),
(42, 'U', 'UI (User Interface)', 'Interface utilisateur permettant aux individus d\'interagir avec un logiciel ou un dispositif electronique', '', '2024-11-04', 2, '', 4),
(43, 'U', 'URL (Uniform Resource Locator)', 'Adresse unique permettant d\'acceder a une ressource specifique sur Internet.', '', '2024-11-04', 2, '', 4),
(44, 'V', 'Virtualisation', 'Technique permettant de creer des versions virtuelles de ressources materielle, comme des serveurs, des reseaux ou des systemes de stockage.', '', '2024-11-04', 2, '', 4),
(45, 'V', 'Virus', 'Programme malveillant qui se reproduit et infecte d\'autres programmes ou fichiers.', '', '2024-11-04', 2, '', 4),
(46, 'W', 'Web', 'Ensemble de documents interconnectes accessibles sur Internet via des navigateurs', '', '2024-11-04', 2, '', 4),
(47, 'W', 'Webinaire', 'Seminaire en ligne permettant aux participants de se rencontrer et d\'interagir a distance.', '', '2024-11-04', 2, '', 4),
(50, 'Z', 'ZIP', 'Format de fichier compresse qui permet de reduire la taille des fichiers pour faciliter leur stockage ou leur transmission.', '', '2024-11-04', 2, '', 4),
(48, 'X', 'XHTML (Extensible HyperText Markup Language)', 'Une version plus stricte de HTML qui combine les caracteristiques de HTML et XML pour structurer des documents web tout en assurant leur conformite a la syntaxe XML.', '', '2024-11-25', 2, '', 4),
(49, 'Y', 'Yotta', 'Un prefixe du Systeme international d\'unites (SI) representant 10^24, souvent utilise pour mesurer des quantites astronomiques de donnees ou d\'autres grandeurs.', '', '2024-11-25', 2, '', 4),
(56, 'A', 'Assembler', 'Langage de programmation bas niveau proche du langage machine.', 'Definitions_numérique', '2025-01-27', 2, '', 5),
(57, 'B', 'Backup', 'Sauvegarde des donnees pour prevenir toute perte en cas de panne.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(58, 'B', 'Bit', 'Unite de base de l\'information en informatique, pouvant valoir 0 ou 1.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(59, 'B', 'Blockchain', 'Technologie de stockage et de transmission d\'informations de maniere securisee et decentralisee.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(60, 'B', 'Bluetooth', 'Technologie de communication sans fil a courte portee.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(61, 'B', 'Boot', 'Processus de demarrage d\'un ordinateur ou d\'un systeme.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(62, 'B', 'Bug Bounty', 'Programme encourageant les chercheurs en securite a identifier des failles dans un systeme.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(63, 'B', 'Byte', 'Un ensemble de 8 bits, unite de base du stockage informatique.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(64, 'C', 'Cache', 'Zone de stockage rapide pour accelerer l\'acces aux donnees frequemment utilisees.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(65, 'C', 'Captcha', 'Systeme utilise pour verifier si un utilisateur est humain.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(66, 'C', 'Checksum', 'Valeur utilisee pour verifier l\'integrite d\'un fichier ou d\'une transmission de donnees.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(67, 'C', 'Client', 'Dispositif ou logiciel qui utilise les services d\'un serveur.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(68, 'C', 'Cloud Storage', 'Stockage de donnees sur des serveurs distants accessibles via Internet.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(69, 'C', 'Cluster', 'Ensemble de plusieurs serveurs travaillant ensemble pour ameliorer la performance et la disponibilite.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(70, 'C', 'Compiler', 'Programme qui traduit le code source en langage machine.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(71, 'C', 'Cookie', 'Petit fichier stocke par un site web sur l\'ordinateur de l\'utilisateur pour enregistrer des informations.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(72, 'C', 'Cryptographie', 'Science de la securisation des communications et des donnees par le chiffrement.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(73, 'D', 'Data Center', 'Centre physique regroupant des serveurs pour stocker et gerer des donnees.', 'Definitions_numérique', '2025-01-27', 2, '', 5),
(74, 'D', 'Debugger', 'Outil permettant d\'identifier et de corriger les erreurs dans un programme.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(75, 'D', 'DevOps', 'Methode combinant developpement et operations informatiques pour accelerer la mise en production des logiciels.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(76, 'D', 'DNS (Domain Name System)', 'Systeme traduisant les noms de domaine en adresses IP.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(77, 'D', 'Docker', 'Technologie de virtualisation legere utilisant des conteneurs logiciels.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(78, 'D', 'DOM (Document Object Model)', 'Representation structuree d\'une page web permettant son interaction avec JavaScript.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(79, 'D', 'Driver (Pilote)', 'Logiciel permettant a un systeme d\'exploitation de communiquer avec un materiel.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(80, 'D', 'Dynamic Website', 'Site web dont le contenu peut changer en fonction des interactions des utilisateurs.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(81, 'E', 'Edge Computing', 'Traitement des donnees a proximite de la source plutot que dans le cloud.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(82, 'E', 'Emoji', 'Pictogramme utilise pour exprimer des emotions dans les communications numeriques.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(83, 'E', 'Encryption', 'Processus de codage des donnees pour les proteger contre tout acces non autorise.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(84, 'E', 'Ethernet', 'Technologie de reseau filaire permettant la communication entre ordinateurs.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(85, 'F', 'Failover', 'Systeme redondant qui prend le relais en cas de panne d\'un autre systeme.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(86, 'F', 'File System', 'Methode d\'organisation et de gestion des fichiers sur un support de stockage.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(87, 'F', 'Firmware', 'Logiciel integre dans un materiel informatique assurant son fonctionnement de base.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(88, 'G', 'Gateway', 'Passerelle permettant la communication entre differents reseaux informatiques.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(89, 'H', 'Hacker', 'Personne cherchant a comprendre et a modifier des systemes informatiques.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(90, 'H', 'Hashing', 'Fonction transformant des donnees en une empreinte unique et irreversible.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(91, 'H', 'HTTP (Hypertext Transfer Protocol)', 'Protocole permettant la communication entre un navigateur et un serveur web.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(92, 'H', 'HTTPS', 'Version securisee de HTTP utilisant le chiffrement SSL/TLS.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(93, 'I', 'IDE (Integrated Development Environment)', 'Environnement logiciel regroupant des outils pour developper des programmes.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(94, 'I', 'Indexation', 'Processus d\'organisation et de classification des donnees pour faciliter la recherche.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(95, 'I', 'IP Address', 'Adresse unique attribuee a un dispositif sur un reseau informatique.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(96, 'I', 'ISP (Internet Service Provider)', 'Fournisseur d\'acces a Internet.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(97, 'J', 'Java', 'Langage de programmation oriente objet tres utilise.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(98, 'K', 'Kernel', 'Coeur d\'un systeme d\'exploitation gerant les interactions entre le materiel et les logiciels.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(99, 'L', 'LAN (Local Area Network)', 'Reseau informatique limite a une zone geographique reduite.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(100, 'L', 'Latency', 'Delai entre l\'envoi d\'une requete et la reception de la reponse.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(101, 'L', 'Load Balancer', 'Systeme repartiissant la charge de travail entre plusieurs serveurs.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(102, 'L', 'Logic Bomb', 'Programme malveillant qui s\'active sous certaines conditions.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(103, 'M', 'Malvertising', 'Utilisation de publicites en ligne pour diffuser des logiciels malveillants.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(104, 'M', 'Metadata', 'Donnees decrivant d\'autres donnees.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(105, 'M', 'Microservices', 'Architecture logicielle ou une application est decoupee en services independants.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(106, 'M', 'Middleware', 'Logiciel facilitant la communication entre applications.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(107, 'M', 'Mirror Site', 'Copie d\'un site web pour ameliorer la disponibilite et la rapidite d\'acces.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(108, 'M', 'Modem', 'Dispositif permettant la connexion a Internet via une ligne telephonique.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(109, 'M', 'Multithreading', 'Execution de plusieurs threads en parallele dans un programme.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(110, 'N', 'NAT (Network Address Translation)', 'Methode permettant de mapper plusieurs adresses IP privees vers une seule IP publique.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(111, 'N', 'Node.js', 'Environnement d\'execution pour JavaScript cote serveur.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(112, 'N', 'NoSQL', 'Type de base de donnees non relationnelle adapte aux grands volumes de donnees.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(113, 'O', 'OAuth', 'Protocole permettant l\'authentification securisee des utilisateurs.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(114, 'P', 'Packet', 'Unite de transmission de donnees sur un reseau.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(115, 'P', 'Patch', 'Mise a jour d\'un logiciel pour corriger des bugs ou vulnerabilites.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(116, 'P', 'Peer-to-Peer (P2P)', 'Mode de communication ou chaque ordinateur agit comme client et serveur.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(117, 'P', 'Phishing', 'Technique de fraude visant a recuperer des informations sensibles.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(118, 'P', 'Ping', 'Commande mesurant le temps de reponse entre deux dispositifs reseaux.', 'Definitions_numérique', '2025-01-27', 2, '', 5),
(119, 'P', 'Proxy', 'Serveur jouant le role d\'intermediaire entre un utilisateur et Internet.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(120, 'Q', 'Quantum Computing', 'Informatique utilisant les principes de la mecanique quantique.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(121, 'R', 'RAM (Random Access Memory)', 'Memoire vive temporaire d\'un ordinateur.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(122, 'R', 'Ransomware', 'Malware bloquant l\'acces aux donnees jusqu\'au paiement d\'une rancon.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(123, 'R', 'Rootkit', 'Logiciel malveillant cachant des activites frauduleuses sur un systeme.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(124, 'S', 'Sandbox', 'Environnement isole pour tester des programmes en securite.', 'Definitions_numérique', '2025-01-27', 2, '', 4),
(127, 'g', 'vggf', 'sdfgh', '', '2025-02-04', 3, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `definitionmodif`
--

CREATE TABLE `definitionmodif` (
  `modid` int(11) NOT NULL,
  `modlettre` varchar(1) NOT NULL,
  `modtitre` varchar(100) NOT NULL,
  `modefinition` varchar(1000) NOT NULL,
  `modauteur` varchar(100) NOT NULL,
  `modate` date NOT NULL,
  `valider` int(1) NOT NULL,
  `modemail` varchar(150) NOT NULL,
  `idorigine` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `definitionmodif`
--

INSERT INTO `definitionmodif` (`modid`, `modlettre`, `modtitre`, `modefinition`, `modauteur`, `modate`, `valider`, `modemail`, `idorigine`) VALUES
(1, 'A', 'Automatique', 'Ensemble des sciences et des techniques consacrees aux dispositifs qui fonctionnent sans intervention du travail humain.', 'aaa', '2024-12-17', 1, 'a@a.aa', 66),
(2, 'J', 'JSON (JavaScript Object Notation)', 'Format leger de donnees structure, facile a lire et a ecrire, souvent utilise pour echanger des donnees entre serveurs et clients. ', 'FLEURY', '2025-02-03', 1, 'vvvv@ccccc.gr', 24);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE `lien` (
  `lienid` int(10) NOT NULL,
  `defid` int(10) NOT NULL,
  `catid` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`lienid`, `defid`, `catid`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 10, 1),
(5, 18, 1),
(6, 27, 1),
(7, 19, 1),
(8, 11, 2),
(9, 30, 2),
(10, 17, 2),
(11, 38, 2),
(12, 4, 2),
(13, 5, 2),
(14, 7, 3),
(15, 8, 3),
(16, 12, 4),
(17, 13, 4),
(18, 44, 5),
(19, 45, 5),
(20, 28, 6),
(21, 29, 6),
(23, 9, 3),
(24, 6, 1),
(25, 56, 1),
(26, 57, 9),
(27, 36, 3),
(28, 1, 2),
(31, 20, 1),
(32, 21, 2),
(33, 23, 1),
(34, 25, 1),
(35, 33, 1),
(36, 38, 3),
(37, 37, 3),
(38, 46, 4),
(39, 14, 3),
(40, 14, 4),
(41, 15, 3),
(42, 15, 5),
(43, 16, 1),
(44, 22, 3),
(45, 26, 4),
(46, 26, 1),
(47, 24, 1),
(48, 31, 1),
(49, 32, 5),
(50, 34, 3),
(51, 35, 6),
(52, 39, 3),
(53, 40, 6),
(54, 41, 3),
(55, 42, 6),
(56, 43, 4),
(57, 48, 1),
(58, 47, 4),
(59, 49, 5),
(60, 50, 5),
(61, 57, 5),
(62, 58, 1),
(63, 59, 3),
(64, 60, 3),
(65, 61, 5),
(66, 62, 4),
(67, 63, 1),
(68, 64, 5),
(69, 65, 6),
(70, 66, 5),
(71, 67, 4),
(72, 68, 3),
(73, 68, 5),
(74, 69, 5),
(75, 69, 3),
(76, 70, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lienweb`
--

CREATE TABLE `lienweb` (
  `liendefid` int(100) NOT NULL,
  `lien_web` mediumtext NOT NULL,
  `defid` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `log_admin`
--

CREATE TABLE `log_admin` (
  `id` int(100) NOT NULL,
  `mailadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `log_admin`
--

INSERT INTO `log_admin` (`id`, `mailadmin`, `login_date`) VALUES
(1, 'test@gmail.com', '2025-03-04 13:20:30'),
(2, 'test@gmail.com', '2025-03-10 08:19:01'),
(3, 'test@gmail.com', '2025-03-17 09:28:34');

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

CREATE TABLE `quiz` (
  `quizid` int(100) NOT NULL,
  `lien_quiz` mediumtext NOT NULL,
  `defid` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateurid` int(100) NOT NULL,
  `mailauteur` varchar(100) NOT NULL,
  `commentaire` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `videoid` int(100) NOT NULL,
  `lien_video` mediumtext NOT NULL,
  `defid` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`videoid`, `lien_video`, `defid`, `date`, `auteur`) VALUES
(1, 'https://youtu.be/yQLmgw3rClM?feature=shared', 21, '2025-02-03 09:33:29', 'Matthis');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`catid`);

--
-- Index pour la table `definition`
--
ALTER TABLE `definition`
  ADD PRIMARY KEY (`defid`);

--
-- Index pour la table `definitionmodif`
--
ALTER TABLE `definitionmodif`
  ADD PRIMARY KEY (`modid`);

--
-- Index pour la table `lien`
--
ALTER TABLE `lien`
  ADD PRIMARY KEY (`lienid`);

--
-- Index pour la table `lienweb`
--
ALTER TABLE `lienweb`
  ADD PRIMARY KEY (`liendefid`);

--
-- Index pour la table `log_admin`
--
ALTER TABLE `log_admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizid`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateurid`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`videoid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `catid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `definition`
--
ALTER TABLE `definition`
  MODIFY `defid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT pour la table `definitionmodif`
--
ALTER TABLE `definitionmodif`
  MODIFY `modid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `lien`
--
ALTER TABLE `lien`
  MODIFY `lienid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT pour la table `lienweb`
--
ALTER TABLE `lienweb`
  MODIFY `liendefid` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizid` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateurid` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `videoid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
