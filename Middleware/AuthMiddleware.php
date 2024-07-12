<?php
// Middleware/AuthMiddleware.php

namespace Middleware;

class AuthMiddleware {

    public static function handle($request, $next) {
        // Démarrer la session si elle n'est pas déjà démarrée
        if (session_status() == PHP_SESSION_NONE) {
            session_start();

        }
        
        // Vérifier si l'utilisateur est authentifié
        
        if (!isset($_SESSION['user_id'])) {
            // Rediriger vers la page de connexion
            self::redirectToLogin();
        }

        // L'utilisateur est authentifié, appeler la prochaine étape du middleware (passer la requête au contrôleur)
        return $next($request);
    }

    private static function redirectToLogin() {
        // Utilisez une redirection plus propre
        header('Location: http://localhost/archi/auth/login');
        exit;
    }
}
?>
