# Système d'authentification PHP

Un système d'authentification complet, sécurisé et basique en PHP avec MySQL et PDO.

## Fonctionnalités

- ✅ Inscription utilisateur
- ✅ Connexion / Déconnexion
- ✅ Gestion des rôles (user / admin)
- ✅ Pages protégées par authentification
- ✅ Hachage sécurisé des mots de passe (bcrypt)
- ✅ Protection contre les injections SQL (requêtes préparées PDO)
- ✅ Sessions sécurisées avec régénération d'ID
- ✅ Validation des données côté serveur
- ✅ Protection CSRF de base
- ✅ Interface responsive et moderne

## Structure des fichiers

```
├── config/
│   └── database.php          # Configuration de la base de données
├── includes/
│   └── session.php           # Gestion des sessions et authentification
├── index.php                 # Page d'accueil
├── signup.php                # Page d'inscription
├── login.php                 # Page de connexion
├── logout.php                # Script de déconnexion
├── dashboard.php             # Page protégée pour tous les utilisateurs
├── admin.php                 # Page protégée pour les admins uniquement
└── database.sql              # Script de création de la base de données
```

## Installation

### 1. Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur (ou MariaDB)
- Serveur web (Apache, Nginx, etc.)

### 2. Configuration de la base de données

Exécutez le script SQL pour créer la base de données et les tables :

```sql
mysql -u root -p < database.sql
```

Ou importez manuellement le fichier `database.sql` via phpMyAdmin.

### 3. Configuration de la connexion

Modifiez le fichier `config/database.php` avec vos paramètres :

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'auth_system');
define('DB_USER', 'votre_utilisateur');
define('DB_PASS', 'votre_mot_de_passe');
```

### 4. Créer des comptes de test

Pour créer un compte admin et un compte utilisateur de test, exécutez ce script PHP :

```php
<?php
require_once 'config/database.php';

// Admin - Mot de passe: Admin123!
$admin_password = password_hash('Admin123!', PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
$stmt->execute(['admin', 'admin@example.com', $admin_password, 'admin']);

// User - Mot de passe: User123!
$user_password = password_hash('User123!', PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
$stmt->execute(['testuser', 'user@example.com', $user_password, 'user']);

echo "Comptes créés avec succès !";
?>
```

### 5. Lancer l'application

Placez les fichiers dans votre répertoire web et accédez à `index.php`.

## Comptes de test

Une fois les comptes créés :

**Administrateur :**
- Identifiant : `admin`
- Mot de passe : `Admin123!`

**Utilisateur :**
- Identifiant : `testuser`
- Mot de passe : `User123!`

## Sécurité

### Mesures implémentées

1. **Hachage des mots de passe** : Utilisation de `password_hash()` avec bcrypt
2. **Requêtes préparées** : Protection contre les injections SQL
3. **Validation des entrées** : Validation côté serveur de tous les champs
4. **Sessions sécurisées** :
   - `session.cookie_httponly = 1` (protection XSS)
   - `session.use_only_cookies = 1`
   - Régénération d'ID de session après connexion
5. **Échappement HTML** : Utilisation de `htmlspecialchars()` pour prévenir XSS
6. **Vérification des rôles** : Contrôle d'accès basé sur les rôles

### Recommandations pour la production

Pour un environnement de production, ajoutez :

1. **HTTPS** : Activer SSL/TLS et mettre `session.cookie_secure = 1`
2. **Protection CSRF** : Implémenter des tokens CSRF pour les formulaires
3. **Limitation des tentatives** : Ajouter un système de rate limiting
4. **Logs de sécurité** : Logger les tentatives de connexion échouées
5. **Variables d'environnement** : Stocker les credentials DB dans `.env`
6. **Headers de sécurité** : Ajouter des headers HTTP de sécurité
7. **Validation email** : Ajouter une vérification par email
8. **Récupération de mot de passe** : Implémenter la fonctionnalité
9. **2FA** : Ajouter l'authentification à deux facteurs (optionnel)

## Usage

### Pages publiques

- `index.php` : Page d'accueil
- `signup.php` : Inscription
- `login.php` : Connexion

### Pages protégées

- `dashboard.php` : Accessible à tous les utilisateurs connectés
- `admin.php` : Accessible uniquement aux administrateurs
- `logout.php` : Déconnexion

### Fonctions utiles (session.php)

```php
isLoggedIn()          // Vérifie si l'utilisateur est connecté
hasRole($role)        // Vérifie si l'utilisateur a un rôle spécifique
isAdmin()             // Vérifie si l'utilisateur est admin
requireLogin()        // Force la connexion (redirige sinon)
requireAdmin()        // Force le rôle admin (redirige sinon)
logout()              // Déconnecte l'utilisateur
```

## Personnalisation

### Ajouter un nouveau rôle

1. Modifiez la table `users` pour ajouter le rôle dans l'ENUM
2. Créez une fonction dans `session.php` similaire à `isAdmin()`
3. Utilisez-la dans vos pages protégées

### Créer une nouvelle page protégée

```php
<?php
require_once 'config/database.php';
require_once 'includes/session.php';

startSecureSession();
requireLogin(); // ou requireAdmin() pour admin uniquement

// Votre code ici
?>
```

## Licence

Ce code est fourni à des fins éducatives. Libre d'utilisation et de modification.
