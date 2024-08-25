## Movie Library API

This repository contains a RESTful API built with Laravel for managing a movie library. It allows CRUD operations on movies, user management, and rating functionalities.

### Requirements

* PHP 7.4 or higher
* Composer
* MySQL database

### Installation

1. Clone this repository:
   
   git clone https://github.com/Hanen191010/Movie-Library.git
   

2. Install dependencies:
   
   composer install
   

3. Copy the `.env.example` file to `.env` and configure the database credentials.

4. Create the database tables:
   
   php artisan migrate
   

5. Start the development server:
   
   php artisan serve
   

### API Endpoints

#### Movies

* GET `/api/movies`: Retrieve a list of movies.
* GET `/api/movies?genre={gener}`: Retrieve a list of movies by any gener.
* GET `/api/movies?director={director}`: Retrieve a list of movies by director name.
* GET `/api/movies?order={desc|asc}`: Retrieve a list of movies sorted by release year in ascending or descending order.
* POST `/api/movies`: Create a new movie.
* GET `/api/movies/{id}`: Retrieve a single movie by ID.
* PUT `/api/movies/{id}`: Update a movie by ID.
* DELETE `/api/movies/{id}`: Delete a movie by ID.

#### Users

* POST `/api/users`: Create a new user.
* GET `/api/users`: Retrieve a list of users.
* GET `/api/users/{id}`: Retrieve a single user by ID.
* PUT `/api/users/{id}`: Update a user by ID.
* DELETE `/api/users/{id}`: Delete a user by ID.

#### Ratings

* POST `/api/ratings`: Create a new rating for a movie.
* PUT `/api/ratings/{id}`: Update a rating by ID.
* DELETE `/api/ratings/{id}`: Delete a rating by ID.

### Advanced Features

* Pagination: The API supports pagination for retrieving large lists of movies.
* Filtering: Movies can be filtered by genre or director.
* Sorting: Movies can be sorted by release year in ascending or descending order.

### Usage

You can use tools like Postman or curl to interact with the API.

### Contribution

Contributions are welcome! Please feel free to fork this repository and submit pull requests.
