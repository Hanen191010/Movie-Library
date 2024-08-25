<?php

namespace App\Http\Controllers;

use App\Services\UserService; // Import the UserService interface
use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class UserController extends Controller
{
    protected $userService; // Declare a property to store the UserService instance

    // Inject the UserService dependency into the constructor
    public function __construct(UserService $userService)
    {
        $this->userService = $userService; // Initialize the UserService property
    }

    // Get a list of all users
    public function index()
    {
        $users = User::all(); // Get all users from the database
        return response()->json($users); // Return the users as a JSON response
    }

    // Create a new user
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Name is required, must be a string, and max 255 characters
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class, // Email is required, must be a string, lowercase, valid email format, max 255 characters, and unique in the User table
            'password' => 'required|max:255', // Password is required and max 255 characters
        ]);

        // Create the user using the UserService
        $user = $this->userService->createUser($validatedData); // Call the createUser method from the service

        // Return a JSON response with the created user and a 201 Created status code
        return response()->json($user, 201); 
    }

    // Get a specific user by ID
    public function show(User $user)
    {
        return response()->json($user); // Return the user as a JSON response
    }

    // Update an existing user
    public function update(Request $request, User $user)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Name is required, must be a string, and max 255 characters
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class, // Email is required, must be a string, lowercase, valid email format, max 255 characters, and unique in the User table
            'password' => 'required|max:255', // Password is required and max 255 characters
        ]);

        // Update the user using the UserService
        $updatedUser = $this->userService->updateUser($user, $validatedData); // Call the updateUser method from the service

        // Return a JSON response with the updated user
        return response()->json($updatedUser);
    }

    // Delete a user
    public function destroy(User $user)
    {
        // Delete the user using the UserService
        $this->userService->deleteUser($user); // Call the deleteUser method from the service

        // Return a 204 No Content status code as there is no content to return
        return response()->json(null, 204); 
    }
}
