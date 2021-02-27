@extends('layouts.app')

@section('content')
<div id="dish">
     <div class="container">
          <h1>Menu del ristorante {{$restaurant->name}}</h1>

           <input type="hidden" value="{{$restaurant->id}}"
           id="restaurantId">


           {{-- CARRELLO  --}}

           <div class="btn-group d-block text-right ">
            <div class="dropdown">
                <button class="btn btn-primary" data-toggle="modal" data-target="#cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-light">@{{quantitaTotale}}</span>
                </button>
                <div class="modal fade" id="cart">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Il tuo Carrello</h5>
                                <button class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped text-left">
                                    <tbody>
                                        <tr v-for="(dishCarrello, index) in carrello">
                                            <td width="100">
                                                <input type="number" min="0" max="10" class="form-control" v-model="dishCarrello.quantita">
                                            </td>
                                            <td>@{{dishCarrello.dish.name}}</td>
                                            <td>@{{dishCarrello.quantita * dishCarrello.dish.price}} €</td>
                                            <td width="60">
                                                <button v-on:click="rimuovereCarrello(index)" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                Totale: @{{carrelloTotale}} €
                                <button data-dismiss="modal" class="btn btn-primary">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- .................................................  --}}
          <div>
               <ul>
                    <li v-for="dish in dishes">
                         <h4>@{{dish.name}}</h4>
                         <p>Descrizione: @{{dish.description}}</p>
                         <p>Ingredienti: @{{dish.ingredients}}</p>
                         <img :src="dish.path_img" width="300" alt="">
                         <p>Prezzo: @{{dish.price}}€</p>
                         <button class="btn btn-danger"
                            v-on:click="aggiungereCarrello(dish)"
                         >
                        Aggiungere
                        </button>
                         <hr>
                    </li>
               </ul>
          </div>





       </div>

    </div>
</div>

   {{-- @foreach($dishes as $dish)
        <h3>{{ $dish->name}}</h3>
   @endforeach --}}

@endsection

<script src="{{asset('js/dish.js')}}"></script>

