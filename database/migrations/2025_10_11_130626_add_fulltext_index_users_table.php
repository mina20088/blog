<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_FIRST_NAME_FULLTEXT (first_name) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_LAST_NAME_FULLTEXT (last_name) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_EMAIL_FULLTEXT (email) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_USERNAME_FULLTEXT (username) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_FIRST_NAME_LAST_NAME_FULLTEXT (first_name, last_name) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_FIRST_NAME_EMAIL_FULLTEXT (first_name, email) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_FIRST_NAME_USERNAME_FULLTEXT (first_name, username) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_FIRST_NAME_LAST_NAME_EMAIL_FULLTEXT (first_name, last_name, email) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_FIRST_NAME_EMAIL_USERNAME_FULLTEXT (first_name, email, username) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_LAST_NAME_EMAIL_FULLTEXT (last_name, email) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_LAST_NAME_USERNAME_FULLTEXT (last_name, username) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_LAST_NAME_EMAIL_USERNAME_FULLTEXT (last_name, email, username) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_EMAIL_USERNAME_FULLTEXT (email, username) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_USERNAME_FIRST_NAME_LAST_NAME (username, first_name, last_name) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_USERNAME_LAST_NAME_EMAIL (username, last_name, email) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_FIRST_LAST_NAME_USERNAME_EMAIL_FULLTEXT (first_name, last_name, username, email) WITH PARSER ngram');

    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropFullText('USERS_FIRST_NAME_FULLTEXT');
            $table->dropFullText('USERS_LAST_NAME_FULLTEXT');
            $table->dropFullText('USERS_EMAIL_FULLTEXT');
            $table->dropFullText('USERS_USERNAME_FULLTEXT');
            $table->dropFullText('USERS_FIRST_NAME_LAST_NAME_FULLTEXT');
            $table->dropFullText('USERS_FIRST_NAME_EMAIL_FULLTEXT');
            $table->dropFullText('USERS_FIRST_NAME_USERNAME_FULLTEXT');
            $table->dropFullText('USERS_FIRST_NAME_LAST_NAME_EMAIL_FULLTEXT');
            $table->dropFullText('USERS_FIRST_NAME_EMAIL_USERNAME_FULLTEXT');
            $table->dropFullText('USERS_LAST_NAME_EMAIL_FULLTEXT');
            $table->dropFullText('USERS_LAST_NAME_USERNAME_FULLTEXT');
            $table->dropFullText('USERS_LAST_NAME_EMAIL_USERNAME_FULLTEXT');
            $table->dropFullText('USERS_EMAIL_USERNAME_FULLTEXT');
            $table->dropFullText('USERS_USERNAME_FIRST_NAME_LAST_NAME');
            $table->dropFullText('USERS_USERNAME_LAST_NAME_EMAIL');
            $table->dropFullText('USERS_FIRST_LAST_NAME_USERNAME_EMAIL_FULLTEXT');
        });
    }
};
