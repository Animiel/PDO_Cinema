-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinemadl8
CREATE DATABASE IF NOT EXISTS `cinemadl8` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinemadl8`;

-- Listage de la structure de table cinemadl8. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `nom_acteur` varchar(50) NOT NULL,
  `prenom_acteur` varchar(50) NOT NULL,
  `date_naissance_acteur` date NOT NULL,
  `sexe_acteur` char(5) NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadl8.acteur : ~13 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `date_naissance_acteur`, `sexe_acteur`) VALUES
	(1, 'Vikander', 'Alicia', '1988-10-03', 'F'),
	(2, 'Wu', 'Daniel', '1974-09-30', 'M'),
	(3, 'Goggins', 'Walton', '1971-11-10', 'M'),
	(4, 'Pitt', 'Brad', '1963-12-18', 'M'),
	(5, 'Gosling', 'Ryan', '1980-11-12', 'M'),
	(6, 'Theron', 'Charlize', '1975-08-07', 'F'),
	(7, 'Di Caprio', 'Leonardo', '1974-11-11', 'M'),
	(8, 'Cotillard', 'Marion', '1975-09-30', 'F'),
	(9, 'Canet', 'Guillaume', '1973-04-10', 'M'),
	(10, 'Smith', 'Will', '1968-09-25', 'M'),
	(11, 'Eastwood', 'Clint', '1930-05-31', 'M'),
	(12, 'Sy', 'Omar', '1978-01-20', 'M'),
	(13, 'Norton', 'Edward', '1969-08-18', 'M'),
	(14, 'Hardy', 'Tom', '1977-09-15', 'M'),
	(15, 'Hoult', 'Nicholas', '1989-12-07', 'M'),
	(16, 'Bonham Carter', 'Helena', '1966-05-26', 'F'),
	(17, 'Pratt', 'Chris', '1979-06-21', 'M'),
	(18, 'Hanks', 'Tom', '1956-07-09', 'M'),
	(19, 'Ford', 'Harrison', '1942-07-13', 'M'),
	(20, 'McGregor', 'Ewan', '1971-03-31', 'M'),
	(21, 'Boseman', 'Chadwick', '1977-11-29', 'M'),
	(22, 'B. Jordan', 'Michael', '1987-02-09', 'M'),
	(23, 'Hamill', 'Mark', '1951-09-25', 'M'),
	(24, 'Baker', 'Kenny', '1934-08-24', 'M'),
	(25, 'J. Fox', 'Michael', '1961-06-09', 'M'),
	(26, 'Finney', 'Albert', '1936-05-09', 'M'),
	(27, 'Crowe', 'Russell', '1964-04-07', 'M'),
	(28, 'Wood', 'Elijah', '1981-01-28', 'M'),
	(29, 'Damon', 'Matt', '1970-10-08', 'M'),
	(30, 'Doe', 'John', '2020-08-29', '?'),
	(31, 'zefezfezzfeez', 'ezffzefez', '2020-08-06', 'fezfe');

-- Listage de la structure de table cinemadl8. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL,
  `id_role` int NOT NULL,
  `id_acteur` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_role`,`id_acteur`),
  KEY `casting_ROLE0_FK` (`id_role`),
  KEY `casting_ACTEUR1_FK` (`id_acteur`),
  CONSTRAINT `casting_ACTEUR1_FK` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_FILM_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_ROLE0_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadl8.casting : ~33 rows (environ)
INSERT INTO `casting` (`id_film`, `id_role`, `id_acteur`) VALUES
	(3, 1, 1),
	(8, 4, 4),
	(6, 5, 5),
	(7, 6, 5),
	(5, 7, 6),
	(9, 8, 7),
	(13, 11, 10),
	(10, 12, 11),
	(8, 14, 13),
	(5, 15, 14),
	(9, 16, 14),
	(8, 18, 16),
	(12, 19, 17),
	(14, 20, 17),
	(15, 21, 18),
	(16, 22, 18),
	(17, 23, 19),
	(18, 24, 20),
	(19, 24, 20),
	(20, 24, 20),
	(4, 26, 22),
	(17, 28, 23),
	(17, 29, 24),
	(23, 30, 25),
	(24, 30, 25),
	(25, 30, 25),
	(40, 32, 27),
	(32, 33, 28),
	(33, 33, 28),
	(34, 33, 28),
	(45, 34, 19),
	(80, 35, 29),
	(82, 36, 4);

