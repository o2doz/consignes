<?php
// Démarre une session sécurisée
function startSecureSession() {
    if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.cookie_secure', 0); // Mettre à 1 si HTTPS
        session_start();
        
        // Régénération de l'ID de session pour éviter le session fixation
        if (!isset($_SESSION['initiated'])) {
            session_regenerate_id(true);
            $_SESSION['initiated'] = true;
        }
    }
}

// Vérifie si l'utilisateur est connecté
function isLoggedIn() {
    // TODO: Vérifier si 'user_id' et 'username' sont définis dans $_SESSION
    return false;
}

// Vérifie si l'utilisateur a un rôle spécifique
function hasRole($role) {
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}

// Vérifie si l'utilisateur est admin
function isAdmin() {
    // TODO: Vérifier si l'utilisateur a le rôle 'admin' en utilisant la fonction hasRole()
    return false;
}

// Redirige si non connecté
function requireLogin() {
    if (false) { // TODO: Vérifier si l'utilisateur n'est pas connecté (!isLoggedIn())
        // TODO: Rediriger vers login.php
        // TODO: Arrêter l'exécution du script (exit)
    }
}

// Redirige si non admin
function requireAdmin() {
    // TODO: Appeler requireLogin() pour s'assurer que l'utilisateur est connecté
    if (false) { // TODO: Vérifier si l'utilisateur n'est pas admin (!isAdmin())
        // TODO: Rediriger vers dashboard.php
        // TODO: Arrêter l'exécution du script (exit)
    }
}

// Déconnexion
function logout() {
    session_unset();
    session_destroy();
    session_start();
    session_regenerate_id(true);
}
