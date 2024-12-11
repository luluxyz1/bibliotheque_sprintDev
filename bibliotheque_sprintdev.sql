DROP DATABASE IF EXISTS bibliotheque_sprintdev;

CREATE DATABASE bibliotheque_sprintdev;
use bibliotheque_sprintdev;


CREATE TABLE admin (
  id_admin int(11) NOT NULL,
  nom varchar(100) NOT NULL,
  prenom varchar(100) NOT NULL,
  email varchar(255) NOT NULL,
  date_creation timestamp NOT NULL DEFAULT current_timestamp(),
  telephone varchar(15) DEFAULT NULL,
  password varchar(255) NOT NULL,
  username varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO admin (id_admin, nom, prenom, email, date_creation, telephone, password, username) VALUES
(1, 'Ferreira', 'Lucas', 'lucas.ferreira@edu.ece.fr', '0000-00-00 00:00:00', '', 'LucasF94430!', 'lulu'),
(4, '', '', 'testMail@gmail.com', '2024-12-10 12:48:46', NULL, '$2y$12$ZhtLyPCaXbRyvIT5uLJix.IyRF4CvSRUgDPOIBVgoZWTmAUJynbMa', 'testUtilisateur'),
(7, '', '', 'admin1@gmail.com', '2024-12-10 18:06:44', NULL, '$2y$12$SLPr6Ythxk0wmRvbMXkxe.bKRKKGNKz2oluvaJ5rxOAlCzSDRFRFq', 'admin1');



CREATE TABLE emprunt (
  id_emprunt int(11) NOT NULL,
  id_user int(11) NOT NULL,
  id_livre int(11) NOT NULL,
  date_emprunt date NOT NULL DEFAULT curdate(),
  date_retour date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE genre (
  id_genre int(11) NOT NULL,
  nom varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO genre (id_genre, nom) VALUES
(1, 'Roman'),
(2, 'Manga'),
(3, 'Science-Fiction'),
(4, 'Thriller');



CREATE TABLE librarian (
  id_bibliothecaire int(11) NOT NULL,
  nom varchar(100) NOT NULL,
  prenom varchar(100) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  date_inscription timestamp NOT NULL DEFAULT current_timestamp(),
  telephone varchar(15) DEFAULT NULL,
  username varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO librarian (id_bibliothecaire, nom, prenom, email, password, date_inscription, telephone, username) VALUES
(1, '', '', 'manon@gmail.com', '$2y$12$oybUoU/NEfTKyjUZ9NN5cusLMXd7nwisDjJKspZf1TyAHSPs3dmHO', '2024-12-10 14:34:44', NULL, 'eeee'),
(2, '', '', 'a@gmail.com', '$2y$12$aFR7qvPFnOyRP5oPDhJu2OFA/OZqzxiCVYJ48hh/FXBdYYiymeRKS', '2024-12-10 18:05:39', NULL, 'A');



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
(32, 'Le Comte de Monte-Cristo', 'Manga', 'Alexandre Dumas', 112, 11, 'Disponible'),
(35, 'Les Misérables', 'Roman', 'Victor Hugo', 2024, 111, 'Réservé');



CREATE TABLE users (
  id_user int(11) NOT NULL,
  nom varchar(100) NOT NULL,
  prenom varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  date_inscription date NOT NULL DEFAULT curdate(),
  username varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO users (id_user, nom, prenom, email, password, date_inscription, username) VALUES
(8, '', '', 'lucas.ferreira@edu.ece.fr', '$2y$12$LhULrmSmS/90vAAdMAC9MOKzmOY469cPB.XUXE8iaeIpPKNchCELu', '2024-12-10', 'lulu'),
(9, '', '', 'dgood@gmail.com', '$2y$12$8ZrHH2eOv7g74yiLFs8yVeMoJRsIEv84KlDKXCcaF/XZWNLZHuC1i', '2024-12-10', 'dgood'),
(10, '', '', 'a@a.fr', '$2y$12$/Rgn3sljuJGLcwdnk8rQCe6i3sbQNkF/NHYd7UN.rBmXrE5gDxVxG', '2024-12-10', 'a'),
(11, '', '', 'luluAA@gmail.com', '$2y$12$3e7Fzqho2.wZPNnHXa6l9unoMe.4vXFx6a2wcpBwMR2rMWxgFoA3a', '2024-12-10', 'luluAA'),
(12, '', '', 'aa@aa.fr', '$2y$12$tskvUXuVand0KjlZRRZXc.gpjnr0v5/XpaBlmngTxssXLl5fi07UG', '2024-12-10', 'aa'),
(13, '', '', 'testUser@gmail.com', '$2y$12$n7kSrSuwl8s0L9x/w2f/XuRn9lZNFgup35jWpjs0w9Q.LCP.VYsL2', '2024-12-10', 'testUser'),
(14, '', '', 'pierre@gmail.com', '$2y$12$yy7TGrvwzeKTnwZC5XLjDevWdX5BEtupew4LTrrs31hxGa1IoSfZe', '2024-12-10', 'az');


ALTER TABLE admin
  ADD PRIMARY KEY (id_admin),
  ADD UNIQUE KEY email (email);


ALTER TABLE emprunt
  ADD PRIMARY KEY (id_emprunt),
  ADD KEY id_user (id_user),
  ADD KEY id_livre (id_livre);

ALTER TABLE genre
  ADD PRIMARY KEY (id_genre);

ALTER TABLE librarian
  ADD PRIMARY KEY (id_bibliothecaire),
  ADD UNIQUE KEY email (email);

ALTER TABLE livre
  ADD PRIMARY KEY (id_livre);

ALTER TABLE users
  ADD PRIMARY KEY (id_user),
  ADD UNIQUE KEY email (email);


ALTER TABLE admin
  MODIFY id_admin int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE emprunt
  MODIFY id_emprunt int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE genre
  MODIFY id_genre int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE librarian
  MODIFY id_bibliothecaire int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE livre
  MODIFY id_livre int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

ALTER TABLE users
  MODIFY id_user int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


ALTER TABLE emprunt
  ADD CONSTRAINT emprunt_ibfk_1 FOREIGN KEY (id_user) REFERENCES users (id_user) ON DELETE CASCADE,
  ADD CONSTRAINT emprunt_ibfk_2 FOREIGN KEY (id_livre) REFERENCES livre (id_livre) ON DELETE CASCADE;
COMMIT;
