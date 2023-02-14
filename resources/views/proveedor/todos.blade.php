@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ "Lista de Proveedores" }}
                        <div align="left"><a href="{{ route("proveedor.create") }}" type="button" class="btn btn-primary">Añadir</a></div>
                    </div>
                    <div class="card-body">
                        <ol class="list-group list-group-numbered">
                            @foreach ($proveedores as $proveedor)
                                @if($proveedor->delete_at===null)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{ $proveedor->nombre }}</div>
                                        {{ $proveedor->email }}
                                    </div>
                                        <div>
                                            <a href="{{ route("proveedor.edit", ["proveedor" => $proveedor->id])}}" type="button" class="btn btn-outline-dark">Editar</a>
                                        </div>
                                        <div>
                                            <form class="form-floating" action="{{ route("proveedor.destroy", ["proveedor" => $proveedor->id]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-outline-dark" type="submit" type="submit" >Eliminar</button>
                                            </form>
                                        </div>
                                </li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
