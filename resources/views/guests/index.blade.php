@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Elenco ristoranti</h1>

   @foreach($restaurants as $restaurant)
      <a href="{{route('guests.show', $restaurant->id)}}">
          <h3>{{ $restaurant->name }}</h3>
      </a>

      <p>{{$restaurant->address}}</p>
      <p>{{$restaurant->phone}}</p>
   @endforeach
</div>

<div id="app">

</div>


<script src="{{asset('js/app.js')}}"></script>
@endsection


