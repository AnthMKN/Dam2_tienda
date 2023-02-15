<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\DetallePedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use PDF;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

        $ss=new SessionController();

        $ss->store($pedido->id);
        
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
        return view("pedido.mostrar", ["pedido" => Pedido::find($id), "detallesPedido" => $this->listPedido($id), "articulos" => $this->listArticulo($id)]);
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
        $this->generarPDF($pedido->id);

        $pedido->descuento = $request->descuento;
        $pedido -> confirmado = "1";
        $pedido -> save();
        
        $ss=new SessionController();

        $ss->destroy($pedido->id);

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

    public function listPedido($id_pedido){

        $pedido = DB::table('detalle_pedidos')->where('id_pedido',$id_pedido)->get();

        return $pedido;
    }
    public function listArticulo($id_pedido){

        /*$cliente = DB::table('clientes')->join("pedidos","clientes.id","=","pedidos.id_cliente")
                                        ->where("pedidos.id","=",session('pedido'))
                                        ->get();

        $articulos = DB::table('articulos')->join("detalle_pedidos", "articulos.id","=","detalle_pedidos.id_articulo")
                                            ->join("pedidos","detalle_pedidos.id_pedido","=","pedidos.id")
                                            ->where([
                                            ["pedidos.id_cliente","=", $cliente[0]->id_cliente],
                                            ["detalle_pedidos.id_pedido","=",session('pedido')],
                                            ])->select("articulos.nombre")->get();*/
        
        $articulos = DB::table('articulos')
                        ->join("detalle_pedidos", "articulos.id","=","detalle_pedidos.id_articulo")
                        ->where("detalle_pedidos.id_pedido","=", $id_pedido)
                        ->get();

        return $articulos;
    }

    public function generarPDF($id)
    {
        $pedido = // Obtener el pedido correspondiente al ID
        $detallesPedido = // Obtener los detalles del pedido
        $articulos = // Obtener los artículos del pedido
        $total = 0;

        // Renderizar la vista en una variable
        $html = view('pedido.mostrar', compact('pedido', 'detallesPedido', 'articulos', 'total'))->render();

        // Crear el objeto PDF con la vista renderizada
        $pdf = PDF::loadHtml($html);

        // Descargar el archivo PDF
        return $pdf->download('pedido_' . $id . '.pdf');
    }
 }
