<?php
require_once 'config/database.php';
require_once 'includes/session.php';

startSecureSession();
requireAdmin();

// Récupérer tous les utilisateurs
try {
    // Utiliser PDO pour faire une requete SQL de selection des utilisateurs ordonné par date de création
    // Stocker les resultats dans la variable $users
} catch (PDOException $e) {
    $users = [];
    $error = "Erreur lors de la récupération des utilisateurs.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
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
            display: flex;
            align-items: center;
        }
        .card h2::before {
            content: '🔒';
            margin-right: 10px;
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e1e8ed;
        }
        th {
            background: #f8f9fa;
            color: #667eea;
            font-weight: 600;
        }
        tr:hover {
            background: #f8f9fa;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-admin {
            background: #fff3e0;
            color: #e65100;
        }
        .badge-user {
            background: #e3f2fd;
            color: #1976d2;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-card h3 {
            color: #999;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 10px;
        }
        .stat-card .number {
            font-size: 36px;
            font-weight: 700;
            color: #667eea;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <h1>Panneau d'Administration</h1>
            <nav>
                <a href="dashboard.php">Dashboard</a>
                <a href="admin.php">Admin</a>
                <a href="logout.php">Déconnexion</a>
            </nav>
        </div>
    </nav>
    
    <div class="main-content">
        <div class="stats">
            <div class="stat-card">
                <h3>Total utilisateurs</h3>
                <div class="number"><?= count($users) ?></div>
            </div>
            <div class="stat-card">
                <h3>Administrateurs</h3>
                <div class="number">
                    <?= count(array_filter($users, fn($u) => $u['role'] === 'admin')) ?>
                </div>
            </div>
            <div class="stat-card">
                <h3>Utilisateurs</h3>
                <div class="number">
                    <?= count(array_filter($users, fn($u) => $u['role'] === 'user')) ?>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h2>Gestion des utilisateurs</h2>
            
            <?php if (isset($error)): ?>
                <p style="color: #c33; padding: 10px; background: #fee; border-radius: 5px;">
                    <?= htmlspecialchars($error) ?>
                </p>
            <?php endif; ?>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Date de création</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td>
                                <span class="badge badge-<?= $user['role'] ?>">
                                    <?= htmlspecialchars($user['role']) ?>
                                </span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($user['created_at'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
