<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormPermintaan extends Controller
{
    //
    public function ListPermintaan()
    {
        return view('permintaan.index');
    }
}
