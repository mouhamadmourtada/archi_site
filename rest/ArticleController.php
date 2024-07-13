<?php

namespace rest;

use site\controllers\Controller;
use site\services\ArticleService;
use site\models\domaine\Article;

class ArticleController extends ApiController{



    public function index($params) {
        $format = "json";
        if (isset($params['format'])) {
            $format = $params['format'];
        }
    
        $service = new ArticleService();
        $articles =  $service->listArticles($format);
        // return $articles;
        $this->send($articles);
    }
    

    public function articleCategorie($params){
        $format = "json";
        if(isset($params['format'])){
            $format = $params['format'];
        }

        $service = new ArticleService();
        $articles = $service->findByCategory($params['id'], $format);
        return $articles;
        // $this->sendJson($articles);
    }

    public function groupeByCategory($params){
        $format = "json";
        if(isset($params['format'])){
            $format = $params['format'];
        }

        $service = new ArticleService();
        $articles = $service->groupeByCategory($format);
        return $this->send($articles, 200);
        // $this->sendJson($articles);
    }
}