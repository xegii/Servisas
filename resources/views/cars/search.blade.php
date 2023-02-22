@extends('layouts.app')

@section('content')

<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">
{{-- {{ dd($car) }} --}}
{{-- {{ dd($car) }}
<form action="{{ route('search') }}" method="GET">
  <input type="text" name="search" required/>
  <button type="submit">Search</button>
</form>

@if($repairs_new->isNotEmpty())
    @foreach ($repairs_new as $repair)
        <div class="post-list">
            <p>{{ $repair->repair }}</p>
        </div>
    @endforeach
@else 
    <div>
        <h2>No posts found</h2>
    </div>
@endif --}}




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

            <a href="/repairs/{{ $repair->id }}/edit">
              <button
                class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded focus:outline-none focus:shadow-outline">Edit</button></a>

            <form method="POST" action="/repairs/{{ $repair->id }}">
              @csrf
              @method('DELETE')

              <button
                class="w-32 bg-red-500 hover:bg-red-700 text-white font-bold p-2 m-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
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