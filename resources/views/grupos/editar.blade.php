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

                            <form class="form-floating" action="{{ route("grupos.update", ["grupo" => $grupo->id]) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="form-group row">
                                    <input type="hidden" name="oldname" value="{{ $grupo->name }}">
                                    <label for="name" class="col-4 col-form-label">Nombre del grupo:</label>
                                    <div class="col-8">
                                        <input id="name" name="name" placeholder="nombre del grupo" type="text" class="form-control" value="{{ $grupo->name }}">
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
                                    <label for="importe" class="col-4 col-form-label">Importe:</label>
                                    <div class="col-8">
                                        <input id="importe" name="importe" placeholder="Valor aprox del regalo" type="text" class="form-control" value="{{ $grupo->importe }}">
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
                                    <div class="input-group">
                                        <span class="input-group-text">Sorteo</span>
                                        <input id="fechasorteo" name="fechasorteo" placeholder="fecha del sorteo" type="date" class="form-control" value="{{ $grupo->fechasorteo }}">
                                        <span class="input-group-text">Entrega de regalos</span>
                                        <input id="fechaentregaregalos" name="fechaentregaregalos" type="date" aria-label="Fecha del sorteo" class="form-control" value="{{ $grupo->fechaentregaregalos }}">
                                    </div>
                                    @if ($errors->has("fechasorteo"))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get("fechasorteo") as $error1)
                                        {{ $error1 }}
                                        @endforeach
                                    </div>
                                    @endif
                                    @if ($errors->has("fechaentregaregalos"))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get("fechaentregaregalos") as $error1)
                                        {{ $error1 }}
                                        @endforeach
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="comentario">Comentario:</label>
                                    <div class="col-8">
                                        <textarea id="comentario" name="comentario" cols="40" rows="6" class="form-control">{{ $grupo->comentario }}</textarea>
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
