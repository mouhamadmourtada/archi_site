<?php

namespace Routes;
use Routes\Router;
use controllers\ArticleController;
use auth\AuthController;
use controllers\CategoryController;
use controllers\UserController;
use Middleware\AdminMiddleware;
use middleware\AuthMiddleware;
use models\domaine\Article;



class Routes {

    private $router;

    function __construct() {
        
        $this->router = new Router();

        $this->router->add('GET', '/archi', [ArticleController::class, 'index']);
        $this->router->add('GET', '/archi/article/articleCategorie/{id}', [ArticleController::class, 'articleCategorie']);
        $this->router->add('GET', '/archi/article', [ArticleController::class, 'index']);
        $this->router->add('GET', '/archi/article/{id}/show', [ArticleController::class, 'show']);
        $this->router->add('GET', '/archi/article/create', [ArticleController::class, 'create'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/article/{id}/edit', [ArticleController::class, 'edit'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/article/update', [ArticleController::class, 'update'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/article/{id}/delete', [ArticleController::class, 'destroy'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/article/store', [ArticleController::class, 'store'], [AuthMiddleware::class]);





        // categorie
        $this->router->add('GET', '/archi/categorie', [CategoryController::class, 'index']);
        $this->router->add('GET', '/archi/categorie/{id}/show', [CategoryController::class, 'show']);
        $this->router->add('GET', '/archi/categorie/create', [CategoryController::class, 'create'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/categorie/{id}/edit', [CategoryController::class, 'edit'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/categorie/update', [CategoryController::class, 'update'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/categorie/{id}/delete', [CategoryController::class, 'destroy'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/categorie/store', [CategoryController::class, 'store'], [AuthMiddleware::class]);



        // $this->router->add('GET', '/archi', [UserController::class, 'index']);
        $this->router->add('GET', '/archi/user', [UserController::class, 'index'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/user/{id}/show', [UserController::class, 'show'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/user/create', [UserController::class, 'create'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/user/{id}/edit', [UserController::class, 'edit'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('POST', '/archi/user/{id}/update', [UserController::class, 'update'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('POST', '/archi/user/store', [UserController::class, 'store'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/user/{id}/delete', [UserController::class, 'destroy'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/user/{id}/generateToken', [UserController::class, 'generateToken'], [AuthMiddleware::class, AdminMiddleware::class] );


        $this->router->add('GET', '/archi/category', [CategoryController::class, 'index'], );
        $this->router->add('GET', '/archi/category/create', [CategoryController::class, 'create'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/category/{id}/show', [CategoryController::class, 'show']);
        $this->router->add('POST', '/archi/category', [CategoryController::class, 'store'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/category/{id}/edit', [CategoryController::class, 'edit'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/category/{id}/update', [CategoryController::class, 'update'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/category/{id}/delete', [CategoryController::class, 'destroy'], [AuthMiddleware::class]);
        

        $this->router->add('GET', '/archi/auth/login', [AuthController::class, 'login']);
        $this->router->add('POST', '/archi/auth/loginProcess', [AuthController::class, 'loginProcess']);
        $this->router->add('GET', '/archi/auth/logout', [AuthController::class, 'logout']);


        
    }
    
    public function dispatch() {
        
        $this->router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    }

}