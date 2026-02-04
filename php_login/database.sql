-- Création de la base de données
CREATE DATABASE IF NOT EXISTS auth_system CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE auth_system;

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
    -- AJOUTER LES CHAMPS USERNAME, EMAIL et PASSWORD DANS LA TABLE
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_username (username),
    INDEX idx_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion d'un utilisateur admin par défaut
-- Mot de passe: Admin123!
INSERT INTO users (username, email, password, role) VALUES 
('admin', 'admin@example.com', '$2y$10$YourHashedPasswordHere', 'admin');

-- Insertion d'un utilisateur normal pour test
-- Mot de passe: User123!
-- Nom: testuser
-- Mail: user@example.com
INSERT INTO users (username, email, password, role) VALUES 
();
