<?php

include_once './Utils/Routing/Route.php';
include_once './Utils/Routing/RouteCollection.php';

RouteCollection::setStartUrl('http://localhost/TEFF/');

RouteCollection::add('homePage', '{lg}/home', 'ctrl');
RouteCollection::add('indexPage', '{lg}/index', 'ctrl');
RouteCollection::add('index22Page', '{lg}/{i}/index22', 'ctrl');


