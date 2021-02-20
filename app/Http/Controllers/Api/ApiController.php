<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Type;
use Illuminate\Support\Facades\DB;



class ApiController extends Controller
{
    public function index() {
        // return 'dati da DB';

        // $restaurants = Restaurant::all();
        //     return response()->json($restaurants);

    //     $types = Type::all();
    //         return response()->json($types);


        // SELECT * FROM `restaurants` INNER JOIN `restaurant_type` ON `restaurants`.`id` = `restaurant_type`.`restaurant_id`

        $search = DB::table('restaurants')
        ->join('restaurant_type', 'restaurants.id', '=', 'restaurant_type.restaurant_id')
        ->select('restaurants.*', 'restaurant_type.type_id')->get();
            return response()->json($search);


    }
}
