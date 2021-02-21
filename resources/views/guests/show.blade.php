@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Piatti</h1>


   {{-- @foreach($dishes as $dish->restaurant_id)
        <h3>{{ $dish->name}}</h3>
   @endforeach --}}

    @forelse ($dishes as $dish)
        <h4>{{ $dish->name }}</h4>
   @empty
        <p>Nessun piatto è stato creato</p>
   @endforelse


</div>
@endsection
