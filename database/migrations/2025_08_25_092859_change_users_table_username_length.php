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
            // Only change the column length, do not drop/re-add the unique index
            $table->string('username', 20)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', static function(Blueprint $table){
            // Only change the column length back, do not drop/re-add the unique index
            $table->string('username', 255)->change();
        });
    }
};
