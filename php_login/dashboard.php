<?php
require_once 'config/database.php';
require_once 'includes/session.php';

startSecureSession();
requireLogin();

$username = htmlspecialchars($_SESSION['username']);
$role = htmlspecialchars($_SESSION['role']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h1 {
            font-size: 24px;
        }
        .navbar nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .navbar nav a:hover {
            background: rgba(255,255,255,0.2);
        }
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 20px;
        }
        .card h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .info-item {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .info-item strong {
            display: block;
            color: #667eea;
            margin-bottom: 5px;
            font-size: 14px;
        }
        .info-item span {
            font-size: 18px;
            color: #333;
        }
        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-user {
            background: #e3f2fd;
            color: #1976d2;
        }
        .badge-admin {
            background: #fff3e0;
            color: #e65100;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <h1>Mon Application</h1>
            <nav>
                <a href="dashboard.php">Dashboard</a>
                <?php if (isAdmin()): ?>
                    <a href="admin.php">Admin</a>
                <?php endif; ?>
                <a href="logout.php">Déconnexion</a>
            </nav>
        </div>
    </nav>
    
    <div class="main-content">
        <div class="card">
            <h2>Bienvenue, <?= $username ?> !</h2>
            <p>Vous êtes connecté avec succès à votre espace personnel.</p>
        </div>
        
        <div class="card">
            <h2>Informations du compte</h2>
            <div class="info-grid">
                <div class="info-item">
                    <strong>Nom d'utilisateur</strong>
                    <span><?= $username ?></span>
                </div>
                <div class="info-item">
                    <strong>Rôle</strong>
                    <span class="badge badge-<?= $role ?>">
                        <?= $role === 'admin' ? 'Administrateur' : 'Utilisateur' ?>
                    </span>
                </div>
                <div class="info-item">
                    <strong>Statut</strong>
                    <span style="color: #4caf50;">✓ Actif</span>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h2>Accès rapides</h2>
            <p>Cette page est protégée et accessible uniquement aux utilisateurs connectés.</p>
            <?php if (isAdmin()): ?>
                <p style="margin-top: 10px;">
                    En tant qu'administrateur, vous avez accès à la 
                    <a href="admin.php" style="color: #667eea; font-weight: 600;">page d'administration</a>.
                </p>
            <?php else: ?>
                <p style="margin-top: 10px; color: #999;">
                    Vous n'avez pas accès à la page d'administration (réservée aux admins).
                </p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
