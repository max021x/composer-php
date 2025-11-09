<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $role;
    public $created_at;

    protected static $table = 'users';
}
