<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    protected $table = "detalle_pedidos";

    protected $fillable = [
        'id_pedido',
        'id_articulo',
        'cantidad',
        'precio'
    ];

    protected $hidden = [
        'id'
    ];
    
    public function obtenerDetallePedido(){
        return DetallePedido::all();
    }

    public function obtenerDetallePedidoPorId($id){
        return DetallePedido::find($id);
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, "id_pedido");
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class,"id_articulo", "id");
    }
}
