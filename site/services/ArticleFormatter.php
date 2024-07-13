<?php

namespace site\services;
use site\models\domaine\Article;
use site\models\domaine\Category;

class ArticleFormatter
{
    public function formatToJson(array $articles): string
    {
        $articlesData = array_map(function ($article) {
            return $article->toArray();
        }, $articles);

        $jsonData = json_encode($articlesData, JSON_PRETTY_PRINT); 

        return $jsonData;
    }


    public function formatGroupCategoryToJson(array $groupedCategories): string
    {
        $articlesData = [];


        foreach ($groupedCategories as $categoryId => $articles) {
            $articlesData[] = [
                'category_id' => $categoryId,
                'articles' => array_map(function ($article) {
                    return $article->toArray(); // Convert each article to an array
                }, $articles),
            ];
        }
    
        
        return json_encode($articlesData, JSON_PRETTY_PRINT);
    }

    public function formatToXmlForGroupedCategories(array $groupedCategories): string
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><categories/>');
        foreach ($groupedCategories as $categoryId => $articles) {
            $categoryXml = $xml->addChild('category');
            $categoryXml->addChild('id', $categoryId);

            $articlesXml = $categoryXml->addChild('articles');
            foreach ($articles as $article) {
                $articleXml = $articlesXml->addChild('article');
                $articleXml->addChild('id', $article->getId());
                $articleXml->addChild('titre', $article->getTitre());
                $articleXml->addChild('contenu', $article->getContenu());
                $articleXml->addChild('dateCreation', $article->getDateCreation());
                $articleXml->addChild('dateModification', $article->getDateModification());

                $categorieId = $article->getCategorie() instanceof Category ? $article->getCategorie()->getId() : '';
                $articleXml->addChild('categorie', $categorieId);
            }
        }

        $xmlFormatted = $xml->asXML();
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xmlFormatted);

        return $dom->saveXML();
    }

    public function formatToXml(array $articles): string
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><articles/>');
        foreach ($articles as $article) {
            $articleXml = $xml->addChild('article');
            $articleXml->addChild('id', $article->getId());
            $articleXml->addChild('titre', $article->getTitre());
            $articleXml->addChild('contenu', $article->getContenu());
            $articleXml->addChild('dateCreation', $article->getDateCreation());
            $articleXml->addChild('dateModification', $article->getDateModification());

            $categorieId = $article->getCategorie() instanceof Category ? $article->getCategorie()->getId() : '';
            $articleXml->addChild('categorie', $categorieId);
        }
        $xmlFormatted = $xml->asXML();
        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xmlFormatted);
        return $dom->saveXML();
    }
}