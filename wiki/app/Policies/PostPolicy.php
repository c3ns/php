<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function edit(User $user, Post $post)
    {
        if(($user->id == $post->user) || ($user->name === 'admin'))
            return true;
        else
            return false;
    }
}
