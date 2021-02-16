@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ristoranti</h1>    
        <!-- <a href="{{route('admin.restaurants.index')}}">index</a> -->

        @if ($restaurants->isEmpty())
            <p>Nono sono presenti ristoranti. Crea nuovo ristorante</p>
        @else 
            <p>Sono presenti ristoranti</p>
        @endif
    </div>
@endsection
