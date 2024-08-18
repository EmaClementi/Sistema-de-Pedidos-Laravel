<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_pedido extends Model
{
    use HasFactory;

    protected $table = 'detalle_pedidos';

    protected $fillable = [
        'pedido_id',
        'plato_id',
        'cantidad',
    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
    public function plato(){
        return $this->belongsTo(Plato::class);
    }
}
