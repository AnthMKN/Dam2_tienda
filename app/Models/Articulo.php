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
        'precio',
        'stock',
        'categoria',
        'descripcion',
        'fotos'
    ];

    protected $hidden = [
        'id'
        'id_proveedor'
    ];

    public function obtenerArticulos(){
        return Articulos::all();
    }

    public function obtenerArticuloPorId($id){
        return Articulo::find($id);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proovedor::class, "id_proveedor", "id");
    }

}
