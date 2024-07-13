<?php

namespace site\controllers;

use site\models\domaine\Category;

class CategoryController extends Controller {
    
        public function index() {
            $categories = Category::all();
            $this->view('category/index', ['categories' => $categories]);
        }
    
        public function show($id) {
            $category = Category::find($id);
            $this->view('category/show', ['category' => $category]);
        }
    
        public function create() {
            $this->view('category/create');
        }
    
        public function store() {

            $libelle = $_POST['libelle'];
            $category = new Category(null, $libelle);
            $category->save();

            $flashes = ["success" => "La catégorie a bien été créée"];

            $this->redirect('category', $flashes);
        }
    
        public function edit($params) {
            $id = $params["id"];

            $category = Category::find($id);
            $this->view('category/edit', ['category' => $category]);
        }
    
        public function update() {
            $id = $_POST['id'];
            $libelle = $_POST['libelle'];
            $category = Category::find($id);
            $category->setLibelle($libelle);
            $category->update();
            $this->redirect('category' , ["success" => "La catégorie a bien été modifiée"]);
        }
    
        public function destroy($params) {
            $id = $params["id"];
            $category = Category::find($id);
            $category->delete();
            $this->redirect('category', ["success" => "La catégorie a bien été supprimée"]);
        }
}