@extends('layouts.app')

@section('content')
<div id="dish">
     <div class="container">
          <h1>Menu del ristorante {{$restaurant->name}}</h1>

           <input type="hidden" value="{{$restaurant->id}}"
           id="restaurantId">


          <div>
               <ul>
                    <li v-for="dish in dishes">
                         <h4>@{{dish.name}}</h4>
                         <p>Descrizione: @{{dish.description}}</p>
                         <p>Ingredienti: @{{dish.ingredients}}</p>
                         <img src="../images/vegan.jpg" width="300" alt="">
                         <p>Prezzo: @{{dish.price}}€</p>
                         <hr>
                    </li>
               </ul>
          </div>





       </div>

    </div>
</div>

   {{-- @foreach($dishes as $dish)
        <h3>{{ $dish->name}}</h3>
   @endforeach --}}

@endsection

<script src="{{asset('js/dish.js')}}"></script>

