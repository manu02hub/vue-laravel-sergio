<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        return Inertia::render('coches/Index', [
            'coches' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('coches/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
        ]);

        $car = Car::create([
            'user_id' => auth()->id(),
            'modelo' => $request->modelo,
            'marca' => $request->marca,
        ]);

        $car->save();

        return redirect(RouteServiceProvider::HOME);
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

        $car = Car::find($id);

        return Inertia::render('coches/Edit', ['coche' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
        ]);

        Car::find($id)->update([
            'modelo' => $request->modelo,
            'marca' => $request->marca,
        ]);


        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $car = Car::find($id);

        $car->delete();

        return redirect(RouteServiceProvider::HOME);
    }
}
