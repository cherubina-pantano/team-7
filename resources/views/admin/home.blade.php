@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            
        <a href="{{route('admin.dishes.index')}}" ><input type="submit" class='btn btn-primary mt-5' value='Vedi menu'></a>

        <a href="{{route('admin.dishes.create')}}" ><input type="submit" class='btn btn-primary mt-5' value='Nuovo piatto'></a>

        <a href="{{route('admin.orders.index')}}"><input type="submit" class='btn btn-primary mt-5' value='Ordini'></a>

        @if(session('restaurant-deleted'))
                <div class = "alert alert-success mt-5">
                     Restaurant '{{session('restaurant-deleted')}}' é stato cancellato con successo
                </div>
         @endif

         @foreach ($restaurants as $restaurant)

        <h3 class='mt-3'>{{$restaurant->name}}</h3>
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

         <a href="{{route('admin.restaurants.edit', $restaurant->id)}}" ><input type="submit" class='btn btn-primary d-inline' value='Edit'></a>

            <form class='d-inline' action="{{route('admin.restaurants.destroy', $restaurant->id)}}" method='POST'>
            @csrf
            @method('DELETE')

            <input type="submit" class='btn btn-danger' value='Delete'>
            </form>
            <hr>
        @endforeach

        
      </div>
    </div>


</div>
@endsection