-- Listage de la structure de table cinemadl8. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre_film` varchar(255) NOT NULL,
  `annee_film` int NOT NULL DEFAULT '0',
  `duree_film` int NOT NULL,
  `resume_film` longtext,
  `note_film` int NOT NULL DEFAULT '0',
  `url_image` varchar(255) DEFAULT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `FILM_REALISATEUR_FK` (`id_realisateur`),
  CONSTRAINT `FILM_REALISATEUR_FK` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadl8.film : ~32 rows (environ)
INSERT INTO `film` (`id_film`, `titre_film`, `annee_film`, `duree_film`, `resume_film`, `note_film`, `url_image`, `id_realisateur`) VALUES
	(2, 'Ready Player One', 2018, 139, '2045. Le monde est au bord du chaos. Les êtres humains se réfugient dans l\'OASIS, univers virtuel mis au point par le brillant et excentrique James Halliday. Avant de disparaître, celui-ci a décidé de léguer son immense fortune à quiconque découvrira l\'œuf de Pâques numérique qu\'il a pris soin de dissimuler dans l\'OASIS', 4, 'https://fr.web.img4.acsta.net/pictures/18/02/14/09/15/3437390.jpg', 1),
	(3, 'Tomb Raider', 2018, 140, 'Lara Croft, 21 ans, n\'a ni projet, ni ambition : fille d\'un explorateur excentrique porté disparu depuis sept ans, cette jeune femme rebelle et indépendante refuse de reprendre l\'empire de son père. Convaincue qu\'il n\'est pas mort, elle met le cap sur la destination où son père a été vu pour la dernière fois : la tombe légendaire d\'une île mythique au large du Japon. Mais le voyage se révèle des plus périlleux et il lui faudra affronter d\'innombrables ennemis et repousser ses propres limites pour devenir "Tomb Raider"…', 3, 'https://3.bp.blogspot.com/-lnWYpUlREzU/WquvshNlE4I/AAAAAAAA2-Y/PaB6arbPYd4smAqVOzMvXWFI8GQSNp6yQCLcBGAs/s1600/TOMB%2BRAIDER.png', 2),
	(4, 'Black Panther', 2018, 135, 'Après les événements qui se sont déroulés dans Captain America : Civil War, T’Challa revient chez lui prendre sa place sur le trône du Wakanda, une nation africaine technologiquement très avancée. Mais lorsqu’un vieil ennemi resurgit, le courage de T’Challa est mis à rude épreuve, aussi bien en tant que souverain qu’en tant que Black Panther. Il se retrouve entraîné dans un conflit qui menace non seulement le destin du Wakanda, mais celui du monde entier…', 4, 'https://afrique.lalibre.be/app/uploads/2019/02/Black-Panther-787x443.jpg', 3),
	(5, 'Mad Max : Fury Road', 2015, 120, 'Hanté par un lourd passé, Mad Max estime que le meilleur moyen de survivre est de rester seul. Cependant, il se retrouve embarqué par une bande qui parcourt la Désolation à bord d\'un véhicule militaire piloté par l\'Imperator Furiosa. Ils fuient la Citadelle où sévit le terrible Immortan Joe qui s\'est fait voler un objet irremplaçable. Enragé, ce Seigneur de guerre envoie ses hommes pour traquer les rebelles impitoyablement… ', 5, 'https://www.telerama.fr/sites/tr_master/files/sheet_media/movie/493457/80534239_555922.jpg', 4),
	(6, 'Drive', 2011, 103, 'Un jeune homme solitaire, "The Driver", conduit le jour à Hollywood pour le cinéma en tant que cascadeur et la nuit pour des truands. Ultra professionnel et peu bavard, il a son propre code de conduite. Jamais il n’a pris part aux crimes de ses employeurs autrement qu’en conduisant - et au volant, il est le meilleur !', 5, 'https://lh3.googleusercontent.com/proxy/4R309tG3h8zYiCdY3GsY4KK7Ah19bCd5akV77wxNmGAIT0LvLGd_lBex-OZt4lp7FbqPmGO676bl1ISNFJoZ-kUZ4Tp7W6vqcByPPTeMIr6GlOjf4A\r\n', 5),
	(7, 'Only God Forgives', 2013, 90, 'À Bangkok, Julian, qui a fui la justice américaine, dirige un club de boxe thaïlandaise servant de couverture à son trafic de drogue.\r\nSa mère, chef d’une vaste organisation criminelle, débarque des États-Unis afin de rapatrier le corps de son fils préféré, Billy : le frère de Julian vient en effet de se faire tuer pour avoir sauvagement massacré une jeune prostituée. Ivre de rage et de vengeance, elle exige de Julian la tête des meurtriers.\r\nJulian devra alors affronter Chang, un étrange policier à la retraite, adulé par les autres flics … ', 4, 'https://www.cinematheque.fr/cache/media/01-films/only-god-forgives-nicolas-winding-refn/s,725-1928ca.jpg', 5),
	(8, 'Fight Club', 1999, 139, 'Le narrateur, sans identité précise, vit seul, travaille seul, dort seul, mange seul ses plateaux-repas pour une personne comme beaucoup d\'autres personnes seules qui connaissent la misère humaine, morale et sexuelle. C\'est pourquoi il va devenir membre du Fight club, un lieu clandestin ou il va pouvoir retrouver sa virilité, l\'échange et la communication. Ce club est dirigé par Tyler Durden, une sorte d\'anarchiste entre gourou et philosophe qui prêche l\'amour de son prochain. ', 5, 'https://sympops.fr/wp-content/uploads/2019/11/article_fightclub.jpg', 6),
	(9, 'The Revenant', 2016, 156, 'Dans une Amérique profondément sauvage, Hugh Glass, un trappeur, est attaqué par un ours et grièvement blessé. Abandonné par ses équipiers, il est laissé pour mort. Mais Glass refuse de mourir. Seul, armé de sa volonté et porté par l’amour qu’il voue à sa femme et à leur fils, Glass entreprend un voyage de plus de 300 km dans un environnement hostile, sur la piste de l’homme qui l’a trahi. Sa soif de vengeance va se transformer en une lutte héroïque pour braver tous les obstacles, revenir chez lui et trouver la rédemption. ', 5, 'https://static.fnac-static.com/multimedia/Images/FD/Comete/67291/CCP_IMG_ORIGINAL/825085.jpg', 7),
	(10, 'Gran Torino', 2009, 111, 'Walt Kowalski est un ancien de la guerre de Corée, un homme inflexible, amer et pétri de préjugés surannés. Après des années de travail à la chaîne, il vit replié sur lui-même, occupant ses journées à bricoler, traînasser et siroter des bières. Avant de mourir, sa femme exprima le voeu qu\'il aille à confesse, mais Walt n\'a rien à avouer, ni personne à qui parler. Hormis sa chienne Daisy, il ne fait confiance qu\'à son M-1, toujours propre, toujours prêt à l\'usage...', 5, 'https://seenonceleb.com/wp-content/uploads/2019/06/The-car-Gran-Torino-Sport-1972-Walt-Kowalski-Clint-Eastwood-in-Gran-Torino-movie.jpg', 8),
	(11, 'Jeux d\'enfants', 2003, 93, 'Une vie entière pour se dire "je t\'aime". 80 ans pour démarrer une histoire d\'amour. Et tout ça à cause d\'un jeu. Ou peut-être grâce à un jeu.\r\nSophie et Julien ont défini les règles du jeu. Ils en sont, pour le restant de leurs vies, les arbitres et souvent les victimes. "Cap ou pas cap ?" "Cap ! Bien sûr ! " Ils sont cap de tout : du meilleur comme du pire.', 3, 'https://cache.cosmopolitan.fr/data/photo/w640_c17/4c/jeux_d_enfants2.jpg', 9),
	(12, 'Jurassic World', 2015, 125, 'L\'Indominus Rex, un dinosaure génétiquement modifié, pure création de la scientifique Claire Dearing, sème la terreur dans le fameux parc d\'attraction. Les espoirs de mettre fin à cette menace reptilienne se portent alors sur le dresseur de raptors Owen Grady et sa cool attitude.', 3, 'https://resize-europe1.lanmedia.fr/r/622,311,forcex,center-middle/img/var/europe1/storage/images/europe1/culture/jurassic-world-le-film-a-t-il-ladn-de-jurassic-park-1353386/21061236-1-fre-FR/Jurassic-World-le-film-a-t-il-l-ADN-de-Jurassic-Park.jpg', 10),
	(13, 'Ali', 2002, 158, 'En faisant preuve de détermination, d\'endurance physique, d\'agressivité et d\'intelligence, Muhammad Ali est devenu une légende vivante de la boxe américaine. Belinda, son épouse, Angelo Dundee, son entraîneur, Drew Brown, son conseiller, Howard Bingham, son photographe et biographe, et Ferdie Pacheco, son docteur, ont été les témoins privilégiés de sa carrière à la fois brillante et mouvementée que ce soit sur ou en dehors du ring.', 3, 'https://theundefeated.com/wp-content/uploads/2016/06/gettyimages-1321752-e1465052647501.jpg', 11),
	(14, 'Les Gardiens de la Galaxie', 2014, 121, 'Peter Quill est un aventurier traqué par tous les chasseurs de primes pour avoir volé un mystérieux globe convoité par le puissant Ronan, dont les agissements menacent l’univers tout entier. Lorsqu’il découvre le véritable pouvoir de ce globe et la menace qui pèse sur la galaxie, il conclut une alliance fragile avec quatre aliens disparates : Rocket, un raton laveur fin tireur, Groot, un humanoïde semblable à un arbre, l’énigmatique et mortelle Gamora, et Drax le Destructeur, qui ne rêve que de vengeance. En les ralliant à sa cause, il les convainc de livrer un ultime combat aussi désespéré soit-il pour sauver ce qui peut encore l’être … ', 5, 'https://d1fmx1rbmqrxrr.cloudfront.net/cnet/optim/i/edit/2019/03/gardiens-galaxy-3-james-gunn-big__w770.jpg', 12),
	(15, 'La Ligne Verte', 2000, 189, 'Paul Edgecomb, Gardien-chef du pénitencier de Cold Mountain en 1935, était chargé de veiller au bon déroulement des exécutions capitales. Parmi les prisonniers se trouvait un colosse du nom de John Coffey... ', 4, 'https://www.forumdesimages.fr/media/cache/fdi_big_overview/media/fdi/36398-la-ligne-verte-_-cc-_2_.jpg', 14),
	(16, 'Forrest Gump', 1994, 140, 'Quelques décennies d\'histoire américaine, des années 1940 à la fin du XXème siècle, à travers le regard et l\'étrange odyssée d\'un homme simple et pur, Forrest Gump.', 4, 'https://static.cnews.fr/sites/default/files/forrest_gump_5ede689564765.jpg', 13),
	(17, 'Star Wars : Episode IV - Un nouvel espoir', 1977, 121, 'Il y a bien longtemps, dans une galaxie très lointaine... La guerre civile fait rage entre l\'Empire galactique et l\'Alliance rebelle. Capturée par les troupes de choc de l\'Empereur menées par le sombre et impitoyable Dark Vador, la princesse Leia Organa dissimule les plans de l\'Etoile Noire, une station spatiale invulnérable, à son droïde R2-D2 avec pour mission de les remettre au Jedi Obi-Wan Kenobi. Accompagné de son fidèle compagnon, le droïde de protocole C-3PO, R2-D2 s\'échoue sur la planète Tatooine et termine sa quête chez le jeune Luke Skywalker. Rêvant de devenir pilote mais confiné aux travaux de la ferme, ce dernier se lance à la recherche de ce mystérieux Obi-Wan Kenobi, devenu ermite au coeur des montagnes désertiques de Tatooine...', 5, 'https://thumb.canalplus.pro/http/unsafe/1280x720/filters:quality(80)/img-hapi.canalplus.pro/ServiceImage/ImageID/72732514', 15),
	(18, 'Star Wars : Episode III - La Revanche des Sith', 2005, 140, 'La Guerre des Clones fait rage. Une franche hostilité oppose désormais le Chancelier Palpatine au Conseil Jedi. Anakin Skywalker, jeune Chevalier Jedi pris entre deux feux, hésite sur la conduite à tenir. Séduit par la promesse d\'un pouvoir sans précédent, tenté par le côté obscur de la Force, il prête allégeance au maléfique Darth Sidious et devient Dark Vador.\r\nLes Seigneurs Sith s\'unissent alors pour préparer leur revanche, qui commence par l\'extermination des Jedi. Seuls rescapés du massacre, Yoda et Obi Wan se lancent à la poursuite des Sith. La traque se conclut par un spectaculaire combat au sabre entre Anakin et Obi Wan, qui décidera du sort de la galaxie.', 5, 'https://miro.medium.com/max/3840/1*TibN5W5DsrnlmHJyknBBmA.jpeg', 15),
	(19, 'Star Wars : Episode I - La Menace fantôme', 1999, 133, 'Avant de devenir un célèbre chevalier Jedi, et bien avant de se révéler l’âme la plus noire de la galaxie, Anakin Skywalker est un jeune esclave sur la planète Tatooine. La Force est déjà puissante en lui et il est un remarquable pilote de Podracer. Le maître Jedi Qui-Gon Jinn le découvre et entrevoit alors son immense potentiel.\r\nPendant ce temps, l’armée de droïdes de l’insatiable Fédération du Commerce a envahi Naboo, une planète pacifique, dans le cadre d’un plan secret des Sith visant à accroître leur pouvoir. Pour défendre la reine de Naboo, Amidala, les chevaliers Jedi vont devoir affronter le redoutable Seigneur Sith, Dark Maul.', 4, 'https://www.stars-actu.fr/wp-content/uploads/2019/12/star-wars-menace-fantome.jpg', 15),
	(20, 'Star Wars : Episode II - L\'Attaque des clones', 2002, 142, 'Depuis le blocus de la planète Naboo par la Fédération du commerce, la République, gouvernée par le Chancelier Palpatine, connaît une véritable crise. Un groupe de dissidents, mené par le sombre Jedi comte Dooku, manifeste son mécontentement envers le fonctionnement du régime. Le Sénat et la population intergalactique se montrent pour leur part inquiets face à l\'émergence d\'une telle menace.\r\nCertains sénateurs demandent à ce que la République soit dotée d\'une solide armée pour empêcher que la situation ne se détériore davantage. Parallèlement, Padmé Amidala, devenue sénatrice, est menacée par les séparatistes et échappe de justesse à un attentat. Le Padawan Anakin Skywalker est chargé de sa protection. Son maître, Obi-Wan Kenobi, part enquêter sur cette tentative de meurtre et découvre la constitution d\'une mystérieuse armée de clones...', 4, 'https://radiodisneyclub.fr/wp-content/uploads/2018/12/star_wars-2-700x438.jpg', 15),
	(23, 'Retour vers le Futur', 1985, 116, NULL, 4, 'https://cdn.radiofrance.fr/s3/cruiser-production/2019/07/42b1a30f-dbc3-4098-8edf-43d32d658906/1200x680_retour_vers_le_futur.jpg', 13),
	(24, 'Retour vers le Futur II', 1989, 107, NULL, 4, 'https://cdn.radiofrance.fr/s3/cruiser-production/2019/07/42b1a30f-dbc3-4098-8edf-43d32d658906/1200x680_retour_vers_le_futur.jpg', 13),
	(25, 'Retour vers le Futur III', 1990, 119, NULL, 3, 'https://cdn.radiofrance.fr/s3/cruiser-production/2019/07/42b1a30f-dbc3-4098-8edf-43d32d658906/1200x680_retour_vers_le_futur.jpg', 13),
	(26, 'Qui veut la peau de Roger Rabbit', 1988, 103, NULL, 3, 'https://www.premiere.fr/sites/default/files/styles/scale_crop_1280x720/public/2018-04/qui-veut-la-peau-de-roger-rabbit-robert-zemeckis-critique-film-warner-bros-film-culte.jpg', 13),
	(27, 'Seul au monde', 2001, 143, NULL, 3, 'https://media.senscritique.com/media/000019463266/1200/Seul_au_monde.jpg', 13),
	(32, 'Le Seigneur des anneaux : La Communauté de l\'anneau', 2001, 228, 'Dans ce chapitre de la trilogie, le jeune et timide Hobbit, Frodon Sacquet, hérite d\'un anneau. Bien loin d\'être une simple babiole, il s\'agit de l\'Anneau Unique, un instrument de pouvoir absolu qui permettrait à Sauron, le Seigneur des ténèbres, de régner sur la Terre du Milieu et de réduire en esclavage ses peuples. À moins que Frodon, aidé d\'une Compagnie constituée de Hobbits, d\'Hommes, d\'un Magicien, d\'un Nain, et d\'un Elfe, ne parvienne à emporter l\'Anneau à travers la Terre du Milieu jusqu\'à la Crevasse du Destin, lieu où il a été forgé, et à le détruire pour toujours. Un tel périple signifie s\'aventurer très loin en Mordor, les terres du Seigneur des ténèbres, où est rassemblée son armée d\'Orques maléfiques... La Compagnie doit non seulement combattre les forces extérieures du mal mais aussi les dissensions internes et l\'influence corruptrice qu\'exerce l\'Anneau lui-même.\r\nL\'issue de l\'histoire à venir est intimement liée au sort de la Compagnie.', 4, 'https://www.slate.fr/sites/default/files/styles/1060x523/public/le-seigneur-des-anneaux-tome-1---la-communaute-de-l-anneau-138962.jpg', 19),
	(33, 'Le Seigneur des anneaux : Les Deux Tours', 2002, 235, 'Après la mort de Boromir et la disparition de Gandalf, la Communauté s\'est scindée en trois. Perdus dans les collines d\'Emyn Muil, Frodon et Sam découvrent qu\'ils sont suivis par Gollum, une créature versatile corrompue par l\'Anneau. Celui-ci promet de conduire les Hobbits jusqu\'à la Porte Noire du Mordor. A travers la Terre du Milieu, Aragorn, Legolas et Gimli font route vers le Rohan, le royaume assiégé de Theoden. Cet ancien grand roi, manipulé par l\'espion de Saroumane, le sinistre Langue de Serpent, est désormais tombé sous la coupe du malfaisant Magicien. Eowyn, la nièce du Roi, reconnaît en Aragorn un meneur d\'hommes. Entretemps, les Hobbits Merry et Pippin, prisonniers des Uruk-hai, se sont échappés et ont découvert dans la mystérieuse Forêt de Fangorn un allié inattendu : Sylvebarbe, gardien des arbres, représentant d\'un ancien peuple végétal dont Saroumane a décimé la forêt... ', 4, 'https://www.stars-actu.fr/wp-content/uploads/2020/06/seigneuranneaux-deuxtours.jpg', 19),
	(34, 'Le Seigneur des anneaux : Le Retour du roi', 2003, 201, 'Les armées de Sauron ont attaqué Minas Tirith, la capitale de Gondor. Jamais ce royaume autrefois puissant n\'a eu autant besoin de son roi. Mais Aragorn trouvera-t-il en lui la volonté d\'accomplir sa destinée ?\r\nTandis que Gandalf s\'efforce de soutenir les forces brisées de Gondor, Théoden exhorte les guerriers de Rohan à se joindre au combat. Mais malgré leur courage et leur loyauté, les forces des Hommes ne sont pas de taille à lutter contre les innombrables légions d\'ennemis qui s\'abattent sur le royaume...\r\nChaque victoire se paye d\'immenses sacrifices. Malgré ses pertes, la Communauté se jette dans la bataille pour la vie, ses membres faisant tout pour détourner l\'attention de Sauron afin de donner à Frodon une chance d\'accomplir sa quête.\r\nVoyageant à travers les terres ennemies, ce dernier doit se reposer sur Sam et Gollum, tandis que l\'Anneau continue de le tenter... ', 4, 'https://i.ytimg.com/vi/m4Laxs3Jxec/maxresdefault.jpg', 19),
	(40, 'Gladiator', 2000, 171, 'Le général romain Maximus est le plus fidèle soutien de l\'empereur Marc Aurèle, qu\'il a conduit de victoire en victoire avec une bravoure et un dévouement exemplaires. Jaloux du prestige de Maximus, et plus encore de l\'amour que lui voue l\'empereur, le fils de MarcAurèle, Commode, s\'arroge brutalement le pouvoir, puis ordonne l\'arrestation du général et son exécution. Maximus échappe à ses assassins mais ne peut empêcher le massacre de sa famille. Capturé par un marchand d\'esclaves, il devient gladiateur et prépare sa vengeance.', 5, 'https://fr.web.img6.acsta.net/r_1280_720/newsv7/20/06/09/20/43/3300763.jpg', 20),
	(45, 'Blade Runner', 1982, 117, 'Dans les dernières années du 20e siècle, des milliers d&#39;hommes et de femmes partent à la conquête de l&#39;espace, fuyant les mégalopoles devenues insalubres. Sur les colonies, une nouvelle race d&#39;esclaves voit le jour : les répliquants, des androïdes que rien ne peut distinguer de l&#39;être humain', 4, 'https://img.huffingtonpost.com/asset/5c9301912300004b00ae09c8.jpeg?ops=scalefit_630_noupscale', 20),
	(80, 'Seul sur Mars', 2015, 151, 'Lors d&#39;une expédition sur Mars, l&#39;astronaute Mark Watney est laissé pour mort par ses coéquipiers, une tempête les ayant obligés à décoller en urgence. Mark a survécu et il est désormais seul, sans moyen de repartir, sur une planète hostile. Il va devoir faire appel à son intelligence et son ingéniosité pour tenter de survivre et trouver un moyen de contacter la Terre.', 4, 'https://o3.llb.be/image/thumb/5614d9d33570b0f19f2ffdf5.jpg', 20),
	(81, 'Taxi Driver', 1976, 114, 'Travis Bickle, un jeune homme du Midwest et ancien marine, est chauffeur de taxi de nuit à New York. Insomniaque et solitaire, il rencontre Betsy, une assistante du sénateur Charles Palantine, candidat à la présidentielle, mais elle le repousse après qu&#39;il l&#39;a emmenée voir un film pornographique. Confronté à la violence et à la perversion de la nuit new-yorkaise, il achète des armes au marché noir et s&#39;entraîne à les manier.', 4, 'https://lh3.googleusercontent.com/proxy/vLr71s4N0_mdLvcs5l4G97I27AmBdG_h4Z88Ebj5uK-kIGRnA4gFzBxvUPkgxO-lDWrvW1MKYqlgIW4CJDWCt83xOfFovSpxr2STgiaEudgXY6yxEiW12CEBm5xtW4bulfOdqrBi4Y05Rl7eZhwki2cd', 21),
	(82, 'Seven', 1995, 128, 'Peu avant sa retraite, l&#39;inspecteur William Somerset, un flic désabusé, est chargé de faire équipe avec un jeune idéaliste, David Mills. Ils enquêtent tout d&#39;abord sur le meurtre d&#39;un homme obèse que son assassin a obligé à manger jusqu&#39;à ce que mort s&#39;ensuive. L&#39;enquête vient à peine de commencer qu&#39;un deuxième crime, tout aussi macabre, est commis, puis un troisième. Petit à petit, les deux policiers font le lien entre tous ces assassinats.', 4, 'https://www.premiere.fr/sites/default/files/styles/scale_crop_1280x720/public/2020-01/seven-film-brad-pitt-morgan-freeman-1280x720.jpg', 6);

-- Listage de la structure de table cinemadl8. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadl8.genre : ~9 rows (environ)
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Science-Fiction'),
	(2, 'Fantasy'),
	(3, 'Thriller'),
	(5, 'Western'),
	(7, 'Drame'),
	(9, 'Romance'),
	(11, 'Policier'),
	(12, 'Fantastique'),
	(13, 'comedie');

-- Listage de la structure de table cinemadl8. genre_film
CREATE TABLE IF NOT EXISTS `genre_film` (
  `id_genre` int NOT NULL,
  `id_film` int NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `genre_film_FILM0_FK` (`id_film`),
  CONSTRAINT `genre_film_FILM0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `genre_film_GENRE_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadl8.genre_film : ~38 rows (environ)
INSERT INTO `genre_film` (`id_genre`, `id_film`) VALUES
	(2, 2),
	(3, 2),
	(2, 3),
	(1, 4),
	(2, 4),
	(1, 5),
	(3, 6),
	(3, 7),
	(7, 7),
	(3, 8),
	(7, 8),
	(5, 9),
	(3, 10),
	(7, 10),
	(7, 11),
	(9, 11),
	(1, 12),
	(1, 14),
	(11, 15),
	(12, 15),
	(7, 16),
	(9, 16),
	(1, 17),
	(1, 18),
	(1, 19),
	(1, 20),
	(2, 32),
	(7, 32),
	(2, 33),
	(7, 33),
	(2, 34),
	(7, 34),
	(1, 45),
	(1, 80),
	(7, 81),
	(11, 81),
	(3, 82),
	(7, 82);

-- Listage de la structure de table cinemadl8. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `nom_realisateur` varchar(50) NOT NULL,
  `prenom_realisateur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadl8.realisateur : ~25 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `nom_realisateur`, `prenom_realisateur`) VALUES
	(1, 'Spielberg', 'Steven'),
	(2, 'Uthaug', 'Roar'),
	(3, 'Coogler', 'Ryan'),
	(4, 'Miller', 'Georges'),
	(5, 'Winding Refn', 'Nicolas'),
	(6, 'Fincher', 'David'),
	(7, 'González Iñárritu', 'Alejandro'),
	(8, 'Eastwood', 'Clint'),
	(9, 'Samuell', 'Yann'),
	(10, 'Trevorrow', 'Colin'),
	(11, 'Mann', 'Michael'),
	(12, 'Gunn', 'James'),
	(13, 'Zemeckis', 'Robert'),
	(14, 'Darabont', 'Frank'),
	(15, 'Lucas', 'Georges'),
	(19, 'Jackson', 'Peter'),
	(20, 'Scott', 'Ridley'),
	(21, 'Scorsese', 'Martin'),
	(22, '', 'Tim'),
	(23, 'Tim', 'Burton'),
	(26, 'Scorsese', 'Martin'),
	(27, 'dededfed', 'eddededede'),
	(28, 'zdzdzdzd', 'dzzzzzzzzzzzzz'),
	(29, 'kzecdsqc', 'ccvcvscvde'),
	(30, 'Tim', 'zdadzdazdaz');

