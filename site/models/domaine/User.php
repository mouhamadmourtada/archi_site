<?php

namespace site\models\domaine;

use site\models\dao\UserDao;
use site\models\domaine\Model;

class User extends Model {


    private $password;
    private $nom;
    private $prenom;
    private $token;
    private $tokenRest;
    private $email;
    private $role;
    private $dateExpirationToken;
    private $dateExpirationTokenReste;

    private $dao = null;


    public function __construct($id = null, $password = null, $nom = null, $prenom = null, $email = null, $token = null, $tokenRest = null, $role = "editeur", $dateExpirationToken = null, $dateExpirationTokenReste = null)
    {
        parent::__construct($id);
        $this->password = $password;
        $this->nom = $nom;
        $this->email = $email;
        $this->prenom = $prenom;
        $this->token = $token;
        $this->tokenRest = $tokenRest;
        $this->role = $role;
        $this->dateExpirationToken = $dateExpirationToken;
        $this->dateExpirationTokenReste = $dateExpirationTokenReste;

        $this->dao = new UserDao();
    }



    public static function all(){
        $userDao = new UserDao();
        return $userDao->all();
    }

    public static function find($id){
        $userDao = new UserDao();
        return $userDao->find($id);
        // return UserDao::find($id);
    }


    public function update(){
        $this->dao->update($this);
    }

    public function delete(){
        $this->dao->delete($this);
    }

    public function save(){
        $this->dao->save($this);
    }

    public function getId(){
        return $this->id;
        
    }

    public function updateToken(){
        $this->dao->updateToken($this);
    }


    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getpassword(){
        return $this->password;
    }

    public function setpassword($password){
        $this->password = $password;
    }


    public function getToken(){
        return $this->token;
    }

    public function setToken($token){
        $this->token = $token;
    }


    public function getTokenRest(){
        return $this->tokenRest;
    }

    public function setTokenRest($tokenRest){
        $this->tokenRest = $tokenRest;
    }

    public function getRole(){
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;
    }

    public function getDateExpirationToken(){
        return $this->dateExpirationToken;
    }

    public function setDateExpirationToken($dateExpirationoToken){
        $this->dateExpirationToken = $dateExpirationoToken;
    }

    public function getDateExpirationTokenReste(){
        return $this->dateExpirationTokenReste;
    }

    public function setDateExpirationTokenReste($dateExpirationoTokenReste){
        $this->dateExpirationTokenReste = $dateExpirationoTokenReste;
    }


    public static function findByEmail($email){
        $userDao = new UserDao();
        return $userDao->findByEmail($email);
    }

    // public function findByUsername()



}