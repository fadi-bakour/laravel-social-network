<?php

namespace App\Policies;

use App\User;
use App\posts;
use Illuminate\Auth\Access\HandlesAuthorization;

class postspolicy
{
    use HandlesAuthorization;

    public function before (user $user){

        if  ($user->roles()->pluck('name')->contains('Manager') | $user->roles()->pluck('name')->contains('Admin') )

        return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */



    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\posts  $posts
     * @return mixed
     */
    public function view(User $user, posts $posts)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\posts  $posts
     * @return mixed
     */
    public function update(User $user, posts $posts)
    {
        return $posts->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\posts  $posts
     * @return mixed
     */
    public function delete(User $user, posts $posts)
    {
        return $posts->user->is($user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\posts  $posts
     * @return mixed
     */
    public function restore(User $user, posts $posts)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\posts  $posts
     * @return mixed
     */
    public function forceDelete(User $user, posts $posts)
    {
        //
    }
}
