    @extends('layouts.munu')
    @section('contenido')

    <div class="row">
        <h1 class="indigo-text text-indigo darken-4">
            nuevo productos
        </h1>
    </div>
    <div class="row">

        <form  method="POST" action="{{ url('productos') }}">
            @csrf
            <div class="row">
                <div class="input-field col s8">
                <input pleceholder="nombre de producto" type="text" id="nombre" name="nombre" value="{{ old('nombre')}}">
                <label for="first_name">nombre de producto</label>
                <span>{{ $errors->first('nombre') }} </span>
            </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                  <textarea class="materialize-textarea" id="desc" name="desc"> {{ old('desc')}}</textarea>
                  <label for="desc">descripcion</label> 
                  <span>{{ $errors->first('desc') }} </span> 
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                    <input type="text" id ="precio" name="precio" value="{{ old('precio')}}">
                    <label for="precio">precio</label>
                    <span class=" blue darken-4-text">{{ $errors->first('precio') }} </span> 
                </div>
            </div>
            <div class="row">
                <div class="col s8 input-field">
                    <select name="marca" id="marca">
                        <option value=""> elija la marca</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}">{{$marca->nombre}}</option>
                        @endforeach
                    </select>
                    <label for="marca">Marca</label>
                    <span>{{ $errors->first('marca') }} </span>
                </div>
            </div>
            <div class="row">
                <div class="col s8 input-field">
                    <select name="categoria" id="categoria">
                    <option value=""> elija la categioria</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                    <label for="categoria">Categoria</label>
                    <span>{{ $errors->first('categoria') }} </span>
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
        @if(session('mensaje'))
    <div class="row">
        {{ session('mensaje') }}
    </div>
    @endif
  
    </div>
    @endsection