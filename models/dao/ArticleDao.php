<?php

// ce fichier est le dao en question 
namespace models\dao;

use models\domaine\Article;
use PDO;

class ArticleDao extends ModelDao {

    public function __construct(){
        parent::__construct();
    }

    
    public function all() {
        $req = $this->db->prepare("SELECT * FROM Article");
        $req->execute();
        $articles = [];

        while ($row = $req->fetch()) {
            $article = new Article($row['id'], $row['titre'], $row['contenu'], $row['dateCreation'], $row['dateModification'], $row['categorie']);
            $articles[] = $article;
        }
        return $articles;
    }


    public function count() {
        $req = $this->db->prepare("SELECT COUNT(*) FROM Article");
        $req->execute();
        return $req->fetchColumn();
    }

    public function paginate($size, $page) {
        $offset = ($page - 1) * $size;
        if ($offset < 0) {
            $offset = 0; // Assurez-vous que l'offset ne devienne pas négatif
        }
    
        $req = $this->db->prepare("SELECT * FROM Article LIMIT :size OFFSET :offset");
        $req->bindParam(':size', $size, PDO::PARAM_INT);
        $req->bindParam(':offset', $offset, PDO::PARAM_INT);
        $req->execute();
    
        $articles = [];
        while ($row = $req->fetch()) {
            $article = new Article(
                $row['id'],
                $row['titre'],
                $row['contenu'],
                $row['dateCreation'],
                $row['dateModification'],
                $row['categorie']
            );
            $articles[] = $article;
        }
        return $articles;
    }
    
    

    public function find($id) {
        $req = $this->db->prepare("SELECT * FROM Article WHERE id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
        $row = $req->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $article = new Article(
                $row['id'],
                $row['titre'],
                $row['contenu'],
                $row['dateCreation'],
                $row['dateModification'],
                $row['categorie']
            );
            return $article;
        } else {
            return null; // Ou gérer l'erreur selon vos besoins
        }
    }
    


    public function findByCategory($id) {
        $req = $this->db->prepare("SELECT * FROM Article WHERE categorie = :id");
        $req->bindParam(':id', $id);
        $req->execute();

        $articles = [];
        while($row = $req->fetch()) {
            $article = new Article($row['id'], $row['titre'], $row['contenu'], $row['dateCreation'], $row['dateModification'], $row['categorie']);
            $articles[] = $article;
        }
        return $articles;
    }



    public function save(Article $article) {
        $titre = $article->getTitre();
        $contenu = $article->getContenu();
        $categorie = $article->getCategorie()->getId();
        $currentDate = date('Y-m-d H:i:s'); 



        $req = $this->db->prepare("INSERT INTO Article (titre, contenu, dateCreation, dateModification, categorie) VALUES (:titre, :contenu, :dateCreation, :dateModification, :categorie)");
        $req->bindParam(':titre', $titre);
        $req->bindParam(':contenu', $contenu);
        $req->bindParam(':dateCreation', $currentDate);
        $req->bindParam(':dateModification', $currentDate);
        $req->bindParam(':categorie', $categorie);
        $req->execute();
    }



    
    public function update(Article $article) {
        $req = $this->db->prepare("UPDATE Article SET titre = :titre, contenu = :contenu, dateModification = :dateModification, categorie = :categorie WHERE id = :id");
        $req->bindParam(':titre', $article->getTitre());
        $req->bindParam(':contenu', $article->getContenu());
        $req->bindParam(':dateModification', $article->getDateModification());
        $req->bindParam(':categorie', $article->getCategorie()->getId());
        $req->bindParam(':id', $article->getId());
        $req->execute();
    }

    public function delete(Article $article) {
        $req = $this->db->prepare("DELETE FROM Article WHERE id = :id");
        $req->bindParam(':id', $article->getId());
        $req->execute();
    }



}