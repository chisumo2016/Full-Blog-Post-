<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'status',
    ];

    public function posts()
    {
        return $this->belongsToMany(
            related:Post::class,
            table:          'category_post',
            foreignPivotKey:'category_id',
            relatedPivotKey: 'post_id'
        );
    }
}
