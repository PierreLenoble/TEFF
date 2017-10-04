<?php


RouteCollection::setStartUrl('http://localhost/TEFF/');

RouteCollection::add('homePage', '{lg}/home', 'DefaultController::homePage');
RouteCollection::add('indexPage', '{lg}/index', 'DefaultController::indexPage');
RouteCollection::add('index22Page', '{lg}/{i}/index22', 'DefaultController::index22Page');