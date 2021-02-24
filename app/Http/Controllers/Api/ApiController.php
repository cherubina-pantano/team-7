<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Type;
use Illuminate\Support\Facades\DB;



class ApiController extends Controller
{
    public function filter(Request $request) {

        $data = $request->all();

        $name = !empty($data['name']) ? $data['name'] : '';

        // selezioniamo il nome dei ristoranti
        //$search = DB::table('restaurants')->select('restaurants.id', 'restaurants.name')->get();

        // ricerca del nome
        // $search = Restaurant::where('name', 'like', "%$name%")->select('restaurants.id', 'restaurants.name')->get();

        if(empty($data['name']) && empty($data['types'])) {
               // selezioniamo il nome dei ristoranti
            $search = DB::table('restaurants')->select('restaurants.id', 'restaurants.name')->get();
        }
        elseif(!empty($data['name']) && empty($data['types'])) {
             // ricerca del nome
            $search = Restaurant::where('name', 'like', "%$name%")->select('restaurants.id', 'restaurants.name')->get();
        }
        //  filtro solo tipologia
        elseif(empty($data['name']) && !empty($data['types'])) {
    

            //Chiamata al DB in cui selezioniamo i ristoranti in base alla tipologia, usando condizione OR(whereIn)
                $search = DB::table('restaurants')
                ->join('restaurant_type', 'restaurants.id', '=', 'restaurant_type.restaurant_id')
                ->join('types', 'types.id', '=','restaurant_type.type_id')
                ->whereIn('types.type', $data['types'])->select('restaurants.id', 'restaurants.name')
                ->distinct()
                ->get();              
        }

        // return 'dati da DB';

        //$restaurants = Restaurant::all();
        //     return response()->json($restaurants);

    //     $types = Type::all();
             return response()->json($search);


        // SELECT * FROM `restaurants` INNER JOIN `restaurant_type` ON `restaurants`.`id` = `restaurant_type`.`restaurant_id`

        // $search = DB::table('restaurants')
        // ->join('restaurant_type', 'restaurants.id', '=', 'restaurant_type.restaurant_id')
        // ->join('types', 'types.id', '=','restaurant_type.type_id')
        // ->select('restaurants.*', 'restaurant_type.type_id','types.type')->get();
        //     return response()->json($search);

    //    SELECT * FROM `restaurants` INNER JOIN `restaurant_type` ON `restaurants`.`id` = `restaurant_type`.`restaurant_id` INNER JOIN `types` ON `restaurant_type`.`type_id` = `types`.`id`


     }
}
