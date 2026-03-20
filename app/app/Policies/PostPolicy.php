<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Example policy: a user can update a post only if they own it.
     */
    public function update(User $user, Post $post): bool
    {
        return $post->user_id === $user->id;
    }
}

