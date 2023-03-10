<div class="col-lg-4 col-md-6 col-sm-12 p-1 pb-3 m-0">
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">{{ $articulo->nombre }}</h5>
            <div>
                <img src={{$articulo->foto}} width="200px" height="200px">
            </div>
            <div>
                <h6 class="card-title">{{ $articulo->precio }}€</h6>
            </div>
            
                @if ($articulo->stock <= 0)
                    <h6 class="card-title">Sin stock</h6>
                @endif
            
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                @if ($botonver)
                    <a href="{{ route('articulo.show', ["articulo" => $articulo->id]) }}" class="btn btn-outline-primary">Ver</a>
                @endif
                    <a href="{{ route("articulo.edit", ["articulo" => $articulo->id]) }}" class="btn btn-outline-primary">Editar</a>
                    @if( $articulo->stock > 0)
                        @if(session()->has('pedido'))
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addAlPedido - {{$articulo->id}}">
                                Al carrito
                            </button>
                        @endif
                    @endif
            </div>

        </div>
        <div class="card-footer">
            
        </div>
    </div>
</div>
  <!--Modal añadir al Pedido-->
  <div class="modal fade" id="addAlPedido - {{ $articulo->id }}" tabindex="-1" role="dialog" aria-labelledby="addAlPedidoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAlPedidoLabel">Añadir al pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if(session()->has('pedido'))
                <form form class="form-floating" action="{{ route("detallePedido.store") }}" method="post">
                    @csrf
                    @method("POST")

                    <input id="id_pedido" name="id_pedido" type="hidden" value="{{session('pedido')}}">
                    <input id="id_articulo" name="id_articulo" type="hidden" value="{{$articulo->id}}">
                                   
                    <div class="form-group row">
                        <label for="precio" class="col-4 col-form-label">Precio:</label>
                        <div class="col-8">
                            <input class="form-control" readonly="readonly" id="precio" name="precio" type="precio" value="{{$articulo->precio}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cantidad" class="col-4 col-form-label">Cantidad:</label>
                        <div class="col-8">
                            <input class="form-control" id="cantidad" name="cantidad" type="cantidad">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Añadir a pedido</button>
                    </div>
                </form>
            @endif
        </div> 
      </div>
    </div>
  </div>