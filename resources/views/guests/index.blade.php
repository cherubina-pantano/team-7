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

        <div>
            <ul>
                <li v-for="restaurant in restaurants">
                    <a href="">@{{restaurant.name}}</a>
                </li>
            </ul>
        </div>

    </div>


@endsection

<script src="{{asset('js/app.js')}}"></script>

