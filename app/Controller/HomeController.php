<?php

namespace App\Controller ;

use App\Models\User ; 
use Core\View ; 

class HomeController {    
    public function index () {
        User::create([
            'name' => "Max" , 
            'email' => "Max@gmail.com" , 
            'password' => password_hash("max123" , PASSWORD_DEFAULT)  , 
            'role' => 'admin' , 
        ]) ; 
       return View::render(template:'Home/index.php' , data:['message' => 'Hello' , 'title' => 'Home'] , layout:'layouts/main.php') ; 
    }

}