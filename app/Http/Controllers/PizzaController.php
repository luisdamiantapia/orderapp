<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequest;
use App\Http\Requests\PizzaUpdateRequest;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::paginate(1);
        return view('pizza.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pizza.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaStoreRequest $request)
    {

        $path = $request->image->store('public/pizza');

        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'small_price' => $request->small_price,
            'medium_price' => $request->medium_price,
            'large_price' => $request->large_price,
            'category' => $request->category,
            'image' => $path,
        ]);

        return redirect()->route('pizza.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        return view('pizza.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaUpdateRequest $request, $id)
    {
        $pizza = Pizza::find($id);

        if($request->has('image')){
            $path = $request->image->store('public/pizza');
        }else{
            $path = $pizza->image;
        }



        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->small_price = $request->small_price;
        $pizza->medium_price = $request->medium_price;
        $pizza->large_price = $request->large_price;
        $pizza->category = $request->category;
        $pizza->image = $path;

        $pizza->save();

        return redirect()->route('pizza.index')->with('message', 'Pizza editada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pizza::find($id)->delete();

        return redirect()->route('pizza.index')->with('message', 'Pizza eliminada.');
    }
}
