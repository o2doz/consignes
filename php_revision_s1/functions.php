<?php
/**
 * Fichier contenant toutes les fonctions du projet
 */

// PARTIE 2 : Fonctions de base

/**
 * Calcule l'âge à partir de l'année de naissance
 * @param int $annee_naissance L'année de naissance
 * @return int L'âge calculé
 */
function calculer_age($annee_naissance) {
    // TODO: Calculer l'âge
    // Indice: utilisez date('Y') pour obtenir l'année actuelle
    // return année_actuelle - année_naissance
}

/**
 * Détermine la catégorie en fonction de l'âge
 * @param int $age L'âge du licencié
 * @return string La catégorie
 */
function determiner_categorie($age) {
    // TODO: Utiliser des conditions if/elseif/else pour retourner :
    // "Poussin" si 6-8 ans
    // "Benjamin" si 9-11 ans
    // "Minime" si 12-14 ans
    // "Cadet" si 15-17 ans
    // "Senior" si 18+ ans
}

/**
 * Génère un numéro de licence aléatoire à 6 chiffres
 * @return string Le numéro de licence
 */
function generer_numero_licence() {
    // TODO: Générer un nombre aléatoire entre 100000 et 999999
    // Indice: utilisez rand()
}


// PARTIE 3 : Tableaux associatifs

/**
 * Crée un licencié avec toutes ses informations
 * @param string $nom Le nom du licencié
 * @param string $prenom Le prénom du licencié
 * @param int $annee_naissance L'année de naissance
 * @return array Tableau associatif contenant toutes les infos du licencié
 */
function creer_licencie($nom, $prenom, $annee_naissance) {
    // TODO: Créer et retourner un tableau associatif avec :
    // 'numero_licence' => generer_numero_licence()
    // 'nom' => strtoupper($nom)
    // 'prenom' => $prenom
    // 'annee_naissance' => $annee_naissance
    // 'age' => calculer_age($annee_naissance)
    // 'categorie' => determiner_categorie(l'âge calculé)
    // 'date_inscription' => date('d/m/Y')
}


// PARTIE 6 : Gestion des fichiers

/**
 * Sauvegarde un licencié dans un fichier texte
 * @param array $licencie Le tableau associatif du licencié
 * @param string $fichier Le chemin du fichier
 */
function sauvegarder_licencie($licencie, $fichier) {
    // TODO: 
    // 1. Convertir le tableau en chaîne avec serialize()
    // 2. Ajouter un retour à la ligne à la fin (\n)
    // 3. Sauvegarder dans le fichier avec file_put_contents()
    //    N'oubliez pas le flag FILE_APPEND pour ajouter à la fin
}

/**
 * Charge tous les licenciés depuis un fichier
 * @param string $fichier Le chemin du fichier
 * @return array Tableau contenant tous les licenciés
 */
function charger_licencies($fichier) {
    // TODO:
    // 1. Vérifier si le fichier existe avec file_exists()
    // 2. Si non, retourner un tableau vide : return [];
    // 3. Si oui :
    //    - Lire toutes les lignes avec file()
    //    - Créer un tableau vide $licencies = []
    //    - Parcourir chaque ligne avec foreach
    //    - Désérialiser chaque ligne avec unserialize()
    //    - Ajouter au tableau $licencies
    //    - Retourner le tableau
}


// PARTIE 7 : Base de données

/**
 * Crée une connexion à la base de données
 * @return mysqli L'objet de connexion
 */
function connecter_bdd() {
    // TODO:
    // 1. Créer une connexion avec new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME)
    // 2. Vérifier les erreurs avec $conn->connect_error
    // 3. Si erreur, afficher un message et arrêter le script avec die()
    // 4. Définir le charset UTF-8 avec $conn->set_charset('utf8')
    // 5. Retourner la connexion
}

/**
 * Insère un licencié dans la base de données
 * @param array $licencie Le tableau associatif du licencié
 * @return bool True si succès, False sinon
 */
function inserer_licencie_bdd($licencie) {
    // TODO:
    // 1. Connecter à la BDD
    // 2. Préparer la requête INSERT avec prepare()
    //    "INSERT INTO licencies (numero_licence, nom, prenom, annee_naissance, age, categorie, date_inscription) VALUES (?, ?, ?, ?, ?, ?, ?)"
    // 3. Lier les paramètres avec bind_param('sssiiis', ...)
    //    s = string, i = integer
    // 4. Exécuter avec execute()
    // 5. Fermer le statement et la connexion
    // 6. Retourner true ou false selon le résultat
}

/**
 * Récupère tous les licenciés de la base de données
 * @return array Tableau de tous les licenciés
 */
function obtenir_tous_licencies() {
    // TODO:
    // 1. Connecter à la BDD
    // 2. Exécuter la requête "SELECT * FROM licencies ORDER BY nom"
    // 3. Récupérer tous les résultats avec fetch_assoc() dans une boucle while
    // 4. Retourner le tableau de résultats
}


// PARTIE 8 : Validation et sécurité

/**
 * Valide les données du formulaire
 * @param string $nom Le nom
 * @param string $prenom Le prénom
 * @param int $annee_naissance L'année de naissance
 * @return array Tableau avec 'valide' (bool) et 'erreurs' (array)
 */
function valider_formulaire($nom, $prenom, $annee_naissance) {
    // TODO:
    // 1. Créer un tableau $erreurs = []
    // 2. Vérifier si $nom est vide avec empty() => ajouter une erreur
    // 3. Vérifier si $prenom est vide => ajouter une erreur
    // 4. Vérifier si $annee_naissance est entre 1950 et 2020 => ajouter une erreur si non
    // 5. Retourner un tableau :
    //    ['valide' => count($erreurs) === 0, 'erreurs' => $erreurs]
}

/**
 * Nettoie une donnée reçue d'un formulaire
 * @param string $donnee La donnée à nettoyer
 * @return string La donnée nettoyée
 */
function nettoyer_donnee($donnee) {
    // TODO:
    // 1. Supprimer les espaces avec trim()
    // 2. Supprimer les balises HTML avec strip_tags()
    // 3. Convertir les caractères spéciaux avec htmlspecialchars()
    // 4. Retourner le résultat
}

/**
 * Recherche un licencié par son numéro de licence
 * @param string $numero_licence Le numéro à rechercher
 * @return array|null Le licencié trouvé ou null
 */
function obtenir_licencie_par_numero($numero_licence) {
    // TODO:
    // 1. Connecter à la BDD
    // 2. Préparer une requête SELECT avec WHERE numero_licence = ?
    // 3. Exécuter et retourner le résultat
}

?>