# Movie Diogo - Movie Review Platform

## Project Description

Movie Diogo is a web-based platform built with Laravel that allows users to discover, rate, and share opinions about movies. The application integrates with The Movie Database (TMDb) API to fetch movie data and provides features for user authentication, movie reviews, comments, favorites, and administrative management. This project was developed as an academic assignment to demonstrate full-stack web development skills using modern PHP frameworks and frontend technologies.

## Technologies Used

- **Backend**: PHP 8.2, Laravel 12.0
- **Database**: SQLite (configured for development; can be changed to MySQL/PostgreSQL in production)
- **Frontend**: HTML, CSS, JavaScript, Tailwind CSS, Alpine.js
- **Build Tools**: Vite, npm
- **Authentication**: Laravel Breeze
- **Testing**: PHPUnit
- **Containerization**: Docker, Docker Compose
- **External API**: TMDb API for movie data

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js (version 18 or higher)
- npm
- SQLite (or another database supported by Laravel)

## Installation Instructions

Follow these steps to set up the project locally:

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd PSWII
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Configure environment**:
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Edit `.env` and configure the following settings:
     - Database connection (default is SQLite)
     - TMDb API key (obtain from [TMDb](https://www.themoviedb.org/settings/api))
     - Application URL and other environment variables

4. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

5. **Run database migrations**:
   ```bash
   php artisan migrate
   ```

6. **Seed the database (optional)**:
   ```bash
   php artisan db:seed
   ```

7. **Install Node.js dependencies**:
   ```bash
   npm install
   ```

8. **Build frontend assets**:
   ```bash
   npm run build
   ```

9. **Start the development server**:
   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`.

## Docker

### Requirements
- Docker
- Docker Compose

### Running with Docker
To run the application using Docker, execute the following command:
```bash
docker compose up --build
```

**Note**: When using Docker, do not run `php artisan serve` as the application is served directly through the Apache container on port 8000.

## .env Configuration

Ensure your `.env` file includes the following key configurations:

```env
APP_NAME="Movie Diogo"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite

TMDB_API_KEY=your-tmdb-api-key-here
```

## Running Migrations and Seeders

After configuring the database in `.env`:

1. **Run migrations**:
   ```bash
   php artisan migrate
   ```

2. **Run seeders** (to populate with sample data):
   ```bash
   php artisan db:seed
   ```

## Main Features

- **Movie Discovery**: Browse and search movies from TMDb
- **User Authentication**: Registration, login, and profile management
- **Movie Ratings**: Users can rate movies on a scale
- **Comments**: Authenticated users can leave comments on movies
- **Favorites**: Users can add/remove movies to/from their favorites list
- **Admin Panel**: Administrative interface for managing users, movies, and comments
- **File Uploads**: Admins can upload custom movie posters
- **CSV Export**: Admins can export user and movie data to CSV files

## User Profiles

### Regular User
- View movies and their details
- Search and filter movies
- Register and authenticate
- Rate movies (1-10 scale)
- Leave comments on movies
- Add/remove movies from favorites
- Edit profile information

### Admin User
- All regular user permissions
- Access to admin dashboard
- Manage users (view, toggle admin status, delete)
- Manage movies (create, edit, delete, upload posters)
- Manage comments (view, delete)
- Export data to CSV (users and movies)

## File Uploads

The application supports uploading custom movie posters for admin users. Uploaded images are stored locally in the `public/uploads/posters/` directory.

**Important Note**: Uploaded images are stored locally and are not versioned in the GitHub repository. They are intended for local development and testing purposes only.

## Project Structure

```
PSWII/
├── app/
│   ├── Http/Controllers/          # Controllers for handling requests
│   ├── Models/                    # Eloquent models (User, Movie, Rating, etc.)
│   └── Providers/                 # Service providers
├── bootstrap/                     # Laravel bootstrap files
├── config/                        # Configuration files
├── database/
│   ├── factories/                 # Model factories
│   ├── migrations/                # Database migrations
│   └── seeders/                   # Database seeders
├── public/                        # Public assets and uploads
│   ├── uploads/posters/           # Uploaded movie posters
│   └── ...
├── resources/
│   ├── js/                        # JavaScript files
│   ├── views/                     # Blade templates
│   └── ...
├── routes/                        # Route definitions
├── storage/                       # File storage
├── tests/                         # Unit and feature tests
├── vendor/                        # Composer dependencies
├── composer.json                  # PHP dependencies
├── package.json                   # Node.js dependencies
├── docker-compose.yml             # Docker configuration
├── Dockerfile                     # Docker image definition
└── README.md                      # This file
```

## Test Credentials

There are no predefined test credentials in this project. Users must register through the application interface to create accounts. The database seeder creates a sample user with email `test@example.com`, but no password is set.


