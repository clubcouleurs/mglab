<?php

namespace App\Policies;

use App\Conception;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class ConceptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conception  $conception
     * @return mixed
     */
    public function view(User $user, Conception $conception)
    {
        return $user->ID === $conception->user_id || $user->ID === $conception->graphiste_id
                ? Response::allow()
                : Response::deny('Vous n\'êtes pas propriétaire cette conception.');

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conception  $conception
     * @return mixed
     */
    public function update(User $user, Conception $conception)
    {
        return $user->ID === $conception->user_id || $user->ID === $conception->graphiste_id
                ? Response::allow()
                : Response::deny('Vous n\'êtes pas propriétaire cette conception.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conception  $conception
     * @return mixed
     */
    public function delete(User $user, Conception $conception)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conception  $conception
     * @return mixed
     */
    public function restore(User $user, Conception $conception)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conception  $conception
     * @return mixed
     */
    public function forceDelete(User $user, Conception $conception)
    {
        //
    }
}
