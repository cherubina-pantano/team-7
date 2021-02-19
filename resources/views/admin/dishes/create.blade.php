@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea nuovo piatto</h1>

        @if ($errors->any())
            <div class='alert alert-danger'>
                <ul>
                    @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('admin.dishes.store')}}" method="POST">
            @csrf
            @method('POST')

            <div class='form-group'>
                <label for="name">Nome Piatto</label>

                <input class='form-control' type="text" name="name" id="name" value="{{old('name')}}">
            </div>

            <div class='form-group'>

                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category" id="category">
                    <option selected>Seleziona una categoria</option>
                    <option value="antipasto">Antipasto</option>
                    <option value="primo">Primo</option>
                    <option value="secondo">Secondo</option>
                    <option value="contorno">Contorno</option>
                    <option value="dolce">Dolce</option>
                </select>
              
            </div>

            <div class='form-group'>
                <label for="ingredients">Ingredienti</label>

                <input class='form-control' type="text" name="ingredients" id="ingredients" value="{{old('ingredients')}}">
            </div>

            <div class='form-group'>
                <label for="description">Descrizione</label>

                <textarea class="form-control" name="description" id="description" type="text" placeholder="scrivi qui">{{old('description')}}</textarea>

            </div>

            <div class='form-group'>
                <label for="price">Prezzo</label>

                <input class='form-control' type="text" name="price" id="price" value="{{old('price')}}">
            </div>

            <label>Glutine:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gluten" id="gluten1" value="true" checked>
                <label class="form-check-label" for="gluten1">
                  Sì
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gluten" id="gluten2" value="false" checked>
                <label class="form-check-label" for="gluten2">
                  No
            </label> --}}

            <label>Disponibilità:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="available" id="available1" value="true" checked>
                <label class="form-check-label" for="available1">
                  Sì
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="available" id="available2" value="false" checked>
                <label class="form-check-label" for="available2">
                  No
            </label>


            <input type="submit" class='btn btn-primary' value='Crea piatto'>
        </form>

    </div>
@endsection
