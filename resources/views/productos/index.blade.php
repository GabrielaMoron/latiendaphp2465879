@extends('layouts.menu') 
@section('contenido')
<div class="row">
   <center><h1 class= "blue-text text-deep-purple darken-4">Catalogo de productos</h1></center> 
</div>

@foreach($productos as $producto)
<div class="row">
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
        @if($producto->imagen === null){
                <img src="{{ asset( 'img/disponible.png' )}}" alt="">
            }
            @else
            <img src="{{ asset('img/'.$producto->imagen )}}" alt="">
            @endif
          
          <span class="card-title">   {{$producto->nombre }}</span>  
          <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{ route('productos.show',$producto->id)}}">
                    Ver  <i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <p>{{$producto->desc}}</p>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection