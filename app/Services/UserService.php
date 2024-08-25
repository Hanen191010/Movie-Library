<?php

namespace App\Services;

use App\Models\User; // Import the User model

class UserService
{
    /*
     * Creates a new user.
     *
     * @param array $data The data for the new user.
     * @return User The newly created user instance.
     */
    public function createUser(array $data)
    {
        return User::create($data); // Use the User model's create method to create a new user record from the provided data
    }

    /*
     * Updates an existing user.
     *
     * @param User $user The user instance to update.
     * @param array $data The data to update the user with.
     * @return User The updated user instance.
     */
    public function updateUser(User $user, array $data)
    {
        $user->update($data); // Use the User model's update method to update the existing user instance with the provided data
        return $user; // Return the updated user instance
    }

    /*
     * Deletes a user.
     *
     * @param User $user The user instance to delete.
     * @return void
     */
    public function deleteUser(User $user)
    {
        $user->delete(); // Use the User model's delete method to delete the user record
    }
}
