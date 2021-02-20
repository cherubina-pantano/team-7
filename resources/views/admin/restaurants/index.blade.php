@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Ristoranti</h1>

        @if ($restaurants->isEmpty())
            <p>Nono sono presenti ristoranti. Crea nuovo ristorante</p>
        @else
            <p>Lista ristoranti:</p>
        @endif

        @foreach ($restaurants as $restaurant)

            <h3 class='mt-4'>{{$restaurant->name}}</h3>
                <p>Indirizzo: {{$restaurant->address}} - Telefono: {{$restaurant->phone}} - Partita IVA: {{$restaurant->p_iva}}</p>
                <section class="type">
                    <h6>TIPOLOGIA</h6>
                    @foreach ($restaurant->types as $type)
                        <ul>
                            <li>
                                {{$type->type}}
                            </li>
                        </ul>
                    @endforeach

                </section>

           <a href="{{route('admin.restaurants.edit', $restaurant->id)}}" ><input type="submit" class='btn btn-primary' value='Edit'></a>

            <form class='d-inline' action="{{route('admin.restaurants.destroy', $restaurant->id)}}" method='POST'>
             @csrf
             @method('DELETE')

                <input type="submit" class='btn btn-danger' value='Delete'>
            </form>
            <hr>
        @endforeach



    </div>
@endsection
