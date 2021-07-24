<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    
    // this takes Auth and Model[where we want to add policy]
    public function delete(User $user, Post $post) {
        // IT this returns TRUE only them we have permission to delete IT
        return $user->id ===$post->user_id;
    }
    
}
