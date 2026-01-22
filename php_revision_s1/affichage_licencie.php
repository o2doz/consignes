<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des licenciés</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th {
            background: #3498db;
            color: white;
            padding: 15px;
            text-align: left;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background: #f5f5f5;
        }
        .total {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            color: #2c3e50;
        }
        .retour {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #3498db;
            text-decoration: none;
        }
        .vide {
            text-align: center;
            padding: 50px;
            background: white;
            border-radius: 8px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>

    <h1>📋 Liste des licenciés du club</h1>

<?php
// PARTIE 4 : À COMPLÉTER

// TODO: Inclure functions.php et config.php


// PARTIE 3 : Version avec tableau manuel (pour tester)
// TODO: Créer un tableau de licenciés avec creer_licencie()
// $licencies = [
//     creer_licencie("Dupont", "Jean", 2010),
//     creer_licencie("Martin", "Sophie", 2008),
//     creer_licencie("Bernard", "Luc", 1995)
// ];


// PARTIE 6 : Charger depuis le fichier (remplace la partie 3)
// TODO: Charger les licenciés avec charger_licencies(FICHIER_LICENCIES)


// PARTIE 7 : Charger depuis la BDD (remplace la partie 6)
// TODO: Charger les licenciés avec obtenir_tous_licencies()


// TODO: Vérifier si le tableau est vide
// if (empty($licencies)) {
//     echo "<div class='vide'>Aucun licencié inscrit pour le moment.</div>";
// } else {


    // TODO: Créer un tableau HTML avec les colonnes :
    // Numéro de licence, Nom, Prénom, Âge, Catégorie, Date d'inscription
    
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    // TODO: Ajouter les en-têtes <th>
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    // PARTIE 4 : Boucle foreach
    // TODO: Parcourir $licencies avec foreach
    // foreach ($licencies as $licencie) {
        // TODO: Afficher une ligne <tr> avec les données du licencié
    // }
    
    echo "</tbody>";
    echo "</table>";
    
    // TODO: Afficher le total avec count()
    // echo "<div class='total'>Total : " . count($licencies) . " licencié(s)</div>";

// }

?>

    <a href="index.php" class="retour">← Retour à l'accueil</a>

</body>
</html>