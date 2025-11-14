<?php

namespace App\Controller;

use App\Models\Post;

use Core\View;

class HomeController
{
    public function index()
    {
        $posts = Post::getRecent(5); 
        return View::render(
            template: 'home/index.php',
            data: ['posts' => $posts],
            layout: 'layouts/main.php'
        );
    }
}
