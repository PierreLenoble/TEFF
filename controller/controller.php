<?php

class Controller {
    protected static $twig;
    protected static $routeName;
    protected static $pageUrl;
    protected static $langage;
    protected static $editionYear;
    protected static $menu;
    protected static $menuArchive;


    public static function init($twig, $routeName, $pageUrl){
        self::$twig = $twig;
        self::$routeName = $routeName;
        self::$pageUrl = $pageUrl;
    }
    
    protected static function initMenu() {
        $params = array("editionYear" => self::$editionYear, "langage" => self::$langage);
        self::$menu = array();
        self::$menuArchive = array();
        
        self::$menu[1]["text"] = "News";
        self::$menu[1]["url"] = RouteCollection::generateUrl("2016_news", $params);
        self::$menu[2]["text"] = "News Langage";
        self::$menu[2]["url"] = RouteCollection::generateUrl("2016_news_langage", $params);
        
        self::$menuArchive[1]["text"] = "News here";
        self::$menuArchive[1]["url"] = RouteCollection::generateUrl("2016_news", $params);
    }
    
}