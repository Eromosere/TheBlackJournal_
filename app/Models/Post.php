<?php

namespace App\Models;

use App\Enums\PostEnum;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'slug', 'image', 'published_at', 'status', 'category_id', 'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'status' => PostEnum::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
