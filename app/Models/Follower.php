<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower  extends Model
{
    protected $fillable = [
        'user_id_follower',
        'user_id_following',
    ];
}
