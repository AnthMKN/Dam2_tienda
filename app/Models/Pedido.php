<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = "pedidos";

    protected $fillable = [
        'id_cliente',
        'confirmado',
        'descuento',
        'created_at'
    ];

    protected $hidden = [
        'id'
    ];

    public function obtenerPedidos(){
        return Pedido::all();
    }

    public function obtenerPedidoPorId($id){
        return Pedido::find($id);
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class,'id_cliente');
    }

    public function detalle_pedido() {
        return $this->hasMany(DetallePedido::class, "id");
    }
}
