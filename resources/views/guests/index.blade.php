@extends('layouts.app')

@section('content')

    <div class="container">
        Cerca per tipologia

        <input type="text" name="name" id="name" v-model="name" v-on:keyup="filterType">

    
        <div class='form-group'>
               @foreach ($types as $type)
                    <div class="form-check">
                        <input class='form-check-input' 
                        type="checkbox" id="{{$type->type}}" 
                        value="{{$type->type}}" 
                        v-on:change="filterType"
                        v-model="types"
                        >
                        <label for="{{$type->type}}">{{$type->type}}</label>
                    </div>
               @endforeach
        </div>

        <div v-if="restaurants.length > 0">
            <ul>
                <li v-for="restaurant in restaurants">
                    <a :href="route(restaurant.id)">@{{restaurant.name}}</a>
                </li>
                <li>

                </li>
            </ul>
        </div>
        
        <h2 v-else>Non ci sono ristoranti che propongano questa cucina</h2>

    </div>


@endsection

<script src="{{asset('js/app.js')}}"></script>

