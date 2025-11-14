<?php

require_once '../bootstrap.php' ; 
require_once '../helpers.php' ; 

session_start() ;

use App\Services\Auth;
use Core\Router ;
use Core\View;

$router = new Router ; 

require_once '../routes.php'  ; 

View::share("user"  , Auth::user()) ; 

$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ; 
$method = $_SERVER['REQUEST_METHOD'] ;

echo $router->dispatch($uri , $method) ; 





