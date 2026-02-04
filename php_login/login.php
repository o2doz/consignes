<?php
require_once 'config/database.php';
require_once 'includes/session.php';
// Démarrer une session sécurisée
// TODO: Appelez la fonction startSecureSession() pour initialiser la session
// Vérifier si l'utilisateur est déjà connecté
// TODO: Utilisez isLoggedIn() pour vérifier l'état de connexion
// Si connecté, redirigez vers dashboard.php avec header() et exit
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO: Récupérer le nom d'utilisateur (username) depuis $_POST
    // TODO: Récupérer le mot de passe (password) depuis $_POST
    
    // Validation des champs
    // TODO: Vérifiez si username ou password sont vides
    // Si vides, ajoutez "Veuillez remplir tous les champs." au tableau $errors
    
    // Sinon, procéder à la connexion
    // TODO: Préparer la requête SQL pour récupérer l'utilisateur depuis la base
    // Utilisez : SELECT id, username, password, role FROM users WHERE username = ? OR email = ?
    // TODO: Exécuter la requête avec les valeurs [username, username]
    
    // TODO: Récupérer l'utilisateur avec fetch()
    
    // TODO: Vérifier le mot de passe avec password_verify()
    // Si correct, régénérez l'ID de session, stockez les données en session
    // Dans $SESSION, stocker user_id, username et role
    // Puis redirigez vers dashboard.php
    
    // Sinon, ajouter "Identifiants incorrects." à $errors
    // Dans un try-catch pour gérer les erreurs de base de données
    
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
            padding: 40px;
            width: 100%;
            max-width: 450px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 500;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e8ed;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input:focus {
            outline: none;
            border-color: #667eea;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
        }
        .error {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        .link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        
        <?php if (!empty($errors)): ?>
            <div class="error">
                <?php foreach ($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Nom d'utilisateur ou Email</label>
                <input type="text" id="username" name="username" 
                       value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Se connecter</button>
        </form>
        
        <div class="link">
            Pas encore de compte ? <a href="signup.php">S'inscrire</a>
        </div>
    </div>
</body>
</html>
