<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Define the fillable attributes (attributes that can be mass-assigned)
    protected $fillable = [
        'title', // Movie title
        'director', // Movie director
        'genre', // Movie genre
        'release_year', // Movie release year
        'description', // Movie description
    ];

    // Scope for filtering movies by genre
    public function scopeByGenre($query, $genre)
    {
        return $query->where('genre', $genre); // Apply the WHERE clause to filter by genre
    }

    // Scope for filtering movies by director
    public function scopeByDirector($query, $director)
    {
        return $query->where('director', $director); // Apply the WHERE clause to filter by director
    }

    // Scope for ordering movies by release year
    public function scopeOrderByReleaseYear($query, $order)
    {
        return $query->orderBy('release_year', $order); // Apply the ORDER BY clause to order by release year in the specified order
    }

    // Relationship between Movie and Rating models
    public function ratings()
    {
        return $this->hasMany(Rating::class); // Define a one-to-many relationship where a Movie can have many Ratings
    }
}
