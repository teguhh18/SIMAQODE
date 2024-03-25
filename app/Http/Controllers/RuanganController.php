<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Ruangan;


class RuanganController extends Controller
{
    public function index()
    {

        return view('ruangan',[
            'ruangans' => Ruangan::where('bisa_pinjam', 1)->get()
        ]);
    }


    
}
