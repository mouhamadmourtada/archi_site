<?php


spl_autoload_register(function ($class) {
    // Définissez le chemin de base de vos classes
    // $baseDir = __DIR__ . '$_SERVER["DOCUMENT_ROOT"]/archi/';
    $baseDir = $_SERVER["DOCUMENT_ROOT"]."/archi/";
    
    // Remplacez "MonNamespace\\" par le namespace site\de vos classes
    $prefix = '';

    // Vérifie si la classe utilise le préfixe du namespace site\spécifié
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return; // La classe ne correspond pas au préfixe du namespace site\spécifié
    }

    // Détermine le chemin relatif de la classe
    $relativeClass = substr($class, $len);
    // Construit le chemin complet du fichier de la classe
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    

    // Vérifie si le fichier de la classe existe et le charge
    if (file_exists($file)) {
        require $file;
    }
});