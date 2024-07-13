<?php


namespace site\controllers;

use site\models\domaine\Model;
use site\models\domaine\User;
use site\services\UserService;

class UserController extends Controller{
        
    private UserService $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }


    public function index() {

        $users = User::all();
        $this->view('user/index', ['users' => $users]);
    }
    
    public function show($params) {

        $id = $params["id"];
        $user = User::find($id);


        $this->view('user/show', ['user' => $user]);
    }
    
    public function create() {
        $this->view('user/create');
    }
    
    public function store() {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);  // Hasher le mot de passe avec MD5

        $role = $_POST['role'];
        $token = null;
        $tokenReste = null;
        $tokenExpiration = null;
        $tokenResteExpiration = null;

        $user = new User(null, $password, $nom, $prenom, $email, $token, $tokenReste, $role);

        
        $user->save();
        $flashes = ["success" => "L'utilisateur a bien été créé"];
        $this->redirect('user', $flashes);
    }
    
    public function edit($params) {
        $id = $params["id"];

        $user = User::find($id);


        $this->view('user/edit', ['user' => $user]);
    }


    public function generateToken($params){
        $id = $params["id"];
        // $id = $_POST['id'];
        $user = User::find($id);

        $token = $this->userService->generateToken();
        $user->setToken($token);
        $user->setDateExpirationToken(date('Y-m-d H:i:s', strtotime('+1 day')));

        $user->updateToken();

        // $user->setToken($token);
        
        
        $flashes = ["success" => "Le token a bien été généré"];
        $this->redirect('user', $flashes);
    }
    
    public function update($params) {
        $id = $params["id"];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        

        $user = User::find($id);
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setEmail($email);
        $user->setRole($role);

        $user->update();


        $flashes = ["success" => "L'utilisateur a bien été modifié"];
        $this->redirect('user', $flashes);
    }
    
    public function destroy($params) {
        $id = $params["id"];

        $user = User::find($id);
        $user->delete();

        $flashes = ["success" => "L'utilisateur a bien été supprimé"];
        $this->redirect('user', $flashes);
    }        

}