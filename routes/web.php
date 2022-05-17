<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\ProductoController;

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
 
//ruta paises 
Route::get('paises', function() {
$paises=[
    "Colombia"=> [
        "capital"=> "Bogotá",
        "moneda"=> "peso",
        "poblacion"=> "51.6",
        "ciudades"=>["Medellin","Cali","Barranquilla"] 
    ],
     "Peru"=> [
         "capital"=> "Lima",
     "moneda"=> "sol",
     "poblacion"=> "32.97",
     "ciudades"=>["Cusco","Arequipa","Tacna"] 
    ],
     "Paraguay"=> [
         "capital"=> "Asuncion",
     "moneda"=> "Guarani paraguayo",
     "poblacion"=> "7.133",
     "ciudades"=>["Caaupé","Areguá","paraguarí"] 
     ] 
    ];
    // mostrar la vista de paises
    return view('paises')->with("paises",$paises);


});

Route::get('prueba',function(){
return view('productos.new');



});
//Rutas REST 
//PREODUCTO

Route::resource('productos', ProductoController::class);

