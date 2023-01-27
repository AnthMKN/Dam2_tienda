{{--
    Documentacion blade (@):
    https://laravel.com/docs/9.x/blade

    Usamos como base la plantilla resources/views/layouts/app.blade.php
    Queda ver el botón de acceso a esta página en la cabecera en ese fichero (Usuarios)
--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">{{ "Lista de Grupos" }}</div>

                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif
{{-- Hasta aquí esta cogido de app.blade.php --}}
                        <div class="row">

                            {{--
                        PONLO TÚ BONITO CON Bootstrap
                        https://getbootstrap.com/docs/5.2/getting-started/introduction/
                        --}}


                            @foreach ($grupos as $grupo)

                                <x-tarjetagrupo :grupo="$grupo" :botonver=true />

                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
