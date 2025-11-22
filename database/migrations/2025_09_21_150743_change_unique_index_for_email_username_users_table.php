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
            $table->dropUnique('users_email_unique');
            $table->dropUnique('UQ_USERNAME');
            $table->unique('email', 'USERS_EMAIL_UNIQUE');
            $table->unique('username', 'USERS_USERNAME_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropUnique('USERS_USERNAME_UNIQUE');
            $table->dropUnique('USERS_EMAIL_UNIQUE');
            $table->unique('email', 'users_email_unique');
            $table->unique('username', 'UQ_USERNAME');
        });
    }
};
