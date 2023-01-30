{{-- GRUPO DE AMIGOS INVISIBLES --}}
<div class="col-lg-4 col-md-6 col-sm-12 p-1 pb-3 m-0">
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">{{ $articulo->nombre }}</h5>

            <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                @if ($botonver)
                    <a href="{{ route('articulo.show', ["articulo" => $articulo->id]) }}" class="btn btn-outline-primary">Ver</a>
                @endif
                        <a href="{{ route("articulo.edit", ["articulo" => $articulo->id]) }}" class="btn btn-outline-primary">Editar</a>
                        <button type="submit" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#borrar{{ $articulo->id }}">
                        Borrar
                    </button>
            </div>

        </div>
        <div class="card-footer">
            
        </div>
    </div>
</div>
{{-- GRUPO DE AMIGOS INVISIBLES --}}


<!-- Modal -->
<div class="modal fade" id="borrar{{ $articulo->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmación de borrado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 ¿Desea borrar el grupo <strong>{{ $articulo->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route("grupos.destroy", ["grupo" => $articulo->id]) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-primary">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
