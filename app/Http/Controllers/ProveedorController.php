<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("proveedor/todos",["proveedores"=>Proveedor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("proveedor/crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $proveedor = Proveedor::create([
            "nombre" => $request->nombre,
            "telefono" => $request->telefono,
            "email" => $request->email,
            "nif" => $request->nif,
            "direccion" => $request->direccion,
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
        return view("proveedors.mostrar", ["proveedor" => Proveedor::find($id)]);
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
        //Falta esta vista
        return view("proveedors.editar",["proveedor" => $proveedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proovedor = Articulo::find($id);

        $proovedor->nombre = $request->nombre;
        $proovedor->telefono = $request->telefono;
        $proovedor->email = $request->email;
        $proovedor->nif = $request->nif;
        $proovedor->direccion = $request->direccion;

        $proovedor->save();
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
        //
    }
}
