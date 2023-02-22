{{-- repairs edit --}}

@extends('layouts.app')

@section('content')

<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">

    

    <div class="w-full">
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/repairs/{{ $repair->id }}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="repair">
            Repair job:
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="repair" name="repair" type="text" value="{{ $repair->repair }}">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="mileage">
            Mileage:
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="mileage" name="mileage" type="number" value="{{ $repair->mileage }}">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="date">
            Date:
          </label>
          <input type="date"
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="date" name="date" type="text" value="{{ $repair->date }}">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
            Cost of repair:
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="price" name="price" type="number" value="{{ $repair->price }}">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
            Comment:
          </label>
          <textarea name="comment" id="comment" cols="30" rows="4"
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="username" type="text">{{ $repair->comment }}</textarea>
        </div>
        <div class="flex items-center justify-between">
          <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit
          </button>
        </div>
      </form>
    </div>



  </div>
</div>

@endsection