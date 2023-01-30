@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("home") }}" type="button" class="btn btn-primary">Volver</a>

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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <h2> {{$articulo->nombre}}</h2>
                                        <p>Proveedor: {{$articulo->id_proveedor}}</p>
                                        <p>Precio: {{$articulo->Precio}}</p>
                                        <p>Stock: {{$articulo->stock}}</p>
                                        <p>Categoria: {{$articulo->categoria}}</p>
                                        <p>Descripcion: {{$articulo->descripcion}}</p>
                                        <img src={{$articulo->foto}} width="200px" height="200px">
                                </thead>
                            </table>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
