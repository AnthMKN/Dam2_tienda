@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("home") }}" type="button" class="btn btn-primary">Volver</a>
                    <a href="{{ route("articulo.edit", ["articulo" => $articulo->id]) }}" type="button" class="btn btn-primary">Editar</a>
                    <a href="{{ route("home") }}" type="button" class="btn btn-primary">Añadir Carrito</a>
                </div>

                <div class="card-body">
                    @if (strlen (session('status')) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{ session(['status' => '']) }}
                        </div>
                    @endif

                </div>

                <x-tarjetagrupo :$articulo="articulos" :botonver=false />

                <div class="card-body">
                        <div>
                            <img src={{$articulo->foto}} align="right" width="300px" height="300px">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <h2> {{$articulo->nombre}}</h2>
                                        <p>Proveedor: {{$articulo->id_proveedor}}</p>
                                        <p>Precio: {{$articulo->precio}}€</p>
                                        <p>Stock: {{$articulo->stock}}</p>
                                        <p>Categoria: {{$articulo->categoria}}</p>
                                        <p>Descripcion: {{$articulo->descripcion}}</p>
                                </thead>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
