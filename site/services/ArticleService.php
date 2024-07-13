<?php

namespace site\services;
// use collect

use site\models\domaine\Article;
use site\models\domaine\Category;
use site\services\ArticleFormatter;

class ArticleService {

    private ArticleFormatter $formatter;

    public function __construct()
    {
        $this->formatter = new ArticleFormatter();
    }

    public function listArticles($format = "json") {
        $articles = Article::all();
    
        if ($format === 'json') {
            return $this->formatter->formatToJson($articles);
        } else if ($format === 'xml') {
            return $this->formatter->formatToXml($articles);
        } else {
            return $this->formatter->formatToJson($articles);
        }
    }
    
    
    


    public function findByCategory($category_id, $format = "json"){

        $articles = Article::where('categorie', "=" , $category_id);
        if ($format === 'json') {
            return $this->formatter->formatToJson($articles);
        } else if ($format === 'xml') {
            return $this->formatter->formatToXml($articles);
        } else {
            return $this->formatter->formatToJson($articles);
        }


    }

    public function groupeByCategory($format = "json")
    {
        $categories = Category::getCategoriesWithArticles(); // Use DAO method

        // Group articles by category (assuming categories already have articles)
        $groupedCategories = [];
        foreach ($categories as $category) {
            $groupedCategories[$category->getId()] = $category->getArticles();
        }

        if ($format === 'json') {
            
            return $this->formatter->formatGroupCategoryToJson($groupedCategories);

        } else if ($format === 'xml') {
            return $this->formatter->formatToXmlForGroupedCategories($groupedCategories);
        } else {
            // Handle invalid format or return default format (e.g., JSON)
            return $this->formatter->formatGroupCategoryToJson($groupedCategories);
        }
    }

}