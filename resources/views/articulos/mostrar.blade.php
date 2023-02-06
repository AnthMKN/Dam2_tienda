@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("home") }}" type="button" class="btn btn-primary">Volver</a>
                    <a href="{{ route("articulo.edit", ["articulo" => $articulo->id]) }}" type="button" class="btn btn-primary">Editar</a>
                    
                    @if(!isset($_SESSION['pedido']))
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearPedido">
                            Nuevo pedido
                        </button>       
                    @else
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAlPedido">
                            Añadir carrito
                        </button>
                    @endif
                </div>

                <div class="card-body">
                    @if (strlen (session('status')) > 0)
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            {{ session(['status' => '']) }}
                        </div>
                    @endif

                </div>

                <x-tarjetagrupo :$articulo="articulos" :botonver=false />

                <div class="card-body">
                        <div>
                            <img src={{$articulo->foto}} align="right" width="300px" height="300px">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <h2> {{$articulo->nombre}}</h2>
                                        <p>Proveedor: {{$articulo->id_proveedor}}</p>
                                        <p>Precio: {{$articulo->precio}}€</p>
                                        <p>Stock: {{$articulo->stock}}</p>
                                        <p>Categoria: {{$articulo->categoria}}</p>
                                        <p>Descripcion: {{$articulo->descripcion}}</p>
                                </thead>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--Modal Crear Pedido-->
<div class="modal fade" id="crearPedido" tabindex="-1" role="dialog" aria-labelledby="crearPedidoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="crearPedidoLabel">Crear pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if(!isset($_SESSION['pedido']))
                <form class="form-floating" action="{{ route("pedido.store") }}" method="post">
                    @csrf
                    @method("POST")
                        <form class="form-floating" action="{{ route("pedido.store") }}" method="post">
                            @csrf
                            @method("POST")

                        <div class="form-group row">
                            <label for="id_cliente" class="col-4 col-form-label">Cliente:</label>
                            <div class="col-8">
                                <select id="id_cliente" name="id_cliente" class="col-4 col-form-label" id="lang">
                                    @foreach ($clientes as $cliente)
                                    <option value ={{$cliente->id}}>{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>   
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirmado" class="col-4 col-form-label">Confirmado:</label>
                            <div class="col-8">
                                <input id="confirmado" name="confirmado" type="text" class="form-control">
                            </div>  
                        </div>

                        <div class="form-group row">
                            <label for="descuento" class="col-4 col-form-label">Descuento:</label>
                            <div class="col-8">
                                <input id="descuento" name="descuento" type="text" class="form-control">
                            </div>  
                        </div>

                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button type="submit" class="btn btn-primary">Crear pedido</button>
                                </div>
                            </div>
                        </form>
            @endif          
        </div>
      </div>
    </div>
  </div>

  <!--Modal añadir al Pedido-->
  <div class="modal fade" id="addAlPedido" tabindex="-1" role="dialog" aria-labelledby="addAlPedidoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAlPedidoLabel">Añadir al pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if(isset($_SESSION['pedido']))
                <form form class="form-floating" action="{{ route("detallePedido.store") }}" method="post">
                    @csrf
                    @method("POST")

                    <input id="id_pedido" name="id_pedido" type="hidden" value="{{$_SESSION['pedido']}}">
                    <input id="id_articulo" name="id_articulo" type="hidden" value="{{$articulo->id}}">
                    <input id="precio" name="precio" type="precio" value="{{$articulo->precio}}">

                    <div class="form-group row">
                        <label for="cantidad" class="col-4 col-form-label">Cantidad:</label>
                        <div class="col-8">
                            <input id="cantidad" name="cantidad" type="text" class="form-control">
                        </div>  
                    </div>

                </form>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Añadir a pedido</button>
        </div>
      </div>
    </div>
  </div>