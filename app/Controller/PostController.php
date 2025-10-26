<?php

namespace App\Controller ; 

class PostController {

    public function index () {
        return "Posts" ; 
    }

    public function show ($id) {
        return "Post nr $id" ; 
    }

}