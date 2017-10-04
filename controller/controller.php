<?php

class Controller {
    protected static $twig;
    protected static $routeName;
    protected static $pageUrl;
    
    public static function init($twig, $routeName, $pageUrl){
        self::$twig = $twig;
        self::$routeName = $routeName;
        self::$pageUrl = $pageUrl;
    }
}