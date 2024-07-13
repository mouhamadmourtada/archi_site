<?php

namespace site\auth;
use site\models\domaine\User;

class Auth {
    private static $instance = null;
    private $currentUser = null;

    private function __construct() {
        
    }

    // Singleton instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Auth();
        }
        return self::$instance;
    }

    public function setUser(User $user) {
        $this->currentUser = $user;
    }

    public function getUser() {
        return $this->currentUser;
    }

    public function isLoggedIn() {
        return $this->currentUser !== null;
    }

    // Logout
    public function logout() {
        $this->currentUser = null;
    }
}
?>