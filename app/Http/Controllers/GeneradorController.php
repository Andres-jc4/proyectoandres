<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use Auth;

class GeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $rq)
    {
        $periodos=DB::select("SELECT * FROM aniolectivo");
        $jornadas=DB::select("SELECT * FROM jornadas");
        $ordenes=DB::select("SELECT o.secuencial,o.fecha_registro,j.jor_descripcion,o.mes,a.anl_descripcion
        FROM ordenes_generadas o
        JOIN matriculas m ON m.id=o.mat_id
        JOIN jornadas j ON j.id=m.jor_id
        JOIN aniolectivo a ON a.id=m.anl_id
        GROUP BY o.secuencial,o.fecha_registro,j.jor_descripcion,o.mes,a.anl_descripcion ORDER BY o.secuencial");
        $meses=$this->meses();
        
        return view('generador.index')
            ->with('meses',$meses)
            ->with('periodos',$periodos)
            ->with('jornadas',$jornadas)
            ->with('ordenes',$ordenes);   
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

    public function meses()
    {
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
    }

    public function mesesLetras($mes)
    {
        $resul="";
        switch ($mes) {
            case 1:
                $resul="E";
                break;
            case 2:
                $resul="F";
                break;
            case 3:
                $resul="M";
                break;
            case 4:
                $resul="A";
                break;
            case 5:
                $resul="MY";
                break;
            case 6:
                $resul="J";
                break;
            case 7:
                $resul="JL";
                break;
            case 8:
                $resul="AG";
                break;
            case 9:
                $resul="S";
                break;
            case 10:
                $resul="O";
                break;
            case 11:
                $resul="N";
                break;
            case 12:
                $resul="D";
                break;   
            default:
                $resul="";
        }
        return $resul;
    }

    public function generar(Request $rq)
    {
        $datos=$rq->all();
        $anl_id=$datos['anl_id'];
        $jor_id=$datos['jor_id'];
        $mes=$datos['mes'];
        $nmes=$this->mesesLetras($mes);
        $campus="G";

        if(empty($validar)) {
            $secuenciales = DB::selectOne("SELECT max(secuencial) as secuencial from ordenes_generadas");
            $sec = $secuenciales->secuencial + 1;
            $estudiantes = DB::select("SELECT *, m.id as mat_id FROM matriculas m 
                             JOIN estudiantes e ON m.est_id=e.id 
                             JOIN jornadas j ON m.jor_id=j.id 
                             JOIN cursos c ON m.cur_id=c.id 
                             JOIN especialidades es ON m.esp_id=es.id 
                             WHERE m.anl_id=$anl_id 
                             AND m.jor_id=$jor_id 
                             AND m.mat_estado=1 
                             ");
            $valor_pagar=75;

            foreach ($estudiantes as $e) {
                $input['mat_id']=$e->mat_id;
                $input['codigo']=$nmes.$campus.$e->jor_obs.$e->cur_obs.$e->esp_obs."-".$e->mat_id;
                $input['fecha_registro']= date('Y-m-d');
                $input['valor_pagar']= $valor_pagar;
                $input['fecha_pago']= null;
                $input['valor_pagado']= 0;
                $input['estado']= 0;
                $input['mes']= $this->mesesLetras($mes);
                $input['responsable']= Auth::user()->name;
                $input['secuencial']= $sec;
                $input['documento']= null;
                GeneradorController::create($input);
            }

            return redirect(route('generador.index'));
        } else {
            dd("Ya existe una orden generada con estos datos");
        }
    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'mat_id', 'id');
    }

    public function eliminarOrden(Request $rq)
    {
        $dt=$rq->all();
        $secuencial=$dt['secuencial'];
        $ordenes=GeneraOrdenes::where('secuencial',$secuencial)->delete();
    }
}

