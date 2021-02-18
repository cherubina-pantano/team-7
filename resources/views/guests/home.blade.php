@extends('layouts.app')

@section('content')
<div class="container">
   <h1>homepage</h1>

   @foreach($restaurants as $restaurant)
      <h3>{{ $restaurant->name }}</h3>
   @endforeach
</div>
@endsection
