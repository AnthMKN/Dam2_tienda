@extends('layouts.app')
                                            @php 
                                                $iteracion=0;
                                            @endphp
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
                            <form class="form-floating" action="{{ route('pedido.update', ["pedido" => $pedido->id]) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="form-group row">
                                    <label for="nombre" class="col-4 col-form-label">Cliente:</label>
                                    <div class="col-8">
                                        <input id="nombre" name="nombre" readonly="readonly" type="text" class="form-control" value="{{ $pedido->cliente->nombre }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Nombre Articulo</th>
                                                <th>Cantidad</th>
                                                <th></th>
                                                <th>Precio Unitario</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detallesPedido as $d_pedido)
                                            <tr>
                                                <td>{{ $articulos[$iteracion]->nombre}}</td>
                                                <form class="form-floating" action="{{ route('detallePedido.update', ["detallePedido" => $d_pedido->id]) }}" method="post">
                                                    @csrf
                                                    @method("PUT")
                                                        <div>
                                                            <td>
                                                                <input id="cantidad" name="cantidad" type="text" style="width : 50px; heigth : 50px" value="{{ $d_pedido->cantidad }}">
                                                            </td>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                                            </td>
                                                        </div>
                                                </form>
                                                <td>{{$d_pedido->precio}}€</td>
                                                <td>{{$d_pedido->precio * $d_pedido->cantidad}}€</td>
                                                <form class="form-floating" action="{{ route('detallePedido.destroy', ["detallePedido" => $d_pedido->id]) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <td>
                                                        <button type="submit" class="btn btn-primary">Borrar</button>
                                                    </td>
                                                </form>
                                            </tr>
                                            @php
                                                $iteracion++
                                            @endphp  
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
      
                                <div class="form-group row" align="right">
                                    <div class="offset-4 col-8">
                                        <button type="submit" class="btn btn-primary">Finalizar Pedido</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
