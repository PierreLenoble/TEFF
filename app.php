<?php
// Controller
require_once './controller/defaultController.php';

// Routing
include_once './utils/routing/route.php';
include_once './utils/routing/routeCollection.php';
include_once './utils/routing/config.php';

// Twig
require_once './twig/vendor/autoload.php'; 

$loader = new Twig_Loader_Filesystem('./twig/views/');
$twig = new Twig_Environment($loader);

// Routing
$pageUrl = str_replace("/TEFF/", "", $_SERVER['REQUEST_URI']);      //  <----
$routeName = RouteCollection::getNameRouteMatch($pageUrl);
$route = RouteCollection::getRoute($routeName);
$routePath = $route->getPath(); 

if (empty($routeName)) {
    DefaultController::Error404Error();
} else {
    
    $arrayPageUrl = explode("/", $pageUrl);
    $arrayRoutePath = explode("/", $routePath);
    $arrayParam = array();
    foreach ($arrayRoutePath as $key => $value) {
        
        if (substr($value, 0, 1) == "{"){
            $tmp = substr($value, 1, strlen($value)-2);
            $arrayParam[$tmp] = $arrayPageUrl[$key];
        }
    }
    print_r($arrayParam);
    
    
    
    $controllerFunction = RouteCollection::getRoute($routeName)->getController();
    $controller = substr($controllerFunction, 0, strpos($controllerFunction, ":"));
    $function = substr($controllerFunction, strlen($controller)+2) . "Action";
    
    require_once './controller/'.$controller.'.php';
    echo $controller."::setTwig";
    call_user_func_array($controller."::init", array($twig, $routeName, $pageUrl));
    call_user_func_array(array($controller, $function), $arrayParam);
    // envoyer les différent parametre au controller;
//    
//    
//    $controller::$twig = $twig;
//    $controller::$function();
    
}


