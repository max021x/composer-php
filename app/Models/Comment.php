<?php

namespace App\Models;

use Core\Model;
use Core\App;

class Comment extends Model
{
    protected static $table = 'comments';

    public $id;
    public $post_id;
    public $user_id;
    public $content;
    public $created_at;
    public $updated_at;


    public static function forPost($postId): array
    {
        $db = App::get('database');
        return $db->fetchAll(
            "SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC",
            [$postId],
            static::class
        );
    }
}
