<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidio;
use App\Models\DetallePedido;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $detallePedido = DetallePedido::create([
            "id_pedido" => $request->id_pedido,
            "id_articulo" => $request->id_articulo,
            "cantidad" => $request->cantidad,
            "precio" => $request->precio,
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
        //return JSON("detallePedidio.mostrar", ["detallePedido" => DetallePedido::find($id)]);
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
        return view("detallePedidos.editar",["detallePedido" => $detallePedido]);
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
        //
        return "Aqui va la pagina para actualizar detalles de pedido";
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

    public function list($id_pedido){

        $pedido = DB::table('detalle_pedidos')->where('id_pedido',$id_pedido)->get();

        return $pedido;
    }
}
