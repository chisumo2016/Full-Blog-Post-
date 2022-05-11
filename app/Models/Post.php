<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'avatar',
        'description',
        'quote',
        'likes',
        'views',
        'status',
        'user_id',

    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(
            related:Category::class,
            table:          'category_post',
            foreignPivotKey:'post_id',
            relatedPivotKey: 'category_id'
        );

        //return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            related:Tag::class,
            table:          'post_tag',
            foreignPivotKey:'post_id',
            relatedPivotKey: 'tag_id'
        );

        //return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }
}
