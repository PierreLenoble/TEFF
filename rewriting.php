<?php


include_once './Config/Routing.php';


$pageRequest = str_replace("/TEFF/", "", $_SERVER['REQUEST_URI']);

echo $pageRequest . "<br>";
$routeName = RouteCollection::getNameRouteMatch($pageRequest);
if (empty($routeName)) {
    echo "route introuvable";
} else {
    echo $routeName;
}

echo "<a href=\"".RouteCollection::generateUrl("index22Page", array("lg"=>"fr", "i" =>"youhou"))."\">here</a>";

