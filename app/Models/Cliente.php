<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "clientes";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'dni',
        'direccion',
    ];

    protected $hidden = [
        'id'
    ];

    public function obtenerClientes(){
        return Cliente::all();
    }

    public function obtenerClientePorId($id){
        return Cliente::find($id);
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class,'id_cliente');
    }
}

