{{-- repairs add and view --}}

@extends('layouts.app')

@section('content')

<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">

{{-- {{ dd($car) }} --}}

    <div class="w-full">
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/repairs/{{ $car->id }}" method="post">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="repair">
            Repair job:
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="repair" name="repair" type="text" placeholder="Ex: Engine swap">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="mileage">
            Mileage:
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="mileage" name="mileage" type="number" placeholder="Ex: 214000">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="date">
            Date:
          </label>
          <input type="date"
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="date" name="date" type="text">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
            Cost of repair:
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="price" name="price" type="number" placeholder="Ex: 300">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
            Comment:
          </label>
          <textarea name="comment" id="comment" cols="30" rows="4"
            class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="username" type="text"></textarea>
        </div>
        <div class="flex items-center justify-between">
          <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit
          </button>
        </div>
      </form>
    </div>


    <form class="form-inline" method="get" action="search/{{ $car->id }}">
      <input
        class="form-control shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight outline-black focus:shadow-outline"
        type="search" name="query" placeholder="Search repairs by 'Repair job' column">
      <button
        class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded focus:outline-none focus:shadow-outline"
        type="submit">Search</button>
    </form>



    @if ($repairs->count())

    <table class="min-w-full border-collapse block md:table">
      <thead class="block md:table-header-group">
        <tr
          class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
          <th class="bg-gray-600 p-4 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
            Repair job</th>
          <th class="bg-gray-600 p-4 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
            Mileage</th>
          <th class="bg-gray-600 p-4 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
            Date</th>
          <th class="bg-gray-600 p-4 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
            Cost</th>
          <th class="bg-gray-600 p-4 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
            Comment</th>
          <th class="bg-gray-600 p-4 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
            Actions</th>
        </tr>
      </thead>
      @foreach ($repairs as $repair)
      <tbody class="block md:table-row-group">
        <tr class="bg-gray-200 border md:border-white md:border-none block md:table-row">
          <td class="p-4 md:border md:border-white text-center block md:table-cell">{{ $repair->repair }}</td>
          <td class="p-4 md:border md:border-white text-center block md:table-cell">{{ $repair->mileage }}</td>
          <td class="p-4 md:border md:border-white text-center block md:table-cell">{{ $repair->date }}</td>
          <td class="p-4 md:border md:border-white text-center block md:table-cell">{{ $repair->price }}</td>
          <td class="p-4 md:border md:border-white text-center block md:table-cell">{{ $repair->comment }}</td>
          <td class="p-4 md:border md:border-white text-center block md:table-cell">

            <a href="/repairs/invoice/{{ $repair->id }}">
              <button
                class="w-32 bg-yellow-500 hover:bg-yellow-600 text-white font-bold p-2 m-2 rounded focus:outline-none focus:shadow-outline">Invoice</button></a>
            <br>
            <a href="/repairs/{{ $repair->id }}/edit">
              <button
                class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded focus:outline-none focus:shadow-outline">Edit</button></a>

            <form method="POST" action="/repairs/{{ $repair->id }}">
              @csrf
              @method('DELETE')

              <button
                class="w-32 bg-red-700 hover:bg-red-900 text-white font-bold p-2 m-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>


    @else

    <p>There are no repairs</p>
    @endif

  </div>
</div>

@endsection