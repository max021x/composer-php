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
        $search = $_GET['search'] ?? '';
        $posts = Post::getRecent(5 , $search);
        return View::render(
            template: 'Posts/index.php',
            data: ['posts' => $posts, 'search' => $search],
            layout: 'layouts/main.php'
        );
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
