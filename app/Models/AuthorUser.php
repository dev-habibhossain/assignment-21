<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorUser extends Model
{
    protected $fillable = [
    'name',
    'email',
    'password', 
    'image', 
    'role',
];
}
