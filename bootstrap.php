<?php
declare(strict_types = 1) ; 

require_once "vendor/autoload.php" ; 

$config = require_once "config.php" ; 

use Core\App ; 
use Core\Database ; 

App::bind('config' , $config) ; 
App::bind('database' , new Database($config['database'])) ; 

