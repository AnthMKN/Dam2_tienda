<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedidos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("clientes/todos",["clientes"=>Cliente::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("clientes.crear");
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
        $cliente = Cliente::create([
            "nombre" => $request->nombre,
            "telefono" => $request->telefono,
            "email" => $request->email,
            "direccion" => $request->direccion,
            "dni" => $request->dni,
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
        $cliente = Cliente::findOrFail($id);
        $pedidos = $cliente->pedidos;

        return view('clientes.mostrar', compact('cliente', 'pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("clientes.editar",["cliente" => Cliente::find($id)]);
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
        $cliente = Cliente::find($id);

        $cliente->nombre = $request->nombre;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->dni = $request->dni;
        $cliente->direccion = $request->direccion;

        $cliente->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        $cliente->deleted_at = Carbon::now();

        $cliente->save();
        return redirect()->back();
    }
}
