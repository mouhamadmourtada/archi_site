<?php

namespace controllers;

abstract class Controller {

    protected function view($view, $data = []) {
        extract($data);
        
        require_once 'vue/' . $view . '.php';
    }

    protected function redirect($route, $flashes = []) {
        foreach ($flashes as $type => $message) {
            setcookie('flash[type]', $type, time() + 5, '/');
            setcookie('flash[message]', $message, time() + 5, '/');
        }
        
        header('Location: http://localhost/archi/' . $route);

    }

}