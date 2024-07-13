<?php
namespace service;
use SoapServer;

// Charger le WSDL
$wsdl = 'User.wsdl';
require_once '../autoload.php'; 
use service\UserService; 
// require_once 'UserService.php'; // Inclure la classe HelloService (renommée si nécessaire)

// Créer un serveur SOAP
$server = new SoapServer($wsdl);

// Créer une instance de HelloService (renommé si nécessaire)
$userService = new UserService(); // Renommez selon le nom de votre classe

// Enregistrer toutes les méthodes de la classe UserService (ou HelloService) comme méthodes du service SOAP
$server->setClass('service\UserService'); // Renommez selon le nom de votre classe
$server->setObject($userService);
// Gérer la requête SOAP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $server->handle();
} else {
    // Afficher le WSDL si le paramètre ?wsdl est présent
    if (isset($_GET['wsdl'])) {
        header('Content-Type: text/xml');
        echo file_get_contents($wsdl);
    } else {
        echo "Service SOAP UserService"; // Renommez selon votre nouveau nom de service
    }
}

?>
