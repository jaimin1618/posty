<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use App\Http\Models\Post;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

	
    protected $fillable = [
        'name',
        'username',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

	
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    // Making elioquent RELATIONSHIP between USER <=> POST
    public function posts() {
        return $this->hasMany(Post::class);
    }
    
    
    public function likes () {
        return $this->hasMany(Like::class);
    }
    
    public function receivedLikes () {
        return $this->hasManyThrough(Like::class, Post::class);
        // Laravel DB RelationShip for HAS MANY LIKES THROUGH MANY POSTS
    }
    
}
