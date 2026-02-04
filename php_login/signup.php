<?php
require_once 'config/database.php';
require_once 'includes/session.php';

// Démarrer une session sécurisée
startSecureSession();

// Vérifier si l'utilisateur est déjà connecté
if (isLoggedIn()) {
    header('Location: dashboard.php');
    exit;
}

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO: Récuperer les données suivantes depuis $_POST et peupler les variables
    $username = "";
    $email = "";
    $password = "";
    $confirm_password = "";

    // Validation des champs
    if (false) { // TODO: Vérifier si le nom d'utilisateur est vide ()
        $errors[] = "Le nom d'utilisateur est requis.";
    } elseif (false) { // TODO: Vérifier la longueur du nom d'utilisateur 
        $errors[] = "Le nom d'utilisateur doit contenir entre 3 et 50 caractères.";
    }

    if (false) { // TODO: Vérifier si l'email est vide (empty($email))
        $errors[] = "L'email est requis.";
    } elseif (false) { // TODO: Vérifier si l'email n'est pas valide (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = "L'email n'est pas valide.";
    }

    if (false) { // TODO: Vérifier si le mot de passe est vide)
        $errors[] = "Le mot de passe est requis.";
    } elseif (false) { // TODO: Vérifier la lgueur du mot de passe 
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
    }

    if (false) { // TODO: Vérifier si les mots de passe correspondent ($password !== $confirm_password)
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // Si pas d'erreurs, vérifier l'unicité et créer l'utilisateur
    if (empty($errors)) {
        try {
            // TODO: Vérifier si le nom d'utilisateur existe déjà
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->execute([$username]);
            if (false) { // TODO: Vérifier si fetch() retourne quelque chose
                $errors[] = "Ce nom d'utilisateur est déjà utilisé.";
            }

            // TODO: Vérifier si l'email existe déjà
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if (false) { // TODO: Vérifier si fetch() retourne quelque chose
                $errors[] = "Cet email est déjà utilisé.";
            }

            // Si toujours pas d'erreurs, créer l'utilisateur
            if (empty($errors)) {
                // TODO: Hasher le mot de passe avec password_hash($password, PASSWORD_DEFAULT)
                $hashed_password = '';

                // TODO: Préparer la requête d'insertion
                $stmt = $pdo->prepare("");
                $stmt->execute();

                $success = "Compte créé avec succès ! Vous pouvez maintenant vous connecter.";
            }
        } catch (PDOException $e) {
            $errors[] = "Une erreur est survenue lors de la création du compte.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
        .success {
            background: #efe;
            border: 1px solid #cfc;
            color: #3c3;
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
        <h1>Inscription</h1>
        
        <?php if (!empty($errors)): ?>
            <div class="error">
                <?php foreach ($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="success">
                <p><?= htmlspecialchars($success) ?></p>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" 
                       value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
            </div>
            
            <!-- TODO: Ajouter un label et input pour l'email, de la maniere maniere que pour le username ci dessous mais pour l'email -->
            
            <!-- TODO: Ajouter un label et input pour le mot de passe, de la maniere maniere que pour le username ci dessous mais pour l'email -->

            
            <div class="form-group">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            
            <button type="submit">S'inscrire</button>
        </form>
        
        <div class="link">
            Déjà un compte ? <a href="login.php">Se connecter</a>
        </div>
    </div>
</body>
</html>
