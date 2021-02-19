@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Ordini</h1>

         <ul>
            @foreach ($orders as $order)
                
            <li>
                <h3>{{$order->client_name}}</h3> 
                <h3>{{$order->client_lastname}}</h3>
                <p>{{$order->client_address}} </p>
                <p>{{$order->client_phone}}</p>
                <p> {{$order->tot_price}} €</p>
            </li>

            @endforeach 
        </ul>
        

    </div>
@endsection
