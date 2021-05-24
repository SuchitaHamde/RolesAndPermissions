<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    // use sluggable;
    protected $table = 'posts';
    protected $fillable = ['title', 'body', 'slug', 'user_id'];

    // public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}
