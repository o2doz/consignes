<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription d'un licencié</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #34495e;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #229954;
        }
        .retour {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h1>⚽ Inscription d'un nouveau licencié</h1>

    <!-- PARTIE 5 : À COMPLÉTER -->
    <!-- TODO: Créer un formulaire avec :
         - method="POST"
         - action="traitement.php"
         - Un champ texte pour le nom (name="nom", required)
         - Un champ texte pour le prénom (name="prenom", required)
         - Un champ number pour l'année de naissance (name="annee_naissance", min="1950", max="2020", required)
         - Un bouton submit "Inscrire le licencié"
    -->

    <form method="POST" action="traitement.php">
        <!-- TODO: Ajouter les champs ici -->
        
        
    </form>

    <a href="index.php" class="retour">← Retour à l'accueil</a>

</body>
</html>