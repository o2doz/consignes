<?php
/**
 * Script pour créer des comptes de test
 * Exécutez ce fichier une seule fois après avoir configuré la base de données
 */

require_once 'config/database.php';

try {
    // Créer un compte administrateur
    $admin_password = password_hash('Admin123!', PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute(['admin', 'admin@example.com', $admin_password, 'admin']);
    echo "✓ Compte admin créé (username: admin, password: Admin123!)\n";
    
    // Créer un compte utilisateur
    $user_password = password_hash('User123!', PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute(['testuser', 'user@example.com', $user_password, 'user']);
    echo "✓ Compte utilisateur créé (username: testuser, password: User123!)\n";
    
    echo "\n✅ Tous les comptes de test ont été créés avec succès !\n";
    echo "\nVous pouvez maintenant vous connecter avec :\n";
    echo "- Admin : admin / Admin123!\n";
    echo "- User  : testuser / User123!\n";
    
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo "⚠️  Les comptes existent déjà dans la base de données.\n";
    } else {
        echo "❌ Erreur : " . $e->getMessage() . "\n";
    }
}
