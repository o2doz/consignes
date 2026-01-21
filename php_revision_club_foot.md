# AP : Révision des bases PHP
## Gestion des licenciés d'un club de football

Vous allez créer un système simple de gestion des licenciés d'un club de football en utilisant les bases du PHP. Chaque étape vous permettra de réviser un concept important. À la fin, vous rendrez un fichier texte contenant vos réponses aux questions.

**Durée estimée : 2h30**

---

## Fichiers de base fournis

Avant de commencer, téléchargez et décompressez l'archive contenant les fichiers de départ. Vous devriez avoir la structure suivante :

```
club_football/
│
├── index.php (à compléter)
├── config.php (à compléter)
├── functions.php (à compléter)
├── formulaire_licencie.php (à compléter)
├── affichage_licencies.php (à compléter)
├── traitement.php (à compléter)
└── data/
    └── licencies.txt (vide au départ)
```

---

## Partie 1 : Variables et affichage de base

**Objectif :** Manipuler les variables PHP et afficher des informations.

### Tâches :

1. Ouvrez le fichier `index.php`
2. Créez les variables suivantes :
   - `$nom_club` contenant "FC Paris United"
   - `$annee_creation` contenant 1998
   - `$nombre_licencies` contenant 0 (pour l'instant)
   
3. Affichez un titre HTML qui affiche : "Bienvenue au [nom du club], fondé en [année]"

4. Créez une variable `$categorie` avec la valeur "Senior" et affichez-la dans un paragraphe

**Question 1 :** Quelle est la différence entre `echo` et `print` en PHP ?

**Question 2 :** Comment concatène-t-on (assemble-t-on) du texte et des variables en PHP ?

---

## Partie 2 : Fonctions

**Objectif :** Créer et utiliser des fonctions réutilisables.

### Tâches :

1. Ouvrez le fichier `functions.php`

2. Créez une fonction `calculer_age($annee_naissance)` qui :
   - Prend en paramètre une année de naissance
   - Retourne l'âge de la personne (année actuelle - année de naissance)
   - Indice : utilisez `date('Y')` pour obtenir l'année actuelle

3. Créez une fonction `determiner_categorie($age)` qui retourne :
   - "Poussin" si l'âge est entre 6 et 8 ans
   - "Benjamin" si l'âge est entre 9 et 11 ans
   - "Minime" si l'âge est entre 12 et 14 ans
   - "Cadet" si l'âge est entre 15 et 17 ans
   - "Senior" si l'âge est 18 ans ou plus
   - Utilisez des conditions `if/elseif/else`

4. Créez une fonction `generer_numero_licence()` qui retourne un numéro aléatoire à 6 chiffres
   - Indice : utilisez `rand(100000, 999999)`

5. Dans `index.php`, ajoutez en haut du fichier :
   ```php
   <?php require 'functions.php'; ?>
   ```

6. Testez vos fonctions en affichant l'âge d'une personne née en 2005 et sa catégorie

**Question 3 :** À quoi sert le mot-clé `return` dans une fonction ?

**Question 4 :** Quelle est la différence entre `require` et `include` ?

---

## Partie 3 : Tableaux associatifs

**Objectif :** Manipuler des tableaux pour stocker des données structurées.

### Tâches :

1. Dans `functions.php`, créez une fonction `creer_licencie($nom, $prenom, $annee_naissance)` qui retourne un tableau associatif avec les clés suivantes :
   - `numero_licence` : généré avec `generer_numero_licence()`
   - `nom` : le nom passé en paramètre (en majuscules avec `strtoupper()`)
   - `prenom` : le prénom passé en paramètre
   - `annee_naissance` : l'année passée en paramètre
   - `age` : calculé avec `calculer_age()`
   - `categorie` : déterminée avec `determiner_categorie()`
   - `date_inscription` : la date du jour au format "d/m/Y" (utilisez `date()`)

2. Dans `index.php`, créez manuellement un tableau `$licencies` contenant 3 licenciés exemple :
   ```php
   $licencies = [
       creer_licencie("Dupont", "Jean", 2010),
       creer_licencie("Martin", "Sophie", 2008),
       creer_licencie("Bernard", "Luc", 1995)
   ];
   ```

3. Affichez le nombre total de licenciés avec `count($licencies)`

**Question 5 :** Quelle est la différence entre un tableau indexé et un tableau associatif ?

**Question 6 :** Comment accède-t-on à la valeur d'une clé spécifique dans un tableau associatif ?

---

## Partie 4 : Boucles et affichage dynamique

**Objectif :** Parcourir des tableaux avec des boucles.

### Tâches :

1. Ouvrez le fichier `affichage_licencies.php`

2. En haut du fichier, ajoutez `require 'functions.php';`

3. Créez un tableau de licenciés (comme dans la Partie 3)

4. Créez un tableau HTML qui affiche tous les licenciés avec les colonnes :
   - Numéro de licence
   - Nom
   - Prénom
   - Âge
   - Catégorie
   - Date d'inscription

5. Utilisez une boucle `foreach` pour parcourir le tableau `$licencies` et afficher chaque licencié dans une ligne `<tr>`

6. Ajoutez un compteur qui affiche "Total : X licenciés" après le tableau

7. **Bonus :** Utilisez une boucle `for` pour afficher les numéros de ligne (1, 2, 3...)

**Question 7 :** Quelle est la différence entre `foreach`, `for` et `while` ?

**Question 8 :** Comment compte-t-on le nombre d'éléments dans un tableau ?

---

## Partie 5 : Formulaires HTML → PHP

**Objectif :** Créer un formulaire et récupérer les données en PHP.

### Tâches :

1. Ouvrez `formulaire_licencie.php`

2. Créez un formulaire HTML avec la méthode POST et l'action `traitement.php` contenant :
   - Un champ texte pour le nom (attribut `name="nom"`)
   - Un champ texte pour le prénom (attribut `name="prenom"`)
   - Un champ nombre pour l'année de naissance (attribut `name="annee_naissance"`, min="1950", max="2020")
   - Un bouton submit "Inscrire le licencié"

3. Ouvrez `traitement.php`

4. Ajoutez `require 'functions.php';` en haut

5. Vérifiez si le formulaire a été soumis avec :
   ```php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       // Votre code ici
   }
   ```

6. Récupérez les données du formulaire avec `$_POST` :
   ```php
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $annee_naissance = $_POST['annee_naissance'];
   ```

7. Créez le licencié avec `creer_licencie()` et affichez ses informations

8. Affichez un message de confirmation : "Licencié [Nom Prénom] inscrit avec succès ! Numéro de licence : [numéro]"

9. Ajoutez un lien "Retour au formulaire" qui pointe vers `formulaire_licencie.php`

**Question 9 :** Quelle est la différence entre la méthode GET et POST pour un formulaire ?

**Question 10 :** Comment vérifie-t-on qu'un champ de formulaire n'est pas vide ?

---

## Partie 6 : Sauvegarde dans un fichier texte

**Objectif :** Manipuler les fichiers pour persister les données.

### Tâches :

1. Dans `functions.php`, créez une fonction `sauvegarder_licencie($licencie, $fichier)` qui :
   - Prend en paramètre un tableau associatif (licencié) et un nom de fichier
   - Convertit le tableau en chaîne de caractères avec `serialize($licencie)`
   - Ajoute cette chaîne dans le fichier avec `file_put_contents($fichier, $ligne, FILE_APPEND)`
   - Ajoute un retour à la ligne à la fin

2. Créez une fonction `charger_licencies($fichier)` qui :
   - Vérifie si le fichier existe avec `file_exists($fichier)`
   - Si oui, lit toutes les lignes avec `file($fichier)`
   - Parcourt chaque ligne et la désérialise avec `unserialize()`
   - Retourne un tableau contenant tous les licenciés
   - Si le fichier n'existe pas, retourne un tableau vide

3. Dans `config.php`, définissez une constante :
   ```php
   define('FICHIER_LICENCIES', 'data/licencies.txt');
   ```

4. Modifiez `traitement.php` :
   - Ajoutez `require 'config.php';` en haut
   - Après avoir créé le licencié, sauvegardez-le avec `sauvegarder_licencie()`

5. Modifiez `affichage_licencies.php` :
   - Chargez les licenciés depuis le fichier au lieu de les créer manuellement
   - Affichez-les dans le tableau

**Question 11 :** À quoi servent les fonctions `serialize()` et `unserialize()` ?

**Question 12 :** Pourquoi utilise-t-on `FILE_APPEND` dans `file_put_contents()` ?

---

## Partie 7 : Base de données MySQL (partie la plus difficile)

**Objectif :** Connecter PHP à une base de données et effectuer des opérations CRUD basiques.

### Préparation de la base de données :

1. Ouvrez phpMyAdmin (ou votre outil de gestion MySQL)

2. Créez une base de données nommée `club_football`

3. Exécutez ce script SQL pour créer la table :

```sql
CREATE TABLE licencies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_licence VARCHAR(6) NOT NULL UNIQUE,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    annee_naissance INT NOT NULL,
    age INT NOT NULL,
    categorie VARCHAR(20) NOT NULL,
    date_inscription DATE NOT NULL
);
```

### Tâches :

1. Dans `config.php`, ajoutez les constantes de connexion :
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'club_football');
   define('DB_USER', 'root');
   define('DB_PASS', '');  // Votre mot de passe MySQL
   ```

2. Créez une fonction `connecter_bdd()` dans `functions.php` qui :
   - Crée une connexion MySQLi avec `new mysqli()`
   - Vérifie s'il y a une erreur de connexion
   - Définit le charset en UTF-8 avec `set_charset('utf8')`
   - Retourne l'objet de connexion

3. Créez une fonction `inserer_licencie_bdd($licencie)` qui :
   - Se connecte à la base de données
   - Prépare une requête INSERT avec `prepare()`
   - Lie les paramètres avec `bind_param()`
   - Exécute la requête
   - Ferme la connexion
   
   Exemple de structure :
   ```php
   $conn = connecter_bdd();
   $stmt = $conn->prepare("INSERT INTO licencies (numero_licence, nom, prenom, annee_naissance, age, categorie, date_inscription) VALUES (?, ?, ?, ?, ?, ?, ?)");
   // ... lier les paramètres et exécuter
   ```

4. Créez une fonction `obtenir_tous_licencies()` qui :
   - Se connecte à la base de données
   - Exécute une requête SELECT pour récupérer tous les licenciés
   - Retourne un tableau de tableaux associatifs
   - Utilisez `fetch_assoc()` dans une boucle while

5. Modifiez `traitement.php` pour sauvegarder dans la BDD au lieu du fichier texte

6. Modifiez `affichage_licencies.php` pour charger depuis la BDD

**Question 13 :** Quelle est la différence entre MySQLi et PDO ?

**Question 14 :** Pourquoi utilise-t-on des requêtes préparées (`prepare()`) au lieu de concaténer directement les variables dans la requête SQL ?

**Question 15 :** À quoi sert la fonction `bind_param()` et que signifient les lettres comme 's', 'i', 'd' ?

---

## Partie 8 : Amélioration et validation

**Objectif :** Sécuriser et valider les données.

### Tâches :

1. Dans `functions.php`, créez une fonction `valider_formulaire($nom, $prenom, $annee_naissance)` qui :
   - Vérifie que le nom n'est pas vide avec `empty()`
   - Vérifie que le prénom n'est pas vide
   - Vérifie que l'année de naissance est entre 1950 et 2020
   - Retourne un tableau avec deux clés :
     - `valide` : true ou false
     - `erreurs` : un tableau contenant les messages d'erreur

2. Créez une fonction `nettoyer_donnee($donnee)` qui :
   - Supprime les espaces inutiles avec `trim()`
   - Supprime les balises HTML avec `strip_tags()`
   - Convertit les caractères spéciaux avec `htmlspecialchars()`
   - Retourne la donnée nettoyée

3. Dans `traitement.php` :
   - Nettoyez toutes les données reçues du formulaire
   - Validez le formulaire avant de créer le licencié
   - Si la validation échoue, affichez les erreurs
   - Sinon, procédez à l'inscription

4. Ajoutez une fonction `obtenir_licencie_par_numero($numero_licence)` qui recherche un licencié spécifique dans la BDD

**Question 16 :** Pourquoi doit-on toujours valider et nettoyer les données venant d'un formulaire ?

**Question 17 :** Qu'est-ce qu'une injection SQL et comment les requêtes préparées nous protègent-elles ?

---

## Rendu final

Dans le dossier `club_football`, créez un fichier `RENDU.txt` contenant :

1. **Vos informations :**
   - Nom, prénom, classe

2. **Réponses aux 17 questions** numérotées clairement, avec les liens des ressources utilisées pour répondre aux questions

3. **Les 5 concepts PHP que vous avez trouvés les plus importants** avec une courte explication de chacun

4. **Un screenshot** de votre tableau affichant au moins 3 licenciés depuis la base de données

5. **Les difficultés rencontrées** et comment vous les avez surmontées

---

## Critères d'évaluation

- Fonctionnalité : Le code fonctionne correctement (40%)
- Qualité du code : Indentation, commentaires, noms de variables clairs (20%)
- Compréhension : Qualité des réponses aux questions (25%)
- Validation : Gestion des erreurs et sécurité (15%)

---

## Ressources utiles

- Documentation PHP officielle : https://www.php.net/manual/fr/
- W3Schools PHP : https://www.w3schools.com/php/
- MySQLi Tutorial : https://www.w3schools.com/php/php_mysql_intro.asp
- Sécurité PHP : https://www.php.net/manual/fr/security.php

**Bon courage ! N'hésitez pas à tester votre code régulièrement et à utiliser `var_dump()` pour déboguer.**