<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
<?php
namespace App\Exports;

use App\Models\GenerarOrdenes;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GeneradorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // return User::take(1000)->get()
    // public function collection()
    // {
        
    // }
    public function view():View
    {
    	return view('generador.tabla', [
    		'ordenes' => GenerarOrdenes::take(1000)->get()
    	]);
    }
    
}
