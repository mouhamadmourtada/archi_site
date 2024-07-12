<?php
namespace services;



class UserService {

    public function generateToken($length = 32) {
        return bin2hex(random_bytes($length));
    }
}