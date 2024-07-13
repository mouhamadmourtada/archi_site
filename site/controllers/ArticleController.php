<?php

namespace site\controllers;
use site\models\domaine\Article;
use site\models\domaine\Category;

class ArticleController extends Controller {


    public function index($params = []) {
        
        
        $categories = Category::all();

        $size = 10;
        $page = 1;

        if (isset($params['size'])) {
            $size = $params['size'];
        }

        if (isset($params['page'])) {
            $page = $params['page'];
        }

        
        $articles = Article::paginate($size, $page);

        $count = Article::count();
        


        $this->view('article/index', [
            'articles' => $articles,
            "categories" => $categories,
            "count" => $count,
            "size" => $size,
            "page" => $page
        ]);
    }


    public function navigate($params) {

        $page = $params['page'];
        $size = $params['size'];
        $page++;
        $this->index(['page' => $page, 'size' => $size]);

    }



    public function articleCategorie($params) {
        $categorie_id = $params["id"];
        $articles = Article::findByCategory($categorie_id);

        $categories = Category::all();
        
        $page = 1;
        $size = 10;

        $this->view('article/index', [
            'articles' => $articles,
            "categories" => $categories,
            "count" => count($articles),
            "size" => $size,
            "page" => $page
        ]);
    }

    // public function 



    public function show($params) {
        
        $id = $params["id"];
        $article = Article::find($id);
        
        $this->view('article/show', ['article' => $article]);
    }





    public function create() {
        $categories = Category::all();
        $this->view('article/create', ['categories' => $categories]);
    }




    public function store() {

        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $categorie_id = $_POST['categorie'];

        $categorie = Category::find($categorie_id);


        $article = new Article(null, $titre, $contenu, null, null, $categorie);

        
        $article->save();
        $flashes = ['success' => 'article ajouté avec succès'];
        
        $this->redirect('article', $flashes);
    }


    

    public function edit($params) {
        $id = $params["id"];
        $article = Article::find($id);
        $categories = Category::all();
        $this->view('article/edit', ['article' => $article, 'categories' => $categories]);
    }



    public function update() {
        // $id = $params["id"];
        $id = $_POST['id'];
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $categorie = $_POST['categorie'];
        $article = Article::find($id);
        $article->setTitre($titre);
        $article->setContenu($contenu);
        $article->setCategorie($categorie);
        $article->update();

        $flashes = ['success' => 'article modifié avec succès'];

        $this->redirect('article', $flashes);
    }



    public function destroy($params) {
        $id = $params["id"];
        $article = Article::find($id);
        $article->delete();
        $flashes = ['success' => 'article supprimé avec succès'];
        $this->redirect('article', $flashes);
    }



}