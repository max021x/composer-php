<?php

namespace App\Controller ; 

use Core\View ; 

class HomeController {

    public function index () {
       return View::render(template:'Home/index.php' , data:['message' => 'Hello' , 'title' => 'Home'] , layout:'layouts/main.php') ; 
    }

}