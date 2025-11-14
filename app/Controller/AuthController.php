<?php

namespace App\Controller ;

use App\Services\Auth;
use Core\Router;
use Core\View ; 

class AuthController {

    public function create (array $data = []) {
        
        return View::render(
            template:'auth/create.php' , 
            layout:'layouts/main.php' , 
            data: $data
        ) ;  
        
    }

    public function  store () {

        // TO do csrf Token 
        $email  = $_POST['email'] ; 
        $password= $_POST['password'] ; 

        // Attempt auth
        if(Auth::attempt($email , $password)){
            Router::redirect('/');
        }
        
        // else return back
        return $this->create(['error' => "Invalid credentials"]) ; 
    }

}


