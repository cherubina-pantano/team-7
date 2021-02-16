<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.restaurants.index', compact('restaurants'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //dd($data);

        $request->validate($this->ruleValidation());

        // prendere l'id attivo
        $data['user_id'] = Auth::id();
        $newRestaurant = new Restaurant();
        $newRestaurant->fill($data);

        $saved = $newRestaurant->save();
            if($saved) {
                return redirect()->route('admin.home');
            }
            else {
                return redirect()-route('admin.restaurants.create');
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->ruleValidation());

        $data = $request->all();

        $restaurant = Restaurant::find($id);
        $updated = $restaurant->update($data);
        if($updated) {
            return redirect()->route('admin.restaurants.index', $restaurant->id);
        }
        else {
            return redirect()->route('admin.home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function ruleValidation() {
        return [
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'p_iva'=>'required',
        ];
    } 
}
