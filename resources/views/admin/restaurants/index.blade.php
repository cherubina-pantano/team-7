@extends('layouts.app')

@section('content')
    <div class="container">



        <h1>Ristoranti</h1>


        @if ($restaurants->isEmpty())
            <p>Nono sono presenti ristoranti. Crea nuovo ristorante</p>
        @else
            <p>Sono presenti ristoranti</p>
        @endif

        @foreach ($restaurants as $restaurant)

            <h3>{{$restaurant->name}}</h3>
                <p>{{$restaurant->address}} - {{$restaurant->phone}} - {{$restaurant->p_iva}}</p>
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

            <form action="{{route('admin.restaurants.destroy', $restaurant->id)}}" method='POST'>
             @csrf
             @method('DELETE')

                <input type="submit" class='btn btn-danger' value='Delete'>
            </form>

        @endforeach



    </div>
@endsection
