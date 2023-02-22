<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-600">
  <nav class="p-6 bg-white flex justify-between mb-6">
    <ul class="flex items-center">
      <li>
        <a href="/" class="px-6 font-mono text-lg font-bold text-gray-500 hover:underline hover:text-gray-900">Home</a>
      </li>
      @auth
      <li>
        <a href="{{ route('cars') }}"
          class="px-6 font-mono text-lg font-bold text-gray-500 hover:underline hover:text-gray-900">Cars</a>
      </li>
      <li>
        <a href="{{ route('repairs') }}"
          class="px-6 font-mono text-lg font-bold text-gray-500 hover:underline hover:text-gray-900">Repairs</a>
      </li>
      @endauth

    </ul>

    <ul class="flex items-center">
      @auth

      <li>
        <p class="px-4 font-mono text-lg font-bold text-gray-500">{{
          auth()->user()->name }}</p>
      </li>
      <li>
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button class="px-4 font-mono text-lg font-bold text-gray-500 hover:underline hover:text-gray-900"
            type="submit">Logout</button>
        </form>
      </li>

      @endauth

      @guest

      <li>
        <a href="{{ route('login') }}"
          class="px-4 font-mono text-lg font-bold text-gray-500 hover:underline hover:text-gray-900">Login</a>
      </li>
      <li>
        <a href="{{ route('register') }}"
          class="px-4 font-mono text-lg font-bold text-gray-500 hover:underline hover:text-gray-900">Register</a>
      </li>

      @endguest

    </ul>

  </nav>
  @yield('content')
</body>

</html>