<?php

namespace site\models\domaine;
use site\models\dao\CategoryDao;


class Category extends Model {
    
    // protected $id;
    private $libelle;
    private $dao = null;
    private $articles = [];
    
    public function __construct($id, $libelle, $articles = []) {
        // $this->id = $id;
        parent::__construct($id);
        $this->libelle = $libelle;

        $this->dao = new CategoryDao();
    }
    
   
    public function getLibelle() {
        return $this->libelle;
    }
    
   
    public function toArray() {
        return [
            'id' => $this->id,
            'libelle' => $this->libelle
        ];
    }
    
    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function save() {
        $this->dao->save($this);
    }

    public function delete() {
        $this->dao->delete($this);
    }

    public static function all() {
        $dao = new CategoryDao();
        return $dao->all();
    }

    public static function find($id) {
        $dao = new CategoryDao();
        return $dao->find($id);
    }

    public static function findByArticle($id) {
        return "findByArticle";
    }

    public function update() {
        $this->dao->update($this);
    }

    public function getArticles() {
        return $this->articles;
    }

    public function setArticles($articles) {
        $this->articles = $articles;
    }

    public function addArticle($article) {
        $this->articles[] = $article;
    }

    public function removeArticle($article) {
        $key = array_search($article, $this->articles);
        if ($key !== false) {
            unset($this->articles[$key]);
        }
    }


    public static function getCategoriesWithArticles() {
        $dao = new CategoryDao();
        return $dao->getCategoriesWithArticles();
    }

    
    
}