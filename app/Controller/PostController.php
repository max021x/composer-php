<?php

namespace App\Controller;

use App\Models\Comment;
use App\Models\Post;
use Core\Router;
use Core\View;

class PostController
{

    public function index()
    {
        return "All Posts";
    }

    public function show($id)
    {

        $post = Post::find($id);

        if (!$post) {
            Router::notFound();
        }

        $comments = Comment::forPost($id);

        Post::incrementViews($id);


        return View::render(template: 'Posts/show.php', data: ['post' => $post, 'comments' => $comments], layout: 'layouts/main.php');
    }
}
