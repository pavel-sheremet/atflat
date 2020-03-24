<?php

namespace App\Policies;

use App\Realty;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RealtyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any realties.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the realty.
     *
     * @param  \App\User  $user
     * @param  \App\Realty  $realty
     * @return mixed
     */
    public function view(User $user, Realty $realty)
    {
        //
    }

    /**
     * Determine whether the user can create realties.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the realty.
     *
     * @param  \App\User  $user
     * @param  \App\Realty  $realty
     * @return mixed
     */
    public function update(User $user, Realty $realty)
    {
        return $realty->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the realty.
     *
     * @param  \App\User  $user
     * @param  \App\Realty  $realty
     * @return mixed
     */
    public function delete(User $user, Realty $realty)
    {
        return $realty->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the realty.
     *
     * @param  \App\User  $user
     * @param  \App\Realty  $realty
     * @return mixed
     */
    public function restore(User $user, Realty $realty)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the realty.
     *
     * @param  \App\User  $user
     * @param  \App\Realty  $realty
     * @return mixed
     */
    public function forceDelete(User $user, Realty $realty)
    {
        //
    }
}
