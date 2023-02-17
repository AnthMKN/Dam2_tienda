@extends('layouts.app')
@php 
    $iteracion=0;
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pedido: {{$pedido->id}}</div>
                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif
                        <div class="col-6">
                        </div>
                                <div class="form-group row">
                                    <table style="border-collapse: separate; border-spacing: 15px;">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre Articulo</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Sub total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                    $total = 0;
                                            @endphp 
                                            @foreach ($detallesPedido as $d_pedido)
                                            <tr>
                                                <td><a class="nav-link" href="{{ route("articulo.show", ["articulo" => $articulos[$iteracion]->id_articulo]) }}"><img src="{{$articulos[$iteracion]->foto}}" width="80" height="80"></a></td>
                                                <td>{{$articulos[$iteracion]->nombre}}</td>
                                                <td>{{$d_pedido->cantidad}}</td>
                                                <td>{{$d_pedido->precio}}€</td>
                                                <td>{{$d_pedido->precio * $d_pedido->cantidad}}€</td>
                                                @php
                                                    $total += $d_pedido->precio * $d_pedido->cantidad;
                                                @endphp  
                                            </tr>
                                            @php
                                                $iteracion++
                                            @endphp  
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="form-group row" align="right">
                                        <div class="offset-4 col-8">
                                            <label for="total" class="col-4 col-form-label">Total: {{$total}}€</label>
                                        </div>
                                    </div>
                                    <form class="form-floating" action="{{ route('pedido.pdf', ["id_pedido" => $pedido->id ]) }}" method="get">
                                        <div class="form-group row" align="right">
                                            <div class="offset-4 col-8">
                                                <button type="submit" class="btn btn-primary">Descargar PDF</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection