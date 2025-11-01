<?php
declare(strict_types = 1) ; 

require_once "vendor/autoload.php" ; 

use Core\App ; 
use Core\Database ; 
use Core\Errorhandler ; 


set_exception_handler([Errorhandler::class , 'handleException'])  ;
set_error_handler([Errorhandler::class , 'handleError']) ; 

$config = require_once "config.php" ;  

App::bind('config' , $config) ; 
App::bind('database' , new Database($config['database'])) ; 

