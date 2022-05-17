    @extends('layouts.munu')
    @section('contenido')

    <div class="row">
        <h1 class="indigo-text text-indigo darken-4">
            nuevo productos
        </h1>
    </div>
    <div class="row">

        <form  method="POST" action="{{ route('productos.store') }}">
            @csrf
            <div class="row">
                <div class="input-field col s8">
                <input pleceholder="nombre de producto" type="text" id="nombre" name="nombre">
                <label for="first_name">nombre de producto</label>
            </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                  <textarea class="materialize-textarea" id="desc" name="desc"></textarea>
                  <label for="desc">descripcion</label>  
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                    <input type="text" id ="precio" name="precio">
                    <label for="precio">precio</label>
                </div>
            </div>
            <div class="row">
                <div class="col s8 input-field">
                    <select name="marca" id="marca">
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}">{{$marca->nombre}}</option>
                        @endforeach
                    </select>
                    <label for="marca">Marca</label>
                </div>
            </div>
            <div class="row">
                <div class="col s8 input-field">
                    <select name="categoria" id="categoria">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                    <label for="categoria">Categoria</label>
                </div>
            </div>
            <div class="row">
                <div class="file-field input-field col s8">
                    <div class="btn">
                        <span>imagen</span>
                        <input type="file" name="imagen">
                    </div>
                    <div class="file-path-wrapper ">
                        <input type="text" class="file-path validata">
                    </div>
                </div>
            </div>
            <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action">guardar
        
            </button>
           </div>
        </form>
  
    </div>
    @endsection