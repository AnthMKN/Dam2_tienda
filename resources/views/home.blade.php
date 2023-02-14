@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route("articulo.create") }}" type="button" class="btn btn-outline-dark">Añadir Articulo</a>
                    @if(!session()->has('pedido'))
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#crearPedido">
                        Nuevo pedido
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

                        <div class="row">


                            @foreach($articulos as $articulo)
                                @if($articulo->delete_at == NULL)
                                    <x-tarjetaarticulo :articulo="$articulo" :botonver=true />
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

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
        
            <form class="form-floating" action="{{ route("pedido.store") }}" method="post">
                @csrf
                @method("POST")
                <div class="form-group row">
                    <label for="id_cliente" class="col-4 col-form-label">Cliente:</label>
                    <div class="col-8">
                        <select id="id_cliente" name="id_cliente" class="col-4 col-form-label" id="lang">
                            @foreach ($clientes as $cliente)
                                @if($cliente->delete_at===null)
                                    <option value ={{$cliente->id}}>{{$cliente->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <input id="confirmado" name="confirmado" type="hidden" value=0>
                <input id="descuento" name="descuento" type="hidden" value=0>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button type="submit" class="btn btn-primary">Crear pedido</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
