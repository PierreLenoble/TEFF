<?php

class RouteCollection {
    
    private static $_routes = array();
    private static $startUrl = '';
    
    public static function add($name, $path, $controller) {
        unset(self::$_routes[$name]);
        
        $route = new Route($path, $controller);
        self::$_routes[$name] = $route;
    }
    
    public static function getRoute($name) {
        return isset(self::$_routes[$name]) ? self::$_routes[$name] : null;
    }
    
    public static function setStartUrl($startUrl) {
        self::$startUrl = $startUrl;
    }
    
    private static function isMatchingPath($path, $pathRoute) {
        $arrayPath = explode("/", $path);
        $arrayPathRoute = explode("/", $pathRoute);
        $match=true;
        if (count($arrayPath) == count($arrayPathRoute)){
            foreach ($arrayPathRoute as $key => $value) {
                if (substr($value, 0, 1 ) != "{" &&
                        $arrayPath[$key] != $arrayPathRoute[$key]){
                    $match=false;
                    break;
                }
            }
        } else {
            
            $match=false;
        }
        return $match;
    }
    
    public static function getNameRouteMatch($path) {
        $name = '';
        foreach (self::$_routes as $nameRoute => $route) {
            if (self::isMatchingPath($path, $route->getPath())){
                $name = $nameRoute;
                break;
            }
        }
        return $name;
    }

    public static function generateUrl($name, $fields) {
        $route = self::getRoute($name);
        $routePath = $route->getPath();
        foreach ($fields as $key => $value) {
            $routePath = str_replace("{".$key."}", $value, $routePath);
        }
        return self::$startUrl.$routePath;
    }
}