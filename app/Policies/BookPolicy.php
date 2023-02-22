<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
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
     * Determine whether the user can store a post.
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
     * Determine whether the user can update the post.
     *
     * @param User $user
     * @param Book $book
     * @return bool
     */
    public function update(User $user, Book $book): bool
    {
        return true;
    }

    /**
     *
     *
     * @param User $user
     * @param Book $book
     * @return bool
     */
    public function view(User $user,  Book $book): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param User $user
     * @param Book $book
     * @return bool
     */
    public function delete(User $user, Book $book): bool
    {
        return true;
    }

}
