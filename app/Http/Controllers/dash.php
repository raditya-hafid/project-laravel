<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dash extends Controller
{
    public function de()
    {
        return view('dashboard.index');
    }
}
