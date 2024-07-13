<?php

namespace site\Routes;
use site\Routes\Router;
use site\controllers\ArticleController;
use site\auth\AuthController;
use site\controllers\CategoryController;
use site\controllers\UserController;
use site\Middleware\AdminMiddleware;
use site\middleware\AuthMiddleware;
use site\models\domaine\Article;
use rest\ArticleController as RestArticleController;



class Routes {

    private $router;

    function __construct() {
        
        $this->router = new Router();

        $this->router->add('GET', '/archi/site', [ArticleController::class, 'index']);
        $this->router->add('GET', '/archi/site/article/articleCategorie/{id}', [ArticleController::class, 'articleCategorie']);
        $this->router->add('GET', '/archi/site/article', [ArticleController::class, 'index']);
        $this->router->add('GET', '/archi/site/article/{id}/show', [ArticleController::class, 'show']);
        $this->router->add('GET', '/archi/site/article/create', [ArticleController::class, 'create'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/site/article/{id}/edit', [ArticleController::class, 'edit'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/site/article/update', [ArticleController::class, 'update'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/site/article/{id}/delete', [ArticleController::class, 'destroy'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/site/article/store', [ArticleController::class, 'store'], [AuthMiddleware::class]);





        // categorie
        $this->router->add('GET', '/archi/site/categorie', [CategoryController::class, 'index']);
        $this->router->add('GET', '/archi/site/categorie/{id}/show', [CategoryController::class, 'show']);
        $this->router->add('GET', '/archi/site/categorie/create', [CategoryController::class, 'create'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/site/categorie/{id}/edit', [CategoryController::class, 'edit'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/site/categorie/update', [CategoryController::class, 'update'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/site/categorie/{id}/delete', [CategoryController::class, 'destroy'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/site/categorie/store', [CategoryController::class, 'store'], [AuthMiddleware::class]);



        // $this->router->add('GET', '/archi/site', [UserController::class, 'index']);
        $this->router->add('GET', '/archi/site/user', [UserController::class, 'index'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/site/user/{id}/show', [UserController::class, 'show'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/site/user/create', [UserController::class, 'create'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/site/user/{id}/edit', [UserController::class, 'edit'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('POST', '/archi/site/user/{id}/update', [UserController::class, 'update'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('POST', '/archi/site/user/store', [UserController::class, 'store'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/site/user/{id}/delete', [UserController::class, 'destroy'], [AuthMiddleware::class, AdminMiddleware::class] );
        $this->router->add('GET', '/archi/site/user/{id}/generateToken', [UserController::class, 'generateToken'], [AuthMiddleware::class, AdminMiddleware::class] );


        $this->router->add('GET', '/archi/site/category', [CategoryController::class, 'index'], );
        $this->router->add('GET', '/archi/site/category/create', [CategoryController::class, 'create'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/site/category/{id}/show', [CategoryController::class, 'show']);
        $this->router->add('POST', '/archi/site/category', [CategoryController::class, 'store'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/site/category/{id}/edit', [CategoryController::class, 'edit'], [AuthMiddleware::class]);
        $this->router->add('POST', '/archi/site/category/{id}/update', [CategoryController::class, 'update'], [AuthMiddleware::class]);
        $this->router->add('GET', '/archi/site/category/{id}/delete', [CategoryController::class, 'destroy'], [AuthMiddleware::class]);
        

        $this->router->add('GET', '/archi/site/auth/login', [AuthController::class, 'login']);
        $this->router->add('POST', '/archi/site/auth/loginProcess', [AuthController::class, 'loginProcess']);
        $this->router->add('GET', '/archi/site/auth/logout', [AuthController::class, 'logout']);



        // les routes pour api
        $this->router->add('GET', '/archi/site/api/article', [RestArticleController::class, 'index']);
        $this->router->add('GET', '/archi/site/api/category/{id}/articles', [RestArticleController::class, 'findByCategory']);
        $this->router->add('GET', '/archi/site/api/category/articles', [RestArticleController::class, 'groupeByCategory']);


        
    }
    
    public function dispatch() {
        
        $this->router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    }

}