<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\User;

class RuanganController extends Controller
{
    public function index()
    {

        return view('ruangan',[
            'ruangans' => Ruangan::where('bisa_pinjam', 1)->get()
        ]);
    }


    
}
