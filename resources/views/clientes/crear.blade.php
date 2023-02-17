@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Cliente</div>

                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif

                            <form class="form-floating" action="{{ route("cliente.store") }}" method="post">
                                @csrf
                                @method("POST")
                                <div class="form-group row">
                                    <label for="nombre" class="col-4 col-form-label">Nombre :</label>
                                    <div class="col-8">
                                        <input id="nombre" name="nombre" placeholder="nombre del cliente" type="text" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label for="telefono" class="col-4 col-form-label">Teléfono:</label>
                                    <div class="col-8">
                                        <input id="telefono" name="telefono" type="text" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email :</label>
                                    <div class="col-8">
                                        <input id="email" name="email" placeholder="a@email.com" type="text" class="form-control">
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="dni" class="col-4 col-form-label">DNI:</label>
                                    <div class="col-8">
                                        <input id="dni" name="dni" type="text" class="form-control">
                                    </div>
                                   
                                </div>

                                <div class="form-group row">
                                    <label for="direccion" class="col-4 col-form-label">Direccion:</label>
                                    <div class="col-8">
                                        <input id="direccion" name="direccion" type="text" class="form-control">
                                    </div>
                                   
                                </div>

                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button type="submit" class="btn btn-primary">Añadir</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
