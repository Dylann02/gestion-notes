INSERT INTO livres (titre, auteur, isbn, annee_publication, categorie, resume, couverture, statut, created_at, updated_at) VALUES 
('Le Seigneur des Anneaux', 'J.R.R. Tolkien', '9782266286269', 1954, 'Roman', 'L''histoire épique de la lutte pour l''Anneau Unique.', 'seigneur-des-anneaux.jpg', 'disponible', NOW(), NOW()),
('1984', 'George Orwell', '9780451524935', 1949, 'Science-Fiction', 'Une dystopie sur la surveillance totale et le Big Brother.', '1984.jpg', 'prete', NOW(), NOW()),
('Clean Code', 'Robert C. Martin', '9780132350884', 2008, 'Technique', 'Un guide sur l''art de l''écriture de code logiciel propre.', 'clean-code.jpg', 'disponible', NOW(), NOW()),
('Dune', 'Frank Herbert', '9782266233200', 1965, 'Science-Fiction', 'L''épopée de Paul Atréides sur la planète de sable Arrakis.', 'dune.jpg', 'prete', NOW(), NOW()),
('Le Petit Prince', 'Antoine de Saint-Exupéry', '9782070612758', 1943, 'Roman', 'Un conte philosophique sur l''amitié et la vie.', 'petit-prince.jpg', 'disponible', NOW(), NOW()),
('Harry Potter à l''école des sorciers', 'J.K. Rowling', '9782070584620', 1997, 'Fantasy', 'Le premier voyage de Harry à Poudlard et sa découverte du monde des sorciers.', 'harry-potter-1.jpg', 'disponible', NOW(), NOW()),
('Le Nom du vent', 'Patrick Rothfuss', '9782352944215', 2007, 'Fantasy', 'Le récit de Kvothe, musicien, érudit et magicien devenu légende.', 'nom-du-vent.jpg', 'disponible', NOW(), NOW()),
('L''Alchimiste', 'Paulo Coelho', '9782290022780', 1988, 'Roman', 'Le parcours d''un berger andalou à la recherche de son trésor personnel.', 'alchimiste.jpg', 'prete', NOW(), NOW()),
('Sapiens', 'Yuval Noah Harari', '9782226316460', 2011, 'Essai', 'Une fresque sur l''évolution de l''humanité et les grandes révolutions.', 'sapiens.jpg', 'disponible', NOW(), NOW()),
('Le Hobbit', 'J.R.R. Tolkien', '9782266286191', 1937, 'Fantasy', 'Le voyage de Bilbo Baggins vers le Mont Solitaire.', 'hobbit.jpg', 'disponible', NOW(), NOW()),
('Atomic Habits', 'James Clear', '9781847941831', 2018, 'Développement personnel', 'Une méthode simple pour construire de meilleures habitudes au quotidien.', 'atomic-habits.jpg', 'disponible', NOW(), NOW()),
('La Nuit des temps', 'René Barjavel', '9782290036466', 1968, 'Science-Fiction', 'Une expédition antarctique découvre une civilisation enfouie sous la glace.', 'nuit-des-temps.jpg', 'prete', NOW(), NOW());


INSERT INTO emprunts (livre_id, nom_emprunteur, date_emprunt, date_return) VALUES 
(2, 'Sheldon Cooper', '2026-04-15 10:00:00', NULL),
(4, 'Amy Farrah Fowler', '2026-03-12 09:30:00', NULL),
(8, 'Toky', '2026-02-10 14:15:00', '2026-02-24 11:00:00'),
(8, 'Toky', '2026-04-01 16:20:00', NULL),
(12, 'Marie Rakoto', '2026-03-02 08:45:00', NULL);