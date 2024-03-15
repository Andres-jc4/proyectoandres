<?php

namespace App\Exports;

use App\Models\Cursos;
use Maatwebsite\Excel\Concerns\FromCollection;

class CursosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cursos::all();
    }
}
