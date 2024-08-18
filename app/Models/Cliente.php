<?php

namespace App\Models;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
    ];

    public function cliente(){
        return $this->hasMany(Pedido::class);
    }
}
