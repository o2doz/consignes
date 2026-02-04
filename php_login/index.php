<?php
require_once 'includes/session.php';

startSecureSession();

// Si déjà connecté, rediriger vers le dashboard
if (isLoggedIn()) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système d'authentification</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            padding: 60px 40px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 32px;
        }
        p {
            color: #666;
            margin-bottom: 40px;
            line-height: 1.6;
        }
        .buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        .btn {
            padding: 14px 30px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: transform 0.2s;
            display: inline-block;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }
        .features {
            margin-top: 50px;
            text-align: left;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .features h3 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 18px;
        }
        .features ul {
            list-style: none;
        }
        .features li {
            padding: 8px 0;
            color: #555;
        }
        .features li::before {
            content: '✓ ';
            color: #667eea;
            font-weight: bold;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Système d'authentification</h1>
        <p>Une solution sécurisée pour gérer vos utilisateurs avec PHP, MySQL et PDO.</p>
        
        <div class="buttons">
            <a href="login.php" class="btn btn-primary">Se connecter</a>
            <a href="signup.php" class="btn btn-secondary">S'inscrire</a>
        </div>
        
        <div class="features">
            <h3>Fonctionnalités</h3>
            <ul>
                <li>Inscription et connexion sécurisées</li>
                <li>Gestion des rôles (user / admin)</li>
                <li>Pages protégées par authentification</li>
                <li>Hachage des mots de passe (bcrypt)</li>
                <li>Protection contre les injections SQL (PDO)</li>
                <li>Sessions sécurisées</li>
            </ul>
        </div>
    </div>
</body>
</html>
