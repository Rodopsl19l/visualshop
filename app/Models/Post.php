<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'published',
    ];

    public function postImages() {
        return $this->hasMany(PostImage::class);
    }

    public function postVideos() {
        return $this->hasOne(PostVideo::class);
    }
}
