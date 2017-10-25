<?php

require_once './controller/controller.php';

Class ErrorController extends Controller{
    
    public static function init($twig, $routeName, $pageUrl){
        parent::init($twig, $routeName, $pageUrl);
        self::initLangage();
        self::initEditionYear();
        self::initMenu();
    }
    
    protected static function initLangage () {
        $arrayPageUrl = explode("/", self::$pageUrl);
        
        // SQL
        $tabLangage = array("fr", "en");
        
        // INIT Langage
        foreach ($arrayPageUrl as $key => $value) {
            if ($key >=3){
                continue;
            } 
            if (in_array(strtolower($value), $tabLangage)) {
                $_SESSION["langage"] = strtolower($value);
            }
        }
        
        self::$langage = $_SESSION["langage"];
        
    }
    
    protected static function initEditionYear () {
        $arrayPageUrl = explode("/", self::$pageUrl);
        
        // SQL
        $tabEditionYear = array("2016", "2015", "2014", "2013", "2012");
        
        // INIT EditionYear
        foreach ($arrayPageUrl as $key => $value) {
            if ($key >=3){
                continue;
            } 
            if (in_array(strtolower($value), $tabEditionYear)) {
                $_SESSION["editionYear"] = strtolower($value);
            }
        }
        
        self::$editionYear = $_SESSION["editionYear"];
    }
    
    public static function Error404() {
        
        $varPage = array();
        $varPage["adress"] = "http://".$_SERVER["SERVER_NAME"]."/";
        $varPage["menu"] = self::$menu;
        $varPage["menuArchive"] = self::$menuArchive;
        $varPage["langage"] = self::$langage;
        $varPage["editionYear"] = self::$editionYear;
        
        
        // les textes
        $varPage["traduction"]["windowTitle"] = "Error : page not found";
        
        $varPage["traduction"]["title"] = "Aaargh ! page not found ! - ".self::$langage;
        
        $varPage["traduction"]["text"] = ""
                ."This page doesn't exist anymore or was moved<br><br>"
                ."Please excuse us for this disturbance<br><br>";
        
        $varPage["traduction"]["signature"] = "The webmaster";
        
        $varPage["traduction"]["soutiens"] = "Avec les soutiens : ";
        
        echo self::$twig->render('error/error404.html.twig', $varPage);
    }
    
}