-- Listage de la structure de table cinemadl8. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadl8.role : ~36 rows (environ)
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Lara Croft'),
	(2, 'Lu Ren'),
	(3, 'Mathias Vogel'),
	(4, 'Tyler Durden'),
	(5, 'Le conducteur'),
	(6, 'Julian'),
	(7, 'Imperator Furiosa'),
	(8, 'Hugh Glass'),
	(9, 'Sophie'),
	(10, 'Julien Janvier'),
	(11, 'Muhammad Ali'),
	(12, 'Walt Kowalski'),
	(13, 'Barry'),
	(14, 'Le narrateur'),
	(15, 'Max Rockatansky'),
	(16, 'John Fitzgerald'),
	(17, 'Nux'),
	(18, 'Marla Singer'),
	(19, 'Owen Grady'),
	(20, 'Peter Quill / Star-Lord'),
	(21, 'Paul Edgecomb'),
	(22, 'Forrest Gump'),
	(23, 'Han Solo'),
	(24, 'Obi Wan Kenobi'),
	(25, 'Edward Bloom jeune'),
	(26, 'Panthère Noire'),
	(27, 'Erik Killmonger'),
	(28, 'Luke Skywalker'),
	(29, 'R2-D2'),
	(30, 'Marty McFly '),
	(31, 'Edward Bloom'),
	(32, 'Maximus'),
	(33, 'Frodon Sacquet'),
	(34, 'Rick Deckard'),
	(35, 'Mark Watney'),
	(36, 'Détective David Mills');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
