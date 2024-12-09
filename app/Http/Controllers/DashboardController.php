<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\Propiedad;
use App\Models\User;
use App\Models\Guardia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalZonas = Zona::count();
        $totalPropiedades = Propiedad::count();
        $totalResidentes = User::where('role', 'residente')->count();
        $totalGuardias = User::where('role', 'guard')->count();

        return view('dashboard.index', compact('totalZonas', 'totalPropiedades', 'totalResidentes', 'totalGuardias'));
    }
}
