<?php

namespace App\Http\Controllers\Halo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HaloController extends Controller
{
    //kita buat function
    public function index()
    {
        return view('todo.app');
    }
}
