<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
    	'cliente_id',
    	'fecha_visita',
    	'cantidad_personas',
    	'estado'
    ];

    public function clientes()
    {
    	return
    	$this->belongsTo(Cliente::class, 'cliente_id');
    }
}
