<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function dashboard()
    {
        return view('anggota.dashboard'); // Adjust to your actual view
    }
}
