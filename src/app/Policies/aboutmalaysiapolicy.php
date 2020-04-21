<?php

namespace App\Policies;

use App\User;
use App\aboutmalaysia;
use Illuminate\Auth\Access\HandlesAuthorization;

class aboutmalaysiapolicy
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
     * @param  \App\aboutmalaysia  $aboutmalaysia
     * @return mixed
     */
    public function view(User $user, aboutmalaysia $aboutmalaysia)
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
     * @param  \App\aboutmalaysia  $aboutmalaysia
     * @return mixed
     */
    public function update(User $user, aboutmalaysia $aboutmalaysia)
    {
        return $aboutmalaysia->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\aboutmalaysia  $aboutmalaysia
     * @return mixed
     */
    public function delete(User $user, aboutmalaysia $aboutmalaysia)
    {
        return $aboutmalaysia->user->is($user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\aboutmalaysia  $aboutmalaysia
     * @return mixed
     */
    public function restore(User $user, aboutmalaysia $aboutmalaysia)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\aboutmalaysia  $aboutmalaysia
     * @return mixed
     */
    public function forceDelete(User $user, aboutmalaysia $aboutmalaysia)
    {
        //
    }
}
