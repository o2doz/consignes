<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club de Football - Accueil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        .info-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .menu {
            list-style: none;
            padding: 0;
        }
        .menu li {
            margin: 10px 0;
        }
        .menu a {
            display: block;
            padding: 15px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        .menu a:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>

<?php
// PARTIE 1 : À COMPLÉTER
// TODO: Inclure le fichier functions.php avec require

// TODO: Créer les variables suivantes :

// TODO: Afficher le titre avec le nom du club et l'année de création

// TODO: Créer une variable $categorie avec "Senior" et l'afficher


// PARTIE 2 : TESTER VOS FONCTIONS
// TODO: Tester la fonction calculer_age() avec l'année 2005
// TODO: Afficher la catégorie correspondante

?>

    <div class="info-box">
        <h2>Menu principal</h2>
        <ul class="menu">
            <li><a href="formulaire_licencie.php">➕ Inscrire un nouveau licencié</a></li>
            <li><a href="affichage_licencies.php">📋 Voir tous les licenciés</a></li>
        </ul>
    </div>

</body>
</html>