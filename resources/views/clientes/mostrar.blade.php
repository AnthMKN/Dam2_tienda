@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("cliente.index") }}" type="button" class="btn btn-primary">Volver</a>
                    <a href="{{ route("cliente.edit", ["cliente" => $cliente->id]) }}" type="button" class="btn btn-primary">Editar</a>
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#borrar{{ $cliente->id }}">
                        Borrar
                    </button>

                </div>

                <div class="card-body">
                    @if (strlen (session('status')) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{ session(['status' => '']) }}
                        </div>
                    @endif

                </div>

                <div class="card-body">
                        <div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <h2> {{$cliente->nombre}}</h2>
                                        <p>DNI: {{$cliente->dni}}</p>
                                        <p>ID: {{$cliente->id}}</p>
                                        <p>Telefono: {{$cliente->telefono}}</p>
                                        <p>Email: {{$cliente->email}}</p>
                                        <p>Direccion: {{$cliente->direccion}}</p>
                                </thead>
                            </table>
                        </div>
                        <table style="border-collapse: separate; border-spacing: 15px;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID:</th>
                                    <th>Fecha: </th>
                                    <th>Descuento: </th>
                                </tr>
                            </thead>
                            <tbody>     
                            <h3>Pedidos:</h3>
                                @foreach ($pedidos as $pedido)
                                    @if($pedido->confirmado==0)
                                        <tr>
                                            <form class="form-floating" action="{{ route('pedido.show', ["pedido" => $pedido->id]) }}" method="get">
                                                    <div>
                                                        <td>
                                                            <button type="submit" class="btn btn-primary">Ver</button>
                                                        </td>
                                                    </div>
                                            </form>
                                            <td>{{ $pedido->id }}</td>
                                            <td>{{ $pedido->created_at }}</td>
                                            <td>{{ $pedido->descuento }}%</td>
                                            <form class="form-floating" action="{{ route('session.update', ["session" => $pedido->id]) }}" method="post">
                                                @csrf
                                                @method("PUT")
                                                <div>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary">Recuperar</button>
                                                    </td>
                                                </div>
                                            </form>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <table style="border-collapse: separate; border-spacing: 15px;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID:</th>
                                    <th>Fecha: </th>
                                    <th>Descuento: </th>
                                </tr>
                            </thead>
                            <tbody>     
                                <h3>Facturas: </h3>
                                @foreach ($pedidos as $pedido)
                                    @if($pedido->confirmado==1)
                                        <tr>
                                            <form class="form-floating" action="{{ route('pedido.show', ["pedido" => $pedido->id]) }}" method="get">
                                                    <div>
                                                        <td>
                                                            <button type="submit" class="btn btn-primary">Ver</button>
                                                        </td>
                                                    </div>
                                            </form>
                                            <td>{{ $pedido->id }}</td>
                                            <td>{{ $pedido->created_at }}</td>
                                            <td>{{ $pedido->descuento }}%</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

  <!-- Modal borrar -->
<div class="modal fade" id="borrar{{ $cliente->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmaci??n de borrado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 ??Desea borrar el cliente <strong>{{ $cliente->nombre }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route("cliente.destroy", ["cliente" => $cliente->id]) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-primary">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
