@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Menu</h1>

        @if(session('dish-deleted'))
            <div class = "alert alert-success mt-5">
                 Il piatto '{{session('dish-deleted')}}' é stato cancellato con successo
            </div>
        @endif

        @if ($dishes->isEmpty())
            <p>Aggiungi nuovo piatto al menù</p>
        @else
            <p>Elenco piatti</p>
        @endif

        @foreach ($dishes as $dish)

            <h3 class='mt-4'>{{$dish->name}}</h3>
                <p>{{$dish->category}}</p>
                <p>{{$dish->ingredients}}</p>
                <p>{{$dish->description}}</p>
                <p>{{$dish->price}} €</p>
                {{-- <p>{{$dish->gluten}}</p>
                <p>{{$dish->available}}</p> --}}

                {{-- <div>
                    @if (!empty($dish->path_img))
                        <img class="mb-3" width="250" src="{{asset('storage/' . $dish->path_img)}}" alt="{{$dish->name}}">
                    @else
                        <img class="mb-3" width="250" src="{{asset('')}}" alt="{{$dish->name}}">
                    @endif
                </div> --}}

                {{-- <section class="type">
                    <h6>TIPOLOGIA</h6>
                    @foreach ($restaurant->types as $type)
                        <ul>
                            <li>
                                {{$type->type}}
                            </li>
                        </ul>
                    @endforeach

                </section> --}}

           <a href="{{route('admin.dishes.edit', $dish->id)}}" ><input type="submit" class='btn btn-primary' value='Edit'></a>


            <form class='d-inline' action="{{route('admin.dishes.destroy', $dish->id)}}" method='POST'>
             @csrf
             @method('DELETE')

                <input type="submit" class='btn btn-danger' value='Delete'>
            </form>
            <hr>
        @endforeach

    </div>
@endsection
