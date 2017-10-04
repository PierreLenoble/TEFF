<?php

require_once './controller/controller.php';

Class DefaultController extends controller{
    
    public static function index22PageAction($lg, $i) {
        
        $varPage = array();
        
        $varUrl = array();
        $varUrl["lg"] = $lg;
        $varUrl["i"] = $i;
        
        $varPage["address"] = RouteCollection::generateUrl("index22Page", $varUrl);
        $varPage["text"] = 'Hello world!';
        echo self::$twig->render('page.html', $varPage);
    }
}

