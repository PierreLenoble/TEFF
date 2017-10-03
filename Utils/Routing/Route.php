<?php

class Route {
    private $path = '';
    private $controller = '';
    
    public function __construct($path, $controller) {
        $this->setPath($path);
        $this->setController($controller);
    }

    function getPath() {
        return $this->path;
    }

    function getController() {
        return $this->controller;
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setController($controller) {
        $this->controller = $controller;
    }

    function generateUrl($fields) {
        $url = $this->path;
        foreach ($fields as $key => $value) {
            $url = str_replace("{".$key."}", $value, $url);
        }
        
        return $url;
    }
}

?>