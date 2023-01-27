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

                        <form class="form-floating" action="{{ route("grupos.storemasiva", ["grupoid" => $grupo->id]) }}" method="post">
                            @csrf
                            @method("POST")
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Nombre del grupo:</label>
                                <div class="col-8">
                                    <input id="name" name="name" placeholder="nombre del grupo" type="text" class="form-control" value="{{ $grupo->name }}" readonly>
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
                                <label class="col-4 col-form-label" for="comentario">Lista de usuarios a meter en el grupo:</label>
                                <div class="col-8">
                                    @foreach($usuarios as $usuario)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="usuarios[]" id="usuarios[]" value="{{ $usuario->id }}"
                                            @if (in_array($usuario->id, $amigos))
                                            {{ "checked" }}
                                            @endif
                                            >
                                            <label class="form-check-label" for="{{ $usuario->email }}">
                                                {{ $usuario->email }}
                                            </label>
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
