<?php


RouteCollection::setStartUrl('http://teff-tfe/');

RouteCollection::add('error404', 'erreur/404', 'ErrorController::error404');


RouteCollection::add('homePage', '{langage}/home', 'DefaultController::homePage');
RouteCollection::add('indexPage', '{langage}/index', 'DefaultController::indexPage');
RouteCollection::add('index22Page', '{langage}/{i}/index22', 'DefaultController::index22Page');


RouteCollection::add('2016_news_langage', '{editionYear}/{langage}/niuss', 'DefaultController::niussLangage');
RouteCollection::add('2016_news', '{editionYear}/niuss', 'DefaultController::niuss');
