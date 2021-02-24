@extends('layouts.app')

@section('content')
<div id="dish">
     <div class="container">
          <h1>Menu del ristorante {{$restaurant->name}}</h1>

          
       
          @foreach($dishes as $dish)
               <h3>{{ $dish->name}}</h3>
               <p> 
                    {{ $dish->description}} 
                    <br>
                    Prezzo: {{ $dish->price}} €
               </p>
          @endforeach
       
         
          
       
       
       </div>

</div>

@endsection

<script src="{{asset('js/app.js')}}"></script>

