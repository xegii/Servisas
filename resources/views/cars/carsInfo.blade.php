{{-- EDIT --}}
@extends('layouts.app')

@section('content')

<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">

    <div class="w-full">

      <h1><b>Edit {{ $car->model . " " . $car->year }}<b></h1>
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/cars/{{ $car->id }}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-4">

          <label class="block text-gray-700 text-sm font-bold mb-2" for="model">
            Car model:
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="model" name="model" type="text" value="{{ $car->model }}">

          <label class="block text-gray-700 text-sm font-bold mb-2" for="year">
            Model year:
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="year" name="year" type="number" value="{{ $car->year }}">

          <label class="block text-gray-700 text-sm font-bold mb-2" for="mileage">
            Mileage:
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="mileage" name="mileage" type="number" value="{{ $car->mileage }}">

          <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
            Comment:
          </label>
          <textarea name="comment" id="comment" cols="30" rows="4"
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="username" type="text">{{ $car->comment }}</textarea>

        </div>
        <div class="flex items-center justify-between">
          <button type="submit"
            class="w-52 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit
          </button>
      </form>

      <form method="POST" action="/cars/{{ $car->id }}">
        @csrf
        @method('DELETE')

        <button
          class="w-36 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
      </form>

      <a href="/cars"
        class="w-52 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>

    </div>
  </div>

</div>
</div>
@endsection