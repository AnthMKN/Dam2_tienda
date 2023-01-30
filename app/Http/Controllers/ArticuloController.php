<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
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
        return view("articulos.crear");
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
        return view("articulos.editar",["articulo" => $articulo]);
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
        //
        return "Aqui va la pagina para actualizar articulos";
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
