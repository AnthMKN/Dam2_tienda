@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("articulo.create") }}" type="button" class="btn btn-outline-dark">Añadir Articulo</a>                  
                    
                </div>

                <div class="card-body">
                    @if (strlen (session('status')) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{ session(['status' => '']) }}
                        </div>
                    @endif

                        <div class="row">


                            @foreach($articulos as $articulo)
                                @if($articulo->delete_at == NULL)
                                    <x-tarjetaarticulo :clientes="$clientes" :articulo="$articulo" :botonver=true />
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
