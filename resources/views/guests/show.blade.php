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
                         <p>
                              @{{dish.name}}
                         </p>
                         <br>                         
                         <p>
                              @{{dish.description}}
                         </p>
                         <p>
                              @{{dish.ingredients}}
                         </p>
                         <p>
                              @{{dish.price}}
                         </p>
                         <p>
                              @{{dish.available}}
                         </p>                     
                 
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

