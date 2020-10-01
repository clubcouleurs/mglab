<?php

namespace App\Policies;

use App\Propal;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropalPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Propal  $propal
     * @return mixed
     */
    public function view(User $user, Propal $propal, Conception $conception)
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
     * @param  \App\Propal  $propal
     * @return mixed
     */
    public function update(User $user, Propal $propal)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Propal  $propal
     * @return mixed
     */
    public function delete(User $user, Propal $propal)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Propal  $propal
     * @return mixed
     */
    public function restore(User $user, Propal $propal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Propal  $propal
     * @return mixed
     */
    public function forceDelete(User $user, Propal $propal)
    {
        //
    }
}
