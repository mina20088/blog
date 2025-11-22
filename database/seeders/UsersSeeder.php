<?php

namespace Database\Seeders;

use App\Models\Upload;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ini_set('memory_limit', '512M');

        DB::disableQueryLog();

        User::factory(5)->has(Profile::factory())->has(Upload::factory())->create();

        DB::enableQueryLog();
    }
}
