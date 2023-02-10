<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "proveedors";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'nif',
        'direccion',
    ];

    protected $hidden = [
        'id'
    ];

    public function obtenerProveedores(){
        return Proveedor::all();
    }

    public function obtenerProveedorPorId($id){
        return Proveedor::find($id);
    }

    public function articulo() {
        return $this->hasMany(Articulo::class,'id');
    }

}
