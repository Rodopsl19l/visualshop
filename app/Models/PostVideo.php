<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostVideo extends Model
{
    protected $fillable = [
        'post_id',
        'url',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
