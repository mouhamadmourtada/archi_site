<?php

namespace site\auth;

use site\models\domaine\User;
class AuthService{

    public function generateToken($length = 32){
        return bin2hex(random_bytes($length));
    }


    public static function authenticateSoap($email, $password){
        $user = User::findByEmail($email);


        if($user && password_verify($password, $user->getPassword())){
            $token = self::generateToken();
            $user->setTokenRest($token);
            $user->setDateExpirationTokenReste(date('Y-m-d', strtotime('+1 day')));
            $user->update();
            return $user;
        }

        return null;
       
    }

}