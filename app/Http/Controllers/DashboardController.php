<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\User;
use App\Models\Guardia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalZonas = Zona::count();
        $totalResidentes = User::where('role', 'residente')->count();
        $totalGuardias = User::where('role', 'guard')->count();

        return view('dashboard.index', compact('totalZonas', 'totalResidentes', 'totalGuardias'));
    }
}
