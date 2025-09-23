<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->fullText(['first_name', 'last_name', 'email', 'username'], 'USERS_FIRST_LAST_NAME_USERAME_EMAIL_FULLTEXT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropFullText('USERS_FIRST_LAST_NAME_USERAME_EMAIL_FULLTEXT');
        });
    }
};
