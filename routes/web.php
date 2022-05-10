<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ruta de paises 
Route::get('paises', function(){
    $paises=[
        "colombia" => [
            "capital"=>" bogota",
            "moneda"=>"peso",
            "poblacion"=> 51.6,
            "ciudades"=>[
                "medellin",
                "cali",
                "barranquilla"

        ]
        ],
        "peru" => [
            "capital"=> "lima",
            "moneda"=> "sol",
            "poblacion"=> 32.97,
            "ciudades"=>[
                "cusco",
                "arequipa",
                "huancayo"

            ]
        ],
        "paraguay" =>[
            "capital"=> "asuncion",
            "moneda"=> "guarani",
            "poblacion"=> 7.133,
            "ciudades"=>[
                "ciudad del este",
                "encarnacion",
                "fuerte olimpo"
            ]
        ]
    ];
    //mostrar la vista de paises 
    return view('paises')
           ->with("paises" , $paises);

} );
Route::get('prueba', function(){
 return view('productos.new');
} );