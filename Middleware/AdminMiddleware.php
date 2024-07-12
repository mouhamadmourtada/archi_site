<?php

namespace Middleware;

class AdminMiddleware {

    public static function handle($request, $next) {
        
        // Vérifier si l'utilisateur est authentifié
        if (!isset($_SESSION['role'])) {
            // Rediriger vers la page de connexion
            header('Location: http://localhost/archi/auth/login');
            exit;
        }

        if (!($_SESSION['role'] == "admin")) {
            // Rediriger vers la page d'accueil
            header('Location: http://localhost/archi');
            exit;
        }
        

        // L'utilisateur authentifié est un admin, appeler la prochaine étape du middleware (passer la requête au contrôleur)
        return $next($request);
    }
}
?>
