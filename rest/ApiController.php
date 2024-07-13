<?php

namespace rest;

use site\controllers\Controller;

class ApiController extends Controller {

    public function send($data, $code = 200) {
        http_response_code($code); // Unauthorized
        // echo json_encode(array('message' => 'Accès refusé. Token manquant.'));
        echo $data;
        exit;
    }

    
}