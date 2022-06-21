@extends('layouts.munu')
@section('contenido')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row">
    <h1>carrito de compras</h1>
</div>
@if(session('cart'))
<div class="row">
    <div class="col s8">
        <table class="table table-striped table-dark ">
            <thead>
                <tr class="p-3 mb-2 bg-warning text-dark">
                <th>ID</th>
                <th>nombre producto</th>
                <th>cantidad</th>
                <th>precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $producto)
                <tr class="font-italic">
                <td>{{ $producto[0]["id"] }}</td>
                    <td>{{ $producto[0]["nombre"] }}</td>
                    <td>{{ $producto[0]["cantidad"] }}</td>
                    <td>{{ $producto[0]["precio"]}}</td>
                    
                  

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<strong>
    no hay items en el carrito 
</strong>
@endif
<div class="row">
    <form method="POST" action="{{ route('cart.destroy' , 1) }}">
    @method('DELETE')
    @csrf
    <button class="btn waves-effect waves-light" type="submit">eliminar</button>
    </form>
</div>
@endsection