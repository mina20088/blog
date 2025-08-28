<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormHasCorrectNameAttribute extends TestCase
{
    use refreshDatabase;

    public function test_user_form_has_correct_name_attribute(): void
    {

        $usersTableColumns = Schema::getColumnListing('users');

        $profileTableColumns = Schema::getColumnListing('profiles');

        $mergedColumns = collect(array_merge($usersTableColumns, $profileTableColumns));

        $mergedColumnsToAssoc = $mergedColumns->mapWithKeys(function ($item) {
            return [$item => $item];
        })->except(['id', 'created_at', 'updated_at', 'email_verified_at','locked', 'remember_token', 'deleted_at', 'user_id']);

        $mergedColumnsToAssoc->each(function ($column) {
            $this->get('/dashboard/users/create')->assertSee('name="' . $column . '"', false);
        });

        $this->assertArrayHasKey('email', $mergedColumnsToAssoc);

        $this->assertNotEquals($usersTableColumns, []);

        $this->assertNotEquals($profileTableColumns, []);

        $this->assertNotEquals($mergedColumns, []);

        $this->assertNotNull($usersTableColumns);

        $this->assertNotNull($profileTableColumns);


    }
}
