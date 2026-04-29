INSERT INTO livres (titre, auteur, isbn, annee_publication, categorie, resume, statut, created_at, updated_at) VALUES 
('Le Seigneur des Anneaux', 'J.R.R. Tolkien', '9782266286269', 1954, 'Roman', 'L''histoire épique de la lutte pour l''Anneau Unique.', 'disponible', NOW(), NOW()),
('1984', 'George Orwell', '9780451524935', 1949, 'Science-Fiction', 'Une dystopie sur la surveillance totale et le Big Brother.', 'disponible', NOW(), NOW()),
('Clean Code', 'Robert C. Martin', '9780132350884', 2008, 'Technique', 'Un guide sur l''art de l''écriture de code logiciel propre.', 'disponible', NOW(), NOW()),
('Dune', 'Frank Herbert', '9782266233200', 1965, 'Science-Fiction', 'L''épopée de Paul Atréides sur la planète de sable Arrakis.', 'prêté', NOW(), NOW()),
('Le Petit Prince', 'Antoine de Saint-Exupéry', '9782070612758', 1943, 'Roman', 'Un conte philosophique sur l''amitié et la vie.', 'disponible', NOW(), NOW());


INSERT INTO emprunts (livre_id, nom_emprunteur, date_emprunt, date_return) VALUES 
(4, 'Sheldon Cooper','2026-04-15 10:00:00', NULL);


INSERT INTO emprunts (livre_id, nom_emprunteur, date_emprunt, date_return) VALUES 
(2, 'Toky', '2026-03-01 09:30:00', '2026-03-15 14:00:00');