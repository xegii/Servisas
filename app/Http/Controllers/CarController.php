<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index()
    {
        $cars = auth()->user()->cars()->paginate(4);

        return view('cars.cars', [
            'cars' => $cars
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'model' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'comment' => 'required'
        ]);

        $request->user()->cars()->create([
            'model' => $request->model,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'comment' => $request->comment
        ]);

        return back();
    }

    public function edit(Car $car)
    {
        return view('cars.carsInfo', ['car' => $car]);
    }

    public function update(Car $car)
    {
        request()->validate([
            'model' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'comment' => 'required'
        ]);

        $car->update([
            'model' => request('model'),
            'year' => request('year'),
            'mileage' => request('mileage'),
            'comment' => request('comment')
        ]);

        return redirect('/cars');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect('/cars');
    }
}
