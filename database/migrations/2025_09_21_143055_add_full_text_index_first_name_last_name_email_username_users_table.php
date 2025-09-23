<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->fullText('first_name',"USERS_FIRST_NAME_FULLTEXT");
            $table->fullText('last_name',"USERS_LAST_NAME_FULLTEXT" );
            $table->fullText('email', 'USERS_EMAIL_FULLTEXT');
            $table->fullText('username', 'USERS_USERNAME_FULLTEXT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropFullText("USERS_FIRST_NAME_FULLTEXT");
            $table->dropFullText("USERS_LAST_NAME_FULLTEXT");
            $table->dropFullText('USERS_EMAIL_FULLTEXT');
            $table->dropFullText("USERS_USERNAME_FULLTEXT");
        });
    }
};
