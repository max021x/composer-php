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
        $page = $_GET['page'] ?? 1;
        $limit = 1;

        $posts = Post::getRecent($limit, $page, $search);
        $total = Post::count($search);

        return View::render(
            template: 'posts/index.php',
            data: [
                'posts' => $posts,
                'search' => $search,
                'currentPage' => $page,
                'totalPages' => ceil($total / $limit)
            ],
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
        return View::render(template: 'posts/show.php', data: ['post' => $post, 'comments' => $comments], layout: 'layouts/main.php');
    }
}
