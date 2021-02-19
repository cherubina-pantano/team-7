@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Ordini cliente</h1>

         <ul>
            @foreach ($orders as $order)
                        
            <li><a href="{{route('admin.orders.show', $order->id)}}">{{$order->client_name}} - {{$order->tot_price}}</a></li>

            @endforeach 
        </ul>
        

    </div>
@endsection
