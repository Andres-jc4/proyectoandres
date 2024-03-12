<?php

namespace App\Http\Controllers;
use App\Exports\CursosExport;
use Illuminate\Http\Request;

use App\Models\Cursos;
use App\Models\Roles;

use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('estoy en la funcion index');
        $response = Http::get('http://192.168.100.92/api/public/api/jornadas');
$jornadas = $response->json();
//Cursos//
$response = Http::get('http://192.168.100.92/api/public/api/cursos');
$cursos = $response->json();
//Paralelos//
$response = Http::get('http://192.168.100.92/api/public/api/anio');
$anio = $response->json();

return view('cursos.index')
->with('jornadas',$jornadas)
->with('cursos',$cursos)
->with('anio',$anio);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create')
       
        ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        Cursos::create($input);
        return Redirect( route('cursos.index') );
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
    public function edit($cur_id)
    {
        $curso=Cursos::find($cur_id);
     
        return view('cursos.edit')
        ->with('curso',$curso);
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$cur_id)
    {
        $input=$request->all();
       $cursos=Cursos::find($cur_id);
       $cursos->update($input);
       return redirect(route('cursos.index') );
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cur_id)
    {
        $cursos=Cursos::find($cur_id);
       $cursos->delete();
       return redirect(route('cursos.index') );
    }



 public function apiConnect2(Request $rq){
       

$data=$rq->all();
$jor_id=$data['jor_id'];
$cur_id=$data['cur_id'];
$paralelo=$data['paralelo'];
$anio=$data['anl_id'];
// $mes=$data['mes'];

$response = Http::get("http://192.168.100.92/api/public/api/estudiantesC/$jor_id/$cur_id/$paralelo/$anio");
$estudiantes = $response->json();
dd($estudiantes);


    }
    
}
