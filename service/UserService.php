<?php
namespace service;

use site\auth\AuthService;
use site\models\domaine\User;



class UserService {
    private static $users = [
        // Exemple de données d'utilisateurs
        ["id" => 1, 'nom' => 'Doe', 'prenom' => 'John', 'email' => 'john.doe@example.com', 'token' => 'abcdef123456', 'tokenRest' => 'xyz789', 'dateExpirationToken' => '2024-12-31', 'dateExpirationTokenRest' => '2024-12-31', 'role' => 'admin'],
        [ "id" => 2, 'nom' => 'Smith', 'prenom' => 'Jane', 'email' => 'jane.smith@example.com', 'token' => 'qwerty987654', 'tokenRest' => 'mno321', 'dateExpirationToken' => '2024-12-31', 'dateExpirationTokenRest' => '2024-12-31', 'role' => 'user'],
    ];

    public function listUsers() {
        $users = User::all();
        
        foreach ($users as $user) {
            $userData = [
                'id' => $user['id'],
              'nom' => htmlspecialchars($user['nom']),
              'prenom' => htmlspecialchars($user['prenom']),
              'email' => htmlspecialchars($user['email']),
              'token' => htmlspecialchars($user['token']),
              'tokenRest' => htmlspecialchars($user['tokenRest']),
              'dateExpirationToken' => htmlspecialchars($user['dateExpirationToken']),
              'dateExpirationTokenRest' => htmlspecialchars($user['dateExpirationTokenRest']),
              'role' => htmlspecialchars($user['role'])
            ];
            $usersList[] = $userData;
        }

        return $usersList;
    }
    
    

    public function getUser($id) {

        $user = User::find($id);
        if (!$user) {
            return null;
        }
       
        $userData = [
            'id' => $user->getId(),
            'nom' => htmlspecialchars($user->getNom()),
            'prenom' => htmlspecialchars($user->getPrenom()),
            'email' => htmlspecialchars($user->getEmail()),
            'token' => htmlspecialchars($user->getToken()),
            'tokenRest' => htmlspecialchars($user->getTokenRest()),
            'dateExpirationToken' => htmlspecialchars($user->getDateExpirationToken()),
            'dateExpirationTokenRest' => htmlspecialchars($user->getDateExpirationTokenReste()),
            'role' => htmlspecialchars($user->getRole()),
        ];
        return $userData;
    }

    public function addUser($user) {
        

        $user = new User(null, $user['nom'], $user['prenom'], $user['email'], null, null, $user['role'], null, null);

        $user->save();

        return true; // or false if the operation fails
    }

    public function updateUser($user) {
        foreach (self::$users as &$currentUser) {
            if ($currentUser['id'] == $user['id']) {
                $currentUser = $user;
                return true;
            }
        }
        return false;
    }

    public function deleteUser($id) {
        $user = User::find($id);
        if (!$user) {
            return false;
        }
        $user->delete();
        return true;
    }


    public function authenticate($email, $password){
        
        $user = AuthService::authenticateSoap($email, $password);
        if($user){
            $userData = [
                'id' => $user->getId(),
                'nom' => htmlspecialchars($user->getNom()),
                'prenom' => htmlspecialchars($user->getPrenom()),
                'email' => htmlspecialchars($user->getEmail()),
                'token' => htmlspecialchars($user->getToken()),
                'tokenRest' => htmlspecialchars($user->getTokenRest()),
                'dateExpirationToken' => htmlspecialchars($user->getDateExpirationToken()),
                'dateExpirationTokenRest' => htmlspecialchars($user->getDateExpirationTokenReste()),
                'role' => htmlspecialchars($user->getRole()),
            ];
            return $userData;
        }else{
            return null;
        }

    }


    public function editUser($user) {
        $user = User::find($user['id']);
        if (!$user) {
            return false;
        }
        $user->setNom($user['nom']);
        $user->setPrenom($user['prenom']);
        $user->setEmail($user['email']);
        $user->setRole($user['role']);
        $user->update();
        return true;
    }
}
?>
