# Guide pour reconstruire le système de connexion

Ce dépôt contient uniquement des points d'ancrage (TODO) qui t'aident à reconstituer toi-même le système d'authentification. Suis les étapes ci-dessous dans l'ordre et consulte la documentation liée pour chaque notion : tu apprendras mieux en cherchant les réponses dans les ressources officielles plutôt qu'en copiant-collant du code.

## Avant de commencer

1. Installe un environnement PHP 8+ avec MySQL/MariaDB et un serveur web local (Apache ou Nginx). Guide : https://www.php.net/manual/fr/install.php
2. Crée une base `auth_system` via `database.sql`. Tutoriel import SQL : https://dev.mysql.com/doc/refman/8.0/en/mysql-batch-commands.html
3. Configure `config/database.php` avec tes identifiants (hôte, nom de base, utilisateur, mot de passe). Doc PDO : https://www.php.net/manual/fr/book.pdo.php

## Étape 1 — Sécuriser les sessions (`session.php`)

Les TODO de `session.php` définissent la base de la sécurité. Utilise la doc des sessions (https://www.php.net/manual/fr/book.session.php) pour chacune des tâches suivantes :
- Implémente `isLoggedIn()` en vérifiant la présence de `$_SESSION['user_id']` et `$_SESSION['username']` (« Variables superglobales » : https://www.php.net/manual/fr/language.variables.superglobals.php).
- Complète `isAdmin()` en réutilisant `hasRole('admin')`.
- Dans `requireLogin()`, protège toutes les pages : si `isLoggedIn()` est faux, redirige avec `header('Location: login.php'); exit;`. Rappel `header()` : https://www.php.net/manual/fr/function.header.php.
- Dans `requireAdmin()`, commence par appeler `requireLogin()` puis vérifie `isAdmin()`. En cas d'échec, redirige vers `dashboard.php` et termine le script.

## Étape 2 — Gérer l'inscription (`signup.php`)

Cette page contient plusieurs TODO dans la partie PHP **et** dans le formulaire HTML.

1. **Récupérer les données du formulaire** : extrais `username`, `email`, `password`, `confirm_password` depuis `$_POST`. Doc : https://www.php.net/manual/fr/reserved.variables.post.php.
2. **Valider les champs** :
   - Vérifie qu'ils ne sont pas vides (`empty`).
   - Contrôle la longueur du `username` (entre 3 et 50 caractères) et du `password` (>= 8). Fonctions utiles : `strlen`, `trim`.
   - Valide l'email avec `filter_var($email, FILTER_VALIDATE_EMAIL)` (doc : https://www.php.net/manual/fr/function.filter-var.php).
   - Confirme que les deux mots de passe sont identiques.
3. **Vérifier l'unicité** :
   - Prépare deux requêtes PDO `SELECT id FROM users WHERE username = ?` et `SELECT id FROM users WHERE email = ?` (doc requêtes préparées : https://www.php.net/manual/fr/pdo.prepared-statements.php).
   - Utilise `fetch()` pour savoir si un enregistrement existe déjà. Si c'est le cas, ajoute un message d'erreur approprié.
4. **Créer l'utilisateur** (si la liste d'erreurs est vide) :
   - Hache le mot de passe avec `password_hash($password, PASSWORD_DEFAULT)` (doc : https://www.php.net/manual/fr/function.password-hash.php).
   - Prépare une requête `INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')` et exécute-la avec les valeurs calculées.
5. **Compléter le formulaire HTML** :
   - Ajoute un champ `email` et un champ `password` en t'inspirant du pattern déjà présent pour `username`. Rappelle-toi de ré-afficher les anciennes valeurs (`$_POST`) via `htmlspecialchars` pour éviter les failles XSS (doc : https://www.php.net/manual/fr/function.htmlspecialchars.php).

## Étape 3 — Implémenter la connexion (`login.php`)

Le fichier décrit toutes les étapes à couvrir. Avance point par point :
1. Démarre la session via `startSecureSession()` et redirige l'utilisateur déjà connecté vers `dashboard.php` à l'aide de `isLoggedIn()`.
2. Lors d'un POST :
   - Récupère `username` (ou email) et `password` depuis `$_POST`.
   - Si l'un des champs est vide, ajoute l'erreur « Veuillez remplir tous les champs. »
3. Si les champs sont valides, utilise PDO pour rechercher l'utilisateur :
   - `SELECT id, username, password, role FROM users WHERE username = ? OR email = ?`
   - Lie deux fois la même valeur (`$username`) afin de permettre la connexion par nom d'utilisateur **ou** email.
   - Récupère la ligne avec `fetch(PDO::FETCH_ASSOC)`.
4. Vérifie le mot de passe avec `password_verify()` (doc : https://www.php.net/manual/fr/function.password-verify.php). Si la vérification réussit :
   - Appelle `session_regenerate_id(true)`.
   - Stocke `$_SESSION['user_id']`, `$_SESSION['username']`, `$_SESSION['role']`.
   - Redirige vers `dashboard.php`.
5. En cas d'identifiant incorrect ou d'exception PDO, ajoute « Identifiants incorrects. » à `$errors` pour informer l'utilisateur.

## Étape 4 — Tester de bout en bout

1. Inscris deux profils (un utilisateur standard, un futur admin que tu pourras promouvoir directement en base si nécessaire).
2. Vérifie que la connexion fonctionne et que `dashboard.php` n'est accessible qu'aux utilisateurs connectés (utilise `requireLogin()`).
3. Force le rôle `admin` dans la base pour tester `requireAdmin()` depuis `admin.php`. La doc des privilèges MySQL t'aidera à modifier une ligne : https://dev.mysql.com/doc/refman/8.0/en/update.html.
4. Termine en exécutant `logout.php` et vérifie que la session est détruite et qu'un nouvel ID est régénéré.

## Ressources utiles

- Sessions sécurisées : https://owasp.org/www-community/attacks/Session_fixation
- PDO & gestion d'erreurs : https://www.php.net/manual/fr/pdo.error-handling.php
- Validation côté serveur : https://www.php.net/manual/fr/filter.examples.validation.php
- Sécurité des mots de passe : https://cheatsheetseries.owasp.org/cheatsheets/Password_Storage_Cheat_Sheet.html

