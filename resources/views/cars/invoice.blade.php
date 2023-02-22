 @extends('layouts.app')

@section('content')

<div class="flex justify-center">
  <div class="w-8/12 bg-white p-6 rounded-lg">

    @foreach($results as $result)
    @endforeach
    <a class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 m-2 rounded focus:outline-none focus:shadow-outline"
     href="{{ URL::to('/repairs/invoice/' . $result->id . '/pdf')}}">Export to PDF</a>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-4/5 h-full bg-white shadow-lg">
            <div class="flex justify-between p-4">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-widest">INVOICE</h1>
                    
                        {{ $result->name }}

                </div>
                <div class="p-2">
                    <ul class="flex">
                        <li class="flex flex-col items-center p-5 border-l-2 border-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                            <span>
                                www.testservisas.lt
                            </span>
                        </li>
                        <li class="flex flex-col items-center p-5 border-l-2 border-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>
                                Pramones pr. 20, Kaunas, Lithuania
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full h-0.5 bg-indigo-500"></div>
            <div class="flex justify-between px-4 py-10">
                <div>
                    <h6 class="font-bold">Order Date : <span class="text-sm font-medium"> {{ $result->date }}</span></h6>
                    <h6 class="font-bold">Order ID : <span class="text-sm font-medium"> {{ $result->id }}</span></h6>
                </div>
                <div class="w-1/3">
                    <address>
                        <span class="font-bold"> Billed To :<br></span>
                        {{ $result->name }}<br>
                        Pramones pr. 22A,<br>
                        Kaunas, Lithuania<br>
                        +37012458842
                    </address>
                </div>
                <div class="w-1/3">
                    <address>
                        <span class="font-bold">Seller :<br></span>
                        UAB "TestServisas"<br>
                        Pramones pr. 20,<br>
                        Kaunas, Lithuania<br>
                        +37064514444
                    </address>
                </div>
            </div>
            <div class="px-4 py-16">
                <div class="border-gray-200">
                    <table class="w-full py-6">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="w-6/12 px-2 py-6">
                                    Repair
                                </th>
                                <th class="w-2/12 px-2 py-6">
                                    Car
                                </th>
                                <th class="w-2/12 px-2 py-6">
                                    Mileage
                                </th>
                                <th class="w-2/12 px-2 py-6">
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center bg-gray-100">
                            <tr>
                                <td class="w-6/12 px-2 py-6">
                                    {{ $result->repair }}
                                </td>
                                <td class="w-2/12 px-2 py-6">
                                    {{ $result->model }}
                                </td>
                                <td class="w-2/12 px-2 py-6">
                                    {{ $result->mileage }} km
                                </td>
                                <td class="w-2/12 px-2 py-6">
                                    € {{ $result->price }}
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td class="font-bold">Sub Total</td>
                                <td class="font-bold"><b>€ {{ $result->price }}</b></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td class="font-bold"><b>PVM(21%)</b></td>
                                <td class="font-bold"><b>€{{($result->price)*0.21 }}</b></td>
                            </tr>
                            <tr class="text-white bg-gray-800">
                                <th></th>
                                <td class="font-bold"><b>Total</b></td>
                                <td class="font-bold"><b>€ {{ ($result->price)*1.21 }}</b></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-between p-4">
                <div>
                    <h3 class="text-xl">Terms And Conditions :</h3>
                    <ul class="text-xs list-disc list-inside">
                        <li>All accounts are to be paid within 7 days from receipt of invoice.</li>
                        <li>To be paid by cheque or credit card or direct payment online.</li>
                    </ul>
                </div>
                <div class="p-4">
                    <h3>Signature</h3>
                    <div class="text-4xl italic text-indigo-500">_____</div>
                </div>
            </div>
            <div class="w-full h-0.5 bg-indigo-500"></div>

        </div>
    </div>



  </div>
</div>

@endsection 