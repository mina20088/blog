<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    dump("routed here ");
   return view("Home");
});
