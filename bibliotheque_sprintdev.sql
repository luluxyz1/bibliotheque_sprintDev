SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE admin (
  id_admin int(11) NOT NULL,
  nom varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  mot_de_passe varchar(255) NOT NULL,
  date_creation timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO admin (id_admin, nom, email, mot_de_passe, date_creation) VALUES
(1, 'Lucas', 'lucas.ferreira@edu.ece.fr', 'LucasF94430!', '0000-00-00 00:00:00');

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
(9, '', '', 'dgood@gmail.com', '$2y$12$8ZrHH2eOv7g74yiLFs8yVeMoJRsIEv84KlDKXCcaF/XZWNLZHuC1i', '2024-12-10', 'dgood');

ALTER TABLE admin
  ADD PRIMARY KEY (id_admin),
  ADD UNIQUE KEY email (email);

ALTER TABLE emprunt
  ADD PRIMARY KEY (id_emprunt),
  ADD KEY id_user (id_user),
  ADD KEY id_livre (id_livre);

ALTER TABLE genre
  ADD PRIMARY KEY (id_genre);

ALTER TABLE livre
  ADD PRIMARY KEY (id_livre);

ALTER TABLE users
  ADD PRIMARY KEY (id_user),
  ADD UNIQUE KEY email (email);

ALTER TABLE admin
  MODIFY id_admin int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE emprunt
  MODIFY id_emprunt int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE genre
  MODIFY id_genre int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE livre
  MODIFY id_livre int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE users
  MODIFY id_user int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE emprunt
  ADD CONSTRAINT emprunt_ibfk_1 FOREIGN KEY (id_user) REFERENCES users (id_user) ON DELETE CASCADE,
  ADD CONSTRAINT emprunt_ibfk_2 FOREIGN KEY (id_livre) REFERENCES livre (id_livre) ON DELETE CASCADE;
COMMIT;

