<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\DetallePedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "Aqui aparecen los pedidos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pedido.crear", ["articulos" => Articulo::all()],["clientes" => Cliente::all()]);
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
        $pedido = Pedido::create([
            "id_cliente" => $request->id_cliente,
            "confirmado" => $request->confirmado,
            "descuento" => $request->descuento,
        ]);

        session_start();

        session(['pedido' => $pedido->id]);

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
        return view("pedidos.mostrar", ["pedido" => Pedido::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view("pedido.editar",["pedido" => Pedido::find($id), "detallesPedido" => $this->listPedido($id), "articulos" => $this->listArticulo($id)]);
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
        $pedido = Pedido::find($id);

        $pedido -> confirmado = "1";
        $pedido -> save();
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
        //
    }

    public function listPedido($id_pedido){

        $pedido = DB::table('detalle_pedidos')->where('id_pedido',$id_pedido)->get();

        return $pedido;
    }
    public function listArticulo($id_pedido){

        //obtener id cliente
        //detallespedido -> idPedido
        $articulos = DB::table('pedidos')->join("detalle_pedidos", "pedidos.id","=","detalle_pedidos.id_pedido")
                                        ->join("articulos","detalle_pedidos.id_articulo","=","articulos.id")
                                        ->where("pedidos.id_cliente","=", 1)->get();

        return $articulos;
    }
 }
