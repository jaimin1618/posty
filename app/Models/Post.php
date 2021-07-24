<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'body'
    ];
        
    public function user () {
        return $this->belongsTo(User::class);
    }
    
    public function likes () {
        return $this->hasMany(Like::class); // HAS MANY RELATION
    }
    
    // checking if post is liked by logged-in user
    public function likedBy (User $user) {
        return $this->likes->contains('user_id', $user->id); // from Laravel Collection
        /*
        this checks if $user->id(USER) is inside 'user_id'  => something like is 2nd post is liked by 4th user  => if (YES) true else returns false
        */
    }
    
    // checking if post owned by logged-in user
    // We can Comment Out because we have Added it into Permission
    // public function ownedBy (User $user) {
    //     return $user->id === $this->user_id; // if Post.user_id is same as user.id that means logged-in is owner of that post
    // }
    
    
    
}
