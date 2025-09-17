<?php
use Illuminate\Http\Request;
use App\handlers\UserHandler;
use App\services\UsersService;
use App\services\UsersServicevice;
use App\Traits\HandlesUserOperations;


$request = new Request();

$request->merge([
    "search" => "J",
    "searchBy" => ["first_name"],
    "orderBy" => "first_name",
    "dir" => "desc"
]);


$service = app(UsersService::class);

$handler = new UserHandler();
$handler->handle($request, $service);
