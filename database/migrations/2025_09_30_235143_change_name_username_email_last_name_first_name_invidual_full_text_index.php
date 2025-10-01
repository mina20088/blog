<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', static function(Blueprint $table){
            $table->dropFullText("USERS_FIRST_NAME_FULLTEXT");
            $table->dropFullText("USERS_LAST_NAME_FULLTEXT");
            $table->dropFullText('USERS_EMAIL_FULLTEXT');
            $table->dropFullText("USERS_USERNAME_FULLTEXT");
            $table->dropFullText('USERS_FIRST_LAST_NAME_USERAME_EMAIL_FULLTEXT');
        });

        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_FIRST_NAME_FULLTEXT (first_name) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_LAST_NAME_FULLTEXT (last_name) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_EMAIL_FULLTEXT (email) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_USERNAME_FULLTEXT (username) WITH PARSER ngram');
        DB::statement('ALTER TABLE users ADD FULLTEXT INDEX USERS_FIRST_LAST_NAME_USERNAME_EMAIL_FULLTEXT (first_name, last_name, username, email) WITH PARSER ngram');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', static function(Blueprint $table){
            $table->fullText('first_name',"USERS_FIRST_NAME_FULLTEXT");
            $table->fullText('last_name',"USERS_LAST_NAME_FULLTEXT" );
            $table->fullText('email', 'USERS_EMAIL_FULLTEXT');
            $table->fullText('username', 'USERS_USERNAME_FULLTEXT');
            $table->fullText(['first_name', 'last_name', 'email', 'username'], 'USERS_FIRST_LAST_NAME_USERAME_EMAIL_FULLTEXT');
            $table->dropFullText('USERS_FIRST_NAME_FULLTEXT');
            $table->dropFullText('USERS_LAST_NAME_FULLTEXT');
            $table->dropFullText('USERS_EMAIL_FULLTEXT');
            $table->dropFullText('USERS_USERNAME_FULLTEXT');
            $table->dropFullText('USERS_FIRST_LAST_NAME_USERNAME_EMAIL_FULLTEXT');

        });
    }
};
