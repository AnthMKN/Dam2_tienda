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
                                                <th>Nombre Articulo</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                    $total = 0;
                                            @endphp 
                                            @foreach ($detallesPedido as $d_pedido)
                                            <tr>
                                                <td>{{ $articulos[$iteracion]->nombre}}</td>
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
                                </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection