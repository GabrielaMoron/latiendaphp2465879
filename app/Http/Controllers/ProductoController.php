<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       echo"aqui va el catalogo de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    

    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
   
        return view('productos.new')
         ->with('marcas', $marcas)
         ->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //reglas de validacion
        $reglas=[
"nombre"=>'required|alpha|unique:productos,nombre',
"desc"=>'required|min:10|max:20',
"precio"=>'required|numeric',
"marca"=>'required',
"categoria"=>'required',
"imagen"=>'required|image'





       ];
       //mensajes personalizados por regla
$mensajes =[
    "required"=> "campo obligatorio",
    "numeric"=> "solo numeros ",
    "alpha"=> "solo letras",
    "image"=>"solo imagenes",
    "unique"=>"el de producto ya se ha tomado"
];

       //crear el objeto validador

       $v = Validator ::make($r->all(),$reglas,$mensajes);
       var_dump($v->fails());
       //validar datos: validar metodo fails
       if($v->fails()){


        return redirect('productos/create')
           ->withErrors($v)
           ->withInput();

       }else{ 
//ASIGNAR A UNA VARIABLE: NOMBRE_ARCHIVO 
         $nombre_archivo = $r->imagen->getClientOriginalName() ;
         $archivo=$r->imagen;
//MOVER EL ARCHIVO  en la carpeta public

var_dump (public_path());
$ruta = public_path().'/img';
$archivo->move($ruta,$nombre_archivo);
           //REGLAS DE VALIDACIÓN
       $p= new Producto;
        $p->nombre=$r->nombre;
        $p->desc=$r->desc;
        $p->precio=$r->precio;
        $p->imagen= $nombre_archivo;
        $p->marca_id=$r->marca;
        $p->categoria_id=$r->categoria;
  
        $p->save();
       //Redirccionar a la ruta create
       return redirect('productos/create')
           ->with('mensaje','PRODUCTO REGISTRADO');
       }
       
       /*
        //crear identidad de producto

      $p= new Producto;
      $p->nombre=$r->nombre;
      $p->desc=$r->desc;
      $p->precio=$r->precio;
      $p->marca_id=$r->marca;
      $p->categoria_id=$r->categoria;

      $p->save();
     //Redirccionar a la ruta create
     return redirect('productos/create')
         ->with('mensaje','PRODUCTO REGISTRADO');*/

    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
       echo"aqui va la información del producto cuyo id es : $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit( $producto)
    {
       echo"aqui va el formulario de edición de producto cuyo id es : $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
