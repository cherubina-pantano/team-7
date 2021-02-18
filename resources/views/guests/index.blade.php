@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Elenco ristoranti</h1>

   @foreach($restaurants as $restaurant)
      <a href="{{route('guests.show', $restaurant->id)}}">
          <h3>{{ $restaurant->name }}</h3>
      </a>
   @endforeach
</div>
@endsection