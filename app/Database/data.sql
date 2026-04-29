-- Données extraites du PDF pour peupler la base de données

-- Insertion des semestres
INSERT INTO semestres (numero) VALUES (3), (4);

-- Insertion des matières
-- Semestre 3
INSERT INTO matieres (nom, libelle, credit) VALUES
('INF201', 'Programmation orientée objet', 6),
('INF202', 'Bases de données objets', 6),
('INF203', 'Programmation système', 4),
('INF208', 'Réseaux informatiques', 6),
('MTH201', 'Méthodes numériques', 4),
('ORG201', 'Bases de gestion', 4);

-- Semestre 4 - Optionnelles et communes
INSERT INTO matieres (nom, libelle, credit) VALUES
('INF204', 'Système d''information géographique', 6),
('INF205', 'Système d''information', 6),
('INF206', 'Interface Homme/Machine', 6),
('INF207', 'Éléments d''algorithmique', 6),
('INF209', 'Web dynamique', 6),
('INF210', 'Mini-projet de développement', 10),
('INF211', 'Mini-projet de bases de données et/ou de réseaux', 10),
('INF212', 'Mini-projet de Web et design', 10),
('MTH202', 'Analyse des données', 4),
('MTH203', 'MAO', 4),
('MTH204', 'Géométrie', 4),
('MTH205', 'Équations différentielles', 4),
('MTH206', 'Optimisation', 4);

-- Insertion des parcours
INSERT INTO parcours (nom, semestre_id) VALUES
('Développement', 2),
('Bases de Données et Réseaux', 2),
('Web et Design', 2);

-- Insertion des liens matières-parcours
-- Parcours Développement (id = 1)
-- UE obligatoire: INF207, INF210, MTH203
INSERT INTO liens_matieres_parcours (matiere_id, parcours_id, groupe_optionnelle) VALUES
(7, 1, 0),   -- INF207 obligatoire
(11, 1, 0),  -- INF210 obligatoire
(10, 1, 0),  -- MTH203 obligatoire
-- UE optionnelle groupe 1 (INF204, INF205, INF206)
(5, 1, 1),   -- INF204
(6, 1, 1),   -- INF205
(7, 1, 1),   -- INF206
-- UE optionnelle groupe 2 (MTH204, MTH205, MTH206)
(11, 1, 2),  -- MTH204
(12, 1, 2),  -- MTH205
(13, 1, 2);  -- MTH206

-- Parcours Bases de Données et Réseaux (id = 2)
INSERT INTO liens_matieres_parcours (matiere_id, parcours_id, groupe_optionnelle) VALUES
(6, 2, 0),   -- INF205 obligatoire
(12, 2, 0),  -- INF211 obligatoire
(10, 2, 0),  -- MTH203 obligatoire
-- UE optionnelle groupe 1 (INF204, INF206, INF207)
(5, 2, 1),   -- INF204
(7, 2, 1),   -- INF206
(8, 2, 1),   -- INF207
-- UE optionnelle groupe 2 (MTH202, MTH205, MTH206)
(9, 2, 2),   -- MTH202
(12, 2, 2),  -- MTH205
(13, 2, 2);  -- MTH206

-- Parcours Web et Design (id = 3)
INSERT INTO liens_matieres_parcours (matiere_id, parcours_id, groupe_optionnelle) VALUES
(9, 3, 0),   -- INF209 obligatoire
(13, 3, 0),  -- INF212 obligatoire
(10, 3, 0),  -- MTH203 obligatoire
-- UE optionnelle groupe 1 (INF204, INF205, INF206)
(5, 3, 1),   -- INF204
(6, 3, 1),   -- INF205
(7, 3, 1),   -- INF206
-- UE optionnelle groupe 2 (MTH202, MTH204, MTH206)
(9, 3, 2),   -- MTH202
(11, 3, 2),  -- MTH204
(13, 3, 2);  -- MTH206

-- Insertion d'étudiants de test
INSERT INTO etudiants (nom, etu) VALUES
('Andrianampoinimerina Jean', 'ETU001'),
('Rakoto Marie', 'ETU002'),
('Zafimaniry Pierre', 'ETU003'),
('Ramitandrianampoinimerina Sophie', 'ETU004'),
('Rajaonah Isabelle', 'ETU005'),
('Andriamampoinimerina Luc', 'ETU006'),
('Rakotoson Ahmed', 'ETU007'),
('Ramaholimihaso Fatima', 'ETU008');

-- Insertion d'utilisateurs de test
INSERT INTO users (email, mdp) VALUES
('jean@example.com', '$2y$10$example1'),
('marie@example.com', '$2y$10$example2'),
('pierre@example.com', '$2y$10$example3');

-- Insertion de notes de test pour quelques étudiants
-- Étudiant 1 (Jean) - Parcours Développement
INSERT INTO notes (etudiant_id, matiere_id, valeur) VALUES
(1, 1, 15.50),  -- INF201
(1, 2, 14.75),  -- INF202
(1, 3, 16.00),  -- INF203
(1, 4, 13.50),  -- INF208
(1, 5, 14.25),  -- MTH201
(1, 6, 15.00),  -- ORG201
(1, 8, 16.50),  -- INF206
(1, 8, 17.00),  -- INF207
(1, 11, 15.75); -- INF210

-- Étudiant 2 (Marie) - Parcours Bases de Données
INSERT INTO notes (etudiant_id, matiere_id, valeur) VALUES
(2, 1, 14.00),  -- INF201
(2, 2, 16.50),  -- INF202
(2, 3, 15.00),  -- INF203
(2, 4, 16.75),  -- INF208
(2, 5, 15.50),  -- MTH201
(2, 6, 14.75),  -- ORG201
(2, 6, 16.25),  -- INF205
(2, 8, 15.50),  -- INF207
(2, 12, 16.00); -- INF211

-- Étudiant 3 (Pierre) - Parcours Web et Design
INSERT INTO notes (etudiant_id, matiere_id, valeur) VALUES
(3, 1, 13.50),  -- INF201
(3, 2, 15.25),  -- INF202
(3, 3, 14.00),  -- INF203
(3, 4, 14.50),  -- INF208
(3, 5, 13.75),  -- MTH201
(3, 6, 14.25),  -- ORG201
(3, 9, 16.00),  -- INF209
(3, 6, 15.50),  -- INF205
(3, 13, 16.75); -- INF212
