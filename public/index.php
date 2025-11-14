<?php

require_once '../bootstrap.php' ; 

session_start() ; 

use Core\Router ; 
$router = new Router ; 

require_once '../routes.php'  ; 
require_once '../helpers.php' ; 

$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ; 
$method = $_SERVER['REQUEST_METHOD'] ;

echo $router->dispatch($uri , $method) ; 





