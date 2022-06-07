@extends('layouts.munu')
@section('contenido')
    <div class="row">
        <h1>{{ $producto->nombre }}</h1>
    </div>
    <div class="row">
        <div class="col s8">
            <ul>
                <li>Marca: {{$producto->marca->nombre}}</li>
                <li>precio: ${{$producto->precio}}</li>
                <li>descricion: {{$producto->desc}}</li>
                <li>categoria: {{$producto->categoria->nombre}}</li>
                <li><img src="{{ asset('img/'.$producto->imagen) }}" alt="" width="500px"></li>
            </ul>
        </div>
        <div class="col s4">
            <h2>añadir al carrito</h2>
        </div>
        
            <form action="{{route('cart.store')}}" method="POST">
                @csrf
                <input type="hidden" name="prod_id" value="{{$producto->id}}">
                <div class="row">
                    <div class="col s4 input-field">
                        <select name="cantidad" id="cantidad">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <label for="cantidad">cantidad</label>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">añadir
        
                            </button>
                    </div>
                    </div>
                   
                </div>
            </form>
        
    </div>

@endsection