
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE bibliotheque_sprintdev;
USE bibliotheque_sprintdev;


CREATE TABLE livre (
  id_livre int(10) NOT NULL,
  nom_livre varchar(255) DEFAULT NULL,
  genre_livre varchar(255) DEFAULT NULL,
  auteur_livre varchar(255) DEFAULT NULL,
  annee_livre int(10) DEFAULT NULL,
  tome_livre int(10) DEFAULT NULL,
  etat_livre varchar(255) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO livre (id_livre, nom_livre, genre_livre, auteur_livre, annee_livre, tome_livre, etat_livre) VALUES
(1, 'Les Misérables', 'Roman', 'Victor Hugo', 1862, NULL, 'Disponible'),
(2, 'GTO', 'Manga', 'Toru Fujisawa', 1997, 1, 'Disponible'),
(3, 'GTO', 'Manga', 'Toru Fujisawa', 1997, 2, 'Disponible');


ALTER TABLE livre
  ADD PRIMARY KEY (id_livre);

ALTER TABLE livre
  MODIFY id_livre int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;