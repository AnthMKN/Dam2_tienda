@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif

                            <form class="form-floating" action="{{ route("grupos.store") }}" method="post">
                                @csrf
                                @method("POST")
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Nombre Articulo:</label>
                                    <div class="col-8">
                                        <input id="name" name="name" placeholder="nombre del grupo" type="text" class="form-control" value="{{ old("name") }}">
                                    </div>
                                    @if ($errors->has("name"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("name") as $error1)
                                                {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Proveedor:</label>
                                    <div class="col-8">
                                        <input id="name" name="name" placeholder="proovedor" type="text" class="form-control" value="{{ old("name") }}">
                                    </div>
                                    @if ($errors->has("name"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("name") as $error1)
                                                {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="importe" class="col-4 col-form-label">Precio:</label>
                                    <div class="col-8">
                                        <input id="importe" name="importe" placeholder="0" type="text" class="form-control" value="">
                                    </div>
                                    @if ($errors->has("importe"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("importe") as $error1)
                                            {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="importe" class="col-4 col-form-label">Stock:</label>
                                    <div class="col-8">
                                        <input id="importe" name="importe" placeholder="0" type="text" class="form-control" value="">
                                    </div>
                                    @if ($errors->has("importe"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("importe") as $error1)
                                            {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="importe" class="col-4 col-form-label">Categoria</label>
                                    <div class="col-8">
                                        <input id="importe" name="importe" placeholder="Placa Base" type="text" class="form-control" value="">
                                    </div>
                                    @if ($errors->has("importe"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("importe") as $error1)
                                            {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="url">URL Imagen:</label>
                                    <div class="col-8">
                                        <textarea id="url" name="comentario" cols="40" rows="6" class="form-control">{{ old("url") }}</textarea>
                                    </div>
                                    @if ($errors->has("comentario"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("comentario") as $error1)
                                                {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="comentario">Descripcion:</label>
                                    <div class="col-8">
                                        <textarea id="comentario" name="comentario" cols="40" rows="6" class="form-control">{{ old("comentario") }}</textarea>
                                    </div>
                                    @if ($errors->has("comentario"))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get("comentario") as $error1)
                                                {{ $error1 }}
                                            @endforeach
                                        </div>
                                    @endif
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
