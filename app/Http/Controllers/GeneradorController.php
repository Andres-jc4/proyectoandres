<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class GeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $rq)

    {
        $periodos=DB::select("SELECT * FROM aniolectivo");
        $jornadas=DB::select("SELECT * FROM jornadas");
        $meses=$this->meses();
        
        return view('generador.index')
        ->with('periodos',$periodos)
        ->with('jornadas',$jornadas)
        ->with('meses',$meses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     public function meses(){
        
        return [
            '1'=>'Enero',
            '2'=>'Febrero',
            '3'=>'Marzo',
            '4'=>'Abril',
            '5'=>'Mayo',
            '6'=>'Junio',
            '7'=>'Julio',
            '8'=>'Agosto',
            '9'=>'Septiembre',
            '10'=>'Octubre',
            '11'=>'Noviembre',
            '12'=>'Diciembre',
        ];

        return $meses;
    }

     public function generar(Request $rq)
    {
        $datos=$rq->all();
        $anl_id=$datos['anl_id'];
        $jor_id=$datos['jor_id'];
        $mes=$datos['mes'];
        //
     $estudiantes=DB::select("SELECT * FROM matriculas m
                            JOIN estudiantes e ON m.est_id=e.id
                            WHERE m.anl_id=$anl_id 
                            AND m.jor_id=$jor_id 
                             AND m.mat_estado=1
                             ");
  

     
foreach ($estudiantes as $e) {
$input['mat_id']=;
$input['codigo']=;
$input['fecha_registro']=;
$input['valor_pagar']=;
$input['fecha_pago']=;
$input['valor_pagado']=;
$input['mat_estadomes']=;
$input['responsable']=;
$input['secuencial']=;
$input['documento']=;
}

    }
}
