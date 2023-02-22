{{-- cars --}}

@extends('layouts.app')

@section('content')

<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">

    <div class="w-full">
      <b>
        <h1>Add new car</h1>
        <form class="bg-white rounded px-8 pt-6 pb-8 mb-4" action="{{ route('cars') }}" method="post">
          @csrf
          <div class="mb-4">

            <label class="block text-gray-700 text-sm font-bold mb-2" for="model">
              Car model:
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="model" name="model" type="text" placeholder="Ex: BMW 530d">

            <label class="block text-gray-700 text-sm font-bold mb-2" for="year">
              Model year:
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="year" name="year" type="number" placeholder="Ex: 2002">

            <label class="block text-gray-700 text-sm font-bold mb-2" for="mileage">
              Mileage:
            </label>
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="mileage" name="mileage" type="number" placeholder="Ex: 460500">

            <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
              Comment:
            </label>
            <textarea name="comment" id="comment" cols="30" rows="4"
              class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="username" type="text" placeholder="Ex: Amazing car"></textarea>

          </div>
          <div class="flex items-center justify-between">
            <button type="submit"
              class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-4 px-4 rounded focus:outline-none focus:shadow-outline">
              Submit
            </button>

          </div>
        </form>


    </div>

    @if ($cars->count())
    <div class="container">
      <div class="row flex justify-center">
        @foreach ($cars as $car)

        <div class="col-sm border bg-white hover:bg-gray-300 rounded-b-2xl mx-3">
          <a href="/cars/{{ $car->id }}/edit">
            <img src="https://cdn4.iconfinder.com/data/icons/car-silhouettes/1000/sedan-512.png" width="250"
              height="250" class="card-img-top" alt="...">
            <h2 class="text-center">{{ $car->model }}</h2>
            <p class="text-center pb-3">{{ $car->year }}</p>
          </a>
        </div>

        @endforeach


      </div>
    </div>
    <br>
    {{ $cars->links() }}
    @else

    <p>There are no cars</p>
    @endif

    </b>

  </div>
</div>
@endsection