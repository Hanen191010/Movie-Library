<?php

namespace App\Services;

use App\Models\Movie; // Import the Movie model
use Illuminate\Http\Request; // Import the Request class (not used in this case)

class MovieService
{
    /*
     * Creates a new movie.
     *
     * @param array $data The data for the new movie.
     * @return Movie The newly created movie instance.
     */
    public function createMovie(array $data)
    {
        return Movie::create($data); // Use the Movie model's create method to create a new movie record from the provided data
    }

    /*
     * Updates an existing movie.
     *
     * @param Movie $movie The movie instance to update.
     * @param array $data The data to update the movie with.
     * @return Movie The updated movie instance.
     */
    public function updateMovie(Movie $movie, array $data)
    {
        $movie->update($data); // Use the Movie model's update method to update the existing movie instance with the provided data
        return $movie; // Return the updated movie instance
    }

    /*
     * Deletes a movie.
     *
     * @param Movie $movie The movie instance to delete.
     * @return void
     */
    public function deleteMovie(Movie $movie)
    {
        $movie->delete(); // Use the Movie model's delete method to delete the movie record
    }
}
