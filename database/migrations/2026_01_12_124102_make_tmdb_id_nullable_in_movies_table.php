<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Para SQLite, precisamos recriar a tabela
        DB::statement('CREATE TABLE movies_new (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            tmdb_id INTEGER NULL,
            title VARCHAR NOT NULL,
            overview TEXT NULL,
            poster_path VARCHAR NULL,
            backdrop_path VARCHAR NULL,
            genres VARCHAR NULL,
            release_date DATE NULL,
            rating FLOAT NULL,
            created_at DATETIME NULL,
            updated_at DATETIME NULL,
            custom_poster VARCHAR(255) NULL
        )');

        DB::statement('INSERT INTO movies_new SELECT * FROM movies');
        DB::statement('DROP TABLE movies');
        DB::statement('ALTER TABLE movies_new RENAME TO movies');
    }

    public function down(): void
    {
        // Reverter não é necessário para este caso
    }
};
