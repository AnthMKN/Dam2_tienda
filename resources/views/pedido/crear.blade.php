@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{('Crear Pedido') }}</div>

                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif

                        <form class="form-floating" action="{{ route("pedido.store") }}" method="post">
                            @csrf
                            @method("POST")

                        <div>
                            <label for="id_cliente" class="col-4 col-form-label">Cliente:</label>
                            <div class="col-8">
                                <select id="id_cliente" name="id_cliente" class="col-4 col-form-label" id="lang">
                                    @foreach ($clientes as $cliente)
                                    <option value ={{$cliente->id}}>{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>   
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirmado" class="col-4 col-form-label">Confirmado:</label>
                            <div class="col-8">
                                <input id="confirmado" name="confirmado" type="text" class="form-control">
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="descuento" class="col-4 col-form-label">Descuento:</label>
                            <div class="col-8">
                                <input id="Descuento" name="Descuento" type="text" class="form-control">
                            </div>  
                        </div>



                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="comentario">Lista de articulos a meter en el pedido:</label>
                                <div class="col-8">
                                    @foreach($articulos as $articulo)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="articulos[]" id="articulos[]" value="{{ $articulo->id }}">
                                            <label class="form-check-label" for="{{ $articulo->nombre }}">{{ $articulo->nombre }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>





                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button type="submit" class="btn btn-primary">Introducir</button>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
