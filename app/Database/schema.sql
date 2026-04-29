CREATE DATABASE Bibliotheque
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

use Bibliotheque;

CREATE TABLE livres (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    auteur VARCHAR(255) NOT NULL,
    isbn VARCHAR(13) UNIQUE NOT NULL,
    annee_publication YEAR,
    categorie VARCHAR(100),
    resume TEXT,
    couverture VARCHAR(255),
    statut ENUM('disponible', 'prete') DEFAULT 'disponible',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE emprunts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    livre_id INT UNSIGNED NOT NULL,
    nom_emprunteur VARCHAR(150) NOT NULL,
    date_emprunt DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_return DATETIME NULL,
    CONSTRAINT fk_livre FOREIGN KEY (livre_id) REFERENCES livres(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE utilisateurs(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('admin','bibliothecaire', 'utilisateur') DEFAULT 'utilisateur'
) ENGINE=InnoDB;