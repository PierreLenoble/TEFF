<?php

require_once './controller/controller.php';

Class DefaultController extends Controller{
    
    public static function index22PageAction($langage, $i) {
        
        $varPage = array();
        
        $varUrl = array();
        $varUrl["langage"] = $langage;
        $varUrl["i"] = $i;
        
        $varPage["address"] = RouteCollection::generateUrl("index22Page", $varUrl);
        $varPage["text"] = 'Hello world!';
        echo self::$twig->render('page.html', $varPage);
    }
    
    protected static function initLangage ($langage) {
        if (in_array($langage, array("fr", "en"))) {
            $_SESSION["langage"] = $langage;
        } else {
            throw new Exception("Unknown Langage " . $langage);
        }
    }
    
    public static function niussLangage_Action($editionYear, $langage) {
        echo "niuss action 2 param";
    }
    
    
    public static function niuss_Action($editionYear) {
        echo "niuss action 1 param";
    }
    
    
}

