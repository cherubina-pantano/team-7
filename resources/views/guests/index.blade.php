@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Elenco ristoranti</h1>

   <div id="app">
    <div class="select">
        {{-- <select v-model="actualType"
        v-on:change="filterType"
        > --}}
            {{-- @foreach ($types as $type)
                 <option value="{{$type->type}}">
                    {{$type->type}}
                </option>
                @endforeach --}}

            {{-- </select> --}}

            <select v-model="actualType" v-on:change="filterType">
                <option value="italiana">Italiana</option>
                <option value="cinese">Cinese</option>
                <option value="giapponese">Giapponese</option>
                <option value="vegetariana">Vegetariana</option>
                <option value="vegana">Vegana</option>
                <option value="pizzeria">Pizzeria</option>
                <option value="fastfood">Fastfood</option>
                <option value="pesce">Pesce</option>
                <option value="carne">Carne</option>
                <option value="pasticceria">Pasticceria</option>
            </select>

            <ul v-if="types.length > 0">
                <li v-for="tipology in types">
                    <h2>@{{tipology.name}}</h2>
                    <p>@{{tipology.address}}</p>
                    <p>@{{tipology.type}}</p>
                    <p>@{{tipology.phone}}</p>
                </li>
            </ul>
            <h2 v-else>Siamo spiacenti, non ci sono ancora ristoranti</h2>


    </div>
</div>



   @foreach($restaurants as $restaurant)
      <a href="{{route('guests.show', $restaurant->id)}}">
          <h3>{{ $restaurant->name }}</h3>
      </a>

      <p>{{$restaurant->address}}</p>
      <p>{{$restaurant->phone}}</p>
   @endforeach
</div>




<script src="{{asset('js/app.js')}}"></script>
@endsection


