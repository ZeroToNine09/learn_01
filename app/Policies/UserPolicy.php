<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user is admin for all authorization.
     *
     * @param User $user
     *
     * @return bool
     */
    public function before(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can store a medium.
     *
     * @param User $user
     *
     * @return bool
     */
    public function store(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the user.
     *
     *
     * @param User $current_user
     * @param User $user
     *
     * @return bool
     */
    public function view(User $current_user, User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param User $current_user
     * @param User $user
     *
     * @return bool
     */
    public function update(User $current_user, User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param User $current_user
     * @param User $user
     *
     * @return bool
     */
    public function delete(User $current_user, User $user): bool
    {
        return true;
    }
}

