<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
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
    	return view('users.tabla', [
    		'users' => User::take(1000)->get()
    	]);
    }
    
}
