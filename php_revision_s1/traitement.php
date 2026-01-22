<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement de l'inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .message {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        .succes {
            color: #27ae60;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .erreur {
            color: #e74c3c;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .info {
            background: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>

<?php
// PARTIE 5 : À COMPLÉTER

// TODO: Inclure functions.php et config.php


// TODO: Vérifier si le formulaire a été soumis
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // TODO: Récupérer les données du formulaire avec $_POST
    // $nom = $_POST['nom'];
    // etc.


    // PARTIE 8 : Validation (à faire plus tard)
    // TODO: Nettoyer les données avec nettoyer_donnee()
    // TODO: Valider avec valider_formulaire()
    // TODO: Afficher les erreurs si la validation échoue
    

    // TODO: Créer le licencié avec creer_licencie()


    // PARTIE 6 : Sauvegarder dans un fichier
    // TODO: Sauvegarder avec sauvegarder_licencie(FICHIER_LICENCIES)


    // PARTIE 7 : Sauvegarder dans la BDD (remplace la partie 6)
    // TODO: Sauvegarder avec inserer_licencie_bdd()


    // TODO: Afficher un message de confirmation
    // echo "<div class='message'>";
    // echo "<div class='succes'>✅ Licencié inscrit avec succès !</div>";
    // etc.


// } else {
    // Si le formulaire n'a pas été soumis, rediriger
    // header('Location: formulaire_licencie.php');
    // exit;
// }

?>

</body>
</html>