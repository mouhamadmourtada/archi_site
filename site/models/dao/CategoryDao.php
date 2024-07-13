<?php

namespace site\models\dao;
use site\config\Connection;
use site\models\domaine\Category;
use PDO;
use site\models\domaine\Article;

class CategoryDao extends ModelDao {

    public function all() {
        $req = $this->db->prepare("SELECT * FROM Categorie");
        $req->execute();
        $categories = [];

        while ($row = $req->fetch()) {
            $category = new Category($row['id'], $row['libelle']);
            $categories[] = $category;
        }
        return $categories;
    }



    public function find($id) {
        $req = $this->db->prepare("SELECT * FROM Categorie WHERE id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
        $row = $req->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $category = new Category($row['id'], $row['libelle']);
            return $category;
        } else {
            return null; // Ou gérer l'erreur selon vos besoins
        }
    }
    


    


    
    public function save($category) {
        $req = $this->db->prepare("INSERT INTO Categorie (libelle) VALUES (:libelle)");
        $req->bindParam(':libelle', $category->getLibelle());
        $req->execute();
    }


    
    public function update($category) {
        $req = $this->db->prepare("UPDATE Categorie SET libelle = :libelle WHERE id = :id");
        $req->bindParam(':libelle', $category->getLibelle());
        $req->bindParam(':id', $category->getId());
        $req->execute();
    }



    public function delete($category) {
       
        $req = $this->db->prepare("DELETE FROM Categorie WHERE id = :id");
        $req->bindParam(':id', $category->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    public function getCategoriesWithArticles(){
        $req = $this->db->prepare("SELECT Categorie.id, Categorie.libelle, Article.id as article_id, Article.titre, Article.contenu, Article.dateCreation, Article.dateModification FROM Categorie LEFT JOIN Article ON Categorie.id = Article.categorie");
        $req->execute();
        $categories = [];
        $currentCategory = null;
        while ($row = $req->fetch()) {
            if($currentCategory == null || $currentCategory->getId() != $row['id']){
                $currentCategory = new Category($row['id'], $row['libelle']);
                $categories[] = $currentCategory;
            }
            if($row['article_id'] != null){
                $article = new Article($row['article_id'], $row['titre'], $row['contenu'], $row['dateCreation'], $row['dateModification'], $currentCategory);
                $currentCategory->addArticle($article);
            }
        }
        return $categories;
    }






}