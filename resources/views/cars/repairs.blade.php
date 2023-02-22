{{-- select car for repairs --}}

@extends('layouts.app')

@section('content')

<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">


    @if ($cars->count())
    <div class="container">
      <div class="row flex justify-center">
        @foreach ($cars as $car)

        <div class="col-sm border bg-white hover:bg-gray-300 rounded-b-2xl mx-3">
          <a href="/repairs/{{ $car->id }}">
            <img src="https://cdn4.iconfinder.com/data/icons/car-silhouettes/1000/sedan-512.png" width="250"
              height="250" class="card-img-top" alt="...">
            <b>
              <h2 class="text-center">{{ $car->model }}</h2>
            </b>
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