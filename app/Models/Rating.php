<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // Define the fillable attributes (attributes that can be mass-assigned)
    protected $fillable = [
        'user_id', // User ID associated with the rating
        'movie_id', // Movie ID associated with the rating
        'rating', // Numerical rating value (e.g., 1-5)
        'review', // Optional user review text
    ];
}
