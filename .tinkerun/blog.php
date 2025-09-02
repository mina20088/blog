<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;


 $users = User::search('j')->filterdSearch('j', ['first_name'])->get();
