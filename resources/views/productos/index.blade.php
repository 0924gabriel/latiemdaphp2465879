@extends('layouts.munu')

@section('contenido')
    <div class="row">
        <h1>catalogo de productos</h1>
    </div>
    @foreach($productos as $producto)
    <div class="row">
    <div class="col s5 m6">
      <div class="card  deep-orange accent-3">
        <div class="card-image">
        @if($producto->imagen ===null)
        <img src="{{ asset('img/producto_no_disponible.jfif') }}" alt="">
        @else
        @endif
        <img src="{{ asset('img/'.$producto->imagen) }}" alt="">
          <span class="card-title">{{ $producto->nombre }}</span>
          <a class="btn-floating halfway-fab waves-effect waves-light" href="{{ route('productos.show',$producto->id )}}"><i class="material-icons">+</i></a>
        </div>
        <div class="card-content">
          <p>{{$producto->desc}}</p>
        </div>
      </div>
    </div>
  </div>
    @endforeach
@endsection