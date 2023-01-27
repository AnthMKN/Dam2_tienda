@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("grupos.create") }}" type="button" class="btn btn-outline-dark">Crear</a>
                    <a href="{{ route("amigos.create") }}" type="button" class="btn btn-outline-dark">Unirse</a>
                </div>

                <div class="card-body">
                    @if (strlen (session('status')) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{ session(['status' => '']) }}
                        </div>
                    @endif

                        <div class="row">


                            @foreach(auth()->user()->grupos as $grupo)

                                <x-tarjetagrupo :grupo="$grupo" :botonver=true />

                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
