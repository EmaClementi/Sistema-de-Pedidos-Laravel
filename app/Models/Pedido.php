<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Support\Str;
use App\Models\Detalle_pedido;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos'; // CON ESTO LE INDICAMOS A QUE TABLA CONECTARSE.

    protected $fillable = [
        'cliente_id',
        'fecha',
        'forma_de_pago',
        'total',
        'estado',
    ];

    public function detalle_pedido(){
        return $this->hasMany(Detalle_pedido::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    // 
    protected function estado(): Attribute {

        return Attribute::make(
            set: function($value){ // Este metodo se ejecuta cuando lo voy a almacenar en la BD.
                return strtolower($value); // ESTE METODO SET SE LO CONOCE COMO MUTADORES
                //Esta funcion lo qe hace es tomar el atributo estado,
    // y convertirlo todo a minuscula, por si el usuario ingresa campos en mayuscula.
            },
            get: function($value){ // Este metodo se ejecuta cuando lo intento recuperar de la BD
                return ucfirst($value); //este tipo de metodo se llama ACCESORES.
                // lo que hace es modificar la primera letra para que se muestre en mayuscula
                // pero no al mostrarlo, en la base de datos sigue estando en minuscula
            }
        );
    }
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
