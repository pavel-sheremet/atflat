<?php

namespace App\Policies;

use App\Agency;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use function HighlightUtilities\getAvailableStyleSheets;

class AgencyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any agencies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the agency.
     *
     * @param  \App\User  $user
     * @param  \App\Agency  $agency
     * @return mixed
     */
    public function view(User $user, Agency $agency)
    {
        return false;
    }

    /**
     * Determine whether the user can create agencies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the agency.
     *
     * @param  \App\User  $user
     * @param  \App\Agency  $agency
     * @return mixed
     */
    public function update(User $user, Agency $agency)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the agency.
     *
     * @param  \App\User  $user
     * @param  \App\Agency  $agency
     * @return mixed
     */
    public function delete(User $user, Agency $agency)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the agency.
     *
     * @param  \App\User  $user
     * @param  \App\Agency  $agency
     * @return mixed
     */
    public function restore(User $user, Agency $agency)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the agency.
     *
     * @param  \App\User  $user
     * @param  \App\Agency  $agency
     * @return mixed
     */
    public function forceDelete(User $user, Agency $agency)
    {
        return false;
    }

    public function viewProfile(User $user, Agency $agency)
    {
        return $user->isAgencyOwner($agency) || $user->isAgencyAgent($agency);
    }
}
