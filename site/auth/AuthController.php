<?php
namespace site\auth;

use site\models\Domaine\User;
use site\controllers\Controller;

class AuthController extends Controller{
    

    public function login() {
        return $this->view('auth/login');
    }

    public function loginProcess() {
    // Vérifier si le formulaire de connexion est soumis
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user = User::findByEmail($email);
        
        if($user){
           
            if($user->getPassword() == md5($password)){
                
                

                $_SESSION['user_id'] = $user->getId();
                // il faut mettre, le role, prenom, nom de l'utilisateur dans la session
                $_SESSION['role'] = $user->getRole();
                $_SESSION['prenom'] = $user->getPrenom();
                $_SESSION['nom'] = $user->getNom();
                $_SESSION['email'] = $user->getEmail();
                // Rediriger vers une page sécurisée

                // $user = new User($id, $nom, $prenom, $email, $role);

                // Définir l'utilisateur connecté
                Auth::getInstance()->setUser($user);

                $flashes = ["success" => "Vous êtes connecté"];
                $this->redirect('');
                exit;
            }else{
                
                $error = "Identifiants incorrects";
                $flashes = ["error" => $error];
                return $this->view('auth/login', ['error' => $error]);
            }
        // if ($user && password_verify($password, $user->getPassword())) {
        // if(true){
        //     // Authentification réussie
        //     // $_SESSION['user_id'] = $user->getId();
        //     $_SESSION['user_id'] = 1;
        //     // Rediriger vers une page sécurisée
        //     $this->redirect('');
        //     exit;
        // } else {
        //     // Authentification échouée
        //     $error = "Identifiants incorrects";
        //     return $this->view('login', ['error' => $error]);
            
        }
        
    }
    
    public function logout() {
        // Déconnexion : supprimer la session
        session_destroy();
        // Rediriger vers la page de connexion
        $this->redirect('auth/login');
        exit;
    }
    
    // Autres méthodes pour la gestion des utilisateurs : inscription, récupération de mot de passe, etc.
    
}
?>
