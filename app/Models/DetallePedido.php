<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    protected $table = "detalle_pedidos";

    protected $fillable = [
        'cantidad',
        'precio',
    ];

    protected $hidden = [
        'id',
        'id_pedido',
        'id_articulo',
    ];
    
    public function obtenerDetallePedido(){
        return DetallePedido::all();
    }

    public function obtenerArticuloPorId($id){
        return DetallePedido::find($id);
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, "id_pedido", "id");
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, "id_articulo", "id");
    }
}
