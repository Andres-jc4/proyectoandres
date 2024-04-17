<?php

namespace App\Http\Controllers;
use App\Models\GenerarOrdenes;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
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

    public function generar(Request $rq){
        $datos=$rq->all();
        $anl_id=$datos["anl_id"];
        $jor_id=$datos["jor_id"];
        $mes=$datos["mes"];


        $validar=DB::select("SELECT * FROM ordenes_generadas o
                            JOIN matriculas m ON m.id=o.mat_id
                            WHERE m.anl_id=$anl_id
                            AND m.jor_id=$jor_id
                            AND o.mes=$mes ");

        if(empty($validar)){
            $estudiantes=DB::select("SELECT *, m.id as mat_id FROM matriculas m
                                    JOIN estudiantes e ON m.est_id=e.id
                                    JOIN jornadas j ON m.jor_id=j.id
                                    JOIN cursos c ON m.cur_id=c.id
                                    JOIN especialidades es ON m.esp_id=es.id
                                    WHERE m.anl_id=$anl_id and m.mat_estado=1 and m.jor_id=$jor_id");
            $valor_pagar=75;
            $nmes=$this->mesesLetras($mes);
            $campus="G";
            
            $secuenciales=DB::selectone("SELECT max(secuencial) as secuencial from ordenes_generadas");

            $sec=$secuenciales->secuencial+1;
            foreach($estudiantes as $e){ 

                $input['mat_id']=$e->mat_id;  //id de la matricula
                $input['codigo']=$nmes.$campus.$e->jor_obs.$e->cur_obs.$e->esp_obs."-".$e->mat_id;  //MGM3IF-6546
                $input['fecha_registro']=date('Y-m-d');//
                $input['valor_pagar']=$valor_pagar;
                $input['fecha_pago']=null;
                $input['valor_pagado']=0;     
                $input['estado']=0;
                $input['mes']=$mes;
                $input['responsable']=Auth::user()->username; // Aquí debes proporcionar el ID del usuario
                $input['secuencial']=$sec; // Asigna un valor para el secuencial
                $input['documento']=null; // Asigna un valor para el documento
                GenerarOrdenes::create($input);
                
            }
            return redirect(route('generador.index'));
        }else{
            dd("YA EXISTE UNA ORDEN GENERADA CON ESTOS DATOS");
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

       public function verOrdenes($secuencial)
    {
    $ordenes = DB::select("SELECT * FROM ordenes_generadas o JOIN matriculas m ON o.mat_id=m.id
    JOIN estudiantes e ON m.est_id=e.id
    JOIN jornadas j ON j.id=m.jor_id
    JOIN cursos c ON c.id=m.cur_id
    JOIN especialidades esp ON esp.id=m.esp_id

    WHERE secuencial =:secuencial
    order by e.est_apellidos", ['secuencial' => $secuencial]);
    $meses = $this->meses(); // Obtener los meses
    return view('generador.ver_ordenes', compact('ordenes', 'meses')); // Pasar $meses a la vista
    }

    public function excelorder(){
       
return Excel::download(new UserExport ,'Users_excel.xlsx');
// $response = Http::get('http://192.168.100.92/api/public/api/matriculas/1/16');
// $data = $response->json();
// dd($data);
}

}

