<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Articulo;

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
        return view("home", ["detallePedidos" => DetallePedido::all()]);
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

        $articulo = Articulo::find($request->id_articulo);
        $articulo->stock -= $request->cantidad;
        $articulo->save();

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
        
        //dd($request->cantidad);
        $d_pedido = DetallePedido::find($id);

        $restablecerStock = $d_pedido->cantidad - $request->cantidad;
        $articulo = Articulo::find($d_pedido->id_articulo);
        $articulo->stock += $restablecerStock;
        $articulo->save();

        $d_pedido->cantidad = $request->cantidad;
        $d_pedido->save();

        $d_pedido->cantidad = $request->cantidad;
        $d_pedido->save();
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
        $d_pedido = DetallePedido::find($id);

        $articulo = Articulo::find($d_pedido->id_articulo);
        $articulo->stock += $d_pedido->cantidad;
        $articulo->save();

        $d_pedido->delete();

        return redirect()->back();
    }
}
