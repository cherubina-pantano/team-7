@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Piatti</h1>

   @foreach($restaurants->dishes as $dish)
        <h3>{{ $dish->name}}</h3>
   @endforeach
</div>
@endsection