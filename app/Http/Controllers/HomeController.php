<?php

namespace App\Http\Controllers;

use App\Mail\UnsubscribeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function home(){
        $widgets = [
            ['type' => 'stats-card', 'title' => 'Users', 'value' => 152],
            ['type' => 'chart-card', 'title' => 'Sales Chart', 'chartId' => 'salesChart'],
            ['type' => 'activity-card', 'title' => 'Recent Activity', 'items' => []],
        ];
        return view("home" ,['widgets' => $widgets]);
    }

    public function about(){


        return view("about");
    }

    public function contact(){
        return view("contact");
    }


}
