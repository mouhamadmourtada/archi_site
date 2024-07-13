<?php
// Middleware/ApiAuthMiddleware.php

namespace site\Middleware;

class ApiAuthMiddleware {

    public static function handle($request, $next) {
        // Vérifier si le token est présent dans la requête
        $token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;

        if (!$token) {
            // Retourner une réponse JSON indiquant que l'accès est refusé
            http_response_code(401); // Unauthorized
            echo json_encode(array('message' => 'Accès refusé. Token manquant.'));
            exit;
        }

        // Vérifier si le token est valide (exemple : vérification en base de données ou autre logique de validation)
        if (!self::isValidToken($token)) {
            // Retourner une réponse JSON indiquant que le token est invalide ou expiré
            http_response_code(401); // Unauthorized
            echo json_encode(array('message' => 'Accès refusé. Token invalide ou expiré.'));
            exit;
        }

        // L'utilisateur est authentifié, appeler la prochaine étape du middleware (passer la requête au contrôleur)
        return $next($request);
    }

    private static function isValidToken($token) {
        // Implémentez ici la logique de validation du token, par exemple en vérifiant en base de données
        // Ici, une implémentation de démonstration est utilisée
        $validTokens = [
            'valid_token_1',
            'valid_token_2',
            // Ajoutez d'autres tokens valides ici si nécessaire
        ];

        return in_array($token, $validTokens);
    }
}
?>
