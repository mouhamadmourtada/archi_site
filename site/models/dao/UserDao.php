<?php

namespace site\models\dao;
use site\config\Connection;
use site\models\domaine\User;

class UserDao extends ModelDao {

    public function all() {
        $req = $this->db->prepare("SELECT * FROM users");
        $req->execute();
        $users = [];

        while ($row = $req->fetch()) {
            $user = new User(
                $row["id"],
                $row["password"],
                $row["nom"],
                $row["prenom"],
                $row["email"],
                $row["token"],
                $row["tokenRest"],
                $row["role"],
                $row["dateExpirationToken"],
                $row["dateExpirationTokenRest"]

            );
            $users[] = $user;
        }

        return $users;
    }

    public function findBy($attribute, $operator,  $valeur){
        $req = $this->db->prepare("SELECT * FROM users where ".$attribute . $operator.":valeur");
        $req->bindParam(':valeur', $valeur);

        $req->execute();
        $users = [];

        while ($row = $req->fetch()) {
            $user = new User(
                $row["id"],
                $row["password"],
                $row["nom"],
                $row["prenom"],
                $row["email"],
                $row["token"],
                $row["tokenRest"],
                $row["role"],
                $row["dateExpirationToken"],
                $row["dateExpirationTokenRest"]
            );
            $users[] = $user;
        }
        return $users;
    }


    public function findByEmail($email){
        $users = $this->findBy("email", "=", $email);

        if(count($users) > 0){
            return $users[0];
        }
        return null;
    }


    public function updateToken($user){
        $req = $this->db->prepare("UPDATE users SET token = :tokenSoap, dateExpirationToken = :dateExpiration WHERE id = :id");
        $req->bindParam(':tokenSoap', $user->getToken());
        $req->bindParam(':dateExpiration', $user->getDateExpirationTokenReste());
        $req->bindParam(':id', $user->getId());
        $req->execute();
    }

    public static function where($conditions){

    }


    public function find($id) {
        $req = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        $row = $req->fetch();
        $category = new User(
            $row["id"],
            // $row["password"],
            null,
            $row["nom"],
            $row["prenom"],
            $row["email"],
            $row["token"],
            $row["tokenRest"],
            $row["role"],
            $row["dateExpirationToken"],
            $row["dateExpirationTokenRest"]
        );
        return $category;
    }


    


    
    public function save($user) {
        $req = $this->db->prepare("INSERT INTO users (
            password, nom, prenom, email, role
        ) VALUES (:password, :nom, :prenom, :email, :role)");
        $req->bindParam(':password', $user->getPassword());
        $req->bindParam(':nom', $user->getNom());
        $req->bindParam(':prenom', $user->getPrenom());
        $req->bindParam(':email', $user->getEmail());
        $req->bindParam(':role', $user->getRole());
        $req->execute();
    }


    
    public function update($user) {
        $sql = "UPDATE users SET 
                    nom = :nom,
                    prenom = :prenom,  
                    role = :role, 
                    email = :email, 
                    tokenRest = :tokenRest, 
                    dateExpirationTokenRest = :dateExpirationTokenRest
                WHERE id = :id";
    
        $req = $this->db->prepare($sql);
    
        $req->bindValue(':nom', $user->getNom());
        $req->bindValue(':prenom', $user->getPrenom());
        $req->bindValue(':role', $user->getRole());
        $req->bindValue(':email', $user->getEmail());
        $req->bindValue(':tokenRest', $user->getTokenRest() ?? null);
        $req->bindValue(':dateExpirationTokenRest', $user->getDateExpirationTokenReste() ?? null);
        $req->bindValue(':id', $user->getId());
    
        $req->execute();
    }
    



    public function delete($user) {
        $req = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $req->bindParam(':id', $user->getId());
        $req->execute();
    }






}