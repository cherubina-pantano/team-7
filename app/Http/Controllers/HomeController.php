<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class HomeController extends Controller
{
    public function index() {

        $restaurants = Restaurant::all();
        return view('guests.home', compact('restaurants'));
        
    }
}
