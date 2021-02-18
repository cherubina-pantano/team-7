<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::orderBy('created_at', 'desc')->get();

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
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

        $data['slug'] = Str::slug($data['name'], '-');

        $data['restaurant_id'] = Auth::id();

        $newDish = new Dish();
        
        $data['available'] = ($data['available'] == 'true') ? 1 : 0;
        
        $data['gluten'] = ($data['gluten'] == 'true') ? 1 : 0;
        
        $newDish->fill($data);

        $request->validate([
            'name' => 'required', 
            'category' => 'required', 
            'ingredients' => 'required', 
            'description' => 'required', 
            'price' => 'required', 
            'gluten' => 'required', 
            'available' => 'required',
         ]);

         $saved = $newDish->save();

        if($saved) {
            return redirect()->route('admin.dishes.index');
        } else {
            return redirect()->route('admin.dishes.create');
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
        $dish = Dish::find($id);

        return view('admin.dishes.edit', compact('dish'));
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
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'category' => 'required',
            'price' => 'required',
            // 'gluten' => 'required'
        ]);

        $dish = Dish::find($id);

        $updated = $dish->update($data);
        if($updated) {
            return redirect()->route('admin.dishes.index', $dish->id);
        } else {
            return redirect()->route('admin.dishes.edit');
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
}