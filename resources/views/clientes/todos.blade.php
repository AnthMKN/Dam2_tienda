@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Lista de Clientes 
                        <div align="left"><a href="{{ route("cliente.create") }}" type="button" class="btn btn-primary">Añadir</a></div>
                    </div>
                    <div class="card-body">
                        <ol class="list-group list-group-numbered">
                            @foreach ($clientes as $cliente)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{ $cliente->nombre }}</div>
                                        {{ $cliente->email }}                                    
                                    </div>
                                    <div align="right"><a href="{{ route("cliente.show", ["cliente" => $cliente->id])}}" type="button" class="btn btn-outline-dark">Ver</a></div>
                                    <div align="right"><a href="{{ route("cliente.edit", ["cliente" => $cliente->id])}}" type="button" class="btn btn-outline-dark">Editar</a></div>
                                    <div align="right"><a href="{{ route("cliente.edit", ["cliente" => $cliente->id])}}" type="button" class="btn btn-outline-dark">Borrar</a></div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
