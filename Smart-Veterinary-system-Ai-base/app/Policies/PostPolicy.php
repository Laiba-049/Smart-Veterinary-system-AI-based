<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Allow admin to do everything (optional).
     * Remove this if you don't have admin roles.
     */
    public function before(User $user, $ability)
    {
        // Example admin check (optional)
        // if ($user->is_admin) {
        //     return true;
        // }
    }

    /**
     * Determine whether the user can view any posts.
     */
    public function viewAny(?User $user): bool
    {
        return true; // everyone can see posts
    }

    /**
     * Determine whether the user can view a post.
     */
    public function view(?User $user, Post $post): bool
    {
        return true; // public feed
    }

    /**
     * Determine whether the user can create posts.
     */
    public function create(User $user): bool
    {
        return true; // logged-in users can create
    }

    /**
     * Determine whether the user can update the post.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can restore the post.
     */
    public function restore(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can permanently delete the post.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return false; // disable hard delete
    }
}
