<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    //
    public function index()
    {
        return view("home", ["articulos" => Articulo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("articulos.crear", ["proveedores" => Proveedor::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $articulo = Articulo::create([
            "nombre" => $request->nombre,
            "id_proveedor" => $request->id_proveedor,
            "precio" => $request->precio,
            "stock" => $request->stock,
            "categoria" => $request->categoria,
            "descripcion" => $request->descripcion,
            "foto" => $request->foto,
        ]);

        return redirect("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view("articulos.mostrar", ["articulo" => Articulo::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view("articulos.editar",["articulo" => Articulo::find($id)], ["proveedores" => Proveedor::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(StoreArticuloRequest $request, $id) 
    {
        $articulo = Articulo::find($id);

        $articulo->nombre = $request->nombre;
        $articulo->id_proveedor = $request->id_proveedor; 
        $articulo->precio = $request->precio;
        $articulo->stock = $request->stock;
        $articulo->categoria = $request->categoria;
        $articulo->descripcion = $request->descripcion;
        $articulo->foto = $request->foto;

        $articulo->save();
        return redirect("home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
