<?php

namespace App\Http\Controllers;

use App\Models\Movie; // Import the Movie model
use Illuminate\Http\Request;
use App\Services\MovieService; // Import the MovieService interface

class MovieController extends Controller
{
    protected $movieService; // Declare a property to store the MovieService instance

    // Inject the MovieService dependency into the constructor
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService; // Initialize the MovieService property
    }

    /**
     * Display a listing of the resource (movies).
     */
    public function index(Request $request)
    {
        // Check for filtering options
        if ($request->has('genre')) {
            $genre = $request->query('genre');
            $movies = Movie::byGenre($genre)->paginate($request->per_page ?? 10); // Paginate movies by genre
        } else if ($request->has('director')) {
            $director = $request->query('director');
            $movies = Movie::byDirector($director)->paginate($request->per_page ?? 10); // Paginate movies by director
        } else if ($request->has('order')) {
            $order = $request->query('order');
            $movies = Movie::orderByReleaseYear($order)->paginate($request->per_page ?? 10); // Paginate movies by release year in specified order
        } else {
            $movies = Movie::all(); // Get all movies
        }

        return response()->json($movies, 200); // Return movies as a JSON response with a 200 OK status code
    }

    /**
     * Store a newly created resource (movie) in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255', // Title is required, must be a string, and max 255 characters
            'director' => 'required|string|max:255', // Director is required, must be a string, and max 255 characters
            'genre' => 'required|string|max:255', // Genre is required, must be a string, and max 255 characters
            'release_year' => 'required|integer', // Release year is required and must be an integer
            'description' => 'nullable|string|max:2000', // Description is optional, can be a string, and max 2000 characters
        ]);

        // Create the movie using the MovieService
        $movie = $this->movieService->createMovie($validatedData); // Call the createMovie method from the service

        // Return a JSON response with the created movie and a 201 Created status code
        return response()->json($movie, 201); 
    }

    /**
     * Display the specified resource (movie).
     */
    public function show(Movie $movie)
    {
        $movie = $movie->load('ratings'); // Eager load ratings for the movie
        return response()->json($movie, 200); // Return the movie with its ratings as a JSON response with a 200 OK status code
    }

    /**
     * Update the specified resource (movie) in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255', // Title is required, must be a string, and max 255 characters
            'director' => 'required|string|max:255', // Director is required, must be a string, and max 255 characters
            'genre' => 'required|string|max:255', // Genre is required, must be a string, and max 255 characters
            'release_year' => 'required|integer', // Release year is required and must be an integer
            'description' => 'nullable|string|max:2000', // Description is optional, can be a string, and max 2000 characters
        ]);

        // Update the existing movie instance
        $updated_movie = $this->movieService->updateMovie($movie, $validatedData); // Call the updateMovie method from the service

        // Return a JSON response with the updated movie and a 200 OK status code
        return response()->json($updated_movie, 200); 
    }

    /**
     * Remove the specified resource (movie) from storage.
     */
    public function destroy(Movie $movie)
    {
        // Delete the movie using the MovieService
        $movie = $this->movieService->deleteMovie($movie); // Call the deleteMovie method from the service

        // Return a 204 No Content status code as there is no content to return
        return response()->json(null, 204); 
    }
}