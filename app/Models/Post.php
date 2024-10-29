<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'qna',
        'slug',
        'tags',
        'content',
        'published',
        'image',
        'user_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function images()
    {
        return $this->hasManyThrough(Image::class, PostImage::class, 'post_id', 'id', 'id', 'image_id');
    }

    public function metadata()
    {
        return $this->morphOne(Metadata::class, 'model');
    }
}
