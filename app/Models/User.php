<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'user_type_id',
        'name',
        'lastname',
        'email',
        'username',
        'password',
        'phone',
        'profile_photo_path',
        'cover_photo_path',
    ];

    public function userType() {
        return $this->belongsTo(UserType::class);
    }
}
