<?php

namespace App\Http\Controllers;


use App\Models\producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productoController extends Controller
{
    //1 definir reglas de validacion 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //seleccionar de todos los productos 
        $productos = producto::all();
        //mostrar la vista del catalogo 
        //levandole la lista de productos
        return view('productos.index')
            ->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccionar categorias y imagenes 
        $marcas = Marca::all();
        $categorias = Categoria::all(); 
        return view('productos.new')->with('marcas',$marcas)->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

        $reglas=[
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:10|max:50',
            "precio" => 'required|numeric',
            "marca" => 'required',
            "categoria" => "required",
            "imagen" => 'required|image'
    
        ];
        //mensajes personalizados por regla 
        $mensajes =[
            "required" => "campo obligatorio",
            "min" => "porfavor escribe minimo de 10 palabras",
            "max" => "porfavor escribe maximo de 50 palabras",
            "numeric" => "solo numeros",
            "alpha" => "solo letras ",
            "image" => "solo imagenes",
            "unique" => "nombre ya en uso"

        ];
        // crear el objeto validador
        $v = validator::make($r->all(), $reglas, $mensajes);
        //validar datos
        //metodo falls(); retorna un true en caso de validacion faliida y false en caso de la validacion sea correcta
        if($v->fails()){
            //validacion falla 
            //mostrar mensajes de  validacion
            //redireccionar mi formulario de nuevo producto
            return redirect('productos/create')
                ->withErrors($v)
                ->withInput();

        }else{
            //analizar el objeto del request asinar la variabre nombre_archivo
            $nombre_archivo = $r->imagen->getClientOriginalName();
            $archivo = $r->imagen;
            //mover el archivo en la carpeta public
            
            $ruta = public_path().'/img';
            $archivo->move($ruta, $nombre_archivo);

            //validacion correcta
            $p = new producto;
        //asignar valores a los atributos 
        //del nuevo producto 
        $p->nombre = $r->nombre;
        $p->desc = $r->desc;
        $p->precio = $r->precio;
        $p->imagen = $nombre_archivo;
        $p->marca_id = $r->marca;
        $p->categoria_id = $r->categoria;
        //grabar la base de datos
        $p->save();
        //redireccionar la ruta : create
        //levando datos de la secion 
        return redirect('productos/create')
                ->with('mensaje' , 'producto creado');

        }
        //crear la entidad producto 
       /* $p = new producto;
        //asignar valores a los atributos 
        //del nuevo producto 
        $p->nombre = $r->nombre;
        $p->desc = $r->desc;
        $p->precio = $r->precio;
        $p->marca_id = $r->marca;
        $p->categoria_id = $r->categoria;
        //grabar la base de datos
        $p->save();
        //redireccionar la ruta : create
        //levando datos de la secion 
        return redirect('productos/create')
                ->with('mensaje' , 'producto creado');
    */
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        //echo"aqui va la informacion de el producto cuyo id es: $producto";
        //seleccionar producto
        $producto = producto::find($producto);
        //mostrar vista de detalles
        //llevando el producto selecionado
        return view('productos.details')
                ->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo"aqui va ir el formulario de edicion del producto cuyo id es: $producto ";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }
}
