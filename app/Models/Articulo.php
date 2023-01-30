<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = "articulos";

    protected $fillable = [
        'nombre',
        'id_proveedor',
        'precio',
        'stock',
        'categoria',
        'descripcion',
        'foto',
    ];

    protected $hidden = [
        'id',
    ];

    public function obtenerArticulos(){
        return Articulos::all();
    }

    public function obtenerArticuloPorId($id){
        return Articulo::find($id);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proovedor::class, "id");
    }

    public function detalle_pedido() {
        return $this->hasMany(DetallePedido::class, "id");
    }
}
