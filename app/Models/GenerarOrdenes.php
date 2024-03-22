<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerarOrdenes extends Model
{
    use HasFactory;

    protected $table = 'ordenes_generadas';
    
    protected $primaryKey= 'ord_id';
    
    public $timestamps = false;


    protected $fillable= [
        'mat_id',
        'codigo',
        'fecha_registro',
        'valor_pagar',
        'fecha_pago',
        'valor_pagado',
        'estado',
        'mes',
        'responsable',
        'secuencial',
        'documento',


    ];

    {
        return $this->belongsTo(Matricula::class,'mat_id','id');
    }

}

