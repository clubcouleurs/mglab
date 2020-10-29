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
        //
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
        if (isset($user->graphiste)) {
            return ($user->graphiste->id === $conception->graphiste_id)
                    ? Response::allow()
                    : Response::deny('Vous n\'êtes pas le graphiste responsable de cette conception.');
        }
        else
        {
        return ($user->ID === $conception->user_id)
                    ? Response::allow()
                    : Response::deny('Vous n\'êtes pas propriétaire cette conception.');            
        }
    }

    public function viewPropal(User $user, Conception $conception)
    {       
        return $user->ID === $conception->user_id 
                    ? Response::allow()
                    : Response::deny('Accès interdit');            

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
        if (isset($user->graphiste)) {
            return ($user->graphiste->id === $conception->graphiste_id)
                    ? Response::allow()
                    : Response::deny('Vous n\'êtes pas le graphiste responsable de cette conception.');
        }
        else
        {
        return ($user->ID === $conception->user_id)
                    ? Response::allow()
                    : Response::deny('Vous n\'êtes pas propriétaire cette conception.');            
        }
    }

    public function edit(User $user, Conception $conception)
    {
        if (isset($user->graphiste))
        {
            if ($user->graphiste->id === $conception->graphiste_id)
            {
                return Response::allow(); 
            }
            else
            {
                return Response::deny('Vous n\'êtes pas le graphiste responsable de cette conception.');
            }
        }
        else
        {
            if ($user->ID === $conception->user_id)
            {
                return Response::allow(); 
            }
            else
            {
                return Response::deny('Vous n\'êtes pas propriétaire cette conception.');
            }          
        }
    }

    //public function canEditConception(Conception $conception)
    //{
    //    return $conception->status_id === 1 ? true : false ;
    //}

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
