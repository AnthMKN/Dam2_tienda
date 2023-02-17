@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Proveedor: {{$proveedor->nombre}}</div>

                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif

                            <form class="form-floating" action="{{ route('proveedor.update', ["proveedor" => $proveedor->id]) }}" method="post">
                                @csrf
                                @method("PUT")

                                <div class="form-group row">
                                    <input type="hidden" name="oldname" value="{{ $proveedor->proveedor }}">
                                    <label for="nombre" class="col-4 col-form-label">Nombre del cliente:</label>
                                    <div class="col-8">
                                        <input id="nombre" name="nombre" placeholder="nombre del proveedor" type="text" class="form-control" value="{{ $proveedor->nombre}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="oldtelefono" value="{{ $proveedor->telefono }}">
                                    <label for="telefono" class="col-4 col-form-label">telefono:</label>
                                    <div class="col-8">
                                        <input id="telefono" name="telefono" placeholder="telefono" type="text" class="form-control" value="{{ $proveedor->telefono }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="oldemail" value="{{ $proveedor->email }}">
                                    <label for="email" class="col-4 col-form-label">Email:</label>
                                    <div class="col-8">
                                        <input id="email" name="email" placeholder="email" type="text" class="form-control" value="{{ $proveedor->email }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="oldnif" value="{{ $proveedor->nif }}">
                                    <label for="dni" class="col-4 col-form-label">NIF:</label>
                                    <div class="col-8">
                                        <input id="nif" name="nif" placeholder="{{ $proveedor->nif }}" type="text" class="form-control" value="{{ $proveedor->nif }}">
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="olddireccion" value="{{ $proveedor->direccion }}">
                                    <label for="direccion" class="col-4 col-form-label">Direccion:</label>
                                    <div class="col-8">
                                        <input id="direccion" name="direccion" placeholder="{{ $proveedor->direccion }}" type="text" class="form-control" value= "{{ $proveedor->direccion }}">
                                    </div>
                                   
                                </div>

                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button type="submit" class="btn btn-primary">Modificar</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection