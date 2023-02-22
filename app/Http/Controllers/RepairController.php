<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class RepairController extends Controller
{
    public function index()
    {
        $cars = auth()->user()->cars()->paginate(4);


        return view('cars.repairs', [
            'cars' => $cars
        ]);
    }


    public function add(Car $car, Repair $repairs)
    {
        $repairs =  $car->repairs()->paginate();

        return view('cars.repairsAdd', [
            'car' => $car,
            'repairs' => $repairs
        ]);
    }

    public function store(Car $car, Request $request)
    {
        $this->validate($request, [
            'repair' => 'required',
            'mileage' => 'required',
            'date' => 'required',
            'price' => 'required',
            'comment' => 'required'
        ]);

        $car->repairs()->create([
            'repair' => $request->repair,
            'mileage' => $request->mileage,
            'date' => $request->date,
            'price' => $request->price,
            'comment' => $request->comment
        ]);

        return back();
    }



    public function edit(Repair $repair)
    {
        return view('cars.repairsEdit', ['repair' => $repair]);
    }

    public function update(Repair $repair)
    {
        request()->validate([
            'repair' => 'required',
            'mileage' => 'required',
            'date' => 'required',
            'price' => 'required',
            'comment' => 'required'
        ]);

        $repair->update([
            'repair' => request('repair'),
            'mileage' => request('mileage'),
            'date' => request('date'),
            'price' => request('price'),
            'comment' => request('comment')
        ]);

        return redirect('/repairs');
    }

    public function destroy(Repair $repair)
    {
        $repair->delete();

        return redirect('/repairs');
    }

    public function search(Car $car)
    {
        $search_text = $_GET['query'];
        $repairs = $car->repairs()->where('repair', 'LIKE', '%' . $search_text . '%')->get();
        // ->orWhere('mileage', 'LIKE','%' . $search_text . '%')
        // ->orWhere('date', 'LIKE','%' . $search_text . '%')
        // ->orWhere('price', 'LIKE','%' . $search_text . '%')
        // ->orWhere('comment', 'LIKE','%' . $search_text . '%')

        return view(
            'cars.search',
            [
                'car' => $car,
                'repairs' => $repairs
            ]
        );
    }


    public function invoice(Repair $repair, Car $car)
    {

        $user_id = auth()->user()->id;
        $car_id = $repair->car_id;
        $repair_id = $repair->id;

        $results = DB::select("SELECT u.name, c.model, r.repair, r.price, r.mileage, r.date, r.id  
        FROM users u, cars c, repairs r 
        WHERE u.id = '$user_id' AND c.id = '$car_id' AND r.id = '$repair_id'");

        return view('cars.invoice', compact('repair'), compact('results'));

        
    }


    public function generatePDF(Repair $results)
    {
        $data = $results;

        // dd($results);
          
        $pdf = PDF::loadView('invoice', $data);
    
        return $pdf->download('itsolutionstuff.pdf');
    }

    
}
