@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1>{{ $producto->nombre }}</h1>
    <div class="card-image">
        @if($producto->imagen === null){
                <img src="{{ asset( 'img/disponible.png' )}}" alt="">
            }
            @else
            <img src="{{ asset('img/'.$producto->imagen )}}" alt="">
            @endif
</div>
<div class="row">
    <div class="col s8">
        <h3>Marca: {{$producto->marca->nombre}}</h3>
       
        <ul>
        <h4>Categoria: {{$producto->categoria->nombre}}</h4>
            <li>Precio: US {{$producto->precio}}</li>
            <li>Descripcion:{{$producto->desc}}</li>
</ul>


    </div>
    <div class="col s4">
    <div class="row">
        <h3>Añadir al carrito</h3>
    </div>
    
</div>
<form action="{{route('cart.store') }}" method="POST">
    @csrf
    <input type="hidden"
    name="prod_id"
    value="{{ $producto->id}}" >
    <div class="row">
        <div class="col s4 input-field">
            <select name="cantidad" id="cantidad">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <label for="cantidad">Cantidad</label>
            <button class="btn waves-effect-ligth" type="sumbit" name="action">Añadir</button>
        </div>
    </div>
    
</form>
</div>


@endsection