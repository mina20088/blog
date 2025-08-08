<?php

namespace App\Http\Controllers;

use App\Mail\UnsubscribeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function home(Request $request){
        $searchQuery = $request->query('search');
        $searchByQuery = $request->query('searchBy');
        dump($request->query());

        $users = User::when($searchQuery && $searchByQuery, static function ($query) use ($searchQuery, $searchByQuery) {
            foreach ($searchByQuery as $searchBy) {
                $query->where($searchBy , 'LIKE', "%{$searchQuery}%");
            }
        })->get();

        return view("home" , ['users' => $users]);
    }

    public function about(){


        return view("about");
    }

    public function contact(){
        return view("contact");
    }


}
