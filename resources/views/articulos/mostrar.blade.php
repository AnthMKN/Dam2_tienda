@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("home") }}" type="button" class="btn btn-primary">Volver</a>
                    <a href="{{ route("articulo.edit", ["articulo" => $articulo->id]) }}" type="button" class="btn btn-primary">Editar</a>
                    <button type="submit" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#borrar{{ $articulo->id }}">
                        Borrar
                    </button>
                    
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
                                        <p>ID: {{$articulo->id}}</p>
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


  <!-- Modal borrar -->
<div class="modal fade" id="borrar{{ $articulo->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación de borrado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 ¿Desea borrar el articulo <strong>{{ $articulo->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route("articulo.destroy", ["articulo" => $articulo->id]) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-primary">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
