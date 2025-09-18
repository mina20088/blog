<?php

use App\Models\User;
use App\Models\Profile;

User::factory(10)->has(Profile::factory())->create();

