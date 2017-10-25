<?php

session_start();

// Init
if (!isset($_SESSION["langage"])) {
    $_SESSION["langage"] = "fr";
}

if (!isset($_SESSION["editionYear"])) {
    $_SESSION["editionYear"] = "2016";
}

// Routing
include_once './utils/routing/route.php';
include_once './utils/routing/routeCollection.php';
include_once './utils/routing/config.php';

// Twig
require_once './twig/vendor/autoload.php'; 
$loader = new Twig_Loader_Filesystem('./twig/views/');
$twig = new Twig_Environment($loader);

// Routing
$pageUrl = $_SERVER['REQUEST_URI'];
$routeName = RouteCollection::getNameRouteMatch($pageUrl);
$route = RouteCollection::getRoute($routeName);

if (empty($routeName)) {
    
    require_once './controller/errorController.php';
    ErrorController::init($twig, "error404", $pageUrl);
    ErrorController::Error404();
} else {
    $route = RouteCollection::getRoute($routeName);
    $routePath = $route->getPath(); 
    $arrayPageUrl = explode("/", $pageUrl);
    $arrayRoutePath = explode("/", $routePath);
    $arrayParam = array();
    foreach ($arrayRoutePath as $key => $value) {
        
        if (substr($value, 0, 1) == "{"){
            $tmp = substr($value, 1, strlen($value)-2);
            $arrayParam[$tmp] = $arrayPageUrl[$key];
        }
    }
        
    $controllerFunction = RouteCollection::getRoute($routeName)->getController();
    $controller = substr($controllerFunction, 0, strpos($controllerFunction, ":"));
    $function = substr($controllerFunction, strlen($controller)+2) . "_Action";
    
    require_once './controller/'.$controller.'.php';
    
    call_user_func_array($controller."::init", array($twig, $routeName, $pageUrl));
    call_user_func_array(array($controller, $function), $arrayParam);
}


