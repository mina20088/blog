<?php

use App\Enums\gender;
use App\Models\User;
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
        Schema::dropIfExists('profiles');
        Schema::create('profiles', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('gender', unsigned: true)->nullable();
            $table->string('phone_number', 15 );
            $table->text('street')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state' , 100)->nullable();
            $table->string('zip_code', 50)->nullable();
            $table->string('country', 100 );
            $table->string('profile_picture')->nullable();
            $table->text('bio')->nullable();
            $table->string('website')->nullable();
            $table->string('x_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('github_repo_url')->nullable();
            $table->foreign('user_id','FK_USERS_ID_PROFILE')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
