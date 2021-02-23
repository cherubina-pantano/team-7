@extends('layouts.app')

@section('content')

    <div class="container">
        Cerca per tipologia

        <input type="text" name="name" id="name" v-model="name">

    
        <div class='form-group'>
               @foreach ($types as $type)
                    <div class="form-check">
                        <input v-on:keyup="filterType" class='form-check-input' type="checkbox" name="types[]" id="type-{{$type->id}}" value="{{$type->id}}">
                        <label for="type-{{$type->id}}">{{$type->type}}</label>
                    </div>
               @endforeach
        </div>

        <div>
            <ul>
                <li v-for="restaurant in restaurants">
                    <a href="">@{{restaurant.name}}</a>
                </li>
            </ul>
        </div>

      

 
   
        <!-- <select v-model="actualType"
        v-on:change="filterType"
        >
            <option value="tutte">tutte</option>
            @foreach ($types as $type)

                <option value="{{$type->type}}">
                    {{$type->type}}
                </option>
            @endforeach
        </select>
        
        <ul v-if="types.length > 0">
            <li v-for="type in types">
                <a href="">
                    <h2>@{{type.name}}</h2>
                </a>
                <p>@{{type.address}}</p>
                <p>@{{type.type}}</p>
                <p>@{{type.phone}}</p>
            </li>
        </ul>
        <h2 v-else>Siamo spiacenti, non ci sono ancora ristoranti</h2> -->
    </div>


@endsection

<script src="{{asset('js/app.js')}}" defer></script>

