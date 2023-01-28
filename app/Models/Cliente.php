<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";

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

}

