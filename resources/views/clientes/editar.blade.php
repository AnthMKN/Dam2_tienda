@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Cliente: {{$cliente->nombre}}</div>

                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif

                            <form class="form-floating" action="{{ route('cliente.update', ["cliente" => $cliente->id]) }}" method="post">
                                @csrf
                                @method("PUT")

                                <div class="form-group row">
                                    <input type="hidden" name="oldname" value="{{ $cliente->cliente }}">
                                    <label for="nombre" class="col-4 col-form-label">Nombre del cliente:</label>
                                    <div class="col-8">
                                        <input id="nombre" name="nombre" placeholder="nombre del cliente" type="text" class="form-control" value="{{ $cliente->nombre}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="oldtelefono" value="{{ $cliente->telefono }}">
                                    <label for="telefono" class="col-4 col-form-label">telefono:</label>
                                    <div class="col-8">
                                        <input id="telefono" name="telefono" placeholder="telefono" type="text" class="form-control" value="{{ $cliente->telefono }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="oldemail" value="{{ $cliente->email }}">
                                    <label for="email" class="col-4 col-form-label">Stock:</label>
                                    <div class="col-8">
                                        <input id="email" name="email" placeholder="email" type="text" class="form-control" value="{{ $cliente->email }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="olddni" value="{{ $cliente->dni }}">
                                    <label for="dni" class="col-4 col-form-label">DNI:</label>
                                    <div class="col-8">
                                        <input id="dni" name="dni" placeholder="{{ $cliente->dni }}" type="text" class="form-control" value="{{ $cliente->dni }}">
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <input type="hidden" name="olddireccion" value="{{ $cliente->direccion }}">
                                    <label for="direccion" class="col-4 col-form-label">Direccion:</label>
                                    <div class="col-8">
                                        <input id="direccion" name="direccion" placeholder="{{ $cliente->direccion }}" type="text" class="form-control" value= "{{ $cliente->direccion }}">
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
