@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Añadir Articulo</div>

                    <div class="card-body">
                        @if (strlen (session('status')) > 0)
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                {{ session(['status' => '']) }}
                            </div>
                        @endif

                            <form class="form-floating" action="{{ route("articulo.store") }}" method="post">
                                @csrf
                                @method("POST")
                                <div class="form-group row">
                                    <label for="nombre" class="col-4 col-form-label">Nombre Articulo:</label>
                                    <div class="col-8">
                                        <input id="nombre" name="nombre" placeholder="nombre del producto" type="text" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label for="id_proveedor" class="col-4 col-form-label">Proveedor:</label>
                                    <div class="col-8">
                                        <select id="id_proveedor" name="id_proveedor" class="col-4 col-form-label" id="lang">
                                            @foreach ($proveedores as $proveedor)
                                            <option value ={{$proveedor->id}}>{{$proveedor->nombre}}</option>
                                            @endforeach
                                        </select>   
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="precio" class="col-4 col-form-label">Precio:</label>
                                    <div class="col-8">
                                        <input id="precio" name="precio" placeholder="0" type="text" class="form-control">
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="stock" class="col-4 col-form-label">Stock:</label>
                                    <div class="col-8">
                                        <input id="stock" name="stock" placeholder="0" type="text" class="form-control">
                                    </div>
                                   
                                </div>

                                <div class="form-group row">
                                    <label for="categoria" class="col-4 col-form-label">Categoria:</label>
                                    <div class="col-8">
                                        <input id="categoria" name="categoria" placeholder="categoria" type="text" class="form-control">
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="descripcion" class="col-4 col-form-label" for="comentario">Descripcion:</label>
                                    <div class="col-8">
                                        <textarea id="descripcion" name="descripcion" cols="40" rows="6" class="form-control"></textarea>
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <label for="foto" class="col-4 col-form-label" for="url">URL Imagen:</label>
                                    <div class="col-8">
                                        <textarea id="foto" name="foto" cols="40" rows="6" class="form-control"></textarea>
                                    </div>
                                   
                                </div>

                                
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button type="submit" class="btn btn-primary">Añadir</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
