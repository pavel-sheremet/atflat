<?php

namespace App\Policies;

use App\Agency;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgencyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any agencies.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the agency.
     *
     * @param User $user
     * @param Agency $agency
     * @return mixed
     */
    public function viewProfile(User $user, Agency $agency)
    {
        return $user->isAgencyOwner($agency) || $user->isAgencyAgent($agency);
    }

    /**
     * Determine whether the user can create agencies.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the agency.
     *
     * @param User $user
     * @param Agency $agency
     * @return mixed
     */
    public function update(User $user, Agency $agency)
    {
        //
    }

    /**
     * Determine whether the user can delete the agency.
     *
     * @param User $user
     * @param Agency $agency
     * @return mixed
     */
    public function delete(User $user, Agency $agency)
    {
        //
    }

    /**
     * Determine whether the user can restore the agency.
     *
     * @param User $user
     * @param Agency $agency
     * @return mixed
     */
    public function restore(User $user, Agency $agency)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the agency.
     *
     * @param User $user
     * @param Agency $agency
     * @return mixed
     */
    public function forceDelete(User $user, Agency $agency)
    {
        //
    }
}
